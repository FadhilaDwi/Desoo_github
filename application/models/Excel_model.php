<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_model extends CI_Model {
  public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//all penduduk
	public function view()
	{
		$this->db->select('*');
		$this->db->from('penduduk');
		$this->db->order_by('id_penduduk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
}