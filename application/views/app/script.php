<!--Main js file Style-->
<script>var base_url = "<?php echo base_url(); ?>"; </script>
<script src="<?= base_url();?>assetsmoods/js/jquery.min.js"></script>
<script src="<?= base_url();?>assetsmoods/js/bootstrap.min.js"></script>
<script src="<?= base_url();?>assetsmoods/js/plugins/swiper/js/swiper.min.js"></script>
<script src="<?= base_url();?>assetsmoods/js/plugins/player/jplayer.playlist.min.js"></script>
<script src="<?= base_url();?>assetsmoods/js/plugins/player/jquery.jplayer.min.js"></script>
<script src="<?= base_url();?>assetsmoods/js/plugins/player/audio-player.js"></script>
<script src="<?= base_url();?>assetsmoods/js/plugins/player/volume.js"></script>
<script src="<?= base_url();?>assetsmoods/js/plugins/nice_select/jquery.nice-select.min.js"></script>
<script src="<?= base_url();?>assetsmoods/js/plugins/scroll/jquery.mCustomScrollbar.js"></script>
<script src="<?= base_url();?>assetsmoods/js/custom.js"></script>
<script src="<?= base_url();?>assetsmoods/js/dropzone.min.js"></script>
<script src="<?= base_url();?>assets/plugins/global/plugins.bundle.js"></script>


<script type="text/javascript">
		
		// Variable to store the currently playing audio element
		

		// $(document).on('click', '.btn-play-the-music', function(e) {
		//     e.preventDefault(); // Prevent default action (e.g., navigation)

		//     // Get the ID of the audio element from the button's data-init attribute
		//     var audioId = $(this).data('init');

		//     // Get the audio element corresponding to the selected audio ID
		//     var audio = document.getElementById(audioId);

		//     // If there's already a currently playing audio, pause it
		//     if (currentAudio && currentAudio !== audio) {
		//         currentAudio.pause();
		//     }

		//     // If the selected audio is paused, play it
		//     if (audio.paused) {
		//         audio.play();
		//         currentAudio = audio; // Set the current audio to the newly selected audio
		//     } else {
		//         // If the selected audio is already playing, pause it (optional)
		//         audio.pause();
		//         currentAudio = null; // Reset the current audio reference
		//     }
		// });


		var currentAudio = null;

        $(document).on('click', '.btn-play-the-music', function(e){

	        e.preventDefault();

	        var audio    = document.getElementById($(this).data('init'));
	        var music_id = $(this).data('musicid');
	        var icon     = document.getElementById("musicIcon-"+music_id);

	        // If there's already a currently playing audio, pause it
		    if (currentAudio && currentAudio !== audio) {
		        currentAudio.pause();
		        
		    }

	        // Check if the audio is already playing
            if (audio.paused) {

                // If paused, play the audio
                audio.play();
                currentAudio = audio;

                // Change the icon to 'pause' when the music is playing
                icon.classList.remove("fa-play");
                icon.classList.add("fa-pause");
                $("#bar-play-"+music_id).show();

            } else {
                // If playing, pause the audio
                audio.pause();
                currentAudio = null; 

                // Change the icon to 'play' when the music is paused
                icon.classList.remove("fa-pause");
                icon.classList.add("fa-play");
                $("#bar-play-"+music_id).hide();
                
            }


	    });
    
</script>