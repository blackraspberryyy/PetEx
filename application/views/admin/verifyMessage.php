<html>
    <head>
        <title>Email Verification</title>
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>assets/materialize/css/materialize.css"/>
    </head>
    <style>
    </style>
    <body style="background-color:lightgray;">
        <div id="container" >
            <center>
                <h1 style="font-size:80px; color:green;">PetEx</h1>
                <hr>
                <h2>Hello </h2>
                <h3>You have been changed your email to <?= $email ?></h3>
                <div id="body" >
                    <p>You've received this message because your email address <br>has been changed. Verify your email<br>
                        and confirm your email by clicking the link below.</p>
                    <a href = "<?= base_url() ?>login/verifyCode/<?= $code ?>" class="waves-effect waves-light btn button green">Click to Verify</a>
                    <br>
                </div>
            </center>
        </div>
    </body>
</html>