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

                <li class = "<?= $wholeUrl == $this->config->base_url()."admin" ? "side-nav-active" : ""?>"><a class="waves-effect" href="#!"><i class="fa fa-dashboard fa-2x"></i>Dashboard</a></li>
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/petDatabase" ? "side-nav-active" : ""?>"><a class="waves-effect" href="#!"><i class="fa fa-database fa-2x"></i>Pet Database</a></li>   
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/reports" ? "side-nav-active" : ""?>"><a class="waves-effect" href="#!"><i class="fa fa-bar-chart fa-2x"></i>Reports</a></li>
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/auditTrail" ? "side-nav-active" : ""?>"><a class="waves-effect" href="#!"><i class="fa fa-list fa-2x"></i>Audit Trail</a></li>
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/settings" ? "side-nav-active" : ""?>"><a class="waves-effect" href="#"><i class="fa fa-gear fa-2x"></i>Settings</a></li>
                <li class = "<?= $wholeUrl == $this->config->base_url()."admin/logout" ? "side-nav-active" : ""?>"><a class="waves-effect" href="#"><i class="fa fa-sign-out fa-2x"></i>Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
