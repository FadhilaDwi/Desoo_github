<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_model');
		$this->load->model('pengajuan_model');
		//Proteksi halaman admin dengan fungsi cek_login pada simple_login
		$this->simple_login->cek_login();
	}
	//data surat
	public function index()
	{
		$surat = $this->surat_model->listing();
		$data = array(	'title'	=> 'Data surat',
						'surat'	=> $surat,
						'isi'	=> 'admin/surat/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah surat
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_surat','Nama Surat','required',
			array(	'required'		=> '%s harus diisi'));
		$valid->set_rules('kode_surat','Kode surat','required',
			array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			$i = $this->input;
			//slug surat
			$slug_surat = url_title($this->input->post('nama_surat'), 'dash', TRUE);
			$data = array(	'id_user'		=> $this->session->userdata('id_user'),
							'kode_surat'	=> $i->post('kode_surat'),
							'kode_lokasi'	=> $i->post('kode_lokasi'),
							'nama_surat'	=> $i->post('nama_surat'),
							'slug_surat'	=> $slug_surat,
							'keterangan'	=> $i->post('keterangan'),
							'status_surat'	=> $i->post('status_surat'),
							'waktu_post'	=> date('Y-m-d H:i:s')
						);
			$this->surat_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/surat'),'refresh');
		}
		//end masuk database
		$data = array(	'title'		=> 'Tambah Surat',
						'isi'		=> 'admin/surat/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//edit surat
	public function edit($slug_surat)
	{
		//ambil data surat yg akan diedit
		$surat 	= $this->surat_model->detail($slug_surat);
		//validasi input
		$valid 		= $this->form_validation;

		$valid->set_rules('nama_surat','Nama surat','required',
			array(	'required'		=> '%s harus diisi'));
		$valid->set_rules('kode_surat','Kode surat','required',
			array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) 
		{
            $i = $this->input;
            $data = array(	'id_surat'		=> $surat->id_surat,
                            'id_user'		=> $this->session->userdata('id_user'),
                            'kode_surat'	=> $i->post('kode_surat'),
                            'kode_lokasi'	=> $i->post('kode_lokasi'),
                            'nama_surat'	=> $i->post('nama_surat'),
                            'slug_surat'	=> $slug_surat,
                            'keterangan'	=> $i->post('keterangan'),
                            'status_surat'	=> $i->post('status_surat'),
                        );
            $this->surat_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/surat'),'refresh');
		}
		//end masuk database
		$data = array(	'title'		=> 'Edit surat : '.$surat->nama_surat,
						'surat'		=> $surat,
						'isi'		=> 'admin/surat/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//hapus surat
	public function delete($id_surat)
	{
		$surat = $this->surat_model->detail($id_surat);
		//end proses hapus
		$data = array('id_surat' => $id_surat);
		$this->surat_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/surat'),'refresh');
	}
}

/* End of file Surat.php */
/* Location: ./application/controllers/admin/Surat.php */