<?php 
class Model_Order extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select()
	{
		$query = $this->db->get_where("Orders", array("ActiveStatus" => "1"));	
		$result = $query->result_array();
		
		return $result;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_id($id)
	{
		$query = $this->db->get_where(Orders, array("OrderNumber" => $id));
		$row = $query->row_array();
		//print_r($row); exit;
		return $row;
	}	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function add_data($table, $data)
	{
		//print_r($data);
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	/////////////////////////////////------------------------------------------------------
	
	public function update_data($table, $id, $data)
	{
		//$this->db->select("*")->from("plants")->where("plant_id",$id)->where("active_status",'1');
		//$row = $this->db->get()->row_array();
		$query = $this->db->get_where($table, array("ItemCode" => $id));
		$row = $query->row_array();
			if($row['ItemCode']!="")
			{
				$this->db->where("ItemCode", $id);
				$this->db->update($table, $data);
			}else{
				echo "ERROR !!! No ID";
			}
	}
	/////////////////////////////////------------------------------------------------------
	function delete_data($id)
	{
		//$this->db->select("*")->from($table)->where($filed, $id)->where("active_status",'1');
		//$row = $this->db->get()->row_array();
		$query = $this->db->get_where("Items", array("ItemCode" => $id, "ActiveStatus" => "1"));
		$row = $query->row_array();
		
		if($row['ItemCode']!="")
		{
			//ลบออกจากตาราง
			//$this->db->where('animal_id', $id);
			//$this->db->delete('animals');
			
			//Update สถานะ เป็น ไม่ใช้งาน
			$data['ActiveStatus'] = '0';
			$this->db->where("ItemCode", $row['ItemCode']);
		   	$this->db->update("Items", $data);
		}
		else
		{
			echo "ERROR !!! No ID";
		}
	}
	/////////////////////////////////------------------------------------------------------
	function getCode($table, $filed)
	{
		$this->db->select_max($filed);
		$query = $this->db->get($table);
		return $query->row_array();
	}
	/////////////////////////////////------------------------------------------------------
	
}	// End Class