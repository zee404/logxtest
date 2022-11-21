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
        $this->load->view('user/login', $data=null);
    }
    public function userdashboard($f_date = null, $t_date = null)
    {
        //die($f_date.'****'.$t_date);
        $data['deliveries'] = $this->DM->get_deliveries($f_date, $t_date);
        $data['users'] = $this->DM->get_users($f_date, $t_date);
        
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
    // print_r($where);
               
            // if(!empty($this->input->post('driver_id'))){
            //     $result = $this->user_auth->login($where, $this->input->post('driver_id'));
            //     echo "called";
            //      exit();
            // }
            // else{
                // echo "call";
                // exit();
                $result = $this->user_auth->login($where);
                
            // }
// var_dump($result);
// die();
            // print_r($result);
            //     exit();
            if ($result){
                // If user is validated
                $session_data = array(
                    'u_id' => $result->id,
                    'email' => $result->email,
                    'phone' => $result->phone,
                    'name' => $result->full_name,
                    'role' => $result->role,
                    'role_id' => $result->role_id,
                    'modules' => $result->modules,
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
}

?>