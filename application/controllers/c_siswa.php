<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_siswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
	
	public function index()
	{
		$data['tahun'] = $this->m_tahun->get_data()->result_array();
		$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
		$this->template->load('index','siswa/siswa',$data);
	}

	public function transfer()
	{
		$seleksi = $this->input->post('seleksi');
		if ($seleksi == null){
			$id_kelas_jurusan = $this->input->post('kelas_jurusan');
			$id_tahun = $this->input->post('id_tahun');
			$data['id_kelas_jurusan_baru'] = $this->input->post('id_kelas_jurusan');
			$data['id_kelas_jurusan'] = $id_kelas_jurusan;
			$data['id_tahun'] = $id_tahun;
			$data['siswa'] = $this->m_siswa->get_one($id_kelas_jurusan)->result_array();
			$this->template->load('index','siswa/transfer_siswa',$data);
		} else {
			$record = $this->m_siswa->get_data($id=null,$_SESSION['id_tahun'])->result_array();
			$id_kelas_jurusan = $this->input->post('id_kelas_jurusan');
			$id_tahun = $this->input->post('id_tahun');
			foreach ($record as $r) {
				$data['nis'] = $r['nis'];
				$data['nama_siswa'] = $r['nama_siswa'];
				$data['alamat_siswa'] = $r['alamat_siswa'];
				$data['jenkel_siswa'] = $r['jenkel_siswa'];
				$data['hp_siswa'] = $r['hp_siswa'];
				$data['photo_siswa'] = $r['photo_siswa'];
				$data['id_ortu'] = $r['id_ortu'];
				$data['id_kelas_jurusan'] = $id_kelas_jurusan;
				$data['id_tahun'] = $id_tahun;
				$data['account'] = $r['account'];
				$hasil = $this->m_siswa->add_data($data);

				$id = $r['id_siswa'];
				$data1['status'] = 1;
				$this->m_siswa->update_data($id,$data1);
			}
			$id = $this->input->post('kelas_jurusan');
			if ($hasil == 0){
				$this->session->set_flashdata('alert','Transfer Data Berhasil');
				redirect('c_siswa/tampil/'.$id);
			} else {
				$this->session->set_flashdata('alert','Transfer Data Gagal');
				redirect('c_siswa/tampil/'.$id);
			}
		}
	}

	public function upload(){
		$fileName = time().$_FILES['file']['name'];
		
		$config['upload_path'] = FCPATH .'uploads/excel/siswa/';
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
            		"nis"=> $rowData[0][0],
            		"nama_siswa"=> $rowData[0][1],
            		"jenkel_siswa"=> $rowData[0][2],
            		"alamat_siswa"=> $rowData[0][3],
            		"hp_siswa"=> $rowData[0][4],
            		"id_ortu"=> $rowData[0][5],
            		"id_kelas_jurusan"=> $this->input->post('id_kelas_jurusan'),
            		"id_tahun"=> $_SESSION['id_tahun'],
            		"status"=> 0,
            		"account"=> $rowData[0][6],
            	);
            	
                //sesuaikan nama dengan nama tabel
            	$insert = $this->db->insert("siswa",$data);
            	delete_files($config['upload_path'],TRUE);
            	
            }
            redirect('c_siswa/tampil/'.$this->input->post('id_kelas_jurusan'));
        }

        public function seleksi()
        {
        	$id_kelas_jurusan = $this->input->post('id_kelas_jurusan');
        	$id_tahun = $this->input->post('id_tahun');
        	$data = $this->input->post('data');
        	foreach ($data as $d) {
        		if(ISSET($d['status'])){
        			$dat['nis'] = $d['nis'];
        			$dat['nama_siswa'] = $d['nama_siswa'];
        			$dat['alamat_siswa'] = $d['alamat_siswa'];
        			$dat['jenkel_siswa'] = $d['jenkel_siswa'];
        			$dat['hp_siswa'] = $d['hp_siswa'];
        			$dat['photo_siswa'] = $d['photo_siswa'];
        			$dat['id_ortu'] = $d['id_ortu'];
        			$dat['id_kelas_jurusan'] = $id_kelas_jurusan;
        			$dat['id_tahun'] = $id_tahun;
        			$data['account'] = $r['account'];
        			$hasil = $this->m_siswa->add_data($dat);

        			$id = $d['id_siswa'];
        			$data1['status'] = $d['status'];
        			$this->m_siswa->update_data($id,$data1);
        		}
        	}

        	$id = $this->input->post('kelas_jurusan');
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Transfer Data Berhasil');
        		redirect('c_siswa/tampil/'.$id);
        	} else {
        		$this->session->set_flashdata('alert','Transfer Data Gagal');
        		redirect('c_siswa/tampil/'.$id);
        	}
        }

        public function tampil()
        {
        	if ($this->input->post('id_kelas_jurusan')==NULL){
        		$id = $this->uri->segment(3);
        		
        	} else {
        		$id = $this->input->post('id_kelas_jurusan');
        	}
        	$data['tahun'] = $this->m_tahun->get_data()->result_array();
        	$data['kelas_jurusan'] = $this->m_kelas_jurusan->get_data()->result_array();
        	$data['id_kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id)->row();
        	$data['ortu'] = $this->m_ortu->get_data()->result_array();
        	$data['siswa'] = $this->m_siswa->get_siswa($id)->result_array();
        	$hasil = $this->m_siswa->get_siswa($id)->result_array();

        	$jumlah = 0;
        	foreach ($hasil as $h) {
        		$jumlah = $jumlah + $h['status']; 
        	}
        	$data['status_hasil'] = $jumlah;
        	$this->template->load('index','siswa/siswa',$data);
        }

        public function tambah_banyak()
        {
        	$id = $this->input->post('id_kelas_jurusan');
        	$data['id_kelas_jurusan'] = $this->m_kelas_jurusan->get_one($id)->row();
        	$data['banyak_input'] = $this->input->post('banyak_input');
        	$data['siswa'] = $this->m_siswa->get_one()->result_array();
        	$data['ortu'] = $this->m_ortu->get_data()->result_array();
        	$this->template->load('index','siswa/tambah_siswa',$data);
        }

        public function input()
        {
        	
        	$config['upload_path']          = './uploads/';
        	$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
	    // $config['max_size']             = 1000;
	    // $config['max_width']            = 1300;
	    // $config['max_height']           = 1024;

        	$id = $this->input->post('id_kelas_jurusan');
        	$data = $this->input->post('data');
        	$no = 1;
        	foreach ($data as $d) {
        		$config['encrypt_name'] = TRUE;
        		$this->load->library('upload', $config);
        		$this->upload->do_upload('userfile'.$no);

        		$upload = $this->upload->data();
        		$photo = 'uploads/'.$upload['file_name'];

        		$d1['id_kelas_jurusan'] = $id;
        		$d1['photo_siswa'] = $photo;
        		$d1['id_tahun'] = $_SESSION['id_tahun'];
        		$d1['nis'] = $d['nis'];
        		$d1['nama_siswa'] = $d['nama_siswa'];
        		$d1['jenkel_siswa'] = $d['jenkel_siswa'];
        		$d1['alamat_siswa'] = $d['alamat_siswa'];
        		$d1['hp_siswa'] = $d['hp_siswa'];
        		$d1['id_ortu'] = $d['id_ortu'];
        		if ($d['user']!=null){
        			$d1['account']=1;
        		} else {
        			$d1['account']=0;
        		}

        		$user = $d['user'];
        		if ($user!=null){
        			$data1['username'] = $d['nis'];
        			$data1['password'] = md5($d['nis']);
        			$data1['id_hak_akses'] = 3;
        			$data1['status'] = 1;
        			$hasil = $this->m_pengguna->add_data($data1);
        		}

        		$hasil = $this->m_siswa->add_data($d1);		
        		$no++;
        	}
        	$id = $this->input->post('id_kelas_jurusan');
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Tambah Data Berhasil');
        		redirect('c_siswa/tampil/'.$id);
        	} else {
        		$this->session->set_flashdata('alert','Tambah Data Gagal');
        		redirect('c_siswa/tampil/'.$id);
        	}
        }

        public function account()
        {
        	$id = $this->uri->segment(3);
        	$siswa = $this->m_siswa->get_data($id)->row();
        	$data['username'] = $siswa->nis;
        	$data['password'] = md5($siswa->nis);
        	$data['id_hak_akses'] = 3;
        	$data['status'] = 1;

        	$data1['account']=1;
        	$this->m_siswa->update_data($id,$data1);
        	
        	$hasil = $this->m_pengguna->add_data($data);
        	$id = $siswa->id_kelas_jurusan;
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','User "'.$siswa->nis.'" Telah Aktif');
        		redirect('c_siswa/tampil/'.$id);
        	} else {
        		$this->session->set_flashdata('alert','User "'.$siswa->nis.'" Gagal Aktif');
        		redirect('c_siswa/tampil/'.$id);
        	}
        }

        public function tambah()
        {
        	$config['upload_path']          = './uploads/';
        	$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
        // $config['max_size']             = 1000;
        // $config['max_width']            = 1300;
        // $config['max_height']           = 1024;
        	$config['encrypt_name'] = TRUE;
        	$this->load->library('upload', $config);
        	$this->upload->do_upload('userfile');
        	$upload = $this->upload->data();
        	$photo = 'uploads/'.$upload['file_name'];
        	$data['nis'] = $this->input->post('nis');
        	$data['nama_siswa'] = $this->input->post('nama_siswa');
        	$data['jenkel_siswa'] = $this->input->post('jenkel_siswa');
        	$data['alamat_siswa'] = $this->input->post('alamat_siswa');
        	$data['hp_siswa'] = $this->input->post('hp_siswa');
        	$data['id_ortu'] = $this->input->post('id_ortu');
        	$data['photo_siswa'] = $photo;
        	$data['id_tahun'] = $_SESSION['id_tahun'];
        	$data['id_kelas_jurusan'] = $this->input->post('id_kelas_jurusan');
        	$id = $this->input->post('id_kelas_jurusan');

        	if ($this->input->post('user')!=null){
        		$data['account']=1;
        	} else {
        		$data['account']=0;
        	}

        	$hasil = $this->m_siswa->add_data($data);
        	$user = $this->input->post('user');
        	if ($user!=null){
        		$data1['username'] = $data['nis'];
        		$data1['password'] = md5($data['nis']);
        		$data1['id_hak_akses'] = 3;
        		$data1['status'] = 1;
        		$hasil = $this->m_pengguna->add_data($data1);
        	}
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Tambah Data Berhasil');
        		redirect('c_siswa/tampil/'.$id);
        	} else {
        		$this->session->set_flashdata('alert','Tambah Data Gagal');
        		redirect('c_siswa/tampil');
        	}
        }

        public function hapus()
        {
        	$id = $this->uri->segment(4);
        	$siswa = $this->m_siswa->get_data($id)->row();
        	if ($siswa->account==1){
        		$nis = $siswa->nis;
        		$pengguna = $this->m_pengguna->get_by_nis($nis)->row();
        		$id_user = $pengguna->id_user;
        		$this->m_pengguna->del_data($id_user);
        	}
        	$nama = $siswa->photo_siswa;
        	$config['photo'] = FCPATH.$nama;

        	delete_files($config['photo'],TRUE);

        	$hasil = $this->m_siswa->del_data($id);
        	$id = $this->uri->segment(3);
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Hapus Data Berhasil');
        		redirect('c_siswa/tampil/'.$id);
        	} else {
        		$this->session->set_flashdata('alert','Hapus Data Gagal');
        		redirect('c_siswa/tampil');
        	}
        }

        public function edit()
        {
        	$id = $this->uri->segment(3);
        	$data['kelas'] = $this->m_kelas->get_data()->result_array();
        	$data['jurusan'] = $this->m_jurusan->get_data()->result_array();
        	$data['ortu'] = $this->m_ortu->get_data()->result_array();
        	$data['siswa'] = $this->m_siswa->get_data($id)->row();
        	$this->template->load('index','siswa/edit_siswa',$data);
        }

        public function update()
        {
        	$id = $this->input->post('id_siswa');
        	$config['upload_path']          = './uploads/';
        	$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
        	$config['encrypt_name'] = TRUE;
        	$this->load->library('upload', $config);
        	$nilai = $this->upload->do_upload('userfile');
        	if (ISSET($nilai)){
        		$upload = $this->upload->data();
        		$photo = 'uploads/'.$upload['file_name'];
        		$data['photo_siswa'] = $photo;

        	}
        	$photo = 'uploads/'.$upload['file_name'];
        	$data['nis'] = $this->input->post('nis');
        	$data['nama_siswa'] = $this->input->post('nama_siswa');
        	$data['jenkel_siswa'] = $this->input->post('jenkel_siswa');
        	$data['alamat_siswa'] = $this->input->post('alamat_siswa');
        	$data['hp_siswa'] = $this->input->post('hp_siswa');
        	$data['id_ortu'] = $this->input->post('id_ortu');
        	$hasil = $this->m_siswa->update_data($id,$data);
        	$id = $this->input->post('id_kelas_jurusan');		
        	if ($hasil == 0){
        		$this->session->set_flashdata('alert','Update Data Berhasil');
        		redirect('c_siswa/tampil/'.$id);
        	} else {
        		$this->session->set_flashdata('alert','Update Data Gagal');
        		redirect('c_siswa/tampil');
        	}
        }

    }
