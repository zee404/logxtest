<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{

    // public function __construct(){
    //     parent::__construct();
    //      date_default_timezone_set("Asia/Dubai");
    //     $this->output->enable_profiler(false);  //this show value at your page
    // }
     public function __construct()
    {
          parent::__construct();
           date_default_timezone_set('Asia/Dubai');
            if (empty($this->session->userdata('name')) )
        redirect(base_url('auth/index')) or exit('no direct access allowed');
    }


    public function active(){
        $where = array('u.status'=> 0);
        $data['customers'] =  $this->customer_model->get_customers($where);
        $data['vendors'] =  $this->vendor_model->get_where(array());
        $this->load->view('customer/active', $data);
    }


    public function invited(){
        $where = array('u.status' => 0, 'u.send_invitation !=' => 0);
        $data['customers'] =  $this->customer_model->get_customers($where);
        $this->load->view('customer/invited', $data);
    }


    public function uploaded(){
        $where = array('u.status'=>0, 'u.send_invitation'=>0);
        $data['customers'] =  $this->customer_model->get_customers($where);
        $data['vendors'] =  $this->vendor_model->get_where(array());
        $this->load->view('upload_customers_by_pura_file', $data);
    }
 public function createCustomer(){
        
        //check duplicate customer phone
       $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$this->input->post('phone')))));
        $full_name = $this->input->post("full_name");
        $address = $this->input->post("address");
        $vendor_id = $this->uri->segment(3);
       
         $is_child=0;
            $check_number =  $this->customer_model->get_where(array("phone"=>$phone,"vendor_id"=>$vendor_id));
            if(!empty($check_number)){
                $is_child=1;
            }
                       // add as new customer
           $code = mt_rand(100000, 999999);
              $customer_data = array(
                       
                        'full_name' =>  $full_name,
                        'phone' =>  $phone,
                        'vendor_id' =>  $vendor_id,
                        'role_id' =>  4,
                        'address' =>  $address,
                        'code' => $code,
                        'created_dt' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'is_child' => $is_child,
                        'created_terminal' => gethostname(),
                        'Password_partner' =>'logx_tracking'
                       
                    );

                    //save order
                    $customer_id = $this->customer_model->add($customer_data);
                    $update_id = $this->customer_model->update(array("uniqueId"=>$customer_id.$vendor_id),array("id"=>$customer_id));
        
        $data['file_data'] =  $this->session->userdata("file_data");
            $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
           $where = array('status' => 1);
            $data['types'] =  $this->order_model->get_deliveries_type_where($where);
            $data["vendor_id"] = $this->session->userdata("vendor_id");
            
            $this->load->view('order/temp_order', $data);

    }
 public function updateInfo(){
       
        //check duplicate customer phone
       $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$this->input->post('phone')))));
        $full_name = $this->input->post("full_name");
        $address = $this->input->post("address");
        $customer_id = $this->uri->segment(3);
       
          
              $customer_data = array(
                       
                        'full_name' =>  $full_name,
                        'phone' =>  $phone,
                      
                        'address' =>  $address
                       
                    );

                    //save order
                    $customer_id = $this->customer_model->update($customer_data,array("id"=>$customer_id));
                   
        
        $data['file_data'] =  $this->session->userdata("file_data");
            $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
          
           
            $data["vendor_id"] = $this->session->userdata("vendor_id");
             $where = array('status' => 1);
             $data['types'] =  $this->order_model->get_deliveries_type_where($where);
            $this->load->view('order/temp_order', $data);

    }
     public function updateInfo2(){
        
        //check duplicate customer phone
        
       $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$this->input->post('phone')))));
        $full_name = $this->input->post("full_name");
        $address = $this->input->post("address");
        $customer_id = $this->uri->segment(3);
       
          
              $customer_data = array(
                       
                        'full_name' =>  $full_name,
                        'phone' =>  $phone,
                      
                        'address' =>  $address
                       
                    );

                    //save order
                    $customer_id = $this->customer_model->update($customer_data,array("id"=>$customer_id));
                   
        
        $data['file_data'] =  $this->session->userdata("file_data");
            $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
          
           
            $data["vendor_id"] = $this->session->userdata("vendor_id");
             $where = array('status' => 1);
             $data['types'] =  $this->order_model->get_deliveries_type_where($where);
            $this->load->view('bag/temp_bag_collection', $data);

    }
    // public function save_customer(){
    //     $response = array('success' => false);

    
    //     $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$_POST['phone']))));
    //     $where = array('phone' => $phone);
    //     $customer = $this->customer_model->get_where($where);

    //     if(!$customer) {
    //         $code = mt_rand(100000, 999999);
    //         $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$_POST['phone']))));
    //         $fields = array(
    //             'email' => $_POST['email'],
    //             'phone' => $phone,
    //             'role_id' => 4,
    //             'vendor_id' => $_POST['vendor_id'],
    //             'full_name' => $_POST['name'],
    //             'address' => $_POST['address'],
    //             'code' => $code,
    //             'status' => 0,
    //             'created_dt' => date("Y-m-d H:i:s"),
    //             'updated_dt' => date("Y-m-d H:i:s"),
    //             'created_user' => $this->session->userdata('email'),
    //             'updated_user' => $this->session->userdata('email'),
    //             'created_terminal' => gethostname(),
    //             'updated_terminal' => gethostname()
    //         );

        
    //         $result = $this->customer_model->add($fields);
    //         if ($result) {

             
    //             $msg = "Dear Client,<br/> Welcome to L O G X, we are the logistics partner of PURA We will be taking care of your food deliveries,
    //             For any delivery information and to track your deliveries status please download L O G X app <br/>
    //             Please click on the <a href='https://itunes.apple.com/us/app/l-o-g-x/id1398600417?mt=8&ign-mpt=uo%3D4'> link </a> below to get started
    //             and verification code ".$code."<br/>Best Regards, <br/>TEAM L O G X";

    //             send_expert_sms($phone,$msg);
    //             $response['success'] = true;
    //         }
    //     }

    //     echo json_encode($response);
    // }

    public function save_file_customers(){
        $response = array('success' => false);

        $customers = $_POST['file_customers'];
        $vendor_id = $_POST['vendor_id'];

        if(count($customers) > 0){
            for($i=0; $i<count($customers); $i++) {

                //if customer already exist
                if($customers[$i]['customer_id'] == 0) {
                    $code = mt_rand(100000, 999999);
                    $fields = array(
                        'email' =>  $customers[$i]['email'],
                        'phone' => validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$customers[$i]['phone'])))),
                        'role_id' => 4,
                        'send_invitation' => 0,
                        'vendor_id' => $vendor_id,
                        'full_name' => $customers[$i]['full_name'],
                        'address' => $customers[$i]['address'],
                        'code' => $code,
                        'status' => 0,
                        'created_dt' => date("Y-m-d H:i:s"),
                        'updated_dt' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'updated_user' => $this->session->userdata('email'),
                        'created_terminal' => gethostname(),
                        'updated_terminal' => gethostname()
                    );

                    //save customer
                    $result = $this->customer_model->add($fields);
                    if ($result) {
                        $response['success'] = true;
                    }
                }

            }

        }

        echo json_encode($response);
    }

    public function update_customer(){
        $response = array('success' => false);
        $customer_id = $_POST['customer_id'];

        $fields = array(
            'email' =>  $_POST['email'],
            'full_name' =>  $_POST['name'],
            //'phone' =>  $_POST['phone'],
            'address' =>  $_POST['address'],
            'updated_dt' => date("Y-m-d H:i:s"),
            'updated_user' => $this->session->userdata('email'),
            'updated_terminal' => gethostname()
        );

        $where = array('id'=> $customer_id);
        $result = $this->customer_model->update($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }


    public function get_customer_by_id(){
        $response = array('success' => false);
        $customer_id = $_POST['customer_id'];
        $where = array('id'=>$customer_id);
        $customer = $this->customer_model->get_where($where);
        if($customer){
            $response['success'] = true;
            $response['customer'] = $customer;
        }

        echo json_encode($response);
    }


    /***************************************************************************/
    /********************VENDOR DASHBOARD LIST****************************************/
    /***************************************************************************/
    //active mean those customers to whom deliveries are expected to deliver
    public function active_customer(){
        $start_date = @$_POST['driver_start_date'] ? @$_POST['driver_start_date'] : date('Y-m-d');
        $end_date = @$_POST['driver_end_date'] ? @$_POST['driver_end_date'] : date('Y-m-d');
        $vendor_id = $this->session->userdata('u_id');
        $customers_where = "o.vendor_id = ".$vendor_id." and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['customers'] = $this->customer_model->get_delivery_customer($customers_where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('customer/v_active_customer', $data);
    }

    public function get_active_customer(){
        $response = array('success' => false);
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');
        $vendor_id = $this->session->userdata('u_id');
        $customers_where = "o.vendor_id = ".$vendor_id." and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $customers = $this->customer_model->get_delivery_customer($customers_where);
        if($customers){
            $response['success'] = true;
            $response['customers'] = $customers;
        }

        echo json_encode($response);
    }
    /***************************************************************************/
    /*****************************VENDOR CUSTOMERS *****************************/
    /***************************************************************************/
    public function v_customers(){
        $where = array('u.vendor_id'=>$this->session->userdata('u_id'));
        $data['customers'] =  $this->customer_model->get_customers($where);
        $this->load->view('customer/v_manage', $data);
    }
    public function del()
    {
        $this->load->model('customer_model');
         $ids = $this->input->post('ids');
 
        $this->db->where_in('id', explode(",", $ids));
        $this->db->delete('users');
 
        echo json_encode(['success'=>"Item Deleted successfully."]);
  
        
    }

    /***************************************************************************/
    /********************UPLOAD CUSTOMERS VIA FILE******************************/
    /***************************************************************************/
    
    
    // public function upload_OLD_freez_at_25_april()
    // {   
    //     // print_r($this->session->userdata());
    //     // exit();
       
    //     $where = array('u.status'=> 0);
    //     $customers =  $this->customer_model->get_customers($where);
    //     $vendors = $this->vendor_model->get_all_vendors();
    //     $this->load->view('upload_customer', array('error' => ' ', 'vendors'=>$vendors , 'customers'=>$customers ));
    // }
    
    // New Module TA 25-April-2021 Start
     public function upload()
    {   
        // print_r($this->session->userdata());
        // exit();
    // if ((strtolower($this->session->userdata('role')) == 'admin') OR (strtolower($this->session->userdata('role')) == 'vendor')) {     
        $where = array('u.status'=> 0);
       
       
        // $customers =  $this->customer_model->get_customers($where); SPOON
        // $vendors = $this->vendor_model->get_all_vendors(); SPOON
        
        
        
        $this->load->model('driver_model');
        $this->load->model('order_model');
	    
		$areas = $this->order_model->get_areas();
// 		$areas = array_column($areas, 'area_name');
		
	//	array_push($areas, 'Other');

 		//$types =  $this->order_model->get_deliveries_type(); 
        $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $timeslot=$this->driver_model->get_combinations($data['old_emirites_typ']);
        
        
        // , 'vendors'=>$vendors , 'customers'=>$customers    SPOON
        $this->load->view('upload_customer', array('error' => ' ', 'areas' =>$areas, 'timeslot'=>$timeslot  ));
        
    // }else{
    //       $this->load->view('forbidden');
    //   }
    }
    
    // New Module TA 25-April-2021 END
    
    
    
    
    
    
    
    
    // Function For datatable server side paginaiton
   
    // public function get_all_customers_OLD_freez_at_25_april()
    // {
    //     $data = $row = array();
     
        
    //     $customers =  $this->customer_model->get_all_customers($_POST);
        
    //     $i = $_POST['start'];
       
    //     foreach($customers as $customer){
    //         $i++;
            
    //         if ($this->session->userdata('role') == 'vendor') {
    //             $data[] = array('<input type="checkbox" class="checkboxes" value="'.$customer->id.'"  id=""   name="checkbox">',$i,$customer->full_name?$customer->full_name:'',$customer->phone?$customer->phone:'',$customer->address?$customer->address:'',$customer->Password_partner?$customer->Password_partner:'','<a class="" title="Edit" href="#" onclick="get_customer_by_id('.$customer->id.')">
    //         <i class="mdi mdi-square-edit-outline"></i>
    //     </a>');
    //         }else{
    //             $data[] = array('<input type="checkbox" class="checkboxes" value="'.$customer->id.'"  id=""   name="checkbox">',$i,$customer->full_name?$customer->full_name:'',$customer->phone?$customer->phone:'',$customer->email?$customer->email:'',$customer->address?$customer->address:'',$customer->Password_partner?$customer->Password_partner:'','<a class="" title="Edit" href="#" onclick="get_customer_by_id('.$customer->id.')">
    //         <i class="mdi mdi-square-edit-outline"></i>
    //     </a>');
    //         }
            
    //     }
        
    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $this->customer_model->countAll(),
    //         "recordsFiltered" => $this->customer_model->countFiltered($_POST),
    //         "data" => $data,
    //     );
        
    //     // Output to JSON format
    //     echo json_encode($output);
    // }
    
    
    // New Module TA 25-April-2021 Start
    
     public function get_all_customers_old_SPOON()
    {
        $data = $row = array();
     
        
        $customers =  $this->customer_model->get_all_customers($_POST);
        
        $i = $_POST['start'];
       
        foreach($customers as $customer){
            $i++;
            
            if($customer->all_detail !=''){
            $other=json_decode($customer->all_detail);
            }else{
                $other=array();
            }
            
            if ($this->session->userdata('role') == 'vendor') {
                $data[] = array('<input type="checkbox" class="checkboxes" value="'.$customer->id.'"  id=""   name="checkbox">',$i,$customer->customer_id?$customer->customer_id:'',$customer->full_name?$customer->full_name:'',$customer->phone?$customer->phone:'',$customer->c_email?$customer->c_email:'',$customer->address?$customer->address:'',$customer->Password_partner?$customer->Password_partner:'',$other->area_name?$other->area_name:'',$other->time_slot_with_emirate?$other->time_slot_with_emirate:'','<a class="" title="Edit" href="#" onclick="get_customer_by_id('.$customer->id.')">
            <i class="mdi mdi-square-edit-outline"></i>
        </a>');
            }else{
                $data[] = array('<input type="checkbox" class="checkboxes" value="'.$customer->id.'"  id=""   name="checkbox">',$i,$customer->customer_id?$customer->customer_id:'',$customer->full_name?$customer->full_name:'',$customer->phone?$customer->phone:'',$customer->c_email?$customer->c_email:'',$customer->email?$customer->email:'',$customer->address?$customer->address:'',$customer->Password_partner?$customer->Password_partner:'',$other->area_name?$other->area_name:'',$other->time_slot_with_emirate?$other->time_slot_with_emirate:'','<a class="" title="Edit" href="#" onclick="get_customer_by_id('.$customer->id.')">
            <i class="mdi mdi-square-edit-outline"></i>
        </a>');
            }
            
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer_model->countAll(),
            "recordsFiltered" => $this->customer_model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    
    
    
     public function get_all_customers_BEFORE()
    {
        $data = $row = array();
     
        
        $customers =  $this->customer_model->get_all_customers($_POST);
        
        $i = $_POST['start'];
       
        foreach($customers as $customer){
            $i++;
            
            if($customer->all_detail !=''){
            $other=json_decode($customer->all_detail);
            }else{
                $other=array();
            }
            
            if ($this->session->userdata('role') == 'vendor') {
                
                $addr_loc_by_dri_usr='Not Available';
                $addr_img_usr='Not Available';
                
                
                $data[] = array('<input type="checkbox" class="checkboxes" value="'.$customer->id.'"  id=""   name="checkbox">',$i,$customer->customer_id?$customer->customer_id:'',$customer->full_name?$customer->full_name:'',$customer->phone?$customer->phone:'',$customer->c_email?$customer->c_email:'',$customer->address?$customer->address:'',$customer->Password_partner?$customer->Password_partner:'',$addr_loc_by_dri_usr,$addr_img_usr,'<a class="" title="Edit" href="#" onclick="get_customer_by_id('.$customer->id.')">
            <i class="mdi mdi-square-edit-outline"></i>
        </a>');
            }else{
                
                if($customer->addr_loc_by_dri_usr !=0 AND $customer->addr_loc_by_dri_usr!=''){
                    $addr_loc_by_dri_usr='<a alt="Location Link" title="Click to View" target="_blank" href="https://maps.google.com/?q='.$customer->addr_loc_by_dri_usr.'" >Available</a>';
                }else{
                    $addr_loc_by_dri_usr='Not Available';
                }
                
                if($customer->addr_img_usr !=0 AND $customer->addr_img_usr!=''){
                    $addr_img_usr='<a alt="Location Image" title="Click to View" target="_blank" href="'.base_url().'upload/'.$customer->addr_img_usr.'">Available</a>';
                }else{
                    $addr_img_usr='Not Available';
                }
                
                
                $data[] = array('<input type="checkbox" class="checkboxes" value="'.$customer->id.'"  id=""   name="checkbox">',$i,$customer->customer_id?$customer->customer_id:'',$customer->full_name?$customer->full_name:'',$customer->phone?$customer->phone:'',$customer->c_email?$customer->c_email:'',$customer->email?$customer->email:'',$customer->address?$customer->address:'',$customer->Password_partner?$customer->Password_partner:'',$addr_loc_by_dri_usr,$addr_img_usr,'<a class="" title="Edit" href="#" onclick="get_customer_by_id('.$customer->id.')">
            <i class="mdi mdi-square-edit-outline"></i>
        </a>');
            }
            
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer_model->countAll(),
            "recordsFiltered" => $this->customer_model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    
   // New Module TA 25-April-2021 END
    
     public function get_all_customers()
    {
        $data = $row = array();
     
        
        $customers =  $this->customer_model->get_all_customers($_POST);
        
        $i = $_POST['start'];
       
        foreach($customers as $customer){
            $i++;
            
            if($customer->all_detail !=''){
            $other=json_decode($customer->all_detail);
            }else{
                $other=array();
            }
            
                $ligado=$customer->mealplan_check;
                $ligado=$ligado== "1" ? " checked" : " ";
                
                $mealplan_status=$customer->customer_id !='' ? '<label class="switch">
                            <input title="This will decide a customer is allowed or not allowed in Mealplanner Customer List." type="checkbox" id="togBtn'.$customer->id.'" onChange="update_meal_plan_eligible(1,'.$customer->id.')" '.$ligado. '>
                            <div class="slider round">
                              <span  title="By clicking it, this will eliminate that customer from Mealplanner Customer List." class="Active">Allowed</span>
                              <span title="By clicking it, this will allowed that customer in Mealplanner Customer List." class="Deactivate" >Denied</span>
                              
                            </div>
                          </label>' : '<span>To Make this customer eligible for Mealplanner kindly generate customer unique code from Edit</span> ';
            
            if ($this->session->userdata('role') == 'vendor') {
                
                $addr_loc_by_dri_usr='Not Available';
                $addr_img_usr='Not Available';
                
                
                $data[] = array('<input type="checkbox" class="checkboxes" value="'.$customer->id.'"  id=""   name="checkbox">',$i,$customer->customer_id?$customer->customer_id:'',$customer->full_name?$customer->full_name:'',$customer->phone?$customer->phone:'',$customer->c_email?$customer->c_email:'',$customer->address?$customer->address:'',$customer->Password_partner?$customer->Password_partner:'',$addr_loc_by_dri_usr,$addr_img_usr,'<a class="" title="Edit" href="#" onclick="get_customer_by_id('.$customer->id.')">
            <i class="mdi mdi-square-edit-outline"></i>
        </a>',$mealplan_status);
            }else{
              
                
                if($customer->addr_loc_by_dri_usr !=0 AND $customer->addr_loc_by_dri_usr!=''){
                    $addr_loc_by_dri_usr='<a alt="Location Link" title="Click to View" target="_blank" href="https://maps.google.com/?q='.$customer->addr_loc_by_dri_usr.'" >Available</a>';
                }else{
                    $addr_loc_by_dri_usr='Not Available';
                }
                
                if($customer->addr_img_usr !=0 AND $customer->addr_img_usr!=''){
                    $addr_img_usr='<a alt="Location Image" title="Click to View" target="_blank" href="'.base_url().'upload/'.$customer->addr_img_usr.'">Available</a>';
                }else{
                    $addr_img_usr='Not Available';
                }
                
                
                $data[] = array('<input type="checkbox" class="checkboxes" value="'.$customer->id.'"  id=""   name="checkbox">',$i,$customer->customer_id?$customer->customer_id:'',$customer->full_name?$customer->full_name:'',$customer->phone?$customer->phone:'',$customer->c_email?$customer->c_email:'',$customer->email?$customer->email:'',$customer->address?$customer->address:'',$customer->Password_partner?$customer->Password_partner:'',$addr_loc_by_dri_usr,$addr_img_usr,'<a class="" title="Edit" href="#" onclick="get_customer_by_id('.$customer->id.')">
            <i class="mdi mdi-square-edit-outline"></i>
        </a>',$mealplan_status);
            }
        //   <input type="checkbox" class="js-switchery" checked data-plugin="switchery" data-color="#ff5d48"/> 
        // onChange="update_meal_plan_eligible(0,'.$customer->id.')"
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer_model->countAll(),
            "recordsFiltered" => $this->customer_model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    


    public function save_customer(){
          $this->load->model('Vendor_model');

          

          $data['email'] = $this->input->post('email');
          $data['phone'] = $this->input->post('phone');
          $data['role_id'] =4;
          $data['full_name'] = $this->input->post('name');
          $data['address'] = $this->input->post('address');
          $data['vendor_id'] = $this->input->post('Partner_name');
           $data['Password_partner'] = $this->input->post('s_pass');
        //   $data['created_dt']=date("Y-m-d H:i:s");
        //   $data['created_terminal']=gethostname();
          if (!$this->input->post('customer_id')) {

            $result=$this->Vendor_model->check_customer($data['email']);
          }
             if(count($result)>0){
                $this->session->set_flashdata('error', 'OOPs You already have a account. gmail already exist');
                redirect('upload_customer');
               }
               else
               {
                $this->session->set_flashdata('success', 'Welcome to thelogx ! You have successfully registered ');
                if ($this->input->post('customer_id')) {
                    $this->Vendor_model->update_registration($data,$this->input->post('customer_id'));
                    $this->session->set_flashdata('success', 'Updated successfully');
                  }else{

                      $this->Vendor_model->add_registration('users',$data);
                  }
              redirect('upload_customer');
          }
          
    }

    public function upload_customers_by_pura_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'customer');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
            $this->load->view('upload_customer', $data);
        }
        else
        {
            $file = base_url().'upload/'.$file_name;
            if (($handle = fopen($file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    //echo $num." columm fon d";
//                    for ($c=0; $c < $num; $c++) {
//                        echo $data[$c] . "<br />\n";
//                        print_r($data);
//                        //if($c == $num-)
//                        //$file_data
//                    }
                    $name = $data[0];
                    $temp = (object) array( 'full_name'=>trim($name), 'phone'=>validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data[2])))), 'address'=>trim($data[3]) );
                    array_push($file_data, $temp);
                }
                fclose($handle);
            }

            $data['file_data'] = $file_data;
            $data['vendors'] =   $this->vendor_model->get_where(array());
            $this->load->view('upload_customer', $data);
        }
    }

    public function upload_customers_by_feeds_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'customer');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
            $this->load->view('customer/upload_file', $data);
        }
        else
        {
            $file = base_url().'upload/'.$file_name;
            if (($handle = fopen($file, "r")) !== FALSE) {

                $table = [];
                while ($row = fgetcsv($handle)){
                    $table []= $row;
                }
                fclose($handle);

                $num = ceil(count($table)/7);
                $increment = 0;

                for ($r=0; $r <$num; $r++) {

                    $name = $table[1+$increment][1];
                    $phone = $table[2+$increment][1];
                    $address = $table[3+$increment][1];
                    $increment +=7;

                    if($phone) {
                        $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$phone))));
                        $where = array('phone' => $phone, 'role_id' => 4);
                        $customer = $this->customer_model->get_where($where);
                        $customer_id = 0;
                        if (count($customer) > 0) {
                            $customer_id = intval($customer[0]->id);
                        }

                        $temp = (object)array('customer_id' => $customer_id, 'full_name' => $name, 'phone' => $phone, 'email' => '', 'address' => $address);
                        array_push($file_data, $temp);
                    }

                }//end for
            }

            $data['file_data'] = $file_data;
            $data['vendors'] =  $this->vendor_model->get_where(array());
            $this->load->view('customer/temp_customers', $data);
        }
    }

    public function upload_customers_by_general_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'customer');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
            $this->load->view('customer/upload_file', $data);
        }
        else
        {
            $file = base_url().'upload/'.$file_name;
            if (($handle = fopen($file, "r")) !== FALSE) {
                $flag = true;

                while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                      $data = array_map("utf8_encode", $data);
                    //Used to skip 1st row
                    if($flag) { $flag = false; continue; }

                    if($data[1] && $data[3] && $data[4]) {
                        $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data[1]))));
                        $where = array('phone' => $phone, 'role_id' => 4);
                        $customer = $this->customer_model->get_where($where);
                        $customer_id = 0;
                        if (count($customer) > 0) {
                            $customer_id = intval($customer[0]->id);
                        }


                        $temp = (object)array('customer_id' => $customer_id, 'full_name' => $data[0], 'phone' => $phone, 'email' => $data[2], 'address' => $data[3], 'delivery_time' => $data[4], 'note' => $data[5]);
                        array_push($file_data, $temp);
                    }
                }
                fclose($handle);
            }

            $data['file_data'] = $file_data;
            $data['vendors'] =  $this->vendor_model->get_where(array());
            $this->load->view('customer/temp_customers', $data);
        }
    }

    public function upload_doc($tmp_doc, $doc, $name)
    {
        $response = array('success' => false);

        $target_dir = "upload/";
        $file_type = pathinfo($target_dir . $doc, PATHINFO_EXTENSION);
        $file_name = date('Y-m-d-H-i-s') . '_' . $name . '_' . '.' . $file_type;
        $file_rename = $target_dir . $file_name;

        if ($file_type == 'xlsx' || $file_type == 'csv'){
            if (move_uploaded_file($tmp_doc, $file_rename)) {
                return $file_name;
            }
        }
        return false;
    }


    /***************************************************************************/
    /********************SEND SMS TO CUSTOMERS******************************/
    /***************************************************************************/
    public function send_sms(){
        $response = array('success' => false);
        $numbers = $_POST['sms_numbers'];
        if(count($numbers) > 0){
            for ($i = 0; $i < count($numbers); $i++) {
                $code = mt_rand(100000, 999999);

                $where = array('phone'=> $numbers[$i]['phone']);
                $result = $this->customer_model->update_existing_notification($code, $where);

                if($result){
                    //method to send sms
                    //$msg = "We on the behalf of logx invite you to become part of LoGx platform for tracking your deliveries & get frequent updates from the drivers. Please click on the link below to download our mobile application, IOS Application Link and verification code ".$code;
                    $msg = "We on the behalf of logx invite you to become part of LoGx platform Please download our mobile application for which your verification code is " . $code;
                    send_expert_sms($numbers[$i]['phone'],$msg);
                    $response['success'] = true;
                }

            }
        }

        echo json_encode($response);
    }


