<?php
if (validation_errors()) {
    include 'includes/toastErrorsMedicalAdd.php';
}
?>

<div class ="side-nav-offset">
    <div class ="container ">
        <form action = "<?= $this->config->base_url() ?>admin/petDatabaseAddMedical_exec/<?= $records?>" enctype="multipart/form-data" method = "POST" runat="server">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="col s12">
                        <a href="<?= $this->config->base_url() ?>admin/petDatabaseMedicalRecords/<?= $records?>" class="breadcrumb">Medical Records</a>
                        <a href="<?= $wholeUrl ?>" class="breadcrumb">Add Medical Record</a>
                    </div>
                </nav>
                <div class="card-content ">
                    <div class ="col s12">
                        <div class="card grey lighten-4">
                            <div class="card-content row">
                                <div class="input-field col s12 <?php if (!empty(form_error("weight"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                    <input id="weight" type="text" class="" name = "weight"  autofocus="" value="<?= set_value('weight') ?>">
                                    <label for="weight">Weight</label>
                                </div>
                                <div class = "col s12">
                                    <div class="input-field <?php if (!empty(form_error("diagnosis"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                        <textarea id="textarea" class="materialize-textarea" name = "diagnosis"><?= set_value('diagnosis') ?></textarea>
                                        <label for="textarea">Diagnosis</label>
                                    </div>
                                </div>
                                <div class = "col s12">
                                    <div class="input-field <?php if (!empty(form_error("treatment"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                        <textarea id="textarea" class="materialize-textarea" name = "treatment"><?= set_value('treatment') ?></textarea>
                                        <label for="textarea">Treatment</label>
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

