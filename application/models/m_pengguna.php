<?php
class M_pengguna extends CI_Model {

	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_user',$id);
		}
		$this->db->join('hak_akses as h','l.id_hak_akses=h.id_hak_akses');
		return $this->db->get('login as l');
	}

	public function get_by_nis($nis)
	{
		$this->db->where('username',$nis);
		return $this->db->get('login as l');
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
		$this->db->where('id_user',$id);
		$this->db->delete('login');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_user',$id);
		$this->db->update('login',$data);
	} 

}
