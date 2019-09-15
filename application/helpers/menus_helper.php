<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  function menu()
  {
    $ci = get_instance();

    $ci->load->library("cl");


    $str = "<ul class='sidebar-menu'>";
    $menu = $ci->db->query("SELECT * FROM menu WHERE is_parent=0 AND is_active=1 ORDER BY sort ASC");
    foreach ($menu->result() as $menus) {
      $submenu = $ci->db->query("SELECT * FROM menu WHERE is_parent=$menus->id AND is_active=1 ORDER BY sort ASC");
      if ($submenu->num_rows() > 0) {
        if ($ci->cl->get_menus($menus->id)==true) {
        $str .= "<li class='treeview ".submenus_active($menus->id)."'>";
        $str .= "<a href='#'><i class='".$menus->icon."'> </i><span>".strtoupper($menus->name)."</span><i class='fa fa-angle-left pull-right'></i></a>";
        $str .= "<ul class='treeview-menu'>";
            foreach ($submenu->result() as $submenus) {
              if ($ci->cl->get_menus($submenus->id)==true) {
                  $str .= "<li class='".menus_active($submenus->link)."'><a href='".site_url(config_item("cpanel").''.$submenus->link)."'><i class='".$submenus->icon."'></i><span>".strtoupper($submenus->name)."</span></a></li>";
              }
            } //end foreach submenu
        $str .= "</ul></li>";
      }
      }else {
        if ($ci->cl->get_menus($menus->id)==true) {
          $str .= "<li class='".menus_active($menus->link)."'><a href='".site_url(config_item("cpanel").''.$menus->link)."'><i class='".$menus->icon."'></i><span>".strtoupper($menus->name)."</span></a></li>";
        }
      } //end if sub menu
    } //end foreach menu
    // $str .="<li><a href='".site_url('auth/logout')."'><i class='fa fa-sign-out'></i> <span>KELUAR</span></a></li>";
    $str .="</ul>";
    return $str;


  }

  function menus_active($link)
  {
    $ci = get_instance();
    $uri1 = $ci->uri->segment(1);
    $uri2 = $ci->uri->segment(2);
    $uri3 = $ci->uri->segment(3);

    if ($uri3=="" OR $uri3=="edit" OR $uri3=="detail") {
      if ($uri1==$link OR $uri2==$link OR $uri1."/".$uri2==$link) {
        $active = "active";
      }else {
        $active = "";
      }
    }else {
      if ($uri2."/".$uri3==$link OR $uri2."/".$uri3==$link) {
        $active = "active";
      }else{
        $active = "";
      }
    }

    return $active;

  }

  function submenus_active($id)
  {
    $ci = get_instance();
    $uri1 = $ci->uri->segment(1);
    $uri2 = $ci->uri->segment(2);

    $menu = $ci->db->query("SELECT link FROM menu WHERE is_parent=$id");
    foreach ($menu->result() as $menus) {
      $link[]=$menus->link;
    }

    if (in_array($uri1,$link) OR in_array($uri2,$link) OR in_array($uri1."/".$uri2,$link)) {
      $active = "active";
    }else {
      $active ="";
    }
    return $active;
  }
