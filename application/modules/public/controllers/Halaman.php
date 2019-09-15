<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('public');
    $this->load->model("Halaman_model","model");
  }

  function index($slug)
  {
    $where = array('slug' => $slug);
    $query = $this->model->get_data($where);
    if ($query->num_rows()>0) {
      $row = $query->row();
      $data = array( 'id_halaman'      =>$row->id_halaman ,
                     'halaman'          =>$row->halaman,
                     'slug'           =>$row->slug,
                     'desc'           =>$row->desc,
                     'image'          =>$row->image
                    );
      $this->template->set_title("$row->halaman");
      $this->template->set_tags("$row->halaman");
      $this->template->set_description(preg_replace('/[^A-Za-z0-9 !@#$%^&*().]/u','', strip_tags(substr($row->desc,0,200))));
      $this->template->view("halaman/index",array(),$data);
      }else {
      $this->template->set_title("ERROR 404 DATA TIDAK DITEMUKAN");
      $this->template->set_description("Halaman Tidak Di Temukan");
      $this->template->view("error/error404");
    }
  }

}
