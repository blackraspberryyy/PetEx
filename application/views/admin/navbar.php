<style>
    #admin-nav{
        top:65px;
        height: calc(100% - 65px);
    }
    .nav-offset{
        top:65px;
    }
    .navbar-fixed {
        z-index: 999;
    }
    .picker__date-display, .picker__weekday-display{
        background-color: #388e3c;
    }
    .controlImgSize{
        min-height: 40px;
        max-height: 150px;
        min-width: 40px;
        max-width: 150px; 
    }
    .previewImageControlSize{
        min-height: 40px;
        max-height: 250px;
        min-width: 40px;
        max-width: 350px;
    }
    .petDatabaseImageSize{
        height:230px;
        background:#eee;
    }

    /*GREEN THEME FORMS*/
    .green-theme input[type=text]:focus + label,
    .green-theme input[type=password]:focus + label,
    .green-theme textarea:focus + label{
        color: #388e3c !important;
    }
    .green-theme input[type=text]:focus,
    .green-theme input[type=password]:focus,
    .green-theme textarea:focus{
        border-bottom: 1px solid #388e3c !important;
        box-shadow: 0 1px 0 0 #388e3c !important;
    }
    .green-theme input[type="radio"].with-gap:checked+label:before,
    .green-theme input[type="radio"].with-gap:checked+label:after,
    .green-theme input[type="checkbox"].filled-in:checked+label:after{
        border: 2px solid #388e3c !important;
    }

    .green-theme input[type="radio"].with-gap:checked+label:after,
    .green-theme input[type="checkbox"].filled-in:checked+label:after{
        background-color: #388e3c !important;
    }

    /*ERROR FORM THEME*/
    .error-theme input[type=text]:focus + label,
    .error-theme input[type=text]+ label,
    .error-theme textarea:focus + label,
    .error-theme textarea + label{
        color: #ef5350  !important;
    }
    .error-theme input[type=text]:focus,
    .error-theme input[type=text],
    .error-theme textarea:focus,
    .error-theme textarea{
        border-bottom: 1px solid #ef5350  !important;
        box-shadow: 0 1px 0 0 #ef5350  !important;
    }
    .error-theme input[type="radio"].with-gap:checked+label:before,
    .error-theme input[type="radio"].with-gap:checked+label:after,
    .error-theme input[type="checkbox"].filled-in:checked+label:after{
        border: 2px solid #ef5350  !important;
    }
    .error-theme input[type="radio"].with-gap:checked+label:after,
    .error-theme input[type="checkbox"].filled-in:checked+label:after{
        background-color: #ef5350  !important;
    }
</style>
<?php
$current_user = $this->admin_model->fetch("user", array("user_id" => $this->session->userdata("userid")))[0];
?>
<div class ="navbar-fixed">
    <nav>
        <div class="nav-wrapper green darken-1 ">
            <a href="<?= $this->config->base_url() ?>admin" class = "col s6"><img class="brand-logo center" src = "<?= $this->config->base_url() ?>images/logo/logo.png" height = "58" ></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"> <i class="material-icons">menu</i></a>
            <ul class="side-nav collapsible" id="mobile-demo" data-collapsible = "accordion">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="<?= $this->config->base_url() ?>images/background/office.jpg">
                        </div>
                        <a href="#"><img class="circle z-depth-2" src="<?= $this->config->base_url() . $current_user->user_picture ?>"></a>
                        <a href="#!name"><span class="white-text name">Juan Carlo Valencia</span></a>
                        <a href="#"><span class="white-text email">Administrator</span></a>
                    </div>
                </li>
                <!--                <li>
                                    <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "admin" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin">
                                        <i class="fa fa-dashboard fa-2x"></i>Dashboard
                                    </a>
                                </li>-->
                <li>
                    <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "admin/petDatabase" || $wholeUrl == $this->config->base_url() . "admin/petDatabaseAdd" || strpos($wholeUrl, $this->config->base_url() . "admin/petDatabaseUpdate") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/petDatabaseRemove") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/petDatabaseLog") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/petDatabaseAdopter") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/petDatabaseMedicalRecords") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/petDatabaseAddMedical") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/petDatabaseEditMedical") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/petAdopters") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/manageProgress") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/petDatabase">
                        <i class="fa fa-database fa-2x"></i>Pet Database
                    </a>
                    <div class="collapsible-body">
                        <ul class = "collapsible" data-collapsible="accordion">
                            <li>
                                <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "admin/petDatabaseAdd" ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/petDatabaseAdd">
                                    <i class="fa fa-plus fa-2x"></i>Register Pet
                                </a>
                            </li>
                            <li>
                                <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url() . "admin/petDatabaseRemovedPet" ? "side-nav-active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/petDatabaseRemovedPet">
                                    <i class="fa fa-trash-o fa-2x"></i>Removed Pet
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/userDatabase") !== FALSE || strpos($wholeUrl, $this->config->base_url() . "admin/userDatabaseAdd") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/userDatabase">
                        <i class="fa fa-users fa-2x"></i>User Database
                    </a>
                    <div class="collapsible-body">
                        <ul class = "collapsible" data-collapsible="accordion">
                            <li>
                                <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/userDatabaseAdd") !== FALSE ? "side-nav-active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/userDatabaseAdd">
                                    <i class="fa fa-user-plus fa-2x"></i>Register an Admin
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/schedules") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/schedules">
                        <i class="fa fa-calendar fa-2x"></i>Schedules
                    </a>
                </li>
                <li>
                    <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/cms") !== FALSE ? "side-nav-active active" : "black-text" ?>" href= "<?= $this->config->base_url() ?>admin/cms">
                        <i class="fa fa-font fa-2x"></i>CMS
                    </a>
                </li>
                <li>
                    <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/reports") !== FALSE ? "side-nav-active active" : "black-text" ?>" href= "<?= $this->config->base_url() ?>admin/reports">
                        <i class="fa fa-bar-chart fa-2x"></i>Reports
                    </a>
                </li>
                <li>
                    <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/userLogs") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/userLogs">
                        <i class="fa fa-key fa-2x"></i>User Logs
                    </a>
                </li>
                <li>
                    <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/auditTrail") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/auditTrail">
                        <i class="fa fa-list fa-2x"></i>Audit Trail
                    </a>
                </li>
                <li>
                    <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/settings") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/settings">
                        <i class="fa fa-gear fa-2x"></i>Settings
                    </a>
                </li>
                <li>
                    <a class="waves-effect collapsible-header <?= strpos($wholeUrl, $this->config->base_url() . "admin/logout") !== FALSE ? "side-nav-active active" : "black-text" ?>" href="<?= $this->config->base_url() ?>admin/logout">
                        <i class="fa fa-sign-out fa-2x"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
