<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>
        
        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        
        
        <!--Odometer-->
        <script src = "<?= $this->config->base_url()?>assets/odometer/js/odometer.js"></script>
        <link rel ="stylesheet" href ="<?= $this->config->base_url()?>assets/odometer/css/odometer-theme-minimal.css">
        
        <!--Materialize.css-->
        <link rel="stylesheet" href="<?= $this->config->base_url()?>assets/materialize/css/materialize.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--"Document.ready scripts"-->
        <script>
            $( document ).ready(function(){
                $('select').material_select();
                $('.materialboxed').materialbox();
                $('.modal').modal();
                $(".button-collapse").sideNav();
                $('.tooltipped').tooltip({delay: 50});
                $('.collapsible').collapsible();
                $('.collapsible').collapsible({
                    accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
                  });
            });
        </script>
        
        <!--Font Awesome Icons-->
        <link rel = "stylesheet" href = "<?= $this->config->base_url()?>assets/fontawesome/css/font-awesome.min.css">
        
    </head>
    <body>
        <?php 
            date_default_timezone_set("Asia/Manila");
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(){
                $('.preloader-background').delay(1700).fadeOut('slow');
                $('.preloader-wrapper').delay(1700).fadeOut();
            });
        </script>
        <?php include 'preloader.php'?>

