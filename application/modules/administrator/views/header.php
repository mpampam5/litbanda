<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=profile("title")?> - <?=$layout_title?></title>
    <link rel="shortcut icon" href="<?=base_url()?>temp/kendari.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=directory("admin_dir")?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=directory("admin_dir")?>bootstrap/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <link rel="stylesheet" href="<?=directory("admin_dir")?>dist/css/style-custom.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=directory("admin_dir")?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=directory("admin_dir")?>dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?=directory("admin_dir")?>animate.min.css">

    <link rel="stylesheet" href="<?=directory("admin_dir")?>plugins/funcybox/jquery.fancybox.css">
    <!-- date datepicker -->
    <link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datepicker/datepicker3.css">

    <style media="screen">
      .content-wrapper{
        background-color:#222d32;
        background-image: url('<?=directory("admin_dir")?>page-bg.png');
      }
      .navbar{background:#03a9f4!important }
      .main-header .logo{background:#03a9f4!important;font-size: 18px;
      }
    </style>
<!-- <script src="<?=directory('admin_dir')?>plugins/nestable/jquery.min.js"></script> -->
    <script src="<?=directory("admin_dir")?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <script src="<?=directory("admin_dir")?>plugins/funcybox/jquery.fancybox.pack.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=directory("admin_dir")?>bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=directory("admin_dir")?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=directory("admin_dir")?>plugins/fastclick/fastclick.min.js"></script>

    <script src="<?=directory("admin_dir")?>plugins/moment.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=directory("admin_dir")?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=directory("admin_dir")?>dist/js/demo.js"></script>

    <script src="<?=directory('admin_dir')?>plugins/jquery.slugify.js"></script>
    <!-- datepicker -->
    <script src="<?=directory('admin_dir')?>plugins/datepicker/bootstrap-datepicker.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?=site_url(config_item("cpanel").'home')?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><i class="fa fa-free-code-camp "></i></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"> <b><?=strtoupper(profile("title"))?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- <li class="dropdown notifications-menu">
                <a href="<?=site_url(config_item("cpanel").'berita/tambah')?>" alt="Tambah Berita"><i class="fa fa-plus-circle fa-2"></i></a>
              </li> -->

              <li class="dropdown notifications-menu">
                <?=agenda_alert(date('Y-m-d'))?>
              </li>

              <li class="dropdown messages-menu">
                <?=kontak()?>
              </li>





              <!-- User Account: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if (sess("image")==""): ?>
                    <img src="<?=base_url()?>temp/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <?php else: ?>
                      <img src="<?=base_url()?>temp/upload/thumbs/<?=sess("image")?>" class="user-image" alt="User Image">
                <?php endif; ?>
                  <span class="hidden-xs">hii, <?=sess("name") ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php if ($this->session->userdata("image")==""): ?>
                      <img src="<?=base_url()?>temp/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <?php else: ?>
                        <img src="<?=base_url()?>temp/upload/thumbs/<?=sess("image")?>" class="img-circle" alt="User Image">
                  <?php endif; ?>

                    <p>
                      <?=sess("name") ?>
                      <small><?=sess("email") ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=base_url(config_item("cpanel"))?>/change_pwd/index" id="reset" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Ganti Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=site_url(config_item("auth").'/logout')?>"  class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>

              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
            <?=menu()?>
        </section>
        <!-- /.sidebar -->
      </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
              <!-- Main content -->
              <section class="content">
