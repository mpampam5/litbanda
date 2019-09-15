<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');



/* */
/* HARVIACODE CRUD GENERATOR MVC/HMVC AJAX CRUD */
/* PENGEMBANG : MPAMPAM */
/* EMAIL : MPAMPAM5@GMAIL.COM */
/* FACEBOOK : https://www.facebook.com/mpampam */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-07 16:49:22 */
/* http://harviacode.com */

 class Berita_model extends CI_Model{
  var $table = 'berita';
  var $id    = 'id_berita';

    // datatables
      function json() {
          $this->datatables->select('id_berita,judul,desc,image,berita.slug,hits,created_at,kategori');
          $this->datatables->from('berita');
          //add this line for join
          $this->datatables->join('kategori', 'berita.id_kategori = kategori.id_kategori','left');
          $this->datatables->add_column('action',
          // <a href="'.site_url(config_item("cpanel")."berita/detail/$1").'" id="detail" class="btn btn-sm btn-primary">detail</a>
          '
           <a href="'.site_url(config_item("cpanel")."berita/edit/$1").'" id="edit" class="btn btn-sm btn-warning">edit</a>
           <a href="'.site_url(config_item("cpanel")."berita/hapus/$1").'" id="hapus" class="btn btn-sm btn-danger">hapus</a>',
           'id_berita');
          return $this->datatables->generate();
      }

      function get_where_join($id) {
        return  $this->db->select('id_berita,judul,desc,image,berita.slug,hits,created_at,kategori,komentar')
                         ->from('berita')
                         ->join('kategori', 'berita.id_kategori = kategori.id_kategori','left')
                         ->where('id_berita',$id)
                         ->get()
                         ->row();
      }


     function get_data()
      {
        return $this->db->query("SELECT * FROM $this->table ORDER BY $this->id DESC");
      }


      function get_insert($data)
        {
          return $this->db->insert($this->table,$data);
        }


      function get_where($where)
        {
          return $this->db->where($this->id,$where)
                          ->get($this->table)
                          ->row();
        }


      function get_update($where,$data)
        {
          return $this->db
                ->where($this->id,$where)
                ->update($this->table,$data);
        }


      function get_delete($where)
        {
          return $this->db->where($this->id,$where)
                          ->delete($this->table);
        }

}
  /* End Model */