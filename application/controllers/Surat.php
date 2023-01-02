<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('surat_model');
		$this->load->model('penduduk_model');
		$this->load->model('pengajuan_model');
		//load helper random string
		$this->load->helper('string');
	}

	//listing data surat
	public function index()
	{
		$cari = $this->input->post('cari');
		$site	= $this->konfigurasi_model->listing();
		//ambil data total
		$total	= $this->surat_model->total_surat();
		//paginasi start
		$this->load->library('pagination');

		$config['base_url'] 		= base_url().'surat/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 8;
		$config['uri_segment'] 		= 3;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['first_url']		= base_url().'/surat/';
		$this->pagination->initialize($config);
		//Ambil data surat
		$page 	= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$surat = $this->surat_model->surat($cari,$config['per_page'],$page);
		//paginasi end

		$data 	= array('title'		=> 'Layanan Surat',
						'site'		=> $site,
						'surat'		=> $surat,
						'pagin'		=> $this->pagination->create_links(),
						'isi'		=> 'surat/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//detail surat dan pengajuan
	public function detail($slug_surat)
	{
		// check penduduk login/belum?
		// jika belum registrasi+login terlebih dahulu
		if($this->session->userdata('nik'))
		{
			$surat 		= $this->surat_model->detail($slug_surat);

			//validasi input
			$valid 		= $this->form_validation;
			$valid->set_rules('no_hp','No. HP Aktif','required',
			array(	'required'		=> '%s harus diisi'));
			//sudah login
			$nik 			= $this->session->userdata('nik');
			$nama_penduduk	= $this->session->userdata('nama_penduduk');
			$penduduk 		= $this->penduduk_model->sudah_login($nik, $nama_penduduk);

			$id_penduduk 	= $this->session->userdata('id_penduduk');
			$penduduk 		= $this->penduduk_model->detail($id_penduduk);
			$berkas 		= $this->penduduk_model->berkas($id_penduduk);
			$id_surat		= $surat->id_surat;
			$nomor_surat	= $this->pengajuan_model->nomor_surat();
			$slug_surat		= $slug_surat;
			$data 	= array('title'		=> $surat->nama_surat,
							'penduduk'	=> $penduduk,
							'surat'		=> $surat,
							'berkas'	=> $berkas,
							'isi'		=> 'surat/detail/'.$slug_surat
						);
			$this->load->view('layout/wrapper', $data, FALSE);

			if($valid->run()){
				$i = $this->input;
				$data = array(	'id_penduduk'		=> $id_penduduk,
								'slug_surat'		=> $surat->slug_surat,
								'nomor_pengajuan'	=> "$surat->kode_surat / $nomor_surat->nomor / $surat->kode_lokasi / ".date('Y'),
								'nama_penduduk'		=> $penduduk->nama_penduduk,
								'nik'				=> $penduduk->nik,
								'surat'				=> $surat->nama_surat,
								'no_hp'				=> $i->post('no_hp'),
								'var1'				=> $i->post('var1'),
								'var2'				=> $i->post('var2'),
								'var3'				=> $i->post('var3'),
								'var4'				=> $i->post('var4'),
								'var5'				=> $i->post('var5'),
								'var6'				=> $i->post('var6'),
								'var7'				=> $i->post('var7'),
								'var8'				=> $i->post('var8'),
								'var9'				=> $i->post('var9'),
								'var10'				=> $i->post('var10'),
								'status'			=> 'Menunggu',
								'waktu_post'		=> date('Y-m-d H:i:s')
							);
				$this->pengajuan_model->tambah($data);
				$nomor = $nomor_surat->nomor+1;
				$this->pengajuan_model->update_nomor($nomor);
				$this->session->set_flashdata('sukses', 'Surat telah diajukan');
				redirect(base_url('dashboard'),'refresh');
			}
		}
		else
		{
			//belum login
			$this->session->set_flashdata('warning', 'Silahkan login terlebih dahulu');
			redirect(base_url('masuk'),'refresh');
		}
	}
}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */
