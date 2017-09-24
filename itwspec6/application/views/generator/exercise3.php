<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>Lab Exercise 2.3</h2>
                </div>
                <div class="panel-body">
                    <form class="form" method="POST" action = "<?= $this->config->base_url() ?>LabExer2/exercise3submit">
                        <div class="form-group">
                            <label>Enter Length:</label>
                            <input type="text" name="length" class="form-control"><br>
                            <label>Enter Partner:</label>
                            <input type="text" name="partner" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success" value="GENERATE">
                        <input type="reset" class="btn btn-warning pull-right" value="CLEAR">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>