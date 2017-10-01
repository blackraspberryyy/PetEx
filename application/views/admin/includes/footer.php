
    </body>

    <!--JQUERY-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!--Materialize-->
    <script type="text/javascript" src="<?= $this->config->base_url() ?>assets/materialize/js/materialize.min.js"></script>
    <script>
        $('.datepicker').pickadate({
            selectMonths: false, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            format: 'mmmm dd, yyyy',
            max: 'Today',
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });
    </script>

</html>
