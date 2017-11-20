
<script>
        function removeToast(className){
            switch(className){
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
                case 'addressErr' :{
                    var toastElement = $('.addressErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'cityErr' :{
                    var toastElement = $('.cityErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'provinceErr' :{
                    var toastElement = $('.provinceErr').first()[0];
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
            }
            
        }
        
        $(document).ready(function(){
            <?php if(!empty(form_error('user_lastname'))): ?>
                var $lastnameErr = $('<span><?= form_error('user_lastname');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'lastnameErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($lastnameErr, 15000, 'rounded lastnameErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_firstname'))): ?>
                var $firstnameErr = $('<span><?= form_error('user_firstname');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'firstnameErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($firstnameErr, 15000, 'rounded firstnameErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_username'))): ?>
                var $usernameErr = $('<span><?= form_error('user_username');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'usernameErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($usernameErr, 15000, 'rounded usernameErr red darken-4 z-depth-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_password'))): ?>
                var $passwordErr = $('<span><?= form_error('user_password');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'passwordErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($passwordErr, 15000, 'rounded passwordErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_conpassword'))): ?>
                var $conpassErr = $('<span><?= form_error('user_conpassword');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'conpassErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($conpassErr, 15000, 'rounded conpassErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_contact_no'))): ?>
                var $phoneNumberErr = $('<span><?= form_error('user_contact_no');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'phoneNumberErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($phoneNumberErr, 15000, 'rounded phoneNumberErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_address'))): ?>
                var $addressErr = $('<span><?= form_error('user_address');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'addressErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($addressErr, 15000, 'rounded addressErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_province'))): ?>
                var $provinceErr = $('<span><?= form_error('user_province');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'provinceErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($provinceErr, 15000, 'rounded provinceErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_city'))): ?>
                var $cityErr = $('<span><?= form_error('user_city');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'cityErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($cityErr, 15000, 'rounded cityErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('user_email'))): ?>
                var $emailErr = $('<span><?= form_error('user_email');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'emailErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($emailErr, 15000, 'rounded emailErr red darken-4');
            <?php endif;?>    
        });
    </script>

