<?php
if (validation_errors()) {
    include 'includes/toastErrorUserRegister.php';
}
?>

<div class="row">
    <div class="col m7 leftSide hoverable">
        <h1>What is PetEx?</h1>
        <div class="container">
            <p>dolor sit amet, mutat gubergren gloriatur ea mei. Malis scribentur interpretaris vis no, mea nostrum pericula an. Sed in alia definitionem. Ut has minim mollis vivendum, in feugait detraxit instructior quo. In vim augue democritum, ea nam autem timeam.

                Pro id sanctus repudiandae. In dicit denique vim, putent possim tritani qui ne. Novum epicurei platonem eu duo, vix corpora epicuri dissentiet te. Solum sonet explicari in per, periculis iracundia quo at, soluta reformidans mei cu. Vis ex ipsum aperiri, omnium aperiam conclusionemque eu vel, et amet euismod definiebas est.

                His ridens delenit detraxit cu, ea nam simul delenit conclusionemque. Docendi fuisset vis et. Soluta mediocritatem mei in, no paulo doming qualisque duo. Ne civibus expetendis sed, iriure iracundia voluptatum ei est. Eum no persius diceret accusata, quo cu liber deserunt voluptatibus.

                ndamus constituam, officiis convenire sit ne.
            </p>
        </div>
    </div>
    <div class="col m5 rightSide">
        <div class="row">
            <div class="col m12">
                <div class="card hoverable">
                    <div class="card-content">
                        <div class="row">
                            <div class="col m12">
                                <ul class="tabs">
                                    <li class="tab col m6" ><a href="#login" class=" active">Login</a></li>
                                    <li class="tab col m6" ><a href="#signup" class="">Signup</a></li>
                                </ul>
                            </div>
                            <!--LOGIN TAB-->
                            <div id="login" class="col m12">
                                <br>
                                <form method="POST" action="<?= $this->config->base_url() ?>login/login_submit">
                                    <div class="row">
                                        <div class="input-field col s12 green-theme">
                                            <i class="material-icons prefix ">account_circle</i>
                                            <input type="text" class="validate" name = "username">
                                            <label>Username</label>
                                        </div>
                                        <div class="input-field col s12 green-theme">
                                            <i class="material-icons prefix">lock</i>
                                            <input type="password" class="validate" name = "password">
                                            <label>Password</label>
                                        </div><br><br><br><br><br><br><br><br><br>
                                        <center>
                                            <a href="<?php $this->config->base_url() ?>resetPass " class="waves-effect waves-light btn  button orange" style='height: 55px !important; padding-top: 10px !important;'>Reset Password</a>
                                            <button class="btn-large waves-effect waves-light green darken-3"  style='width: 182px !important;' type="submit" name="action">Login
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                            <!--SIGNUP TAB-->
                            <div id="signup" class="col m12">
                                <form method="POST" action="<?= base_url() ?>login/signup_exec">
                                    <div class ="col s12"><br>
                                        <div class="input-field col s12 <?php if (!empty(form_error("username"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input id="username" type="text" class="" name = "username" value="<?= set_value('username') ?>">
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="input-field col s12 green-theme">
                                            <input type="password" class="validate" name = "password">
                                            <label>Password</label>
                                        </div>
                                        <div class="input-field col s12 green-theme">
                                            <input type="password" class="validate" name = "conpass">
                                            <label>Confirm Password</label>
                                        </div>
                                        <div class="input-field col s12 <?php if (!empty(form_error("phonenumber"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input type="number" class="validate" name = "phonenumber" value="<?= set_value('phonenumber') ?>">
                                            <label for="phonenumber">Phone Number </label>
                                        </div>
                                        <div class="input-field col s12 <?php if (!empty(form_error("email"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input type="email" class="validate" name = "email" value="<?= set_value('email') ?>">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="input-field col s6  <?php if (!empty(form_error("lastname"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input type="text" class="validate" name = "lastname" value="<?= set_value('lastname') ?>">                                            
                                            <label>Lastname</label>
                                        </div>
                                        <div class="input-field col s6  <?php if (!empty(form_error("firstname"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input type="text" class="validate" name = "firstname" value="<?= set_value('firstname') ?>">
                                            <label>Firstname</label>
                                        </div>
                                        <div class="col s6 green-theme">
                                            <p>
                                                <input name="gender" type="radio" id="test1" value="Male" class = "with-gap" checked/>
                                                <label style="font-size:20px;" for="test1">Male</label>
                                            </p>
                                        </div>
                                        <div class="col s6 green-theme">
                                            <p>
                                                <input name="gender" type="radio" id="test2" value="Female" class = "with-gap" />
                                                <label style="font-size:20px;" for="test2">Female</label>
                                            </p>
                                        </div>
                                        <div class="input-field col s12 <?php if (!empty(form_error("birthday"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <label>Birthday</label>
                                            <input type="text" class="datepicker" name = "birthday" value="<?= set_value('birthday') ?>">
                                        </div>

                                        <div class="input-field col s12">
                                            <select id = "province" name = "province">
                                                <option value="<?= set_value('province') ?>"><?= set_value('province') ?></option>
                                            </select>
                                            <label>Province</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select id = "city" name = "city"></select>
                                            <label>City</label>
                                        </div>
                                        <div class="input-field col s12 <?php if (!empty(form_error("address"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <textarea id="textarea1" class="materialize-textarea" placeholder = "Street No., Street Name, Brgy." data-length="120" name="address"><?= set_value('address') ?></textarea>
                                            <label for="textarea1">Complete Address</label>
                                        </div>
                                        <div class="col s12">
                                            <?= $widget ?>
                                            <?= $script ?>
                                        </div>
                                        <button style = "margin-top:50px !important;" class="btn-large waves-effect waves-light green darken-3" type="submit" name="action">Submit
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //IT TAKES AN EFFIN' 7 HRS STRAIGHT TO MAKE THIS SCRIPT!
<?php
$provResult = $this->user_model->fetchJoin("refcitymun", "refprovince", "refcitymun.provCode = refprovince.provCode");
$cityResult = $this->user_model->fetch("refcitymun");
$dataString = array();

foreach ($provResult as $prov) {
    $cityResult = $this->user_model->fetch("refcitymun", array("provCode" => $prov->provCode));
    $cityHolder = array();
    foreach ($cityResult as $city) {
        array_push($cityHolder, $city->citymunDesc);
    }
    $dataString[$prov->provDesc] = $cityHolder;
}

$dataString = json_encode($dataString);
?>
    var data = <?= $dataString ?>;

    $.each(data, function (key, value) {
        $('#province').append($('<option />').text(key));
    });

    $('#province').change(function () {
        var key = $(this).val();
        $('#city').empty();
        $('#city').append('<option disabled selected = "" value = "0">Choose a City</option>');
        for (var i in data[key]) {
            $('#city').append('<option>' + data[key][i] + '</option>');
            i++;
        }
        $('select').material_select();

    }).trigger('change');

</script>
