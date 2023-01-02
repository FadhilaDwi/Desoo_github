<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penduduk_model');
		$this->load->model('apbdes_model');
		$this->load->model('pengajuan_model');
		//Proteksi halaman admin dengan fungsi cek_login pada simple_login
		$this->simple_login->cek_login();
	}
	//Halaman utama dasbor
	public function index()
	{
		$total_pengajuan	= $this->pengajuan_model->total_pengajuan();
		$total_menunggu		= $this->pengajuan_model->total_menunggu();
		$total_diproses		= $this->pengajuan_model->total_diproses();
		$total_selesai		= $this->pengajuan_model->total_selesai();

		$total_penduduk		= $this->penduduk_model->total_penduduk();
		$total_perempuan	= $this->penduduk_model->total_perempuan();
		$total_laki			= $this->penduduk_model->total_laki();

		$sum_belanja 	= $this->apbdes_model->sum_belanja();
		$sum_pendapatan = $this->apbdes_model->sum_pendapatan();
		$sisa_anggaran	= $sum_pendapatan - $sum_belanja;

		$data = array(	'title'	=>	'Dashboard Administrator',
						'total_pengajuan'	=>	$total_pengajuan->total,
						'total_menunggu'	=>	$total_menunggu->total,
						'total_diproses'	=>	$total_diproses->total,
						'total_selesai'		=>	$total_selesai->total,
						'total_penduduk'	=>	$total_penduduk->total,
						'total_perempuan'	=>	$total_perempuan->total,
						'total_laki'		=>	$total_laki->total,
						'sum_belanja'		=> 	$sum_belanja,
						'sum_pendapatan'	=> 	$sum_pendapatan,
						'sisa_anggaran'		=> 	$sisa_anggaran,
						'isi'	=>	'admin/dashboard/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */