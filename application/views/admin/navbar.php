<div class="ms_header">
    <div class="ms_header_inner">
        <div class="ms_top_left">
            <div class="ms_top_search">
                <input type="text" class="form-control" placeholder="Search for Song, Artists, Playlists and More..." id="searchInput">
                <span class="search_icon" id="searchIcon">
                    <img src="<?= base_url(); ?>assetsmoods/images/svg/search.svg" alt="search">
                </span>
            </div>
            <!-- <div class="ms_noti_wrap">
                <span class="noti_icon bg_cmn_iconwrap"><i class="bg_cmn_icon"></i></span>
            </div> -->
        </div>
        <div class="ms_top_right">
            <div class="ms_pro_inner">                        
                <!-- <div class="ms_pro_img"> <img src="https://dummyimage.com/50x50" alt="Profile"></div> -->
                <div class="ms_pro_namewrap">
                    <span class="pro_name">Hello, <?=$this->session->userdata('username')?></span> <i class="fa fa-caret-down"></i>
                </div>
                <ul class="ms_common_dropdown ms_profile_dropdown">
                    <li>
                        <a href="<?=base_url('admin/profile')?>">
                            <span class="common_drop_icon drop_pro"></span>Profile
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('logout');?>">
                            <span class="common_drop_icon drop_logt"></span>Logout
                        </a>
                    </li>
                </ul>                      
            </div>
            <div class="ms_cmenu_toggle ms_menu_toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</div>