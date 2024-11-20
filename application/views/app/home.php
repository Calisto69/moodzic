<!DOCTYPE html>
<html lang="en">

<? $this->load->view('app/header'); ?>

<body>
	<!----loader Start---->
	<? $this->load->view('app/loader'); ?>

    <!----Main Wrapper Start---->
    <div class="ms_main_wrapper ms_mainindex_wrapper">
        <!---Side Menu Start--->
        <? $this->load->view('app/sidemenu'); ?>

        <!---Main Content Start--->
        <div class="ms_content_wrapper padder_top8">
            <!---Header--->
            <? $this->load->view('app/navbar'); ?>


            <!---index content--->
            <div id="content-page-id">
                <? $this->load->view($content); ?>
            </div>

        </div><!---Main Content end--->

        <!----Audio Player Section---->
        <? //$this->load->view('app/audio-player'); ?>
        
    </div>

    <? $this->load->view('app/script'); ?>

    <? $this->load->view('app/script-happy'); ?>
    <? $this->load->view('app/script-sad'); ?>
    <? $this->load->view('app/script-my-playlist'); ?>

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
                    // iziToast.info({
                    //     id:"warning",
                    //     title: "Info",
                    //     message: "Please enter a search term.",
                    //     timeout: '2000',
                    //     position: 'topRight',
                    //     // close: false,
                    //     transitionIn: 'flipInX',
                    //     transitionOut: 'flipOutX'
                    // });
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