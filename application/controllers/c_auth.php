<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['tahun'] = $this->m_tahun->get_data()->result_array();
		$this->load->view('login',$data);
	}

	public function chPassword()
	{
		$id_user = $this->input->post('id_user');
		$data['password'] = md5($this->input->post('pass_baru'));
		$hasil = $this->m_login->update_data($id_user,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Ganti Password Berhasil');
			redirect('c_auth/logout');
		} else {
			$this->session->set_flashdata('alert','Ganti Password Data Gagal');
			redirect('c_auth/logout');
		}
	}

	public function login(){
		$data['username'] = $this->input->post('username',TRUE);
		$data['password'] = md5($this->input->post('password',TRUE));
		$hasil = $this->m_login->login($data);
		if (count($hasil->result()) == 1){
			foreach ($hasil->result() as $h) {
				$h_data['logged_id'] = 'Sudah Login';
				$h_data['username'] = $h->username;
				$h_data['id_user'] = $h->id_user;
				$h_data['id_hak_akses'] = $h->id_hak_akses;
				$h_data['status'] = $h->status;
				$h_data['password'] = $h->password;
				$h_data['id_tahun'] = $this->input->post('tahun_ajaran');

				if($h->status == 1) {
					$nis = $h->username;
					$siswa = $this->m_siswa->get_by_nis($nis)->row();
					$h_data['id_siswa'] = $siswa->id_siswa;
					$h_data['nama_siswa'] = $siswa->nama_siswa;
				}

				$this->session->set_userdata($h_data);
			}

			redirect('c_home');
		} else {
			$this->session->set_flashdata('alert','Maaf NIS/NIP atau password anda salah');
			redirect('c_auth');
		}
	}

	public function logout()
	{
		$this->session->userdata('username');
		$this->session->userdata('status');
		session_destroy();
		redirect();
	}

}
