<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kat_panggilan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['kat_panggilan'] = $this->m_kat_panggilan->get_data()->result_array();
		$this->template->load('index','kat_panggilan/kat_panggilan',$data);
	}

	public function tambah()
	{
		$data['nama_kat_panggilan'] = $this->input->post('nama_kat_panggilan');
		$data['keterangan_kat_panggilan'] = $this->input->post('keterangan_kat_panggilan');
		$hasil = $this->m_kat_panggilan->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_kat_panggilan');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_kat_panggilan');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_kat_panggilan->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_kat_panggilan');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_kat_panggilan');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['kat_panggilan'] = $this->m_kat_panggilan->get_data($id)->row();
		$this->template->load('index','kat_panggilan/edit_kat_panggilan',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_kat_panggilan');
		$data['nama_kat_panggilan'] = $this->input->post('nama_kat_panggilan');
		$data['keterangan_kat_panggilan'] = $this->input->post('keterangan_kat_panggilan');
		$hasil = $this->m_kat_panggilan->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_kat_panggilan');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_kat_panggilan');
		}
	}

}
