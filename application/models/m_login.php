<?php
class M_login extends CI_Model {
	public function login($data)
	{
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
		return $this->db->get('login');
	}

	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_user',$id);
		}
		return $this->db->get('login');
	}

	public function add_data($data)
	{
		$this->db->insert('login',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_user',$id);
		$this->db->delete('login');
	}

	public function delete($id)
	{
		$this->db->where('username',$id);
		$this->db->delete('login');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_user',$id);
		$this->db->update('login',$data);
	} 

}
