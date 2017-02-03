<?php 
class Model_Item extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select()
	{
		$query = $this->db->get_where("Items", array("ActiveStatus" => "1"));	
		$rows = $query->result_array();
		return $rows;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_id($id)
	{
		$query = $this->db->get_where("Items", array("ItemCode" => $id));
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
	
	public function update_id($id, $data)
	{
		//$this->db->select("*")->from("plants")->where("plant_id",$id)->where("active_status",'1');
		//$row = $this->db->get()->row_array();
		$query = $this->db->get_where("plants", array("plant_id" => $id));
		$row = $query->row_array();
			if($row['plant_id']!="")
			{
				$this->db->where("plant_id", $id);
				$this->db->update("plants", $data);
			}else{
				echo "ERROR !!! No ID";
			}
	}
	/////////////////////////////////------------------------------------------------------
	function delete_id($id)
	{
		//$this->db->select("*")->from($table)->where($filed, $id)->where("active_status",'1');
		//$row = $this->db->get()->row_array();
		$query = $this->db->get_where("plants", array("plant_id" => $id, "active_status" => "1"));
		$row = $query->row_array();
		if($row['plant_id']!="")
		{
			//ลบออกจากตาราง
			//$this->db->where('animal_id', $id);
			//$this->db->delete('animals');
			
			//Update สถานะ เป็น ไม่ใช้งาน
			$data['active_status'] = '0';
			$this->db->where("plant_id", $row['plant_id']);
		   	$this->db->update("plants", $data);
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