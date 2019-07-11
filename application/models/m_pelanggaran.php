<?php
class M_pelanggaran extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_pelanggaran',$id);
		}
		$this->db->join('kat_pelanggaran as k','p.id_kat_pelanggaran = k.id_kat_pelanggaran');
		return $this->db->get('pelanggaran as p');
	}

	public function get_one($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_kat_pelanggaran',$id);
		}
		$this->db->join('kat_pelanggaran as k','p.id_kat_pelanggaran = k.id_kat_pelanggaran');
		return $this->db->get('pelanggaran as p');
	}

	public function add_data($data)
	{
		$this->db->insert('pelanggaran',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_pelanggaran',$id);
		$this->db->delete('pelanggaran');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_pelanggaran',$id);
		$this->db->update('pelanggaran',$data);
	}

}
