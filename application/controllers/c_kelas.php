<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kelas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['kelas'] = $this->m_kelas->get_data()->result_array();
		$this->template->load('index','kelas/kelas',$data);
	}

	public function tambah()
	{
		$data['tingkat'] = $this->input->post('tingkat');
		$data['nama_kelas'] = $this->input->post('nama_kelas');
		$hasil = $this->m_kelas->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_kelas');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_kelas');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_kelas->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_kelas');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_kelas');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['kelas'] = $this->m_kelas->get_data($id)->row();
		$this->template->load('index','kelas/edit_kelas',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_kelas');
		$data['tingkat'] = $this->input->post('tingkat');
		$data['nama_kelas'] = $this->input->post('nama_kelas');
		$hasil = $this->m_kelas->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_kelas');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_kelas');
		}
	}

}
