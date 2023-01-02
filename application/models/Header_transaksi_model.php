<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all header_transaksi
	public function listing()
	{
		$this->db->from('header_transaksi');
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('penduduk', 'penduduk.id_penduduk = header_transaksi.id_penduduk', 'left');
		//end join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing all header_transaksi dari penduduk
	public function penduduk($id_penduduk)
	{
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.id_penduduk', $id_penduduk);
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		//end join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail kode header_transaksi
	public function kode_transaksi($kode_transaksi)
	{
		$this->db->from('header_transaksi');
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('penduduk', 'penduduk.id_penduduk = header_transaksi.id_penduduk', 'left');
		//end join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//detail header_transaksi
	public function detail($id_header_transaksi)
	{
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('id_header_transaksi', $id_header_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah header_transaksi
	public function tambah($data)
	{
		$this->db->insert('header_transaksi', $data);
	}

	//hapus header_transaksi
	public function delete($data)
	{
		$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
		$this->db->delete('header_transaksi',$data);
	}

	//edit header_transaksi
	public function edit($data)
	{
		$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
		$this->db->update('header_transaksi',$data);
	}
}

/* End of file Header_transaksi_model.php */
/* Location: ./application/models/Header_transaksi_model.php */