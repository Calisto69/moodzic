 <div class="ms_sidemenu_wrapper">
    <div class="ms_nav_close ms_cmenu_toggle">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    </div>
    <div class="ms_sidemenu_inner">
        <div class="">
            <div class="">
                <a href="<?= base_url('admin')?>">
                    <img src="<?= base_url('assetsmoods/images/mood.png')?>" alt="logo" class="img-fluid" width="200px"/>
                    <!-- <strong>MoodZic</strong> -->
                </a>
            </div>
            <div class="ms_logo_mini">
                <a href="<?= base_url('assetsmoods/images/mood.png')?>" alt="mini_logo" class="img-fluid"/></a>
            </div>
        </div>                
        <div class="ms_nav_wrapper"> 
            <h4 class="nav_heading">Users</h4>                   
            <ul>
                <!-- <li>
                    <a href="<?= base_url('app')?>" title="Albums">
                        <span class="nav_icon">
                            <span class="icon icon_albums"></span>
                        </span>
                        <span class="nav_text">
                            albums
                        </span>
                    </a>
                </li>  -->           
                <li><a href="<?= base_url('admin/allUsers');?>" title="Music">
				<span class="nav_icon">
					<span class="icon icon_users"></span>
				</span>
				<span class="nav_text">
					All users
				</span>
				</a>
                </li>
                
            </ul>
            <h4 class="nav_heading">Music</h4>
            <ul class="nav_downloads">
                
                
                <li><a href="<?= base_url('favourite')?>" title="Favourites">
				<span class="nav_icon">
					<span class="icon icon_albums"></span>
				</span>
				<span class="nav_text">
					All musics
				</span>
				</a>
                </li>

                <li><a href="<?= base_url('favourite')?>" title="Favourites">
                <span class="nav_icon">
                    <span class="icon icon_music"></span>
                </span>
                <span class="nav_text">
                    musics by category
                </span>
                </a>
                </li>
            
            </ul>

            <?/*
            <h4 class="nav_heading">New</h4>
            <ul class="nav_downloads">
                
                
                <li><a href="<?= base_url('newmusics'); ?>" title="Favourites">
                <span class="nav_icon">
                    <span class="icon icon_upload"></span>
                </span>
                <span class="nav_text">
                    Add New Music
                </span>
                </a>
                </li>
            
            </ul>

            */?>
        </div>
    </div>
</div>