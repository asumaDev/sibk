<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ortu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}
	
	public function index()
	{
		$data['ortu'] = $this->m_ortu->get_data()->result_array();
		$this->template->load('index','ortu/ortu',$data);
	}

	public function tambah_banyak()
	{
		$data['banyak_input'] = $this->input->post('banyak_input');
		$this->template->load('index','ortu/tambah_ortu',$data);
	}

	public function upload(){
		$fileName = time().$_FILES['file']['name'];
		
		$config['upload_path'] = FCPATH .'uploads/excel/ortu/';
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size'] = 10000;
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if(! $this->upload->do_upload('file') )
			$this->upload->display_errors();
		
		$this->load->helper('file');     
		$media = $this->upload->data('file');
		$inputFileName = $this->upload->data('full_path');
		
		try {

			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
            	$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
            		NULL,
            		TRUE,
            		FALSE);
            	
                //Sesuaikan sama nama kolom tabel di database                                
            	$data = array(
            		"nama_ortu"=> $rowData[0][0],
            		"alamat_ortu"=> $rowData[0][1],
            		"jenkel_ortu"=> $rowData[0][2],
            		"hp_ortu"=> $rowData[0][3],
            	);
            	
                //sesuaikan nama dengan nama tabel
            	$insert = $this->db->insert("ortu",$data);
            	delete_files($config['upload_path'],TRUE);
            	
            }
            redirect('c_ortu');
        }

	public function input()
	{
		$data = $this->input->post('data');
		foreach ($data as $d) {
			$hasil = $this->m_ortu->add_data($d);		
		}
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_ortu');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_ortu');
		}
	}

	public function tambah()
	{
		$data['nama_ortu'] = $this->input->post('nama_ortu');
		$data['alamat_ortu'] = $this->input->post('alamat_ortu');
		$data['jenkel_ortu'] = $this->input->post('jenkel_ortu');
		$data['hp_ortu'] = $this->input->post('hp_ortu');
		$hasil = $this->m_ortu->add_data($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('c_ortu');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('c_ortu');
		}
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$hasil = $this->m_ortu->del_data($id);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('c_ortu');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('c_ortu');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['ortu'] = $this->m_ortu->get_data($id)->row();
		$this->template->load('index','ortu/edit_ortu',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_ortu');
		$data['nama_ortu'] = $this->input->post('nama_ortu');
		$data['alamat'] = $this->input->post('alamat');
		$data['jenkel_ortu'] = $this->input->post('jenkel_ortu');
		$data['hp_ortu'] = $this->input->post('hp_ortu');
		$hasil = $this->m_ortu->update_data($id,$data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('c_ortu');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('c_ortu');
		}
	}

}
