<?php
if (validation_errors()) {
    include 'includes/toastErrorUserRegister.php';
}
?>
<div class = "side-nav-offset">
    <div class ="container">
        <div class ="card row">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= base_url()?>admin/userDatabase" class="breadcrumb">User Database</a>
                    <a href="<?= $wholeUrl ?>" class="breadcrumb">Add Admin User</a>
                </div>
            </nav>
            <div id="signup" class="col m12">
                <form method="POST" action="<?= base_url() ?>admin/signup_exec">
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
                        <center>
                            <button class="btn-large waves-effect waves-light green darken-3" type="submit" name="action" style = "margin-top:30px;margin-bottom:30px;">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //IT TAKES AN EFFIN' 7 HRS STRAIGHT TO MAKE THIS SCRIPT!
<?php
$provResult = $this->admin_model->fetchJoin("refcitymun", "refprovince", "refcitymun.provCode = refprovince.provCode");
$cityResult = $this->admin_model->fetch("refcitymun");
$dataString = array();

foreach ($provResult as $prov) {
    $cityResult = $this->admin_model->fetch("refcitymun", array("provCode" => $prov->provCode));
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