
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table">
    <?php if ($image!=""): ?>
      <tr><td>Foto</td><td><img src="<?=base_url()?>/temp/upload/thumbs/<?=$image?>" style="width:200px;height:200px" class="img img-responsive img-thumbnail" alt="<?=$image?>"></td></tr>
    <?php endif; ?>
	    <tr><td>Nama</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Telepon</td><td><?php echo $telepon; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Groups</td><td><a href="#"><?php echo $groups; ?></a></td></tr>
	    <tr><td>Active</td><td><?=($active==1)?"<label class='label label-success'>Aktif</label>":"<label class='label label-danger'>Tidak Aktif</label>";?></td></tr>
	    <tr><td>Created By</td><td><a href="<?=site_url()?>cpanel/pengguna/detail/<?=$created_by?>"><?=$created_by;?></a></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
      <tr><td>Update By</td><td><a href="<?=site_url()?>cpanel/pengguna/detail/<?=$update_by?>"><?=$update_by;?></a></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	</table>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <a href="javascript:history.back()" class="btn btn-default btn-sm"> Kembali</a>
    <a href="<?=site_url(config_item("cpanel")."pengguna/change_password/$id_auth")?>" id="reset" class="btn btn-info btn-sm"><i class="fa fa-key"></i> Ubah Password</a>
  </div>
</div>


<script type="text/javascript">
$(document).on('click', '#reset', function(e){
    e.preventDefault();
    $('.modal-dialog').removeClass('modal-lg');
    $('.modal-dialog').removeClass('modal-sm');
    $('.modal-dialog').addClass('modal-md');
    $('#ModalHeader').html('Reset Password');
    $('#ModalContent').load($(this).attr('href'));
    $('#ModalGue').modal('show');

  });
</script>
