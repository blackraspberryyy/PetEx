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
            <?php foreach ($pets as $pet): ?>
                <div class ="col s4">
                    <div class="card sticky-action hoverable">
                        <div class="card-image ">
                            <img class="materialboxed" data-caption = "<?= $pet->pet_name ?>" src="<?= $this->config->base_url().$pet->pet_picture ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4 " ><?= $pet->pet_name ?><i class="material-icons right">more_vert</i></span>
                            <p><?= $pet->pet_breed ?> | <?= $pet->pet_sex ?><br>
                                <?php
                                switch ($pet->pet_status) {
                                    case "adoptable": {
                                            echo '<span class = "green-text">Adoptable</span>';
                                            break;
                                        }
                                    case "nonAdoptable": {
                                            echo '<span class = "red-text">Not Adoptable</span>';
                                            break;
                                        }
                                    case "adopted": {
                                            echo '<span class = "grey-text">Adopted</span>';
                                            break;
                                        }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $pet->pet_name ?><i class="material-icons right">close</i></span>
                            <p><?= $pet->pet_breed ?> | <?= $pet->pet_sex ?><br>
                                <?php
                                switch ($pet->pet_status) {
                                    case "adoptable": {
                                            echo '<span class = "green-text">Adoptable</span>';
                                            break;
                                        }
                                    case "nonAdoptable": {
                                            echo '<span class = "red-text">Not Adoptable</span>';
                                            break;
                                        }
                                    case "adopted": {
                                            echo '<span class = "grey-text">Adopted</span>';
                                            break;
                                        }
                                }
                                ?>
                            </p>
                            <p class = "grey-text"><?= $pet->pet_description ?></p>
                        </div>
                        <div class="card-action">
                            <a href ="<?= base_url() ?>admin/petDatabaseLog/<?= $pet->pet_id ?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="Animal History Log"><i class = "fa fa-history fa-lg"></i></a>
                            <a href ="<?= base_url() ?>admin/petDatabaseUpdate/<?= $pet->pet_id ?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit Animal Details"><i class = "fa fa-pencil-square-o fa-lg"></i></a>
                            <a href ="<?= base_url() ?>admin/petDatabaseAdopters/<?= $pet->pet_id ?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="See Interested Adopters"><i class = "fa fa-users fa-lg"></i></a>
                            <a href ="<?= base_url() ?>admin/petDatabaseRemove/<?= $pet->pet_id ?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="Remove Animal"><i class = "fa fa-remove fa-lg"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class ="col s4">
                <a href ="<?= $this->config->base_url() ?>admin/petDatabaseAdd">
                    <div class="card sticky-action hoverable medium grey lighten-2">
                        <div class="card-image">
                            <img src = "<?= $this->config->base_url() ?>/images/tools/pet_add.png" />
                        </div>
                        <div class="card-content">
                            <span class="card-title grey-text center-align add_pet">Register Pet</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>