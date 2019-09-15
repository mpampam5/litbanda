<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Litbang extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Template');
    $this->load->helper('public','download');
    $this->load->model("litbang_model","model");
  }

  function index()
  {
    $this->template->set_title('Penelitian');
    $this->template->set_tags('Penelitian');
    $this->template->set_description('Selamat Datang Di Website Resmi Badan Penelitian Dan Pengembangan Prov.Sulawesi Tenggara');
    $this->template->view('litbang/index');
  }

  function paging()
  {
    if ($this->input->is_ajax_request()) {
      $this->load->library("pagination");
      $config = array();
      // $config[""] = "";
      $config["base_url"] = "#";
      $config["total_rows"] = $this->model->count_all();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;
      $config["use_page_numbers"] = true;
      $config['full_tag_open'] = '<nav aria-label="Page navigation "><ul class="pagination">';
      $config['full_tag_close'] = '</ul></nav>';



      $config['cur_tag_open'] = '<li class="active page-item"><a class="">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</li>';
      $config["num_links"] = 1;

      $this->pagination->initialize($config);
      $page = $this->uri->segment(3);
      $start = ($page - 1) * $config["per_page"];

      $output = array(  'pagination' => $this->pagination->create_links(),
                        'load_data_news' => $this->model->fetch_details($config['per_page'],$start)
                      );
      echo json_encode($output);
    }else {
    $this->template->set_title("ERROR 404 ");
    $this->template->set_deskripsiription("Halaman Tidak Di Temukan");
    $this->template->view("error/error404");
    }
  }


  function detail($id,$slug)
{
  $where = array( 'id_litbang' => $id,
                  'slug'=> $slug
                );
  $query = $this->model->get_data($where);
  if ($query->num_rows()>0) {
    $row = $query->row();
    $data = array( 'id_litbang'      =>$row->id_litbang,
                   'judul'         =>$row->judul,
                   'penyusun'           =>$row->penyusun,
                   'deskripsi'           =>$row->deskripsi,
                   'file'           =>$row->file
                  );
    $this->template->set_title("Penelitian - $row->judul");
    $this->template->set_tags('Penelitian');
    $this->template->set_description(preg_replace('/[^A-Za-z0-9 !@#$%^&*().]/u','', strip_tags(substr($row->deskripsi,0,200))));
    $this->template->view("litbang/detail",array(),$data);
    }else {
    $this->template->set_title("ERROR 404 DATA TIDAK DITEMUKAN");
    $this->template->set_description("Halaman Tidak Di Temukan");
    $this->template->view("error/error404");
  }
}

public function download($file){
  $this->load->helper('download');
  $path = "./file/uploads/pdf/$file";
  if (file_exists($path)) {
      force_download("$path",NULL);
  }else {
      echo "<script>alert('File tidak ditemukan')</script>";
  }
	}

}
