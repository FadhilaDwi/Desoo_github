<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//"masuk" untuk penduduk
//"login" untuk admin

class Simple_penduduk
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load data model user
        $this->CI->load->model('penduduk_model');
	}

	//fungsi login
	public function login($nik,$password)
	{
		$check = $this->CI->penduduk_model->login($nik,$password);
		//jika ada data usernya ,maka create session
		if($check)
		{
			$id_penduduk		= $check->id_penduduk;
			$nama_penduduk		= $check->nama_penduduk;
			//create session
			$this->CI->session->set_userdata('id_penduduk',$id_penduduk);
			$this->CI->session->set_userdata('nama_penduduk',$nama_penduduk);
			$this->CI->session->set_userdata('nik',$nik);
			//redirect ke halaman admin yang di proteksi
			redirect(base_url('dashboard'));
		}
		else
		{
			//jika tidak ada/salah maka login ulang
			$this->CI->session->set_flashdata('warning', 'NIK atau Password salah');
			redirect(base_url('masuk'));
		}
	}

	//fungsi cek login
	public function cek_login()
	{
		//memeriksa session sudah ada/belum jika belum alihkan ke halaman login
		if($this->CI->session->userdata('nik')=='')
		{
			$this->CI->session->set_flashdata('warning', 'Login untuk masuk');
			redirect(base_url('masuk'),'refresh');
		}
	}

	//fungsi log out
	public function logout()
	{
		//membuang semua session yg telah diset pada saat login
		$this->CI->session->unset_userdata('id_penduduk');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('nik');
		//setelah session dibuang, maka redirect ke login
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('masuk'),'refresh');
	}

	//fungsi log out
	public function logout_update()
	{
		//membuang semua session yg telah diset pada saat login
		$this->CI->session->unset_userdata('id_penduduk');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('nik');
		//setelah session dibuang, maka redirect ke login
		$this->CI->session->set_flashdata('sukses', 'Update profil berhasil. Silahkan login ulang');
		redirect(base_url('masuk'),'refresh');
	}
}

/* End of file Simple_penduduk.php */
/* Location: ./application/libraries/Simple_penduduk.php */
