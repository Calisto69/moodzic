<script type="text/javascript">
	var currentAudioHappy = null;

        $(document).on('click', '.btn-play-the-music-happy', function(e){

	        e.preventDefault();

	        var audiohappy    = document.getElementById($(this).data('init'));
	        var music_id_happy = $(this).data('musicid');
	        var icon_happy     = document.getElementById("musicIcon-happy-"+music_id_happy);

	        // set to play icon all
		    $(".songslist_play").each(function() {
			    $(this).css('display', 'block');
			});


	        $(".fix-bar-class-happy").hide();
	        $(".default-happy").show();

	        // $(".play_active_song_happy").removeClass("play_active_song_happy");

	        // If there's already a currently playing audio, pause it
		    if (currentAudioHappy && currentAudioHappy !== audiohappy) {
		        currentAudioHappy.pause();

		        $("#bar-play-happy-"+music_id_happy).show();

		    }

	        // Check if the audio is already playing
            if (audiohappy.paused) {

                // If paused, play the audio
                audiohappy.play();
                currentAudioHappy = audiohappy;

                // Change the icon to 'pause' when the music is playing
                icon_happy.classList.remove("fa-play-happy");
                icon_happy.classList.add("fa-pause-happy");
                $("#bar-play-happy-"+music_id_happy).show();
                $("#bar-default-happy-"+music_id_happy).hide();


                // $("#all-music-ul-happy-"+music_id_happy).addClass('play_active_song_happy');

            } else {
                // If playing, pause the audio
                audiohappy.pause();
                currentAudioHappy = null; 

                // Change the icon to 'play' when the music is paused
                icon_happy.classList.remove("fa-pause-happy");
                icon_happy.classList.add("fa-play-happy");
                $("#bar-play-happy-"+music_id_happy).hide();
                $("#bar-default-happy-"+music_id_happy).show();
                
            }

            


	    });
</script>