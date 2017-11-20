<style>
    .image-circle-cropper {
        width: 200px;
        height: 200px;
        position: relative;
        overflow: hidden;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        border-radius: 50%;
        border:2px solid white;
    }
    .profileImgStyle{
        display: inline;
        margin: 0 auto;
        height: 100%;
        width: auto;
    }
</style>
<div class ="side-nav-offset">
    <div class ="container ">
        <?php $number = 1; ?>
        <?php if (!$records): ?>
        <div class = "card row">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= $this->config->base_url() ?>admin/petDatabase" class="breadcrumb">Pet Database</a>
                    <a href="<?= $wholeUrl ?>" class="breadcrumb">Medical Records</a>
                </div>
            </nav>
            <div class="card-content">
                <center>
                    <h5 class = "grey-text darken-5">THIS PET HAS NO MEDICAL RECORDS</h5>
                </center>
            </div>
        </div>
        <?php else: ?>
            <div class = "col s12">
                <br>
                <?php foreach ($records as $record): ?>
                    <center>
                        <div class = "image-circle-cropper z-depth-2">
                            <img src="<?= $this->config->base_url() . $record->pet_picture ?>" class = "profileImgStyle">
                        </div>
                        <br>
                        <h4><?= $record->pet_name?></h4>
                    </center>
                    <?php break; ?>
                <?php endforeach; ?>
            </div>

            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="col s12">
                        <a href="<?= $this->config->base_url() ?>admin/petDatabase" class="breadcrumb">Pet Database</a>
                        <a href="<?= $wholeUrl ?>" class="breadcrumb">Medical Records</a>
                    </div>
                </nav>
                <div class="card-content ">

                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>Medical Record No.</th>
                                <th>Date</th>
                                <th>Weight</th>
                                <th>Diagnosis</th>
                                <th>Treatment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $record): ?>
                                <tr>
                                    <td><?= $number ?></td>
                                    <td><?= date("F d, Y", $record->medicalRecord_date); ?></td>
                                    <td><?= $record->medicalRecord_weight ?> kg</td>
                                    <td><?= $record->medicalRecord_diagnosis ?></td>
                                    <td><?= $record->medicalRecord_treatment ?></td>
                                    <td>
                                        <a href="<?= $this->config->base_url() ?>admin/petDatabaseEditMedical/<?= $record->medicalRecord_id ?>/<?= $record->pet_id ?>"  class="btn waves-effect tooltipped waves-light orange darken-3" data-position="bottom" data-delay="50" data-tooltip="Edit Medical Record">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href ="#remove<?= $record->medicalRecord_id ?>" class = "btn waves-effect tooltipped waves-light red darken-3 modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Remove Medical Record">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <!--Remove Medical Record Modal-->
                            <div id="remove<?= $record->medicalRecord_id ?>" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h4><i class = "fa fa-warning"></i>Warning</h4>
                                    <p style = "font-weight:bold;">You are about to remove this Medical Record from the database.</p>
                                    <br>
                                    <div class ="row">
                                        <div class ="col s12">
                                            <div class="col s4">
                                                <h5>Pet ID : </h5>
                                            </div>
                                            <div class="col s6">
                                                <h5><?= $record->pet_name; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class ="row">
                                        <div class ="col s12">
                                            <div class="col s4">
                                                <h5>Date : </h5>                               
                                            </div>
                                            <div class="col s6">
                                                <h5><?= $record->medicalRecord_date; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class ="row">
                                        <div class ="col s12">
                                            <div class="col s4">
                                                <h5>Weight : </h5>                   
                                            </div>
                                            <div class="col s6">
                                                <h5><?= $record->medicalRecord_weight; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class ="row">
                                        <div class ="col s12">
                                            <div class="col s4">
                                                <h5>Diagnosis : </h5>                   
                                            </div>
                                            <div class="col s6">
                                                <h5><?= $record->medicalRecord_diagnosis; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class ="row">
                                        <div class ="col s12">
                                            <div class="col s4">
                                                <h5>Treatment : </h5>                   
                                            </div>
                                            <div class="col s6">
                                                <h5><?= $record->medicalRecord_treatment ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
                                    <a href="<?= base_url() ?>admin/petDatabaseDeleteMedical/<?= $record->medicalRecord_id ?>/<?= $record->pet_id ?>" class="modal-action modal-close waves-effect waves-green btn-flat ">Remove</a>
                                </div>
                            </div>
                            <?php $number++; ?>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
                
                <?= $links?>
            </div>
        <?php endif; ?>
        <a href="<?= $this->config->base_url() ?>admin/petDatabaseAddMedical/<?= $this->session->userdata("petid_medical") ?>" class="btn waves-effect waves-light blue darken-3 modal-trigger right">Add
            <i class="material-icons right">note_add</i>
        </a>
        <br>
        <br>
        <br>
    </div>
</div>
