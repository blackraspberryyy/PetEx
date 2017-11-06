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
            <h2>Pet Adoption</h2>
            <hr class="style-seven">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="nav-wrapper">
                        <form action = "" method = "POST">
                            <div class="input-field">
                                <input id="search" type="search" name = "search" placeholder = "Search for pet here.." >
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </nav>
                <div class="card-content row">
                    <?php if (!$pets): ?>
                    <?php else: ?>
                        <?php foreach ($pets as $pet): ?> 
                            <?php if ($pet->pet_status == 'adoptable'): ?>
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
                                            <p><?= $pet->pet_description ?><br></p>
                                        </div>
                                        <div class="card-action">
                                            <a href ="#detail<?= $pet->pet_id; ?>" class = "modal-trigger tooltipped pull-left" data-position="bottom" data-delay="50" data-tooltip="View Full Details"><i class = "fa fa-eye fa-lg"></i></a>
                                            <a href = "#video<?= $pet->pet_id; ?>"  class="modal-trigger tooltipped pull-left"   data-position="bottom" data-delay="50" data-tooltip="Play Video"><i class = "fa fa-video-camera fa-lg"></i></a>
                                            <a href = "#modal3"  class="modal-trigger tooltipped pull-right"   data-position="bottom" data-delay="50" data-tooltip="Adopt a Pet"><i class="fa fa-star-o fa-lg" aria-hidden="true"></i></a>
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
                                        <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
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
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- Adopt Modal -->
                    <div id="modal3" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h4>Adoption Application Form</h4>
                            <hr>

                            <p><strong>There are two options for you to decide, its either download the form or fill up the form and send to our email online.</strong></p>
                            <ul class="collapsible" data-collapsible="accordion">
                                <li>
                                    <div class="collapsible-header ">
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
                                        <form method="POST" action ="">
                                            <div class="col s8">
                                            </div>
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" name = "date" value="<?= date("F d, Y") ?>" disabled>
                                                <label>Date of Application</label>
                                            </div>
                                            <div class="input-field col s5">
                                                <input type="text" class="validate" name = "name" value="<?= $userInfo->user_firstname ?> <?= $userInfo->user_lastname ?>" disabled>
                                                <label>Name</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" class="validate" name = "age" value="<?= get_age($userInfo->user_bday); ?>" disabled>
                                                <label>Age</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" name = "email" value="<?= $userInfo->user_email ?>" disabled>
                                                <label>Email</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="text" class="validate" name = "address" value="<?= $userInfo->user_address ?>,<?= $userInfo->user_brgy ?>,<?= $userInfo->user_city ?>,<?= $userInfo->user_province ?>" disabled>
                                                <label>Address</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" name = "numhome" >
                                                <label>Tel Nos. (Home)</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" name = "numwork" >
                                                <label>(Work)</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" name = "nummobile" value = "<?= $userInfo->user_contact_no ?>" disabled> 
                                                <label>Mobile No.</label>
                                            </div>
                                            <h6>Personal Reference:</h6>
                                            <div class="input-field col s5">
                                                <input type="text" class="validate" name = "nameref">
                                                <label>Name</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" class="validate" name = "ageref">
                                                <label>Relationship</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" name = "numref">
                                                <label>Tel No.</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <span>What prompted you to come to PARC?</span>
                                            </div>
                                            <div class="col s2">
                                                <p>
                                                    <input type="checkbox" name="friends" id="friends" />
                                                    <label for="friends">Friends</label>
                                                </p>
                                            </div>
                                            <div class="col s3">
                                                <p>
                                                    <input type="checkbox" name="ads" id="ads" />
                                                    <label for="ads">Print Ads</label>
                                                </p>
                                            </div>
                                            <div class="col s3">
                                                <p>
                                                    <input type="checkbox" name="tvshow" id="tvshow" />
                                                    <label for="tvshow">TV Show</label>
                                                </p>
                                            </div>
                                            <div class="col s4">
                                                <p>
                                                    <input type="checkbox" name="web" id="web" />
                                                    <label for="web">Website</label>
                                                </p>
                                            </div>
                                            <div class="col s2">
                                                <p>
                                                    <input type="checkbox" id="others" />
                                                    <label for="others">Others</label>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                        </div>
                    </div>

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

