<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_pwd extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pengguna_model','model');
  }

  function index(){
    $this->layouts->view(config_item("cpanel").'change',array(),array(),false);
  }

  function aksi_pwd()
  {
    if ($this->input->is_ajax_request()) {
      $json = array('success' =>false , "alert"=>array());
      $this->form_validation->set_rules("pwd","Password baru ","trim|required|min_length[5]|max_length[50]");
      $this->form_validation->set_rules("pwd_con","Konfirmasi Password baru","trim|required|matches[pwd]|xss_clean");
      $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
      if($this->form_validation->run())
        {
        $password = pass_enc($this->input->post('pwd_con'));
        $this->model->get_update(sess('id_auth'),array("password"=>$password));
        $json['alert']  = "Berhasil mengubah password!";
        $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
           }
        }
      echo json_encode($json);
    }
  }


}
