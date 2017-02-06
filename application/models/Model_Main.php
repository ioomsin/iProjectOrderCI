<?php 
class Model_Main extends CI_Model {
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
	public function select_id($tbl, $filed, $id)
	{
		$query = $this->db->get_where($tbl, array($filed => $id));
		$row = $query->row_array();
		
		return $row;
	}	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function add_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		$id = $this->db->insert_id();
		
		return $id;
	}
	/////////////////////////////////------------------------------------------------------
	
	public function update_data($tbl, $filed, $id, $data)
	{
		//$row = $this->db->get()->row_array();
		$query = $this->db->get_where($tbl, array( $filed => $id ));
		$row = $query->row_array();
		
		if($row[$filed]!="")
		{
			$this->db->where($filed, $id);
			$this->db->update($tbl, $data);
			
		}else{
			echo "ERROR !!! No ID";
		}
	}
	/////////////////////////////////------------------------------------------------------
	function delete_data($tbl, $filed, $id)
	{
		$query = $this->db->get_where($tbl, array( $filed => $id, "ActiveStatus" => "1"));
		$row = $query->row_array();
		
		if($row[$filed]!="")
		{
			//ลบออกจากตาราง
			//$this->db->where('animal_id', $id);
			//$this->db->delete('animals');
			
			//Update สถานะ เป็น ไม่ใช้งาน
			$data['ActiveStatus'] = '0';
			$this->db->where($filed, $row[$filed]);
		   	$this->db->update($tbl, $data);
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
		return row;
	}
	/////////////////////////////////------------------------------------------------------
	
}	// End Class