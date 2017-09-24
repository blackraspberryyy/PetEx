<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>Heading</h2>
                </div>
                <div class="panel-body">
                    <form class="form" method="POST" action = "<?= $this->config->base_url() ?>newController/formSubmit">
                        <div class="form-group">
                            <label>Value 1</label>
                            <input type="text" name="val1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Value 2</label>
                            <input type="text" name="val2" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success" value="SUBMIT">
                        <input type="reset" class="btn btn-warning pull-right" value="CLEAR">
                    </form>
                </div>



            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>