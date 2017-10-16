<style>
    .side-nav-offset{
        padding-left:240px;
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

<ul id="admin-nav" class="side-nav fixed z-depth-1 collapsible"  data-collapsible="accordion">
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
    
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url()."admin" ? "side-nav-active active" : "black-text"?>" href="<?= $this->config->base_url()?>admin">
            <i class="fa fa-dashboard fa-2x"></i>Dashboard
        </a>
    </li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url()."admin/petDatabase" || $wholeUrl == $this->config->base_url()."admin/petDatabaseAdd" || strpos($wholeUrl, $this->config->base_url()."admin/petDatabaseUpdate") !== FALSE || strpos($wholeUrl, $this->config->base_url()."admin/petDatabaseRemove") !== FALSE || strpos($wholeUrl, $this->config->base_url()."admin/petDatabaseLog") !== FALSE || strpos($wholeUrl, $this->config->base_url()."admin/petDatabaseAdopter") !== FALSE? "side-nav-active active" : "black-text"?>" href="<?= $this->config->base_url()?>admin/petDatabase">
            <i class="fa fa-database fa-2x"></i>Pet Database
        </a>
        <div class="collapsible-body">
            <ul class = "collapsible" data-collapsible="accordion">
                <li>
                    <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url()."admin/petDatabaseAdd" ? "side-nav-active active" : "black-text"?>" href="<?= $this->config->base_url()?>admin/petDatabaseAdd">
                        <i class="fa fa-plus fa-2x"></i>Register Pet
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url()."admin/reports" ? "side-nav-active active" : "black-text"?>" href= "<?= $this->config->base_url()?>admin/reports">
            <i class="fa fa-bar-chart fa-2x"></i>Reports
        </a>
    </li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url()."admin/auditTrail" ? "side-nav-active active" : "black-text"?>" href="<?= $this->config->base_url()?>admin/auditTrail">
            <i class="fa fa-list fa-2x"></i>Audit Trail
        </a>
    </li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url()."admin/settings" ? "side-nav-active active" : "black-text"?>" href="<?= $this->config->base_url()?>admin/settings">
            <i class="fa fa-gear fa-2x"></i>Settings
        </a>
    </li>
    <li>
        <a class="waves-effect collapsible-header <?= $wholeUrl == $this->config->base_url()."admin/logout" ? "side-nav-active active" : "black-text"?>" href="<?= $this->config->base_url()?>admin/logout">
            <i class="fa fa-sign-out fa-2x"></i>Logout
        </a>
    </li>

</ul>