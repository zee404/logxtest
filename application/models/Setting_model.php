<?php 
defined('BASEPATH') OR exit('Direct Access Denied');

/**
 * a model to deal setting controller
 */
class Setting_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getOpts($where = null)
	{
		if($where != null)
		{
			$this->db->where($where);
		}
		return $this->db->get('admin_options')->result_array();
	}

	function saveOpts($opt)
	{
		$this->db->where(array('option_name'=>$opt['option_name']));
		$this->db->delete('admin_options');
		$this->db->insert('admin_options', $opt);
		return $this->db->insert_id();
	}

	function save_data($t, $d)
	{
		if(!empty($t) AND !empty($d))
		{
			$this->db->insert($t, $d);
			return $this->db->insert_id();
		}
		else
			return 0;
	}

	function update_data($t, $d, $w)
	{
		if(!empty($t) AND !empty($d) AND !empty($w))
		{
			$this->db->where($w);
			$this->db->update($t, $d);
			return true;
		}
		else
			return false;
	}
	
		public function get_emirates($where = '')
	{
		if($where != ''){
			return $this->db->get_where('tbl_emirates',$where)->result();
		}else{
			return $this->db->get('tbl_emirates')->result();
		}
	}
		public function get_payment_type($where = '')
	{
		if($where != ''){
			return $this->db->get_where('tbl_payment_type',$where)->result();
		}else{
			return $this->db->get('tbl_payment_type')->result();
		}
	}

	public function add_emirate($data)
	{
		return $this->db->insert('tbl_emirates',$data);
	}
	public function add_payment_type($data)
	{
		return $this->db->insert('tbl_payment_type',$data);
	}
	public function update_emirate($fields, $where)
	{
		$this->db->where($where);
		$this->db->update('tbl_emirates',$fields);
		return true;
	}
	public function update_payment_type($fields, $where)
	{
		$this->db->where($where);
		$this->db->update('tbl_payment_type',$fields);
		return true;
	}


	public function delete_emirate($id)
	{
	    $this->delete_areas_linked_emirates($id);
	    $this->delete_schedule_linked_emirates($id);
	    $this->delete_deliveyQoutePartner_emirates($id);
	    $this->delete_cashQoutePartner_emirates($id);
	    $this->delete_bagQoutePartner_emirates($id);
		
		$this->db->where(array('id'=>$id));
        $this->db->delete('tbl_emirates');
	
	}
	
	public function delete_areas_linked_emirates($id){
	     $this->db->where(array('emirate_id' => $id));
	    $this->db->delete('areas');
	    
	}
	public function delete_schedule_linked_emirates($id){
	     $this->db->where(array('emirate_id' => $id));
	    $this->db->delete('driver_shift_schedules');
	    
	}
	
		public function delete_deliveyQoutePartner_emirates($id){
	     $this->db->where(array('emirate' => $id));
	    $this->db->delete('tbl_delivery_quotations');
	    
	}
	
		public function delete_cashQoutePartner_emirates($id){
	     $this->db->where(array('emirate' => $id));
	    $this->db->delete('tbl_cash_quotations');
	    
	}
	
		public function delete_bagQoutePartner_emirates($id){
	     $this->db->where(array('emirate' => $id));
	    $this->db->delete('tbl_bag_quotations');
	    
	}
	
	
	
	public function delete_payment($id)
	{
		$this->db->where(array('id'=>$id));
        $this->db->delete('tbl_payment_type');
	}

	public function get_service_types($where = '')
	{
		if($where != ''){
			return $this->db->get_where('tbl_service_type',$where)->result();
		}else{
			return $this->db->get('tbl_service_type')->result();
		}
	}

	public function add_service_type($data)
	{
		return $this->db->insert('tbl_service_type',$data);
	}
	public function update_service_type($fields, $where)
	{
		$this->db->where($where);
		$this->db->update('tbl_service_type',$fields);
		return true;
	}

	public function delete_service_type($id)
	{
		$this->db->where(array('id'=>$id));
        $this->db->delete('tbl_service_type');
	}
}

 ?>