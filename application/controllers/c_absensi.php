<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_absensi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$data['tanggal_absensi'] = NULL;
		$data['tanggal_awal'] = NULL;
		$data['tanggal_akhir'] = NULL;
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		if($_SESSION['id_hak_akses']!=3) {
			$this->template->load('index','absensi/absensi',$data);
		} else {
			$this->template->load('index','guest/absensi',$data);
		}
	}

	public function tampil()
	{
		if($_SESSION['id_hak_akses']!=3){
			$kelas = $this->input->post('id_kelas_jurusan');
			if ($kelas==NULL){
				$id = $this->uri->segment(3);
				$date = $this->uri->segment(4);
			} else {
				$id = $this->input->post('id_kelas_jurusan');
				$date = $this->input->post('tanggal_absensi');
			}
		} else {
			$awal = $this->input->post('tanggal_awal');
			$akhir = $this->input->post('tanggal_akhir');
			$id = $_SESSION['id_siswa'];
			$siswa = $this->m_siswa->get_data($id)->row();
			$data['nama_siswa'] = $siswa->nama_siswa;
			$data['tanggal_awal'] = $awal;
			$data['tanggal_akhir'] = $akhir;
		}
		
		

		if($_SESSION['id_hak_akses']!=3) {
			$data['tanggal_absensi'] = $this->input->post('tanggal_absensi');;
			$data['id_kelas_jurusan'] = $this->m_kelas_jurusan->get_one($kelas)->row();
			$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
			$data['absensi'] = $this->m_absensi->get_one($id,$date)->result_array();
			$this->template->load('index','absensi/absensi',$data);
		} else {
			$data['absensi'] = $this->m_absensi->get_by_range($id,$awal,$akhir)->result_array();
			$this->template->load('index','guest/absensi',$data);
		}
	}

	public function tampil_kelas()
	{
		$data['tanggal_absensi'] = NULL;
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		if($_SESSION['id_hak_akses']!=3) {
			$this->template->load('index','absensi/absensi',$data);
		} else {
			$this->template->load('index','guest/absensi',$data);
		}
	}

	public function absensi()
	{
		$data['tanggal_awal'] = NULL;
		$data['tanggal_akhir'] = NULL;
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		if($_SESSION['id_hak_akses']!=3) {
			$this->template->load('index','absensi/absensi',$data);
		} else {
			$this->template->load('index','guest/absensi',$data);
		}
	}

	public function tampil_siswa()
	{
		$id = $this->input->post('id_siswa');
		$siswa = $this->m_siswa->get_data($id)->row();
		$data['nama_siswa'] = $siswa->nama_siswa;
		if ($this->input->post('tanggal_awal')==null){
			$data['tanggal_awal'] = NULL;
			$data['tanggal_akhir'] = NULL;
			$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		} else {
			$awal = $this->input->post('tanggal_awal');
			$akhir = $this->input->post('tanggal_akhir');
			$data['tanggal_awal'] = $awal;
			$data['tanggal_akhir'] = $akhir;
			$data['absensi'] = $this->m_absensi->get_by_range($id,$awal,$akhir)->result_array();
		}
		$data['id_siswa'] = $id;
		$this->template->load('index','absensi/absensi_by_siswa',$data);
	}

	public function cari_siswa()
	{
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		$data['siswa'] = $this->m_siswa->get_data()->result_array();
		$this->template->load('index','absensi/pencarian',$data);
	}

	public function tambah()
	{
		$id = $this->input->post('id_kelas_jurusan');
		$data['tanggal_absensi'] = $this->input->post('tanggal_absensi');
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		$data['id_kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id)->row();
		$data['absensi'] = $this->m_siswa->get_one($id)->result_array();
		$this->template->load('index','absensi/tambah_absensi',$data);
	}

	public function input()
	{
		$id = $this->input->post('id_kelas_jurusan');
		$date = $this->input->post('tanggal_absensi');
		$data = $this->input->post('data');
		foreach ($data as $d) {
			$d['tanggal_absensi'] = $date;
			$d['id_tahun'] = $_SESSION['id_tahun'];
			// print_r($d);
			$hasil = $this->m_absensi->add_data($d);		
		}
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_absensi/tampil/'.$id.'/'.$date);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_absensi/tampil/'.$id.'/'.$date);
		}
		
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['absensi'] = $this->m_absensi->get_data($id)->row();
		$this->template->load('index','absensi/edit_absensi',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_absensi');
		$data['izin'] = $this->input->post('izin');
		$data['sakit'] = $this->input->post('sakit');
		$data['tanpa_ket'] = $this->input->post('tanpa_ket');
		$hasil = $this->m_absensi->update_data($id,$data);
		$date = $this->input->post('tanggal_absensi');
		$id = $this->input->post('id_kelas_jurusan');
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_absensi/tampil/'.$id.'/'.$date);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_absensi/tampil/'.$id.'/'.$date);
		}
	}

}
