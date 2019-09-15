
<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Modul <?=$layout_title?></h3>
    <div class='box-tools pull-right'>
      <a href='<?=site_url(config_item("cpanel")."linkterkait/tambah")?>' id='tambah' class='btn btn-success btn-sm'> Tambah</a>
    </div>
  </div>

  <div class="box-body">
      <div id="alert"></div>
        <table id="table" class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
								<th>Nama</th>
								<th>Url</th>
								<th>Action</th>
            </tr>
        </tehead>

			<tbody id="tables">
            <?php
              $no = 1;
              foreach ($row as $linkterkait){
            ?>
        <tr>
						<td width="80px"><?=$no++?></td>
						<td><?php echo $linkterkait->nama ?></td>
						<td><a href="<?php echo $linkterkait->url ?>" target="_blank"><?php echo $linkterkait->url ?></a></td>
						<td style="text-align:center" width="200px">
							<a href="<?=site_url(config_item("cpanel")."linkterkait/edit/$linkterkait->id_link")?>" id="edit" class="btn btn-sm btn-warning">edit</a>
							<a href="<?=site_url(config_item("cpanel")."linkterkait/hapus/$linkterkait->id_link")?>" id="hapus" class="btn btn-sm btn-danger">hapus</a>
					</td>
			</tr>
              <?php } ?>
            <tbody>
        </table>
</div>
  </div>
<script type="text/javascript">
    $('#table').DataTable({"ordering": false});


    $(document).on('click', '#hapus', function(e){
     e.preventDefault();
     var Link = $(this).attr('href');
     testAnim("zoomIn");
     $('.modal-dialog').removeClass('modal-lg');
     $('.modal-dialog').addClass('modal-sm');
     $('#ModalHeader').html('Konfirmasi');
     $('#ModalContent').html('Apakah anda yakin ingin Menghapus?');
     $('#ModalFooter').html("<button type='button' class='btn btn-primary' id='ya-hapus'  data-url='"+Link+"'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
     $('#ModalGue').modal('show');
   });

   $(document).on('click', '#ya-hapus', function(e){
     e.preventDefault();

     $.ajax({
       url: $(this).data('url'),
       type: "POST",
       cache: false,
       dataType:'json',
       success: function(data){
         $("#ModalGue").modal('hide');
         $('#alert').append('<div id="alert" class="alert alert-success">'+
                           data.alert+
                           '<div>');
          //$('#table').DataTable().ajax.reload();
         $('.alert-success').delay(500).show(10, function(){
           $('.alert-success').delay(5000).hide(10, function(){
             $('.alert-success').remove();
             location.reload();
           });
         })
       }
     });
   });

   // MODAL TAMBAH
   $(document).on('click', '#tambah', function(e){
       e.preventDefault();
       testAnim("zoomIn");
       $('.modal-dialog').removeClass('modal-lg');
       $('.modal-dialog').removeClass('modal-sm');
       $('.modal-dialog').addClass('modal-md');
       $('#ModalHeader').html('Tambah Link Terkait');
       $('#ModalContent').load($(this).attr('href'));
       $('#ModalGue').modal('show');
     });
   //
   //   MODAL EDIT
     $(document).on('click', '#edit', function(e){
         e.preventDefault();
         testAnim("zoomIn");
         $('.modal-dialog').removeClass('modal-lg');
         $('.modal-dialog').removeClass('modal-sm');
         $('.modal-dialog').addClass('modal-md');
         $('#ModalHeader').html('Edit Link Terkait');
         $('#ModalContent').load($(this).attr('href'));
         $('#ModalGue').modal('show');
       });
   //   MODAL DETAIL
   //   $(document).on('click', '#detail', function(e){
   //       e.preventDefault();
   //       testAnim("zoomIn");
   //       $('.modal-dialog').removeClass('modal-lg');
   //       $('.modal-dialog').removeClass('modal-sm');
   //       $('.modal-dialog').addClass('modal-md');
   //       $('#ModalHeader').html('');
   //       $('#ModalContent').load($(this).attr('href'));
   //       $('#ModalGue').modal('show');
   //     });


</script>
