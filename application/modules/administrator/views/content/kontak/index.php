
<link rel="stylesheet" href="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css">
<script src="<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<div class='box'>
  <div class='box-header with-border'>
    <h3 class='box-title'>Modul <?=ucfirst($layout_title)?></h3>
  </div>

    <div class='box-body'>
      <div id='alert'></div>
          <div class="mailbox-messages">
            <table class="table table-striped table-hover" id="mytable">
                <thead>
                    <tr>
                      <th width="10px">#</th>
              		    <th>Email</th>
              		    <th>Desc</th>
              		    <th></th>
              		    <th>Date</th>
              		    <th width="200px">Action</th>
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
                    ajax: {"url": "<?=base_url(config_item("cpanel"))?>/kontak/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_kontak",
                            "orderable": false,
                            render:function(data,type,row,meta)
                            {
                              if (row.read==1) {
                                var custom = '<i class="fa fa-star-o text-yellow"></i>';
                              }else {
                                var custom = '<i class="fa fa-star text-yellow"></i>';
                              }
                              return custom;
                            }
                        },
                        {"data": "email",
                         "className" : "mailbox-name"
                        },
                        {"data": "desc",
                         "className" : "mailbox-subject",
                         render:function(data,type,row,meta){
                           return data.substring(0, 50)+'...';
                         }
                        },
                        {"data": "read",
                         "visible":false
                        },
                        {"data": "created_at",
                         "className" : "mailbox-name"
                        },
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "mailbox-date"
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
             $(document).on('click', '#detail', function(e){
                 e.preventDefault();
                 testAnim("zoomIn");
                 $('.modal-dialog').removeClass('modal-lg');
                 $('.modal-dialog').removeClass('modal-sm');
                 $('.modal-dialog').addClass('modal-md');
                 $('#ModalHeader').html('Detail Kontak');
                 $('#ModalContent').load($(this).attr('href'));
                 $('#ModalGue').modal('show');
               });

        </script>
