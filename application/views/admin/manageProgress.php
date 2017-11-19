<style>
    ul.stepper .step-content{
        height: calc(50% - 132px);
    }
    ul.stepper:not(.horizontal) .step.active::before, ul.stepper:not(.horizontal) .step.done::before, ul.stepper.horizontal .step.active .step-title::before, ul.stepper.horizontal .step.done .step-title::before {
        background-color: #388e3c !important;
    }
</style>

<div class ="side-nav-offset">
    <div class ="container">
        <div class = "card row" style = "margin-bottom:20px !important;">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= base_url() ?>admin/petDatabase" class="breadcrumb">Pet Database</a>
                    <a href="<?= base_url() ?>admin/petDatabaseAdopters_exec/<?= $selectedtransaction->pet_id ?>" class="breadcrumb">Interested Pet Adopters</a>
                    <a href="<?= $wholeUrl ?>" class="breadcrumb">Manage Progress</a>
                </div>
            </nav>
            <div class="card-content ">
                <div class ="row" >
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <ul class="stepper linear horizontal" style="min-height:458px">
                                    <li class="step" id = "step1">
                                        <div class="step-title waves-effect waves-dark">Step 1</div>
                                        <div class="step-content">
                                            <div class="row">
                                                <center>
                                                    <h4>Adoption Application Form</h4>
                                                </center>
                                            </div>
                                            <div class="step-actions">
                                                <a class="waves-effect waves-dark btn green darken-4 modal-trigger" href="#step1_modal">STEP 2</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step" id = "step2">
                                        <div class="step-title waves-effect waves-dark">Step 2</div>
                                        <div class="step-content">
                                            <div class="row">
                                                <center>
                                                    <h4>Meet And Greet</h4>
                                                </center>
                                            </div>
                                            <div class="step-actions">
                                                <a class="waves-effect waves-dark btn green darken-4 modal-trigger" href="#step2_modal">STEP 3</a>
                                                <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step" id = "step3">
                                        <div class="step-title waves-effect waves-dark">Step 3</div>
                                        <div class="step-content">
                                            <div class="row">
                                                <center>
                                                    <h4>Interview</h4>
                                                </center>
                                            </div>
                                            <div class="step-actions">
                                                <a class="waves-effect waves-dark btn green darken-4 modal-trigger" href="#step3_modal">STEP 4</a>
                                                <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step" id = "step4">
                                        <div class="step-title waves-effect waves-dark">Step 4</div>
                                        <div class="step-content">
                                            <div class="row">
                                                <center>
                                                    <h4>Ocular Visit</h4>
                                                </center>
                                            </div>
                                            <div class="step-actions">
                                                <a class="waves-effect waves-dark btn green darken-4 modal-trigger" href="#step4_modal">STEP 5</a>
                                                <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step" id = "step5">
                                        <div class="step-title waves-effect waves-dark">Step 5</div>
                                        <div class="step-content">
                                            <div class="row">
                                                <center>
                                                    <h4>Final Visit</h4>
                                                </center>
                                            </div>
                                            <div class="step-actions">
                                                <a class="waves-effect waves-dark btn green darken-4 modal-trigger" href="#step5_modal">FINISH TRANSACTION</a>
                                                <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--PROGRESS 1-->
        <div id="step1_modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4><i class="fa fa-warning"></i> Notice</h4>
                <p>You are about to move the transaction of <b><?= $selectedtransaction->user_username?></b>  to the next level (<b>Step 2 : </b>Meet and Greet).</p>
                <ul class = "collection" style = "padding-right:20px;">
                    <li class = "collection-item">Make sure that the user followed the necessary requirements.<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                <a href="<?= base_url()?>admin/updateProgress_exec/20" class="modal-action modal-close waves-effect waves-green btn-flat next-step green-text">Agree</a>
            </div>
        </div>
        <!--PROGRESS 2-->
        <div id="step2_modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4><i class="fa fa-warning"></i> Notice</h4>
                <p>You are about to move the transaction of <b><?= $selectedtransaction->user_username?></b>  to the next level (<b>Step 3 : </b>Interview).</p>
                <ul class = "collection" style = "padding-right:20px;">
                    <li class = "collection-item">Make sure that the user followed the necessary requirements.<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                <a href="<?= base_url()?>admin/updateProgress_exec/40" class="modal-action modal-close waves-effect waves-green btn-flat next-step green-text">Agree</a>
            </div>
        </div>
        <!--PROGRESS 3-->
        <div id="step3_modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4><i class="fa fa-warning"></i> Notice</h4>
                <p>You are about to move the transaction of <b><?= $selectedtransaction->user_username?></b>  to the next level (<b>Step 4 : </b>Ocular Visit).</p>
                <ul class = "collection" style = "padding-right:20px;">
                    <li class = "collection-item">Make sure that the user followed the necessary requirements.<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                <a href="<?= base_url()?>admin/updateProgress_exec/60" class="modal-action modal-close waves-effect waves-green btn-flat next-step green-text">Agree</a>
            </div>
        </div>
        <!--PROGRESS 4-->
        <div id="step4_modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4><i class="fa fa-warning"></i> Notice</h4>
                <p>You are about to move the transaction of <b><?= $selectedtransaction->user_username?></b>  to the next level (<b>Step 5 : </b>Final Visit).</p>
                <ul class = "collection" style = "padding-right:20px;">
                    <li class = "collection-item">Make sure that the user followed the necessary requirements.<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                <a href="<?= base_url()?>admin/updateProgress_exec/80" class="modal-action modal-close waves-effect waves-green btn-flat next-step green-text">Agree</a>
            </div>
        </div>
        <!--PROGRESS 5-->
        <div id="step5_modal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4><i class="fa fa-warning"></i> Notice</h4>
                <p>You are about to move the transaction of <b><?= $selectedtransaction->user_username?></b> to the next level (<b>Step 5 : </b>Final Visit).</p>
                <ul class = "collection" style = "padding-right:20px;">
                    <li class = "collection-item">Make sure that the user followed the necessary requirements.<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                    <li class = "collection-item">Some Text<a href="#" style = "cursor:none; pointer-events: none;" class="secondary-content"><i class="material-icons green-text">check</i></a></li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                <a href="<?= base_url()?>admin/updateProgress_exec/100" class="modal-action modal-close waves-effect waves-green btn-flat next-step green-text">Agree</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('.stepper').activateStepper({
            linearStepsNavigation: false, //allow navigation by clicking on the next and previous steps on linear steppers
            autoFocusInput: true, //since 2.1.1, stepper can auto focus on first input of each step
            autoFormCreation: true, //control the auto generation of a form around the stepper (in case you want to disable it)
            showFeedbackLoader: true //set if a loading screen will appear while feedbacks functions are running
        });
    });
</script>
<script>
    switch (<?= $selectedtransaction->transaction_progress ?>) {
        case 0:
        {
            $("#step1").addClass("active");
            break;
        }
        case 20:
        {
            $("#step1").addClass("done");
            $("#step2").addClass("active");
            break;
        }
        case 40:
        {
            $("#step1").addClass("done");
            $("#step2").addClass("done");
            $("#step3").addClass("active");
            break;
        }
        case 60:
        {
            $("#step1").addClass("done");
            $("#step2").addClass("done");
            $("#step3").addClass("done");
            $("#step4").addClass("active");
            break;
        }
        case 80:
        {
            $("#step1").addClass("done");
            $("#step2").addClass("done");
            $("#step3").addClass("done");
            $("#step4").addClass("done");
            $("#step5").addClass("active");
            break;
        }
        case 100:
        {
            $("#step1").addClass("done");
            $("#step2").addClass("done");
            $("#step3").addClass("done");
            $("#step4").addClass("done");
            $("#step5").addClass("done");
            break;
        }
    }
</script>


