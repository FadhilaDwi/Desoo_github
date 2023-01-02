<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemdes_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all pemdes
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pemdes');
		$this->db->order_by('id_pemdes', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail pemdes
	public function detail($id_pemdes)
	{
		$this->db->select('*');
		$this->db->from('pemdes');
		$this->db->where('id_pemdes', $id_pemdes);
		$this->db->order_by('id_pemdes', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//pemdes
	public function pemdes($limit,$start)
	{
		$this->db->from('pemdes');
		$this->db->group_by('pemdes.id_pemdes');
		$this->db->order_by('id_pemdes', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//total pemdes
	public function total_pemdes()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pemdes');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah pemdes
	public function tambah($data)
	{
		$this->db->insert('pemdes', $data);
	}

	//hapus pemdes
	public function delete($data)
	{
		$this->db->where('id_pemdes', $data['id_pemdes']);
		$this->db->delete('pemdes',$data);
	}

	//edit pemdes
	public function edit($data)
	{
		$this->db->where('id_pemdes', $data['id_pemdes']);
		$this->db->update('pemdes',$data);
	}

}

/* End of file Pemdes_model.php */
/* Location: ./application/models/Pemdes_model.php */