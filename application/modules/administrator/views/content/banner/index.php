
<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Modul <?=$layout_title?></h3>
    <div class='box-tools pull-right'>
      <a href='<?=site_url(config_item("cpanel")."banner/tambah")?>' id='tambah' class='btn btn-success btn-sm'> Tambah</a>
    </div>
  </div>

  <div class="box-body">
      <div id="alert"></div>
        <table id="table" class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th style="width:10px!important;">No</th>
								<th>Image</th>
								<th>Action</th>
            </tr>
        </tehead>

			<tbody>
            <?php
              $no = 1;
              foreach ($row as $banner){
                    ?>
                <tr>
        						<td width="80px"><?=$no++?></td>
        						<td>
                        <div class="row">
                          <div class="col-md-6">
                            <img src="<?=base_url()?>temp/upload/img/<?=$banner->image?>" style="width:100%;height:150px;" class="img img-responsive img-thumbnail" alt="<?=$banner->image?>">
                          </div>
                          <div class="col-md-6" style="text-align:justify">
                            <?=substr($banner->desc,0,150)?>...</br>
                            <a href="#"><i class="fa fa-image"></i> <?=$banner->image?></a>
                          </div>
                        </div>
                    </td>
        						<td style="text-align:center" width="200px">
        							<a href="<?=site_url(config_item("cpanel")."banner/detail/$banner->id_banner")?>" id="detail" class="btn btn-sm btn-primary">detail</a>
        							<a href="<?=site_url(config_item("cpanel")."banner/edit/$banner->id_banner")?>" id="edit" class="btn btn-sm btn-warning">edit</a>
        							<a href="<?=site_url(config_item("cpanel")."banner/hapus/$banner->id_banner")?>" id="hapus" class="btn btn-sm btn-danger">hapus</a>
        					</td>
        			</tr>
              <?php } ?>
            <tbody>
        </table>
</div>
  </div>
<script type="text/javascript">
    $('#table').DataTable({"ordering": false,
                          "paging":   true,
                          "ordering": false,
                          "info":     false,
                           "searching": false,
                           "lengthChange": false
                        });


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
       $('#ModalHeader').html('Tambah banner');
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
         $('#ModalHeader').html('Edit Banner');
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
