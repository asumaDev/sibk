<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_prestasi_siswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		$data['siswa'] = $this->m_siswa->get_data()->result_array();
		$this->template->load('index','prestasi_siswa/prestasi_siswa',$data);
	}

	public function siswa($id_kelas_jurusan)
	{
		$q = $this->m_siswa->get_one($id_kelas_jurusan)->result_array();
		$data = "<option value=''> - Data Siswa - </option>";
		foreach ($q as $value) {
			$data .= "<option value='".$value['id_siswa']."'>".$value['nama_siswa']."</option>";
		}
		echo $data;
	}

	public function tampil()
	{
		if ($_SESSION['status']==1){
			$id = $_SESSION['id_siswa'];
		} else {
			$id = $this->input->post('id_siswa');
		}
		$siswa = $this->m_siswa->get_data($id)->row();
		$id_kelas_jurusan = $siswa->id_kelas_jurusan;
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id_kelas_jurusan)->row();
		$data['prestasi_siswa'] = $this->m_prestasi_siswa->get_siswa($id)->result_array();
		$data['kat_prestasi'] = $this->m_kat_prestasi->get_data()->result_array();
		$data['siswa'] = $this->m_siswa->get_data($id)->row();
		$data['guru'] = $this->m_guru->get_data($_SESSION['id_tahun'])->result_array();
		$this->template->load('index','prestasi_siswa/detail_prestasi_siswa',$data);
	}

	public function prestasi($id_kat_prestasi)
	{
		$q = $this->m_prestasi->get_one($id_kat_prestasi)->result_array();
		$data = "<option value=''> - Data Prestasi - </option>";
		foreach ($q as $value) {
			$data .= "<option value='".$value['id_prestasi']."'>".$value['nama_prestasi']."</option>";
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
		$data['prestasi_siswa'] = $this->m_prestasi_siswa->get_siswa($id)->result_array();
		$data['siswa'] = $this->m_siswa->get_data($id,$_SESSION['id_tahun'])->row();
		$this->load->view('prestasi_siswa/lembar_bimbingan',$data);
	}

	public function tambah()
	{
		$data['id_siswa'] = $this->input->post('id_siswa');
		$data['id_prestasi'] = $this->input->post('id_prestasi');
		$data['id_penginput'] = $_SESSION['id_user'];
		$data['waktu_input'] = $this->input->post('waktu_input');
		$data['keterangan_prestasi'] = $this->input->post('keterangan_prestasi');
		$data['id_tahun'] = $_SESSION['id_tahun'];
		$hasil = $this->m_prestasi_siswa->add_data($data);
		$id = $data['id_siswa'];
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_prestasi_siswa/tampil/'.$id);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_prestasi_siswa/tampil/'.$id);
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_prestasi_siswa->del_data($id);
		$id = $this->uri->segment(4);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_prestasi_siswa/tampil/'.$id);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_prestasi_siswa/tampil/'.$id);
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['prestasi_siswa'] = $this->m_prestasi_siswa->get_data($id)->row();
		$data['kat_prestasi'] = $this->m_kat_prestasi->get_data()->result_array();
		$this->template->load('index','prestasi_siswa/edit_prestasi_siswa',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_prestasi_siswa');
		$data['keterangan_prestasi'] = $this->input->post('keterangan_prestasi');
		$hasil = $this->m_prestasi_siswa->update_data($id,$data);
		$id = $this->input->post('id_siswa');
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_prestasi_siswa/tampil/'.$id);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_prestasi_siswa/tampil/'.$id);
		}
	}

}
