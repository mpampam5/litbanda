
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form">

						 <div class="form-group">
                <label for="varchar">Video</label>
                <input type="text" class="form-control" name="video" id="video" placeholder="Video" value="<?php echo $video; ?>" />
            </div>


           <div class="form-group">
             <label for="">Deskripsi</label>
             <textarea class="form-control" name="desc" id="desc"  rows="6" cols="80"><?=$desc?></textarea>
           </div>

						 <div class="form-group">
                <label for="varchar">Embed Video Youtube (https://www.youtube.com/watch?v=<i class="text-danger">HeXBvN-JJZg</i>)</label>
                <input type="text" class="form-control" name="embed" id="embed" placeholder="Embed" value="<?php echo $embed; ?>" />
            </div>
<hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="<?=site_url(config_item("cpanel").'video')?>" class="btn btn-sm btn-default btn-block"> batal</a>
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>
    </div>
  </div>


<script type="text/javascript">

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
                    window.location.href="<?=site_url(config_item("cpanel").'video')?>";
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
