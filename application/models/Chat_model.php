<?php 
/**
 * a model to deal data of chat
 */
class Chat_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_data($t, $w=null)
	{
		if($w != null)
			$this->db->where($w);
		return $this->db->get($t)->result_array();
	}
}

 ?>