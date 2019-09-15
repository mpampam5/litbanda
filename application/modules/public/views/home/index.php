<!-- plugins css -->

<!-- slide -->
<section class="bg-inverse p-y-0">
  <div id="carousel-ken-burns" class="carousel slide fade ken-burns " data-ride="carousel">
    <div id="indikators"></div>
    <div id="carousel-inner"></div>
      <a class="carousel-control-prev" href="#carousel-ken-burns" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-ken-burns" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</section>
<!-- end slide -->



<section>
    <div class="container">
      <div class="row">


        <div class="col-lg-8">
          <!-- berita terbaru -->
            <div class="headline_news"></div>
          <!-- end berita terbaru -->

          <!-- berita populer -->
          <div class="popular_news"></div>
          <!-- end berita_populer -->
        </div>




        <!-- sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">
            <!-- video terbaru -->
            <div class="video_new"></div>
            <!-- end video -->

            <!-- agenda_kegiatan -->
            <div class="agenda_kegiatan"></div>
            <!-- agenda_kegiatan -->

            <!-- litbang-->
            <div class="litbang_item"></div>
            <!-- litbang-->


          </div>
        </div>

      </div>
    </div>
  </section>






  <script type="text/javascript">
    $(document).ready(function(){
      slider();
      beritaTerbaru();
      videoTerbaru();
      beritaPopulaler();
      agendaKegiatan();
      litbangItem();
    });
  </script>
