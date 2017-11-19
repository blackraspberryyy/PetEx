<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            <div class="row">

                <div class="col m4"></div>
                <div class="col m4">
                    <p class="copyright">
                    <center>
                        &copy; 2017 Codebusters. All rights reserved.
                        <p>JC VALENCIA | ANGELO MARKUS ZAGUIRRE | ALLEN TORRES | JOSHUA VITUG</p>

                        <p>Made with&nbsp;&nbsp;&nbsp; <a class=" btn btn-floating pulse red "><i class="fa fa-heartbeat" style="color:white;"></i></a></p>
                        </p>
                    </center>
                </div>
                <div class="col m4"></div>
            </div>
        </div>
    </div>
</footer>
</body>
<script type="text/javascript">
    var dt = new Date();
    dt.setFullYear(new Date().getFullYear() - 18);

    $('.datepicker').pickadate({
        selectMonths: false, // Creates a dropdown to control month
        selectYears: 50,
        max: dt,
        format: 'mmmm dd, yyyy',
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: true, // Close upon selecting a date,
        closeOnClear: true
    });

</script>
</html>
