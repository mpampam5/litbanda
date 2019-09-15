<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasakip_model extends CI_Model{

  var $table = 'jaskip';
  var $id    = 'id_jaskip';

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
                        <a id="detail_jasakip" href="'.site_url("jasakip/detail/$row->id_jaskip").'">
                          <div class="litbang" style="height:40px!important">
                            <i style="font-size:20px;" class="fa fa-file-zip-o"></i>
                          </div>
                        </a>
                      </div>
                      <div>
                        <h4><a id="detail_jasakip" href="'.site_url("jasakip/detail/$row->id_jaskip").'">'.substr($row->Judul_jaskip,0,150).'</a></h4>
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
