<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penduduk_model');
		$this->load->model('user_model');
		$this->load->model('pengajuan_model');
		$this->load->model('Excel_model');
		//Proteksi halaman admin dengan fungsi cek_login pada simple_login
		$this->simple_login->cek_login();
	}
	//data penduduk
	public function index()
	{
		$penduduk = $this->penduduk_model->listing();
		$data = array(	'title'		=> 'Data Penduduk',
						'penduduk'	=> $penduduk,
						'isi'		=> 'admin/penduduk/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah penduduk
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_penduduk','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'));
		$valid->set_rules('nik','NIK','required|min_length[16]|max_length[16]|is_unique[penduduk.nik]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 16 karakter',
					'max_length'	=> '%s maksimal 16 karakter',
					'is_unique'		=> '%s sudah ada. Masukkan NIK baru.'));
		$valid->set_rules('password','Password','required|min_length[8]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 8 karakter'));
		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/scan_ktp/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('scan_ktp')){
				
			//end validasi
			$data = array(	'title'		=> 'Tambah Penduduk',
							'error'		=> $this->upload->display_errors(),
							'isi'		=> 'admin/penduduk/tambah'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			}
			else
			{
				$upload_scan_ktp = array('upload_data' => $this->upload->data());
				
				$i = $this->input;
				$data = array(	'nama_penduduk'		=> $i->post('nama_penduduk'),
								'nik'				=> $i->post('nik'),
								'password'			=> $i->post('password'),
								'no_kk'				=> $i->post('no_kk'),
								'tempat_lahir'		=> $i->post('tempat_lahir'),
								'tanggal_lahir'		=> $i->post('tanggal_lahir'),
								'jenis_kelamin'		=> $i->post('jenis_kelamin'),
								'agama'				=> $i->post('agama'),
								'status_perkawinan'	=> $i->post('status_perkawinan'),
								'pekerjaan'			=> $i->post('pekerjaan'),
								'kewarganegaraan'	=> $i->post('kewarganegaraan'),
								'alamat'			=> $i->post('alamat'),
								'pendidikan'		=> $i->post('pendidikan'),
								'penerima_bantuan'	=> $i->post('penerima_bantuan'),
								//yang disimpan adalah nama file scan_ktp
								'scan_ktp'			=> $upload_scan_ktp['upload_data']['file_name'],
							);
				$this->penduduk_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/penduduk'),'refresh');
			}
		}
		//end masuk database
		$data = array(	'title'		=> 'Tambah Penduduk',
						'isi'		=> 'admin/penduduk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//edit penduduk
	public function edit($id_penduduk)
	{
		//ambil data penduduk yg akan diedit
		$penduduk 	= $this->penduduk_model->detail($id_penduduk);
		//validasi input
		$valid 		= $this->form_validation;

		$valid->set_rules('nama_penduduk','Nama Penduduk','required',
			array(	'required'		=> '%s harus diisi'));
		
		$data = array(	'title'		=> 'Edit Penduduk',
						'penduduk'	=> $penduduk,
						'isi'		=> 'admin/penduduk/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		if($valid->run()) 
		{
			// Check jika scan_ktp diganti
			if(!empty($_FILES['scan_ktp']['name'])) 
			{
				//proses hapus scan_ktp
				$penduduk = $this->penduduk_model->detail($id_penduduk);
				unlink('./assets/upload/image/scan_ktp/'.$penduduk->scan_ktp);
				//end proses hapus

				$config['upload_path'] 		= './assets/upload/image/scan_ktp/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; //Dalam KB
				$config['max_width']  		= '2024';
				$config['max_height']  		= '2024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('scan_ktp'))
				{
					//end validasi
					$data = array(	'title'		=> 'Edit Penduduk : '.$penduduk->nama_penduduk,
									'penduduk'	=> $penduduk,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/penduduk/edit'
								);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk database
				}
				else
				{
					$upload_scan_ktp = array('upload_data' => $this->upload->data());
					$i = $this->input;
					$data = array(	'id_penduduk'		=> $id_penduduk,
									'nama_penduduk'		=> $i->post('nama_penduduk'),
									'nik'				=> $i->post('nik'),
									'password'			=> $i->post('password'),
									'no_kk'				=> $i->post('no_kk'),
									'tempat_lahir'		=> $i->post('tempat_lahir'),
									'tanggal_lahir'		=> $i->post('tanggal_lahir'),
									'jenis_kelamin'		=> $i->post('jenis_kelamin'),
									'agama'				=> $i->post('agama'),
									'status_perkawinan'	=> $i->post('status_perkawinan'),
									'pekerjaan'			=> $i->post('pekerjaan'),
									'kewarganegaraan'	=> $i->post('kewarganegaraan'),
									//yang disimpan adalah nama file scan_ktp
									'scan_ktp'			=> $upload_scan_ktp['upload_data']['file_name'],
									'alamat'			=> $i->post('alamat'),
									'pendidikan'		=> $i->post('pendidikan'),
									'penerima_bantuan'	=> $i->post('penerima_bantuan')
								);
					$this->penduduk_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diedit');
					redirect(base_url('admin/penduduk'),'refresh');
				}
			}
			else
			{
				//edit tanpa ganti scan_ktp
				$i = $this->input;
				$data = array(	'id_penduduk'		=> $id_penduduk,
								'nama_penduduk'		=> $i->post('nama_penduduk'),
								'nik'				=> $i->post('nik'),
								'password'			=> $i->post('password'),
								'no_kk'				=> $i->post('no_kk'),
								'tempat_lahir'		=> $i->post('tempat_lahir'),
								'tanggal_lahir'		=> $i->post('tanggal_lahir'),
								'jenis_kelamin'		=> $i->post('jenis_kelamin'),
								'agama'				=> $i->post('agama'),
								'status_perkawinan'	=> $i->post('status_perkawinan'),
								'pekerjaan'			=> $i->post('pekerjaan'),
								'kewarganegaraan'	=> $i->post('kewarganegaraan'),
								'alamat'			=> $i->post('alamat'),
								'pendidikan'		=> $i->post('pendidikan'),
								'penerima_bantuan'	=> $i->post('penerima_bantuan')
							);
				$this->penduduk_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('admin/penduduk'),'refresh');
			}
		}
		//end masuk database
		$data = array(	'title'		=> 'Edit Penduduk : '.$penduduk->nama_penduduk,
						'penduduk'	=> $penduduk,
						'isi'		=> 'admin/penduduk/edit'
					);
	}

	//hapus penduduk
	public function delete($id_penduduk)
	{
		$data = array('id_penduduk' => $id_penduduk);
		unlink('./assets/upload/image/scan_ktp/'.$penduduk->scan_ktp);
		$this->penduduk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/penduduk'),'refresh');
	}

	//tambah berkas
	public function berkas($id_penduduk)
	{
		$penduduk 	= $this->penduduk_model->detail($id_penduduk);
		$berkas 	= $this->penduduk_model->berkas($id_penduduk);
		
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('jenis_berkas','Jenis Berkass','required',
			array(	'required'		=> '%s harus diisi'));
		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/berkas/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //Dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('berkas')){
				
			//end validasi
			$data = array(	'title'		=> 'Tambah Berkas Penduduk : '.$penduduk->nama_penduduk,
							'penduduk'	=> $penduduk,
							'berkas'	=> $berkas,
							'error'		=> $this->upload->display_errors(),
							'isi'		=> 'admin/penduduk/berkas'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			}
			else
			{
				$upload_berkas = array('upload_data' => $this->upload->data());
				$i = $this->input;
				$data = array(	'id_penduduk'	=> $id_penduduk,
								'jenis_berkas'	=> $i->post('jenis_berkas'),
								//yang disimpan adalah nama file berkas
								'berkas'		=> $upload_berkas['upload_data']['file_name']
							);
				$this->penduduk_model->tambah_berkas($data);
				$this->session->set_flashdata('sukses', 'Berkas telah ditambahkan');
				redirect(base_url('admin/penduduk/berkas/'.$id_penduduk));
			}
		}
		//end masuk database
		$data = array(	'title'		=> 'Tambah Berkas Penduduk: '.$penduduk->nama_penduduk,
						'penduduk'	=> $penduduk,
						'berkas'	=> $berkas,
						'isi'		=> 'admin/penduduk/berkas'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//hapus berkas
	public function delete_berkas($id_penduduk, $id_berkas)
	{
		//proses hapus berkas
		$berkas = $this->penduduk_model->detail_berkas($id_berkas);
		unlink('./assets/upload/image/berkas/'.$berkas->berkas);
		//end proses hapus
		$data = array('id_berkas' => $id_berkas);
		$this->penduduk_model->delete_berkas($data);
		$this->session->set_flashdata('sukses', 'Data berkas telah dihapus');
		redirect(base_url('admin/penduduk/berkas/'.$id_penduduk),'refresh');
	}

	public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
	
		// Settingan awal file excel
		$excel->getProperties()->setCreator('admin@desoo')
					 ->setLastModifiedBy('admin@desoo')
					 ->setTitle("Data Penduduk Desa Manduro MG")
					 ->setSubject("Penduduk")
					 ->setDescription("Data Penduduk Desa Manduro MG")
					 ->setKeywords("Data Penduduk Desa Manduro MG");
	
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
	
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
	
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Penduduk Desa Manduro MG"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA LENGKAP");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "JENIS KELAMIN"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "STATUS KAWIN");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TEMPAT LAHIR");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL LAHIR");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "AGAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "SHDK");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "PENDIDIKAN TERAKHIR");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "PEKERJAAN");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "NIK");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "NO KK");
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "DUSUN");
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "RT");
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "RW");
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "NAMA IBU");
		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "NAMA AYAH");
		$excel->setActiveSheetIndex(0)->setCellValue('R3', "GOLDAR");
		$excel->setActiveSheetIndex(0)->setCellValue('S3', "KECAMATAN");
		$excel->setActiveSheetIndex(0)->setCellValue('T3', "KELURAHAN");
		$excel->setActiveSheetIndex(0)->setCellValue('U3', "KEWARGANEGARAAN");

	
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
		
	
	
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$warga = $this->Excel_model->view();
	
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($warga as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_penduduk);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jenis_kelamin);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->status_perkawinan);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tempat_lahir);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tanggal_lahir);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->agama);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->shdk);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->pendidikan);
		  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->pekerjaan);
		  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->nik);
		  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->no_kk);
		  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->dusun);
		  $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->rt);
		  $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->rw);
		  $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->nama_ibu);
		  $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->nama_ayah);
		  $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->goldar);
		  $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->kecamatan);
		  $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->kelurahan);
		  $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->kewarganegaraan);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
		  
	
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
	
		// Set width kolom
		$excel->getActiveSheet()->getDefaultColumnDimension()->setWidth(-1); // Set width kolom A
	
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Data Penduduk Desa Manduro MG");
		$excel->setActiveSheetIndex(0);
	
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Penduduk.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
	
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}

/* End of file Penduduk.php */
/* Location: ./application/controllers/admin/Penduduk.php */