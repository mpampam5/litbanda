<section class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>">Beranda</a></li>
        <li class="active"><?=$temp_tags?></li>
      </ol>
    </div>
  </section>


  <section class="bg-image" style="background-image: url('<?=base_url()?>temp/bg-video.jpg');">
      <div class="overlay-light"></div>
      <div class="container">
        <div class="embed-responsive embed-responsive-16by9">
          <!-- <iframe width="640" height="480" src="https://www.youtube.com/embed/XR2mI5zcexQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$embed?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </section>

    <section>
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="post post-single">
                <h2 class="post-title"><?=$video?></h2>
                  <div class="m-t-30" style="text-align:justify">
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

              <div class="video_lainnya"></div>



            </div>
            <div class="col-lg-4">
              <div class="sidebar">
                <!-- agenda_kegiatan -->
                <div class="agenda_kegiatan"></div>
                <!-- agenda_kegiatan -->
              </div>
            </div>
          </div>
        </div>
      </section>


      <script type="text/javascript">
        $(document).ready(function(){
          var id_video = <?=$id_video?>;
          agendaKegiatan();
          videoLainnya(id_video);
        });
      </script>
