<?php
class Unit_m extends CI_Model {

	var $table = "satuan";

	

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($id != null) {
			$this->db->where('unit_id', $id);
		} 
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params['uname'] = $data['uname'];
	
		$this->db->insert($this->table, $params);
	}
 
	public function edit()
	{
		$data = $this->input->post(null, TRUE);
		
		$params['uname'] = $data['uname'];
		
		$params['updated'] = date('Y-m-d H:i:s');

		$this->db->where('unit_id', $data['unit_id']);
		$this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('unit_id', $id);
        $this->db->delete($this->table);
	}

}

