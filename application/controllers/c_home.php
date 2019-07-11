<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['siswa'] = $this->m_siswa->get_data()->result_array();
		$data['guru'] = $this->m_guru->get_data()->result_array();
		$data['prestasi'] = $this->m_prestasi_siswa->get_data()->result_array();
		$data['pelanggaran'] = $this->m_pelanggaran_siswa->get_data()->result_array();
		$data['pelanggaran_siswa'] = $this->m_pelanggaran_siswa->get_by_date()->result_array();
		// print_r($data['pelanggaran_siswa']);
		$this->template->load('index','dashboard',$data);
	}

}
