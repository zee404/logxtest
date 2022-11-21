<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 19/8/2016
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    // public function __construct(){
    //     parent::__construct();
    //     $this->output->enable_profiler(false);  //this show value at your page
    // }
    public function __construct()
    {
          parent::__construct();
            if (empty($this->session->userdata('name')) &&  $this->router->fetch_method() != 'index'&&  $this->router->fetch_method() != 'login')
        redirect(base_url('auth/index')) or exit('no direct access allowed');

        $this->load->model('dashboard_model', 'DM');
    }
    public function index(){
        
        session_destroy();
        $this->load->view('user/login', $data=null);
    }
    
   
    // public function userdashboard_old_at_1_jan_2021($f_date = null, $t_date = null)
    // {
    //     $data = array();

    //     //if null
    //     $f_date = $f_date == null ? date('Y-m-d') : $f_date;
    //     $t_date = $t_date == null ? date('Y-m-d') : $t_date;
    //     // TAHA if($this->session->userdata('role') == 'admin')
        
    //     if($this->session->userdata('role') != 'vendor')
    //     {
    //         $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
    //         $data['drivers'] = $this->DM->get_drivers($f_date, $t_date);
    //         $data['partners'] = $this->DM->get_vendors($f_date, $t_date);
    //         $data['undeliveries'] = $this->DM->get_un_deliveries($f_date, $t_date);
    //         $data['asdeliveries'] = $this->DM->get_as_deliveries($f_date, $t_date);
    //         $data['unbags'] = $this->DM->get_v_unbags($f_date, $t_date);
    //         $data['asbags'] = $this->DM->get_v_asbags($f_date, $t_date);
    //         $data['customers'] = $this->DM->get_customers($f_date, $t_date);
    //         $data['bags'] = $this->DM->get_v_bags($f_date, $t_date);
            
    //         $data['cashs'] = $this->DM->get_v_cashs($f_date, $t_date);
    //          $data['ascashs'] = $this->DM->get_v_ascashs($f_date, $t_date);
    //           $data['uncashs'] = $this->DM->get_v_uncashs($f_date, $t_date);
    //           $data['positive_fb']=$this->DM->get_positive_fb_count($f_date, $t_date);
    //           $data['negative_fb']=$this->DM->get_negative_fb_count($f_date, $t_date);
              
    //           $data['revenue']=$this->DM->get_revenue($f_date, $t_date);
    //           $data['fuel']=$this->DM->get_fuel($f_date, $t_date);
    //         $data['exp']=$this->DM->get_exp($f_date, $t_date);
    //     //     echo '<pre>';
    //     // print_r($data);
    //     // die();
    //     }
        
    //      if($this->session->userdata('role') == 'vendor'){
    //           $data['undeliveries'] = $this->DM->get_un_deliveries($f_date, $t_date);
    //         $data['asdeliveries'] = $this->DM->get_as_deliveries($f_date, $t_date);
    //         $data['unbags'] = $this->DM->get_v_unbags($f_date, $t_date);
    //         $data['asbags'] = $this->DM->get_v_asbags($f_date, $t_date);
             
    //           $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
    //           $data['customers'] = $this->DM->get_customers($f_date, $t_date);
    //           $data['bags'] = $this->DM->get_v_bags($f_date, $t_date);
    //         //   echo '<pre>';
    //         //   print_r($data);
    //          // die();
    //      }
        
        
    //     $this->load->view('index', $data);

    // }
    
     public function userdashboard($f_date = null, $t_date = null)
    {
        $data = array();

        //if null
        $f_date = $f_date == null ? date('2017-m-d') : $f_date;
        $t_date = $t_date == null ? date('2022-m-d') : $t_date;
        // TAHA if($this->session->userdata('role') == 'admin')
        
        if($this->session->userdata('role') != 'vendor')
        {
            $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
            $data['drivers'] = $this->DM->get_drivers($f_date, $t_date);
            $data['partners'] = $this->DM->get_vendors($f_date, $t_date);
            $data['undeliveries'] = $this->DM->get_un_deliveries($f_date, $t_date);
            $data['asdeliveries'] = $this->DM->get_as_deliveries($f_date, $t_date);
            $data['unbags'] = $this->DM->get_v_unbags($f_date, $t_date);
            $data['asbags'] = $this->DM->get_v_asbags($f_date, $t_date);
            $data['customers'] = $this->DM->get_customers($f_date, $t_date);
            $data['bags'] = $this->DM->get_v_bags($f_date, $t_date);
            
            $data['cashs'] = $this->DM->get_v_cashs($f_date, $t_date);
             $data['ascashs'] = $this->DM->get_v_ascashs($f_date, $t_date);
              $data['uncashs'] = $this->DM->get_v_uncashs($f_date, $t_date);
              $data['positive_fb']=$this->DM->get_positive_fb_count($f_date, $t_date);
              $data['negative_fb']=$this->DM->get_negative_fb_count($f_date, $t_date);
              
              $data['revenue']=$this->DM->get_revenue($f_date, $t_date);
              $data['fuel']=$this->DM->get_fuel($f_date, $t_date);
            $data['exp']=$this->DM->get_exp($f_date, $t_date);
            
            
            
            $data['paid_canceled_deliv'] = $this->DM->get_paid_canceled_deliv($f_date, $t_date);
            $data['unpaid_canceled_deliv'] = $this->DM->get_unpaid_canceled_deliv($f_date, $t_date);
            
             $data['cash_need_to_collect'] = $this->DM->get_cash_need_to_collected_deliv($f_date, $t_date);
            
              
            $data['cash_collected_deliv'] = $this->DM->get_cash_collected_deliv($f_date, $t_date);
            
              $data['revenue_bag']=$this->DM->get_revenue_from_bags($f_date, $t_date);
              
              $data['late_deliv'] = $this->DM->get_late_deliv_num($f_date, $t_date);
            
        //     echo '<pre>';
        // print_r($data);
        // die();
        }
        
         if($this->session->userdata('role') == 'vendor'){
              $data['undeliveries'] = $this->DM->get_un_deliveries($f_date, $t_date);
            $data['asdeliveries'] = $this->DM->get_as_deliveries($f_date, $t_date);
            $data['unbags'] = $this->DM->get_v_unbags($f_date, $t_date);
            $data['asbags'] = $this->DM->get_v_asbags($f_date, $t_date);
             
              $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
              $data['customers'] = $this->DM->get_customers($f_date, $t_date);
              $data['bags'] = $this->DM->get_v_bags($f_date, $t_date);
              
               $data['revenue']=$this->DM->get_revenue($f_date, $t_date);
               $data['revenue_bag']=$this->DM->get_revenue_from_bags($f_date, $t_date);
               
               $data['incomings']=$this->DM->get_incomings($f_date, $t_date);
               $data['offs']=$this->DM->get_waived($f_date, $t_date);
               $data['charged']=$this->DM->get_extras($f_date, $t_date);
               $data['only_incomings']=$this->DM->get_incomings_only($f_date, $t_date);
               
               $data['revenue_all']=$this->DM->get_exp_from_july_order($f_date, $t_date);
               $data['revenue_bag_all']=$this->DM->get_exp_from_july_bags($f_date, $t_date);
               $uid = $this->session->userdata('u_id');
            //   if($uid==59248){
            //           echo '<pre>';
            //           print_r($data);
            //           die();
            //   }
            //   echo '<pre>';
            //   print_r($data);
             // die();
         }
        
        
        $this->load->view('index', $data);

    }
    
     public function userdashboard_ops($f_date = null, $t_date = null)
    {
        $data = array();

        //if null
        $f_date = $f_date == null ? date('Y-m-d') : $f_date;
        $t_date = $t_date == null ? date('Y-m-d') : $t_date;
        // TAHA if($this->session->userdata('role') == 'admin')
        
        if($this->session->userdata('role') != 'vendor')
        {
            $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
            $data['drivers'] = $this->DM->get_drivers($f_date, $t_date);
            $data['partners'] = $this->DM->get_vendors($f_date, $t_date);
            $data['undeliveries'] = $this->DM->get_un_deliveries($f_date, $t_date);
            $data['asdeliveries'] = $this->DM->get_as_deliveries($f_date, $t_date);
            $data['unbags'] = $this->DM->get_v_unbags($f_date, $t_date);
            $data['asbags'] = $this->DM->get_v_asbags($f_date, $t_date);
            $data['customers'] = $this->DM->get_customers($f_date, $t_date);
            $data['bags'] = $this->DM->get_v_bags($f_date, $t_date);
            
            $data['cashs'] = $this->DM->get_v_cashs($f_date, $t_date);
             $data['ascashs'] = $this->DM->get_v_ascashs($f_date, $t_date);
              $data['uncashs'] = $this->DM->get_v_uncashs($f_date, $t_date);
              $data['positive_fb']=$this->DM->get_positive_fb_count($f_date, $t_date);
              $data['negative_fb']=$this->DM->get_negative_fb_count($f_date, $t_date);
              
              $data['revenue']=$this->DM->get_revenue($f_date, $t_date);
              $data['fuel']=$this->DM->get_fuel($f_date, $t_date);
            $data['exp']=$this->DM->get_exp($f_date, $t_date);
            
            
            
            $data['paid_canceled_deliv'] = $this->DM->get_paid_canceled_deliv($f_date, $t_date);
            $data['unpaid_canceled_deliv'] = $this->DM->get_unpaid_canceled_deliv($f_date, $t_date);
            
             $data['cash_need_to_collect'] = $this->DM->get_cash_need_to_collected_deliv($f_date, $t_date);
            
              
            $data['cash_collected_deliv'] = $this->DM->get_cash_collected_deliv($f_date, $t_date);
            
              $data['revenue_bag']=$this->DM->get_revenue_from_bags($f_date, $t_date);
              
              $data['late_deliv'] = $this->DM->get_late_deliv_num($f_date, $t_date);
            dd($data);
        //     echo '<pre>';
        // print_r($data);
        // die();
        }
        
         if($this->session->userdata('role') == 'vendor'){
              $data['undeliveries'] = $this->DM->get_un_deliveries($f_date, $t_date);
            $data['asdeliveries'] = $this->DM->get_as_deliveries($f_date, $t_date);
            $data['unbags'] = $this->DM->get_v_unbags($f_date, $t_date);
            $data['asbags'] = $this->DM->get_v_asbags($f_date, $t_date);
             
              $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
              $data['customers'] = $this->DM->get_customers($f_date, $t_date);
              $data['bags'] = $this->DM->get_v_bags($f_date, $t_date);
              
               $data['revenue']=$this->DM->get_revenue($f_date, $t_date);
               $data['revenue_bag']=$this->DM->get_revenue_from_bags($f_date, $t_date);
               
               $data['incomings']=$this->DM->get_incomings($f_date, $t_date);
               $data['offs']=$this->DM->get_waived($f_date, $t_date);
               $data['charged']=$this->DM->get_extras($f_date, $t_date);
               $data['only_incomings']=$this->DM->get_incomings_only($f_date, $t_date);
               
               $data['revenue_all']=$this->DM->get_exp_from_july_order($f_date, $t_date);
               $data['revenue_bag_all']=$this->DM->get_exp_from_july_bags($f_date, $t_date);
               $uid = $this->session->userdata('u_id');
            //   if($uid==59248){
            //           echo '<pre>';
            //           print_r($data);
            //           die();
            //   }
            //   echo '<pre>';
            //   print_r($data);
             // die();
         }
        
        
        $this->load->view('index', $data);

    }
  
  
  
  
  
    
    public function dashboard(){
        if ($this->session->userdata('role') != 'admin'){
           
            return redirect('auth/index');
        
        }

        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');

        $not_assigned_deliveries_where = "delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_not_assigned_deliveries'] = $this->order_model->count_not_assigned($not_assigned_deliveries_where);

        $delivered_deliveries_where = "delivered_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_shipped_deliveries'] = $this->order_model->count_shipped($delivered_deliveries_where);

        $total_deliveries_where = "delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_deliveries'] = $this->order_model->total_count($total_deliveries_where);

        //request for bag collection
        //$bags_req_where = "status = 'Requested' and created_dt BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $bags_req_where = "pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        $data['total_bags_collection'] = $this->bag_model->count_bags_collection($bags_req_where);

        //collected bags
        $bags_collected_where = "status = 'Picked' and collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        //$data['total_bags_collected'] = $this->bag_model->count_bags_collection($bags_collected_where)[0]->bags;
        $data['total_bags_collected'] = $this->bag_model->count_bags_collection($bags_collected_where);

       // $customers_where = " created_dt BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
       // $data['total_customers'] = $this->customer_model->count($customers_where);

        $driver_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_drivers'] = count($this->driver_model->get_assign_delivery_drivers($driver_where));
        //$data['total_drivers'] = $this->driver_model->count();

        $vendor_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_vendors'] = count($this->vendor_model->get_delivery_vendors($vendor_where));

        $this->load->view('user/index', $data);
    }
    public function dashboard2(){
        if ($this->session->userdata('role') != 'Store Keeper'){
           
            return redirect('auth/index');
        
        }

        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');

        $not_assigned_deliveries_where = "delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_not_assigned_deliveries'] = $this->order_model->count_not_assigned($not_assigned_deliveries_where);

        $delivered_deliveries_where = "delivered_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_shipped_deliveries'] = $this->order_model->count_shipped($delivered_deliveries_where);

        $total_deliveries_where = "delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_deliveries'] = $this->order_model->total_count($total_deliveries_where);

        //request for bag collection
        //$bags_req_where = "status = 'Requested' and created_dt BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $bags_req_where = "pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        $data['total_bags_collection'] = $this->bag_model->count_bags_collection($bags_req_where);

        //collected bags
        $bags_collected_where = "status = 'Picked' and collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        //$data['total_bags_collected'] = $this->bag_model->count_bags_collection($bags_collected_where)[0]->bags;
        $data['total_bags_collected'] = $this->bag_model->count_bags_collection($bags_collected_where);

       // $customers_where = " created_dt BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
       // $data['total_customers'] = $this->customer_model->count($customers_where);

        $driver_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_drivers'] = count($this->driver_model->get_assign_delivery_drivers($driver_where));
        //$data['total_drivers'] = $this->driver_model->count();

        $vendor_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['total_vendors'] = count($this->vendor_model->get_delivery_vendors($vendor_where));

        $this->load->view('keeper/index', $data);
    }

    public function dashboard_stats(){

        $response = array('success'=> true);
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');

        $not_assigned_deliveries_where = "delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_not_assigned_deliveries'] = $this->order_model->count_not_assigned($not_assigned_deliveries_where);

        $delivered_deliveries_where = "status = 'Delivered' and delivered_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_shipped_deliveries'] = $this->order_model->count_shipped($delivered_deliveries_where);

        $total_deliveries_where = "delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_deliveries'] = $this->order_model->count_all_by_delivery_date($total_deliveries_where);

        //request for bag collection
        $bags_collected_where = "pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        //$bags_req_where = "status = 'Requested' and created_dt BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        //$response['total_bags_collection'] = $this->bag_model->count_bags_collection($bags_collected_where)[0]->bags;
        $response['total_bags_collection'] = $this->bag_model->count_bags_collection($bags_collected_where);

        //collected bags
        //$bags_collected_where = "status = 'Picked' and collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $bags_collected_where = "pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        $response['total_bags_collected'] = $this->bag_model->count_bags_collection($bags_collected_where);

       // $customers_where = " created_dt BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
       // $response['total_customers'] = $this->customer_model->count($customers_where);

        $driver_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_drivers'] = count($this->driver_model->get_assign_delivery_drivers($driver_where));
        //$response['total_drivers'] = $this->driver_model->count();

        $vendor_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_vendors'] = count($this->vendor_model->get_delivery_vendors($vendor_where));


        echo json_encode($response);
    }

    public function lock_screen(){
        $this->load->view('user/lock_screen');
    }

    public function logout(){
        $this->session->sess_destroy();
         session_destroy();
        redirect("/auth/index");
    }

   public function login(){
        $view_data = array ();
        $response = array ();
        $response['success'] = false;
        $response['error'] = false;
        $userName = trim(@$this->input->post('username'));
        $password = trim(@$this->input->post('password'));


        if ((!isset($userName) || $userName == "") && (!isset($password) || $password == '')){
            $response['error'] = true;
            $response['error_msg'] = "Login credentials are not given.";
        }
    
        else{
            
                //$where = array('email' => $userName, 'Password_partner' => $password, 'u.status'=>0, 'is_deleted'=>0);
            $where = array('email' => $userName, 'password' => md5($password), 'is_deleted'=>0);

            if(!empty($this->input->post('driver_id'))){
                $result = $this->user_auth->login($where, $this->input->post('driver_id'));
            }else{
                $result = $this->user_auth->login($where);
            }
                
// var_dump($result);
// die();
            // print_r($where);
            //     exit();
            
            // echo '<pre>'.$result->role_id;
            // print_r($result);
            // die();
            if ($result){
                
                if($result->role_id != 3 AND $result->role_id !=4 AND $result->role_id != 5)
                {
                // If user is validated
                $session_data = array(
                    'u_id' => $result->id,
                    'email' => $result->email,
                    'phone' => $result->phone,
                    'name' => $result->full_name,
                    'role' => $result->role,
                    'role_id' => $result->role_id,
                    'modules' => $result->modules,
                    'password' => $result->password,
                    'auth_check'=>'abcd123456'
                );

                $this->session->set_userdata($session_data);
                // print_r($session_data);
                // die();
                //insert log
                $data = array(
                    'user_id' => $result->id,
                    'login_date' => date('Y-m-d'),
                    'login_time' => date('H:i:s'),
                    'terminal' => gethostname(),
                    'ip' => $this->input->ip_address()
                );

                $this->user_auth->save_log($data);
                 redirect('auth/userdashboard');
                /*for admin*/
                // if($result->role == 'admin'){
                //     redirect('/auth/dashboard');
                // }

                /*for vendor user*/
                // if($result->role == 'vendor'){
                //     redirect('vendor/dashboard');
                // }
                // if($result->role == 'Store Keeper'){
                //     redirect('auth/dashboard2');
                // }
                
                
            }else{
                             $response['error'] = true;
                             $response['error_msg'] = "Login credentials are not valid";
                         }

            } else {
                $response['error'] = true;
                $response['error_msg'] = "Login credentials are not valid";
            }
        }
        $view_data['response'] = $response;
        $this->load->view("user/login",$view_data);
        

        // $view_data['response'] = $response;
        // $this->load->view("user/login",$view_data);
    }

    public function forget_password_code(){
        $response = array('success'=> false);
        $email = trim(@$_POST['email']);
        $code = mt_rand(100000, 999999);

        //just to make sure any vendor can't update driver or customer password that is why vendor_id is implemented
        $where = array('email' => $email, 'vendor_id' => 0);

        //$fields = array('code'=>$code);
        $password = generateRandomString();
        $fields = array('password'=>md5($password));
        $res = $this->user_auth->update($fields, $where);
        if ($res){
            //send code to given email
            //$msg = 'Verification code '.$code.' to reset your account.';
            $msg = 'Reset Password '.$password.' to reset your account.';
            $param = array('to'=>$email, 'msg'=>$msg);
            send_email($param);

            $response['success'] = true;
            $response['error_msg'] = "Password reset and send to your given email ".$password;
        } else {
            $response['error_msg'] = "Your given email is not exist.";
        }

        echo json_encode($response);
    }

    public function signup(){
        $response = array ('success' => false);
        $email = trim(@$_POST['email']);
        $password = trim(@$_POST['password']);
        $re_password = trim(@$_POST['re-password']);
        $code = trim(@$_POST['code']);

        $where = array('email' => $email, 'code' => $code);
        $fields = array('password' => md5($password), 'status'=>1 );
        $result = $this->user_auth->update($fields, $where);

        if($result){
            $where = array('email' => $email, 'password' => md5($password), 'code'=>$code);
            $u_data = $this->user_auth->login($where);
            if ($u_data){
                // If user is validated
                $session_data = array(
                    'u_id' => $u_data->id,
                    'email' => $u_data->email,
                    'phone' => $u_data->phone,
                    'name' => $u_data->full_name,
                    'role' => $u_data->role,
                    'role_id' => $u_data->role_id,
                );
                $this->session->set_userdata($session_data);

                //insert log
                $data = array(
                    'user_id' => $u_data->id,
                    'login_date' => date('Y-m-d'),
                    'login_time' => date('H:i:s'),
                    'terminal' => gethostname(),
                    'ip' => $this->input->ip_address()
                );
                $this->user_auth->save_log($data);


                $response['success'] = true;
                $response['role'] = $u_data->role;
            }
        }else {
            $response['error_msg'] = "Login credentials are not valid";
        }

        echo json_encode($response);
    }

    public function privacy_page(){
        $this->load->view('user/privacy_policy');
    }
    
    
    
    //  public function Active_Partners_old_6_july_2021(){
        
        
    //     $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
    //     $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
    //     // echo 'dtxx:'.$st_dt.' - '.$end_dt.'<br>';
        
    //     // die();
        
        
    //      $this->db->select(" u.email,u.phone,u.full_name,o.vendor_id, COUNT(o.order_id) AS 'orders',
        
    //       sum(case when (o.status = 'Delivered' OR o.status = 'Collected') then 1 else 0 end) as total_delivered,

        
    //       sum(case when (o.status = 'Assign' AND o.is_cancelled ='no') then 1 else 0 end) as total_assign,

        
    //       sum(case when (o.status = 'Not Assign' AND o.is_cancelled ='no' ) then 1 else 0 end) as total_not_assign,

        
    //       sum(case when (o.is_cancelled = 'yes'  ) then 1 else 0 end) as total_canceled,
          
    //       sum(case when (o.status = 'Ship' AND o.is_cancelled ='no' ) then 1 else 0 end) as total_ship
    //       ");
      
    //     $this->db->from('orders as o');
    //     $this->db->join('users as u', 'o.vendor_id= u.id');
      
        
    //     $this->db->group_by('o.vendor_id');
        
        
    //     $where="o.action != 'Freezed' and o.vendor_id != 0 AND o.delivery_date BETWEEN  '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
    //     $this->db->where($where);
       
    //     $query = $this->db->get();
        
    //     // print_r($this->db->last_query());
    //     // die();
    
    //     $orders = $query->result();
    //     if ($orders){
    //         $result['result'] = true;
    //         $result['records'] = $orders;
    //     }else{
    //         $result['result'] = false;
    //     }
    //     // echo '<pre>';
    //     // print_r($result);
    //     // echo 'hi';
    //     // die();
    //       $this->load->view('active_partners',$result);
        
       
    // }
    
    
    // public function Active_Drivers_new_old_6_july_2021(){
        
        
    //     $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
    //     $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
    //     // echo 'dtxx:'.$st_dt.' - '.$end_dt.'<br>';
        
    //     // die();
        
        
    //      $this->db->select(" u.email,u.phone,u.full_name,o.driver_id, COUNT(o.order_id) AS 'orders',
        
    //       sum(case when (o.status = 'Delivered' OR o.status = 'Collected') then 1 else 0 end) as total_delivered,

        
    //       sum(case when (o.status = 'Assign' AND o.is_cancelled ='no') then 1 else 0 end) as total_assign,


        
    //       sum(case when (o.is_cancelled = 'yes'  ) then 1 else 0 end) as total_canceled,
          
    //       sum(case when (o.status = 'Ship' AND o.is_cancelled ='no' ) then 1 else 0 end) as total_ship
    //       ");
      
    //     $this->db->from('orders as o');
    //     $this->db->join('users as u', 'o.driver_id= u.id');
      
        
    //     $this->db->group_by('o.driver_id');
        
        
    //     $where="o.action != 'Freezed' and o.driver_id != 0 AND o.delivery_date BETWEEN  '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
    //     $this->db->where($where);
       
    //     $query = $this->db->get();
        
    //     // print_r($this->db->last_query());
    //     // die();
    
    //     $orders = $query->result();
    //     if ($orders){
    //         $result['result'] = true;
    //         $result['records'] = $orders;
    //     }else{
    //         $result['result'] = false;
    //     }
    //     // echo '<pre>';
    //     // print_r($result);
    //     // echo 'hi';
    //     // die();
    //       $this->load->view('active_drivers_new',$result);
        
       
    // }
    
    public function Active_total_deliveries(){
         $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        $vd=$this->uri->segment(5)? $this->uri->segment(5): 0;
        
        //  TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
             
             if($vd){
                 $where = "o.action != 'Paused' and  o.action != 'Freezed' and o.vendor_id=$vd and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
             }else{
                $where = "o.action != 'Paused' and  o.action != 'Freezed' and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
             }
         }else{
             $v_id= $this->session->userdata('u_id');
             $where = "o.action != 'Paused' and  o.action != 'Freezed' and o.vendor_id=$v_id and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
         } 
            
            // QUERY
            $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received,o.bag_received as own_bg_count,o.ice_bags as own_ice_bg,o.tot_ice_pack_received as ice_bags,o.cooling_bag_check,
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
        
        $query = $this->db->get();
        //   print_r($this->db->last_query());
        //  die();
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
            
            // QUERY END
        $data['orders'] =$result;
        // echo '<pre>';
        //  print_r($data);
       
       
        $this->load->view('active_total_delivries', $data);
    }
    
    
    
     public function revenue(){
        
        
        $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        // echo 'dtxx:'.$st_dt.' - '.$end_dt.'<br>';
        
        // die();
        
        
         $this->db->select(" u.email,u.phone,u.full_name,o.vendor_id, COUNT(o.order_id) AS 'orders',
         
         sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu,
        
         sum(case when (o.status = 'Delivered' OR o.status = 'Collected'  AND o.`is_cancelled` ='no') then o.partner_price else 0 end) as total_delivered,

         sum(case when (o.status = 'Delivered' OR o.status = 'Collected' AND o.`is_cancelled` ='no') then 1 else 0 end) as total_delivered_delivries,

        
         sum(case when (o.status = 'Assign' AND o.`is_cancelled` ='no') then o.partner_price else 0 end) as total_assign,

         sum(case when (o.status = 'Not Assign' AND o.`is_cancelled` ='no' ) then o.partner_price else 0 end) as total_not_assign,

         sum(case when (o.`is_cancelled` = 'yes'  ) then o.cancellation_price else 0 end) as total_canceled,

         sum(case when (o.status = 'Ship' AND o.`is_cancelled` ='no') then o.partner_price else 0 end) as total_ship
          ");
      
        $this->db->from('orders as o');
        $this->db->join('users as u', 'o.vendor_id= u.id');
      
        
        $this->db->group_by('o.vendor_id');
        
        
        // TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
            $where="o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.delivery_date BETWEEN  '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
         }else{
             $v_id= $this->session->userdata('u_id');
             $where="o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $v_id AND o.delivery_date BETWEEN  '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
         } 
        
        
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
        // echo '<pre>';
        // print_r($result);
        // echo 'hi';
        // die();
          $this->load->view('reveneu',$result);
        
       
    }
    
    public function Active_total_deliveries_with_payment(){
         $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        $vd=$this->uri->segment(5)? $this->uri->segment(5): 0;
        
        //  TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
             
             if($vd){
                 $where = "o.action != 'Paused' and  o.action != 'Freezed' and o.delivery_amount !=0 and o.vendor_id=$vd and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
             }else{
                $where = "o.action != 'Paused' and  o.action != 'Freezed' and o.delivery_amount !=0 and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
             }
         }else{
             $v_id= $this->session->userdata('u_id');
             $where = "o.action != 'Paused' and  o.action != 'Freezed' and o.delivery_amount !=0 and o.vendor_id=$v_id and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
         } 
            
            // QUERY
            $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received,o.bag_received as own_bg_count,o.ice_bags as own_ice_bg,o.tot_ice_pack_received as ice_bags,o.cooling_bag_check,
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
        
        $query = $this->db->get();
        // echo '<pre>';
        //   print_r($this->db->last_query());
        //  die();
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
            
            // QUERY END
        $data['orders'] =$result;
        // echo '<pre>';
        //  print_r($data);
       
       
        $this->load->view('active_total_deliveries_with_payment', $data);
    }
    
    
    
    
    
    // _15feb
    
    
     public function revenue_bag(){
        
        
        $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        // echo 'dtxx:'.$st_dt.' - '.$end_dt.'<br>';
        
        // die();
        
        
         $this->db->select(" u.email,u.phone,u.full_name,o.vendor_id, COUNT(o.bag_id) AS 'bags',
         
         sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu,
        
         sum(case when ((o.status = 'Picked' OR o.status = 'No bag' ) AND o.`is_cancelled` ='no' ) then o.partner_price else 0 end) as total_bag_completed,
    
         sum(case when ((o.status = 'Picked' OR o.status = 'No bag' ) AND o.`is_cancelled` ='no' ) then 1 else 0 end) as total_num_of_bags_completed,
    
         sum(case when (o.status = 'Assign' AND o.`is_cancelled` ='no') then o.partner_price else 0 end) as total_assign,
           sum(case when (o.status = 'Assign' AND o.`is_cancelled` ='no') then 1 else 0 end) as total_num_assign,

         sum(case when (o.status = 'Requested' AND o.`is_cancelled` ='no' ) then o.partner_price else 0 end) as total_not_assign,
         sum(case when (o.status = 'Requested' AND o.`is_cancelled` ='no' ) then 1 else 0 end) as total_num_not_assign,

         sum(case when (o.`is_cancelled` = 'yes'  ) then o.cancellation_price else 0 end) as total_canceled,
         sum(case when (o.`is_cancelled` = 'yes'  ) then 1 else 0 end) as total_num_canceled

   
          ");
      
        $this->db->from('bags as o');
        $this->db->join('users as u', 'o.vendor_id= u.id');
      
        
        $this->db->group_by('o.vendor_id');
        
        
        // TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
            $where="o.vendor_id != 0 AND o.pick_date BETWEEN  '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
         }else{
             $v_id= $this->session->userdata('u_id');
             $where="o.vendor_id = $v_id AND o.pick_date BETWEEN  '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
         } 
        
        
        $this->db->where($where);
       
        $query = $this->db->get();
        // echo '<pre>';
        // print_r($this->db->last_query());
        // die();
    
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
        // echo '<pre>';
        // print_r($result);
        // echo 'hi';
        // die();
          $this->load->view('revenue_bag',$result);
        
       
    }
    
    
    public function Active_total_bags(){
         $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        $vd=$this->uri->segment(5)? $this->uri->segment(5): 0;
        
        //  TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
             
             if($vd){
                 $where = "o.vendor_id=$vd and o.pick_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
             }else{
                $where = "o.pick_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
             }
         }else{
             $v_id= $this->session->userdata('u_id');
             $where = "o.vendor_id=$v_id and o.pick_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
         } 
            
            // QUERY
            $this->db->select('o.bag_id,o.customer_id,o.bag_notes,o.created_dt,o.type_id,o.bags_qty,
        o.driver_id, o.vendor_id, o.`status`,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
         o.pick_date as pick_date, o.assign_date,o.collected_date as collected_date,
         o.received_bag_qty,o.bag_received_qr,o.proof_image,o.is_cancelled,
          
        c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.bag_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price');
        $this->db->from('bags as o');
        $this->db->join('users as c', 'c.id = o.customer_id');
        $this->db->join('users as d', 'd.id = o.driver_id','left');
        $this->db->join('users as v', 'v.id = o.vendor_id');
        // $this->db->join($this->table_type.' as t', 't.id = o.type_id');
         
         $this->db->join('tbl_service_type as serv','o.service_type_id = serv.id','left');
         $this->db->join(' tbl_emirates as emi','o.emirateID = emi.id','left');
        
        $this->db->where($where);
        
        $query = $this->db->get();
        // echo '<pre>';
        //   print_r($this->db->last_query());
        //  die();
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
            
            // QUERY END
        $data['orders'] =$result;
        // echo '<pre>';
        //  print_r($data);
        //  die();
       
       
        $this->load->view('active_total_bags', $data);
    }
    
    
    
    
    
    
    
    
    public function Active_total_deliveries_with_cash(){
         $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        $vd=$this->uri->segment(5)? $this->uri->segment(5): 0;
        
        //  TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
             
             if($vd){
                 $where = "o.delivery_amount !=0 and o.vendor_id=$vd and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
             }else{
                $where = "o.driver_recvd_amount !=0 and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
             }
         }else{
             $v_id= $this->session->userdata('u_id');
             $where = "o.delivery_amount !=0 and o.vendor_id=$v_id and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
         } 
            
            // QUERY
            $this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received,o.bag_received as own_bg_count,o.ice_bags as own_ice_bg,o.tot_ice_pack_received as ice_bags,o.cooling_bag_check,
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
        
        $query = $this->db->get();
        // echo '<pre>';
        //   print_r($this->db->last_query());
        //  die();
        $orders = $query->result();
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
            
            // QUERY END
        $data['orders'] =$result;
        // echo '<pre>';
        //  print_r($data);
       
       
        $this->load->view('active_total_deliveries_with_payment', $data);
    }
    
    
    
    
    
    // 06-july-2021
    
    public function Active_Partners(){
        
        
        $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        // echo 'dtxx:'.$st_dt.' - '.$end_dt.'<br>';
        
        // die();
        
         $result=$this->DM->get_partner_details_new_count($st_dt,$end_dt);
         
        // echo '<pre>';
        // print_r($result);
        // echo 'hi';
        // die();
          $this->load->view('active_partners',$result);
        
       
    }
     public function Active_Drivers_new(){
        
        
        $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        // echo 'dtxx:'.$st_dt.' - '.$end_dt.'<br>';
        
        // die();
        
        $result=$this->DM->get_drivers_details_new_count($st_dt,$end_dt);
         
        // echo '<pre>';
        // print_r($result);
        // echo 'hi';
        // die();
          $this->load->view('active_drivers_new',$result);
        
       
    }
    public function deliveries_detail_status_Check(){
       
        $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        $check=$this->uri->segment(5)? $this->uri->segment(5): 0;
        
        if($check=='p'){
            $partnerID=$this->uri->segment(6)? $this->uri->segment(6): 0;
            
              $where="o.vendor_id ='$partnerID' ";
        }else if($check=='d'){
            $driverID=$this->uri->segment(6)? $this->uri->segment(6): 0;
            
              $where="o.driver_id ='$driverID' ";
        }else{
             $where="o.driver_id =0 AND o.vendor_id =0 ";
        }
        
        
        if($check){
           
            $condition_is=$this->uri->segment(7)? $this->uri->segment(7): 0;
              if($condition_is=='slot'){
               
                $time=$this->uri->segment(8)? $this->uri->segment(8): 0;
                if($time){
                    
                    $time= str_replace("%20"," ",$time);
                    $time= str_replace("L","(",$time);
                    $time= str_replace("R",")",$time);
                    $where .= " AND o.delivery_time ='$time' ";
                }
                 
                  
              }else{
                  
              }
              
                 if($this->uri->segment(8)? $this->uri->segment(8): 0){
                     
                      $status=$this->uri->segment(9)? $this->uri->segment(9): 0;
                        //   echo $status;
                        if($status){ 
                          if($status=='delivered'){
                              $where .= " AND (o.status ='Delivered' OR  o.status='Collected' ) AND  o.is_cancelled='no' ";
                            //   echo 'helooooo:' .$status;
                            //   die();
                          }else if($status=='assigned'){
                              $where .= " AND o.status ='Assign' AND o.driver_id > 0 AND  o.is_cancelled='no'";
                          }else if($status=='unassigned'){
                              $where .= " AND o.status ='Not Assign' AND  o.is_cancelled='no' ";
                          }else if($status=='canceled'){
                              $where .= " AND (o.status ='Cancel' OR o.is_cancelled='yes') ";
                          }else if($status=='inship'){
                              $where .= " AND o.status ='Ship' AND o.driver_id > 0 AND  o.is_cancelled='no' ";
                          }else{
                              
                          }
                          
                        }
                 }else{
                     
                 }
        }else{
            
        }
        
        
        
        //  TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
             
             
                //  $where .= " AND o.action != 'Freezed' and o.vendor_id=$vd and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
          
                $where .= "  AND o.action != 'Paused' AND o.action != 'Freezed' AND o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
           
         }else{
             
             return 0;
             $this->load->view('deliveryreport_view', $data);
         } 
            
            // QUERY
            
            $result=$this->DM->get_justification_page_partner_driver($where);
           
            // QUERY END
        $data['orders'] =$result;
        // echo '<pre>';
        //  print_r($data);
       
       
        $this->load->view('deliveryreport_view', $data);
    }
    
    
    public function deliveries_detail_status_Check_driver(){
       
         set_time_limit(0);
        $response = array('success' => false, 'data'=>array(), 'recordsTotal'=>0, 'recordsFiltered'=>0, 'all_post'=>$this->input->post());
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
       
        $start = !empty($this->input->post('start')) ? $this->input->post('start') : 0;
        $length = !empty($this->input->post('length')) ? $this->input->post('length') : 50;
        
        // $start = '';
        // $length = '';
        
        
        
        $st_dt=$start_date;
        $end_dt=$end_date;
        
       
        
       $where=@$this->input->post('whr');
       
    //   echo 'whr is::'.$where;
    //   die();
       //exit($start_date.'________'.$end_date);
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where .= " AND o.vendor_id=".$vendor_id." AND (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($st_dt))." 00:00:00' AND '".date('Y-m-d', strtotime($end_dt))." 23:59:59'";
        }else{
            $where .= " AND (o.delivered_status = 1) AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($st_dt))." 00:00:00' AND '".date('Y-m-d', strtotime($end_dt))." 23:59:59'";
        }
         
         
    //      echo 'whr is::'.$where;
    //   die();
        //if searching is requested
        $search = null;
        if(!empty($this->input->post('search')['value']))
        {
            $search = $this->input->post('search')['value'];
            
            $data_search   = preg_split('/\s+/', $search);
            
            $searchs=$data_search;
            // echo '<pre>';
            // print_r($data_search);
            // die();
            
            foreach($searchs as $search){
            $where .= " AND (o.plan_id LIKE '%".$search."%' OR o.company_note LIKE '%".$search."%' OR o.delivered_to LIKE '%".$search."%' OR o.name_on_delivery LIKE '%".$search."%' OR o.number_on_delivery LIKE '%".$search."%' OR o.delivery_time LIKE '%".$search."%' OR c.full_name LIKE '%".$search."%' OR d.full_name LIKE '%".$search."%' OR v.full_name LIKE '%".$search."%' OR o.delivery_address LIKE '%".$search."%' OR o.delivery_time LIKE '%".$search."%' OR o.food_type LIKE '%".$search."%' OR o.pickUp LIKE '%".$search."%' OR c.phone LIKE '%".$search."%' OR d.phone LIKE '%".$search."%' OR v.phone LIKE '%".$search."%')";
            }
            //   echo '<pre>';
            // echo $where.'<br>';
            // die();
               
        }
        $response['search'] = $search;
        
        //sorting code
        if(!empty($this->input->post('order')))
        {
            $table_order = $this->input->post('order')[0];
            $col_num = $table_order['column'];
            $order_dir = $table_order['dir'];
            switch ($col_num) {
                
                 case 1:
                    $col_name = 'o.order_id';
                    break;
                 
                 case 2:
                    $col_name = 'o.plan_id';
                    break;
                    
                case 3:
                    $col_name = 'o.company_note';
                    break;    
                    
                case 5:
                    $col_name = 'o.name_on_delivery';
                    break;
                    
                case 8:
                    $col_name ='o.delivery_date';
                    break;
                case 10:
                    // o.delivery_date
                    $col_name = 'd.full_name';
                    break;
                case 11:
                    $col_name = 'v.full_name';
                    break;
                case 12:
                    $col_name = 'o.assign_date';
                    break;
                
                case 14:
                    $col_name = 'o.delivered_date';
                    break;
                   
                default:
                    $col_name = null;
                    break;
            }
        }
        //end sorting
