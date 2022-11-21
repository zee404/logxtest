<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 02/05/2018
 * Time: 2:13 PM
 */

class Bag_model extends CI_Model{

    var $table = "bags";
    /*Bag Status
    =Requested
    =Assign
    =Picked
    */

    public function __construct(){
        parent::__construct();
         date_default_timezone_set("Asia/Dubai");
    }


    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        return $query->row();
    }
   public function get_customer_id($customer, $vid='')
     {
        //$this->db->where(array('role_id'=>4, 'phone'=>$customer['phone']));
        $this->db->where("role_id = 4 AND (phone = '".$customer['phone']."' OR address='".$customer['address']."')");
        $ret = $this->db->get('users')->result_array();
        if(!empty($ret))
            return $ret;
        //else if customer does not exist
        $this->db->insert('users', array('full_name'=>$customer['full_name'], 'address'=>$customer['address'],'phone'=>$customer['phone'], 'vendor_id'=>$vid, 'role_id'=>4, 'created_dt'=>date('Y-m-d H:i:s'), 'created_user'=>$this->session->userdata('email'), 'send_notification'=>$customer['send_notification'],'Password_partner' =>'logx_tracking'));
        return array(array('id'=>$this->db->insert_id()));
     }

     public function get_customer_id1($customer, $vid = '')
     {

        $cst = array('full_name'=>$customer['name'], 'address'=>$customer['address'],'phone'=>$customer['phone'], 'vendor_id'=>$vid, 'role_id'=>4, 'created_dt'=>date('Y-m-d H:i:s'), 'created_user'=>$this->session->userdata('email'), 'send_notification'=>$customer['notification'],'Password_partner' =>'logx_tracking');
        //firs find exact customer
        $c = $this->db->query("SELECT * FROM `users` WHERE phone = ? AND address = ?", array($customer['phone'], $customer['address']))->result_array();
        if(count($c) > 0)
        {
            return array('status'=>'exact match', 'customer'=>$c[0]);
        }
        //else not found. now try for single attribute matching
        else
        {
            $c = $this->db->query("SELECT * FROM `users` WHERE phone = ? OR address = ?", array($customer['phone'], $customer['address']))->result_array();
            if(count($c) > 0)
                return array('status'=>'partial match', 'customer'=>$c[0]);
            else
            {
                $this->db->insert('users', $cst);
                $cst['id'] = $this->db->insert_id();
                return array('status'=>'new customer', 'customer'=>$cst);
            }
        }
     }


    public function get_where($where, $is_cancelled = false){
//        $query = $this->db->get_where($this->table, $where);
//        return $query->result();
/*
        select b.*, c.full_name as customer, c.phone as c_phone, c.address, v.full_name as vendor from bags as b
INNER JOIN users as c
on c.id = b.customer_id
INNER JOIN users as v
on v.id = c.vendor_idfd
            */
        $this->db->select('b.*,b.type_id as type, c.full_name as customer, c.phone as c_phone, b.bag_address as address, v.full_name as vendor, v.phone as v_phone,v.email as v_email, d.full_name as driver,d.phone as d_phone, b.bag_notification as send_notification,serv.name as service,emi.emirate_name as emirate,v.emails_for_report');
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id', 'left');
        $this->db->join('users as v', 'v.id = b.vendor_id', 'left');
       // $this->db->join('delivery_type as dt', 'dt.id = b.type_id', 'left');
        $this->db->join('users as d', 'd.id = b.driver_id','left');
         $this->db->join('tbl_service_type as serv','b.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','b.emirateID = emi.id','left');
        if($where){
            $this->db->where($where);
        }
        if($is_cancelled) {
            $this->db->where(['is_cancelled' => 'yes']);
        } else {
            $this->db->where(['is_cancelled' => 'no']);
        }
        $query = $this->db->get();
        $bags = $query->result();
        if ($bags){
            $result['result'] = true;
            $result['records'] = $bags;
        }else{
            $result['result'] = false;
        }
        return $result;
    }


    public function get_bags($where){
        $this->db->select('b.*, DATE_FORMAT(b.created_dt,"%d-%m-%Y") as created_date, collected_date
        c.full_name as customer, d.full_name as driver, c.address,
        c.phone as c_phone, d.phone as d_phone');
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id','left');
        $this->db->join('users as d', 'd.id = b.driver_id');
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


    public function get_bag_by_id($bag_id){
        $this->db->select('b.type_id as type,b.bag_notification,v.bag_message,b.bag_id, b.customer_id,b.driver_id, c.full_name as customer, c.phone as c_phone, b.bag_address as address, b.vendor_id, v.full_name as vendor,v.email as vendor_email , v.phone as v_phone, b.created_dt as created_date,
         b.assign_date, b.collected_date, b.status, b.received_bag_qty, b.bags_qty as requested_bag_qty,  b.proof_image, d.device_token as d_device_token, d.platform as d_platform,d.badge_count as d_badge_count, c.badge_count as c_badge_count ,c.platform as c_platform, d.full_name as driver,d.phone as d_phone,c.address c_address ,c.device_token as c_device_token, b.pick_date,b.partner_price,serv.name as service,emi.emirate_name as emirate,b.type_id 
         ,b.canceled_reason,b.canceled_img,b.canceled_mode,b.bag_picked_at');//SPOON
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id','left');
        $this->db->join('users as d', 'd.id = b.driver_id', 'left');
        $this->db->join('users as v', 'v.id = b.vendor_id', 'left');
        $this->db->join('tbl_service_type as serv','b.service_type_id = serv.id','left');
         $this->db->join('tbl_emirates as emi','b.emirateID = emi.id','left');
        $this->db->where('b.bag_id',$bag_id);
        $query = $this->db->get();
         return $query->result();
        // return $this->db->last_query();
        
        
        
    }
    
     public function get_trackbag_by_id($track_id){
        $this->db->select(' b.`status`, b.bag_address,c.full_name as customer, c.phone as c_phone,v.full_name as vendor,v.email as vendor_email,v.phone as v_phone,b.pick_date as pickup_date');
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id', 'left');
        $this->db->join('users as v', 'v.id = b.vendor_id', 'left');
        
         $this->db->where_in('b.bag_id', $track_id);
        // return $this->db->get('orders')->result_array();
        // $this->db->where('o.order_id',$order_id);
        $query = $this->db->get();
        return $query->result();
        // return $this->db->last_query();
    }

    public function get_bags_by_customer_date($customer_id, $date){
        $this->db->select('sum(bags_qty) as bags_qty');
        $this->db->from($this->table);

        if($customer_id){
            $this->db->where('customer_id',$customer_id);
        }

        if($date){
            $this->db->where("created_dt BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        }

        $query = $this->db->get();
        return $query->result();
    }

    //return only today bags picked sum
    public function count_bags_collection($where){
//        $this->db->select('COALESCE(sum(bags_qty), 0) as bags');
//        $this->db->from($this->table);
//        //$this->db->where("status = 'Picked' and collected_date BETWEEN '".date('Y-m-d')." 00:00:00' and '".date('Y-m-d')." 23:59:59'");
//        if($where){
//            $this->db->where($where);
//            //$this->db->where('vendor_id',$vendor_id);
//        }
//        $query = $this->db->get();
//        return $query->result();

        if($where){
            //$this->db->where('vendor_id',$vendor_id);
            $this->db->where($where);
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); //return last inserted id
    }


    function update($data, $where){
        return $this->db->update($this->table, $data, $where);
    }
    
    function update_in($data, $bagIds){
        $this->db->where_in('bag_id',$bagIds);
        return $this->db->update($this->table, $data);
    }


    public function delete($where){
        return $this->db->delete($this->table, $where);
    }


    function assign_drives($data, $bag_ids){
        $this->db->where('bag_id in ('. $bag_ids .')');
        return $this->db->update($this->table, $data);
    }
    function auto_assign_drives($data,$ID){
        $this->db->where('bag_id',$ID);
        $ans= $this->db->update($this->table, $data);
        //print_r($this->db->last_query());
        return $ans;
    }
    
    function get_related_deliveries($order_ids){
        $this->db->select('bags.*');
        $this->db->from('bags');
        $this->db->where('bag_id in ('. $order_ids .')');
        
        $res=$this->db->get()->result();
        return $res;
        
    }
    
      function get_related_drivers(){
        
        $dts=date("Y-m-d")." 00:00:00";
        $dte=date("Y-m-d")." 23:59:59";
    $this->db->select('SUM(CASE WHEN b.driver_id!=0 AND b.is_cancelled="no" AND b.assign_date BETWEEN "'.$dts.'" AND "'.$dte.'" THEN 1 ELSE 0 END) AS "DRIVERS_TODAY_DELIVERIRS",driver_shift.*');
    
         $this->db->from('bags as b');
         $this->db->join('driver_shift_schedules as driver_shift','driver_shift.user_id =b.driver_id','right');
         $this->db->group_by("driver_shift.id");
       $ans=$this->db->get()->result();
     // print_r($this->db->last_query());
     // die();
       return $ans;
        
    }
    function delete_bags($bag_ids)
    {
       $this->db->where('bag_id in ('. $bag_ids .')');
       return $this->db->delete($this->table);
    }

    /*API METHODS*/
    function get_bags_collection_segments_by_date($driver_id, $from_date, $to_date){
        /*   select b.bag_id, b.customer_id, c.full_name as customer, c.phone as c_phone, c.address, b.vendor_id, v.full_name as vendor, b.created_dt, b.assign_date, b.collected_date, b.status
        from bags as b
INNER JOIN users as c
on c.id = b.customer_id
INNER JOIN users as v
on v.id = c.vendor_id
where b.driver_id = 47 and b.created_dt BETWEEN '2018-05-31 00:00:00' and '2018-05-31 23:59:59' */
// SPOON
        $this->db->select('b.bag_picked_at,b.bags_qty,b.type_id as type, b.bag_id, b.customer_id, c.full_name as customer, c.phone as c_phone, b.bag_address as address ,b.bag_notification,v.bag_message, b.vendor_id, v.full_name as vendor, b.created_dt, b.assign_date,  b.received_bag_qty, b.proof_image, b.collected_date, b.status, b.pick_date,b.empty_bag_code');
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id', 'left');
        $this->db->join('users as v', ' v.id = b.vendor_id', 'left');
         //$this->db->join('delivery_type as dt', ' dt.id = b.type_id', 'left');
         $this->db->where("b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
        $this->db->where('b.driver_id',$driver_id);
        //$this->db->group_by('o.vendor_id');
        $query = $this->db->get();
        return $query->result();
    }


    function get_bags_collection_summary_by_date($driver_id, $from_date, $to_date){
        /*   select b.status,
   count(case when b.status = 'Assign' then 1 else 0 end) as assign,  -- only count status 1
   count(case when b.status = 'Picked' then 1 else 0 end) as completed-- only count status 0
--    count(*) as totals
from bags as b
where b.driver_id = 47 and b.created_dt BETWEEN '2018-05-02 00:00:00' and '2018-05-31 23:59:59'
group by b.status; */
      //  $this->db->select("sum(case when b.status = 'Assign' then 1 else 0 end) as assigned,
        //    sum(case when b.status = 'Picked' then 1 else 0 end) as completed");
        $this->db->select("count(*) as assigned, sum(case when b.status = 'Picked' then 1 else 0 end) as completed");
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id', 'left');
        $this->db->join('users as v', 'v.id = c.vendor_id', 'left');
        $this->db->where("b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
        $this->db->where('b.driver_id',$driver_id);
       // $this->db->group_by('b.status');
        $query = $this->db->get();
        return $query->result();
    }


    //this is used for vendor dashboard pie chart
    function get_bag_collection_request_report_by_vendor($where){
        /*select count(*) as bag_requests, `status` from orders
where vendor_id = 63 and created_dt between '2018-05-01 00:00:00' and '2018-06-01 23:59:59'
GROUP BY `status`
        */
        $this->db->select('count(*) as bag_requests, status');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->group_by('status');
        $query = $this->db->get();
        return $query->result();
    }


    /**************************************************************/
    /************************RESULT SET FOR CSV***********************/
    /**************************************************************/
    public function get_where_CSV($where){
            $this->db->select('c.full_name as Customer, c.phone as "Customer Phone", c.address as "Customer Address", b.received_bag_qty as "Received Bags", b.status, b.pick_date as "Pick Date", b.collected_date as "Collected Date", v.full_name as Vendor, d.full_name as Driver');
            $this->db->from($this->table.' as b');
            $this->db->join('users as c', 'c.id = b.customer_id');
            $this->db->join('users as v', 'v.id = c.vendor_id');
            $this->db->join('users as d', 'd.id = b.driver_id','left');
            if($where){
                $this->db->where($where);
            }
        return $this->db->get();
    }

    function save_customer($cst)
    {
        //check if already exist, get id
        $this->db->where("role_id = 4 AND (phone = '".$cst['phone']."' OR address = '".$cst['address']."')");
        $ress = $this->db->get('users')->result_array();
        if(count($ress) > 0)
        {
            return $ress[0]['id'];
        }
        else
        {
        //end check of existence
        $cst['created_dt'] = date('Y-m-d H:i:s');
        $cst['created_user'] = $this->session->userdata('email');
        $cst['role_id'] = 4;
        $this->db->insert('users', $cst);
        return $this->db->insert_id();
        }
    }

    function save_bag_data($bag)
    {
        $res = $this->db->insert($this->table, $bag);
        return $res;
    }
    
  // Taha minor changes according to live code  
//     public function get_partner_price_old_demo($vendor_id,$delivery_date,$emirateID,$area_str,$service_typ,$string_emirate){
    
//     $this->db->select('d.user_id as PartnerID,d.price,d.same_loc_price,d.service_type');
//     $this->db->from('tbl_bag_quotations as d');
    
//     $this->db->where('d.user_id',$vendor_id);
//     $this->db->where('d.emirate',$emirateID);
//     $this->db->where('d.service_type',$service_typ);
       
    
//     $ans=$this->db->get()->result();
//     //print_r($this->db->last_query());
    
//       $same_loc = $this->search_same_loc($vendor_id,$delivery_date,$area_str,$string_emirate);
//       if(count($same_loc) > 0){
//         //   echo 'yes';
//           $ans[0]->ans ='yes';
//           foreach($same_loc as $key => $val){
             
//             if($key == 0)
//             $ans[1]->ids=$val->bag_id;
//             else
//             $ans[1]->ids=$ans[1]->ids.','.$val->bag_id;
            
            
//           }
//       }else{
//         //   echo 'no';
//           $ans[0]->ans ='no';
//       }
//     return $ans;
//     // die();
    
// }

//     public function search_same_loc_old_demo($vendor_id,$delivery_date,$area_str,$string_emirate){
//       $dts = date('Y-m-d', strtotime($delivery_date));
//       $dts=$dts.' 00:00:00';
//       $dte=date('Y-m-d', strtotime($delivery_date));
//       $dte=$dte.' 23:59:59';
       
       
//       //$this->db->select('o.order_id,o.vendor_id,o.pick_date,o.delivery_address');
//       $this->db->select('b.bag_id');
//       $this->db->from('bags as b');
//       $this->db->where('b.vendor_id', $vendor_id );
//       $this->db->where('b.pick_date BETWEEN "'.$dts.'" AND "'.$dte.'" ');
//       $this->db->where('b.bag_address', $area_str );
//       $this->db->where('b.type_id', $string_emirate );
//       $this->db->where('b.discount_track', '' );
//       $ans=$this->db->get()->result();
//       echo '<pre>';
//       print_r($this->db->last_query());
      
//       echo '<pre>';
//       print_r($ans);
//       return $ans;
// }


    public function get_partner_price($vendor_id,$delivery_date,$emirateID,$area_str,$service_typ,$string_emirate){
    // *************************** RETURNS A LIST ,FIRST INDEX CONTAINS BAG QUTATION OBJECT AND THE SECOND CONTAINS IDS OFF ALL BAGS WITHSAME LOCATION
    $this->db->select('d.user_id as PartnerID,d.price,d.same_loc_price,d.service_type');
    $this->db->from('tbl_bag_quotations as d');
    
    $this->db->where('d.user_id',$vendor_id);
    $this->db->where('d.emirate',$emirateID);
    $this->db->where('d.service_type',$service_typ);
       
    
    $ans=$this->db->get()->result();
    
    //   echo $vendor_id.',';
    //   echo $delivery_date.',';
    //   echo $area_str.',';
    //   echo $string_emirate.',';
       
    //   return 1;
      $same_loc = $this->search_same_loc($vendor_id,$delivery_date,$area_str,$string_emirate);
    //   return $this->db->last_query();
      if(count($same_loc) > 0){
        //   echo 'yes';
          $ans[0]->ans ='yes';
          foreach($same_loc as $key => $val){
             
            if($key == 0)
            $ans[1]->ids=$val->bag_id;
            else
            $ans[1]->ids=$ans[1]->ids.','.$val->bag_id;
            
            
          }
      }else{
        //   echo 'no';
          $ans[0]->ans ='no';
      }
    return $ans;
    // die();
    
}

    public function search_same_loc($vendor_id,$delivery_date,$area_str,$string_emirate){
        // ****************************** THIS FUNCTION RETURNS ALL THE BAGS FROM BAG TABLE THAT ARE FOR SAME ADDRESS AND PICK DATE AS NEW BAG THAT IS BEIGHG UPLOADED
       $dts = date('Y-m-d', strtotime($delivery_date));
       $dts=$dts.' 00:00:00';
       $dte=date('Y-m-d', strtotime($delivery_date));
       $dte=$dte.' 23:59:59';
       
       
      //$this->db->select('o.order_id,o.vendor_id,o.pick_date,o.delivery_address');
      $this->db->select('b.bag_id');
      $this->db->from('bags as b');
      $this->db->where('b.vendor_id', $vendor_id );
      $this->db->where('b.pick_date BETWEEN "'.$dts.'" AND "'.$dte.'" ');
      $this->db->where('b.bag_address', $area_str );
      $this->db->where('b.type_id', $string_emirate );
      $this->db->where('b.discount_track', '' );
      
     
      $ans=$this->db->get()->result();
    //   echo '<pre>';
    //   print_r($this->db->last_query());
      
    //   echo '<pre>';
    //   print_r($ans);
      return $ans;
}

    public function notify_to($id,$check){
    
  

    $res=$this->get_bag_by_id($id);
    
     if($check == 'revert'){
        
        $title='Bag Exist!';
        $msg='This Bag is again being in process kindly collect it.';
 
    }else{
         $title='Bag Cancelled!';
        $msg='This Bag is Cancelled now.';
    }
    
    if($res[0]->d_device_token != '' && $res[0]->status == 'Assign'){
    $data = array(
                        'user_id' => $res[0]->driver_id,
                        'device_token' => $res[0]->d_device_token,
                        'platform' => $res[0]->d_platform,
                        'status_code' => intval(600),
                        'title' => $title,
                        'for_whom' => 'Driver',
                        'badge' => $res[0]->d_badge_count,
                        'message' => $msg
                    );
                    
                     //send notification
                   send_notification_to_user($data, '');
                    
                    
    }else{
        echo 'errorrrrrrrrrr <br>';
        echo '<pre>';
        print_r($res[0]->status);
        // echo res['d_device_token'];
        // echo res['status'];
        
    }
    // echo '<pre>';
    // print_r($res);
    // echo 'hello';
    // die();
    
      }
      
      

      
    public function get_old_status($orderID,$check){
    
            if($check == 'revert'){
                $this->db->select('cancellation_status');
                $this->db->from('bags');
                $res=$this->db->where('bag_id',$orderID)->get()->result();
            
                    echo 'result is :'.$res[0]->cancellation_status;
                    return $res[0]->cancellation_status;
            }else{
                $this->db->select('status');
                $this->db->from('bags');
                $res=$this->db->where('bag_id',$orderID)->get()->result();
            
            echo 'result is :'.$res[0]->status;
            return $res[0]->status;
            }
    
    }
    
     public function get_user_by_id($id){
          
          $this->db->select('c.full_name as customer,u.full_name as vendor,u.email as vendor_email,o.bag_address as address,o.pick_date as dt,o.canceled_at as ca,o.canceled_by as cb,o.canceled_mode as cm,o.canceled_reason as cr,o.cancellation_price as cp,o.cancellation_status as cs,o.bags_qty as qty');
          $this->db->from('bags as o');
          
          $this->db->join('users as u','u.id = o.vendor_id');
          $this->db->join('users as c','c.id = o.customer_id');
          $this->db->where('o.bag_id',$id);
          
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
		    $msg='<h4><p style="text-transform: uppercase;">DEAR ' . $email_data[0]->vendor .',</p> </h4>It is to inform you that cancellation of " '.$email_data[0]->qty.'" bags(s) from " '.$email_data[0]->customer.'" at "'.$email_data[0]->address.'" on "'.$email_data[0]->dt.'" is reverted by admin .Its a system generated reminder for you to do the needful. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
$subject='Bag Cancellation Reverted';
		}else{
		
		if($email_data[0]->cs =='Requested'){
		    $status='not assigned';
		    
		}else if($email_data[0]->cs =='Assign'){
		    $status='assigned';
		}
		$msg='<h4><p style="text-transform: uppercase;">DEAR ' . $email_data[0]->vendor .',</p> </h4>It is to inform you that " '.$email_data[0]->qty.'" bag(s) from " '.$email_data[0]->customer.'" at "'.$email_data[0]->address.'" on "'.$email_data[0]->dt.'" is cancelled by "'.$email_data[0]->cb.'" at "'.$email_data[0]->ca.'" due to "'.$email_data[0]->cr.'" with cancellation fee "'.$email_data[0]->cp.'" when bag status was "'.$status.'" .Its a system generated reminder for you to do the needful. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
$subject='Bag Cancelled';

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


    public function get_last_qrcode(){
         $user_id = $this->session->userdata('u_id');
        $query = $this->db->query("SELECT * FROM qr_bags where vendor_id=$user_id ORDER BY code DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    }

}

?>
