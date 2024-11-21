 <div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">All Users &nbsp;</h4>
                </div>
            </div>
            <div class="album_list_wrapper">
                <ul class="album_list_name">
                    <li style="width: 1px;">#</li>
                    <li>Name</li>
                    <li>Email</li>
                    <li>Created on</li>
                    <li>Total Music Uploaded</li>
                    <li>Action</li>
                </ul>
 
                <? if($users){ ?>
                <? $no = 1; foreach ($users as $key) { ?>
                <?
                $total_music = count_music_by_user($key['id']);
                ?>
                <ul style="color: white;">
                    <li style="width: 1px;">
                        <?=$no++ ?>
                    </li>
                    <li>
                        <?=$key['fullname']?>
                    </li>
                    <li>
                        <?=$key['email']?>
                    </li>
                    <li>
                        <?=dmy($key['create_dt'])?>
                    </li>
                    <li>
                        <?=$total_music?>
                    </li>
                    <li>
                        <!-- <i class="fa fa-info-circle fa-xl" aria-hidden="true"></i> -->
                        <a href="<?=base_url('admin/userAccount/'.$key['id'])?>">View Account</a>
                    </li>
                </ul>
                <? } ?>
                <? } ?>
            </div>
        </div>
        
    </div>
</div>