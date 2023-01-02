<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('apbdes_model');
		$this->load->model('surat_model');
		$this->load->model('berita_model');
		$this->load->model('pemdes_model');
		$this->load->model('penduduk_model');
	}

	public function index()
	{
		// $site 		= $this->konfigurasi_model->listing();
		// $data = array(	'title'		=>	$site->namaweb.' | '.$site->tagline,
		// 				'keywords'	=>	$site->keywords,
		// 				'deskripsi'	=>	$site->deskripsi,
		// 				'site'		=>	$site,
		// 				'isi'		=>	'home/list');

		// $this->load->view('layout/wrapper', $data, FALSE);

		// -----------------------------------------------------------------

		$site	= $this->konfigurasi_model->listing();
		//SURAT	
		//ambil data total
		$total_surat	= $this->surat_model->total_surat();
		//paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'surat/index/';
		$config['total_rows'] 		= $total_surat->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 4;
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
		$page_surat	= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$surat = $this->surat_model->surat($config['per_page'],$page_surat);
		//paginasi end

		//BERITA	
		//ambil data total
		$total_berita	= $this->berita_model->total_berita();
		//paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'berita/index/';
		$config['total_rows'] 		= $total_berita->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 3;
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
		$config['first_url']		= base_url().'/berita/';
		$this->pagination->initialize($config);
		//Ambil data surat
		$page_berita = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$berita	= $this->berita_model->berita($config['per_page'],$page_berita);
		//paginasi end

		//PEMDES	
		//ambil data total
		$total_pemdes	= $this->pemdes_model->total_pemdes();
		//paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'pemdes/index/';
		$config['total_rows'] 		= $total_pemdes->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 3;
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
		$config['first_url']		= base_url().'/pemdes/';
		$this->pagination->initialize($config);
		//Ambil data pemdes
		$page_pemdes = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$pemdes = $this->pemdes_model->pemdes($config['per_page'],$page_pemdes);
		//paginasi end

		$sum_belanja = $this->apbdes_model->sum_belanja();
		$sum_pendapatan = $this->apbdes_model->sum_pendapatan();
		$sisa_anggaran	= $sum_pendapatan - $sum_belanja;

		$total_penduduk		= $this->penduduk_model->total_penduduk();
		$total_perempuan	= $this->penduduk_model->total_perempuan();
		$total_laki			= $this->penduduk_model->total_laki();

		$data 	= array('title'		=>	$site->namaweb.' | '.$site->tagline,
						'keywords'	=>	$site->keywords,
						'deskripsi'	=>	$site->deskripsi,
						'site'		=>	$site,
						'surat'		=> 	$surat,
						'berita'	=> 	$berita,
						'pemdes'	=>	$pemdes,
						'sum_belanja'		=> $sum_belanja,
						'sum_pendapatan'	=> $sum_pendapatan,
						'sisa_anggaran'		=> $sisa_anggaran,
						'total_penduduk'	=>	$total_penduduk->total,
						'total_perempuan'	=>	$total_perempuan->total,
						'total_laki'		=>	$total_laki->total,
						'pagin'		=> $this->pagination->create_links(),
						'isi'		=> 'home/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
