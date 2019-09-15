<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pmenu extends CI_Model{

var $table = "menus_public";

  function get_data()
  {
    return $this->db->query("SELECT * FROM $this->table WHERE posisi='header' ORDER BY sort DESC");
  }

  function get_insert($data)
  {
    return $this->db->insert($this->table,$data);
  }

  function get_where($data)
  {
    return $this->db->where($data)
                    ->order_by('sort','ASC')
                    ->get($this->table);
  }

  function get_update($where,$data)
  {
    return $this->db
          ->where($where)
          ->update($this->table,$data);
  }

  function get_delete($where)
  {
    return $this->db->where($where)
                    ->delete($this->table);
  }

}
