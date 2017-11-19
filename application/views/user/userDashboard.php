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
<?php
$userInfo = $this->user_model->getinfo('user', array('user_id' => $this->session->userid))[0];
?>

<main>
    <div class ="side-nav-offset" >
        <div class ="container ">
            <h2>Dashboard</h2>
            <hr class="style-seven">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="nav-wrapper">
                        <nav class = "green darken-3">
                            <div class="col s12">
                                <h4>Newly Registered Pet</h4>
                            </div>
                        </nav>
                    </div>
                </nav>
                <div class="card-content row">
                    <?php if (!$pets): ?>
                    <?php else: ?>
                        <?php $counter = 0; ?>
                        <?php foreach ($pets as $pet): ?> 
                            <?php if ($pet->pet_status == 'adoptable' && $pet->pet_access == 1): ?>
                                <div class="col s4">
                                    <div class="card sticky-action hoverable medium">
                                        <div class="card-image">
                                            <img class="materialboxed" data-caption = "" width="100%" height="100%" src="<?= $this->config->base_url() . $pet->pet_picture ?>">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title activator grey-text text-darken-4"><?= $pet->pet_name ?><i class="material-icons right">more_vert</i></span>
                                            <i class="fa fa-calendar"></i> <?= date('M. j, Y', $pet->pet_bday) ?><br>
                                            <?php if ($pet->pet_sex == "Male" || $pet->pet_sex == "male"): ?>
                                                <i class="fa fa-mars"></i> <?= $pet->pet_sex ?><br>
                                            <?php else: ?>
                                                <i class="fa fa-venus"></i> <?= $pet->pet_sex ?><br>
                                            <?php endif; ?>
                                            <i class="fa fa-paw"></i> <?= $pet->pet_breed ?><br>
                                            <i class="fa fa-check-square" style="color:green"></i> <?= $pet->pet_status ?>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                                            <hr>
                                            <p><?= $pet->pet_description ?><br></p>
                                        </div>
                                        <div class="card-action">
                                            <a href ="#detail<?= $pet->pet_id; ?>" class = "modal-trigger tooltipped pull-left" data-position="bottom" data-delay="50" data-tooltip="View Full Details"><i class = "fa fa-eye fa-lg"></i></a>
                                            <a href ="#video<?= $pet->pet_id; ?>"  class="modal-trigger tooltipped pull-left"   data-position="bottom" data-delay="50" data-tooltip="Play Video"><i class = "fa fa-video-camera fa-lg"></i></a>
                                            <a href ="#adopters<?= $pet->pet_id; ?>"  class="modal-trigger tooltipped pull-left"   data-position="bottom" data-delay="50" data-tooltip="Adopters"><i class = "fa fa-user fa-lg"></i></a>
                                            <a href ="#adopt<?= $pet->pet_id; ?>"  class="modal-trigger tooltipped pull-right"   data-position="bottom" data-delay="50" data-tooltip="Adopt a Pet"><i class="fa fa-star-o fa-lg" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pet Info Modal -->
                                <div id="detail<?= $pet->pet_id; ?>" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <h4><i class = "fa fa-info"></i> Pet Info</h4>
                                        <div class ="row">
                                            <div class ="col s4">
                                                <img src = "<?= $this->config->base_url() . $pet->pet_picture ?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px;">
                                            </div>
                                            <div class ="col s8">
                                                <table class = "striped responsive-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name: </th>
                                                            <td><?= $pet->pet_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status: </th>
                                                            <td><?= $pet->pet_status; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Size: </th>
                                                            <td><?= $pet->pet_size; ?></td>
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
                                        <a class="modal-action modal-close waves-effect waves-green btn-flat red white-text ">Close</a>
                                    </div>
                                </div>

                                <!-- Video Modal -->
                                <div id="video<?= $pet->pet_id; ?>" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <h4>Video</h4>
                                        <hr>
                                        <?php if ($pet->pet_video == NULL): ?>
                                            <h2>This pet has no Video</h2>
                                        <?php else: ?>
                                            <video class="responsive-video" controls>
                                                <source src="<?= $this->config->base_url() . $pet->pet_picture ?>"  type="video/mp4">
                                            </video>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red white-text">Close</a>
                                    </div>
                                </div>

                                <!-- Adopt Modal -->
                                <div id="adopt<?= $pet->pet_id; ?>" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <h4>Adoption Application Form</h4>
                                        <hr>
                                        <center>
                                            <img src = "<?= $this->config->base_url() . $pet->pet_picture ?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px; height:50%;">
                                            <br>
                                            <h6 >Name: <?= $pet->pet_name; ?></h6>
                                            <br>
                                        </center>
                                        <p><strong>There are two options for you to decide, its either download the form or fill up the form and send to our email online.</strong></p>
                                        <ul class="collapsible" data-collapsible="accordion">
                                            <li>
                                                <div class="collapsible-header">
                                                    <i class="material-icons left">file_download</i> Download the Form
                                                </div>
                                                <div class="collapsible-body">
                                                    <center>
                                                        <a href="<?= base_url() ?>index.php/download/adoption_application_form.pdf" class="btn-large waves-effect waves-light blue darken-3">Download Adoption Application Form<i class="material-icons left">file_download</i></a>
                                                    </center>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header active">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Fill up the Form
                                                </div>
                                                <div class="collapsible-body row">
                                                    <center>
                                                        <a href="<?= base_url() ?>user/petAdoptionOnlineForm/<?= $pet->pet_id ?>" class="btn-large waves-effect waves-light blue darken-3">Online Adoption Application<i class="fa fa-pencil-square-o left" aria-hidden="true"></i></a>
                                                    </center>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red white-text">Close</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                            if ($counter == 3): {
                                    break;
                                }
                                ?>
                            <?php endif; ?>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <a href="<?= base_url() ?>user/petAdoption" class="waves-effect waves-green btn-flat blue-text pull-right">See more</a>
            </div>
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="nav-wrapper">
                        <nav class = "green darken-3">
                            <div class="col s12">
                                <h4>Newly Adopted Pet</h4>
                            </div>
                        </nav>
                    </div>
                </nav>
                <div class="card-content row">
                    <?php if (!$adoptedPets): ?>
                    <?php else: ?>
                        <?php $counter1 = 0; ?>
                        <?php foreach ($adoptedPets as $adopted): ?>
                            <div class="col s4">
                                <div class="card sticky-action hoverable medium">
                                    <div class="card-image">
                                        <img class="materialboxed" data-caption = ""  width="100%" height="100%" src="<?= $this->config->base_url() . $adopted->pet_picture ?>">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4"><?= $adopted->pet_name ?><i class="material-icons right">more_vert</i></span>
                                        <i class="fa fa-user"></i> <?= $adopted->user_firstname; ?> <?= $adopted->user_lastname; ?><br>
                                        <i class="fa fa-calendar"></i> <?= date('M. j, Y', $adopted->pet_bday) ?><br>
                                        <?php if ($adopted->pet_sex == "Male" || $adopted->pet_sex == "male"): ?>
                                            <i class="fa fa-mars"></i> <?= $adopted->pet_sex ?><br>
                                        <?php else: ?>
                                            <i class="fa fa-venus"></i> <?= $adopted->pet_sex ?><br>
                                        <?php endif; ?>
                                        <i class="fa fa-paw"></i> <?= $adopted->pet_breed ?><br>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                                        <hr>
                                        <p><?= $adopted->pet_description ?></p>
                                    </div>
                                    <div class="card-action">
                                        <a href ="#detail<?= $adopted->pet_id; ?>" class = "modal-trigger tooltipped pull-left" data-position="bottom" data-delay="50" data-tooltip="View Full Details"><i class = "fa fa-eye fa-lg"></i></a>
                                        <a href ="#video<?= $adopted->pet_id; ?>"  class="modal-trigger tooltipped pull-left"   data-position="bottom" data-delay="50" data-tooltip="Play Video"><i class = "fa fa-video-camera fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Pet Info Modal -->
                            <div id="detail<?= $adopted->pet_id; ?>" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h4><i class = "fa fa-info"></i> Pet Info</h4>
                                    <div class ="row">
                                        <div class ="col s4">
                                            <img src = "<?= $this->config->base_url() . $adopted->pet_picture ?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px;">
                                        </div>
                                        <div class ="col s8">
                                            <table class = "striped responsive-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Name: </th>
                                                        <td><?= $adopted->pet_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status: </th>
                                                        <td><?= $adopted->pet_status; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Owner: </th>
                                                        <td><?= $adopted->user_firstname; ?> <?= $adopted->user_lastname; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Size: </th>
                                                        <td><?= $adopted->pet_size; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Birthday: </th>
                                                        <td><?= date("F d, Y", $adopted->pet_bday); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Age:</th>
                                                        <td><?= get_age($adopted->pet_bday); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Specie: </th>
                                                        <td><?= $adopted->pet_specie; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sex: </th>
                                                        <td><?= $adopted->pet_sex; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Breed: </th>
                                                        <td><?= $adopted->pet_breed; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sterilized: </th>
                                                        <td><?= $adopted->pet_neutered_spayed == 1 ? "Yes" : "No"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Admission: </th>
                                                        <td><?= $adopted->pet_admission; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Description: </th>
                                                        <td><?= $adopted->pet_description; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Findings: </th>
                                                        <td><?= $adopted->pet_history; ?></td>
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
                            <div id="video<?= $adopted->pet_id; ?>" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h4>Video</h4>
                                    <hr>
                                    <?php if ($adopted->pet_video == NULL): ?>
                                        <h2>This pet has no Video</h2>
                                    <?php else: ?>
                                        <video class="responsive-video" controls>
                                            <source src="<?= $this->config->base_url() . $adopted->pet_picture ?>"  type="video/mp4">
                                        </video>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red white-text">Close</a>
                                </div>
                            </div>
                            <?php
                            if ($counter1 == 3): {
                                    break;
                                }
                                ?>
                            <?php endif; ?>
                            <?php $counter1++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

