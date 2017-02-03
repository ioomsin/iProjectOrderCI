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
		$data["proc"] = $this->uri->segment(3);
		$this->theme->loadtheme('Items/ItemForm', $data);
	}
	
}	// ### END Class
