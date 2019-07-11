<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penilaian_siswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		$data['penilaian_siswa'] = $this->m_penilaian_siswa->get_data()->result_array();
		$this->template->load('index','penilaian_siswa/penilaian_siswa',$data);
	}

	public function tampil()
	{
		if ($this->input->post('id_kelas_jurusan')==NULL){
			$id = $this->uri->segment(3);
			
		} else {
			$id = $this->input->post('id_kelas_jurusan');
		}
		
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		$data['id_kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id)->row();

		if ($_SESSION['id_hak_akses']==3){
			$id_siswa = $_SESSION['id_siswa'];
			$data['penilaian_siswa'] = $this->m_penilaian_siswa->get_by_siswa($id_siswa)->result();
			$data['siswa'] = $this->m_siswa->get_data($_SESSION['id_siswa'])->row();
			$this->template->load('index','guest/penilaian_siswa',$data);
		} else {
			$data['penilaian_siswa'] = $this->m_penilaian_siswa->get_one($id)->result_array();
			$data['siswa'] = $this->m_siswa->get_one($id)->result_array();
			$this->template->load('index','penilaian_siswa/penilaian_siswa',$data);
		}
		
	}

	public function cetak()
	{
		$id = $this->uri->segment(3);
		$data['tahun_ajaran'] = $this->m_tahun->get_data($id_tahun=$_SESSION['id_tahun'])->row();
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id)->row();
		$data['penilaian_siswa'] = $this->m_penilaian_siswa->get_one($id)->result_array();
		$this->load->view('penilaian_siswa/cetak_penilaian_siswa',$data);
	}

	public function tambah_banyak()
	{
		$id = $this->input->post('id_kelas_jurusan');
		$data['id_kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id)->row();
		$data['banyak_input'] = $this->input->post('banyak_input');
		$data['siswa'] = $this->m_siswa->get_one($id)->result_array();
		$this->template->load('index','penilaian_siswa/tambah_penilaian_siswa',$data);
	}

	public function input()
	{
		$data = $this->input->post('data');
		foreach ($data as $d) {
			$d['id_tahun'] = $_SESSION['id_tahun'];
			$hasil = $this->m_penilaian_siswa->add_data($d);		
		}
		$id = $this->input->post('id_kelas_jurusan');
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_penilaian_siswa/tampil/'.$id);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_penilaian_siswa/tampil/'.$id);
		}
	}

	// public function hapus()
	// {
	// 	$id = $this->uri->segment(4);
	// 	$hasil = $this->m_penilaian_siswa->del_data($id);
	// 	$id = $this->uri->segment(3);
	// 	if ($hasil == 0){
	//       $this->session->set_flashdata('alert','Hapus Data Berhasil');
	//        redirect('c_penilaian_siswa/tampil/'.$id);
	//     } else {
	//       $this->session->set_flashdata('alert','Hapus Data Gagal');
	//       redirect('c_penilaian_siswa/tampil');
	//     }
	// }

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['penilaian_siswa'] = $this->m_penilaian_siswa->get_data($id)->row();
		$this->template->load('index','penilaian_siswa/edit_penilaian_siswa',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_penilaian_siswa');
		$data['sholat_wajib'] = $this->input->post('sholat_wajib');
		$data['membaca_kitab'] = $this->input->post('membaca_kitab');
		$data['sholat_sunnah'] = $this->input->post('sholat_sunnah');
		$data['kerajinan'] = $this->input->post('kerajinan');
		$data['kedisiplinan'] = $this->input->post('kedisiplinan');
		$data['kerapihan'] = $this->input->post('kerapihan');
		$hasil = $this->m_penilaian_siswa->update_data($id,$data);
		$id = $this->input->post('id_kelas_jurusan');
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_penilaian_siswa/tampil/'.$id);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_penilaian_siswa/tampil');
		}
	}

}
