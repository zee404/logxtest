<?php 
defined('BASEPATH') OR exit('direct access denied');

/**
 * controller to deal the chat module
 Author: Matee
 */
class Chat extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('chat/admin_chat');
	}

	public function history()
	{
		$this->load->model('chat_model', 'CM');
		$data['vendors'] = $this->CM->get_data('users', array('role_id'=>2));
		$this->load->view('chat/chat_history', $data);
	}
}

 ?>