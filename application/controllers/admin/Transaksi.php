<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// TRANSAKSI PENGAJUAN SURAT
class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('penduduk_model');
		$this->load->model('surat_model');
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pengajuan_model');
	}

	//load data transaksi
	public function index()
	{
		$header_transaksi 	= $this->header_transaksi_model->listing();

		$data 		= array(	'title'				=> 'Data Transaksi',
								'header_transaksi'	=> $header_transaksi,
								'isi'				=> 'admin/transaksi/list'
							);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//detail
	public function detail($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title'				=>	'Detail Transaksi',
						'header_transaksi'	=> 	$header_transaksi,
						'transaksi'			=> 	$transaksi,
						'isi'				=> 	'admin/transaksi/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//detail
	public function status($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title'				=>	'Status Transaksi',
						'header_transaksi'	=> 	$header_transaksi,
						'transaksi'			=> 	$transaksi,
						'isi'				=> 	'admin/transaksi/status'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// //cetak
	// public function cetak($kode_transaksi)
	// {
	// 	$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
	// 	$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
	// 	$site 				= $this->konfigurasi_model->listing();

	// 	$data = array(	'title'				=>	'Cetak Transaksi',
	// 					'header_transaksi'	=> 	$header_transaksi,
	// 					'transaksi'			=> 	$transaksi,
	// 					'site' 				=> 	$site
	// 				);
	// 	$this->load->view('admin/transaksi/cetak', $data, FALSE);
	// }

	//Unduh PDF
	public function pdf($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title'				=>	'Cetak Invoice PDF',
						'header_transaksi'	=> 	$header_transaksi,
						'transaksi'			=> 	$transaksi,
						'site' 				=> 	$site
					);
		//$this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/cetak', $data, TRUE);
		// Create an instance of the class:
		$mpdf = new \Mpdf\Mpdf();
		//setting header footer
		$mpdf->SetHTMLHeader('
		<h1 style="padding-top: -20px; text-align: center; font-weight: bold;">
	    	<img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height:70px; width: auto;">
	    </h1>
	    <h1 style="padding-top: -10px; text-align: center; font-weight: bold;"> '.$site->namaweb.' ('.$site->alamat.') </h2>
	    ');

		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; background-color: black; color: white;
				font-size: 12px;">
				Alamat 	: '.$site->namaweb.' ('.$site->alamat.')<br>
				telepon : '.$site->telepon.'
			</div>
		');
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		//kasih nama
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
		// Output a PDF file directly to the browser
		$mpdf->Output($nama_file_pdf,'I');;
	}

	//Unduh prngiriman
	public function kirim($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();

		$data = array(	'title'				=>	'Cetak pengiriman',
						'header_transaksi'	=> 	$header_transaksi,
						'transaksi'			=> 	$transaksi,
						'site' 				=> 	$site
					);
		//$this->load->view('admin/transaksi/kirim', $data, FALSE);
		$html = $this->load->view('admin/transaksi/kirim', $data, TRUE);
		// Create an instance of the class:
		$mpdf = new \Mpdf\Mpdf();
		//setting header
		$mpdf->SetHTMLHeader('
		<div style="text-align: center; font-weight: bold;">
		    <img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height:40px; width: auto;">
		</div>');
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		//kasih nama
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
		// Output a PDF file directly to the browser
		$mpdf->Output($nama_file_pdf,'I');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */