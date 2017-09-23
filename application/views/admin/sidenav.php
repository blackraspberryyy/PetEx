<style>
    .side-nav-offset{
        padding-left:240px;
    }
    @media only screen and (max-width : 992px) {
      .side-nav-offset{
        padding-left: 0;
      }
    }
</style>
<ul id="admin-nav" class="side-nav fixed z-depth-1">
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
    <li><a class="waves-effect" href="#!"><i class="fa fa-paw"></i>Adoptables</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Adoption System Content</a></li>
    <li><a class="waves-effect" href="#!"><i class="fa fa-plus"></i>Add Animal</a></li>
    <li><a class="waves-effect" href="#!"><i class="fa fa-pencil"></i>Update Animal</a></li>
    <li><a class="waves-effect" href="#!"><i class="fa fa-remove"></i>Remove Animal</a></li>
</ul>