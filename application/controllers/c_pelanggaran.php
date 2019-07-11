<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggaran extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['kat_pelanggaran'] = $this->m_kat_pelanggaran->get_data()->result_array();
		$data['pelanggaran'] = $this->m_pelanggaran->get_data()->result_array();
		$this->template->load('index','pelanggaran/pelanggaran',$data);
	}

	public function tambah()
	{
		$data['nama_pelanggaran'] = $this->input->post('nama_pelanggaran');
		$data['point_pelanggaran'] = $this->input->post('point_pelanggaran');
		$data['id_kat_pelanggaran'] = $this->input->post('id_kat_pelanggaran');
		$hasil = $this->m_pelanggaran->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_pelanggaran');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_pelanggaran');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_pelanggaran->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_pelanggaran');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_pelanggaran');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['kat_pelanggaran'] = $this->m_kat_pelanggaran->get_data()->result_array();
		$data['pelanggaran'] = $this->m_pelanggaran->get_data($id)->row();
		$this->template->load('index','pelanggaran/edit_pelanggaran',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_pelanggaran');
		$data['nama_pelanggaran'] = $this->input->post('nama_pelanggaran');
		$data['point_pelanggaran'] = $this->input->post('point_pelanggaran');
		$data['id_kat_pelanggaran'] = $this->input->post('id_kat_pelanggaran');
		$hasil = $this->m_pelanggaran->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_pelanggaran');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_pelanggaran');
		}
	}

}
