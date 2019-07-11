<?php
class M_kat_pelanggaran extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_kat_pelanggaran',$id);
		}
		return $this->db->get('kat_pelanggaran');
	}

	public function add_data($data)
	{
		$this->db->insert('kat_pelanggaran',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_kat_pelanggaran',$id);
		$this->db->delete('kat_pelanggaran');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_kat_pelanggaran',$id);
		$this->db->update('kat_pelanggaran',$data);
	}

}
