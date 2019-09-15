<?php
/**
 *
 */
class Cl
{
  private $ci;

  function __construct()
  {
    $this->ci =& get_instance();
  }

  function acl($value)
  {

    $session = $this->ci->session->userdata("level");



    $query = $this->ci->db->where(array("id_level"=>$session))->get("groups");
    $menus = $this->ci->db->where(array("link"=>$value))->get("menu")->row();
    $menu_id = $menus->id;

    if ($query->num_rows()>0) {
      $query_row = $query->row();
      if ($query_row->access!=null) {
        $group_decode=json_decode($query_row->access,true);
        if (in_array($menu_id,$group_decode)) {
          return true;
        }else {
          return false;
        }
      }else {
        return false;
      }

    }
  }

  function get_menus($id)
  {
    $session = $this->ci->session->userdata("level");
    $query = $this->ci->db->where(array("id_level"=>$session))->get("groups");

    if ($query->num_rows()>0) {
      $query_row = $query->row();
      if ($query_row->access!=null) {
        $group_decode=json_decode($query_row->access,true);
        if (in_array($id,$group_decode)) {
          return true;
        }else {
          return false;
        }
      }else {
        return false;
      }

    }
  }



}



 ?>
