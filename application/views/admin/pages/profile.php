<div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">My Profile &nbsp;</h4>
                </div>
            </div>

           <!--  <form action="upload.php" method="POST" enctype="multipart/form-data">
                <label for="musicFile">Choose a music file (MP3 only):</label>
                <input type="file" name="musicFile" id="musicFile" accept=".mp3" required>
            </form> -->

            <div class="add-div">
                <form id="update-form-data">
                <label for="fname"><font color='white'>Name </font></label>
                <input type="text" name="fullname" class="add-input" placeholder="Name.." value="<?=$profile['fullname']?>" required>

                <label for="lname"><font color='white'>Username</font></label>
                <input type="text" id="username" name="username" class="add-input" value="<?=$profile['username']?>"placeholder="Username..">

                <label for="lname"><font color='white'>Email</font></label>
                <input type="email" id="email" name="email" class="add-input" value="<?=$profile['email']?>" placeholder="Email..">
              
                <div class="ms_view_more text-center">
                    <!-- <button class="ms_btn" type="submit">Add</a> -->
                    <a class="button button1" style="background-color: #555555;" onclick="updateProfile();">Save Profile</a>
                </div>

              </form>
            </div>
                        
        </div>
    </div>
</div>


<script type="text/javascript">
    function updateProfile() {
        var formUpdate = $("#update-form-data").serialize();
        $.ajax({
            url: base_url + 'admin/update',
            type: 'POST',
            data: formUpdate,
            dataType:"json",
            success: function(data) {
                if (data.status == true) {
                    iziToast.success({
                        title: data.msg,
                        position: 'topCenter',
                        timeout: 1000,
                        close: false,
                    });
                } else {
                    alert (data.msg);
                }
            },
            error: function() {
                alert ('error');
            }
        });
    }
</script>
