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
                case 'emailErr' :{
                    var toastElement = $('.emailErr').first()[0];
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
                
            <?php if(!empty(form_error('email'))): ?>
                var $emailErr = $('<span><?= form_error('email');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'emailErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($emailErr, 15000, 'rounded emailErr red darken-4');
            <?php endif;?>
                
        });
    </script>

