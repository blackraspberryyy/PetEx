<div class ="side-nav-offset">
    <div class ="container ">
        <div class = "card row">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= $wholeUrl?>" class="breadcrumb">User Logs</a>
                </div>
            </nav>
            <div class="card-content ">

                <?php if (empty($logs)): ?>

                <?php else: ?>
                    <ul class="collection">
                        <?php foreach ($logs as $log): ?>
                            <li class="collection-item avatar">
                                <img src="<?= $this->config->base_url().$log->user_picture;?>" alt="" class="circle z-depth-2">
                                <span class="title"><?= $log->event_description?></span>
                                <p class = "grey-text">
                                    <?= date("F d, Y | h:i A", $log->event_added_at)?>
                                    <br/>
                                    by <?= $log->user_firstname." ".$log->user_lastname?>
                                </p>
                            </li>
                        <?php endforeach; ?> 
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>