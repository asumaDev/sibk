<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jurusan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['jurusan'] = $this->m_jurusan->get_data()->result_array();
		$this->template->load('index','jurusan/jurusan',$data);
	}

	public function tambah()
	{
		$data['nama_jurusan'] = $this->input->post('nama_jurusan');
		$data['akronin_jurusan'] = $this->input->post('akronin_jurusan');
		$hasil = $this->m_jurusan->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_jurusan');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_jurusan');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_jurusan->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_jurusan');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_jurusan');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['jurusan'] = $this->m_jurusan->get_data($id)->row();
		$this->template->load('index','jurusan/edit_jurusan',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_jurusan');
		$data['nama_jurusan'] = $this->input->post('nama_jurusan');
		$data['akronin_jurusan'] = $this->input->post('akronin_jurusan');
		$hasil = $this->m_jurusan->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_jurusan');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_jurusan');
		}
	}

}
