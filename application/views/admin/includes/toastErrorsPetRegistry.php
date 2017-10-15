<style>
    
</style>
<script>
        function removeToast(className){
            switch(className){
                case 'petNameErr' :{
                    var toastElement = $('.petNameErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'petBdayErr' :{
                    var toastElement = $('.petBdayErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'petBreedErr' :{
                    var toastElement = $('.petBreedErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'petDescErr' :{
                    var toastElement = $('.petDescErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
            }
            
        }
        
        $(document).ready(function(){
            <?php if(!empty(form_error('pet_name'))): ?>
                var $petNameErr = $('<span><?= form_error('pet_name');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'petNameErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($petNameErr, 10000, 'rounded petNameErr green darken-4 z-depth-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('pet_bday'))): ?>
                var $petBdayErr = $('<span><?= form_error('pet_bday');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'petBdayErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($petBdayErr, 10000, 'rounded petBdayErr green darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('pet_breed'))): ?>
                var $petBreedErr = $('<span><?= form_error('pet_breed');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'petBreedErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($petBreedErr, 10000, 'rounded petBreedErr green darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('pet_description'))): ?>
                var $petDescErr = $('<span><?= form_error('pet_description');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'petDescErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($petDescErr, 10000, 'rounded petDescErr green darken-4');
            <?php endif;?>
        });
    </script>

