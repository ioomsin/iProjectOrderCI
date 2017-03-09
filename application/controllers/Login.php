<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->view('Login/index');
	}
	
	function fblogin(){
	
		$fb = new Facebook\Facebook([
				'app_id' => '694012324135003',
				'app_secret' => 'bb541f273f053f1f4a5488dafcbb1f59',
				'default_graph_version' => 'v2.8',
		]);
	
		$helper = $fb->getRedirectLoginHelper();
	
		$permissions = ['email','user_location','user_birthday','publish_actions'];
		// For more permissions like user location etc you need to send your application for review
	
		$loginUrl = $helper->getLoginUrl('http://localhost:81/iProjectOrderCI/Login/fbcallback', $permissions);
	
		header("location: ".$loginUrl);
	}
	
	function fbcallback(){
	
		$fb = new Facebook\Facebook([
				'app_id' => '694012324135003',
				'app_secret' => 'bb541f273f053f1f4a5488dafcbb1f59',
				'default_graph_version' => 'v2.8',
		]);
	
		$helper = $fb->getRedirectLoginHelper();
	
		try {
	
			$accessToken = $helper->getAccessToken();
	
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
	
	
		try {
			// Get the Facebook\GraphNodes\GraphUser object for the current user.
			// If you provided a 'default_access_token', the '{access-token}' is optional.
			$response = $fb->get('/me?fields=id,name,email,first_name,last_name,birthday,location,gender', $accessToken);
			// print_r($response);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'ERROR: Graph ' . $e->getMessage();
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'ERROR: validation fails ' . $e->getMessage();
			exit;
		}
	
		// User Information Retrival begins................................................
		$me = $response->getGraphUser();
		
		$location = $me->getField('location');
		
		echo "Full Name: ".$me->getField('name')."<br>";
		echo "First Name: ".$me->getField('first_name')."<br>";
		echo "Last Name: ".$me->getField('last_name')."<br>";
		echo "Gender: ".$me->getField('gender')."<br>";
		echo "Email: ".$me->getField('email')."<br>";
		echo "location: ".$location['name']."<br>";
		echo "Birthday: ".$me->getField('birthday')->format('d/m/Y')."<br>";
		echo "Facebook ID: <a href='https://www.facebook.com/".$me->getField('id')."' target='_blank'>".$me->getField('id')."</a>"."<br>";
		$profileid = $me->getField('id');
		echo "</br><img src='//graph.facebook.com/$profileid/picture?type=large'> ";
		echo "</br></br>Access Token : </br>".$accessToken;
	
		 
	}
	
}	// ### END Class
