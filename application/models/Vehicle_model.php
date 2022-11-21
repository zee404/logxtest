<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 1:13 PM
 */

class Vehicle_model extends CI_Model{

    var $table = "vehicle";

    public function __construct(){
        parent::__construct();
    }

    public function get_listing()
    {
        $result =  $this->db->select('*')
            ->from('vehicle')
            ->get()->result_array();
        return $result;
    }

    public function add_vehicle($data)
    {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
     public function add_qr($path, $id)
    {
        $this->db->update($this->table,array('qr_code'=>$path), array('id' => $id));
        return true;
    }
    public function update($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));
        return true;
    }
    public function delete_vehicle($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return true;
    }


    public function check_duplicate($vehicle_id,$modal_name)
    {
     if (!empty($vehicle_id) AND $vehicle_id > 0){
         $result = $this->db->select('*')
             ->from('vehicle')
             ->where('model_name',$modal_name)
             ->where('id',$vehicle_id)
             ->get()->result_array();
         if (count($result) > 0){
             return false;
         }
     } else{
        $result =  $this->db->select('*')
             ->from('vehicle')
             ->where('model_name',$modal_name)
             ->get()->result_array();
         if (count($result) > 0){
             return true;
         }
     }
    }

    public function get_vehicle_detail($driver_id)
    {
        $result = $this->db->select('*')
            ->from('vehicle_status')
            ->join('vehicle','vehicle.id=vehicle_status.vehicle_id')
            ->where('vehicle_status.driver_id',$driver_id)
            ->where('vehicle_status.status','occupied')
            ->order_by('vehicle_status.id','desc')
            ->limit(1)
            ->get()->row();
        return $result;
    }
    
    
    public function get_vehicle_detail_history($driver_id){
        
        //  $result = $this->db->select('vehicle.model_name ,vehicle.type,vehicle.year,vehicle.qr_code,vehicle.i_image,vehicle.model_name,vehicle.model_name,vehicle.model_name,vehicle.model_name,vehicle.model_name')
            $result = $this->db->select('*,vehicle_status.id as v_s_id')
            ->from('vehicle_status')
            ->join('vehicle','vehicle.id=vehicle_status.vehicle_id')
            ->where('vehicle_status.driver_id',$driver_id)
            ->order_by('vehicle_status.id','desc')
            ->limit(10)
            ->get()->result();
            // return $this->db->last_query();
        return $result;
        
    }
    
    
    // Ayesha changes
    
    public function check_registration($v_number)
    {
        // echo "called function";
        $this->db->where('v_number',$v_number);
       
        return $this->db->get('vehicle')->result();
        
    }
    
    
    
     public function get_vehicle_Registration_num($driver_id)
    {
        $result = $this->db->select('v_number as Registration_number')
            ->from('vehicle_status')
            ->join('vehicle','vehicle.id=vehicle_status.vehicle_id')
            ->where('vehicle_status.driver_id',$driver_id)
            ->where('vehicle_status.status','occupied')
            ->order_by('vehicle_status.id','desc')
            ->limit(1)
            ->get()->row();
        return $result;
    }
    
    // bag pickup module
     function get_bagpic_qr_basic_detail($id){
        return $this->db->select('o.delivery_status_qr,o.bag_pickup_status')->from('orders as o')->where('o.order_id',$id)->get()->result();
    }
    
    function update_in_tbl($tbl,$data,$whr){
       $res= $this->db->update($tbl, $data, $whr);
        return $res;
        
           }
    
    // END bag pickup module
    
    
    
    // 22 july 2022
    
     public function get_vehicle_detail_history_for_checkin($driver_id){
        
        //  $result = $this->db->select('vehicle.model_name ,vehicle.type,vehicle.year,vehicle.qr_code,vehicle.i_image,vehicle.model_name,vehicle.model_name,vehicle.model_name,vehicle.model_name,vehicle.model_name')
            $result = $this->db->select('vehicle.id,vehicle.model_name,vehicle.type,vehicle.year,vehicle.i_image,vehicle.i_exp,vehicle.i_issue,vehicle.m_image,
            vehicle.m_exp,vehicle.m_issue,vehicle.r_image,vehicle.r_exp,vehicle.r_issue,vehicle.v_image,
            vehicle.v_number,
            vehicle_status.id as v_s_id,vehicle_status.checkout,vehicle_status.check_in')
            ->from('vehicle_status')
            ->join('vehicle','vehicle.id=vehicle_status.vehicle_id')
            ->where('vehicle_status.driver_id',$driver_id)
            ->order_by('vehicle_status.id','desc')
            ->limit(10)
            ->get()->result();
            // return $this->db->last_query();
        return $result;
        
    }
    
     public function get_vehicle_detail_for_checkin($driver_id)
    {
        $result = $this->db->select('vehicle.id,vehicle.model_name,vehicle.type,vehicle.year,vehicle.i_image,vehicle.i_exp,vehicle.i_issue,vehicle.m_image,
            vehicle.m_exp,vehicle.m_issue,vehicle.r_image,vehicle.r_exp,vehicle.r_issue,vehicle.v_image,
            vehicle.v_number,
            vehicle_status.id as v_s_id,vehicle_status.check_in,vehicle_status.status')
            ->from('vehicle_status')
            ->join('vehicle','vehicle.id=vehicle_status.vehicle_id')
            ->where('vehicle_status.driver_id',$driver_id)
            ->where('vehicle_status.status','occupied')
            ->order_by('vehicle_status.id','desc')
            ->limit(1)
            ->get()->row();
        return $result;
    }

    public function get_vehicle_drivers($vehicle_id)
    {
        
        $result = $this->db->select('vehicle_status.status as status,vehicle_status.check_in as check_in,vehicle_status.checkout as check_out, u.full_name as name,u.phone')
        ->from('vehicle_status')
        ->join('users as u','vehicle_status.driver_id = u.id','left')
        ->where('vehicle_id',$vehicle_id)
        ->get()->result_array();
 
        return $result;
    }
}

?>
