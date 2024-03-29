<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/* Jaskip.php */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Location: ./application/controllers/Jaskip.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-30 15:34:34 */
/* http://harviacode.com */

 class Jaskip extends MY_Controller{
  function __construct(){
      parent::__construct();
      $this->load->model('Jaskip_model','model');
      $this->load->library("Cl");
      if ($this->cl->acl("jaskip")==false) {
        redirect("errors/er403");
      }
  }

 function _rules(){
		$this->form_validation->set_rules('Judul_jaskip', 'judul', 'trim|xss_clean|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

 function index(){
    $this->layouts->set_title('Jasakip');
    $this->layouts->view('administrator/content/jaskip/index');
  }

function json() {
    header('Content-Type: application/json');
    echo $this->model->json();
}


 function detail($id){
    if($row=$this->model->get_where($id)){
      $this->layouts->set_title('Jasakip');
        $data=array('layout_title' => 'Jasakip',
										'id_jaskip' => $row->id_jaskip,
										'Judul_jaskip' => $row->Judul_jaskip,
										'keterangan' => $row->keterangan,
										'file' => $row->file,
										'created_at' => $row->created_at,
									);
				 $this->layouts->view('administrator/content/jaskip/detail',array(),$data);
//MODAL DETAIL
//$this->layouts->view('administrator/content/jaskip/detail',array(),$data,false);
    }else {
        $this->error_404();
    }
  }

 function tambah($status=''){
    if ($status=='aksi') {
        $json = array('success'=>false ,'alert'=>array());
        if ($this->input->is_ajax_request()) {
          if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
              $file_name = substr($_FILES['userfile']['name'],-4);
              $file = $this->input->post('userfile',true)."".$file_name;
            }else {
              $file = null;
            }
            $this->form_validation->set_rules('userfile', 'File', 'trim|xss_clean|callback__cekfile['.$file.']');
            $this->_rules();
            if ($this->form_validation->run()) {
                $insert = array(
																'Judul_jaskip' => $this->input->post('Judul_jaskip',TRUE),
																'keterangan' => $this->input->post('keterangan',TRUE),
																'file' => $file,
																'created_at' => date('Y-m-d'),
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
      $this->layouts->set_title('Jasakip');
      $data = array('layout_title' => 'Jasakip',
                      'button'=>'tambah',
                      'aksi' =>site_url('administrator/jaskip/tambah/aksi'),
											'id_jaskip' => set_value('id_jaskip'),
											'Judul_jaskip' => set_value('Judul_jaskip'),
											'keterangan' => set_value('keterangan'),
											'userfile' => set_value('userfile',"jasakip-".date('dmYhis')),
											);
			 $this->layouts->view('administrator/content/jaskip/form',array(),$data);
  //MODAL TAMBAH
  //$this->layouts->view('administrator/content/jaskip/form',array(),$data,false);
     }
  }

 function edit($id,$status=''){
      if ($status=='aksi') {
          $json = array('success'=>false ,'alert'=>array());
          if ($this->input->is_ajax_request()) {
            if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
                if ($this->input->post('userfile',true)=="") {
                  $file_name = substr($_FILES['userfile']['name'],-4);
                  $file= "jasakip-".date('dmYhis')."".$file_name;
                }else {
                  $file = $this->input->post('userfile',true);
                }
              }else {
                $file = $this->input->post('userfile',true);
              }
                $this->form_validation->set_rules('userfile', 'foto', 'trim|xss_clean|callback__cekfileedit['.$file.']');
              $this->_rules();
              if ($this->form_validation->run()) {
                  $update = array(
																'Judul_jaskip' => $this->input->post('Judul_jaskip',TRUE),
																'keterangan' => $this->input->post('keterangan',TRUE),
																'file' => $file
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
        $this->layouts->set_title('Jasakip');
        $data = array('layout_title' => 'Jasakip',
                      'button'=>'edit',
                      'aksi' =>site_url('administrator/jaskip/edit/'.$id.'/aksi'),
											'id_jaskip' => set_value('id_jaskip', $row->id_jaskip),
											'Judul_jaskip' => set_value('Judul_jaskip', $row->Judul_jaskip),
											'keterangan' => set_value('keterangan', $row->keterangan),
											'userfile' => set_value('userfile', $row->file),
											);
			 $this->layouts->view('administrator/content/jaskip/form',array(),$data);
  //MODAL EDIT
  //$this->layouts->view('administrator/content/jaskip/form',array(),$data,false);
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
