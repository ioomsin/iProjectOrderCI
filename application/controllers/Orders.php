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
			
			$data["Head"] = $this->Model_Order->select_id("Orders", "OrderNumber", $id);
			$data["Detail"] = $this->Model_Order->select_id("OrderDetails", "OrderNumber", $id);
			
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
			
			$OrderNumber = $this->GenCode("Orders", "OrderNumber");
			$data_orders = array(
					'OrderNumber' 		=> $OrderNumber,
					'OrderDate' 		=> $this->chg_date($this->input->post('OrderDate')),
					'CustomerCode'  	=> $this->input->post('CustomerCode'),
					'CustomerName'  	=> $this->input->post('CustomerName'),
					'CustomerAddress' 	=> $this->input->post('CustomerAddress'),
					'Remark'  			=> $this->input->post('Remark'),
					'TotalPrice'  		=> $this->input->post('TotalPrice')
			);
			
			$this->Model_Order->add_data("Orders", $data_orders);
			//echo  exit;

			/////-----------------------------------------------------------------/////
			
			for($i=0; $i < count($this->input->post('ItemCode')); $i++){
				$data_orderdetails = array(
						'OrderNumber' 	=> $OrderNumber,
						'ItemCode' 		=> $this->input->post('ItemCode['.$i.']'),
						'ItemName' 		=> $this->input->post('ItemName['.$i.']'),
						'OrderQty' 		=> $this->input->post('OrderQty['.$i.']'),
						'OrderUnit' 	=> $this->input->post('OrderUnit['.$i.']'),
						'OrderPrice' 	=> $this->input->post('OrderPrice['.$i.']')
				);
				
				//print_r( $this->input->post('ItemCode['.$i.']') ); exit;
				$this->Model_Order->add_data("OrderDetails", $data_orderdetails);
				
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
		$data = $this->Model_Order->getCode($table, $filedCode);
		$year = substr((date("Y")+543) , 2 , 2);
		$month = date("m");
		$prefix = "IT";
		
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
	
	function chg_date ($date_input)    {
		$arr_date = explode ("/",$date_input);
		$date = $arr_date[0];
		$mont = $arr_date[1];
		$year = $arr_date[2];
		//$year = $year_th-543;
		return $year."-".$mont."-".$date;
	}
	
}	// ### END Class
