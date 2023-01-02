<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$site 		= $this->konfigurasi_model->listing();
		$data = array(	'title'		=>	'Galeri',
						'keywords'	=>	$site->keywords,
						'deskripsi'	=>	$site->deskripsi,
						'site'		=>	$site,
						'isi'		=>	'galeri/list');

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */