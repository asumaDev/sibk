<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tahun extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['tahun'] = $this->m_tahun->get_data()->result_array();
		$this->template->load('index','tahun/tahun',$data);
	}

	public function tambah()
	{
		$data['awal_tahun'] = $this->input->post('awal_tahun');
		$data['akhir_tahun'] = $this->input->post('akhir_tahun');
		$data['tahun_ajaran'] = $this->input->post('tahun_ajaran');
		$hasil = $this->m_tahun->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_tahun');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_tahun');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_tahun->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_tahun');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_tahun');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['tahun'] = $this->m_tahun->get_data($id)->row();
		$this->template->load('index','tahun/edit_tahun',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_tahun');
		$data['awal_tahun'] = $this->input->post('awal_tahun');
		$data['akhir_tahun'] = $this->input->post('akhir_tahun');
		$data['tahun_ajaran'] = $this->input->post('tahun_ajaran');
		$hasil = $this->m_tahun->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_tahun');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_tahun');
		}
	}

}
