<?php
$userInfo = $this->admin_model->getinfo('user', array('user_id' => $this->session->userid))[0];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>images/img/petexIcon.ico">

        <!-- fullCalendar.io-->
        <link href='<?= $this->config->base_url() ?>assets/fullCalendar/css/fullcalendar.min.css' rel='stylesheet' />
        <link href='<?= $this->config->base_url() ?>assets/fullCalendar/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />

        <!--JQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src='<?= $this->config->base_url() ?>assets/fullCalendar/js/moment.min.js'></script>
        <script src='<?= $this->config->base_url() ?>assets/fullCalendar/js/fullcalendar.min.js'></script>

        <!--Odometer-->
        <script src = "<?= $this->config->base_url() ?>assets/odometer/js/odometer.js"></script>
        <link rel ="stylesheet" href ="<?= $this->config->base_url() ?>assets/odometer/css/odometer-theme-minimal.css">

        <!--Materialize.css-->
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>assets/materialize/css/materialize.css"/>
        <script type="text/javascript" src="<?= $this->config->base_url() ?>assets/materialize/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!--Materialize Steppers-->
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>assets/steppers/materialize-stepper.min.css">
        <script src="<?= $this->config->base_url() ?>assets/steppers/materialize-stepper.min.js"></script>

        <!--Turbowyg-->
        <script src="<?= base_url();?>assets/trumbowyg/dist/trumbowyg.min.js"></script>
        <link rel="stylesheet" href="<?= base_url();?>assets/trumbowyg/dist/ui/trumbowyg.min.css">
        <!--"Document.ready scripts"-->
        <script>
            $(document).ready(function () {
                $('select').material_select();
                $('.materialboxed').materialbox();
                $('.modal').modal();
                $(".button-collapse").sideNav();
                $('.tooltipped').tooltip({delay: 50});
                $('.collapsible').collapsible();
                $('.collapsible').collapsible({
                    accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
                });
            });
        </script>

        <!--Font Awesome Icons-->
        <link rel = "stylesheet" href = "<?= $this->config->base_url() ?>assets/fontawesome/css/font-awesome.min.css">

    </head>
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

