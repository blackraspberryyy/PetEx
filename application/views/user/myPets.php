<?php
$userInfo = $this->user_model->fetchJoinThreeAdoptedDesc("adoption", "pet", "adoption.pet_id = pet.pet_id", "user", "adoption.user_id = user.user_id", array('user.user_id' => $this->session->userid));
?>
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
<main>
    <div class = "side-nav-offset" >
        <div class = "container ">
            <h2>My Pets</h2>
            <hr class = "style-seven">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class = "nav-wrapper">
                        <form action = "" method = "POST">
                            <div class = "input-field" >
                                <input id = "search" type = "search" name = "search" placeholder = "Search for pet here.." >
                                <i class = "material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </nav>

                <div class = "card-content row">
                    <?php if (!$userInfo): ?>
                        <h2><i class="fa fa-warning"></i> You have no pet/s</h2>
                    <?php else: ?>
                        <?php foreach ($userInfo as $myPets): ?>
                            <div class="col s4">
                                <div class="card sticky-action hoverable medium">
                                    <div class="card-image">
                                        <img class="materialboxed" data-caption = ""  width="100%" height="100%" src="<?= $this->config->base_url() . $myPets->pet_picture ?>">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4"><?= $myPets->pet_name ?><i class="material-icons right">more_vert</i></span>

                                        <i class="fa fa-calendar"></i> <?= date('M. j, Y', $myPets->pet_bday) ?><br>
                                        <?php if ($myPets->pet_sex == "Male" || $myPets->pet_sex == "male"): ?>
                                            <i class="fa fa-mars"></i> <?= $myPets->pet_sex ?><br>
                                        <?php else: ?>
                                            <i class="fa fa-venus"></i> <?= $myPets->pet_sex ?><br>
                                        <?php endif; ?>
                                        <i class="fa fa-paw"></i> <?= $myPets->pet_breed ?><br>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                                        <hr>
                                        <p><?= $myPets->pet_description ?></p>
                                    </div>
                                    <div class="card-action">
                                        <a href ="<?= base_url() ?>user/myPetsEdit/<?= $myPets->pet_id ?>" class = "modal-trigger tooltipped pull-left" data-position="bottom" data-delay="50" data-tooltip="Edit Pet Details"><i class = "fa fa-pencil-square-o fa-lg"></i></a>
                                        <a href ="#detail<?= $myPets->pet_id; ?>" class = "modal-trigger tooltipped pull-left" data-position="bottom" data-delay="50" data-tooltip="View Full Details"><i class = "fa fa-eye fa-lg"></i></a>
                                        <a href ="#video<?= $myPets->pet_id; ?>"  class="modal-trigger tooltipped pull-left"   data-position="bottom" data-delay="50" data-tooltip="Play Video"><i class = "fa fa-video-camera fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Pet Info Modal -->
                            <div id="detail<?= $myPets->pet_id; ?>" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h4><i class = "fa fa-info"></i> Pet Info</h4>
                                    <div class ="row">
                                        <div class ="col s4">
                                            <img src = "<?= $this->config->base_url() . $myPets->pet_picture ?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px;">
                                        </div>
                                        <div class ="col s8">
                                            <table class = "striped responsive-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Name: </th>
                                                        <td><?= $myPets->pet_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status: </th>
                                                        <td><?= $myPets->pet_status; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Size: </th>
                                                        <td><?= $myPets->pet_size; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Birthday: </th>
                                                        <td><?= date("F d, Y", $myPets->pet_bday); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Age:</th>
                                                        <td><?= get_age($myPets->pet_bday); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Specie: </th>
                                                        <td><?= $myPets->pet_specie; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sex: </th>
                                                        <td><?= $myPets->pet_sex; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Breed: </th>
                                                        <td><?= $myPets->pet_breed; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sterilized: </th>
                                                        <td><?= $myPets->pet_neutered_spayed == 1 ? "Yes" : "No"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Admission: </th>
                                                        <td><?= $myPets->pet_admission; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Description: </th>
                                                        <td><?= $myPets->pet_description; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Findings: </th>
                                                        <td><?= $myPets->pet_history; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="modal-action modal-close waves-effect waves-green btn-flat red white-text ">Close</a>
                                </div>
                            </div>

                            <!-- Video Modal -->
                            <div id="video<?= $myPets->pet_id; ?>" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h4>Video</h4>
                                    <hr>
                                    <?php if ($myPets->pet_video == NULL): ?>
                                        <h2>This pet has no Video</h2>
                                    <?php else: ?>
                                        <video class="responsive-video" controls>
                                            <source src="<?= $this->config->base_url() . $myPets->pet_picture ?>"  type="video/mp4">
                                        </video>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red white-text">Close</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <ul class="pagination center">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>
</main>
