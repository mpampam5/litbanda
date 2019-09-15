 <link rel="stylesheet" type="text/css" href="<?=directory("admin_dir")?>plugins/nestable/nestable.css">
 <div class="box">
   <div class="box-header with-border">
     <h3 class="box-title"><?=$layout_title?></h3>
     <div class="box-tools pull-right">
       <a href="<?=base_url(config_item("cpanel"))?>/Menus/tambah" id="tambah" class="btn btn-success btn-sm"> Tambah</a>
       <button type="button" id="reload" class="btn btn-sm btn-info" name="button"><i class="fa fa-refresh"></i></button>
     </div>
   </div>

      <!-- <div id="load"></div> -->
      <div class="box-body">
        <div id="alert"></div>



        <div class="col-md-12">
          <table class="table" style="margin-bottom:0!important">
            <tr style="background:#3c8dbc;color:#fff">
              <th width="10px"><i class="fa fa-bars"></i></th>
              <th >MENUS</th>
              <th width="200px">URL</th>
              <th width="80px">STATUS</th>
              <th width="10px">AKSI</th>
            </tr>
          </table>

          <div class="dd" id="nestable">
            <?php
                $ref   = [];
                $items = [];
                foreach ($query->result() as $data) {
                  # code...
                    $thisRef = &$ref[$data->id];
                    $thisRef['parent'] = $data->is_parent;
                    $thisRef['label'] = $data->name;
                    $thisRef['link'] = $data->link;
                    $thisRef['id'] = $data->id;
                    $thisRef['active'] = $data->is_active;

                   if($data->is_parent == 0) {
                        $items[$data->id] = &$thisRef;
                   } else {
                        $ref[$data->is_parent]['child'][$data->id] = &$thisRef;
                   }
                }




                function get_menu($items,$class = 'dd-list') {

                    $html = "<ol class=\"".$class."\" id=\"menu-id\">";
                    foreach($items as $key=>$value) {
                      if ($value['active']==1) {
                        $active = "<label class='label label-primary'>Aktif</label>";
                      }else {
                        $active = "<label class='label label-warning'>Tidak Aktif</label>";
                        }


                        $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                                    <div class="dd-handle dd3-handle">Drag</div>
                                    <div class="dd3-content"><span id="label_show'.$value['id'].'">'.strtoupper($value['label']).'</span>
                                        <span class="span-right"><i id="link_show'.$value['id'].'">'.strtolower(base_url(config_item('cpanel'))).'/'.$value['link'].'</i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$active.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="'.base_url(config_item("cpanel")).'/menus/info/'.$value['id'].'"  id="info" ><i class="fa fa-exclamation-circle text-success"></i></a>&nbsp;
                                            <a href="'.base_url(config_item("cpanel")).'/menus/edit/'.$value['id'].'"  id="edit" ><i class="fa fa-pencil text-info"></i></a>&nbsp;
                                            <a href="'.base_url(config_item("cpanel")).'/menus/hapus/'.$value['id'].'" alt="'.$value['id'].'" id="hapus"><i class="fa fa-trash text-danger"></i></a></span>
                                    </div>';
                        if(array_key_exists('child',$value)) {
                            $html .= get_menu($value['child'],'child');
                        }
                            $html .= "</li>";
                    }
                    $html .= "</ol>";
                    return $html;
                }
                print get_menu($items);
            ?>
          </div>
        </div>

        <input type="hidden" id="id">
        <input type="hidden" id="nestable-output">

        <div class="label label-info">Drag and drop menu position</div>

      </div>
    </div>




<script src="<?=directory("admin_dir")?>plugins/nestable/nestable.js"></script>
<script>

$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1,
        maxDepth:2
    })
    .on('change', updateOutput);



    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    // $('#nestable-menu').on('click', function(e)
    // {
    //     var target = $(e.target),
    //         action = target.data('action');
    //     if (action === 'expand-all') {
    //         $('.dd').nestable('expandAll');
    //     }
    //     if (action === 'collapse-all') {
    //         $('.dd').nestable('collapseAll');
    //     }
    // });


});
</script>


<script>
   $(document).ready(function(){

     $("#reload").click(function(){
        location.reload();
     });

     $(document).on('click', '#tambah', function(e){
         e.preventDefault();
         testAnim("zoomIn");
         $('.modal-dialog').removeClass('modal-lg');
         $('.modal-dialog').removeClass('modal-sm');
         $('.modal-dialog').addClass('modal-md');
         $('#ModalHeader').html('Tambah Menu');
         $('#ModalContent').load($(this).attr('href'));
         $('#ModalGue').modal('show');
       });

       $(document).on('click', '#edit', function(e){
           e.preventDefault();
           testAnim("zoomIn");
           $('.modal-dialog').removeClass('modal-lg');
           $('.modal-dialog').removeClass('modal-sm');
           $('.modal-dialog').addClass('modal-md');
           $('#ModalHeader').html('Edit Menu');
           $('#ModalContent').load($(this).attr('href'));
           $('#ModalGue').modal('show');
         });

         $(document).on('click', '#info', function(e){
             e.preventDefault();
             testAnim("zoomIn");
             $('.modal-dialog').removeClass('modal-lg');
             $('.modal-dialog').removeClass('modal-sm');
             $('.modal-dialog').addClass('modal-md');
             $('#ModalHeader').html('Info');
             $('#ModalContent').load($(this).attr('href'));
             $('#ModalGue').modal('show');
           });


    $('.dd').on('change', function() {
          var dataString = {
              data : $("#nestable-output").val(),
            };

        $.ajax({
            type: "POST",
            url: "<?=base_url(config_item("cpanel"))?>/menus/save",
            data: dataString,
            cache : false,
            success: function(data){
              $('.alert-success').remove();
              $('#alert').append('<div id="alert" class="alert alert-success">'+
                                'Berhasil mengubah!'+
                                '<div>');
              $('.alert-success').delay(500).show(10, function(){
                $('.alert-success').delay(2000).hide(10, function(){
                  $('.alert-success').remove();
                });
              })
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });

    $(document).on('click', '#hapus', function(e){
     e.preventDefault();
     var Link = $(this).attr('href');
     var Alt = $(this).attr('alt');
     testAnim("zoomIn");
     $('.modal-dialog').removeClass('modal-lg');
     $('.modal-dialog').addClass('modal-sm');
     $('#ModalHeader').html('Konfirmasi');
     $('#ModalContent').html('Apakah anda yakin ingin Menghapus?');
     $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-id='"+Alt+"' id='ya-hapus' data-loading-text='<i class=\"fa fa-spinner fa-spin \"></i> Memproses ...' data-url='"+Link+"'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
     $('#ModalGue').modal('show');
   });

   $(document).on('click', '#ya-hapus', function(e){
     e.preventDefault();
     $('#ya-hapus').prop('disabled', true)
                     .button('loading');
    var id = $(this).attr('data-id');
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
         $('.alert-success').delay(500).show(10, function(){
           $('.alert-success').delay(5000).hide(10, function(){
             $('.alert-success').remove();
             $("li[data-id='" + id +"']").remove();
           });
         })
       }
     });
   });

  });

 </script>
