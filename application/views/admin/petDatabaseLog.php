<?php $pet = $pet[0]?>
<div class ="side-nav-offset">
    <div class ="container ">
        <div class = "card row">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= $this->config->base_url()?>admin/petDatabase" class="breadcrumb">Pet Database</a>
                    <a href="<?= $wholeUrl?>" class="breadcrumb">Pet History Log</a>
                </div>
            </nav>
            <div class="card-content ">
                 <ul class="collection">
                    <li class="collection-item avatar">
                        <img src="<?= $this->config->base_url()?>images/profile/jc.png" alt="" class="circle z-depth-2">
                        <span class="title"><?=$pet->pet_name?> is added on Pet Database</span>
                        <p class = "grey-text">
                            <?= date('F j, Y | g:i a',$pet->pet_added_at)?>
                            <br/>
                            by Juan Carlo Valencia
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>