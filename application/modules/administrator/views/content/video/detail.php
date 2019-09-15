
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table">
	    <tr><td>Video</td><td>:</td><td><?php echo $video; ?></td></tr>
	    <tr><td>Desc</td><td>:</td><td><?php echo ($desc=="")?"-":"$desc"; ?></td></tr>
	</table>

  <hr>

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <iframe width="100%" height="500px" src="https://www.youtube.com/embed/<?php echo $embed; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <a href="<?=site_url(config_item("cpanel").'video')?>" class="btn btn-default btn-sm"> Kembali</a>
  </div>
</div>
