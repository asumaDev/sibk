<?php
class M_siswa extends CI_Model {

	public function get_data($id=null)
	{
		if($id!=null){
			$this->db->where('s.id_siswa',$id);
		}
		
		$this->db->where('s.id_tahun',$_SESSION['id_tahun']);
		$this->db->order_by('s.nama_siswa','ASC');
		$this->db->join('ortu as o','s.id_ortu=o.id_ortu');
		$this->db->join('kelas_jurusan as kj','s.id_kelas_jurusan =kj.id_kelas_jurusan');
		return $this->db->get('siswa as s');
	}

	public function get_one($id=NULL)
	{
		$this->db->where('s.id_kelas_jurusan',$id);
		$this->db->where('s.id_tahun',$_SESSION['id_tahun']);
		$this->db->order_by('s.nama_siswa','ASC');
		$this->db->join('kelas_jurusan as kj','s.id_kelas_jurusan=kj.id_kelas_jurusan');
		return $this->db->get('siswa as s');
	}

	public function get_siswa($id=NULL)
	{
		$this->db->where('s.id_kelas_jurusan',$id);
		$this->db->where('s.id_tahun',$_SESSION['id_tahun']);
		$this->db->order_by('s.nama_siswa','ASC');
		return $this->db->get('siswa as s');
	}

	public function get_by_nis($nis=NULL)
	{
		$this->db->where('s.nis',$nis);
		$this->db->order_by('s.nama_siswa','ASC');
		$this->db->join('ortu as o','s.id_ortu=o.id_ortu');
		$this->db->join('kelas_jurusan as kj','kj.id_kelas_jurusan=s.id_kelas_jurusan');
		return $this->db->get('siswa as s');
	}

	public function add_data($data)
	{
		$this->db->insert('siswa',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_siswa',$id);
		$this->db->delete('siswa');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_siswa',$id);
		$this->db->update('siswa',$data);
	} 

}
