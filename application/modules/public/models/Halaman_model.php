<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_model extends CI_Model{

  var $table = 'halaman';
  var $id    = 'id_halaman';

  function get_data($where)
   {
      $query = $this->db->select("*")
              ->from($this->table)
              ->where($where)
              ->get();
       return $query;
   }






}
