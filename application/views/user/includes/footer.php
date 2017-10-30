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
                        <p>Made with&nbsp;&nbsp;&nbsp;<i class="fa fa-heart" style="color:red;"></i></p>
                        </p>
                    </center>
                </div>
                <div class="col m4"></div>
            </div>
        </div>
    </div>
</footer>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#files").change(function () {
        readURL(this);
        $("#nofilechosen").text("");
    });
</script>

<script type="text/javascript" src="<?= $this->config->base_url() ?>assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript">


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

    $(document).ready(function () {
        $('.tooltipped').tooltip({delay: 50});
    });

    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: false, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    }
    );
       
   
</script>

</html>
