<?php
class Customer_m extends CI_Model {

	var $table = "customer";

	

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($id != null) {
			$this->db->where('customer_id', $id);
		} 
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params['name'] = $data['name'];
		$params['gender'] = $data['gender'];
		$params['phone'] = ($data['phone']);
		$params['address'] = $data['address'];

		$this->db->insert($this->table, $params);
	}
 
	public function edit()
	{
		$data = $this->input->post(null, TRUE);
		
		$params['name'] = $data['name'];
		$params['gender'] = $data['gender'];
		$params['phone'] = ($data['phone']);
		$params['address'] = $data['address'];
		$params['updated'] = date('Y-m-d H:i:s');

		$this->db->where('customer_id', $data['customer_id']);
		$this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('customer_id', $id);
        $this->db->delete($this->table);
	}

}

