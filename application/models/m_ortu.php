<?php
class M_ortu extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_ortu',$id);
		}
		$this->db->order_by('nama_ortu','ASC');
		return $this->db->get('ortu');
	}

	public function add_data($data)
	{
		$this->db->insert('ortu',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_ortu',$id);
		$this->db->delete('ortu');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_ortu',$id);
		$this->db->update('ortu',$data);
	}

}
