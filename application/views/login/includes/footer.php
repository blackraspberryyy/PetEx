<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?= $this->config->base_url() ?>assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('ul.tabs').tabs();
    });
    $(document).ready(function () {
        $('ul.tabs').tabs('select_tab', 'tab_id');
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
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
