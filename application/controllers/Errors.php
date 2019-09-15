<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function er404()
  {
    $this->layouts->set_title('Error 404 Not Found');
    $data['img'] = "404.png";
    $this->layouts->view("errors/html/errors",array(),$data);
  }

  function er403()
  {
    $this->layouts->set_title('Error 403 Not access permission');
    $data['img'] = "403.png";
    $this->layouts->view("errors/html/errors",array(),$data);
  }

}
