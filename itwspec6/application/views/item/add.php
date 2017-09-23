
<div class="container">      
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <?= $title ?>
                </div>
                <div class="panel-body">
                    <form class="form" action="<?= base_url()?>item/adddata" method="POST">      
                        <div class="form-group">
                            <label>ITEM NAME</label>
                            <input type="text" name="item_name" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>ITEM DESCRIPTION</label>
                            <input type="text"  name="item_desc" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>ITEM PRICE</label>
                            <input type="number" name="item_price" class="form-control"/>
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