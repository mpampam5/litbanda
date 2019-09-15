<?php


$string ="\n\n<div class=\"box\">
  <div class=\"box-header with-border\">
    <h3 class=\"box-title\"><?=ucfirst(\$button).\" \".\$layout_title?></h3>
  </div>

  <div class=\"box-body\">
      <div id=\"pesan\"></div>
      <form action=\"<?=\$aksi?>\" id=\"form\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
        $string .= "\n\n\t\t\t\t\t\t <div class=\"form-group\">
                <label for=\"".$row["column_name"]."\">".label($row["column_name"])."</label>
                <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
            </div>";
    } else
    {
        $string .= "\n\n\t\t\t\t\t\t <div class=\"form-group\">
                <label for=\"".$row["data_type"]."\">".label($row["column_name"])."</label>
                <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
            </div>";
    }
}

$string.="\n<hr>\n\n        <div class=\"row\">
            <div class=\"col-md-6\">
            <!-- MODAL ClOSE -->
            <!-- <button type=\"button\" class=\"btn btn-default btn-sm btn-block\" data-dismiss=\"modal\" aria-label=\"Close\">tutup</button> -->
              <a href=\"<?=site_url('$direct_url$c_url')?>\" class=\"btn btn-sm btn-default btn-block\"> batal</a>
            </div>

            <div class=\"col-md-6\">
              <button type=\"submit\" data-loading-text=\"<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ...\" class=\"btn btn-info btn-sm btn-block\" name=\"submit\" id=\"submit\"><?=\$button?></button>
            </div>
        </div>

      </form>
    </div>
  </div>";

$string .="\n\n
<script type=\"text/javascript\">
  $(\"#form\").submit(function(e){
    e.preventDefault();
    var me = $(this);
    $(\"#submit\").prop('disabled',true)
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
              $('#pesan').append('<div class=\"alert alert-success\">'+
                                  '<span class=\"fa fa-envelope-o\"></span> '+
                                  json.alert+
                                  '<div>');
                $('.form-group').removeClass('.has-error')
                                .removeClass('.has-success');
                $('.text-danger').remove();
                 $('body,html').animate({ scrollTop: 0 }, 'slow');
                $('.alert-success').delay(500).show(10, function(){
                  $('.alert-success').delay(5000).hide(10, function(){
                    $('.alert-success').remove();
                    window.location.href=\"<?=site_url('$direct_url$c_url')?>\";
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
  </script>";
$hasil_view_form = createFile($string, $target . $target."".$direct_created_view."". $c_url . "/" . $v_form_file);

 ?>
