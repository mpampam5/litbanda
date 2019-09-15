<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('mpampam');
    $this->load->library(array("Layouts","form_validation"));
  }

  function a()
  {
    $data['title'] = 'login';
    $data['logo']  = "<img src='".base_url()."temp/admin/".config_item('logo')."' style='height:50%;width:50%'>";
    $this->layouts->view('auth/view_auth',array(),$data,false);
  }

  function get_login()
  {
    $json = array('success' =>false, 'status'=>false, 'alert'=>array());
    if ($this->input->is_ajax_request())
        {
          $this->load->helper('enc');
          $this->load->model('Auth_model','Model');
          //rules
            $this->form_validation->set_rules("email","Email","trim|xss_clean|required|valid_email");
            $this->form_validation->set_rules("password","Password","trim|required");
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
          //end set_rules

            $email    = $this->input->post('email',true);
            $password =  $this->input->post('password');


          if ($this->form_validation->run())
              {
                $query = $this->Model->get_where( array('email'=>$email),
                                                  "auth"
                                                );

                if ($query->num_rows() > 0) {
                    $row = $query->row();
                    $pass_encrypt = $row->password;

                    if (pass_dec($password,$pass_encrypt)==true) {
                        if ($this->db->get_where("groups",array("id_level"=>$row->groups))->num_rows()>0) {
                          if ($row->active==1) {
                            $json['url']    = site_url(config_item("cpanel").'home');
                            $json['status'] = true;
                            $session = array(
                                              'id_auth'   =>$row->id_auth,
                                              'name'      =>$row->name,
                                              'image'     =>$row->image,
                                              'email'     =>$row->email,
                                              'level'     =>$row->groups,
                                              'login'     =>true
                                              );
                            $this->session->set_userdata($session);
                            $this->load->library("Auth_sess");
                            $this->auth_sess->sess($row->id_auth);
                          }else {
                            $json['alert'] = "Akun tidak aktif,Silahkan Hubungi Admin!";
                          }
                        }else {
                          $json['alert'] = "gagal login,coba lagi!";
                        }
                    }else {
                      $json['alert'] = "email atau password salah,coba lagi!";
                    }
                }else {
                  $json['alert'] = "wmail atau password salah,coba lagi!";
                }
                $json['success']=true;
              }else {
                  foreach ($_POST as $key => $value) {
                    $json['alert'][$key] = form_error($key);
                  }
              }
          echo json_encode($json);
        }
  }


function logout()
{
  $this->session->sess_destroy();
  redirect(config_item('auth'),'refresh');
}




}//end controllers
