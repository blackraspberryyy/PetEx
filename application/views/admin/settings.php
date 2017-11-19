<?php
if (validation_errors()) {
    include 'includes/toastErrorsSettings.php';
}
?>
<style>
    .row{
        margin-bottom: 0px !important;
    }
    #settingTbl:first-child th{
        width:100px;
    }
    .image-circle-cropper {
        width: 200px;
        height: 200px;
        position: relative;
        overflow: hidden;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        border-radius: 50%;
        border:2px solid white;
    }
    .profileImgStyle{
        display: inline;
        margin: 0 auto;
        height: 100%;
        width: auto;
    }
    .btn-link{
        border:none;
        outline:none;
        background:none;
        cursor:pointer;
        padding:0px 28px;
        font-family:inherit;
        font-size:inherit;
    }
</style>
<div class ="side-nav-offset">
    <div class ="container">
        <div class = "card row" style = "margin-bottom:20px !important;">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= $wholeUrl ?>" class="breadcrumb">Settings</a>
                </div>
            </nav>
            <div class="card-content ">
                <div class ="row" style = "margin-bottom:20px !important;">
                    <div class = "col s12 center">
                        <center>
                            <div class ="image-circle-cropper z-depth-2">
                                <img src="<?= $this->config->base_url() . $currentUser->user_picture ?>" class = "profileImgStyle">
                            </div>
                        </center>
                        <br>
                        <a href = "#editPicture" class = "btn waves-effect waves-light green darken-4 modal-trigger">Change</a>
                    </div>
                </div>
                <form action = "<?= base_url() ?>admin/settingsUpdate/change_name" method = "post">
                    <div class = "row">
                        <div class = "col s2">Name</div>
                        <div class = "col s7 row">
                            <div class="green-theme input-field col s6">
                                <input id="user_firstname" type="text" class="" name = "user_firstname" value="<?= $currentUser->user_firstname ?>" >
                                <label for="user_firstname">First Name</label>
                            </div>
                            <div class="green-theme input-field col s6">
                                <input id="user_lastname" type="text" class="" name = "user_lastname" value="<?= $currentUser->user_lastname ?>" >
                                <label for="user_lastname">Last Name</label>
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>admin/settingsUpdate/change_username" method = "post">
                    <div class = "row">
                        <div class = "col s2">Username</div>
                        <div class = "col s7 row">
                            <div class="green-theme input-field col s12">
                                <input id="user_username" type="text" class="" name = "user_username" value="<?= $currentUser->user_username ?>" >
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>admin/settingsUpdate/change_password" method = "post">
                    <div class = "row">
                        <div class = "col s2">Password</div>
                        <div class = "col s7 row">
                            <div class="green-theme input-field col s12">
                                <input id="user_password" type="password" class="" name = "user_password"  value="" >
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>admin/settingsUpdate/change_email" method = "post">
                    <div class = "row">
                        <div class = "col s2">Email</div>
                        <div class = "col s7 row">
                            <div class="green-theme input-field col s12">
                                <input id="user_email" type="text" class="" name = "user_email" value="<?= $currentUser->user_email ?>" >
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>admin/settingsUpdate/change_contactno" method = "post">
                    <div class = "row">
                        <div class = "col s2">Contact No.</div>
                        <div class = "col s7 row">
                            <div class="green-theme input-field col s12">
                                <input id="user_contact_no" type="text" class="" name = "user_contact_no" value="<?= $currentUser->user_contact_no ?>" >
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>admin/settingsUpdate/change_address" method = "post">
                    <div class = "row">
                        <div class = "col s2">Address</div>
                        <div class = "col s7 row">
                            <div class="green-theme input-field col s12">
                                <input id="user_address" type="text" class="" name = "user_address" value="<?= $currentUser->user_address ?>" >
                                <label for = "user_address">Complete Address</label>
                            </div>
                            <div class="green-theme input-field col s6">
                                <input id="user_city" type="text" class="" name = "user_city" value="<?= $currentUser->user_city ?>" >
                                <label for = "user_city">City</label>
                            </div>
                            <div class="green-theme input-field col s6">
                                <input id="user_province" type="text" class="" name = "user_province" value="<?= $currentUser->user_province ?>" >
                                <label for = "user_province">Province</label>
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Structure -->
        <div id="editPicture" class="modal modal-fixed-footer">
            <form action="<?= base_url() ?>admin/settingsUpdate/user_picture/" method = "post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Upload your picture</h4>
                    <div class = "row">
                        <center>
                            <div class = "image-circle-cropper center z-depth-2">
                                <img id = "prev_image" src ="<?= base_url() . $currentUser->user_picture ?>" class="profileImgStyle"/>
                            </div>
                        </center>
                        <br>
                        <div class="file-field input-field" style = "padding-right:50px; padding-left:50px;">
                            <div class="btn green darken-4">
                                <span>Upload a picture</span>
                                <input type="file" id = "files" name = "user_picture">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="No File Chosen">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Reset</a>
                    <button class="modal-action modal-close waves-effect waves-green btn-flat green-text btn-link">CHANGE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#files").change(function () {
        readURL(this);
        $("#nofilechosen").text("");
    });
</script>