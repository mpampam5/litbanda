<section class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>">Beranda</a></li>
        <li class="active"><?=$temp_tags?></li>
      </ol>
    </div>
  </section>

<div class="container m-t-30 m-b-50">
      <div class="row">
        <div class="col-lg-8">
          <!-- post -->
          <div class="post post-single">
            <h2 class="post-title"><?=$judul?></h2>
            <div class="post-meta">
              <span><i class="fa fa-calendar"></i> <?=date('d/m/Y',strtotime($date))?></span>
              <span><i class="fa fa-tags"></i> <?=$kategori?></span>
            </div>
            <?php if ($image!=""): ?>
              <div class="post-thumbnail">
                <img src="<?=base_url()?>temp/upload/img/<?=$image?>" alt="<?=$image?>" style="width:100%;">
              </div>
            <?php endif; ?>

            <div style="text-align:justify">
              <?=$desc?>
            </div>
          </div>

          <div class="post-actions">
            <div class="social-share">
              <a class="btn btn-social btn-facebook btn-circle" target="_blank" href="http://www.facebook.com/sharer.php?u=<?=base_url($_SERVER['REQUEST_URI'])?>" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on Facebook"><i class="fa fa-facebook"></i></a>
              <a class="btn btn-social btn-twitter btn-circle" target="_blank" href="https://twitter.com/share?url=<?=base_url($_SERVER['REQUEST_URI'])?>" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on Twitter"><i class="fa fa-twitter"></i></a>
              <a class="btn btn-social btn-google-plus btn-circle" target="_blank" href="https://plus.google.com/share?url=<?=base_url($_SERVER['REQUEST_URI'])?>" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on Google Plus"><i class="fa fa-google-plus"></i></a>
              <a class="btn btn-social btn-whatsapp btn-circle" target="_blank" href="https://wa.me/?text=<?=base_url($_SERVER['REQUEST_URI'])?>" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on Whatsapp"><i class="fa fa-whatsapp"></i></a>
            </div>
          </div>


          <!-- berita populer -->
          <div class="popular_news"></div>
          <!-- end berita_populer -->


        </div>
        <!-- sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">

            <!-- agenda_kegiatan -->
            <div class="agenda_kegiatan"></div>
            <!-- agenda_kegiatan -->

            <!-- video terbaru -->
            <div class="video_new"></div>
            <!-- end video -->

          </div>
        </div>
      </div>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        beritaLainnya(<?=$id_berita?>);
        agendaKegiatan();
        videoTerbaru();
      });
    </script>
