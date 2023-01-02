<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('user_model');
		$this->load->model('pengajuan_model');
		//Proteksi halaman admin dengan fungsi cek_login pada simple_login
		$this->simple_login->cek_login();
	}
	//data berita
	public function index()
	{
		$berita = $this->berita_model->listing();
		$data = array(	'title'		=> 'Data berita',
						'berita' 	=> $berita,
						'isi'		=> 'admin/berita/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah berita
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul lengkap','required',
			array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/gambar_berita/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar_berita')){
				
			//end validasi
			$data = array(	'title'		=> 'Tambah Berita',
							'error'		=> $this->upload->display_errors(),
							'isi'		=> 'admin/berita/tambah'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			}
			else
			{
				$upload_gambar_berita = array('upload_data' => $this->upload->data());
				
				$i = $this->input;
				$data = array(	'judul_berita'		=> $i->post('judul_berita'),
								'id_user'			=> $this->session->userdata('id_user'),
								'kategori_berita'	=> $i->post('kategori_berita'),
								'isi_berita'		=> $i->post('isi_berita'),
								'status_berita'		=> $i->post('status_berita'),
								//yang disimpan adalah nama file gambar_berita
								'gambar_berita'		=> $upload_gambar_berita['upload_data']['file_name'],
								'waktu_post'		=> date('Y-m-d H:i:s')
							);
				$this->berita_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/berita'),'refresh');
			}
		}
		//end masuk database
		$data = array(	'title'		=> 'Tambah Berita',
						'isi'		=> 'admin/berita/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//edit berita
	public function edit($id_berita)
	{
		//ambil data berita yg akan diedit
		$berita 	= $this->berita_model->detail($id_berita);
		//validasi input
		$valid 		= $this->form_validation;

		$valid->set_rules('judul_berita','Judul Berita','required',
			array(	'required'		=> '%s harus diisi'));
		
		$data = array(	'title'		=> 'Edit Berita',
						'berita'	=> $berita,
						'isi'		=> 'admin/berita/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		if($valid->run()) 
		{
			// Check jika gambar_berita diganti
			if(!empty($_FILES['gambar_berita']['name'])) 
			{
				//proses hapus gambar_berita
				$berita = $this->berita_model->detail($id_berita);
				unlink('./assets/upload/image/gambar_berita/'.$berita->gambar_berita);
				//end proses hapus

				$config['upload_path'] 		= './assets/upload/image/gambar_berita/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; //Dalam KB
				$config['max_width']  		= '2024';
				$config['max_height']  		= '2024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar_berita'))
				{
					//end validasi
					$data = array(	'title'		=> 'Edit Berita : '.$berita->judul_berita,
									'berita'	=> $berita,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/berita/edit'
								);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk database
				}
				else
				{
					$upload_gambar_berita = array('upload_data' => $this->upload->data());
					$i = $this->input;
					$data = array(	'id_berita'			=> $id_berita,
									'judul_berita'		=> $i->post('judul_berita'),
									'id_user'			=> $this->session->userdata('id_user'),
									'kategori_berita'	=> $i->post('kategori_berita'),
									'isi_berita'		=> $i->post('isi_berita'),
									'status_berita'		=> $i->post('status_berita'),
									//yang disimpan adalah nama file gambar_berita
									'gambar_berita'			=> $upload_gambar_berita['upload_data']['file_name']
								);
					$this->berita_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diedit');
					redirect(base_url('admin/berita'),'refresh');
				}
			}
			else
			{
				//edit tanpa ganti gambar_berita
				$i = $this->input;
				$data = array(	'id_berita'			=> $id_berita,
								'judul_berita'		=> $i->post('judul_berita'),
								'id_user'			=> $this->session->userdata('id_user'),
								'kategori_berita'	=> $i->post('kategori_berita'),
								'isi_berita'		=> $i->post('isi_berita'),
								'status_berita'		=> $i->post('status_berita')
							);
				$this->berita_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('admin/berita'),'refresh');
			}
		}
		//end masuk database
		$data = array(	'title'		=> 'Edit Berita'.$berita->judul_berita,
						'berita'	=> $berita,
						'isi'		=> 'admin/berita/edit'
					);
	}

	//hapus berita
	public function delete($id_berita)
	{
		$berita = $this->berita_model->detail($id_berita);
		unlink('./assets/upload/image/gambar_berita/'.$berita->gambar_berita);
		//end proses hapus
		$data = array('id_berita' => $id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/berita'),'refresh');
	}
}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */