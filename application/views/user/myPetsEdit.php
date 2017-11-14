<?php
if (validation_errors()) {
    include 'includes/toastErrorsPetEdit.php';
}
?>
<?php $pet = $pet[0] ?>
<main>
    <div class ="side-nav-offset">
        <div class ="container ">
            <form action = "<?= $this->config->base_url() ?>user/myPetsEdit_exec/<?= $pet->pet_id ?>" enctype="multipart/form-data" method = "POST" runat="server">
                <div class = "card row">
                    <nav class = "green darken-3">
                        <div class="col s12">
                            <a href="<?= $this->config->base_url() ?>user/myPets" class="breadcrumb">My Pets</a>
                            <a href="<?= $wholeUrl ?>" class="breadcrumb">Update Pet Details</a>
                        </div>
                    </nav>
                    <div class="card-content ">
                        <div class ="col s12">
                            <div class="card grey lighten-4">
                                <div class="card-content row">
                                    <div class="input-field col s6 <?php if (!empty(form_error("pet_name"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                        <input id="pet_name" type="text" class="" name = "pet_name"  autofocus="" value = "<?= set_value('pet_name', $pet->pet_name); ?>">
                                        <label for="pet_name">Pet Name</label>
                                    </div>
                                    <div class = "input-field col s6 <?php if (!empty(form_error("pet_bday"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                        <input type="text" class="datepicker" name = "pet_bday"  value = "<?= set_value('pet_bday', date("F d, Y", $pet->pet_bday)); ?>">
                                        <label for="pet_bday">Birthdate</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "col s6">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <div class="input-field <?php if (!empty(form_error("pet_description"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                        <textarea id="textarea" class="materialize-textarea" name = "pet_description"><?= set_value('pet_description', $pet->pet_description); ?></textarea>
                                        <label for="textarea">Pet Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "col s6">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <div class="input-field <?php if (!empty(form_error("pet_description"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                        <textarea id="textarea2" class="materialize-textarea" name = "pet_history"><?= set_value('pet_history', $pet->pet_history); ?></textarea>
                                        <label for="textarea2">Findings</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "col s12">
                            <div class="card grey lighten-4">
                                <div class="card-content">
                                    <span class="card-title">Pet Picture</span>
                                    <center>
                                        <img class = "previewImageControlSize z-depth-5"  style = "border-radius: 10px;" src = "<?= $this->config->base_url() . $pet->pet_picture ?>" id = "prev_image" /><br>
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
</main>
<script>
    $('#btnReset').click(function () {
        $('#prev_image').attr('src', '<?= $this->config->base_url() . $pet->pet_picture ?>');
    });
</script>