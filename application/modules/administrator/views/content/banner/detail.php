
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table">
	    <tr><td>Image</td><td><img src="<?=base_url()?>temp/upload/img/<?=$image?>" style="width:100%;height:300px;" class="img img-responsive img-thumbnail" alt="<?=$image?>"></td></tr>
	    <tr><td>Desc</td><td><?php echo $desc; ?></td></tr>
	</table>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <a href="<?=site_url(config_item("cpanel").'banner')?>" class="btn btn-default btn-sm"> Kembali</a>
  </div>
</div>
