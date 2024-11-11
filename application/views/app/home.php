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
            <? $this->load->view($content); ?>


        </div><!---Main Content end--->

        <!----Audio Player Section---->
        <? $this->load->view('app/audio-player'); ?>
        
    </div>

    <? $this->load->view('app/script'); ?>
    
</body>

</html>