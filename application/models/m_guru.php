<?php
class M_guru extends CI_Model {
	
	public function get_data()
	{
		$this->db->where('g.id_tahun',$_SESSION['id_tahun']);
		$this->db->join('jabatan as j','g.id_jabatan=j.id_jabatan');
		$this->db->order_by('g.nama_guru','ASC');
		return $this->db->get('guru as g');
	}

	public function get_jabatan($id_jabatan)
	{
		$this->db->where('g.id_jabatan',$id_jabatan);		
		$this->db->join('jabatan as j','g.id_jabatan=j.id_jabatan');
		$this->db->order_by('g.nama_guru','ASC');
		return $this->db->get('guru as g');
	}

	public function get_one($id=NULL)
	{
		if ($id==NULL){

		} else {
			$this->db->where('g.id_guru',$id);
		}
		$this->db->join('jabatan as j','g.id_jabatan=j.id_jabatan');
		$this->db->order_by('g.nama_guru','ASC');
		return $this->db->get('guru as g');
	}

	public function add_data($data)
	{
		$this->db->insert('guru',$data);
	}

	public function del_data($id)
	{
		$this->db->where('id_guru',$id);
		$this->db->delete('guru');
	}

	public function update_data($id,$data)
	{
		$this->db->where('id_guru',$id);
		$this->db->update('guru',$data);
	}

}
