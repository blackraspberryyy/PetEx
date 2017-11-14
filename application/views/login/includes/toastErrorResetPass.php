<style>
    
</style>
<script>
        function removeToast(className){
            switch(className){
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
            }
        }
        
        $(document).ready(function(){
            <?php if(!empty(form_error('password'))): ?>
                var $passwordErr = $('<span><?= form_error('password');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'passwordErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($passwordErr, 15000, 'rounded passwordErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('conpassword'))): ?>
                var $conpasswordErr = $('<span><?= form_error('conpassword');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'conpasswordErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($conpasswordErr, 15000, 'rounded conpasswordErr red darken-4');
            <?php endif;?>
            
        });
    </script>

