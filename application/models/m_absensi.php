<?php
class M_absensi extends CI_Model {

	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_absensi',$id);
		}
		$this->db->join('tahun as t','a.id_tahun=t.id_tahun');
		$this->db->join('siswa as s','a.id_siswa=s.id_siswa');
		$this->db->join('kelas_jurusan as k','s.id_kelas_jurusan=k.id_kelas_jurusan');
		return $this->db->get('absensi as a');
	}

	public function get_one($id=NULL,$date=NULL)
	{
		$this->db->where('s.id_kelas_jurusan',$id);
		$this->db->where('a.tanggal_absensi',$date);
		$this->db->where('a.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('siswa as s','a.id_siswa=s.id_siswa');
		$this->db->join('kelas_jurusan as k','s.id_kelas_jurusan=k.id_kelas_jurusan');
		return $this->db->get('absensi as a');
	}

	public function get_by_range($id,$awal,$akhir)
	{
		$this->db->where('s.id_siswa',$id);
		$this->db->where('tanggal_absensi >=',$awal);
		$this->db->where('tanggal_absensi <=',$akhir);
		$this->db->where('a.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('siswa as s','a.id_siswa=s.id_siswa');
		$this->db->join('kelas_jurusan as k','s.id_kelas_jurusan=k.id_kelas_jurusan');
		return $this->db->get('absensi as a');
	}

	public function add_data($data)
	{
		$this->db->insert('absensi',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_absensi',$id);
		$this->db->delete('absensi');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_absensi',$id);
		$this->db->update('absensi',$data);
	} 

}
