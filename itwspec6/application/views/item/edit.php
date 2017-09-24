<?php

$items = $items[0]
?>
<div class="container">      
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <?= $title ?>
                </div>
                <div class="panel-body">
                    <form class="form" action="<?=base_url()?>item/updatedata/<?=$this->uri->segment(3)?>" method="POST">
                        <div class="form-group">
                            <label>ITEM ID</label>
                            <input type="text" readonly="" value="<?=$items->item_id?>" class="form-control"/>
                        </div>
                        
                         <div class="form-group">
                            <label>ITEM NAME</label>
                            <input type="text" value="<?=$items->item_name?>" name="item_name" class="form-control"/>
                        </div>
                        
                        <div class="form-group">
                            <label>ITEM DESCRIPTION</label>
                            <input type="text" value="<?=$items->item_desc?>" name="item_desc" class="form-control"/>
                        </div>
                        
                        <div class="form-group">
                            <label>ITEM PRICE</label>
                            <input type="number" step="any" value="<?=$items->item_price?>" name="item_price" class="form-control"/>
                        </div>
                     
                        
                        <input type="submit" class="btn btn-success" value="SUBMIT">
                        <input type="reset"  class="btn btn-warning pull-right"/>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div> 
</div>