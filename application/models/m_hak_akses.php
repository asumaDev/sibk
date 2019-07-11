<?php
class M_hak_akses extends CI_Model {

	public function get_data($id=NULL)
	{
		return $this->db->get('hak_akses');
	}

}
