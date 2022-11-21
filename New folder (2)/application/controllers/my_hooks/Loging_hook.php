<?php 
/**
 * 
 */
class Loging_hook
{
	private $CI;
	function __construct()
	{
		$this->CC = &get_instance();
	}

	public function save_log()
	{
		
		if(!empty($this->CC->session->userdata('u_id'))){
			$this->CC->db->insert('activity_log', array('user_id'=>$this->CC->session->userdata('u_id'), 'page_url'=>current_url(), 'ip_address'=> $this->CC->input->ip_address()));


		}

	
	}
	public function checkb4visit()
	{
		if($this->CC->router->fetch_class() != 'api' AND $this->CC->router->fetch_class() != 'auth' AND  ($this->CC->router->fetch_method() != 'index' OR $this->CC->router->fetch_method() != 'login') AND empty($this->CC->session->userdata('u_id')))
		{
			//die("***NOT ALLOWED***");
			redirect(base_url());
		}
	}
}

?>