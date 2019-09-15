<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<section class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>">Beranda</a></li>
        <li class="active"><?=$temp_tags?></li>
      </ol>
    </div>
  </section>

  <section class="p-t-30">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="col-lg-12" style="text-align:justify">
            <h4><?=$album?></h4>
            <?=$desc?>
          </div>
          <hr>

          <div class="col-lg-12">
            <div class="row row-3 figure-effect">
              <?php $querys = $this->db->where('id_album',$id_album)->get("galery_image");

              ?>
              <?php if ($querys->num_rows()>0): ?>
                  <?php foreach ($querys->result() as $img): ?>
                    <div class="col-12 col-sm-6 col-md-4">
                      <figure>
                        <div class="figure-img">
                          <a href="<?=base_url()?>temp/upload/img/<?=$img->image?>" class="thumbnail fancybox" rel="ligthbox">
                          <img src="<?=base_url()?>temp/upload/thumbs/<?=$img->image?>" alt="">
                        </a>
                        </div>
                      </figure>
                    </div>
                  <?php endforeach; ?>
                  <?php else: ?>
                    <h5 class="text-center">Tidak ada Foto</h5>
              <?php endif; ?>

            </div>
          </div>

        </div>
      </div>

    </div>
  </section>


<script type="text/javascript">
$(document).ready(function(){
$(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none"
});
});
</script>
