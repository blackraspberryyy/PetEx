<?php
if (validation_errors()): {
        echo '<script>';
        echo 'swal("Oops!", "Your message did not send", "error");';
        echo '</script>';
    }
    ?>
<?php endif; ?>
<!-- Header area -->
<div id="header-wrapper" class="header-slider">
    <header class="clearfix">
        <div class="logo">
            <img src="<?= $this->config->base_url() ?>images/logo/icon.png" class = "headerIcon" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div id="main-flexslider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <p class="home-slide-content">
                                    <strong>Pet</strong> Express
                                </p>
                            </li>
                            <li>
                                <p class="home-slide-content">
                                    An <strong>adoption</strong> System
                                </p>
                            </li>
                            <li>
                                <p class="home-slide-content">
                                    For <strong>Paws</strong>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!-- end slider -->
                </div>
            </div>
        </div>
    </header>
</div>
<!-- spacer section -->
<section class="spacer green">
    <div class="container">
        <div class="row">
            <div class="span6 alignright flyLeft">
                <blockquote class="large">
                    <?= strip_tags($cms->quotation)?><cite><?= strip_tags($cms->quotationBy)?></cite>
                </blockquote>
            </div>
            <div class="span6 aligncenter flyRight">
                <i class="fa fa-paw" style="font-size:200px;" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</section>
<!-- end spacer section -->
<!-- section: team -->
<section id="aboutBg" class="section">
    <div class="container">
        <h4>About Us</h4>
        <div class="row">
            <div class="span4 offset1">
                <div>
                    <h2>We are the <b>Codebusters</b></h2>
                    <?= strip_tags($cms->aboutus_content)?>
                </div>
            </div>
            <div class="span6">
                <div class="aligncenter">
                    <img src="<?= $this->config->base_url() ?>images/logo/logo.png" alt="" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span2 offset1 flyIn">
                <div class="people ">
                    <img class="team-thumb img-circle" src="<?= $this->config->base_url() ?>images/img/team/markusMatFinal.png" alt="" />
                    <h5 class="devName"> Angelo Markus B. <strong>Zaguirre</strong></h5>
                    <hr>
                    <p class="devRole" style="color:green">
                        <strong>Webmaster</strong>
                    </p>
                </div>
            </div>
            <div class="span2 flyIn">
                <div class="people ">
                    <img class="team-thumb img-circle " src="<?= $this->config->base_url() ?>images/img/team/jcMatFinal.png" alt="" />
                    <div style="height:80px;">
                        <h5 class="devName"> Juan Carlo D.R. <strong>Valencia</strong></h5>
                        <hr>
                        <p class="devRole" style="color:green">
                            <strong>Project Manager</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="span2 flyIn">
                <div class="people ">
                    <img class="team-thumb img-circle " src="<?= $this->config->base_url() ?>images/img/team/allenMatFinal.png" alt="" />
                    <div style="height:80px;">
                        <h5 class="devName"> Allen T. <strong><br>Torres</strong></h5>
                        <hr>
                        <p class="devRole" style="color:green">
                            <strong>Quality Assurance</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="span2 flyIn">
                <div class="people ">
                    <img class="team-thumb img-circle "  src="<?= $this->config->base_url() ?>images/img/team/joshMatFinal.png" alt="" />
                    <div style="height:80px;">
                        <h5 class="devName"> Joshua C. <strong><br>Vitug</strong></h5>
                        <hr>
                        <p class="devRole" style="color:green">
                            <strong>Writer and Editor</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- end section: team -->
<!-- section: services -->
<section id="services" class="section green">
    <div class="container">
        <h4>Services</h4>
        <!-- Four columns -->
        <div class="row">
            <div id="menu-main">
                <div class="span4 animated-fast flyIn">
                    <div class="service-box">
                        <a href="#petAdoption" style = "cursor:none;"><img class = "featuresPic" src="<?= $this->config->base_url() ?>images/img/icons/petAdoption.png" alt="" /></a>        
                        <h2>Pet Adoption</h2>
                    </div>
                </div>
                <div class="span4 animated flyIn">
                    <div class="service-box">
                        <a href="#petLocate" style = "cursor:none;"><img class = "featuresPic" src="<?= $this->config->base_url() ?>images/img/icons/progress.png" alt="" /></a>
                        <h2>My Progress</h2>
                    </div>
                </div>
                <div class="span4 animated-fast flyIn">
                    <div class="service-box">
                        <a href="#petHistory" style = "cursor:none;"><img class = "featuresPic" src="<?= $this->config->base_url() ?>images/img/icons/myPets.png" alt="" /></a>
                        <h2>My Pet/s</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section: services -->
<!-- section: petAdoption -->
<section id="petAdoption" class="section">
    <div class="container clearfix" >
        <h4>Pet Adoption</h4>
        <div class="row">
            <div class="span6">
                <div class="row">
                    <div class="span1"></div>
                    <div class="span4"><br><br><br>
                        <?= $cms->petadoption_content?>
                    </div>
                    <div class="span1"></div>
                </div>
            </div>
            <div class="span6" >
                <br>
                <img  src="<?= $this->config->base_url() ?>images/img/icons/petAdoptionPrev.png" alt="" />
            </div>
        </div>
    </div>
</section>
<!-- spacer section -->
<!-- section: petLocate -->
<section id="petLocate" class="section">
    <div class="container clearfix">
        <h4>My Progress</h4>
        <div class="row">
            <div class="span6">
                <br>
                <img src="<?= $this->config->base_url() ?>images/img/icons/progressPrev.png" alt="" />
            </div>
            <div class="span6">
                <div class="row">
                    <div class="span1"></div>
                    <div class="span4"><br><br><br>
                        <p><?= strip_tags($cms->myprogress_content)?></p>
                    </div>
                    <div class="span1"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- spacer section -->
<!-- section: petHistory -->
<section id="petHistory" class="section">
    <div class="container clearfix" >
        <h4>My Pet/s</h4>
        <div class="row">
            <div class="span6">
                <div class="row">
                    <div class="span1"></div>
                    <div class="span4"><br><br><br>
                        <p><?= strip_tags($cms->mypets_content)?></p>

                    </div>
                    <div class="span1"></div>
                </div>
            </div>
            <div class="span6">
                <br>
                <img src="<?= $this->config->base_url() ?>images/img/icons/myPetsPrev.png" alt="" />
            </div>
        </div>
    </div>
</section>
<!-- spacer section -->
<section class="spacer bg3">
    <div class="container">
        <div class="row">
            <div class="span6 flyLeft" style="padding-top:100px !important;">
                <p><?= strip_tags($cms->mobapp_content)?></p>
            </div>
            <div class="span6 flyRight">
                <img src="<?= $this->config->base_url() ?>images/img/icons/mobilePrev.png" alt="" />
            </div>
        </div>
    </div>
</section>
<!-- end spacer section -->

<section id="adoptables" class="section">
    <div class="container">
        <h4>Pet Adoptables</h4>
        <!-- Three columns -->
        <div class="row">
            <?php if (!$pets): ?>
                <div class="span12">
                    <center>
                        <h1>Table is EMPTY</h1>
                    </center>
                </div>
            <?php else: ?>
                <?php $counter = 0; ?>
                <?php foreach ($pets as $pet): ?> 
                    <?php if ($pet->pet_status == 'adoptable'): ?>
                        <div class="span3">
                            <div class="home-post">
                                <div class="post-image">
                                    <img class="max-img" src="<?= $this->config->base_url() . $pet->pet_picture ?>" alt="" />
                                </div>
                                <div class="post-meta">
                                    <i class="icon-info icon-2x"></i>
                                    <span class="petName"><?= $pet->pet_name ?></span>
                                </div>
                                <div class="entry-content ">
                                    <i class="icon-calendar">  </i><?= date('M. j, Y', $pet->pet_bday) ?><br><br>
                                    <?php if ($pet->pet_sex == "Male" || $pet->pet_sex == "male"): ?>
                                        <i class="fa fa-mars"> </i> <?= $pet->pet_sex ?><br><br>
                                    <?php else: ?>
                                        <i class="fa fa-venus"> </i> <?= $pet->pet_sex ?><br><br>
                                    <?php endif; ?>
                                    <i class="icon-info"> </i><?= $pet->pet_breed ?><br><br>
                                    <i class="icon-check-sign" style="color:green"></i> <?= $pet->pet_status ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                    if ($counter == 4): {
                            break;
                        }
                        ?>
                    <?php endif; ?>
                    <?php $counter++; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
        <div class="blankdivider30"></div>
    </div>
</section>
<!-- section: contact -->
<section id="contact" class="section green">
    <div class="container">
        <h4>Get in Touch</h4>
        <center>
            <p>
                You can contact us through e-mail by filling up the form below.
            </p>
        </center>
        <div class="blankdivider30">
        </div>
        <div class="row">
            <div class="span12">
                <div class="cform" id="contact-form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="row">
                            <div class="span6">

                                <div class="field your-name form-group  <?php if (!empty(form_error("name"))): ?>has-error<?php endif; ?>">
                                    <input type="text" name="name" class="form-control" value="<?= set_value('name') ?>" id="name" placeholder="Your Name"/>
                                    <?= form_error("name", "<div class = 'alert alert-danger'>", "</div>") ?>
                                </div>
                                <div class="field your-email form-group <?php if (!empty(form_error("email"))): ?>has-error<?php endif; ?>">
                                    <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>"  id="email" placeholder="Your Email"  />
                                    <?= form_error("email", "<div class = 'alert alert-danger'>", "</div>") ?>
                                </div>
                                <div class="field subject form-group <?php if (!empty(form_error("subject"))): ?>has-error<?php endif; ?>">
                                    <input type="text" class="form-control" name="subject" value="<?= set_value('subject') ?>" id="subject" placeholder="Subject" />
                                    <?= form_error("subject", "<div class = 'alert alert-danger'>", "</div>") ?>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="field message form-group <?php if (!empty(form_error("message"))): ?>has-error<?php endif; ?>">
                                    <textarea class="form-control" name="message" value="<?= set_value('message') ?>"  placeholder="Message" rows="5"></textarea>
                                    <?= form_error("message", "<div class = 'alert alert-danger'>", "</div>") ?>
                                </div>
                                <input type="submit" value="Send message" class="btn btn-theme pull-left">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ./span12 -->
        </div>


    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="span4">
                <img src="<?= $this->config->base_url() ?>images/logo/logo.png" class = "footerIcon" alt="" />
                <img src="<?= $this->config->base_url() ?>images/logo/paws.png" class = "footerIcon" alt="" />
                <br>


            </div>
            <div class="span4">
                <p><i class="icon-circled icon-bgdark icon-map-marker icon-2x"></i>
                    P. Paredes, Sampaloc, Manila<br>
                    &emsp; &emsp;  &nbsp;<strong> Metro Manila, Philippines/</strong><br>
                    &emsp;  Aurora Blvd, Quezon City,<br><strong>1800 Metro Manila</strong></p>
                <p><i class="icon-circled icon-bgdark icon-phone icon-2x"></i>
                    <strong> 475-1688&emsp;/&emsp;09179763609</strong> </p>
                <p><i class="icon-circled icon-bgdark icon-envelope icon-2x"></i>
                    codebusters.solutions@gmail.com/<br>philpaws@paws.org.ph</p><br><br>

            </div>
            <div class="span6 offset3">
                <ul class="social-networks">
                    <li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
                    <li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
                    <li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
                    <li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
                </ul>
                <p class="copyright">
                    &copy; 2017 Codebusters. All rights reserved.
                <p>JC VALENCIA | ANGELO MARKUS ZAGUIRRE | ALLEN TORRES | JOSHUA VITUG</p>
                <p>Made with&nbsp;&nbsp;&nbsp;<i class="icon-circled icon-bgdark icon-heart icon-1x" style="color:red;"></i></p>
                </p>
            </div>
            <br>
            <a href="<?= base_url() ?>login/"><button class="btn btn-success">Sign up for PetEx</button></a>
        </div>
    </div>

</footer>