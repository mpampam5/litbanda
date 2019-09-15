      <div class="mailbox-read-info">
        <h5><i class="fa fa-user"></i> <?php echo $nama; ?> <span class="mailbox-read-time pull-right"><i class="fa fa-phone"></i> <?php echo $telepon ?></span></h5>
        <h5><i class="fa fa-envelope"></i> <?php echo $email; ?> <span class="mailbox-read-time pull-right"><?php echo date('d/m/Y h:i', strtotime($created_at)); ?></span></h5>
      </div><!-- /.mailbox-read-info -->
      <div class="mailbox-read-message" style="text-align:justify">
        <?php echo $desc; ?>
      </div><!-- /.mailbox-read-message -->
      <div class="box-footer">
        <div class="pull-right">
          <a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=<?php echo $email; ?>&tf=1" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Balas</a>
        </div>
        <a class="btn btn-default btn-sm" nohref onClick="HideModal();" >tutup</a>
      </div><!-- /.box-footer -->


<script type="text/javascript">
function HideModal()
{
  $("#ModalGue").modal('hide');
  $('#mytable').DataTable().ajax.reload();
}
</script>
