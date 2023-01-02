<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pengaduan_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $i = $this->input;
    $id_penduduk = $_SESSION['id_penduduk'];

    $pengaduan 	= $this->Pengaduan_model->get_pengaduan($id_penduduk)->result();

    $config['upload_path'] 		= './assets/upload/image/gambar_bukti_pengaduan/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
    $config['max_size']  		= '2024'; //Dalam KB
    $config['max_width']  		= '2024';
    $config['max_height']  		= '2024';

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('gambar_bukti_pengaduan')){
      //end validasi
      $data = array(	'title'		=> 'Halaman Pengaduan Penduduk',
      'pengaduan'	=> $pengaduan,
    );
    // $this->session->set_flashdata('gagal', $this->upload->display_errors());
    $this->session->set_flashdata('gagal', 'Gambar gagal diupload');
  }
  else
  {
    $insert_data = array(
      'bukti'	                => $this->upload->data()['file_name'],
      'penduduk_id_penduduk'	=> $id_penduduk,
      'tanggal_pengaduan'			=> date('Y-m-d H:i:s'),
      'isi_pengaduan'			    => $i->post('deskripsi'),
      'status_pengaduan'			=> '1' //1= dalam antrian, 2=proses, 3=aduan selesai ditindak lanjuti
    );

    $data = array(
      'title'		  => 'Halaman Pengaduan Penduduk',
      'pengaduan'	=> $pengaduan,
    );

    //masuk database
    if ($this->Pengaduan_model->tambah($insert_data)) {
      $this->session->set_flashdata('sukses', 'Data Berhasil ditambah');
    }else {
      $this->session->set_flashdata('gagal', 'Data gagal ditambah');
    }
  }
  redirect(base_url('Dashboard/pengaduan'), $data);


}

}
