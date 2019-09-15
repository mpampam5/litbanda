<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table no-border">
	    <tr>
        <td width="100p;">Album</td>
        <td width="5px">:</td>
        <td><?php echo $album; ?></td>
      </tr>
	    <tr>
        <td width="100px">Deskripsi</td>
        <td width="5px">:</td>
        <td style="text-align:justify"><?php echo $desc; ?></td>
      </tr>
	</table>
    <hr>
      <a href="<?=site_url(config_item("cpanel").'album')?>" class="btn btn-default btn-sm"> Kembali</a>
      <a href="<?=site_url(config_item("cpanel")."album/edit/$id_album")?>" id="edit" class="btn btn-sm btn-warning">edit</a>
      <a href="<?=site_url(config_item("cpanel")."album/upload/$id_album")?>" id="upload" class="btn btn-sm btn-success">Upload Gambar</a>
      <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <div id="alert"></div>
    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table table-bordered table-striped" id="mytable">
          <thead>
            <th width="10px">No</th>
            <th>Image</th>
            <th></th>
          </thead>
        </table>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
$(document).ready(function() {
  $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
  {
      return {
          "iStart": oSettings._iDisplayStart,
          "iEnd": oSettings.fnDisplayEnd(),
          "iLength": oSettings._iDisplayLength,
          "iTotal": oSettings.fnRecordsTotal(),
          "iFilteredTotal": oSettings.fnRecordsDisplay(),
          "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
          "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
  };

    var t = $("#mytable").dataTable({
        oLanguage: {
            sProcessing: "loading..."
        },
        "drawCallback": function( settings ) {
         $("#mytable thead").remove();
       } ,
        processing: true,
        serverSide: true,
        searching:false,
        ajax: {"url": "<?=base_url(config_item("cpanel"))?>/album/json_image/<?=$id_album?>", "type": "POST"},
        columns: [
            {"data": "id_galery_image",
             "orderable": false
           },
            {"data": "image",
            "orderable": false,
             render:function(data,row,type,meta){
               var custom = '<a href="<?=base_url()?>temp/upload/img/'+data+'" target="_blank">'
                            +'<img class="img img-responsive img-thumbnail" style="width:100px;height:100px" src="<?=base_url()?>temp/upload/thumbs/'+data+'" alt="'+data+'">'
                            +'</a></br>'
                            +'&nbsp;&nbsp&nbsp;&nbsp<label class="label label-info">'+data+'</label>';
               return custom;
             }
            },
            {
                "data" : "action",
                "orderable": false,
                "className" : "text-center"
            }
        ],
        order: [[0, 'desc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });
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

$(document).on('click', '#upload', function(e){
    e.preventDefault();
    testAnim("zoomIn");
    $('.modal-dialog').removeClass('modal-md');
    $('.modal-dialog').removeClass('modal-sm');
    $('.modal-dialog').addClass('modal-lg');
    $('#ModalHeader').html('Upload');
    $('#ModalContent').load($(this).attr('href'));
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
      $('#mytable').DataTable().ajax.reload();
     $('.alert-success').delay(500).show(10, function(){
       $('.alert-success').delay(5000).hide(10, function(){
         $('.alert-success').remove();

       });
     })
   }
 });
});

  $(document).on('click', '#edit', function(e){
      e.preventDefault();
      testAnim("zoomIn");
      $('.modal-dialog').removeClass('modal-sm');
      $('.modal-dialog').removeClass('modal-md');
      $('.modal-dialog').addClass('modal-lg');
      $('#ModalHeader').html('Edit Album');
      $('#ModalContent').load($(this).attr('href'));
      $('#ModalGue').modal('show');
    });

</script>
