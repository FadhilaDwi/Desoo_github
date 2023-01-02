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
		$this->load->model('pengaduan_model');
		// halaman diproteksi dengan simple_penduduk cek_login
		$this->simple_penduduk->cek_login();
	}

	//halaman dashboard
	public function index()
	{
		//ambil data login penduduk
		$id_penduduk 	= $this->session->userdata('id_penduduk');
		$pengajuan 		= $this->pengajuan_model->penduduk($id_penduduk);
		$data = array(	'title'		=> 	'Halaman Dashboard Penduduk',
		'pengajuan'	=> 	$pengajuan,
		'isi'		=>	'dashboard/list'
	);
	$this->load->view('layout/wrapper', $data, FALSE);
}

//Riwayat pengajuan
public function pengajuan()
{
	//ambil data login penduduk
	$id_penduduk 	= $this->session->userdata('id_penduduk');
	$pengajuan 		= $this->pengajuan_model->penduduk($id_penduduk);

	$data = array(	'title'		=>	'Riwayat Pengajuan',
	'pengajuan'	=> 	$pengajuan,
	'isi'		=> 	'dashboard/pengajuan'
);
$this->load->view('layout/wrapper', $data, FALSE);
}

//dashboard detail
public function detail($kode_transaksi)
{
	//ambil data login penduduk
	$id_penduduk 		= $this->session->userdata('id_penduduk');
	$pengajuan 	= $this->pengajuan_model->kode_transaksi($kode_transaksi);
	$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);

	//pastikan penduduk hanya mengakses data transaksinya
	if($pengajuan->id_penduduk != $id_penduduk) {
		$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
		redirect(base_url('masuk'));
	}

	$data = array(	'title'		=>	'Riwayat Pengajuan',
	'pengajuan'	=>	$pengajuan,
	'transaksi'	=> 	$transaksi,
	'isi'		=> 	'dashboard/detail'
	);
	$this->load->view('layout/wrapper', $data, FALSE);
}

//Profil Dashboard
public function profil()
{
	//ambil data login penduduk
	$id_penduduk 		= $this->session->userdata('id_penduduk');
	$penduduk 			= $this->penduduk_model->detail($id_penduduk);

	//validasi input
	$valid = $this->form_validation;

	$valid->set_rules('nama_penduduk','Nama lengkap','required',
	array(	'required'		=> '%s harus diisi'));

	$valid->set_rules('alamat','Alamat Lengkap','required',
	array(	'required'		=> '%s harus diisi'));

	$valid->set_rules('telepon','Nomor Telepon','required',
	array(	'required'		=> '%s harus diisi'));

	if($valid->run()===FALSE) {
		//end validasi

		$data = array(	'title'				=>	'Profil Saya',
		'penduduk'			=> 	$penduduk,
		'isi'				=> 	'dashboard/profil'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
		//masuk database
	}
	else{
		$i = $this->input;
		//kalau passwordnya lebih dari 8, maka password diganti
		if(strlen($i->post('password'))>8) {
			$data = array(	'id_penduduk'		=> $id_penduduk,
			'nama_penduduk'	=> $i->post('nama_penduduk'),
			'password'			=> $i->post('password'),
			'alamat'			=> $i->post('alamat')
			);
		}
		else {
			//kalau pass kurang dari 8 maka tidak di ganti (pass)
			$data = array(	'id_penduduk'		=> $id_penduduk,
			'nama_penduduk'	    => $i->post('nama_penduduk'),
			'alamat'			=> $i->post('alamat')
			);
		}
		//end data update
		$this->penduduk_model->edit($data);
		$this->session->set_flashdata('sukses', 'Update Profil Berhasil');
		$this->simple_penduduk->logout_update();
	}
	//end masuk database
}

public function berkas()
{
	//ambil data login penduduk
	$id_penduduk 		= $this->session->userdata('id_penduduk');
	$penduduk 			= $this->penduduk_model->detail($id_penduduk);
	$berkas 			= $this->penduduk_model->berkas($id_penduduk);

	$data = array(	'title'				=>	'Berkas Saya',
	'penduduk'			=> 	$penduduk,
	'berkas'			=> $berkas,
	'isi'				=> 	'dashboard/berkas'
	);
	$this->load->view('layout/wrapper', $data, FALSE);
}

public function pengaduan()
{
	$id_penduduk = $this->session->userdata('id_penduduk');
	$pengaduan 	= $this->pengaduan_model->get_pengaduan($id_penduduk)->result();

	$data = array(
	'title'			=> 	'Halaman Pengaduan Penduduk',
	'pengaduan'	=> $pengaduan,
	'isi'				=>	'dashboard/pengaduan'
	);
	$this->load->view('layout/wrapper', $data, FALSE);
}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
