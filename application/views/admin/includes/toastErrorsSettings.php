<!--PRE WALA PANG TOAST TOOOOO-->
<script>
        function removeToast(className){
            switch(className){
                case 'weightErr' :{
                    var toastElement = $('.weightErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'diagnosisErr' :{
                    var toastElement = $('.diagnosisErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
                case 'treatmentErr' :{
                    var toastElement = $('.treatmentErr').first()[0];
                    var toastInstance = toastElement.M_Toast;
                    toastInstance.remove();
                    break;
                }
            }
            
        }
        
        $(document).ready(function(){
            <?php if(!empty(form_error('weight'))): ?>
                var $weightErr = $('<span><?= form_error('weight');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'weightErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($weightErr, 10000, 'rounded weightErr red darken-4 z-depth-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('diagnosis'))): ?>
                var $diagnosisErr = $('<span><?= form_error('diagnosis');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'diagnosisErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($diagnosisErr, 10000, 'rounded diagnosisErr red darken-4');
            <?php endif;?>
                
            <?php if(!empty(form_error('treatment'))): ?>
                var $treatmentErr = $('<span><?= form_error('treatment');?></span>').add($('<button class="btn-flat toast-action" onclick = "removeToast(\'treatmentErr\')"><i class = "material-icons">close</i></button>'));
                Materialize.toast($treatmentErr, 10000, 'rounded treatmentErr red darken-4');
            <?php endif;?>
        });
    </script>

