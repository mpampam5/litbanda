<script src="<?=directory('admin_dir')?>plugins/tinymce/tinymce.min.js"></script>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form" autocomplete="off">


               <div class="col-lg-9">
                 <div class="form-group">
                    <label for="varchar">Judul <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
                    <span class="help-block text-info">Slug : <span id="permalink"></span></span>
                </div>


                <!-- <div class="form-group">
                   <label for="varchar">Slug</label>
                   <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="<?php echo $slug; ?>" />
               </div> -->



    						 <div class="form-group">
                    <label for="desc">Konten <b class="text-danger">*</b></label>
                    <textarea class="form-control textarea" rows="3" name="desc" id="desc"  style="width: 100%; height: 500px;"><?php echo $desc; ?></textarea>
                </div>



               </div>

               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Title Seo <b class="text-danger">*</b></label>
                   <input type="text" class="form-control" id="seotitle" name="seotitle" value="<?php echo $slug; ?>" placeholder="Seotitle">
                 </div>


                 <div class="form-group">
                   <label for="">Kategori <b class="text-danger">*</b></label>
                    <?=cmb_dinamis("kategori","kategori","kategori","kategori","id_kategori",$kategori)?>
                 </div>

                 <div class="form-group">
                    <label>Gambar</label>
                    <div class="input-group">
                        <div class="input-group-btn">
                          <a  id="browse" class="btn btn-primary fancy" href="<?=directory('admin_dir')?>plugins/responsive_filemanager/filemanager/dialog.php?type=1&field_id=ok&lang=en_EN&akey=mpampamkeys" data-fancybox-type="iframe">Browse</a>
                        </div>
                      <input type="text" class="form-control" name="image" id="image" placeholder="Gambar" value="<?php echo $image; ?>">
                      <input type="hidden" name="ok" id="ok">
                    </div>
                </div>

                <!-- <div class="form-group">
                  <label for="">Tampilkan Komentar</label>
                  <select class="form-control" name="komentar" id="komentar">
                    <option <?=($komentar==1)?"selected":""?> value="1">Ya</option>
                    <option <?=($komentar==0)?"selected":""?> value="0">Tidak</option>
                  </select>
                </div> -->

                <input type="hidden" name="komentar" id="komentar" value="0">

               </div>

<p>&nbsp;</p>

            <div class="col-lg-12">
              <div class="col-md-6">
              <!-- MODAL ClOSE -->
              <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
                <a href="<?=site_url(config_item("cpanel").'berita')?>" class="btn btn-sm btn-default btn-block"> batal</a>
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
  selector: "#desc",
  editor_deselector : "mceNoEditor",
  skin: "lightgray",
  plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons paste textcolor responsivefilemanager",
    "code fullscreen youtube autoresize codemirror codesample"
  ],
  menubar : false,
  toolbar1: "undo redo | fontsizeselect | styleselect | link unlink | forecolor backcolor | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent table | fullscreen",
  image_advtab: true,
  fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
  relative_urls: false,
  remove_script_host: false,
  setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
});




$(document).ready(function(){
    $('.fancy').fancybox({
        'width':850,
        'height':500,
        'autoSize' : false
      });


    $('#judul').on('input', function() {
  		var permalink;
  		permalink = $.trim($(this).val());
  		permalink = permalink.replace(/\s+/g,' ');
  		$('#seotitle').val(permalink.toLowerCase());
  		$('#seotitle').val($('#seotitle').val().replace(/\W/g, ' '));
  		$('#seotitle').val($.trim($('#seotitle').val()));
  		$('#seotitle').val($('#seotitle').val().replace(/\s+/g, '-'));
  		var gappermalink = $('#seotitle').val();
  		$('#permalink').html(gappermalink);
  	});

    $('#seotitle').on('input', function() {
  		var permalink;
  		permalink = $(this).val();
  		permalink = permalink.replace(/\s+/g,' ');
  		$('#seotitle').val(permalink.toLowerCase());
  		$('#seotitle').val($('#seotitle').val().replace(/\W/g, ' '));
  		$('#seotitle').val($('#seotitle').val().replace(/\s+/g, '-'));
  		var gappermalink = $('#seotitle').val();
  		$('#permalink').html(gappermalink);
	 });

   $('#seotitle').ready(function(){
     var gappermalink = $('#seotitle').val();
     $('#permalink').html(gappermalink);
   });


  });

  function responsive_filemanager_callback(field_id){
    var image = $('#'+field_id).val();
    var string = image;
    var str = string.replace("<?=base_url()?>temp/upload/img/","");
    $('#image').attr('value',str);
  }


  // $("#judul").on("keyup", function () {
  //         var slug = getSlug($("#judul").val());
  //         $("#slug").val(slug);
  //     });

// $(function(){
//   $(".textarea").wysihtml5({
//     toolbar: {
//             "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
//             "emphasis": true, //Italics, bold, etc. Default true
//             "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
//             "html": false, //Button which allows you to edit the generated HTML. Default false
//             "link": true, //Button to insert a link. Default true
//             "image": false, //Button to insert an image. Default true,
//           }
//   });
// })

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
                    window.location.href="<?=site_url(config_item("cpanel").'berita')?>";
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
