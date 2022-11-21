<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 1:13 PM
 */

class Customer_model extends CI_Model{
    var $table = "users";
    var $table_issues = "issues";

    public function __construct(){
        parent::__construct();
         date_default_timezone_set("Asia/Dubai");
         // Set orderable column fields
         if ($this->session->userdata('role') == 'vendor') {
            $this->column_order = array(null,'u.full_name','u.phone','u.address');
            $this->column_search = array('u.full_name','u.phone','u.address');
         }else{
            $this->column_order = array(null,'u.full_name','u.phone','v.email','u.address');
            $this->column_search = array('u.full_name','u.phone','v.email','u.address');
         }
        $this->order = array('u.id' => 'asc');
    }

    public function api_login($where){
        $this->db->select('u.id, u.email, u.phone, u.full_name, u.address, u.code, u.status, r.name as role, u.profile_image_url');
        $this->db->from($this->table.' as u');
        $this->db->join('roles as r', 'r.id = u.role_id');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        return $query->row();
    }

    // public function get_where_OLD_freez_at_25_april($where){
    //     //$where['u.rold_id'] = 2;
    //     $query = $this->db->select('id, email, full_name, phone, address, code,Password_partner, vendor_id')->get_where($this->table, $where);
    //     return $query->result();
    // }
    // New Module TA 25-April-2021 Start
    public function get_where($where){
        //$where['u.rold_id'] = 2;
        $query = $this->db->select('id, email, full_name, phone, address, code,Password_partner, vendor_id,customer_id,mul_address,default_address,all_detail,send_notification,user_notes')->get_where($this->table, $where);
        return $query->result();
    }
    
    // New Module TA 25-April-2021 Ends
    
    
    
    
    
    
    
    
    
