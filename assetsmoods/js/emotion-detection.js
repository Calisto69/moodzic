<script src="https://cdn.jsdelivr.net/npm/face-api.js"></script>

// At the start of file (after face-api.js import)
console.log('Initializing emotion detection...');

// Load required face-api.js models
Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('/assetsmoods/models'),
    faceapi.nets.faceExpressionNet.loadFromUri('/assetsmoods/models')
]).then(() => {
    console.log('Face detection models loaded successfully');
    startVideo();
}).catch(err => {
    console.error('Error loading face detection models:', err);
});

function startVideo() {
    console.log('Attempting to start video stream...');
    const video = document.getElementById('video');
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            console.log('Camera access granted');
            video.srcObject = stream;
        })
        .catch(err => {
            console.error('Camera access error:', err);
            alert('Please enable camera access to use this feature');
        });
}

// Detect emotion when button is clicked
document.getElementById('detect-emotion').addEventListener('click', async () => {
    console.log('Starting emotion detection...');
    try {
        const video = document.getElementById('video');
        if (!video.srcObject) {
            throw new Error('Camera not initialized');
        }

        const detection = await faceapi.detectSingleFace(
            video,
            new faceapi.TinyFaceDetectorOptions()
        ).withFaceExpressions();

        if (detection) {
            console.log('Face detected, expressions:', detection.expressions);
            // Get the dominant emotion
            const emotions = detection.expressions;
            const dominantEmotion = Object.keys(emotions).reduce((a, b) =>
                emotions[a] > emotions[b] ? a : b
            );

            // Map detected emotion to happy/sad
            let mappedEmotion;
            if (dominantEmotion === 'happy') {
                mappedEmotion = 'happy';
                resultDiv.className = 'alert alert-success';
                // Show happy songs section
                document.getElementById('happy-songs-section').style.display = 'block';
                document.getElementById('sad-songs-section').style.display = 'none';
            } else {
                mappedEmotion = 'sad';
                resultDiv.className = 'alert alert-info';
                // Show sad songs section
                document.getElementById('happy-songs-section').style.display = 'none';
                document.getElementById('sad-songs-section').style.display = 'block';
            }

            resultDiv.style.display = 'block';
            resultDiv.textContent = `Detected Mood: ${mappedEmotion}`;

            // Take snapshot for verification
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
        } else {
            console.log('No face detected in frame');
        }
    } catch (error) {
        console.error('Detection error:', error);
    }
});
