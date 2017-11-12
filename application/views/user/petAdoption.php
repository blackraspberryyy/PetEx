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
                                                            <input type="text" class="validate" name = "userage" value="<?= get_age($userInfo->user_bday); ?>" disabled>
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
                                                        <div class="input-field col s12">
                                                            <input type="text" class="validate" name = "prompt">
                                                            <label>What prompted you to come to PARC?</label>
                                                        </div>
                                                        <div class="input-field col s4">
                                                            <span>Are you interested in a</span>
                                                        </div>
                                                        <p>
                                                            <input name="interested" type="radio" id="cat"   <?= $pet->pet_specie == "feline" ? "checked = \"\"" : "" ?>disabled="disabled" />
                                                            <label for="cat">Cat</label>
                                                        </p>
                                                        <p>
                                                            <input name="interested" type="radio" id="dog"  <?= $pet->pet_specie == "canine" ? "checked = \"\"" : "" ?> disabled="disabled" />
                                                            <label for="dog">Dog</label>
                                                        </p>
                                                        <div class="input-field col s4">
                                                            <input type="text" class="validate" name = "breed" value="<?= $pet->pet_breed ?>" >
                                                            <label>Breed/Mix</label>
                                                        </div>
                                                        <div class="col s1" style="margin-top:30px;">
                                                            <span>Size:</span>
                                                        </div>
                                                        <div class="input-field col s1" style=" margin-left:-30px;">
                                                            <p>
                                                                <input name="size" type="radio" id="small" disabled="disabled"  <?= $pet->pet_size == "small" ? "checked = \"\"" : "" ?> />
                                                                <label for="small">S</label>
                                                            </p>
                                                        </div>
                                                        <div class="input-field col s1" style=" margin-left:-10px;">
                                                            <p>
                                                                <input name="size" type="radio" id="medium" disabled="disabled" <?= $pet->pet_size == "medium" ? "checked = \"\"" : "" ?>  />
                                                                <label for="medium">M</label>
                                                            </p>
                                                        </div>
                                                        <div class="input-field col s1" style="margin-left:-7px;">
                                                            <p>
                                                                <input name="size" type="radio" id="large" disabled="disabled" <?= $pet->pet_size == "large" ? "checked = \"\"" : "" ?>  />
                                                                <label for="large">L</label>
                                                            </p>
                                                        </div>
                                                        <div class="input-field col s2" style=" margin-left:-10px;">
                                                            <p>
                                                                <input name="size" type="radio" id="xlarge" disabled="disabled" <?= $pet->pet_size == "xlarge" ? "checked = \"\"" : "" ?>  />
                                                                <label for="xlarge">XL</label>
                                                            </p>
                                                        </div>
                                                        <div class="input-field col s3">
                                                            <input type="text" class="validate" name = "petage" value="<?= get_age($pet->pet_bday); ?>" disabled>
                                                            <label>Age</label>
                                                        </div>
                                                        <style>
                                                            #description::placeholder{
                                                                color:gray !important;
                                                            }
                                                        </style>
                                                        <div class="input-field col s12">
                                                            <textarea id="description" name="description" class="materialize-textarea" placeholder = "<?= $pet->pet_description ?>" disabled></textarea>
                                                            <label for="description">Name/description of animal(if animal is available at PARC)</label>
                                                        </div>
                                                        <hr>
                                                        <center>
                                                            <h4>Questionnare</h4>
                                                        </center>
                                                        <hr>
                                                        <div class="input-field col s12">
                                                            <textarea id="num1" name="num1" class="materialize-textarea"></textarea>
                                                            <label for="num1">1.) Why did you decide to adopt an animal from PAWS?</label>
                                                        </div>
                                                        <div class="col s6">
                                                            <span>2.) Have you adopted from PAWS/PARC before?</span>
                                                            <input type="radio" id="num2yes" name = "num2"  />
                                                            <label for="num2yes">Yes</label>
                                                            <input type="radio" id="num2no" name = "num2"  />
                                                            <label for="num2no">No</label>
                                                        </div>
                                                        <div class="input-field col s3">
                                                            <input type="text" class="datepicker" name = "num2ifyes" disabled>
                                                            <label>If yes, when?</label>
                                                        </div>
                                                        <div class="col s2">
                                                            <input type="radio" id="dog"  name="ifYesSpecie"/>
                                                            <label for="dog">Dog</label>
                                                            <input type="radio" id="cat" name="ifYesSpecie"/>
                                                            <label for="cat">Cat</label>
                                                        </div>
                                                        <div class="col s6">
                                                            <span>3.) For whom are you adopting animal?</span>
                                                            <div class="col s5">
                                                                <input type="radio" id="house" name = "num3"  />
                                                                <label for="house">House</label>
                                                                <input type="radio" id="townhouse" name = "num3"  />
                                                                <label for="townhouse">Townhouse</label>
                                                            </div>
                                                            <div class="col s5">
                                                                <input type="radio" id="apartment" name = "num3"  />
                                                                <label for="apartment">Apartment</label>
                                                                <input type="radio" id="condo" name = "num3"/>
                                                                <label for="condo">Condo</label>
                                                                <input type="radio" id="other" name = "num3"/>
                                                                <label for="other">Other</label>
                                                            </div>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input type="text" class="validate" name = "num3other" disabled>
                                                            <label>Please specify</label>
                                                        </div><br>
                                                        <div class="col s12">
                                                            <p>4.) Do you Rent?</p>
                                                            <input type="radio"id="num4yes" name = "num4"  />
                                                            <label for="num4yes">Yes</label>
                                                            <input type="radio"id="num4no" name = "num4"  />
                                                            <label for="num4no">No</label><br><br>
                                                            <p>If yes, please secure a written letter from your landlord
                                                                granting you permission to keep pets.</p>
                                                        </div>
                                                        <div class="input-field col s7">
                                                            <input type="text" class="validate" name = "num5">
                                                            <label>5.) Who do you live with?</label>
                                                        </div>
                                                        <div class="input-field col s5">
                                                            <input type="text" class="datepicker" name = "howlong">
                                                            <label>How long have you lived in?</label>
                                                        </div>
                                                        <div class="col s7">
                                                            <span>6.) Are you planning to move in the next 6 months?</span>
                                                            <input type="radio" id="num6yes" name = "num6"  />
                                                            <label for="num6yes">Yes</label>
                                                            <input type="radio" id="num6no" name = "num6"  />
                                                            <label for="num6no">No</label>
                                                        </div>
                                                        <div class="input-field col s5">
                                                            <input type="text" class="validate" name = "num6ifyes" disabled>
                                                            <label>If yes, where?</label>
                                                        </div>
                                                        <div class="col s6">
                                                            <span>7.) For whom are you adopting animal?</span>
                                                            <input type="radio" id="myself" name = "num7"  />
                                                            <label for="myself">for myself</label>
                                                            <input type="radio" id="children" name = "num7"  />
                                                            <label for="children">for my children</label>
                                                            <input type="radio" id="gift" name = "num7"  />
                                                            <label for="gift">as a gift</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" id="others" name = "num7"/>
                                                            <label for="others">Other</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input type="text" class="validate" name = "num7other" disabled>
                                                            <label>Please specify</label>
                                                        </div>
                                                        <div class="col s6">
                                                            <p>8.) Will the family share in the care of the animal?</p>
                                                            <input type="radio"id="num8yes" name = "num8"  />
                                                            <label for="num8yes">Yes</label>
                                                            <input type="radio"id="num8no" name = "num8"  />
                                                            <label for="num8no">No</label><br><br>
                                                        </div>
                                                        <div class="col s6">
                                                            <p>9.) Is there anyone in your household who has objection(s) to the arrangement?</p>
                                                            <input type="radio"id="num9yes" name = "num9"  />
                                                            <label for="num9yes">Yes</label>
                                                            <input type="radio"id="num9no" name = "num9"  />
                                                            <label for="num9no">No</label>
                                                            <input type="text" class="validate" name = "num9ifyes" placeholder="if yes, explain" disabled>
                                                        </div>
                                                        <div class="col s6">
                                                            <p>10.) Are there any children that visit your home frequently?</p>
                                                            <input type="radio"id="num10yes" name = "num10"  />
                                                            <label for="num10yes">Yes</label>
                                                            <input type="radio"id="num10no" name = "num10"  />
                                                            <label for="num10no">No</label>
                                                            <input type="text" class="validate" name = "num10agerange" placeholder="Age range" disabled>
                                                        </div>
                                                        <div class="col s6">
                                                            <p>11.) Are there any other regular visitors to your home, human or animal, with which your new companion must get along?</p>
                                                            <input type="radio"id="num11yes" name = "num11"  />
                                                            <label for="num11yes">Yes</label>
                                                            <input type="radio"id="num11no" name = "num11"  />
                                                            <label for="num11no">No</label>
                                                            <input type="text" class="validate" name = "num11ifyes" placeholder="if yes, explain" disabled>
                                                        </div>
                                                        <div class="col s6">
                                                            <p>11.) Are any members of your household allergic to cats/dogs?</p>
                                                            <input type="radio"id="num12yes" name = "num12"  />
                                                            <label for="num12yes">Yes</label>
                                                            <input type="radio"id="num12no" name = "num12"  />
                                                            <label for="num12no">No</label>
                                                            <input type="text" class="validate" name = "num12ifyes" placeholder="if yes, who?" disabled>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <textarea id="num13" name="num13" class="materialize-textarea"></textarea>
                                                            <label for="num13">13.) What will happen to this animal if you have to move unexpectedly?</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <textarea id="num14" name="num14" class="materialize-textarea"></textarea>
                                                            <label for="num14">14.) What kind of behavior(s) do you feel unable to accept?</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <input type="number" class="validate" name="num15">
                                                            <label>15.) How many hours in an average workday will your companion animal spend without a human?</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <textarea id="num16" name="num16" class="materialize-textarea"></textarea>
                                                            <label for="num16">16.) What will happen to your companion animal, when you go on a vacation or in case of emergency?</label>
                                                        </div>
                                                        <div class="col s6">
                                                            <p>17.) Do you have regular veterinarian?</p>
                                                            <input type="radio"id="num17yes" name = "num17"  />
                                                            <label for="num17yes">Yes</label>
                                                            <input type="radio"id="num17no" name = "num17"  />
                                                            <label for="num17no">No</label>
                                                            <input type="text" class="validate" name = "num17ifyes" placeholder="if yes, who?" disabled>
                                                        </div>
                                                        <div class="col s6">
                                                            <p>18.) Do you have regular veterinarian?</p>
                                                            <input type="radio"id="num18yes" name = "num18"  />
                                                            <label for="num18yes">Yes</label>
                                                            <input type="radio"id="num18no" name = "num18" />
                                                            <label for="num18no">No</label>
                                                            <input type="text" class="validate" name = "num18ifyes" placeholder="if yes, what type?" disabled>
                                                        </div>
                                                        <div class="col s6">
                                                            <p>19.) What part of your house do you want this animal to stay?</p>
                                                            <input type="radio" id="inside" name = "num19"  />
                                                            <label for="inside">Inside only</label>
                                                            <input type="radio" id="insideoutside" name = "num19" />
                                                            <label for="insideoutside">Inside/outside</label>
                                                            <input type="radio" id="outside" name = "num19" />
                                                            <label for="outside">Outside only</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <textarea id="num16" name="num20" class="materialize-textarea"></textarea>
                                                            <label for="num20">20.) Where will this animal be kept during the day? night?</label>
                                                        </div>
                                                        <div class="col s12">
                                                            <p>21.) Do you have a fenced yard?</p>
                                                            <input type="radio" id="num21yes" name = "num21"  />
                                                            <label for="num21yes">Yes</label>
                                                            <input type="radio" id="num21no" name = "num21"  />
                                                            <label for="num21no">No</label>
                                                            <input type="text" class="validate" name = "num21ifyes" placeholder="Fence height and type" disabled>
                                                            <h6>You may upload a picture</h6>
                                                            <div class="file-field input-field">
                                                                <div class="btn">
                                                                    <span>File</span>
                                                                    <input type="file" id = "files" name = "num21pic">
                                                                </div>
                                                                <div class="file-path-wrapper">
                                                                    <input class="file-path " type="text" placeholder = "No File Chosen">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col s12">
                                                            <p>22.) If adopting a dog, does fencing completely enclose the yard?</p>
                                                            <input type="radio" id="num22yes" name = "num22"  />
                                                            <label for="num22yes">Yes</label>
                                                            <input type="radio" id="num22no" name = "num22" />
                                                            <label for="num22no">No</label>
                                                            <input type="text" class="validate" name = "num22ifno" placeholder="if no, how will you handle he dog's exercise and toilet duties?" disabled>
                                                        </div>
                                                        <div class="col s6">
                                                            <span>23.) If adopting a cat, where will the litterbox be kept?</span><br>
                                                            <div class="col s6">
                                                                <input type="radio" id="insidehouse" name = "num23"/>
                                                                <label for="insidehouse">Inside house</label>
                                                                <input type="radio" id="garage" name = "num23"  />
                                                                <label for="garage">Garage</label>
                                                                <input type="radio" id="noneed" name = "num23"/>
                                                                <label for="noneed">No need</label>
                                                            </div>
                                                            <div class="col s6">
                                                                <input type="radio" id="other23" name = "num23"/>
                                                                <label for="other23">Other</label>
                                                            </div>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input type="text" class="validate" name = "num23other" disabled>
                                                            <label>Please specify</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <textarea id="num24" name="num24" class="materialize-textarea"></textarea>
                                                            <label for="num24">24.) As a matter of policy, PARC will neuter all animals prior to releasing
                                                                for adoption. What is your opinion about spaying and neutering (kapon) of companion animals?</label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <textarea id="num25" name="num25" class="materialize-textarea"></textarea>
                                                            <label for="num25">25.) Do you have questions and comments?</label>
                                                        </div>
                                                        <div class="col s12">
                                                            <p><strong>I certify that the above information are true and understand that false information may result in the automative nullification of my proposed adoption. PARC reserves the right to refuse and adoption.</strong></p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red white-text">Close</a>
                                    </div>
                                </div>
                            <?php endif; ?>
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

