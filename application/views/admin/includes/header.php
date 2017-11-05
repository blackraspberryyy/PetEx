<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>images/img/petexIcon.ico">
        
        <!-- fullCalendar.io-->
        <link href='<?= $this->config->base_url()?>assets/fullCalendar/css/fullcalendar.min.css' rel='stylesheet' />
        <link href='<?= $this->config->base_url()?>assets/fullCalendar/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        
        <!--JQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src='<?= $this->config->base_url()?>assets/fullCalendar/js/moment.min.js'></script>
        <script src='<?= $this->config->base_url()?>assets/fullCalendar/js/fullcalendar.min.js'></script>
        
        <!--Odometer-->
        <script src = "<?= $this->config->base_url()?>assets/odometer/js/odometer.js"></script>
        <link rel ="stylesheet" href ="<?= $this->config->base_url()?>assets/odometer/css/odometer-theme-minimal.css">
        
        <!--Materialize.css-->
        <link rel="stylesheet" href="<?= $this->config->base_url()?>assets/materialize/css/materialize.css"/>
        <script type="text/javascript" src="<?= $this->config->base_url() ?>assets/materialize/js/materialize.min.js"></script>
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
                  
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    handleWindowResize: true,
                    weekends: true, // Show weekends
                    //navLinks: true,  //can click day/week names to navigate views
                    timeFormat: 'hh:mm A',
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    displayEventTime: true,
                    allDayText: 'Events/Activity',
                    
                    events: [
                        {
                            title: 'PAWS Scaredy Cats and Dogs',
                            start: '2017-10-30',
                            editable: true,
                            color:'#fdd835',
                            allDay: true 
                        },
                        {
                            title: 'Vacation',
                            start: '2017-10-31',
                            end: '2017-11-2',
                            color: '#C2185B'

                        },
                        {
                            id: 999,
                            title: 'Voltaire',
                            start: '2017-10-03T16:00:00',
                            description: 'adoptMeTuesday',
                            color: '#2e7d32',
                        },
                        {
                            id: 999,
                            title: 'Iris',
                            start: '2017-10-10T16:00:00',
                            description: 'adoptMeTuesday',
                            color: '#2e7d32',
                        },
                        {
                            id: 999,
                            title: 'Kamie',
                            start: '2017-10-17T16:00:00',
                            description: 'adoptMeTuesday',
                            color: '#2e7d32',
                        },
                        {
                            id: 999,
                            title: 'Pola',
                            start: '2017-10-24T16:00:00',
                            description: 'adoptMeTuesday',
                            color: '#2e7d32',
                        },
                        {
                            title: 'Conference',
                            start: '2017-10-11',
                            end: '2017-10-13'
                        },
                        {
                            title: 'Meeting',
                            start: '2017-10-12T10:30:00',
                            end: '2017-10-12T12:30:00',
                        },
                        {
                            title: 'Lunch',
                            start: '2017-10-12T12:00:00',
                            color:'#8e24aa'
                        },
                    ],
                    
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
                $('.preloader-background').delay(1000).fadeOut('slow');
                $('.preloader-wrapper').delay(1000).fadeOut();
            });
        </script>
        <?php include 'preloader.php'?>

