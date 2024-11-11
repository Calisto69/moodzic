 <div class="ms_sidemenu_wrapper">
    <div class="ms_nav_close ms_cmenu_toggle">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    </div>
    <div class="ms_sidemenu_inner">
        <div class="ms_logo_inner">
            <div class="ms_logo">
                <a href="index.html"><img src="https://dummyimage.com/150x72" alt="logo" class="img-fluid"/></a>
            </div>
            <div class="ms_logo_mini">
                <a href="index.html"><img src="https://dummyimage.com/42x43" alt="mini_logo" class="img-fluid"/></a>
            </div>
        </div>                
        <div class="ms_nav_wrapper"> 
            <h4 class="nav_heading">Browse Music</h4>                   
            <ul>
                <li>
                    <a href="album.html" title="Albums">
                        <span class="nav_icon">
                            <span class="icon icon_albums"></span>
                        </span>
                        <span class="nav_text">
                            albums
                        </span>
                    </a>
                </li>            
                <li><a href="music.html" title="Music">
				<span class="nav_icon">
					<span class="icon icon_music"></span>
				</span>
				<span class="nav_text">
					All music
				</span>
				</a>
                </li>
                
            </ul>
            <h4 class="nav_heading">Your Music</h4>
            <ul class="nav_downloads">
                
                
                <li><a href="favourite.html" title="Favourites">
				<span class="nav_icon">
					<span class="icon icon_favourite"></span>
				</span>
				<span class="nav_text">
					favourites
				</span>
				</a>
                </li>
            
            </ul>

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
        </div>
    </div>
</div>