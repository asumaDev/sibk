<?php
class M_kat_prestasi extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('id_kat_prestasi',$id);
		}
		return $this->db->get('kat_prestasi');
	}

	public function add_data($data)
	{
		$this->db->insert('kat_prestasi',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_kat_prestasi',$id);
		$this->db->delete('kat_prestasi');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_kat_prestasi',$id);
		$this->db->update('kat_prestasi',$data);
	}

}
