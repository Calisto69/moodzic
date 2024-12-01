<div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">AI Music - Face Recognition Mood</h4>
                </div>
            </div>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                }

                body {
                    background: rgb(12, 27, 44);
                }

                .container {
                    display: flex;
                    min-height: 100vh;
                    padding: 20px;
                    gap: 20px;
                }

                .video-section {
                    flex: 1;
                    background: white;
                    padding: 20px;
                    border-radius: 15px;
                    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                }

                .recommendations-section {
                    width: 400px;
                    background: white;
                    padding: 20px;
                    border-radius: 15px;
                    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                }

                h1 {
                    color: #333;
                    margin-bottom: 20px;
                    font-size: 24px;
                }

                .mood-display {
                    background: #e3f2fd;
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 20px;
                    font-weight: 500;
                }

                .song-item {
                    background: #f8f9fa;
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 10px;
                    transition: transform 0.2s;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .song-item:hover {
                    transform: translateX(5px);
                    background: #e3f2fd;
                }

                .song-info {
                    flex: 1;
                }

                .audio-controls {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                }

                .play-btn {
                    background: #4CAF50;
                    color: white;
                    border: none;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .play-btn:hover {
                    background: #45a049;
                }

                .song-progress {
                    width: 100px;
                    height: 4px;
                    background: #ddd;
                    border-radius: 2px;
                    cursor: pointer;
                }

                .song-progress-fill {
                    height: 100%;
                    background: #4CAF50;
                    border-radius: 2px;
                    width: 0%;
                }

                .song-name {
                    font-weight: 500;
                    color: #333;
                    margin-bottom: 5px;
                }

                .song-artist {
                    color: #666;
                    font-size: 0.9em;
                }

                .loading {
                    text-align: center;
                    padding: 40px 20px;
                    color: #666;
                    background: #f8f9fa;
                    border-radius: 8px;
                    animation: pulse 1.5s infinite;
                }

                @keyframes pulse {
                    0% { opacity: 1; }
                    50% { opacity: 0.5; }
                    100% { opacity: 1; }
                }

                .initial-message {
                    text-align: center;
                    padding: 40px 20px;
                    color: #666;
                    background: #f8f9fa;
                    border-radius: 8px;
                }

                .initial-message i {
                    display: block;
                    font-size: 48px;
                    margin-bottom: 15px;
                    color: #4CAF50;
                }

                .detection-progress {
                    background: #e3f2fd;
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 20px;
                    text-align: center;
                }

                .progress-bar {
                    width: 100%;
                    height: 4px;
                    background: #ddd;
                    border-radius: 2px;
                    margin-top: 10px;
                }

                .progress-bar-fill {
                    height: 100%;
                    background: #4CAF50;
                    border-radius: 2px;
                    width: 0%;
                    transition: width 0.3s;
                }

                .controls {
                    margin: 20px 0;
                }

                .start-btn {
                    background: #4CAF50;
                    color: white;
                    border: none;
                    padding: 12px 24px;
                    border-radius: 8px;
                    font-size: 16px;
                    cursor: pointer;
                    transition: background 0.3s;
                }

                .start-btn:hover {
                    background: #45a049;
                }

                .start-btn:disabled {
                    background: #cccccc;
                    cursor: not-allowed;
                }

                #video-iframe {
                    width: 100%;
                    height: 480px;
                    display: none;
                    margin-bottom: 20px;
                }

                #video-iframe.active {
                    display: block;
                }

                #detection-iframe {
                    width: 100%;
                    height: 480px;
                    border: none;
                    border-radius: 10px;
                    background: #f8f9fa;
                    object-fit: contain;  /* Maintain aspect ratio */
                }
            </style>
            <div class="album_list_wrapper">
                <div class="container">
                    <div class="video-section">
                        <h1>Moodzic</h1>
                        <div class="controls">
                            <button id="startBtn" class="start-btn">Start Detection</button>
                        </div>
                        <div id="video-iframe">
                            <iframe id="detection-iframe" src="" frameborder="0"></iframe>
                        </div>
                    </div>
                    
                    <div class="recommendations-section">
                        <h1>Recommended Songs</h1>
                        <div id="songs-list">
                            <div class="initial-message">
                                <i class="fa fa-music"></i>
                                <p>Press "Start Detection" to analyze your mood and get personalized song recommendations!</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Script -->
                <script>
                    const flaskUrl = '<?php echo $flask_url; ?>';
                    const startBtn = document.getElementById('startBtn');
                    const videoIframe = document.getElementById('video-iframe');
                    const detectionIframe = document.getElementById('detection-iframe');
                    let detectionActive = false;
                    let currentAudio = null;
                    let currentButton = null;

                    function resetVideoFeed() {
                        videoIframe.classList.remove('active');
                        detectionIframe.src = '';
                        detectionActive = false;
                        startBtn.disabled = false;
                        startBtn.textContent = 'Start Detection';
                    }

                    function togglePlay(button, url) {
                        if (currentAudio && currentAudio.src === url) {
                            if (currentAudio.paused) {
                                currentAudio.play();
                                button.innerHTML = '<i class="fa fa-pause"></i>';
                            } else {
                                currentAudio.pause();
                                button.innerHTML = '<i class="fa fa-play"></i>';
                            }
                        } else {
                            if (currentAudio) {
                                currentAudio.pause();
                                currentButton.innerHTML = '<i class="fa fa-play"></i>';
                            }
                            currentAudio = new Audio(url);
                            currentButton = button;
                            
                            currentAudio.onerror = () => {
                                console.error('Error loading audio file:', url);
                                button.innerHTML = '<i class="fa fa-exclamation-triangle"></i>';
                                button.style.background = '#dc3545';
                            };

                            currentAudio.play().catch(error => {
                                console.error('Error playing audio:', error);
                                button.innerHTML = '<i class="fa fa-exclamation-triangle"></i>';
                                button.style.background = '#dc3545';
                            });
                            
                            button.innerHTML = '<i class="fa fa-pause"></i>';

                            currentAudio.addEventListener('ended', () => {
                                button.innerHTML = '<i class="fa fa-play"></i>';
                            });

                            currentAudio.addEventListener('timeupdate', () => {
                                const progress = button.parentElement.querySelector('.song-progress-fill');
                                const percent = (currentAudio.currentTime / currentAudio.duration) * 100;
                                progress.style.width = percent + '%';
                            });
                        }
                    }

                    startBtn.addEventListener('click', async () => {
                        if (!detectionActive) {
                            startBtn.disabled = true;
                            startBtn.textContent = 'Detecting...';
                            videoIframe.classList.add('active');
                            detectionIframe.style.height = '480px';
                            
                            const songsList = document.getElementById('songs-list');
                            songsList.innerHTML = `
                                <div class="detection-progress">
                                    <p>Analyzing your mood...</p>
                                    <div class="progress-bar">
                                        <div class="progress-bar-fill"></div>
                                    </div>
                                </div>
                                <div class="loading">Finding the perfect songs for your mood...</div>
                            `;

                            // Animate progress bar
                            const progressBar = document.querySelector('.progress-bar-fill');
                            progressBar.style.width = '0%';
                            setTimeout(() => { progressBar.style.width = '100%'; }, 100);
                            
                            try {
                                await fetch(`${flaskUrl}/stop_detection`);
                                detectionIframe.src = `${flaskUrl}/detect`;
                                detectionActive = true;

                                setTimeout(async () => {
                                    try {
                                        const response = await fetch(`${flaskUrl}/get_recommendations`);
                                        const data = await response.json();
                                        const songsList = document.getElementById('songs-list');
                                        songsList.innerHTML = `
                                            <div class="mood-display">Current Mood: ${data.mood}</div>
                                        `;
                                        data.recommendations.forEach(song => {
                                            songsList.innerHTML += `
                                                <div class="song-item">
                                                    <div class="song-info">
                                                        <div class="song-name">${song.name}</div>
                                                        <div class="song-artist">${song.artists}</div>
                                                    </div>
                                                    <div class="audio-controls">
                                                        <button class="play-btn" onclick="togglePlay(this, '${song.file_url}')">
                                                            <i class="fa fa-play"></i>
                                                        </button>
                                                        <div class="song-progress">
                                                            <div class="song-progress-fill"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            `;
                                        });
                                    } catch (error) {
                                        console.error('Error getting recommendations:', error);
                                    } finally {
                                        await fetch(`${flaskUrl}/stop_detection`);
                                        resetVideoFeed();
                                    }
                                }, 15000);
                            } catch (error) {
                                console.error('Error during detection:', error);
                                resetVideoFeed();
                                songsList.innerHTML = `
                                    <div class="initial-message">
                                        <i class="fa fa-exclamation-circle"></i>
                                        <p>Oops! Something went wrong. Please try again.</p>
                                    </div>
                                `;
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
</body>
</html>
