<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('penduduk_model');
	}

	public function index()
	{
		$total_penduduk		= $this->penduduk_model->total_penduduk();
		$total_perempuan	= $this->penduduk_model->total_perempuan();
		$total_laki			= $this->penduduk_model->total_laki();
		$total_belumsekolah	= $this->penduduk_model->total_belumsekolah();
		$total_belumtamatsd	= $this->penduduk_model->total_bts();
		$total_tamatsd		= $this->penduduk_model->total_tamatsd();
		$total_sltp			= $this->penduduk_model->total_sltp();
		$total_slta			= $this->penduduk_model->total_slta();
		$total_d12			= $this->penduduk_model->total_d12();
		$total_d3			= $this->penduduk_model->total_d3();
		$total_s1			= $this->penduduk_model->total_s1();
		$total_s2			= $this->penduduk_model->total_d12();
		$total_belumkawin	= $this->penduduk_model->total_belumkawin();
		$total_kawin		= $this->penduduk_model->total_kawin();
		$total_ceraihidup	= $this->penduduk_model->total_ceraihidup();
		$total_ceraimati	= $this->penduduk_model->total_ceraimati();
		$total_islam	    = $this->penduduk_model->total_islam();
		$total_budha    	= $this->penduduk_model->total_budha();
		$total_khatolik 	= $this->penduduk_model->total_khatolik();
		
		$site 		= $this->konfigurasi_model->listing();
		$data = array(	
						'total_penduduk'	=>	$total_penduduk->total,
						'total_perempuan'	=>	$total_perempuan->total,
						'total_laki'		=>	$total_laki->total,
						'total_belumsekolah'=>	$total_belumsekolah->total,
						'total_belumtamatsd'=>	$total_belumtamatsd->total,
						'total_tamatsd'		=>	$total_tamatsd->total,
						'total_sltp'		=>	$total_sltp->total,
						'total_slta'		=>	$total_slta->total,
						'total_d12'			=>	$total_d12->total,
						'total_d3'			=>	$total_d3->total,
						'total_s1'			=>	$total_s1->total,
						'total_s2'			=>	$total_s2->total,
						'total_belumkawin'	=>	$total_belumkawin->total,
						'total_kawin'		=>	$total_kawin->total,
						'total_ceraihidup'	=>	$total_ceraihidup->total,
						'total_ceraimati'	=>	$total_ceraimati->total,
						'total_islam'   	=>	$total_islam->total,
						'total_budha'   	=>	$total_budha->total,
						'total_khatolik'   	=>	$total_khatolik->total,
						'title'				=>	'Statistik',
						'keywords'			=>	$site->keywords,
						'deskripsi'			=>	$site->deskripsi,
						'site'				=>	$site,
						'isi'				=>	'statistik/list');

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Statistik.php */
/* Location: ./application/controllers/Statistik.php */
