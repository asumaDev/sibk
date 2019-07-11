<?php
class M_kelas_jurusan extends CI_Model {

	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('k.id_tahun',$id);
		}
		$this->db->where('k.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('guru as g','k.id_wali_kelas=g.id_guru');
		$this->db->join('jurusan as j','k.id_jurusan=j.id_jurusan');
		$this->db->join('kelas as kl','k.id_kelas=kl.id_kelas');
		$this->db->order_by('kl.tingkat','DESC');
		return $this->db->get('kelas_jurusan as k');
	}

	public function get_one($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_kelas_jurusan',$id);
		}
		$this->db->where('k.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('guru as g','k.id_wali_kelas=g.id_guru');
		$this->db->join('jurusan as j','k.id_jurusan=j.id_jurusan');
		$this->db->join('kelas as kl','k.id_kelas=kl.id_kelas');
		return $this->db->get('kelas_jurusan as k');
	}

	public function add_data($data)
	{
		$this->db->insert('kelas_jurusan',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_kelas_jurusan',$id);
		$this->db->delete('kelas_jurusan');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_kelas_jurusan',$id);
		$this->db->update('kelas_jurusan',$data);
	} 

}
