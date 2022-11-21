<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 1:13 PM
 */

class monthlyMeals_model extends CI_Model{

    /*Order Status
    =Not Assign
    =Assign
    =Ship
    =Delivered
    =Cancel
    =Return
    */
    var $table = "monthly_meal_plans";
    // var $table_type = "delivery_type";
    // var $table_types = "roles";
    // var $table_time_slot="basic_time_slots";

    //  var $table_typessss = "rolesrole_type";

    public function __construct(){
        parent::__construct();
    }


    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
  
    
    

 
//  TA_NEw_module ********

    // public function add_customer_meta($tb,$data)
    //   {
    //     $res=$this->db->insert($tb,$data);
    //     // $res=false;
    //     if($res){
    //         $data=array('id' => $this->db->insert_id() );
    //     }else{
    //         $data=false;
    //     }
           
    //   return $data;
    //   }
      
    //   function add_plan_order($data){
    //     $this->db->insert($this->table, $data);
    //     return $this->db->insert_id(); //return last inserted id
    // }
    
    //  public function check_customer_email_TA($where){
        
    //      $where['role_id'] = 4   ;
      
    //     // $where['is_deleted'] = 0;
        
    //     $query=$this->db->select('full_name')->get_where('users', $where);
    //     return $query->result();
        
        
    // }






