<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengguna extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['hak_akses'] = $this->m_hak_akses->get_data()->result_array();
		$data['pengguna'] = $this->m_pengguna->get_data()->result_array();
		$this->template->load('index','pengguna/pengguna',$data);
	}

	public function tambah()
	{
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['id_hak_akses'] = $this->input->post('id_hak_akses');
		$data['status'] = 0;
		$hasil = $this->m_pengguna->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_pengguna');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_pengguna');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$pengguna = $this->m_pengguna->get_data($id)->row();
		if ($pengguna->status==1){
			$nis = $pengguna->username;
			$siswa = $this->m_siswa->get_by_nis($nis)->row();
			$data['account']=0;
			$this->m_siswa->update_data($siswa->id_siswa,$data);
		}
		$hasil = $this->m_pengguna->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_pengguna');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_pengguna');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['hak_akses'] = $this->m_hak_akses->get_data()->result_array();
		$data['pengguna'] = $this->m_pengguna->get_data($id)->row();
		$this->template->load('index','pengguna/edit_pengguna',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_user');
		$data['username'] = $this->input->post('username');
		$data['id_hak_akses'] = $this->input->post('id_hak_akses');
		$hasil = $this->m_pengguna->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_pengguna');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_pengguna');
		}
	}

}
