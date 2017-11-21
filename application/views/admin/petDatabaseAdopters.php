<style>
    .image-circle-cropper {
        width: 200px;
        height: 200px;
        position: relative;
        overflow: hidden;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        border-radius: 50%;
        border:2px solid white;
    }
    .profileImgStyle{
        display: inline;
        margin: 0 auto;
        height: 100%;
        width: auto;
    }
    .collection img {
        width: 50px;
        height: 50px;
    }
</style>
<div class ="side-nav-offset">
    <div class ="container">
        <div class = "card row" style = "margin-bottom:20px !important;">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= base_url()?>admin/petDatabase" class="breadcrumb">Pet Database</a>
                    <a href="<?= $wholeUrl?>" class="breadcrumb">Interested Pet Adopters</a>
                </div>
            </nav>
            <div class="card-content ">
                <div class ="row" style = "margin-bottom:20px !important;">
                    <div class = "col s12 center">
                        <center>
                            <div class ="image-circle-cropper z-depth-2">
                                <img src="<?= $this->config->base_url().$selectedPet->pet_picture?>" class = "profileImgStyle">
                            </div>
                            <br>
                            <div class = "col s12 center">
                                <h3 style = "font-weight: bold; color:gray;">INTERESTED ADOPTERS</h3>
                            </div>
                        </center>
                        <br>
                    </div>
                </div>
                <div class = "row">
                    <?php if(empty($transactions)):?>
                    <center>
                        <h5 style = "color:#fff; padding-top:100px !important; padding-bottom: 100px !important; background: #ccc;"> NO INTERESTED ADOPTERS YET </h5>
                    </center>
                    <?php else:?>
                    <ul class="collection" >
                        <?php foreach($transactions as $transaction):?>
                        <li class = "collection-item avatar">
                            <img src="<?= $this->config->base_url().$transaction->user_picture?>" alt="" class="circle z-depth-2 tooltipped materialboxed" data-position="bottom" data-delay="50" data-tooltip="<?= $transaction->user_firstname." ".$transaction->user_lastname?>">
                            <p style = "padding-top:10px !important;">
                                <span class="title "  style = "font-weight:bold;"><?= $transaction->user_lastname.", ".$transaction->user_firstname?></span><br>
                                <span> Progress : <?= $transaction->transaction_progress?>%</span>
                            </p>
                            <a href = "<?= base_url()?>admin/manageProgress_exec/<?= $transaction->transaction_id;?>" class = "btn waves-effect waves-light green darken-4 secondary-content" style = "margin-top:10px !important;">Manage Progress</a>
                        </li>
                        <?php endforeach;?>
                    <?php endif;?>
                    </ul>
                    <br>
                    <?= $links?>
                </div>
            </div>
        </div>
    </div>
</div>