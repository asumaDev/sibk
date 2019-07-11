<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_guru extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
	
	public function index()
	{
		$data['tahun'] = $this->m_tahun->get_data()->result_array();
		$data['jabatan'] = $this->m_jabatan->get_data()->result_array();
		$data['guru'] = $this->m_guru->get_data()->result_array();
		$hasil = $this->m_guru->get_data()->result_array();
		$jumlah = 0;
		foreach ($hasil as $h) {
			$jumlah = $jumlah + $h['status']; 
		}
		$data['status_hasil'] = $jumlah;
		$this->template->load('index','guru/guru',$data);
	}

	public function upload(){
		$fileName = time().$_FILES['file']['name'];
		
		$config['upload_path'] = FCPATH .'uploads/excel/guru/';
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
            		"nbm"=> $rowData[0][0],
            		"nama_guru"=> $rowData[0][1],
            		"jenkel_guru"=> $rowData[0][2],
            		"alamat"=> $rowData[0][3],
            		"hp_guru"=> $rowData[0][4],
            		"id_jabatan"=> $rowData[0][5],
            		"id_tahun"=> $_SESSION['id_tahun'],
            		"status"=>0
            	);
            	
                //sesuaikan nama dengan nama tabel
            	$insert = $this->db->insert("guru",$data);
            	delete_files($config['upload_path'],TRUE);
            	
            }
            redirect('c_guru');
        }

        public function transfer()
        {
        	$seleksi = $this->input->post('seleksi');
        	if ($seleksi == null){
        		$data['guru'] = $this->m_guru->get_data()->result_array();
        		$data['jabatan'] =  $this->m_jabatan->get_data()->result_array();
        		$id_tahun = $this->input->post('id_tahun');
        		$data['id_tahun'] = $id_tahun;
        		$this->template->load('index','guru/transfer_guru',$data);
        	} else {
        		$record = $this->m_guru->get_data($_SESSION['id_tahun'])->result_array();
        		$id_tahun = $this->input->post('id_tahun');
        		foreach ($record as $r) {
        			$data['nbm'] = $r['nbm'];
        			$data['nama_guru'] = $r['nama_guru'];
        			$data['alamat'] = $r['alamat'];
        			$data['jenkel_guru'] = $r['jenkel_guru'];
        			$data['hp_guru'] = $r['hp_guru'];
        			$data['id_jabatan'] = $r['id_jabatan'];
        			$data['id_tahun'] = $id_tahun;
        			$data['status'] = 0;
        			$hasil = $this->m_guru->add_data($data);

        			$id = $r['id_guru'];
        			$data1['status'] = 1;
        			$this->m_guru->update_data($id,$data1);
        		}

        		if ($hasil == 0){
        			$this->session->set_flashdata('alert','Transfer Data Berhasil');
        			redirect('c_guru');
        		} else {
        			$this->session->set_flashdata('alert','Transfer Data Gagal');
        			redirect('c_guru');
        		}
        	}
        }

        public function seleksi()
        {
        	$id_tahun = $this->input->post('id_tahun');
        	$data = $this->input->post('data');
        	foreach ($data as $d) {
        		if(ISSET($d['status'])){
        			$dat['nbm'] = $d['nbm'];
        			$dat['nama_guru'] = $d['nama_guru'];
        			$dat['alamat'] = $d['alamat'];
        			$dat['jenkel_guru'] = $d['jenkel_guru'];
        			$dat['hp_guru'] = $d['hp_guru'];
        			$dat['id_jabatan'] = $d['id_jabatan'];
        			$dat['id_tahun'] = $id_tahun;
        			$dat['status'] = 0;
        			$hasil = $this->m_guru->add_data($dat);

        			$id = $d['id_guru'];
        			$data1['status'] = $d['status'];
        			$this->m_guru->update_data($id,$data1);
        		}
        	}
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Transfer Data Berhasil');
        		redirect('c_guru');
        	} else {
        		$this->session->set_flashdata('alert','Transfer Data Gagal');
        		redirect('c_guru');
        	}
        }

        public function tambah_banyak()
        {
        	$data['jabatan'] = $this->m_jabatan->get_data()->result_array();
        	$data['banyak_input'] = $this->input->post('banyak_input');
        	$this->template->load('index','guru/tambah_guru',$data);
        }

        public function input()
        {
        	$data = $this->input->post('data');
        	foreach ($data as $d) {
        		$d['id_tahun'] = $_SESSION['id_tahun'];
        		$hasil = $this->m_guru->add_data($d);		
        	}
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Tambah Data Berhasil');
        		redirect('c_guru');
        	} else {
        		$this->session->set_flashdata('alert','Tambah Data Gagal');
        		redirect('c_guru');
        	}
        }

        public function tambah()
        {
        	$data['nbm'] = $this->input->post('nbm');
        	$data['nama_guru'] = $this->input->post('nama_guru');
        	$data['alamat'] = $this->input->post('alamat');
        	$data['jenkel_guru'] = $this->input->post('jenkel_guru');
        	$data['hp_guru'] = $this->input->post('hp_guru');
        	$data['id_jabatan'] = $this->input->post('id_jabatan');
        	$data['id_tahun'] = $_SESSION['id_tahun'];
        	$hasil = $this->m_guru->add_data($data);
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Tambah Data Berhasil');
        		redirect('c_guru');
        	} else {
        		$this->session->set_flashdata('alert','Tambah Data Gagal');
        		redirect('c_guru');
        	}
        }

        public function hapus()
        {
        	$id = $this->uri->segment(3);
        	$hasil = $this->m_guru->del_data($id);
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Hapus Data Berhasil');
        		redirect('c_guru');
        	} else {
        		$this->session->set_flashdata('alert','Hapus Data Gagal');
        		redirect('c_guru');
        	}
        }

        public function edit()
        {
        	$id = $this->uri->segment(3);
        	$data['jabatan'] = $this->m_jabatan->get_data()->result_array();
        	$data['guru'] = $this->m_guru->get_one($id)->row();
        	$this->template->load('index','guru/edit_guru',$data);
        }

        public function update()
        {
        	$id = $this->input->post('id_guru');
        	$data['nbm'] = $this->input->post('nbm');
        	$data['nama_guru'] = $this->input->post('nama_guru');
        	$data['alamat'] = $this->input->post('alamat');
        	$data['jenkel_guru'] = $this->input->post('jenkel_guru');
        	$data['hp_guru'] = $this->input->post('hp_guru');
        	$data['id_jabatan'] = $this->input->post('id_jabatan');
        	$hasil = $this->m_guru->update_data($id,$data);
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Update Data Berhasil');
        		redirect('c_guru');
        	} else {
        		$this->session->set_flashdata('alert','Update Data Gagal');
        		redirect('c_guru');
        	}
        }

    }
