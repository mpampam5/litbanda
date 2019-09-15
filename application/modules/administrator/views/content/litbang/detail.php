
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div>

  <div class="box-body">
  <table class="table table-bordered">
	    <tr><th width="200">Judul</th><td><?php echo $judul; ?></td></tr>
	    <tr><th>Penyusun</th><td><?php echo $penyusun; ?></td></tr>
	    <tr><th>File</th><td><a href="<?=base_url()?>file/uploads/pdf/<?php echo $file; ?>" target="_blank"><i class="fa fa-file"> Lihat File</i></a></td></tr>
	    <tr><th>Waktu Upload</th><td><?php echo date('d/m/Y',strtotime($created_at)); ?></td></tr>
	</table>
    <hr>

       <?php if ($deskripsi!=""): ?>
         <div class="col-sm-12" style="margin-bottom:20px;border-bottom:1px #d6d6d6 solid;padding-bottom:10px">
           <h3 style="font-weight:bold">Deskripsi</h3>
           <div style="text-align:justify">
             <?php echo $deskripsi; ?>
           </div>
         </div>
       <?php endif; ?>

    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <a href="<?=site_url('administrator/litbang')?>" class="btn btn-default btn-sm"> Kembali</a>
  </div>
</div>
