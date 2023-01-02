<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('pengaduan_model');
    $this->load->model('pengajuan_model');
  }

  function index()
  {
    $pengaduan	= $this->pengaduan_model->get_pengaduan()->result();

    $data = array(
      'title'	    =>	'Daftar Pengaduan Penduduk',
      'pengaduan'	=> 	$pengaduan,
      'isi'	      =>	'admin/pengaduan/list'
    );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function update_status_pengaduan($idpengaduan, $kode_status)
    {
      $data = array(
        'status_pengaduan' => $kode_status,
      );
      if ($this->pengaduan_model->update_status($idpengaduan,$data)) {
        $this->session->set_flashdata('sukses', 'Data telah diupdate');
        redirect(base_url('admin/pengaduan'));
      }else {
        $this->session->set_flashdata('gagal', 'Data gagal diupdate');
        redirect(base_url('admin/pengaduan'));
      }
    }

  }
