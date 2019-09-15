<div id="pesan"></div>
<form id="aksi_edit" action="<?=base_url(config_item("cpanel"))?>/change_pwd/aksi_pwd">
  <div class="form-group">
    <label for="">Passsword Baru</label>
    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Passsword Baru">
  </div>

  <div class="form-group">
    <label for="">Konfirmasi Password Baru</label>
    <input type="password" class="form-control" id="pwd_con" name="pwd_con" placeholder="Konfirmasi Password Baru">
  </div>

  <button type="submit" name="sumbit" id="submit" class="btn btn-info btn-sm btn-block" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..."> Ubah Password</button>
</form>


<script type="text/javascript">
$("#aksi_edit").submit(function(e){
  e.preventDefault();
  var me = $(this);
  $("#submit").prop('disabled',true)
              .button('loading');

  $.ajax({
        url             : me.attr('action'),
        type            : 'post',
        data            :  new FormData(this),
        contentType     : false,
        cache           : false,
        dataType        : 'JSON',
        processData     :false,
        success:function(json){
          if (json.success==true) {
            $('#pesan').append('<div class="alert alert-success">'+
                                '<span class="fa fa-envelope-o"></span> '+
                                json.alert+
                                '<div>');
              $('.form-group').removeClass('.has-error')
                              .removeClass('.has-success');
              $('.text-danger').remove();
               $('#ModalGue').animate({ scrollTop: 0 }, 'slow');
              $('.alert-success').delay(500).show(10, function(){
                $('.alert-success').delay(3000).hide(10, function(){
                  $('.alert-success').remove();
                  $("#ModalGue").modal('hide');
                  // window.location.href ="album";
                  location.reload();
                });
              })
          }else {
            $.each(json.alert, function(key, value) {
              var element = $('#' + key);
              $('#submit').button('reset');
              $(element)
              .closest('.form-group')
              .find('.text-danger').remove();
              $(element).after(value);
            });
          }
        }
  });
});
</script>
