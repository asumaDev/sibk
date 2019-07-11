<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggaran_siswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		$data['siswa'] = $this->m_siswa->get_data()->result_array();
		$this->template->load('index','pelanggaran_siswa/pelanggaran_siswa',$data);
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

			if ($this->input->post('id_siswa')==NULL)
			{
				$id=$this->uri->segment(3);
			} else {
				$id=$this->input->post('id_siswa');
			}
		}
		$id_tahun = $_SESSION['id_tahun'];
		$siswa = $this->m_siswa->get_data($id)->row();
		$id_kelas_jurusan = $siswa->id_kelas_jurusan;
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id_kelas_jurusan)->row();
		$data['pelanggaran_siswa'] = $this->m_pelanggaran_siswa->get_siswa($id)->result_array();
		$data['kat_pelanggaran'] = $this->m_kat_pelanggaran->get_data()->result_array();
		$data['siswa'] = $this->m_siswa->get_data($id)->row();
		$this->template->load('index','pelanggaran_siswa/detail_pelanggaran_siswa',$data);
	}

	public function pelanggaran($id_kat_pelanggaran)
	{
		$q = $this->m_pelanggaran->get_one($id_kat_pelanggaran)->result_array();
		$data = "<option value=''> - Data pelanggaran - </option>";
		foreach ($q as $value) {
			$data .= "<option value='".$value['id_pelanggaran']."'>".$value['nama_pelanggaran']."</option>";
		}
		echo $data;
	}

	public function tambah()
	{
		$data['id_siswa'] = $this->input->post('id_siswa');
		$data['id_pelanggaran'] = $this->input->post('id_pelanggaran');
		$data['id_penginput'] = $_SESSION['id_user'];
		$data['waktu_input'] = date('Y-d-m h:i:s');
		$data['tindak_lanjut'] = $this->input->post('tindak_lanjut');
		$data['waktu_melanggar'] = $this->input->post('waktu_melanggar');
		$data['tempat_pelanggaran'] = $this->input->post('tempat_pelanggaran');
		$data['id_tahun'] = $_SESSION['id_tahun'];
		$hasil = $this->m_pelanggaran_siswa->add_data($data);
		$id = $data['id_siswa'];
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_pelanggaran_siswa/tampil/'.$id);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_pelanggaran_siswa/tampil/'.$id);
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_pelanggaran_siswa->del_data($id);
		$id = $this->uri->segment(4);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_pelanggaran_siswa/tampil/'.$id);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_pelanggaran_siswa/tampil/'.$id);
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['pelanggaran_siswa'] = $this->m_pelanggaran_siswa->get_data($id)->row();
		$data['kat_pelanggaran'] = $this->m_kat_pelanggaran->get_data()->result_array();
		$this->template->load('index','pelanggaran_siswa/edit_pelanggaran_siswa',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_pelanggaran_siswa');
		$data['tindak_lanjut'] = $this->input->post('tindak_lanjut');
		$data['waktu_melanggar'] = $this->input->post('waktu_melanggar');
		$data['tempat_pelanggaran'] = $this->input->post('tempat_pelanggaran');
		$hasil = $this->m_pelanggaran_siswa->update_data($id,$data);
		$id = $this->input->post('id_siswa');
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_pelanggaran_siswa/tampil/'.$id);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_pelanggaran_siswa/tampil/'.$id);
		}
	}

}
