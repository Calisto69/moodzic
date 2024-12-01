from flask import Flask, render_template, jsonify, Response
from flask_cors import CORS
import mysql.connector
from mysql.connector import Error
from deepface import DeepFace
import cv2
import pandas as pd
import numpy as np
import time

# Database configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'moodzics'
}

# Database connection function
def get_db_connection():
    try:
        connection = mysql.connector.connect(**db_config)
        return connection
    except Error as e:
        print(f"Error connecting to MySQL database: {e}")
        return None

# Remove or comment out CSV loading code
# try:
#     df = pd.read_csv('Datasets/kaggleMusicMoodFinal.csv', on_bad_lines='skip')
# except Exception as e:
#     print(f"Error reading CSV file: {e}")
#     exit()

# Verify the dataset
# print("Dataset Preview:")
# print(df.head())
# print("Dataset Columns:")
# print(df.columns)

# Map emotions to moods
emotion_to_mood = {
    'happy': 'Happy',
    'sad': 'Sad',
    'angry': 'Energetic',
    'neutral': 'Calm'
}

# Modify the recommend_songs function to use database
def recommend_songs(mood, num_songs=5):
    """
    Recommend songs based on the detected mood from database.
    """
    try:
        connection = get_db_connection()
        if connection is None:
            return []
        
        cursor = connection.cursor(dictionary=True)
        # Map mood to category (1: Happy, 2: Sad, 3: Energetic, 4: Calm)
        mood_to_category = {
            'Sad': 1,
            'Happy': 2,
            'Energetic': 3,
            'Calm': 4
        }
        
        category = mood_to_category.get(mood, 1)  # Default to Happy if mood not found
        
        query = """
            SELECT name, singer as artists, 
                   CONCAT('http://localhost/moodzic/uploads/musics/', filename) as file_url
            FROM musics 
            WHERE category = %s
            ORDER BY RAND() 
            LIMIT %s
        """
        cursor.execute(query, (category, num_songs))
        songs = cursor.fetchall()
        
        cursor.close()
        connection.close()
        
        if not songs:
            return [{'name': 'No songs available', 'artists': ''}]
        
        # Print the whole data
        print(songs)
        return songs
        
    except Error as e:
        print(f"Error querying database: {e}")
        return [{'name': 'Error fetching songs', 'artists': ''}]

# Function to detect emotion from a single frame
def detect_emotion(frame):
    """
    Detect dominant emotion from the given frame using DeepFace.
    """
    try:
        # Analyze emotions in the frame with the specified backend
        result = DeepFace.analyze(
            frame,
            actions=['emotion'],          # Focus only on emotion detection
            enforce_detection=False,      # Avoid errors if no face is detected
            detector_backend='retinaface' # Lightweight and accurate backend
        )

        # Handle cases where the result is a list (e.g., multiple faces detected)
        if isinstance(result, list):
            result = result[0]

        # Extract emotion scores and find the dominant emotion
        emotion_scores = result['emotion']
        dominant_emotion = max(emotion_scores, key=emotion_scores.get)

        # Override 'neutral' with 'happy' for smiles with a high 'happy' score
        if dominant_emotion == 'neutral' and emotion_scores['happy'] > 0.5:
            dominant_emotion = 'happy'

        # Map the detected emotion to a mood
        mood = emotion_to_mood.get(dominant_emotion, 'Calm')
        return mood  # Return the mapped mood
    except Exception as e:
        print(f"Error detecting emotion: {e}")
        return "Calm"  # Return default mood if detection fails

app = Flask(__name__)
CORS(app)  # Enable CORS for all routes

current_mood = "Detecting..."  # Add this at the top of the file with other globals
video_capture = None  # Global variable to store video capture object

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/detect')
def detect():
    global current_mood  # Add this at the top of the file with other globals
    current_mood = "Detecting..."  # Reset mood for new detection
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/stop_detection')
def stop_detection():
    global video_capture, current_mood
    if video_capture:
        video_capture.release()
        video_capture = None
    current_mood = "Detecting..."
    return jsonify({"status": "stopped"})

@app.route('/iframe')
def iframe_view():
    return render_template('iframe.html')

def generate_frames():
    global video_capture, current_mood
    
    # Release existing capture if any
    if video_capture:
        video_capture.release()
    
    video_capture = cv2.VideoCapture(0)
    # Set camera resolution to match index.html view
    video_capture.set(cv2.CAP_PROP_FRAME_WIDTH, 640)
    video_capture.set(cv2.CAP_PROP_FRAME_HEIGHT, 480)
    
    emotion_count = {}
    frame_skip = 5
    frame_count = 0
    detection_start_time = time.time()

    try:
        while True:
            if video_capture is None:  # Check if detection was stopped
                break
                
            ret, frame = video_capture.read()
            if not ret:
                break

            # Maintain aspect ratio when resizing
            small_frame = cv2.resize(frame, (640, 480))  # Changed from 320, 240

            if frame_count % frame_skip == 0:
                detected_mood = detect_emotion(small_frame)
                if detected_mood:
                    current_mood = detected_mood
                    emotion_count[current_mood] = emotion_count.get(current_mood, 0) + 1

            frame_count += 1
            # Add mood text with better positioning
            cv2.putText(frame, f"Detected Mood: {current_mood}", (20, 50), 
                        cv2.FONT_HERSHEY_SIMPLEX, 1.0, (0, 255, 0), 2)

            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

            if time.time() - detection_start_time > 15:
                video_capture.release()
                video_capture = None
                break
    finally:
        if video_capture:
            video_capture.release()
            video_capture = None

@app.route('/get_recommendations')
def get_recommendations():
    global current_mood
    recommendations = recommend_songs(current_mood)
    return jsonify({
        'mood': current_mood,
        'recommendations': recommendations
    })

@app.teardown_appcontext
def cleanup(exception=None):
    global video_capture
    if video_capture:
        video_capture.release()
        video_capture = None

if __name__ == '__main__':
    app.run(debug=True, host='127.0.0.1', port=5000)