<section class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>">Beranda</a></li>
        <li class="active"><?=$temp_tags?></li>
      </ol>
    </div>
  </section>

<section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- post -->
          <div class="post post-single post-card">
            <h2 class="post-title"><?=$agenda?></h2>
            <div class="post-meta">
              <span><i class="fa fa-calendar"></i> <?=date('d/m/Y', strtotime($date))?></span>
            </div>

            <div class="text-justify">
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


        </div>
      </div>
    </div>
  </section>
