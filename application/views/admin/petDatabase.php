<div class ="side-nav-offset">
    <div class ="container ">
        <div class = "card-panel row">
            <!--<div class = "col s12 input-field">
                <form action = "<?= $this->config->base_url();?>admin/petDatabase" method = "POST">
                    <input id="search" type="text" class="validate" name = "search">
                    <label for="search">Search for pet</label>
                </form>
            </div>-->
            <?php if(!$pets):?>
            <h2 class = "grey-text">No Pets to see here</h2>
            <?php else : ?>
                <?php foreach ($pets as $pet):?> 
                <div class ="col s4">
                    <div class="card sticky-action hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?= $this->config->base_url()?>images/animals/chubby.jpg">
                        </div>
                        <div class="card-content ">
                            <span class="card-title activator grey-text text-darken-4 truncate " ><?= $pet->name?><i class="material-icons right">more_vert</i></span>
                            <p><?= $pet->breed?> | <?= $pet->sex?></p>
                            <?php
                                switch ($pet->status){
                                    case "adoptable":{
                                        echo '<p class = "green-text">Adoptable</p>';
                                        break;
                                    }
                                    case "nonAdoptable":{
                                        echo '<p class = "red-text">Not Adoptable</p>';
                                        break;
                                    }
                                    case "adopted":{
                                        echo '<p class = "grey-text">Adopted</p>';
                                        break;
                                    }
                                }
                            ?>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $pet->name?><i class="material-icons right">close</i></span>
                            <p><?= $pet->breed?> | <?= $pet->sex?></p>
                            <?php
                                switch ($pet->status){
                                    case "adoptable":{
                                        echo '<p class = "green-text">Adoptable</p>';
                                        break;
                                    }
                                    case "nonAdoptable":{
                                        echo '<p class = "red-text">Not Adoptable</p>';
                                        break;
                                    }
                                    case "adopted":{
                                        echo '<p class = "grey-text">Adopted</p>';
                                        break;
                                    }
                                }
                            ?>
                            <p class = "grey-text"><?= $pet->description?></p>
                        </div>
                        <div class="card-action">
                            <a href ="<?=base_url()?>admin/petDatabaseLog/<?=$pet->pet_id?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="Pet History Log"><i class = "fa fa-history fa-lg"></i></a>
                            <a href ="<?=base_url()?>admin/petDatabaseUpdate/<?=$pet->pet_id?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit Pet Details"><i class = "fa fa-pencil-square-o fa-lg"></i></a>
                            <a href ="<?=base_url()?>admin/petDatabaseAdopters/<?=$pet->pet_id?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="See Interested Adopters"><i class = "fa fa-users fa-lg"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>