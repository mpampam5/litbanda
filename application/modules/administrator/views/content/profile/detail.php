
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Tlp</td><td><?php echo $tlp; ?></td></tr>
	    <tr><td>Fax</td><td><?php echo $fax; ?></td></tr>
	    <tr><td>Web</td><td><?php echo $web; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
      <tr><td><i class="fa fa-facebook"></i></td><td><?php echo $facebook; ?></td></tr>
      <tr><td><i class="fa fa-twitter"></i></td><td><?php echo $twitter; ?></td></tr>
      <tr><td><i class="fa fa-instagram"></i></td><td><?php echo $instagram; ?></td></tr>
      <tr><td><i class="fa fa-youtube"></i></td><td><?php echo $youtube; ?></td></tr>
	</table>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->

    <!-- <a href="<?=site_url(config_item("cpanel").'profile')?>" class="btn btn-default btn-sm"> Kembali</a> -->
      <a href="<?=site_url(config_item("cpanel")."profile/edit/$id_profile")?>" id="edit" class="btn btn-sm btn-warning">edit</a>
  </div>
</div>


<script type="text/javascript">
$(document).on('click', '#edit', function(e){
    e.preventDefault();
    testAnim("zoomIn");
    $('.modal-dialog').removeClass('modal-lg');
    $('.modal-dialog').removeClass('modal-sm');
    $('.modal-dialog').addClass('modal-md');
    $('#ModalHeader').html('Edit Profile');
    $('#ModalContent').load($(this).attr('href'));
    $('#ModalGue').modal('show');
  });
</script>
