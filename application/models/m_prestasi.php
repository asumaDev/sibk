<?php
class M_prestasi extends CI_Model {
	
	public function get_data($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_prestasi',$id);
		}
		$this->db->join('kat_prestasi as k','p.id_kat_prestasi = k.id_kat_prestasi');
		return $this->db->get('prestasi as p');
	}

	public function get_one($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('p.id_kat_prestasi',$id);
		}
		$this->db->join('kat_prestasi as k','p.id_kat_prestasi = k.id_kat_prestasi');
		return $this->db->get('prestasi as p');
	}


	public function add_data($data)
	{
		$this->db->insert('prestasi',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_prestasi',$id);
		$this->db->delete('prestasi');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_prestasi',$id);
		$this->db->update('prestasi',$data);
	}

}
