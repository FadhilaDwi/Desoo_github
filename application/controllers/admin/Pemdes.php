<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemdes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pemdes_model');
		$this->load->model('pengajuan_model');
		//Proteksi halaman admin dengan fungsi cek_login pada simple_login
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$pemdes = $this->pemdes_model->listing();
		$data = array(	'title'		=> 'Data Pemerintahan Desa',
						'pemdes'	=> $pemdes,
						'isi'		=> 'admin/pemdes/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah pemdes
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemdes','Nama Pemdes','required',
			array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/gambar_pemdes/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar_pemdes')){
				
			//end validasi
			$data = array(	'title'		=> 'Tambah Pemdes',
							'error'		=> $this->upload->display_errors(),
							'isi'		=> 'admin/pemdes/tambah'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			}
			else
			{
				$upload_gambar_pemdes = array('upload_data' => $this->upload->data());
				
				$i = $this->input;
				$data = array(	'nama_pemdes'		=> $i->post('nama_pemdes'),
								'isi_pemdes'		=> $i->post('isi_pemdes'),
								//yang disimpan adalah nama file gambar_pemdes
								'gambar_pemdes'		=> $upload_gambar_pemdes['upload_data']['file_name']
							);
				$this->pemdes_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/pemdes'),'refresh');
			}
		}
		//end masuk database
		$data = array(	'title'		=> 'Tambah Pemdes',
						'isi'		=> 'admin/pemdes/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//edit pemdes
	public function edit($id_pemdes)
	{
		//ambil data pemdes yg akan diedit
		$pemdes 	= $this->pemdes_model->detail($id_pemdes);
		//validasi input
		$valid 		= $this->form_validation;

		$valid->set_rules('nama_pemdes','Nama Pemdes','required',
			array(	'required'		=> '%s harus diisi'));
		
		$data = array(	'title'		=> 'Edit Pemdes',
						'pemdes'	=> $pemdes,
						'isi'		=> 'admin/pemdes/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		if($valid->run()) 
		{
			// Check jika gambar_pemdes diganti
			if(!empty($_FILES['gambar_pemdes']['name'])) 
			{
				//proses hapus gambar_pemdes
				$pemdes = $this->pemdes_model->detail($id_pemdes);
				unlink('./assets/upload/image/gambar_pemdes/'.$pemdes->gambar_pemdes);
				//end proses hapus

				$config['upload_path'] 		= './assets/upload/image/gambar_pemdes/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; //Dalam KB
				$config['max_width']  		= '2024';
				$config['max_height']  		= '2024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar_pemdes'))
				{
					//end validasi
					$data = array(	'title'		=> 'Edit Pemdes : '.$pemdes->nama_pemdes,
									'pemdes'	=> $pemdes,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/pemdes/edit'
								);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk database
				}
				else
				{
					$upload_gambar_pemdes = array('upload_data' => $this->upload->data());
					$i = $this->input;
					$data = array(	'id_pemdes'			=> $id_pemdes,
									'nama_pemdes'		=> $i->post('nama_pemdes'),
									'isi_pemdes'		=> $i->post('isi_pemdes'),
									//yang disimpan adalah nama file gambar_pemdes
									'gambar_pemdes'			=> $upload_gambar_pemdes['upload_data']['file_name']
								);
					$this->pemdes_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diedit');
					redirect(base_url('admin/pemdes'),'refresh');
				}
			}
			else
			{
				//edit tanpa ganti gambar_pemdes
				$i = $this->input;
				$data = array(	'id_pemdes'			=> $id_pemdes,
								'nama_pemdes'		=> $i->post('nama_pemdes'),
								'isi_pemdes'		=> $i->post('isi_pemdes')
							);
				$this->pemdes_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('admin/pemdes'),'refresh');
			}
		}
		//end masuk database
		$data = array(	'title'		=> 'Edit Pemdes'.$pemdes->nama_pemdes,
						'pemdes'	=> $pemdes,
						'isi'		=> 'admin/pemdes/edit'
					);
	}

	//hapus pemdes
	public function delete($id_pemdes)
	{
		$pemdes = $this->pemdes_model->detail($id_pemdes);
		unlink('./assets/upload/image/gambar_pemdes/'.$pemdes->gambar_pemdes);
		//end proses hapus
		$data = array('id_pemdes' => $id_pemdes);
		$this->pemdes_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pemdes'),'refresh');
	}
}

/* End of file Pemdes.php */
/* Location: ./application/controllers/admin/Pemdes.php */