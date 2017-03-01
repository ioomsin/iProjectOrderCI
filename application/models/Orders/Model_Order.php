<?php 
class Model_Order extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select($tbl)
	{
		$query 	= $this->db->get_where($tbl, array("ActiveStatus" => "1"));	
		$result = $query->result_array();
		
		return $result;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_where($tbl, $field, $id)
	{
		$query 	= $this->db->get_where($tbl, array( $field => $id, "ActiveStatus" => "1" ));
		$result = $query->result_array();
	
		return $result;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_id($tbl, $field, $id)
	{
		$query 	= $this->db->get_where($tbl, array($field => $id));
		$row 	= $query->row_array();
		//print_r($query); exit;
		return $row;
	}	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function add_data($tbl, $data)
	{
		//print_r($data);
		$this->db->insert($tbl, $data);
		$insert_id = $this->db->insert_id();
		
		return $insert_id;
	}
	/////////////////////////////////------------------------------------------------------
	
	public function update_data($tbl, $field, $id, $data)
	{
		$query 	= $this->db->get_where($tbl, array($field => $id));
		$row 	= $query->row_array();

		if($row[$field]!="")
		{
			$this->db->where($field, $id);
			$this->db->update($tbl, $data);
			
		}else{
			echo "ERROR !!! No ID";
		}
		
	}
	/////////////////////////////////------------------------------------------------------
	public function update_order_status($id)
	{
		
		$this->db->select("*")
					->from("Orders")
					->join("OrderDetails","Orders.OrderNumber = OrderDetails.OrderNumber", "LEFT")
					->where("Orders.OrderNumber", $id)
					->where("Orders.ActiveStatus", 1);
		
		$query 		= $this->db->get();
		$result 	= $query->result_array();
		$num_rows	= $query->num_rows();
		
		//echo $num_rows; exit;
		if( $num_rows != 0 )
		{
			
			//$data['ActiveStatus'] = '0';
				
			$this->db->where("OrderNumber", $id);
			$this->db->update("Orders", array("Orders.ActiveStatus" => "0"));
			// $this->db->delete("Orders");
			
			$this->db->where("OrderNumber", $id);
			$this->db->update("OrderDetails", array("OrderDetails.ActiveStatus" => "0"));
			// $this->db->delete("OrederDetails");
			
			//return $result;
		}else{
			
			return false;
			
		}
		
	}
	/////////////////////////////////------------------------------------------------------
	public function delete_order($id)
	{
	
		$this->db->select("*")
					->from("Orders")
					->join("OrderDetails","Orders.OrderNumber = OrderDetails.OrderNumber", "LEFT")
					->where("Orders.OrderNumber", $id)
					->where("Orders.ActiveStatus", 1);
	
		$query 		= $this->db->get();
		$result 	= $query->result_array();
		$num_rows	= $query->num_rows();
	
		//echo $num_rows; exit;
		if( $num_rows != 0 )
		{
			
			$this->db->where("OrderNumber", $id);
			$this->db->delete("Orders");
				
			$this->db->where("OrderNumber", $id);
			$this->db->delete("OrederDetails");
				
			//return $result;
		}else{
				
			return false;
				
		}
	
	}
	/////////////////////////////////------------------------------------------------------
	/*public function getCode($tbl, $field)
	{
		$this->db->select_max($field);
		$query	= $this->db->get($tbl);
		$row	= $query->row_array();
		
		return $row;
	}*/
	
	/////////////////////////////////---------------------------------------------------------------------------------------------------------------------------------------
	
}	// End Class