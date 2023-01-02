<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	//listing all pengajuan
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pengajuan');
		$this->db->order_by('id_pengajuan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail pengajuan
	public function detail($id_pengajuan)
	{
		$this->db->select('*');
		$this->db->from('pengajuan');
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->order_by('id_pengajuan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//listing all pengajuan dari penduduk
	public function penduduk($id_penduduk)
	{
		$this->db->from('pengajuan');
		$this->db->where('pengajuan.id_penduduk', $id_penduduk);
		//join
		// $this->db->join('transaksi', 'transaksi.kode_transaksi = pengajuan.kode_transaksi', 'left');
		//end join
		$this->db->group_by('pengajuan.id_pengajuan');
		$this->db->order_by('id_pengajuan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//tambah pengajuan
	public function tambah($data)
	{
		$this->db->insert('pengajuan', $data);
	}

	//hapus pengajuan
	public function delete($data)
	{
		$this->db->where('id_pengajuan', $data['id_pengajuan']);
		$this->db->delete('pengajuan',$data);
	}

	//edit pengajuan
	public function edit($data)
	{
		$this->db->where('id_pengajuan', $data['id_pengajuan']);
		$this->db->update('pengajuan',$data);
	}

	//Nomor Surat
	public function nomor_surat()
	{
		$this->db->select('*');
		$this->db->from('nomor_surat');
		$query = $this->db->get();
		return $query->row();
	}

	//Update Nomor Urut Surat
	public function update_nomor($nomor)
	{
		$data = array(
			        'nomor'  =>$nomor
				);
		$this->db->update('nomor_surat',$data);
	}

	// ------------------------------------Stats Pengajuan-------------------------//
	//total Pengajuan
	public function total_pengajuan()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pengajuan');
		// $this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

	//total Pengajuan Menunggu
	public function total_menunggu()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pengajuan');
		$this->db->where('status', 'Menunggu');
		$query = $this->db->get();
		return $query->row();
	}

	//total Pengajuan Diproses
	public function total_diproses()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pengajuan');
		$this->db->where('status', 'Diproses');
		$query = $this->db->get();
		return $query->row();
	}

	//total Pengajuan Selesai
	public function total_selesai()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pengajuan');
		$this->db->where('status', 'Selesai');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Pengajuan_model.php */
/* Location: ./application/models/Pengajuan_model.php */
