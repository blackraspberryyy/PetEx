<?php
$userInfo = $this->user_model->getinfo('user', array('user_id' => $this->session->userid))[0];
?>

<div class ="navbar-fixed" >
    <nav>
        <div class="nav-wrapper green darken-1">
            <div class="row">
                <div class="col m10">
                    <a href="#" data-activates="slide-out" class="button-collapse"> <i class="material-icons">menu</i></a>
                    <a href="<?= $this->config->base_url() ?>user" class = "col s6"><img class="brand-logo center" src = "<?= $this->config->base_url() ?>images/logo/logo.png" height = "58" ></a>

                    <ul id="slide-out" class="side-nav collapsible">
                        <li><div class="user-view">
                                <div class="background">
                                    <img src="<?= $this->config->base_url() ?>images/background/petLogin.jpg">
                                </div>
                                <a href="<?= $this->config->base_url() ?>user"><img class="circle z-depth-2" src="<?= base_url() ?>profile/<?= $userInfo->user_picture ?>"></a>
                                <a href="#!name"><span class="white-text name" ><?= $userInfo->user_firstname ?> <?= $userInfo->user_lastname ?></span></a>
                                <a href="#!email"><span class="white-text email"><?= $userInfo->user_email ?></span></a>
                            </div></li>
                        <li>
                            <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user">
                                <i class="fa fa-dashboard fa-2x"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/myPets" || strpos($wholeUrl, $this->config->base_url() . "user/myPetsEdit") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/myPets">
                                <i class="fa fa-paw fa-2x"></i>My Pets
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/petAdoption" || strpos($wholeUrl, $this->config->base_url() . "user/petAdoptionOnlineForm") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/petAdoption">
                                <i class="fa fa-home fa-2x"></i>Pet Adoption
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/myProgress" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/myProgress">
                                <i class="fa fa-history fa-2x"></i>My Progress
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/settings" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/settings">
                                <i class="fa fa-cog fa-2x"></i>Settings
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/logout" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/logout">
                                <i class="fa fa-sign-out fa-2x"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col m2">
                    <a href="#" class="dropdown-button tooltipped" data-position="left" data-delay="50" data-tooltip="Notifications"  data-activates='dropdown1'><i class="material-icons">notifications_none</i></a>
                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="#!">one</a></li>
                        <li><a href="#!">two</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
</div>
