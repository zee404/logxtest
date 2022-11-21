<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 1:13 PM
 */

class Vendor_model extends CI_Model{

    var $table = "users";

    public function __construct(){
        parent::__construct();
    }

    public function add_registration($tb,$data)
      {
        $this->db->insert($tb,$data);
        $data['email'] = $this->db->insert_id();
        $data['full_name'] = $this->db->insert_id();
        $data['modules'] = $this->db->insert_id();
        $data['Password_partner'] = $data['email'] =$data['full_name'] = $data['modules'];    
      return $data;
      }
    public function update_registration($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return true;
    }
    public function check_email_validation($email,$role_type_id)
    {
        // echo "called function";
        $this->db->where('email',$email);
        $this->db->where('role_id',$role_type_id);
        $this->db->where('is_deleted',0);
        return $this->db->get('users')->result();
        // print_r($res);
    }
    public function check_phone_validation($phone,$role_type_id)
    {
        // echo "called function";
        $this->db->where('phone',$phone, 'role_type_id',$role_type_id);
        return $this->db->get('users')->result();
        // print_r($res);
    }
         public function check_registration($gmail){
               $this->db->where('email',$gmail, 'role_type_id',2);
               return $this->db->get('users')->result();
           }
           public function phone_check($phone){
               $this->db->where('phone',$phone, 'role_type_id',2);
               return $this->db->get('users')->result();
           }
           public function phone_check_customer($phone){
               $this->db->where('phone',$phone, 'role_type_id',4);
               return $this->db->get('users')->result();
           }
     public function check_customer($gmail){
       $this->db->where('email',$gmail, 'role_type_id',4);
       return $this->db->get('users')->result();
   }
//     public function check_team($gmail){
//       $this->db->where('email',$gmail, 'role_type_id',6);
//       return $this->db->get('users')->result();
//   }
  public function check_team($gmail){
       $this->db->where('email',$gmail);
       return $this->db->get('users')->result();
   }
    public function addcsv($tb,$data)
      {
        $res = $this->db->insert_batch($tb,$data); 
        return array('data'=>$data, 'res'=>$res);
      }
   
    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        return $query->row();
    }

    // public function get_where($where){
    //     $where['role_id'] = 2   ;
    //     //$where['status'] = 0;
    //     $where['is_deleted'] = 0;
    //     $query = $this->db->select('id, email, phone, full_name, address,Password_partner,modules, status')->get_where($this->table, $where);
    //     return $query->result();
    // }
    
    
      
    
    
    public function get_where($where){
        $where['role_id'] = 2   ;
        //$where['status'] = 0;
        $where['is_deleted'] = 0;
        $query = $this->db->select('id, email, phone, full_name, address,Password_partner,modules, status,delivery_message,bag_message,cash_message,contract_file,term,inv_email,other_email,inv_address,trn,emails_for_mealplan')->get_where($this->table, $where);
        return $query->result();
    }
    
    public function get_where_by_B($where){
        
         $where['role_id'] = 2   ;
        $where['is_deleted'] = 0;
        
        
     
        
         $query = $this->db->select('tbl_bag_quotations.id, tbl_bag_quotations.user_id AS tbl_bag_userid,tbl_bag_quotations.emirate AS tbl_bag_emi,tbl_bag_quotations.service_type AS tbl_bag_servi,tbl_bag_quotations.price AS tbl_bag_price,tbl_bag_quotations.same_loc_price AS tbl_bag_same_loc_p,
          tbl_emirates.emirate_name AS tbl_emi_names,
            tbl_service_type.name AS tbl_serv_names' );
            
          $this->db->from('users');  
         
       
          
          
          $this->db->join('tbl_bag_quotations', 'tbl_bag_quotations.user_id = users.id', 'left join'); 
          
        //   $this->db->join('tbl_cash_quotations', 'tbl_cash_quotations.user_id = users.id', 'left join');
           
        // $this->db->join('tbl_delivery_quotations', ' tbl_delivery_quotations = users.id', 'left join');
            
             $this->db->join('tbl_emirates', 'tbl_bag_quotations.emirate =tbl_emirates.id', 'left join');
            
              $this->db->join('tbl_service_type', 'tbl_bag_quotations.service_type =tbl_service_type.id ', 'left join');
            
            
          $this->db->where('users.role_id' , 2);
          $this->db->where('users.is_deleted' , 0);
          $this->db->where('users.id' ,$where['id'] );
          
          
          $query = $this->db->get();
          $results= $query->result();
          
        

          return $results;
        
    
        
    }
    
        public function get_where_by_C($where){
        
         $where['role_id'] = 2   ;
        $where['is_deleted'] = 0;
        
        
     
        
         $query = $this->db->select('tbl_cash_quotations.id, tbl_cash_quotations.user_id AS tbl_cash_userid,tbl_cash_quotations.emirate AS tbl_cash_emi,tbl_cash_quotations.service_type AS tbl_cash_servi,tbl_cash_quotations.price AS tbl_cash_price,tbl_cash_quotations.same_loc_price AS tbl_cash_same_loc_p,
          tbl_emirates.emirate_name AS tbl_emi_names,
            tbl_service_type.name AS tbl_serv_names' );
            
          $this->db->from('users');  
         
       
          
          
    
          
           $this->db->join('tbl_cash_quotations', 'tbl_cash_quotations.user_id = users.id', 'left join');
           
      
             $this->db->join('tbl_emirates', 'tbl_cash_quotations.emirate =tbl_emirates.id', 'left join');
            
              $this->db->join('tbl_service_type', 'tbl_cash_quotations.service_type =tbl_service_type.id ', 'left join');
            
            
          $this->db->where('users.role_id' , 2);
          $this->db->where('users.is_deleted' , 0);
          $this->db->where('users.id' ,$where['id'] );
          
          
          $query = $this->db->get();
          $results= $query->result();
          
        

          return $results;
        
    
        
    }
    
  public function get_where_by_D($where){
        
         $where['role_id'] = 2   ;
        $where['is_deleted'] = 0;
        
        
     
        
         $query = $this->db->select('tbl_delivery_quotations.id ,tbl_delivery_quotations.user_id AS tbl_deliv_userid,tbl_delivery_quotations.emirate AS tbl_deliv_emi,tbl_delivery_quotations.service_type AS tbl_deliv_servi,tbl_delivery_quotations.price AS tbl_deliv_price,tbl_delivery_quotations.same_loc_price AS tbl_deliv_same_loc_p,
          tbl_emirates.emirate_name AS tbl_emi_names,
            tbl_service_type.name AS tbl_serv_names' );
            
          $this->db->from('users');  
         
         $this->db->join('tbl_delivery_quotations', 'tbl_delivery_quotations.user_id = users.id', 'left join');
            
         $this->db->join('tbl_emirates', 'tbl_delivery_quotations.emirate =tbl_emirates.id', 'left join');
            
         $this->db->join('tbl_service_type', 'tbl_delivery_quotations.service_type =tbl_service_type.id ', 'left join');
            
            
          $this->db->where('users.role_id' , 2);
          $this->db->where('users.is_deleted' , 0);
          $this->db->where('users.id' ,$where['id'] );
          
          
          $query = $this->db->get();
          $results= $query->result();
          
        

          return $results;
        
    
        
    }
    
    // By Dilshad 26-12-2019
      public function add_new_vendor($tb,$data){
          
          
               $this->db->insert($tb,$data);
    $userID = $this->db->insert_id();
        
      $delivery_emirates = $this->input->post('delivery_emirate');
      
   
      foreach ($delivery_emirates as $key => $emirate) {
        //   echo 'i am delivry qoutes key'.$key;
          $data = array(
                'user_id' =>$userID,
                'emirate' =>$emirate,
                'service_type' =>$this->input->post('delivery_service_type['.$key.']'),
                'price' =>$this->input->post('delivery_price['.$key.']'),
                'same_loc_price' =>$this->input->post('delivery_same_loc_price['.$key.']'),
               
            );
            
          $this->db->insert('tbl_delivery_quotations',$data);
      }
      $bag_emirates = $this->input->post('bag_emirate');
     
      foreach ($bag_emirates as $key => $emirate) {
          $data = array(
                'user_id' =>$userID,
                'emirate' =>$emirate,
                'service_type' =>$this->input->post('bag_service_type['.$key.']'),
                'price' =>$this->input->post('bag_price['.$key.']'),
                'same_loc_price' =>$this->input->post('bag_same_loc_price['.$key.']'),
                
            );
           $this->db->insert('tbl_bag_quotations',$data);
      
      }
      $cash_emirates = $this->input->post('cash_emirate');
     
      foreach ($cash_emirates as $key => $emirate) {
          $data = array(
                'user_id' =>$userID,
                'emirate' =>$emirate,
                'service_type' =>$this->input->post('cash_service_type['.$key.']'),
                'price' =>$this->input->post('cash_price['.$key.']'),
                'same_loc_price' =>$this->input->post('cash_same_loc_price['.$key.']'),
            );
           $this->db->insert('tbl_cash_quotations',$data);
        
      }
       return true;
    
   // die();
          
   
  }
  
  public function edit_new_vendor($vid){
       $delivery_emirates = $this->input->post('delivery_emirate');
      foreach ($delivery_emirates as $key => $emirate) {
          $data = array(
                
                'emirate' =>$emirate,
                'service_type' =>$this->input->post('delivery_service_type['.$key.']'),
                'price' =>$this->input->post('delivery_price['.$key.']'),
                'same_loc_price' =>$this->input->post('delivery_same_loc_price['.$key.']'),
            );
            $check1=$this->input->post('delivHid['.$key.']');
            if($check1 == ''){
                $data['user_id'] =$vid;
                $this->db->insert('tbl_delivery_quotations',$data);
                
            }else{
                $where=array('id'=> $this->input->post('delivHid['.$key.']'));
              $da=$this->db->update('tbl_delivery_quotations',$data,$where);
            }
            
          
          print_r('i am check:'.$check);
      }
      $bag_emirates = $this->input->post('bag_emirate');
      foreach ($bag_emirates as $key => $emirate) {
          $data = array(
                
                'emirate' =>$emirate,
                'service_type' =>$this->input->post('bag_service_type['.$key.']'),
                'price' =>$this->input->post('bag_price['.$key.']'),
                'same_loc_price' =>$this->input->post('bag_same_loc_price['.$key.']'),
            );
             $check2=$this->input->post('bagsHid['.$key.']');
            if($check2 == ''){ 
                $data['user_id'] =$vid;
                $this->db->insert('tbl_bag_quotations',$data);
                
            }else{
            $where=array('id'=> $this->input->post('bagsHid['.$key.']'));
          $this->db->update('tbl_bag_quotations',$data,$where);
                
            }
        
      }
      $cash_emirates = $this->input->post('cash_emirate');
      foreach ($cash_emirates as $key => $emirate) {
          $data = array(
                
                'emirate' =>$emirate,
                'service_type' =>$this->input->post('cash_service_type['.$key.']'),
                'price' =>$this->input->post('cash_price['.$key.']'),
                'same_loc_price' =>$this->input->post('cash_same_loc_price['.$key.']'),
            );
             $check3=$this->input->post('cashHid['.$key.']');
            if($check3 == ''){ 
                $data['user_id'] =$vid;
                $this->db->insert('tbl_cash_quotations',$data);
                
            }else{
           $where=array('id'=> $this->input->post('cashHid['.$key.']'));
          $this->db->update('tbl_cash_quotations',$data,$where);
                
            }
      }
      return true;
  }
//   .......................................


    public function get_where_cus($where){
        $where['role_id'] = 4   ;
        //$where['status'] = 0;
        $where['is_deleted'] = 0;
        $query = $this->db->select('id, email, phone, full_name, address,Password_partner,modules, status')->get_where($this->table, $where);
        return $query->result();
    }


     public function getsss_where($where){
        //$where['role_type_id'] = 1   ;
        //$where['status'] = 0;
       // $where['is_deleted'] = 0;
        $query = $this->db->select('id, email, phone, full_name, address,Password_partner,modules, role_type_id,status')->get_where($this->table, $where);
        return $query->result();
    }
 public function get_where2($where){
        $where['role_id'] = 5;
        $where['status'] = 1;
        $where['is_deleted'] = 0;
        $query = $this->db->select('id, email, phone, full_name, address, status')->get_where($this->table, $where);
        return $query->result();
    }

   
    
    public function get_all_vendors(){
        $where = array('u.role_id'=>2,'is_deleted'=>0);//for vendor only
        $this->db->select('u.id, email, phone, full_name, address,Password_partner,modules, u.status, code,u.user_account_status,u.contract_file,u.term,u.trn,u.inv_email,u.other_email,u.inv_address,u.emails_for_invoice,u.emails_for_report,u.emails_for_zero_bags,u.email_status,u.emails_for_mealplan,u.mul_emails_for_mealplan,u.partner_logo');
        $this->db->from($this->table.' as u');
        // $this->db->join('roles as r', 'r.id = u.role_id');
        $this->db->where($where);
        $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_team(){
       // $where = array('u.role_type_id'=>7);//for vendor only
        $this->db->select('u.id, u.email, u.phone, u.full_name, u.address,u.Password_partner,u.modules, u.status, code,r.name');
        $this->db->from($this->table.' as u');
        $this->db->join('roles as r', 'r.id= u.role_id');
        // $this->db->join('login_log AS ll', 'll.user_id = u.id', 'left');
        $this->db->where('r.id >',5); // First five id's for admin,vendor,customer,driver,storekeeper
        // $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }
    
    
   
    //  public function get_all_teamss(){
    //   //  $where = array('u.role_type_id'=>6);//for vendor only
    //     $this->db->select('u.id, u.email, u.phone, u.full_name, u.address,u.Password_partner,u.modules, u.status, code,r.name');
    //     $this->db->from($this->table.' as u');
    //     $this->db->join('roles as r', 'r.name = u.role_type_id');
    //   // $this->db->where($where);
    //     $this->db->group_by('u.id');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
public function get_all_keepers(){
       // $where = array('u.role_id'=>5,'is_deleted'=>0);//for vendor only
        $this->db->select('u.id, email, phone, full_name, address, u.status, code');
        $this->db->from($this->table.' as u');
        $this->db->join('roles as r', 'r.id = u.role_id');
       
        $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }
    //only return activate records
    public function count(){
        return $this->db->where('status',1)->from($this->table)->count_all_results();
    }

    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); //return last inserted category_id
    }

    function update($data, $where){
        return $this->db->update($this->table, $data, $where);
    }

      function update_teams($data, $where){
        return $this->db->update($this->table, $data, $where);
    }

    public function delete($where){
        return $this->db->delete($this->table, $where);
    }

    //DASHBOARD STATISTICS
    public function get_vendor_customers(){
        /*select count(*) as total_customers, c.vendor_id, v.full_name from users as c
        INNER JOIN users as v on v.id = c.vendor_id
        where c.role_id = 4 and c.vendor_id != 0
        GROUP BY c.vendor_id
        */
        $where = array('c.role_id '=>4,'c.vendor_id !='=>0);//for vendor only
        $this->db->select('count(*) as total_customers, c.vendor_id, v.full_name');
        $this->db->from($this->table.' as c');
        $this->db->join($this->table.' as v', 'v.id = c.vendor_id');
        $this->db->where($where);
        $this->db->group_by('c.vendor_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_delivery_vendors($where = null){
        $this->db->select('u.id, u.profile_image_url, u.full_name, u.status, u.address, o.order_id, u.email, u.phone, u.profile_image_url, u.role_id, o.delivery_date');
        $this->db->from($this->table.' as u');
        $this->db->join('orders as o', 'u.id = o.vendor_id');
        $this->db->where('u.role_id',2);

        //delivery date condition
        if($where){
            $this->db->where($where);
        }

        $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }
    
      public function check_email($id, $email)
    {
        $this->db->where(array('email'=>$email));
        $recs = $this->db->get('users')->result_array();
        if(count($recs) > 0)
        {
            return false;
        }
        else
            return true;
    }

    public function get_data($t, $w = null)
    {
        if($w != null)
            $this->db->where($w);
        return $this->db->get($t)->result_array();
    }
    
    
    public function get_service_type_op(){
        
        return $this->db->get('tbl_service_type')->result();
    }
     public function get_emirites_type_op(){
        
        return $this->db->get('tbl_emirates')->result();
    }
    
    public function deli($id,$acti){
       
        
        if($acti=='b'){
            $this->db->where('id',$id);
            $result = $this->db->delete('tbl_bag_quotations');
            return $result;
            
        }else if($acti=='c'){
            $this->db->where('id',$id);
            $result = $this->db->delete('tbl_cash_quotations');
            return $result;
            
        }else if($acti=='d'){
            $this->db->where('id',$id);
            $result = $this->db->delete('tbl_delivery_quotations');
            return $result;
            
        }else{
            return 'f';
        }
    }




    // new added 29-05-2020
    
    
      public function get_all_storekeepers(){
       // $where = array('u.role_type_id'=>7);//for vendor only
        $this->db->select('u.id, u.email, u.phone, u.full_name, u.address,u.Password_partner, u.status, code,r.name');
        $this->db->from($this->table.' as u');
        $this->db->join('roles as r', 'r.id= u.role_id');
        // $this->db->join('login_log AS ll', 'll.user_id = u.id', 'left');
        $this->db->where('r.id',5); // role id 5 is for storekeeprs
        // $this->db->group_by('u.id');
        $query = $this->db->get();
        
        //  return $this->db->last_query();
        // die();
        return $query->result();
    }
    
    
     public function add_store_keeper_regis($tb,$data)
      {
        $this->db->insert($tb,$data);
        $data['email'] = $this->db->insert_id();
        $data['full_name'] = $this->db->insert_id();
       
        $data['Password_partner'] = $data['email'] =$data['full_name'] ;    
      return $data;
      }


      public function str_kpr_pending_bags($where){
           
       }
       
       
       
       public function get_rolename($whr){
      $this->db->select('name');
      $this->db->from('roles');
      $this->db->where($whr);
      
      $res=$this->db->get()->result();
      
      return $res[0]->name;
  }
  
  
  
    
//   ********* for invoice ***********


 public function get_partner_by_id_Acc($id){
        // $where_role = array('u.role_id'=>3);//for driver only
        // return $id;
        $this->db->select('u.id,u.full_name,u.email,u.phone,u.address,u.term,u.inv_email,u.inv_address,u.trn');
        $this->db->from($this->table.' as u');
        
        $this->db->where('u.id',$id);
     
        //$this->db->group_by('u.id');
        $query = $this->db->get();
        $res = $query->result();
        
        return $res;
    }
    
    
    
    public function check_registration_new($email){
               
               $this->db->select('id');
               $this->db->from('users');
               $res=$this->db->where('email',$email);
               
               if($res){
               return $res[0]->id;
               }else{
                   return 0;
               }
           }
           
           
      // New Module TA 25-April-2021 Start
      public function get_vendor_name_TA($where){
        
         $where['role_id'] = 2 ;
      
        // $where['is_deleted'] = 0;
        
        $query=$this->db->select('full_name')->get_where($this->table, $where);
        return $query->result();
        
        
    }
    
     public function check_unique_customerid_result($id){
        
        //   $where['role_id'] =4;
      
        // // $where['is_deleted'] = 0;
        
        // $where['customer_id'] = $id;
        
        $where=array('role_id' =>4,
                     'customer_id' =>$id );
        
        
        $query=$this->db->select('id')->get_where($this->table, $where);
        
        // print_r($this->db->last_query());
        return $query->result();
        
        
    }
    
    public function check_unique_phone_result($phn){
       
        
        $where=array('role_id' =>4,
                     'phone' =>$phn );
        
        
        $query=$this->db->select('id,phone')->get_where($this->table, $where);
        
        // print_r($this->db->last_query());
        return $query->result();
        
        
    }
      
    // New Module TA 25-April-2021 Ends
    
    
     function update_partner_logo($data, $where){
        return $this->db->update($this->table, $data, $where);
    }
           
}

?>
