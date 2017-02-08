<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Customers/Model_Customer");
		
	}
	
	public function index()
	{
		$this->db->order_by("CustomerCode", "ASC");
		$data["result"] = $this->Model_Customer->select();
		
		$this->theme->loadtheme('Customers/CustomerHome', $data);
	}
	
	public function CustomerForm()
	{
		$proc = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		if( $proc == "Add" ){
			
			$this->theme->loadtheme('Customers/CustomerForm');
			
		}else{
			
			$data = $this->Model_Customer->select_id($id);
			$this->theme->loadtheme('Customers/CustomerForm', $data);
		}
	}
	
	public function ManageDataCustomer()
	{
		$proc = $this->input->post('proc');
		$id = $this->input->post('CustomerCode');
		
		$data['CustomerName'] 	=  $this->input->post('CustomerName');
		$data['CustomerAddress'] 	=  $this->input->post('CustomerAddress');
		
		if($proc == "Add")
		{
			$data['CustomerCode'] 	=  $this->GenCode("Customers", "CustomerCode");
						
			$this->Model_Customer->add_data("Customers", $data);
			
		}else if($proc == "Edit"){

			$this->Model_Customer->update_data("Customers", $id, $data);
			
		}
		
		redirect("Customers/index");
			
	}
	
	public function DeleteCustomer()
	{
		$id = $this->uri->segment(4);
		$data = $this->Model_Customer->select_id($id);

		if($data['CustomerCode'] != "" ){
			$this->Model_Customer->delete_data($id);
		}
		redirect("Customers/index");
	}
	
	public function GenCode($tbl, $filedCode)
	{
		$data = $this->Model_Customer->getCode($tbl, $filedCode);
		$year = substr((date("Y")+543) , 2 , 2);
		$month = date("m");
		$prefix = "CT";
		
		if( empty($data[$filedCode]) ){
			
			$genCode = $prefix.$year.$month.sprintf("%04d", 1);
			
		}else{
			
			$subCode = ( substr( $data[$filedCode], 6, 4) + 1 );
			$genCode = $prefix.$year.$month.sprintf("%04d" , $subCode);
			//echo $subCode ." || ". $genCode ;
			
		}
		//exit;
		return $genCode;
	}
	
}	// ### END Class
