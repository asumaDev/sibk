<?php
class M_kat_panggilan extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_kat_panggilan',$id);
		}
		return $this->db->get('kat_panggilan');
	}

	public function add_data($data)
	{
		$this->db->insert('kat_panggilan',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_kat_panggilan',$id);
		$this->db->delete('kat_panggilan');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_kat_panggilan',$id);
		$this->db->update('kat_panggilan',$data);
	}

}
