<?php
class Supplier_m extends CI_Model {

	var $table = "supplier";

	

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($id != null) {
			$this->db->where('supplier_id', $id);
		} 
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params['name'] = $data['name'];
		$params['phone'] = ($data['phone']);
		$params['address'] = $data['address'];
		$params['description'] = $data['description'];	

		$this->db->insert($this->table, $params);
	}
 
	public function edit()
	{
		$data = $this->input->post(null, TRUE);
		
		$params['name'] = $data['name'];
		$params['phone'] = $data['phone'];
		$params['address'] = $data['address'];
		$params['description'] = $data['description'];
		$params['updated'] = date('Y-m-d H:i:s');

		$this->db->where('supplier_id', $data['supplier_id']);
		$this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('supplier_id', $id);
        $this->db->delete($this->table);
	}

}

