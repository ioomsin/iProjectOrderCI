<?php 
class Model_Order extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select($tbl)
	{
		$query = $this->db->get_where($tbl, array("ActiveStatus" => "1"));	
		$result = $query->result_array();
		
		return $result;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_id($tbl, $field, $id)
	{
		$query = $this->db->get_where($tbl, array($field => $id));
		$row = $query->row_array();
		
		return $row;
	}	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function add_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		$insert_id = $this->db->insert_id();
		
		return $insert_id;
	}
	/////////////////////////////////------------------------------------------------------
	
	public function update_data($tbl, $field, $id, $data)
	{
		$query = $this->db->get_where($tbl, array($field => $id));
		$row = $query->row_array();
			if($row[$field]!="")
			{
				$this->db->where($field, $id);
				$this->db->update($tbl, $data);
				
			}else{
				echo "ERROR !!! No ID";
			}
	}
	/////////////////////////////////------------------------------------------------------
	function delete_data($tbl, $field, $id)
	{
		$query = $this->db->get_where($tbl, array($field => $id, "ActiveStatus" => "1"));
		$row = $query->row_array();
		
		if($row[$field]!="")
		{
			//ลบออกจากตาราง
			//$this->db->where($field, $id);
			//$this->db->delete($tbl);
			
			//Update สถานะ เป็น ไม่ใช้งาน
			$data['ActiveStatus'] = '0';
			
			$this->db->where($field, $row[$field]);
		   	$this->db->update($tbl, $data);
		}
		else
		{
			echo "ERROR !!! No ID";
		}
	}
	/////////////////////////////////------------------------------------------------------
	function getCode($tbl, $field)
	{
		$this->db->select_max($field);
		$query = $this->db->get($tbl);
		$row = $query->row_array();
		
		return $row;
	}
	/////////////////////////////////------------------------------------------------------
	
}	// End Class