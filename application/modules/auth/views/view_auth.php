<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Login - <?=profile("title")?></title>

        <meta name="description" content="Admin Login">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">


        <link rel="shortcut icon" href="<?=base_url()?>temp/logo/favicon.ico">
        <link rel="apple-touch-icon" href="<?=base_url()?>temp/login/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?=base_url()?>temp/login/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?=base_url()?>temp/login/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?=base_url()?>temp/login/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?=base_url()?>temp/login/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?=base_url()?>temp/login/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?=base_url()?>temp/login/img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?=base_url()?>temp/login/img/icon180.png" sizes="180x180">

        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?=base_url()?>temp/login/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?=base_url()?>temp/login/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?=base_url()?>temp/login/css/main.css">

        <!-- Include a specific file here from <?=base_url()?>temp/login/css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?=base_url()?>temp/login/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?=base_url()?>temp/login/js/vendor/modernizr.min.js"></script>

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="<?=base_url()?>temp/login/js/vendor/jquery.min.js"></script>
        <script src="<?=base_url()?>temp/login/js/vendor/bootstrap.min.js"></script>
        <script src="<?=base_url()?>temp/login/js/plugins.js"></script>
        <script src="<?=base_url()?>temp/login/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_url()?>temp/login/js/pages/login.js"></script>

        <style media="screen">
          #login-container > .block{
            background: rgba(0, 0, 0, 0.6);
          }
        </style>
    </head>
    <body>
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="<?=base_url()?>temp/logo.png" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Full Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                <h1><strong><?=strtoupper(profile("title"))?></strong></h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
              <div id="alert"></div>
                <!-- Login Form -->
                <form action="<?=base_url(config_item("auth"))?>/get_login" id="form-login" class="form-horizontal  form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text"  name="email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-xs-12">
                          <div id="email"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" name="password" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-xs-12">
                          <div id="password"></div>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-xs-12">
                            <button id="bt-login" type="submit" class="btn btn-sm btn-primary btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i> &nbsp; Sedang Di Proses ..."><i class="fa fa-angle-key"></i> Login</button>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->


            <!-- END Login Block -->
        </div>

        <script type="text/javascript">
           $("#form-login").submit(function(e){
             e.preventDefault();
             var me = $(this);
             $('#bt-login').prop('disabled', true)
                         .button('loading');
             //ajax
             $.ajax({
               url      : me.attr('action'),
               type     : 'POST',
               data     :me.serialize(),
               dataType : 'JSON',
                         success:function(json){
                           if (json.success==true) {
                             if (json.status==true) {
                                   window.location.href = json.url;
                                 }else {
                                   $('.alert-danger').remove();
                                   $('#alert').append('<div class="alert alert-danger">'+
                                                 '<span class="fa fa-times-circle"></span>&nbsp;&nbsp;'+
                                                 json.alert+
                                                 '<div>');
                                 me[0].reset();
                                 $("#email").focus();
                                 $('#bt-login').button('reset');
                                 $('.text-danger').remove();
                                 $('div').closest('.form-group').removeClass('has-error').removeClass('has-success');
                                 $('.alert-danger').delay(500).show(10, function(){
                                   $('.alert-danger').delay(10000).hide(10, function(){
                                     $('.alert-danger').remove();
                                   });
                                 })
                                }


                           }else {
                             $.each(json.alert, function(key, value) {
                               var element = $('#' + key);
                               $('#bt-login').button('reset');
                               $(element)
                               .closest('.form-group')
                               .removeClass('has-error')
                               .removeClass('has-success')
                               .addClass(value.length > 0 ? 'has-error' : 'has-success')
                               .find('.text-danger').remove();
                               $(element).after(value);
                             });
                           }
                         }
             });
           });
        </script>


        <script>$(function(){ Login.init(); });</script>
    </body>
</html>
