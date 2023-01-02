<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// TRANSAKSI PENGAJUAN SURAT
class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all transaksi
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing all transaksi berdasarkan header
	public function kode_transaksi($kode_transaksi)
	{
		$this->db->select(	'transaksi.*,
							surat.nama_surat,
							surat.kode_surat');
		$this->db->from('transaksi');
		//join dgn surat
		$this->db->join('surat', 'surat.id_surat = transaksi.id_surat', 'left');
		// end join
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail transaksi
	public function detail($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//detail read
	public function read($slug_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('slug_transaksi', $slug_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//login transaksi
	public function login($transaksiname,$password)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where(array(	'transaksiname'	=> $transaksiname,
								'password'	=> SHA1($password)));
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah transaksi
	public function tambah($data)
	{
		$this->db->insert('transaksi', $data);
	}

	//hapus transaksi
	public function delete($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('transaksi',$data);
	}

	//edit transaksi
	public function edit($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi',$data);
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */