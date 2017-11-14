<?php
if (validation_errors()) {
    include 'includes/toastErrorResetPass.php';
}
?>
<main>
    <nav>
        <div class="nav-wrapper green darken-1">
            <div class="row">
                <div class="col m10">
                    <img class="brand-logo center" src = "<?= $this->config->base_url() ?>images/logo/logo.png" height = "58" >
                </div>
            </div>
        </div>
    </nav><br><br><br>
    <div class ="container">
        <div class = "card row hoverable">
            <nav class = "green darken-3">
                <div class = "nav-wrapper">
                    <div class="col s12">
                        <h4>Enter New Password</h4>
                    </div>
                </div>
            </nav>
            <div class = "card-content row">
                <form method="POST" action="<?= base_url() ?>login/enterNewPass_exec/<?= $segment ?>">
                    <p><strong>Please provide your new password.</strong></p>
                    <div class="input-field col s12 <?php if (!empty(form_error("password"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                        <input id="password" name = "password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12 <?php if (!empty(form_error("conpassword"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                        <input id="conpassword" name = "conpassword" type="password" class="validate">
                        <label for="conpassword">Confirm Password</label>
                    </div>
                    <button class="btn-large waves-effect waves-light green darken-3 right" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <br><br><br>
    </div>
</main>