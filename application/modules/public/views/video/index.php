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
      <div class="row row-5 video_item"></div>

      <div class="pagination-results m-t-10">
        <div class="pagination_link"></div>
      </div>
    </div>
  </section>


<script type="text/javascript">
load_video(1);

  function load_video(page)
  {
    $.ajax({
      url:"<?=base_url();?>video/page/"+page,
      method:'GET',
      dataType:'json',
      success:function(data)
      {
        $(".video_item").hide().fadeIn(1000).html(data.load_data_news);
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

    load_video(page);
  });
</script>
