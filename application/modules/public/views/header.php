<!DOCTYPE html>
<html lang="en">
<head>
  <!-- meta -->
  <meta charset="utf-8">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="<?=base_url()?>temp/kendari.png">
  <title><?=$temp_title?></title>


  <meta name="title" content="<?=$temp_title?>">
  <meta name="keywords" content="balitbang,sultra,kendari,sulawesi tenggara,Badan Penelitian & Pengembangan,provinsi sulawesi tenggara,Badan Litbang,<?=str_replace("-",",",url_title($temp_title))?>">
  <meta name="description" content="<?=$temp_description?>">
  <meta name="author" content="balitbang prov sulawesi tenggara">

  <meta property="og:title" content="<?=$temp_title?>">
  <meta property="og:url" content="<?=site_url()?>">
  <meta property="og:description" content="<?=$temp_description?>">
  <meta property="og:image" content="<?=base_url()?>/temp/kendari.png">
  <meta property="fb:admins" content="335142706877048" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:width" content="650" />
  <meta property="og:image:height" content="366" />

  <meta name="language" content="id" />
  <meta name="geo.country" content="id" />
  <meta http-equiv="content-language" content="In-Id" />
  <meta name="geo.placename" content="Indonesia" />
  <!-- vendor css -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link rel="stylesheet" href="<?=base_url()?>temp/public/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>temp/public/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>temp/public/plugins/animate/animate.min.css">


  <!-- theme css -->
  <link rel="stylesheet" href="<?=base_url()?>temp/public/css/theme.css">
  <link rel="stylesheet" href="<?=base_url()?>temp/public/css/custom.css">
  <!-- vendor js -->
  <script src="<?=base_url()?>temp/public/plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?=base_url()?>temp/public/plugins/popper/popper.min.js"></script>
  <script src="<?=base_url()?>temp/public/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>temp/public/js/app-config.js"></script>



</head>
<body class="fixed-header">
  <!-- header -->
  <header id="header">
    <div class="container">
      <div class="navbar-backdrop">
        <div class="navbar">
          <div class="navbar-left">
            <a class="navbar-toggle"><i class="fa fa-bars"></i></a>
            <a href="<?=site_url()?>" class="logo"><img src="<?=base_url()?>temp/logo-sulteng.png" alt="LOGO"></a>
            <nav class="nav menus_items"><?=menus()?></nav>
          </div>

        </div>
      </div>

    </div>
  </header>
  <!-- /header -->

  <div class="preloader">
  		  <div class="loading">
  		    <img src="<?=base_url()?>/temp/load.svg" width="150">
  		  </div>
  </div>
