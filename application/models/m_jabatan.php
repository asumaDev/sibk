<?php
class M_jabatan extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_jabatan',$id);
		}
		$this->db->order_by('nama_jabatan','ASC');
		return $this->db->get('jabatan');
	}

	public function add_data($data)
	{
		$this->db->insert('jabatan',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_jabatan',$id);
		$this->db->delete('jabatan');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_jabatan',$id);
		$this->db->update('jabatan',$data);
	}

}
