
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	</table>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <a href="<?=site_url(config_item("cpanel").'linkterkait')?>" class="btn btn-default btn-sm"> Kembali</a>
  </div>
</div>
