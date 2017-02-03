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
		$data["rs"] = $this->Model_Item->select();
		
		$this->theme->loadtheme('Items/ItemHome', $data);
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
	
	public function AddItem()
	{
		
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

		}else{
			
			$upload_data = $this->upload->data();
			
			$data['ItemCode'] 	=  $this->GenCode("Items","ItemCode");
			$data['ItemName'] 	=  $this->input->post('ItemName');
			$data['ItemQty'] 	=  $this->input->post('ItemQty'); 
			$data['ItemPrice'] 	=  $this->input->post('ItemPrice'); 
			$data['ItemImage'] 	=  $upload_data['file_name'];
			
			//$data=$this->input->post();
			//iconv( 'UTF-8' , 'TIS-620' ,$this->input->post('plant_name'));  
			$this->Model_Item->add_data("Items", $data);
			redirect("Items/index");
			
		}

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
