<div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">Add New Music &nbsp;</h4>
                </div>
            </div>

           <!--  <form action="upload.php" method="POST" enctype="multipart/form-data">
                <label for="musicFile">Choose a music file (MP3 only):</label>
                <input type="file" name="musicFile" id="musicFile" accept=".mp3" required>
            </form> -->

            <div class="add-div">
                <form action="<?= base_url('newmusics/upload')?>" method="POST" enctype="multipart/form-data">
                <label for="fname"><font color='white'>Song Title </font></label>
                <input type="text" name="name" class="add-input" placeholder="Title.." required>

                <label for="lname"><font color='white'>Artists</font></label>
                <input type="text" id="lname" name="singer" class="add-input" placeholder="Artists..">

                <label for="country"><font color='white'>Category</font></label>
                <select id="category" name="category" class="add-input" required>
                  <option value="">Choose category</option>
                  <option value="1">Sad</option>
                  <option value="2">Happy</option>
                </select>

                <input type="file" id="musicFile" name="musicFile" class="add-input" accept=".mp3" required>

              
                <div class="ms_view_more text-center">
                    <!-- <button class="ms_btn" type="submit">Add</a> -->
                    <button class="button button1" style="background-color: #555555;"><font color='white'>Add Music</font></button>
                </div>

              </form>
            </div>
                        
        </div>
        
        
    </div>
</div>
