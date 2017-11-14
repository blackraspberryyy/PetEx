<style>
    
</style>
<script>
        function removeToast(className){
            switch(className){
                case 'usernameErr' :{
                    var toastElement = $('.usernameErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'passwordErr' :{
                    var toastElement = $('.passwordErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'conpassErr' :{
                    var toastElement = $('.conpassErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'phoneNumberErr' :{
                    var toastElement = $('.phoneNumberErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'emailErr' :{
                    var toastElement = $('.emailErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'lastnameErr' :{
                    var toastElement = $('.lastnameErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'firstnameErr' :{
                    var toastElement = $('.firstnameErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'birthdayErr' :{
                    var toastElement = $('.birthdayErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'addressErr' :{
                    var toastElement = $('.addressErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'captchaErr' :{
                    var toastElement = $('.captchaErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
            }
        }
        
        $(document).ready(function(){
            <?php if(!empty(form_error('username'))): ?>
                var $usernameErr = $('<span><?= form_error('username');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'usernameErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($usernameErr, 15000, 'rounded usernameErr red darken-4 z-depth-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('password'))): ?>
                var $passwordErr = $('<span><?= form_error('password');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'passwordErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($passwordErr, 15000, 'rounded passwordErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('conpass'))): ?>
                var $conpassErr = $('<span><?= form_error('conpass');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'conpassErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($conpassErr, 15000, 'rounded conpassErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('phonenumber'))): ?>
                var $phoneNumberErr = $('<span><?= form_error('phonenumber');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'phoneNumberErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($phoneNumberErr, 15000, 'rounded phoneNumberErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('email'))): ?>
                var $emailErr = $('<span><?= form_error('email');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'emailErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($emailErr, 15000, 'rounded emailErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('lastname'))): ?>
                var $lastnameErr = $('<span><?= form_error('lastname');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'lastnameErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($lastnameErr, 15000, 'rounded lastnameErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('firstname'))): ?>
                var $firstnameErr = $('<span><?= form_error('firstname');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'firstnameErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($firstnameErr, 15000, 'rounded firstnameErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('birthday'))): ?>
                var $birthdayErr = $('<span><?= form_error('birthday');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'birthdayErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($birthdayErr, 15000, 'rounded birthdayErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('address'))): ?>
                var $addressErr = $('<span><?= form_error('address');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'addressErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($addressErr, 15000, 'rounded addressErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('g-recaptcha-response'))): ?>
                var $captchaErr = $('<span><?= form_error('g-recaptcha-response');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'captchaErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($captchaErr, 15000, 'rounded captchaErr red darken-4');
            <?php endif;?>
                
        });
    </script>

