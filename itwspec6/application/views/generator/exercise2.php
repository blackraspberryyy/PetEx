<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>Lab Exercise 2.2</h2>
                </div>
                <div class="panel-body">
                    <form class="form" method="POST" action = "<?= $this->config->base_url() ?>LabExer2/exercise2Submit">
                        <div class="form-group">
                            <label>Enter Length:</label>
                            <input type="text" name="num" class="form-control"><br>
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