<?php

$string ="\n<link rel=\"stylesheet\" href=\"<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.css\">
<script src=\"<?=directory('admin_dir')?>plugins/datatables/jquery.dataTables.min.js\"></script>
<script src=\"<?=directory('admin_dir')?>plugins/datatables/dataTables.bootstrap.min.js\"></script>";

$string .="\n\n<div class=\"box\">
  <div class=\"box-header with-border\">
    <h3 class=\"box-title\">Modul <?=\$layout_title?></h3>
    <div class='box-tools pull-right'>
      <a href='<?=site_url(\"$direct_url$c_url/tambah\")?>' id='tambah' class='btn btn-success btn-sm'> Tambah</a>
    </div>
  </div>

  <div class=\"box-body\">
      <div id=\"alert\"></div>
        <table id=\"table\" class=\"table table-bordered\" style=\"margin-bottom: 10px\">
        <thead>
            <tr>
                <th>No</th>";
foreach ($non_pk as $row) {
$string .= "\n\t\t\t\t\t\t\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t\t\t\t\t\t\t<th>Action</th>
            </tr>
        </tehead>";
            $string .= "\n\n\t\t\t<tbody>
            <?php
              \$no = 1;
              foreach (\$row as \$$c_url){
            ?>
        <tr>";

            $string .= "\n\t\t\t\t\t\t<td width=\"80px\"><?=\$no++?></td>";
            foreach ($non_pk as $row) {
            $string .= "\n\t\t\t\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
            }


            $string .= "\n\t\t\t\t\t\t<td style=\"text-align:center\" width=\"200px\">"
            ."\n\t\t\t\t\t\t\t<a href=\"<?=site_url(\"$direct_url$c_url/detail/\$".$c_url."->".$pk."\")?>\" id=\"detail\" class=\"btn btn-sm btn-primary\">detail</a> "
            ."\n\t\t\t\t\t\t\t<a href=\"<?=site_url(\"$direct_url$c_url/edit/\$".$c_url."->".$pk."\")?>\" id=\"edit\" class=\"btn btn-sm btn-warning\">edit</a> "
            ."\n\t\t\t\t\t\t\t<a href=\"<?=site_url(\"$direct_url$c_url/hapus/\$".$c_url."->".$pk."\")?>\" id=\"hapus\" class=\"btn btn-sm btn-danger\">hapus</a>"
                    . "\n\t\t\t\t\t</td>";
            $string .=  "\n\t\t\t</tr>
              <?php } ?>
            <tbody>
        </table>";



$string .="\n</div>
  </div>";

$string .="\n<script type=\"text/javascript\">
    $('#table').DataTable({\"ordering\": false});


    $(document).on('click', '#hapus', function(e){
     e.preventDefault();
     var Link = $(this).attr('href');
     testAnim(\"zoomIn\");
     $('.modal-dialog').removeClass('modal-lg');
     $('.modal-dialog').addClass('modal-sm');
     $('#ModalHeader').html('Konfirmasi');
     $('#ModalContent').html('Apakah anda yakin ingin Menghapus?');
     $('#ModalFooter').html(\"<button type='button' class='btn btn-primary' id='ya-hapus'  data-url='\"+Link+\"'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>\");
     $('#ModalGue').modal('show');
   });

   $(document).on('click', '#ya-hapus', function(e){
     e.preventDefault();

     $.ajax({
       url: $(this).data('url'),
       type: \"POST\",
       cache: false,
       dataType:'json',
       success: function(data){
         $(\"#ModalGue\").modal('hide');
         $('#alert').append('<div id=\"alert\" class=\"alert alert-success\">'+
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
   // $(document).on('click', '#tambah', function(e){
   //     e.preventDefault();
   //     testAnim(\"zoomIn\");
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
   //       testAnim(\"zoomIn\");
   //       $('.modal-dialog').removeClass('modal-lg');
   //       $('.modal-dialog').removeClass('modal-sm');
   //       $('.modal-dialog').addClass('modal-md');
   //       $('#ModalHeader').html('');
   //       $('#ModalContent').load($(this).attr('href'));
   //       $('#ModalGue').modal('show');
   //     });
   //   MODAL DETAIL
   //   $(document).on('click', '#detail', function(e){
   //       e.preventDefault();
   //       testAnim(\"zoomIn\");
   //       $('.modal-dialog').removeClass('modal-lg');
   //       $('.modal-dialog').removeClass('modal-sm');
   //       $('.modal-dialog').addClass('modal-md');
   //       $('#ModalHeader').html('');
   //       $('#ModalContent').load($(this).attr('href'));
   //       $('#ModalGue').modal('show');
   //     });


</script>";

  $hasil_view_list = createFile($string, $target."".$direct_created_view ."". $c_url . "/" . $v_list_file);
 ?>
