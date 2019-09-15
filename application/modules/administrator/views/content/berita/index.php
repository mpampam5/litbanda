
<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<div class='box'>
  <div class='box-header with-border'>
    <h3 class='box-title'>Modul <?=ucfirst($layout_title)?></h3>
      <div class='box-tools pull-right'>
        <a href='<?=site_url(config_item("cpanel")."berita/tambah")?>' id='tambah' class='btn btn-success btn-sm'> Tambah</a>
      </div>
  </div>

  <style media="screen">
  .table-nonfluid {
   width: auto !important;
}
  </style>

    <div class='box-body' style="padding:20px!important">
      <div id='alert'></div>
          <div class="">
            <table class="table table-bordered table-striped table-nonfluid" id="mytable">
                <thead>
                    <tr>
                        <th width="80px">Diterbitkan</th>
                		    <th>Judul</th>
                        <th>Kategori</th>
                        <th></th>
                        <th></th>
                        <th></th>
                		    <th width="150px">#</th>
                    </tr>
                </thead>

            </table>
          </div>
        </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?=base_url(config_item("cpanel"))?>/berita/json", "type": "POST"},
                    columns: [
                        {"data":"created_at"},
                        {"data":"judul",
                        "render" : function(data,type,row,meta){
                          var hits;
                          if (row.hits==null) {
                            hits = "0";
                          }else {
                            hits = row.hits;
                          }
                          var custom =  '<div id="berita">'
                                      + '<b>'+row.judul+'</b>'
                                      + '</br>'
                                      + '<a class="url" href="<?=base_url()?>berita/detail/'+row.id_berita+'/'+row.slug+'.html" target="_blank"><?=base_url()?>berita/detail/'+row.id_berita+'/'+row.slug+'.html</a></br></br>'
                                      + '<div class="btn-group btn-md" id="btn-group" role="group" aria-label="Basic example">'
                                      + '<a href="http://www.facebook.com/sharer.php?u=<?=base_url()?>berita/detail/'+row.id_berita+'/'+row.slug+'.html" target="_blank" class="btn btn-default"><i class="fa fa-facebook"></i> Bagikan</a>'
                                      + '<a href="http://twitter.com/share?text=<?=base_url()?>berita/detail/'+row.id_berita+'/'+row.slug+'.html" target="_blank" class="btn btn-default"><i class="fa fa-twitter"></i> Bagikan</a>'
                                      + '<a class="btn btn-default"><i class="fa fa-eye"></i> dilihat '+hits+'x</a>'
                                      +'</div>'
                                      + '</div>';
                          return custom;
                        }
                        },
                        {"data":"kategori"},
                        {"data":"slug",
                         "visible": false
                        },
                        {"data":"id_berita",
                         "visible": false
                        },
                        {"data":"hits",
                         "visible": false
                        },
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
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

           $(document).on('click', '#ya-hapus', function(e){
             e.preventDefault();

             $.ajax({
               url: $(this).data('url'),
               type: "POST",
               cache: false,
               dataType:'json',
               success: function(data){
                 $('.alert-success').remove();
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

           // MODAL TAMBAH
           // $(document).on('click', '#tambah', function(e){
           //     e.preventDefault();
           //     testAnim("zoomIn");
           //     $('.modal-dialog').removeClass('modal-lg');
           //     $('.modal-dialog').removeClass('modal-sm');
           //     $('.modal-dialog').addClass('modal-md');
           //     $('#ModalHeader').html('');
           //     $('#ModalContent').load($(this).attr('href'));
           //     $('#ModalGue').modal('show');
           //   });
           //
           //   MODAL EDIT
           //   $(document).on('click', '#edit', function(e){
           //       e.preventDefault();
           //       testAnim("zoomIn");
           //       $('.modal-dialog').removeClass('modal-lg');
           //       $('.modal-dialog').removeClass('modal-sm');
           //       $('.modal-dialog').addClass('modal-md');
           //       $('#ModalHeader').html('');
           //       $('#ModalContent').load($(this).attr('href'));
           //       $('#ModalGue').modal('show');
           //     });
           //
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
