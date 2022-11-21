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

     var $table_typessss = "rolesrole_type";

    public function __construct(){
        parent::__construct();
    }


    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        return $query->row();
    }
public function get_qrBags(){
   // $date=
   $query = $this->db->query("select b.qrid,b.code,b.qrImage,b.createdAt,bs.status,x.full_name,x.phone,x.id,x.vendor_id
   from (select o.qr_bag_id,u.full_name,u.phone,u.id,o.vendor_id from orders as o inner join users as u on o.customer_id = u.id where o.is_neutral=0 and o.qr_bag_id!=0) x
   
   right join qr_bags as b on b.qrid = x.qr_bag_id
   inner join bags_status as bs on b.bsid = bs.bsid");
       // $this->db->select("b.qrid,b.code,b.qrImage,b.createdAt,bs.status,u.full_name,u.phone,u.id");
//      
//        $this->db->from('qr_bags as b');
//        $this->db->join('bags_status as bs', 'b.bsid = bs.bsid');
//        $this->db->join('orders as o', 'b.qrid = o.qr_bag_id','left');
//        $this->db->join('users as u', 'o.customer_id = u.id','left');
//        $this->db->where('o.is_neutral',0);
   
      
       
      //  $query = $this->db->get();
        $orders = $query->result();
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
        $this->db->select("e.*,u.full_name,u.phone");
      
        $this->db->from('extrabags as e');
        $this->db->join('users as u', 'u.id = e.driverId');
       
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
    public function get_orders($where){
        $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.bag_received,
        o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.ice_bags,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, c.send_notification');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
          $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
          //$this->db->limit(100);
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

    public function get_orders_where($where, $s, $l, $col = null, $dir = null)
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
        
        if($col != null AND $dir != null)
        {
            $this->db->order_by($col, $dir);
        }

        $this->db->limit($l, $s);
        $query = $this->db->get();
        $resp = $query->result_array();
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
     public function get_tracking_statistics($where){
        $this->db->select("sum(case when o.status = 'Delivered' then 1 else 0 end) as delivered, 
        sum(case when o.status = 'Collected' then 1 else 0 end) as collected,count(o.order_id) as total, c.full_name as customer,c.id,c.phone as customerPhone,
        c.address,v.full_name as vendor,v.phone as vendorPhone");
      
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
        return $result;
    }


    public function get_order_by_id($order_id){
        $this->db->select('o.pu_number, o.signature, o.signature_img, o.order_id as delivery_id, o.order_id, o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address, o.note,
        c.full_name, c.phone, c.address, c.full_name as customer,o.name_on_delivery,o.ice_bags,o.number_on_delivery, d.full_name as driver, v.full_name as vendor,v.email as vendor_email, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_img, o.bag_received,o.bag_received_qr as qrcodes, o.delivery_time as delivery_type,DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date');
        $this->db->from($this->table.' as o');
        $this->db->join('users as c', 'c.id = o.customer_id', 'left');
        $this->db->join('users as d', 'd.id = o.driver_id', 'left');
        $this->db->join('users as v', 'v.id = o.vendor_id', 'left');
      //  $this->db->join($this->table_type.' as t', 't.id = o.type_id');
        $this->db->where('o.order_id',$order_id);
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
        $this->db->where(array("code"=>$qrCode));
        return $this->db->update('qr_bags', $data);
    }
    function updateTrackBagQrD($order, $status){
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
        $order = $this->db->update('orders', $data2);
                                        
           $data = array("bsid"=>$status);
        $this->db->where(array("qrid"=>$bag_id));
       return $this->db->update('qr_bags', $data);
        
        } else {
            return FALSE;
        }
        
    }
    
     function updateCollectBagQr($qrCode, $status){
        $this->db->select('o.order_id')
                ->from('orders as o')
               ->join('qr_bags as qr','o.qr_bag_id=qr.qrid')
                ->where('qr.code',$qrCode)
                ->where('o.status',"Delivered")
                 ->where('o.is_neutral',0);
               
              
          $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();                    
            $order_id = $result[0]["order_id"];
            $data = array("status"=>$status);
        $this->db->where(array("order_id"=>$order_id));
        return $this->db->update('orders', $data);
        } else {
            return FALSE;
        }
        
    }
 
    /*API Methods*/
    function get_deliveries_summary_by_driver($driver_id, $from_date, $to_date){
        /*SELECT DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed
        FROM `orders` as `o`
        WHERE `o`.`delivery_date` BETWEEN '2018-04-24 00:00:00' and '2018-04-24 23:59:59'
        AND `o`.`driver_id` = '47'*/
        $this->db->select('DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as date, count(o.status) as assigned, sum(o.delivered_status) as completed');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
        $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
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
       
        $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
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
        $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
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
        $this->db->select("count(o.status) as total, o.bag_received, o.delivery_img, sum(o.delivered_status) as completed, 
         o.vendor_id, u.email, u.full_name, o.delivery_address as address,
         count(o.order_id) as assigned, 
        sum(case when qr.bsid = '3' then 1 else 0 end) as picked");
        $this->db->from($this->table.' as o');
        $this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid','left');
      //  $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
      $this->db->join('users as u', 'u.id = o.vendor_id', 'left');
        $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'");
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
        $this->db->where(array('o.driver_id'=>$driver_id,'qr.code'=>$qr));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        $result= $query->result_array();
        return $result;
        }else{
            return false;
        }
    }

    
    function get_vendor_deliveries($driver_id, $vendor_id, $date){
        /*select o.status, o.delivery_time, o.customer_id as id, u.full_name, u.phone, u.address from orders as o
        INNER JOIN users as u on u.id = o.customer_id
        where o.driver_id = 47 and o.vendor_id = 63*/
        $this->db->select('qs.status as qrstatus,o.pu_number, o.delivery_time as delivery_type, o.signature, o.signature_img, o.status, o.number_on_delivery as phone,
        o.bag_received, o.bag_received_qr, o.delivery_img, o.order_id as delivery_id, o.delivery_address as address,
         o.delivery_time,o.ice_bags, o.note, o.customer_id,o.name_on_delivery, u.full_name, u.phone as customer_phone, u.address as delivery_address,
          o.delivered_date');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.customer_id');
        $this->db->join('qr_bags as qb', 'o.qr_bag_id = qb.qrid','left');
        $this->db->join('bags_status as qs', 'qb.bsid = qs.bsid','left');
        $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.driver_id',$driver_id);
        $this->db->where('o.vendor_id',$vendor_id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_extra_bags($driver_id,$date){
        /*select o.status, o.delivery_time, o.customer_id as id, u.full_name, u.phone, u.address from orders as o
        INNER JOIN users as u on u.id = o.customer_id
        where o.driver_id = 47 and o.vendor_id = 63*/
        $this->db->select('e.*, u.full_name as driver, u.phone as driverPhone');
        $this->db->from('extrabags as e');
        $this->db->join('users as u', 'u.id = e.driverId', 'left');
        $this->db->where("e.ctime BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('e.driverId',$driver_id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_vendor_wise_deliveries($vendor_id, $date){
      //  sum(case when o.status = 'Delivered' then 1 else 0 end) as delivered,
        $this->db->select('qs.status as qrstatus,o.order_id as delivery_id,(case when o.qr_bag_id = 0 then 0 else 1 end) as is_attached,o.qr_bag_id,o.status,o.name_on_delivery as customer,o.number_on_delivery as cphone,o.delivery_address as address,
        o.delivery_date,o.delivery_time,o.delivered_date, o.note,o.delivery_time as delivery_type');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.vendor_id');
    $this->db->join('qr_bags as qb', 'o.qr_bag_id = qb.qrid','left');
        $this->db->join('bags_status as qs', 'qb.bsid = qs.bsid','left');
        $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
        $this->db->where('o.vendor_id',$vendor_id);
      
        $query = $this->db->get();
        return $query->result();
    }
     function get_driver_wise_deliveries($driver_id, $date){
        
        $this->db->select('bs.status as qrstatus,o.order_id as delivery_id,o.qr_bag_id,o.order_sequence,o.status,o.name_on_delivery as customer,o.number_on_delivery as cphone,o.delivery_address as address,
        o.delivery_date,o.delivery_time, o.note,o.delivery_time as delivery_type,u.full_name as vendor,bs.status as qrBag_status');
        $this->db->from($this->table.' as o');
        $this->db->join('users as u', 'u.id = o.vendor_id');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         $this->db->join('qr_bags as qr', 'qr.qrid = o.qr_bag_id','left');
        $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid','left');
        $this->db->where("o.delivery_date BETWEEN '".date('Y-m-d', strtotime($date))." 00:00:00' and '".date('Y-m-d', strtotime($date))." 23:59:59'");
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
        
     function get_specific_order_code($qrid){
        
        $this->db->select('o.order_id as delivery_id,o.qr_bag_id,o.status,o.name_on_delivery as customer,o.number_on_delivery as cphone,o.delivery_address as address,
        o.delivery_date,o.delivery_time, o.note,o.delivery_time as delivery_type,u.full_name as vendor,qr.code as qrCode,
        qr.qrImage,bs.status as qrBag_status');
        $this->db->from('orders as o');
         $this->db->join('users as u', 'u.id = o.vendor_id');
      
         $this->db->join('qr_bags as qr', 'qr.qrid = o.qr_bag_id');
         $this->db->join('bags_status as bs', 'bs.bsid = qr.bsid');
        $this->db->where('o.qr_bag_id',$qrid);
         $this->db->where('o.is_neutral',0);
        // $this->db->order_by('o.order_id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
                                   
            return $result[0];
        } else {
            return FALSE;
        }
        
    }
    function update_extar_bags($eid,$driver_id,$type,$quantity,$notes){
        $data = array("driverId"=>$driver_id,
                        "type"=>$type,
                        "quantity"=>$quantity,
                        "notes"=>$notes,
                        );
        $this->db->where(array("ebid"=>$eid));
        $order_update = $this->db->update('extrabags', $data);
        
        if($order_update){
        
        return $order_update;
        }else{
            return false;
        }
    }
     function add_extar_bags($date,$driver_id,$type,$quantity,$notes){
        $data = array("driverId"=>$driver_id,
                        "type"=>$type,
                        "quantity"=>$quantity,
                        "ctime"=>$date,
                        "notes"=>$notes,
                        );
       $this->db->insert('extrabags', $data);
        $insert_id = $this->db->insert_id(); //return last inserted id
        
        
        if($insert_id){
        
        return $insert_id;
        }else{
            return false;
        }
    }
function update_del_qr($qrid,$order_id){
        $data = array("qr_bag_id"=>$qrid);
        $this->db->where(array("order_id"=>$order_id));
        $order_update = $this->db->update('orders', $data);
        
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
     function update_bag_status3($code,$status){
        $data = array("bsid"=>$status);
        $this->db->where(array("code"=>$code));
        return $this->db->update('qr_bags', $data);
    }
    function update_bag_status4($delivery_id){
        $data = array("is_neutral"=>1);
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

    function get_customer_deliveries_by_date($customer_id, $start_date, $end_date){
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
        $this->db->where("o.created BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'");
        $this->db->where('o.customer_id',$customer_id);
        $query = $this->db->get();
        return $query->result();
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
        return $this->db->get('areas')->result();
    }
     public function get_deliveriess_type(){
        $this->db->select('*');
        $this->db->from($this->table_types);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_deliveriess_type_where($where){
        $query = $this->db->get_where($this->table_types, $where);
        return $query->result();
    }
  public function get_deliveries_type_where($where){
        $query = $this->db->get_where($this->table_type, $where);
        return $query->result();
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

    function del_area($id)
    {
        $this->db->where('area_id', $id);
        $this->db->delete('areas');
    }

    function del_rec($t, $where)
    {
        $this->db->where($where);
        $this->db->delete($t);
    }

    function getBags($ids)
    {

        return $this->db->query("SELECT bags.*, delivery_type.name AS 'd_type', users.phone, users.full_name, users.address FROM bags LEFT JOIN users ON users.id = bags.customer_id LEFT JOIN delivery_type ON bags.type_id = delivery_type.id WHERE bag_id IN (".implode(',', $ids).")")->result_array();
    }

    function getOrders($ids)
    {
        $this->db->where_in('order_id', $ids);
        return $this->db->get('orders')->result_array();
    }



}

?>
