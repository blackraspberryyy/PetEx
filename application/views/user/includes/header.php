<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>

        <!--Icon-->
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>images/img/petexIcon.ico">
        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <!--Materialize.css-->
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>assets/materialize/css/materialize.css"/>

        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

<!--<script src="<?= $this->config->base_url() ?>assets/materialize/js/materialize.js"></script>-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--"Document.ready scripts"-->
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
            });
        </script>

        <!--Font Awesome Icons-->
        <link rel = "stylesheet" href = "<?= $this->config->base_url() ?>assets/fontawesome/css/font-awesome.min.css">

    </head>
    <style>
        body {
            display: flex !important;
            min-height: 100vh !important;
            flex-direction: column !important;
        }

        main {
            flex: 1 0 auto !important;
        }
        .name,.email{
            color:black !important;

        }
        .side-nav-active a, .side-nav-active i, .side-nav-active{
            color:#2e7d32 !important;
        }
        h4{
            font-family: 'Roboto Condensed', sans-serif;
        }
        .controlImgSize{
            min-height: 40px;
            max-height: 150px;
            min-width: 40px;
            max-width: 150px; 
        }
        .previewImageControlSize{
            min-height: 40px;
            max-height: 250px;
            min-width: 40px;
            max-width: 350px;
        }
        .page-footer, .footer-copyright{
            background-color:#43a047  !important;

        }
        h6{
            font-size:30px;
        }
    </style>
    <body>
