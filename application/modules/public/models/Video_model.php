<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model{

  var $table = "video";
  var $id    = "id_video";


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
                       ->order_by($this->id,"desc")
                       ->limit($limit,$start)
                       ->get();

    foreach ($query->result() as $row) {
      $output .='<div class="col-12 col-sm-6 col-md-3">
                    <div class="card card-video">
                      <div class="card-img">
                        <a href="'.site_url("video/detail/$row->id_video/$row->embed").'">
                        <img src="https://i1.ytimg.com/vi/'.$row->embed.'/mqdefault.jpg" alt="Tom Clancys Ghost Recon: Wildlands">
                      </a>
                      </div>
                      <div class="card-block">
                        <h4 class="card-title"><a href="'.site_url("video/detail/$row->id_video/$row->embed").'">'.$row->video.'</a></h4>
                      </div>
                    </div>
                  </div>
                ';
    }

    return $output;
  }


  function get_data($where)
  {
    return $this->db->get_where($this->table,$where);
  }

}
