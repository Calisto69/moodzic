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
<script src="<?= base_url();?>node_modules/izitoast/dist/js/iziToast.js"></script>
<script src="<?= base_url();?>node_modules/izitoast/dist/js/iziToast.min.js"></script>

<script type="text/javascript">

		var currentAudio = null;

        $(document).on('click', '.btn-play-the-music', function(e){

	        e.preventDefault();



	        var audio    = document.getElementById($(this).data('init'));
	        var music_id = $(this).data('musicid');
	        var icon     = document.getElementById("musicIcon-"+music_id);

	        var music_name = $("#music-name-" + music_id).val();
	        var artist_name = $("#artists-name-" + music_id).val();

	        // alert (music_name);


	        // Reset all icons and bars before handling the current audio
		    $(".fa-pause").each(function() {
		        $(this).removeClass("fa-pause").addClass("fa-play");
		    });

	        $(".fix-bar-class").hide();

	        $(".play_active_song").removeClass("play_active_song");

	        // If there's already a currently playing audio, pause it
		    if (currentAudio && currentAudio !== audio) {
		        currentAudio.pause();

		        $("#bar-play-"+music_id).show();

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

                $("#all-music-ul-"+music_id).addClass('play_active_song');

            } else {
                // If playing, pause the audio
                audio.pause();
                currentAudio = null; 

                // Change the icon to 'play' when the music is paused
                icon.classList.remove("fa-pause");
                icon.classList.add("fa-play");
                $("#bar-play-"+music_id).hide();
                
            }

            iziToast.show({
		        id: 'haduken',
		        theme: 'dark',
		        icon: 'icon-contacts',
		        title: 'Now Playing',
		        displayMode: 2,
		        message: artist_name + " - " + music_name,
		        // position: 'topCenter',
		        transitionIn: 'flipInX',
		        transitionOut: 'flipOutX',
		        progressBarColor: 'rgb(0, 255, 184)',
		        image: base_url +'assetsmoods/images/loader.gif',
		        imageWidth: 70,
		        layout: 2,
		        onClosing: function(){
		            console.info('onClosing');
		        },
		        onClosed: function(instance, toast, closedBy){
		            console.info('Closed | closedBy: ' + closedBy);
		        },
		        iconColor: 'rgb(0, 255, 184)'
		    });


	    });

	    function addToFav(id)
	    {
	    	$.ajax({
                url: base_url + 'allmusic/addToFav', // The route defined in routes.php
                type: 'POST',       // HTTP method
                dataType: 'json',  // Expected response data format
                data:{id:id},
                success: function(response) {
                    if (response.status === 'success') {
                        iziToast.success({
						    title: response.msg,
						    position: 'topCenter',
						    timeout: '2000',
						});
                    } else if (response.status == 'info') {
                    	iziToast.info({
						    title: response.msg,
						    position: 'topCenter',
						    transitionIn: 'bounceInDown',
						    timeout: '2000',
						});
                    } else {
                    	iziToast.error({
						    title: response.msg,
						    position: 'topCenter',
						    timeout: '2000',
						});
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
	    }

	    function addToCategory(id, category) {
	    	// body...
	    	$.ajax({
                url: base_url + 'allmusic/addToCategory', // The route defined in routes.php
                type: 'POST',       // HTTP method
                dataType: 'json',  // Expected response data format
                data:{id:id,category:category},
                success: function(response) {
                    if (response.status === 'success') {
                        iziToast.success({
						    title: response.msg,
						    position: 'topCenter',
						    timeout: '2000',
						});
                    } else {
                    	iziToast.error({
						    title: response.msg,
						    position: 'topCenter',
						    timeout: '2000',
						});
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
	    }

	    function deleteMusic(id) {
	    	// body...
	    	iziToast.show({
			    theme: 'dark',
			    icon: 'icon-person',
			    // title: 'Hey',
			    message: 'Are you sure want to delete?',
			    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
			    progressBarColor: 'rgb(0, 255, 184)',
			    buttons: [
			        ['<button>Yes</button>', function (instance, toast) {
			            

			        	$.ajax({
			                url: base_url + 'allmusic/deleteMusic', // The route defined in routes.php
			                type: 'POST',       // HTTP method
			                dataType: 'json',  // Expected response data format
			                data:{id:id},
			                success: function(response) {
			                    if (response.status === 'success') {
									instance.hide({
		                                transitionOut: 'fadeOutUp',
		                                onClosing: function(instance, toast, closedBy){
		                                    console.info('Toast closed: ' + closedBy);
		                                }
		                            }, toast);
		                            
		                            iziToast.success({
		                                title: response.msg,
		                                position: 'topCenter',
		                                timeout: 1000,
		                                close: false,
		                            });

		                            // Reload the page after the success toast disappears
		                            setTimeout(function() {
		                                location.reload();
		                            }, 1000); // Match the timeout duration of the success toast

			                    } else {
			                    	iziToast.error({
									    title: response.msg,
									    position: 'topCenter',
									    timeout: '2000',
									});
			                    }
			                },
			                error: function(xhr, status, error) {
			                    console.error('AJAX Error:', error);
			                }
			            });


			        }, true], // true to focus
			        ['<button>Close</button>', function (instance, toast) {
			            instance.hide({
			                transitionOut: 'fadeOutUp',
			                onClosing: function(instance, toast, closedBy){
			                    console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
			                }
			            }, toast, 'buttonName');
			        }]
			    ],
			    onOpening: function(instance, toast){
			        console.info('callback abriu!');
			    },
			    onClosing: function(instance, toast, closedBy){
			        console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
			    }
			});
	    }

	    function removeFromFav(id)
	    {
	    	iziToast.show({
			    theme: 'dark',
			    icon: 'icon-person',
			    // title: 'Hey',
			    message: 'Are you sure want to remove from favourite?',
			    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
			    progressBarColor: 'rgb(0, 255, 184)',
			    buttons: [
			        ['<button>Yes</button>', function (instance, toast) {
			            

			        	$.ajax({
			                url: base_url + 'Favourite/removeFromFav', // The route defined in routes.php
			                type: 'POST',       // HTTP method
			                dataType: 'json',  // Expected response data format
			                data:{id:id},
			                success: function(response) {
			                    if (response.status === 'success') {
									instance.hide({
		                                transitionOut: 'fadeOutUp',
		                                onClosing: function(instance, toast, closedBy){
		                                    console.info('Toast closed: ' + closedBy);
		                                }
		                            }, toast);
		                            
		                            iziToast.success({
		                                title: response.msg,
		                                position: 'topCenter',
		                                timeout: 1000,
		                                close: false,
		                            });

		                            // Reload the page after the success toast disappears
		                            setTimeout(function() {
		                                location.reload();
		                            }, 1000); // Match the timeout duration of the success toast

			                    } else {
			                    	iziToast.error({
									    title: response.msg,
									    position: 'topCenter',
									    timeout: '2000',
									});
			                    }
			                },
			                error: function(xhr, status, error) {
			                    console.error('AJAX Error:', error);
			                }
			            });


			        }, true], // true to focus
			        ['<button>Close</button>', function (instance, toast) {
			            instance.hide({
			                transitionOut: 'fadeOutUp',
			                onClosing: function(instance, toast, closedBy){
			                    console.info('closedBy: ' + closedBy); // The return will be: 'closedBy: buttonName'
			                }
			            }, toast, 'buttonName');
			        }]
			    ],
			    onOpening: function(instance, toast){
			        console.info('callback abriu!');
			    },
			    onClosing: function(instance, toast, closedBy){
			        console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
			    }
			});
	    }
    
</script>