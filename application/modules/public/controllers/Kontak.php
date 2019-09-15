<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('template','form_validation'));
    $this->load->helper(array('public','form'));
    // $this->load->model("Halaman_model","model");
  }

  function index()
  {
    $this->load->helper('captcha');
    $captcha = array('img_path' =>'./temp/captcha/' ,
                  'img_url'  => base_url().'temp/captcha/',
                  'expiration'=>7200,
                  'word_lenght' =>8,
                  'font_size' =>22,
                  'img_height'    => 40,
                  'img_width' =>280
                  );
    $cap = create_captcha($captcha);
    $this->session->set_userdata('captword',$cap['word']);
      $data = array('captcha' => $cap['image'],
                  'nama'   => set_value('nama'),
                  'telepon'   => set_value('telepon'),
                    'email'   => set_value('email'),
                    'desc'    =>set_value('desc')
                    );

      $this->template->set_title('Balitbang Sulawesi Tenggara');
      $this->template->set_description('Selamat Datang Di Website Resmi Badan Penelitian Dan Pengembangan Prov.Sulawesi Tenggara');
      $this->template->view("kontak/index",array(),$data);
  }


  function action()
{
  $json = array('success'=>false ,'alert'=>array(),'alert_capt'=>0);
  if ($this->input->is_ajax_request()) {
    $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean|required');
    $this->form_validation->set_rules('telepon', 'Telepon', 'trim|xss_clean|required|numeric|min_length[5]|max_length[15]');
    $this->form_validation->set_rules('captcha_key', 'Captcha','trim|xss_clean|required');
    $this->form_validation->set_rules('desc', 'Keterangan', 'trim|xss_clean|required|max_length[500]');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    $email       = $this->input->post('email',TRUE);
    $nama       = $this->input->post('nama',TRUE);
    $telepon       = $this->input->post('telepon',TRUE);
    $desc        = $this->input->post('desc',TRUE);
    $captcha_key = $this->input->post('captcha_key',TRUE);

    if ($this->form_validation->run()) {
      if ($this->session->userdata('captword')==$captcha_key) {
        $this->load->library('Auth_sess');
        $insert = array('email' =>$email,
                        'nama' =>$nama,
                        'telepon' =>$telepon,
                        'desc'  =>$desc,
                        'created_at'=>date('Y-m-d h:i:s'),
                        'ip_address' =>$this->auth_sess->getIpAddr()
                        );
        $this->db->insert("kontak",$insert);
        $json['alert']   = 'Berhasil Mengirim!';
      }else {
        $json['alert_capt'] = 1;
        $json['alert']   = 'Kode captcha salah!';
      }
      $json['success'] = true;
    }else{
      foreach ($_POST as $key => $value) {
        $json['alert'][$key] = form_error($key);
      }
    }
    echo json_encode($json);
  }
}

function captcha_json()
{
  $this->load->helper('captcha');
  $captcha = array('img_path' =>'./temp/captcha/' ,
                'img_url'  => base_url().'temp/captcha/',
                'expiration'=>7200,
                'word_lenght' =>5,
                'font_size' =>28,
                'img_height'    => 40,
                'img_width' =>280
                );
  $cap = create_captcha($captcha);
  $this->session->set_userdata('captword',$cap['word']);
  echo $cap['image'];
}

}
