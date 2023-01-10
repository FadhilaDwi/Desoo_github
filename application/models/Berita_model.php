<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berita_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all berita
	public function listing()
	{
		$this->db->from('berita');
		//JOIN
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		//END JOIN
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing all home
	public function home()
	{
		$this->db->from('berita');
		//JOIN
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		//END JOIN
		$this->db->where('berita.status_berita', 'Tampilkan');
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	//read berita
	public function read($id_berita)
	{
		$this->db->from('berita');
		//JOIN
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		//END JOIN
		$this->db->where('berita.status_berita', 'Tampilkan');
		$this->db->where('berita.id_berita', $id_berita);
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//berita
	public function berita($limit=null,$start=null,$cari=null)
	{
		$this->db->from('berita');
		//JOIN
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		//END JOIN
		if ($cari!=null || $cari!='') {
			$this->db->like('berita.judul_berita', $cari);
		}
		$this->db->where('berita.status_berita', 'Tampilkan');
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//total berita
	public function total_berita()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('berita');
		$this->db->where('status_berita', 'Tampilkan');
		$query = $this->db->get();
		return $query->row();
	}

	//detail berita
	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita', $id_berita);
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah berita
	public function tambah($data)
	{
		$this->db->insert('berita', $data);
	}

	//hapus berita
	public function delete($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('berita',$data);
	}

	//edit berita
	public function edit($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('berita',$data);
	}
}

/* End of file berita_model.php */
/* Location: ./application/models/berita_model.php */
