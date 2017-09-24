
<div class="w3-container">
    <form class="w3-container" action="<?= base_url() ?>login/login_submit" method="POST">
        <br><br><br>
        <div class="w3-row">
            <div class="w3-quarter w3-container">
            </div>
            <div class="w3-half w3-container">
                <div class="w3-panel w3-card-4">
                    <div class="w3-teal w3-container" style="margin: -16px">
                        <br>
                        <h1><i class="fa fa-sign-in"></i>&nbsp;Login</h1>
                        <br>
                    </div>
                    <br><br>
                    <label class="w3-text-teal"><b>Username</b></label>
                    <input class="w3-input w3-border w3-animate-input w3-light-grey" type="text" name="username" style="width:50%">
                    <br>
                    <label class="w3-text-teal"><b>Password</b></label>
                    <input class="w3-input w3-border w3-animate-input w3-light-grey" type="password" name="password" style="width:50%">
                    <br>

                    <button class="w3-button w3-round-xlarge w3-indigo w3-mobile">Login</button>
                    </form>
                    <br><br>
                    <form action="<?= base_url() ?>login/register" method="POST"> 
                        <center>
                        <button class="w3-button w3-round-xlarge w3-indigo w3-mobile" style="width:400px;">Sign up for free</button>
                        </center>
                    </form>
                    <br>
                </div>
            </div>
            <div class="w3-quarter w3-container">

            </div>
        </div>

</div>

