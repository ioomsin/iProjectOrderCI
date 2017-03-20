<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Customers/Customer_model");
		
	}
	
	public function index()
	{
		$this->db->order_by("CustomerCode", "ASC");
		$data["result"] = $this->Customer_model->select();
		
		$this->theme->loadtheme('Customers/CustomerHome', $data);
	}
	
	public function CustomerForm()
	{
		$proc = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		if( $proc == "Add" ){
			
			$this->theme->loadtheme('Customers/CustomerForm');
			
		}else{
			
			$data = $this->Customer_model->select_id($id);
			$this->theme->loadtheme('Customers/CustomerForm', $data);
		}
	}
	
	public function ManageDataCustomer()
	{
		$proc = $this->input->post('proc');
		$id = $this->input->post('CustomerCode');
		
		$FN = $this->input->post('FirstName');
		$LN = $this->input->post('LastName');
		
		$data['FirstName'] 			=  $this->input->post('FirstName');
		$data['LastName'] 			=  $this->input->post('LastName');
		$data['CustomerName'] 		=  $FN.' '.$LN;
		$data['Email'] 				=  $this->input->post('Email');
		$data['CustomerAddress'] 	=  $this->input->post('CustomerAddress');
		
		if($proc == "Add")
		{
			$data['CustomerCode'] 	=  $this->GenCode("Customers", "CustomerCode");
						
			$this->Customer_model->add_data("Customers", $data);
			
		}else if($proc == "Edit"){

			$this->Customer_model->update_data("Customers", $id, $data);
			
		}
		
		//redirect("Customers/index");
			
	}
	
	public function DeleteCustomer()
	{
		$id = $this->uri->segment(4);
		$data = $this->Customer_model->select_id($id);

		if($data['CustomerCode'] != "" ){
			$this->Customer_model->delete_data($id);
		}
		redirect("Customers/index");
	}
	
	public function GenCode($tbl, $filedCode)
	{
		$data = $this->Customer_model->getCode($tbl, $filedCode);
		$year = substr((date("Y")+543), 2, 2);
		$month = date("m");
		$prefix = "CT";
		
		if( empty($data[$filedCode]) ){
			
			$genCode = $prefix.$year.$month.sprintf("%04d", 1);
			
		}else{
			
			$subCode = (substr( $data[$filedCode], 6, 4)+1);
			$genCode = $prefix.$year.$month.sprintf("%04d" , $subCode);
			//echo $subCode ." || ". $genCode ;
			
		}
		//exit;
		return $genCode;
	}
	
}	// ### END Class
