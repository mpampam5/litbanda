<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Security');
    $this->Security->getsecurity();
    $this->load->library(array("Cl","Layouts","form_validation","datatables"));
    $this->load->helper(array('menus','mpampam','security','file','form','enc'));
  }

  function error_404()
  {
    $this->layouts->set_title('Error 404 Not Found');
    $this->layouts->view(config_item("cpanel").'/404');
  }

function _cekfile($str,$name)
  {
    $allowed_mime_type_arr = array('application/pdf');
    $mime = get_mime_by_extension($_FILES['userfile']['name']);
    if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
        if(in_array($mime, $allowed_mime_type_arr)){
          if ($_FILES['userfile']['size']>5000000) {
            $this->form_validation->set_message('_cekfile', "Ukuran File Maximal 5mb ");
            return FALSE;
          }else {
            $config['upload_path']   = './file/uploads/pdf/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']      = 5024;
            $config['overwrite']     = TRUE;
            $config['file_name']     = $name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $this->form_validation->set_message('_cekfile', "Ukuran File maximal 5mb dan format file Pdf");
                return FALSE;
            }else {
                return TRUE;
            }
          }
        }else{
            $this->form_validation->set_message('_cekfile', 'format file harus Pdf.');
            return false;
        }
    }else{
      $this->form_validation->set_message('_cekfile', '%s Tidak Boleh Kosong');
      return false;
    }
  }

  function _cekfileedit($str,$name)
    {
      $allowed_mime_type_arr = array('application/pdf');
      $mime = get_mime_by_extension($_FILES['userfile']['name']);
      if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
          if(in_array($mime, $allowed_mime_type_arr)){
            if ($_FILES['userfile']['size']>5000000) {
              $this->form_validation->set_message('_cekfileedit', "Ukuran File Maximal 5mb ");
              return FALSE;
            }else {
              $config['upload_path']   = './file/uploads/pdf/';
              $config['allowed_types'] = 'pdf';
              $config['max_size']      = 5024;
              $config['overwrite']     = TRUE;
              $config['file_name']     = $name;
              $this->load->library('upload', $config);
              if (!$this->upload->do_upload('userfile')) {
                  $this->form_validation->set_message('_cekfileedit', "Ukuran File maximal 5mb dan format file Pdf");
                  return FALSE;
              }else {
                  return TRUE;
              }
            }
          }else{
              $this->form_validation->set_message('_cekfileedit', 'format file harus Pdf.');
              return false;
          }
      }else{
        return true;
      }
    }


}
