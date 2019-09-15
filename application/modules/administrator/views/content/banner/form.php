


      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form">

              <div class="form-group">
                 <label>Gambar (Ukuran gambar 1349x500 px)</label>
                 <div class="input-group">
                     <div class="input-group-btn">
                       <a  id="browse" class="btn btn-primary fancy" href="<?=directory('admin_dir')?>plugins/responsive_filemanager/filemanager/dialog.php?type=1&field_id=ok&lang=en_EN&akey=mpampamkeys" data-fancybox-type="iframe">Browse</a>
                     </div>
                   <input type="text" class="form-control" name="image" id="image" placeholder="Gambar" value="<?php echo $image; ?>">
                   <input type="hidden" name="ok" id="ok">
                 </div>
             </div>

						 <div class="form-group">
                <label for="desc">Deskripsi</label>
                <textarea class="form-control textarea" rows="3" name="desc" id="desc"  style="width: 100%; height: 100px;"><?php echo $desc; ?></textarea>
            </div>
<hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button>
              <!-- <a href="<?=site_url(config_item("cpanel").'banner')?>" class="btn btn-sm btn-default btn-block"> batal</a> -->
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>



<script type="text/javascript">
$(document).ready(function(){
    $('.fancy').fancybox({
        'width':850,
        'height':500,
        'autoSize' : false
      });
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
                    window.location.href="<?=site_url(config_item("cpanel").'banner')?>";
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