//New Module TA
    // New Module TA 25-April-2021 Start
     public function save_customer_meta_edit(){
          $this->load->model('Vendor_model');
            
            $google=$this->input->post('google_address');
            $timeslot=$this->input->post('delivery_service_type');
            $address=$this->input->post('mul_address');
            
            $customer_codetw=$this->input->post('customer_codetw');
        //   echo 'id'.$this->input->post('customer_id').'<br>';
          
          
          
        //   die();
            $mul_add=array();
            $data_final=array();
            
            $data_final['user_notes']=$this->input->post('user_notes');
            $data_final['send_notification']=$this->input->post('send_notification');
            
            if($customer_codetw !=''){
            //   echo '$customer_codetw !="" :'.$customer_codetw.'<br>';
              
              $database_check= $this->Vendor_model->check_unique_customerid_result($customer_codetw);
            //   echo '$database_check is'.count($database_check);
            //   print_r($database_check);
            //   die();
                if(count($database_check) ==0){
                    $data_final['customer_id']=$customer_codetw;
                }
          }else{
            //   echo '$customer_codetw is empty'.$customer_codetw.'<br>';
          }
            
            
            
          foreach($this->input->post('delivery_emirate') as $key => $data ){
              
                        //  echo 'key is '.$key .'And value is : '. $data.'<br>';
                      
                      if(!empty($address[$key])){   
                        //   echo 'i am not empty address key is '.$key .'And value is : '.$address[$key].'<br>';
                          
                            //   Address check and balance
                                     $Addresscheck=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$address[$key]); 
                                     $Addresscheck=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $Addresscheck); 
                         
                                   $Addresscheck= trim(preg_replace('!\s+!', ' ',str_replace("'","",$Addresscheck)));
                           
                                   $Addresscheck=str_replace("ʹ","", $Addresscheck);
                                   $Addresscheck=str_replace(" ‏","", $Addresscheck);
                                   $Addresscheck=str_replace("‏","", $Addresscheck);
                        
                        //   End address check n balance
                               
                               
                               
                               
                      }else{
                        //   echo 'i am empty address key is '.$key .'And value is : '.$address[$key].'<br>';
                           
                               $Addresscheck='';
                      }
                      
                      if(!empty($google[$key])){   
                        //   echo 'i am not empty google key is '.$key .'And value is : '.$google[$key].'<br>';
                          
                             $google_addr=$google[$key];
                             
                             $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$google_addr)));
                             $google_addr=str_replace("ʹ","", $google_addr);
                             $google_addr=str_replace('"','', $google_addr);
                             
                      }else{
                        //   echo 'i am empty google key is '.$key .'And value is : '.$google[$key].'<br>';
                            
                             $google_addr='';
                      }
                      
                      if(!empty($timeslot[$key])){   
                        //   echo 'i am not empty timeslot key is '.$key .'And value is : '.$timeslot[$key].'<br>';
                          
                          
                                $emirate_arr=explode(",",$timeslot[$key]);
                                $emirateID=$emirate_arr[0];
                                $slot_ID=$emirate_arr[1];
                      }else{
                        //   echo 'i am empty timeslot key is '.$key .'And value is : '.$timeslot[$key].'<br>';
                           
                               
                                $emirateID='';
                                $slot_ID='';
                      }
                      
                      
                    //   echo '-------- <br><br> ';
                      
                      
                      
                      
                      
                      $fix=(object)array('address' => $Addresscheck, 'area_id'=>$data,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'google_link_addrs'=>$google_addr );
                      
                      array_push($mul_add, $fix);
                        //   print_r($mul_add);
                         
          }
            
                // echo '<pre>';
                // print_r($mul_add);
                
                 $mul_add = json_encode($mul_add);
                 
                 
                //  echo '<br><br><br>'.$mul_add;
          
             //   die();
            
          
          
          
          $data_final['mul_address'] = $mul_add;
          
          $data_final['email'] = $this->input->post('email');
          $data_final['phone'] = $this->input->post('phone');
          $data_final['role_id'] =4;
          $data_final['full_name'] = $this->input->post('name');
        //   $data['address'] = $this->input->post('address');
        //   $data['vendor_id'] = $this->input->post('Partner_name');
           $data_final['Password_partner'] = $this->input->post('s_pass');
        //   $data['created_dt']=date("Y-m-d H:i:s");
        //   $data['created_terminal']=gethostname();
        
        
        
        //   echo '<br>i am final data:<pre>';
        //   print_r($data_final);
          if (!$this->input->post('customer_id')) {
             if($data_final['email'] != ''){
               $result=$this->Vendor_model->check_customer($data_final['email']);
             }else{
                 $result=array();
             }
          }
             if(count($result)>0){
                $this->session->set_flashdata('error', 'OOPs  Email already exist');
                redirect('upload_customer');
               }
               else
               {
                
                if ($this->input->post('customer_id')) {
                    $this->Vendor_model->update_registration($data_final,$this->input->post('customer_id'));
                    $this->session->set_flashdata('success', 'Updated successfully');
                  }else{
                      
                    //   $this->session->set_flashdata('success', 'Welcome to thelogx ! Customer successfully registered ');

                    //   $this->Vendor_model->add_registration('users',$data);
                  }
              redirect('upload_customer');
          }
          
    }
   // New Module TA 25-April-2021 END
   
   
   
      //   allowed not allowed customer from mealplanner customer list
    
     public function update_mealplan_customer_status(){
        
        $response = array('success' => false);
        $result=0;
    //   print_r($this->input->post());
        
          $status = $this->input->post('status') == 'true'? '1':'0';
          $id = $this->input->post('id');
        
          if($id !=0 OR $id !=''){
              $where = array('id'=> $id);
               $fields = array(
                  'mealplan_check' =>  $status
                );
              $result = $this->customer_model->update($fields, $where);
          } 
         if($result){
            $response['success']=true;
            $response['result']=$result;
           
             echo json_encode($response);
           }else{
               echo json_encode($response);
           }
       
        
        
    }
}

?>