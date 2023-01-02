<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load data model user
        $this->CI->load->model('user_model');
	}

	//fungsi login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		//jika ada data usernya ,maka create session
		if($check)
		{
			$id_user		= $check->id_user;
			$nama			= $check->nama;
			$jabatan		= $check->jabatan;
			$akses_level	= $check->akses_level;
			//create session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('jabatan',$jabatan);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			//redirect ke halaman admin yang di proteksi
			redirect(base_url('admin/dashboard'),'refresh');
		}
		else
		{
			//jika tidak ada/salah maka login ulang
			$this->CI->session->set_flashdata('warning', 'Username atau Password salah');
			redirect(base_url('login'),'refresh');
		}
	}

	//fungsi cek login
	public function cek_login()
	{
		//memeriksa session sudah ada/belum jika belum alihkan ke halaman login
		if($this->CI->session->userdata('username')=='')
		{
			$this->CI->session->set_flashdata('warning', 'Login untuk masuk');
			redirect(base_url('login'),'refresh');
		}
	}

	//fungsi log out
	public function logout()
	{
		//membuang semua session yg telah diset pada saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('jabatan');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		//setelah session dibuang, maka redirect ke login
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}
}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
