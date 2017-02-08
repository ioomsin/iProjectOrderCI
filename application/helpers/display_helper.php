<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


function chg_date ($date_input)    {
	$arr_date = explode ("/",$date_input); 
	$date = $arr_date[0];
	$mont = $arr_date[1];
	$year = $arr_date[2];
	//$year_th = $arr_date[2];
	//$year = $year_th-543;
	return $year."-".$mont."-".$date;
}	
	
function chg_date_th($date_input){
	if($date_input){
		$date = substr($date_input,8,2);
		$mont= substr($date_input,5,2);
		$year_en = substr($date_input,0,4);
		$year=$year_en+543;
		return $date."/".$mont."/".$year;
	}else{
		return "";
	}
}

function get_current_th()    {
	$date = (date ("d"));
	$mont= (date("m"));
	$year = (date("Y")+543);
	return $date."/".$mont."/".$year;
}




?>