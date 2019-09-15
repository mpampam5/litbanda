var url = location.protocol + "//" + location.hostname+"/balitbang/";
function slider()
{
  $.ajax({
    url: url+'public/config_gue/get_banner',
    dataType: 'json',
    success:function(json)
    {
      $("#indikators").hide().fadeIn().html(json.indikators);
      $("#carousel-inner").hide().fadeIn().html(json.carousel);
      $('.carousel-item').first().addClass('active');
    },
    error: function (request, status, error) {
        alert("BANNER==="+request.responseText);
    }
  });
}


function beritaTerbaru()
{
  $.ajax({
    url: url+'public/config_gue/get_berita_terbaru',
    dataType: 'json',
    success:function(json)
    {
      $(".headline_news").hide().fadeIn().html(json.headline_news);
    },
    error: function (request, status, error) {
        alert("BERITA TERBARU==="+request.responseText);
    }
  });
}

function beritaPopulaler()
{
  $.ajax({
    url: url+'public/config_gue/get_berita_populer',
    dataType: 'json',
    success:function(json)
    {
      $(".popular_news").hide().fadeIn().html(json.popular_news);
    },
    error: function (request, status, error) {
        alert("BERITA POPULER==="+request.responseText);
    }
  });
}

function beritaLainnya(id)
{
  $.ajax({
    url: url+'public/config_gue/get_berita_lainnya/'+id,
    dataType: 'json',
    success:function(json)
    {
      $(".popular_news").hide().fadeIn().html(json.popular_news);
    },
    error: function (request, status, error) {
        alert("BERITA LAINNYA==="+request.responseText);
    }
  });
}

function videoLainnya(id)
{
  $.ajax({
    url: url+'public/config_gue/get_video_lainnya/'+id,
    dataType: 'json',
    success:function(json)
    {
      $(".video_lainnya").hide().fadeIn().html(json.video_lainnya);
    },
    error: function (request, status, error) {
        alert("VIDEO LAINNYA==="+request.responseText);
    }
  });
}

function videoTerbaru()
{
  $.ajax({
    url: url+'public/config_gue/get_video',
    dataType: 'json',
    success:function(json)
    {
      $(".video_new").hide().fadeIn().html(json.video_new);
    },
    error: function (request, status, error) {
        alert("video POPULER==="+request.responseText);
    }
  });
}

function agendaKegiatan()
{
  $.ajax({
    url: url+'public/config_gue/get_agenda',
    dataType: 'json',
    success:function(json)
    {
      $(".agenda_kegiatan").hide().fadeIn().html(json.agenda_kegiatan);
    },
    error: function (request, status, error) {
        alert("agenda POPULER==="+request.responseText);
    }
  });
}

function litbangItem()
{
  $.ajax({
    url: url+'public/config_gue/get_litbang',
    dataType: 'json',
    success:function(json)
    {
      $(".litbang_item").hide().fadeIn().html(json.litbang_item);
    },
    error: function (request, status, error) {
        alert("litbang POPULER==="+request.responseText);
    }
  });
}
