<?php
class M_tahun extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_tahun',$id);
		}
		return $this->db->get('tahun');
	}

	public function add_data($data)
	{
		$this->db->insert('tahun',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_tahun',$id);
		$this->db->delete('tahun');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_tahun',$id);
		$this->db->update('tahun',$data);
	}

}