 public function getSpecificCustomer($vendor_id,$name,$phone,$address, $notification){

     //first check phone number
    $check_number =  $this->customer_model->get_where(array("phone"=>$phone,"vendor_id"=>$vendor_id,"role_id"=>4,"is_deleted"=>0));
    if(!empty($check_number) and count($check_number)>1){
       $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,"address"=>$address,"phone"=>$phone,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>0,
                                    "error_detail"=>"");                 
            return $returnResults;
        } else {
           $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"address"=>$address,"phone"=>$phone,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>1,
                                    "error_detail"=>"Name Does not Match, While other data is matched.");                 
            return $returnResults;
           }else{
          $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,"address"=>$address,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>2,
                                    "error_detail"=>"Phone Does not Match, While other data is matched.");                 
            return $returnResults;
        }else{
           $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,"phone"=>$phone,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>3,
                                    "error_detail"=>"Address Does not Match, While other data is matched.");                 
            return $returnResults;
        }else{
            $query =$this->db->query("select * from users where is_deleted=0  and role_id=4 and vendor_id='$vendor_id'
            and phone='$phone' and  ( full_name like '%".$name."%' or address like '%".$address."%' )");
            // $query = $this->db->get();
        if ($query->num_rows() > 0){
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>4,
                                    "error_detail"=>"Name or Address Does not Match, While other data is matched.");                 
            return $returnResults;
        }else {
             $is_child=0;
            $check_number =  $this->customer_model->get_where(array("phone"=>$phone,"vendor_id"=>$vendor_id));
            if(!empty($check_number)){
                $is_child=1;
            }
                       // add as new customer
           $code = mt_rand(100000, 999999);
              $customer_data = array(
                       
                        'full_name' =>  $name,
                        'phone' =>  $phone,
                        'vendor_id' =>  $vendor_id,
                        'role_id' =>  4,
                        'address' =>  $address,
                        'code' => $code,
                        'created_dt' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'is_child' => $is_child,
                        'created_terminal' => gethostname(),
                        'send_notification' => $notification
                       
                    );

                    //save order
                    $customer_id = $this->customer_model->add($customer_data);
                    $update_id = $this->customer_model->update(array("uniqueId"=>$customer_id.$vendor_id),array("id"=>$customer_id));
            $returnResults = array("customer_id"=>$customer_id,
            "full_name"=>$name,
            "phone"=>$phone,
            "address"=>$address,
                                    "error"=>0,
                                    "error_detail"=>"");                 
            return $returnResults;
           
           
           
        }
        }
        }
        }
        }
        }else{
             $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,"address"=>$address,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>0,
                                    "error_detail"=>"");                 
            return $returnResults;
        } else {
             $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                   "error"=>4,
                                    "error_detail"=>"Phone and Address does not matched.");                  
            return $returnResults;
        }else{
            $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"address"=>$address,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                   "error"=>4,
                                    "error_detail"=>"Phone and Name doesnot matched.");                  
            return $returnResults;
        }else{
                $is_child=0;
            $check_number =  $this->customer_model->get_where(array("phone"=>$phone,"vendor_id"=>$vendor_id));
            if(!empty($check_number)){
                $is_child=1;
            }
                       // add as new customer
           $code = mt_rand(100000, 999999);
              $customer_data = array(
                       
                        'full_name' =>  $name,
                        'phone' =>  $phone,
                        'vendor_id' =>  $vendor_id,
                        'role_id' =>  4,
                        'address' =>  $address,
                        'code' => $code,
                        'created_dt' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'is_child' => $is_child,
                        'created_terminal' => gethostname(),
                        'send_notification' => $notification,
                        'Password_partner' =>'logx_tracking'
                       
                    );

                    //save order
                    $customer_id = $this->customer_model->add($customer_data);
                    $update_id = $this->customer_model->update(array("uniqueId"=>$customer_id.$vendor_id),array("id"=>$customer_id));
            $returnResults = array("customer_id"=>$customer_id,
            "full_name"=>$name,
            "phone"=>$phone,
            "address"=>$address,
                                    "error"=>0,
                                    "error_detail"=>"");                 
            return $returnResults;
           
           
        }
            
        }  
            
        }
            
        }
    }
 
   
    public function getSpecificCustomer2($vendor_id,$name,$phone,$address){
    $check_number =  $this->customer_model->get_where(array("phone"=>$phone,"vendor_id"=>$vendor_id,"role_id"=>4,"is_deleted"=>0));
    if(!empty($check_number) and count($check_number)>1){
       $this->db->select('*')
                ->from('users')
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,"address"=>$address,"phone"=>$phone,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>0,
                                    "error_detail"=>"");                 
            return $returnResults;
        } else {
           $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"address"=>$address,"phone"=>$phone,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>1,
                                    "error_detail"=>"Name Does not Match, While other data is matched.");                 
            return $returnResults;
        } else {
          $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,"address"=>$address,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>2,
                                    "error_detail"=>"Phone Does not Match, While other data is matched.");                 
            return $returnResults;
        } else {
           $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,"phone"=>$phone,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>3,
                                    "error_detail"=>"Address Does not Match, While other data is matched.");                 
            return $returnResults;
        } else {
            $query =$this->db->query("select * from users where is_deleted=0  and role_id=4 and vendor_id='$vendor_id'
            and phone='$phone' and  ( full_name like '%".$name."%' or address like '%".$address."%' )");
            // $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>4,
                                    "error_detail"=>"Name or Address Does not Match, While other data is matched.");                 
            return $returnResults;
        } else {
            
                       // add as new customer
          
            
                  
            $returnResults = array("customer_id"=>0,
            "full_name"=>$name,
            "phone"=>$phone,
            "address"=>$address,
                                    "error"=>5,
                                    "error_detail"=>"hhhhWe cannot create new user to pick bags, Please check and verify data.");                 
            return $returnResults;
           
           
           
        }
        }
        }
        }
        }
        }else{
             $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,"address"=>$address,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                    "error"=>0,
                                    "error_detail"=>"");                 
            return $returnResults;
        } else {
             $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"full_name"=>$name,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                   "error"=>4,
                                    "error_detail"=>"Phone and Address does not matched.");                  
            return $returnResults;
        }else{
            $this->db->select('*')
                ->from('users')
               
                ->where(array("role_id"=>4,"vendor_id"=>$vendor_id,"address"=>$address,
                "is_deleted"=>0));
                
                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result= $query->result_array();
            $myresults = $result[0];
            $returnResults = array("customer_id"=>$myresults["id"],
            "full_name"=>$myresults["full_name"],
            "phone"=>$myresults["phone"],
            "address"=>$myresults["address"],
                                   "error"=>4,
                                    "error_detail"=>"Phone and Name doesnot matched.");                  
            return $returnResults;
        }else{
                
                  
            $returnResults = array("customer_id"=>0,
            "full_name"=>$name,
            "phone"=>$phone,
            "address"=>$address,
                                    "error"=>5,
                                    "error_detail"=>"We cannot create new user to pick bags, Please check and verify data.");                  
            return $returnResults;
           
           
        }
            
        }  
            
        }
            
        }
    }

 public function fashion_newss_blog($limit, $page)
    {
    $data =  $this->db->query("SELECT *from fashion_news where type ='fashion'  LIMIT ".$limit." OFFSET ".$page)->result_array();
    return $data;
   }


    // public function get_customers_OLD_freez_at_25_april($where = null){
    //     if ($this->session->userdata('role') == 'vendor') {
    //         $where_role = array('u.role_id'=>4);
    //         $where_role_ = array('u.vendor_id'=>$this->session->userdata('u_id'));
    //     }else{
    //         $where_role = array('u.role_id'=>4);
    //     }
    //     //for customer only
    //     $this->db->select('u.id, u.email, u.phone, u.full_name, u.address, u.code, u.send_invitation, v.email as vendor, v.full_name as v_name, u.status');
    //     $this->db->from($this->table.' as u');
    //     //$this->db->limit(30, 2*30); //2*100 $page = 2, $amount=100
    //     $this->db->join($this->table.' as v', 'v.id = u.vendor_id');
    //     $this->db->where($where_role);
    //     if(!empty($where_role_)){
    //         $this->db->where($where_role_);
    //     }
    //     if($where){
    //         $this->db->where($where);
    //     }

    //     $query = $this->db->get();
    //     $result = $query->result();
    //     if ($result){
    //          return $result;
    //     }else{
    //         return false;
    //     }
       
    // }
    
    // New Module TA 25-April-2021 Start
    public function get_customers($where = null){
        if ($this->session->userdata('role') == 'vendor') {
            $where_role = array('u.role_id'=>4);
            $where_role_ = array('u.vendor_id'=>$this->session->userdata('u_id'));
        }else{
            $where_role = array('u.role_id'=>4);
        }
        //for customer only
        $this->db->select('u.id, u.email, u.phone, u.full_name, u.address, u.code, u.send_invitation, v.email as vendor, v.full_name as v_name, u.status,u.customer_id,u.mul_address,u.default_address,u.all_detail,u.addr_img_usr,u.addr_loc_by_dri_usr,u.mul_addr_id_usr');
        $this->db->from($this->table.' as u');
        //$this->db->limit(30, 2*30); //2*100 $page = 2, $amount=100
        $this->db->join($this->table.' as v', 'v.id = u.vendor_id');
        $this->db->where($where_role);
        if(!empty($where_role_)){
            $this->db->where($where_role_);
        }
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $result = $query->result();
        if ($result){
             return $result;
        }else{
            return false;
        }
       
    }
    
    // New Module TA 25-April-2021 End
    
    
    //only no of customers
    public function count($where){
            
            if ($this->session->userdata('role') == 'vendor') {
                $where_role_ = array('vendor_id'=>$this->session->userdata('u_id'));
            }
            
            $this->db->where('role_id',4);
            if($where_role_){
                $this->db->where($where_role_);
            }
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

    function update_existing_notification($code, $where){
        $number = 1;
        $operator = '+';
        return $this->db->where($where)->set('send_invitation', 'send_invitation  '.$operator.' '.(int)$number, FALSE)->set('code',$code)->update($this->table);
    }

    //return active customers i.e those who's delivery is still need to delivered
    public function get_delivery_customer($where = null){
        $this->db->select('u.id, u.profile_image_url, u.full_name, u.status, u.address, o.order_id, u.email, u.phone, u.profile_image_url, u.role_id, DATE_FORMAT(o.delivery_date, "%d-%m-%Y") as delivery_date');
        $this->db->from($this->table.' as u');
        $this->db->join('orders as o', 'u.id = o.customer_id');
        $this->db->where('u.role_id',4);

        //delivery date condition
        if($where){
            $this->db->where($where);
        }

        //$this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }



    /*****************************************************************************************************/
    /*******************************************REPORT ISSUE**********************************************/
    /*****************************************************************************************************/
    function report_issue($data){
        $this->db->insert($this->table_issues, $data);
        return $this->db->insert_id(); //return last inserted id
    }



    //Function For datatable server side paginaiton
    public function get_all_customers($postData){
        $where = array('u.status'=> 0);
        $this->_get_datatables_query($postData);
        if ($this->session->userdata('role') == 'vendor') {
            $where_role = array('u.role_id'=>4,'u.vendor_id'=>$this->session->userdata('u_id'));
        }else{
            $where_role = array('u.role_id'=>4);
        }
        //for customer only
        
        $this->db->where($where_role);

        if($where){
            $this->db->where($where);
        }
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
       
        return $query->result();
    }
    
    /*
     * Count all records
     */
    public function countAll(){
        if ($this->session->userdata('role') == 'vendor') {
            $where_role_ = array('vendor_id'=>$this->session->userdata('u_id'));
        }
        $this->db->where('role_id',4);
        if(!empty($where_role_)){
            $this->db->where($where_role_);
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        if ($this->session->userdata('role') == 'vendor') {
            $where_role_ = array('u.vendor_id'=>$this->session->userdata('u_id'));
        }
        if(!empty($where_role_)){
            $this->db->where($where_role_);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }


    // private function _get_datatables_query_OLD_freez_at_25_april($postData){
    //     $this->db->select('u.id,u.full_name, u.phone,v.email,u.address,u.Password_partner');
    //     $this->db->from($this->table.' as u');
    //     $this->db->join($this->table.' as v', 'v.id = u.vendor_id'); 
    //     $i = 0;
    //     // loop searchable columns 
    //     foreach($this->column_search as $item){
    //         // if datatable send POST for search
    //         if($postData['search']['value']){
    //             // first loop
    //             if($i===0){
    //                 // open bracket
    //                 $this->db->group_start();
    //                 $this->db->like($item, $postData['search']['value']);
    //             }else{
    //                 $this->db->or_like($item, $postData['search']['value']);
    //             }
                
    //             // last loop
    //             if(count($this->column_search) - 1 == $i){
    //                 // close bracket
    //                 $this->db->group_end();
    //             }
    //         }
    //         $i++;
    //     }
         
    //     if(isset($postData['order'])){
    //         $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
    //     }else if(isset($this->order)){
    //         $order = $this->order;
    //         $this->db->order_by(key($order), $order[key($order)]);
    //     }
    // }
    
   
   // New Module TA 25-April-2021 Start 
    private function _get_datatables_query($postData){
        $this->db->select('u.id,u.full_name, u.phone,v.email,u.address,u.Password_partner,u.email as c_email,u.customer_id,u.mul_address,u.default_address,u.all_detail,u.addr_img_usr,u.addr_loc_by_dri_usr,u.mul_addr_id_usr,u.mealplan_check');
        $this->db->from($this->table.' as u');
        $this->db->join($this->table.' as v', 'v.id = u.vendor_id'); 
        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
   // New Module TA 25-April-2021 END 
    
    // Order Report issue
    
    
     function order_report_feedback($data,$tb){
         
        $this->db->insert($tb, $data);
        return $this->db->insert_id(); //return last inserted id
    }
    
    function get_roll_id_by_userID($customer_id){
        
        $this->db->select('u.role_id');
        $this->db->from('users as u');
         
        //  $this->db->join('roles as r', 'r.id = u.role_id');
        
        $this->db->where('u.id',$customer_id);
       
        $res = $this->db->get()->result();
        return $res[0]->role_id;
        
    }
    
    
     public function get_where_latest($where){
        //$where['u.rold_id'] = 2;
        $query = $this->db->select('id, email, full_name, phone, address, code,Password_partner, vendor_id,customer_id,mul_address,default_address,all_detail,send_notification,user_notes')->from($this->table)->where($where)->order_by('created_dt','desc')->get();
        return $query->result();
    }


}

?>
