<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array("public"));
    $this->load->library("template");
  }

  function index()
  {
    $this->template->set_title('Balitbang Sulawesi Tenggara');
    $this->template->set_description('Selamat Datang Di Website Resmi Badan Penelitian Dan Pengembangan Prov.Sulawesi Tenggara');
    $this->template->view('home/index');
  }

}
