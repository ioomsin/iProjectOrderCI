<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Items/Model_Item");
		
	}
	
	public function index()
	{
		$this->db->order_by("ItemCode", "ASC");
		$data["result"] = $this->Model_Item->select();
		
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
			
			$data = $this->Model_Item->select_id($id);
			$this->theme->loadtheme('Items/ItemForm', $data);
		}
	}
	
	public function ManageDataItem()
	{
		$proc = $this->input->post('proc');
		$id = $this->input->post('ItemCode');
		
		//### Upload Picture
		$config['upload_path']		= './assets/img/items';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['encrypt_name'] 	= TRUE;
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
		
		
		$data['ItemName'] 	=  $this->input->post('ItemName');
		$data['ItemQty'] 	=  $this->input->post('ItemQty'); 
		$data['ItemPrice'] 	=  $this->input->post('ItemPrice'); 
		
		$ItemImage = $this->input->post('ItemImage');
		if(!empty($ItemImage)){
			$data['ItemImage'] 	=  $upload_data['file_name'];
		}

		//$data=$this->input->post();
		
		if($proc == "Add")
		{
			
			$data['ItemCode'] 	=  $this->GenCode("Items", "ItemCode");
			$this->Model_Item->add_data("Items", $data);
			
		}else if($proc == "Edit")
		{
			
			$this->Model_Item->update_data("Items", $id, $data);
			
		}
		
		//redirect("Items/index");
			
	}
	
	public function DeleteItem()
	{
		$id = $this->uri->segment(4);
		$data = $this->Model_Item->select_id($id);

		if($data['ItemCode'] != "" ){
			$this->Model_Item->delete_data($id);
		}
		
		//redirect("Items/index");
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
