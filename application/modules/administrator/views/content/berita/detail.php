
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Detail <?=$layout_title?></h3>
  </div><!-- /.box-header -->
  <div class="box-body no-padding">
    <?php if ($image!=""): ?>
      <div class="mailbox-controls with-border">
        <img src="<?=base_url()?>temp/upload/img/<?=$image?>" style="width:100%;height:500px" class="img img-responsive img-thumbnail" alt="<?=$image?>">
      </div><!-- /.mailbox-controls -->
    <?php endif; ?>
    <div class="mailbox-read-info">
      <h3><a href="<?=site_url("berita/detail/$id_berita/$slug")?>" target="_blank"><?php echo $judul; ?></a></h3>
    </div><!-- /.mailbox-read-info -->
    <div class="mailbox-read-message" style="text-align:justify;line-height: 2;">
    <?php echo $desc; ?>
    </div><!-- /.mailbox-read-message -->
  </div><!-- /.box-body -->

  <div class="box-footer">
    <div class="pull-right">
      <h5>&nbsp; <span class="mailbox-read-time"><i class="fa fa-tags"></i> <?=$kategori?> | <i class="fa fa-calendar"></i> <?php echo $created_at; ?></span></h5>
    </div>
    <div class="pull-left">
      <a href="<?=site_url(config_item("cpanel").'berita')?>" class="btn btn-default btn-sm"> Kembali</a>
    </div>
  </div><!-- /.box-footer -->
</div>
