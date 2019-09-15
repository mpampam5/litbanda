<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="keywords" content="Politeknik kp bone, Politeknik kelautan dan perikanan bone, Kelautan dan perikanan, kabupaten bone, bone, kampus, sulawesi selatan, sul-sel, indonesia, dosen, mahasiswa, mahasiswi, kelautan, perikanan, kementrian kelautan dan perikanan, republik indonesia, taruna" />
    <title>Politeknik KP Bone :: <?=$temp_title?></title>
    <meta name="title" content="Politeknik KP Bone :: <?=$temp_title?>">
    <meta name="description" content="Selamat Datang Di Website Resmi Politeknik Kelautan Dan Perikanan Bone">

    <meta property="og:title" content="<?=profile("title")?> :: <?=$temp_title?>">
    <meta property="og:url" content="<?=site_url()?>">
    <meta property="og:description" content="Selamat datang di website resmi Politeknik Kelautan dan perikanan bone">
    <meta property="og:image" content="<?=base_url()?>temp/logo400x400.png">
    
    <link rel="shortcut icon" href="<?=base_url()?>temp/logo/favicon.ico">
    <link rel="stylesheet" href="<?=base_url()?>temp/admin/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700|Montserrat:400,700|Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>temp/public/css/bootsrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>temp/public/css/style-custom.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>temp/public/css/custom.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>temp/public/bootstrap/css/bootstrap.min.css"> -->



    <script type="text/javascript" src="<?=base_url()?>temp/public/js/jquery-3.1.1.slim.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>temp/public/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?=base_url()?>temp/public/js/jquery.min.js"></script>

    <script type="text/javascript">
    $(window).load(function() {
      $( '#loader' ).addClass( 'active' );
      setTimeout( function(){
          $('#loader').removeClass( 'active' );
          $('#pagess').attr("style",' visibility: visible');
      }, 1000);
    });


    </script>

   <script type="text/javascript" src="<?=base_url()?>temp/public/js/slick.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>temp/public/js/jquery.pin.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>temp/public/js/jquery.nav.js"></script>
   <script type="text/javascript" src="<?=base_url()?>temp/public/js/jquery.matchHeight-min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>temp/public/js/apps.js"></script>
   <script type="text/javascript" src="<?=base_url()?>temp/public/js/apps-custom.js"></script>
   <script type="text/javascript" src="<?=base_url()?>temp/public/js/imagesloaded.pkgd.min.js"></script>




</head>
<body>
  <div id="loader"><img src="<?=base_url()?>temp/Preloader_3.gif"></div>
<div id="pagess" style="visibility: hidden;">
    <!-- HEADER -->
    <header id="header" class="header-fancy">
    <nav class="navbar navbar-default topbar">
        <div class="container">
            <div class="header-nav">
                <button class="nav-more"><i class="ion ion-android-more-vertical"></i></button>
                <?=top_menus();?>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="navbar-header">
                        <a href="<?=site_url()?>" class="navbar-brand">
                <img src="<?=base_url()?>temp/logo68x69.png" alt="Universitas Gadjah Mada" class="img-responsive">
                <span><?=profile("title")?></span>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav id="navbar" class="navbar navbar-collapse navbar-default collapse">
          <?=menus_header();?>
          <ul class="nav navbar-nav navbar-right">
            <li>
                <form action="<?=base_url()?>search" class="search-form" id="search-form" method="get">
                    <div class="input-group btn-group">
                        <input type="text" class="form-control" name="index" id="index" placeholder="Pencarian ..." >
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
        </ul>

      </nav>
    </div>
</header>    <!-- / HEADER -->

<div id="body">
