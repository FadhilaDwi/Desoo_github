<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('penduduk_model');
		$this->load->model('surat_model');
		$this->load->model('pengajuan_model');
		//Proteksi halaman admin dengan fungsi cek_login pada simple_login
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$pengajuan 		= $this->pengajuan_model->listing();
		$nomor_surat	= $this->pengajuan_model->nomor_surat();

		$data= array(	'title'			=> 'Data pengajuan',
						'pengajuan'		=> $pengajuan,
						'nomor_surat'	=> $nomor_surat,
						'isi'			=> 'admin/pengajuan/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//edit surat
	public function update_status($id_pengajuan)
	{
		//ambil data surat yg akan diedit
		$pengajuan 	= $this->pengajuan_model->detail($id_pengajuan);
		//validasi input
		$valid 		= $this->form_validation;

		$valid->set_rules('status','Status pengajuan','required',
			array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) 
		{
            $i = $this->input;
			$data = array(	'id_pengajuan'		=> $id_pengajuan,
							'status'			=> $i->post('status')
						);
			$this->pengajuan_model->edit($data);
			

			if($i->post('status')=="Selesai")
			{
				$hpwa = substr_replace($pengajuan->no_hp,'62',0,0);
				
				redirect("https://api.whatsapp.com/send?phone=<?php echo $hpwa ?>&text=Surat%20anda%20telah%20selesai,%20silahkan%20untuk%20segera%20diambil%20di%20kantor%20desa");

				$this->session->set_flashdata('sukses', 'Status Pengajuan telah diupdate');
				redirect(base_url('admin/pengajuan'),'refresh');
			}
			else
			{
				$this->session->set_flashdata('sukses', 'Status Pengajuan telah diupdate');
				redirect(base_url('admin/pengajuan'),'refresh');
			}
			
			
		}
		//end masuk database
		$data = array(	'title'			=> 'Detail Pengajuan : '.$pengajuan->surat,
						'pengajuan'		=> $pengajuan,
						'isi'			=> 'admin/pengajuan/update_status'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//edit nomor urut surat
	public function nomor_surat()
	{
		//ambil data surat yg akan diedit
		$pengajuan 		= $this->pengajuan_model->nomor_surat();
		$nomor_surat	= $this->pengajuan_model->nomor_surat();
		//validasi input
		$valid 		= $this->form_validation;

		$valid->set_rules('nomor','Nomor Surat','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()) 
		{
            $i = $this->input;
            $nomor = $i->post('nomor');
			$this->pengajuan_model->update_nomor($nomor);
			$this->session->set_flashdata('sukses', 'Nomor urut surat telah diupdate');
			redirect(base_url('admin/pengajuan'),'refresh');
		}
		//end masuk database
		$data = array(	'title'			=> 'Nomor Urut Surat',
						'pengajuan'		=> $pengajuan,
						'nomor_surat'	=> $nomor_surat,
						'isi'			=> 'admin/pengajuan/nomor_surat'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Print Surat
	public function cetak($id_pengajuan)
	{		
		$pengajuan 		= $this->pengajuan_model->detail($id_pengajuan);
		$id_penduduk	= $pengajuan->id_penduduk;
		$slug_surat		= $pengajuan->slug_surat;
		$penduduk 		= $this->penduduk_model->detail($id_penduduk);
		$surat 			= $this->surat_model->detail($slug_surat);
		$nomor_surat	= $this->pengajuan_model->nomor_surat();
		$site 			= $this->konfigurasi_model->listing();

		$data = array(	'title'			=>	'Cetak pengiriman',
						'pengajuan'		=> 	$pengajuan,
						'penduduk'		=>  $penduduk,
						'surat'			=>  $surat,
						'nomor_surat'	=>	$nomor_surat,
						'site' 			=> 	$site
					);
		//$this->load->view('admin/pengajuan/cetak', $data, FALSE);
		$html = $this->load->view('admin/pengajuan/format/'.$slug_surat, $data, TRUE);
		// Create an instance of the class:
		// $mpdf = new \Mpdf\Mpdf();
		// Define a default Landscape page size/format by name
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Folio']);
		//setting header
		// $mpdf->SetHTMLHeader('
		// <div style="text-align: center; font-weight: bold;">
		//     <img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height:40px; width: auto;">
		// </div>');
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		//kasih nama
		$nama_file_pdf = url_title($pengajuan->surat,'dash','true').'-'.$pengajuan->nik.'.pdf';
		// Output a PDF file directly to the browser
		$mpdf->Output($nama_file_pdf,'I');
	}

	//hapus pengajuan
	public function delete($id_pengajuan)
	{
		$pengajuan = $this->pengajuan_model->detail($id_pengajuan);
		//end proses hapus
		$data = array('id_pengajuan' => $id_pengajuan);
		$this->pengajuan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pengajuan'),'refresh');
	}
}

/* End of file Pengajuan.php */
/* Location: ./application/controllers/admin/Pengajuan.php */