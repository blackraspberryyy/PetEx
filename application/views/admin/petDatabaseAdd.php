<?php if(validation_errors()){include 'includes/toastErrorsPetRegistry.php';}?>

<div class ="side-nav-offset" >
    <div class ="container ">
        <form action = "petDatabaseAdd_exec" enctype="multipart/form-data" method = "POST" runat="server">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="col s12">
                        <a href="<?= $this->config->base_url() ?>admin/petDatabase" class="breadcrumb">Pet Database</a>
                        <a href="<?= $wholeUrl ?>" class="breadcrumb">Pet Registration</a>
                    </div>
                </nav>
                <div class="card-content ">
                    <div class ="col s12">
                        <div class="card grey lighten-4">
                            <div class="card-content row">
                                <div class="input-field col s6 <?php if (!empty(form_error("pet_name"))): ?>error-theme<?php else: ?>green-theme<?php endif;?>">
                                    <input id="pet_name" type="text" class="" name = "pet_name" autofocus="" value="<?= set_value('pet_name')?>">
                                    <label for="pet_name">Pet Name</label>
                                </div>
                                <div class = "input-field col s6 <?php if (!empty(form_error("pet_bday"))): ?>error-theme<?php else: ?>green-theme<?php endif;?>">
                                    <input type="text" class="datepicker" name = "pet_bday" value="<?= set_value('pet_bday')?>">
                                    <label for="pet_bday">Birthdate</label>
                                </div>
                                <div class="input-field col s6 <?php if (!empty(form_error("pet_breed"))): ?>error-theme<?php else: ?>green-theme<?php endif;?>">
                                    <input id="pet_breed" type="text" class="" name = "pet_breed" value="<?= set_value('pet_breed')?>">
                                    <label for="pet_breed">Breed</label>
                                </div>
                                <div id = "petStatus" class ="col s6 row">
                                    <div class = "col s12">
                                        <center><span class="card-title">Pet Status</span></center>
                                    </div>
                                    <div class="col s6 green-theme">
                                        <input class = "with-gap" name="pet_status" type="radio" id="adoptable" value = "Adoptable" checked <?php echo  set_radio('pet_status', 'Adoptable'); ?>/>
                                        <label for="adoptable">Adoptable</label>
                                    </div>
                                    <div class="col s6 green-theme">
                                        <input class = "with-gap" name="pet_status" type="radio" id="nonAdoptable" value = "nonAdoptable" <?php echo  set_radio('pet_status', 'nonAdoptable'); ?>/>
                                        <label for="nonAdoptable" >Non-Adoptable</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col s6">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <div class="input-field <?php if (!empty(form_error("pet_description"))): ?>error-theme<?php else: ?>green-theme<?php endif;?>">
                                    <textarea id="textarea" class="materialize-textarea" name = "pet_description" ><?= set_value('pet_description')?></textarea>
                                    <label for="textarea">Pet Description</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col s6">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <div class="input-field green-theme">
                                    <textarea id="textarea2" class="materialize-textarea" name = "pet_history" ><?= set_value('pet_history')?></textarea>
                                    <label for="textarea2">Findings</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="col s3 green-theme">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <span class = "card-title">Sex</span><br>
                                <input class = "with-gap" name="pet_sex" type="radio" id="male" value = "male" checked <?php echo  set_radio('pet_sex', 'male'); ?>/>
                                <label for="male">Male</label><br>
                                <input class = "with-gap" name="pet_sex" type="radio" id="female" value = "female" <?php echo  set_radio('pet_sex', 'female'); ?>/>
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class ="col s3 green-theme">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <span class = "card-title">Specie</span><br>
                                <input class = "with-gap" name="pet_specie" type="radio" id="canine" value = "canine" checked <?php echo  set_radio('pet_specie', 'canine'); ?>/>
                                <label for="canine">Canine</label><br>
                                <input class = "with-gap" name="pet_specie" type="radio" id="feline" value = "feline" <?php echo  set_radio('pet_specie', 'feline'); ?>/>
                                <label for="feline">Feline</label>
                            </div>
                        </div>
                    </div>
                    <div class ="col s3 green-theme">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <span class = "card-title">Admission</span><br>
                                <input class = "with-gap" name="pet_admission" type="radio" id="foster" value = "foster" checked <?php echo set_radio('pet_admission', 'foster'); ?>/>
                                <label for="foster">Foster</label><br>
                                <input class = "with-gap" name="pet_admission" type="radio" id="parc" value = "parc" <?php echo set_radio('pet_admission', 'parc'); ?>/>
                                <label for="parc">PARC</label>
                            </div>
                        </div>
                    </div>
                    <div class ="col s3 green-theme">
                        <div class="card grey lighten-4">
                            <div class="card-content ">
                                <span class = "card-title">Sterilized</span><br>
                                <input class = "with-gap" name="pet_neutered_spayed" type="radio" id="yes" value = "1" checked <?php echo set_radio('pet_neutered_spayed', '1'); ?>/>
                                <label for="yes">Yes</label><br>
                                <input class = "with-gap" name="pet_neutered_spayed" type="radio" id="no" value = "0" <?php echo set_radio('pet_neutered_spayed', '1'); ?>/>
                                <label for="no">No</label>
                            </div>
                        </div>
                    </div>
                    <div class = "col s8 ">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <span class="card-title">Upload a Picture</span>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" id = "files" name = "pet_picture">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path " type="text" placeholder = "No File Chosen">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col s4">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <center>
                                    <img class = "controlImgSize" src = "<?= $this->config->base_url()?>images/tools/upload_image.png" id = "prev_image" /><br><br>
                                    <span class = "grey-text card-title" id = "nofilechosen">No File Chosen</span>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "card-content right">
                    <button class="btn-large waves-effect waves-light red" type="reset" name="action">Reset
                        <i class="material-icons right">replay</i>
                    </button>
                    <button class="btn-large waves-effect waves-light green darken-3" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
