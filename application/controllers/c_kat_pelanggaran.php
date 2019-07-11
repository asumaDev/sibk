<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kat_pelanggaran extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['kat_pelanggaran'] = $this->m_kat_pelanggaran->get_data()->result_array();
		$this->template->load('index','kat_pelanggaran/kat_pelanggaran',$data);
	}

	public function tambah()
	{
		$data['nama_kat_pelanggaran'] = $this->input->post('nama_kat_pelanggaran');
		$hasil = $this->m_kat_pelanggaran->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_kat_pelanggaran');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_kat_pelanggaran');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_kat_pelanggaran->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_kat_pelanggaran');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_kat_pelanggaran');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['kat_pelanggaran'] = $this->m_kat_pelanggaran->get_data($id)->row();
		$this->template->load('index','kat_pelanggaran/edit_kat_pelanggaran',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_kat_pelanggaran');
		$data['nama_kat_pelanggaran'] = $this->input->post('nama_kat_pelanggaran');
		$hasil = $this->m_kat_pelanggaran->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_kat_pelanggaran');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_kat_pelanggaran');
		}
	}

}
