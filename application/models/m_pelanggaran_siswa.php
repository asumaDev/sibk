<?php
class M_pelanggaran_siswa extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_pelanggaran_siswa',$id);
		}
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('login as l','p.id_penginput = l.id_user');
		$this->db->join('pelanggaran as pr','p.id_pelanggaran=pr.id_pelanggaran');
		$this->db->join('kat_pelanggaran as k','pr.id_kat_pelanggaran=k.id_kat_pelanggaran');
		$this->db->join('siswa as s','p.id_siswa = s.id_siswa');
		return $this->db->get('pelanggaran_siswa as p');
	}

	public function get_siswa($id)
	{
		$this->db->where('p.id_siswa',$id);
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('login as l','p.id_penginput = l.id_user');
		$this->db->join('pelanggaran as pr','p.id_pelanggaran=pr.id_pelanggaran');
		$this->db->join('siswa as s','p.id_siswa = s.id_siswa');
		return $this->db->get('pelanggaran_siswa as p');
	}

	public function get_by_date()
	{
		$data = date('m');
		$this->db->like('p.waktu_melanggar','-'.$data.'-');
		$this->db->order_by('p.waktu_melanggar','DESC');
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('login as l','p.id_penginput = l.id_user');
		$this->db->join('pelanggaran as pr','p.id_pelanggaran=pr.id_pelanggaran');
		$this->db->join('siswa as s','p.id_siswa = s.id_siswa');
		$this->db->join('kelas_jurusan as kj','s.id_kelas_jurusan = kj.id_kelas_jurusan');
		$this->db->join('jurusan as j','kj.id_jurusan=j.id_jurusan');
		$this->db->join('kelas as kl','kj.id_kelas=kl.id_kelas');
		
		return $this->db->get('pelanggaran_siswa as p');
	}

	public function add_data($data)
	{
		$this->db->insert('pelanggaran_siswa',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_pelanggaran_siswa',$id);
		$this->db->delete('pelanggaran_siswa');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_pelanggaran_siswa',$id);
		$this->db->update('pelanggaran_siswa',$data);
	}

}
