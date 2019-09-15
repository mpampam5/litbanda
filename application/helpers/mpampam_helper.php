<?php
function me($value)
{
  return config_item($value);
}

function directory($value)
{
  return config_item($value);
}
function sess($str)
{
  $ci = get_instance();
   return $ci->session->userdata("$str");
}

function slug($str)
{
  return url_title($str,'dash',true);
}

function profile($str)
{
  $ci = get_instance();
  $data = $ci->db->where("id_profile",1)
                  ->get("profile")
                  ->row();
  return $data->$str;
}

function row_table($str)
{
  $ci = get_instance();
  $data = $ci->db->get($str)->num_rows();
  return $data;
}

function query_table($str)
{
  $ci = get_instance();
  $data = $ci->db->query($str);
  return $data;
}


function cmb_dinamis($id,$name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control'>";
    $data = $ci->db->get($table)->result();
    if ($selected==null) {
      $cmb .="<option value=''>--pilih--</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".$d->$field."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_dinamis_pmenu($id,$name,$table,$field,$pk,$array,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control'>";
    $data = $ci->db->get_where($table,$array)->result();
    if ($selected==null) {
      $cmb .="<option value='0'>Ya</option>";
    }else {
      $cmb .="<option value='0'";
      $cmb .= $selected==0?" selected='selected'":'';
      $cmb .=">YA</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_query($query,$id,$name,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control'>";
    $data = $ci->db->query($query)->result();
    if ($selected==null) {
      $cmb .="<option value=''>--pilih--</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".$d->$field."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_menu($id,$name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$id' class='form-control'>";
    $data = $ci->db->get($table)->result();
    if ($selected==null) {
      $cmb .="<option value='0'>Ya</option>";
    }else {
      $cmb .="<option value='0'";
      $cmb .= $selected==0?" selected='selected'":'';
      $cmb .=">YA</option>";
    }
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}


function groups($table,$id_level,$id_menus)
{
  $ci = get_instance();
  $query = $ci->db->where(array("id_level"=>$id_level))->get($table);

  if ($query->num_rows()>0) {
    $menu = $query->row();
    if ($menu->access!=null) {
      $menus=json_decode($menu->access,true);
      if (in_array($id_menus,$menus)) {
        return true;
      }else {
        return false;
      }
    }else {
      return false;
    }

  }
}

function agenda_alert($date)
{
  $ci = get_instance();
  $query = $ci->db->where(array("date"=>$date))->get("agenda");
  $num_rows = $query->num_rows();


  $str =  '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
  $str .=    '<i class="fa fa-calendar"></i>';
  if ($num_rows!=0) {
    $str .=       '<span class="label label-danger">'.$num_rows.'</span>';
  }
  $str .=  '</a>';
  $str .=  '<ul class="dropdown-menu">';
  $str .=    '<li class="header"></li>';
  $str .=    '<li>';
  $str .=      '<ul class="menu">';
  if ($num_rows>0) {
    foreach ($query->result() as $agenda) {

      $str .=        '<li>';
      $str .=          '<a href="'.site_url(config_item("cpanel")."agenda/detail/$agenda->id_agenda").'">';
      $str .=               '<i class="fa fa-calendar text-green"></i>';
      $str .=               substr($agenda->agenda,0,25)."";
      $str .=          '</a>';
      $str .=        '</li>';
      }
    }else {
      $str .=          '<li class="text-center">';
      $str .=            '</br></br></br></br>Tidak ada agenda kegiatan hari ini';
      $str .=          '</li>';
    }
    $str .=      '</ul>';
    $str .=    '</li>';
  $str .=    '<li class="footer"><a href="'.site_url(config_item("cpanel").'agenda').'">Lihat Semua Agenda Kegiatan</a></li>';
  $str .=  '</ul>';

  return $str;
}


function kontak()
{
  $ci = get_instance();
  $query = $ci->db->where(array("read"=>"0"))->get("kontak");
  $kontaks = $ci->db->query("SELECT * FROM kontak ORDER BY id_kontak DESC LIMIT 5");
  $num_rows = $query->num_rows();



    $str =   '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
    $str .=       '<i class="fa fa-envelope"></i>';
    if ($num_rows!=0) {
      $str .=       '<span class="label label-danger">'.$num_rows.'</span>';
    }
    $str .=     '</a>';
    $str .=     '<ul class="dropdown-menu">';
    if ($num_rows!=0) {
      $str .=   '<li class="header">'.$num_rows.' Belum di baca</li>';
    }
    $str .=       '<li>';
    $str .=         '<ul class="menu">';
    if ($num_rows>0) {
      foreach ($query->result() as $kontak) {
    $str .=           '<li>';
    $str .=             '<a id="detail-kontak" href="'.site_url(config_item("cpanel")."kontak/detail/$kontak->id_kontak").'">';
    $str .=            ' <div class="pull-left">';
    $str .=               '<i class="fa fa-envelope text-aqua"></i>';
    $str .=             '</div>';
    $str .=              '<h4>'.$kontak->email.'</h4>';
    $str .=             '<p>'.$kontak->desc.'</p>';
    $str .=             '</a>';
    $str .=           '</li>';
      }
    }else {
      foreach ($kontaks->result() as $kontakss) {
        $str .=           '<li>';
        $str .=             '<a id="detail-kontak" href="'.site_url(config_item("cpanel")."kontak/detail/$kontakss->id_kontak").'">';
        $str .=            ' <div class="pull-left">';
        $str .=               '<i class="fa fa-envelope-o text-aqua"></i>';
        $str .=             '</div>';
        $str .=              '<h4>'.$kontakss->email.'</h4>';
        $str .=             '<p>'. $kontakss->desc.'</p>';
        $str .=             '</a>';
        $str .=           '</li>';
      }
    }
    $str .=         '</ul>';
    $str .=       '</li>';
    $str .=       '<li class="footer"><a href="'.site_url(config_item("cpanel")."kontak").'">Lihat Semua</a></li>';
    $str .=     '</ul>';


  return $str;
}
