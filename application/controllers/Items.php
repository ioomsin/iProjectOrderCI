<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Items/Item_model");
		$this->load->model("Autocomplete_model");
		
	}
	
	public function index()
	{
		$this->db->order_by("ItemCode", "ASC");
		$data["result"] = $this->Item_model->select_item_home();
		
		$this->theme->loadtheme('Items/ItemHome', $data);
		//$this->load->view('Items/ItemHome', $data);
	}
	
	public function ItemForm()
	{
		$proc = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		if( $proc == "Add" ){
			
			$this->theme->loadtheme('Items/ItemForm');
			
		}else{
			
			$data = $this->Item_model->select_item_form($id);
			//print_r($data);
			$this->theme->loadtheme('Items/ItemForm', $data);
		}
	}
	
	public function ManageDataItem()
	{
		$proc = $this->input->post('proc');
		$id = $this->input->post('ItemCode');
		$genItemCode = $this->GenCode("Items", "ItemCode");
		
		//### Upload Picture
		$config['file_name']		= $proc=="Add" ?"IMG-".$genItemCode :"IMG-".$id;
		$config['upload_path']		= './assets/imgs/items';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['encrypt_name'] 	= FALSE;	// TRUE;
		$config['max_size']         = 100;
		$config['max_width']        = 1024;
		$config['max_height']       = 768;
		
		$this->load->library('upload', $config);
		
		
		if ( ! $this->upload->do_upload('ItemImage'))
        {
			$error = array('error' => $this->upload->display_errors('Upload file error !! ', ''));
			echo $error['error'];

		}
			
		$upload_data = $this->upload->data();
		
		
		$data['ItemName'] 			=  $this->input->post('ItemName');
		$data['ItemDate'] 			=  chg_date($this->input->post('ItemDate'));
		$data['ItemQty'] 			=  $this->input->post('ItemQty'); 
		$data['ItemUnit'] 			=  $this->input->post('ItemUnit');
		$data['ItemPrice'] 			=  $this->input->post('ItemPrice'); 
		$data['ItemDescription'] 	=  $this->input->post('ItemDescription');
		
		
		//$ItemImage = $this->input->post('ItemImage');
		//print_r( $upload_data['file_name']." xxxx");
		
		if( $upload_data['file_name'] ){
			$data['ItemImage'] 	=  $upload_data['file_name'];
		}
		
		if($proc == "Add")
		{
			
			$data['ItemCode'] 	=  $genItemCode;	// $this->GenCode("Items", "ItemCode");
			$this->Item_model->add_data("Items", $data);
			
		}else if($proc == "Edit")
		{
			
			$this->Item_model->update_data("Items", $id, $data);
			
		}
		
		//redirect("Items/index");
			
	}
	
	public function DeleteItem()
	{
		$id = $this->uri->segment(4);
		$data = $this->Item_model->select_id($id);

		if($data['ItemCode'] != "" ){
			$this->Item_model->delete_data($id);
		}
		
		//redirect("Items/index");
	}
	
	public function GenCode($table, $filedCode)
	{
		$data = $this->Item_model->getCode($table, $filedCode);
		$year = substr((date("Y")+543), 2, 2);
		$month = date("m");
		$prefix = "IT";
		
		if( empty($data["ItemCode"]) ){
			
			$genCode = $prefix.$year.$month.sprintf("%04d", 1);
			
		}else{
			
			$subCode = (substr( $data["ItemCode"], 6, 4)+1);
			$genCode = $prefix.$year.$month.sprintf("%04d" , $subCode);
			//echo $subCode ." || ". $genCode ;
			
		}
		//exit;
		return $genCode;
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function GetAutocomplete_Unit()
	{
	
		$fieldKeyUp	= $this->input->get('fieldKeyUp');
		$fieldShow 	= $this->input->get('fieldShow');
		$term 		= $this->input->get('term', true);
	
		if (isset($term)){	//if (isset($_GET['term'])){
	
			$q = strtolower($term);
			$source = $this->Autocomplete_model->get_autocomplete("Units", $q, $fieldKeyUp, $fieldShow);
	
			print_r($source);
	
		}else{
	
			exit;
	
		}
	
	}
	
}	// ### END Class
