<?php if ($image==""): ?>
  <?php $gambar = base_url()."temp/cover-halaman.jpg"; ?>
  <?php else: ?>
    <?php $gambar =  base_url()."temp/upload/img/$image";?>
<?php endif; ?>

<section class="hero hero-game" style="background-image: url('<?=$gambar?>');">
    <div class="overlay"></div>
    <div class="container">
      <div class="hero-block">
        <div class="hero-left">
          <h2 class="hero-title"><?=strtoupper($temp_title)?></h2>
        </div>
      </div>
    </div>
  </section>



  <section class="p-t-30">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="col-lg-12" style="text-align:justify">
            <?=$desc?>
          </div>
        </div>
      </div>

    </div>
  </section>
