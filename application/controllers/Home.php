<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Main_model");
	}
	
	public function index()
	{
		
		// Load Theme From Libraries
		$data["result"] = $this->Main_model->select_item_home();
		$this->theme->loadtheme('Home/Body', $data); 

	}
	
}	// ### END Class
