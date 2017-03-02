<?php 
class Model_Item extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_item_home($id)
	{
		
		$this->db->select("Items.*, Units.UnitName")
					->from("Items")
					->join("Units","Items.ItemUnit = Units.UnitCode", "LEFT")
					->where("Items.ItemCode", $id)
					->where("Items.ActiveStatus", 1);
		
		$query	= $this->db->get();
		$row = $query->row_array();
		
		return $row;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select()
	{
		$query = $this->db->get_where("Items", array("ActiveStatus" => "1"));	
		$result = $query->result_array();
		
		return $result;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_id($id)
	{
		$query = $this->db->get_where("Items", array("ItemCode" => $id));
		$row = $query->row_array();
		
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
			//ź�͡�ҡ���ҧ
			//$this->db->where('animal_id', $id);
			//$this->db->delete('animals');
			
			//Update ʶҹ� �� �����ҹ
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