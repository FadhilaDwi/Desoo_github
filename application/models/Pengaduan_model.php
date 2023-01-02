<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_pengaduan($id_penduduk=null) //ini merupakan function untuk menapatkan data riwayat pengaduan penduduk pada menu(riwayat pengaduan) dan sekaligus menjadi function untuk (list pengaduan di admin)
  {
    $this->db->join('penduduk','penduduk.id_penduduk=pengaduan.penduduk_id_penduduk');
    if ($id_penduduk!=null || $id_penduduk!='') {
      $this->db->where('pengaduan.penduduk_id_penduduk',$id_penduduk);
    }
    $this->db->order_by('idpengaduan', 'desc');
    return $this->db->get('pengaduan');
  }

  public function tambah($data)
  {
    return $this->db->insert('pengaduan',$data);
  }

  public function update_status($idpengaduan,$data)
  {
    $this->db->where('idpengaduan',$idpengaduan);
    return $this->db->update('pengaduan',$data);
  }

}
