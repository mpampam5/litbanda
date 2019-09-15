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
        <div class="col-lg-8">

          <!-- post -->
          <div class="news_page"></div>






          <div class="pagination-results m-t-30">
            <div class="pagination_link"></div>
          </div>
        </div>

        <!-- sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">
            <!-- agenda_kegiatan -->
            <!-- <div class="agenda_kegiatan"></div> -->
            <!-- agenda_kegiatan -->

            <!-- litbang-->
            <div class="litbang_item"></div>
            <!-- litbang-->

            <!-- video terbaru -->
            <div class="video_new"></div>
            <!-- end video -->

        </div>
      </div>
    </div>
  </section>


  <script type="text/javascript">
    $(document).ready(function(){
      load_berita(1);

        function load_berita(page)
        {
          $.ajax({
            url:"<?=base_url();?>agenda/page/"+page,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
              $(".news_page").hide().fadeIn(1000).html(data.load_data_news);
              $(".pagination_link").hide().fadeIn(1000).html(data.pagination);

            }
          });
        }



        $(document).on('click',".pagination li a", function(e){
          e.preventDefault();
          var page = $(this).data("ci-pagination-page");
          // $( '#loader' ).addClass( 'active' );
          // setTimeout( function(){
          //     $( '#loader' ).removeClass( 'active' );
          // }, 1000);
          var htmlbody = $( 'html, body' );
                       htmlbody.animate({
                           scrollTop: $( 'body' ).offset().top
                       }, 1200);

          load_berita(page);
        });

      litbangItem();
      // agendaKegiatan();
      videoTerbaru();
    });
  </script>
