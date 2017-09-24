<div class ="side-nav-offset">
    <div class ="container ">
        <div class = "card row">
            <nav class = "green darken-3">
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search"  name = "search" placeholder = "Search for pet here..">
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
            <?php if(!$pets):?>
            <h2 class = "grey-text">No Pets to see here</h2>
            <?php else : ?>
                <?php foreach ($pets as $pet):?>
                <div class ="col s4">
                    <div class="card sticky-action hoverable medium">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?= $this->config->base_url()?>images/animals/chubby.jpg">
                        </div>
                        <div class="card-content ">
                            <span class="card-title activator grey-text text-darken-4 truncate " ><?= $pet->pet_name?><i class="material-icons right">more_vert</i></span>
                            <p><?= $pet->pet_breed?> | <?= $pet->pet_sex?></p>
                            <?php
                                switch ($pet->pet_status){
                                    case "adoptable":{
                                        echo '<p class = "green-text">Adoptable</p>';
                                        break;
                                    }
                                    case "nonAdoptable":{
                                        echo '<p class = "red-text">Not Adoptable</p>';
                                        break;
                                    }
                                    case "adopted":{
                                        echo '<p class = "grey-text">Adopted <br> by '.$pet->user_firstname.'</p>';
                                        break;
                                    }
                                }
                            ?>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $pet->pet_name?><i class="material-icons right">close</i></span>
                            <p><?= $pet->pet_breed?> | <?= $pet->pet_sex?></p>
                            <?php
                                switch ($pet->pet_status){
                                    case "adoptable":{
                                        echo '<p class = "green-text">Adoptable</p>';
                                        break;
                                    }
                                    case "nonAdoptable":{
                                        echo '<p class = "red-text">Not Adoptable</p>';
                                        break;
                                    }
                                    case "adopted":{
                                        echo '<p class = "grey-text">Adopted <br> by '.$pet->user_firstname.'</p>';
                                        break;
                                    }
                                }
                            ?>
                            <p class = "grey-text"><?= $pet->pet_description?></p>
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