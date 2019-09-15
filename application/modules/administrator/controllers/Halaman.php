<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/* Halaman.php */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Location: ./application/controllers/Halaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-11 12:09:51 */
/* http://harviacode.com */

 class Halaman extends MY_Controller{
  function __construct(){
      parent::__construct();
      $this->load->model('Halaman_model','model');
      if ($this->cl->acl("halaman")==false) {
        redirect("errors/er403");
      }
  }

 function _rules(){
		$this->form_validation->set_rules('halaman', 'halaman', 'trim|xss_clean|required');
		$this->form_validation->set_rules('desc', 'desc', 'trim|xss_clean|required');
    $this->form_validation->set_rules('seotitle', 'Title Seo', 'trim|xss_clean|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

 function index(){
    $this->layouts->set_title('Halaman');
    $this->layouts->view(config_item("cpanel").'content/halaman/index');
  }

function json() {
    header('Content-Type: application/json');
    echo $this->model->json();
}


 function detail($id){
    if($row=$this->model->get_where($id)){
      $this->layouts->set_title('Halaman');
        $data=array('layout_title' => 'Halaman',
										'id_halaman' => $row->id_halaman,
										'halaman' => $row->halaman,
										'desc' => $row->desc,
										'image' => $row->image,
										'slug' => $row->slug,
										'created_by' => $row->created_by,
										'created_at' => $row->created_at,
										'update_by' => $row->update_by,
										'update_at' => $row->update_at,
									);
				 $this->layouts->view(config_item("cpanel").'content/halaman/detail',array(),$data);
//MODAL DETAIL
//$this->layouts->view(config_item("cpanel").'content/halaman/detail',array(),$data,false);
    }else {
        $this->error_404();
    }
  }

 function tambah($status=''){
    if ($status=='aksi') {
        $json = array('success'=>false ,'alert'=>array());
        if ($this->input->is_ajax_request()) {
            $this->_rules();
            if ($this->form_validation->run()) {
                $insert = array(
																'halaman' => $this->input->post('halaman',TRUE),
																'desc' => $this->input->post('desc',TRUE),
																'image' => $this->input->post('image',TRUE),
																'slug' => slug($this->input->post('seotitle',TRUE)),
                                'created_by' => sess('id_auth'),
																'created_at' => date('Y-m-d h:i:s'),
															);
                $this->model->get_insert($insert);
                $json['alert']   = 'Berhasil Menyimpan!';
                $json['success'] = true;
            }else{
                foreach ($_POST as $key => $value) {
                  $json['alert'][$key] = form_error($key);
                }
            }
            echo json_encode($json);
        }
    }else{
      $this->layouts->set_title('Halaman');
      $data = array('layout_title' => 'Halaman',
                      'button'=>'tambah',
                      'aksi' =>site_url(config_item("cpanel").'halaman/tambah/aksi'),
											'id_halaman' => set_value('id_halaman'),
											'halaman' => set_value('halaman'),
											'desc' => set_value('desc'),
                      'image' => set_value('image'),
                      'slug' =>set_value('slug')
											);
			 $this->layouts->view(config_item("cpanel").'content/halaman/form',array(),$data);
  //MODAL TAMBAH
  //$this->layouts->view(config_item("cpanel").'content/halaman/form',array(),$data,false);
     }
  }

 function edit($id,$status=''){
      if ($status=='aksi') {
          $json = array('success'=>false ,'alert'=>array());
          if ($this->input->is_ajax_request()) {
              $this->_rules();
              if ($this->form_validation->run()) {
                  $update = array(
																'halaman' => $this->input->post('halaman',TRUE),
																'desc' => $this->input->post('desc',TRUE),
																'image' => $this->input->post('image',TRUE),
																'slug' => slug($this->input->post('seotitle',TRUE)),
                                'update_by' => sess('id_auth'),
																'update_at' => date('Y-m-d h:i:s'),
															);
                $this->model->get_update($id,$update);
                $json['alert']   = 'Berhasil Mengedit!';
                $json['success'] = true;
            }else{
                foreach ($_POST as $key => $value) {
                  $json['alert'][$key] = form_error($key);
                }
            }
            echo json_encode($json);
        }
    }else{
      if($row=$this->model->get_where($id)){
        $this->layouts->set_title('Halaman');
        $data = array('layout_title' => 'Halaman',
                      'button'=>'edit',
                      'aksi' =>site_url(config_item("cpanel").'halaman/edit/'.$id.'/aksi'),
											'id_halaman' => set_value('id_halaman', $row->id_halaman),
											'halaman' => set_value('halaman', $row->halaman),
											'desc' => set_value('desc', $row->desc),
                      'image' => set_value('image',$row->image),
                      'slug' =>set_value('slug',$row->slug)
											);
			 $this->layouts->view(config_item("cpanel").'content/halaman/form',array(),$data);
  //MODAL EDIT
  //$this->layouts->view(config_item("cpanel").'content/halaman/form',array(),$data,false);
			}else{
      $this->error_404();
    }
  }
}

 function hapus($id){
  if ($this->input->is_ajax_request()) {
      $this->model->get_delete($id);
      $data['alert'] = 'Berhasil menghapus!';
      echo json_encode($data);
    }
}

}
/* End Controller */
