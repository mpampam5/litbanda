<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model{

  var $table = 'berita';
  var $id    = 'id_berita';

  function count_all()
  {
    return $this->db->get("berita")
                    ->num_rows();
  }

  function fetch_details($limit,$start)
  {
    $output = '';
    $query = $this->db->select("id_berita,judul,desc,image,berita.slug,hits,created_at,kategori.id_kategori,kategori.kategori,kategori.slug AS kategori_slug")
             ->from($this->table)
             ->join('kategori', 'berita.id_kategori = kategori.id_kategori','left')
             ->order_by($this->id,"desc")
              ->limit($limit,$start)
              ->get();
    foreach ($query->result() as $row) {
      if ($row->image=="") {
        $image = "default.png";
      }else {
        $image = "img/".$row->image;
      }
      $output .='<div class="post post-md">
                    <div class="post-thumbnail">
                      <a href="'.site_url('berita/detail/'.$row->id_berita.'/'.$row->slug).'">
                        <div class="image-berita" style="background-image:url('.base_url().'temp/upload/'.$image.')"></div>
                      </a>
                    </div>
                    <div class="post-block">
                      <h2 class="post-title"><a href="'.site_url('berita/detail/'.$row->id_berita.'/'.$row->slug).'"  data-toggle="tooltip" title="'.$row->judul.'">'.substr($row->judul,0,100).'...</a></h2>
                      <div class="post-meta">
                        <span><i class="fa fa-calendar"></i> '.date("d,M Y",strtotime($row->created_at)).'</span>
                        <span><i class="fa fa-tags"></i>'.$row->kategori.'</span>
                      </div>
                      <p>'.strip_tags(substr($row->desc,0,180)).'...<a href="'.site_url('berita/detail/'.$row->id_berita.'/'.$row->slug).'"><i class="text-warning">Baca Selengkapnya</i></a></p>
                    </div>
                  </div>
      ';
    }

    return $output;
  }


     function get_data($where)
      {
         $query = $this->db->select("id_berita,judul,desc,image,berita.slug,hits,berita.komentar,created_at,kategori.id_kategori,kategori.kategori,kategori.slug AS kategori_slug")
                 ->from($this->table)
                 ->join('kategori', 'berita.id_kategori = kategori.id_kategori','left')
                 ->where($where)
                 ->get();
          return $query;
      }



}
