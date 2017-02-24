<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model("Model_Autocomplete");
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function index()
	{
		$this->load->view("test");
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function get_autocomplete()
	{
		$fieldKeyUp	= $this->input->get('fieldKeyUp');
		$fieldShow 	= $this->input->get('fieldShow');
		$term 		= $this->input->get('term', true);
		
		if (isset($term)){	//if (isset($_GET['term'])){
			
			$q = strtolower($term);
			$source = $this->Model_Autocomplete->get_autocomplete("Customers", $q, $fieldKeyUp, $fieldShow );
			
			print_r($source);
			
		}else{
			
			exit;
			
		}
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function get_autocomplete_obj(){
	
		$fKey 	= $this->input->get('fKey');
		$fShow 	= $this->input->get('fShow');
		$term 	= $this->input->get('term');
	
		if (isset($term)){
			$q = strtolower($term);
			$source = $this->Model_Autocomplete->get_autocomplete_obj("Customers", $q, $fKey, $fShow);
				
			print_r($source);
				
		}else{
				
			exit;
				
		}
	}
	
}	// ### END Class
