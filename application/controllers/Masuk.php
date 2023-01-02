<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penduduk_model');
	}

	//login penduduk
	public function index()
	{
		//validasi
		$this->form_validation->set_rules('nik','NIK','required',
			array(	'required'	=>	'%s harus diisi'));
		$this->form_validation->set_rules('password','Password','required',
			array(	'required'	=>	'%s harus diisi'));
		if($this->form_validation->run())
		{
			$nik 	= $this->input->post('nik');
			$password 	= $this->input->post('password');
			//proses ke simple login
			$this->simple_penduduk->login($nik,$password);
		}
		//end validasi
		$data = array(	'title'		=> 'Login penduduk',
						'isi'		=>	'masuk/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//logout
	public function logout()
	{
		//ambil fungsi logout di Simple_penduduk
		$this->simple_penduduk->logout();
	}

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */
