<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kat_prestasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['kat_prestasi'] = $this->m_kat_prestasi->get_data()->result_array();
		$this->template->load('index','kat_prestasi/kat_prestasi',$data);
	}

	public function tambah()
	{
		$data['nama_kat_prestasi'] = $this->input->post('nama_kat_prestasi');
		$hasil = $this->m_kat_prestasi->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_kat_prestasi');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_kat_prestasi');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_kat_prestasi->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_kat_prestasi');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_kat_prestasi');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['kat_prestasi'] = $this->m_kat_prestasi->get_data($id)->row();
		$this->template->load('index','kat_prestasi/edit_kat_prestasi',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_kat_prestasi');
		$data['nama_kat_prestasi'] = $this->input->post('nama_kat_prestasi');
		$hasil = $this->m_kat_prestasi->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_kat_prestasi');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_kat_prestasi');
		}
	}

}
