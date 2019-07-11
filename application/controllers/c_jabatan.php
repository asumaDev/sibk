<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jabatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['jabatan'] = $this->m_jabatan->get_data()->result_array();
		$this->template->load('index','jabatan/jabatan',$data);
	}

	public function tambah()
	{
		$data['nama_jabatan'] = $this->input->post('nama_jabatan');
		$hasil = $this->m_jabatan->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_jabatan');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_jabatan');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_jabatan->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_jabatan');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_jabatan');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['jabatan'] = $this->m_jabatan->get_data($id)->row();
		$this->template->load('index','jabatan/edit_jabatan',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_jabatan');
		$data['nama_jabatan'] = $this->input->post('nama_jabatan');
		$hasil = $this->m_jabatan->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_jabatan');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_jabatan');
		}
	}

}
