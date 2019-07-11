<?php
class M_panggilan extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_panggilan',$id);
		}
		$this->db->join('kat_panggilan as kp','p.id_kat_panggilan=kp.id_kat_panggilan');
		$this->db->join('tahun as t','p.id_tahun=t.id_tahun');
		$this->db->join('siswa as s','p.id_siswa=s.id_siswa');
		return $this->db->get('panggilan as p');
	}

	public function get_data_kelas($id_kelas_jurusan,$id_tahun)
	{
		$this->db->where('s.id_kelas_jurusan',$id_kelas_jurusan);
		$this->db->where('p.tahun',$tahun);
		$this->db->join('kat_panggilan as kp','p.id_kat_panggilan=kp.id_kat_panggilan');
		$this->db->join('tahun as t','p.id_tahun=t.id_tahun');
		$this->db->join('siswa as s','p.id_siswa=s.id_siswa');
		return $this->db->get('panggilan as p');
	}

	public function add_data($data)
	{
		$this->db->insert('panggilan',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_panggilan',$id);
		$this->db->delete('panggilan');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_panggilan',$id);
		$this->db->update('panggilan',$data);
	}

}
