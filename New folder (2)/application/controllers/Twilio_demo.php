<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twilio_demo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->library('twilio');

//		$from = '0000000000';
//        $to = '0000000000';10

		$from = '+18127267918';
		//$to = '+923434070602';
		$to = '+923334774108';
		$message = 'This is a test...';

		$response = $this->twilio->sms($from, $to, $message);


		if($response->IsError)
			echo 'Error: ' . $response->ErrorMessage;
		else
			echo 'Sent message to ' . $to;
	}

}

/* End of file twilio_demo.php */