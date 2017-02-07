<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Orders/Model_Order");
		
	}
	
	public function index()
	{
		
		$this->db->order_by("OrderNumber", "ASC");
		$data["result"] = $this->Model_Order->select("Orders");
		
		$this->theme->loadtheme('Orders/OrderHome', $data);
		
	}
	
	public function OrderForm()
	{
		$proc = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		if( $proc == "Add" ){
			
			$this->theme->loadtheme('Orders/OrderForm');
			
		}else{
			
			$data = $this->Model_Order->select_id($id);
			$this->theme->loadtheme('Orders/OrderForm', $data);
			
		}
	}
	
	public function ManageDataOrder()
	{
		$proc = $this->input->post('proc');
		$id = $this->input->post('OrderNumber');
				
		if($proc == "Add")
		{
			/////-----------------------------------------------------------------/////
			
			$data_orders = array(
					'OrderNumber' 	=> $this->GenCode("Orders", "OrderNumber"),
					'OrderDate' 	=> $this->input->post('OrderDate'),
					'DeliveryDate'  => $this->input->post('DeliveryDate'),
					'VendorCode'  	=> $this->input->post('VendorCode'),
					'VendorName'  	=> $this->input->post('VendorName'),
					'VenderAddress' => $this->input->post('VenderAddress'),
					'Remark'  		=> $this->input->post('Remark'),
					'TotalPrice'  	=> $this->input->post('TotalPrice')
			);
			
			$OrderNumber = $this->Model_Order->add_data("Orders", $data_orders);

			/////-----------------------------------------------------------------/////
			
			for($i=0; $i < count($this->input->post('ItemCode')); $i++){
				$data_orderdetails[$i] = array(
						'OrderNumber' 	=> $OrderNumber,
						'ItemCode' 		=> $this->input->post('ItemCode[]'),
						'ItemName' 		=> $this->input->post('ItemName[]'),
						'OrderQty' 		=> $this->input->post('OrderQty[]'),
						'OrderUnit' 	=> $this->input->post('OrderUnit[]'),
						'OrderPrice' 	=> $this->input->post('OrderPrice[]')
				);
				
				$this->Model_Order->add_data("OrderDetails", $data_orderdetails[]);
				
			}

			/////-----------------------------------------------------------------/////
			
		}else if($proc == "Edit"){
			
			
			
			$this->Model_Order->update_data("Orders", $id, $data);
			
		}
		
		redirect("Orders/index");
			
	}
	
	public function DeleteItem()
	{
		$id = $this->uri->segment(4);
		$data = $this->Model_Item->select_id($id);

		if($data['ItemCode'] != "" ){
			$this->Model_Item->delete_data($id);
		}
		redirect("Items/index");
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
