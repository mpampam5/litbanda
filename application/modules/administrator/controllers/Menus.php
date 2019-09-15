<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("model_menus","model");
    if ($this->cl->acl("menus")==false) {
      redirect("errors/er403");
    }
  }

  function _rules(){
  $this->form_validation->set_rules("name","Menu","trim|required|xss_clean");
  $this->form_validation->set_rules("link","Link","trim|required|xss_clean");
  $this->form_validation->set_rules("aktif","aktif","trim|required|xss_clean");
  $this->form_validation->set_rules("parent","parent","trim|required|xss_clean");
  $this->form_validation->set_rules("description","Deskripsi","trim|xss_clean");
  $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
}

  function index()
  {
    $this->layouts->set_title("menus");
    $data['query'] = $this->model->get_data();
    $this->layouts->view("content/menus/index",array(),$data);
  }

  function save()
  {
    $data = json_decode($_POST['data']);
    $readbleArray = $this->parseJsonArray($data);

  $i=0;
  foreach($readbleArray as $row){
    $i++;
  	$this->db->query("update menu set is_parent = '".$row['parentID']."', sort = '".$i."' where id = '".$row['id']."' ");
  }
    }

    function parseJsonArray($jsonArray, $parentID = 0) {

  $return = array();
  foreach ($jsonArray as $subArray) {
      $returnSubSubArray = array();
      if (isset($subArray->children)) {
   		$returnSubSubArray = $this->parseJsonArray($subArray->children, $subArray->id);
    }

    $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
    $return = array_merge($return, $returnSubSubArray);
  }
    return $return;
  }


  function tambah($status="")
  {
    if ($this->input->is_ajax_request()) {
        if ($status=="aksi") {
            $json = array("success"=>false,"alert"=>array());
            $this->_rules();
            if ($this->form_validation->run()) {
              $insert = array('name' => $this->input->post('name',true),
                              'link' => lcfirst($this->input->post('link',true)),
                              'icon' => $this->input->post('icon',true),
                              'description' => $this->input->post('description',true),
                              'is_active' => $this->input->post('aktif',true),
                              'is_parent' => $this->input->post('parent',true)
                              );
              $this->model->get_insert($insert);
              $json['alert'] = "Berhasi Menyimpan!";
              $json['success'] = true;
            }else {
              foreach ($_POST as $key => $value) {
                $json['alert'][$key] = form_error($key);
               }
            }
            echo json_encode($json);


        }else {
          $data['status']="tambah";
          $this->layouts->view(config_item("cpanel")."content/menus/form",array(),$data,false);
        }
    }
  }

  function edit($id,$status="")
  {
    if ($this->input->is_ajax_request()) {
        if ($status=="aksi") {
            $json = array("success"=>false,"alert"=>array());
            $this->_rules();
            if ($this->form_validation->run()) {
              $insert = array('name' => $this->input->post('name',true),
                              'link' => lcfirst($this->input->post('link',true)),
                              'icon' => $this->input->post('icon',true),
                              'description' => $this->input->post('description',true),
                              'is_active' => $this->input->post('aktif',true),
                              'is_parent' => $this->input->post('parent',true)
                              );
              $this->model->get_update(array("id"=>$id),$insert);
              $json['alert'] = "Berhasi Menyimpan!";
              $json['success'] = true;
            }else {
              foreach ($_POST as $key => $value) {
                $json['alert'][$key] = form_error($key);
               }
            }
            echo json_encode($json);


        }else {
          $data['row']   =$this->model->get_where(array("id"=>$id))->row();
          $data['status']="edit";
          $this->layouts->view(config_item("cpanel")."content/menus/form",array(),$data,false);
        }
    }
  }

  function info($id)
  {
    if ($this->input->is_ajax_request()) {
      $data['row']   =$this->model->get_where(array("id"=>$id))->row();
      $data['status']="edit";
      $this->layouts->view(config_item("cpanel")."content/menus/info",array(),$data,false);
    }
  }

  function hapus($id)
  {
    if ($this->input->is_ajax_request()) {
      $this->model->get_delete(array("id"=>$id));
      $json['alert'] =  "Berhasil Menghapus!";
      $json['success'] = true;
       echo json_encode($json);
    }
  }

}
