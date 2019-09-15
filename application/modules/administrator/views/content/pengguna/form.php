<style media="screen">
.fancybox-inner{
  min-height: 500px!important;
}

</style>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form">

						 <div class="form-group">
                <label for="varchar">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Telepon</label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>

						 <?php if ($button=="tambah"): ?>
               <div class="form-group">
                 <label for="">Passsword Baru</label>
                 <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Passsword Baru">
               </div>

               <div class="form-group">
                 <label for="">Konfirmasi Password Baru</label>
                 <input type="password" class="form-control" id="pwd_con" name="pwd_con" placeholder="Konfirmasi Password Baru">
               </div>
               <?php else: ?>
                 <div class="form-group">
                    <input type="hidden" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                </div>
             <?php endif; ?>

						 <div class="form-group">
                <label for="int">Groups</label>
                <?=cmb_query("SELECT * FROM groups WHERE id_level !=36 ORDER BY id_level DESC ",'groups','groups','level','id_level',$groups) ?>
            </div>

            <div class="form-group">
              <label for="enum">Gambar</label>
              <div class="input-group">
                  <div class="input-group-btn">
                    <a  id="browse" class="btn btn-primary fancy" href="<?=directory('admin_dir')?>plugins/responsive_filemanager/filemanager/dialog.php?type=1&field_id=ok&lang=en_EN&akey=mpampamkeys" data-fancybox-type="iframe">upload</a>
                  </div><!-- /btn-group -->
                <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>">
              </div>
            </div>



						 <div class="form-group">
                <label for="enum">Active</label>
                <select class="form-control" name="active" id="active">
                  <option <?=($active=="0")?"selected":""?> value="0">Tidak Aktif</option>
                  <option <?=($active=="1")?"selected":""?> value="1">Aktif</option>
                </select>
            </div>

            <hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="<?=site_url(config_item("cpanel").'pengguna')?>" class="btn btn-sm btn-default btn-block"> batal</a>
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>


        <input type="hidden" name="ok" id="ok">

      </form>
    </div>
  </div>




<script type="text/javascript">

$(document).ready(function(){
  $('.fancy').fancybox();
});

function responsive_filemanager_callback(field_id){
  var image = $('#'+field_id).val();
    var string = image;
    var str = string.replace("<?=base_url()?>temp/upload/img/","");
  $('#image').attr('value',str);
}


  $("#form").submit(function(e){
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
                 $('body,html').animate({ scrollTop: 0 }, 'slow');
                $('.alert-success').delay(500).show(10, function(){
                  $('.alert-success').delay(5000).hide(10, function(){
                    $('.alert-success').remove();
                    window.location.href="<?=site_url(config_item("cpanel").'pengguna')?>";
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
