<?php
class M_penilaian_siswa extends CI_Model {

	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_penilaian_siswa',$id);
		}
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('siswa as s','p.id_siswa=s.id_siswa');
		$this->db->order_by('s.nama_siswa','ASC');
		return $this->db->get('penilaian_siswa as p');
	}

	public function get_one($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('s.id_kelas_jurusan',$id);
		}
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('siswa as s','p.id_siswa=s.id_siswa');
		$this->db->order_by('s.nama_siswa','ASC');
		return $this->db->get('penilaian_siswa as p');
	}

	public function get_by_siswa($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_siswa',$id);
		}
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('siswa as s','p.id_siswa=s.id_siswa');
		$this->db->order_by('s.nama_siswa','ASC');
		return $this->db->get('penilaian_siswa as p');
	}

	public function add_data($data)
	{
		$this->db->insert('penilaian_siswa',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_penilaian_siswa',$id);
		$this->db->delete('penilaian_siswa');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_penilaian_siswa',$id);
		$this->db->update('penilaian_siswa',$data);
	} 

}
