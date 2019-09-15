<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class litbang_model extends CI_Model{

  var $table = 'litbang';
  var $id    = 'id_litbang';

  function count_all()
  {
    return $this->db->get($this->table)
                    ->num_rows();
  }

  function fetch_details($limit,$start)
  {
    $output='<div class="widget widget-post m-b-0">
              <ul class="widget-list">';
    $query = $this->db->select("*")
                      ->from($this->table)
                      ->order_by($this->id,"desc")
                      ->limit($limit,$start)
                      ->get();
    foreach ($query->result() as $row) {


        $output.='   <li style="border-top:0!important;border-bottom:1px solid #e8e8e8;padding-bottom: 10px;">
                      <div class="widget-img" style="width:40px!important">
                        <a href="'.site_url("litbang/detail/$row->id_litbang/$row->slug").'">
                          <div class="litbang" style="height:40px!important">
                            <i style="font-size:20px;" class="fa fa-book"></i>
                          </div>
                        </a>
                      </div>
                      <div>
                        <h4><a href="'.site_url("litbang/detail/$row->id_litbang/$row->slug").'">'.substr($row->judul,0,150).'</a></h4>
                      </div>
                    </li>

                  ';

    }

    $output.='</ul>
      </div>';

    return $output;
  }


  function get_data($where)
   {
      $query = $this->db->select("*")
              ->from($this->table)
              ->where($where)
              ->get();
       return $query;
   }






}
