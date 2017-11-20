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
    /*GREEN THEME FORMS*/
    .green-theme input[type=text]:focus + label,
    .green-theme input[type=email]:focus + label,
    .green-theme input[type=number]:focus + label,
    .green-theme input[type=password]:focus + label,
    .green-theme textarea:focus + label{
        color: #388e3c !important;
    }
    .green-theme input[type=text]:focus,
    .green-theme input[type=number]:focus,
    .green-theme input[type=email]:focus,
    .green-theme input[type=password]:focus,
    .green-theme input[type=password]:focus,
    .green-theme textarea:focus{
        border-bottom: 1px solid #388e3c !important;
        box-shadow: 0 1px 0 0 #388e3c !important;
    }
    .input-field .prefix.active{
        color:#388e3c !important;
    }
    .green-theme input[type="radio"].with-gap:checked+label:before,
    .green-theme input[type="radio"].with-gap:checked+label:after {
        border: 2px solid #388e3c !important;
    }
    .green-theme input[type="radio"].with-gap:checked+label:after {
        background-color: #388e3c !important;
    }

    /*ERROR FORM THEME*/
    .error-theme input[type=text]:focus + label,
    .error-theme input[type=text]+ label,
    .error-theme input[type=number]+ label,
    .error-theme input[type=email]+ label,
    .error-theme textarea:focus + label,
    .error-theme textarea + label{
        color: #ef5350  !important;
    }
    .error-theme input[type=text]:focus,
    .error-theme input[type=text],
    .error-theme input[type=number],
    .error-theme input[type=email],
    .error-theme textarea:focus,
    .error-theme textarea{
        border-bottom: 1px solid #ef5350  !important;
        box-shadow: 0 1px 0 0 #ef5350  !important;
    }
    .error-theme input[type="radio"].with-gap:checked+label:before,
    .error-theme input[type="radio"].with-gap:checked+label:after {
        border: 2px solid #ef5350  !important;
    }
    .error-theme input[type="radio"].with-gap:checked+label:after {
        background-color: #ef5350  !important;
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
                <form action = "<?= base_url() ?>user/settingsUpdate/change_name" method = "post">
                    <div class = "row">
                        <div class = "col s2" style="margin-top:25px !important;">Name</div>
                        <div class = "col s7 row">
                            <div class="input-field col s6  <?php if (!empty(form_error("user_firstname"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_firstname" type="text" class="validate" name = "user_firstname" value="<?= set_value('user_firstname', $currentUser->user_firstname) ?>" >
                                <label for="user_firstname">First Name</label>
                            </div>
                            <div class="input-field col s6 <?php if (!empty(form_error("user_lastname"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_lastname" type="text" class="validate" name = "user_lastname" value="<?= set_value('user_lastname', $currentUser->user_lastname) ?>" >
                                <label for="user_lastname">Last Name</label>
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>user/settingsUpdate/change_username" method = "post">
                    <div class = "row">
                        <div class = "col s2" style="margin-top:25px !important;">Username</div>
                        <div class = "col s7 row">
                            <div class="input-field col s12 <?php if (!empty(form_error("user_username"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_username" type="text" class="" name = "user_username" value="<?= set_value('user_username', $currentUser->user_username) ?>" >
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>user/settingsUpdate/change_password" method = "post">
                    <div class = "row">
                        <div class = "col s2" style="margin-top:25px !important;">Password</div>
                        <div class = "col s7 row">
                            <div class="input-field col s6 <?php if (!empty(form_error("user_password"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_password" type="password"  name = "user_password"  value="" >
                                <label>Enter New Password</label>
                            </div>
                            <div class="input-field col s6 <?php if (!empty(form_error("user_conpassword"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_conpassword" type="password"  name = "user_conpassword"  value="" >
                                <label>Confirm Password</label>
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>user/settingsUpdate/change_email" method = "post">
                    <div class = "row">
                        <div class = "col s2" style="margin-top:25px !important;">Email</div>
                        <div class = "col s7 row">
                            <div class="input-field col s12 <?php if (!empty(form_error("user_email"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_email" type="text" class="" name = "user_email" value="<?= set_value('user_email', $currentUser->user_email) ?>" >
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>user/settingsUpdate/change_contactno" method = "post">
                    <div class = "row">
                        <div class = "col s2" style="margin-top:25px !important;">Contact No.</div>
                        <div class = "col s7 row">
                            <div class="input-field col s12 <?php if (!empty(form_error("user_contact_no"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_contact_no" type="text" class="" name = "user_contact_no" value="<?= set_value('user_contact_no', $currentUser->user_contact_no) ?>" >
                            </div>
                        </div>
                        <div class = "col s3"><button type = "submit" class = "btn waves-effect waves-light green darken-4">Change</button></div>
                    </div>
                </form>
                <form action = "<?= base_url() ?>user/settingsUpdate/change_address" method = "post">
                    <div class = "row">
                        <div class = "col s2" style="margin-top:25px !important;">Address</div>
                        <div class = "col s7 row">
                            <div class="input-field col s12 <?php if (!empty(form_error("user_address"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_address" type="text" class="" name = "user_address" value="<?= set_value('user_address', $currentUser->user_address) ?>" >
                                <label for = "user_address">Complete Address</label>
                            </div>
                            <div class="input-field col s6 <?php if (!empty(form_error("user_city"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_city" type="text" class="" name = "user_city" value="<?= set_value('user_city', $currentUser->user_city) ?>" >
                                <label for = "user_city">City</label>
                            </div>
                            <div class="input-field col s6 <?php if (!empty(form_error("user_province"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                <input id="user_province" type="text" class="" name = "user_province" value="<?= set_value('user_province', $currentUser->user_province) ?>" >
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
            <form action="<?= base_url() ?>user/settingsUpdate/user_picture/" method = "post" enctype="multipart/form-data">
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