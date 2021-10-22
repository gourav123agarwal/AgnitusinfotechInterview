<?php
class Common_model extends CI_Model {
 
	/**
	* Responsable for auto load the database
	* @return void
	*/
	
	function add($table,$data){
		  $this->db->insert($table, $data);
		  return $this->db->insert_id();
	}
	function update($table,$data,$condition=null){
		if(isset($condition)){
				foreach($condition as $key => $value){
					  $this->db->where($key,$value);
				}
		}
		$this->db->update($table, $data);
		return true;
  
	}
	public function getDetails()
	{
		$this->db->select('*');
		$this->db->from('table_country');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getRow($id)
	{
		$this->db->select('*');
		$this->db->from('table_country');
		$this->db->where('country_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function delete($table,$condition=null){
		if(isset($condition)){
				foreach ($condition as $key => $value){
						$this->db->where($key,$value);
			  }
		}
		$this->db->delete($table);
		return true;
	}
	
	
}
?>