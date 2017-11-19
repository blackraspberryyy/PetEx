<?php
$userInfo = $this->user_model->fetchJoinThreeProgressDesc("transaction", "pet", "transaction.pet_id = pet.pet_id", "user", "transaction.user_id = user.user_id", array('user.user_id' => $this->session->userid));
?>
<main>
    <div class ="side-nav-offset">
        <div class="container">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="col s12">
                        <h4>My Progress</h4>
                    </div>
                </nav>
                <div class="card-content">
                    <div class="card-content row ">
                        <?php if (!$userInfo): ?>
                            <h2><i class="fa fa-warning"></i> You have no progress</h2>
                        <?php else: ?>
                            <?php foreach ($userInfo as $myProgress): ?>
                                <div class="col s12">
                                    <div class="col s6">
                                        <h4><?= $myProgress->pet_name ?> </h4>
                                    </div>
                                    <div class="col s6">
                                        <h4>Started at: <?= date('M. j, Y', $myProgress->transaction_started_at) ?> </h4>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col s12">
                                    <div class="checkout-wrap" style="margin-bottom:200px !important;">
                                        <ul class="checkout-bar">
                                            <li class="<?= $myProgress->transaction_progress >= 20 ? "active" : "" ?>">Adoption Form</li>
                                            <li class="<?= $myProgress->transaction_progress >= 40 ? "active" : "" ?>">Meet And Greet</li>
                                            <li class="<?= $myProgress->transaction_progress >= 60 ? "active" : "" ?>">Interview</li>
                                            <li class="<?= $myProgress->transaction_progress >= 80 ? "active" : "" ?>">Ocular Visit</li>
                                            <li class="<?= $myProgress->transaction_progress == 100 ? "active" : "" ?>">Visit Your Pet</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col s12" style="margin-bottom:50px !important;">
                                    <?php if ($myProgress->transaction_progress == 20): ?>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square fa-2x" style="color:green !important;" aria-hidden="true"></i> We had review your adoption form and you passed the step 1.</h6><br>
                                    <?php elseif ($myProgress->transaction_progress == 40): ?>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> We had review your adoption form and you passed the step 1.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> You passed the step 2.</h6><br>
                                    <?php elseif ($myProgress->transaction_progress == 60): ?>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> We had review your adoption form and you passed the step 1.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> You passed the step 2.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> Thank you for answering our questions and you passed the step 3.</h6><br>
                                    <?php elseif ($myProgress->transaction_progress == 80): ?>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> We had review your adoption form and you passed the step 1.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> You passed the step 2.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> Thank you for answering our questions and you passed the step 3.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> Your home is good for your chosen adopteem, and thank you for allowing us to have a look around.</h6><br>
                                    <?php elseif ($myProgress->transaction_progress == 100): ?>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> We had review your adoption form and you passed the step 1.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> You passed the step 2.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> Thank you for answering our questions and you passed the step 3.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> Your home is good for your chosen adopteem, and thank you for allowing us to &emsp;&nbsp;&nbsp;&nbsp;&nbsp;have a look around.</h6><br>
                                        <h6 style="font-size:25px;"><i class="fa fa-check-square" style="color:green !important;" aria-hidden="true"></i> You passed all of the different steps you may now get your pet.</h6>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
