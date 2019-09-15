
<div class="box">
  <div class="box-body" style="padding:0!important">

    <?php if ($image!=null): ?>
      <div class="pages" style="background-image:url('<?=base_url()?>temp/upload/img/<?=$image?>');">
        <div class="page-title">
          <h3><?php echo strtoupper($halaman); ?></h3>
        </div>
      </div>
    <?php endif; ?>

    <div class="col-md-12">
      <h3><?php echo strtoupper($halaman); ?></h3>
    <div class="page-desc">
      <?php echo $desc; ?>
    </div>
    <hr>
    <!-- MODAL ClOSE -->
    <!-- <button type="button" class="btn btn-default btn-sm " data-dismiss="modal" aria-label="Close">tutup</button> -->
    <p>
      <a href="<?=site_url(config_item("cpanel").'halaman')?>" class="btn btn-default btn-sm"> Kembali</a>
    </p>
      </div>
  </div>
</div>
