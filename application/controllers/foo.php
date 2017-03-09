<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'third_party/fb_persistent_data_interface.php');

class Foo extends CI_Controller
{
	function bar()
	{
		$fb = new Facebook\Facebook([
				// Your app ID & secret config here
				// . . .
				'persistent_data_handler' => new CIFacebookPersistentDataHandler(),
		]);
	}
}
