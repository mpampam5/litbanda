<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/* Kontak.php */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Location: ./application/controllers/Kontak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-23 23:40:05 */
/* http://harviacode.com */

 class Kontak extends MY_Controller{
  function __construct(){
      parent::__construct();
      $this->load->model('Kontak_model','model');
      if ($this->cl->acl("kontak")==false) {
        redirect("errors/er403");
      }
  }

 function _rules(){
		$this->form_validation->set_rules('id_kontak', 'id_kontak', 'trim');
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|required');
		$this->form_validation->set_rules('desc', 'desc', 'trim|xss_clean|required');
		$this->form_validation->set_rules('read', 'read', 'trim|xss_clean|required');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|xss_clean|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

 function index(){
    $this->layouts->set_title('Kontak');
    $this->layouts->view(config_item("cpanel").'content/kontak/index');
  }

function json() {
    header('Content-Type: application/json');
    echo $this->model->json();
}


 function detail($id){
    if($row=$this->model->get_where($id)){
      $this->model->get_update($id,array('read'=>"1"));
      $this->layouts->set_title('Kontak');
        $data=array('layout_title' => 'Kontak',
										'id_kontak' => $row->id_kontak,
										'email' => $row->email,
                    'nama' => $row->nama,
                    'telepon' => $row->telepon,
										'desc' => $row->desc,
										'read' => $row->read,
										'created_at' => $row->created_at,
									);
				 // $this->layouts->view(config_item("cpanel").'content/kontak/detail',array(),$data);
//MODAL DETAIL
$this->layouts->view(config_item("cpanel").'content/kontak/detail',array(),$data,false);
    }else {
        $this->error_404();
    }
  }

 // function tambah($status=''){
 //    if ($status=='aksi') {
 //        $json = array('success'=>false ,'alert'=>array());
 //        if ($this->input->is_ajax_request()) {
 //            $this->_rules();
 //            if ($this->form_validation->run()) {
 //                $insert = array(
	// 															'email' => $this->input->post('email',TRUE),
	// 															'desc' => $this->input->post('desc',TRUE),
	// 															'read' => $this->input->post('read',TRUE),
	// 															'created_at' => $this->input->post('created_at',TRUE),
	// 														);
 //                $this->model->get_insert($insert);
 //                $json['alert']   = 'Berhasil Menyimpan!';
 //                $json['success'] = true;
 //            }else{
 //                foreach ($_POST as $key => $value) {
 //                  $json['alert'][$key] = form_error($key);
 //                }
 //            }
 //            echo json_encode($json);
 //        }
 //    }else{
 //      $this->layouts->set_title('Kontak');
 //      $data = array('layout_title' => 'Kontak',
 //                      'button'=>'tambah',
 //                      'aksi' =>site_url(config_item("cpanel").'kontak/tambah/aksi'),
	// 										'id_kontak' => set_value('id_kontak'),
	// 										'email' => set_value('email'),
	// 										'desc' => set_value('desc'),
	// 										'read' => set_value('read'),
	// 										'created_at' => set_value('created_at'),
	// 										);
	// 		 $this->layouts->view(config_item("cpanel").'content/kontak/form',array(),$data);
 //  //MODAL TAMBAH
 //  //$this->layouts->view(config_item("cpanel").'content/kontak/form',array(),$data,false);
 //     }
 //  }

//  function edit($id,$status=''){
//       if ($status=='aksi') {
//           $json = array('success'=>false ,'alert'=>array());
//           if ($this->input->is_ajax_request()) {
//               $this->_rules();
//               if ($this->form_validation->run()) {
//                   $update = array(
// 																'email' => $this->input->post('email',TRUE),
// 																'desc' => $this->input->post('desc',TRUE),
// 																'read' => $this->input->post('read',TRUE),
// 																'created_at' => $this->input->post('created_at',TRUE),
// 															);
//                 $this->model->get_update($id,$update);
//                 $json['alert']   = 'Berhasil Mengedit!';
//                 $json['success'] = true;
//             }else{
//                 foreach ($_POST as $key => $value) {
//                   $json['alert'][$key] = form_error($key);
//                 }
//             }
//             echo json_encode($json);
//         }
//     }else{
//       if($row=$this->model->get_where($id)){
//         $this->layouts->set_title('Kontak');
//         $data = array('layout_title' => 'Kontak',
//                       'button'=>'edit',
//                       'aksi' =>site_url(config_item("cpanel").'kontak/edit/'.$id.'/aksi'),
// 											'id_kontak' => set_value('id_kontak', $row->id_kontak),
// 											'email' => set_value('email', $row->email),
// 											'desc' => set_value('desc', $row->desc),
// 											'read' => set_value('read', $row->read),
// 											'created_at' => set_value('created_at', $row->created_at),
// 											);
// 			 $this->layouts->view(config_item("cpanel").'content/kontak/form',array(),$data);
//   //MODAL EDIT
//   //$this->layouts->view(config_item("cpanel").'content/kontak/form',array(),$data,false);
// 			}else{
//       $this->error_404();
//     }
//   }
// }

 function hapus($id){
  if ($this->input->is_ajax_request()) {
      $this->model->get_delete($id);
      $data['alert'] = 'Berhasil menghapus!';
      echo json_encode($data);
    }
}

}
/* End Controller */
