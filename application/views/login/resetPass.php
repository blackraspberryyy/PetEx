<?php
if (validation_errors()) {
    include 'includes/toastErrorUserReset.php';
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
                        <h4>Reset Password</h4>
                    </div>
                </div>
            </nav>
            <div class = "card-content row">
                <form method="POST" action="resetPass_exec">
                    <p><strong>Please provide your username and your email address.</strong></p>
                    <div class="input-field col s12 <?php if (!empty(form_error("username"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                        <input id="username" name = "username" type="text" value = "<?= set_value('username') ?>" class="validate">
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s12 <?php if (!empty(form_error("email"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                        <input id="email" name = "email" type="email" value = "<?= set_value('email') ?>" class="validate">
                        <label for="email">Email Address</label>
                    </div>
                    <div class ="col s6">
                        <button class="btn-large waves-effect waves-light white black-text" type="button" onclick = "window.history.back();">Back
                            <i class="material-icons left">arrow_back</i>
                        </button>
                    </div>
                    <div class ="col s6">
                        <button class="btn-large waves-effect waves-light green darken-3 right" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
    </div>
</main>