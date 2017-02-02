<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Items/Model_Item");
		
		$this->load->view('Home/Header');
		$this->load->view('Home/Footer');
		
	}
	
	public function index()
	{
		$this->db->order_by("ItemCode", "ASC");
		$data["rs"] = $this->Model_Item->select();
		$this->load->view('Items/ItemHome', $data);
	}
	
}	// ### END Class
