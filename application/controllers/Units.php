<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Units/Model_Unit");
		
	}
	
	public function index()
	{
		$this->db->order_by("UnitCode", "ASC");
		$data["result"] = $this->Model_Unit->select();
		
		$this->theme->loadtheme('Units/UnitHome', $data);
	}
	
	public function UnitForm()
	{
		$proc = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		if( $proc == "Add" ){
			
			$this->theme->loadtheme('Units/UnitForm');
			
		}else{
			
			$data = $this->Model_Unit->select_id($id);
			$this->theme->loadtheme('Units/UnitForm', $data);
		}
	}
	
	public function ManageDataUnit()
	{
		$proc = $this->input->post('proc');
		$id = $this->input->post('UnitID');
							
		if($proc == "Add")
		{
			//$data['UnitCode'] 	=  $this->GenCode("Units", "UnitCode");
			$data['UnitCode'] 	=  $this->input->post('UnitCode');
			$data['UnitName'] 	=  $this->input->post('UnitName');
			
			$this->Model_Unit->add_data("Units", $data);
			
		}else if($proc == "Edit"){
			
			$data['UnitName'] 	=  $this->input->post('UnitName');
			
			$this->Model_Unit->update_data("Units", $id, $data);
			
		}
		
		//redirect("Units/index");
			
	}
	
	public function DeleteUnit()
	{
		$id = $this->uri->segment(4);
		$data = $this->Model_Unit->select_id($id);

		if($data['UnitID'] != "" ){
			$this->Model_Unit->delete_data($id);
		}
		redirect("Units/index");
	}
	
	public function GenCode($table, $filedCode)
	{
		$data = $this->Model_Item->getCode($table, $filedCode);
		$year = substr((date("Y")+543) , 2 , 2);
		$month = date("m");
		$prefix = "IT";
		
		if( empty($data["ItemCode"]) ){
			
			$genCode = $prefix.$year.$month.sprintf("%04d", 1);
			
		}else{
			
			$subCode = ( substr( $data["ItemCode"], 6, 4) + 1 );
			$genCode = $prefix.$year.$month.sprintf("%04d" , $subCode);
			//echo $subCode ." || ". $genCode ;
			
		}
		//exit;
		return $genCode;
	}
	
}	// ### END Class
