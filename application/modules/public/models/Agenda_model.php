<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model{

  var $table = 'agenda';
  var $id    = 'id_agenda';

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
                      ->order_by('date',"desc")
                      ->limit($limit,$start)
                      ->get();
    foreach ($query->result() as $row) {


        $output.='   <li>
                      <div class="widget-img">
                        <a href="'.site_url("agenda/detail/$row->id_agenda/$row->slug").'">
                          <div class="tgl">
                          <span class="tahun"><i class="fa fa-calendar"></i></span>
                            <span class="bulan">'.date('d/m/Y',strtotime($row->date)).'</span>
                          </div>
                        </a>
                      </div>
                      <div>
                        <h4><a href="'.site_url("agenda/detail/$row->id_agenda/$row->slug").'">'.substr($row->agenda,0,150).'</a></h4>
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
