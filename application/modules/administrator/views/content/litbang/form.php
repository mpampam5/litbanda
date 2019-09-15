
<script src="<?=directory('admin_dir')?>plugins/tinymce/tinymce.min.js"></script>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                 <label for="varchar">Judul</label>
                 <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
             </div>
            </div>

            <div class="col-md-9">
              <div class="form-group">
                 <label for="varchar">Penyusun</label>
                 <input type="text" class="form-control" name="penyusun" id="penyusun" placeholder="Penyusun" value="<?php echo $penyusun; ?>" />
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


            <div class="col-md-12">
              <div class="form-group">
                 <label for="deskripsi">Deskripsi</label>
                 <textarea class="form-control textarea" rows="7" name="deskripsi" id="deskripsi" style="width: 100%; height: 300px;" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
             </div>
            </div>
          </div>





<hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="<?=site_url('administrator/litbang')?>" class="btn btn-sm btn-default btn-block"> batal</a>
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>
    </div>
  </div>


<script type="text/javascript">



tinymce.init({
  selector: ".textarea",
  editor_deselector : "mceNoEditor",
  skin: "lightgray",
  plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
    "directionality emoticons paste textcolor responsivefilemanager",
    "code fullscreen youtube autoresize codemirror codesample"
  ],
  menubar : false,
  toolbar1: "undo redo | fontsizeselect | styleselect | link unlink | forecolor backcolor | bold italic underline | fullscreen",
  image_advtab: false,
  fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
  relative_urls: false,
  remove_script_host: false,
  setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
});
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
                    window.location.href="<?=site_url('administrator/litbang')?>";
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
