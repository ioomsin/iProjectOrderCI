<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme {
	
	public function LoadTheme($view,$data=null)
	{
		$ci =& get_instance();
		
		$ci->load->view('Home/Header');
		$ci->load->view($view, $data);
		$ci->load->view('Home/Footer');
	}
	
	public function LoadView($view,$data=null)
	{
		$ci =& get_instance();
		$ci->load->view($view, $data);
	}
	
}	// ### END Class
