<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penduduk_model');
	}

	//halaman registrasi
	public function index()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_penduduk','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'));
		$valid->set_rules('email','Email','required|valid_email|is_unique[penduduk.email]',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid',
					'is_unique'		=> '%s sudah terdaftar'));
		$valid->set_rules('password','Password','required|min_length[8]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 8 karakter'));
		if($valid->run()===FALSE) {
		//end validasi
		$data = array(	'title'		=> 'Registrasi penduduk',
						'isi'		=>	'registrasi/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		//masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'status_penduduk'	=> 'Pending',
							'nama_penduduk'	=> $i->post('nama_penduduk'),
							'email'				=> $i->post('email'),
							'password'			=> $i->post('password'),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat'),
							'tanggal_daftar'	=> date('Y-m-d H:i:s')
						);
			$this->penduduk_model->tambah($data);
			//create sessaion login penduduk
			$this->session->set_userdata('email', $i->post('email'));
			$this->session->set_userdata('nama_penduduk', $i->post('nama_penduduk'));
			//end create session
			$this->session->set_flashdata('sukses', 'Registrasi Berhasil');
			redirect(base_url('registrasi/sukses'),'refresh');
		}
		//end masuk database
	}

	public function sukses()
	{
		$data = array(	'title'		=> 'Registrasi Berhasil',
						'isi'		=> 'registrasi/sukses'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */