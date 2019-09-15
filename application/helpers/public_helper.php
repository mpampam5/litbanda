<?php

function menus()
{
    $ci = get_instance();
    $str ='<ul>';
    $menu = $ci->db->query("SELECT * FROM menus_public WHERE posisi='header' AND parent=0 AND active=1 ORDER BY sort ASC");
    foreach ($menu->result() as $menus) {
        $sub_menu = $ci->db->query("SELECT * FROM menus_public WHERE posisi='header' AND parent=$menus->id_menu AND active=1 ORDER BY sort ASC");
        if ($sub_menu->num_rows()>0) {
          $str.='<li class="has-dropdown">';
          $str.='<a href="#">'.ucwords($menus->menu).'</a>';
          $str.='<ul>';
            foreach ($sub_menu->result() as $sub_menus) {
              if ($sub_menus->ops==1) {
                $str.='<li><a href="'.$sub_menus->url.'" target="_blank">'.ucwords($sub_menus->menu).'</a></li>';
              }else {
                $str.='<li><a href="'.site_url($sub_menus->url).'">'.ucwords($sub_menus->menu).'</a></li>';
              }
            }
          $str.='</ul>';
          $str.='</li>';
        }else {
          if ($menus->ops==1) {
            $str.='<li><a href="'.$menus->url.'" target="_blank">'.ucwords($menus->menu).'</a></li>';
          }else {
            $str.='<li><a href="'.site_url($menus->url).'">'.ucwords($menus->menu).'</a></li>';
          }
        }
    }
    $str .='</ul>';

    return $str;
}

function ukuran_file($file)
{
  $path = "./file/uploads/pdf/$file";
  if (file_exists($path)) {
      $files =  filesize($path);
      $files = "Ukuran File ".round($files / 1024, 2)." kb";
  }else {
      $files = "Tidak Ada File";
  }
  return $files;
}

// profile
function profile($str)
{
  $ci = get_instance();
  $data = $ci->db->where("id_profile",1)
                  ->get("profile")
                  ->row();
  return $data->$str;
}

// footer
function ft_berita()
{
  $ci = get_instance();
  $query = $ci->db->query('SELECT id_berita,judul,slug FROM berita ORDER BY id_berita ASC LIMIT 5 ');
  $str = "";
  foreach ($query->result() as $row) {
    $str.="<li><a href='".site_url("berita/detail/$row->id_berita/$row->slug")."' data-toggle='tooltip' title='".$row->judul."'>".substr($row->judul,0,35)."...</a></li>";
  }
  return $str;
}

function ft_halaman()
{
  $ci = get_instance();
  $query = $ci->db->query('SELECT id_halaman,halaman,slug FROM halaman ORDER BY id_halaman ASC LIMIT 5 ');
  $str = "";
  foreach ($query->result() as $row) {
    $str.="<li><a href='".site_url("page/$row->slug")."'>".$row->halaman."</a></li>";
  }
  return $str;
}

function ft_link()
{
  $ci = get_instance();
  $query = $ci->db->query('SELECT * FROM linkterkait ORDER BY id_link ASC LIMIT 5 ');
  $str = "";
  foreach ($query->result() as $row) {
    $str.="<li><a href='".$row->url."' target='_blank'>".$row->nama."</a></li>";
  }
  return $str;
}

 ?>
