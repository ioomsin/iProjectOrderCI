<?php 
class Model_Autocomplete extends CI_Model {
	function __construct(){
		parent::__construct();
	}
  /////////////////////////////////---------------------------------------------------------------------------------------------------------------------------------------
	function get_autocomplete($tbl, $q="",$fieldKeyUp="",$fieldShow=""){
		
		$this->db->limit(10);
		$this->db->select("*");	// $this->db->select($fieldKeyUp.",".$fieldShow);
		$this->db->like($fieldKeyUp, $q);
		
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
			//echo json_encode($row_set); //format the array into json data
			return json_encode($row_set);
		}
		
  } //END function  get_autocomplete
  
    /////////////////////////////////---------------------------------------------------------------------------------------------------------------------------------------
	function get_autocomplete_obj($tbl, $q="",$fKey="",$fShow=""){
		$wh = "";
		if($q){ $wh = "AND ".$fKey." LIKE '%".$q."%'"; }
		
		$all_f_name = "";
		if(count($fShow)>0){
			foreach($fShow as $f_name){
				$all_f_name .= ",".$f_name;
			}
		}

		$sql = "SELECT ".$fKey.$all_f_name." FROM ".$tbl." WHERE 1=1 ".$wh;
		
		$query = $this->db->query($sql);
		$rows = $query->num_rows();
		$row_set=array();
		$j=0;
		$json="[" ;
			foreach ($query->result_array() as $row){
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
		$json.="]" ;
		print $json;
		//return $json;
  } //END function  get_autocomplete_obj
   
  
}//END Model class