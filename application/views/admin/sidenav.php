<style>
    .side-nav-offset{
        padding-left:240px;
    }
    @media only screen and (max-width : 992px) {
      .side-nav-offset{
        padding-left: 0;
      }
    }
    .side-nav-active a, .side-nav-active i{
        color:#2e7d32 !important;
    }
    
</style>

<ul id="admin-nav" class="side-nav fixed z-depth-1">
    <li>
        <div class="user-view">
            <div class="background">
              <img src="<?= $this->config->base_url()?>images/background/office.jpg">
            </div>
            <a href="<?= $this->config->base_url()?>admin"><img class="circle z-depth-2" src="<?= $this->config->base_url()?>images/profile/jc.png"></a>
            <a href="<?= $this->config->base_url()?>admin"><span class="white-text name">Juan Carlo Valencia</span></a>
            <a href="<?= $this->config->base_url()?>admin"><span class="white-text email">Administrator</span></a>
        </div>
    </li>
    
    <li class = "<?= $wholeUrl == $this->config->base_url()."admin" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin"><i class="fa fa-dashboard fa-2x"></i>Dashboard</a></li>
    <li class = "<?= $wholeUrl == $this->config->base_url()."admin/petDatabase" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/petDatabase"><i class="fa fa-database fa-2x"></i>Pet Database</a></li>
    <li class = "<?= $wholeUrl == $this->config->base_url()."admin/adoptables" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/adoptables"><i class="fa fa-paw fa-2x"></i>Adoptables</a></li>    
    <li class = "<?= $wholeUrl == $this->config->base_url()."admin/reports" ? "side-nav-active" : ""?>"><a class="waves-effect" href= "<?= $this->config->base_url()?>admin/reports"><i class="fa fa-bar-chart fa-2x"></i>Reports</a></li>
    <li class = "<?= $wholeUrl == $this->config->base_url()."admin/auditTrail" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/auditTrail"><i class="fa fa-list fa-2x"></i>Audit Trail</a></li>
    <li class = "<?= $wholeUrl == $this->config->base_url()."admin/settings" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/settings"><i class="fa fa-gear fa-2x"></i>Settings</a></li>
    <li class = "<?= $wholeUrl == $this->config->base_url()."admin/logout" ? "side-nav-active" : ""?>"><a class="waves-effect" href="<?= $this->config->base_url()?>admin/logout"><i class="fa fa-sign-out fa-2x"></i>Logout</a></li>
</ul>