   public function get_Meal_plans($where, $s =null, $l=null, $col = null, $dir = null)
    {
        // $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.tot_ice_pack_received as ice_bags,o.bag_received as own_bag_receive_count,o.ice_bags as old_ice_bags,o.assigned_user,o.assigned_mode,o.cooling_bag_check,
        //  DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
        //   DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
        //   qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        // c.full_name as customer, d.full_name as driver, v.full_name as vendor,v.email as v_email, c.address,
        // c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, c.send_notification, o.food_type,v.emails_for_report,
        
        // o.str_keep_varification,o.varified_at,o.varified_by,y.full_name as str_keeper_name,y.phone as str_keeper_phn,
        
        // o.forcely_check,o.forcely_reason,o.forcely_status_was,o.forcely_selection,o.forcely_changed_at,o.forcely_changed_by,f.full_name  as forcely_changed_by_name,o.is_cancelled as canceled_check
        // ');
        
        // SUM(CASE WHEN o.plan_id = po.plan_id THEN 1 ELSE 0 END) AS sum_is
        
        // count(tot.plan_id) as total_deliveries_are,
        $this->db->select('o.*,c.full_name,c.phone,o.plan_id,
         SUM(CASE WHEN o.plan_id = tot.plan_id   AND tot.action="Active" THEN 1 ELSE 0 END) AS total_deliveries_are,
        SUM(CASE WHEN o.plan_id = tot.plan_id AND tot.action != "Freezed" AND (tot.status="Assign" OR tot.status="Not Assign" OR tot.status="Ship") AND tot.is_cancelled ="No"  THEN 1 ELSE 0 END) AS pendings_are,SUM(CASE WHEN o.plan_id = tot.plan_id AND (tot.status="Collected" OR tot.status="Delivered") AND tot.is_cancelled ="No"  THEN 1 ELSE 0 END) AS completed,
        SUM(CASE WHEN o.plan_id = tot.plan_id AND tot.is_cancelled ="Yes"  THEN 1 ELSE 0 END) AS cancel, 
        
        SUM(CASE WHEN o.plan_id = tot.plan_id AND (tot.status="Collected" OR tot.status="Delivered")  AND tot.action!="Freezed" THEN 1 ELSE 0 END) AS completed_plan_status,
      
        SUM(CASE WHEN o.plan_id = tot.plan_id   AND tot.action="Freezed" THEN 1 ELSE 0 END) AS tot_freeze,
        SUM(CASE WHEN o.plan_id = tot.plan_id   AND tot.action="Active" THEN 1 ELSE 0 END) AS no_of_days,
        max( tot.delivery_date ) as exp_date
        ');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('orders as tot', 'o.plan_id = tot.plan_id','left');
       
        // $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        $this->db->group_by('o.plan_id'); 
         
        
        if($where){
            $this->db->where($where);
            
            
        }
        
        if($col != null AND $dir != null)
        {
            $this->db->order_by($col, $dir);
             
        }else{
            $this->db->order_by(plan_id, 'desc');
        }
        if($col != null AND $dir != null)
        {
           $this->db->limit($l, $s);
        }
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // die();
        
        $resp = $query->result_array();
        // return $this->db->last_query();
        return $resp;
    }
    
    
     public function get_total_results($where)
    {
        // $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.bag_received, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,
        //  DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
        //   DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
        //   qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        // c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
        // c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, c.send_notification, o.food_type');
        
         $this->db->select('o.*,c.full_name,c.phone');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
       
        // $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
      
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $resp = $query->result_array();
        return count($resp);
    }
    
     public function get_total_results_new($where)
    {
       
        $this->db->select('COUNT(*) as count');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
       
        // $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
       
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $resp = $query->result_array();
        
       
        
        return $resp[0]['count'];
    }
    
    
    public function get_customer_name_and_codes(){
        
        $this->db->select('DATE_FORMAT(o.plan_start_date,"%Y-%m-%d") as plan_start_date ,o.customer_id,o.pcustomer_id,o.plan_id,DATE_FORMAT(o.created_at,"%Y-%m-%d") as created_at,c.full_name,c.email');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
       
        if($this->session->userdata('role') != 'admin' AND $this->session->userdata('role') == 'vendor'){
            $userid = $this->session->userdata("u_id");
            $whr='o.vendor_id="'.$userid.'"';
            $this->db->where($whr);
        }
        
         $this->db->order_by('plan_id','desc');
        $query = $this->db->get();
       
        // print_r($this->db->last_query());
        // die();
        $resp = $query->result();
        
        return $resp;
        // echo '<pre>';
        // print_r($resp);
        // die();
        
    }
    
    public function get_user_with_codes(){
        
        $this->db->select('c.id,c.full_name as u_name,c.email as u_email,c.phone as phn,c.all_detail,c.mul_address,c.customer_id as PU_code,c.role_id,p.full_name as vendor_n,p.email as vendor_email');
        $this->db->from('users as c');
        $this->db->join('users as p', 'c.vendor_id = p.id');
        
        $whr='c.customer_id !="" AND c.mul_address!="" AND c.role_id =4 AND c.mealplan_check=1';
        
        if($this->session->userdata('role') != 'admin' AND $this->session->userdata('role') == 'vendor'){
            $userid = $this->session->userdata("u_id");
            $whr=$whr.' AND p.id="'.$userid.'"';
        }
        $this->db->where($whr);
        
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $resp = $query->result();
        
        return $resp;
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        
    }
    
    public function tot_deliv($where){
        
                    
            // QUERY
            $this->db->select('o.action,o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received,o.bag_received as own_bg_count,o.ice_bags as own_ice_bg,o.tot_ice_pack_received as ice_bags,o.cooling_bag_check,
        o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price,o.delivery_amount,o.driver_recvd_amount,o.other_payment_driver_recv');
        $this->db->from('orders as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
        $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
        $this->db->where($where);
        $this->db->order_by('o.delivery_date','Acs');
        
        $query = $this->db->get();
        // echo '<pre>';
        //   print_r($this->db->last_query());
        //  die();
        $orders = $query->result();
        
        return $orders;
    }
    
    
    
    public function get_customer_info($where,$id=0,$planid=0){
      $this->db->select('u.id as u_id,u.full_name as u_name,u.email as u_email,u.phone,u.customer_id,u.vendor_id,v.full_name as vendor,u.mul_address,u.all_detail,u.default_address,u.send_notification,u.user_notes');
      $this->db->from('users as u');
      
      $this->db->join('users as v' , 'u.vendor_id = v.id','left');
      
      
        $this->db->where($where);
        $query = $this->db->get();
        //  print_r($this->db->last_query());
        // die();
        
        $res = $query->result();
        // echo '<pre>';
        // print_r($res);
        // die();
        return $res;
      
  }
  
   public function get_service_type_op(){
        
        return $this->db->get('tbl_service_type')->result();
    }
    
    public function get_emirites_type_op(){
        
        return $this->db->get('tbl_emirates')->result();
    }
    
    public function get_plan_by_id($id){
      $this->db->select('o.*');
         $this->db->from($this->table.' as o');
        $this->db->where('o.plan_id',$id);
        $query = $this->db->get();
         $res = $query->result();
        return $res;
  }
  
  
  
  public function get_orders_by_plan_id($id){
      
      $this->db->select('o.delivery_date as fordaydate,o.order_id,o.plan_id,o.delivery_address as addr,DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, DATE_FORMAT(o.delivery_date,"%Y-%m-%d") as o_date,o.delivery_time,o.areaID,o.status,o.areaID as area_name,o.google_link_addrs,o.action as o_status,o.is_cancelled as cancel,o.day as o_day ,o.emirateID,o.slotID,o.delivery_amount,o.food_type,o.company_note,o.pickUp,o.cooling_bag_check as bag_type,o.bag_qr,o.mul_addr_id,o.note,o.send_notification');
      $this->db->from('orders as o');
      $this->db->where_in('o.plan_id', $id);
       $this->db->where_not_in('o.action' ,'Paused');
       
       $this->db->order_by("o.delivery_date", "asc");
      $query = $this->db->get();
      $res = $query->result();
   
        return $res;
  }
  
  public function get_plan_stats($id){
       $whr_arr=array('Active','Paused');
      
      $this->db->select('count(o.plan_id) as no_days');
      $this->db->from('orders as o');
      $this->db->where_in('o.plan_id', $id);
    //   $this->db->where_in('o.action', 'Active');
      $this->db->where_in('o.action', $whr_arr);
      $query = $this->db->get();
    //   $resp = $query->result_array();
        
       
        
    //     return $resp[0]['count'];
     
      $res = $query->result();
      
    //   echo '<pre>';      print_r($res);
    //   die();
   
        return $res;
  }
  
  public function get_plan_exp($id){
      
      
      $this->db->select('o.delivery_date');
      $this->db->from('orders as o');
      $this->db->where_in('o.plan_id', $id);
      $this->db->where_not_in('o.action' ,'Paused');
      $this->db->order_by("o.delivery_date", "desc");
       $this->db->limit(1);
      $query = $this->db->get();
      
    //   echo '<pre>';
    //   print_r($this->db->last_query());
    //   die();
      $res = $query->result();
   
        return $res;
  }
  
  
  public function get_customer_info_and_bags_stats_PIPI($id){
        // count(o.order_id) as total_deliveries_are
      $this->db->select("p.*,
         sum(case when (o.status = 'Delivered' OR o.status = 'Collected') AND o.cooling_bag_check =1 AND o.is_cancelled ='no' then 1 else 0 end) as total_cooling_bag_delivered,
         sum(case when (o.status = 'Delivered') AND o.cooling_bag_check =0 AND o.is_cancelled ='no' then 1 else 0 end) as total_paper_bag_delivered,
        
        
         sum(case when o.status = 'Collected' AND o.bag_received!=0 AND o.cooling_bag_check !=3 then 1 else 0 end) as collected,
        sum(case when o.status = 'Collected' AND o.cooling_bag_check =1 then o.bag_received else 0 end) as empty_cooler_bag_received,
        sum(case when o.status = 'Delivered' AND o.cooling_bag_check =1 then o.pending_bag else 0 end) as pending_bag_with_customer,
        
        
         sum(case when (o.action ='active'  OR o.action='Paused') then 1 else 0 end) as total_deliveries_are,o.plan_id as order_plan_id,
        
        
        SUM(CASE WHEN (o.status='Assign' OR o.status='Not Assign' OR o.status='Ship') AND o.action !='Freezed' AND o.is_cancelled ='No'  THEN 1 ELSE 0 END) AS pendings_are,
        SUM(CASE WHEN (o.status='Collected' OR o.status='Delivered') AND o.is_cancelled ='No'  THEN 1 ELSE 0 END) AS completed,
        SUM(CASE WHEN o.is_cancelled ='Yes'  THEN 1 ELSE 0 END) AS cancel,
        SUM(CASE WHEN p.plan_id = o.plan_id   AND o.action='Freezed' THEN 1 ELSE 0 END) AS tot_freeze
        
        
      
      ");
      $this->db->from( $this->table.' as p');
      
      $this->db->join('orders as o', 'p.customer_id = o.customer_id AND p.plan_id= o.plan_id','left');
      
      
      $this->db->where_in('p.customer_id',$id);
      $this->db->group_by('p.plan_id');
      $query = $this->db->get();
    //   return $this->db->last_query();
      $res = $query->result();
   
        return $res;
  }
  
   public function get_customer_info_and_bags_stats($id){
        // count(o.order_id) as total_deliveries_are
      $this->db->select("p.*,u.full_name,
         sum(case when (o.status = 'Delivered' OR o.status = 'Collected') AND o.cooling_bag_check =1 AND o.is_cancelled ='no' then 1 else 0 end) as total_cooling_bag_delivered,
         sum(case when (o.status = 'Delivered') AND o.cooling_bag_check =0 AND o.is_cancelled ='no' then 1 else 0 end) as total_paper_bag_delivered,
        
        
         sum(case when o.status = 'Collected' AND o.bag_received!=0 AND o.cooling_bag_check !=3 then 1 else 0 end) as collected,
        sum(case when o.status = 'Collected' AND o.cooling_bag_check =1 then o.bag_received else 0 end) as empty_cooler_bag_received,
        sum(case when o.status = 'Delivered' AND o.cooling_bag_check =1 then o.pending_bag else 0 end) as pending_bag_with_customer,
        
        
         sum(case when (o.action ='active'  OR o.action='Paused') then 1 else 0 end) as total_deliveries_are,o.plan_id as order_plan_id,
        
        
        SUM(CASE WHEN (o.status='Assign' OR o.status='Not Assign' OR o.status='Ship') AND o.action !='Freezed'   AND o.is_cancelled ='No'  THEN 1 ELSE 0 END) AS pendings_are,
        SUM(CASE WHEN (o.status='Collected' OR o.status='Delivered') AND o.is_cancelled ='No'  THEN 1 ELSE 0 END) AS completed,
        SUM(CASE WHEN o.is_cancelled ='Yes'  THEN 1 ELSE 0 END) AS cancel,
        SUM(CASE WHEN p.plan_id = o.plan_id   AND o.action='Freezed' THEN 1 ELSE 0 END) AS tot_freeze,
        SUM(CASE WHEN p.plan_id = o.plan_id   AND o.action='Paused' THEN 1 ELSE 0 END) AS tot_paused
        
        
      
      ");
      $this->db->from( $this->table.' as p');
      
      $this->db->join('orders as o', 'p.customer_id = o.customer_id AND p.plan_id= o.plan_id','left');
      $this->db->join('users as u', 'p.customer_id = u.id ','left');
      
      $this->db->where_in('p.customer_id',$id);
      $this->db->group_by('p.plan_id');
      $query = $this->db->get();
    //   return $this->db->last_query();
      $res = $query->result();
   
        return $res;
  }
  
  
  
  public function get_area_by_id($id){
      
     $this->db->select('area_name');
     $this->db->where('area_id',$id);
     $this->db->from('areas');
     $result=$this->db->get()->result();
     
     if($result){
          return $result[0]->area_name;
     }else{
         return false;
     }
  }
  
  
  public function getemirate_name_byID($id){
      $this->db->select('emirate_name');
     
     $this->db->from('tbl_emirates');
     $this->db->where('id',$id);
     $result=$this->db->get()->result();
     if($result){
        return $result[0]->emirate_name;
     }else{
         return false;
     }
    //return 'hello';
  }
  
  public function gettimeslot_name_byID($id){
      $this->db->select('name');
      $this->db->from('basic_time_slots');
     $this->db->where('basic_time_id',$id);
     
     $result=$this->db->get()->result();
     
     if($result){
     return $result[0]->name;
     }else{
         return false;
     }
  }
  
  
  
  
  public function get_partner_price($vendor_id,$delivery_date,$emirateID,$area_str,$service_typ,$string_emirate){
    
    $this->db->select('d.user_id as PartnerID,d.price,d.same_loc_price,d.service_type');
    $this->db->from('tbl_delivery_quotations as d');
    
    $this->db->where('d.user_id',$vendor_id);
    $this->db->where('d.emirate',$emirateID);
    $this->db->where('d.service_type',$service_typ);
       
    
    $ans=$this->db->get()->result();
   
    // print_r($this->db->last_query());
    // die(); 
    
      $same_loc = $this->search_same_loc($vendor_id,$delivery_date,$area_str,$string_emirate);
      if(count($same_loc) > 0){
          //echo 'yes';
          $ans[0]->ans ='yes';
          foreach($same_loc as $key => $val){
             // echo 'THis isssssssssss:'.$val->order_id;
            if($key == 0)
            $ans[1]->ids=$val->order_id;
            else
            $ans[1]->ids=$ans[1]->ids.','.$val->order_id;
            
            // echo '<br> THIS IS :'.$ans[1]->ids.'<br>';
          }
      }else{
         // echo 'no';
          $ans[0]->ans ='no';
      }
    return $ans;
    //die();
    
}

public function search_same_loc($vendor_id,$delivery_date,$area_str,$string_emirate){
       $dts = date('Y-m-d', strtotime($delivery_date));
       $dts=$dts.' 00:00:00';
       $dte=date('Y-m-d', strtotime($delivery_date));
       $dte=$dte.' 23:59:59';
       
       
      //$this->db->select('o.order_id,o.vendor_id,o.delivery_date,o.delivery_address');
      $this->db->select('o.order_id');
      $this->db->from('orders as o');
      $this->db->where('o.vendor_id', $vendor_id );
      $this->db->where('o.delivery_date BETWEEN "'.$dts.'" AND "'.$dte.'" ');
      $this->db->where('o.delivery_address', $area_str );
      
       $this->db->where('o.delivery_time', $string_emirate );
      $this->db->where('o.discount_track', '' );
      $ans=$this->db->get()->result();
    //   echo '<pre>';
    //   print_r($this->db->last_query());
    //   die();
      
    //   echo '<pre>';
    //   print_r($ans);
      return $ans;
}



function update_things_plan_tbl($data, $where){
    
         $this->db->trans_complete();  
        // return $this->db->update($tbl, $data, $where);
        
          $this->db->where($where);
          $this->db->update('monthly_meal_plans', $data);
        if($this->db->affected_rows() > 0)
                {
                    $res =true;
                    
                }else{
                    $res =false;
                }
                
                return $res;
    }
    
    
    
    function update_things_order_tbl($data, $where){
    
         $this->db->trans_complete();  
        // return $this->db->update($tbl, $data, $where);
        
          $this->db->where($where);
          $this->db->update('orders', $data);
        if($this->db->affected_rows() > 0)
                {
                    $res =true;
                    
                }else{
                    $res =false;
                }
                
                 return $res;
    }
    
    
    
     public function check_PU_validation($PU,$role_type_id)
    {
        // echo "called function";
        $this->db->where('customer_id',$PU);
        // $this->db->where('role_id',$role_type_id);
        $this->db->where('is_deleted',0);
        return $this->db->get('users')->result();
        // print_r($res);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    // Pricing
    
    public function get_partner_price_m($vendor_id,$delivery_date,$emirateID,$area_str,$service_typ,$string_emirate,$order_id=0){
    
    $this->db->select('d.user_id as PartnerID,d.price,d.same_loc_price,d.service_type');
    $this->db->from('tbl_delivery_quotations as d');
    
    $this->db->where('d.user_id',$vendor_id);
    $this->db->where('d.emirate',$emirateID);
    $this->db->where('d.service_type',$service_typ);
       
    
    $ans=$this->db->get()->result();
   
    // print_r($this->db->last_query());
    // die(); 
    
     if($order_id !=0){
      $same_loc = $this->search_same_loc_m($vendor_id,$delivery_date,$area_str,$string_emirate,$order_id);
      }else{
       $same_loc = $this->search_same_loc_m($vendor_id,$delivery_date,$area_str,$string_emirate);   
      }
      
      echo "i am return of same location";
      print_r($same_loc);
      
      echo ' i am count of same loc '.count($same_loc);
      if(count($same_loc) > 0){
          echo 'i am in yes no if';
          //echo 'yes';
          $ans[0]->ans ='no';
          foreach($same_loc as $key => $val){
              echo 'THis isssssssssss order id:'.$val->order_id;
           if($val->order_id !=0){  
                 $ans[0]->ans ='yes';
                 if($key == 0)
                 $ans[1]->ids=$val->order_id;
                 else
                 $ans[1]->ids=$ans[1]->ids.','.$val->order_id;
            
           }
            
            // echo '<br> THIS IS :'.$ans[1]->ids.'<br>';
          }
      }else{
         // echo 'no';
          $ans[0]->ans ='no';
      }
      
      
      
      echo 'check';
      print_r($ans);
    //   die();
    return $ans;
    //die();
    
}

public function search_same_loc_m($vendor_id,$delivery_date,$area_str,$string_emirate,$order_id=0){
       $dts = date('Y-m-d', strtotime($delivery_date));
       $dts=$dts.' 00:00:00';
       $dte=date('Y-m-d', strtotime($delivery_date));
       $dte=$dte.' 23:59:59';
       
       
      //$this->db->select('o.order_id,o.vendor_id,o.delivery_date,o.delivery_address');
      $this->db->select('o.order_id');
      $this->db->from('orders as o');
      $this->db->where('o.vendor_id', $vendor_id );
      $this->db->where('o.delivery_date BETWEEN "'.$dts.'" AND "'.$dte.'" ');
      $this->db->where('o.delivery_address', $area_str );
      
       $this->db->where('o.delivery_time', $string_emirate );
       $this->db->where('o.discount_track', '' );
       $ans=$this->db->get()->result();
    //   echo '<pre>';
    //   print_r($this->db->last_query());
    //   die();
    
    echo '<pre><br> this was ans : ';
      print_r($ans);
    
    if($order_id!=0){ 
       foreach($ans as $key) {
       if ($order_id == $key->order_id){
          
           $key->order_id=0;
       }
    }
      echo '<pre><br>After as thses are edits so :';
      print_r($ans);
    }
      
      
     return $ans;
}



function update_freeze_defreez_order_data($data, $where,$tbl){
    
         $this->db->trans_complete();  
        // return $this->db->update($tbl, $data, $where);
        
        //   $this->db->where($where);
          $this->db->where($where);
          $this->db->update($tbl, $data);
        if($this->db->affected_rows() > 0)
                {
                    $res =true;
                    
                }else{
                    $res =false;
                }
                
                // echo '<pre>';
                // print_r($this->db->last_query());
                // die();
                 return $res;
    }
    
    
     function delete_orders_frozen($where){
        $this->db->trans_complete(); 
        return $this->db->delete('orders', $where);
    }
    
    function delete_plan_all($where){
        $this->db->trans_complete(); 
        return $this->db->delete('monthly_meal_plans', $where);
    }
    
    
    public function get_all_upcoming_deliveries($whr_is){
        
        $this->db->select('order_id ,send_notification,status,name_on_delivery,number_on_delivery,customer_id,vendor_id,signature,delivery_date,delivery_address,
        pickUp,delivery_time,note,created,created_user,updated_user,created_terminal,updated_terminal,food_type,service_type_id,
        areaID,emirateID,slotID,partner_price,discount_track,delivery_amount,company_note,google_link_addrs,day,
        mul_addr_id,plan_id,pcustomer_id,freezed_track,action');
        
        $this->db->from('orders');
        $this->db->where($whr_is);
    $res=$this->db->get()->result();
    
    return $res;
    // echo '<pre>';
    // print_r($this->db->last_query());
    // die();
        
        
        
    }
        
    
    
    
      public function get_all_freezed_deliveries_def($whr_is){
        
        $this->db->select('order_id ,status,delivery_date,
         plan_id,pcustomer_id,freezed_track,action');
        
        $this->db->from('orders');
        $this->db->where($whr_is);
        $this->db->order_by("delivery_date", "desc");
    $res=$this->db->get()->result();
    
    return $res;
    // echo '<pre>';
    // print_r($this->db->last_query());
    // die();
        
        
        
    }
    
    function count_orders($whr){
        $res= $this->db->select('count(order_id) as total')->from('orders')->where($whr)->get()->result();
        return $res[0]->total;
    }
    
    public function get_all_upcoming_pre_deliveries($whr_is){
        
        $this->db->select('order_id ,plan_id,send_notification,status,name_on_delivery,number_on_delivery,vendor_id,DATE_FORMAT(delivery_date,"%d-%m-%Y") as delivery_date,delivery_address,
        pickUp,delivery_time,note,food_type,delivery_amount,company_note,google_link_addrs,pcustomer_id,freezed_track,action');
        
        $this->db->from('orders');
      
        $this->db->where($whr_is);
    $res=$this->db->get()->result();
    
    return $res;
    // echo '<pre>';
    // print_r($this->db->last_query());
    // die();
        
        
        
    }
    
     public function get_all_upcoming_pre_deliveries_forXL($whr_is){
        
        $this->db->select('o.order_id ,o.plan_id,o.send_notification,o.status,o.name_on_delivery,o.number_on_delivery,o.vendor_id,DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date,o.delivery_address,o.is_cancelled,
        o.pickUp,o.delivery_time,o.note,o.food_type,o.delivery_amount,o.company_note,o.google_link_addrs,o.pcustomer_id,o.freezed_track,o.action,v.full_name as vendor,v.mul_emails_for_mealplan as emails_for_mealplan');
        
        $this->db->from('orders as o');
        $this->db->join('users as v','o.vendor_id =v.id','left');
        $this->db->where($whr_is);
    $res=$this->db->get()->result();
    
    return $res;
    // echo '<pre>';
    // print_r($this->db->last_query());
    // die();
        
        
        
    }
    
    
    
      // Delivery Edit Date
    
    public function get_existing_record_order($existing_record_whr){
        
        $this->db->select('o.order_id,o.delivery_date,o.status,o.action,o.delivery_date_edit_report,o.day');
        $this->db->from('orders as o');
        $this->db->where($existing_record_whr);
        $res = $this->db->get()->result();
        return $res;
        
        
    }
    
    
     // New pauswed
     public function get_all_upcoming_deliveries_for_pause($whr_is){
        
        $this->db->select('order_id ,send_notification,status,name_on_delivery,number_on_delivery,customer_id,vendor_id,signature,delivery_date,delivery_address,
        pickUp,delivery_time,note,created,created_user,updated_user,created_terminal,updated_terminal,food_type,service_type_id,
        areaID,emirateID,slotID,partner_price,discount_track,delivery_amount,company_note,google_link_addrs,day,
        mul_addr_id,plan_id,pcustomer_id,freezed_track,action');
        
        $this->db->from('orders');
        $this->db->where($whr_is);
        $this->db->order_by("delivery_date", "desc");
    $res=$this->db->get()->result();
    
    return $res;
    // echo '<pre>';
    // print_r($this->db->last_query());
    // die();
        
        
        
    }
    
    
    
      // Partners
    
    public function get_all_partners_for_mealplan(){
        $where = array('u.role_id'=>2,'is_deleted'=>0);//for vendor only
        $this->db->select('u.id, email, phone, full_name as u_name, u.partner_logo as logo');
        $this->db->from('users as u');
        // $this->db->join('roles as r', 'r.id = u.role_id');
        $this->db->where($where);
        // $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function get_all_customers_wrt_partner_($where_in,$check){
         $this->db->select("u.id,u.customer_id,u.full_name");
         $this->db->from("users as u");
         if($check!=1){
           $this->db->where_in("u.vendor_id",$where_in);
         }
         $this->db->where_not_in("u.customer_id","");
         $this->db->where_in("u.role_id",4);
         $this->db->where_in("u.mealplan_check",1);
         
         $this->db->order_by("u.full_name","ASC");
          
         
         return $this->db->get()->result();
         
    }
    
    
    public function get_plan_strt($id){
      
      
      $this->db->select('o.delivery_date');
      $this->db->from('orders as o');
      $this->db->where_in('o.plan_id', $id);
       $this->db->where_not_in('o.action' ,'Paused');
      $this->db->order_by("o.delivery_date", "asc");
       $this->db->limit(1);
      $query = $this->db->get();
      
    //   echo '<pre>';
    //   print_r($this->db->last_query());
    //   die();
      $res = $query->result();
   
        return $res;
  }
    
    
}




?>
