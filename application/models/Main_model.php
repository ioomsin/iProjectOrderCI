<?php 
class Main_model extends CI_Model {
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function select_item_home()
	{
		//$query = $this->db->get_where("Items", array("ActiveStatus" => "1"));
		$this->db->select("*")
		->from("Items")
		->where("Items.ActiveStatus", 1)
		->order_by("ItemCode", "DESC")
		->limit(3);
	
		$query	= $this->db->get();
		$result = $query->result_array();
	
		return $result;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	/*public function select($tbl)
	{
		$query = $this->db->get_where($tbl, array("ActiveStatus" => "1"));	
		$result = $query->result_array();
		
		return $result;
	}*/
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	/*public function select_id($tbl, $filed, $id)
	{
		$query = $this->db->get_where($tbl, array($filed => $id));
		$row = $query->row_array();
		
		return $row;
	}*/
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	/*public function add_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		$id = $this->db->insert_id();
		
		return $id;
	}*/
	
	/////////////////////////////////------------------------------------------------------	
	/*public function update_data($tbl, $filed, $id, $data)
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
	}*/
	
	/////////////////////////////////------------------------------------------------------
	/*public function delete_data($tbl, $filed, $id)
	{
		$query = $this->db->get_where($tbl, array( $filed => $id, "ActiveStatus" => "1"));
		$row = $query->row_array();
		
		if($row[$filed]!="")
		{
			//ź�͡�ҡ���ҧ
			//$this->db->where('animal_id', $id);
			//$this->db->delete('animals');
			
			//Update ʶҹ� �� �����ҹ
			$data['ActiveStatus'] = '0';
			$this->db->where($filed, $row[$filed])->update($tbl, $data);
		}
		else
		{
			echo "ERROR !!! No ID";
		}
	}*/
	
	/////////////////////////////////------------------------------------------------------
	public function getCode($tbl, $filed)
	{
		$this->db->select_max($filed);
		$query = $this->db->get($tbl);
		$row = $query->row_array();
		
		return $row;
	}
	
	/////////////////////////////////------------------------------------------------------
	public function dropdown($tbl, $fieldValue, $fieldName, $filedWhere, $WhereID)
	{
		$query	=	$this->db->select("*")->where($filedWhere, $WhereID)->get($tbl);
		$result	=	$query->result_array();

		foreach ($result as $rs){
			$x[$rs[$fieldValue]] = $rs[$fieldName];
		};
		
		return $x;
	}
	
	/////////////////////////////////------------------------------------------------------
	/*public function autocomplete($tbl, $fieldName, $filedWhere, $WhereID)
	{
		$query	=	$this->db->select("*")->where($filedWhere, $WhereID)->get($tbl);
		$result	=	$query->result_array();
		
		$x=array();
		foreach ($result as $rs){
			$x[] = $rs[$fieldName];
		};
		
		return json_encode($x);
	}*/
	/////////////////////////////////------------------------------------------------------
	/*public function autocomplete_obj($tbl, $fieldName, $filedWhere, $WhereID)
	{
		$query	=	$this->db->select("*")->where($filedWhere, $WhereID)->get($tbl);
		$result	=	$query->result_array();
	
		$x=array();
		foreach ($result as $rs){
			//var availableTags = [{label:"John", value:"Doe"}];
			$new_xxx['label']=$rs["CustomerCode"];
			$new_xxx['value']=$rs["CustomerName"];
			$new_xxx['other']=$rs["CustomerAddress"];
			$x[] = $new_xxx; // an array	
		};
		
		//echo json_encode($x); exit;
		return json_encode($x);
	} */
	
}	// End Class