<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Orders/Order_model");
		$this->load->model("Main_model");
		$this->load->model("Autocomplete_model");
		
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function index()
	{
		
		$this->db->order_by("OrderNumber", "ASC");
		$data["result"] = $this->Order_model->select("Orders");
		
		$this->theme->loadtheme('Orders/OrderHome', $data);
		
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function OrderForm()
	{
		$proc = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		$data["dropdown"] = $this->Main_model->dropdown("Units", "UnitCode", "UnitName", "ActiveStatus", 1);

		if( $proc == "Add" ){
			
			$this->theme->loadtheme('Orders/OrderForm', $data);
			
		}else{
			
			$data["Head"] 	= $this->Order_model->select_id("Orders", "OrderNumber", $id);
			$data["Detail"] = $this->Order_model->select_where("OrderDetails", "OrderNumber", $id);
	
			$this->theme->loadtheme('Orders/OrderForm', $data);
			
		}
		
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function ManageDataOrder()
	{
		$proc = $this->input->post('proc');
		
		if ( $proc == "Add" )
		{
			/////-----------------------------------------------------------------/////
			
			$OrderNumber = $this->GenCode("Orders", "OrderNumber");
			
			$data_orders = array(
					'OrderNumber' 		=> $OrderNumber,
					'OrderDate' 		=> chg_date($this->input->post('OrderDate')),
					'CustomerCode'  	=> $this->input->post('CustomerCode'),
					'CustomerName'  	=> $this->input->post('CustomerName'),
					'CustomerAddress' 	=> $this->input->post('CustomerAddress'),
					'Remark'  			=> $this->input->post('Remark'),
					'TotalOrderPrice'  	=> $this->input->post('TotalOrderPrice')
			);
			
			$this->Order_model->add_data("Orders", $data_orders);
			
			/////-----------------------------------------------------------------/////
			
			for($i=0; $i < count($this->input->post('ItemCode')); $i++){
				$data_orderdetails = array(
						'OrderNumber' 	=> $OrderNumber,
						'ItemCode' 		=> $this->input->post('ItemCode['.$i.']'),
						'ItemName' 		=> $this->input->post('ItemName['.$i.']'),
						'OrderQty' 		=> $this->input->post('OrderQty['.$i.']'),
						'OrderUnit' 	=> $this->input->post('OrderUnit['.$i.']'),
						'OrderPrice' 	=> $this->input->post('OrderPrice['.$i.']'),
						'TotalPrice' 	=> $this->input->post('TotalPrice['.$i.']')
				);
				
				$this->Order_model->add_data("OrderDetails", $data_orderdetails);
				
			}
			
			/////-----------------------------------------------------------------/////
			
		}else if($proc == "Edit"){
			
			/////-----------------------------------------------------------------/////
			$OrderNumber = $this->input->post('OrderNumber');
			
			$data_orders = array(
					
					'OrderDate' 		=> chg_date($this->input->post('OrderDate')),
					'CustomerCode'  	=> $this->input->post('CustomerCode'),
					'CustomerName'  	=> $this->input->post('CustomerName'),
					'CustomerAddress' 	=> $this->input->post('CustomerAddress'),
					'Remark'  			=> $this->input->post('Remark'),
					'TotalOrderPrice'  	=> $this->input->post('TotalOrderPrice')
			);
			
			//## Update Head Data ##//
			$this->Order_model->update_data("Orders", "OrderNumber", $OrderNumber, $data_orders);
				
			//## Delete Details Data ##//
			$this->Order_model->delete_order_detail($OrderNumber);
			
			$CountItem = count($this->input->post('ItemCode'));
			for($i=0; $i < $CountItem; $i++){
				
				$data_orderdetails = array(
						'OrderNumber' 	=> $OrderNumber,
						'ItemCode' 		=> $this->input->post('ItemCode['.$i.']'),
						'ItemName' 		=> $this->input->post('ItemName['.$i.']'),
						'OrderQty' 		=> $this->input->post('OrderQty['.$i.']'),
						'OrderUnit' 	=> $this->input->post('OrderUnit['.$i.']'),
						'OrderPrice' 	=> $this->input->post('OrderPrice['.$i.']'),
						'TotalPrice' 	=> $this->input->post('TotalPrice['.$i.']')
				);
				
				//## Insert Details Data ##//
				$this->Order_model->add_data("OrderDetails", $data_orderdetails);
				
				/*
				$OrderID = $this->input->post('OrderID['.$i.']');
				if( $OrderID != "" ){
					$this->Model_Order->update_data("OrderDetails", "OrderID", $OrderID, $data_orderdetails);	
				}else{
					$this->Model_Order->add_data("OrderDetails", $data_orderdetails);
				}
				*/
				
			}
			
			/////-----------------------------------------------------------------/////
			
		}
		
		//redirect("Orders/index");
			
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function DeleteOrder()
	{
		$id = $this->uri->segment(4);
		$data = $this->Order_model->select_id("Orders", "OrderNumber", $id);

		if($data['OrderNumber'] != "" ){
			$this->Order_model->update_order_status($id);
		}
		
		//redirect("Orders/index");
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function ActiveOrder()
	{
		$id = $this->uri->segment(4);
		$data = $this->Order_model->select_id("Orders", "OrderNumber", $id);
	
		if($data['OrderNumber'] != "" ){
			$this->Order_model->active_order_confirm($id);
		}
	
		//redirect("Orders/index");
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function GenCode($tbl, $filedCode)
	{
		$data = $this->Main_model->getCode($tbl, $filedCode);
		$year = substr((date("Y")+543) , 2 , 2);
		$month = date("m");
		$prefix = "IT";
		
		if( empty($data[$filedCode]) ){
			
			$genCode = $prefix.$year.$month.sprintf("%04d", 1);
			
		}else{
			
			$subCode = ( substr( $data[$filedCode],6 , 4)+1);
			$genCode = $prefix.$year.$month.sprintf("%04d", $subCode);
			
		}
		return $genCode;
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function GetAutocomplete_Customer()
	{
		
		$fieldKeyUp	= $this->input->get('fieldKeyUp');
		$fieldShow 	= $this->input->get('fieldShow');		
		$term 		= $this->input->get('term', true);
		
		if (isset($term)){	//if (isset($_GET['term'])){
			
			$q = strtolower($term);
			$source = $this->Autocomplete_model->get_autocomplete("Customers", $q, $fieldKeyUp, $fieldShow);
			
			print_r($source);
			
		}else{
			
			exit;
			
		}
		
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function GetAutocompleteObj_Customer(){
		
		$fKey 	= $this->input->get('fKey');
		$fShow 	= $this->input->get('fShow');
		$term 	= $this->input->get('term');
		
		if (isset($term)){
			$q = strtolower($term);
			$source = $this->Autocomplete_model->get_autocomplete_obj("Customers", $q, $fKey, $fShow);
			
			print_r($source);
			
		}else{
			
			exit;
			
		}
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function GetAutocompleteObj_Item(){
	
		$fKey 	= $this->input->get('fKey');
		$fShow 	= $this->input->get('fShow');
		$term 	= $this->input->get('term');
	
		if (isset($term)){
			$q = strtolower($term);
			$source = $this->Model_Autocomplete->get_autocomplete_obj("Items", $q, $fKey, $fShow);
				
			print_r($source);
				
		}else{
				
			exit;
				
		}
	}
	
}	// ### END Class
