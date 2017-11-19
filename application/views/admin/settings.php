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
</style>
<div class ="side-nav-offset">
    <div class ="container">
        <div class = "card row" style = "margin-bottom:20px !important;">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= $wholeUrl?>" class="breadcrumb">Settings</a>
                </div>
            </nav>
            <div class="card-content ">
                <div class ="row" style = "margin-bottom:20px !important;">
                    <div class = "col s12 center">
                        <center>
                            <div class ="image-circle-cropper z-depth-2">
                                <img src="<?= $this->config->base_url()?>images/profile/jc.png" class = "profileImgStyle">
                            </div>
                        </center>
                        <br>
                        <a href = "#editPicture" class = "btn waves-effect waves-light green darken-4">Change</a>
                    </div>
                </div>
                <table class = "bordered" id = "settingTbl">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>
                                <div class = "row">
                                    <div class="input-field col s5">
                                        <input id="user_firstname" type="text" class="" name = "user_firstname" value="Juan Carlo" >
                                        <label for="user_firstname">First Name</label>
                                    </div>
                                    <div class="input-field col s5">
                                        <input id="user_lastname" type="text" class="" name = "user_lastname" value="Valencia" >
                                        <label for="user_lastname">Last Name</label>
                                    </div>
                                </div>
                            </td>
                            <td style = "text-align:right;"><a href = "#editName" class = "btn waves-effect waves-light green darken-4">Change</a></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>
                                <div class = "row">
                                    <div class="input-field col s10">
                                        <input id="user_username" type="text" class="" name = "user_username" value="username_jc" >
                                    </div>
                                </div>
                            </td>
                            <td style = "text-align:right;"><a href = "#editUsername" class = "btn waves-effect waves-light green darken-4">Change</a></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>
                                <div class = "row">
                                    <div class="input-field col s10">
                                        <input id="user_password" type="password" class="" name = "user_password"  value="password_jc" >
                                    </div>
                                </div>
                            </td>
                            <td style = "text-align:right;"><a href = "#editPassword" class = "btn waves-effect waves-light green darken-4">Change</a></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <div class = "row">
                                    <div class="input-field col s10">
                                        <input id="user_email" type="email" class="" name = "user_email" value="carlo.valencia066@gmail.com" >
                                    </div>
                                </div>
                            </td>
                            <td style = "text-align:right;"><a href = "#editEmail" class = "btn waves-effect waves-light green darken-4">Change</a></td>
                        </tr>
                        <tr>
                            <th>Contact No.</th>
                            <td>
                                <div class = "row">
                                    <div class="input-field col s10">
                                        <input id="user_contact_no" type="text" class="" name = "user_contact_no" value="09066991021" >
                                    </div>
                                </div>
                            </td>
                            <td style = "text-align:right;"><a href = "#editContactNo" class = "btn waves-effect waves-light green darken-4">Change</a></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                                <div class = "row">
                                    <div class="input-field col s10">
                                        <input id="user_address" type="text" class="" name = "user_address" value="#61 San Francisco St." >
                                        <label for = "user_address">Complete Address</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="user_brgy" type="text" class="" name = "user_brgy" value="Karuhatan" >
                                        <label for = "user_brgy">Brgy</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="user_city" type="text" class="" name = "user_city" value="Valenzuela" >
                                        <label for = "user_city">City</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="user_province" type="text" class="" name = "user_province" value="Metro Manila" >
                                        <label for = "user_province">Province</label>
                                    </div>
                                </div>
                            </td>
                            <td style = "text-align:right;"><a href = "#editAddress" class = "btn waves-effect waves-light green darken-4">Change</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>