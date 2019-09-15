
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table no-border table-striped">
	    <tr><td>Agenda</td><td><?php echo $agenda; ?></td></tr>
      <tr><td>waktu</td><td><?php echo $date; ?> <?=($date==date('Y-m-d'))?"<label class=' label label-success'>Hari ini</label>":""?></td></tr>
	    <tr><td style="text-align:justify">Perihal</td><td><?php echo $desc; ?></td></tr>
	</table>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <a href="<?=site_url(config_item("cpanel").'agenda')?>" class="btn btn-default btn-sm"> Kembali</a>
  </div>
</div>
