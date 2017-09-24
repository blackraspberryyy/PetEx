
<div class="w3-container">
    <form class="w3-container" action="<?= base_url() ?>login/registerSubmit" method="POST">

        <div class="w3-row">
            <div class="w3-quarter w3-container">
            </div>
            <div class="w3-half w3-container">
                <div class="w3-panel w3-card-4">
                    <div class="w3-teal w3-container" style="margin: -16px">
                        <br>
                        <h1><i class="fa fa-user-plus"></i>&nbsp;Register</h1>
                        <br>
                    </div>
                    <br><br>
                    <label class="w3-text-teal"><b>First Name</b></label>
                    <input class="w3-input w3-border w3-animate-input w3-light-grey" type="text" name="firstname" style="width:50%" required>
                    <br>
                    <label class="w3-text-teal"><b>Last Name</b></label>
                    <input class="w3-input w3-border w3-animate-input w3-light-grey" type="text" name="lastname" style="width:50%" required>
                    <br>
                    <label class="w3-text-teal"><b>Username</b></label>
                    <input class="w3-input w3-border w3-animate-input w3-light-grey" type="text" name="username" style="width:50%" required>
                    <br>
                    <label class="w3-text-teal"><b>Password</b></label>
                    <input class="w3-input w3-border w3-animate-input w3-light-grey" type="password" name="password" style="width:50%" required>
                    <br>
                    <label class="w3-text-teal"><b>Confirm Password</b></label>
                    <input class="w3-input w3-border w3-animate-input w3-light-grey" type="password" name="conpassword" style="width:50%" required>
                    <br>
                    <label class="w3-text-teal"><b>Account Access</b></label>
                    <select class="w3-select" name="account" required>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">ADMINISTRATOR</option>
                        <option value="2">USER</option>
                    </select>
                    <br><br>
                    <center>
                        <button class="w3-button w3-round-xlarge w3-indigo w3-mobile" style="width:150px;"><i class="fa fa-plus"></i> Signup</button>
                    </center>
                    </form>

                    <br>
                </div>
            </div>
            <div class="w3-quarter w3-container">

            </div>
        </div>

</div>

