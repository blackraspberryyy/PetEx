<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?= $this->config->base_url() ?>assets/materialize/css/materialize.css"/>
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>images/img/petexIcon.ico">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald|Saira+Extra+Condensed" rel="stylesheet">
        <!--Font Awesome Icons-->
        <link rel = "stylesheet" href = "<?= $this->config->base_url() ?>assets/fontawesome/css/font-awesome.min.css">
    
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


        </script>
    </head>
    <style>

        /*GREEN THEME FORMS*/
        .green-theme input[type=text]:focus + label,
        .green-theme input[type=email]:focus + label,
        .green-theme input[type=number]:focus + label,
        .green-theme input[type=password]:focus + label,
        .green-theme textarea:focus + label{
            color: #388e3c !important;
        }
        .green-theme input[type=text]:focus,
        .green-theme input[type=number]:focus,
        .green-theme input[type=email]:focus,
        .green-theme input[type=password]:focus,
        .green-theme input[type=password]:focus,
        .green-theme textarea:focus{
            border-bottom: 1px solid #388e3c !important;
            box-shadow: 0 1px 0 0 #388e3c !important;
        }
        .input-field .prefix.active{
            color:#388e3c !important;
        }
        .green-theme input[type="radio"].with-gap:checked+label:before,
        .green-theme input[type="radio"].with-gap:checked+label:after {
            border: 2px solid #388e3c !important;
        }
        .green-theme input[type="radio"].with-gap:checked+label:after {
            background-color: #388e3c !important;
        }

        /*ERROR FORM THEME*/
        .error-theme input[type=text]:focus + label,
        .error-theme input[type=text]+ label,
        .error-theme input[type=number]+ label,
        .error-theme input[type=email]+ label,
        .error-theme textarea:focus + label,
        .error-theme textarea + label{
            color: #ef5350  !important;
        }
        .error-theme input[type=text]:focus,
        .error-theme input[type=text],
        .error-theme input[type=number],
        .error-theme input[type=email],
        .error-theme textarea:focus,
        .error-theme textarea{
            border-bottom: 1px solid #ef5350  !important;
            box-shadow: 0 1px 0 0 #ef5350  !important;
        }
        .error-theme input[type="radio"].with-gap:checked+label:before,
        .error-theme input[type="radio"].with-gap:checked+label:after {
            border: 2px solid #ef5350  !important;
        }
        .error-theme input[type="radio"].with-gap:checked+label:after {
            background-color: #ef5350  !important;
        }

        .page-footer, .footer-copyright{
            background-color:#43a047  !important;
        }
        
        body{
            background-color:#f0c514;
        }
        h6{
            font-size:20px;
        }
        .leftSide{
            background-color:#388E3C;
            min-height:100% !important;
            margin: 0 auto !important;
            padding: 10px !important;
            height: 100% !important;
        }
        h1{
            font-family: 'Oswald', sans-serif;
            color: white;
        }
        p{
            font-family: 'Saira Extra Condensed', sans-serif;
            font-size:24px;
        }
        .tabs .indicator {
            background-color: #388E3C !important;
        }
        .tabs .tab a:hover {
            color:#000 !important;
        }
        .tabs .tab a {
            color: #01579b   !important;
        }
    </style>
    <body>        
