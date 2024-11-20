<script type="text/javascript">
	var currentAudioMyp = null;

        $(document).on('click', '.btn-play-the-music-myp', function(e){

	        e.preventDefault();

	        var audioMyp    = document.getElementById($(this).data('init'));
	        var music_id_myp = $(this).data('musicidmyp');
	        var icon_myp     = document.getElementById("musicIcon-myp-"+music_id_myp);

	        $(".fix-bar-class-myp").hide();
	        $(".default-myp").show();

	        // $(".play_active_song_happy").removeClass("play_active_song_happy");

	        // If there's already a currently playing audio, pause it
		    if (currentAudioMyp && currentAudioMyp !== audioMyp) {
		        currentAudioMyp.pause();

		        $("#bar-play-myp-"+music_id_myp).show();

		    }

	        // Check if the audio is already playing
            if (audioMyp.paused) {

                // If paused, play the audio
                audioMyp.play();
                currentAudioMyp = audioMyp;

                // Change the icon to 'pause' when the music is playing
                icon_myp.classList.remove("fa-play-happy");
                icon_myp.classList.add("fa-pause-happy");
                $("#bar-play-myp-"+music_id_myp).show();
                $("#bar-default-myp-"+music_id_myp).hide();


                // $("#all-music-ul-happy-"+music_id_myp).addClass('play_active_song_happy');

            } else {
                // If playing, pause the audio
                audioMyp.pause();
                currentAudioMyp = null; 

                // Change the icon to 'play' when the music is paused
                icon_myp.classList.remove("fa-pause-happy");
                icon_myp.classList.add("fa-play-happy");
                $("#bar-play-myp-"+music_id_myp).hide();
                $("#bar-default-myp-"+music_id_myp).show();
                
            }

            


	    });
</script>