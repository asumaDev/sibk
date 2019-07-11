<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kelas_jurusan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['kelas'] = $this->m_kelas->get_data()->result_array();
		$data['jurusan'] = $this->m_jurusan->get_data()->result_array();
		$data['guru'] = $this->m_guru->get_data()->result_array();
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data($_SESSION['id_tahun'])->result_array();
		$this->template->load('index','kelas_jurusan/kelas_jurusan',$data);
	}

	public function tambah()
	{
		$data['id_kelas'] = $this->input->post('id_kelas');
		$data['id_jurusan'] = $this->input->post('id_jurusan');
		$data['daya_tampung'] = $this->input->post('daya_tampung');
		$data['urutan_kelas_jurusan'] = $this->input->post('urutan_kelas_jurusan');
		$data['id_wali_kelas'] = $this->input->post('id_wali_kelas');
		$data['id_tahun'] = $_SESSION['id_tahun'];
		$hasil = $this->m_kelas_jurusan->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_kelas_jurusan');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_kelas_jurusan');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_kelas_jurusan->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_kelas_jurusan');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_kelas_jurusan');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['kelas'] = $this->m_kelas->get_data()->result_array();
		$data['jurusan'] = $this->m_jurusan->get_data()->result_array();
		$data['guru'] = $this->m_guru->get_data()->result_array();
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id)->row();
		$this->template->load('index','kelas_jurusan/edit_kelas_jurusan',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_kelas_jurusan');
		$data['id_kelas'] = $this->input->post('id_kelas');
		$data['id_jurusan'] = $this->input->post('id_jurusan');
		$data['daya_tampung'] = $this->input->post('daya_tampung');
		$data['urutan_kelas_jurusan'] = $this->input->post('urutan_kelas_jurusan');
		$data['id_wali_kelas'] = $this->input->post('id_wali_kelas');
		$hasil = $this->m_kelas_jurusan->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_kelas_jurusan');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_kelas_jurusan');
		}
	}

}
