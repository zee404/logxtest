<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 1:13 PM
 */

class Order_model extends CI_Model{

    /*Order Status
    =Not Assign
    =Assign
    =Ship
    =Delivered
    =Cancel
    =Return
    */
    var $table = "orders";
    var $table_type = "delivery_type";
    var $table_types = "roles";
    var $table_time_slot="basic_time_slots";

     var $table_typessss = "rolesrole_type";
     var $bagpicks="bagspickup";

    public function __construct(){
        parent::__construct();
    }


    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
    public function get_records()
    {
        $this->db->where('qr_bag_id!=','');
        
        $this->db->order_by('created','ASC');
        //  $this->db->group_by('qr_bag_id');
        // $this->db->distinct('qr_bag_id');
         $query = $this->db->get($this->table);
        $orders = $query->result();
        return $orders;
    }
     public function get_qrCodes()
     {
         $query = $this->db->get('qr_bags');
        $orders = $query->result();
        return $orders;
    }
     function update_process($data, $where){
        return $this->db->update('qr_bags', $data, $where);
    }
    
    
    
    
    function get_qr_id_new($code,$user_id){
        
        $this->db->select("qrid,vendor_id");
        $this->db->from("qr_bags");
        $this->db->where("code ='$code'AND (vendor_id=$user_id OR vendor_id=0 )");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
                                   
            return $result[0];
        } else {
            return FALSE;
            // return $this->db->last_query();
        }
        
    }
    
//     public function get_qrBags(){
//   // $date=
//   $query = $this->db->query("select b.qrid,b.code,b.qrImage,b.createdAt,bs.status,x.full_name,x.phone,x.id,x.vendor_id
//   from (select o.qr_bag_id,u.full_name,u.phone,u.id,o.vendor_id from orders as o inner join users as u on o.customer_id = u.id where o.is_neutral=0 and o.qr_bag_id!=0) x
   
//   right join qr_bags as b on b.qrid = x.qr_bag_id
//   inner join bags_status as bs on b.bsid = bs.bsid");
//       // $this->db->select("b.qrid,b.code,b.qrImage,b.createdAt,bs.status,u.full_name,u.phone,u.id");
// //      
// //        $this->db->from('qr_bags as b');
// //        $this->db->join('bags_status as bs', 'b.bsid = bs.bsid');
// //        $this->db->join('orders as o', 'b.qrid = o.qr_bag_id','left');
// //        $this->db->join('users as u', 'o.customer_id = u.id','left');
// //        $this->db->where('o.is_neutral',0);
   
      
       
//       //  $query = $this->db->get();
//         $orders = $query->result();
//         if ($orders){
//             return $orders;
           
//         }else{
//             return false;
         
//         }
      
      
//     }




