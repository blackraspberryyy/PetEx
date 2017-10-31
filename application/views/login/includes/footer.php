<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            <div class="row">

                <div class="col m4"></div>
                <div class="col m4">
                    <p class="copyright">
                    <center>
                        &copy; Codebusters. All rights reserved.
                        <p>JC VALENCIA | ANGELO MARKUS ZAGUIRRE | ALLEN TORRES | JOSHUA VITUG</p>

                        <p>Made with&nbsp;&nbsp;&nbsp; <a class=" btn btn-floating pulse red "><i class="fa fa-heart" style="color:white;"></i></a></p>
                        </p>
                    </center>
                </div>
                <div class="col m4"></div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?= $this->config->base_url() ?>assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('ul.tabs').tabs();
    });
    $(document).ready(function () {
        $('ul.tabs').tabs('select_tab', 'tab_id');
    });
    var d = new Date();
    d.setFullYear(d.getFullYear() - 18);
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 150, // Creates a dropdown of 15 years to control year,
        format: 'mmmm dd, yyyy',
        max: d,
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });

    $(document).ready(function () {
        $('.collapsible').collapsible();
    });

    $(document).ready(function () {
        $('select').material_select();
    });


    document.getElementById("prov_select").onchange = function () {
        $.ajax({
            "method": "POST",
            "url": "<?= site_url('login/ajaxReceiver'); ?>",
            "dataType": "JSON",
            "data": {
                "provValue": $("#prov_select").val(),
            },
            success: function (received) {
                var obj = received.resultString;
                $("#contentProv").html(obj);

            }
        })
    }

</script>
</body>
</html>
