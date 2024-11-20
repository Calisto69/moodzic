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

	function deleteAccount(id) {
		// body...
		// body...
	    	iziToast.show({
			    theme: 'dark',
			    icon: 'icon-person',
			    title: 'Are you sure want to delete this account?',
			    message: 'Once account successfully deleted their music also will be deleted.',
			    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
			    progressBarColor: 'rgb(0, 255, 184)',
			    buttons: [
			        ['<button>Yes</button>', function (instance, toast) {
			            

			        	$.ajax({
			                url: base_url + 'admin/deleteAcc', // The route defined in routes.php
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
		                                // location.reload();
		                                location.href = base_url + 'admin/allUsers';
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
			                url: base_url + 'admin/deleteMusic', // The route defined in routes.php
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
