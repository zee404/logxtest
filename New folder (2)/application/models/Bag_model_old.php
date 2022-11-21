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
        $this->db->insert('users', array('full_name'=>$customer['name'], 'address'=>$customer['address'],'phone'=>$customer['phone'], 'vendor_id'=>$vid, 'role_id'=>4, 'created_dt'=>date('Y-m-d H:i:s'), 'created_user'=>$this->session->userdata('email'), 'send_notification'=>$customer['notification']));
        return array(array('id'=>$this->db->insert_id()));
     }


    public function get_where($where){
//        $query = $this->db->get_where($this->table, $where);
//        return $query->result();
/*
        select b.*, c.full_name as customer, c.phone as c_phone, c.address, v.full_name as vendor from bags as b
INNER JOIN users as c
on c.id = b.customer_id
INNER JOIN users as v
on v.id = c.vendor_idfd
            */
        $this->db->select('b.*,dt.name as type, c.full_name as customer, c.phone as c_phone, c.address, v.full_name as vendor, d.full_name as driver, c.send_notification');
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id');
        $this->db->join('users as v', 'v.id = b.vendor_id');
        $this->db->join('delivery_type as dt', 'dt.id = b.type_id');
        $this->db->join('users as d', 'd.id = b.driver_id','left');
        if($where){
            $this->db->where($where);
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
        $this->db->select('b.bag_id, b.customer_id, c.full_name as customer, c.phone as c_phone, c.address, b.vendor_id, v.full_name as vendor, b.created_dt as created_date,
         b.assign_date, b.collected_date, b.status, b.received_bag_qty, b.bags_qty as requested_bag_qty,  b.proof_image, d.full_name as driver, c.address, b.pick_date');
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id','left');
        $this->db->join('users as d', 'd.id = b.driver_id', 'left');
        $this->db->join('users as v', ' v.id = c.vendor_id', 'left');
        $this->db->where('b.bag_id',$bag_id);
        $query = $this->db->get();
        return $query->result();
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


    public function delete($where){
        return $this->db->delete($this->table, $where);
    }


    function assign_drives($data, $bag_ids){
        $this->db->where('bag_id in ('. $bag_ids .')');
        return $this->db->update($this->table, $data);
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
        $this->db->select('dt.name as type, b.bag_id, b.customer_id, c.full_name as customer, c.phone as c_phone, c.address, b.vendor_id, v.full_name as vendor, b.created_dt, b.assign_date,  b.received_bag_qty, b.proof_image, b.collected_date, b.status, b.pick_date');
        $this->db->from($this->table.' as b');
        $this->db->join('users as c', 'c.id = b.customer_id', 'left');
        $this->db->join('users as v', ' v.id = b.vendor_id', 'left');
         $this->db->join('delivery_type as dt', ' dt.id = b.type_id', 'left');
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

}

?>
