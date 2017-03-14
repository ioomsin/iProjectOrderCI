<?php 
class Autocomplete_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function get_autocomplete($tbl, $q="",$fieldKeyUp="",$fieldShow=""){
		
		$this->db->select("*")->like($fieldKeyUp, $q)->where($tbl.".ActiveStatus",1)->limit(10);
	
		$query = $this->db->get($tbl);
		$result = $query->result_array();
		$num_rows = $query->num_rows();
	
		$row_set = array();
		if( $num_rows > 0 ){
			foreach ( $result as $row ){
				$new_row['label'] = htmlspecialchars(stripslashes($row[$fieldKeyUp]));
				$new_row['value'] = htmlspecialchars(stripslashes($row[$fieldShow]));
				$row_set[] = $new_row;
			}
			
			return json_encode($row_set);
			
		}else{
			
			return json_encode(array());
			
		}
	
	} //END function  get_autocomplete
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function get_autocomplete_obj($tbl, $q="",$fKey="",$fShow=""){
	
		$this->db->select("*")->like($fKey, $q)->or_like($fShow[0], $q)->limit(10);
		$query 	= $this->db->get($tbl);
		
		$result	= $query->result_array();
		$rows 	= $query->num_rows();
		$row_set=array();
		
		$j=0;
		$json="[" ;
		foreach ( $result as $row){
			$json_all_show="";
			if(count($fShow)>0){
				$json_all_show .= ',"fShow":[';
				foreach($fShow as $f_index => $f_name){
					$json_all_show .= "\"".trim(htmlspecialchars(stripslashes($row[$f_name])))."\",";
				}
				$json_all_show = substr($json_all_show,0,-1).']';
			}
			$json .= '{
						"value":"'.htmlspecialchars(stripslashes($row[$fKey])).'",
						"fKey":"'.htmlspecialchars(stripslashes($row[$fKey])).'"
						'.$json_all_show.'
					  }';
			$j++;
			if($j<$rows) $json .= ",";
		}
		$json.="]";
		
		return $json;
	} //END function get_autocomplete_obj
	
}	// End Class