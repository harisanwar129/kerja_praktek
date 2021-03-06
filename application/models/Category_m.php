<?php
class Category_m extends CI_Model {

	var $table = "kategori";

	

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($id != null) {
			$this->db->where('category_id', $id);
		} 
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params['cname'] = $data['cname'];
	
		$this->db->insert($this->table, $params);
	}
 
	public function edit()
	{
		$data = $this->input->post(null, TRUE);
		
		$params['cname'] = $data['cname'];
		
		$params['updated'] = date('Y-m-d H:i:s');

		$this->db->where('category_id', $data['category_id']);
		$this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('category_id', $id);
        $this->db->delete($this->table);
	}

}

