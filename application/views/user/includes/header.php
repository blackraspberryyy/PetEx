<?php
$userInfo = $this->user_model->getinfo('user', array('user_id' => $this->session->userid))[0];
?>

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
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <!--<script src="<?= $this->config->base_url() ?>assets/materialize/js/materialize.js"></script>-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--"Document.ready scripts"-->
        <script>
            $(document).ready(function () {
                $(".button-collapse").sideNav();
                $('.modal').modal();
            });

        </script>

        <!--Font Awesome Icons-->
        <link rel = "stylesheet" href = "<?= $this->config->base_url() ?>assets/fontawesome/css/font-awesome.min.css">

    </head>
    <style>
        #user-nav{
            top:65px;
            height: calc(100% - 65px);
        }
        .card-image{
            height:175px !important;
        }
        body {
            display: flex !important;
            min-height: 100vh !important;
            flex-direction: column !important;
        }

        main {
            flex: 1 0 auto !important;
        }
        .name,.email{
            color:white !important;
        }
        .side-nav-active a, .side-nav-active i, .side-nav-active{
            color:#2e7d32 !important;
        }
        h2,h4{
            font-family: 'Open Sans Condensed', sans-serif;
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
            font-family: 'Open Sans Condensed', sans-serif;
        }
        .pagination .active{
            background-color:#2e7d32 !important;
        }
        .navbar-fixed {
            z-index: 999;
        }
        hr.style-seven {
            overflow: visible; /* For IE */
            height: 30px;
            border-style: solid;
            border-color: #f0c514;
            border-width: 2px 0 0 0;
            border-radius: 20px;
            margin-left:-50px; 
            margin-right:-50px;
        }
        hr.style-seven:before { /* Not really supposed to work, but does */
            display: block;
            content: "";
            height: 30px;
            margin-top: -31px;
            border-style: solid;
            border-color: #f0c514;
            border-width: 0 0 2px 0;
            border-radius: 20px;
        }
        .pet_info{
            font-size:20px !important;
            color:black;
        }
    </style>
    <body>
        <?php
        date_default_timezone_set("Asia/Manila");
        ?> 
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                $('.preloader-background').delay(1000).fadeOut('slow');
                $('.preloader-wrapper').delay(1000).fadeOut();
            });
        </script>
        <?php include 'preloader.php' ?>