<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemdes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('pemdes_model');
	}

	public function index()
	{
		$site 		= $this->konfigurasi_model->listing();
		$pemdes 	= $this->pemdes_model->listing();
		$data = array(	'title'		=>	'Pemerintahan',
						'keywords'	=>	$site->keywords,
						'deskripsi'	=>	$site->deskripsi,
						'site'		=>	$site,
						'pemdes'	=>	$pemdes,
						'isi'		=>	'pemdes/list');

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//detail pemdes dan pengajuan
	public function detail($id_pemdes)
	{
		$site 		= $this->konfigurasi_model->listing();
		$pemdes 	= $this->pemdes_model->detail($id_pemdes);
		$id_pemdes	= $pemdes->id_pemdes;
		$data 	= array('title'		=> $pemdes->nama_pemdes,
						'pemdes'	=> $pemdes,
						'keywords'	=>	$site->keywords,
						'deskripsi'	=>	$site->deskripsi,
						'site'		=>	$site,
						'isi'		=> 'pemdes/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Pemerintahan.php */
/* Location: ./application/controllers/Pemerintahan.php */