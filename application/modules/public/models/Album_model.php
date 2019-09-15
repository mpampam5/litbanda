<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model{

  var $table = 'album';
  var $id    = 'id_album';

  function count_all()
  {
    return $this->db->get($this->table)
                    ->num_rows();
  }

  function fetch_details($limit,$start)
  {
    $output = '';
    $query = $this->db->select("*")
             ->from($this->table)
             // ->join('galery_image', 'album.id_album = galery_image.id_album','left')
             ->order_by($this->id,"desc")
              ->limit($limit,$start)
              ->get();
    foreach ($query->result() as $row) {

      // $gambar = $this->db->query("SELECT * FROM galery_image where id_album=$row->id_album ORDER BY id_galery_image DESC limit 1")->row();
      $gambar = $this->db->select('*')
                          ->where('id_album',$row->id_album)
                          ->order_by('id_galery_image','desc')
                          ->limit(1)
                          ->get("galery_image");

        if ($gambar->num_rows()>0) {
          $images = "thumbs/".$gambar->row()->image;
        }else {
          $images = "default.png";
        }
      $output .='<div class="col-12 col-sm-6 col-md-3">
                    <div class="card card-video">
                      <div class="card-img" >
                        <a href="'.site_url("album/detail/$row->id_album").'">
                        <img src="'.base_url("temp/upload/$images").'" class="thumbnail" style="width:277px;height:200px;" alt="images">
                      </a>
                      </div>
                      <div class="card-block">
                        <h4 class="card-title"><a href="'.site_url("album/detail/$row->id_album").'">'.$row->album.'</a></h4>
                      </div>
                    </div>
                  </div>';
    }

    return $output;
  }


  function get_data($where)
   {
      $query = $this->db->select("*")
              ->from($this->table)
              ->where($this->id,$where)
              ->get();
       return $query;
   }

}
