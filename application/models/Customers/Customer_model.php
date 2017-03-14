<?php 
class Customer_model extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select()
	{
		$query = $this->db->get_where("Customers", array("ActiveStatus" => "1"));	
		$result = $query->result_array();
		
		return $result;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_id($id)
	{
		$query = $this->db->get_where("Customers", array("CustomerCode" => $id));
		$row = $query->row_array();
		
		return $row;
	}	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function add_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		return $this->db->insert_id();
	}
	/////////////////////////////////------------------------------------------------------
	
	public function update_data($tbl, $id, $data)
	{
		$query = $this->db->get_where($tbl, array("CustomerCode" => $id));
		$row = $query->row_array();
			if($row['CustomerCode']!="")
			{
				$this->db->where("CustomerCode", $id);
				$this->db->update($tbl, $data);
			}else{
				echo "ERROR !!! No ID";
			}
	}
	/////////////////////////////////------------------------------------------------------
	function delete_data($id)
	{
		$query = $this->db->get_where("Customers", array("CustomerCode" => $id, "ActiveStatus" => "1"));
		$row = $query->row_array();
		
		if($row['CustomerCode']!="")
		{
			$data['ActiveStatus'] = '0';
			
			$this->db->where("CustomerCode", $id);
		   	$this->db->update("Customers", $data);
		}
		else
		{
			echo "ERROR !!! No ID";
		}
	}
	/////////////////////////////////------------------------------------------------------
	function getCode($tbl, $filed)
	{
		$this->db->select_max($filed);
		$query = $this->db->get($tbl);
		$row = $query->row_array();
		
		return $row;
	}
	/////////////////////////////////------------------------------------------------------
	
}	// End Class