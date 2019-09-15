<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_gue extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

  }

// HOME
  function get_banner()
  {
    if ($this->input->is_ajax_request()) {
      $query = $this->db->query('SELECT * FROM banner ORDER BY id_banner DESC');

      $num_rows = $query->num_rows();
      $indicators = '<ol class="carousel-indicators">';
      for ($i=0; $i < $num_rows ; $i++) {
      $indicators.='<li data-target="#carousel-ken-burns" data-slide-to="'.$i.'"></li>';
      }
      $indicators.='</ol>';

      $str ='<div class="carousel-inner">';
      foreach ($query->result() as $row) {
        $str.='<div class="carousel-item">';
        $str.='<img src="'.base_url().'temp/upload/img/'.$row->image.'" alt="">';
        $str.='<div class="carousel-overlay"></div>';
        $str.='<div class="carousel-caption"><div><h4 class="carousel-title">'.$row->desc.'</h4></div></div>';
        $str.='</div>';
      }
      $str.='</div>';


      $json = array('indikators' =>$indicators,
                    'carousel'=>$str
                    );
      echo json_encode($json);
    }
  }

  function get_berita_terbaru()
  {
    if ($this->input->is_ajax_request()) {
      $query = $this->db->query("SELECT
                                  berita.id_berita,
                                  berita.id_kategori,
                                  berita.judul,
                                  berita.desc,
                                  berita.image,
                                  berita.slug AS slug_berita,
                                  berita.hits,
                                  berita.created_at,
                                  kategori.kategori,
                                  kategori.slug AS slug_kategori
                                  FROM
                                  berita
                                  LEFT JOIN kategori ON kategori.id_kategori = berita.id_kategori
                                  ORDER BY
                                  berita.id_berita DESC
                                  LIMIT 4
                                  ");
   if ($query->num_rows()>0) {
     $str = '<h6 class="subtitle">Berita Terbaru</h6>';
     foreach ($query->result() as $row) {
       $str .= '<div class="post post-review">';
         if ($row->image=="") {
           $image = "default.png";
         }else {
           $image = "img/$row->image";
         }
         $str .= '<div class="post-thumbnail">';
         $str .=    '<a href="'.site_url("berita/detail/$row->id_berita/$row->slug_berita").'"><div class="image-berita" style="background-image:url('.base_url().'temp/upload/'.$image.')"></div></a>';
         $str .= '</div>';

         $str .= '<div class="post-block">';
         $str .= '<h2 class="post-title"><a href="'.site_url("berita/detail/$row->id_berita/$row->slug_berita").'">'.substr($row->judul,0,100).'...</a></h2>';
         $str .= '<div class="post-meta">';
           $str .= '<span><i class="fa fa-calendar"></i> '.date('d/m/Y',strtotime($row->created_at)).'</span>';
           $str .= '<span><i class="fa fa-tags"></i> '.$row->kategori.'</span>';
         $str .= '</div>';
         $str .= '<p style="text-align:justify">'.substr(strip_tags($row->desc),0,200).'...<i class="text-warning"><a href="'.site_url("berita/detail/$row->id_berita/$row->slug_berita").'">Baca Selengkapnya</a></i></p>';
         $str .= '</div>';
       $str .= '</div>';
     }
   }else {
     $str="";
   }
    $json = array('headline_news' => $str);

    echo json_encode($json);
    }
  }



function get_berita_populer()
{
  if ($this->input->is_ajax_request()) {
    $query = $this->db->query("SELECT
                                berita.id_berita,
                                berita.judul,
                                berita.desc,
                                berita.image,
                                berita.slug AS slug_berita,
                                berita.created_at,
                                berita.hits
                                FROM
                                berita
                                ORDER BY
                                berita.hits DESC
                                LIMIT 3
                                ");
if ($query->num_rows()>0) {
  $str = '<h6 class="subtitle">Berita Populer</h6>';
  $str .= '<div class="row">';
  foreach ($query->result() as $row) {
    if ($row->image=="") {
      $image = "default.png";
    }else {
      $image = "img/$row->image";
    }

    $str .= '<div class="col-12 col-sm-4">';
    $str .= '<div class="card card-widget m-b-0">';
    $str .= '<div class="card-img">';
    $str .= '<a href="'.site_url("berita/detail/$row->id_berita/$row->slug_berita").'">
                <div class="image-berita-popular" style="background-image:url('.base_url().'temp/upload/'.$image.')"></div>
             </a>';
    $str .= '</div>';
    $str .= '<div class="card-block">';
    $str .= '<h4 class="card-title"><a href="'.site_url("berita/detail/$row->id_berita/$row->slug_berita").'">'.substr($row->judul,0,50).'...</a></h4>';
    $str .= '<div class="card-meta"><span><i class="fa fa-calendar"></i> '.date('d/m/Y',strtotime($row->created_at)).'</span></div>';
    $str .= '<p style="text-align:justify">'.substr(strip_tags($row->desc),0,100).'...</p>';
    $str .= '</div>';
    $str .= '</div>';
    $str .= '</div>';
  }
  $str .= '</div>';
}else {
  $str="";
}
  $json = array('popular_news' => $str);

  echo json_encode($json);
  }
}

function get_berita_lainnya($id)
{
  if ($this->input->is_ajax_request()) {
    $query = $this->db->query("SELECT
                                berita.id_berita,
                                berita.judul,
                                berita.desc,
                                berita.image,
                                berita.slug AS slug_berita,
                                berita.created_at,
                                berita.hits
                                FROM
                                berita
                                WHERE
                                berita.id_berita!=$id
                                ORDER BY
                                berita.hits DESC
                                LIMIT 3
                                ");
  if ($query->num_rows()>0) {
    $str = '<h6 class="subtitle">Berita Lainnya</h6>';
    $str .= '<div class="row">';
    foreach ($query->result() as $row) {
      if ($row->image=="") {
        $image = "default.png";
      }else {
        $image = "img/$row->image";
      }

      $str .= '<div class="col-12 col-sm-4">';
      $str .= '<div class="card card-widget m-b-0">';
      $str .= '<div class="card-img">';
      $str .= '<a href="'.site_url("berita/detail/$row->id_berita/$row->slug_berita").'">
                  <div class="image-berita-popular" style="background-image:url('.base_url().'temp/upload/'.$image.')"></div>
               </a>';
      $str .= '</div>';
      $str .= '<div class="card-block">';
      $str .= '<h4 class="card-title"><a href="'.site_url("berita/detail/$row->id_berita/$row->slug_berita").'">'.substr($row->judul,0,50).'...</a></h4>';
      $str .= '<div class="card-meta"><span><i class="fa fa-calendar"></i> '.date('d/m/Y',strtotime($row->created_at)).'</span></div>';
      $str .= '<p style="text-align:justify">'.substr(strip_tags($row->desc),0,100).'...</p>';
      $str .= '</div>';
      $str .= '</div>';
      $str .= '</div>';
    }
    $str .= '</div>';
  }else {
    $str="";
  }
  $json = array('popular_news' => $str);

  echo json_encode($json);
  }
}


function get_video_lainnya($id)
{
  if ($this->input->is_ajax_request()) {
    $query = $this->db->query("SELECT * FROM video WHERE id_video!=$id ORDER BY id_video DESC LIMIT 4");

    if ($query->num_rows()>0) {
      $str = '<h6 class="subtitle">Video Lainnya</h6><div class="row row-5">';
      foreach ($query->result() as $row) {
          $str.='
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="card card-video">
                      <div class="card-img">
                        <a href="'.site_url("video/detail/$row->id_video/$row->embed").'">
                        <img src="https://i1.ytimg.com/vi/'.$row->embed.'/mqdefault.jpg" alt="'.$row->embed.'">
                      </a>
                      </div>
                      <div class="card-block">
                        <h4 class="card-title"><a href="'.site_url("video/detail/$row->id_video/$row->embed").'">'.$row->video.'</a></h4>
                      </div>
                    </div>
                  </div>
                ';
      }
      $str.='</div>';
    }else {
      $str="";
    }

  $json = array('video_lainnya' => $str);
    echo json_encode($json);
  }

}


// WIDGET

function get_video()
{
  if ($this->input->is_ajax_request()) {
    $query = $this->db->query("SELECT * FROM video ORDER BY id_video DESC LIMIT 1");

    if ($query->num_rows()>0) {
      foreach ($query->result() as $row) {
          $str='<div class="widget widget-video m-b-50">
                  <h5 class="widget-title">Video Terbaru</h5>
                  <div class="widget-img">
                    <a href="'.site_url("video/detail/$row->id_video/$row->embed").'">
                    <img src="http://img.youtube.com/vi/'.$row->embed.'/maxresdefault.jpg" alt="">
                  </a>
                    <a class="video-play-icon" href="'.site_url("video/detail/$row->id_video/$row->embed").'">
                      <i class="fa fa-play"></i>
                    </a>
                  </div>
                  <h4>
                    <a href="'.site_url("video/detail/$row->id_video/$row->embed").'">'.substr($row->video,0,80).'</a>
                  </h4>
                </div>';

      }
    }else {
      $str="";
    }

  $json = array('video_new' => $str);
    echo json_encode($json);
  }

}


function get_agenda()
{
  if ($this->input->is_ajax_request()) {
    $query = $this->db->query("SELECT * FROM agenda ORDER BY agenda.date DESC LIMIT 4");
    if ($query->num_rows()>0) {
      $str="";
      $str.='<div class="widget widget-post m-b-50">
                <h5 class="widget-title">Agenda Kegiatan</h5>
                <ul class="widget-list">';
    foreach ($query->result() as $row) {
        $str.='   <li>
                      <div class="widget-img">
                        <a href="'.site_url("agenda/detail/$row->id_agenda/$row->slug").'">
                          <div class="tgl">
                          <span class="tahun"><i class="fa fa-calendar"></i></span>
                            <span class="bulan">'.date('d/m/Y',strtotime($row->date)).'</span>
                          </div>
                        </a>
                      </div>
                      <div>
                        <h4><a href="'.site_url("agenda/detail/$row->id_agenda/$row->slug").'">'.substr($row->agenda,0,100).'...</a></h4>
                      </div>
                    </li>

                  ';

    }
    $str.='</ul>
        </div>';
    }else {
      $str="";
    }
  $json = array('agenda_kegiatan' => $str);

  echo json_encode($json);
  }
}

function get_litbang()
{
  if ($this->input->is_ajax_request()) {
    $query = $this->db->query("SELECT * FROM litbang ORDER BY id_litbang DESC LIMIT 4");
    if ($query->num_rows()>0) {
      $str="";
      $str.='<div class="widget widget-post m-b-50">
                <h5 class="widget-title">Penelitian</h5>
                <ul class="widget-list">';
    foreach ($query->result() as $row) {
        $str.='   <li>
                      <div class="widget-img">
                        <a href="'.site_url("litbang/detaill/$row->id_litbang/$row->slug").'">
                        <div class="widget-img">
                          <a href="'.site_url("litbang/detaill/$row->id_litbang/$row->slug").'">
                            <div class="litbang">
                              <i class="fa fa-book"></i>
                            </div>
                          </a>
                        </div>
                        </a>
                      </div>
                      <div>
                        <h4><a href="'.site_url("litbang/detaill/$row->id_litbang/$row->slug").'">'.substr($row->judul,0,100).'...</a></h4>
                      </div>
                    </li>
                  ';

    }
    $str.='</ul>
        </div>';
    }else {
      $str="";
    }
  $json = array('litbang_item' => $str);

  echo json_encode($json);
  }
}

// WIDGET



}
