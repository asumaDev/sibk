<?php
class M_kelas extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_kelas',$id);
		}
		return $this->db->get('kelas');
	}

	public function add_data($data)
	{
		$this->db->insert('kelas',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_kelas',$id);
		$this->db->delete('kelas');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_kelas',$id);
		$this->db->update('kelas',$data);
	}

}
