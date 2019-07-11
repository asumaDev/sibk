<?php
class M_prestasi_siswa extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_prestasi_siswa',$id);
		}
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('login as l','p.id_penginput = l.id_user');
		$this->db->join('prestasi as pr','p.id_prestasi=pr.id_prestasi');
		$this->db->join('kat_prestasi as k','pr.id_kat_prestasi=k.id_kat_prestasi');
		$this->db->join('siswa as s','p.id_siswa = s.id_siswa');
		return $this->db->get('prestasi_siswa as p');
	}

	public function get_siswa($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_siswa',$id);
		}
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('login as l','p.id_penginput = l.id_user');
		$this->db->join('prestasi as pr','p.id_prestasi=pr.id_prestasi');
		$this->db->join('siswa as s','p.id_siswa = s.id_siswa');
		return $this->db->get('prestasi_siswa as p');
	}

	public function add_data($data)
	{
		$this->db->insert('prestasi_siswa',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_prestasi_siswa',$id);
		$this->db->delete('prestasi_siswa');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_prestasi_siswa',$id);
		$this->db->update('prestasi_siswa',$data);
	}

}
