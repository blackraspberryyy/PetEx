<div class="container">      
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <?= $title ?>
                </div>
                <div class="panel-body">
                    <h2>Do you want to delete the data?</h2>
                </div>
                <div class="panel-footer">
                    <form class="form" action="<?=base_url()?>item/deletedata/<?=$this->uri->segment(3)?>" method="POST">                     
                        <input type="submit" class="btn btn-success pull-right" value="Yes">
                    </form>
                      <a href="http://localhost/itwspec6/item/"> <input type="submit" class="btn btn-default" value="No" style="margin-top:-15px"></a>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div> 
</div>