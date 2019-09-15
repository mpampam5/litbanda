<div class="col-xs-12">
  <div class="row">
          <div class="box box-primary">
            <div class="box-body">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3><?=row_table("berita")?></h3>
                    <p>Berita</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-file-text"></i>
                  </div>
                  <a href="<?=site_url(config_item("cpanel").'berita')?>" class="small-box-footer">
                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><?=row_table("agenda")?></h3>
                    <p>Agenda</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <a href="<?=site_url(config_item("cpanel").'agenda')?>" class="small-box-footer">
                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3></h3>
                    <p>Pengumuman</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bullhorn"></i>
                  </div>
                  <a href="<?=site_url(config_item("cpanel").'pengumuman')?>" class="small-box-footer">
                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3></h3>
                    <p>Data Dosen</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <a href="<?=site_url(config_item("cpanel").'dosen')?>" class="small-box-footer">
                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div><!-- ./col -->
            </div>
          </div>
          </div>
</div>


<style media="screen">
  .product-description img{
    visibility: hidden!important;
  }
</style>

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Berita Terbaru</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <ul class="products-list product-list-in-box">
                    <?php $berita = query_table("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5 ") ?>
                    <?php foreach ($berita->result() as $rows): ?>
                    <li class="item">
                      <div class="product-img">
                      <?php if ($rows->image!=""): ?>
                          <img src="<?=base_url()?>temp/upload/thumbs/<?=$rows->image?>" alt="Product Image">
                          <?php else: ?>
                              <img class="img img-responsive img-thumbnail" src="<?=base_url()?>temp/upload/default.png" alt="Product Image">
                      <?php endif; ?>
                      </div>
                      <div class="product-info">
                        <a href="<?=base_url()?>berita/detail/<?=$rows->id_berita."/".$rows->slug?>.html" target="_blank"  class="product-title"><?=substr($rows->judul,0,150)?>... <span class="label label-warning pull-right"><i class="fa fa-calendar"></i> <?=date("d-m-Y", strtotime($rows->created_at));?></span></a>
                      </div>
                    </li><!-- /.item -->

                  <?php endforeach; ?>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?=site_url(config_item("cpanel")."berita")?>" class="uppercase">Lihat semua Berita</a>
                </div><!-- /.box-footer -->
              </div>
  </div>


  <div class="col-md-6">
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Berita Populer</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <ul class="products-list product-list-in-box">
                    <?php $berita = query_table("SELECT * FROM berita ORDER BY hits DESC LIMIT 5 ") ?>
                    <?php foreach ($berita->result() as $rows): ?>
                    <li class="item">
                      <div class="product-img">
                      <?php if ($rows->image!=""): ?>
                          <img src="<?=base_url()?>temp/upload/thumbs/<?=$rows->image?>" alt="Product Image">
                          <?php else: ?>
                              <img class="img img-responsive img-thumbnail" src="<?=base_url()?>temp/upload/default.png" alt="Product Image">
                      <?php endif; ?>
                      </div>
                      <div class="product-info">
                        <a href="<?=base_url()?>berita/detail/<?=$rows->id_berita."/".$rows->slug?>.html" target="_blank" class="product-title"><?=substr($rows->judul,0,150)?>... <span class="label label-success pull-right"><i class="fa fa-calendar"></i> <?=date("d-m-Y", strtotime($rows->created_at));?></span></a>
                      </div>
                    </li><!-- /.item -->

                  <?php endforeach; ?>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?=site_url(config_item("cpanel")."berita")?>" class="uppercase">Lihat semua Berita</a>
                </div><!-- /.box-footer -->
              </div>
  </div>


</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"></h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
dsadsadsadas dsadas dsadas sdad dsadsa
      </div>
    </div>
  </div>
  <div class="panel-footer">

  </div>
</div>
