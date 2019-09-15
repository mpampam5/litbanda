<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Model{
  function getsecurity()
  {
    if ($this->session->userdata('login')!=true) {
        $this->session->sess_destroy();
        redirect(config_item('auth'),'refresh');
    }
  }

}
