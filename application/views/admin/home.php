<!DOCTYPE html>
<html lang="en">

<? $this->load->view('admin/header'); ?>

<body>
	<!----loader Start---->
	<? $this->load->view('admin/loader'); ?>

    <!----Main Wrapper Start---->
    <div class="ms_main_wrapper ms_mainindex_wrapper">
        <!---Side Menu Start--->
        <? $this->load->view('admin/sidemenu'); ?>

        <!---Main Content Start--->
        <div class="ms_content_wrapper padder_top8">
            <!---Header--->
            <? $this->load->view('admin/navbar'); ?>


            <!---index content--->
            <div id="content-page-id">
                <? $this->load->view($content); ?>
            </div>

        </div><!---Main Content end--->

        <!----Audio Player Section---->
        <? //$this->load->view('admin/audio-player'); ?>
        
    </div>

    <? $this->load->view('admin/script'); ?>

    <? //$this->load->view('admin/script-happy'); ?>
    <? //$this->load->view('admin/script-sad'); ?>
    <? //$this->load->view('admin/script-my-playlist'); ?>

    <script type="text/javascript">

        $(document).ready(function() {

            // Trigger search on pressing the Enter key
            $('#searchInput').on('keypress', function(e) {
                if (e.which === 13) { // Enter key code is 13
                    performSearch();
                }
            });

            // Trigger search when the search icon is clicked
            $('#searchIcon').on('click', function() {
                performSearch();
            });

            // Perform AJAX search
            function performSearch() {

                var searchQuery = $('#searchInput').val();

                if (searchQuery.trim() === '') {
                    iziToast.warning({
                        id: 'warning',
                        // title: 'Warning',
                        message: 'Please enter a search creteria.',
                        position: 'topRight',
                        // close: false,
                        transitionIn: 'flipInX',
                        transitionOut: 'flipOutX',
                        timeout: '2000',
                    });
                    return;
                }

                $('.ms_loader').show();

                $.ajax({
                    url: base_url + 'search/searchResults', // Change with your controller method
                    type: 'POST',
                    data: { query: searchQuery }, // Pass the search query
                    success: function(response) {
                        $('.ms_loader').hide();
                        $('#content-page-id').html(response);
                    },
                    error: function(xhr, status, error) {
                        $('.ms_loader').hide();
                        console.error('AJAX Error:', error);
                    }
                });
            }
        });

    </script>
    
</body>

</html>