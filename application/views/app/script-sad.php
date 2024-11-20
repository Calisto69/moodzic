<script type="text/javascript">
	var currentAudioSad = null;

        $(document).on('click', '.btn-play-the-music-sad', function(e){

	        e.preventDefault();

	        var audioSad    = document.getElementById($(this).data('init'));
	        var music_id_sad = $(this).data('musicidsad');
	        var icon_sad     = document.getElementById("musicIcon-sad-"+music_id_sad);

	        // set to play icon all
		    // $(".songslist_play").each(function() {
			//     $(this).css('display', 'block');
			// });


	        $(".fix-bar-class-sad").hide();
	        $(".default-sad").show();

	        // $(".play_active_song_happy").removeClass("play_active_song_happy");

	        // If there's already a currently playing audio, pause it
		    if (currentAudioSad && currentAudioSad !== audioSad) {
		        currentAudioSad.pause();

		        $("#bar-play-sad-"+music_id_sad).show();

		    }

	        // Check if the audio is already playing
            if (audioSad.paused) {

                // If paused, play the audio
                audioSad.play();
                currentAudioSad = audioSad;

                // Change the icon to 'pause' when the music is playing
                icon_sad.classList.remove("fa-play-happy");
                icon_sad.classList.add("fa-pause-happy");
                $("#bar-play-sad-"+music_id_sad).show();
                $("#bar-default-sad-"+music_id_sad).hide();


                // $("#all-music-ul-happy-"+music_id_sad).addClass('play_active_song_happy');

            } else {
                // If playing, pause the audio
                audioSad.pause();
                currentAudioSad = null; 

                // Change the icon to 'play' when the music is paused
                icon_sad.classList.remove("fa-pause-happy");
                icon_sad.classList.add("fa-play-happy");
                $("#bar-play-sad-"+music_id_sad).hide();
                $("#bar-default-sad-"+music_id_sad).show();
                
            }

            


	    });
</script>