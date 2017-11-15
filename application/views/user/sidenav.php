<style>
    .side-nav-offset{
        padding-left:250px;
    }
    @media only screen and (max-width : 992px) {
        .side-nav-offset{
            padding-left: 0;
        }
    }
    .side-nav-active a, .side-nav-active i, .side-nav-active{
        color:#2e7d32 !important;
    }
</style>
<?php
    $userInfo = $this->user_model->getinfo('user', array('user_id' => $this->session->userid))[0];
?>

<ul id="user-nav" class="side-nav fixed collapsible">
    <li><div class="user-view">
            <div class="background">
                <img src="<?= $this->config->base_url() ?>images/background/office.jpg">
            </div>
            <a href="<?= $this->config->base_url() ?>user"><img class="circle z-depth-2" src="<?=base_url()?>profile/<?=$userInfo->user_picture?>"></a>
            <a href="#!name"><span class="white-text name" ><?=$userInfo->user_firstname?> <?=$userInfo->user_lastname?></span></a>
            <a href="#!email"><span class="white-text email"><?=$userInfo->user_email?></span></a>
        </div></li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user">
            <i class="fa fa-dashboard fa-2x"></i>Dashboard
        </a>
    </li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/myPets" || strpos($wholeUrl, $this->config->base_url() . "user/myPetsEdit") !== FALSE  ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/myPets">
            <i class="fa fa-paw fa-2x"></i>My Pets
        </a>
    </li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/petAdoption"|| strpos($wholeUrl, $this->config->base_url() . "user/petAdoptionOnlineForm") !== FALSE  ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/petAdoption">
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