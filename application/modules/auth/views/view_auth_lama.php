<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=$this->config->item('admin_dir')?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=$this->config->item('admin_dir')?>dist/css/AdminLTE.min.css">
    <!-- jQuery 2.1.4 -->
    <script src="<?=$this->config->item('admin_dir')?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=$this->config->item('admin_dir')?>bootstrap/js/bootstrap.min.js"></script>

  </head>


  <style media="screen">
    .login-page{background-image: url('<?=directory("admin_dir")?>page-bg.png');}
  </style>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><?=$logo?></a>
      </div><!-- /.login-logo -->

      <div class="login-box-body">
        <div id="alert"></div>
        <?php echo form_open('Auth/get_login', array('id' =>'form-login'));?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button id="bt-login" type="submit" class="btn btn-primary btn-block btn-flat" data-loading-text="<i class='fa fa-spinner fa-spin '></i> &nbsp; Sedang Di Proses ...">Masuk</button>
            </div><!-- /.col -->
          </div>
        <?php echo form_close();?>

      </div><!-- /.login-box-body -->
      <p><h4 class="text-center"> &copy;<?=strtoupper(profile("title"))?> VERSION <?=me("version");?></h4></p>
    </div><!-- /.login-box -->

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
  </body>
</html>
