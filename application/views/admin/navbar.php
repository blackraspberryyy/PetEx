<style>
    #admin-nav{
        top:66px;
    }
    .nav-offset{
        top:66px;
    }
</style>
<nav>
    <div class="nav-wrapper green lighten-4">
        <a href="<?= $this->config->base_url()?>admin" class = "col s6"><img class="brand-logo center" src = "<?= $this->config->base_url()?>images/logo/logo.png" height = "58" ></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"> <i class="material-icons">menu</i></a>
        <ul class="hide-on-med-and-down">
            <li class="active"><a href="<?= $this->config->base_url()?>admin" class = "black-text">Dashboard</a></li>
            <li><a href="#" class = "black-text">Settings</a></li>
            <li><a href="#" class = "black-text">Logout</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="active"><a href="<?= $this->config->base_url()?>admin" class = "black-text">Dashboard</a></li>
            <li><a href="#" class = "black-text">Settings</a></li>
            <li><a href="#" class = "black-text">Logout</a></li>
        </ul>
    </div>
</nav>
