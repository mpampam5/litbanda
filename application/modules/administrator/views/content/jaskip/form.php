

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form">

						<div class="row">
              <div class="col-md-9">
                <div class="form-group">
                   <label for="varchar">Judul Jaskip</label>
                   <input type="text" class="form-control" name="Judul_jaskip" id="Judul_jaskip" placeholder="Judul" value="<?php echo $Judul_jaskip; ?>" />
               </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                   <label for="varchar">File
                     <?php if ($button=="edit"): ?>
                       <i><a href="<?=base_url()?>file/uploads/pdf/<?=$userfile?>" target="_blank"> `<i class="fa fa-file"></i> Lihat file`</a></i>
                     <?php endif; ?>
                   </label>
                   <input type="file" class="form-control" name="userfile" placeholder="File"/>
                   <input type="hidden" name="userfile" value="<?=$userfile?>">
                   <div id="userfile"></div>
               </div>
              </div>
            </div>


						 <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" rows="7" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
            </div>


            <hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="<?=site_url('administrator/jaskip')?>" class="btn btn-sm btn-default btn-block"> batal</a>
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>
    </div>
  </div>


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
                    window.location.href="<?=site_url('administrator/jaskip')?>";
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