public function get_qrBags(){
  // $date=
   
    if($this->session->userdata('role') == 'admin' OR ($this->session->userdata('role_id') >5) ){
  $query = $this->db->query("select b.vendor_id as b_vendor,v.full_name as qr_vendor_owner,v.phone as vendor_owner_phn,b.qrid,b.code,b.qrImage,b.createdAt,bs.status,u.full_name,u.phone,u.id,u.vendor_id,
   o.qr_bag_id,u.full_name,u.phone,u.id,o.vendor_id 
   
   
   from qr_bags as b 
   
   
   left join orders as o on b.qrid = o.qr_bag_id and o.is_neutral=0 and o.qr_bag_id!=0
   left join users as u on o.customer_id = u.id 
   
   
  left join bags_status as bs on b.bsid = bs.bsid
  left join users as v on b.vendor_id = v.id
  
  
  ");
   
    }else{
        $userid = $this->session->userdata("u_id");
        $role=$this->session->userdata('role');
        
        $query = $this->db->query("select b.vendor_id as b_vendor,v.full_name as qr_vendor_owner,v.phone as vendor_owner_phn,b.qrid,b.code,b.qrImage,b.createdAt,bs.status,u.full_name,u.phone,u.id,u.vendor_id,
   o.qr_bag_id,u.full_name,u.phone,u.id,o.vendor_id 
   
   
   from qr_bags as b 
   
   
   left join orders as o on b.qrid = o.qr_bag_id and o.is_neutral=0 and o.qr_bag_id!=0
   left join users as u on o.customer_id = u.id 
   
   
  left join bags_status as bs on b.bsid = bs.bsid
  left join users as v on b.vendor_id = v.id");
        
    }
      // $this->db->select("b.qrid,b.code,b.qrImage,b.createdAt,bs.status,u.full_name,u.phone,u.id");
//      
//        $this->db->from('qr_bags as b');
//        $this->db->join('bags_status as bs', 'b.bsid = bs.bsid');
//        $this->db->join('orders as o', 'b.qrid = o.qr_bag_id','left');
//        $this->db->join('users as u', 'o.customer_id = u.id','left');
//        $this->db->where('o.is_neutral',0);
   
    //   print_r($query);
    //   die();
    //   return $this->db->last_query();
        // $query = $this->db->get();
        // and o.vendor_id=".$userid."
        $orders = $query->result();
        // echo 'role:'.$role.'<br>';
        // echo 'userid is:'.$userid;
        // echo '<pre>';
        // print_r($orders);
        // die();
        
        if ($orders){
            return $orders;
           
        }else{
            return false;
         
        }
      
      
    }
public function get_qrBags_old_taking_time(){
  // $date=
   
    if($this->session->userdata('role') == 'admin' OR ($this->session->userdata('role_id') >5) ){
  $query = $this->db->query("select b.vendor_id as b_vendor,v.full_name as qr_vendor_owner,v.phone as vendor_owner_phn,b.qrid,b.code,b.qrImage,b.createdAt,bs.status,x.full_name,x.phone,x.id,x.vendor_id
  from (select o.qr_bag_id,u.full_name,u.phone,u.id,o.vendor_id from orders as o inner join users as u on o.customer_id = u.id where o.is_neutral=0 and o.qr_bag_id!=0) x
   
  right join qr_bags as b on b.qrid = x.qr_bag_id
  inner join bags_status as bs on b.bsid = bs.bsid
  left join users as v on b.vendor_id = v.id
  
  
  ");
   
    }else{
        $userid = $this->session->userdata("u_id");
        $role=$this->session->userdata('role');
        
        $query = $this->db->query("select b.vendor_id as b_vendor,b.qrid,b.code,b.qrImage,b.createdAt,bs.status,x.full_name,x.phone,x.id,x.vendor_id
  from (select o.qr_bag_id,u.full_name,u.phone,u.id,o.vendor_id from orders as o inner join users as u on o.customer_id = u.id where o.is_neutral=0 and o.qr_bag_id!=0 ) x
   
  right join qr_bags as b on b.qrid = x.qr_bag_id 
  inner join bags_status as bs on b.bsid = bs.bsid");
        
    }
      // $this->db->select("b.qrid,b.code,b.qrImage,b.createdAt,bs.status,u.full_name,u.phone,u.id");
//      
//        $this->db->from('qr_bags as b');
//        $this->db->join('bags_status as bs', 'b.bsid = bs.bsid');
//        $this->db->join('orders as o', 'b.qrid = o.qr_bag_id','left');
//        $this->db->join('users as u', 'o.customer_id = u.id','left');
//        $this->db->where('o.is_neutral',0);
   
      print_r($query);
      die();
    //   return $this->db->last_query();
        // $query = $this->db->get();
        // and o.vendor_id=".$userid."
        $orders = $query->result();
        // echo 'role:'.$role.'<br>';
        // echo 'userid is:'.$userid;
        // echo '<pre>';
        // print_r($orders);
        // die();
        
        if ($orders){
            return $orders;
           
        }else{
            return false;
         
        }
      
      
    }
    
    
    public function check_neutral($code){
   // $date=
   $query = $this->db->query("select b.qrid
   from orders as o inner join qr_bags as b on o.qr_bag_id=b.qrid where b.code='$code'
     and o.is_neutral=0");
      
        $orders = $query->result();
        if ($orders){
            return $orders[0];
           
        }else{
            return false;
         
        }
      
      
    }
public function get_extraBags(){
         $this->db->select("e.*,u.full_name,u.phone, v.full_name as vendor_name,v.phone as v_phn");
      
        $this->db->from('extrabags as e');
        $this->db->join('users as u', 'u.id = e.driverId');
         $this->db->join('users as v', 'v.id = e.vendor_id');
       
        $query = $this->db->get();
        $orders = $query->result();
        if ($orders){
            return $orders;
           
        }else{
            return false;
         
        }
      
      
    }


    public function get_where($where){
        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }
     public function search_customer($where){
        $query = $this->db->get_where("users", $where);
        return $query->result();
    }

   public function addcsv($tb,$data)
      {
        $res = $this->db->insert_batch($tb,$data); 
        return array('data'=>$data, 'res'=>$res);
      }
    // public function get_orders_old_at_1_jan_2021($where, $is_cancelled = false){
    //     $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received,o.bag_received as own_bg_count,o.ice_bags as own_ice_bg,o.tot_ice_pack_received as ice_bags,o.cooling_bag_check,
    //     o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
    //      DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
    //       DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
    //       qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
    //     c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
    //     c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price');
    //     $this->db->from($this->table.' as o');
    //     $this->db->join('users as c', 'c.id = o.customer_id');
    //     $this->db->join('users as d', 'd.id = o.driver_id','left');
    //     $this->db->join('users as v', 'v.id = o.vendor_id');
    //     // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
    //     $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
    //     $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
    //     $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
    //      $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
    //     //$this->db->limit(100);
    //     if($where){
    //         $this->db->where($where);
    //     }
    //     if($is_cancelled) {
    //         $this->db->where(['is_cancelled' => 'yes']);
    //     } else {
    //         $this->db->where(['is_cancelled' => 'no']);
    //     }
    //     $query = $this->db->get();
    //     $orders = $query->result();
    //     if ($orders){
    //         $result['result'] = true;
    //         $result['records'] = $orders;
    //     }else{
    //         $result['result'] = false;
    //     }
        
    //     return $result;
    // //   echo '<pre>';
    // //   return $this->db->last_query();
    // }
    
     public function get_orders($where, $is_cancelled = false){
        //  c.full_name as customer,  c.phone as c_phone,
        // o.name_on_delivery as customer
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery, c.full_name as customer,o.number_on_delivery as c_phone, o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received,o.bag_received as own_bg_count,o.ice_bags as own_ice_bg,o.tot_ice_pack_received as ice_bags,o.cooling_bag_check,
        o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
        DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
        DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
        qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
         d.full_name as driver, v.full_name as vendor, c.address,
        d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price,o.delivery_amount,o.company_note,o.driver_recvd_amount,o.google_link_addrs,o.other_payment_driver_recv,o.plan_id,o.areaID,o.emirateID,o.slotID,c.full_name as customer_basic_name');
        
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
        $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
        $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled){
            $this->db->where(['is_cancelled' => 'yes']);
        }else{
            $this->db->where(['is_cancelled' => 'no']);
        }
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
    
    
    

    public function get_orders_where($where, $s =null, $l=null, $col = null, $dir = null)
    {
       
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.tot_ice_pack_received as ice_bags,o.bag_received as own_bag_receive_count,o.ice_bags as old_ice_bags,o.assigned_user,o.assigned_mode,o.cooling_bag_check,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor,v.email as v_email, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, c.send_notification, o.food_type,v.emails_for_report,o.delivered_to as Delivery_drop_type,
        o.addr_img,o.addr_loc_by_dri,o.mul_addr_id,o.empty_bag_attachment,o.empty_bag_code,o.open_bag_attachment,o.plan_id,o.company_note');//SPOON_PORTAL no impect on APIs
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
          $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        if($where){
            $this->db->where($where);
        }
        
        if($col != null AND $dir != null)
        {
            $this->db->order_by($col, $dir);
        }
        
         $this->db->limit($l,$s);
        
        // if($s  AND $l)
        // {
        //   $this->db->limit($l,$s);
        // }
        $query = $this->db->get();
        $resp = $query->result_array();
        // return $this->db->last_query();
        return $resp;
    }
    
     public function get_orders_where_big_test($where, $s =null, $l=null, $col = null, $dir = null)
    {
       
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.tot_ice_pack_received as ice_bags,o.bag_received as own_bag_receive_count,o.ice_bags as old_ice_bags,o.assigned_user,o.assigned_mode,o.cooling_bag_check,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor,v.email as v_email, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, c.send_notification, o.food_type,v.emails_for_report,o.delivered_to as Delivery_drop_type,
        o.addr_img,o.addr_loc_by_dri,o.mul_addr_id,o.empty_bag_attachment,o.empty_bag_code,o.open_bag_attachment,o.plan_id,o.company_note');//SPOON_PORTAL no impect on APIs
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
          $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        if($where){
            $this->db->where($where);
        }
        
        if($col != null AND $dir != null)
        {
            $this->db->order_by($col, $dir);
        }
        
         $this->db->limit($l,$s);
        
        // if($s  AND $l)
        // {
        //   $this->db->limit($l,$s);
        // }
        $query = $this->db->get();
        // return $this->db->last_query();
        $resp = $query->result_array();
        // return $this->db->last_query();
        return $resp;
    }

    public function get_total_results($where)
    {
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.bag_received, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, c.send_notification, o.food_type');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
          $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
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
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
          $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $resp = $query->result_array();
        
       
        
        return $resp[0]['count'];
    }
     public function get_orders2($where){
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note,
         o.signature_img,o.bag_received,
        o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
          $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
        return $result;
    }
    
    
    // OLD BAGS TRACKING
    //  public function get_tracking_statistics($where){
    //     $this->db->select("sum(case when o.status = 'Delivered' then 1 else 0 end) as delivered, 
    //     sum(case when o.status = 'Collected' then 1 else 0 end) as collected,sum(case when o.status ='Not Assign' AND o.is_cancelled ='no' then 1 else 0 end) as pending,count(o.order_id) as total, c.full_name as customer,c.id,c.phone as customerPhone,
    //     c.address,v.full_name as vendor,v.id as vender_id,v.phone as vendorPhone");
      
    //     $this->db->from('users as c');
    //     $this->db->join('orders as o', 'c.id = o.customer_id');
      
    //     $this->db->join('users as v', 'v.id = o.vendor_id');
    //     $this->db->group_by('o.customer_id');
    //     if($where){
    //         $this->db->where($where);
    //     }
    //     $query = $this->db->get();
    
    //     $orders = $query->result();
    //     if ($orders){
    //         $result['result'] = true;
    //         $result['records'] = $orders;
    //     }else{
    //         $result['result'] = false;
    //     }
    //     // echo '<pre>';
    //     // print_r($result);
    //       return $result;
    // }
    
    //  public function get_tracking_statistics_details($vender_id,$from_date,$to_date){
    //     $this->db->select("sum(case when b.status = 'Picked' then 1 else 0 end) as delivered,sum(case when b.status = 'Requested' then 1 else 0 end) as pending, 
    //     sum(case when b.status = 'Assign' then 1 else 0 end) as in_progress,count(b.bag_id) as total, c.full_name as customer,c.id,c.phone as customerPhone,
    //     c.address,v.full_name as vendor,v.phone as vendorPhone");
    //     $this->db->from('bags as b');
    //     $this->db->join('users as c', 'c.id = b.customer_id', 'left');
    //     //$this->db->join('orders as o', 'o.customer_id = b.customer_id');
    //     $this->db->join('users as v', 'v.id = c.vendor_id', 'left');
    //     $this->db->where("b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
    //     $this->db->where('b.vendor_id',$vender_id);
        
        
    //     // $this->db->from('users as c');
    //     // $this->db->join('orders as o', 'c.id = o.customer_id');
    //     // $this->db->join('users as v', 'v.id = o.vendor_id');
    //     // $this->db->join('users as v', 'v.id = o.vendor_id');
    //     // $this->db->group_by('o.customer_id');
    //     // if($where){
    //     //     $this->db->where($where);
    //     // }
    //     $query = $this->db->get();

    //     $orders = $query->result();
    //     if ($orders){
    //         $result['result'] = true;
    //         $result['records'] = $orders;
    //     }else{
    //         $result['result'] = false;
    //     }
    //     // echo '<pre>';
    //     // print_r($result);
    //     return $result;
    // }

    // NEW BAGS TRACKING START
    
     public function get_tracking_statistics($where){
        $this->db->select("sum(case when (o.status = 'Delivered' OR o.status = 'Collected') AND o.cooling_bag_check !=3  then 1 else 0 end) as total_delivered, 
        sum(case when o.status = 'Assign' AND o.cooling_bag_check !=3 AND o.is_cancelled ='no' then 1 else 0 end) as total_assigned,
        
        sum(case when (o.status = 'Delivered' OR o.status = 'Collected') AND o.cooling_bag_check =1 AND o.is_cancelled ='no' then 1 else 0 end) as total_cooling_bag_delivered,
         sum(case when (o.status = 'Delivered') AND o.cooling_bag_check =0 AND o.is_cancelled ='no' then 1 else 0 end) as total_paper_bag_delivered,
        
        sum(case when o.status = 'Collected' AND o.bag_received!=0 AND o.cooling_bag_check !=3 then 1 else 0 end) as collected,
        sum(case when o.status = 'Collected' AND o.cooling_bag_check =1 then o.bag_received else 0 end) as empty_cooler_bag_received,
        sum(case when o.status = 'Delivered' AND o.cooling_bag_check =1 then o.pending_bag else 0 end) as pending_bag_with_customer,
        
        
        count(o.order_id) as total, 
        
        c.full_name as customer,c.id,c.phone as customerPhone,
        c.address,v.full_name as vendor,v.id as vender_id,v.phone as vendorPhone");
      
        $this->db->from('users as c');
        $this->db->join('orders as o', 'c.id = o.customer_id');
      
        $this->db->join('users as v', 'v.id = o.vendor_id');
        $this->db->group_by('o.customer_id');
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();
    
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
        // echo '<pre>';
        // print_r($result);
          return $result;
    }
    
    
    
     public function get_tracking_statistics_details($vender_id,$from_date,$to_date,$where=0){
        $this->db->select("o.*,c.full_name as customer,c.id as customer_id,c.phone as customerPhone,
        c.address as customer_address,v.full_name as vendor,v.email as vendor_email,v.id as vender_id,v.phone as vendorPhone,
        d.full_name as driver_who_deliver,d.id as driver_deliver_id,d.phone as driver_deliverPhone,
        
        x.full_name as driver_who_recv,x.id as driver_recv_id,x.phone as driver_recvPhone,
        yp.name_on_delivery as customer_recv,yp.customer_id as customer_recv_id,yp.number_on_delivery as customer_recv_Phone,yp.delivery_address as customer_recv_address,
        bag.driver_id as bag_driver_id_rcv,bag.customer_id as bag_recv_customer_id,
        bag_Detail.full_name as bag_customer_rcv,bag_Detail.phone as bag_phn_rcv,bag_Detail.address as bag_rcv_address,
        bag_Detail_d.full_name as bag_driver_name,bag_Detail_d.phone as bag_driver_phone,
        s.full_name as str_keepr_name,s.id as str_keeper_id,s.phone as str_keeper_Phone,
        n.full_name as neutral_name,n.id as neutral_id,n.phone as neutral_Phone,v.emails_for_report
        ");
        
        $this->db->from('orders as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
         $this->db->join('users as d', 'd.id = o.driver_id');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        
        $this->db->join('users as x', 'o.own_bag_rcv_by_driver_id = x.id','left');
        $this->db->join('orders as yp', 'o.own_bag_rcv_order_id = yp.order_id','left');
        $this->db->join('bags as bag', 'o.own_bag_rcv_bag_collection_id = bag.bag_id','left');
        $this->db->join('users as bag_Detail', 'bag.customer_id = bag_Detail.id','left');
        $this->db->join('users as bag_Detail_d', 'bag.driver_id = bag_Detail_d.id','left');
        $this->db->join('users as n', 'o.neutral_by = n.id','left');
        // $this->db->join('users as y', 'yp.customer_id = y.id','left');
        $this->db->join('users as s', 'o.varified_by =s.id','left');
       
        
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();

        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
            //  $result['records'] = $this->db->last_query();
        }else{
            $result['result'] = false;
            // $result['records'] = $this->db->last_query();
        }
        // echo '<pre>';
        // print_r($result);
        return $result;
    }

    
    
    // NEW BAGS TRACKING END
   

    // public function get_order_by_id_15feb($order_id){
        
    //     // o.ice_bags sami bhae
    //     $this->db->select('o.bag_qr,o.cooling_bag_check as bag_type,o.driver_verify_bag,o.cancellation_status as current_status,o.pu_number, o.signature, o.signature_img, o.order_id as delivery_id, o.order_id, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address, o.note, o.partner_price,
    //     c.full_name, c.phone, c.address, c.full_name as customer,o.send_notification,c.send_notification as old_notification,v.delivery_message,o.name_on_delivery,o.tot_ice_pack_received as ice_bags,o.number_on_delivery, d.full_name as driver, v.full_name as vendor,v.email as vendor_email, c.address,
    //     c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_img, o.total_bag_recv_by_driver as bag_received, o.bag_received as bg_count,o.bag_received_qr as qrcodes, o.delivery_time as delivery_type,DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
    //       DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date, serv.name as service,emi.emirate_name as emirate,
    //       ,o.canceled_reason,o.canceled_img,o.canceled_mode,o.cancellation_price,
    //       d.id as driver_id,d.device_token as d_device_token, d.platform as d_platform,d.badge_count as d_badge_count, c.badge_count as c_badge_count ,c.platform as c_platform,
    //       ,c.device_token as c_device_token,v.emails_for_zero_bags');
    //     $this->db->from($this->table.' as o'); 
    //     $this->db->join('users as c', 'c.id = o.customer_id', 'left');
    //     $this->db->join('users as d', 'd.id = o.driver_id', 'left');
    //     $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
    //     $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
    //      $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
    //   //  $this->db->join($this->table_type.' as t', 't.id = o.type_id');
    //     $this->db->where('o.order_id',$order_id);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    
    public function get_order_by_id($order_id){
        
        // o.ice_bags sami bhae
        $this->db->select('o.bag_qr,o.cooling_bag_check as bag_type,o.driver_verify_bag,o.cancellation_status as current_status,o.pu_number, o.signature, o.signature_img, o.order_id as delivery_id, o.order_id, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address, o.note, o.partner_price,
        c.full_name, c.phone, c.address, c.full_name as customer,o.send_notification,c.send_notification as old_notification,v.delivery_message,o.name_on_delivery,o.tot_ice_pack_received as ice_bags,o.number_on_delivery, d.full_name as driver, v.full_name as vendor,v.email as vendor_email, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_img, o.total_bag_recv_by_driver as bag_received, o.bag_received as bg_count,o.bag_received_qr as qrcodes, o.delivery_time as delivery_type,DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date, serv.name as service,emi.emirate_name as emirate,
           ,o.canceled_reason,o.canceled_img,o.canceled_mode,o.cancellation_price,
           d.id as driver_id,d.device_token as d_device_token, d.platform as d_platform,d.badge_count as d_badge_count, c.badge_count as c_badge_count ,c.platform as c_platform,
           ,c.device_token as c_device_token,v.emails_for_zero_bags,o.is_cancelled,
           o.company_note,o.driver_recvd_amount as driver_recvd,o.other_payment_driver_recv as other_cash,o.delivery_amount,o.delivered_to as Delivery_drop_type,
           o.addr_img,o.addr_loc_by_dri,o.mul_addr_id,o.is_cancelled,o.open_bag_attachment,o.open_bag_label_info,o.delivery_label_info,o.empty_bag_attachment,o.empty_bag_code,o.open_bag_attachment');//SPOON
        $this->db->from($this->table.' as o'); 
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as d', 'd.id = o.driver_id', 'left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
      //  $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->where('o.order_id',$order_id);
        $query = $this->db->get();
        
        
        // return $this->db->last_query();
        return $query->result();
    }
    
    
    public function get_trackorder_by_id($track_id){
        $this->db->select(' o.`status`, o.delivery_address, 
        c.full_name as customer,o.name_on_delivery,o.number_on_delivery, v.full_name as vendor,v.email as vendor_email,
        c.phone as c_phone, v.phone as v_phone,DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        
         $this->db->where_in('order_id', $track_id);
        // return $this->db->get('orders')->result_array();
        // $this->db->where('o.order_id',$order_id);
        $query = $this->db->get();
        return $query->result();
    }

    //only return all orders
    public function count($vendor_id){
        $this->db->from($this->table);
        if($vendor_id){
            $this->db->where('vendor_id',$vendor_id);
        }
        return $this->db->count_all_results();
    }

    public function count_all_by_delivery_date($where){
        $this->db->from($this->table);
        if($where){
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }

    //only return delivered
    public function count_shipped($where){
        $this->db->where('status',"Delivered");
        $this->db->from($this->table);
        if($where){
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }
    public function total_count($where){
    //    $this->db->where('status',"Delivered");
        $this->db->from($this->table);
        if($where){
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }

    //only return not assigned
    public function count_not_assigned($where){
        $this->db->where('status',"Not Assign");
        $this->db->from($this->table);
        if($where){
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }


    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); //return last inserted id
    }


    function update($data, $where){
        return $this->db->update($this->table, $data, $where);
    }

    function update_in($data, $order_ids){
        $this->db->where_in('order_id',$order_ids);
        return $this->db->update($this->table, $data);
    }

    public function delete($where){
        return $this->db->delete($this->table, $where);
    }
      public function deleteBag($where){
        return $this->db->delete("qr_bags", $where);
    }
  public function delete_deliveries($order_ids){
    $order_ids = implode(',', $order_ids);
       $this->db->where('order_id in ('. $order_ids .')');
       return $this->db->delete($this->table);
    }


    function assign_drives($data, $order_ids){
        $this->db->where('order_id in ('. $order_ids .')');
        return $this->db->update($this->table, $data);
    }
    function auto_assign_drives($data,$ID){
        $this->db->where('order_id',$ID);
        return $this->db->update($this->table, $data);
    }
   
    
    
    function get_related_drivers(){
        
        $dts=date("Y-m-d")." 00:00:00";
        $dte=date("Y-m-d")." 23:59:59";
    $this->db->select('SUM(CASE WHEN o.driver_id!="" AND o.cancel_status=0 AND o.assign_date BETWEEN "'.$dts.'" AND "'.$dte.'" THEN 1 ELSE 0 END) AS "DRIVERS_TODAY_DELIVERIRS",driver_shift.*');
    
         $this->db->from('orders as o');
         $this->db->join('driver_shift_schedules as driver_shift','driver_shift.user_id =o.driver_id','right');
         $this->db->group_by("driver_shift.id");
       $ans=$this->db->get()->result();
    //   print_r($this->db->last_query());
    //   die();
       return $ans;
        
    }
    
    function get_related_deliveries($order_ids){
        $this->db->select('orders.*');
        $this->db->from('orders');
        $this->db->where('order_id in ('. $order_ids .')');
        
        $res=$this->db->get()->result();
        return $res;
        
    }
     function get_print_qr($bag_ids){
       $this->db->select('*')
                ->from('qr_bags')
              
                ->where('qrid in ('. $bag_ids .')');
              
          $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
                                   
            return $result;
        } else {
            return FALSE;
        }
        
    }
       function get_print_info($bag_ids){
       $this->db->select('o.order_id,u.full_name,u.email,u.phone,o.delivery_address,o.delivery_date')
                ->from('orders as o')
               ->join('users as u','u.id=o.customer_id')
                ->where('order_id in ('. $bag_ids .')');
              
          $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
                                   
            return $result;
        } else {
            return FALSE;
        }
        
    }
    function updateTrackBag($qrid, $status){
        $data = array("bsid"=>$status);
        $this->db->where(array("qrid"=>$qrid));
        return $this->db->update('qr_bags', $data);
    }

    
    function updateTrackBagQr($qrCode, $status){
        $data = array("bsid"=>$status);
        $this->db->where(array("code"=>$qrCode,"bsid"=>4));
        return $this->db->update('qr_bags', $data);
    }
    function updateTrackBagQrD($order, $status,$dataa=0){
        $this->db->select('o.qr_bag_id,o.order_id')
                ->from('orders as o')
                ->where('o.order_id',$order)               
                ->limit(1);
              
          $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();                    
            $bag_id = $result[0]["qr_bag_id"];
            
            $data2 = array("status"=>"Delivered");
        $this->db->where(array("order_id"=>$order));
        $order_s = $this->db->update('orders', $data2);
        
        
        // New update
       if($order_s){
        $this->db->where(array("order_id"=>$order));
        $order_new = $this->db->update('orders', $dataa);
       }
                                        
           $data = array("bsid"=>$status);
        $this->db->where(array("qrid"=>$bag_id));
       return $this->db->update('qr_bags', $data);
        
        } else {
            return FALSE;
        }
        
    }
    
     function updateCollectBagQr($qrCode, $status,$driver_id=0,$order_id=0,$ice_bags=0,$bag_id=0){
        $this->db->select('o.order_id')
                ->from('orders as o')
               ->join('qr_bags as qr','o.qr_bag_id=qr.qrid')
                ->where('qr.code',$qrCode)
                ->where('o.status',"Delivered")
                 ->where('o.is_neutral',0);
               
              
          $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();                    
            $order_id_whr= $result[0]["order_id"];
            $data = array("status"=>$status,"ice_bags"=>$ice_bags,"pending_bag"=>0,"bag_with_customer"=>0,"bag_received"=>1,"own_bag_rcv_order_id"=>$order_id,"own_bag_rcv_bag_collection_id"=>$bag_id, "own_bag_rcv_by_driver_id"=>$driver_id,"own_bag_rcv_by_dt"=>date("Y-m-d H:i:s"),"own_bag_rcv_by_driver"=>1,"own_bag_rcv_qr"=>$qrCode);
        $this->db->where(array("order_id"=>$order_id_whr));
        return $this->db->update('orders', $data);
        } else {
            return FALSE;
        }
        
    }
 
    /*API Methods*/
    // function get_deliveries_summary_by_driver_15feb($driver_id, $from_date, $to_date){
    //     /*SELECT DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed
    //     FROM `orders` as `o`
    //     WHERE `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59'
    //     AND `o`.`driver_id` = '47'*/
    //     $this->db->select('DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed');
    //     $this->db->from($this->table.' as o');
    //     $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
    //     $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
    //     $this->db->where('o.driver_id',$driver_id);
    //     //$this->db->where('u.status',1);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    
    
    
    function get_deliveries_summary_by_driver($driver_id, $from_date, $to_date){
        /*SELECT DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed
        FROM `orders` as `o`
        WHERE `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59'
        AND `o`.`driver_id` = '47'*/
        $this->db->select('DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed,SUM(CASE WHEN is_cancelled = "yes" THEN 1 ELSE 0 END) AS "canceled_deliv"');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        //$this->db->where('u.status',1);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    function get_deliveries_by_picked($driver_id, $from_date, $to_date){
        /*SELECT DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed
        FROM `orders` as `o`
        WHERE `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59'
        AND `o`.`driver_id` = '47'*/
        $this->db->select("count(o.order_id) as assigned, 
        sum(case when qr.bsid = '3' then 1 else 0 end) as picked");
        $this->db->from($this->table.' as o');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid', 'left');
         $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
       
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        $this->db->where('o.status !=',"Delivered");
        //$this->db->where('u.status',1);
        $query = $this->db->get();
        return $query->result();
    }
    function get_deliveries_by_picked2($driver_id,$vendor_id, $date){
        /*SELECT DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed
        FROM `orders` as `o`
        WHERE `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59'
        AND `o`.`driver_id` = '47'*/
        $this->db->select(" count(o.order_id) as assigned, 
       sum(case when qr.bsid = '3' then 1 else 0 end) as picked");
        $this->db->from($this->table.' as o');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid');
        $this->db->join('users as u', 'u.id = o.vendor_id');
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        $this->db->where('o.vendor_id',$vendor_id);
        $this->db->where('o.status !=',"Delivered");
        $this->db->where('u.status',1);
        $query = $this->db->get();
        return $query->result();
    }
function get_deliveries_segments_by_date($driver_id, $from_date, $to_date){
        /*select count(o.status) as total, sum(o.delivered_status) as completed, o.vendor_id as id, u.email, u.full_name, u.address from orders as o
        LEFT JOIN users as u on u.id = o.vendor_id
        where `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59' and o.driver_id = 47
        GROUP BY o.vendor_id*/
        $this->db->select("count(o.status) as total, o.bag_received as bag recv old,o.total_bag_recv_by_driver as bag_received, o.delivery_img, sum(o.delivered_status) as completed, 
         o.vendor_id, u.email, u.full_name, o.delivery_address as address,
         count(o.order_id) as assigned, 
        sum(case when qr.bsid = '3' then 1 else 0 end) as picked");
        $this->db->from($this->table.' as o');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
      //  $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
      $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
      
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        //$this->db->where('u.status',1);
        $this->db->group_by('o.vendor_id');
        $query = $this->db->get();
        return $query->result();
    }

 function getOrderDataAssignment($driver_id, $qr){
        
        $this->db->select('o.order_id,qr.qrid');
        $this->db->from($this->table.' as o');
      $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid');
        $this->db->where(array('o.driver_id'=>$driver_id,'o.is_neutral'=>0,'qr.code'=>$qr,'qr.bsid'=>2));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        $result= $query->result_array();
        return $result;
        }else{
            return false;
        }
    }

    
    // function get_vendor_deliveries($driver_id, $vendor_id, $date){
    //     /*select o.status, o.delivery_time, o.customer_id as id, u.full_name, u.phone, u.address from orders as o
    //     INNER JOIN users as u on u.id = o.customer_id
    //     where o.driver_id = 47 and o.vendor_id = 63*/
    //     $this->db->select('qs.status as qrstatus,o.pu_number, o.delivery_time as delivery_type, o.signature, o.signature_img, o.status, o.number_on_delivery as phone,
    //     o.bag_received, o.bag_received_qr, o.delivery_img, o.order_id as delivery_id, o.delivery_address as address,
    //      o.delivery_time,o.ice_bags, o.note, o.customer_id,o.name_on_delivery, u.full_name, u.phone as customer_phone, u.address as delivery_address,
    //       o.delivered_date');
    //     $this->db->from($this->table.' as o');
    //     $this->db->join('users as u', 'u.id = o.customer_id');
    //     $this->db->join('qr_bags as qb', 'o.qr_bag_id = qb.qrid','left');
    //     $this->db->join('bags_status as qs', 'qb.bsid = qs.bsid','left');
    //     $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
    //     $this->db->where('o.driver_id',$driver_id);
    //     $this->db->where('o.vendor_id',$vendor_id);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    
    //Dilshad changes 26-12-2019
    
   function  get_vendor_deliveries($driver_id, $vendor_id, $date){
        /*select o.status, o.delivery_time, o.customer_id as id, u.full_name, u.phone, u.address from orders as o
        INNER JOIN users as u on u.id = o.customer_id
        where o.driver_id = 47 and o.vendor_id = 63*/
        $this->db->select('o.driver_recvd_amount as driver_recvd,o.other_payment_driver_recv as other_cash,o.delivery_amount,o.`company_note`,o.delivered_to as Delivery_drop_type,o.`driver_verify_bag`,o.cooling_bag_check as bag_type,o.bag_qr,qs.status as qrstatus,o.pu_number, o.delivery_time as delivery_type, o.signature, o.signature_img, o.status, o.number_on_delivery as phone,
        o.total_bag_recv_by_driver as bag_received,o.bag_received as bg_count, o.bag_received_qr, o.delivery_img, o.order_id as delivery_id, o.delivery_address as address,
         o.delivery_time,o.tot_ice_pack_received as ice_bags, o.note, o.customer_id,o.name_on_delivery, u.full_name, u.phone as customer_phone, u.address as delivery_address,o.send_notification,v.delivery_message,
          o.delivered_date,v.email as vendor_email,v.full_name as vendor_name,
          u.addr_img_usr as addr_img, u.addr_loc_by_dri_usr as addr_loc_by_dri,o.mul_addr_id,o.open_bag_attachment,u.addressCount,o.empty_bag_attachment,o.empty_bag_code');//SPOON lili
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.customer_id');
        $this->db->join('users as v', ' v.id = o.vendor_id', 'left');
        $this->db->join('qr_bags as qb', 'o.qr_bag_id = qb.qrid','left');
        $this->db->join('bags_status as qs', 'qb.bsid = qs.bsid','left');
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        $this->db->where('o.vendor_id',$vendor_id);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    //....................
    
    function get_extra_bags($driver_id,$date){
        /*select o.status, o.delivery_time, o.customer_id as id, u.full_name, u.phone, u.address from orders as o
        INNER JOIN users as u on u.id = o.customer_id
        where o.driver_id = 47 and o.vendor_id = 63*/
     
        
        
         $this->db->select('e.*, u.full_name as driver, u.phone as driverPhone,v.full_name as vendor_name, v.phone as vendorPhone');
        $this->db->from('extrabags as e');
        $this->db->join('users as u', 'u.id = e.driverId', 'left');
        $this->db->join('users as v', 'v.id = e.vendor_id', 'left');
        
        $this->db->where("e.ctime BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('e.driverId',$driver_id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_vendor_wise_deliveries($vendor_id, $date){
      //  sum(case when o.status = 'Delivered' then 1 else 0 end) as delivered,
        $this->db->select('u.full_name as vendor,qs.status as qrstatus,o.order_id as delivery_id,(case when o.qr_bag_id = 0 then 0 else 1 end) as is_attached,o.qr_bag_id,o.status,o.name_on_delivery as customer,o.number_on_delivery as cphone,o.delivery_address as address,
        o.delivery_date,o.delivery_time,o.delivered_date, o.note,o.delivery_time as delivery_type, o.send_notification,o.bag_qr as attachQRCode,o.company_note,o.delivery_amount,o.google_link_addrs');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.vendor_id');
    $this->db->join('qr_bags as qb', 'o.qr_bag_id = qb.qrid','left');
        $this->db->join('bags_status as qs', 'qb.bsid = qs.bsid','left');
        $this->db->where("o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.vendor_id',$vendor_id);
        $this->db->where('o.vendor_id',$vendor_id);
        
      
        $query = $this->db->get();
        return $query->result();
    }
     function get_driver_wise_deliveries($driver_id, $date){
        
        $this->db->select('o.bag_qr,bs.status as qrstatus,o.order_id as delivery_id,o.qr_bag_id,o.order_sequence,o.status,o.name_on_delivery as customer,o.number_on_delivery as cphone,o.delivery_address as address,
        o.delivery_date,o.delivery_time, o.note,o.delivery_time as delivery_type,u.full_name as vendor,bs.status as qrBag_status, o.send_notification,
        cus.addr_img_usr as addr_img, cus.addr_loc_by_dri_usr as addr_loc_by_dri,o.mul_addr_id,o.open_bag_attachment,u.addressCount,o.empty_bag_attachment,o.empty_bag_code'); //SPOON lili
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.vendor_id');
        $this->db->join('users as cus', 'cus.id = o.customer_id'); //SPOON
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'qr.qrid = o.qr_bag_id','left');
        $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        $this->db->order_by('o.order_sequence','ASC');
       // $this->db->where('o.qr_bag_id',0);
        $query = $this->db->get();
        return $query->result();
    }
     function get_qr_id($code){
        
        $this->db->select('qrid');
        $this->db->from('qr_bags');
        $this->db->where('code',$code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
                                   
            return $result[0];
        } else {
            return FALSE;
        }
        
    }
     function get_specific_order($order){
        
        $this->db->select('o.order_id as delivery_id,o.qr_bag_id,o.status,o.name_on_delivery as customer,o.number_on_delivery as cphone,o.delivery_address as address,
        o.delivery_date,o.delivery_time, o.note,o.delivery_time as delivery_type,u.full_name as vendor,qr.code as qrCode,
        qr.qrImage,bs.status as qrBag_status');
        $this->db->from('orders as o');
         $this->db->join('users as u', 'u.id = o.vendor_id');
      
         $this->db->join('qr_bags as qr', 'qr.qrid = o.qr_bag_id','left');
         $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        $this->db->where('o.order_id',$order);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
                                   
            return $result[0];
        } else {
            return FALSE;
        }
        
    }
        
     function get_specific_order_code($qrid,$vendor=0){
        
        $this->db->select('o.order_id as delivery_id,o.qr_bag_id,o.status,o.name_on_delivery as customer,o.number_on_delivery as cphone,o.delivery_address as address,
        o.delivery_date,o.delivery_time, o.note,o.delivery_time as delivery_type,u.full_name as vendor,qr.code as qrCode,
        qr.qrImage,bs.status as qrBag_status');
        $this->db->from('orders as o');
         $this->db->join('users as u', 'u.id = o.vendor_id');
      
         $this->db->join('qr_bags as qr', 'qr.qrid = o.qr_bag_id');
         $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid');
        $this->db->where('o.qr_bag_id',$qrid);
        $this->db->where('o.vendor_id',$vendor);
         $this->db->where('o.is_neutral',0);
        //  $this->db->where('o.str_keep_varification','yes');
        // $this->db->order_by('o.order_id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
                                   
            return $result[0];
        } else {
            // return $this->db->last_query();
            return FALSE;
        }
        
    }
    
    
    
    function update_extar_bags($eid,$driver_id,$type,$quantity,$notes,$qrImploded,$vendor_id){
        $data = array("driverId"=>$driver_id,
                        "type"=>$type,
                        "quantity"=>$quantity,
                        "notes"=>$notes,
                        "vendor_id"=>$vendor_id,
                        "received_qrs"=>$qrImploded
                        );
        $this->db->where(array("ebid"=>$eid));
        $order_update = $this->db->update('extrabags', $data);
        
        if($order_update){
        
        return $order_update;
        }else{
            return false;
        }
    }
     function add_extar_bags($date,$driver_id,$type,$quantity,$notes,$qrImploded,$vendor_id){
        $data = array("driverId"=>$driver_id,
                        "type"=>$type,
                        "quantity"=>$quantity,
                        "ctime"=>$date,
                        "notes"=>$notes,
                        "vendor_id"=>$vendor_id,
                        "received_qrs"=>$qrImploded
                        );
       $this->db->insert('extrabags', $data);
        $insert_id = $this->db->insert_id(); //return last inserted id
        
        
        if($insert_id){
        
        return $insert_id;
        }else{
            return false;
        }
    }
function update_del_qr($qrid,$order_id,$code=0){
    
    
     $order_data_check_old_qr=$this->db->select('qr_bag_id,bag_qr')->from("orders")->where("order_id= $order_id")->get()->result();
     
     if($order_data_check_old_qr[0]->qr_bag_id!=0 OR $order_data_check_old_qr[0]->qr_bag_id!=''){
          $data = array("bsid"=>1);
        $this->db->where(array("qrid"=>$order_data_check_old_qr[0]->qr_bag_id));
        $this->db->update('qr_bags', $data);
     }
    
        $this->db->trans_complete();  
        $data = array("qr_bag_id"=>$qrid,"bag_qr" =>$code,"qr_attached_dt_vendor"=>date("Y-m-d H:i:s"));
       
        $this->db->where(array("order_id"=>$order_id,"is_cancelled"=>'no'));
         $this->db->update('orders', $data);
        if($this->db->affected_rows() > 0)
                {
                    $order_update =true;
                    
                }else{
                    $order_update =false;
                }
        
        if($order_update){
         $data = array("bsid"=>2);
        $this->db->where(array("qrid"=>$qrid));
        return $this->db->update('qr_bags', $data);
        }else{
            return false;
        }
    }
    function update_bag_status($code){
        $data = array("bsid"=>6);
        $this->db->where(array("code"=>$code));
        return $this->db->update('qr_bags', $data);
    }
    
     function get_qr_current_status($code){
        
         $this->db->select('qr.*,st.status as qr_status,u.full_name as name, u.phone, o.name_on_delivery as customer_name ,o.number_on_delivery as customer_number,o.driver_id,driver.full_name as driver_name, driver.phone as driver_phone,vendor.full_name as vendor_name, vendor.phone as vendor_phone');
         $this->db->from('qr_bags as qr');
         
         $this->db->join('bags_status as st','st.bsid = qr.bsid');
         
         $this->db->join('users as u','qr.str_kpr_id = u.id','left');
         
         $this->db->join('orders as o','qr.qrid = o.qr_bag_id AND o.is_neutral=0','left');
         
          $this->db->join('users as driver','driver.id = o.driver_id','left');
          
          $this->db->join('users as vendor','vendor.id = qr.vendor_id','left');
         
        $this->db->where(array("qr.code"=>$code));
        
        
        $res=$this->db->get()->result();
        
        return $res;
        
       
    }
    
     function update_bag_status3($code,$status){
        $data = array("bsid"=>$status);
        $this->db->where(array("code"=>$code));
        return $this->db->update('qr_bags', $data);
    }
    function update_bag_status4($delivery_id,$user_id=0){
        $data = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
        $this->db->where(array("order_id"=>$delivery_id));
        return $this->db->update('orders', $data);
    }
    function update_sequence($delivery,$sequence){
        $data = array("order_sequence"=>$sequence);
        $this->db->where(array("order_id"=>$delivery));
        return $this->db->update('orders', $data);
    }
function createnew($table,$data){
        $this->db->insert($table, $data);
        return $this->db->insert_id(); //return last inserted id
    }

//    function get_vendor_deliveries_by_delivery_date($where){
//        $this->db->select('o.order_id, o.pu_number, t.name as delivery_type, o.signature, o.signature_img, o.status, bag_received, delivery_img, o.order_id as delivery_id, o.delivery_address, o.delivery_time, o.note, o.customer_id, u.full_name, u.phone, u.address, o.delivered_date');
//        $this->db->from($this->table.' as o');
//        $this->db->join('users as u', 'u.id = o.vendor_id');
//        $this->db->join($this->table_type.' as t', 't.id = o.type_id');
//        $this->db->where($where);
//        $query = $this->db->get();
//        return $query->result();
//    }

    function get_deliveries_summary_by_date($from_date, $to_date){
        /*SELECT DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed
        FROM `orders` as `o`
        WHERE `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59'
        GROUP BY o.delivery_date*/
        $this->db->select('DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed');
        $this->db->from($this->table.' as o');
        $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
        $this->db->group_by('o.delivery_date');
        $query = $this->db->get();
        return $query->result();
    }

    function get_customer_deliveries_by_date($customer_id=0, $start_date=0, $end_date=0){
        /*select o.order_id as delivery_id, o.pu_number,
o.`status`, o.created, o.delivery_time, DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date,
o.delivery_address, assign_date, ship_date, delivered_date, bag_received, delivery_img, return_date,
o.driver_id, d.full_name as driver, d.phone as d_phone,
o.vendor_id, v.full_name as vendor, v.phone as v_phone,
o.customer_id,  c.full_name as customer, c.phone as c_phone, c.address
from orders as o
INNER JOIN users as c on c.id = o.customer_id
LEFT JOIN users as d on d.id = o.driver_id
left JOIN users as v on v.id = o.customer_id
where o.customer_id = 81*/
$customer_id=$customer_id;
$start_date=date('Y-m-d');
$end_date=date('Y-m-d');

        $this->db->select('o.order_id as delivery_id, o.pu_number, r.rating, o.signature, o.signature_img,
o.`status`, o.created, o.delivery_time, DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date,
o.delivery_address, assign_date, ship_date, delivered_date, bag_received, delivery_img, return_date,
o.driver_id, d.full_name as driver, d.phone as d_phone,
o.vendor_id, v.full_name as vendor, v.phone as v_phone,
o.customer_id,  c.full_name as customer, c.phone as c_phone, c.address as c_address, o.delivery_time as delivery_type');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
       
        $this->db->join('driver_rating as r', 'r.order_id = o.order_id', 'left');
        $this->db->where("o.action != 'Freezed' and o.created BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'");
        $this->db->where('o.customer_id',$customer_id);
        $query = $this->db->get();
         return $query->result();
        // echo '<pre>';
        // print_r($query);
        // return $this->db->last_query();
        // die();
        //return $query->result();
    }

    //this is used for vendor dashboard pie chart
    function get_order_report_by_vendor($vendor_id){
        /*select count(*) as order_count, `status` from orders
where vendor_id = 63
GROUP BY `status`
        */
        $this->db->select('count(*) as order_count, status');
        $this->db->from($this->table);
        $this->db->where('vendor_id',$vendor_id);
        $this->db->group_by('status');
        $query = $this->db->get();
        return $query->result();
    }

    /**************************************************************/
    /************************DELIVERIES TYPE***********************/
    /**************************************************************/
//  AYESHA NEW CHANGES 
    public function get_basic_timeslots(){
        $this->db->select('*');
        $this->db->from($this->table_time_slot);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    public function get_deliveries_type(){
        $this->db->select('*');
        $this->db->from($this->table_type);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_areas($limit = 0)
    {
        if($limit > 0)
            $this->db->limit($limit);
         return $this->db->order_by('area_name')->get('areas')->result();    
        //  return $this->db->get('areas')->result();
    }
    public function get_area_by_id($area_id)
    {
        return $this->db->where('area_id',$area_id)->get('areas')->row();
    }
     public function get_deliveriess_type(){
        $this->db->select('*');
        $this->db->from($this->table_types);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_deliveriess_type_where(){
        // $query = $this->db->get_where($this->table_types, $where);
        return $this->db->select('*')
            ->from($this->table_types)
            ->where('id >',5)
            ->get()->result();
        // $query = $this->db->get($this->table_types);
        // return $query->result();
    }
  public function get_deliveries_type_where($where){
        $query = $this->db->get_where($this->table_type, $where);
        return $query->result();
    }
    
    // AYESHA NEW CHANGES
    public function get_timeslot_where($where){
        $query = $this->db->get_where($this->table_time_slot, $where);
        return $query->result();
    }
    function add_timeslot($data){
        $this->db->insert($this->table_time_slot, $data);
        return $this->db->insert_id(); //return last inserted id
    }
    function update_timeslot($data, $where){
        return $this->db->update($this->table_time_slot, $data, $where);
    }
    
    public function get_emirate_with_TimeSlots(){
        
        $this->db->select('*');
        $q= $this->db->from('tbl_emirates')->order_by('emirate_name')->get()->result();
   
    //   $q= $this->db->from('tbl_emirates')->get()->result();
    //   echo "<pre>";
    //   print_r($q);
    //   echo "<pre>";
    //       die();
    $arr = [];
       foreach ($q as $key => $data){
         
          // $temparray=array();
            // echo 'hi';
           $temparray=explode(',',$data->basic_time_id);
            // echo 'i am temparray:'.
            // print_r($temparray);
           if(count($temparray)){
                // echo 'hi';
               foreach($temparray as $value){
                 // echo $value;
                     $where = array('basic_time_id' => $value);
                   $item  = $this->get_timeslot_where($where);
                  // echo "<pre>";
                   //print_r($item);
                  // echo "<pre>";
                  $arr[] = $item[0]->name;
                   
                  
                   
                  // echo '<pre> i am item'.$item[0]->name;
                  // die();
                  
               }
                $data->basic_time_name=implode(",",$arr);
                unset($arr);
                unset($temparray);
                
                   
           
           }
       }
    //     echo '<pre>';
    //   print_r($q);
    //   die();
      
        // $this->db->join('basic_time_slots', 'tbl_emirates.basic_time_id = basic_time_slots.basic_time_id', 'left'); 
        // $query = $this->db->get();
      return $q;
        
        
    }
     
    
    // public function get_deliveriess_type_where($where){
    //     $query = $this->db->get_where($this->table_types, $where);
    //     return $query->result();
    // }
    
   

    function add_delivery_type($data){
        $this->db->insert($this->table_type, $data);
        return $this->db->insert_id(); //return last inserted id
    }
    function add_deliverys_type($data){
        $this->db->insert($this->table_types, $data);
        return $this->db->insert_id(); //return last inserted id
    }


    function update_delivery_type($data, $where){
        return $this->db->update($this->table_type, $data, $where);
    }
      function update_deliverys_type($data, $where){
        return $this->db->update($this->table_types, $data, $where);
    }
function update_bagsInfo($data, $where){
        return $this->db->update("orders", $data, $where);
    }

    /**************************************************************/
    /************************RESULT SET FOR CSV***********************/
    /**************************************************************/
    public function get_orders_CSV($where){
//        $this->db->select('o.order_id as "Order ID", v.phone as "Vendor Phone", o.signature as "Signature", o.`status`, o.delivery_address as "Delivery Address", DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as "Delivery Date", o.delivery_time as "Delivery Time", o.created as "Delivery Created",
//        c.full_name as "Customer", d.full_name as "Driver", v.full_name as "Vendor", c.address as "Customer Address",
//        c.phone as "Customer Phone", d.phone as "Driver Phone", t.name as "Delivery Type"');

        $this->db->select('o.order_id as "Order ID", o.name_on_delivery as "Customer", c.phone as "Customer Phone",
        o.delivery_address as "Delivery Address",o.bag_received as "Bag Received", DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as "Delivered Date",  DATE_FORMAT(o.delivered_date,"%H:%i:%s") as "Delivered Time"');

        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
      //  $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        if($where){
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function getCustomers($vid)
    {
        $this->db->where(array('vendor_id'=>$vid, 'is_deleted'=>0, 'role_id'=>4));
        return $this->db->get('users')->result_array();
    }

    public function update_orders($ids)
    {
        $this->db->where_in('order_id', $ids);
        $this->db->update('orders', array('driver_id'=>0, 'status'=> 'Not Assign', 'assign_status'=>0));
    }

    public function update_area($d)
    {
        $id = $d['area_id'];
        unset($d['area_id']);
        if($id == 0)
        {
            $d['added_by'] = $this->session->userdata('u_id');
            $this->db->insert('areas', $d);
        }
        else
        {
            $this->db->where('area_id', $id);
            $this->db->update('areas', $d);
        }
    }
    
     public function Newupdate_area($d)
    {
        $id = $d['area_id'];
        unset($d['area_id']);
        if($id == 0)
        {
            $d['added_by'] = $this->session->userdata('u_id');
            $res=$this->db->insert('areas', $d);
            return $res;
            
        }
        else
        {
            $this->db->where('area_id', $id);
            $res=$this->db->update('areas', $d);
            return $res;
        }
    }

    function del_area($id)
    {
        $this->delete_schedule_linked_areas($id);
        $this->db->where('area_id', $id);
        $this->db->delete('areas');
    }
    public function delete_schedule_linked_areas($id){
	    
	    $this->db->where(array('area_id' => $id));
	    $this->db->delete('driver_shift_schedules');
	    
	}
	
	public function del_schedules_timeslots($id){
	     
	     $this->db->where(array('time_slot_id' => $id));
	    $this->db->delete('driver_shift_schedules');
	}

    function del_rec($t, $where)
    {
        $this->db->where($where);
        $this->db->delete($t);
    }

    function getBags($ids)
    {

        return $this->db->query("SELECT bags.*, bags.type_id AS 'd_type', users.phone, users.full_name, users.address FROM bags LEFT JOIN users ON users.id = bags.customer_id  WHERE bag_id IN (".implode(',', $ids).")")->result_array();
    }
    
    function getCashs($ids)
    {

        return $this->db->query("SELECT cashs.*, cashs.type_id AS 'd_type', users.phone, users.full_name, users.address FROM cashs LEFT JOIN users ON users.id = cashs.customer_id  WHERE cash_id IN (".implode(',', $ids).")")->result_array();
    }

    function getOrders($ids)
    {
        $this->db->where_in('order_id', $ids);
        return $this->db->get('orders')->result_array();
    }
  
    public function notific_update($notif_data, $notif_whr){
        $this->db->where('id',$notif_whr);
       $result=$this->db->update('users',$notif_data);
       return $result;
    }
    
//     public function send_mail_old($result)
// 	{
	    
// 		$email_data = $result;
// 		$config = Array(
// 			'protocol' => 'smtp',
// 			'smtp_port' => 465,
// 			'smtp_user' => 'admin@thelogx.com',
// 			'mailtype' => 'html',
// 			'charset' => 'utf-8'
// 		);
// 		$this->load->library('email');
// 		$this->email->set_newline("\r\n");
// 		$htmlContent = '<h4><p style="text-transform: uppercase;">DEAR ' . $email_data[0]->vendor .',</p> </h4>It is to inform you that our driver has received "0" bags from client " '.$email_data[0]->customer.'" upon delivery to his location at " '.$email_data[0]->delivered_time.'" on "'.$email_data[0]->delivered_date.'" ,Its a system generated reminder for you to do the needful. <br/><br/><br/><pre>Regards,
// TEAM L O G X</pre><br/>';
//  		$this->email->to($email_data[0]->vendor_email);
//       //  $this->email->to('ayesha.attique.work@gmail.com');
// 		$this->email->from('admin@thelogx.com', 'LOGX');
// 		$this->email->subject('No Bag Received');
// 		$this->email->message($htmlContent);
// 		$this->email->set_mailtype("html");
// 		$email=$this->email->send();
// 		//sending sms to agent
// // 		$this->load->library('twilio');
// // 		$from="+14154292457";
// // 		$to=$email_data[0]->phone;
// // 		$body = $email_data[0]->name . ' Welcome to PremiumBlinds Team!You have been registered to Premium blinds portal with following details. EMAIL: '.$email_data[0]->email.'Password: '.$email_data[0]->password;
// // 		try{
// // 			//$this->twilio->sms($from,$to,$body);
// // 	        if($email){
// // 	            echo "Mail sent successfully";
// // 	        }
// // 		}catch (Exception $e){
// //                 echo "Mail  not sent";
// // 		}
// 	}

 public function send_mail($result)
	{
	    
		$email_data = $result;
		
		$zero_bag_emails=explode(',', $email_data[0]->emails_for_zero_bags);
		
		
		if(!empty($zero_bag_emails)){
		 
		   foreach($zero_bag_emails as $email){
		       
		       	$config = Array(
			'protocol' => 'smtp',
			'smtp_port' => 465,
			'smtp_user' => 'admin@thelogx.com',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$htmlContent = '<h4><p style="text-transform: uppercase;">DEAR ' . $email_data[0]->vendor .',</p> </h4>It is to inform you that our driver has received "0" bags from client " '.$email_data[0]->customer.'" upon delivery to his location at " '.$email_data[0]->delivered_time.'" on "'.$email_data[0]->delivered_date.'" ,Its a system generated reminder for you to do the needful. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
 		$this->email->to($email);
      //  $this->email->to('ayesha.attique.work@gmail.com');
		$this->email->from('admin@thelogx.com', 'LOGX');
		$this->email->subject('No Bag Received');
		$this->email->message($htmlContent);
		$this->email->set_mailtype("html");
		$email=$this->email->send();
		       
		       
		   }
		    
		    
		}
		

	}

  public function getareaID_withName($name){
      
     $this->db->select('area_id');
     $this->db->where('area_name',$name);
     $this->db->from('areas');
     $result=$this->db->get()->result();
     return $result[0]->area_id;
  }
  
  public function getemirateID_withName($name){
      $this->db->select('id');
     
     $this->db->from('tbl_emirates');
     $this->db->where('emirate_name',$name);
     $result=$this->db->get()->result();
     return $result[0]->id;
    //return 'hello';
  }
  
  public function gettimeslotID_withName($name){
      $this->db->select('basic_time_id');
     $this->db->where('name',$name);
     $this->db->from('basic_time_slots');
     $result=$this->db->get()->result();
     return $result[0]->basic_time_id;
  }


public function fetch_all_emirates(){
    $this->db->select('*');
    $this->db->from('tbl_emirates');
    return $this->db->get()->result();
}


// Taha (update it with minor changes according to live code)
// public function get_partner_price_old($vendor_id,$delivery_date,$emirateID,$area_str,$service_typ,$string_emirate){
    
//     $this->db->select('d.user_id as PartnerID,d.price,d.same_loc_price,d.service_type');
//     $this->db->from('tbl_delivery_quotations as d');
    
//     $this->db->where('d.user_id',$vendor_id);
//     $this->db->where('d.emirate',$emirateID);
//     $this->db->where('d.service_type',$service_typ);
       
    
//     $ans=$this->db->get()->result();
//     // print_r($this->db->last_query());
//     // echo '<br>';
//     // print_r($ans);
    
//     // echo '<br> HIIIIIIIIIIIIIIIIIII';
//       $same_loc = $this->search_same_loc($vendor_id,$delivery_date,$area_str,$string_emirate);
//     //   echo 'whhyyyyyy';
//     //   print_r($this->db->last_query());
//     //   echo '<pre>Same loctn price ans is:';
//     //   print_r($same_loc);
//       if(count($same_loc) > 0){
//         //   echo 'yes same loc have data';
//           $ans[0]->ans ='yes';
//           foreach($same_loc as $key => $val){
//             //   echo 'THis isssssssssss:'.$val->order_id;
//             if($key == 0)
//             $ans[1]->ids=$val->order_id;
//             else
//             $ans[1]->ids=$ans[1]->ids.','.$val->order_id;
            
//             // echo '<br> THIS IS :'.$ans[1]->ids.'<br>';
//           }
//       }else{
//           echo 'no';
//           $ans[0]->ans ='no';
//       }
//     return $ans;
//     //die();
    
// }

// public function search_same_loc_old($vendor_id,$delivery_date,$area_str,$string_emirate){
//       $dts = date("Y-m-d", strtotime($delivery_date));
//       $dts=$dts." 00:00:00";
//       $dte=date("Y-m-d", strtotime($delivery_date));
//       $dte=$dte." 23:59:59";
       
//     //   echo '<br>vendor id:'.$vendor_id;
//     //     echo 'delivery id:'.$delivery_date;
//     //     echo 'dts id:'.$dts;
//     //     echo 'dte id:'.$dte;
//     //       echo 'area strnf:'.$area_str;
//     //       echo 'emirate:'.$string_emirate;
       
//       //$this->db->select('o.order_id,o.vendor_id,o.delivery_date,o.delivery_address');
//       $this->db->select("o.order_id");
     
//       $this->db->from("orders as o");
      
//       $this->db->where("o.vendor_id", $vendor_id );
//       $this->db->where("o.delivery_date BETWEEN '".$dts."' AND '".$dte."' ");
//       $this->db->where("o.delivery_address", $area_str );
      
//       $this->db->where("o.delivery_time", $string_emirate );
//       $this->db->where("o.discount_track", "" );
//     //   print_r($this->db->last_query());
//       $ans_b=$this->db->get();
//       $ans=$ans_b->result();
     
//     //  print_r($ans);
//     //   $a2=print_r($this->db->last_query());
//     //   die();
      
//     //   echo '<pre>';
//     //   print_r($ans);
//       return $ans;
// }

public function get_partner_price($vendor_id,$delivery_date,$emirateID,$area_str,$service_typ,$string_emirate){
    
    $this->db->select('d.user_id as PartnerID,d.price,d.same_loc_price,d.service_type');
    $this->db->from('tbl_delivery_quotations as d');
    
    $this->db->where('d.user_id',$vendor_id);
    $this->db->where('d.emirate',$emirateID);
    $this->db->where('d.service_type',$service_typ);
       
    
    $ans=$this->db->get()->result();
    //print_r($this->db->last_query());
    
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
      
    //   echo '<pre>';
    //   print_r($ans);
      return $ans;
}







public function get_old_status($orderID,$check,$check_arr=0){
    
    if($check == 'revert'){
        $this->db->select('cancellation_status');
        $this->db->from('orders');
        
            $res=$this->db->where('order_id',$orderID)->get()->result();
       
        
    
            echo 'result is :'.$res[0]->cancellation_status;
            // return $this->db->last_query();
            return $res[0]->cancellation_status;
    }else{
        $this->db->select('status');
        $this->db->from('orders');
        $res=$this->db->where('order_id',$orderID)->get()->result();
    
    echo 'result is :'.$res[0]->status;
    return $res[0]->status;
    }
    
    
    
}

 public function notify_to($id,$check){
    
  

    $res=$this->get_order_by_id($id);
    
    // echo '<pre> GET_ORDER_BY_ID:'.$id;
    // print_r($res);
    
    if($check == 'revert'){
        
        $title='Order Exist!';
        // $msg='The order is again being in process at '.date("Y-m-d H:i:s").' kindly complete it.';
        $msg='The Order('.$res[0]->delivery_id.') of '.strtoupper($res[0]->customer).' has been again in process at '.date("Y-m-d H:i:s").' Kindly complete it.';
             
             
             
             if($res[0]->d_device_token != '' && (($res[0]->status == 'Cancel' || $res[0]->status == 'Assign'  || $res[0]->status =='Ship') || $res[0]->is_cancelled == 'yes')){
        
        $data = array(
                        'user_id' => $res[0]->driver_id,
                        'device_token' => $res[0]->d_device_token,
                        'platform' => $res[0]->d_platform,
                        'status_code' => intval(607),
                        'title' =>  $title,
                        'for_whom' => 'Driver',
                        'badge' => $res[0]->d_badge_count,
                        'message' => $msg
                    );
                    
                     //send notification
                     
                     print_r($data);
                   send_notification_to_user($data, 'save');
        
    }else{
        echo 'errorrrrrrrrrr in revert <br>';
        echo '&nbsp <pre> status:';
        print_r($res[0]->status);
        echo '&nbsp <pre> device token:';
        print_r($res[0]->d_device_token);
        echo '&nbsp <pre> title:'.$title;
        
         echo '&nbsp <pre> driver id:';
         print_r($res[0]->driver_id);
       
       
        echo '&nbsp <pre> is cancel check:';
        print_r($res[0]->is_cancelled);
        
        echo '&nbsp delivery id:';
        print_r($res[0]->delivery_id);
        
        echo '&nbsp current status:';
        print_r($res[0]->current_status);
        
        echo '&nbsp note is:';
        print_r($res[0]->note);
        
        // echo res['d_device_token'];
        // echo res['status'];
        
        }
 
    }else{
         $title='Order Cancelled!';
        $msg='The Order('.$res[0]->delivery_id.') of '.strtoupper($res[0]->customer).' has been Cancelled at '.date("Y-m-d H:i:s").' Kindly bring it back.';
    
        
        if($res[0]->d_device_token != '' && ($res[0]->current_status == 'Ship' || $res[0]->current_status == 'Assign' ) ){
    $data = array(
                        'user_id' => $res[0]->driver_id,
                        'device_token' => $res[0]->d_device_token,
                        'platform' => $res[0]->d_platform,
                        'status_code' => intval(600),
                        'title' =>  $title,
                        'for_whom' => 'Driver',
                        'badge' => $res[0]->d_badge_count,
                        'message' => $msg
                    );
                    
                     //send notification
                     
                     print_r($data);
                   send_notification_to_user($data, 'save');
                    
                    
    }else{
        echo 'errorrrrrrrrrr in cancel <br>';
        echo '<pre> status:';
        print_r($res[0]->status);
        echo '<pre> device token:';
        print_r($res[0]->d_device_token);
        echo '<pre> title:'.$title;
        
         echo '<pre> driver id';
         print_r($res[0]->driver_id);
       
       
        echo '<pre> is cancel check';
        print_r($res[0]->is_cancelled);
        
        echo 'delivery id';
        print_r($res[0]->delivery_id);
        
        echo 'current status';
        print_r($res[0]->current_status);
        
        // echo res['d_device_token'];
        // echo res['status'];
        
        }
        
        
    }
    
    
    // echo '<pre>';
    // print_r($res);
    // echo 'hello';
    // die();
    
      }
      
      public function get_user_by_id($id){
          
          $this->db->select('c.full_name as customer,u.full_name as vendor,u.email as vendor_email,o.delivery_address as address,o.delivery_date as dt,o.delivery_time as dti,o.canceled_at as ca,o.canceled_by as cb,o.canceled_mode as cm,o.canceled_reason as cr,o.cancellation_price as cp,o.cancellation_status as cs');
          $this->db->from('orders as o');
          
          $this->db->join('users as u','u.id = o.vendor_id');
          $this->db->join('users as c','c.id = o.customer_id');
          $this->db->where('o.order_id',$id);
          
          $res=$this->db->get()->result();
           return $res;
        //   echo '<pre>';
        //   print_r($res);
        // //   die();
        //   return $this->db->last_query();
          
      }
      
      
      public function send_cancelation_email($id,$revert='')
	{
	
 		$email_data = $this->get_user_by_id($id);
// return $email_data;

		$config = Array(
			'protocol' => 'smtp',
			'smtp_port' => 465,
			'smtp_user' => 'admin@thelogx.com',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		
		if($revert=='revert'){
		    $msg='<h4><p style="text-transform: uppercase;">DEAR ' . $email_data[0]->vendor .',</p> </h4>It is to inform you that cancellation of Delivery from " '.$email_data[0]->customer.'" at "'.$email_data[0]->address.'" on "'.$email_data[0]->dt.'" is reverted by admin .Its a system generated reminder for you to do the needful. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
$subject='Delivery Cancellation Reverted';
		}else{
		
		if($email_data[0]->cs =='Not Assign'){
		    $status='not assigned';
		    
		}else if($email_data[0]->cs =='Assign'){
		    $status='assigned';
		}else if($email_data[0]->cs =='Ship'){
		    $status='on shipment';
		}
		$msg='<h4><p style="text-transform: uppercase;">DEAR ' . $email_data[0]->vendor .',</p> </h4>It is to inform you that delivery from " '.$email_data[0]->customer.'" at "'.$email_data[0]->address.'" on "'.$email_data[0]->dt.'" is cancelled by "'.$email_data[0]->cb.'" at "'.$email_data[0]->ca.'" due to "'.$email_data[0]->cr.'" with cancellation fee "'.$email_data[0]->cp.'" when delivery status was "'.$status.'" .Its a system generated reminder for you to do the needful. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
$subject='Delivery Cancelled';

}
		$htmlContent = $msg;
        $this->email->to($email_data[0]->vendor_email);
		$this->email->from('admin@thelogx.com', 'LOGX');
		$this->email->subject($subject);
		$this->email->message($htmlContent);
		$this->email->set_mailtype("html");
		$email=$this->email->send();
		return $email;
		
// 			try{
			
// 	        if($email){
// 	            echo "Mail sent successfully";
// 	        }
// 		}catch (Exception $e){
//                 echo "Mail not sent";
// 		}
	}

  
  //new added 29-05-2020
  
   public function get_deliveriess_type_where_id_is($where){
      
        $query = $this->db->get_where($this->table_types, $where);
        return $query->result();
    }
    
    
    
    
     public function get_strkeeper_pendings($where, $is_cancelled = false){
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,
        o.customer_id, o.driver_id as driver_delivered_id,o.own_bag_rcv_by_driver_id as driver_received_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
          DATE_FORMAT(o.own_bag_rcv_by_dt,"%H:%i:%s") as bag_received_time,DATE_FORMAT(o.own_bag_rcv_by_dt,"%d-%m-%Y") as bag_received_date,
          o.own_bag_rcv_order_id as bag_received_with_orderID,o.own_bag_rcv_bag_collection_id as bag_received_with_bagCollection_ID, 
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver_who_receive,x.full_name as driver_who_deliver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as driver_who_receive_phone,x.phone as driver_who_deliver_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price,
        o.str_keep_varification');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.own_bag_rcv_by_driver_id','left');
        $this->db->join('users as x', 'x.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid AND qr.bsid =5','left');
        $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid ','left');
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        $query = $this->db->get();
        $orders = $query->result();
        
       // return $orders;
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
    
    
    
    
    
    
    //  public function strkeeper_scan($where,$code, $is_cancelled = false){
    //     $this->db->select('o.qr_active_check,o.qr_bag_id,o.bag_received_qr,o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,
    //     o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
    //      DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
    //       DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
    //       qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
    //     c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
    //     c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price');
    //     $this->db->from($this->table.' as o');
    //     $this->db->order_by('o.order_id', 'desc');
    //     $this->db->join('users as c', 'c.id = o.customer_id');
    //     $this->db->join('users as d', 'd.id = o.driver_id','left');
    //     $this->db->join('users as v', 'v.id = o.vendor_id');
    //     // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
    //     $this->db->join('qr_bags as qr', 'qr.bsid =5 AND qr.code= "'.$code.'" ','left');
    //     $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid ','left');
    //     $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
    //      $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
       
    //     //$this->db->limit(100);
    //     if($where){
    //         $this->db->where($where);
    //     }
    //     if($is_cancelled) {
    //         $this->db->where(['is_cancelled' => 'yes']);
    //     } else {
    //         $this->db->where(['is_cancelled' => 'no']);
    //     }
    //     $query = $this->db->get();
    //     $orders = $query->result();
        
    //   // return $orders;
    //     if ($orders){
    //         $result['result'] = true;
    //         $result['records'] = $orders;
    //     }else{
    //         $result['result'] = true;
    //          $result['records'] = $this->db->last_query();
    //     }
        
    //     return $result;
    // //   echo '<pre>';
    // //   return $this->db->last_query();
    // }
    
    
    public function check_qr_bg_status($code){
        
        $this->db->select("*");
        $this->db->from("qr_bags");
        $where=array(
                     'code'=> $code
                       
            );
            $this->db->where($where);
            
            $res=$this->db->get()->result();
            
            return $res;
    }
    
    public function strkeeper_scan($data,$code,$data_ordertbl_update){
        
        $this->db->trans_complete(); 
        
        $where=array('bsid'=> 5,
                     'code'=> $code
                       
            );
        
        
         $this->db
            ->where($where)
            ->update('qr_bags', $data);
            
            if($this->db->affected_rows() > 0)
                {
                    
                    // ......... Order tbl update
        
            $this->db->select('o.order_id')
                ->from('orders as o')
               ->join('qr_bags as qr','o.qr_bag_id=qr.qrid')
                ->where('qr.code',$code)
                ->where('o.status',"Collected")
                 ->where('o.is_neutral',0)
                 ->where('o.str_keep_varification',"no");
                 
          
          $query = $this->db->get();
          
        if ($query->num_rows() > 0) {
            $result= $query->result_array();                    
            $order_id_whr= $result[0]["order_id"];
            
            // return $order_id_whr;
            // die();
            
        $this->db->where(array("order_id"=>$order_id_whr));
        return $this->db->update('orders', $data_ordertbl_update);
        } else {
            return FALSE;
        }
        
        
        // .............

                   
                }else{
                    return FALSE;
                }
        
        
        
        
        
            
            
            
            // $this->db->select('qrid');
            // $this->db->where($where);
            // $this->db->from('qr_bags');
            // $res=$this->db->get->result();
            
            // $qrid=$res[0]->qrid;
            
            // return $qrid;
            
                
            
          
          
  
             
        
    }
    
    
    
    // FEEDBACK 
    
    public function get_feedback($where, $is_cancelled = false){
        $this->db->select('f.id as fed_id,f.order_id as fed_order_id,f.user_id as fed_user_id,f.role_id as fed_role_id,f.feedback,f.complaint_count,f.reported_at,f.status as fed_status,f.proof_image as fed_img,
        o.cooling_bag_check as bag_type,o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.bag_received,
        o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price');
        $this->db->from('feedbacks as f');
        $this->db->join($this->table.' as o','f.order_id = o.order_id','left');
        $this->db->join('users as c', 'f.user_id =c.id','left');
        $this->db->join('users as d', 'o.driver_id = d.id ','left');
        $this->db->join('users as v', ' o.vendor_id = v.id ','left');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
        $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
         
         
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['o.is_cancelled' => 'yes']);
        } else {
            // $this->db->where(['o.is_cancelled' => 'no']);
        }
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
    
     public function get_feedback_vendor($where){
        $this->db->select('f.id as fed_id,f.order_id as fed_order_id,f.user_id as fed_user_id,f.role_id as fed_role_id,f.feedback,f.complaint_count,f.reported_at,f.status as fed_status,f.proof_image as fed_img,
        v.full_name as vendor,v.phone as v_phone, v.email,v.address');
        
        $this->db->from('feedbacks as f');
         $this->db->join('users as v', 'f.user_id = v.id ','left');
         $this->db->where($where);
        
       
       
        $query = $this->db->get();
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
            $result['records'] =false;
        }
        
        return $result;
    //   echo '<pre>';
    //   return $this->db->last_query();
    }
    
    
    
    public function update_feedback_status($where,$data){
        
         $this->db->trans_complete();  
        $this->db->update('feedbacks', $data, $where);
        
        // return $this->db->last_query();
        if($this->db->affected_rows() > 0)
                {
                    return true;
                }else{
                    return false;
                }
    }
    
    
    
    // function update_driver_scan_15feb($order_id){
    //     $data = array("driver_warehouse_scanning"=>'yes',"driver_scanning_dt"=>date("Y-m-d H:i:s"));
    //     $this->db->where(array("order_id"=>$order_id));
    //     $order_update = $this->db->update('orders', $data);
        
    //     if($order_update){
        
    //     return true;
    //     }else{
    //         return false;
    //     }
    // }
    
      function update_driver_scan($order_id,$qr=''){
        $data = array("driver_warehouse_scanning"=>'yes',"driver_scanning_dt"=>date("Y-m-d H:i:s"),"driver_warehouse_scan_qr"=>$qr);
        $this->db->where(array("order_id"=>$order_id));
        $order_update = $this->db->update('orders', $data);
        
        if($order_update){
        
        return true;
        }else{
            return false;
        }
    }
    
    
    function check_qr_status_bag($code){
        
        $this->db->select('bsid');
        $this->db->from('bags_status');
        $this->db->where('code',$code);
        $this->db->where('bsid',5);
        
        $res=$this->db->get()->result();
        if($res){
            return $res;
        }else{
            return false;
        }
        
        
    }
    
    
    
     public function get_str_keeper_varified_bags_list($where, $is_cancelled = false){
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,
        o.customer_id, o.driver_id as driver_delivered_id,o.own_bag_rcv_by_driver_id as driver_received_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
          DATE_FORMAT(o.own_bag_rcv_by_dt,"%H:%i:%s") as bag_received_time,DATE_FORMAT(o.own_bag_rcv_by_dt,"%d-%m-%Y") as bag_received_date,
          o.own_bag_rcv_order_id as bag_received_with_orderID,o.own_bag_rcv_bag_collection_id as bag_received_with_bagCollection_ID, 
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver_who_receive,x.full_name as driver_who_deliver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as driver_who_receive_phone,x.phone as driver_who_deliver_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price,
        o.str_keep_varification,o.varified_at,o.varified_by,y.full_name as str_keeper_name,y.phone as str_keeper_phn');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.own_bag_rcv_by_driver_id','left');
        $this->db->join('users as x', 'x.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        $this->db->join('users as y', 'y.id = o.varified_by');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
        $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid ','left');
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        $query = $this->db->get();
        $orders = $query->result();
        
       // return $orders;
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
    
    
    
    function check_bag_str_keeper_varification($qrid,$delivery_id){
        
        $this->db->select('str_keep_varification,varified_at,varified_by,qr_bag_id');
        $this->db->from('orders');
        $this->db->where('order_id',$delivery_id);
        $this->db->where('qr_bag_id',$qrid);
        $this->db->where('str_keep_varification','yes');
        $this->db->where('is_neutral',0);
        
        $res=$this->db->get()->result();
        
        return $res;
        
    }
    
    
    public function get_strkeeper_bag_count($where,$strkeeper_id){
        $this->db->select("sum(case when ((o.qr_bag_id !=0 OR o.qr_bag_id!='') AND o.status ='Collected') AND o.is_neutral !=1 AND o.cooling_bag_check !=3 AND o.own_bag_rcv_by_driver_id >0 AND o.str_keep_varification='no' then 1 else 0 end) as `total_Pending`, 
        sum(case when ((o.qr_bag_id !=0 OR o.qr_bag_id!='') AND o.status ='Collected') AND o.cooling_bag_check !=3 AND o.own_bag_rcv_by_driver_id >0 AND o.str_keep_varification='yes' AND o.varified_by=$strkeeper_id then 1 else 0 end) as `total_verified`");
       
         $this->db->from('orders as o');
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();
    
        $orders = $query->result();
        if ($query){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
        // echo '<pre>';
        // print_r($result);
          return $result;
    }
    
    
    // Feedback Send notification
    
    public function feedback_reply_notification($where,$msg){
        
        $d=$this->get_feedback_detail($where);
        $res=$this->get_custmr_by_id($d[0]->user_id);
        
    if($res[0]->phone != '' ){ 
        //sending sms to agent
// 		$this->load->library('twilio');
		$from="+14154292457";
		
		$to=$res[0]->phone;
        // $to='+971544009796';
		$body = 'Dear valued customer " '.$res[0]->full_name .' " ,<br> '.$msg;
		try{
// 			$r=$this->twilio->sms($from,$to,$body);
              $r=send_expert_sms($to,$msg);
	       
		}catch (Exception $e){
            //   $r=$e;
		}
		
		return $r;
    }else{
        return false;
    }  
        // send notification code
        // $device_token=$res[0]->device_token;
        // $device_token='dNQmFhp-DGk:APA91bHz74LYkbVVO9OVMmCexblUAc7hRMv-iZbEYJ2E1xxqgcSvMIYZg426_QPe9UPlGgYX000DdHV-yBohKQmEPCvRrMGeN_Eg9he_CluBEn1PoXzTb-ZgM76QLaA7ZzM-ZwAE6jy5';    
    //     if($device_token != '' ){
    // $data = array(
    //                     'user_id' => $res[0]->id,
    //                     'device_token' =>$device_token,
    //                     'platform' => $res[0]->platform,
    //                     'status_code' => intval(600),
    //                     'title' => 'Logx Customer Care Service',
    //                     'for_whom' => $res[0]->full_name,
    //                     'badge' => $res[0]->badge_count,
    //                     'message' => $msg
    //                 );
                    
    //                  //send notification
    //               $r= send_notification_to_user($data, '');
                    
    //                 echo '<pre>';
    //                 print_r($r);
    //                 print_r($res);
    //                 echo $msg;
    //                 // die();
    // }else{
    //     // echo 'errorrrrrrrrrr <br>';
    //     // echo '<pre> status';
    //     // print_r($res[0]->status);
    //     // echo '<pre> device token';
    //     // print_r($res[0]->d_device_token);
        
        
    //     //  echo '<pre> user id';
    //     //  print_r($res[0]->id);
       
       
    //     echo '<pre> msg'.$msg;
        
    //     echo res['device_token'];
    //     print_r($res);
    //     echo $msg;
    //     // echo res['status'];
        
    //     }
        // print_r($res);
        
    }
    
    public function get_feedback_detail($where){
        
        $this->db->select('*');
        $this->db->from('feedbacks');
        $this->db->where($where);
        
        $res=$this->db->get()->result();
        return $res;
    }
    
    public function get_custmr_by_id($id){
         $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        
        $res=$this->db->get()->result();
        return $res;
    }
    
    
    public function get_qr_bag_id($where){
       
        $this->db->select('qr_bag_id');
        $this->db->from('orders');
        $this->db->where($where);
        
        $res=$this->db->get()->result();
        return $res;
    }
    
    public function updt_qr_status_for_strkpr($d, $where_qr){
       
        return $this->db->update("qr_bags", $d, $where_qr);
    }
    
    
     
     
     
     
      // code for dealing all status of qr and related orders and bring them on same page for smooth verifications
    
     // {   _15feb
    
    function get_qr_id_and_status($code){
        
        $this->db->select('*');
        $this->db->from('qr_bags');
        $this->db->where('code',$code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
                                   
            return $result[0];
        }else{
            return FALSE;
        }
        
    }
    
    function get_qr_related_order_status($qrCode){
             
               $this->db->select('o.*')
                ->from('orders as o')
               ->join('qr_bags as qr','o.qr_bag_id=qr.qrid')
                ->where('qr.code',$qrCode)
                ->where('o.is_neutral',0);
                // ->where('o.status',"Delivered")
              
          $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();     
            
            //   $order_id_whr= $result[0]["order_id"];
              
            return $result[0];
          
    }else{
        return false;
    }
    
    
    
    }
    
    
    
    
     function change_to_neutral_qr_remove_deliv_rec($order_id,$qrid){
        
     $data_order = array("qr_bag_id"=>0,"bag_qr" =>"","qr_attached_dt_vendor"=>"00-00-00 00:00:00");
       
    //   ,"is_cancelled"=>'no'
    
        $this->db->where(array("order_id"=>$order_id));
         $this->db->update('orders', $data_order);
        if($this->db->affected_rows() > 0)
                {
                    $order_update =true;
                    
                }else{
                    $order_update =false;
                }
        
        if($order_update){
         $data_qr = array("bsid"=>1);
        $this->db->where(array("qrid"=>$qrid));
        return $this->db->update('qr_bags', $data_qr);
        }else{
            return false;
        }
        
    }
    
    function change_to_collected_qr_collected_deliv_rec($order_id,$qrid,$driver_id=0,$qrCode=""){
        
     $data_order = array("qr_bag_id"=>0,"bag_qr" =>"","qr_attached_dt_vendor"=>"00-00-00 00:00:00");
     
      $data_order = array("status"=>"Collected","pending_bag"=>0,"bag_with_customer"=>0,"bag_received"=>1,"own_bag_rcv_order_id"=>$order_id,"own_bag_rcv_bag_collection_id"=>0, "own_bag_rcv_by_driver_id"=>$driver_id,"own_bag_rcv_by_dt"=>date("Y-m-d H:i:s"),"own_bag_rcv_by_driver"=>1,"own_bag_rcv_qr"=>$qrCode);
   
       
    //   ,"is_cancelled"=>'no'
    
        $this->db->where(array("order_id"=>$order_id));
         $this->db->update('orders', $data_order);
        if($this->db->affected_rows() > 0)
                {
                    $order_update =true;
                    
                }else{
                    $order_update =false;
                }
        
        if($order_update){
         $data_qr = array("bsid"=>5);
        $this->db->where(array("qrid"=>$qrid));
        return $this->db->update('qr_bags', $data_qr);
        }else{
            return false;
        }
        
    }
    
  
     function check_delivery_current_status($order_id){
        
         $order_data_check_old_qr=$this->db->select('*')->from("orders")->where("order_id= $order_id")->get()->result();
         
         if( $order_data_check_old_qr){
             
             return  $order_data_check_old_qr[0];
         }else{
             return false;
         }
        
    }
    
    
    // ALL NEW
   
      function get_qr_current_status_with_delivery_details($code){
        
         $this->db->select('qr.*,qr_v.full_name as qr_vendor_name ,st.status as qr_status,u.full_name as qr_strkeeper_name, u.phone as qr_strkeeper_phone, o.order_id as delivery_id,o.status as delivery_status,o.is_cancelled as delivery_canceled_check ,o.name_on_delivery as delivery_customer_name ,o.number_on_delivery as delivery_customer_number,o.vendor_id as delivery_vendor_id,o.driver_id as delivery_assigned_driver_id,o.own_bag_rcv_by_dt as bag_collected_dt,o.delivered_date,driver.full_name as delivery_assigned_driver_name, driver.phone as delivery_assigned_driver_phone,vendor.full_name as delivery_vendor_name, vendor.phone as delivery_vendor_phone,o.varified_by,o.neutral_by,tst.full_name as varified_by_n,o.str_keep_varification
         ,o.delivered_date,o.delivery_date,o.own_bag_rcv_by_dt');
         $this->db->from('qr_bags as qr');
         
         $this->db->join('bags_status as st','st.bsid = qr.bsid');
         
         $this->db->join('users as u','qr.str_kpr_id = u.id','left');
         
         $this->db->join('orders as o','qr.qrid = o.qr_bag_id AND o.is_neutral=0','left');
         
          $this->db->join('users as driver','driver.id = o.driver_id','left');
          
          $this->db->join('users as vendor','vendor.id = o.vendor_id','left');
          
          $this->db->join('users as qr_v','qr.vendor_id = qr_v.id','left');
          
          $this->db->join('users as tst','o.varified_by = tst.id','left');
         
        $this->db->where(array("qr.code"=>$code));
        
        
        
        // $this->db->get();
        // print_r($this->db->last_query());
        // die();
        // return $this->db->last_query();
        $res=$this->db->get()->result();
        
        return $res;
        
        // 
        
       
    }
   
      function get_timeslot_segments_by_date($driver_id, $from_date, $to_date){
        /*select count(o.status) as total, sum(o.delivered_status) as completed, o.vendor_id as id, u.email, u.full_name, u.address from orders as o
        LEFT JOIN users as u on u.id = o.vendor_id
        where `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59' and o.driver_id = 47
        GROUP BY o.vendor_id*/
        $this->db->select("o.delivery_time as timeslot,count(o.status) as total,  sum(o.delivered_status) as completed, 
        
         count(o.order_id) as assigned, 
        sum(case when qr.bsid = '3' then 1 else 0 end) as picked,
        SUM(CASE WHEN is_cancelled = 'yes' THEN 1 ELSE 0 END) AS canceled_deliv ");
        $this->db->from($this->table.' as o');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
      //  $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
    //   $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
      
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        //$this->db->where('u.status',1);
        $this->db->group_by('o.delivery_time');
        $query = $this->db->get();
        return $query->result();
    }
    
      function  get_vendor_deliveries_timeslot($driver_id, $timeslot, $date){
        /*select o.status, o.delivery_time, o.customer_id as id, u.full_name, u.phone, u.address from orders as o
        INNER JOIN users as u on u.id = o.customer_id
        where o.driver_id = 47 and o.vendor_id = 63*/
        $this->db->select('o.delivery_amount,o.`company_note`,o.`driver_verify_bag`,o.cooling_bag_check as bag_type,o.bag_qr,qs.status as qrstatus,o.pu_number, o.delivery_time as delivery_type, o.signature, o.signature_img, o.status, o.number_on_delivery as phone,
        o.total_bag_recv_by_driver as bag_received,o.bag_received as bg_count, o.bag_received_qr, o.delivery_img, o.order_id as delivery_id, o.delivery_address as address,
         o.delivery_time,o.tot_ice_pack_received as ice_bags, o.note, o.customer_id,o.name_on_delivery, u.full_name, u.phone as customer_phone, u.address as delivery_address,o.send_notification,v.delivery_message,
          o.delivered_date,v.email as vendor_email,v.full_name as vendor_name,o.google_link_addrs,
          o.driver_recvd_amount as driver_recvd,o.other_payment_driver_recv as other_cash,o.delivered_to as Delivery_drop_type,
          u.addr_img_usr as addr_img, u.addr_loc_by_dri_usr as addr_loc_by_dri,o.mul_addr_id,o.open_bag_attachment,u.addressCount,o.empty_bag_attachment,o.empty_bag_code
          '); //SPOON lili
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.customer_id');
        $this->db->join('users as v', ' v.id = o.vendor_id', 'left');
        $this->db->join('qr_bags as qb', 'o.qr_bag_id = qb.qrid','left');
        $this->db->join('bags_status as qs', 'qb.bsid = qs.bsid','left');
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        $this->db->where('o.delivery_time',$timeslot);
        $query = $this->db->get();
        
        return $query->result();
    }
      
      function get_deliveries_by_picked2_timeslot($driver_id,$timeslot, $date){
        /*SELECT DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed
        FROM `orders` as `o`
        WHERE `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59'
        AND `o`.`driver_id` = '47'*/
        $this->db->select(" count(o.order_id) as assigned, 
       sum(case when qr.bsid = '3' then 1 else 0 end) as picked");
        $this->db->from($this->table.' as o');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid');
        $this->db->join('users as u', 'u.id = o.vendor_id');
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        $this->db->where('o.delivery_time',$timeslot);
        $this->db->where('o.status !=',"Delivered");
        $this->db->where('u.status',1);
        $query = $this->db->get();
        return $query->result();
    }
    
    
      //   Storekeeper Delivery status changes
    
    
       // for general and neutral  (use in live qr list neutral)
      function change_to_neutral_qr_remove_deliv_rec_strkeeper($order_id,$qrid,$userid,$rzn="",$rzn_notes="",$selected_status=""){
        
     $data_order = array("qr_bag_id"=>0,"bag_qr" =>"","qr_attached_dt_vendor"=>"00-00-00 00:00:00","forcely_changed_by"=>$userid,"forcely_changed_at"=>date('Y-m-d H:i:s'),"forcely_check"=>"yes","forcely_reason"=>$rzn,"forcely_status_was"=>$rzn_notes,"forcely_selection"=>$selected_status);
       
    //   ,"is_cancelled"=>'no'
        //  echo '<pre>';
        //  print_r($data_order);
        //  die();
         
        $this->db->where(array("order_id"=>$order_id));
         $this->db->update('orders', $data_order);
        if($this->db->affected_rows() > 0)
                {
                    $order_update =true;
                    
                }else{
                    $order_update =false;
                }
        
        if($order_update){
         $data_qr = array("bsid"=>1);
        $this->db->where(array("qrid"=>$qrid));
        return $this->db->update('qr_bags', $data_qr);
        }else{
            return false;
        }
        
    }
    
    
                // for collect (use in live qr list neutral)
    function change_to_collected_qr_collected_deliv_rec_strkeeper($order_id,$driver_id=0,$qrCode="",$userid,$rzn="",$rzn_notes="",$selected_status="",$qrid){
        
     
      $data_order = array("status"=>"Collected","pending_bag"=>0,"bag_with_customer"=>0,"bag_received"=>1,"own_bag_rcv_order_id"=>$order_id,"own_bag_rcv_bag_collection_id"=>0, "own_bag_rcv_by_driver_id"=>$driver_id,"own_bag_rcv_by_dt"=>date("Y-m-d H:i:s"),"own_bag_rcv_by_driver"=>1,"own_bag_rcv_qr"=>$qrCode,
      "forcely_changed_by"=>$userid,"forcely_changed_at"=>date('Y-m-d H:i:s'),"forcely_check"=>"yes","forcely_reason"=>$rzn,"forcely_status_was"=>$rzn_notes,"forcely_selection"=>$selected_status
             );
   
       
    //   ,"is_cancelled"=>'no'
    
        $this->db->where(array("order_id"=>$order_id));
         $this->db->update('orders', $data_order);
        if($this->db->affected_rows() > 0)
                {
                    $order_update =true;
                    
                }else{
                    $order_update =false;
                }
        
        if($order_update){
         $data_qr = array("bsid"=>5);
        $this->db->where(array("qrid"=>$qrid));
        return $this->db->update('qr_bags', $data_qr);
        }else{
            return false;
        }
        
    }
    
                         //  $qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid
     function change_to_collected_delivery_qr_strkeeper($qrCode, $status,$driver_id=0,$order_id,$ice_bags=0,$bag_id=0,$userid,$rzn="",$rzn_notes="",$selected_status="",$qrid){
     
                        
            $order_id_whr= $order_id;
            $data = array("cooling_bag_check"=>1,"status"=>$status,"ice_bags"=>$ice_bags,"pending_bag"=>0,"bag_with_customer"=>0,"bag_received"=>1,"own_bag_rcv_order_id"=>$order_id,"own_bag_rcv_bag_collection_id"=>$bag_id, "own_bag_rcv_by_driver_id"=>$driver_id,"own_bag_rcv_by_dt"=>date("Y-m-d H:i:s"),"own_bag_rcv_by_driver"=>1,"own_bag_rcv_qr"=>$qrCode,
               "delivered_status"=>1, "delivered_date"=>date("Y-m-d H:i:s"),"tot_ice_pack_received"=>$ice_bags,"bag_received_qr"=>$qrCode,"driver_verify_bag"=>"","total_bag_recv_by_driver"=>0,
               "forcely_changed_by"=>$userid,"forcely_changed_at"=>date('Y-m-d H:i:s'),"forcely_check"=>"yes","forcely_reason"=>$rzn,"forcely_status_was"=>$rzn_notes,"forcely_selection"=>$selected_status
              );
        $this->db->where(array("order_id"=>$order_id_whr));
        $query=$this->db->update('orders', $data);
        
        
           if($this->db->affected_rows() > 0){
                    $order_update =true;
                    
                }else{
                    $order_update =false;
                }
         
           if ($order_update){
            
               $qr_data = array("bsid"=>5);
               $this->db->where(array("qrid"=>$qrid));
               return $this->db->update('qr_bags', $qr_data);
               
           }else{
               
              return FALSE;
           }
        
    }
 
 
      
      function change_for_verify_by_strkeper($data,$code,$data_ordertbl_update,$qrid){
        
        $this->db->trans_complete(); 
        
        $where=array('qrid'=>$qrid);
        
        
         $this->db
            ->where($where)
            ->update('qr_bags', $data);
            
            if($this->db->affected_rows() > 0)
                {
                    
                    // ......... Order tbl update
        
            $this->db->select('o.order_id')
                ->from('orders as o')
               ->join('qr_bags as qr','o.qr_bag_id=qr.qrid')
                ->where('qr.code',$code)
                ->where('o.status',"Collected")
                 ->where('o.is_neutral',0)
                 ->where('o.str_keep_varification',"no");
                 
          
          $query = $this->db->get();
          
        if ($query->num_rows() > 0) {
            $result= $query->result_array();                    
            $order_id_whr= $result[0]["order_id"];
            
            // return $order_id_whr;
            // die();
            
        $this->db->where(array("order_id"=>$order_id_whr));
        return $this->db->update('orders', $data_ordertbl_update);
        } else {
            return FALSE;
        }
        
        
        // .............

                   
                }else{
                    return FALSE;
                }
        
        
        
        
        
            
            
            
            // $this->db->select('qrid');
            // $this->db->where($where);
            // $this->db->from('qr_bags');
            // $res=$this->db->get->result();
            
            // $qrid=$res[0]->qrid;
            
            // return $qrid;
            
                
            
          
          
  
             
        
    }
    
    
     // for Recevied in warehouse (use in live qr list neutral)
       
      function change_qr_and_delivery_wrt_status_strkeeper($data_for_qr,$data_for_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery){
          
           $this->db->trans_complete(); 
           
              $deliv_res=$this->db->where($whr_for_delivery)->update('orders',$data_for_deliv);
              
             if($this->db->affected_rows() > 0){
                      
                     $res_for_qr=$this->db->where($whr_for_qr)->update('qr_bags',$data_for_qr);
                     return $res_for_qr;
                 }else{
                    return false;
                 }
          
      }
      
      
      
      
       function update_new_cancel($data, $order_id){
        $this->db->where('order_id',$order_id);
        return $this->db->update($this->table, $data);
    }
    
       function  get_vendor_deliveries_with_timeslot_data($driver_id, $timeslot, $date,$vendor_id){
        /*select o.status, o.delivery_time, o.customer_id as id, u.full_name, u.phone, u.address from orders as o
        INNER JOIN users as u on u.id = o.customer_id
        where o.driver_id = 47 and o.vendor_id = 63*/
        $this->db->select('o.delivery_amount,o.`company_note`,o.`driver_verify_bag`,o.cooling_bag_check as bag_type,o.bag_qr,qs.status as qrstatus,o.pu_number, o.delivery_time as delivery_type, o.signature, o.signature_img, o.status, o.number_on_delivery as phone,
        o.total_bag_recv_by_driver as bag_received,o.bag_received as bg_count, o.bag_received_qr, o.delivery_img, o.order_id as delivery_id, o.delivery_address as address,
         o.delivery_time,o.tot_ice_pack_received as ice_bags, o.note, o.customer_id,o.name_on_delivery, u.full_name, u.phone as customer_phone, u.address as delivery_address,o.send_notification,v.delivery_message,
          o.delivered_date,v.email as vendor_email,v.full_name as vendor_name,o.google_link_addrs,
          o.driver_recvd_amount as driver_recvd,o.other_payment_driver_recv as other_cash,o.delivered_to as Delivery_drop_type,
          u.addr_img_usr as addr_img, u.addr_loc_by_dri_usr as addr_loc_by_dri,o.mul_addr_id,o.open_bag_attachment,u.addressCount,o.empty_bag_attachment,o.empty_bag_code'); //SPOON lili
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.customer_id');
        $this->db->join('users as v', ' v.id = o.vendor_id', 'left');
        $this->db->join('qr_bags as qb', 'o.qr_bag_id = qb.qrid','left');
        $this->db->join('bags_status as qs', 'qb.bsid = qs.bsid','left');
        $this->db->where("o.action != 'Paused' and o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        $this->db->where('o.delivery_time',$timeslot);
         $this->db->where('o.vendor_id',$vendor_id);
        // $this->db->group_by('o.vendor_id');
        $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        
        
        return $query->result();
    }
    
       function get_timeslot_segments_by_date_and_vendors($driver_id, $from_date, $to_date,$timeslot){
        /*select count(o.status) as total, sum(o.delivered_status) as completed, o.vendor_id as id, u.email, u.full_name, u.address from orders as o
        LEFT JOIN users as u on u.id = o.vendor_id
        where `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59' and o.driver_id = 47
        GROUP BY o.vendor_id*/
        $this->db->select("v.email as vendor_email,v.full_name as vendor_name,o.vendor_id,o.delivery_time as timeslot,count(o.status) as total,  sum(o.delivered_status) as completed, 
        
         count(o.order_id) as assigned, 
        sum(case when qr.bsid = '3' then 1 else 0 end) as picked,
        SUM(CASE WHEN is_cancelled = 'yes' THEN 1 ELSE 0 END) AS 'canceled_deliv' ");
        $this->db->from($this->table.' as o');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
        $this->db->join('users as v', ' v.id = o.vendor_id', 'left');
      //  $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
    //   $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
      
        $this->db->where("o.action != 'Freezed' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        //$this->db->where('u.status',1);
         $this->db->where('o.delivery_time',$timeslot);
         $this->db->group_by('o.vendor_id');
        // $this->db->group_by('o.delivery_time');
        $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        return $query->result();
    }
      
       public function get_str_keeper_forcefully_bags_list($where, $is_cancelled = false){
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,
        o.customer_id, o.driver_id as driver_delivered_id,o.own_bag_rcv_by_driver_id as driver_received_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
          DATE_FORMAT(o.own_bag_rcv_by_dt,"%H:%i:%s") as bag_received_time,DATE_FORMAT(o.own_bag_rcv_by_dt,"%d-%m-%Y") as bag_received_date,
          o.own_bag_rcv_order_id as bag_received_with_orderID,o.own_bag_rcv_bag_collection_id as bag_received_with_bagCollection_ID, 
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver_who_receive,x.full_name as driver_who_deliver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as driver_who_receive_phone,x.phone as driver_who_deliver_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price,
        o.str_keep_varification,o.varified_at,o.varified_by,y.full_name as str_keeper_name,y.phone as str_keeper_phn,
        
        o.forcely_check,o.forcely_reason,o.forcely_status_was,o.forcely_selection,o.forcely_changed_at,o.forcely_changed_by,f.full_name  as forcely_changed_by_name,o.is_cancelled as canceled_check');
        
        
        
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.own_bag_rcv_by_driver_id','left');
        $this->db->join('users as x', 'x.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        $this->db->join('users as y', 'y.id = o.varified_by');
        
        $this->db->join('users as f', 'f.id = o.forcely_changed_by');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
        $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid ','left');
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        // if($is_cancelled) {
        //     $this->db->where(['is_cancelled' => 'yes']);
        // } else {
        //     $this->db->where(['is_cancelled' => 'no']);
        // }
        $query = $this->db->get();
        $orders = $query->result();
        
       // return $orders;
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
    
       public function get_orders_where_forcefully($where, $s =null, $l=null, $col = null, $dir = null)
    {
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.tot_ice_pack_received as ice_bags,o.bag_received as own_bag_receive_count,o.ice_bags as old_ice_bags,o.assigned_user,o.assigned_mode,o.cooling_bag_check,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor,v.email as v_email, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, c.send_notification, o.food_type,v.emails_for_report,
        
        o.str_keep_varification,o.varified_at,o.varified_by,y.full_name as str_keeper_name,y.phone as str_keeper_phn,
        
        o.forcely_check,o.forcely_reason,o.forcely_status_was,o.forcely_selection,o.forcely_changed_at,o.forcely_changed_by,f.full_name  as forcely_changed_by_name,o.is_cancelled as canceled_check
        ');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        
        $this->db->join('users as y', 'y.id = o.varified_by', 'left');
        
        $this->db->join('users as f', 'f.id = o.forcely_changed_by', 'left');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
          $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        if($where){
            $this->db->where($where);
        }
        
        if($col != null AND $dir != null)
        {
            $this->db->order_by($col, $dir);
        }
        if($col != null AND $dir != null)
        {
           $this->db->limit($l, $s);
        }
        $query = $this->db->get();
        $resp = $query->result_array();
        // return $this->db->last_query();
        return $resp;
    }
    
      function getOrders_details_N($ids)
    {
      return $this->db->select('orders.order_id,orders.customer_id,orders.delivery_date,orders.name_on_delivery,orders.number_on_delivery,orders.delivery_time,orders.delivery_address,orders.partner_price,orders.status,orders.qr_bag_id,v.full_name as vendor,v.email as v_email,d.full_name as driver,d.phone as d_phone, v.phone as v_phone, qr.code,qr.qrImage,v.partner_logo',false)
        ->from('orders')
        ->join('users as d', 'd.id = orders.driver_id','left')
        ->join('users as v', 'v.id = orders.vendor_id', 'left')
        ->join('qr_bags as qr', 'qr.qrid = orders.qr_bag_id', 'left')
         ->where_in('orders.order_id', $ids)->order_by('orders.name_on_delivery','asc')
         ->get()->result_array();
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        // ->result_array();
    }
    
    
    //   } _15feb
  
  
  
  
  
      // New Module TA 25-April-2021 Start
      
      
       public function add_customer_meta($tb,$data)
      {
        $res=$this->db->insert($tb,$data);
        // $res=false;
        if($res){
            $data=array('id' => $this->db->insert_id() );
        }else{
            $data=false;
        }
           
      return $data;
      }
      
      function add_plan_order($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); //return last inserted id
    }
    
     public function check_customer_email_TA($where){
        
         $where['role_id'] = 4   ;
      
        // $where['is_deleted'] = 0;
        
        $query=$this->db->select('full_name')->get_where('users', $where);
        return $query->result();
        
        
    }
      
      
  
  
  
  
       // New Module TA 25-April-2021 Ends
       
       
       
    //   added at 18 june 2021
    
    function get_emis_new_appr(){
        
        $dts=date("Y-m-d")." 00:00:00";
        $dte=date("Y-m-d")." 23:59:59";
    // SUM(CASE WHEN o.driver_id!="" AND o.cancel_status=0 AND o.assign_date BETWEEN "'.$dts.'" AND "'.$dte.'" THEN 1 ELSE 0 END) AS "DRIVERS_TODAY_DELIVERIRS",
    
    $this->db->select(' tbl_emi.id as tbl_emi_id,tbl_emi.emirate_name,ds.emirate_id, ds.user_id,ds.id as x, ds.time_slot_id,ds.area_id');
    
        //  $this->db->from('orders as o');
        $this->db->from('tbl_emirates as tbl_emi');
        
        //  $this->db->join('tbl_emirates as tbl_emi','tbl_emi.id !="" ','left');
          $this->db->join('driver_shift_schedules as ds','tbl_emi.id = ds.emirate_id','left');
        //  $this->db->join('orders as o','ds.user_id=o.driver_id','left');
         
        //  $this->db->where('o.driver_id!="" AND o.cancel_status=0 AND o.assign_date BETWEEN "'.$dts.'" AND "'.$dte.'" ');
        //  $this->db->group_by("ds.emirate_id");
        // $this->db->group_by("ds.id");
         $ans=$this->db->get()->result();
       
        //  echo '<pre>';
        //   print_r($this->db->last_query());
        //  
       
    
    //   print_r($ans);
    //   print_r($this->db->last_query());
    //   die();
       return $ans;
        
    }
    
    public function get_drivers_new_appr($where = null){
        
         $dts=date("Y-m-d")." 00:00:00";
        $dte=date("Y-m-d")." 23:59:59";
        
        $where_role = array('u.role_id'=>3);//for driver only
        
        $this->db->select('SUM(CASE WHEN o.driver_id!="" AND o.cancel_status=0 AND o.assign_date BETWEEN "'.$dts.'" AND "'.$dte.'" THEN 1 ELSE 0 END) AS "DRIVERS_TODAY_DELIVERIRS",
          u.id, u.email, u.phone, u.full_name, u.address, u.code,u.Password_partner, u.send_invitation, r.name, u.status,u.salary,u.id_card,u.visa_card,u.license_card,u.other_card,u.contract_file,u.id_issue,u.visa_issue,u.other_issue,u.license_issue,u.id_exp,u.visa_exp,u.other_exp,u.license_exp');
        $this->db->from('users as u');
        $this->db->join('roles as r', 'r.id = u.role_id');
        $this->db->join('orders as o','u.id =o.driver_id','left');
        // $this->db->join('login_log as ll', 'll.user_id = u.id', 'left');
        $this->db->where($where_role);
        
         $this->db->group_by('u.id');

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
        
        
    //     echo '<pre>';
    //     print_r($result);
    //   die(); 
        return $result;
    }
    
    
    public function get_drivers_count_appr($where = null){
        
         $dts=date("Y-m-d")." 00:00:00";
        $dte=date("Y-m-d")." 23:59:59";
        
        $where_role = array('u.role_id'=>3);//for driver only
        
        $this->db->select('SUM(CASE WHEN o.driver_id!="" AND o.cancel_status=0 AND o.assign_date BETWEEN "'.$dts.'" AND "'.$dte.'" THEN 1 ELSE 0 END) AS "DRIVERS_TODAY_DELIVERIRS",
          u.id,u.full_name');
        $this->db->from('users as u');
      $this->db->join('orders as o','u.id =o.driver_id','left');
        // $this->db->join('login_log as ll', 'll.user_id = u.id', 'left');
        $this->db->where($where_role);
        
         $this->db->group_by('u.id');

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
        
        
    //     echo '<pre>';
    //     print_r($result);
    //   die(); 
        return $result;
    }
    
    
    
    
    
    
    
    
    
    public function get_order_by_id_for_edit($order_id){
        
        // o.ice_bags sami bhae
        $this->db->select('o.order_id as delivery_id, o.order_id, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address, o.note, o.partner_price,
        c.full_name, c.phone, c.address, c.full_name as customer,o.send_notification,c.send_notification as old_notification,o.name_on_delivery,v.full_name as vendor,v.email as vendor_email, c.address,
        o.pickUp,o.google_link_addrs,o.food_type,
        c.phone as c_phone,v.phone as v_phone,o.delivery_time as delivery_type,DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time,o.delivery_date as d_dt,
         serv.name as service,emi.emirate_name as emirate,
           c.device_token as c_device_token,
           o.company_note,o.delivery_amount,o.areaID,o.emirateID,o.slotID,o.partner_price,o.last_edit_by,o.last_edit_at');
        $this->db->from($this->table.' as o'); 
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
      //  $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->where('o.order_id',$order_id);
        $query = $this->db->get();
        return $query->result();
    }
    
     function update_for_logout_user($data, $where){
        return $this->db->update('users', $data, $where);
    }
    
    
    function update_user_tbl($data, $where){
        return $this->db->update('users', $data, $where);
    }
    
    function update_user_address_counter($data, $where){
        return $this->db->update('users', $data, $where);
    }
    
     function get_orders_pickup_bag_records($vendor_id,$start_date,$end_date,$where){
        //  o.name_on_delivery
        $res=$this->db->select('c.full_name as name_on_delivery,v.full_name as vendor')->from('orders as o')->join('users as c', 'o.customer_id =c.id  ', 'left')->join('users as v', 'v.id = o.vendor_id', 'left')->order_by('o.name_on_delivery', 'asc')->where($where)->get()->result();
        return  $res;
        // return $this->db->last_query();
    }
    
    
    
    // Get_xls_sheet_assigned
     public function get_xls_sheet_assigned($where, $is_cancelled = false){
        //  c.full_name as customer,  c.phone as c_phone,
        $this->db->select('o.order_id,o.name_on_delivery as customer,o.delivery_address as address,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivery_date,o.delivery_time as timeslot,
        d.full_name as driver, v.full_name as vendor');
        
        $this->db->from($this->table.' as o');
         
       
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        
       
      
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        
        
        
        $this->db->order_by('vendor', 'ASC');
        $query = $this->db->get();
        
    //     echo '<pre>';
    //   print_r($this->db->last_query());
    //   die();
        $orders = $query->result();
        // if ($orders){
        //     $result['result'] = true;
        //     $result['records'] = $orders;
        // }else{
        //     $result['result'] = false;
        // }
        
        return $orders;
    //   echo '<pre>';
    //   return $this->db->last_query();
    }
    
    
    
    
      
    public function get_delivery_date($id){
        
        $info=$this->db->select('o.delivery_date')->from('orders as o')->where('order_id', $id)->get()->result();
        if($info){
            return $info[0]->delivery_date;
        }else{
            
        }return false;
    }
    
    public function update_orders_manualComplete($id,$delivery_date)
    {
         $data=array(
        'status'=>'Delivered',    
        'ship_status'=>1,
        'ship_date'=>$delivery_date,
        'delivered_status'=>1,
        'delivered_date'=>$delivery_date,
        'delivered_note'=> 'Manual'
        );
        
        $this->db->where('order_id', $id);
        $res=$this->db->update('orders', $data);
        return $res;
    }
    
    
    
    public function get_orders_basic_inf($where, $is_cancelled = false){
        //  c.full_name as customer,  c.phone as c_phone, c.address,
        $this->db->select('o.status,o.order_id,o.name_on_delivery,o.number_on_delivery,c.full_name as customer,o.number_on_delivery as c_phone,o.pickUp,o.note, 
        o.customer_id, o.driver_id, o.vendor_id,o.delivery_address,
        DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,
       
       
        d.full_name as driver, v.full_name as vendor, 
       
        d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type,  o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.delivery_amount,o.company_note,o.google_link_addrs,o.plan_id,o.areaID,o.emirateID,o.slotID');
        
        $this->db->from($this->table.' as o');
        // $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        $this->db->join('users as c', 'c.id = o.customer_id');
      
        
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
        $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        $query = $this->db->get();
        
        // return $this->db->last_query();
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
    
    
     public function get_latest_driver($customer_id,$delivery_address,$delivery_time){
        
        // $where='o.customer_id ='.$customer_id.' AND o.delivery_address="'.$delivery_address.'" AND o.delivery_time="'.$delivery_time.'" AND o.driver_id!=0';
        
        // echo '<pre><br>where:';
        // echo $where;
        // echo '<pre><br>';
        // ->where('o.customer_id',$customer_id)
        //         ->where('o.delivery_address',$delivery_address)   
        //         ->where('o.delivery_time',$delivery_time) 
        //         ->where('o.driver_id !="" ')   
        
        // o.order_id,o.delivery_address,o.delivery_time
        $res= $this->db->select('o.driver_id,d.full_name,o.mul_addr_id')
                ->from('orders as o')
                ->join('users as d','o.driver_id=d.id','left')
                ->where('o.customer_id',$customer_id)
                ->where('o.delivery_address',$delivery_address)   
                ->where('o.delivery_time',$delivery_time) 
                ->where('o.driver_id !=',0)   
                ->order_by('o.delivery_date','DESC')
                ->limit(1)
                ->get()->result();
            //      echo '<pre>QRY:<br>';
            //      print_r($this->db->last_query());  
            //      echo '<pre><br>';
            //   $res= $res->result();
                
                if($res){
                    return $res;
                }else{
                    return false;
                }
            //   dd($this->db->last_query());  
                
    }
    
    public function get_latest_driver_test($customer_id,$delivery_address,$delivery_time){
       
       
           $res= $this->db->select('o.driver_id,d.full_name,o.mul_addr_id,DAYOFWEEK(o.delivery_date) as day,o.delivery_date')
                ->from('orders as o')
                ->join('users as d','o.driver_id=d.id','left')
                ->where('o.customer_id',$customer_id)
                ->where('o.delivery_address',$delivery_address)   
                ->where('o.delivery_time',$delivery_time) 
                ->where('o.driver_id !=',0)   
                ->where('DAYOFWEEK(o.delivery_date) !=',1)
                ->where('DAYOFWEEK(o.delivery_date) !=',7)
                
                ->order_by('o.delivery_date','DESC')
                ->limit(1)
                ->get()->result();
       
            //      echo '<pre>QRY:<br>';
            //      print_r($this->db->last_query());  
            //      echo '<pre><br>';
            //   $res= $res->result();
                
                if($res){
                    return $res;
                }else{
                    return false;
                }
            //   dd($this->db->last_query());  
                
    }
  
  
//   add d.phone, start
    public function get_latest_driver_weekends($customer_id,$delivery_address,$delivery_time,$weekday_check=0){
       
       if($weekday_check){
           $res= $this->db->select('o.driver_id,d.full_name,d.phone,o.mul_addr_id,DAYOFWEEK(o.delivery_date) as day,o.delivery_date')
                ->from('orders as o')
                ->join('users as d','o.driver_id=d.id','left')
                ->where('o.customer_id',$customer_id)
                ->where('o.delivery_address',$delivery_address)   
                ->where('o.delivery_time',$delivery_time) 
                ->where('o.driver_id !=',0) 
                ->where('DAYOFWEEK(o.delivery_date)',$weekday_check) 
                
                ->order_by('o.delivery_date','DESC')
                ->limit(1)
                ->get()->result();
             }
        
            //      echo '<pre>QRY:<br>';
            //      print_r($this->db->last_query());  
            //      echo '<pre><br>';
            //   $res= $res->result();
                
                if($res){
                    return $res;
                }else{
                    return false;
                }
            //   dd($this->db->last_query());  
                
    }
    
    public function check_for_new_delivery_($customer_id,$delivery_address,$delivery_time){
        
       
        $res= $this->db->select('o.driver_id,d.full_name,d.phone,o.mul_addr_id,DAYOFWEEK(o.delivery_date) as day,o.delivery_date')
                ->from('orders as o')
                ->join('users as d','o.driver_id=d.id','left')
                ->where('o.customer_id',$customer_id)
                ->where('o.delivery_address',$delivery_address)   
                ->where('o.delivery_time',$delivery_time) 
                ->where('o.driver_id !=',0)   
                ->order_by('o.delivery_date','DESC')
                ->limit(1)
                ->get()->result();
            //      echo '<pre>QRY:<br>';
            //      print_r($this->db->last_query());  
            //      echo '<pre><br>';
            //   $res= $res->result();
                
                if($res){
                    return $res;
                }else{
                    return false;
                }
            //   dd($this->db->last_query());  
                
    }
    
     public function get_latest_driver_weekdays($customer_id,$delivery_address,$delivery_time){
       
       
           $res= $this->db->select('o.driver_id,d.full_name,d.phone,o.mul_addr_id,DAYOFWEEK(o.delivery_date) as day,o.delivery_date')
                ->from('orders as o')
                ->join('users as d','o.driver_id=d.id','left')
                ->where('o.customer_id',$customer_id)
                ->where('o.delivery_address',$delivery_address)   
                ->where('o.delivery_time',$delivery_time) 
                ->where('o.driver_id !=',0)   
                ->where('DAYOFWEEK(o.delivery_date) !=',1)
                ->where('DAYOFWEEK(o.delivery_date) !=',7)
                
                ->order_by('o.delivery_date','DESC')
                ->limit(1)
                ->get()->result();
       
            //      echo '<pre>QRY:<br>';
            //      print_r($this->db->last_query());  
            //      echo '<pre><br>';
            //   $res= $res->result();
                
                if($res){
                    return $res;
                }else{
                    return false;
                }
            //   dd($this->db->last_query());  
                
    }

// d.phone, ends 
    
    
    
    // BAG PICKUP MODULE
    
    
    // Bag pickup module
    
    // API
   
    function get_vendor_information_bagpickup_summery($driver_id,$date){
        
        $this->db->select(" b.partner_id, v.full_name as partner_name,count(b.id) as total_bags_count, 
       sum(case when b.pickup_status = 'Collected' then b.collected_bags else 0 end) as collected_bags_count");
    //   sum(case when b.pickup_status = 'Cancelled' then 1 else 0 end) as cancelled_bags_count");
        $this->db->from($this->bagpicks.' as b');
        
        $this->db->join('users as v', 'v.id = b.partner_id');
        // $this->db->where("b.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where("b.created_at BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
       
        $this->db->where('b.driver_id',$driver_id);
        $this->db->where('b.pickup_status !=',"Cancelled");
        $this->db->group_by('b.partner_id');
       
        $query = $this->db->get();
        // dd($this->db->last_query());
        return $query->result();
    }
    
     function  get_bagpickup_list_by_driver_vendor($driver_id,$partner_id,$date){
    //   ,c.full_name as customer_name
    // b.total_bags as bags_count, ,b.name_on_delivery as customer_name,
        $this->db->select('b.total_bags,b.collected_bags,sum(case when (b.collected_bags !=0 AND b.pickup_status="Collected") then b.collected_bags  else b.collected_bags+b.total_bags end) as bags_count,b.id,b.delivery_id,b.pickup_status as status,b.notes as bags_notes,b.customer_name,b.driver_cancel_request as is_cancel_requested');
        $this->db->from($this->bagpicks.' as b');
        
        // $this->db->join('users as c', 'c.id = b.customer_id');
        // $this->db->where("b.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where("b.created_at BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('b.driver_id',$driver_id);
        $this->db->where('b.partner_id',$partner_id);
        $this->db->group_by('b.delivery_id');
        $this->db->order_by('b.name_on_delivery','ASC');
       
        $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        
        
        return $query->result();
    }
    
    
     function  get_bagpickup_list_by_driver_vendor_by_status($driver_id,$partner_id,$date,$status){
    //   ,c.full_name as customer_name
        $this->db->select('b.id,b.delivery_id,b.pickup_status as status,b.total_bags as bags_count,b.notes as bags_notes,b.customer_name,b.name_on_delivery as customer_name');
        $this->db->from($this->bagpicks.' as b');
        
        // $this->db->join('users as c', 'c.id = b.customer_id');
        // $this->db->where("b.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where("b.created_at BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('b.driver_id',$driver_id);
        $this->db->where('b.partner_id',$partner_id);
        $this->db->where('b.pickup_status',$status);
        $this->db->order_by('b.name_on_delivery','ASC');
       
        $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        
        
        return $query->result();
    }
    
    function update_bagpick_status($data, $order_ids,$status){
        
        if($status =="Collected"){
            
            $this->db->where('delivery_id in ('. $order_ids .')');
            $this->db->where('pickup_status ="Pending" ');
           $res= $this->db->update($this->bagpicks, $data);
           
        }else if($status =="Pending"){
            
            $this->db->where('delivery_id in ('. $order_ids .')');
            $this->db->where('pickup_status ="Collected" ');
           $res= $this->db->update($this->bagpicks, $data);
           
        }else{
            $res=1;
        }
        
        if($res){
            return $res;
        }else{
            // dd($this->db->last_query());
            return false;
        }
    }
    function update_bagpick_status_new($data, $order_id,$status){
        
        if($status =="Collected"){
            
            $this->db->where('delivery_id',$order_id);
            $this->db->where('pickup_status','Pending');
           $res= $this->db->update($this->bagpicks, $data);
           
        }else if($status =="Pending"){
            
            $this->db->where('delivery_id',$order_id);
            $this->db->where('pickup_status' ,'Collected');
           $res= $this->db->update($this->bagpicks, $data);
           
        }else{
            $res=1;
        }
        
        if($res){
            return $res;
        }else{
            // dd($this->db->last_query());
            return false;
        }
    }
    
    public function get_pickup_delivery_id_by_code($whr){
         $this->db->select('b.id,b.delivery_id,b.collected_bags,b.pickup_status as status');
         $this->db->from($this->bagpicks.' as b');
         $this->db->where($whr);
         $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        
        
        return $query->result();
    }
    
    public function get_pickupbag_deliverystatus_by_code($whr){
         $this->db->select('o.customer_id,o.delivery_address,o.delivery_time ,o.delivery_date, o.status,o.order_id as delivery_id,
         u.full_name as customer_name,
         v.full_name,
         d.full_name as driver
        ');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.customer_id');
        $this->db->join('users as v', ' v.id = o.vendor_id', 'left');
        $this->db->join('users as d', ' d.id = o.driver_id', 'left');
      
        $this->db->where($whr);
         $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        
        
        return $query->result();
        
        
    }
//  API END
    public function get_bagpic_qr_sta($id){
         $this->db->select('o.delivery_time as delivery_type,o.delivery_date, o.status,o.order_id as delivery_id,
         o.customer_id,o.name_on_delivery,o.number_on_delivery as phone, u.full_name, u.phone as customer_phone,
        
         o.vendor_id,v.full_name as vendor_name,
         o.bag_pickup_status,
         o.delivery_status_qr
       ');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.customer_id');
        $this->db->join('users as v', ' v.id = o.vendor_id', 'left');
        // $this->db->join('users as d', ' d.id = o.driver_id', 'left');
      
        $this->db->where('o.order_id',$id);
         $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        
        
        return $query->result();
        
        
    }
    
    
    
    function add_backpicks($data){
        $res=$this->db->insert($this->bagpicks, $data);
        
        if($res){
        return $this->db->insert_id(); //return last inserted id
        }else{
            // dd($this->db->last_query());
            return false;
        }
    }
    
    function add_update_backpicks($data,$ID){
          $this->db->trans_complete();
           $this->db->where('delivery_id',$ID);
        $res= $this->db->update($this->bagpicks, $data);
        
        if($res){
        return true;
        }else{
            
            return false;
        }
    }
    
    
    function update_bagpick_baginf($data, $where){
        return $this->db->update($this->bagpicks, $data, $where);
    }
    
    
    
    public function notify_to_driver_about_bagpickup($id,$check){
    
//   echo 'i am runing to notify about bag pickup';

            $res=$this->get_order_info_for_bagpickup_notify($id);
    
    // echo '<pre> GET_ORDER_BY_ID:'.$id;
    // print_r($res);
    
    if($check=='c'){
         $title='Pickup Bag Cancelled!';
        $msg='The delivery id('.$res[0]->delivery_id.') of '.strtoupper($res[0]->customer).' has been Cancelled at '.date("Y-m-d H:i:s");
            
          if($res[0]->d_device_token != ''){
             $data = array(
                        'user_id' => $res[0]->driver_id,
                        'device_token' => $res[0]->d_device_token,
                        'platform' => $res[0]->d_platform,
                        'status_code' => intval(670),
                        'title' =>  $title,
                        'for_whom' => 'Driver',
                        'badge' => $res[0]->d_badge_count,
                        'message' => $msg
                    );
                //   dd($data); 
                     //send notification
                  send_notification_to_user($data, 'save');
           }
        
        }else if($check=='r'){
             $title='Pickup Bag Revert Cancellation!';
        $msg='The delivery id('.$res[0]->delivery_id.') of '.strtoupper($res[0]->customer).' Cancellation has been Reverted at '.date("Y-m-d H:i:s");
    
          if($res[0]->d_device_token != ''){
             $data = array(
                        'user_id' => $res[0]->driver_id,
                        'device_token' => $res[0]->d_device_token,
                        'platform' => $res[0]->d_platform,
                        'status_code' => intval(677),
                        'title' =>  $title,
                        'for_whom' => 'Driver',
                        'badge' => $res[0]->d_badge_count,
                        'message' => $msg
                    );
                    
                     //send notification
                  send_notification_to_user($data, 'save');
           }
        }else{
            
        }
    
    
 }
      
    
    public function get_order_info_for_bagpickup_notify($order_id){
        
        // o.ice_bags sami bhae
        $this->db->select('o.cancellation_status as current_status, o.order_id as delivery_id, o.`status`, o.delivery_address, 
         c.full_name as customer,o.name_on_delivery,d.full_name as driver, v.full_name as vendor,v.email as vendor_email, 
         o.delivery_time as delivery_type,DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date,
         d.id as driver_id,d.device_token as d_device_token, d.platform as d_platform,d.badge_count as d_badge_count
           ');
        $this->db->from($this->table.' as o'); 
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('bagspickup as b', 'o.order_id= b.delivery_id ', 'left');
        $this->db->join('users as d', 'd.id = b.driver_id', 'left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        
        $this->db->where('o.order_id',$order_id);
        $query = $this->db->get();
        return $query->result();
    }     
    
    // END BAG PICKUP MODULE
    
    
    
    
    // bag pick new edits
    
     public function get_orders_basic_inf_bg_pickups($where, $is_cancelled = false){
        //  c.full_name as customer,  c.phone as c_phone, c.address,
        $this->db->select('o.status,o.order_id,o.name_on_delivery,o.number_on_delivery,o.name_on_delivery as customer,o.number_on_delivery as c_phone,o.pickUp, 
        o.customer_id, o.driver_id, o.vendor_id,o.delivery_address,
        DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.plan_id,
       
       
        d.full_name as driver, v.full_name as vendor, 
       
        d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type,  o.food_type,
        
        DATE_FORMAT(b.created_at,"%d-%m-%Y") as assigned_at,b.assigned_user as assigned_by,
        b.pickup_status,b.total_bags,b.collected_bags,b.bag_image,b.driver_cancel_request,b.driver_request_at,b.QR,b.qr_update_at,b.pickup_at,b.notes');
        
        $this->db->from($this->table.' as o');
        $this->db->join('bagspickup as b', 'o.order_id = b.delivery_id','left');
        $this->db->join('users as d', 'd.id = b.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
      
        
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        $query = $this->db->get();
        
        // return $this->db->last_query();
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
    
    
    public function get_orders_basic_inf_bg_pickups_detailed($where, $is_cancelled = false){
        //  c.full_name as customer,  c.phone as c_phone, c.address,
        $this->db->select('o.status,o.order_id,o.name_on_delivery,o.number_on_delivery,o.name_on_delivery as customer,o.number_on_delivery as c_phone,o.pickUp, 
        o.customer_id, o.driver_id, o.vendor_id,o.delivery_address,
        DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,
       o.plan_id,
       
        d.full_name as driver, v.full_name as vendor, 
       
        d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type,  o.food_type,
        
        DATE_FORMAT(b.created_at,"%d-%m-%Y") as assigned_at,b.assigned_user as assigned_by,
        b.pickup_status,b.total_bags,b.collected_bags,b.bag_image,b.driver_cancel_request,b.driver_request_at,b.QR,b.qr_update_at,b.pickup_at,
        b.notes
        ');
        
        $this->db->from($this->table.' as o');
        $this->db->join('bagspickup as b', 'o.order_id = b.delivery_id','left');
        $this->db->join('users as d', 'd.id = b.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
      
        
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        $query = $this->db->get();
        
        // return $this->db->last_query();
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
    
     public function update_order_bagpickup_data($ids)
    {
        $this->db->where_in('order_id', $ids);
        $this->db->update('orders', array('bag_pickup_status'=>'unassigned'));
    }
    
    public function delete_bagpicks($order_ids){
    $order_ids = implode(',', $order_ids);
       $this->db->where('delivery_id in ('. $order_ids .')');
       return $this->db->delete('bagspickup');
    }
    
    
    function get_partner_details_new_count_for_bagpicks($st_dt, $end_dt){
	  
	  
	   $this->db->select("o.delivery_time, o.vendor_id, v.email,v.phone,v.full_name,COUNT(b.delivery_id) AS 'total_bags',
        
          sum(case when (b.pickup_status = 'Pending' AND  (b.delivery_status != 'Cancel' OR b.delivery_status != 'Deleted')) then b.total_bags else 0 end) as total_pending_bags,

        
          sum(case when (b.pickup_status = 'Collected' AND  (b.delivery_status != 'Cancel' OR b.delivery_status != 'Deleted')) then b.collected_bags else 0 end) as total_collected_bags,
          
          sum(case when (b.pickup_status = 'Collected' AND b.collected_bags>1 AND (b.delivery_status != 'Cancel' OR b.delivery_status != 'Deleted')) then b.collected_bags-1 else 0 end) as total_additional_bags,

           
         sum(case when (b.pickup_status = 'Cancelled' AND  (b.delivery_status = 'Cancel' OR b.delivery_status = 'Deleted')) then b.total_bags else 0 end) as total_canceled_bags

          ");
      
        $this->db->from('orders as o');
        $this->db->join('users as v', 'o.vendor_id= v.id');
        $this->db->join('bagspickup as b', 'o.order_id= b.delivery_id');
      
        
        $this->db->group_by('o.vendor_id');
        $this->db->group_by('o.delivery_time');
        
        // o.delivery_date
        $where="o.action != 'Freezed' and o.action != 'Paused'  and  o.vendor_id != 0 AND b.created_at BETWEEN  '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
        $this->db->where($where);
       
        $query = $this->db->get();
        
        // print_r($this->db->last_query());
        // die();
    
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
        
        return $result;
	}
	

	public function get_unassigned_bagpicks_partnerwise_detail($where, $is_cancelled = false){
        //  c.full_name as customer,  c.phone as c_phone, c.address,
        $this->db->select('COUNT(o.order_id) AS total_deliveries,v.full_name as vendor,v.phone as v_phone,o.vendor_id');
        
        $this->db->from($this->table.' as o');
        
        $this->db->join('users as v', 'v.id = o.vendor_id');
      
         $this->db->group_by('o.vendor_id');
         
         $this->db->order_by('v.full_name','asc');
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        $query = $this->db->get();
        
        // return $this->db->last_query();
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
    
    public function fetch_bagid_by_partner_bgpickup($where2){
        return $this->db->select("o.order_id,o.vendor_id")->from("orders as o")->where($where2)->get()->result_array();
    }

    // end bagpick new edits
    
    
    public function get_info_for_email_api_bgpickup($id){
         $this->db->select('o.order_id as delivery_id,
         o.customer_id,o.name_on_delivery, u.full_name as customer,
         v.full_name as vendor,v.email
        ');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.customer_id');
        $this->db->join('users as v', ' v.id = o.vendor_id', 'left');
        
      
        $this->db->where('o.order_id',$id);
         $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
       return $query->result();
      }
      
      
     
        public function get_orders_pagination($where, $is_cancelled = false,$s =null, $l=null, $col = null, $dir = null){
        //  c.full_name as customer,  c.phone as c_phone,
        $this->db->select('o.order_id, o.name_on_delivery,o.number_on_delivery,o.name_on_delivery as customer,o.number_on_delivery as c_phone,o.pickUp,o.note,
        o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.partner_price,o.discount_track,
        DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,
        DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
       
       d.full_name as driver, v.full_name as vendor, c.address,
        d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, 
         o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.delivery_amount,o.company_note,
         o.google_link_addrs,o.plan_id,o.areaID,o.emirateID,o.slotID,
        o.suggested_driver_id,DAYOFWEEK(o.delivery_date) as day_was,DATE_FORMAT(o.last_assigned_date,"%d-%m-%Y") as date_was,
        sug.full_name as suggested_driver_name,sug.phone as suggested_driver_phone');
        
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
         $this->db->join('users as sug', 'o.suggested_driver_id=sug.id','left');
        
        $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
        $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
        //$this->db->limit(100);
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        
        if($col != null AND $dir != null)
        {
            $this->db->order_by($col, $dir);
        }
        
         $this->db->limit($l,$s);
        
        
        
        $query = $this->db->get();
        
        // return $this->db->last_query();
        $orders = $query->result_array();
         return $orders;
        // if ($orders){
        //     $result['result'] = true;
        //     $result['records'] = $orders;
        // }else{
        //     $result['result'] = false;
        // }
        
        // return $result;
    //   echo '<pre>';
    //   return $this->db->last_query();
    }
     public function get_total_results_new_pagii($where)
    {
       
        $this->db->select('COUNT(*) as count');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        
          $this->db->join('users as sug', 'o.suggested_driver_id=sug.id','left');
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $resp = $query->result_array();
        
       
        
        return $resp[0]['count'];
    }
    
    
    public function delivery_basic_info_warehouse_($whr){
         $this->db->select('o.suggested_driver_id,o.customer_id,o.delivery_address,o.delivery_time ,o.delivery_date, o.status,o.order_id as delivery_id,
         u.full_name as customer_name,
         v.full_name,
         d.full_name as driver,d.phone as dphone,
         sug.full_name as suggested_driver_name,sug.phone as suggested_driver_phone
        ');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.customer_id');
        $this->db->join('users as v', ' v.id = o.vendor_id', 'left');
        $this->db->join('users as d', ' d.id = o.driver_id', 'left');
         $this->db->join('users as sug', 'o.suggested_driver_id=sug.id','left');
      
        $this->db->where($whr);
         $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
        
        
        return $query->result_array();
        
        
    }
    public function get_info_for_email_api_bgpickup_new_customer($id){
         $this->db->select('b.id as id,
          b.customer_name as customer,
         v.full_name as vendor,v.email
        ');
        $this->db->from($this->bagpicks.' as b');
      
        $this->db->join('users as v', ' v.id = b.partner_id', 'left');
        
      
        $this->db->where('b.id',$id);
         $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
       return $query->result();
      }
      
      
      
        public function get_orders_where_late_deliv($where, $s =null, $l=null, $col = null, $dir = null)
       {
       
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.tot_ice_pack_received as ice_bags,o.bag_received as own_bag_receive_count,o.ice_bags as old_ice_bags,o.assigned_user,o.assigned_mode,o.cooling_bag_check,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor,v.email as v_email, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, c.send_notification, o.food_type,v.emails_for_report,o.delivered_to as Delivery_drop_type,
        o.addr_img,o.addr_loc_by_dri,o.mul_addr_id,o.empty_bag_attachment,o.empty_bag_code,o.open_bag_attachment,o.plan_id,o.company_note,SUBSTRING_INDEX(delivery_time, "-", -1)+0 as time_slot_cal,
        SUBSTRING(TIME_FORMAT(`delivered_date`, "%l:%i %p") FROM 1 FOR 2)+0 as delivered_time_cal,
        TIME_FORMAT(`delivered_date`, "%l:%i %p") as delivered_date_time,
                           SUBSTRING_INDEX(delivery_time, "-", -1) as time_slot__,o.delivery_time as tt
        
        ');//SPOON_PORTAL no impect on APIs
     
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
          $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        if($where){
            $this->db->where($where);
        }
        
        
        // if($col != null AND $dir != null)
        // {
        //     $this->db->order_by($col, $dir);
        // }
        
        //  $this->db->limit($l,$s);
       
        $query = $this->db->get();
        $resp = $query->result_array();
        // return $this->db->last_query();
        return $resp;
    }
       
          public function get_total_results_new_late_deliv($where)
    {
       
        $this->db->select('TIME_FORMAT(`delivered_date`, "%l:%i %p") as delivered_date_time,SUBSTRING_INDEX(delivery_time, "-", -1) as time_slot__');
        $this->db->from($this->table.' as o');
        
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        // dd($this->db->last_query());
        $res = $query->result_array();
        //  dd($res);
        $final_data=array();
		      //  dd($res);
        if(count($res) > 0){
            foreach($res as $key => $data){
                 $time_sl=str_replace(")","",$data['time_slot__']);
                 $time_slot_time= date("h:i A", strtotime($time_sl));
                 $delivery_time_driver= date("h:i A", strtotime($data['delivered_date_time']));
                 
                if($delivery_time_driver > $time_slot_time){
                    
                    array_push($final_data,$data);
                 }
            }
            
            return count($final_data);
        }else{
             return 0;
        }
        
        
    }
   
    
}




?>
