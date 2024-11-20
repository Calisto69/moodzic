<div class="ms_index_wrapper common_pages_space">
    <div class="ms_index_inner">
        <div class="ms_index_secwrap">
            <div class="ms_songslist_main">
                <div class="ms_songslist_wrap">
                    <ul class="ms_songslist_nav nav nav-pills" role="tablist">
                        <li>
                          <a class="active" data-bs-toggle="pill" href="#top-picks" role="tab" aria-controls="top-picks" aria-selected="true">Happy Playlist</a>
                        </li>
                        <li>
                          <a class="" data-bs-toggle="pill" href="#trending-songs" role="tab" aria-controls="trending-songs" aria-selected="false">Sad Playlist</a>
                        </li>
                        <li>
                          <a class="" data-bs-toggle="pill" href="#new-release" role="tab" aria-controls="new-release" aria-selected="false">My Playlist</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="top-picks" role="tabpanel" aria-labelledby="top-picks">
                            <div class="ms_songslist_box">
                                <ul class="ms_songlist ms_index_songlist">
                                    <? $countHappy = 1; ?>
                                    <? if($happys){ ?>
                                    <? foreach ($happys as $happy) {?>
                                    <?
                                    $source_music_happy = base_url() . $happy['path'] . "/" . $happy['filename'];
                                    ?>
                                    <li>

                                        <div class="ms_songslist_inner">
                                            <div class="ms_songslist_left">
                                                <a href="javascript:;" class="dwld_sn btn-play-the-music-happy" data-init="audiomod-happy-<?=$happy['id']?>" data-musicid="<?=$happy['id']?>">
                                                <div class="songslist_number">
                                                    <h4 class="songslist_sn"><?= $countHappy++ ?></h4>
                                                    <audio id="audiomod-happy-<?=$happy['id']?>" src="<?=$source_music_happy?>" preload="auto"></audio>

                                                    <span class="songslist_play" style="display:block;" id="musicIcon-happy-<?=$happy['id']?>">
                                                        <img src="<?= base_url();?>assetsmoods/images/svg/play_songlist.svg" alt="Play" class="img-fluid"/>
                                                    </span>

                                                    <span class="songslist_pause" style="display:none;" id="musicIcon-happy-<?=$happy['id']?>">
                                                        <img src="<?= base_url();?>assetsmoods/images/svg/play_songlist.svg" alt="Play" class="img-fluid"/>
                                                    </span>

                                                    <!-- pause_all -->

                                                    <!-- <span class="play_hover"><i id="musicIcon-<?=$happy['id']?>" class="fas fa-play"></i></span> -->
                                                    
                                                </div> 
                                            </a>
                                                <div class="songslist_details">
                                                    <div class="songslist_thumb">
                                                        <img src="<?= base_url();?>assetsmoods/images/playlist-new.png" alt="thumb" class="img-fluid default-happy" id="bar-default-happy-<?=$happy['id']?>"/>
                                                        <img src="<?= base_url();?>assetsmoods/images/loader.gif" alt="bar" class="img-fluid fix-bar-class-happy" style="display:none;" width="30px;" id="bar-play-happy-<?=$happy['id']?>">
                                                    </div>
                                                    <div class="songslist_name">
                                                        
                                                        <h3 class="song_name"><a href="javascript:void(0);"><?= $happy['name']?></a></h3>
                                                        <p class="song_artist"><?= $happy['singer']?></p>
                                                    </div> 
                                                </div> 

                                            </div>
                                            <div class="ms_songslist_right">
                                                <a href="javascript:void(0);" onclick="addToFav('<?=$happy['id']?>');">
                                                <span class="ms_songslist_like" >
                                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="16px"><path fill-rule="evenodd" fill="rgb(124, 142, 165)" d="M11.777,-0.000 C10.940,-0.000 10.139,0.197 9.395,0.585 C9.080,0.749 8.783,0.947 8.506,1.173 C8.230,0.947 7.931,0.749 7.618,0.585 C6.874,0.197 6.073,-0.000 5.236,-0.000 C2.354,-0.000 0.009,2.394 0.009,5.337 C0.009,7.335 1.010,9.428 2.986,11.557 C4.579,13.272 6.527,14.702 7.881,15.599 L8.506,16.012 L9.132,15.599 C10.487,14.701 12.436,13.270 14.027,11.557 C16.002,9.428 17.004,7.335 17.004,5.337 C17.004,2.394 14.659,-0.000 11.777,-0.000 ZM5.236,2.296 C6.168,2.296 7.027,2.738 7.590,3.507 L8.506,4.754 L9.423,3.505 C9.986,2.737 10.844,2.296 11.777,2.296 C13.403,2.296 14.727,3.660 14.727,5.337 C14.727,6.734 13.932,8.298 12.364,9.986 C11.114,11.332 9.604,12.490 8.506,13.255 C7.409,12.490 5.899,11.332 4.649,9.986 C3.081,8.298 2.286,6.734 2.286,5.337 C2.286,3.660 3.610,2.296 5.236,2.296 Z"/></svg>
                                                </span>
                                                </a>
                                                <span class="ms_songslist_time"><?=musicDuration($happy['duration']);?></span>
                                                <div class="ms_songslist_more">
                                                    <span class="songslist_moreicon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="4px" height="20px"><path fill-rule="evenodd" fill="rgb(124, 142, 165)" d="M2.000,12.000 C0.895,12.000 -0.000,11.105 -0.000,10.000 C-0.000,8.895 0.895,8.000 2.000,8.000 C3.104,8.000 4.000,8.895 4.000,10.000 C4.000,11.105 3.104,12.000 2.000,12.000 ZM2.000,4.000 C0.895,4.000 -0.000,3.105 -0.000,2.000 C-0.000,0.895 0.895,-0.000 2.000,-0.000 C3.104,-0.000 4.000,0.895 4.000,2.000 C4.000,3.105 3.104,4.000 2.000,4.000 ZM2.000,16.000 C3.104,16.000 4.000,16.895 4.000,18.000 C4.000,19.105 3.104,20.000 2.000,20.000 C0.895,20.000 -0.000,19.105 -0.000,18.000 C-0.000,16.895 0.895,16.000 2.000,16.000 Z"/></svg></span>
                                                    <ul class="ms_common_dropdown ms_songslist_dropdown">
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToFav('<?=$happy['id']?>');">
                                                                <span class="common_drop_icon drop_fav"></span>Favourites
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToCategory('<?=$happy['id']?>','1');">
                                                                <span class="common_drop_icon drop_playlist"></span>Add To Sad Playlist
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToCategory('<?=$happy['id']?>','3');">
                                                                <span class="common_drop_icon drop_playlist"></span>Add to Playlist
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <? } ?>
                                    <? } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="trending-songs" role="tabpanel" aria-labelledby="trending-songs">
                            <div class="ms_songslist_box">
                                <ul class="ms_songlist ms_index_songlist">
                                    <?
                                    $countSad = 1;
                                    if($sads){
                                    foreach ($sads as $sad) {
                                    ?>
                                    <?
                                    $source_music_sad = base_url() . $sad['path'] . "/" . $sad['filename'];
                                    ?>
                                    <li>

                                        <div class="ms_songslist_inner">
                                            <div class="ms_songslist_left">
                                                <a href="javascript:;" class="dwld_sn btn-play-the-music-sad" data-init="audiomod-sad-<?=$sad['id']?>" data-musicidsad="<?=$sad['id']?>">
                                                <div class="songslist_number">
                                                    <h4 class="songslist_sn"><?= $countSad++ ?></h4>
                                                    <audio id="audiomod-sad-<?=$sad['id']?>" src="<?=$source_music_sad?>" preload="auto"></audio>

                                                    <span class="songslist_play" style="display:block;" id="musicIcon-sad-<?=$sad['id']?>">
                                                        <img src="<?= base_url();?>assetsmoods/images/svg/play_songlist.svg" alt="Play" class="img-fluid"/>
                                                    </span>

                                                    <span class="songslist_pause" style="display:none;" id="musicIcon-sad-<?=$sad['id']?>">
                                                        <img src="<?= base_url();?>assetsmoods/images/svg/play_songlist.svg" alt="Play" class="img-fluid"/>
                                                    </span>

                                                    <!-- pause_all -->

                                                    <!-- <span class="play_hover"><i id="musicIcon-<?=$sad['id']?>" class="fas fa-play"></i></span> -->
                                                    
                                                </div> 
                                            </a>
                                                <div class="songslist_details">
                                                    <div class="songslist_thumb">
                                                        <img src="<?= base_url();?>assetsmoods/images/playlist-new.png" alt="thumb" class="img-fluid default-sad" id="bar-default-sad-<?=$sad['id']?>"/>
                                                        <img src="<?= base_url();?>assetsmoods/images/loader.gif" alt="bar" class="img-fluid fix-bar-class-sad" style="display:none;" width="30px;" id="bar-play-sad-<?=$sad['id']?>">
                                                    </div>
                                                    <div class="songslist_name">
                                                        
                                                        <h3 class="song_name"><a href="javascript:void(0);"><?= $sad['name']?></a></h3>
                                                        <p class="song_artist"><?= $sad['singer']?></p>
                                                    </div> 
                                                </div> 

                                            </div>
                                            <div class="ms_songslist_right">
                                                <a href="javascript:void(0);" onclick="addToFav('<?=$sad['id']?>');">
                                                <span class="ms_songslist_like" >
                                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="16px"><path fill-rule="evenodd" fill="rgb(124, 142, 165)" d="M11.777,-0.000 C10.940,-0.000 10.139,0.197 9.395,0.585 C9.080,0.749 8.783,0.947 8.506,1.173 C8.230,0.947 7.931,0.749 7.618,0.585 C6.874,0.197 6.073,-0.000 5.236,-0.000 C2.354,-0.000 0.009,2.394 0.009,5.337 C0.009,7.335 1.010,9.428 2.986,11.557 C4.579,13.272 6.527,14.702 7.881,15.599 L8.506,16.012 L9.132,15.599 C10.487,14.701 12.436,13.270 14.027,11.557 C16.002,9.428 17.004,7.335 17.004,5.337 C17.004,2.394 14.659,-0.000 11.777,-0.000 ZM5.236,2.296 C6.168,2.296 7.027,2.738 7.590,3.507 L8.506,4.754 L9.423,3.505 C9.986,2.737 10.844,2.296 11.777,2.296 C13.403,2.296 14.727,3.660 14.727,5.337 C14.727,6.734 13.932,8.298 12.364,9.986 C11.114,11.332 9.604,12.490 8.506,13.255 C7.409,12.490 5.899,11.332 4.649,9.986 C3.081,8.298 2.286,6.734 2.286,5.337 C2.286,3.660 3.610,2.296 5.236,2.296 Z"/></svg>
                                                </span>
                                                </a>
                                                <span class="ms_songslist_time"><?=musicDuration($sad['duration']);?></span>
                                                <div class="ms_songslist_more">
                                                    <span class="songslist_moreicon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="4px" height="20px"><path fill-rule="evenodd" fill="rgb(124, 142, 165)" d="M2.000,12.000 C0.895,12.000 -0.000,11.105 -0.000,10.000 C-0.000,8.895 0.895,8.000 2.000,8.000 C3.104,8.000 4.000,8.895 4.000,10.000 C4.000,11.105 3.104,12.000 2.000,12.000 ZM2.000,4.000 C0.895,4.000 -0.000,3.105 -0.000,2.000 C-0.000,0.895 0.895,-0.000 2.000,-0.000 C3.104,-0.000 4.000,0.895 4.000,2.000 C4.000,3.105 3.104,4.000 2.000,4.000 ZM2.000,16.000 C3.104,16.000 4.000,16.895 4.000,18.000 C4.000,19.105 3.104,20.000 2.000,20.000 C0.895,20.000 -0.000,19.105 -0.000,18.000 C-0.000,16.895 0.895,16.000 2.000,16.000 Z"/></svg></span>
                                                    <ul class="ms_common_dropdown ms_songslist_dropdown">
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToFav('<?=$sad['id']?>');">
                                                                <span class="common_drop_icon drop_fav"></span>Favourites
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToCategory('<?=$sad['id']?>','2');">
                                                                <span class="common_drop_icon drop_playlist"></span>Add To Happy Playlist
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToCategory('<?=$sad['id']?>','3');">
                                                                <span class="common_drop_icon drop_playlist"></span>Add to Playlist
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <? } ?>
                                    <? } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="new-release" role="tabpanel" aria-labelledby="new-release">
                            <div class="ms_songslist_box">
                                <ul class="ms_songlist ms_index_songlist">
                                    <?
                                    $countPlaylist = 1;
                                    if($playlists){
                                    foreach($playlists as $playlist){
                                    ?>
                                    <?
                                    $source_music_myp = base_url() . $playlist['path'] . "/" . $playlist['filename'];
                                    ?>
                                    <li>

                                        <div class="ms_songslist_inner">
                                            <div class="ms_songslist_left">
                                                <a href="javascript:;" class="dwld_sn btn-play-the-music-myp" data-init="audiomod-myp-<?=$playlist['id']?>" data-musicidmyp="<?=$playlist['id']?>">
                                                <div class="songslist_number">
                                                    <h4 class="songslist_sn"><?= $countPlaylist++ ?></h4>
                                                    <audio id="audiomod-myp-<?=$playlist['id']?>" src="<?=$source_music_myp?>" preload="auto"></audio>

                                                    <span class="songslist_play" style="display:block;" id="musicIcon-myp-<?=$playlist['id']?>">
                                                        <img src="<?= base_url();?>assetsmoods/images/svg/play_songlist.svg" alt="Play" class="img-fluid"/>
                                                    </span>

                                                    <span class="songslist_pause" style="display:none;" id="musicIcon-myp-<?=$playlist['id']?>">
                                                        <img src="<?= base_url();?>assetsmoods/images/svg/play_songlist.svg" alt="Play" class="img-fluid"/>
                                                    </span>

                                                    <!-- pause_all -->

                                                    <!-- <span class="play_hover"><i id="musicIcon-<?=$playlist['id']?>" class="fas fa-play"></i></span> -->
                                                    
                                                </div> 
                                            </a>
                                                <div class="songslist_details">
                                                    <div class="songslist_thumb">
                                                        <img src="<?= base_url();?>assetsmoods/images/playlist-new.png" alt="thumb" class="img-fluid default-myp" id="bar-default-myp-<?=$playlist['id']?>"/>
                                                        <img src="<?= base_url();?>assetsmoods/images/loader.gif" alt="bar" class="img-fluid fix-bar-class-myp" style="display:none;" width="30px;" id="bar-play-myp-<?=$playlist['id']?>">
                                                    </div>
                                                    <div class="songslist_name">
                                                        
                                                        <h3 class="song_name"><a href="javascript:void(0);"><?= $playlist['name']?></a></h3>
                                                        <p class="song_artist"><?= $playlist['singer']?></p>
                                                    </div> 
                                                </div> 

                                            </div>
                                            <div class="ms_songslist_right">
                                                <a href="javascript:void(0);" onclick="addToFav('<?=$playlist['id']?>');">
                                                <span class="ms_songslist_like" >
                                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="16px"><path fill-rule="evenodd" fill="rgb(124, 142, 165)" d="M11.777,-0.000 C10.940,-0.000 10.139,0.197 9.395,0.585 C9.080,0.749 8.783,0.947 8.506,1.173 C8.230,0.947 7.931,0.749 7.618,0.585 C6.874,0.197 6.073,-0.000 5.236,-0.000 C2.354,-0.000 0.009,2.394 0.009,5.337 C0.009,7.335 1.010,9.428 2.986,11.557 C4.579,13.272 6.527,14.702 7.881,15.599 L8.506,16.012 L9.132,15.599 C10.487,14.701 12.436,13.270 14.027,11.557 C16.002,9.428 17.004,7.335 17.004,5.337 C17.004,2.394 14.659,-0.000 11.777,-0.000 ZM5.236,2.296 C6.168,2.296 7.027,2.738 7.590,3.507 L8.506,4.754 L9.423,3.505 C9.986,2.737 10.844,2.296 11.777,2.296 C13.403,2.296 14.727,3.660 14.727,5.337 C14.727,6.734 13.932,8.298 12.364,9.986 C11.114,11.332 9.604,12.490 8.506,13.255 C7.409,12.490 5.899,11.332 4.649,9.986 C3.081,8.298 2.286,6.734 2.286,5.337 C2.286,3.660 3.610,2.296 5.236,2.296 Z"/></svg>
                                                </span>
                                                </a>
                                                <span class="ms_songslist_time"><?=musicDuration($playlist['duration']);?></span>
                                                <div class="ms_songslist_more">
                                                    <span class="songslist_moreicon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="4px" height="20px"><path fill-rule="evenodd" fill="rgb(124, 142, 165)" d="M2.000,12.000 C0.895,12.000 -0.000,11.105 -0.000,10.000 C-0.000,8.895 0.895,8.000 2.000,8.000 C3.104,8.000 4.000,8.895 4.000,10.000 C4.000,11.105 3.104,12.000 2.000,12.000 ZM2.000,4.000 C0.895,4.000 -0.000,3.105 -0.000,2.000 C-0.000,0.895 0.895,-0.000 2.000,-0.000 C3.104,-0.000 4.000,0.895 4.000,2.000 C4.000,3.105 3.104,4.000 2.000,4.000 ZM2.000,16.000 C3.104,16.000 4.000,16.895 4.000,18.000 C4.000,19.105 3.104,20.000 2.000,20.000 C0.895,20.000 -0.000,19.105 -0.000,18.000 C-0.000,16.895 0.895,16.000 2.000,16.000 Z"/></svg></span>
                                                    <ul class="ms_common_dropdown ms_songslist_dropdown">
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToFav('<?=$playlist['id']?>');">
                                                                <span class="common_drop_icon drop_fav"></span>Favourites
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToCategory('<?=$playlist['id']?>','2');">
                                                                <span class="common_drop_icon drop_playlist"></span>Add To Happy Playlist
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="addToCategory('<?=$playlist['id']?>','1');">
                                                                <span class="common_drop_icon drop_playlist"></span>Add to Sad
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <? } ?>
                                    <? } ?>
                                </ul>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        
    </div>
</div>