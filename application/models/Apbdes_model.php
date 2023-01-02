<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apbdes_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all apbdes
	public function listing()
	{
		$this->db->from('apbdes');
		$this->db->group_by('apbdes.id_anggaran');
		$this->db->order_by('id_anggaran', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_belanja()
	{
		$this->db->select('*');
		$this->db->from('apbdes');
		$this->db->where('jenis_anggaran', 'Belanja');
		$this->db->order_by('id_anggaran', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_pendapatan()
	{
		$this->db->select('*');
		$this->db->from('apbdes');
		$this->db->where('jenis_anggaran', 'Pendapatan');
		$this->db->order_by('id_anggaran', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function sum_belanja()
	{
		$this->db->select_sum('nominal');
		$this->db->where('jenis_anggaran', 'Belanja');
	   	$query = $this->db->get('apbdes');
	   	if($query->num_rows()>0)
	   	{
	    	return $query->row()->nominal;
	   	}
	   	else
	   	{
	    	return 0;
	   	}
	}

	public function sum_pendapatan()
	{
		$this->db->select_sum('nominal');
		$this->db->where('jenis_anggaran', 'Pendapatan');
	   	$query = $this->db->get('apbdes');
	   	if($query->num_rows()>0)
	   	{
	    	return $query->row()->nominal;
	   	}
	   	else
	   	{
	    	return 0;
	   	}
	}

	//detail apbdes
	public function detail($id_anggaran)
	{
		$this->db->select('*');
		$this->db->from('apbdes');
		$this->db->where('id_anggaran', $id_anggaran);
		$this->db->order_by('id_anggaran', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah apbdes
	public function tambah($data)
	{
		$this->db->insert('apbdes', $data);
	}

	//hapus apbdes
	public function delete($data)
	{
		$this->db->where('id_anggaran', $data['id_anggaran']);
		$this->db->delete('apbdes',$data);
	}

	//edit apbdes
	public function edit($data)
	{
		$this->db->where('id_anggaran', $data['id_anggaran']);
		$this->db->update('apbdes',$data);
	}
}

/* End of file Apbdes_model.php */
/* Location: ./application/models/Apbdes_model.php */