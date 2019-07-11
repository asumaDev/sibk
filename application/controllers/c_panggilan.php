<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_panggilan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		$data['siswa'] = $this->m_siswa->get_data()->result_array();
		$this->template->load('index','panggilan/pencarian',$data);
	}

	public function tampil()
	{
		$id = $this->input->post('id_siswa');
		if ($id==null){
			$id = $this->uri->segment('3');
		}
		$id_kelas_jurusan = $this->input->post('id_kelas_jurusan');
		$data['pelanggaran_siswa'] = $this->m_pelanggaran_siswa->get_siswa($id,$_SESSION['id_tahun'])->result_array();
		$data['siswa'] = $this->m_siswa->get_data($id,$_SESSION['id_tahun'])->row();
		$data['jabatan'] = $this->m_jabatan->get_data()->result_array();
		$data['guru'] = $this->m_guru->get_data($_SESSION['id_tahun'])->result_array();
		$this->template->load('index','panggilan/panggilan',$data);
	}

	public function guru($id_jabatan)
	{
		$q = $this->m_guru->get_jabatan($id_jabatan)->result_array();
		$data = "<option value=''> - Data Guru - </option>";
		foreach ($q as $value) {
			$data .= "<option value='".$value['id_guru']."'>".$value['nama_guru']."</option>";
		}
		echo $data;
	}

	public function lembar_bimbingan()
	{
		$id = $this->input->post('id_siswa');
		$data['kaur_bs'] = $this->input->post('kaur_bs');
		$data['guru_pembimbing'] = $this->input->post('guru_pembimbing');
		$data['semester'] = $this->input->post('semester');
		$siswa = $this->m_siswa->get_data($id,$_SESSION['id_tahun'])->row();
		$id_kelas_jurusan = $siswa->id_kelas_jurusan;
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id_kelas_jurusan)->row();

		$id_tahun = $_SESSION['id_tahun'];
		$data['tahun'] = $this->m_tahun->get_data($id_tahun)->row();
		$data['pelanggaran_siswa'] = $this->m_pelanggaran_siswa->get_siswa($id,$id_tahun)->result_array();
		$data['siswa'] = $this->m_siswa->get_data($id,$_SESSION['id_tahun'])->row();
		$this->load->view('panggilan/lembar_bimbingan',$data);
	}

	public function surat_pernyataan()
	{
		$id = $this->input->post('id_siswa');
		$data['tanggal_surat'] = $this->input->post('tanggal_surat');
		$data['bk'] = $this->input->post('bk');
		$data['kategori_sp'] = $this->input->post('kategori_sp');
		$id_tahun = $_SESSION['id_tahun'];
		$data['asrama'] = $this->input->post('asrama');
		$siswa = $this->m_siswa->get_data($id,$_SESSION['id_tahun'])->row();
		$id_kelas_jurusan = $siswa->id_kelas_jurusan;
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id_kelas_jurusan)->row();


		$data['pelanggaran_siswa'] = $this->m_pelanggaran_siswa->get_siswa($id,$id_tahun)->result_array();
		$data['siswa'] = $this->m_siswa->get_data($id,$_SESSION['id_tahun'])->row();
		$this->load->view('panggilan/surat_pernyataan',$data);
	}

	public function surat_panggilan()
	{
		$data['nomor_surat'] = $this->input->post('nomor_surat');
		$data['lampiran'] = $this->input->post('lampiran');
		$data['hal'] = $this->input->post('hal');
		$data['isi_surat'] = $this->input->post('isi_surat');
		$data['tanggal_hijriah'] = $this->input->post('tanggal_hijriah');
		$data['tanggal_masehi'] = $this->input->post('tanggal_masehi');

		$data['tujuan'] = $this->input->post('tujuan');
		$data['desa'] = $this->input->post('desa');
		$data['kabupaten'] = $this->input->post('kabupaten');
		$data['provinsi'] = $this->input->post('provinsi');

		$data['konselor'] = $this->m_guru->get_one($this->input->post('konselor'))->row();

		$data['tembusan1'] = $this->m_guru->get_one($this->input->post('id_guru_1'))->row();
		$data['tembusan2'] = $this->m_guru->get_one($this->input->post('id_guru_2'))->row();
		$data['tembusan3'] = $this->m_guru->get_one($this->input->post('id_guru_3'))->row();
		$data['tembusan4'] = $this->m_guru->get_one($this->input->post('id_guru_4'))->row();
		$data['tembusan5'] = $this->m_guru->get_one($this->input->post('id_guru_5'))->row();
		$data['tembusan6'] = $this->m_guru->get_one($this->input->post('id_guru_6'))->row();
		$data['tembusan7'] = $this->m_guru->get_one($this->input->post('id_guru_7'))->row();

		$id = $this->input->post('id_siswa');
		$data['siswa'] = $this->m_siswa->get_data($id,$_SESSION['id_tahun'])->row();

		$siswa = $this->m_siswa->get_data($id,$_SESSION['id_tahun'])->row();
		$id_kelas_jurusan = $siswa->id_kelas_jurusan;
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id_kelas_jurusan)->row();

		$this->load->view('panggilan/surat_panggilan',$data);
	}

}
