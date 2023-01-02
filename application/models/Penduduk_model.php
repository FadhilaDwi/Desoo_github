<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penduduk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all penduduk
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('penduduk');
		$this->db->order_by('id_penduduk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Excel
	public function getAll()
	{
		$data_penduduk = $this->db->get('penduduk')->result();
		return $data_penduduk;
	}

	//login penduduk
	public function login($nik, $password)
	{
		$this->db->select('*');
		$this->db->from('penduduk');
		$this->db->where(array(	'nik'		=> $nik,
								'password'	=> $password
							));
		$this->db->order_by('id_penduduk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//detail penduduk
	public function detail($id_penduduk)
	{
		$this->db->select('*');
		$this->db->from('penduduk');
		$this->db->where('id_penduduk', $id_penduduk);
		$this->db->order_by('id_penduduk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//penduduk aktif
	public function sudah_login($nik, $nama_penduduk)
	{
		$this->db->select('*');
		$this->db->from('penduduk');
		$this->db->where('nik', $nik);
		$this->db->where('nama_penduduk', $nama_penduduk);
		$this->db->order_by('id_penduduk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

// ---------------------------------------------------Stats--------------------------------------//
	
	//total Penduduk
	public function total_penduduk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$query = $this->db->get();
		return $query->row();
	}
	//--------------------GENDER---------------------------//
	//total Perempuan
	public function total_perempuan()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('kelamin', 'Pr');
		$query = $this->db->get();
		return $query->row();
	}

	//total Laki laki
	public function total_laki()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('kelamin', 'Lk');
		$query = $this->db->get();
		return $query->row();
	}
	//--------------------Pendidikan---------------------------//
	//total Tidak/Belum Sekolah
	public function total_belumsekolah()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'Tidak/Belum Sekolah');
		$query = $this->db->get();
		return $query->row();
	}

	//total Belum Tamat SD/Sederajat
	public function total_bts()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'Belum Tamat SD/Sederajat');
		$query = $this->db->get();
		return $query->row();
	}

	//total Tamat SD/Sederajat
	public function total_tamatsd()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'Tamat SD/Sederajat');
		$query = $this->db->get();
		return $query->row();
	}

	//total SLTP/Sederajat
	public function total_sltp()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'SLTP/Sederajat');
		$query = $this->db->get();
		return $query->row();
	}

	//total SLTA/Sederajat
	public function total_slta()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'SLTA/Sederajat');
		$query = $this->db->get();
		return $query->row();
	}

	//total Diploma I/II
	public function total_d12()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'Diploma I/II');
		$query = $this->db->get();
		return $query->row();
	}

	//total Akademi/Diploma III/S. Muda
	public function total_d3()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'Akademi/Diploma III/S. Muda');
		$query = $this->db->get();
		return $query->row();
	}

	//total Diploma IV/Strata I
	public function total_s1()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'Diploma IV/Strata I');
		$query = $this->db->get();
		return $query->row();
	}

	//total Diploma Strata II
	public function total_s2()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('pendidikan', 'Strata II');
		$query = $this->db->get();
		return $query->row();
	}

	//--------------------Status Perkawinan---------------------------//
	//total Belum kawin
	public function total_belumkawin()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('status_perkawinan', 'Belum Kawin');
		$query = $this->db->get();
		return $query->row();
	}

	//total Kawin
	public function total_kawin()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('status_perkawinan', 'Kawin');
		$query = $this->db->get();
		return $query->row();
	}

	//total Cerai Hidup
	public function total_ceraihidup()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('status_perkawinan', 'Cerai Hidup');
		$query = $this->db->get();
		return $query->row();
	}

	//total Cerai Mati
	public function total_ceraimati()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('status_perkawinan', 'Cerai Mati');
		$query = $this->db->get();
		return $query->row();
	}
    //-----------------------Agama-----------------------------------//
    //------Islam--------
    public function total_islam()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('agama', 'Islam');
		$query = $this->db->get();
		return $query->row();
	}
	//------Budha--------
    public function total_budha()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('agama', '');
		$query = $this->db->get();
		return $query->row();
	}
	//------Khatolik--------
    public function total_khatolik()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('penduduk');
		$this->db->where('agama', 'Katholik');
		$query = $this->db->get();
		return $query->row();
	}
// ----------------------------------------------End Stats-------------------------------//

	//tambah penduduk
	public function tambah($data)
	{
		$this->db->insert('penduduk', $data);
	}

	//hapus penduduk
	public function delete($data)
	{
		$this->db->where('id_penduduk', $data['id_penduduk']);
		$this->db->delete('penduduk',$data);
	}

	//edit penduduk
	public function edit($data)
	{
		$this->db->where('id_penduduk', $data['id_penduduk']);
		$this->db->update('penduduk',$data);
	}

	//detail berkas penduduk
	public function detail_berkas($id_berkas)
	{
		$this->db->select('*');
		$this->db->from('berkas');
		$this->db->where('id_berkas', $id_berkas);
		$this->db->order_by('id_berkas', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//berkas
	public function berkas($id_penduduk)
	{
		$this->db->select('*');
		$this->db->from('berkas');
		$this->db->where('id_penduduk', $id_penduduk);
		$this->db->order_by('id_berkas', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//tambah berkas
	public function tambah_berkas($data)
	{
		$this->db->insert('berkas', $data);
	}

	//hapus gambar
	public function delete_berkas($data)
	{
		$this->db->where('id_berkas', $data['id_berkas']);
		$this->db->delete('berkas',$data);
	}
}

/* End of file penduduk_model.php */
/* Location: ./application/models/penduduk_model.php */
