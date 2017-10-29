<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href ="<?= $this->config->base_url() ?>assets/maxim/css/style.css" rel="stylesheet">
        <link href ="<?= $this->config->base_url() ?>assets/maxim/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?= $this->config->base_url() ?>assets/maxim/color/default.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>images/img/petexIcon.ico">
        <link  href ="<?= $this->config->base_url() ?>assets/fontawesome/css/font-awesome.min.css" rel ="stylesheet">
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/jquery.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/jquery.scrollTo.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/jquery.nav.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/jquery.localscroll-1.2.7-min.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/bootstrap.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/jquery.prettyPhoto.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/isotope.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/jquery.flexslider.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/inview.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/animate.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/maxim/js/custom.js"></script>
        <script src="<?= $this->config->base_url() ?>assets/sweetalert-master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>assets/sweetalert-master/dist/sweetalert.css">
    </head>
    <style>
        .navImg{
            height:40px;
            max-width: 100%;
            display:block;
        }
        .navbar .navbar-inner{
            background: #388E3C ;

        }
        .headerIcon{
            height:180px;
        }
        .footerIcon{
            height:90px;
            margin-left:20px
        }
        hr {
            display: block;
            height: 2px;
            border: 0;
            border-top: 1px solid #000;
            margin: 1em 0;
            padding: 0; 
        }
        @media only screen and (max-width: 768px) {
            .navImg {
                margin-top: 10px;
            }
            .home-slide-content{
                font-size:40px !important;
            }
            body{
                padding-left:0px !important;
                padding-right:0px !important;
            }
        }
        
        .featuresPic{
            max-height:200px;   
        }
        #aboutBg{
            background: url(<?= base_url() ?>images/img/bg/pawBg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .service-box:hover{
            background-color: #388E3C;
        }
    </style>
    <body>
        <!-- navbar -->
        <div class="navbar-wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top" >
                <div class="navbar-inner">
                    <div class="container">
                        <!-- Responsive navbar -->
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
                        <h1 class="brand"><a href=""><img src = "<?= $this->config->base_url() ?>images/logo/logo.png" class="navImg"/></a></h1>
                        <!-- navigation -->
                        <nav class="pull-right nav-collapse collapse">
                            <ul id="menu-main" class="nav">
                                <li><a title="Team" href="#aboutBg">About</a></li>
                                <li><a title="Services" href="#services">Services</a></li>
                                <li><a title="Contact" href="#contact">Contact</a></li>
                                <li><a title="Login" href="<?= base_url() ?>login/">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>