// $where .=' "';

// echo 'wheree::'.$where;
// echo '<br> AND col:'.$col_name;

        $report_data =  $this->order_model->get_orders_where_big_test($where, $start, $length, $col_name, $order_dir);
        // dd($report_data);
       
        if(count($report_data) > 0){
            $response['success'] = true;
            $response['data'] = $report_data;
            $response['draw'] = $this->input->post('draw');
            $response['recordsTotal'] = $this->order_model->get_total_results_new($where);
            $response['recordsFiltered'] = $response['recordsTotal'];
        }
        

        echo json_encode($response);
        //  $this->load->view('driver_delivery_report_new_view', $response);
    
    }
    
    public function get_driver_report_all_(){
        // echo 'hi';
        // die();
         $this->load->view('driver_delivery_report_new_view');
    }
    
    
    
    
    //TESTINGGGGGGGGGGGGGGGGGGGGGG
    
     public function userdashboardxyz($f_date = null, $t_date = null)
    {
        $data = array();

        //if null
        $f_date = $f_date == null ? date('Y-m-d') : $f_date;
        $t_date = $t_date == null ? date('Y-m-d') : $t_date;
        date('D/M/Y h:i:s', $date);
        
        
        // $f_date='2019_06_14';
        
        // $f_date='2022-02-01';
        // $t_date='2022-02-16';
        //  $f_date = date('Y-m-d',strtotime($f_date));
        // $t_date = date('Y-m-d',strtotime($t_date));
        
        // echo $f_date.'-'.$t_date;
        // die();
        
        // TAHA if($this->session->userdata('role') == 'admin')
        
        if($this->session->userdata('role') != 'vendor')
        {
            $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
            
            if($this->session->userdata('role') == 'admin'){
            $data['get_deliveries_data_2021_04_01_from_2021_07_31'] = $this->DM->get_deliveries_data_2021_04_01_from_2021_07_31($f_date, $t_date);
            $data['get_deliveries_data_2020_09_04_from_2021_03_31'] = $this->DM->get_deliveries_data_2020_09_04_from_2021_03_31($f_date, $t_date);
            $data['get_deliveries_data_2019_06_14_from_2020_09_03'] = $this->DM->get_deliveries_data_2019_06_14_from_2020_09_03($f_date, $t_date);
            
            
            $data['get_deliveries_data_2021_08_01_from_2021_10_31'] = $this->DM->get_deliveries_data_2021_08_01_from_2021_10_31($f_date, $t_date);
            $data['get_deliveries_data_2021_11_01_from_2022_01_31'] = $this->DM->get_deliveries_data_2021_11_01_from_2022_01_31($f_date, $t_date);
           
             }
           
            $data['drivers'] = $this->DM->get_drivers($f_date, $t_date);
            $data['partners'] = $this->DM->get_vendors($f_date, $t_date);
            $data['undeliveries'] = $this->DM->get_un_deliveries($f_date, $t_date);
            
            if($this->session->userdata('role') == 'admin'){
            $data['get_un_deliveries_data_2021_04_01_from_2021_07_31'] = $this->DM->get_un_deliveries_data_2021_04_01_from_2021_07_31($f_date, $t_date);
            $data['get_un_deliveries_data_2020_09_04_from_2021_03_31'] = $this->DM->get_un_deliveries_data_2020_09_04_from_2021_03_31($f_date, $t_date);
            $data['get_un_deliveries_data_2019_06_14_from_2020_09_03'] = $this->DM->get_un_deliveries_data_2019_06_14_from_2020_09_03($f_date, $t_date);
           
                            
            $data['get_un_deliveries_data_2021_08_01_from_2021_10_31'] = $this->DM->get_un_deliveries_data_2021_08_01_from_2021_10_31($f_date, $t_date);
            $data['get_un_deliveries_data_2021_11_01_from_2022_01_31'] = $this->DM->get_un_deliveries_data_2021_11_01_from_2022_01_31($f_date, $t_date);
           
                
            }
            $data['asdeliveries'] = $this->DM->get_as_deliveries($f_date, $t_date);
            
            if($this->session->userdata('role') == 'admin'){
                $data['asdeliveries_data_2021_04_01_from_2021_07_31'] = $this->DM->asdeliveries_data_2021_04_01_from_2021_07_31($f_date, $t_date);
                $data['asdeliveries_data_2020_09_04_from_2021_03_31'] = $this->DM->asdeliveries_data_2020_09_04_from_2021_03_31($f_date, $t_date);
                $data['asdeliveries_data_2019_06_14_from_2020_09_03'] = $this->DM->asdeliveries_data_2019_06_14_from_2020_09_03($f_date, $t_date);
                
                $data['asdeliveries_data_2021_08_01_from_2021_10_31'] = $this->DM->asdeliveries_data_2021_08_01_from_2021_10_31($f_date, $t_date);
                $data['asdeliveries_data_2021_11_01_from_2022_01_31'] = $this->DM->asdeliveries_data_2021_11_01_from_2022_01_31($f_date, $t_date);
           
                
                $data['get_all_inshiped'] = $this->DM->get_all_inshiped($f_date, $t_date);
           
                
            }
            $data['unbags'] = $this->DM->get_v_unbags($f_date, $t_date);
            $data['asbags'] = $this->DM->get_v_asbags($f_date, $t_date);
            $data['customers'] = $this->DM->get_customers($f_date, $t_date);
            $data['bags'] = $this->DM->get_v_bags($f_date, $t_date);
            
            $data['cashs'] = $this->DM->get_v_cashs($f_date, $t_date);
             $data['ascashs'] = $this->DM->get_v_ascashs($f_date, $t_date);
              $data['uncashs'] = $this->DM->get_v_uncashs($f_date, $t_date);
              $data['positive_fb']=$this->DM->get_positive_fb_count($f_date, $t_date);
              $data['negative_fb']=$this->DM->get_negative_fb_count($f_date, $t_date);
              
              $data['revenue']=$this->DM->get_revenue($f_date, $t_date);
            
              if($this->session->userdata('role') == 'admin'){
                $data['get_revenue_data_2021_04_01_from_2021_07_31'] = $this->DM->get_revenue_data_2021_04_01_from_2021_07_31($f_date, $t_date);
                //   dd($data);
                $data['get_revenue_data_2020_09_04_from_2021_03_31'] = $this->DM->get_revenue_data_2020_09_04_from_2021_03_31($f_date, $t_date);
                $data['get_revenue_data_2019_06_14_from_2020_09_03'] = $this->DM->get_revenue_data_2019_06_14_from_2020_09_03($f_date, $t_date);
                
                $data['get_revenue_data_2021_08_01_from_2021_10_31'] = $this->DM->get_revenue_data_2021_08_01_from_2021_10_31($f_date, $t_date);
                $data['get_revenue_data_2021_11_01_from_2022_01_31'] = $this->DM->get_revenue_data_2021_11_01_from_2022_01_31($f_date, $t_date);
           
                  
              }
              
              $data['fuel']=$this->DM->get_fuel($f_date, $t_date);
              $data['exp']=$this->DM->get_exp($f_date, $t_date);
            
            
            
            $data['paid_canceled_deliv'] = $this->DM->get_paid_canceled_deliv($f_date, $t_date);
            $data['unpaid_canceled_deliv'] = $this->DM->get_unpaid_canceled_deliv($f_date, $t_date);
            
            if($this->session->userdata('role') == 'admin'){
                $data['paid_canc_data_2021_04_01_from_2021_07_31'] = $this->DM->paid_canc_data_2021_04_01_from_2021_07_31($f_date, $t_date);
                $data['paid_canc_data_2020_09_04_from_2021_03_31'] = $this->DM->paid_canc_data_2020_09_04_from_2021_03_31($f_date, $t_date);
                $data['paid_canc_data_2019_06_14_from_2020_09_03'] = $this->DM->paid_canc_data_2019_06_14_from_2020_09_03($f_date, $t_date);
                
                $data['paid_canc_data_2021_08_01_from_2021_10_31'] = $this->DM->paid_canc_data_2021_08_01_from_2021_10_31($f_date, $t_date);
                $data['paid_canc_data_2021_11_01_from_2022_01_31'] = $this->DM->paid_canc_data_2021_11_01_from_2022_01_31($f_date, $t_date);
           
                
                
                $data['unpaid_canc_data_2021_04_01_from_2021_07_31'] = $this->DM->unpaid_canc_data_2021_04_01_from_2021_07_31($f_date, $t_date);
                $data['unpaid_canc_data_2020_09_04_from_2021_03_31'] = $this->DM->unpaid_canc_data_2020_09_04_from_2021_03_31($f_date, $t_date);
                $data['unpaid_canc_data_2019_06_14_from_2020_09_03'] = $this->DM->unpaid_canc_data_2019_06_14_from_2020_09_03($f_date, $t_date);
                
                $data['unpaid_canc_data_2021_08_01_from_2021_10_31'] = $this->DM->unpaid_canc_data_2021_08_01_from_2021_10_31($f_date, $t_date);
                $data['unpaid_canc_data_2021_11_01_from_2022_01_31'] = $this->DM->unpaid_canc_data_2021_11_01_from_2022_01_31($f_date, $t_date);
           
                  
              }
              
              
            
             $data['cash_need_to_collect'] = $this->DM->get_cash_need_to_collected_deliv($f_date, $t_date);
             $data['cash_collected_deliv'] = $this->DM->get_cash_collected_deliv($f_date, $t_date);
             
             if($this->session->userdata('role') == 'admin'){
                $data['cash_need_data_2021_04_01_from_2021_07_31'] = $this->DM->cash_need_data_2021_04_01_from_2021_07_31($f_date, $t_date);
                $data['cash_need_data_2020_09_04_from_2021_03_31'] = $this->DM->cash_need_data_2020_09_04_from_2021_03_31($f_date, $t_date);
                $data['cash_need_data_2019_06_14_from_2020_09_03'] = $this->DM->cash_need_data_2019_06_14_from_2020_09_03($f_date, $t_date);
                
                $data['cash_need_data_2021_08_01_from_2021_10_31'] = $this->DM->cash_need_data_2021_08_01_from_2021_10_31($f_date, $t_date);
                $data['cash_need_data_2021_11_01_from_2022_01_31'] = $this->DM->cash_need_data_2021_11_01_from_2022_01_31($f_date, $t_date);
           
                
                
                $data['cash_coll_data_2021_04_01_from_2021_07_31'] = $this->DM->cash_coll_data_2021_04_01_from_2021_07_31($f_date, $t_date);
                $data['cash_coll_data_2020_09_04_from_2021_03_31'] = $this->DM->cash_coll_data_2020_09_04_from_2021_03_31($f_date, $t_date);
                $data['cash_coll_data_2019_06_14_from_2020_09_03'] = $this->DM->cash_coll_data_2019_06_14_from_2020_09_03($f_date, $t_date);
                
                $data['cash_coll_data_2021_08_01_from_2021_10_31'] = $this->DM->cash_coll_data_2021_08_01_from_2021_10_31($f_date, $t_date);
                $data['cash_coll_data_2021_11_01_from_2022_01_31'] = $this->DM->cash_coll_data_2021_11_01_from_2022_01_31($f_date, $t_date);
           
                  
              }
             
            
              $data['revenue_bag']=$this->DM->get_revenue_from_bags($f_date, $t_date);
        //     echo '<pre>';
        // print_r($data);
        // die();
        }
        
         if($this->session->userdata('role') == 'vendor'){
              $data['undeliveries'] = $this->DM->get_un_deliveries($f_date, $t_date);
            $data['asdeliveries'] = $this->DM->get_as_deliveries($f_date, $t_date);
            $data['unbags'] = $this->DM->get_v_unbags($f_date, $t_date);
            $data['asbags'] = $this->DM->get_v_asbags($f_date, $t_date);
             
              $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
              $data['customers'] = $this->DM->get_customers($f_date, $t_date);
              $data['bags'] = $this->DM->get_v_bags($f_date, $t_date);
            //   echo '<pre>';
            //   print_r($data);
             // die();
         }
        
        // dd($data);
        $this->load->view('index_all', $data);

    }
    
    
    //TESTINGGGGGGG ENDDDDDD
    
    
    
    
}

?>