<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apbdes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->simple_login->cek_login();
		$this->load->model('apbdes_model');
		$this->load->model('pengajuan_model');
	}

	public function index()
	{
		$belanja = $this->apbdes_model->listing_belanja();
		$pendapatan = $this->apbdes_model->listing_pendapatan();
		$sum_belanja = $this->apbdes_model->sum_belanja();
		$sum_pendapatan = $this->apbdes_model->sum_pendapatan();
		$sisa_anggaran	= $sum_pendapatan - $sum_belanja;

		$data = array(	'title'				=> 'APBDes',
						'belanja'			=> $belanja,
						'pendapatan'		=> $pendapatan,
						'sum_belanja'		=> $sum_belanja,
						'sum_pendapatan'	=> $sum_pendapatan,
						'sisa_anggaran'		=> $sisa_anggaran,
						'isi'				=> 'admin/apbdes/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('bidang','Bidang','required',
			array('required' =>	'%s harus diisi'));

		if($valid->run()) {
			$i = $this->input;
			$data = array(	'jenis_anggaran'	=>	$i->post('jenis_anggaran'),
							'bidang'			=>	$i->post('bidang'),
							'sub_bidang'		=>	$i->post('sub_bidang'),
							'nama_anggaran'		=>	$i->post('nama_anggaran'),
							'nominal'			=>	$i->post('nominal'),
							'waktu_post'		=>	date('Y-m-d H:i:s')
						);
			$this->apbdes_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/apbdes'),'refresh');
		}
		//end masuk database
		$data = array(	'title'		=> 'Tambah Transaksi Anggaran',
						'isi'		=> 'admin/apbdes/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function edit($id_anggaran)
	{
		$apbdes = $this->apbdes_model->detail($id_anggaran);
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('bidang','Bidang','required',
			array('required' =>	'%s harus diisi'));

		if($valid->run()) {
			$i = $this->input;
			$data = array(	'id_anggaran'		=> $id_anggaran,
							'jenis_anggaran'	=>	$i->post('jenis_anggaran'),
							'bidang'			=>	$i->post('bidang'),
							'sub_bidang'		=>	$i->post('sub_bidang'),
							'nama_anggaran'		=>	$i->post('nama_anggaran'),
							'nominal'			=>	$i->post('nominal')
						);
			$this->apbdes_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/apbdes'),'refresh');
		}
		//end masuk database
		$data = array(	'title'		=> 'Edit Transaksi Anggaran',
						'apbdes'	=> $apbdes,
						'isi'		=> 'admin/apbdes/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//hapus apbdes
	public function delete($id_anggaran)
	{
		$apbdes = $this->apbdes_model->detail($id_anggaran);
		//end proses hapus
		$data = array('id_anggaran' => $id_anggaran);
		$this->apbdes_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/apbdes'),'refresh');
	}
}

/* End of file Apbdes.php */
/* Location: ./application/controllers/admin/Apbdes.php */