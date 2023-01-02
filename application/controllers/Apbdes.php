<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apbdes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('konfigurasi_model');
		$this->load->model('apbdes_model');
	}

	public function index()
	{
		$belanja = $this->apbdes_model->listing_belanja();
		$pendapatan = $this->apbdes_model->listing_pendapatan();
		$sum_belanja = $this->apbdes_model->sum_belanja();
		$sum_pendapatan = $this->apbdes_model->sum_pendapatan();
		$sisa_anggaran	= $sum_pendapatan - $sum_belanja;
		$site 		= $this->konfigurasi_model->listing();
		$data = array(	'title'				=> 'APBDes',
						'belanja'			=> $belanja,
						'pendapatan'		=> $pendapatan,
						'sum_belanja'		=> $sum_belanja,
						'sum_pendapatan'	=> $sum_pendapatan,
						'sisa_anggaran'		=> $sisa_anggaran,
						'keywords'			=>	$site->keywords,
						'deskripsi'			=>	$site->deskripsi,
						'site'				=>	$site,
						'isi'				=>	'apbdes/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Apbdes.php */
/* Location: ./application/controllers/Apbdes.php */