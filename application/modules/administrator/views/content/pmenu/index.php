 <link rel="stylesheet" type="text/css" href="<?=directory("admin_dir")?>plugins/nestable/nestable.css">

 <?php
 switch ($post) {
   case 'header':
     $where_post = 'header';
     break;

     case 'footer':
       $where_post = 'footer';
       break;

         default:
           $where_post = 'header_top';
           break;
 }

  ?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=$layout_title?></h3>
    <div class="box-tools pull-right">
      <a href="<?=base_url(config_item("cpanel"))?>/pmenu/tambah/<?=$where_post?>" id="tambah" class="btn btn-success btn-sm"> Tambah</a>
      <button type="button" id="reload" class="btn btn-sm btn-info" name="button"><i class="fa fa-refresh"></i></button>
    </div>
  </div>



  <div class="box-body">
    <div id="alert"></div>

    <div class="row">
      <!-- <div class="col-md-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <ul class="nav nav-pills nav-stacked"> -->
              <!-- <li class="<?=($post=='')?'active':''?>"><a href="<?=site_url(config_item("cpanel").'pmenu/index')?>"> Menu Header Top</a></li> -->
              <!-- <li class="<?=($post=='header')?'active':''?>"><a href="<?=site_url(config_item("cpanel").'pmenu/index/header')?>"> Menu Header</a></li> -->
              <!-- <li class="<?=($post=='footer')?'active':''?>"><a href="<?=site_url(config_item("cpanel").'pmenu/index/footer')?>"> Menu Footer</a></li> -->
            <!-- </ul>
          </div>
        </div>
      </div> -->

      <div class="col-md-12">
        <table class="table" style="margin-bottom:0!important">
          <tr style="background:#3c8dbc;color:#fff">
            <th width="10px"><i class="fa fa-bars"></i></th>
            <th >MENU</th>
            <th width="200px">SLUG</th>
            <th width="80px">STATUS</th>
            <th width="10px">AKSI</th>
          </tr>
        </table>

        <div class="dd" id="nestable">
          <?php
              $ref   = [];
              $items = [];

              $where = array('posisi'=> $where_post);
              $query = $this->model->get_where($where);
              if ($query->num_rows()>0) {
                foreach ($query->result() as $data) {
                  # code...
                    $thisRef = &$ref[$data->id_menu];
                    $thisRef['parent'] = $data->parent;
                    $thisRef['label'] = $data->menu;
                    $thisRef['link'] = $data->url;
                    $thisRef['id'] = $data->id_menu;
                    $thisRef['active'] = $data->active;
                    $thisRef['where'] = $where_post;

                   if($data->parent == 0) {
                        $items[$data->id_menu] = &$thisRef;
                   } else {
                        $ref[$data->parent]['child'][$data->id_menu] = &$thisRef;
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

                      if ($value['link']=="#") {
                        $link = "#";
                        $target ='';
                      }else {
                        $link = base_url()."".$value['link'].".html";
                        $target = "target='_blank'";
                      }


                        $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                                    <div class="dd-handle dd3-handle">Drag</div>
                                    <div class="dd3-content"><span id="label_show'.$value['id'].'">'.strtoupper($value['label']).'</span>
                                        <span class="span-right"><i id="link_show'.$value['id'].'">'.$value['link'].'</i> &nbsp;&nbsp;'.$active.' &nbsp;&nbsp;
                                        <a href="'.$link.'" '.$target.'  id="info" ><i class="fa fa-globe text-success"></i></a>&nbsp;
                                            <a href="'.base_url(config_item("cpanel")).'/pmenu/edit/'.$value['id'].'/'.$value['where'].'"  id="edit" ><i class="fa fa-pencil text-info"></i></a>&nbsp;
                                            <a href="'.base_url(config_item("cpanel")).'/pmenu/hapus/'.$value['id'].'" alt="'.$value['id'].'" id="hapus"><i class="fa fa-trash text-danger"></i></a></span>
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
              }else {
                echo "</br<</br><h5 class='text-center'> Tidak ada Menu</h5>";
              }
          ?>
        </div>
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
        <?php if ($post!="footer"): ?>
        maxDepth:2
          <?php else: ?>
          maxDepth:1
        <?php endif; ?>

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



    $('.dd').on('change', function() {
          var dataString = {
              data : $("#nestable-output").val(),
            };

        $.ajax({
            type: "POST",
            url: "<?=base_url(config_item("cpanel"))?>/pmenu/save",
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
