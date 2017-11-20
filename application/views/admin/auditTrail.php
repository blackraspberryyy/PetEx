<div class ="side-nav-offset">
    <div class ="container">
        <div class = "card row">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= $wholeUrl ?>" class="breadcrumb">Audit Trail</a>
                </div>
            </nav>
            <div class="card-content ">

                <?php if (empty($trails)): ?>

                <?php else: ?>
                    <ul class="collection">
                        <?php foreach ($trails as $trail): ?>
                            <li class="collection-item avatar">
                                <img src="<?= $this->config->base_url().$trail->user_picture;?>" alt="" class="circle z-depth-2">
                                <span class="title"><?= $trail->event_description?></span>
                                <p class = "grey-text">
                                    <?= date("F d, Y | h:i A", $trail->event_added_at)?>
                                    <br/>
                                    by <?= $trail->user_firstname." ".$trail->user_lastname?>
                                </p>
                            </li>
                        <?php endforeach; ?> 
                    </ul>
                
                    <?= $links?>
                <?php endif; ?>


            </div>
        </div>
    </div>
</div>