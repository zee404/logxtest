<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 1:13 PM
 */

class Vehicle_status extends CI_Model{

    var $table = "vehicle_status";

    public function __construct(){
        parent::__construct();
    }

    public function get_vehicle_status($vehicle_id)
    {
        $result = $this->db->select('vehicle_status.*,u.full_name as driver,u.phone')
            ->from($this->table)
            ->join('users as u','vehicle_status.driver_id = u.id','left')
            ->where('vehicle_id',$vehicle_id)
            ->order_by('id','desc')
            ->limit(1)
            ->get()->row();
        return $result;
    }

    public function get_vehicle_detail($vehicle_id)
    {
        $result = $this->db->select('*')
            ->from($this->table)
            ->where('vehicle_id',$vehicle_id)
            ->order_by('id','asc')
            ->limit(1)
            ->get()->row();
        return $result;
    }

    public function update($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));
        return true;
    }
    public function create($data){
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    
    
    
    // Ayesha changes 21-05-20
    
     public function get_vehicle_status_availability($vehicle_id)
    {
       
       
        $result = $this->db->select('id,status,vehicle_id')
            ->from('vehicle_status')
             ->where('vehicle_status.vehicle_id',$vehicle_id)
            ->where('vehicle_status.status','occupied')
            ->order_by('vehicle_status.id','desc')
            ->limit(1)
            ->get()->row();
             return $result;
    }
    
    public function check_vehicle_allot_driver($vehicle_id,$driver_id,$id=0){
        
                 $this->db->select('id,status,vehicle_id,driver_id');
                 $this->db->from('vehicle_status');
                 
                 $this->db->where('vehicle_status.vehicle_id',$vehicle_id);
                 $this->db->where('vehicle_status.status','occupied');
                 $this->db->where('vehicle_status.checkout',NULL);
                 if($id!=0){
                  $this->db->where('vehicle_status.id',$id);
                 }
                 $this->db->where('vehicle_status.driver_id',$driver_id);
                 
                 $result=$this->db->get()->result();
                 
                 return $result;
                 
        
            
    }
    
    
    
     public function get_vehicle_($vid){
        
        $res=$this->db->select('*')->from('vehicle')->where('id',$vid)->get()->result();
        
        return $res;
    }
        
    
}

?>
