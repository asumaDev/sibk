<?php
class M_jurusan extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_jurusan',$id);
		}
		return $this->db->get('jurusan');
	}

	public function add_data($data)
	{
		$this->db->insert('jurusan',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_jurusan',$id);
		$this->db->delete('jurusan');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_jurusan',$id);
		$this->db->update('jurusan',$data);
	}

}
