<?php
function get_age($birth_date) {
    if (date("Y", $birth_date) == "2017") {
        //Month
        return floor((time() - $birth_date) / 2678400) . " months old";
    } else {
        //Year
        return floor((time() - $birth_date) / 31556926) . " years old";
    }
}
?>
<style>
    .disabledCardAction {
        pointer-events: none;
        cursor: default;
        color:gray !important;
     }
</style>
<div class ="side-nav-offset">
    <div class ="container ">
        <div class = "card row">
            <nav class = "green darken-3">
                <div class="nav-wrapper">
                    <!--<form action = "" method = "POST">
                        <div class="input-field">
                            <input id="search" type="search" name = "search" placeholder = "Search for pet here.." >
                            <i class="material-icons">close</i>
                        </div>
                    </form>-->
                    <div class="col s12">
                        <a href="<?= $wholeUrl?>" class="breadcrumb">Pet Database</a>
                    </div>
                </div>
            </nav>
            <?php if (empty($pets)): ?>
                <!--Nothing Happens Here-->
            <?php else: ?>
                <?php foreach ($pets as $pet): ?>
                    <div class ="col s4">
                        <div class="card sticky-action hoverable medium">
                            <div class="card-image ">
                                <img class="materialboxed " data-caption = "<?= $pet->pet_name ?>" src="<?= $this->config->base_url() . $pet->pet_picture ?>">
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
                                <a href ="<?= base_url() ?>admin/petDatabaseUpdate/<?= $pet->pet_id ?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit Animal Details"><i class = "fa fa-pencil-square-o fa-lg"></i></a>
                                <a href ="<?= base_url() ?>admin/petDatabaseAdopters_exec/<?= $pet->pet_id ?>" class = "tooltipped <?= $pet->pet_status == "adopted" ? "disabledCardAction" : ""?>" data-position="bottom" data-delay="50" data-tooltip="See Interested Adopters"><i class = "fa fa-users fa-lg"></i></a>
                                <a href ="<?= base_url() ?>admin/petDatabaseMedicalRecords/<?= $pet->pet_id ?>" class = "tooltipped" data-position="bottom" data-delay="50" data-tooltip="See Medical Records"><i class="fa fa-file-text fa-lg"></i></a>
                                <a href ="#remove<?= $pet->pet_id; ?>" class = "tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Remove Animal"><i class = "fa fa-remove fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="remove<?= $pet->pet_id; ?>" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h4><i class = "fa fa-warning"></i>Warning</h4>
                            <p style = "font-weight:bold;">You are about to remove this pet from the database.</p>
                            <div class ="row">
                                <div class ="col s4">
                                    <img src = "<?= $this->config->base_url() . $pet->pet_picture ?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px;">
                                </div>
                                <div class ="col s8">
                                    <table class = "striped responsive-table">
                                        <tbody>
                                            <tr>
                                                <th>Pet ID : </th>
                                                <td><?= $pet->pet_id; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Name: </th>
                                                <td><?= $pet->pet_name; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status: </th>
                                                <td><?= $pet->pet_status; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Birthday: </th>
                                                <td><?= date("F d, Y", $pet->pet_bday); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Age:</th>
                                                <td><?= get_age($pet->pet_bday); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Specie: </th>
                                                <td><?= $pet->pet_specie; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sex: </th>
                                                <td><?= $pet->pet_sex; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Breed: </th>
                                                <td><?= $pet->pet_breed; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sterilized: </th>
                                                <td><?= $pet->pet_neutered_spayed == 1 ? "Yes" : "No"; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Admission: </th>
                                                <td><?= $pet->pet_admission; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Description: </th>
                                                <td><?= $pet->pet_description; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Findings: </th>
                                                <td><?= $pet->pet_history; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
                            <a href="<?= base_url() ?>admin/petDatabaseRemove/<?= $pet->pet_id ?>" class="modal-action modal-close waves-effect waves-green btn-flat ">Remove</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
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
