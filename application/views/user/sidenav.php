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

<ul id="user-nav" class="side-nav fixed collapsible">
    <li><div class="user-view">
            <div class="background">
                <img src="<?= $this->config->base_url() ?>images/profile/profileBg.jpg">
            </div>
            <a href="<?= $this->config->base_url() ?>user"><img class="circle z-depth-2" src="<?= $this->config->base_url() ?>images/profile/jc.png"></a>
            <a href="#!name"><span class="white-text name" id="sad">John Doe</span></a>
            <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
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
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/petAdoption" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/petAdoption">
            <i class="fa fa-home fa-2x"></i>Pet Adoption
        </a>
    </li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/myTransaction" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/myTransaction">
            <i class="fa fa-history fa-2x"></i>My Transactions
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