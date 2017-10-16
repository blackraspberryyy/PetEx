<?php if(validation_errors()){include 'includes/toastErrorsPetRegistry.php';}?>
<?php $pet = $pet[0]?>
<div class ="side-nav-offset">
    <div class ="container ">
        <form action = "<?= $this->config->base_url()?>admin/petDatabaseUpdate_exec/<?= $pet->pet_id?>" enctype="multipart/form-data" method = "POST" runat="server">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="col s12">
                        <a href="<?= $this->config->base_url()?>admin/petDatabase" class="breadcrumb">Pet Database</a>
                        <a href="<?= $wholeUrl?>" class="breadcrumb">Update Pet Details</a>
                    </div>
                </nav>
                <div class="card-content ">
                    <div class ="col s12">
                            <div class="card grey lighten-4">
                                <div class="card-content row">
                                    <div class="input-field col s6 <?php if (!empty(form_error("pet_name"))): ?>error-theme<?php else: ?>green-theme<?php endif;?>">
                                        <input id="pet_name" type="text" class="" name = "pet_name"  autofocus="" value = "<?= set_value('pet_name', $pet->pet_name);?>">
                                        <label for="pet_name">Pet Name</label>
                                    </div>
                                    <div class = "input-field col s6 <?php if (!empty(form_error("pet_bday"))): ?>error-theme<?php else: ?>green-theme<?php endif;?>">
                                        <input type="text" class="datepicker" name = "pet_bday"  value = "<?= set_value('pet_bday', date("F d, Y", $pet->pet_bday));?>">
                                        <label for="pet_bday">Birthdate</label>
                                    </div>
                                    <div class="input-field col s6 <?php if (!empty(form_error("pet_breed"))): ?>error-theme<?php else: ?>green-theme<?php endif;?>">
                                        <input id="pet_breed" type="text" class="" name = "pet_breed"  value = "<?= set_value('pet_breed', $pet->pet_breed);?>">
                                        <label for="pet_breed">Breed</label>
                                    </div>
                                    <div id = "petStatus" class ="col s6 row">
                                        <div class = "col s12">
                                            <center><span class="card-title">Pet Status</span></center>
                                        </div>
                                        <div class="col s6">
                                            <input class = "with-gap" name="pet_status" type="radio" id="adoptable" value = "Adoptable" <?= $pet->pet_status == 'adoptable'? "checked":"" ;?>/>
                                            <label for="adoptable">Adoptable</label>
                                        </div>
                                        <div class="col s6">
                                            <input class = "with-gap" name="pet_status" type="radio" id="nonAdoptable" value = "nonAdoptable" <?= $pet->pet_status == 'nonAdoptable'? "checked":"" ;?>/>
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
                                        <textarea id="textarea" class="materialize-textarea" name = "pet_description"><?= set_value('pet_description', $pet->pet_description);?></textarea>
                                        <label for="textarea">Pet Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "col s6">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <div class="input-field">
                                        <textarea id="textarea2" class="materialize-textarea" name = "pet_history"><?= $pet->pet_history;?></textarea>
                                        <label for="textarea2">Findings</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class ="col s3">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <span class = "card-title">Sex</span><br>
                                    <input class = "with-gap" name="pet_sex" type="radio" id="male" value = "male" <?= $pet->pet_sex == 'male'? "checked":"" ;?>/>
                                    <label for="male">Male</label><br>
                                    <input class = "with-gap" name="pet_sex" type="radio" id="female" value = "female" <?= $pet->pet_sex == 'female'? "checked":"" ;?>/>
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class ="col s3">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <span class = "card-title">Specie</span><br>
                                    <input class = "with-gap" name="pet_specie" type="radio" id="canine" value = "canine" <?= $pet->pet_specie == 'canine'? "checked":"" ;?>/>
                                    <label for="canine">Canine</label><br>
                                    <input class = "with-gap" name="pet_specie" type="radio" id="feline" value = "feline" <?= $pet->pet_specie == 'feline'? "checked":"" ;?>/>
                                    <label for="feline">Feline</label>
                                </div>
                            </div>
                        </div>
                        <div class ="col s3">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <span class = "card-title">Admission</span><br>
                                    <input class = "with-gap" name="pet_admission" type="radio" id="foster" value = "foster" <?= $pet->pet_admission == 'foster'? "checked":"" ;?>/>
                                    <label for="foster">Foster</label><br>
                                    <input class = "with-gap" name="pet_admission" type="radio" id="parc" value = "parc" <?= $pet->pet_admission == 'parc'? "checked":"" ;?>/>
                                    <label for="parc">PARC</label>
                                </div>
                            </div>
                        </div>
                        <div class ="col s3">
                            <div class="card grey lighten-4 ">
                                <div class="card-content ">
                                    <span class = "card-title">Sterilized</span><br>
                                    <input class = "with-gap" name="pet_neutered_spayed" type="radio" id="yes" value = "1" <?= $pet->pet_neutered_spayed == 1? "checked":"" ;?>/>
                                    <label for="yes">Yes</label><br>
                                    <input class = "with-gap" name="pet_neutered_spayed" type="radio" id="no" value = "0" <?= $pet->pet_neutered_spayed == 0? "checked":"" ;?>/>
                                    <label for="no">No</label>
                                </div>
                            </div>
                        </div>
                        <div class = "col s12">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <span class="card-title">Pet Picture</span>
                                    <center>
                                        <img class = "previewImageControlSize z-depth-5"  style = "border-radius: 10px;" src = "<?= $this->config->base_url().$pet->pet_picture?>" id = "prev_image" /><br><br>
                                        <span class = "grey-text card-title" id = "nofilechosen"></span>
                                    </center>
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" id = "files" name = "pet_picture" >
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path" type="text" placeholder = "No File Chosen">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    <div class = "card-content">
                        <div class ="row">
                            <div class ="col s6">
                                <button class="btn-large waves-effect waves-light white black-text" type="button" onclick = "window.history.back();">Back
                                    <i class="material-icons left">arrow_back</i>
                                </button>
                            </div>
                            <div class ="col s6">
                                <button class="btn-large waves-effect waves-light green darken-3 right" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn-large waves-effect waves-light red right" type="reset" name="action">Reset
                                    <i class="material-icons right">replay</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $('#btnReset').click(function(){
        $('#prev_image').attr('src', '<?= $this->config->base_url().$pet->pet_picture?>');
    });
</script>