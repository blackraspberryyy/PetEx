<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?= $this->config->base_url() ?>assets/materialize/css/materialize.css"/>
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>images/img/petexIcon.ico">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald|Saira+Extra+Condensed" rel="stylesheet">
        <!--Font Awesome Icons-->
        <link rel = "stylesheet" href = "<?= $this->config->base_url() ?>assets/fontawesome/css/font-awesome.min.css">
    </head>
    <style>
        body{
            background:#388E3C;
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