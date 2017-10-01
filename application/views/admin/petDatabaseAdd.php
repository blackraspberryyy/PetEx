<div class ="side-nav-offset">
    <div class ="container ">
        <form action = "petDatabaseAdd_exec" enctype="multipart/form-data" method = "POST">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="col s12">
                        <a href="<?= $this->config->base_url()?>admin/petDatabase" class="breadcrumb">Pet Database</a>
                        <a href="<?= $wholeUrl?>" class="breadcrumb">Pet Registration</a>
                    </div>
                </nav>
                <div class="card-content ">
                    <div class ="col s12">
                        <div class="card grey lighten-4">
                            <div class="card-content row">
                                <div class="input-field col s6">
                                    <input id="pet_name" type="text" class="validate" name = "pet_name" required autofocus="">
                                    <label for="pet_name">Pet Name</label>
                                </div>
                                <div class = "input-field col s6">
                                    <input type="text" class="datepicker" name = "pet_bday" required>
                                    <label for="pet_bday">Birthdate</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="pet_breed" type="text" class="validate" name = "pet_breed" required>
                                    <label for="pet_breed">Breed</label>
                                </div>
                                <div id = "petStatus" class ="col s6 row">
                                    <div class = "col s12">
                                        <center><span class="card-title">Pet Status</span></center>
                                    </div>
                                    <div class="col s6">
                                        <input class = "with-gap" name="pet_status" type="radio" id="adoptable" value = "Adoptable" checked/>
                                        <label for="adoptable">Adoptable</label>
                                    </div>
                                    <div class="col s6">
                                        <input class = "with-gap" name="pet_status" type="radio" id="nonAdoptable" value = "nonAdoptable"/>
                                        <label for="nonAdoptable" >Non-Adoptable</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col s6">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <div class="input-field">
                                    <textarea id="textarea" class="materialize-textarea" name = "pet_description" required></textarea>
                                    <label for="textarea">Pet Description</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col s6">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <div class="input-field">
                                    <textarea id="textarea2" class="materialize-textarea" name = "pet_history"></textarea>
                                    <label for="textarea2">Findings</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class ="col s3">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <span class = "card-title">Sex</span><br>
                                <input class = "with-gap" name="pet_sex" type="radio" id="male" value = "male" checked/>
                                <label for="male">Male</label><br>
                                <input class = "with-gap" name="pet_sex" type="radio" id="female" value = "female"/>
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class ="col s3">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <span class = "card-title">Specie</span><br>
                                <input class = "with-gap" name="pet_specie" type="radio" id="canine" value = "canine" checked/>
                                <label for="canine">Canine</label><br>
                                <input class = "with-gap" name="pet_specie" type="radio" id="feline" value = "feline"/>
                                <label for="feline">Feline</label>
                            </div>
                        </div>
                    </div>
                    <div class ="col s3">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <span class = "card-title">Admission</span><br>
                                <input class = "with-gap" name="pet_admission" type="radio" id="foster" value = "foster" checked/>
                                <label for="foster">Foster</label><br>
                                <input class = "with-gap" name="pet_admission" type="radio" id="parc" value = "parc"/>
                                <label for="parc">PARC</label>
                            </div>
                        </div>
                    </div>
                    <div class ="col s3">
                        <div class="card grey lighten-4 ">
                            <div class="card-content ">
                                <span class = "card-title">Sterilized</span><br>
                                <input class = "with-gap" name="pet_neutered_spayed" type="radio" id="yes" value = "1" checked/>
                                <label for="yes">Yes</label><br>
                                <input class = "with-gap" name="pet_neutered_spayed" type="radio" id="no" value = "0"/>
                                <label for="no">No</label>
                            </div>
                        </div>
                    </div>
                    <div class = "col s8">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <span class="card-title">Upload a Picture</span>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" id = "files" name = "pet_picture">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder = "No File Chosen">
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col s4">
                        <div class="card grey lighten-4">
                            <div class="card-content">
                                <center>

                                    <img class = "controlImgSize" src = "" id = "prev_image" />

                                    <i class="fa fa-image fa-5x grey-text"></i><br>
                                    <span class = "grey-text card-title">No File Chosen</span>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "card-content right">
                    <button class="btn-large waves-effect waves-light red" type="reset" name="action">Reset
                        <i class="material-icons right">replay</i>
                    </button>
                    <button class="btn-large waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>