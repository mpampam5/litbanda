<section class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>">Beranda</a></li>
        <li class="active"><?=$temp_tags?></li>
      </ol>
    </div>
  </section>

<section class="p-t-40">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto">

          <div class="forum-post">
            <div class="forum-body">
              <h4 class="m-b-20"><?=$judul?></h4>
              <div style="text-align:justify">
                <?php if ($deskripsi!=""): ?>
                  <?=$deskripsi?>
                <?php endif; ?>
              </div>
            </div>
            <div class="forum-footer">
              <div class="forum-panel">
                <?php if ($file!=""): ?>
                  <div class="forum-attachment">
                    <a href="<?=base_url("litbang/file/download/$file")?>"><?=$file?>&nbsp;&nbsp;<i class="fa fa-download float-right m-t-5"></i></a>
                    <span><?=ukuran_file($file)?></span>
                  </div>
                <?php endif; ?>
                <div class="forum-users">
                  <h5>Penyusun: </h5>
                  <div>
                    <?=$penyusun?>
                  </div>
                </div>
              </div>
              <div class="forum-actions">
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
      </div>
    </div>
  </section>
