<?php

$string = "\n<div class=\"box\">
  <div class=\"box-header with-border\">
    <h3 class=\"box-title\">Detail <?=\$layout_title?></h3>
  </div>

  <div class=\"box-body\">
  <table class=\"table\">";
foreach ($non_pk as $row) {
  $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}

$string .= "\n\t</table>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type=\"button\" class=\"btn btn-default btn-sm \" data-dismiss=\"modal\" aria-label=\"Close\">tutup</button> -->
    <a href=\"<?=site_url('$direct_url$c_url')?>\" class=\"btn btn-default btn-sm\"> Kembali</a>
  </div>
</div>
";



$hasil_view_read = createFile($string, $target."".$direct_created_view."". $c_url . "/" . $v_read_file);

?>
