<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Security');
    $this->Security->getsecurity();
    if ($this->cl->acl("home")==false) {
      redirect("errors/er403");
    }
  }


  function index()
  {
    $this->layouts->set_title('home');
    $data['aku'] = "mpampam";
    $this->layouts->view('content/home/index',array(),$data);
  }

  function sample()
  {
    $this->layouts->set_title('home');
    $data['aku'] = "mpampam";
    $this->layouts->view('content/home/sample',array(),$data);
  }

  function aksi()
  {


    $json = array('success'=>false ,'alert'=>array());
    if ($this->input->is_ajax_request()) {
      $post = $this->input->post("video[]");
      $post_count = count($post);
      $explode = implode("",$post);

      $this->form_validation->set_rules('judul', 'judul', 'trim|xss_clean|required');
      $this->form_validation->set_rules('video', 'video', 'trim|xss_clean|required');
      // for ($i=0; $i <$post_count ; $i++) {
      //     $a = $explode[$i];
      //
      // }
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run()) {




            $json['alert']   = "dsa";
            $json['success'] = true;
        }else{
            foreach ($_POST as $key => $value) {
              $json['alert'][$key] = form_error($key);
            }
        }
        echo json_encode($json);
    }

  }


}
