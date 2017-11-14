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
    $pet = $this->user_model->fetch('pet', array('pet_id' => $this->uri->segment(3)))[0];
?>
<main>
    <div class ="side-nav-offset">
        <div class="container">
            <h2>Pet Adoption</h2>
            <hr class="style-seven">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="col s12">
                        <a href="<?= $this->config->base_url() ?>user/petAdoption" class="breadcrumb">Pet Adoption</a>
                        <a href="<?= $wholeUrl ?>" class="breadcrumb">Pet Adoption Form</a>
                    </div>
                </nav>
                <div class="card-content">
                    <form method="POST" action ="">
                        <div class="row">
                            <div class ="col s3 center"><br><br>
                                <img src ="<?= base_url();?>images/logo/paws.png" class ="responsive-img">
                            </div>
                            <div class ="col s6">
                                <center>
                                    <h6>The Philippine Animal Rehabilitation Center</h6>
                                    <h2 style = "font-weight: bold; font-family:Roboto;">ADOPTION APPLICATION</h2>
                                    <span style = "font-size: 11px;">PAWS Animal Rehabilitation Center (PARC), Aurora Boulevard,
                                        <br>Katipunan Valley, Loyola Heights, Quezon City</span>
                                </center>
                            </div>
                            <div class ="col s3 center"><br><br>
                                <img src ="<?= base_url();?>images/logo/parc.png" class ="responsive-img">
                            </div>
                        </div>
                        <div class ="row">
                            <div class = "col s12">
                                <center>
                                    <p style = "font-weight: bold;">You will still need to have an interview with an adoption counsellor, prior to approval of your application.<br>
                                        Filling out this form will save time at the shelter, but not substitute for an in-person interview.<br><Br></p>
                                </center>
                            </div>
                            <div class="col s8"></div>
                            <div class="input-field col s4 green-theme">
                                <input type="text" class="validate" name = "date" value="<?= date("F d, Y") ?>" >
                                <label>Date of Application</label>
                            </div>
                            <div class="input-field col s5 green-theme">
                                <input type="text" class="validate " name = "name" value="<?= $userInfo->user_firstname ?> <?= $userInfo->user_lastname ?>" >
                                <label>Name</label>
                            </div>
                            <div class="input-field col s3 green-theme">
                                <input type="text" class="validate" name = "userage" value="<?= get_age($userInfo->user_bday); ?>" >
                                <label>Age</label>
                            </div>
                            <div class="input-field col s4 green-theme">
                                <input type="text" class="validate" name = "email" value="<?= $userInfo->user_email ?>" >
                                <label>Email</label>
                            </div>
                            <div class="input-field col s12 green-theme">
                                <input type="text" class="validate" name = "address" value="<?= $userInfo->user_address ?>,<?= $userInfo->user_brgy ?>,<?= $userInfo->user_city ?>,<?= $userInfo->user_province ?>" >
                                <label>Address</label>
                            </div>
                            <div class="input-field col s4 green-theme">
                                <input type="text" class="validate" name = "numhome" >
                                <label>Tel Nos. (Home)</label>
                            </div>
                            <div class="input-field col s4 green-theme">
                                <input type="text" class="validate" name = "numwork" >
                                <label>Tel Nos. (Work)</label>
                            </div>
                            <div class="input-field col s4 green-theme">
                                <input type="text" class="validate" name = "nummobile" value = "<?= $userInfo->user_contact_no ?>" > 
                                <label>Mobile No.</label>
                            </div>
                        </div>
                        
                        <style>
                            input[type="text"]:disabled{
                                color:black !important;
                            }
                        </style>
                        <div class = "row">
                            <center>
                                <h6 style = "background:rgba(0,0,0,0.7); font-family: Roboto;" class = "white-text">Chosen Adoptee</h6>
                            </center>
                            <br>
                            <div class="col s12 m4 l4">
                                <div class="image-circle-cropper z-depth-2">
                                    <img src="<?= base_url().$pet->pet_picture?>" class = "profileImgStyle">
                                </div>
                            </div>
                            <div class = "col s12 m8 l8">
                                <div class = "row">
                                    <div class="input-field col s6 green-theme">
                                        <input type="text" class="validate" name = "adoptee_name" disabled = "" value = "<?= $pet->pet_name?>">
                                        <label for = "adoptee_name">Pet Name</label>
                                    </div>
                                    <div class="input-field col s6 green-theme">
                                        <input type="text" class="validate" name = "adoptee_age" disabled = "" value = "<?= get_age($pet->pet_bday);?>">
                                        <label for = "adoptee_age">Age</label>
                                    </div>
                                    <div class="input-field col s3 green-theme">
                                        <input type="text" class="validate" name = "adoptee_specie" disabled = "" value = "<?= $pet->pet_specie == "canine"? "Dog" : "Cat";?>">
                                        <label for = "adoptee_specie">Specie</label>
                                    </div>
                                    <div class="input-field col s3 green-theme">
                                        <input type="text" class="validate" name = "adoptee_sex" disabled = "" value = "<?= $pet->pet_sex == "male"? "Male" : "Female";?>">
                                        <label for = "adoptee_sex">Sex</label>
                                    </div>
                                    <div class="input-field col s3 green-theme">
                                        <input type="text" class="validate" name = "adoptee_sterilized" disabled = "" value = "<?= $pet->pet_neutered_spayed == 1 ? "Yes" : "No";?>">
                                        <label for = "adoptee_sterilized"><?= $pet->pet_sex == "male"? "Neutered?" : "Spayed?";?></label>
                                    </div>
                                    <div class="input-field col s3 green-theme">
                                        <input type="text" class="validate" name = "adoptee_admission" disabled = "" value = "<?= $pet->pet_admission;?>">
                                        <label for = "adoptee_admission">Admission</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class = "row">
                            <center>
                                <h6 style = "background:rgba(0,0,0,0.7); font-family: Roboto;" class = "white-text">Personal Reference</h6>
                            </center>
                            <div class="input-field col s5 green-theme">
                                <input type="text" class="validate" name = "nameref">
                                <label>Name</label>
                            </div>
                            <div class="input-field col s3 green-theme">
                                <input type="text" class="validate" name = "ageref">
                                <label>Relationship</label>
                            </div>
                            <div class="input-field col s4 green-theme">
                                <input type="text" class="validate" name = "numref">
                                <label>Tel No.</label>
                            </div>
                            <div class="input-field col s12 green-theme">
                                <input type="text" class="validate" name = "prompt" placeholder = " ">
                                <label>What prompted you to come to PARC?</label>
                            </div>
                        </div>
                        <div class ="row">
                            <div class="col s3 green-theme">
                                <span>Are you interested in</span>
                                <p>
                                    <input name="interested" type="radio" id="interested_cat" class = "with-gap" <?= $pet->pet_specie == "feline" ? "checked = \"\"" : "" ?>/>
                                    <label for="interested_cat">Cat</label>
                                </p>
                                <p>
                                    <input name="interested" type="radio" id="interested_dog" class = "with-gap" <?= $pet->pet_specie == "canine" ? "checked = \"\"" : "" ?>/>
                                    <label for="interested_dog">Dog</label>
                                </p>
                            </div>
                            <div class="col s2 green-theme">
                                <span>Size:</span>
                                <p>
                                    <input name="size" type="radio" id="small" class = "with-gap" <?= $pet->pet_size == "small" ? "checked = \"\"" : "" ?> />
                                    <label for="small">S</label>
                                </p>
                                <p>
                                    <input name="size" type="radio" id="medium" class = "with-gap" <?= $pet->pet_size == "medium" ? "checked = \"\"" : "" ?>  />
                                    <label for="medium">M</label>
                                </p>
                                <p>
                                    <input name="size" type="radio" id="large" class = "with-gap" <?= $pet->pet_size == "large" ? "checked = \"\"" : "" ?>  />
                                    <label for="large">L</label>
                                </p>
                                <p>
                                    <input name="size" type="radio" id="xlarge" class = "with-gap" <?= $pet->pet_size == "xlarge" ? "checked = \"\"" : "" ?>  />
                                    <label for="xlarge">XL</label>
                                </p>
                            </div>
                            <div class="input-field col s4 green-theme">
                                <input type="text" class="validate" name = "breed" value="<?= $pet->pet_breed ?>" >
                                <label>Breed/Mix</label>
                            </div>

                            <div class="input-field col s3 green-theme" >
                                <input type="text" class="validate" name = "petage" value="<?= get_age($pet->pet_bday); ?>" >
                                <label>Age</label>
                            </div>
                            <div class="input-field col s12 green-theme" style = "padding-top:40px !important;">
                                <textarea id="description" name="description" class="materialize-textarea" placeholder = " "></textarea>
                                <label for="description" style = "padding-top:40px !important;">Name/description of animal(if animal is available at PARC)</label>
                            </div>
                        </div>
                        <div class ="row">
                            <center>
                                <h6 style = "background:rgba(0,0,0,0.7); font-family: Roboto;" class = "white-text">Questionnaire</h6>
                                <br>
                            </center>
                            <div class="input-field col s6 green-theme">
                                <span>1.) Why did you decide to adopt an animal from PAWS?</span>
                                <textarea id="num1" name="num1" class="materialize-textarea" placeholder=" "></textarea>
                                
                            </div>
                            <div class="col s6 green-theme">
                                <span>2.) Have you adopted from PAWS/PARC atleast once before?</span>
                                <input type="radio" id="num2yes" name = "num2" class = "with-gap num2"/>
                                <label for="num2yes">Yes</label>
                                <input type="radio" id="num2no" name = "num2"  class = "with-gap num2"/>
                                <label for="num2no">No</label>
                                
                                <div id = "num2Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <input id = "num2When" type="text" class = "datepicker" name = "num2ifyes" >
                                            <label for = "num2When">When is the latest?</label>
                                        </div>
                                        <div class = "col s12">
                                            <span>What animal?</span>
                                            <input type="radio" id="num2HiddenDog" name = "ifYesSpecie" class = "with-gap rdbutton"/>
                                            <label for="num2HiddenDog">Dog</label>
                                            <input type="radio" id="num2HiddenCat" name = "ifYesSpecie" class = "with-gap rdbutton"/>
                                            <label for="num2HiddenCat">Cat</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s6">
                                <span>3.) For whom are you adopting animal?</span>
                                <div class = "row">
                                    <div class="col s6 green-theme">
                                        <input type="radio" id="house" name = "num3" class="with-gap num3"/>
                                        <label for="house">House</label><br>
                                        <input type="radio" id="townhouse" name = "num3" class="with-gap num3"/>
                                        <label for="townhouse">Townhouse</label><br>
                                        <input type="radio" id="other" name = "num3" class="with-gap num3"/>
                                        <label for="other">Other</label><br>
                                    </div>
                                    <div class="col s6 green-theme">
                                        <input type="radio" id="apartment" name = "num3" class="with-gap num3"/>
                                        <label for="apartment">Apartment</label><br>
                                        <input type="radio" id="condo" name = "num3" class="with-gap num3"/>
                                        <label for="condo">Condo</label><br>
                                    </div>
                                </div>
                                <div id = "num3Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s11 green-theme">
                                            <input id = "num3Other" type="text" name = "num3Other" >
                                            <label for = "num3Other">Please Specify</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6 green-theme">
                                <span>4.) Do you Rent?</span>
                                <input type="radio" id="num4yes" name = "num4" class = "with-gap num4"/>
                                <label for="num4yes">Yes</label>
                                <input type="radio" id="num4no" name = "num4" class = "with-gap num4"/>
                                <label for="num4no">No</label><br><br>
                                <div id="num4Hidden"  class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <span>Please attach a letter from your landlord granting you permission to keep pets.</span>
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>File</span>
                                                <input type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col s6">
                                <span>5.) Who do you live with?</span>
                                <div class = "row">
                                    <div class="col s6 green-theme">
                                        <input type="radio" id="parents" name = "num5" class="with-gap num5"/>
                                        <label for="parents">Parents</label><br>
                                        <input type="radio" id="children" name = "num5" class="with-gap num5"/>
                                        <label for="children">Children</label><br>
                                        <input type="radio" id="roomates" name = "num5" class="with-gap num5"/>
                                        <label for="roomates">Roomate(s)</label>
                                    </div>
                                    <div class="col s6 green-theme">
                                        <input type="radio" id="spouse" name = "num5" class="with-gap num5"/>
                                        <label for="spouse">Spouse</label><br>
                                        <input type="radio" id="alone" name = "num5" class="with-gap num5"/>
                                        <label for="alone">Alone</label><br>
                                        <input type="radio" id="num5other" name = "num5" class="with-gap num5"/>
                                        <label for="num5other">Other</label>
                                    </div>
                                </div>
                                    <div class = "input-field col s6 green-theme" style = "padding-top:20px !important;">
                                        <input id = "yearslived" type="text" name = "yearslived">
                                        <label for = "yearslived">How long have you lived in this address?</label>
                                    </div>
                                    <div id = "num5Hidden" class = "animated fadeOutUp col s6" style = "visibility: hidden;">
                                        <div class = "row">
                                            <div class = "input-field col s12 green-theme">
                                                <input id = "num5Other" type="text" name = "num5other" >
                                                <label for = "num5Other">Please Specify</label>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="col s6 green-theme">
                                <span>6.) Are you planning to move in the next 6 months?</span>
                                <input type="radio" id="num6yes" name = "num6" class = "with-gap num6"/>
                                <label for="num6yes">Yes</label>
                                <input type="radio" id="num6no" name = "num6"  class = "with-gap num6"/>
                                <label for="num6no">No</label>
                                
                                <div id = "num6Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <textarea id="num6explain" name="num6explain" class="materialize-textarea"></textarea>
                                            <label for = "num6explain">Where?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s6 green-theme">
                                <span>7.) For whom are you adopting animal?</span>
                                <div class = "row">
                                    <div class="col s6">
                                        <input type="radio" id="myself" name = "num7" class = "with-gap num7"/>
                                        <label for="myself">for myself</label><br>
                                        <input type="radio" id="forchildren" name = "num7" class = "with-gap num7"/>
                                        <label for="forchildren">for my children</label><br>
                                    </div>
                                    <div class="col s6">
                                        <input type="radio" id="gift" name = "num7" class = "with-gap num7"/>
                                        <label for="gift">as a gift</label><br>
                                        <input type="radio" id="num7others" name = "num7" class = "with-gap num7"/>
                                        <label for="num7others">Other</label><br>
                                    </div>
                                </div>
                                <div id = "num7Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <input id = "num7specify" type="text"name = "num7specify" >
                                            <label for = "num7specify">Please Specify</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6 green-theme">
                                <span>8.) Are you planning to move in the next 6 months?</span>
                                <input type="radio" id="num8yes" name = "num8" class = "with-gap num8"/>
                                <label for="num8yes">Yes</label>
                                <input type="radio" id="num8no" name = "num8"  class = "with-gap num8"/>
                                <label for="num8no">No</label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s6 green-theme">
                                <span>9.) Is there anyone in your household who has objection(s) to the arrangement?</span><br>
                                <input type="radio"id="num9yes" name = "num9" class = "with-gap num9"/>
                                <label for="num9yes">Yes</label>
                                <input type="radio"id="num9no" name = "num9" class = "with-gap num9"/>
                                <label for="num9no">No</label>
                                <div id = "num9Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <textarea id="num9explain" name="num9explain" class="materialize-textarea"></textarea>
                                            <label for = "num9explain">Explain</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6 green-theme">
                                <span>10.) Are there any children that visit your home frequently?</span><br>
                                <input type="radio"id="num10yes" name = "num10" class = "with-gap num10"/>
                                <label for="num10yes">Yes</label>
                                <input type="radio"id="num10no" name = "num10" class = "with-gap num10"/>
                                <label for="num10no">No</label>
                                <div id = "num10Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <input id = "num10age" type="text"name = "num10age" >
                                            <label for = "num10age">Age Range</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s6 green-theme">
                                <span>11.) Are there any other regular visitors to your home, human or animal, with which your new companion must get along?</span><br>
                                <input type="radio"id="num11yes" name = "num11" class = "with-gap num11"/>
                                <label for="num11yes">Yes</label>
                                <input type="radio"id="num11no" name = "num11" class = "with-gap num11"/>
                                <label for="num11no">No</label>
                                <div id = "num11Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <textarea id="num11explain" name="num11explain" class="materialize-textarea"></textarea>
                                            <label for = "num11explain">Explain</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6 green-theme">
                                <span>12.) Are any members of your household allergic to cats/dogs?</span><br>
                                <input type="radio"id="num12yes" name = "num12" class = "with-gap num12"/>
                                <label for="num12yes">Yes</label>
                                <input type="radio"id="num12no" name = "num12" class = "with-gap num12"/>
                                <label for="num12no">No</label>
                                <div id = "num12Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <input id = "num12age" type="text"name = "num12age" >
                                            <label for = "num12age">Who?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="input-field col s6 green-theme">
                                <span>13.) What will happen to this animal if you have to move unexpectedly?</span>
                                <textarea id="num13" name="num13" class="materialize-textarea"></textarea>
                            </div>
                            <div class="input-field col s6 green-theme">
                                <span>14.) What kind of behavior(s) do you feel unable to accept?</span>
                                <textarea id="num14" name="num14" class="materialize-textarea"></textarea>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="input-field col s6 green-theme">
                                <span>15.) How many hours in an average workday will your companion animal spend without a human?</span>
                                <input type="text" class="validate" name="num15">
                            </div>
                            <div class="input-field col s6 green-theme">
                                <span>16.) What will happen to your companion animal, when you go on a vacation or in case of emergency?</span>
                                <textarea id="num16" name="num16" class="materialize-textarea"></textarea>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s6 green-theme">
                                <span>17.) Do you have regular veterinarian?</span><br>
                                <input type="radio"id="num17yes" name = "num17" class = "with-gap num17"/>
                                <label for="num17yes">Yes</label>
                                <input type="radio"id="num17no" name = "num17" class = "with-gap num17"/>
                                <label for="num17no">No</label>
                                <div id = "num17Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <input id = "num17name" type="text"name = "num17name" >
                                            <label for = "num17name">Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6 green-theme">
                                <span>18.) Do you have other companion animal(s) in the past?</span><br>
                                <input type="radio"id="num18yes" name = "num18" class = "with-gap num18"/>
                                <label for="num18yes">Yes</label>
                                <input type="radio"id="num18no" name = "num18" class = "with-gap num18"/>
                                <label for="num18no">No</label>
                                <div id = "num18Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "col s12 green-theme">
                                            <br><span>What animal?</span>
                                            <input type="radio" id="num18HiddenDog" name = "num18animal" class = "with-gap "/>
                                            <label for="num18HiddenDog">Dog</label>
                                            <input type="radio" id="num18HiddenCat" name = "num18animal" class = "with-gap "/>
                                            <label for="num18HiddenCat">Cat</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s6 green-theme">
                                <span>19.) What part of your house do you want this animal to stay?</span><br> 
                                <input type="radio" id="inside" name = "num19" class = "with-gap"/>
                                <label for="inside">Inside only</label><br>
                                <input type="radio" id="insideoutside" name = "num19" class = "with-gap"/>
                                <label for="insideoutside">Inside/outside</label><br>
                                <input type="radio" id="outside" name = "num19" class = "with-gap"/>
                                <label for="outside">Outside only</label>
                            </div>
                            <div class="input-field col s6 green-theme" style = "margin-top:0 !important;">
                                <span>20.) Where will this animal be kept during the Day? Night?</span>
                                <textarea id="num20" name="num20" class="materialize-textarea"></textarea>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s6 green-theme">
                                <span>21.) Do you have a fenced yard?</span><br>
                                <input type="radio"id="num21yes" name = "num21" class = "with-gap num21"/>
                                <label for="num21yes">Yes</label>
                                <input type="radio"id="num21no" name = "num21" class = "with-gap num21"/>
                                <label for="num21no">No</label>
                                <div id = "num21Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <input id = "num21fence" type="text" name = "num21fence" >
                                            <label for = "num21fence">Fence height and type</label>
                                        </div>
                                    </div>
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="No File Chosen">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6 green-theme">
                                <span>22.) If adopting a dog, does fencing completely enclose the yard?</span><br>
                                <input type="radio"id="num22yes" name = "num22" class = "with-gap num22"/>
                                <label for="num22yes">Yes</label>
                                <input type="radio"id="num22no" name = "num22" class = "with-gap num22"/>
                                <label for="num22no">No</label>
                                <div id = "num22Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class="input-field col s12 green-theme">
                                            <textarea id="num22how" name="num22how" class="materialize-textarea"></textarea>
                                            <label for = "num22how">How will you handle he dog's exercise and toilet duties?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s6 green-theme">
                                <span>23.) If adopting a cat, where will the litterbox be kept?</span>
                                <div class = "row">
                                    <div class="col s6 green-theme">
                                        <input type="radio" id="insidehouse" name = "num23" class = "with-gap num23"/>
                                        <label for="insidehouse">Inside house</label><br>
                                        <input type="radio" id="garage" name = "num23" class = "with-gap num23"/>
                                        <label for="garage">Garage</label>
                                    </div>
                                    <div class="col s6">
                                        <input type="radio" id="noneed" name = "num23" class = "with-gap num23"/>
                                        <label for="noneed">No need</label><br>
                                        <input type="radio" id="other23" name = "num23" class = "with-gap num23"/>
                                        <label for="other23">Other Location</label>
                                    </div>
                                </div>
                                <div id = "num23Hidden" class = "animated fadeOutUp" style = "visibility: hidden;">
                                    <div class = "row">
                                        <div class = "input-field col s12 green-theme">
                                            <input id = "num23location" type="text"name = "num23specify" >
                                            <label for = "num23specify">Please Specify</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s6 green-theme" style = "margin-top:0 !important;">
                                <span>24.) As a matter of policy, PARC will neuter all animals prior to releasing
                                    for adoption. What is your opinion about spaying and neutering (kapon) of companion animals?</span>
                                <textarea id="num24" name="num24" class="materialize-textarea"></textarea>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="input-field col s12 green-theme">
                                <span>25.) Do you have questions and comments?</span>
                                <textarea id="num25" name="num25" class="materialize-textarea"></textarea>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col s2"></div>
                            <div class = "col s8">
                                <p><center><strong>I certify that the above information are true and understand that false information may result in the automative nullification of my proposed adoption. PARC reserves the right to refuse and adoption.</strong></center></p>
                                <center>
                                    <br>
                                    <button class="btn-large waves-effect waves-light green darken-3" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </center>
                            </div>
                            <div class = "col s2"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(".num2").click(function(){
        var isChecked = $("#num2yes").prop("checked");
        if(isChecked){
            $("#num2Hidden").addClass("fadeInDown");
            $("#num2Hidden").css("visibility", "visible");
            $("#num2Hidden").removeClass("fadeOutUp");
        }else{
            $("#num2Hidden").addClass("fadeOutUp");
            $("#num2Hidden").css("visibility", "hidden");
            $("#num2Hidden").removeClass("fadeInDown");
        }
    });
    $(".num3").click(function(){
        var isChecked = $("#other").prop("checked");
        if(isChecked){
            $("#num3Hidden").addClass("fadeInDown");
            $("#num3Hidden").css("visibility", "visible");
            $("#num3Hidden").removeClass("fadeOutUp");
        }else{
            $("#num3Hidden").addClass("fadeOutUp");
            $("#num3Hidden").css("visibility", "hidden");
            $("#num3Hidden").removeClass("fadeInDown");
        }
    });
    $(".num4").click(function(){
        var isChecked = $("#num4yes").prop("checked");
        if(isChecked){
            $("#num4Hidden").addClass("fadeInDown");
            $("#num4Hidden").css("visibility", "visible");
            $("#num4Hidden").removeClass("fadeOutUp");
        }else{
            $("#num4Hidden").addClass("fadeOutUp");
            $("#num4Hidden").css("visibility", "hidden");
            $("#num4Hidden").removeClass("fadeInDown");
        }
    });
    $(".num5").click(function(){
        var isChecked = $("#num5other").prop("checked");
        if(isChecked){
            $("#num5Hidden").addClass("fadeInDown");
            $("#num5Hidden").css("visibility", "visible");
            $("#num5Hidden").removeClass("fadeOutUp");
        }else{
            $("#num5Hidden").addClass("fadeOutUp");
            $("#num5Hidden").css("visibility", "hidden");
            $("#num5Hidden").removeClass("fadeInDown");
        }
    });
    $(".num6").click(function(){
        var isChecked = $("#num6yes").prop("checked");
        if(isChecked){
            $("#num6Hidden").addClass("fadeInDown");
            $("#num6Hidden").css("visibility", "visible");
            $("#num6Hidden").removeClass("fadeOutUp");
        }else{
            $("#num6Hidden").addClass("fadeOutUp");
            $("#num6Hidden").css("visibility", "hidden");
            $("#num6Hidden").removeClass("fadeInDown");
        }
    });
    $(".num7").click(function(){
        var isChecked = $("#num7others").prop("checked");
        if(isChecked){
            $("#num7Hidden").addClass("fadeInDown");
            $("#num7Hidden").css("visibility", "visible");
            $("#num7Hidden").removeClass("fadeOutUp");
        }else{
            $("#num7Hidden").addClass("fadeOutUp");
            $("#num7Hidden").css("visibility", "hidden");
            $("#num7Hidden").removeClass("fadeInDown");
        }
    });
    $(".num9").click(function(){
        var isChecked = $("#num9yes").prop("checked");
        if(isChecked){
            $("#num9Hidden").addClass("fadeInDown");
            $("#num9Hidden").css("visibility", "visible");
            $("#num9Hidden").removeClass("fadeOutUp");
        }else{
            $("#num9Hidden").addClass("fadeOutUp");
            $("#num9Hidden").css("visibility", "hidden");
            $("#num9Hiddens").removeClass("fadeInDown");
        }
    });
    $(".num10").click(function(){
        var isChecked = $("#num10yes").prop("checked");
        if(isChecked){
            $("#num10Hidden").addClass("fadeInDown");
            $("#num10Hidden").css("visibility", "visible");
            $("#num10Hidden").removeClass("fadeOutUp");
        }else{
            $("#num10Hidden").addClass("fadeOutUp");
            $("#num10Hidden").css("visibility", "hidden");
            $("#num10Hidden").removeClass("fadeInDown");
        }
    });
    $(".num11").click(function(){
        var isChecked = $("#num11yes").prop("checked");
        if(isChecked){
            $("#num11Hidden").addClass("fadeInDown");
            $("#num11Hidden").css("visibility", "visible");
            $("#num11Hidden").removeClass("fadeOutUp");
        }else{
            $("#num11Hidden").addClass("fadeOutUp");
            $("#num11Hidden").css("visibility", "hidden");
            $("#num11Hidden").removeClass("fadeInDown");
        }
    });
    $(".num12").click(function(){
        var isChecked = $("#num12yes").prop("checked");
        if(isChecked){
            $("#num12Hidden").addClass("fadeInDown");
            $("#num12Hidden").css("visibility", "visible");
            $("#num12Hidden").removeClass("fadeOutUp");
        }else{
            $("#num12Hidden").addClass("fadeOutUp");
            $("#num12Hidden").css("visibility", "hidden");
            $("#num12Hidden").removeClass("fadeInDown");
        }
    });
    $(".num17").click(function(){
        var isChecked = $("#num17yes").prop("checked");
        if(isChecked){
            $("#num17Hidden").addClass("fadeInDown");
            $("#num17Hidden").css("visibility", "visible");
            $("#num17Hidden").removeClass("fadeOutUp");
        }else{
            $("#num17Hidden").addClass("fadeOutUp");
            $("#num17Hidden").css("visibility", "hidden");
            $("#num17Hidden").removeClass("fadeInDown");
        }
    });
    $(".num18").click(function(){
        var isChecked = $("#num18yes").prop("checked");
        if(isChecked){
            $("#num18Hidden").addClass("fadeInDown");
            $("#num18Hidden").css("visibility", "visible");
            $("#num18Hidden").removeClass("fadeOutUp");
        }else{
            $("#num18Hidden").addClass("fadeOutUp");
            $("#num18Hidden").css("visibility", "hidden");
            $("#num18Hidden").removeClass("fadeInDown");
        }
    });
    $(".num21").click(function(){
        var isChecked = $("#num21yes").prop("checked");
        if(isChecked){
            $("#num21Hidden").addClass("fadeInDown");
            $("#num21Hidden").css("visibility", "visible");
            $("#num21Hidden").removeClass("fadeOutUp");
        }else{
            $("#num21Hidden").addClass("fadeOutUp");
            $("#num21Hidden").css("visibility", "hidden");
            $("#num21Hidden").removeClass("fadeInDown");
        }
    });
    $(".num22").click(function(){
        var isChecked = $("#num22no").prop("checked");
        if(isChecked){
            $("#num22Hidden").addClass("fadeInDown");
            $("#num22Hidden").css("visibility", "visible");
            $("#num22Hidden").removeClass("fadeOutUp");
        }else{
            $("#num22Hidden").addClass("fadeOutUp");
            $("#num22Hidden").css("visibility", "hidden");
            $("#num22Hidden").removeClass("fadeInDown");
        }
    });
    $(".num23").click(function(){
        var isChecked = $("#other23").prop("checked");
        if(isChecked){
            $("#num23Hidden").addClass("fadeInDown");
            $("#num23Hidden").css("visibility", "visible");
            $("#num23Hidden").removeClass("fadeOutUp");
        }else{
            $("#num23Hidden").addClass("fadeOutUp");
            $("#num23Hidden").css("visibility", "hidden");
            $("#num23Hidden").removeClass("fadeInDown");
        }
    });
</script>


