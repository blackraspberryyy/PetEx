<nav>
    <div class="nav-wrapper green darken-1">
        <div class="row">
            <div class="col m10">
                <a href="#" data-activates="slide-out" class="button-collapse tooltipped" data-position="right" data-delay="50" data-tooltip="Menu"><i class="material-icons">menu</i></a>
                <a href="<?= $this->config->base_url() ?>user" class = "col s6"><img class="brand-logo center" src = "<?= $this->config->base_url() ?>images/logo/logo.png" height = "58" ></a>

                <ul id="slide-out" class="side-nav collapsible">
                    <li><div class="user-view">
                            <div class="background">
                                <img src="<?= $this->config->base_url() ?>images/profile/profileBg.jpg">
                            </div>
                            <a href="#"><img class="circle z-depth-2" src="<?= $this->config->base_url() ?>images/profile/jc.png"></a>
                            <a href="#!name"><span class="white-text name" id="sad">John Doe</span></a>
                            <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                        </div></li>
                    <li>
                        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user">
                            <i class="fa fa-dashboard fa-2x"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "user/myPets" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>user/myPets">
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
            </div>
            <div class="col m2">
                <a href="#" class="dropdown-button tooltipped" data-position="left" data-delay="50" data-tooltip="Notifications" href='#' data-activates='dropdown1'><i class="material-icons">notifications_none</i></a>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#!">one</a></li>
                    <li><a href="#!">two</a></li>
                </ul>

            </div>
        </div>


</nav>