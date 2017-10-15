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
    .green-theme textarea:focus + label{
        color: #388e3c !important;
    }
    .green-theme input[type=text]:focus,
    .green-theme textarea:focus{
        border-bottom: 1px solid #388e3c !important;
        box-shadow: 0 1px 0 0 #388e3c !important;
    }
    .green-theme input[type="radio"].with-gap:checked+label:before,
    .green-theme input[type="radio"].with-gap:checked+label:after {
        border: 2px solid #388e3c !important;
    }
    .green-theme input[type="radio"].with-gap:checked+label:after {
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
    .error-theme input[type="radio"].with-gap:checked+label:after {
        border: 2px solid #ef5350  !important;
    }
    .error-theme input[type="radio"].with-gap:checked+label:after {
        background-color: #ef5350  !important;
    }
</style>
<div class ="navbar-fixed">
    <nav>
        <div class="nav-wrapper green darken-1 ">
            <a href="<?= $this->config->base_url()?>admin" class = "col s6"><img class="brand-logo center" src = "<?= $this->config->base_url()?>images/logo/logo.png" height = "58" ></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"> <i class="material-icons">menu</i></a>
            <ul class="side-nav" id="mobile-demo">
                <li>
                    <div class="user-view">
                        <div class="background">
                          <img src="<?= $this->config->base_url()?>images/background/office.jpg">
                        </div>
                        <a href="#"><img class="circle z-depth-2" src="<?= $this->config->base_url()?>images/profile/jc.png"></a>
                        <a href="#!name"><span class="white-text name">Juan Carlo Valencia</span></a>
                        <a href="#"><span class="white-text email">Administrator</span></a>
                    </div>
                </li>

                <li class = "<?= $wholeUrl == $this->config->base_url()."admin" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin"><i class="fa fa-dashboard fa-2x"></i>Dashboard</a></li>
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/petDatabase" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/petDatabase"><i class="fa fa-database fa-2x"></i>Pet Database</a></li>  
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/reports" ? "side-nav-active" : ""?>"><a class="waves-effect" href= "<?= $this->config->base_url()?>admin/reports"><i class="fa fa-bar-chart fa-2x"></i>Reports</a></li>
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/auditTrail" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/auditTrail"><i class="fa fa-list fa-2x"></i>Audit Trail</a></li>
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/settings" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/settings"><i class="fa fa-gear fa-2x"></i>Settings</a></li>
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/logout" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/logout"><i class="fa fa-sign-out fa-2x"></i>Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
