<?php 
class Model_Unit extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select()
	{
		$query = $this->db->get_where("Units", array("ActiveStatus" => "1"));	
		$result = $query->result_array();
		
		return $result;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_id($id)
	{
		$query = $this->db->get_where("Units", array("UnitID" => $id));
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
	
	public function update_data($table, $id, $data)
	{
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
		$query = $this->db->get_where("Units", array("UnitID" => $id, "ActiveStatus" => "1"));
		$row = $query->row_array();
		
		if($row['UnitID']!="")
		{
			$data['ActiveStatus'] = '0';
			$this->db->where("UnitID", $row['UnitID']);
		   	$this->db->update("Units", $data);
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