<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 1:13 PM
 */

class Driver_model extends CI_Model{
    var $table = "users";
    var $table_location = "driver_location";
    var $table_reading = "reading_images";
    var $table_driver_rating = "driver_rating";
    var $table_driver_Acc = "driver_accounts";

    public function __construct(){
        parent::__construct();
    }

 public function add_registration($tb,$data)
      {
        $this->db->insert($tb,$data);
        $data['userID'] = $this->db->insert_id();
        $data['email'] = $this->db->insert_id();
        $data['full_name'] = $this->db->insert_id();
        $data['Password_partner'] = $data['email'] =$data['full_name'];
    
      return $data;
      }
      
      public function add_drivers_shift($tb,$userID){
        //   echo 'i am userId:'.$userID;
        //   die();
          $check=true;
          
          $emirates_with_time = $this->input->post('delivery_emirate');
          foreach ($emirates_with_time as $key => $emirate) {
         // echo 'i am delivry qoutes key'.$key;
          
           $temp=explode(",",$emirate);
          $data = array(
               
                'user_id' =>$userID,
                'emirate_id' =>$temp[0],
                'time_slot_id' =>$temp[1],
                
                'emi_slot_id' =>$emirate,
                'area_id' =>$this->input->post('delivery_service_type['.$key.']'),
               
               
            );
            // print_r($data);
            // die();
            
          $res=$this->db->insert($tb,$data);
          
          if($res){
              
          }else{
              $check=false;
              return $check;
              die();
          }
           }
           
           return $check;
          
      }
      
