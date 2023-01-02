<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	//detail konfigurasi
	public function detail($id_konfigurasi)
	{
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->where('id_konfigurasi', $id_konfigurasi);
		$this->db->order_by('id_konfigurasi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//Edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}
}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */