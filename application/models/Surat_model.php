<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class surat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all surat
	public function listing()
	{
		$this->db->from('surat');
		//JOIN
		$this->db->join('users', 'users.id_user = surat.id_user', 'left');
		//END JOIN
		$this->db->group_by('surat.id_surat');
		$this->db->order_by('id_surat', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing all home
	public function home()
	{
		$this->db->from('surat');
		//JOIN
		$this->db->join('users', 'users.id_user = surat.id_user', 'left');
		//END JOIN
		$this->db->where('surat.status_surat', 'Tampilkan');
		$this->db->group_by('surat.id_surat');
		$this->db->order_by('id_surat', 'desc');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	//read surat
	public function read($slug_surat)
	{
		$this->db->from('surat');
		//JOIN
		$this->db->join('users', 'users.id_user = surat.id_user', 'left');
		//END JOIN
		$this->db->where('surat.status_surat', 'Tampilkan');
		$this->db->where('surat.slug_surat', $slug_surat);
		$this->db->group_by('surat.id_surat');
		$this->db->order_by('id_surat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//surat
	public function surat($cari=null,$limit=null,$start=null)
	{
		$this->db->from('surat');
		//JOIN
		$this->db->join('users', 'users.id_user = surat.id_user', 'left');
		//END JOIN
		if ($cari!=null||$cari!='') {
			$this->db->like('surat.nama_surat', $cari);
		}
		$this->db->where('surat.status_surat', 'Tampilkan');
		$this->db->group_by('surat.id_surat');
		$this->db->order_by('id_surat', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//total surat
	public function total_surat()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('surat');
		$this->db->where('status_surat', 'Tampilkan');
		$query = $this->db->get();
		return $query->row();
	}

	//detail surat
	public function detail($slug_surat)
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('slug_surat', $slug_surat);
		$this->db->order_by('slug_surat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah surat
	public function tambah($data)
	{
		$this->db->insert('surat', $data);
	}

	//hapus surat
	public function delete($data)
	{
		$this->db->where('id_surat', $data['id_surat']);
		$this->db->delete('surat',$data);
	}

	//edit surat
	public function edit($data)
	{
		$this->db->where('id_surat', $data['id_surat']);
		$this->db->update('surat',$data);
	}
}

/* End of file surat_model.php */
/* Location: ./application/models/surat_model.php */
