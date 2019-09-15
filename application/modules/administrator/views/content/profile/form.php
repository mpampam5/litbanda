
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form">

						 <div class="form-group">
                <label for="varchar">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3" cols="80"><?php echo $alamat; ?></textarea>
            </div>

						 <div class="form-group">
                <label for="varchar">Tlp</label>
                <input type="text" class="form-control" name="tlp" id="tlp" placeholder="Tlp" value="<?php echo $tlp; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Fax</label>
                <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax" value="<?php echo $fax; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Web</label>
                <input type="text" class="form-control" name="web" id="web" placeholder="Web" value="<?php echo $web; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>

            <div class="form-group">
               <label for="varchar">Facebook</label>
               <input type="text" class="form-control" name="facebook" id="facebook" placeholder="url facebook" value="<?php echo $facebook; ?>" />
           </div>

           <div class="form-group">
              <label for="varchar">Twitter</label>
              <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Url Twitter" value="<?php echo $twitter; ?>" />
          </div>

          <div class="form-group">
             <label for="varchar">Youtube</label>
             <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Url Youtube" value="<?php echo $youtube; ?>" />
         </div>

         <div class="form-group">
            <label for="varchar">Instagram</label>
            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Url Instagram" value="<?php echo $instagram; ?>" />
        </div>
<hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button>
              <!-- <a href="<?=site_url(config_item("cpanel").'profile')?>" class="btn btn-sm btn-default btn-block"> batal</a> -->
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>



<script type="text/javascript">
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
                    window.location.href="<?=site_url(config_item("cpanel").'profile')?>";
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