      public function get_where_driver_schedule($where){
          $this->db->select('driver_shift_schedules.*');
          $this->db->from('driver_shift_schedules');
          $this->db->where($where);
          $res=$this->db->get()->result();
        //   return $this->db->last_query();
          return $res;
          
        //   echo '<pre>';
        //   print_r($res);
        //   die();
          
      }
     public function check_team($gmail){
       $this->db->where('email',$gmail);
       return $this->db->get('users')->result();
   }
    
    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function get_where($where){
        $where['role_id'] = 3;
        $query = $this->db->select('*')->get_where($this->table, $where);
        return $query->result();
    }
     public function getCurrrentLocation($driver){
       $this->db->select('lat,lng');
        $this->db->from('driver_location');
        $this->db->where(array(
                    'driver_id'=>$driver,
                    
                ));
        $this->db->limit("1");
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $result=$query->result_array();
            return $result[0];
        }
        else 
        {
            return FALSE;
        }
    }

    public function get_drivers($where = null){
        $where_role = array('u.role_id'=>3);//for driver only
        
        // , ll.login_date
        $this->db->select('u.id, u.email, u.phone, u.full_name, u.address, u.code,u.Password_partner, u.send_invitation, r.name, u.status,u.salary,u.id_card,u.visa_card,u.license_card,u.other_card,u.contract_file,u.id_issue,u.visa_issue,u.other_issue,u.license_issue,u.id_exp,u.visa_exp,u.other_exp,u.license_exp');
        $this->db->from($this->table.' as u');
        $this->db->join('roles as r', 'r.id = u.role_id');
        // $this->db->join('login_log as ll', 'll.user_id = u.id', 'left');
        $this->db->where($where_role);

        if($where){
            $this->db->where($where);
        }

        //$this->db->group_by('u.id');
        $query = $this->db->get();
        $drivers = $query->result();
        if (count($drivers) > 0){
            $result['result'] = true;
            $result['records'] = $drivers;
        }else{
            $result['result'] = false;
        }
        return $result;
    }
    
    
    public function get_driver_schd(){
        
       $where_role = array('u.role_id'=>3);//for driver only
        $this->db->select('u.id as DRIVER_ID,ds.emirate_id,ds.area_id,ds.time_slot_id,emi.emirate_name,ar.area_name,t.name');
        $this->db->from('driver_shift_schedules as ds');
       
        $this->db->join('users as u','ds.user_id =u.id AND u.role_id=3','right');
         $this->db->join('tbl_emirates as emi', 'emi.id = ds.emirate_id','right');
        $this->db->join('areas as ar', 'ar.area_id = ds.area_id', 'right');
        $this->db->join('basic_time_slots as t', 't.basic_time_id = ds.time_slot_id', 'right');
        
        $this->db->where($where_role);
        
        $ans=$this->db->get()->result();
        // echo '<pre>';
        // print_r($ans);
        // die();
        return $ans;
    
        
    }

    //only return activate records
    public function count(){
        return $this->db->where('role_id',3)->from($this->table)->count_all_results();
    }

    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); //return last inserted category_id
    }

    function update($data, $where){
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 function update_driver($data, $where){
        return $this->db->update($this->table, $data, $where);
    }
    public function delete($where){
        return $this->db->delete($this->table, $where);
    }

    public function get_assign_delivery_drivers($where = null){
        $this->db->select('u.id, u.profile_image_url, u.full_name, u.status, u.address, o.order_id, u.email, u.phone, u.profile_image_url, u.role_id, o.delivery_date');
        $this->db->from($this->table.' as u');
        $this->db->join('orders as o', 'u.id = o.driver_id');
        $this->db->where('u.role_id',3);

        //delivery date condition
        if($where){
            $this->db->where($where);
        }

        $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }
    /********************************************************************************/
    /*****************************DRIVER LOCATION ***********************************/
    /********************************************************************************/
    function add_location($data){
        $this->db->insert($this->table_location, $data);
        return $this->db->insert_id(); //return last inserted id
    }

    public function get_location_where($where){
        $date = date('Y-m-d');
        $this->db->select('id, driver_id, lat, lng, created_dt');
        $this->db->from($this->table_location);
        $this->db->where($where);
        $this->db->where("created_dt BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->order_by('created_dt','asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_location($where){
        return $this->db->delete($this->table_location, $where);
    }

    /*****************************************************************************************************/
    /*******************************************FOOD READING**********************************************/
    /*****************************************************************************************************/

    function add_food_reading($data){
        $this->db->insert($this->table_reading, $data);
        return $this->db->insert_id(); //return last inserted id
    }

    public function get_food_reading_by_date($driver_id, $date){
        $this->db->select('image_name, temperature, vehicle_num');
        $this->db->from($this->table_reading);
        $this->db->where('driver_id',$driver_id);
        $this->db->where("created_dt BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $query = $this->db->get();
        return $query->result();
    }


    public function get_food_reading_where($where_date, $driver_id){
        $this->db->select('r.driver_id, r.image_name, r.temperature, r.created_dt, u.full_name, u.phone, r.vehicle_num');
        $this->db->from($this->table_reading.' as r');
        $this->db->join('users as u', 'u.id = r.driver_id');
        if($driver_id){
            $this->db->where('r.driver_id',$driver_id);
        }

        if($where_date){
            $this->db->where($where_date);
        }


        $query = $this->db->get();
        return $query->result();
    }

    function update_food_reading($data, $where){
        $this->db->update($this->table_reading, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_food_reading($where){
        return $this->db->delete($this->table_reading, $where);
    }


    /*****************************************************************************************************/
    /*******************************************DRIVER RATING**********************************************/
    /*****************************************************************************************************/
    function add_driver_rating($data){
        $this->db->insert($this->table_driver_rating, $data);
        return $this->db->insert_id(); //return last inserted id
    }


    /*****************************************************************************************************/
    /*******************************************RESULT SET FOR CSV**********************************************/
    /*****************************************************************************************************/
    public function get_food_reading_where_CSV($where_date, $driver_id){
        $url = base_url().'upload/';
        $this->db->select('concat("'.$url.'",r.image_name) as "Image URL", r.temperature as "Temperature", r.vehicle_num as "Vehicle Num", r.created_dt as "Created", u.full_name as "Driver", u.phone as "Phone"');
        $this->db->from($this->table_reading.' as r');
        $this->db->join('users as u', 'u.id = r.driver_id');
        if($driver_id){
            $this->db->where('r.driver_id',$driver_id);
        }

        if($where_date){
            $this->db->where($where_date);
        }

        return $this->db->get();

    }
    
    
    public function edit_driver_schedule($vid){
       $emirates_with_time = $this->input->post('delivery_emirate');
       foreach ($emirates_with_time as $key => $emirate) {
          $temp=explode(",",$emirate);
          $data = array(
               
                
                'emirate_id' =>$temp[0],
                'time_slot_id' =>$temp[1],
                
                'emi_slot_id' =>$emirate,
                'area_id' =>$this->input->post('delivery_service_type['.$key.']'),
               
               
            );
            $check1=$this->input->post('delivHid['.$key.']');
            if($check1 == ''){
                $data['user_id'] =$vid;
                $this->db->insert('driver_shift_schedules',$data);
                
            }else{
                $where=array('id'=> $this->input->post('delivHid['.$key.']'));
              $da=$this->db->update('driver_shift_schedules',$data,$where);
            }
            
          
        //   print_r('i am check:'.$check);
      }
      
      
      return true;
  }
  
  
   public function delte_schedule_row($id,$acti){
       
        
       
         if($acti=='d'){
            $this->db->where('id',$id);
            $result = $this->db->delete('driver_shift_schedules');
             if($result){
                 return true;
             }
             else{
                 return false;
             }
            
        }else{
           return false;
        }
    }

   
       public function get_combinations($data){
                          $result = [];
                $final_result = [];
                foreach ($data as $key => $item){
                    $resp = $this->resolve($item);
                 array_push($result, $resp);
                }
               if (count($result)){
                    foreach ($result as $value){
                       if (count($value)){
                           foreach ($value as $key => $val){
                               $final_result[$key] = $val;
                           }
                       }
                    }
               }
               
               return $final_result ;
    }
    
    public function resolve($item){
    $idArr = [];
    $nameArr = [];
    $time_id = explode(',',$item->basic_time_id);
    $time_name = explode(',',$item->basic_time_name);
    if (count($time_id)){
        foreach ($time_id as $val){
            array_push($idArr,$item->id.','.$val);
        }
    }
    if (count($time_name))
    {
        foreach ($time_name as $time){
            array_push($nameArr,$item->emirate_name.','.$time);
        }
    }
    $result = array_combine($idArr, $nameArr);
    return $result;
  

     }
     
     public function delete_drivers_sched_and_driver($ids){
          $this->db->where_in('user_id', explode(",", $ids));
         $res= $this->db->delete('driver_shift_schedules');
          return $res;
     }
     
     
    //  ACCOUNTS
   
    public function Add_driver_Acc_info($data){
        
        $res=$this->db->insert($this->table_driver_Acc, $data);
        return $res;
    }
    
    function del_driver_balance($id)
    {
       
        $this->db->where('id', $id);
        $this->db->delete('driver_accounts');
    }
    
    public function get_drivers_Acc($where = null){
        // $where_role = array('u.role_id'=>3);//for driver only
        $this->db->select('*');
        $this->db->from($this->table_driver_Acc.' as d');
       
        

        if($where){
            $this->db->where($where);
        }else{
            $this->db->where('d.id' > 0);
        }

        //$this->db->group_by('u.id');
        $query = $this->db->get();
        $drivers_Acc = $query->result();
        
        return $drivers_Acc;
    }
    
    public function get_driver_by_id_Acc($id){
        // $where_role = array('u.role_id'=>3);//for driver only
        // return $id;
        $this->db->select('u.id,u.full_name,u.email,u.phone,u.address,u.salary');
        $this->db->from($this->table.' as u');
        
        $this->db->where('u.id',$id);
     
        //$this->db->group_by('u.id');
        $query = $this->db->get();
        $driver = $query->result();
        
        return $driver;
    }
    
    public function get_driver_pending_dues($id){
        // 'SUM(quantity * no_of_packs) as total', false
        $this->db->select('SUM(ammount - return_ammount) as Pendings',false);
        $this->db->from($this->table_driver_Acc);
        
        $this->db->where('driver_id',$id);
        $query=$this->db->get()->result();
        // $data['total_ammount']=$query->row()->ammount;
        // $data['total_returns']=$query->row()->return_ammount;
        
        return $query;
    }
    
    
    public function get_driver_taken_dues($id){
        // 'SUM(quantity * no_of_packs) as total', false
        $this->db->select('SUM(ammount) as tt, SUM(return_ammount) as tr',false);
        $this->db->from($this->table_driver_Acc);
        
        $this->db->where('driver_id',$id);
        $query=$this->db->get()->result();
        // $data['total_ammount']=$query->row()->ammount;
        // $data['total_returns']=$query->row()->return_ammount;
        
        return $query;
    }
    
    public function driver_info($d)
    {
        $id = $d['driver_info_id'];
        unset($d['driver_info_id']);
        if($id == 0)
        {
            
            
            $d['added_by'] = $this->session->userdata('email');
             $d['added_at'] = date("Y-m-d h:i:s");
            //  print_r($d);
          
            $res=$this->db->insert($this->table_driver_Acc, $d);
            return $res;
            
        }
        else
        {
            $this->db->where('id', $id);
            $res=$this->db->update($this->table_driver_Acc, $d);
            return $res;
        }
    }
    
    
    // Api linked function
    
    public function get_where_basic_prof($driver_id){
        $where = array('u.id'=>$driver_id);
        $where['role_id'] = 3;
        $query = $this->db->select('u.phone,u.full_name,u.email,u.address,u.status,u.salary,u.id_exp,u.license_exp,u.visa_exp,u.other_exp,
            u.contract_file,u.visa_card,u.other_card,u.license_card,u.id_card')->get_where('users as u', $where);
        return $query->result();
    }
    
    public function get_driver_prof_details($driver_id){
        
        $where = array('ds.user_id'=>$driver_id);
        
        
        
         
        $this->db->select('emi.emirate_name as emirate,ar.area_name as area,t.name as slot');
        $this->db->from('driver_shift_schedules as ds');
       
        // $this->db->join('users as u','ds.user_id =u.id AND u.role_id=3','right');
         $this->db->join('tbl_emirates as emi', 'emi.id = ds.emirate_id','right');
        $this->db->join('areas as ar', 'ar.area_id = ds.area_id', 'right');
        $this->db->join('basic_time_slots as t', 't.basic_time_id = ds.time_slot_id', 'right');
        
        $this->db->where($where);
         
          $res=$this->db->get()->result();
           return $res;
          
          
       
       
    }
    
    
    // Ayesha Changes 21-05-20
    
    public function check_driver($driver_id){
        
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('id',$driver_id);
        $this->db->where('role_id',3);
        
        $res= $this->db->get()->result();
        
        return $res;
    }
    
     public function get_driver_account_detail($where){
        $this->db->select('*');
        $this->db->from('driver_accounts');
         $this->db->where($where);
       
       
        $query = $this->db->get();
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
        
        return $result;
    //   echo '<pre>';
    //   return $this->db->last_query();
    }
    
     public function get_expense($where){
         
         $this->db->select('*');
        $this->db->from('expense as e');
         $this->db->where($where);
       
       
        $query = $this->db->get();
        $res = $query->result();
        if ($res){
            $result['result'] = true;
            $result['records'] = $res;
        }else{
            $result['result'] = false;
        }
        
        return $result;
     }
     
     public function add_insert_data($tb,$data)
      {
        $res=$this->db->insert($tb,$data);
           return $this->db->last_query();
      }
      public function get_where_data_from($tb,$where){
        
        $query = $this->db->select('*')->get_where($tb, $where);
        return $query->result();
    }
    
    function update_data_changes($tb,$data, $where){
        
        return $this->db->update($tb, $data, $where);
    }
    
    
    public function delete_remove_del($tb,$ids){
          
          $this->db->where_in('id', explode(",", $ids));
          $res= $this->db->delete($tb);
          return $res;
     }
     
     
     
     public function get_fuel($where){
         
         $this->db->select('*');
        $this->db->from('fuel as f');
         $this->db->where($where);
       
       
        $query = $this->db->get();
        
        // return $this->db->last_query();
        $res = $query->result();
        if ($res){
            $result['result'] = true;
            $result['records'] = $res;
        }else{
            $result['result'] = false;
        }
        
        return $result;
     } 
     
     
      public function get_drivers_basic_inf($where = null){
        $where_role = array('u.role_id'=>3);//for driver only
        $this->db->select('u.id, u.full_name');
        $this->db->from($this->table.' as u');
       
       
        $this->db->where($where_role);

        if($where){
            $this->db->where($where);
        }

     
        $query = $this->db->get();
        $drivers = $query->result();
        if (count($drivers) > 0){
            $result['result'] = true;
            $result['records'] = $drivers;
        }else{
            $result['result'] = false;
        }
        return $result;
    }

}

?>
