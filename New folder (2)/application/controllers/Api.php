<?php
// PAD API FOR RIDER AND CLIENT

require(APPPATH.'/libraries/REST_Controller.php');

class Api extends REST_Controller {

//1. Compulsory (error, status and message)
//2. Optional (data) --> API dependant

    /*Order Status
    =Not Assign
    =Assign
    =Ship
    =Delivered
    =Cancel
    =Return
    */
    /***************************************************************************/
    /***********************COMMON API FOR DRIVER & CUSTOMER********************/
    /***************************************************************************/
      
    function social_sign_up_post() {
     
        
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('status'=>400, 'error'=>true);

        if (isset($_POST['full_name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['social_site_id']) && isset($_POST['social_site']) && isset($_POST['profile_image_url']) && isset($_POST['code']) )
        {
            $name = $this->post('full_name');
            $phone = $this->post('phone');
            $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$phone))));
            $email = $this->post('email');
            $social_site_id = $this->post('social_site_id');
            $social_site = $this->post('social_site');
            $profile_image_url = $this->post('profile_image_url');
            $code = $this->post('code');
            $device_token = $this->post('device_token');
            $where = array('phone'=>$phone,'code'=>$code);

            $fields =  array(
                "full_name" => $name,
                "phone" => $phone,
                "email" => $email,
                "social_site_id" => $social_site_id,
                "social_site" => $social_site,
                "profile_image_url" => $profile_image_url,
                "status" => 1
            );

            if($device_token != ''){
                //delete if token already exiting
                //$this->driver_model->update(array('device_token' => ''), array('device_token' => $device_token));
                $fields['device_token'] = $device_token;
            }

            $res = $this->driver_model->update($fields, $where);
            if($res){
                $where = array('u.phone'=>$phone,'u.social_site_id'=>$social_site_id,'u.status'=>1);
                $result =  $this->customer_model->api_login($where);
                if(count($result) > 0){
                    //generate token
                    $auth_token = generate_token();
                    $session_data = array('auth_token' => $auth_token, 'start' => time(), 'expire'=> time() + intval(API_SESSION_EXPIRY * 60) );
                    $this->session->set_userdata($session_data);

                    $response['status'] = 200;
                    $response['error'] = false;
                    $response['message'] = "Social Login Successful";
                    $response['data']['auth_token'] = $auth_token;
                    $response['data']['images_path'] = IMAGE_PATH;
                    $response['data']['user'] = $result[0];

                    echo json_encode($response);
                }
            }else{
                $response['message'] = "Given credentials are not exist";
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    function social_login_post() {
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('status'=>400, 'error'=>true);

        if(isset($_POST['social_site_id'])) {
            $social_site_id = $this->post('social_site_id');
            $where_ = array('u.social_site_id'=>$social_site_id, 'u.status'=>1);
            $result =  $this->customer_model->api_login($where_);
            if (count($result) > 0) {

                $device_token = $this->post('device_token');
                if($device_token != ''){
                    //delete if token already exiting
                    //$this->driver_model->update(array('device_token' => ''), array('device_token' => $device_token));

                    $where = array('social_site_id' => $social_site_id);
                    $fields = array("device_token" => $device_token);
                    $this->driver_model->update($fields, $where);
                }


                //generate token
                $auth_token = generate_token();
                $session_data = array('auth_token' => $auth_token, 'start' => time(), 'expire'=> time() + intval(API_SESSION_EXPIRY * 60) );
                $this->session->set_userdata($session_data);

                $response['status'] = 200;
                $response['error'] = false;
                $response['message'] = "Social Login Successful";
                $response['data']['auth_token'] = $auth_token;
                $response['data']['images_path'] = IMAGE_PATH;
                $response['data']['user'] = $result[0];
                echo json_encode($response);
            } else {
                $response['message'] = "Given credentials are not exist";
                echo json_encode($response);
            }
        }else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }

    }

    /*for SingUp*/
    function sign_up_post(){
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('status'=>400, 'error'=>true);

        if (isset($_POST['full_name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['code']) )
        {
            $name = $this->post('full_name');
            $phone = $this->post('phone');
            $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$phone))));
            $email = $this->post('email');
            $password = $this->post('password');
            $address = $this->post('address');
            $code = $this->post('code');
            $device_token = $this->post('device_token');
            $where = array('phone'=>$phone,'code'=>$code);

            $fields =  array(
                
                
                "password" => md5($password),
               
                "status" => 1
            );

            if($device_token != ''){
                $fields['device_token'] = $device_token;
                //delete device token if already exist
                //$this->driver_model->update(array('device_token' => ''), array('device_token' => $device_token));

            }

            $res = $this->driver_model->update($fields, $where);
            if($res){

                $where_ = array('u.phone'=>$phone,'u.password'=>md5($password),'u.status'=>1);
                $result =  $this->customer_model->api_login($where_);
                if(count($result) > 0){
                    //generate token
                    $auth_token = generate_token();
                    $session_data = array('auth_token' => $auth_token, 'start' => time(), 'expire'=> time() + intval(API_SESSION_EXPIRY * 60) );
                    $this->session->set_userdata($session_data);

                    $response['status'] = 200;
                    $response['error'] = false;
                    $response['message'] = "Login Successful";
                    $response['data']['auth_token'] = $auth_token;
                    $response['data']['images_path'] = IMAGE_PATH;
                    $response['data']['user'] = $result[0];
                    echo json_encode($response);
                }
            }else{
                $response['message'] = "Phone or code is not correct";
                echo json_encode($response);
            }
        }else{
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    public function login_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        if (((isset($_POST['phone'])) && (isset($_POST['password'])) ) ){
            
            $version_user=$_POST['versions'];
            
            $OS=$_POST['os'];
            
            
            if($OS =='ios'){
                
              if($version_user == '3.0' OR $version_user == '2.9'){
                 $version_check=true;}else{
                 $version_check=false;}
                 
            }else if($OS =='android'){
                 
                 if($version_user == '2.9' OR $version_user == '2.8'){
                 $version_check=true;}else{
                 $version_check=false;}
                 
            }else{
                $version_check=false;
            }
            
            
            
            if($version_check){
                
                
            $phone = $_POST['phone'];
            $phone = str_replace(' ','',$phone);
            $phone = str_replace('+','',$phone);
            $device_token = @$_POST['device_token'];
            $password = $this->input->post('password');//md5($_POST['password']);
            //$where = array('u.phone'=>$phone,'u.password_partner'=>$password,'u.status'=>1);
            $where = array('u.phone'=>$phone,'u.password_partner'=>$password);
            $result =  $this->customer_model->api_login($where);
                // $temp['user'] = $result[0];
                // echo json_encode(array("status"=>200, "error"=>false, "message"=>"Login Successful", "data"=>$temp));
                // die();
            if($device_token != ''){
                //delete if token already exiting
                //$this->driver_model->update(array('device_token' => ''), array('device_token' => $device_token));

                //update device_token
                // $where_ = array('phone'=>$phone,'password'=>$password,'status'=>1);
                // $where_ = array('phone'=>$phone,'password'=>$password);
                
                 // i change password with password_partner
                $where_ = array('phone'=>$phone,'password_partner'=>$password);
                $fields = array("device_token" => $device_token);
                $this->driver_model->update($fields, $where_);
            }

            if(count($result) > 0){
                // If user is validated
                //auth-token
                $auth_token = generate_token();
                $session_data = array('auth_token' => $auth_token, 'start' => time(), 'expire'=> time() + intval(API_SESSION_EXPIRY * 60) );
                $this->session->set_userdata($session_data);

                $temp['auth_token'] = $auth_token;
                $temp['images_path'] = IMAGE_PATH;
                $temp['auth_token'] = $auth_token;
                $temp['user'] = $result[0];
                echo json_encode(array("status"=>200, "error"=>false, "message"=>"Login Successful", "data"=>$temp));
            }else{
                echo json_encode(array("status"=>400, "error"=>true, "message"=>"Invalid Phone or Password"));
            }
            
            
            
            }else{
                echo json_encode(array("status"=>400, "error"=>true, "message"=>"You're using an old version of Logx that's no longer supported. Please update to the newest App version. Thanks!"));
            }
        }else{
            echo json_encode(array("status"=>400, "error"=>true, "message"=>"Can not Access"));
        }
    }


        /*verify code for signUp*/
    function verify_code_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('status'=>400, 'error'=>true);
        if ( (isset($_POST['phone'])) && (isset($_POST['code'])))
        {
            $phone = $_POST['phone'];
            $code = $_POST['code'];
            $where = array('u.phone'=>$phone,'u.code'=>$code);
            $result =  $this->customer_model->api_login($where);
            if (count($result) > 0 ){
                $response['status'] = 200;
                $response['error'] = false;
                $response['message'] = "Code is correct";
                $response['data']['role'] = $result[0]->role;
                echo json_encode($response);
            } else {
                $response['message'] = "Phone or code is not correct";
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    /* for Reset Password get code*/
    function forgot_password_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        if(isset($_POST['phone'])){
            $phone = $_POST['phone'];
            $where = array('phone'=>$phone,'status'=>1);
            $result =  $this->driver_model->get_where($where);
            if(count($result) > 0){
                //send message on mobile
                 $msg = 'Your code is '.$result[0]->code;
               //  send_expert_sms($phone,$msg);
                echo json_encode(array("status"=>200, "error"=>false, "message"=>"Code has been send to your mobile number-".$result[0]->code));
            }else{
                echo json_encode(array("status"=>400, "error"=>true, "message"=>"Invalid phone OR not registered"));
            }
        }else{
            echo json_encode(array("status"=>400, "error"=>true, "message"=>"Can not Access"));
        }
    }

    /*change password*/
    public function reset_password_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        if ( (isset($_POST['phone'])) && (isset($_POST['code'])) && (isset($_POST['new_pass'])))
        {
            $phone = $_POST['phone'];
            $new_pass = $_POST['new_pass'];
            $code = $_POST['code'];
            $where = array('phone'=>$phone,'code'=>$code,'status'=>1);
            $result =  $this->driver_model->get_where($where);
            if (count($result) > 0 ){
                $this->driver_model->update(array('password'=>md5($new_pass)), $where);
                echo json_encode(array("status"=>200, "error"=>false, "message"=>"Password Changed Successfully!"));
            } else {
                echo json_encode(array("status"=>400, "error"=>true, "message"=>"Code Not Matched"));
            }
        } else {
            echo json_encode(array("status"=>400, "error"=>true, "message"=>"Can not Access"));
        }
    }


    /*change password*/
    public function change_password_post()
    {
        $response = array('status'=>400, 'error'=>true);
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        //$this->is_session_exist($headers['Auth_token']);

        if ( (isset($_POST['user_id'])) && (isset($_POST['old_password'])) && (isset($_POST['new_password'])))
        {
            $user_id = $_POST['user_id'];
            $old_pass = md5($_POST['old_password']);
            $new_pass = md5($_POST['new_password']);

            $where = array('id'=>$user_id,'password'=>$old_pass,'status'=>1);
            $result =  $this->driver_model->get_where($where);
            if (count($result) > 0 ){
                $this->driver_model->update(array('password'=>$new_pass), $where);
                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = "Password Changed Successfully!";
                $response['data']['auth_token'] = $headers['auth_token'];

                echo json_encode($response);
            } else {
                $response['message'] = "User or password not valid";
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    //update profile
    public function update_profile_post(){
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
    //    //$this->is_session_exist($headers['Auth_token']);

        $response = array('status'=>400, 'error'=>true);

        if (isset($_POST['user_id']) && isset($_FILES['profile_pic']['tmp_name']) && $_FILES['profile_pic']['tmp_name'])
        {

            $user_id = $_POST['user_id'];
            $profile_img = '';
            //if(isset($_FILES['profile_pic']['tmp_name']) && $_FILES['profile_pic']['tmp_name']) {
                    $temp_name = mt_rand(100, 10000) . 'profile-img';
                    $profile_img = $this->upload_image($user_id, @$_FILES['profile_pic']['tmp_name'], @$_FILES['profile_pic']['name'], $temp_name);
            //}

//            $name = $this->post('full_name');
//            $email = $this->post('email');
//            $address = $this->post('address');
            $profile = $profile_img;
            $user_id = $_POST['user_id'];
            $where = array('id'=>$user_id);

            $fields =  array(
//                "full_name" => $name,
//                "email" => $email,
//                "address" => $address,
                "profile_image_url" => IMAGE_PATH.'/'.$profile
            );
            $res = $this->driver_model->update($fields, $where);
            if($res){

                $where = array('id'=>$user_id);
                $result =  $this->driver_model->get_where($where);
                if(count($result) > 0){
                    $response['status'] = 200;
                    $response['error'] = false;
                    $response['message'] = "Profile updated successfully";
                    $response['data']['images_path'] = IMAGE_PATH;
                    $response['data']['user'] = $result[0];
                    echo json_encode($response);
                }
            }else{
                $response['message'] = "User is not exist";
                echo json_encode($response);
            }
        }else{
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    public function update_device_token_post(){
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
     //   //$this->is_session_exist($headers['Auth_token']);
        $response = array('status'=>400, 'error'=>true);

        if (isset($_POST['user_id']) && isset($_POST['device_token']))
        {

            $user_id = $_POST['user_id'];
            $device_token = $_POST['device_token'];
            $where = array('id'=>$user_id);

            //delete if token already exiting
            //$this->driver_model->update(array('device_token'=>''), array('device_token'=>$device_token));

            $fields =  array(
                "device_token" => $device_token
            );
            $res = $this->driver_model->update($fields, $where);
            if($res){

                $where = array('id'=>$user_id);
                $result =  $this->driver_model->get_where($where);
                if(count($result) > 0){
                    $response['status'] = 200;
                    $response['error'] = false;
                    $response['message'] = "Device token updated successfully";
                    $response['data']['images_path'] = IMAGE_PATH;
                    $response['data']['user'] = $result[0];
                    echo json_encode($response);
                }
            }else{
                $response['message'] = "User is not exist";
                echo json_encode($response);
            }
        }else{
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
    /***************************************************************************/
    /*******************************DRIVERS METHODS*****************************/
    /***************************************************************************/
    public function drivers_get()
    {
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('error'=>true, 'status'=>400);
        $result =  $this->driver_model->get_drivers();
        if($result['result']){
            $response['error'] = false;
            $response['status'] = 200;
            $response['drivers'] = $result['records'];
        }
        echo json_encode($response);
    }


    public function today_deliveries_post_15feb(){
        
        $this->load->model('Vehicle_model');
        // $this->load->model('Vehicle_model');
        
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
       
      $headers = apache_request_headers();
      $this->is_authorized($headers['X-API-KEY']);
        //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id'])){
            
            

            $response['status'] = 200;
            $response['error'] = false;
           
            $driver_id = $this->input->post('user_id');
            
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            if(!empty($this->input->post("date"))){
                $date = date('Y-m-d', strtotime($this->input->post("date")));
            
            $from_date = $date;
            $to_date =  $date;
            }
            

            //set badge count to 0
            $where_badge = array('id' => $driver_id);
            $this->user_auth->update(array('badge_count'=>1), $where_badge);

             
            $response['data']['unseen-notification'] = $this->notification_model->count_unseen($driver_id);
            $summary =  $this->order_model->get_deliveries_summary_by_driver($driver_id, $from_date, $to_date);
            $summary2 =  $this->order_model->get_deliveries_by_picked($driver_id, $from_date, $to_date);
            $segments =  $this->order_model->get_deliveries_segments_by_date($driver_id, $from_date, $to_date);
            
            $cash_collection =  $this->cash_model->get_cash_collection_summary_by_date($driver_id, $from_date, $to_date);
            $response['data']['today_cash'][] = $cash_collection[0];
           
             $check_vehicle = $this->Vehicle_model->get_vehicle_Registration_num($driver_id);
             if($check_vehicle){
                 $check_vehicle -> scan ='yes';
             }else{
                 
                //  sami bhae
                //  $check_vehicle -> scan ='No';
                $check_vehicle -> scan ='yes';
             }
             
             
              $response['data']['vehicle_status'][] = $check_vehicle;
              
             
            if(empty($segments)){
                $segments = array("total"=>"",
                                  "bag_received"=>"",
                                  "delivery_img"=>"",
                                  "completed"=>"",
                                  "vendor_id"=>"",
                                  "email"=>"",
                                  "full_name"=>"",
                                  "address"=>"",
                                  "assigned"=>"",
                                  "picked"=>""
                                  
                                  );
            }
            $bag_collection =  $this->bag_model->get_bags_collection_summary_by_date($driver_id, $from_date, $to_date);
            if (count($bag_collection) > 0){
                $response['data']['today_bags_collection'] = $bag_collection;
            } else {
                $response['data']['today_bags_collection'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
            }

            if (isset($summary[0]->date)){
                $response['message'] = "Deliveries for today are etc";
                $summary[0]->vendor_statistics = $segments;
                $response['data']['today_deliveries'] = $summary[0];
                $response['data']['today_bags_status'] = $summary2[0];
                echo json_encode($response);
            } else {
                $response['message'] = "You have not assigned any deliveries right now. You will get a notification when admin will assign you deliveries for today.";
                $response['data']['today_deliveries'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
    
     public function today_deliveries_post(){
        
        $this->load->model('Vehicle_model');
        // $this->load->model('Vehicle_model');
        
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
       
      $headers = apache_request_headers();
      $this->is_authorized($headers['X-API-KEY']);
        //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id'])){
            
            

            $response['status'] = 200;
            $response['error'] = false;
           
            $driver_id = $this->input->post('user_id');
            
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            if(!empty($this->input->post("date"))){
                $date = date('Y-m-d', strtotime($this->input->post("date")));
            
            $from_date = $date;
            $to_date =  $date;
            }
            

            //set badge count to 0
            $where_badge = array('id' => $driver_id);
            $this->user_auth->update(array('badge_count'=>1), $where_badge);

             
            $response['data']['unseen-notification'] = $this->notification_model->count_unseen($driver_id);
            $summary =  $this->order_model->get_deliveries_summary_by_driver($driver_id, $from_date, $to_date);
            $summary2 =  $this->order_model->get_deliveries_by_picked($driver_id, $from_date, $to_date);
            $segments =  $this->order_model->get_deliveries_segments_by_date($driver_id, $from_date, $to_date);
            $time_slots= $this->order_model->get_timeslot_segments_by_date($driver_id, $from_date, $to_date);
            
            $cash_collection =  $this->cash_model->get_cash_collection_summary_by_date($driver_id, $from_date, $to_date);
            $response['data']['today_cash'][] = $cash_collection[0];
           
             $check_vehicle = $this->Vehicle_model->get_vehicle_Registration_num($driver_id);
             if($check_vehicle){
                 $check_vehicle -> scan ='yes';
             }else{
                 
                //  sami bhae
                //  $check_vehicle -> scan ='No';
                $check_vehicle -> scan ='yes';
             }
             
             
              $response['data']['vehicle_status'][] = $check_vehicle;
              
             
            if(empty($segments)){
                $segments = array("total"=>"",
                                  "bag_received"=>"",
                                  "delivery_img"=>"",
                                  "completed"=>"",
                                  "vendor_id"=>"",
                                  "email"=>"",
                                  "full_name"=>"",
                                  "address"=>"",
                                  "assigned"=>"",
                                  "picked"=>""
                                  
                                  );
            }
            $bag_collection =  $this->bag_model->get_bags_collection_summary_by_date($driver_id, $from_date, $to_date);
            if (count($bag_collection) > 0){
                $response['data']['today_bags_collection'] = $bag_collection;
            } else {
                $response['data']['today_bags_collection'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
            }

            if (isset($summary[0]->date)){
                $response['message'] = "Deliveries for today are etc";
                $summary[0]->vendor_statistics = $segments;
                 $summary[0]->timeslot_statistics = $time_slots;
                $response['data']['today_deliveries'] = $summary[0];
                $response['data']['today_bags_status'] = $summary2[0];
              
                echo json_encode($response);
            } else {
                $response['message'] = "You have not assigned any deliveries right now. You will get a notification when admin will assign you deliveries for today.";
                $response['data']['today_deliveries'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0" , 'canceled_deliv' => "0"];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    public function last_week_deliveries_post(){
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
      //  //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id'])){
            $response['status'] = 200;
            $response['error'] = false;
            $temp = array();
            $driver_id = $_POST['user_id'];
            for($i=0; $i<7; $i++){
                $from_date = date('Y-m-d', strtotime('-'.$i.' days'));
                $summary =  $this->order_model->get_deliveries_summary_by_driver($driver_id, $from_date, $from_date);
                $segments =  $this->order_model->get_deliveries_segments_by_date($driver_id, $from_date, $from_date);
                $summary[0]->vendor_statistics = $segments;
                $summary[0]->date = date('d-m-Y', strtotime('-'.$i.' days'));
                array_push($temp, $summary[0]);
            }

            if (count($temp) > 0 ){
                $response['message'] = "Deliveries for last 7 days are etc";
                $response['data']['deliveries'] = $temp;
                echo json_encode($response);
            } else {
                $response['message'] = "Driver is not exist";
                $response['data']['deliveries'] = [];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    // DEPRECATED

 // public function pick_bags_postX(){
 //        $response = array('status'=>400, 'error'=>true);

 //        $data = json_decode(file_get_contents('php://input'), true);
 //        $_POST = $data;
 //        $headers = apache_request_headers();
 //        $this->is_authorized($headers['X-API-KEY']);
 //      //  //$this->is_session_exist($headers['Auth_token']);

 //        if (isset($_POST['user_id']) and isset($_POST["qrcode"])){
 //            $response['status'] = 200;
 //            $response['error'] = false;
 //            $temp = array();
 //            $driver_id = $_POST['user_id'];
 //            $qr = $_POST['qrcode'];
 //            $assignment =  $this->order_model->getOrderDataAssignment($driver_id, $qr);
           
 //           if ($assignment==TRUE and !empty($assignment)){
 //                $status = 3;
 //                $qrid = $assignment[0]["qrid"];
 //                $order_id=$assignment[0]["order_id"];
 //                $picked =  $this->order_model->updateTrackBag($qrid,$status);
 //                if($picked){
 //                    $res=$this->order_model->update_driver_scan($order_id);
 //                    if($res){
 //                          $response['message'] = "Bag picked from warehouse.";
 //                    }else{
 //                        $response['message'] = "Bag picked from warehouse status update at qr status only! some issue.";
 //                    }
 //                echo json_encode($response);
 //                }
 //            } else {
 //                $response['message'] = "Either Bag is already collected or not assign to you.";
               
 //                echo json_encode($response);
 //            }
 //        } else {
 //            $response['message'] = "Can not Access";
 //            echo json_encode($response);
 //        }
 //    }
 


 public function pick_bags_post(){
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
      //  //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) and isset($_POST["qrcode"])){
            $response['status'] = 200;
            $response['error'] = false;
            $temp = array();
            $driver_id = $_POST['user_id'];
            $qr = $_POST['qrcode'];
            $assignment =  $this->order_model->getOrderDataAssignment($driver_id, $qr);
           
           if ($assignment==TRUE and !empty($assignment)){
                $status = 3;
                $qrid = $assignment[0]["qrid"];
                $order_id=$assignment[0]["order_id"];
                $picked =  $this->order_model->updateTrackBag($qrid,$status);
                if($picked){
                    $res=$this->order_model->update_driver_scan($order_id,$qr);
                    if($res){
                          $response['message'] = "Bag is picked from warehouse by driver.";
                    }else{
                        $response['message'] = "Bag picked from warehouse status update at qr status only! some issue.";
                    }
                echo json_encode($response);
                }
            }else {
                
                 $current_status=$this->order_model->get_qr_current_status($qr);
                 
                   if($current_status[0]->driver_name ==''){
                     $driver_name='Not Assigned';
                        }else{
                          $driver_name=$current_status[0]->driver_name;
                               }
                               
                     if($current_status[0]->customer_name ==''){
                     $customer_name='Not Assigned';
                        }else{
                          $customer_name=$current_status[0]->customer_name;
                               }           
                 
                $response['message'] = "Either Bag is already collected or not assigned to you. \n Current status: ".$current_status[0]->qr_status." \n Code: ".$qr."\nCustomer: ".$customer_name."\nDriver: ".$driver_name;
               
                echo json_encode($response);
            }
        }else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }




    public function vendor_deliveries_post(){
        $this->load->model('Vehicle_model');
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
      // print_r($data);
       //die();
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) && isset($_POST['vendor_id']) && isset($_POST['date'])){

            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $_POST['user_id'];
            $vendor_id = $_POST['vendor_id'];
            $date = $_POST['date'];
            $result =  $this->order_model->get_vendor_deliveries($driver_id, $vendor_id, $date);
        
        
        
            $response['data']['check'] = $result;
            $bg_recived = $result[0]->bag_received;
            
            
            // to validate driver before starts a delivery must scan a van and allot this to him
              $check_vehicle = $this->Vehicle_model->get_vehicle_Registration_num($driver_id);
             if($check_vehicle){
                 $check_vehicle -> scan ='yes';
             }else{
                //  sami bhae
                //  $check_vehicle -> scan ='No';
                $check_vehicle -> scan ='yes';
             }
            
            foreach($result as $key => $val){
               if($val->send_notification =='yes'){
                     $val->send_notification ='Yes';
                   }
                   
                   $val->scan=$check_vehicle -> scan;
              }
            
            // if($result[0]->send_notification =='yes'){
            //     $result[0]->send_notification ='Yes';
            // }
            // if($bg_recived ==0){
              
            //   $this->order_model->send_mail($result);
            // }
            
            $summary2 =  $this->order_model->get_deliveries_by_picked2($driver_id, $vendor_id, $date);
            if (count($result) > 0 ){
                for($i=0; $i<count($result); $i++){
                    $result[$i]->geom = get_google_geocode($result[$i]->address);
                }
                $response['message'] = "Deliveries List of a vendor are etc";
                $response['data']['deliveries'] = $result;
                $response['data']['today_bags_status'] = $summary2[0];
                
                
              
             
             
            //   $response['data']['vehicle_status'][] = $check_vehicle;
                echo json_encode($response);
            } else {
                $response['message'] = "Deliveries are not exist";
                $response['data']['deliveries'] = $result;
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
    
    
    // AYESHA TEST
     public function TEST_vendor_deliveries_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
      // print_r($data);
       //die();
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) && isset($_POST['vendor_id']) && isset($_POST['date'])){

            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $_POST['user_id'];
            $vendor_id = $_POST['vendor_id'];
            $date = $_POST['date'];
            $result =  $this->order_model->get_vendor_deliveries($driver_id, $vendor_id, $date);
            
           // echo 'i am:'.$result[0]->bag_received;
            $bg_recived = $result[0]->bag_received;
            if($bg_recived ==0){
                echo 'YES'.$vendor_id;
               $email=$result[0]->vendor_email;
               echo '<br />email:'.$email;
              $this->order_model->send_mail($result,$email);
            }
            
            
            $response['data']['check'] = $result;
            if($result[0]->send_notification =='yes'){
                $result[0]->send_notification ='Yes';
            }
            
           
            $summary2 =  $this->order_model->get_deliveries_by_picked2($driver_id, $vendor_id, $date);
            if (count($result) > 0 ){
                for($i=0; $i<count($result); $i++){
                    $result[$i]->geom = get_google_geocode($result[$i]->address);
                }
                $response['message'] = "Deliveries List of a vendor are etc";
                $response['data']['deliveries'] = $result;
                $response['data']['today_bags_status'] = $summary2[0];
                echo json_encode($response);
            } else {
                $response['message'] = "Deliveries are not exist";
                $response['data']['deliveries'] = $result;
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
    
    /*END*/
    
        public function extra_bags_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['driver_id'])){

            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $_POST['driver_id'];
            $date = date("Y-m-d");
           
            $result =  $this->order_model->get_extra_bags($driver_id,$date);
           
            if (count($result) > 0 ){
                
                $response['message'] = "Extra Bags List is following.";
                $response['data']['extraBags'] = $result;
                echo json_encode($response);
            } else {
                $response['message'] = "No Extra Bag Found Today.";
                $response['data']['extraBags'] = $result;
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
    // new web services phase 3
    public function vendor_wise_deliveries_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['vendor_id']) && isset($_POST['date'])){

            $response['status'] = 200;
            $response['error'] = false;
          
            $vendor_id = $_POST['vendor_id'];
            $date = $_POST['date'];
            $result =  $this->order_model->get_vendor_wise_deliveries($vendor_id, $date);
            if (count($result) > 0 ){
                
                $response['message'] = "Deliveries List of a vendor are etc";
                $response['data']['deliveries'] = $result;
               
                echo json_encode($response);
            } else {
                $response['message'] = "Deliveries does not exist";
                $response['data']['deliveries'] = $result;
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
  //   DEPRECATED   

     // public function attach_qr_postX(){
  //       $response = array('status'=>400, 'error'=>true);
  // //  $data = file_get_contents('php://input', 'r');
   
  //      $data = json_decode(file_get_contents('php://input'), true);
        
  //       $_POST = $data;
  //       $headers = apache_request_headers();
  //       $this->is_authorized($headers['X-API-KEY']);
  //      // //$this->is_session_exist($headers['Auth_token']);

  //       if (isset($_POST['user_id']) && isset($_POST['delivery_id']) && isset($_POST["qr_code"])){

  //           $response['status'] = 200;
  //           $response['error'] = false;
          
  //           $user_id = $_POST['user_id'];
  //           $code = $_POST['qr_code'];
  //           $delivery = $_POST["delivery_id"];
  //           // $result =  $this->order_model->get_qr_id($code);
  //          $result =  $this->order_model->get_qr_id_new($code,$user_id);
  //       //   $response['message'] = "test";
  //       //         $response['data']= $result;
  //       //         echo json_encode($response);
  //       //   die();
  //           if ($result){
                
                
  //               $check_neutral =  $this->order_model->check_neutral($code);
  //               if(empty($check_neutral)){
  //               $qrid = $result["qrid"];
  //               $update_id =  $this->order_model->update_del_qr($qrid,$delivery,$code);
               
  //               if($update_id){
                    
  //                   if($result["vendor_id"] ==0){
                        
  //                       $whr=['code' =>$code];
  //                       $d=['vendor_id'=>$user_id];
  //                       $update_qr_tbl=$this->order_model->update_process($d, $whr);
  //                   }
  //                    $delivery = $this->order_model->get_specific_order($delivery);
  //                   $response['message'] = "QR Code has been attached";
  //               $response['data']['delivery'] = $delivery;
               
  //               echo json_encode($response);
  //               }else {
  //               $delivery = $this->order_model->get_specific_order($delivery);
  //               if($delivery){
  //               $response['message'] = "Please Try again";
  //               $response['data']['delivery'] = $delivery;
  //               echo json_encode($response);
  //               }else{
  //                    $response['message'] = "Can not Access";
  //           echo json_encode($response);
  //               }
  //           }
  //            } else{
  //                $response['message'] = "Already Attached";
  //           echo json_encode($response);  
  //            }  
  //           }else{
  //              $response['message'] = "Can not Access erorr";
  //           echo json_encode($response);  
  //           } 
  //       } else {
  //           $response['message'] = "Can not Access";
  //           echo json_encode($response);
  //       }
  //   }




//         public function attach_qr_post_15feb(){
//         $response = array('status'=>400, 'error'=>true);
//   //  $data = file_get_contents('php://input', 'r');
   
//       $data = json_decode(file_get_contents('php://input'), true);
        
//         $_POST = $data;
//         $headers = apache_request_headers();
//         $this->is_authorized($headers['X-API-KEY']);
//       // //$this->is_session_exist($headers['Auth_token']);

//         if (isset($_POST['user_id']) && isset($_POST['delivery_id']) && isset($_POST["qr_code"])){

//             $response['status'] = 200;
//             $response['error'] = false;
          
//             $user_id = $_POST['user_id'];
//             $code = $_POST['qr_code'];
//             $delivery = $_POST["delivery_id"];
//             // $result =  $this->order_model->get_qr_id($code);
//           $result =  $this->order_model->get_qr_id_new($code,$user_id);
//         //   $response['message'] = "test";
//         //         $response['data']= $result;
//         //         echo json_encode($response);
//         //   die();
//             if ($result){
                
                
//                 $check_neutral =  $this->order_model->check_neutral($code);
                
                 
//                 if(empty($check_neutral)){
                    
//                     // $response['message'] = "is neutral empty!".$check_neutral;
                
//                     //  echo json_encode($response);
//                     //  die();
//                 $qrid = $result["qrid"];
//                 $update_id =  $this->order_model->update_del_qr($qrid,$delivery,$code);
               
//                 if($update_id){
                    
//                     if($result["vendor_id"] ==0){
                        
//                         $whr=['code' =>$code];
//                         $d=['vendor_id'=>$user_id];
//                         $update_qr_tbl=$this->order_model->update_process($d, $whr);
//                     }
//                      $delivery = $this->order_model->get_specific_order($delivery);
//                     $response['message'] = "QR code has been attached successfully.";
//                 $response['data']['delivery'] = $delivery;
               
//                 echo json_encode($response);
//                 }else{
                    
//                 $delivery = $this->order_model->get_specific_order($delivery);
//                 if($delivery){
//                 $response['message'] = "Please try again! ";
//                 $response['data']['delivery'] = $delivery;
//                 echo json_encode($response);
//                 }else{
//                      $response['message'] = "Can not access,because no delivery attachment found!";
//                      echo json_encode($response);
//                 }
//             }
//              }else{
                 
//                  $current_status=$this->order_model->get_qr_current_status($code);
                 
//                  if($current_status[0]->driver_name ==''){
//                      $driver_name='Not Assigned';
//                  }else{
//                      $driver_name=$current_status[0]->driver_name;
//                  }
//                  $response['message'] = "Please check QR is not neutral or already attached.\nCurrent status: ".$current_status[0]->qr_status."\nCode: ".$code."\nCustomer: ".$current_status[0]->customer_name."\nDriver: ".$driver_name;
//                  echo json_encode($response);  
//              }  
//             }else{
//               $response['message'] = "Access Denied! QR is not related to you.";
//             echo json_encode($response);  
//             } 
//         } else {
//             $response['message'] = "Access Denied!";
//             echo json_encode($response);
//         }
//     }
    
    
         public function attach_qr_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) && isset($_POST['delivery_id']) && isset($_POST["qr_code"])){

            $response['status'] = 200;
            $response['error'] = false;
          
            $user_id = $_POST['user_id'];
            $code = $_POST['qr_code'];
            $delivery = $_POST["delivery_id"];
            // $result =  $this->order_model->get_qr_id($code);
           $result =  $this->order_model->get_qr_id_new($code,$user_id);
        //   $response['message'] = "test";
        //         $response['data']= $result;
        //         echo json_encode($response);
        //   die();
            if ($result){
                
               $driver_ship_check_status= $this->order_model->check_delivery_current_status($delivery);
                
                if($driver_ship_check_status->status =="Not Assign" OR $driver_ship_check_status->status =="Assign" ){
                
                         $check_neutral =  $this->order_model->check_neutral($code);
                
                 
                        if(empty($check_neutral)){
                    
                    // $response['message'] = "is neutral empty!".$check_neutral;
                
                    //  echo json_encode($response);
                    //  die();
                $qrid = $result["qrid"];
                $update_id =  $this->order_model->update_del_qr($qrid,$delivery,$code);
               
                if($update_id){
                    
                    if($result["vendor_id"] ==0){
                        
                        $whr=['code' =>$code];
                        $d=['vendor_id'=>$user_id];
                        $update_qr_tbl=$this->order_model->update_process($d, $whr);
                    }
                     $delivery = $this->order_model->get_specific_order($delivery);
                    $response['message'] = "QR code has been attached successfully.";
                $response['data']['delivery'] = $delivery;
               
                echo json_encode($response);
                }else{
                    
                $delivery = $this->order_model->get_specific_order($delivery);
                if($delivery){
                $response['message'] = "Please try again! ";
                $response['data']['delivery'] = $delivery;
                echo json_encode($response);
                }else{
                     $response['message'] = "Can not access,because no delivery attachment found!";
                     echo json_encode($response);
                }
               }
               
               
               
               
               
                             }else{
                 
                 $current_status=$this->order_model->get_qr_current_status($code);
                 
                 if($current_status[0]->driver_name ==''){
                     $driver_name='Not Assigned';
                 }else{
                     $driver_name=$current_status[0]->driver_name;
                 }
                 $response['message'] = "Please check QR is not neutral or already attached.\nCurrent status: ".$current_status[0]->qr_status."\nCode: ".$code."\nCustomer: ".$current_status[0]->customer_name."\nDriver: ".$driver_name;
                 echo json_encode($response);  
             } 
             
             
                }else{
                    
                     $response['message'] = "You can not attach QR to this delivery.\nDelivery current status:".$driver_ship_check_status->status;
                 echo json_encode($response);  
                    
                }
             
             
    
             
             
             
            }else{
               $response['message'] = "Access Denied! QR is not related to you.";
            echo json_encode($response);  
            } 
        } else {
            $response['message'] = "Access Denied!";
            echo json_encode($response);
        }
    }
    

















//       public function update_extraBags_post_old_delafter_1week(){
//         $response = array('status'=>400, 'error'=>true);
//   //  $data = file_get_contents('php://input', 'r');
   
//       $data = json_decode(file_get_contents('php://input'), true);
//         $_POST = $data;
//         $headers = apache_request_headers();
//         $this->is_authorized($headers['X-API-KEY']);
//       // //$this->is_session_exist($headers['Auth_token']);

//         if (isset($_POST['driver_id']) && isset($_POST['extraBagId_id']) && isset($_POST["type"]) && isset($_POST["quantity"]) && isset($_POST["notes"])){

//             $response['status'] = 200;
//             $response['error'] = false;
//             $driver_id = $_POST['driver_id'];
//             $eid = $_POST['extraBagId_id'];
//             $type = $_POST["type"];
//             $quantity = $_POST["quantity"];
//             $notes = $_POST["notes"];
//             // new code
//              $qrcodes = "";
//           $qrImploded = "";
          
//           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
//             $qrcodes = $_POST['qrcodes'];
//             foreach($qrcodes as $qrcode){
//                  $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                
//                  $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected",$driver_id);
//             }
//             $qrImploded = implode(",",$qrcodes);
//             }
//             // end new code
//             $update_id =  $this->order_model->update_extar_bags($eid,$driver_id,$type,$quantity,$notes);
//                 if($update_id){
                    
//                     $response['message'] = "Data has been updated";
//                 $response['data']['is_updated'] = $update_id;
               
//                 echo json_encode($response);
//                 }else {
               
//                      $response['message'] = "Can not be updated";
//                     echo json_encode($response);
//                 }
//             }
//                 else {
//             $response['message'] = "Can not Access";
//             echo json_encode($response);
//         }
//     }
//      public function add_extraBags_post_old_delafter_1week(){
//         $response = array('status'=>400, 'error'=>true);
//   //  $data = file_get_contents('php://input', 'r');
   
//       $data = json_decode(file_get_contents('php://input'), true);
        
//         $_POST = $data;
//         $headers = apache_request_headers();
//         $this->is_authorized($headers['X-API-KEY']);
//       // //$this->is_session_exist($headers['Auth_token']);

//         if (isset($_POST['driver_id']) && isset($_POST["type"]) && isset($_POST["quantity"]) && isset($_POST["notes"])){

//             $response['status'] = 200;
//             $response['error'] = false;
          
//             $driver_id = $_POST['driver_id'];
//             $date = date("Y-m-d H:i:s");
//             $type = $_POST["type"];
//             $quantity = $_POST["quantity"];
//             $notes = $_POST["notes"];
//             // new code
//              $qrcodes = "";
//           $qrImploded = "";
          
//           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
//           //  $qrcodes = json_decode($_POST['qrcodes'],true);
//             $qrcodes = $_POST['qrcodes'];
//             foreach($qrcodes as $qrcode){
//                  $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                
//                  $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected",$driver_id);
//             }
//             $qrImploded = implode(",",$qrcodes);
//             }
//             // end new code
//             $update_id =  $this->order_model->add_extar_bags($date,$driver_id,$type,$quantity,$notes);
//                 if($update_id != false){
                    
//                     $response['message'] = "Data has been created";
//                 $response['data']['createdId'] = $update_id;
               
//                 echo json_encode($response);
//                 }else {
               
//                      $response['message'] = "Can not be created";
//                     echo json_encode($response);
//                 }
//             }
//                 else {
//             $response['message'] = "Can not Access";
//             echo json_encode($response);
//         }
//     }

 public function update_extraBags_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['driver_id']) && isset($_POST['extraBagId_id']) && isset($_POST["type"]) && isset($_POST["quantity"]) && isset($_POST["notes"])){

            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $_POST['driver_id'];
            $eid = $_POST['extraBagId_id'];
            $type = $_POST["type"];
            $quantity = $_POST["quantity"];
            $notes = $_POST["notes"];
             $vendor_id=$_POST["vendor_id"];
            
            
            // new code
             $qrcodes = "";
           $qrImploded = "";
          
           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
            $qrcodes = $_POST['qrcodes'];
            foreach($qrcodes as $qrcode){
                 $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                 $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected",$driver_id);
            }
            $qrImploded = implode(",",$qrcodes);
            }
            // end new code
            
            
            $update_id =  $this->order_model->update_extar_bags($eid,$driver_id,$type,$quantity,$notes,$qrImploded,$vendor_id);
                if($update_id){
                    
                    $response['message'] = "Data has been updated";
                $response['data']['is_updated'] = $update_id;
               
                echo json_encode($response);
                }else {
               
                     $response['message'] = "Can not be updated";
                    echo json_encode($response);
                }
            }
                else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }

 public function add_extraBags_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['driver_id']) && isset($_POST["type"]) && isset($_POST["quantity"]) && isset($_POST["notes"])){

            $response['status'] = 200;
            $response['error'] = false;
          
            $driver_id = $_POST['driver_id'];
            $date = date("Y-m-d H:i:s");
            $type = $_POST["type"];
            $quantity = $_POST["quantity"];
            $notes = $_POST["notes"];
            $vendor_id=$_POST["vendor_id"];
            // new code
             $qrcodes = "";
           $qrImploded = "";
           
           
          
        //   $response['message']="QR_CODE_IS:";
           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
            // $qrcodes = json_decode($_POST['qrcodes'],true);
            $qrcodes = $_POST['qrcodes'];
            
             foreach($qrcodes as $qrcode){
                 $result =  $this->order_model->get_qr_id($qrcode);
             }
               if($result){
            foreach($qrcodes as $qrcode){
                
                //  $response['message'] = $response['message'].$qrcode.",";
                    
                  
                 $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                 $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected",$driver_id);
            }
            
               }else{
                     $response['message'] ="Unknown QR! Try Again.";
               }
            // echo json_encode($response);
            //   die();
            $qrImploded = implode(",",$qrcodes);
            //  $response['message'] =$qrImploded;
            //  echo json_encode($response);
            //   die();
            }
            // end new code
           
            $update_id =  $this->order_model->add_extar_bags($date,$driver_id,$type,$quantity,$notes,$qrImploded,$vendor_id);
                if($update_id != false){
                    
                    $response['message'] = $response['message']."Data has been created";
                $response['data']['createdId'] = $update_id;
               
                echo json_encode($response);
                }else {
               
                     $response['message'] = "Can not be created";
                    echo json_encode($response);
                }
            }
                else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
           


   public function bagReceived_warehouse_post(){
        $response = array('status'=>400, 'error'=>true);
        
       
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) && isset($_POST["qr_code"])){

            $response['status'] = 200;
            $response['error'] = false;
             $response['message'] = "Deprecated Service.\nPlease use 'Neutral QR Code' option for Neutralization.";
            echo json_encode($response);
            
            die();
          
            $user_id = $_POST['user_id'];
            $code = $_POST['qr_code'];
          $result =  $this->order_model->get_qr_id($code);
               if($result) {
                $update_id =  $this->order_model->update_bag_status($code);
                if($update_id){
                    $qrid = $result["qrid"];
                     $delivery = $this->order_model->get_specific_order_code($qrid);
                    $response['message'] = "Bag is received at warehouse";
                $response['data']['delivery'] = $delivery;
               
                echo json_encode($response);
                }else {
                     $qrid = $result["qrid"];
                $delivery = $this->order_model->get_specific_order_code($qrid);
                $response['message'] = "Please Try again";
                $response['data']['delivery'] = $delivery;
                echo json_encode($response);
            }
            }    
            
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


              public function pickedByDriver_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) && isset($_POST["qr_code"])){

            $response['status'] = 200;
            $response['error'] = false;
          
            $user_id = $_POST['user_id'];
            $code = $_POST['qr_code'];
          $result =  $this->order_model->get_qr_id($code);
               if($result) {
                $update_id =  $this->order_model->update_bag_status3($code,3);
                if($update_id){
                    $qrid = $result["qrid"];
                     $delivery = $this->order_model->get_specific_order_code($qrid);
                    $response['message'] = "Bag is received at warehouse";
                $response['data']['delivery'] = $delivery;
               
                echo json_encode($response);
                }else {
                     $qrid = $result["qrid"];
                $delivery = $this->order_model->get_specific_order_code($qrid);
                $response['message'] = "Please Try again";
                $response['data']['delivery'] = $delivery;
                echo json_encode($response);
            }
            }    
            
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }



// DEPRECATED msg change
  //   public function neutralByVendor_postX(){
  //       $response = array('status'=>400, 'error'=>true);
  // //  $data = file_get_contents('php://input', 'r');
   
  //      $data = json_decode(file_get_contents('php://input'), true);
        
  //       $_POST = $data;
  //       $headers = apache_request_headers();
  //       $this->is_authorized($headers['X-API-KEY']);
  //      // //$this->is_session_exist($headers['Auth_token']);

  //       if (isset($_POST['user_id']) && isset($_POST["qr_code"])){

  //           $response['status'] = 200;
  //           $response['error'] = false;
          
  //           $user_id = $_POST['user_id'];
  //           $code = $_POST['qr_code'];
  //         $result =  $this->order_model->get_qr_id($code);
  //              if($result) {
  //                    $qrid = $result["qrid"];
  //                   $delivery = $this->order_model->get_specific_order_code($qrid,$user_id);
                    
  //        if($delivery){
  //            $delivery_id = $delivery["delivery_id"];
  //            $str_keeper_varification_check= $this->order_model->check_bag_str_keeper_varification($qrid,$delivery_id);
  //            if($str_keeper_varification_check){
            
  //               $update_id = $this->order_model->update_bag_status3($code,1);
  //               if($update_id){
  //                   //$qrid = $result["qrid"];
  //                   //  $delivery = $this->order_model->get_specific_order_code($qrid,$user_id);
                     
  //                     $update_id2 =  $this->order_model->update_bag_status4($delivery_id,$user_id);
  //                   $response['message'] = "Bag is received at warehouse";
  //               $response['data']['delivery'] = $delivery;
               
  //               echo json_encode($response);
  //               }else {
  //                    $qrid = $result["qrid"];
  //               $delivery = $this->order_model->get_specific_order_code($qrid);
  //               $response['message'] = "Please Try again";
  //               $response['data']['delivery'] = $delivery;
  //               echo json_encode($response);
  //               }
                
                
                
  //                }else{
  //                    $response['message'] = "You can not verify this QR, because this bag is not verified by store keeper!";
  //                  $response['data']['delivery'] = $delivery;
  //                   echo json_encode($response);
  //                }        
            
  //              }else{
  //                  $response['message'] = "This QR bag is not related to you!";
  //                  $response['data']['delivery'] = $delivery;
  //                   echo json_encode($response);
  //              }
  //           }    
            
  //       } else {
  //           $response['message'] = "Can not Access";
  //           echo json_encode($response);
  //       }
  //   }



    
             public function neutralByVendor_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) && isset($_POST["qr_code"])){

            $response['status'] = 200;
            $response['error'] = false;
          
            $user_id = $_POST['user_id'];
            $code = $_POST['qr_code'];
          $result =  $this->order_model->get_qr_id($code);
               if($result){
                     $qrid = $result["qrid"];
                    $delivery = $this->order_model->get_specific_order_code($qrid,$user_id);
                    
         if($delivery){
             $delivery_id = $delivery["delivery_id"];
             $str_keeper_varification_check= $this->order_model->check_bag_str_keeper_varification($qrid,$delivery_id);
             if($str_keeper_varification_check){
            
                $update_id = $this->order_model->update_bag_status3($code,1);
                if($update_id){
                    //$qrid = $result["qrid"];
                    //  $delivery = $this->order_model->get_specific_order_code($qrid,$user_id);
                     
                      $update_id2 =  $this->order_model->update_bag_status4($delivery_id,$user_id);
                    $response['message'] = "QR is received in warehouse and Neutral by partner.\nNow ready to use.";
                $response['data']['delivery'] = $delivery;
               
                echo json_encode($response);
                }else {
                     $qrid = $result["qrid"];
                $delivery = $this->order_model->get_specific_order_code($qrid);
                $response['message'] = "Please Try again";
                $response['data']['delivery'] = $delivery;
                echo json_encode($response);
                }
                
                
                
                 }else{
                     
                     $current_status=$this->order_model->get_qr_current_status($code);
                     
                     if($current_status[0]->driver_name ==''){
                     $driver_name='Not Assigned';
                        }else{
                          $driver_name=$current_status[0]->driver_name;
                               }
                     $response['message'] = "Access Denied!\nQR is not verified by store keeper.\nCurrent status: ".$current_status[0]->qr_status."\nCode: ".$code."\nCustomer: ".$current_status[0]->customer_name."\nDriver: ".$driver_name;
                   $response['data']['delivery'] = $delivery;
                    echo json_encode($response);
                 }        
            
               }else{
                   
                    $current_status=$this->order_model->get_qr_current_status($code);
                    
                   $response['message'] = "This QR is not related to you! Or already neutral.\n Current status: ".$current_status[0]->qr_status." \n Code: ".$code;
                   $response['data']['delivery'] = $delivery;
                    echo json_encode($response);
               }
            }else{
                
                $response['message'] = "Unknown QR!";
                 echo json_encode($response);
            }   
            
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }



     public function plan_deliveries_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['driver_id'])){

            $response['status'] = 200;
            $response['error'] = false;
          
            $driver_id = $_POST['driver_id'];
            $date = date("Y-m-d");
            $result =  $this->order_model->get_driver_wise_deliveries($driver_id, $date);
            if (count($result) > 0 ){
                
                $response['message'] = "Deliveries List of a Driver are etc";
                $response['data']['deliveries'] = $result;
               
                echo json_encode($response);
            } else {
                $response['message'] = "Deliveries are not exist";
                $response['data']['deliveries'] = $result;
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
     public function changeOrder_deliveries_post(){
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['driver_id']) and isset($_POST['deliveries'])){

            $response['status'] = 200;
            $response['error'] = false;
          
            $driver_id = $_POST['driver_id'];
            $deliveries = $_POST['deliveries'];
           
          
            foreach($deliveries as $del){
                foreach($del as $key=>$value){
                $delivery = $key;
                $sequence = $value;
                 $update_id =  $this->order_model->update_sequence($delivery,$sequence);
                 }
            }
            
                
                $response['message'] = "Deliveries Sequence is changed succesfully";
                
               
                echo json_encode($response);
           
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
// end new web services phase 3


    public function change_journey_status_post()
    {
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
      //  //$this->is_session_exist($headers['Auth_token']);
        if(isset($_POST['user_id']) && isset($_POST['delivery_id']) && isset($_POST['status']) &&
            ($_POST['status'] == "Ship" || $_POST['status'] == "Cancel" || $_POST['status'] == "Return")){

            $order_id = $_POST['delivery_id'];
            $driver_id = $_POST['user_id'];
            $status = $_POST['status'];

            if($status == 'Ship'){
                $fields = array('status'=>$status, 'ship_status'=>1, 'ship_date'=>date('Y-m-d H:i:s'));
                $response['message'] = 'Your journey has been started';

                $delivery =  $this->order_model->get_order_by_id($order_id);
                
                // echo '<pre>';
                // print_r($delivery);
                // die();
                //get device token
                $where = array('id' => $delivery[0]->customer_id);
                $user = $this->notification_model->get_device_token($where);
                if (count($user) > 0 && @$user[0]->device_token != '') {
                    $data = array(
                        'user_id' => $driver_id,
                        'device_token' => $user[0]->device_token,
                        'platform' => $user[0]->platform,
                        'status_code' => intval(600),
                        'title' => 'Delivery started',
                        'for_whom' => 'Customer',
                        'badge' => $user[0]->badge_count,
                        'message' => ' Your Delivery # '.$order_id.' is in way to ship'
                    );

                    //send notification
                    send_notification_to_user($data, '');
                }
            }

            if($status == 'Cancel'){
                $fields = array('status'=>$status, 'cancel_status'=>1, 'cancel_date'=>date('Y-m-d H:i:s'));
                $response['message'] = 'Your journey has been cancel';
            }

            if($status == 'Return'){
                $fields = array('status'=>$status, 'return_status'=>1, 'return_date'=>date('Y-m-d H:i:s'));
                $response['message'] = 'You have not delivered your food';
            }

            $where = array('order_id'=>$order_id, 'driver_id'=>$driver_id);
            $result =  $this->order_model->update($fields, $where);
            if($result){
                $response['error'] = false;
                $response['status'] = 200;
            }else{
                $response['message'] = "Order not exist";
            }
        }else {
            $response['message'] = "Can not Access=";
        }

        echo json_encode($response);
    }

// Depricated
//     public function end_journey_postX()
//     {
       
//         $response = array('status'=>400, 'error'=>true);

//         /*Delivered*/
//     //   $data = json_decode(file_get_contents('php://input'), true);
//     //     $_POST = $data;
//         $headers = apache_request_headers();
//        $this->is_authorized($headers['X-API-KEY']);
//      //   //$this->is_session_exist($headers['Auth_token']);
// //      print_r($this->input->post());
// // die();



//         if(isset($_POST['user_id']) && isset($_POST['delivery_id']) && isset($_POST['status']) && $_POST['status'] == "Delivered"){
            
//             // if(isset($_POST['bag_type'])){
                
//             //     // if 0 then its a disposible bag no need to do tracking
//             //     // if 1 then its a cooler bag and tracking is must
//             //     $bag_check=$this->input->post('bag_type');
//             // }
            
//             $bag_check=$this->input->post('bag_type');
            
//             if($bag_check == 0){
//                 $data=array(
//                     'cooling_bag_check' =>$bag_check
//                     );
//             }else if($bag_check == 1){
//                  $data=array(
//                     'cooling_bag_check' =>$bag_check,
//                     'bag_with_customer' =>1,
//                     'pending_bag'=>1
//                     );
//             }
            
            
            
//             // drivers bag check during delivery time
            
           
//             if(isset($_POST['driver_verify_bag'])){
//                  $driver_verify_bag_check=$_POST['driver_verify_bag'];
//             }else{
//                 $driver_verify_bag_check='';
//             }



//             $order_id = $_POST['delivery_id'];
//             $status = $_POST['status'];
//             $driver_id = $_POST['user_id'];
//             $customer_id = @$_POST['customer_id'];
//             $bags_qty = $_POST['bags_received'];
//             $ice_bags = $_POST['ice_bags'];
//            $qrcodes = "";
//            $qrImploded = "";
//             $trackBagD =  $this->order_model->updateTrackBagQrD($order_id,4,$data);
//            if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
//             $qrcodes = json_decode($_POST['qrcodes'],true);
//             $i=0;
//             foreach($qrcodes as $qrcode){
//                  $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                 
//                  if($i==0){
                     
//                      $ice_pack=$ice_bags;
//                  }else{
//                      $ice_pack=0;
//                  }
//                  $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected",$driver_id,$order_id,$ice_pack,0);
//                  $i=$i+1;
//             }
//             $qrImploded = implode(",",$qrcodes);
//             }
//             $fields = array('status'=>$status, 'delivered_status'=>1, 'delivered_date'=>date('Y-m-d H:i:s'),'tot_ice_pack_received'=>$ice_bags,'bag_received_qr'=>$qrImploded,'driver_verify_bag'=>$driver_verify_bag_check);
//             $where = array('order_id'=>$order_id, 'driver_id'=>$driver_id);
//             $result =  $this->order_model->update($fields, $where);
//             $where_delivery = array('order_id'=>$order_id);
//             if($bags_qty > 0){
//                 // $update_bag = array('bag_received'=>$bags_qty);
                
//                 $update_bag = array('total_bag_recv_by_driver'=>$bags_qty);
//                 $this->order_model->update($update_bag, $where_delivery);
//             }else{
//                 // $update_bag = array('bag_received'=>0);
//                 $update_bag = array('total_bag_recv_by_driver'=>0);
//                 $this->order_model->update($update_bag, $where_delivery);
//                  $delivery =  $this->order_model->get_order_by_id($order_id);
               
//               //  for($i=0; $i<count($delivery); $i++){
//                     // $result=$delivery;
                    
//                      $this->order_model->send_mail($delivery);
                   
//             //         $msg = "Dear ".$delivery[$i]->vendor.",<br/><br/>
//             //         Your Driver has collected 0 number of bags from Customer ".$delivery[$i]->customer.". It is a system generated 
//             //         reminder for you due to 0 bags received from client. <br/><br/> 
//             //          Regards, <br/><br/>
//             //         TEAM L O G X<br/>";
                   
           
//             //  $param = array('to'=>$delivery[$i]->vendor_email, 'msg'=>$msg, 'subject'=>'No Bag Received', 'identification'=>'LOGX');
//             //     send_email($param);
//             //     $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'No Bag Received', 'identification'=>'LOGX');
//             //     send_email($param);     
                    
//                 //}
        
//             }

//             if(isset($_FILES['images']['tmp_name'])) {

//                 $temp_name = mt_rand(100, 10000) . 'delivery_img';
//                 $delivery_img = $this->upload_image($driver_id, @$_FILES['images']['tmp_name'], @$_FILES['images']['name'], $temp_name);

//                 if($delivery_img){
//                     $update_field = array('delivery_img'=>$delivery_img);
//                     $this->order_model->update($update_field, $where_delivery);
//                 }
//             }

//             if(isset($_FILES['signature_img']['tmp_name'])) {

//                 $temp_name = mt_rand(100, 10000) . 'signature_img';
//                 $signature_img = $this->upload_image($driver_id, @$_FILES['signature_img']['tmp_name'], @$_FILES['signature_img']['name'], $temp_name);

//                 if($signature_img){
//                     $update_signature = array('signature_img'=>$signature_img);
//                     $this->order_model->update($update_signature, $where_delivery);
//                 }
//             }

//             if($result){
//                 $delivery =  $this->order_model->get_order_by_id($order_id);
               
//                 for($i=0; $i<count($delivery); $i++){
//                    // $delivery[$i]->geom = get_google_geocode($delivery[$i]->delivery_address);
//                    $delivery[$i]->geom = "25.186482, 55.371089";
//                  //   $msg = 'Dear '.$delivery[$i]->name_on_delivery.','."\r\n \r\n".'Your "'.$delivery[$i]->vendor.'" food bag has been delivered to your location.'.' Enjoy your food and please dont forget to leave your empty cooler bag outside for us to collect.'."\r\n \r\n".'Thanks, '."\r\n".'TEAM LOGX'."\r\n".'( Logistics Partner of "'.$delivery[$i]->vendor.'")';
                   
                    
                    
                    
                   
//                  //   send_expert_sms($delivery[$i]->number_on_delivery,$msg);
//                 }


//                 $response['error'] = false;
//                 $response['status'] = 200;
//                 $response['message'] = 'Your order has been completed';
//                 $response['data']['images_path'] = IMAGE_PATH;
//                 $delivery[0]->qrcodes = $qrcodes;
//                 $response['data']['delivery'] = $delivery[0];

//                 //PUSH NOTIFICATION
//                 //get device token
//                 $where = array('id' => $delivery[0]->customer_id);
//                 $user = $this->notification_model->get_device_token($where);
//                 // if (count($user) > 0 && @$user[0]->device_token != '') {
//                 if (count($user) > 0 ) {
//                     $data = array(
//                         'user_id' => $delivery[0]->customer_id,
//                         'device_token' => $user[0]->device_token,
//                         'platform' => $user[0]->platform,
//                         'status_code' => intval(601),
//                         'title' => 'Delivered delivery',
//                         'for_whom' => 'Customer',
//                         'badge' => $user[0]->badge_count,
//                         'message' => ' Your Delivery # '.$order_id.' has been delivered'
//                     );

//                     //send notification
//                     send_notification_to_user($data , 'save');
//                 }

//             }else{
//                 $response['message'] = "Order not exist";
//             }
//         }else {
//             $response['message'] = "Can not Access ...";
//         }

//         echo json_encode($response);
//     }






 public function end_journey_post_15feb()
    {
       
        $response = array('status'=>400, 'error'=>true);

        /*Delivered*/
    //   $data = json_decode(file_get_contents('php://input'), true);
    //     $_POST = $data;
        $headers = apache_request_headers();
       $this->is_authorized($headers['X-API-KEY']);
     //   //$this->is_session_exist($headers['Auth_token']);
//      print_r($this->input->post());
// die();



        if(isset($_POST['user_id']) && isset($_POST['delivery_id']) && isset($_POST['status']) && $_POST['status'] == "Delivered"){
            
            // if(isset($_POST['bag_type'])){
                
            //     // if 0 then its a disposible bag no need to do tracking
            //     // if 1 then its a cooler bag and tracking is must
            //     $bag_check=$this->input->post('bag_type');
            // }
            
            $bag_check=$this->input->post('bag_type');
            
            if($bag_check == 0){
                $data=array(
                    'cooling_bag_check' =>$bag_check
                    );
            }else if($bag_check == 1){
                 $data=array(
                    'cooling_bag_check' =>$bag_check,
                    'bag_with_customer' =>1,
                    'pending_bag'=>1
                    );
            }
            
            
            
            // drivers bag check during delivery time
            
           
            if(isset($_POST['driver_verify_bag'])){
                 $driver_verify_bag_check=$_POST['driver_verify_bag'];
            }else{
                $driver_verify_bag_check='';
            }


              
              $bags_qty=0;   //tayyab ios dealing

            $order_id = $_POST['delivery_id'];
            $status = $_POST['status'];
            $driver_id = $_POST['user_id'];
            $customer_id = @$_POST['customer_id'];
            $bags_qty = $_POST['bags_received'];
            $ice_bags = $_POST['ice_bags'];
           $qrcodes = "";
           $qrImploded = "";
           
           
        //   _15feb start
            if(isset($_POST['driver_recvd_am'])){
               
               $data['driver_recvd_amount']=$_POST['driver_recvd_am'];
           }
           
           if(isset($_POST['othercash'])){
               
               $data['other_payment_driver_recv']=$_POST['othercash'];
           }
         
         //   _15feb end
           
           
            $trackBagD =  $this->order_model->updateTrackBagQrD($order_id,4,$data);
           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
            $qrcodes = json_decode($_POST['qrcodes'],true);
            $i=0;
            
            $xcount=0; //tayyab ios dealing
            
            if(count($qrcodes) ==1 AND ($qrcodes[0] =='')){
                
            }else{
            foreach($qrcodes as $qrcode){
             
             //tayyab ios dealing start
             
                if($qrcode ==''){
                 $bags_qty=$bags_qty-1;
                
                    
                }else if($qrcode !=''){
                    $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                    
                    if($xcount==0){
                    $qrImploded ="$qrcode";
                    }else{
                        $qrImploded =$qrImploded.",$qrcode";
                    }
                    
                    
                    $xcount=$xcount+1;
                    
                }
                
                //tayyab ios dealing end 
                
                 
                
                 if($i==0){
                     
                     $ice_pack=$ice_bags;
                 }else{
                     $ice_pack=0;
                 }
                 $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected",$driver_id,$order_id,$ice_pack,0);
                 $i=$i+1;
            }
            
                
            }
            // $qrImploded = implode(",",$qrcodes);
            
            }
            
            // 'status'=>$status, 
            $fields = array('delivered_status'=>1, 'delivered_date'=>date('Y-m-d H:i:s'),'tot_ice_pack_received'=>$ice_bags,'bag_received_qr'=>$qrImploded,'driver_verify_bag'=>$driver_verify_bag_check);
            $where = array('order_id'=>$order_id, 'driver_id'=>$driver_id);
            $result =  $this->order_model->update($fields, $where);
            $where_delivery = array('order_id'=>$order_id);
            if($bags_qty > 0){
                // $update_bag = array('bag_received'=>$bags_qty);
                
                $update_bag = array('total_bag_recv_by_driver'=>$bags_qty);
                $this->order_model->update($update_bag, $where_delivery);
            }else{
                // $update_bag = array('bag_received'=>0);
                $update_bag = array('total_bag_recv_by_driver'=>0);
                $this->order_model->update($update_bag, $where_delivery);
                 $delivery =  $this->order_model->get_order_by_id($order_id);
               
              //  for($i=0; $i<count($delivery); $i++){
                    // $result=$delivery;
                    
                     $this->order_model->send_mail($delivery);
                   
            //         $msg = "Dear ".$delivery[$i]->vendor.",<br/><br/>
            //         Your Driver has collected 0 number of bags from Customer ".$delivery[$i]->customer.". It is a system generated 
            //         reminder for you due to 0 bags received from client. <br/><br/> 
            //          Regards, <br/><br/>
            //         TEAM L O G X<br/>";
                   
           
            //  $param = array('to'=>$delivery[$i]->vendor_email, 'msg'=>$msg, 'subject'=>'No Bag Received', 'identification'=>'LOGX');
            //     send_email($param);
            //     $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'No Bag Received', 'identification'=>'LOGX');
            //     send_email($param);     
                    
                //}
        
            }

            if(isset($_FILES['images']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'delivery_img';
                $delivery_img = $this->upload_image($driver_id, @$_FILES['images']['tmp_name'], @$_FILES['images']['name'], $temp_name);

                if($delivery_img){
                    $update_field = array('delivery_img'=>$delivery_img);
                    $this->order_model->update($update_field, $where_delivery);
                }
            }

            if(isset($_FILES['signature_img']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'signature_img';
                $signature_img = $this->upload_image($driver_id, @$_FILES['signature_img']['tmp_name'], @$_FILES['signature_img']['name'], $temp_name);

                if($signature_img){
                    $update_signature = array('signature_img'=>$signature_img);
                    $this->order_model->update($update_signature, $where_delivery);
                }
            }

            if($result){
                $delivery =  $this->order_model->get_order_by_id($order_id);
               
                for($i=0; $i<count($delivery); $i++){
                   // $delivery[$i]->geom = get_google_geocode($delivery[$i]->delivery_address);
                   $delivery[$i]->geom = "25.186482, 55.371089";
                 //   $msg = 'Dear '.$delivery[$i]->name_on_delivery.','."\r\n \r\n".'Your "'.$delivery[$i]->vendor.'" food bag has been delivered to your location.'.' Enjoy your food and please dont forget to leave your empty cooler bag outside for us to collect.'."\r\n \r\n".'Thanks, '."\r\n".'TEAM LOGX'."\r\n".'( Logistics Partner of "'.$delivery[$i]->vendor.'")';
                   
                    
                    
                    
                   
                 //   send_expert_sms($delivery[$i]->number_on_delivery,$msg);
                }


                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'Your order has been completed';
                $response['data']['images_path'] = IMAGE_PATH;
                $delivery[0]->qrcodes = $qrcodes;
                $response['data']['delivery'] = $delivery[0];

                //PUSH NOTIFICATION
                //get device token
                $where = array('id' => $delivery[0]->customer_id);
                $user = $this->notification_model->get_device_token($where);
                // if (count($user) > 0 && @$user[0]->device_token != '') {
                if (count($user) > 0 ) {
                    $data = array(
                        'user_id' => $delivery[0]->customer_id,
                        'device_token' => $user[0]->device_token,
                        'platform' => $user[0]->platform,
                        'status_code' => intval(601),
                        'title' => 'Delivered delivery',
                        'for_whom' => 'Customer',
                        'badge' => $user[0]->badge_count,
                        'message' => ' Your Delivery # '.$order_id.' has been delivered'.' at '.date('Y-m-d H:i:s')
                    );

                    //send notification
                    send_notification_to_user($data , 'save');
                }

            }else{
                $response['message'] = "Order not exist";
            }
        }else {
            $response['message'] = "Can not Access ...";
        }
      
        echo json_encode($response);
    }
    
    public function end_journey_post()
    {
       
        $response = array('status'=>400, 'error'=>true);

        /*Delivered*/
    //   $data = json_decode(file_get_contents('php://input'), true);
    //     $_POST = $data;
        $headers = apache_request_headers();
       $this->is_authorized($headers['X-API-KEY']);
     //   //$this->is_session_exist($headers['Auth_token']);
//      print_r($this->input->post());
// die();



        if(isset($_POST['user_id']) && isset($_POST['delivery_id']) && isset($_POST['status']) && $_POST['status'] == "Delivered"){
            
            // if(isset($_POST['bag_type'])){
                
            //     // if 0 then its a disposible bag no need to do tracking
            //     // if 1 then its a cooler bag and tracking is must
            //     $bag_check=$this->input->post('bag_type');
            // }
            
            $bag_check=$this->input->post('bag_type');
            
            if($bag_check == 0){
                $data=array(
                    'cooling_bag_check' =>$bag_check
                    );
            }else if($bag_check == 1){
                 $data=array(
                    'cooling_bag_check' =>$bag_check,
                    'bag_with_customer' =>1,
                    'pending_bag'=>1
                    );
            }
            
            
            
            // drivers bag check during delivery time
            
           
            if(isset($_POST['driver_verify_bag'])){
                 $driver_verify_bag_check=$_POST['driver_verify_bag'];
            }else{
                $driver_verify_bag_check='';
            }
            
            
            // drivers bag deliver to check
              
              if(isset($_POST['Delivery_drop_type'])){
                 $Delivery_drop_type=$_POST['Delivery_drop_type'];
            }else{
                $Delivery_drop_type='';
            }
            
            
            // Lat,Log Params
            
           
            if(isset($_POST['addr_loc_by_dri'])){
                 $addr_loc_by_dri=$_POST['addr_loc_by_dri'];
            }else{
                $addr_loc_by_dri='';
            }

              
              $bags_qty=0;   //tayyab ios dealing

            $order_id = $_POST['delivery_id'];
            $status = $_POST['status'];
            $driver_id = $_POST['user_id'];
            $customer_id = @$_POST['customer_id'];
            $bags_qty = $_POST['bags_received'];
            $ice_bags = $_POST['ice_bags'];
           $qrcodes = "";
           $qrImploded = "";
           
           if(isset($_POST['driver_recvd_am'])){
               
               $data['driver_recvd_amount']=$_POST['driver_recvd_am'];
           }
           
           if(isset($_POST['othercash'])){
               
               $data['other_payment_driver_recv']=$_POST['othercash'];
           }
          
          
          
        // lili  
          // label information open bag
            
            if(isset($_POST['open_bag_label_info'])){
               
               $data['open_bag_label_info']=$_POST['open_bag_label_info'];
           }
           
           
        //   label information delivery bag
        
         if(isset($_POST['delivery_label_info'])){
               
               $data['delivery_label_info']=$_POST['delivery_label_info'];
           }
           
           
           // Empty bag attachment 
        if(isset($_POST['empty_bag_code'])){ 
           $empty_bag_code=$_POST['empty_bag_code'];
        }
          
          
           // Counter updation for alert management  
           
           if(isset($_POST['addressCount'])){
               
               
               if($_POST['addressCount'] ==1){
                //   update count for by adding 1
                      $whr_user_is=$this->db->where('id',$customer_id);
                      
                      $counter_upd=$_POST['addressCount']+1;
                      $data_addr_count=array('addressCount'=>$counter_upd);
                       
                     $this->order_model->update_user_address_counter($data_addr_count, $whr_user_is);
                
               }else if($_POST['addressCount'] ==2){
                //   reset counter to 0 as 2 alerts for new address were done
                       $whr_user_is=$this->db->where('id',$customer_id);
                      
                      $counter_upd=0;
                      $data_addr_count=array('addressCount'=>$counter_upd);
                       
                     $this->order_model->update_user_address_counter($data_addr_count, $whr_user_is);
                
               }else{
                //   ignore
               }
              
           }
          
           
           
            
            $trackBagD =  $this->order_model->updateTrackBagQrD($order_id,4,$data);
           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
            $qrcodes = json_decode($_POST['qrcodes'],true);
            $i=0;
            
            $xcount=0; //tayyab ios dealing
            
            if(count($qrcodes) ==1 AND ($qrcodes[0] =='')){
                
            }else{
            foreach($qrcodes as $qrcode){
             
             //tayyab ios dealing start
             
                if($qrcode ==''){
                 $bags_qty=$bags_qty-1;
                
                    
                }else if($qrcode !=''){
                    $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                    
                    if($xcount==0){
                    $qrImploded ="$qrcode";
                    }else{
                        $qrImploded =$qrImploded.",$qrcode";
                    }
                    
                    
                    $xcount=$xcount+1;
                    
                }
                
                //tayyab ios dealing end 
                
                 
                
                 if($i==0){
                     
                     $ice_pack=$ice_bags;
                 }else{
                     $ice_pack=0;
                 }
                 $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected",$driver_id,$order_id,$ice_pack,0);
                 $i=$i+1;
            }
            
                
            }
            // $qrImploded = implode(",",$qrcodes);
            
            }
            
            // 'status'=>$status, 
            $fields = array('delivered_status'=>1, 'delivered_date'=>date('Y-m-d H:i:s'),'tot_ice_pack_received'=>$ice_bags,'bag_received_qr'=>$qrImploded,'driver_verify_bag'=>$driver_verify_bag_check, 'delivered_to'=>$Delivery_drop_type,'addr_loc_by_dri'=>$addr_loc_by_dri,'empty_bag_code'=>$empty_bag_code);
            $where = array('order_id'=>$order_id, 'driver_id'=>$driver_id);
            $result =  $this->order_model->update($fields, $where);
            $where_delivery = array('order_id'=>$order_id);
            if($bags_qty > 0){
                // $update_bag = array('bag_received'=>$bags_qty);
                
                $update_bag = array('total_bag_recv_by_driver'=>$bags_qty);
                $this->order_model->update($update_bag, $where_delivery);
            }else{
                // $update_bag = array('bag_received'=>0);
                $update_bag = array('total_bag_recv_by_driver'=>0);
                $this->order_model->update($update_bag, $where_delivery);
                 $delivery =  $this->order_model->get_order_by_id($order_id);
               
              //  for($i=0; $i<count($delivery); $i++){
                    // $result=$delivery;
                    
                     $this->order_model->send_mail($delivery);
                   
            //         $msg = "Dear ".$delivery[$i]->vendor.",<br/><br/>
            //         Your Driver has collected 0 number of bags from Customer ".$delivery[$i]->customer.". It is a system generated 
            //         reminder for you due to 0 bags received from client. <br/><br/> 
            //          Regards, <br/><br/>
            //         TEAM L O G X<br/>";
                   
           
            //  $param = array('to'=>$delivery[$i]->vendor_email, 'msg'=>$msg, 'subject'=>'No Bag Received', 'identification'=>'LOGX');
            //     send_email($param);
            //     $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'No Bag Received', 'identification'=>'LOGX');
            //     send_email($param);     
                    
                //}
        
            }

            if(isset($_FILES['images']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'delivery_img';
                $delivery_img = $this->upload_image($driver_id, @$_FILES['images']['tmp_name'], @$_FILES['images']['name'], $temp_name);

                if($delivery_img){
                    $update_field = array('delivery_img'=>$delivery_img);
                    $this->order_model->update($update_field, $where_delivery);
                }
            }

            if(isset($_FILES['signature_img']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'signature_img';
                $signature_img = $this->upload_image($driver_id, @$_FILES['signature_img']['tmp_name'], @$_FILES['signature_img']['name'], $temp_name);

                if($signature_img){
                    $update_signature = array('signature_img'=>$signature_img);
                    $this->order_model->update($update_signature, $where_delivery);
                }
            }
            
            
            // ADDR IMAGE new added july 2021
            
            if(isset($_FILES['addr_img']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'addr_img';
                $addr_img = $this->upload_image($driver_id, @$_FILES['addr_img']['tmp_name'], @$_FILES['addr_img']['name'], $temp_name);

                if($addr_img){
                    $update_field_addr_img = array('addr_img'=>$addr_img);
                    $this->order_model->update($update_field_addr_img, $where_delivery);
                }
            }
            
            
            
            
            // open bag image lili
            
            if(isset($_FILES['open_bag_attachment']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'open_bag_attachment';
                $open_bag_attachment = $this->upload_image_open_bag_stemp($driver_id, @$_FILES['open_bag_attachment']['tmp_name'], @$_FILES['open_bag_attachment']['name'], $temp_name);

                if($open_bag_attachment){
                    $update_field_open_bag_attachment = array('open_bag_attachment'=>$open_bag_attachment);
                    $this->order_model->update($update_field_open_bag_attachment, $where_delivery);
                }
            }
            
            
            
             // Empty bag image
            
              if(isset($_FILES['empty_bag_attachment']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'empty_bag_attachment';
                $empty_bag_attachment = $this->emptyBag_upload_image_stemp($driver_id, @$_FILES['empty_bag_attachment']['tmp_name'], @$_FILES['empty_bag_attachment']['name'], $temp_name);

                if($empty_bag_attachment){
                    $update_field_empty_bag_attachment = array('empty_bag_attachment'=>$empty_bag_attachment);
                    $this->order_model->update($update_field_empty_bag_attachment, $where_delivery);
                }
            }
            
            
            
            // Checks for update user customer profile
            
            if(isset($_POST['updt_addrs_detail_chk'])  && $_POST['updt_addrs_detail_chk'] ==1 && isset($_POST['customer_id']) && isset($_POST['mul_addr_id']) ) {
                   
                   $where_customer_id = array('id'=>$_POST['customer_id']);
                
                    $update_field_usr_tbl = array('addr_loc_by_dri_usr'=>$addr_loc_by_dri,'addr_img_usr'=>$addr_img,'mul_addr_id_usr'=>$_POST['mul_addr_id']);
                    $res=$this->order_model->update_user_tbl($update_field_usr_tbl, $where_customer_id);
                
                    //   echo 'IF is running <pre>';
                    //   print_r($this->db->last_query());
                    //   die();
            }
            

            if($result){
                $delivery =  $this->order_model->get_order_by_id($order_id);
               
                for($i=0; $i<count($delivery); $i++){
                   // $delivery[$i]->geom = get_google_geocode($delivery[$i]->delivery_address);
                   $delivery[$i]->geom = "25.186482, 55.371089";
                 //   $msg = 'Dear '.$delivery[$i]->name_on_delivery.','."\r\n \r\n".'Your "'.$delivery[$i]->vendor.'" food bag has been delivered to your location.'.' Enjoy your food and please dont forget to leave your empty cooler bag outside for us to collect.'."\r\n \r\n".'Thanks, '."\r\n".'TEAM LOGX'."\r\n".'( Logistics Partner of "'.$delivery[$i]->vendor.'")';
                   
                    
                    
                    
                   
                 //   send_expert_sms($delivery[$i]->number_on_delivery,$msg);
                }


                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'Your order has been completed';
                $response['data']['images_path'] = IMAGE_PATH;
                $delivery[0]->qrcodes = $qrcodes;
                $response['data']['delivery'] = $delivery[0];
                $response['data']['images_path_open_bag'] = IMAGE_PATH_open_bag;   //lili
                $response['data']['images_path_empty_bag'] = IMAGE_PATH_empty_bag;


                //PUSH NOTIFICATION
                //get device token
                $where = array('id' => $delivery[0]->customer_id);
                $user = $this->notification_model->get_device_token($where);
                if (count($user) > 0 && @$user[0]->device_token != '') {
                // if (count($user) > 0 ) {
                    $data = array(
                        'user_id' => $delivery[0]->customer_id,
                        'device_token' => $user[0]->device_token,
                        'platform' => $user[0]->platform,
                        'status_code' => intval(601),
                        'title' => 'Delivered delivery',
                        'for_whom' => 'Customer',
                        'badge' => $user[0]->badge_count,
                        'message' => ' Your Delivery # '.$order_id.' has been delivered'.' at '.date('Y-m-d H:i:s')
                    );

                    //send notification
                    send_notification_to_user($data , 'save');
                }

            }else{
                $response['message'] = "Order not exist";
            }
        }else {
            $response['message'] = "Can not Access ...";
        }
      
        echo json_encode($response);
    }






    public function save_driver_location_post()
    {
        $response = array('status'=>400, 'error'=>true);

        /*Delivered*/
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
     //   //$this->is_session_exist($headers['Auth_token']);

        if(isset($_POST['user_id']) && isset($_POST['lat']) && isset($_POST['lng']) ){

            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $driver_id = $_POST['user_id'];

            //delete previous locations
            $where = array('driver_id'=>$driver_id);
            $this->driver_model->delete_location($where);

            $bags_fields = array(
                'driver_id' => $driver_id,
                'lat' => $lat,
                'lng' => $lng,
                'created_dt' => date("Y-m-d H:i:s"),
                'created_terminal' => gethostname()
                );

            $result = $this->driver_model->add_location($bags_fields);


            if($result){
                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'Your location has been updated';
            }else{
                $response['message'] = "Location not updated";
            }
        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }


    public function today_food_reading_post(){
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
  //      //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id'])){

            $driver_id = $_POST['user_id'];
            $today_date = date('Y-m-d');
            $result_img =  $this->driver_model->get_food_reading_by_date($driver_id, $today_date);
            $images_arr = array();
            $temperature_arr = array();
            $vehicle_num = '';

            foreach ($result_img as $key => $value)
            {
                $images_arr[$key] = $value->image_name;
                $temperature_arr[$key] = $value->temperature;
                $vehicle_num = @$result_img[0]->vehicle_num;
            }

            if (count($images_arr) > 0 ){
                $response['status'] = 200;
                $response['error'] = false;
                $response['message'] = "Today food reading are etc";
                $response['data']['max_count'] = MAX_FOOD_READING_PER_DAY;
                $response['data']['images_path'] = IMAGE_PATH;
                $response['data']['images'] = $images_arr;
                $response['data']['temperature'] = $temperature_arr;
                $response['data']['vehicle_num'] = $vehicle_num;
                echo json_encode($response);
            } else {
                $response['message'] = "Today reading not exist";
                $response['data']['max_count'] = MAX_FOOD_READING_PER_DAY;
                $response['data']['images'] = [];
                $response['data']['temperature'] = [];
                $response['data']['vehicle_num'] = '';
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    public function save_food_reading_post()
    {
        $response = array('status'=>400, 'error'=>true);

        //header('Content-Type: text/plain; charset=utf-8');
        //$data = json_decode(file_get_contents('php://input'), true);
        //$_POST = $data;

        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
     //   //$this->is_session_exist($headers['Auth_token']);
        $save_img = '';
        $del_img = '';
        $update_vehicle_no = '';
        if(isset($_POST['user_id']) && isset($_POST['vehicle_num'])){

            $driver_id = $_POST['user_id'];
            //delete images
            if(isset($_POST['delete_images']) && count($_POST['delete_images']) > 0 ){

                for($j=0;  $j<count($_POST['delete_images']); $j++) {
                    $delete_img = array(
                        'driver_id' => $driver_id,
                        'image_name' => $_POST['delete_images'][$j]
                    );

                    $del_img = $this->driver_model->delete_food_reading($delete_img);
                    //unlink image
                }
            }

             if(isset($_FILES['images']['tmp_name']) && count($_FILES['images']['tmp_name']) > 0 && count($_POST['temperature']) > 0 ) {
                 //save images
                 for ($i = 0; $i < count($_FILES['images']['tmp_name']); $i++) {

                     $temp_name = mt_rand(100, 10000) . 'food-reading';
                     $reading_img = $this->upload_image($driver_id, @$_FILES['images']['tmp_name'][$i], @$_FILES['images']['name'][$i], $temp_name);

                     $reading_fields = array(
                         'driver_id' => $driver_id,
                         'image_name' => $reading_img,
                         'temperature' => $_POST['temperature'][$i],
                         'vehicle_num' => $_POST['vehicle_num'],
                         'created_dt' => date("Y-m-d H:i:s"),
                         'created_terminal' => gethostname()
                     );

                     $save_img = $this->driver_model->add_food_reading($reading_fields);
                 }
             }

            if(isset($_POST['vehicle_num']) && $driver_id && count(@$_FILES['images']['tmp_name']) == 0){

                $update_fields = array('vehicle_num' => $_POST['vehicle_num']);
                $update_where = "driver_id = ".$driver_id." and created_dt BETWEEN '".date('Y-m-d')." 00:00:00' and '".date('Y-m-d')." 23:59:59'";
                $update_vehicle_no = $this->driver_model->update_food_reading($update_fields, $update_where);
            }


            if($del_img || $save_img || $update_vehicle_no){
                $today_date = date('Y-m-d');
                $result_img =  $this->driver_model->get_food_reading_by_date($driver_id, $today_date);
                $images_arr = array();
                $temperature_arr = array();
                $vehicle_num = '';
                foreach ($result_img as $key => $value)
                {
                    $images_arr[$key] = $value->image_name;
                    $temperature_arr[$key] = $value->temperature;
                    $vehicle_num = @$result_img[0]->vehicle_num;
                }
                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'date updated successfully';
                $response['data']['max_count'] = MAX_FOOD_READING_PER_DAY;
                $response['data']['images_path'] = IMAGE_PATH;
                $response['data']['images'] = $images_arr;
                $response['data']['temperature'] = $temperature_arr;
                $response['data']['vehicle_num'] = $vehicle_num;
            }else{
                $response['message'] = "Images not updated";
            }
        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }


    public function driver_rating_post()
    {
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        // //$this->is_session_exist($headers['Auth_token']);

        if(isset($_POST['delivery_id']) && isset($_POST['rating']) && floatval($_POST['rating']) > 0){

            $order_id = $_POST['delivery_id'];
            $rating = floatval($_POST['rating']);
            $feedback = $_POST['feedback'];

            $rating_fields = array(
                'order_id' => $order_id,
                'rating' => $rating,
                'feedback' => $feedback,
                'created_dt' => date("Y-m-d H:i:s")
            );

            $result = $this->driver_model->add_driver_rating($rating_fields);

            if($result){
                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'Your rating has been submitted';
            }else{
                $response['message'] = "Rating not submitted";
            }
        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }

    /***************************************************************************/
    /*******************************BAGS COLLECTION*****************************/
    /***************************************************************************/

    public function today_bag_collection_post(){
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
    //    //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['driver_id']) and isset($_POST["date"])){

            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $this->input->post('driver_id');
            
            
            
            
            
            $from_date = $date = date('Y-m-d', strtotime($this->input->post("date")));
            $to_date =  $date = date('Y-m-d', strtotime($this->input->post("date")));
            //$summary =  $this->order_model->get_deliveries_summary_by_driver($driver_id, $from_date, $to_date);
            $segments =  $this->bag_model->get_bags_collection_segments_by_date($driver_id, $from_date, $to_date);
            if (count($segments) > 0){
                $response['message'] = "Bag collection for today are etc";
                //$summary[0]->vendor_statistics = $segments;
                $response['data']['today_bags'] = $segments;
                echo json_encode($response);
            } else {
                $response['message'] = "You have not assigned any bag collection today. You will get a notification when admin will assign you bag collection for today.";
                $response['data']['today_bags'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    /*public function end_bag_collection_post()
    {
        $response = array('status'=>400, 'error'=>true);
 
      //  $data = json_decode(file_get_contents('php://input'), true);
        
       // $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if(isset($_POST['driver_id']) and isset($_POST['bag_id']) and isset($_POST['num_of_bags'])){

            $response['error'] = false;
            $response['status'] = 200;

            $bag_id = $_POST['bag_id'];
            $driver_id = $_POST['driver_id'];
            $num_of_bags = $_POST['num_of_bags'];
            $proof_image = '';
            $result = false;
            // new code to collect bag through QR Scanner
            
            $qrcodes = "";
           $qrImploded = "";
          
           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
            $qrcodes = json_decode($_POST['qrcodes'],true);
            foreach($qrcodes as $qrcode){
                 $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                 $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected");
            }
            $qrImploded = implode(",",$qrcodes);
            }
            // end new code
            
            
            

            $fields = array('collected_date'=>date('Y-m-d H:i:s'), 'received_bag_qty'=>$num_of_bags, 'bag_received_qr'=>$qrImploded);
            if(!empty($_FILES['proof_image']['tmp_name']) && @count($_FILES['proof_image']['tmp_name']) > 0 && $num_of_bags == 0 ) {
                $temp_name = mt_rand(100, 10000) . 'proof_image';
                $proof_image = $this->upload_image($driver_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                $fields['status']='No bag';
                $fields['proof_image']= IMAGE_PATH.'/'.$proof_image;

                $where = array('bag_id'=>$bag_id, 'driver_id'=>$driver_id);
                $result =  $this->bag_model->update($fields, $where);
                $response['message'] = 'Your request has been completed';
            }elseif($num_of_bags > 0){
                $fields['status']='Picked';
                if(isset($_FILES['proof_image']['tmp_name'])){
                    $temp_name = mt_rand(100, 10000) . 'proof_image';
                    $proof_image = $this->upload_image($driver_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                    $fields['proof_image']= IMAGE_PATH.'/'.$proof_image;
                }else{
                    $fields['proof_image'] = '';
                }

                $where = array('bag_id'=>$bag_id, 'driver_id'=>$driver_id);
                $result =  $this->bag_model->update($fields, $where);
                $response['message'] = 'Your request has been completed';
            }else{
                $response['message'] = "Given Parameters are not correct";
            }


            if($result || !$result){
                $bag_data =  $this->bag_model->get_bag_by_id($bag_id);
                $response['data']['bag_collection'] = !empty($bag_data[0]) ? $bag_data[0] : new stdClass();

                //PUSH NOTIFICATION
                //get device token
                $where = @array('id' => !empty($bag_data[0]) ? $bag_data[0]->customer_id : 0);
                $user = $this->notification_model->get_device_token($where);
                if (count($user) > 0 && @$user[0]->device_token != '') {
                    $data = array(
                        'user_id' => $driver_id,
                        'device_token' => $user[0]->device_token,
                        'platform' => $user[0]->platform,
                        'status_code' => intval(602),
                        'title' => 'Bag collected',
                        'for_whom' => 'Customer',
                        'badge' => $user[0]->badge_count,
                        'message' => ' Your pending bags has been collected'
                    );

                    //send notification
                    send_notification_to_user($data , 'save');
                }

            }else{
                $response['message'] = "Bag collection not exist";
            }


        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }*/

    public function end_bag_collection_post()
    {
        $response = array('status'=>400, 'error'=>true);
 
      //  $data = json_decode(file_get_contents('php://input'), true);
        
       // $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // $this->is_session_exist($headers['auth_token']);

        if(isset($_POST['driver_id']) and isset($_POST['bag_id']) and isset($_POST['num_of_bags'])){

            $response['error'] = false;
            $response['status'] = 200;

            $bag_id = $this->input->post('bag_id');
            $driver_id = $this->input->post('driver_id');
            $num_of_bags = $this->input->post('num_of_bags');
            
            
            
             // New Addition july 2021  SPOON
            
            // if(isset($_POST['bagCollectionLoc'])){
            //      $bagCollectionLoc=$_POST['bagCollectionLoc'];
            // }else{
            //     $bagCollectionLoc='';
            // }
            
            
            if(isset($_POST['bag_picked_at'])){
                 $bag_picked_at=$_POST['bag_picked_at'];
            }else{
                $bag_picked_at='';
            }
            
            // Ends
            
            
            $proof_image = '';
            $result = false;
            // new code to collect bag through QR Scanner
            
            $qrcodes = "";
           $qrImploded = "";
          
           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
            $qrcodes = json_decode($_POST['qrcodes'],true);
            foreach($qrcodes as $qrcode){
                 $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                 $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected",$driver_id,0,0,$bag_id);
            }
            $qrImploded = implode(",",$qrcodes);
            }
            // end new code
            
            
            

            $fields = array('collected_date'=>date('Y-m-d H:i:s'), 'received_bag_qty'=>$num_of_bags, 'bag_received_qr'=>$qrImploded,'bag_picked_at'=>$bag_picked_at);
          
           //   HERE EMPTY BAG IMG INFO
              if(isset($_POST['empty_bag_code'])){ 
                      $fields['empty_bag_code']=$_POST['empty_bag_code'];
                     }
        
           if(isset($_FILES['proof_image']) && $_FILES['proof_image']['tmp_name'] != "" && $num_of_bags == 0 ) {
                $temp_name = mt_rand(100, 10000) . 'proof_image';
                $proof_image = $this->upload_image($driver_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                $fields['status']='No bag';
                $fields['proof_image']= IMAGE_PATH.'/'.$proof_image;

                $where = array('bag_id'=>$bag_id, 'driver_id'=>$driver_id);
                $result =  $this->bag_model->update($fields, $where);
                $response['message'] = 'Your request has been completed';
            }elseif($num_of_bags > 0){
                $fields['status']='Picked';
                if(isset($_FILES['proof_image']['tmp_name'])){
                    $temp_name = mt_rand(100, 10000) . 'proof_image';
                    $proof_image = $this->upload_image($driver_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                    $fields['proof_image']= IMAGE_PATH.'/'.$proof_image;
                }else{
                    $fields['proof_image'] = '';
                }

                $where = array('bag_id'=>$bag_id, 'driver_id'=>$driver_id);
                $result =  $this->bag_model->update($fields, $where);
                $response['message'] = 'Your request has been completed';
            }else{
                $response['message'] = "Given Parameters are not correct";
            }


            if($result || !$result){
                $bag_data =  $this->bag_model->get_bag_by_id($bag_id);
                $response['data']['bag_collection'] = $bag_data[0];

                //PUSH NOTIFICATION
                //get device token
                $where = array('id' => $bag_data[0]->customer_id);
                $user = $this->notification_model->get_device_token($where);
                if (count($user) > 0 && @$user[0]->device_token != '') {
                    $data = array(
                        'user_id' => $driver_id,
                        'device_token' => $user[0]->device_token,
                        'platform' => $user[0]->platform,
                        'status_code' => intval(602),
                        'title' => 'Bag collected',
                        'for_whom' => 'Customer',
                        'badge' => $user[0]->badge_count,
                        'message' => ' Your pending bags has been collected'
                    );

                    //send notification
                    send_notification_to_user($data , 'save');
                }

            }else{
                $response['message'] = "Bag collection not exist";
            }


        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }
    
    
    /***************************************************************************/
    /*******************************CASH COLLECTION*****************************/
    /***************************************************************************/

    public function today_cash_collection_post(){
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
    //    //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['driver_id']) and isset($_POST["date"])){
            
            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $this->input->post('driver_id');
            
            $from_date = date('Y-m-d', strtotime($this->input->post("date")));
            $to_date =  date('Y-m-d', strtotime($this->input->post("date")));
            //$summary =  $this->order_model->get_deliveries_summary_by_driver($driver_id, $from_date, $to_date);
            $segments =  $this->cash_model->get_cash_collection_segments_by_date($driver_id, $from_date, $to_date);
            if (count($segments) > 0){
                $response['message'] = "Cash collection for today are etc";
                //$summary[0]->vendor_statistics = $segments;
                $response['data']['today_cash'] = $segments;
                echo json_encode($response);
            } else {
                $response['message'] = "You have not assigned any cash collection today. You will get a notification when admin will assign you cash collection for today.";
                $response['data']['today_cash'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    /*public function end_cash_collection_post()
    {
        $response = array('status'=>400, 'error'=>true);
 
      //  $data = json_decode(file_get_contents('php://input'), true);
        
       // $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if(isset($_POST['driver_id']) and isset($_POST['bag_id']) and isset($_POST['num_of_bags'])){

            $response['error'] = false;
            $response['status'] = 200;

            $bag_id = $_POST['bag_id'];
            $driver_id = $_POST['driver_id'];
            $num_of_bags = $_POST['num_of_bags'];
            $proof_image = '';
            $result = false;
            // new code to collect bag through QR Scanner
            
            $qrcodes = "";
           $qrImploded = "";
          
           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
            $qrcodes = json_decode($_POST['qrcodes'],true);
            foreach($qrcodes as $qrcode){
                 $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                 $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected");
            }
            $qrImploded = implode(",",$qrcodes);
            }
            // end new code
            
            
            

            $fields = array('collected_date'=>date('Y-m-d H:i:s'), 'received_bag_qty'=>$num_of_bags, 'bag_received_qr'=>$qrImploded);
            if(!empty($_FILES['proof_image']['tmp_name']) && @count($_FILES['proof_image']['tmp_name']) > 0 && $num_of_bags == 0 ) {
                $temp_name = mt_rand(100, 10000) . 'proof_image';
                $proof_image = $this->upload_image($driver_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                $fields['status']='No bag';
                $fields['proof_image']= IMAGE_PATH.'/'.$proof_image;

                $where = array('bag_id'=>$bag_id, 'driver_id'=>$driver_id);
                $result =  $this->bag_model->update($fields, $where);
                $response['message'] = 'Your request has been completed';
            }elseif($num_of_bags > 0){
                $fields['status']='Picked';
                if(isset($_FILES['proof_image']['tmp_name'])){
                    $temp_name = mt_rand(100, 10000) . 'proof_image';
                    $proof_image = $this->upload_image($driver_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                    $fields['proof_image']= IMAGE_PATH.'/'.$proof_image;
                }else{
                    $fields['proof_image'] = '';
                }

                $where = array('bag_id'=>$bag_id, 'driver_id'=>$driver_id);
                $result =  $this->bag_model->update($fields, $where);
                $response['message'] = 'Your request has been completed';
            }else{
                $response['message'] = "Given Parameters are not correct";
            }


            if($result || !$result){
                $bag_data =  $this->bag_model->get_bag_by_id($bag_id);
                $response['data']['bag_collection'] = !empty($bag_data[0]) ? $bag_data[0] : new stdClass();

                //PUSH NOTIFICATION
                //get device token
                $where = @array('id' => !empty($bag_data[0]) ? $bag_data[0]->customer_id : 0);
                $user = $this->notification_model->get_device_token($where);
                if (count($user) > 0 && @$user[0]->device_token != '') {
                    $data = array(
                        'user_id' => $driver_id,
                        'device_token' => $user[0]->device_token,
                        'platform' => $user[0]->platform,
                        'status_code' => intval(602),
                        'title' => 'Bag collected',
                        'for_whom' => 'Customer',
                        'badge' => $user[0]->badge_count,
                        'message' => ' Your pending bags has been collected'
                    );

                    //send notification
                    send_notification_to_user($data , 'save');
                }

            }else{
                $response['message'] = "Bag collection not exist";
            }


        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }*/

    public function end_cash_collection_post()
    {
        $response = array('status'=>400, 'error'=>true);
        
        //$data = json_decode(file_get_contents('php://input'), true);
        //$_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);

       // $this->is_session_exist($headers['auth_token']);

        if(isset($_POST['driver_id']) && isset($_POST['cash_id']) && isset($_POST['amount'])){

            $response['error'] = false;
            $response['status'] = 200;

            $cash_id = $this->input->post('cash_id');
            $driver_id = $this->input->post('driver_id');
            $total_cash = $this->input->post('amount');
            $proof_image = '';
            $result = false;
            // new code to collect bag through QR Scanner
            
            $qrcodes = "";
            $qrImploded = "";
          
           if(isset($_POST['qrcodes']) and !empty($_POST['qrcodes'])){
                $qrcodes = json_decode($_POST['qrcodes'],true);
                foreach($qrcodes as $qrcode){
                     $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                     $collectBag = $this->order_model->updateCollectBagQr($qrcode,"Collected");
                }
                $qrImploded = implode(",",$qrcodes);
            }
            // end new code
            
            
            

            $fields = array('collected_date'=>date('Y-m-d H:i:s'), 'amount_received'=>$total_cash, 'cash_received_qr'=>$qrImploded);
            if(isset($_FILES['proof_image']) && $_FILES['proof_image']['tmp_name'] != "" && $total_cash == 0 ) {
                $temp_name = mt_rand(100, 10000) . 'proof_image';
                $proof_image = $this->upload_image($driver_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                $fields['status']='No Cash';
                $fields['proof_image']= IMAGE_PATH.'/'.$proof_image;

                $where = array('cash_id'=>$cash_id, 'driver_id'=>$driver_id);
                $result =  $this->cash_model->update($fields, $where);
                $response['message'] = 'Your request has been completed';
            }elseif($total_cash > 0){
                $fields['status']='Picked Up';
                if(isset($_FILES['proof_image']['tmp_name'])){
                    $temp_name = mt_rand(100, 10000) . 'proof_image';
                    $proof_image = $this->upload_image($driver_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                    $fields['proof_image']= IMAGE_PATH.'/'.$proof_image;
                }else{
                    $fields['proof_image'] = '';
                }

                $where = array('cash_id'=>$cash_id, 'driver_id'=>$driver_id);
                $result =  $this->cash_model->update($fields, $where);
                $response['message'] = 'Your request has been completed';
            }else{
                $response['message'] = "Given Parameters are not correct";
            }


            if($result || !$result){
                $cash_data =  $this->cash_model->get_cash_by_id($cash_id);
                $response['data']['cash_collection'] = $cash_data[0];

                //PUSH NOTIFICATION
                //get device token
                $where = array('id' => $cash_data[0]->customer_id);
                $user = $this->notification_model->get_device_token($where);
                if (count($user) > 0 && @$user[0]->device_token != '') {
                    $data = array(
                        'user_id' => $driver_id,
                        'device_token' => $user[0]->device_token,
                        'platform' => $user[0]->platform,
                        'status_code' => intval(602),
                        'title' => 'Cash collected',
                        'for_whom' => 'Customer',
                        'badge' => $user[0]->badge_count,
                        'message' => ' Your pending cash has been collected'
                    );

                    //send notification
                    send_notification_to_user($data , 'save');
                }

            }else{
                $response['message'] = "Cash collection not exist";
            }
        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }

    /***************************************************************************/
    /*******************************CUSTOMER METHODS*****************************/
    /***************************************************************************/
    public function customer_past_deliveries_post(){
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
      //  //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['customer_id'])){
            $response['status'] = 200;
            $response['error'] = false;
            $customer_id = $_POST['customer_id'];
            $from_date = date('Y-m-d', strtotime('-30 days'));
            $to_date = date('Y-m-d');
            $result =  $this->order_model->get_customer_deliveries_by_date($customer_id, $from_date, $to_date);
            if (count($result) > 0 ){
                for($i=0; $i<count($result); $i++){
                    $result[$i]->geom = get_google_geocode($result[$i]->delivery_address);
                }
                $response['message'] = "Customers deliveries List";
                $response['data']['deliveries'] = $result;
                echo json_encode($response);
            } else {
                $response['message'] = "Deliveries are not exist";
                $response['data']['deliveries'] = [];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    public function customer_today_deliveries_post(){
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['customer_id'])){

            $response['status'] = 200;
            $response['error'] = false;
            $customer_id = $_POST['customer_id'];
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');

            //set badge count to 0
            $where_badge = array('id' => $customer_id);
            $this->user_auth->update(array('badge_count'=>1), $where_badge);

            $response['data']['unseen-notification'] = $this->notification_model->count_unseen($customer_id);
            $result =  $this->order_model->get_customer_deliveries_by_date($customer_id, $from_date, $to_date);
            if (count($result) > 0 ){
                for($i=0; $i<count($result); $i++){
                    $result[$i]->geom = get_google_geocode($result[$i]->delivery_address);
                }
                $response['message'] = "Customers deliveries List";
                $response['data']['deliveries'] = $result;
                echo json_encode($response);
            } else {
                $response['message'] = "Today Deliveries are not exist";
                $response['data']['deliveries'] = [];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }


    public function issue_report_post()
    {
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
      //  //$this->is_session_exist($headers['Auth_token']);

        if(isset($_POST['customer_id']) && isset($_POST['issue'])){

            $customer_id = $_POST['customer_id'];
            $issue = $_POST['issue'];

            $issue_fields = array(
                'customer_id' => $customer_id,
                'text' => $issue,
                'created_dt' => date("Y-m-d H:i:s")
            );

            $result = $this->customer_model->report_issue($issue_fields);

            if($result){
                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'You have successfully reported an issue';
            }else{
                $response['message'] = "Issue not submitted";
            }
        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }


    public function customers_get()
    {
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('success'=>false);
        $result =  $this->customer_model->get_customers();
        if($result['result']){
            $response['success'] = true;
            $response['customers'] = $result['records'];
        }
        echo json_encode($response);
    }


    /***************************************************************************/
    /*******************************VENDORS METHODS*****************************/
    /***************************************************************************/
    public function vendors_get()
    {
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('status'=>400);
        $result =  $this->vendor_model->get_all_vendors();
        if(count($result) > 0){
            $response['status'] = 200;
            $response['message'] = 'Vendors list';
            $response['data'] = $result;
        }
        echo json_encode($response);
    }


    public function vendor_by_id_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('success'=>false);
        $vendor_id = $_POST['v_id'];
        $where = array('id'=>$vendor_id);
        $result =  $this->vendor_model->get_where($where);
        if(count($result) > 0){
            $response['status'] = 200;
            $response['data'] = $result;
        }
        echo json_encode($response);
    }


    /***************************************************************************/
    /*******************************NOTIFICATIONS METHODS***********************/
    /***************************************************************************/
    public function get_notification_post()
    {
        $response = array('status'=>400, 'error'=>true);
  
       $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
    //    //$this->is_session_exist($headers['Auth_token']);

        if (isset($data['user_id'])){

            $response['status'] = 200;
            $response['error'] = false;
            $user_id = $_POST['user_id'];
            $where = array('n.user_id'=>$user_id);
            $result =  $this->notification_model->get_where($where);
            if (count($result) > 0 ){
                $response['message'] = "Notification list are etc";
                $response['data']['notifications'] = $result;

                //update notification unseen to seen
                $update_where = 'user_id = '.$user_id.' and last_seen_dt is NULL';
                $data = array('last_seen_dt'=> date('Y-m-d H:i:s'));
                $this->notification_model->update($data, $update_where);
            } else {
                $response['message'] = "Notification are not exist";
                $response['data']['notifications'] = $result;
            }
        } else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }


    public function get_vendors_post()
    {
        //$headers = $_SERVER;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $vendors = $this->notification_model->get_all_vendors();
        $response['status'] = 200;
        $response['error'] = false;
        $response['data']['vendors'] = $vendors;
        $response['count'] = count($vendors);
        echo json_encode($response);
    }

    public function delete_notification_post()
    {
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        //print_r($data);
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['notification_log_id'])){

            $response['status'] = 200;
            $response['error'] = false;
            $notification_log_id = $_POST['notification_log_id'];
            $where = array('notification_log_id'=>$notification_log_id);
            $result =  $this->notification_model->delete($where);
            if (@count($result) > 0 ){
                $response['message'] = "Notification deleted successfully";
            } else {
                $response['message'] = "Notification not deleted";
            }
        } else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }

    /***************************************************************************/
    /*******************************ORDERS METHODS*****************************/
    /***************************************************************************/
    public function orders_get()
    {
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $response = array('success'=>false);
        $result =  $this->order_model->get_orders();
        if($result['result']){
            $response['success'] = true;
            $response['orders'] = $result['records'];
        }
        echo json_encode($response);
    }


    /***************************************************************************/
    /*******************************GENERAL METHODS*****************************/
    /***************************************************************************/
    private function is_authorized($api_key){
        /*if($api_key != mobile_application_api_key){
            return $this->response([
                'status' => 401,
                'error' => true,
                'message' => "Unauthorized"
            ]);
        } */
    }


    private function is_session_exist($auth_token){
        /*$now = time();
        //expire
        //if($now >  $this->session->userdata('expire') || $this->session->userdata('auth_token') != $auth_token){
        if($this->session->userdata('auth_token') != $auth_token){
        //if($now >  $this->session->userdata('expire') ){
            return $this->response([
                'status' => 401,
                'error' => true,
                'message' => "auth token expired!"
            ]);
        } */
    }


    private function upload_image($user_id, $tmp_doc, $doc, $name)
    {
        $target_dir = "upload/";
        $file_type = pathinfo($target_dir . $doc, PATHINFO_EXTENSION);
        $file_name = date('Y-m-d-H-i-s') . '_' . $name . '_' . $user_id . '.' . $file_type;
        $file_rename = $target_dir . $file_name;

        if ($file_type == 'jpg' || $file_type == 'png' || $file_type == 'jpeg'){
            if (move_uploaded_file($tmp_doc, $file_rename)) {
                return $file_name;
            }
        }
        return false;
    }
    
  
    public function test_post()
    {
        echo json_encode(apache_request_headers());
    }

    function test_get()
    {
    //     $this->output->enable_profiler(TRUE);
    //     $segments =  $this->bag_model->get_bags_collection_segments_by_date(8403, '2019-11-07', '2019-11-08', 1);
    //     echo $segment; //json_encode($segments);
    //     print_r($this->db->last_query()); 
        // echo "haye haye";
        
         $device_token='dNQmFhp-DGk:APA91bHz74LYkbVVO9OVMmCexblUAc7hRMv-iZbEYJ2E1xxqgcSvMIYZg426_QPe9UPlGgYX000DdHV-yBohKQmEPCvRrMGeN_Eg9he_CluBEn1PoXzTb-ZgM76QLaA7ZzM-ZwAE6jy5';    
        if($device_token != '' ){
    $data = array(
                        'user_id' => 6183,
                        'device_token' =>$device_token,
                        'platform' => '',
                        'status_code' => intval(600),
                        'title' => 'Logx Customer Care Service',
                        'for_whom' => 'Lindsay Schonbrun',
                        'badge' => 1,
                        'message' => 'msg mxnj'
                    );
                    
                     //send notification
                  $r= send_notification_to_user($data, '');
                    
                    print_r($r);
                    die();
            
            
        }
    }
    
    //  public function assign_vehicle_OLDpost()
    // {
    //     $headers = apache_request_headers();
    //     $this->is_authorized($headers['X-API-KEY']);
    //     $_POST = json_decode(file_get_contents("php://input"), true);
    //     $vehicle_id = isset($_POST['vehicle_id']) ? $_POST['vehicle_id'] : '';
    //     $driver_id = isset($_POST['driver_id']) ? $_POST['driver_id'] : '';
    //     $check_in = isset($_POST['check_in']) ? $_POST['check_in'] : '';
    //     $response['status'] = 400;
    //     $response['error'] = true;

    //     if (!empty($vehicle_id) AND !empty($driver_id) AND !empty($check_in))
    //     {
    //         $response['status'] = 200;
                               
    //         $driver = $this->driver_model->check_driver($driver_id);
    //         if (!empty($driver))
    //         {
               
    //             $this->load->model('Vehicle_status');
                
    //             $vehicle_status = $this->Vehicle_status->get_vehicle_status_availability($vehicle_id);
                
    //         //      $response['error'] = false;
    //         //                   $response['message'] = $vehicle_status;
    //         //                   echo json_encode($response);
    //         // die();
    //             if($vehicle_status){
                    
    //                 $response['status'] = 200;
    //                           $response['error'] = false;
    //                           $response['message'] = 'Vehicle is not available! Already occuipied / Not relavent.';
                    
    //             }else{
    //                         $data = [
    //                             'status' => 'occupied',
    //                             'check_in' => $check_in,
    //                             'vehicle_id' => $vehicle_id,
    //                             'driver_id' => $driver_id,
    //                             'created_at' => date('Y-m-d H:i:s'),
    //                             'updated_at' => date('Y-m-d H:i:s'),
    //                         ];
    //                       $result = $this->Vehicle_status->create($data);
    //                       if ($result)
    //                       {
    //                           $response['status'] = 200;
    //                           $response['error'] = false;
    //                           $response['message'] = 'Check in successfully.';
    //                       }else{
    //                           $response['status'] = 400;
    //                           $response['error'] = true;
    //                           $response['message'] = 'Server error';
    //                       }
                           
    //             }
    //         }else{
    //             $response['status'] = 400;
    //             $response['error'] = true;
    //             $response['message'] = 'Invalid Driver ID';
    //         }
    //     }else{
    //         $response['status'] = 400;
    //         $response['error'] = true;
    //         $response['message'] = 'Missing Data';
    //     }
    //     echo json_encode($response);
    // }

    public function assign_vehicle_post()
    {
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $_POST = json_decode(file_get_contents("php://input"), true);
        $vehicle_id = isset($_POST['vehicle_id']) ? $_POST['vehicle_id'] : '';
        $driver_id = isset($_POST['driver_id']) ? $_POST['driver_id'] : '';
        $check_in = isset($_POST['check_in']) ? $_POST['check_in'] : '';
        $response['status'] = 400;
        $response['error'] = true;

        if (!empty($vehicle_id) AND !empty($driver_id) AND !empty($check_in))
        {
            $response['status'] = 200;
                               
            $driver = $this->driver_model->check_driver($driver_id);
            if (!empty($driver))
            {
               
                $this->load->model('Vehicle_status');
                
                $vehicle_status = $this->Vehicle_status->get_vehicle_status_availability($vehicle_id);
                
                // send prams are vehicle_id'.$vehicle_id.' send prams are vehicle_id'.$vehicle_id.'type is:'.gettype($vehicle_id)
                 
                if($vehicle_status){
                    
                               $response['status'] = 200;
                               $response['error'] = false;
                               $response['message'] = 'Vehicle is not available! Already occupied / Not relevant.';
                    
                }else{
                    
                      
                         $chk_vehicle=$this->Vehicle_status->get_vehicle_($vehicle_id);
                      
                            
                      
                      if($chk_vehicle){
                          
                          
                            //  $response['error'] = false;
                            //   $response['message'] =$vehicle_status.' and vehcile check is:'.$chk_vehicle ;
                            //   echo json_encode($response);
                            // die();
                            
                            
                            $data = [
                                'status' => 'occupied',
                                'check_in' => $check_in,
                                'vehicle_id' => $vehicle_id,
                                'driver_id' => $driver_id,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];
                           $result = $this->Vehicle_status->create($data);
                           if ($result)
                           {
                               $response['status'] = 200;
                               $response['error'] = false;
                               $response['message'] = 'Check in successfully.';
                           }else{
                               $response['status'] = 400;
                               $response['error'] = true;
                               $response['message'] = 'Server error';
                           }
                           
                      }else{
                          
                                $response['status'] = 200;
                                $response['error'] = false;
                                $response['message'] = 'Unknown Vehicle!';
                          
                      }
                           
                }
            }else{
                $response['status'] = 400;
                $response['error'] = true;
                $response['message'] = 'Invalid Driver ID';
            }
        }else{
            $response['status'] = 400;
            $response['error'] = true;
            $response['message'] = 'Missing Data';
        }
        echo json_encode($response);
    }
    
    
    public function unassign_vehicle_post()
    {
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        
        $_POST = json_decode(file_get_contents("php://input"), true);
        
        // $id = isset($_POST['id']) ? $_POST['id'] : '';
        $vehicle_id = isset($_POST['vehicle_id']) ? $_POST['vehicle_id'] : '';
        $driver_id = isset($_POST['driver_id']) ? $_POST['driver_id'] : '';
        $check_out = isset($_POST['check_out']) ? $_POST['check_out'] : '';
        $response['status'] = 400;
        $response['error'] = true;

        if (!empty($vehicle_id) AND !empty($driver_id) AND !empty($check_out))
        {
            $driver = $this->driver_model->check_driver($driver_id);
            if (!empty($driver)){
                $this->load->model('Vehicle_status');
                
                 $vehicle_status = $this->Vehicle_status->check_vehicle_allot_driver($vehicle_id,$driver_id);
                 
            //             $response['error'] = false;
            //                   $response['message'] = $vehicle_status[0]->id;
            //                   echo json_encode($response);
            // die();
                if($vehicle_status){
                    
                    $id=$vehicle_status[0]->id;
                                $data = [
                                    'status' => 'vacant',
                                    'checkout' => $check_out,
                                    'vehicle_id' => $vehicle_id,
                                    'driver_id' => $driver_id,
                                    'updated_at' => date('Y-m-d H:i:s'),
                                ];
                               $result = $this->Vehicle_status->update($id, $data);
                               if ($result)
                               {
                                   $response['status'] = 200;
                                   $response['error'] = false;
                                   $response['message'] = 'Check out successfully';
                               }else{
                                   $response['status'] = 400;
                                   $response['error'] = true;
                                   $response['message'] = 'Server error';
                               }
                               
                   }else{
                       $response['status'] = 200;
                                   $response['error'] = false;
                                   $response['message'] = 'This vehicle was not assigned you! you can not perform this action!';
                   }           
            }else{
                $response['status'] = 400;
                $response['error'] = true;
                $response['message'] = 'Invalid Driver ID';
            }
        }else{
            $response['status'] = 400;
            $response['error'] = true;
            $response['message'] = 'Missing Data';
        }
        echo json_encode($response);
    }
    
    public function get_assign_vehicle_post()
    {
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $_POST = json_decode(file_get_contents("php://input"), true);
        
        $driver_id = isset($_POST['driver_id']) ? $_POST['driver_id'] : '';

        $response['status'] = 400;
        $response['error'] = true;

        if (!empty($driver_id))
        {
           $this->load->model('Vehicle_model');

               $result = $this->Vehicle_model->get_vehicle_detail($driver_id);
               
               if($result){
               $data = (object)[
                   'id' => $result->id,
                   'status' => $result->status,
                   'check_in' => $result->check_in,
                   'checkout' => $result->checkout,
                   'vehicle_id' => $result->vehicle_id,
                   'driver_id' => $result->driver_id,
                   'model_name' => $result->model_name,
                   'type' => $result->type,
                   'year' => $result->year,
                   'v_number' => $result->v_number,
                   'i_exp' => $result->i_exp,
                   'i_issue' => $result->i_issue,
                   'm_exp' => $result->m_exp,
                   'm_issue' => $result->m_issue,
                   'r_exp' => $result->r_exp,
                   'r_issue' => $result->r_issue,
                   'qr_code' => base_url($result->qr_code),
                   'i_image' => base_url($result->i_image),
                   'm_image' => base_url($result->m_image),
                   'r_image' => base_url($result->r_image),
                   'v_image' => base_url($result->v_image),
               ];

                   $response['status'] = 200;
                   $response['error'] = false;
                   $response['data'] = $data;
                   
                   
               }else{
                   $response['status'] = 200;
                   $response['error'] = false;
                   $response['message'] = 'Error!';
               }
        }else{
            $response['status'] = 400;
            $response['error'] = true;
            $response['message'] = 'Invalid Driver ID';
        }
        echo json_encode($response);
    }

    
    
     public function get_assigned_vehicle_history_post()
    {
        
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        $_POST = json_decode(file_get_contents("php://input"), true);
        
        
        // print_r($_POST);
        // die();

        $driver_id = isset($_POST['driver_id']) ? $_POST['driver_id'] : '';

        $response['status'] = 400;
        $response['error'] = true;

        if (!empty($driver_id))
        {
            
                      
           $this->load->model('Vehicle_model');

               $results = $this->Vehicle_model->get_vehicle_detail_history($driver_id);
            //         $response['error'] = false;
            //                   $response['message'] = $results;
            //                   echo json_encode($response);
            // die();
               if($results){
                   
        // $data=$results;
        
        
          foreach( $results as $key => $result){
              $qr_code='';
              $i_image='';
              $m_image='';
              $r_image='';
              $v_image='';
              
              if($result->qr_code){
                  $qr_code=base_url($result->qr_code);
              }
              if($result->i_image){
                  $i_image=base_url($result->i_image);
              }
              if($result->m_image){
                  $m_image=base_url($result->m_image);
              }
              if($result->r_image){
                  $r_image=base_url($result->r_image);
              }
              if($result->v_image){
                  $v_image=base_url($result->v_image);
              }
              
              $data[$key] = (object)[
                
                 'id' => $result->v_s_id,
                  'status' => $result->status,
                  'check_in' => $result->check_in,
                  'checkout' => $result->checkout,
                  'vehicle_id' => $result->vehicle_id,
                  'driver_id' => $result->driver_id,
                  'model_name' => $result->model_name,
                  'type' => $result->type,
                  'year' => $result->year,
                  'v_number' => $result->v_number,
                  'i_exp' => $result->i_exp,
                  'i_issue' => $result->i_issue,
                  'm_exp' => $result->m_exp,
                  'm_issue' => $result->m_issue,
                  'r_exp' => $result->r_exp,
                  'r_issue' => $result->r_issue,
                 
                  'qr_code' => $qr_code,
                  'i_image' => $i_image,
                  'm_image' => $m_image,
                  'r_image' => $r_image,
                  'v_image' => $v_image,
               
              ];
             
              }  
              
            //   $response['error'] = false;
            //                   $response['message'] = $data;
            //                   echo json_encode($response);
            // die();
              
              // $data =  $result;
                   $response['status'] = 200;
                   $response['error'] = false;
                   $response['data'] = $data;
                   
                   
               }else{
                   $response['status'] = 200;
                   $response['error'] = false;
                   $response['message'] = 'Error!';
               }
        }else{
            $response['status'] = 400;
            $response['error'] = true;
            $response['message'] = 'Invalid Driver ID';
        }
        echo json_encode($response);
    }
    
    
    // New APIs By Ayesha
   
   
       private function upload_image_feedback($user_id, $tmp_doc, $doc, $name){
        $target_dir = "feedback/";
        $file_type = pathinfo($target_dir . $doc, PATHINFO_EXTENSION);
        $file_name = date('Y-m-d-H-i-s') . '_' . $name . '_' . $user_id . '.' . $file_type;
        $file_rename = $target_dir . $file_name;

        if ($file_type == 'jpg' || $file_type == 'png' || $file_type == 'jpeg'){
            if (move_uploaded_file($tmp_doc, $file_rename)) {
                return $file_name;
            }
        }
        return false;
    }

    
      public function order_issue_report_post()
    {
        $response = array('status'=>400, 'error'=>true);

        // $data = json_decode(file_get_contents('php://input'), true);
        // $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
      //  //$this->is_session_exist($headers['Auth_token']);

        if(isset($_POST['issue']) && isset($_POST['user_id'])){

            
            $issue = $_POST['issue'];
            $user_id = $_POST['user_id'];
            
            $roll_id= $this->customer_model->get_roll_id_by_userID($user_id);
            
            $issue_fields = array(
               
                'user_id' =>$user_id,
                'role_id' =>$roll_id,
                'feedback' => $issue,
                'complaint_count' => 1,
                'reported_at' => date("Y-m-d H:i:s"),
                'status' => 'Pending'
            );
            
            
           if($roll_id == 4){
               
                $order_id = $_POST['order_id'];
                if($order_id !='' OR $order_id !=0){
                 $issue_fields['order_id'] = $order_id;
                }
               
           }
            
             if(isset($_FILES['proof_image']['tmp_name'])){
                    $temp_name = mt_rand(100, 10000) . 'proof_image';
                    $proof_image = $this->upload_image_feedback($user_id, @$_FILES['proof_image']['tmp_name'], @$_FILES['proof_image']['name'], $temp_name);
                    $issue_fields['proof_image']= FEEDBACK_IMAGE_PATH.'/'.$proof_image;
                }else{
                    $issue_fields['proof_image'] = '';
                }

            $result = $this->customer_model->order_report_feedback($issue_fields,'feedbacks');
            
            // $response['res']=$this->db->last_query();
            // echo json_encode($response);
            // die();
            
            if($result){
                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'You have successfully reported an issue, Our Support team will contact you soon.';
            }else{
                $response['message'] = "Issue not submitted";
            }
            
          
        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }
    
    
    
    
     public function order_goodFeedback_post()
    {
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
      //  //$this->is_session_exist($headers['Auth_token']);

        if(isset($_POST['order_id']) && isset($_POST['user_id'])){

            $order_id = $_POST['order_id'];
          
            $user_id = $_POST['user_id'];
            
            
            
        //   role id is 4 because only customers can give feedback
        
        if($_POST['feedback'] ==''){
            $feedback='GOOD';
        }else{
            $feedback=$_POST['feedback'];
        }
        
            $issue_fields = array(
                'order_id'=> $order_id,
                'user_id' =>$user_id,
                'role_id' =>4,
                'feedback' =>$feedback ,
                'complaint_count' => 0,
                'reported_at' => date("Y-m-d H:i:s"),
                'status' => 'Satisfied'
            );

            $result = $this->customer_model->order_report_feedback($issue_fields,'feedbacks');

            if($result){
                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'Thankyou for giving us feedback! feedback submitted.';
            }else{
                $response['message'] = "Feedback is not submitted";
            }
            
           
        }else {
            $response['message'] = "Can not Access";
        }

        echo json_encode($response);
    }
    
    
    // Driver Details
    
    public function driver_profile_details_post(){
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        
        $_POST = $data;
        
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
    //    //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['driver_id'])){

            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $_POST['driver_id'];
            
        //     echo 'hi'+$driver_id;
        // // print_r($_POST);
        // die();
            
           
                $basic_prof= $this->driver_model->get_where_basic_prof($driver_id);
                $slots_info =  $this->driver_model->get_driver_prof_details($driver_id);
                
            // print_r($slots_info);
            // die();
            if (count($basic_prof)){
                $response['message'] = "Driver Profile details are etc";
                
                // $response['data']['basic_profile'] = $basic_prof;
                 $basic_prof[0]->contract_file=base_url().$basic_prof[0]->contract_file;
                 $basic_prof[0]->visa_card=base_url().$basic_prof[0]->visa_card;
                 $basic_prof[0]->other_card=base_url().$basic_prof[0]->other_card;
                 $basic_prof[0]->license_card=base_url().$basic_prof[0]->license_card;
                 $basic_prof[0]->id_card=base_url().$basic_prof[0]->id_card;
                //  $response['data'] = $basic_prof;
                //  echo json_encode($response);
                //  die();
                ///new changing from basit<----
                $basic_prof = (object)$basic_prof['0'];
                $basic_prof->slots = $slots_info;
                /// end here --->
                // old $response['data']['basic info'] = $basic_prof;
                $response['data'] = $basic_prof;
                // $response['data']['slots']= $slots_info;
                echo json_encode($response);
            } else {
                $response['message'] = "Network Issue try again!.";
                // $response['data']['today_bags'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Accesssssss";
            echo json_encode($response);
        }
    }


    public function testc_get(){
        $this->load->model('Vehicle_model');
        // $roll_id= $this->customer_model->get_roll_id_by_userID('16664');
    //   $roll_id=$this->driver_model->get_driver_prof_details('40');
    //   echo '<pre>';
    //   print_r($roll_id);
   
       
       
      $check_vehicle = $this->Vehicle_model->get_vehicle_Registration_num(123);
      if($check_vehicle){
                 $check_vehicle -> scan ='yes';
             }else{
                 $check_vehicle -> scan ='No';
             }
            // $vehicle_detail['Registration_no']= object($check_vehicle->v_number);
            
             echo 'hi';
    //   die();
            echo '<pre>';
      print_r($check_vehicle);
      
      
            // $response['data']['vehicles'][] = $vehicle_detail[0];
            //  echo json_encode($response);
           
    }
    
    
    public function str_keeper_pending_bags_post(){
        $this->load->model('order_model');
        
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
       
      $headers = apache_request_headers();
      $this->is_authorized($headers['X-API-KEY']);
        //$this->is_session_exist($headers['Auth_token']);

        // if (isset($_POST['date'])){
            
            

            // $response['status'] = 200;
            // $response['error'] = false;
           
            // $driver_id = $this->input->post('user_id');
            
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            if(!empty($this->input->post("date")) ){
                $sdate = date('Y-m-d', strtotime($this->input->post("date")));
                 $edate = date('Y-m-d', strtotime($this->input->post("date")));
            
            $from_date = $sdate;
            $to_date =  $edate;
            }
           
             $where = " qr.bsid =5 and o.qr_bag_id !='' and o.is_neutral=0 and o.str_keep_varification ='no' and o.status ='Collected' and o.own_bag_rcv_by_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        
            // $results=$this->vendor_model->str_kpr_pending_bags($where);
            
             $report_data =  $this->order_model->get_strkeeper_pendings($where);
             
            //   $response['success'] = true;
            // $response['msg'] = $report_data;
            // $response['date'] = $from_date;
            //  echo json_encode($response);
            //  die();
        if($report_data['result']){
            $response['status'] = 200;
            $response['error'] = false;
            $response['data'] = $report_data["records"];
           
        }else{
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'You have no remaing any bag to verify!';
             $response['data'] = [];
        }
            
            
             echo json_encode($response);
            //  if (isset($summary[0]->date)){
            //     $response['message'] = "Deliveries for today are etc";
            //     $summary[0]->vendor_statistics = $segments;
            //     $response['data']['today_deliveries'] = $summary[0];
            //     $response['data']['today_bags_status'] = $summary2[0];
            //     echo json_encode($response);
            // } else {
            //     $response['message'] = "You have not assigned any deliveries right now. You will get a notification when admin will assign you deliveries for today.";
            //     $response['data']['today_deliveries'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
            //     echo json_encode($response);
            // }
        // }else {
        //     $response['message'] = "Can not Access";
        //     echo json_encode($response);
        // }
    }
    
    
    
    
    
    //  public function str_keeper_delivery_bags_varification_post(){
    //     $this->load->model('order_model');
        
    //     $response = array('status'=>400, 'error'=>true);

    //     $data = json_decode(file_get_contents('php://input'), true);
    //     $_POST = $data;
       
    //   $headers = apache_request_headers();
    //   $this->is_authorized($headers['X-API-KEY']);
    //     //$this->is_session_exist($headers['Auth_token']);

    //     // if (isset($_POST['date'])){
            
            

    //         // $response['status'] = 200;
    //         // $response['error'] = false;
           
    //         // $driver_id = $this->input->post('user_id');
            
            
    //         $to_date = date('Y-m-d');
    //         if(!empty($this->input->post("qr_code")) AND !empty($this->input->post("user_id"))){
    //              $code=$this->input->post("qr_code");
    //             $where = " (o.bag_received_qr !='' or o.bag_received_qr !=0) and o.str_keep_varification ='no' and o.qr_active_check=1 and o.bag_received_qr='$code' ";
            
    //         }
           
            
        
    //         // $results=$this->vendor_model->str_kpr_pending_bags($where);
            
    //          $report_data =  $this->order_model->strkeeper_scan($where,$code);
             
    //         //   $response['success'] = true;
    //         // $response['msg'] = $report_data;
    //         // $response['date'] = $from_date;
    //         //  echo json_encode($response);
    //         //  die();
    //     if($report_data['result']){
    //         $response['status'] = 200;
    //         $response['error'] = false;
    //         $response['data'] = $report_data["records"];
           
    //     }else{
    //         $response['status'] = 200;
    //         $response['error'] = false;
    //         $response['message'] = 'You have no remaing any bag to verify!';
    //     }
            
            
    //          echo json_encode($response);
    //         //  if (isset($summary[0]->date)){
    //         //     $response['message'] = "Deliveries for today are etc";
    //         //     $summary[0]->vendor_statistics = $segments;
    //         //     $response['data']['today_deliveries'] = $summary[0];
    //         //     $response['data']['today_bags_status'] = $summary2[0];
    //         //     echo json_encode($response);
    //         // } else {
    //         //     $response['message'] = "You have not assigned any deliveries right now. You will get a notification when admin will assign you deliveries for today.";
    //         //     $response['data']['today_deliveries'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
    //         //     echo json_encode($response);
    //         // }
    //     // }else {
    //     //     $response['message'] = "Can not Access";
    //     //     echo json_encode($response);
    //     // }
    // }
    

    // Depricated
   // public function str_keeper_delivery_bags_varification_postX(){
   //      $this->load->model('order_model');
        
   //      $response = array('status'=>400, 'error'=>true);

   //      $data = json_decode(file_get_contents('php://input'), true);
   //      $_POST = $data;
       
   //    $headers = apache_request_headers();
   //    $this->is_authorized($headers['X-API-KEY']);
       
            
            
   //          // $to_date = date('Y-m-d');
   //          if(!empty($this->input->post("qr_code")) AND !empty($this->input->post("user_id"))){
   //               $code=$this->input->post("qr_code");
                 
   //               $data_bag_status= array(
                      
   //                    'bsid'=>6,
   //                    'str_kpr_id'=>$this->input->post("user_id")
                     
   //                   );
                     
                     
   //                   $data_ordertbl_update= array(
                      
   //                    'str_keep_varification'=>'yes',
   //                    'varified_by'=>$this->input->post("user_id"),
   //                    'varified_at'=>date("Y-m-d H:i:s")
                     
   //                   );
               
                
                
   //              $check_qr_status= $this->order_model->check_qr_bg_status($code);
                
                                    
   //                                  //  echo json_encode($response);
   //                                  //  die();
                
   //              if($check_qr_status){
                    
   //                  if($check_qr_status[0]->bsid == 5){
                    
                   
   //              $report_data =  $this->order_model->strkeeper_scan($data_bag_status,$code,$data_ordertbl_update);
                
   //                      if($report_data){
   //                                  $response['status'] = 200;
   //                                  $response['error'] = false;
   //                                  $response['message'] = 'Varified Successfully, Received in Warehouse.';
   //                                  // $response['returned']=$check_qr_status[0]->bsid;
   //                                  // $response['id_is']=$report_data;
                                    
                                   
   //                              }else{
   //                                  $response['status'] = 200;
   //                                  $response['error'] = false;
   //                                  $response['message'] = 'Can not able to verify!';
   //                                  // $response['id_is']=$report_data;
   //                              }
            
   //                  }else if($check_qr_status[0]->bsid == 6){
                    
   //                                   $response['status'] = 200;
   //                                  $response['error'] = false;
   //                                  $response['message'] = 'Already Verified!';
   //                                  //  $response['returned']=$check_qr_status[0]->bsid;
   //                      }else{
   //                                          $response['status'] = 200;
   //                                          $response['error'] = false;
   //                                          $response['message'] = 'Can not able to verify!';
   //                                          //  $response['returned']=$check_qr_status[0]->bsid;
   //                      }
            
            
   //          }else{
                    
   //                          $response['status'] = 200;
   //                          $response['error'] = false;
   //                          $response['message'] = 'Can not able to Verify! Unknown QR';
                            
   //              }
                    
           
                
            
   //  }else {
   //                      $response['message'] = "Can not Access";
                        
   //                      echo json_encode($response);
   //                  }
           
            
        
            
   //           echo json_encode($response);
            
   //  }
    
    

    public function str_keeper_delivery_bags_varification_post(){
        $this->load->model('order_model');
        
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
       
      $headers = apache_request_headers();
      $this->is_authorized($headers['X-API-KEY']);
       
            
            
            // $to_date = date('Y-m-d');
            if(!empty($this->input->post("qr_code")) AND !empty($this->input->post("user_id"))){
                 $code=$this->input->post("qr_code");
                 
                 $data_bag_status= array(
                      
                      'bsid'=>6,
                      'str_kpr_id'=>$this->input->post("user_id")
                     
                     );
                     
                     
                     $data_ordertbl_update= array(
                      
                      'str_keep_varification'=>'yes',
                      'varified_by'=>$this->input->post("user_id"),
                      'varified_at'=>date("Y-m-d H:i:s")
                     
                     );
               
                
                
                $check_qr_status= $this->order_model->check_qr_bg_status($code);
                
                                    
                                    //  echo json_encode($response);
                                    //  die();
                
                if($check_qr_status){
                    
                    if($check_qr_status[0]->bsid == 5){
                    
                   
                $report_data =  $this->order_model->strkeeper_scan($data_bag_status,$code,$data_ordertbl_update);
                
                        if($report_data){
                                    $response['status'] = 200;
                                    $response['error'] = false;
                                    $response['message'] = 'Verified Successfully And Received in Warehouse by Storekeeper.';
                                    // $response['returned']=$check_qr_status[0]->bsid;
                                    // $response['id_is']=$report_data;
                                    
                                   
                                }else{
                                    
                                    $current_status=$this->order_model->get_qr_current_status($code);
                                    $response['status'] = 200;
                                    $response['error'] = false;
                                    $response['message'] = "Can not able to Verify by Storekeeper! \n Current status: ".$current_status[0]->qr_status." \n Code: ".$code;
                                    // $response['id_is']=$report_data;
                                }
            
                    }else if($check_qr_status[0]->bsid == 6){
                    
                                       $current_status=$this->order_model->get_qr_current_status($code);
                                       
                                       if($current_status[0]->driver_name ==''){
                                                           $driver_name='Not Assigned';
                                                                 }else{
                                                                   $driver_name=$current_status[0]->driver_name;
                                                                        }

                                       if($current_status[0]->customer_name ==''){
                                                           $customer_name='Not Assigned';
                                                                 }else{
                                                                   $customer_name=$current_status[0]->customer_name;
                                                                        }      
                                     $response['status'] = 200;
                                    $response['error'] = false;
                                    $response['message'] = "Already Verified! \n Current status: ".$current_status[0]->qr_status." \n Code: ".$code." \n Verified by: ".$current_status[0]->name."\nCustomer: ".$customer_name."\nDriver: ".$driver_name;
                                    //  $response['returned']=$check_qr_status[0]->bsid;
                        }else if($check_qr_status[0]->bsid == 4){
                            
                            
                            
                             $current_status=$this->order_model->get_qr_current_status($code);
                             
                                      if($current_status[0]->driver_name ==''){
                                              $driver_name='Not Assigned';
                                                 }else{
                                                   $driver_name=$current_status[0]->driver_name;
                                                        }

                                              if($current_status[0]->customer_name ==''){
                                              $customer_name='Not Assigned';
                                                 }else{
                                                   $customer_name=$current_status[0]->customer_name;
                                                        }      
                            
                            
                                            $response['status'] = 200;
                                            $response['error'] = false;
                                            $response['message'] = "QR Bag is not scanned by driver.\n Current status: ".$current_status[0]->qr_status." \n Code: ".$code."\nCustomer: ".$customer_name."\nDriver: ".$driver_name;
                                            
                            
                            
                            
                        }else if($check_qr_status[0]->bsid == 1){
                            
                            
                            
                                          $current_status=$this->order_model->get_qr_current_status($code);
                                          
                                          if($current_status[0]->vendor_name ==''){
                                                        $vendor_name='Not Available';
                                                           }else{
                                                             $vendor_name=$current_status[0]->vendor_name;
                                                                  }

                                            $response['status'] = 200;
                                            $response['error'] = false;
                                            $response['message'] = "QR is not attached to any delivery. \n Current status: ".$current_status[0]->qr_status." \n Code: ".$code."\nPartner: ".$vendor_name;
                                            
                        }else{
      
                            
                             $current_status=$this->order_model->get_qr_current_status($code);
                             
                                                   
                                                            if($current_status[0]->driver_name ==''){
                                                     $driver_name='Not Assigned';
                                                        }else{
                                                          $driver_name=$current_status[0]->driver_name;
                                                               }

                                                            if($current_status[0]->customer_name ==''){
                                                     $customer_name='Not Assigned';
                                                        }else{
                                                          $customer_name=$current_status[0]->customer_name;
                                                               }  
                                                               
                                            $response['status'] = 200;
                                            $response['error'] = false;
                                            $response['message'] = "Access Denied!\nCurrent status: ".$current_status[0]->qr_status."\nCode: ".$code."\nCustomer: ".$customer_name."\nDriver: ".$driver_name;
                                            //  $response['returned']=$check_qr_status[0]->bsid;
                        }
            
            
            }else{
                    
                            $response['status'] = 200;
                            $response['error'] = false;
                            $response['message'] = 'Access Denied! Unknown QR';
                            
                }
                    
           
                
            
    }else {
                        $response['message'] = "Access Denied! Parameters are missing";
                        
                        echo json_encode($response);
                    }
           
            
        
            
             echo json_encode($response);
            
    }
    


     public function str_keeper_varified_bags_list_post(){
        $this->load->model('order_model');
        
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
       
      $headers = apache_request_headers();
      $this->is_authorized($headers['X-API-KEY']);
        //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id'])){
            
            

            $response['status'] = 200;
            $response['error'] = false;
           
            $strKeeper_id = $this->input->post('user_id');
            
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            if(!empty($this->input->post("date")) ){
                $sdate = date('Y-m-d', strtotime($this->input->post("date")));
                 $edate = date('Y-m-d', strtotime($this->input->post("date")));
            
            $from_date = $sdate;
            $to_date =  $edate;
            }
           
            //  $where = " qr.bsid =6 and qr.str_kpr_id=".$strKeeper_id." and o.qr_bag_id !=''  and o.str_keep_varification ='yes' and o.status ='Collected' and o.varified_by=".$strKeeper_id." and o.varified_at BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        
        $where = "  o.qr_bag_id !=''  and o.str_keep_varification ='yes' and o.status ='Collected' and o.varified_by=".$strKeeper_id." and o.varified_at BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        
            // $results=$this->vendor_model->str_kpr_pending_bags($where);
            
             $report_data =  $this->order_model->get_str_keeper_varified_bags_list($where);
             
            //   $response['success'] = true;
            // $response['msg'] = $report_data;
            // $response['date'] = $from_date;
            //  echo json_encode($response);
            //  die();
        if($report_data['result']){
            $response['status'] = 200;
            $response['error'] = false;
            $response['data'] = $report_data["records"];
           
        }else{
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'No verified bag!';
            $response['data'] =[];
        }
            
            
             echo json_encode($response);
            //  if (isset($summary[0]->date)){
            //     $response['message'] = "Deliveries for today are etc";
            //     $summary[0]->vendor_statistics = $segments;
            //     $response['data']['today_deliveries'] = $summary[0];
            //     $response['data']['today_bags_status'] = $summary2[0];
            //     echo json_encode($response);
            // } else {
            //     $response['message'] = "You have not assigned any deliveries right now. You will get a notification when admin will assign you deliveries for today.";
            //     $response['data']['today_deliveries'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
            //     echo json_encode($response);
            // }
        }else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
    
    
    
    
    
     public function str_keeper_bags_count_post(){
        $this->load->model('order_model');
        
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
       
      $headers = apache_request_headers();
      $this->is_authorized($headers['X-API-KEY']);
        //$this->is_session_exist($headers['Auth_token']);

        // if (isset($_POST['date'])){
            
            

            // $response['status'] = 200;
            // $response['error'] = false;
           
            $strkeepr_id = $this->input->post('user_id');
            
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            if(!empty($this->input->post("date"))){
                $sdate = date('Y-m-d', strtotime($this->input->post("date")));
                 $edate = date('Y-m-d', strtotime($this->input->post("date")));
            
            $from_date = $sdate;
            $to_date =  $edate;
            }
           
             $where = "o.own_bag_rcv_by_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        
            // $results=$this->vendor_model->str_kpr_pending_bags($where);
            
             $report_data =  $this->order_model->get_strkeeper_bag_count($where,$strkeepr_id);
            
            
            //  $response['status'] = 200;
            // $response['error'] = false;
            // $record = [
            //     'total_Pending' => '2',
            //     'total_verified' => '10'
            //     ];
            
            // $response['data']['records'][]= $record;
            // echo json_encode($response);
            // die();
             
            //   $response['success'] = true;
            // $response['msg'] = $report_data;
            // // $response['date'] = $from_date;
            //  echo json_encode($response);
            //  die();
        if($report_data['result']){
            
            if($report_data["records"][0]->total_Pending == NULL OR $report_data["records"][0]->total_Pending == 'NULL'){
                $report_data["records"][0]->total_Pending='0';
            }else{
                $report_data["records"][0]->total_Pending;
            }
            
             if($report_data["records"][0]->total_verified == NULL OR $report_data["records"][0]->total_verified == 'NULL' ){
                $report_data["records"][0]->total_verified='0';
            }else{
                $report_data["records"][0]->total_verified;
            }
            
            $response['status'] = 200;
            $response['error'] = false;
            $record = [
                'total_Pending' => $report_data["records"][0]->total_Pending,
                'total_verified' => $report_data["records"][0]->total_verified
                ];
            
            $response['data']['records'][]= $record;
             
           
        }else{
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'some error!';
        }
            
            
             echo json_encode($response);
            //  if (isset($summary[0]->date)){
            //     $response['message'] = "Deliveries for today are etc";
            //     $summary[0]->vendor_statistics = $segments;
            //     $response['data']['today_deliveries'] = $summary[0];
            //     $response['data']['today_bags_status'] = $summary2[0];
            //     echo json_encode($response);
            // } else {
            //     $response['message'] = "You have not assigned any deliveries right now. You will get a notification when admin will assign you deliveries for today.";
            //     $response['data']['today_deliveries'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
            //     echo json_encode($response);
            // }
        // }else {
        //     $response['message'] = "Can not Access";
        //     echo json_encode($response);
        // }
    }
    
    
    public function process_data_get(){
        
        $result = $this->order_model->get_records();
        $orders = [];
        
        //  print_r($result);
        // die();
        
        foreach($result as $item){
            $orders[$item->qr_bag_id] = $item;
        }
        
        $qrResult = $this->order_model->get_qrCodes();
       
         foreach($orders as $key => $item)
         {
            foreach($qrResult as $key2 => $qr)
            {
            if($item->qr_bag_id == $qr->qrid)
            {
                
                $data = [
                    'vendor_id'=> $item->vendor_id,
                    ];
                    $where = ['qrid'=>$qr->qrid];
                $this->order_model->update_process($data, $where);
                }
            }
        }
                echo '<pre>';
                echo 'success';
                echo '</pre>';
        
        
    }
    
    
    
    
    public function testxnoti_get(){
        // $this->load->model('Vehicle_model');
        // $roll_id= $this->customer_model->get_roll_id_by_userID('16664');
    //   $roll_id=$this->driver_model->get_driver_prof_details('40');
    //   echo '<pre>';
    //   print_r($roll_id);
    
    
    $this->load->library('Twilio_lib');
   $res= $this->twilio_lib->sendSMS('+923244057085','hi test msg');
   
   echo '<pre>';
   print_r($res);
   die();
   
       
       $d_old='cSnbs25Jt9A:APA91bFF9kCtAAXYrTEC_2weGP1bsp0iU3ixG9y0o6jNrdqz0Z7EUbVI7TCo9OlO2fJgQJJhp8gxjARekP9hSEwGh2h6_egAB3znAh7BTutLcE4R9Gf-wkOjumIc1nL9ncA37aPtkD4L';
       $d_new='dNQmFhp-DGk:APA91bHz74LYkbVVO9OVMmCexblUAc7hRMv-iZbEYJ2E1xxqgcSvMIYZg426_QPe9UPlGgYX000DdHV-yBohKQmEPCvRrMGeN_Eg9he_CluBEn1PoXzTb-ZgM76QLaA7ZzM-ZwAE6jy5';
       $d_test='deotl5VHThg:APA91bECZ4pSHRM15saSSrYvBrANCjaY_UNLRV_O1GPjE10tKs4tglGScbhx_Vpc7gNytLdLGsmJ3Vk13_twKVFYQ3fkciZDm3yggC-X0FmKxhFA1hKxrt221x0AL6EiLE9PkGOdDQQ7';
       $d_login='dH8jh2K5vQM:APA91bG3mdiVfFb5Y1hIDyi1K-OiiKglqsvfd9tqwL6dC1zeh60Fo3bL_oRoWn29QBMeVk_6pvzKYlj0B0zmZkm5fs6ikYG784sR5JCM_DvZEuGM-OIRKJW1xf1NlbhVQr-Ahh3QygF2';
    //   $data = array(
    //                     'user_id' => 17002,
    //                     'device_token' =>$d_login,
    //                     'platform' => '',
    //                     'status_code' => intval(600),
    //                     'title' => 'Logx Customer Care Service',
    //                     'for_whom' => 'test',
    //                     'badge' => 1,
    //                     'message' => 'hi tayyab'
    //                 );
                    
    //                  //send notification
    //               $r= send_notification_to_user($data, '');
    
    
    
     $data = array(
                        'user_id' =>17005,
                        'device_token' => 'dH8jh2K5vQM:APA91bHwQy-rUtDqFQrE0Sa6boAAb3LDTwstWqMEDJHjTdV8bdCsLP3ujTbgGlhly_3SQTo7Ua9hE1pFYgr9KbHnLIHuhDNAnVbn5OA-GdoFS_Ww1Gawt1O_tM6JuxPnxxa3Ri4oZbMs',
                        'platform' => '',
                        'status_code' => intval(601),
                        'title' => 'Delivered delivery',
                        'for_whom' => 'Customer',
                        'badge' => '1',
                        'message' => ' Your Delivery # 2370 has been delivered'
                    );

                    //send notification
                 $r=   send_notification_to_user($data , 'save');
      
      
      print_r($r);
      
      
            // $response['data']['vehicles'][] = $vehicle_detail[0];
            //  echo json_encode($response);
           
    }
    
    
    
    
    
    // {_15feb 2021 new APIS
    
    
     
    // New APIs 14 December 2020
    
    // storekeeper can switch qr and delivery between diff status::: 1
     
     
         public function check_qr_and_delivery_details_post(){
             
                 $this->load->model('order_model');
        
                 $response = array('status'=>400, 'error'=>true);

                 $data = json_decode(file_get_contents('php://input'), true);
                 $_POST = $data;
       
                 $headers = apache_request_headers();
                 $this->is_authorized($headers['X-API-KEY']);
                 $checkplatform= $headers['Platform'];
                 
                 if (isset($_POST['qr']) AND isset($_POST['user_id']) ){
                     
                       $platform=$checkplatform;
                       
                       $user_id=$this->input->post('user_id');
                       $qr=$this->input->post('qr');
                     if($platform =='ios'){
                         
                       
                          $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr);
                            //  print_r($current_status);
                        //   echo $current_status[0]->delivery_id;
                        //   die();
                          
                           $current_status[0]->status_list=$this->status_list($current_status[0]->bsid,$current_status[0]->delivery_id,$current_status[0]->delivery_canceled_check,$current_status[0]->delivery_status);
                          
                            // echo 'hello demo<pre>';
                        //  die();
                        //   print_r($current_status);
                          
                        //   print_r($status_list);
                        //   echo die();
                          
                          
                          if($current_status){
                              
                           $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'some msg and data!';
                           $response['data'] = $current_status;
                           
                          }else{
                               $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'some error!';
                           $response['data'] = "" ;
                              
                          }
                         
                         
                         
                         
                     }else if($platform =='android'){
                         
                        //   $current_status=$this->order_model->get_qr_current_status($code);
                        
                          $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr);
                          
                        //   echo 'hello demo<pre>';
                        //   print_r($current_status);
                        //   echo die();
                          
                           $current_status[0]->status_list=$this->status_list($current_status[0]->bsid,$current_status[0]->delivery_id,$current_status[0]->delivery_canceled_check,$current_status[0]->delivery_status);
                          
                          
                          
                             if($current_status){
                              
                           $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'some msg and data!';
                           $response['data'] = $current_status;
                           
                          }else{
                               $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'some error!';
                           $response['data'] = "" ;
                              
                          }
                         
                     }else{
                         
                         
                     }
                     
                 
                     
                     
                 }
                 
                 echo json_encode($response);
             
         }
    
    
    // 1 end
    
    
    
    // New Api for handling timeslot 
    
    
    public function timeslot_vendor_deliveries_post(){
        $this->load->model('Vehicle_model');
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
      
    //   echo 'helloo demo';
    //   print_r($data);
    //   die();
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) && isset($_POST['timeslot']) && isset($_POST['date'])){

            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $_POST['user_id'];
            $timeslot = $_POST['timeslot'];
            $date = $_POST['date'];
            $result =  $this->order_model->get_vendor_deliveries_timeslot($driver_id, $timeslot, $date);
        
        
        
            $response['data']['check'] = $result;
            $bg_recived = $result[0]->bag_received;
            
            
            // to validate driver before starts a delivery must scan a van and allot this to him
              $check_vehicle = $this->Vehicle_model->get_vehicle_Registration_num($driver_id);
             if($check_vehicle){
                 $check_vehicle -> scan ='yes';
             }else{
                //  sami bhae
                //  $check_vehicle -> scan ='No';
                $check_vehicle -> scan ='yes';
             }
            
            foreach($result as $key => $val){
               if($val->send_notification =='yes'){
                     $val->send_notification ='Yes';
                   }
                   
                   $val->scan=$check_vehicle -> scan;
              }
            
            // if($result[0]->send_notification =='yes'){
            //     $result[0]->send_notification ='Yes';
            // }
            // if($bg_recived ==0){
              
            //   $this->order_model->send_mail($result);
            // }
            
            $summary2 =  $this->order_model->get_deliveries_by_picked2_timeslot($driver_id, $timeslot, $date);
            if (count($result) > 0 ){
                for($i=0; $i<count($result); $i++){
                    $addr_link=json_decode($result[$i]->google_link_addrs);
                    // echo 'google address is:'.$addr_link->google_link.'<br>';
                    $result[$i]->geom = get_google_geocode($addr_link->google_link);
                    $result[$i]->google_link_is =$addr_link->google_link;
                }
                $response['message'] = "Deliveries List of a vendor are etc";
                $response['data']['deliveries'] = $result;
                $response['data']['today_bags_status'] = $summary2[0];
                
                
              
            //   echo '<pre>';
            //   print_r($response);
            //   die();
             
            //   $response['data']['vehicle_status'][] = $check_vehicle;
                echo json_encode($response);
            } else {
                $response['message'] = "Deliveries are not exist";
                $response['data']['deliveries'] = $result;
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
    
   // storekeeper reply for analyise qr and delivery status :::2
    //   public function analyse_update_qr_and_delivery_status_post_some_errors(){
             
    //              $this->load->model('order_model');
        
    //              $response = array('status'=>400, 'error'=>true,'message'=>'start');
            
    //              $data = json_decode(file_get_contents('php://input'), true);
    //              $_POST = $data;
                 
                 
                 
       
    //              $headers = apache_request_headers();
    //              $this->is_authorized($headers['X-API-KEY']);
    //              $checkplatform= $headers['platform'];
                 
    //              if (isset($_POST['qrid']) AND isset($_POST['qr_code']) AND isset($_POST['cur_qr_status']) AND isset($_POST['bsid']) AND isset($_POST['user_id']) AND isset($_POST['selectStatus']) ){
                     
                   
    //                 //  echo '<pre>';
    //                 //  print_r($_POST);
    //                 //  die();
                     
                     
                     
                     
    //                   $platform=$checkplatform;
    //                   $user_id=$_POST['user_id'];
    //                   $qr_code=$_POST['qr_code'];
    //                   $cur_bsid=$_POST['bsid'];
    //                   $cur_qr_status=$_POST['cur_qr_status'];
    //                   $qrid=$_POST['qrid'];
    //                   $delivery_status=$_POST['delivery_status'];
                       
    //                   $new_status=$_POST['selectStatus'];
    //                   $selectID=$_POST['selectID'];
                       
    //                   $delivery_id=0;
    //                   $delivery_status="";
    //                   $delivery_canceled_check="";
    //                   $reason="None";
                       
                       
    //                 //   if(isset($_POST['delivery_id'])){
    //                 //       $delivery_id=$_POST['delivery_id'];
    //                 //   }
    //                   if(isset($_POST['delivery_id'])){
    //                       $delivery_id=$_POST['delivery_id'];
    //                   }
    //                   if(isset($_POST['delivery_status'])){
    //                         $delivery_status=$_POST['delivery_status'];
    //                   }
    //                   if(isset($_POST['delivery_canceled_check'])){
    //                       $delivery_canceled_check=$_POST['delivery_canceled_check'];
    //                   }
    //                   if(isset($_POST['reason'])){
    //                         $reason=$_POST['reason'];
    //                   }
    //                     if(isset($_POST['driver_id'])){
    //                         $driver_id=$_POST['driver_id'];
    //                   }else{
    //                       $driver_id=0;
    //                   }
                       
                       
    //                   $rzn_notes=array(
                         
    //                       "delivery_id" =>$delivery_id,
    //                       "delivery_status" =>$delivery_status,
    //                       "delivery_canceled_check" =>$delivery_canceled_check,
    //                       "reason" =>$reason,
    //                       "new_status" =>$new_status,
    //                       "qrid" =>$qrid,
    //                       "cur_qr_status" =>$cur_qr_status,
    //                       "cur_bsid" =>$cur_bsid,
    //                       "qr_code" =>$qr_code,
    //                       "driver_id"=>$driver_id,
    //                       "platform"=>$platform
    //                     );
                       
                       
                       
    //                     $whr_for_qr=array('qrid'=>$qrid);
    //                     $whr_for_delivery=array('order_id'=>$delivery_id);
                       
                       
                       
                       
                       
    //                  if($platform =='ios'){
                         
    //                     //   $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr);
                          
                           
    //                       if($cur_bsid==1 AND $delivery_id ==0 ){
                              
    //                         //   echo 'hi i am when bsid is 1 and delivery id is 0 chech true ';
                              
                              
    //                         //   $rzn_notes["case"]="(cur_bsid==1 AND delivery_id ==0 )";
    //                         //   $rzn_note_jsn=json_encode($rzn_notes); 
                              
                              
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Qr is already Neutral!';
                              
                              
    //                       }else if($cur_bsid==2 AND $delivery_id !=0 AND $delivery_canceled_check =="yes" ){
    //                         //   AND $delivery_status=="Cancel" 
                              
    //                         //   echo 'ONLY CAN REVERT hi i am when bsid is 2 and delivery id  not is 0  and delivery status is cancel and cancel check is yes : chech true ';
                             
    //                           $rzn_notes['case']="(cur_bsid==2 AND delivery_id !=0 AND delivery_canceled_check ==yes)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
                             
    //                           if($new_status == "Neutral" AND $selectID==1){
                                   
    //                                 $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
    //                                   if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                      
                                      
    //                           }else{
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
    //                           }
                                   
                               
                              
                              
                              
                              
    //                       }else if($cur_bsid==3 AND $delivery_id !=0 AND $delivery_canceled_check =="yes" ){
    //                         //   AND $delivery_status=="Cancel" 
                            
    //                         $rzn_notes['case']="(cur_bsid==3 AND delivery_id !=0 AND delivery_canceled_check ==yes)";
    //                          $rzn_note_jsn=json_encode($rzn_notes);
                              
    //                           if($new_status == "Neutral" AND $selectID==1){
                                   
    //                                 $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
    //                                   if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                      
                                      
    //                           }else{
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
    //                           }
                               
    //                       }else if($cur_bsid==3 AND $delivery_id !=0 AND $delivery_canceled_check =="no" AND  $delivery_status=="Ship"){
                              
    //                           $rzn_notes['case']="(cur_bsid==3 AND delivery_id !=0 AND delivery_canceled_check ==no AND  delivery_status==Ship)";
    //                         $rzn_note_jsn=json_encode($rzn_notes);
                            
    //                          if($new_status == "Collected" AND $selectID==5){
                                   
    //                                  $ice_pack=0;
    //                                  $selection_res = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
    //                                  if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
                                   
    //                           }else if($new_status == "Received in Warehouse" AND $selectID==6){
    //                                 $response['message'] = 'inside if ios received in warehouse.';
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $ice_pack=0;
    //                                  $selection_res1_till_deliv_and_collected = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                                       
    //                                   if($selection_res1_till_deliv_and_collected){
                                           
    //                                     //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
                                         
    //                                           $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $ice_pack=0;
    //                                  $selection_res1_till_deliv_and_collected = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                                       
    //                                   if($selection_res1_till_deliv_and_collected){
                                           
                                          
                                           
                                          
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
    //                         //   echo ' $driver_id
    //                         //   case1: complete (delivered)
    //                         //   case2: collected
    //                         //   case3:verify by storekeeper
    //                         //   case4:verify by partner and neutral';
    //                         //   echo 'hi i am when bsid is 3 and delivery id  not is 0  and delivery status is in ship and cancel check is no : chech true ';
                              
                              
    //                       }else if ( ($cur_bsid==3 OR $cur_bsid==2) AND $delivery_id !=0 AND $delivery_canceled_check =="no" AND  ($delivery_status=="Assign" OR $delivery_status=="Not Assign")  ){
                              
    //                           $rzn_notes['case']="((cur_bsid==3 OR cur_bsid==2) AND delivery_id !=0 AND delivery_canceled_check ==no AND (delivery_status==Assign OR delivery_status==Not Assign))";
    //                         $rzn_note_jsn=json_encode($rzn_notes);
                              
    //                         //   echo 'only can revert back .hi i am when bsid is 3or 2 and delivery id  not is 0  and delivery status is Assignor not assign and cancel check is no : chech true ';
    //                               if($new_status == "Neutral" AND $selectID==1){
                                   
    //                                 $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
    //                                   if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                      
                                      
    //                           }else{
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
    //                           }
                              
    //                       }else if($cur_bsid==4 AND $delivery_status=="Collected"){
                              
    //                           $rzn_notes['case']="(cur_bsid==4 AND delivery_status==Collected)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
                            
                            
                            
    //                               if($new_status == "Collected" AND $selectID==5){
                                   
                                   
    //                                  $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
    //                                  if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
                                   
    //                           }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
                                     
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
    //                                   if($selection_res1_till_collected){
                                           
    //                                     //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
                                         
    //                                           $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
    //                                   if($selection_res1_till_collected){
                                           
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
    //                         //   echo 'its mean there is some issue in collected bag by driver so storekeeper can';
    //                         //   echo '
    //                         //   case1: qr collected
    //                         //   case2: verify by storekeeper
    //                         //   case3:veify by partner neutral
    //                         //   ';
                              
                              
    //                       }else if($cur_bsid==5 AND $delivery_status=="Delivered"){
                              
    //                           $rzn_notes['case']="cur_bsid==5 AND delivery_status==Delivered)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
    //                         //   echo 'its mean there is some issue in collected bag by driver so storekeeper can';
                              
                              
                              
    //                         //   echo '
    //                         //   case1: qr collected
    //                         //   case2: verify by storekeeper
    //                         //   case3:veify by partner neutral
    //                         //   ';
                            
                            
    //                           if($new_status == "Collected" AND $selectID==5){
                                   
                                   
    //                                  $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
    //                                  if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
                                   
    //                           }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
                                     
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
    //                                   if($selection_res1_till_collected){
                                           
    //                                     //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
                                         
    //                                           $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
    //                                   if($selection_res1_till_collected){
                                           
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
                              
                              
    //                       }else if($cur_bsid==4 AND $delivery_status=="Delivered"){
                              
    //                           $rzn_notes['case']="cur_bsid==4 AND delivery_status==Delivered)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
                               
                               
                               
    //                         //   echo '
    //                         //   case1: qr collected
    //                         //   case2: verify by storekeeper
    //                         //   case3:veify by partner neutral
    //                         //   ';
                            
                            
    //                           if($new_status == "Collected" AND $selectID==5){
                                   
                                   
    //                                  $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
    //                                  if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
                                   
    //                           }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
                                     
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
    //                                   if($selection_res1_till_collected){
                                           
    //                                     //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
                                         
    //                                           $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
    //                                   if($selection_res1_till_collected){
                                           
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
                              
                              
    //                       }else if($cur_bsid==5 AND $delivery_status=="Collected"){
                              
    //                           $rzn_notes['case']="cur_bsid==5 AND delivery_status==Collected)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
    //                         //   echo '
    //                         //   case2: verify by storekeeper
    //                         //   case3:veify by partner neutral
    //                         //   ';
                            
    //                           if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                        
    //                                      //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
                                      
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
    //                                      $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                           
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
                                       
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
                              
                              
    //                       }else if($cur_bsid==6 AND $delivery_status=="Collected"){
                              
    //                          $rzn_notes['case']="cur_bsid==6 AND delivery_status==Collected)";
    //                         $rzn_note_jsn=json_encode($rzn_notes);
    //                         // echo '
    //                         //  case3:veify by partner neutral
    //                         //   ';
                            
                             
    //                              if($new_status == "Neutral" AND $selectID==1){
                                           
    //                                         $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
                                          
                                      
                                       
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
                              
    //                       }else{
                              
    //                       }
                          
                          
    //                     //   echo 'hello demo<pre>';
    //                     //   print_r($rzn_note_jsn);
    //                     //   echo die();
                          
                          
    //                     //   if($current_status){
                              
    //                     //   $response['status'] = 200;
    //                     //   $response['error'] = false;
    //                     //   $response['message'] = 'some msg and data!';
    //                     //   $response['data'] = $current_status;
                           
    //                     //   }else{
    //                     //       $response['status'] = 200;
    //                     //   $response['error'] = false;
    //                     //   $response['message'] = 'some error!';
    //                     //   $response['data'] = $current_status;
                              
    //                     //   }
                         
                         
                         
                         
                     
                         
                         
    //                  }else if($platform =='android'){
                         
    //                     //   $current_status=$this->order_model->get_qr_current_status($code);
                        
    //                         if($cur_bsid==1 AND $delivery_id ==0 ){
                              
    //                         //   echo 'hi i am when bsid is 1 and delivery id is 0 chech true ';
                              
                              
    //                         //   $rzn_notes["case"]="(cur_bsid==1 AND delivery_id ==0 )";
    //                         //   $rzn_note_jsn=json_encode($rzn_notes); 
                              
                              
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Qr is already Neutral!';
                              
                              
    //                       }else if($cur_bsid==2 AND $delivery_id !=0 AND $delivery_canceled_check =="yes" ){
    //                         //   AND $delivery_status=="Cancel" 
                              
    //                         //   echo 'ONLY CAN REVERT hi i am when bsid is 2 and delivery id  not is 0  and delivery status is cancel and cancel check is yes : chech true ';
                             
    //                           $rzn_notes['case']="(cur_bsid==2 AND delivery_id !=0 AND delivery_canceled_check ==yes)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
                             
    //                           if($new_status == "Neutral" AND $selectID==1){
                                   
    //                                 $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
    //                                   if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                      
                                      
    //                           }else{
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
    //                           }
                                   
                               
                              
                              
                              
                              
    //                       }else if($cur_bsid==3 AND $delivery_id !=0 AND $delivery_canceled_check =="yes" ){
    //                         //   AND $delivery_status=="Cancel" 
                            
    //                         $rzn_notes['case']="(cur_bsid==3 AND delivery_id !=0 AND delivery_canceled_check ==yes)";
    //                          $rzn_note_jsn=json_encode($rzn_notes);
                              
    //                           if($new_status == "Neutral" AND $selectID==1){
                                   
    //                                 $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
    //                                   if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                      
                                      
    //                           }else{
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
    //                           }
                               
    //                       }else if($cur_bsid==3 AND $delivery_id !=0 AND $delivery_canceled_check =="no" AND  $delivery_status=="Ship"){
                              
    //                           $rzn_notes['case']="(cur_bsid==3 AND delivery_id !=0 AND delivery_canceled_check ==no AND  delivery_status==Ship)";
    //                         $rzn_note_jsn=json_encode($rzn_notes);
                            
    //                          if($new_status == "Collected" AND $selectID==5){
                                   
    //                                  $ice_pack=0;
    //                                  $selection_res = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
    //                                  if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
                                   
    //                           }else if($new_status == "Received in Warehouse" AND $selectID==6){
    //                                 $response['message'] = 'inside if ios received in warehouse.';
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $ice_pack=0;
    //                                  $selection_res1_till_deliv_and_collected = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                                       
    //                                   if($selection_res1_till_deliv_and_collected){
                                           
    //                                     //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
                                         
    //                                           $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $ice_pack=0;
    //                                  $selection_res1_till_deliv_and_collected = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                                       
    //                                   if($selection_res1_till_deliv_and_collected){
                                           
                                          
                                           
                                          
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
    //                         //   echo ' $driver_id
    //                         //   case1: complete (delivered)
    //                         //   case2: collected
    //                         //   case3:verify by storekeeper
    //                         //   case4:verify by partner and neutral';
    //                         //   echo 'hi i am when bsid is 3 and delivery id  not is 0  and delivery status is in ship and cancel check is no : chech true ';
                              
                              
    //                       }else if ( ($cur_bsid==3 OR $cur_bsid==2) AND $delivery_id !=0 AND $delivery_canceled_check =="no" AND  ($delivery_status=="Assign" OR $delivery_status=="Not Assign")  ){
                              
    //                           $rzn_notes['case']="((cur_bsid==3 OR cur_bsid==2) AND delivery_id !=0 AND delivery_canceled_check ==no AND (delivery_status==Assign OR delivery_status==Not Assign))";
    //                         $rzn_note_jsn=json_encode($rzn_notes);
                              
    //                         //   echo 'only can revert back .hi i am when bsid is 3or 2 and delivery id  not is 0  and delivery status is Assignor not assign and cancel check is no : chech true ';
    //                               if($new_status == "Neutral" AND $selectID==1){
                                   
    //                                 $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
    //                                   if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                      
                                      
    //                           }else{
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
    //                           }
                              
    //                       }else if($cur_bsid==4 AND $delivery_status=="Collected"){
                              
    //                           $rzn_notes['case']="(cur_bsid==4 AND delivery_status==Collected)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
                            
                            
                            
    //                               if($new_status == "Collected" AND $selectID==5){
                                   
                                   
    //                                  $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
    //                                  if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
                                   
    //                           }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
                                     
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
    //                                   if($selection_res1_till_collected){
                                           
    //                                     //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
                                         
    //                                           $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
    //                                   if($selection_res1_till_collected){
                                           
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
    //                         //   echo 'its mean there is some issue in collected bag by driver so storekeeper can';
    //                         //   echo '
    //                         //   case1: qr collected
    //                         //   case2: verify by storekeeper
    //                         //   case3:veify by partner neutral
    //                         //   ';
                              
                              
    //                       }else if($cur_bsid==5 AND $delivery_status=="Delivered"){
                              
    //                           $rzn_notes['case']="cur_bsid==5 AND delivery_status==Delivered)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
    //                         //   echo 'its mean there is some issue in collected bag by driver so storekeeper can';
                              
                              
                              
    //                         //   echo '
    //                         //   case1: qr collected
    //                         //   case2: verify by storekeeper
    //                         //   case3:veify by partner neutral
    //                         //   ';
                            
                            
    //                           if($new_status == "Collected" AND $selectID==5){
                                   
                                   
    //                                  $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
    //                                  if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
                                   
    //                           }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
                                     
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
    //                                   if($selection_res1_till_collected){
                                           
    //                                     //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
                                         
    //                                           $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
    //                                   if($selection_res1_till_collected){
                                           
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
                              
                              
    //                       }else if($cur_bsid==4 AND $delivery_status=="Delivered"){
                              
    //                           $rzn_notes['case']="cur_bsid==4 AND delivery_status==Delivered)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
                               
                               
                               
    //                         //   echo '
    //                         //   case1: qr collected
    //                         //   case2: verify by storekeeper
    //                         //   case3:veify by partner neutral
    //                         //   ';
                            
                            
    //                           if($new_status == "Collected" AND $selectID==5){
                                   
                                   
    //                                  $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
    //                                  if($selection_res){
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
                                   
    //                           }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
                                     
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
    //                                   if($selection_res1_till_collected){
                                           
    //                                     //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
                                         
    //                                           $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                   
                                   
    //                                  $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
    //                                   if($selection_res1_till_collected){
                                           
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
    //                                   }else{
                                           
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Network Error! Try Again.';
    //                                   }
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
                              
                              
    //                       }else if($cur_bsid==5 AND $delivery_status=="Collected"){
                              
    //                           $rzn_notes['case']="cur_bsid==5 AND delivery_status==Collected)";
    //                           $rzn_note_jsn=json_encode($rzn_notes);
    //                         //   echo '
    //                         //   case2: verify by storekeeper
    //                         //   case3:veify by partner neutral
    //                         //   ';
                            
    //                           if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
    //                                          $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                        
    //                                      //   $whr_for_qr=array('qrid'=>$qrid);
    //                                     //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
    //                                       $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res){
                                              
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
                                      
                                   
                                   
    //                               }else if($new_status == "Neutral" AND $selectID==1){
    //                                      $data_bag_status= array(
                      
    //                                               'bsid'=>6,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                     
    //                                          $data_ordertbl_update= array(
                                                
    //                                             'str_keep_varification'=>'yes',
    //                                             'varified_by'=>$user_id,
    //                                             'varified_at'=>date("Y-m-d H:i:s")
                                                
    //                                          );
                                           
    //                                       $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
    //                                       if($selection_res2_verify_by_strkeeper){
                                              
    //                                           $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
    //                                       }else{
    //                                           $response['status'] = 200;
    //                                           $response['error'] = false;
    //                                           $response['message'] = 'Network Error! Try Again.';
    //                                       }
                                           
                                      
                                       
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
                              
                              
    //                       }else if($cur_bsid==6 AND $delivery_status=="Collected"){
                              
    //                          $rzn_notes['case']="cur_bsid==6 AND delivery_status==Collected)";
    //                         $rzn_note_jsn=json_encode($rzn_notes);
    //                         // echo '
    //                         //  case3:veify by partner neutral
    //                         //   ';
                            
                             
    //                              if($new_status == "Neutral" AND $selectID==1){
                                           
    //                                         $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
    //                                             $data_for_neutral_bag_status= array(
                      
    //                                               'bsid'=>1,
    //                                               'str_kpr_id'=>$user_id
    //                                           );
                                               
    //                                           $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
    //                                           if($result_for_neutral){
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
    //                                           }else{
    //                                                 $response['status'] = 200;
    //                                                 $response['error'] = false;
    //                                                 $response['message'] = 'Network Error! Try Again.';
    //                                           }
                                               
                                          
                                      
                                       
    //                               }else{
                                   
    //                                       $response['status'] = 200;
    //                                       $response['error'] = false;
    //                                       $response['message'] = 'Choose Correctly!';
                                   
                                   
    //                               }
                              
    //                       }else{
                              
    //                       }
                         
    //                  }else{
                         
                         
    //                  }
                     
                 
                     
                     
    //              }else{
    //                         $response['status'] = 200;
    //                         $response['error'] = false;
    //                         $response['message'] = 'some mising required information!';
    //              }
                 
                 
    //             //  $response['message']=$rzn_notes;
    //              echo json_encode($response);
             
    //      }
    
     public function analyse_update_qr_and_delivery_status_post(){
             
                 $this->load->model('order_model');
        
                 $response = array('status'=>400, 'error'=>true,'message'=>'Access Denied!');
            
                 $data = json_decode(file_get_contents('php://input'), true);
                 $_POST = $data;
                 
                 
                 
       
                 $headers = apache_request_headers();
                 $this->is_authorized($headers['X-API-KEY']);
                 $checkplatform= $headers['Platform'];
                 
                 if (isset($_POST['qrid']) AND isset($_POST['qr_code']) AND isset($_POST['cur_qr_status']) AND isset($_POST['bsid']) AND isset($_POST['user_id']) AND isset($_POST['selectStatus']) ){
                     
                   
                    //  echo '<pre>';
                    //  print_r($_POST);
                    //  die();
                     
                     
                     
                     
                       $platform=$checkplatform;
                       $user_id=$_POST['user_id'];
                       $qr_code=$_POST['qr_code'];
                       $cur_bsid=$_POST['bsid'];
                       $cur_qr_status=$_POST['cur_qr_status'];
                       $qrid=$_POST['qrid'];
                       $delivery_status=$_POST['delivery_status'];
                       
                       $new_status=$_POST['selectStatus'];
                       $selectID=$_POST['selectID'];
                       
                       $delivery_id=0;
                       $delivery_status="";
                       $delivery_canceled_check="";
                       $reason="None";
                       
                       
                    //   if(isset($_POST['delivery_id'])){
                    //       $delivery_id=$_POST['delivery_id'];
                    //   }
                       if(isset($_POST['delivery_id'])){
                           $delivery_id=$_POST['delivery_id'];
                       }
                       if(isset($_POST['delivery_status'])){
                            $delivery_status=$_POST['delivery_status'];
                       }
                       if(isset($_POST['delivery_canceled_check'])){
                           $delivery_canceled_check=$_POST['delivery_canceled_check'];
                       }
                       if(isset($_POST['reason'])){
                            $reason=$_POST['reason'];
                       }
                        if(isset($_POST['driver_id'])){
                            $driver_id=$_POST['driver_id'];
                       }else{
                           $driver_id=0;
                       }
                       
                       
                       $rzn_notes=array(
                         
                           "delivery_id" =>$delivery_id,
                           "delivery_status" =>$delivery_status,
                           "delivery_canceled_check" =>$delivery_canceled_check,
                           "reason" =>$reason,
                           "new_status" =>$new_status,
                           "qrid" =>$qrid,
                           "cur_qr_status" =>$cur_qr_status,
                           "cur_bsid" =>$cur_bsid,
                           "qr_code" =>$qr_code,
                           "driver_id"=>$driver_id,
                           "platform"=>$platform
                        );
                       
                       
                       
                        $whr_for_qr=array('qrid'=>$qrid);
                        $whr_for_delivery=array('order_id'=>$delivery_id);
                       
                       
                       
                       
                       
                     if($platform =='ios' OR $platform =='android'){
                         
                        //   $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr);
                          
                           
                          if($cur_bsid==1 AND $delivery_id ==0 ){
                              
                            //   echo 'hi i am when bsid is 1 and delivery id is 0 chech true ';
                              
                              
                            //   $rzn_notes["case"]="(cur_bsid==1 AND delivery_id ==0 )";
                            //   $rzn_note_jsn=json_encode($rzn_notes); 
                              
                              
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Qr is already Neutral!';
                              
                              
                          }else if($cur_bsid==2 AND $delivery_id !=0 AND $delivery_canceled_check =="yes" ){
                            //   AND $delivery_status=="Cancel" 
                              
                            //   echo 'ONLY CAN REVERT hi i am when bsid is 2 and delivery id  not is 0  and delivery status is cancel and cancel check is yes : chech true ';
                             
                              $rzn_notes['case']="(cur_bsid==2 AND delivery_id !=0 AND delivery_canceled_check ==yes)";
                              $rzn_note_jsn=json_encode($rzn_notes);
                             
                               if($new_status == "Neutral" AND $selectID==1){
                                   
                                    $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
                                       if($selection_res){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                      
                                      
                               }else{
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
                               }
                                   
                               
                              
                              
                              
                              
                          }else if($cur_bsid==3 AND $delivery_id !=0 AND $delivery_canceled_check =="yes" ){
                            //   AND $delivery_status=="Cancel" 
                            
                            $rzn_notes['case']="(cur_bsid==3 AND delivery_id !=0 AND delivery_canceled_check ==yes)";
                             $rzn_note_jsn=json_encode($rzn_notes);
                              
                               if($new_status == "Neutral" AND $selectID==1){
                                   
                                    $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
                                       if($selection_res){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                      
                                      
                               }else{
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
                               }
                               
                          }else if($cur_bsid==3 AND $delivery_id !=0 AND $delivery_canceled_check =="no" AND  $delivery_status=="Ship"){
                              
                              $rzn_notes['case']="(cur_bsid==3 AND delivery_id !=0 AND delivery_canceled_check ==no AND  delivery_status==Ship)";
                            $rzn_note_jsn=json_encode($rzn_notes);
                            
                             if($new_status == "Collected" AND $selectID==5){
                                   
                                     $ice_pack=0;
                                     $selection_res = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                     if($selection_res){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   
                                   
                                   
                               }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                    $response['message'] = 'inside if ios received in warehouse.';
                                             $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s")
                                                
                                             );
                                   
                                   
                                     $ice_pack=0;
                                     $selection_res1_till_deliv_and_collected = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                                       
                                       if($selection_res1_till_deliv_and_collected){
                                           
                                        //   $whr_for_qr=array('qrid'=>$qrid);
                                        //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
                                           $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res){
                                              
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   
                                   
                                   }else if($new_status == "Neutral" AND $selectID==1){
                                         
                                               $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s")
                                                
                                             );
                                   
                                   
                                     $ice_pack=0;
                                     $selection_res1_till_deliv_and_collected = $this->order_model->change_to_collected_delivery_qr_strkeeper($qr_code,"Collected",$driver_id,$delivery_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                                       
                                       if($selection_res1_till_deliv_and_collected){
                                           
                                          
                                           
                                          
                                           $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res2_verify_by_strkeeper){
                                              
                                               $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
                                                $data_for_neutral_bag_status= array(
                      
                                                  'bsid'=>1,
                                                  'str_kpr_id'=>$user_id
                                               );
                                               
                                               $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                               if($result_for_neutral){
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                               }else{
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'Network Error! Try Again.';
                                               }
                                               
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly!';
                                   
                                   
                                   }
                            //   echo ' $driver_id
                            //   case1: complete (delivered)
                            //   case2: collected
                            //   case3:verify by storekeeper
                            //   case4:verify by partner and neutral';
                            //   echo 'hi i am when bsid is 3 and delivery id  not is 0  and delivery status is in ship and cancel check is no : chech true ';
                              
                              
                          }else if ( ($cur_bsid==3 OR $cur_bsid==2) AND $delivery_id !=0 AND $delivery_canceled_check =="no" AND  ($delivery_status=="Assign" OR $delivery_status=="Not Assign")  ){
                              
                               $rzn_notes['case']="((cur_bsid==3 OR cur_bsid==2) AND delivery_id !=0 AND delivery_canceled_check ==no AND (delivery_status==Assign OR delivery_status==Not Assign))";
                            $rzn_note_jsn=json_encode($rzn_notes);
                              
                            //   echo 'only can revert back .hi i am when bsid is 3or 2 and delivery id  not is 0  and delivery status is Assignor not assign and cancel check is no : chech true ';
                                  if($new_status == "Neutral" AND $selectID==1){
                                   
                                    $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                       
                                       if($selection_res){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                      
                                      
                               }else{
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly as QR status is attached to delivery(QR attached by Partner) but delivery is canceled so you can only make the QR neutral by de-attach it from delivery.';
                                   
                               }
                              
                          }else if($cur_bsid==4 AND $delivery_status=="Collected"){
                              
                               $rzn_notes['case']="(cur_bsid==4 AND delivery_status==Collected)";
                               $rzn_note_jsn=json_encode($rzn_notes);
                            
                            
                            
                                   if($new_status == "Collected" AND $selectID==5){
                                   
                                   
                                     $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                     if($selection_res){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   
                                   
                                   
                               }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
                                             $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s")
                                                
                                             );
                                   
                                   
                                     
                                     $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
                                       if($selection_res1_till_collected){
                                           
                                        //   $whr_for_qr=array('qrid'=>$qrid);
                                        //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
                                           $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res){
                                              
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   
                                   
                                   }else if($new_status == "Neutral" AND $selectID==1){
                                         
                                               $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s")
                                                
                                             );
                                   
                                   
                                     $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
                                       if($selection_res1_till_collected){
                                           
                                          $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res2_verify_by_strkeeper){
                                              
                                               $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
                                                $data_for_neutral_bag_status= array(
                      
                                                  'bsid'=>1,
                                                  'str_kpr_id'=>$user_id
                                               );
                                               
                                               $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                               if($result_for_neutral){
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                               }else{
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'Network Error! Try Again.';
                                               }
                                               
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly!';
                                   
                                   
                                   }
                            //   echo 'its mean there is some issue in collected bag by driver so storekeeper can';
                            //   echo '
                            //   case1: qr collected
                            //   case2: verify by storekeeper
                            //   case3:veify by partner neutral
                            //   ';
                              
                              
                          }else if($cur_bsid==5 AND $delivery_status=="Delivered"){
                              
                              $rzn_notes['case']="cur_bsid==5 AND delivery_status==Delivered)";
                              $rzn_note_jsn=json_encode($rzn_notes);
                            //   echo 'its mean there is some issue in collected bag by driver so storekeeper can';
                              
                              
                              
                            //   echo '
                            //   case1: qr collected
                            //   case2: verify by storekeeper
                            //   case3:veify by partner neutral
                            //   ';
                            
                            
                              if($new_status == "Collected" AND $selectID==5){
                                   
                                   
                                     $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                     if($selection_res){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   
                                   
                                   
                               }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
                                             $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s")
                                                
                                             );
                                   
                                   
                                     
                                     $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
                                       if($selection_res1_till_collected){
                                           
                                        //   $whr_for_qr=array('qrid'=>$qrid);
                                        //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
                                           $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res){
                                              
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   
                                   
                                   }else if($new_status == "Neutral" AND $selectID==1){
                                         
                                               $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s")
                                                
                                             );
                                   
                                   
                                     $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
                                       if($selection_res1_till_collected){
                                           
                                          $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res2_verify_by_strkeeper){
                                              
                                               $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
                                                $data_for_neutral_bag_status= array(
                      
                                                  'bsid'=>1,
                                                  'str_kpr_id'=>$user_id
                                               );
                                               
                                               $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                               if($result_for_neutral){
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                               }else{
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'Network Error! Try Again.';
                                               }
                                               
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly!';
                                   
                                   
                                   }
                              
                              
                          }else if($cur_bsid==4 AND $delivery_status=="Delivered"){
                              
                               $rzn_notes['case']="cur_bsid==4 AND delivery_status==Delivered)";
                               $rzn_note_jsn=json_encode($rzn_notes);
                               
                               
                               
                            //   echo '
                            //   case1: qr collected
                            //   case2: verify by storekeeper
                            //   case3:veify by partner neutral
                            //   ';
                            
                            
                              if($new_status == "Collected" AND $selectID==5){
                                   
                                   
                                     $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                     if($selection_res){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   
                                   
                                   
                               }else if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
                                             $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s")
                                                
                                             );
                                   
                                   
                                     
                                     $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                       
                                       if($selection_res1_till_collected){
                                           
                                        //   $whr_for_qr=array('qrid'=>$qrid);
                                        //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                           
                                          
                                           $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res){
                                              
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   
                                   
                                   }else if($new_status == "Neutral" AND $selectID==1){
                                         
                                               $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s")
                                                
                                             );
                                   
                                   
                                     $selection_res1_till_collected = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
                                      
                                       if($selection_res1_till_collected){
                                           
                                          $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res2_verify_by_strkeeper){
                                              
                                               $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
                                                $data_for_neutral_bag_status= array(
                      
                                                  'bsid'=>1,
                                                  'str_kpr_id'=>$user_id
                                               );
                                               
                                               $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                               if($result_for_neutral){
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                               }else{
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'Network Error! Try Again.';
                                               }
                                               
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Network Error! Try Again.';
                                       }
                                   }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly!';
                                   
                                   
                                   }
                              
                              
                          }else if($cur_bsid==5 AND $delivery_status=="Collected"){
                              
                               $rzn_notes['case']="cur_bsid==5 AND delivery_status==Collected)";
                               $rzn_note_jsn=json_encode($rzn_notes);
                            //   echo '
                            //   case2: verify by storekeeper
                            //   case3:veify by partner neutral
                            //   ';
                            
                              if($new_status == "Received in Warehouse" AND $selectID==6){
                                   
                                             $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s"),
                                                
                                                'forcely_changed_by' => $user_id,
                                                'forcely_changed_at' => date('Y-m-d H:i:s'),
                                                'forcely_check' => 'yes',
                                                'forcely_reason' => $reason,
                                                'forcely_status_was' => $rzn_note_jsn,
                                                'forcely_selection' => $new_status
                                             );
                                             
                                            //  $data_ordertbl_update["forcely_changed_by"]=$userid;
                                            //  $data_ordertbl_update["forcely_changed_at"]=date('Y-m-d H:i:s');
                                            //  $data_ordertbl_update["forcely_check"]="yes";
                                            //  $data_ordertbl_update["forcely_reason"]=$reason;
                                            //  $data_ordertbl_update["forcely_status_was"]=$rzn_note_jsn;
                                            //  $data_ordertbl_update["forcely_selection"]=$new_status;
                                        
                                         //   $whr_for_qr=array('qrid'=>$qrid);
                                        //   $whr_for_delivery=array('order_id'=>$delivery_id);
                                        
                                        //   ,$user_id,$reason,$rzn_note_jsn,$new_status
                                          
                                           $selection_res = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res){
                                              
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                      
                                   
                                   
                                   }else if($new_status == "Neutral" AND $selectID==1){
                                         $data_bag_status= array(
                      
                                                  'bsid'=>6,
                                                  'str_kpr_id'=>$user_id
                                               );
                     
                                             $data_ordertbl_update= array(
                                                
                                                'str_keep_varification'=>'yes',
                                                'varified_by'=>$user_id,
                                                'varified_at'=>date("Y-m-d H:i:s"),
                                                
                                                 'forcely_changed_by' => $user_id,
                                                'forcely_changed_at' => date('Y-m-d H:i:s'),
                                                'forcely_check' => 'yes',
                                                'forcely_reason' => $reason,
                                                'forcely_status_was' => $rzn_note_jsn,
                                                'forcely_selection' => $new_status
                                                
                                             );
                                             
                                            //  $data_ordertbl_update["forcely_changed_by"]=$userid;
                                            //  $data_ordertbl_update["forcely_changed_at"]=date('Y-m-d H:i:s');
                                            //  $data_ordertbl_update["forcely_check"]="yes";
                                            //  $data_ordertbl_update["forcely_reason"]=$reason;
                                            //  $data_ordertbl_update["forcely_status_was"]=$rzn_note_jsn;
                                            //  $data_ordertbl_update["forcely_selection"]=$new_status;
                                           
                                          $selection_res2_verify_by_strkeeper = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                           if($selection_res2_verify_by_strkeeper){
                                              
                                               $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
                                                $data_for_neutral_bag_status= array(
                      
                                                  'bsid'=>1,
                                                  'str_kpr_id'=>$user_id
                                               );
                                               
                                               $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                               if($result_for_neutral){
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                               }else{
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'Network Error! Try Again.';
                                               }
                                               
                                           }else{
                                               $response['status'] = 200;
                                               $response['error'] = false;
                                               $response['message'] = 'Network Error! Try Again.';
                                           }
                                           
                                      
                                       
                                   }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly!';
                                   
                                   
                                   }
                              
                              
                          }else if($cur_bsid==6 AND $delivery_status=="Collected"){
                              
                             $rzn_notes['case']="cur_bsid==6 AND delivery_status==Collected)";
                            $rzn_note_jsn=json_encode($rzn_notes);
                            // echo '
                            //  case3:veify by partner neutral
                            //   ';
                            
                             
                                 if($new_status == "Neutral" AND $selectID==1){
                                           
                                            $data_for_neutral_deliv = array("is_neutral"=>1,
                                            "neutral_by"=>$user_id,
                                            "neutral_at"=>date("Y-m-d H:i:s"),
                                            
                                            "forcely_changed_by" => $user_id,
                                            "forcely_changed_at" => date('Y-m-d H:i:s'),
                                            "forcely_check" => "yes",
                                            "forcely_reason" => $reason,
                                            "forcely_status_was" => $rzn_note_jsn,
                                            "forcely_selection" => $new_status
                                            
                                            );
                                            
                                            
                                            //  $data_for_neutral_deliv["forcely_changed_by"]=$userid;
                                            //  $data_for_neutral_deliv["forcely_changed_at"]=date('Y-m-d H:i:s');
                                            //  $data_for_neutral_deliv["forcely_check"]="yes";
                                            //  $data_for_neutral_deliv["forcely_reason"]=$reason;
                                            //  $data_for_neutral_deliv["forcely_status_was"]=$rzn_note_jsn;
                                            //  $data_for_neutral_deliv["forcely_selection"]=$new_status;
                                            
                                            
                                                $data_for_neutral_bag_status= array(
                      
                                                  'bsid'=>1,
                                                  'str_kpr_id'=>$user_id
                                               );
                                               
                                               $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                               if($result_for_neutral){
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                               }else{
                                                    $response['status'] = 200;
                                                    $response['error'] = false;
                                                    $response['message'] = 'Network Error! Try Again.';
                                               }
                                               
                                          
                                      
                                       
                                   }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Choose Correctly!';
                                   
                                   
                                   }
                              
                          }else{
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'This case is not handled a new case!';
                          }
                          
                          
                        //   echo 'hello demo<pre>';
                        //   print_r($rzn_note_jsn);
                        //   echo die();
                          
                          
                        //   if($current_status){
                              
                        //   $response['status'] = 200;
                        //   $response['error'] = false;
                        //   $response['message'] = 'some msg and data!';
                        //   $response['data'] = $current_status;
                           
                        //   }else{
                        //       $response['status'] = 200;
                        //   $response['error'] = false;
                        //   $response['message'] = 'some error!';
                        //   $response['data'] = $current_status;
                              
                        //   }
                         
                         
                         
                         
                     
                         
                         
                     }else{
                         
                            $response['status'] = 200;
                            $response['error'] = false;
                            $response['message'] = 'Unknown Platform!';
                     }
                     
                 
                     
                     
                 }else{
                            $response['status'] = 200;
                            $response['error'] = false;
                            $response['message'] = 'Missing Parameters!';
                 }
                 
                 
                //  $response['message']=$rzn_notes;
                 echo json_encode($response);
             
         }
   
    
    // 2 end
    
     // API for driver partner and storekeeper to check qr status 
    
    
    public function check_qr_status_with_resp_to_delivery_post(){
          
          
                  $this->load->model('order_model');
        
                 $response = array('status'=>400, 'error'=>true);

                 $data = json_decode(file_get_contents('php://input'), true);
                 $_POST = $data;
       
                 $headers = apache_request_headers();
                 $this->is_authorized($headers['X-API-KEY']);
                 $check= $headers['Platform'];
                 
                 $response['data']=$check;
                 
                 if (isset($_POST['qr']) AND isset($_POST['user_id']) ){
                     
                     
                    //   $platform=$this->input->post('platform');
                         $platform=$check;
                       $user_id=$this->input->post('user_id');
                       $qr=$this->input->post('qr');
                     if($platform =='ios'){
                         
                          $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr);
                          
                          
                          
                          
                          if($current_status){
                              
                           $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'some msg and data!';
                           $response['data'] = $current_status;
                           
                          }else{
                               $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'some error!';
                           $response['data'] = $current_status;
                              
                          }
        
                //   $current_status=$this->order_model->get_qr_current_status($code);
                             
                                                   
                                                            if($current_status[0]->delivery_assigned_driver_name ==''){
                                                                $driver_name='Not Assigned';
                                                        }else{
                                                             $driver_name=$current_status[0]->delivery_assigned_driver_name;
                                                               }

                                                            if($current_status[0]->delivery_customer_name ==''){
                                                             $customer_name='Not Assigned';
                                                        }else{
                                                              $customer_name=$current_status[0]->delivery_customer_name;
                                                               }
                                                               
                                                             if($current_status[0]->delivery_status==""){
                                                                 $delivery_status="No Attachment";
                                                             }else{
                                                                 $delivery_status=$current_status[0]->delivery_status;
                                                             } 
                                                             
                                                             if($current_status[0]->neutral_by){
                                                                 $partner_verification="Yes";
                                                             }else{
                                                                 $partner_verification="No";
                                                             }
                                                             
                                                             if($current_status[0]->varified_by_n ==""){
                                                                 $strkeepr_verification="NO";
                                                             }else{
                                                                 $strkeepr_verification="Yes-".$current_status[0]->varified_by_n;
                                                             }
                                                             
                                                             
                                                             
                                         if($current_status){                       
                                            $response['status'] = 200;
                                            $response['error'] = false;
                                            $response['message'] = "QR Status: ".$current_status[0]->qr_status."\nCode: ".$current_status[0]->code."\nPartner: ".$current_status[0]->qr_vendor_name."\nCustomer: ".$customer_name."\nDriver: ".$driver_name."\nDelivery Status: ".$delivery_status."\nStorekeeper Verification: ".$strkeepr_verification."\nPartner Verification: ".$partner_verification;
                                           
                                         }else{
                                             
                                              $response['status'] = 200;
                                              $response['error'] = false;
                                              $response['message'] = 'some error!';
                                            //   $response['data'] = $current_status;
                              
                                             }
        
        
                          }else if($platform =='android'){
                         
                        //   $current_status=$this->order_model->get_qr_current_status($code);
                        
                          $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr);
                          
                          
                          
                          
                          if($current_status){
                              
                           $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'some msg and data!';
                           $response['data'] = $current_status;
                           
                          }else{
                               $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'some error!';
                           $response['data'] = $current_status;
                              
                          }
        
                //   $current_status=$this->order_model->get_qr_current_status($code);
                             
                                                   
                                                            if($current_status[0]->delivery_assigned_driver_name ==''){
                                                                $driver_name='Not Assigned';
                                                        }else{
                                                             $driver_name=$current_status[0]->delivery_assigned_driver_name;
                                                               }

                                                            if($current_status[0]->delivery_customer_name ==''){
                                                             $customer_name='Not Assigned';
                                                        }else{
                                                              $customer_name=$current_status[0]->delivery_customer_name;
                                                               }
                                                               
                                                             if($current_status[0]->delivery_status==""){
                                                                 $delivery_status="No Attachment";
                                                             }else{
                                                                 $delivery_status=$current_status[0]->delivery_status;
                                                             } 
                                                             
                                                             if($current_status[0]->neutral_by){
                                                                 $partner_verification="Yes";
                                                             }else{
                                                                 $partner_verification="No";
                                                             }
                                                             
                                                             if($current_status[0]->varified_by_n ==""){
                                                                 $strkeepr_verification="NO";
                                                             }else{
                                                                 $strkeepr_verification="Yes-".$current_status[0]->varified_by_n;
                                                             }
                                                             
                                                             
                                                             
                                         if($current_status){                       
                                            $response['status'] = 200;
                                            $response['error'] = false;
                                            $response['message'] = "QR Status: ".$current_status[0]->qr_status."\nCode: ".$current_status[0]->code."\nPartner: ".$current_status[0]->qr_vendor_name."\nCustomer: ".$customer_name."\nDriver: ".$driver_name."\nDelivery Status: ".$delivery_status."\nStorekeeper Verification: ".$strkeepr_verification."\nPartner Verification: ".$partner_verification;
                                           
                                         }else{
                                             
                                              $response['status'] = 200;
                                              $response['error'] = false;
                                              $response['message'] = 'some error!';
                                            //   $response['data'] = $current_status;
                              
                                             }
                         
                     }else{
                         
                         
                     }
    
                 }
                 
                 
                 
                 echo json_encode($response);
    }
  
    public function end_journeyt_post(){
       
        if(isset($_POST['user_id']) && isset($_POST['delivery_id']) && $_POST['status'] == "Delivered"){
            
            // if(isset($_POST['bag_type'])){
                
            //     // if 0 then its a disposible bag no need to do tracking
            //     // if 1 then its a cooler bag and tracking is must
            //     $bag_check=$this->input->post('bag_type');
            // }
            
           
            
            
            
            // drivers bag check during delivery time
               $driver_verify_bag_check='';
            


              
              $bags_qty=0;   //tayyab ios dealing

            $order_id = $_POST['delivery_id'];
            $status = $_POST['status'];
            $driver_id = $_POST['user_id'];
            $customer_id = @$_POST['customer_id'];
            $bags_qty = $_POST['bags_received'];
            $ice_bags = $_POST['ice_bags'];
           $qrcodes = "";
           $qrImploded = "";
           
       
           // $trackBagD =  $this->order_model->updateTrackBagQrD($order_id,4,$data); //Deleivered delivery and QR 
           
            
            $trackBag =  $this->order_model->updateTrackBagQr($qrcode,5);
                    
                  
                    
                    
                   
                    
               
                
                //tayyab ios dealing end 
                
                 
                
               
                     $ice_pack=0;
             
                 $collectBag = $this->order_model->change_to_collected_delivery_qr($qr_code,"Collected",$driver_id,$order_id,$ice_pack,0,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                
         
            
                
          
            // $qrImploded = implode(",",$qrcodes);
            
            }
            
            // 'status'=>$status, 
            $fields = array('delivered_status'=>1, 'delivered_date'=>date('Y-m-d H:i:s'),'tot_ice_pack_received'=>$ice_bags,'bag_received_qr'=>$qrImploded,'driver_verify_bag'=>$driver_verify_bag_check);
            $where = array('order_id'=>$order_id, 'driver_id'=>$driver_id);
            $result =  $this->order_model->update($fields, $where);
            $where_delivery = array('order_id'=>$order_id);
            if($bags_qty > 0){
                // $update_bag = array('bag_received'=>$bags_qty);
                
                $update_bag = array('total_bag_recv_by_driver'=>$bags_qty);
                $this->order_model->update($update_bag, $where_delivery);
            }else{
                // $update_bag = array('bag_received'=>0);
                $update_bag = array('total_bag_recv_by_driver'=>0);
                $this->order_model->update($update_bag, $where_delivery);
                 $delivery =  $this->order_model->get_order_by_id($order_id);
               
              //  for($i=0; $i<count($delivery); $i++){
                    // $result=$delivery;
                    
                     $this->order_model->send_mail($delivery);
                   
            //         $msg = "Dear ".$delivery[$i]->vendor.",<br/><br/>
            //         Your Driver has collected 0 number of bags from Customer ".$delivery[$i]->customer.". It is a system generated 
            //         reminder for you due to 0 bags received from client. <br/><br/> 
            //          Regards, <br/><br/>
            //         TEAM L O G X<br/>";
                   
           
            //  $param = array('to'=>$delivery[$i]->vendor_email, 'msg'=>$msg, 'subject'=>'No Bag Received', 'identification'=>'LOGX');
            //     send_email($param);
            //     $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'No Bag Received', 'identification'=>'LOGX');
            //     send_email($param);     
                    
                //}
        
            }

            if(isset($_FILES['images']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'delivery_img';
                $delivery_img = $this->upload_image($driver_id, @$_FILES['images']['tmp_name'], @$_FILES['images']['name'], $temp_name);

                if($delivery_img){
                    $update_field = array('delivery_img'=>$delivery_img);
                    $this->order_model->update($update_field, $where_delivery);
                }
            }

            if(isset($_FILES['signature_img']['tmp_name'])) {

                $temp_name = mt_rand(100, 10000) . 'signature_img';
                $signature_img = $this->upload_image($driver_id, @$_FILES['signature_img']['tmp_name'], @$_FILES['signature_img']['name'], $temp_name);

                if($signature_img){
                    $update_signature = array('signature_img'=>$signature_img);
                    $this->order_model->update($update_signature, $where_delivery);
                }
            }

            if($result){
                $delivery =  $this->order_model->get_order_by_id($order_id);
               
                for($i=0; $i<count($delivery); $i++){
                   // $delivery[$i]->geom = get_google_geocode($delivery[$i]->delivery_address);
                   $delivery[$i]->geom = "25.186482, 55.371089";
                 //   $msg = 'Dear '.$delivery[$i]->name_on_delivery.','."\r\n \r\n".'Your "'.$delivery[$i]->vendor.'" food bag has been delivered to your location.'.' Enjoy your food and please dont forget to leave your empty cooler bag outside for us to collect.'."\r\n \r\n".'Thanks, '."\r\n".'TEAM LOGX'."\r\n".'( Logistics Partner of "'.$delivery[$i]->vendor.'")';
                   
                    
                    
                    
                   
                 //   send_expert_sms($delivery[$i]->number_on_delivery,$msg);
                }


                $response['error'] = false;
                $response['status'] = 200;
                $response['message'] = 'Your order has been completed';
                $response['data']['images_path'] = IMAGE_PATH;
                $delivery[0]->qrcodes = $qrcodes;
                $response['data']['delivery'] = $delivery[0];

                //PUSH NOTIFICATION
                //get device token
                $where = array('id' => $delivery[0]->customer_id);
                $user = $this->notification_model->get_device_token($where);
                // if (count($user) > 0 && @$user[0]->device_token != '') {
                if (count($user) > 0 ) {
                    $data = array(
                        'user_id' => $delivery[0]->customer_id,
                        'device_token' => $user[0]->device_token,
                        'platform' => $user[0]->platform,
                        'status_code' => intval(601),
                        'title' => 'Delivered delivery',
                        'for_whom' => 'Customer',
                        'badge' => $user[0]->badge_count,
                        'message' => ' Your Delivery # '.$order_id.' has been delivered'
                    );

                    //send notification
                    send_notification_to_user($data , 'save');
                }

            }else{
                $response['message'] = "Order not exist";
            }
       
      
        echo json_encode($response);
     }
     
    public function forcefully_collected_by_strkeeper_post(){
         
         $this->load->model('order_model');
        
                 $response = array('status'=>400, 'error'=>true,'message'=>'start');
            
                 $data = json_decode(file_get_contents('php://input'), true);
                 $_POST = $data;
                 
                 
                 
       
                 $headers = apache_request_headers();
                 $this->is_authorized($headers['X-API-KEY']);
                 
                  $checkplatform= $headers['Platform'];
                 
                 if (isset($_POST['qrcode']) AND isset($_POST['user_id'])){
                     
                       $response['message']='inside if';
                     
                       $platform=$checkplatform;
                       $user_id=$_POST['user_id'];
                       $qr_code=$_POST['qrcode'];
                       
                          $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr_code);
                          
                        //   echo '<pre>';
                        //   print_r($current_status);
                        //   die();
                         
                         if($current_status){
                             
                                  $qrid=$current_status[0]->qrid;
                                  $bsid=$current_status[0]->bsid;
                                  $order_id=$current_status[0]->delivery_id;
                                  $driver_id=0;
                                  $rzn="forcefully_collected_by_strkeeper";
                                  $selected_status="Collected";
                                  $cur_qr_status=$current_status[0]->qr_status;
                                  $delivery_canceled_check=$current_status[0]->delivery_canceled_check;
                                  $delivery_status=$current_status[0]->delivery_status;
                             
                              if($current_status[0]->delivery_status =="Delivered" AND $current_status[0]->bsid==4){
                                  
                                      $rzn_notes=array(
                         
                                                  "delivery_id" => $order_id,
                                                  "delivery_status" =>$delivery_status,
                                                  "delivery_canceled_check" =>$delivery_canceled_check,
                                                  "reason" =>$rzn,
                                                  "new_status" =>$selected_status,
                                                  "qrid" =>$qrid,
                                                  "cur_qr_status" =>$cur_qr_status,
                                                  "cur_bsid" =>$bsid,
                                                  "qr_code" =>$qr_code,
                                                  "driver_id"=>$driver_id,
                                                  "platform"=>$platform,
                                                  "case"=>"forcefully_collected_by_strkeeper_post"
                                               );
                                               
                                            
                                              $rzn_note_jsn=json_encode($rzn_notes);
                                  
                                  
                                  $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($order_id,$driver_id,$qr_Code,$user_id,$rzn,$rzn_note_jsn,$selected_status,$qrid);
                              
                                   if($selection_res){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has not been updated. Network Issue!';
                                       }
                                  
                                  
                              }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' can not be updated because Qr and delivery status is not minimum at delivered stage. Qr:'.$cur_qr_status.' delivery status:'.$delivery_status;
                                     
                               }
                          
                          
                         }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Unknown QR!';
                                     
                               }      
                       
                 }else{
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Missing parameters!';
                 }
                 
                 
                   echo json_encode($response);
                     
     }
     
    public function forcefully_neutral_by_strkeeper_post(){
         
         $this->load->model('order_model');
        
                 $response = array('status'=>400, 'error'=>true,'message'=>'start');
            
                 $data = json_decode(file_get_contents('php://input'), true);
                 $_POST = $data;
                 
                 
                 
       
                 $headers = apache_request_headers();
                 $this->is_authorized($headers['X-API-KEY']);
                  $checkplatform= $headers['Platform'];
                 
                 if (isset($_POST['qrcode']) AND isset($_POST['user_id'])){
                     
                       $response['message']='inside if';
                     
                       $platform=$checkplatform;
                       $user_id=$_POST['user_id'];
                       $qr_code=$_POST['qrcode'];
                       
                          $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr_code);
                          
                        //   echo '<pre>';
                        //   print_r($current_status);
                        //   die();
                         
                         if($current_status){
                             
                                  $qrid=$current_status[0]->qrid;
                                  $bsid=$current_status[0]->bsid;
                                  $order_id=$current_status[0]->delivery_id;
                                  $driver_id=0;
                                  $rzn="forcefully_neutral_by_strkeeper";
                                  $selected_status="Collected";
                                  $cur_qr_status=$current_status[0]->qr_status;
                                  $delivery_canceled_check=$current_status[0]->delivery_canceled_check;
                                  $delivery_status=$current_status[0]->delivery_status;
                                  
                                  
                                //  Because below steps are common
                                
                                   $whr_for_qr=array('qrid'=>$qrid);
                                  
                                   $whr_for_delivery=array('order_id'=>$order_id);
                                   
                                   $data_bag_status= array(
                                                          "bsid"=>1,
                                                          "str_kpr_id"=>$user_id
                                               );
                                 
                             
                              if($current_status[0]->delivery_status =="Delivered" AND $current_status[0]->bsid==4){
                                  
                                      $rzn_notes=array(
                         
                                                  "delivery_id" => $order_id,
                                                  "delivery_status" =>$delivery_status,
                                                  "delivery_canceled_check" =>$delivery_canceled_check,
                                                  "reason" =>$rzn,
                                                  "new_status" =>$selected_status,
                                                  "qrid" =>$qrid,
                                                  "cur_qr_status" =>$cur_qr_status,
                                                  "cur_bsid" =>$bsid,
                                                  "qr_code" =>$qr_code,
                                                  "driver_id"=>$driver_id,
                                                  "platform"=>$platform,
                                                  "case"=>"forcefully_neutral_by_strkeeper_post"
                                               );
                                               
                                      $rzn_note_jsn=json_encode($rzn_notes);
                                              
                                      $data_order = array( 

                                                                "status"=>"Collected",
                                                                "pending_bag"=>0,
                                                                "bag_with_customer"=>0,
                                                                "bag_received"=>1,
                                                                "own_bag_rcv_order_id"=>$order_id,
                                                                "own_bag_rcv_bag_collection_id"=>0, 
                                                                "own_bag_rcv_by_driver_id"=>$driver_id,
                                                                "own_bag_rcv_by_dt"=>date("Y-m-d H:i:s"),
                                                                "own_bag_rcv_by_driver"=>1,
                                                                "own_bag_rcv_qr"=>$qr_code,


                                                                "str_keep_varification"=>"yes",
                                                                "varified_by"=>$user_id,
                                                                "varified_at"=>date("Y-m-d H:i:s"),

                                                                "is_neutral"=>1,
                                                                "neutral_by"=>$user_id,
                                                                "neutral_at"=>date("Y-m-d H:i:s"),

                                                                "forcely_changed_by"=>$user_id,
                                                                "forcely_changed_at"=>date('Y-m-d H:i:s'),
                                                                "forcely_check"=>"yes",
                                                                "forcely_reason"=>$rzn,
                                                                "forcely_status_was"=>$rzn_note_jsn,
                                                                "forcely_selection"=>$selected_status
                                                        );

                                  
                                  $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_order,$order_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                
                                   if($result_for_neutral){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has not been updated. Network Issue!';
                                       }
                                  
                                  
                              }else if($current_status[0]->delivery_status =="Collected"  AND $current_status[0]->bsid==5){
                                  
                                  
                                  
                                        $rzn_notes=array(
                         
                                                  "delivery_id" => $order_id,
                                                  "delivery_status" =>$delivery_status,
                                                  "delivery_canceled_check" =>$delivery_canceled_check,
                                                  "reason" =>$rzn,
                                                  "new_status" =>$selected_status,
                                                  "qrid" =>$qrid,
                                                  "cur_qr_status" =>$cur_qr_status,
                                                  "cur_bsid" =>$bsid,
                                                  "qr_code" =>$qr_code,
                                                  "driver_id"=>$driver_id,
                                                  "platform"=>$platform,
                                                  "case"=>"forcefully_neutral_by_strkeeper_post"
                                               );
                                               
                                      $rzn_note_jsn=json_encode($rzn_notes);
                                              
                                      $data_order = array( 

                                                                "str_keep_varification"=>"yes",
                                                                "varified_by"=>$user_id,
                                                                "varified_at"=>date("Y-m-d H:i:s"),

                                                                "is_neutral"=>1,
                                                                "neutral_by"=>$user_id,
                                                                "neutral_at"=>date("Y-m-d H:i:s"),

                                                                "forcely_changed_by"=>$user_id,
                                                                "forcely_changed_at"=>date('Y-m-d H:i:s'),
                                                                "forcely_check"=>"yes",
                                                                "forcely_reason"=>$rzn,
                                                                "forcely_status_was"=>$rzn_note_jsn,
                                                                "forcely_selection"=>$selected_status
                                                        );

                                  
                                  $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_order,$order_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                
                                   if($result_for_neutral){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has not been updated. Network Issue!';
                                       }
                                  
                              }else if($current_status[0]->delivery_status =="Collected" AND $current_status[0]->str_keep_varification=="yes" AND $current_status[0]->bsid==6){
                                  
                                    $rzn_notes=array(
                         
                                                  "delivery_id" => $order_id,
                                                  "delivery_status" =>$delivery_status,
                                                  "delivery_canceled_check" =>$delivery_canceled_check,
                                                  "reason" =>$rzn,
                                                  "new_status" =>$selected_status,
                                                  "qrid" =>$qrid,
                                                  "cur_qr_status" =>$cur_qr_status,
                                                  "cur_bsid" =>$bsid,
                                                  "qr_code" =>$qr_code,
                                                  "driver_id"=>$driver_id,
                                                  "platform"=>$platform,
                                                  "case"=>"forcefully_neutral_by_strkeeper_post"
                                               );
                                               
                                      $rzn_note_jsn=json_encode($rzn_notes);
                                              
                                      $data_order = array(     
                                                                "is_neutral"=>1,
                                                                "neutral_by"=>$user_id,
                                                                "neutral_at"=>date("Y-m-d H:i:s"),

                                                                "forcely_changed_by"=>$user_id,
                                                                "forcely_changed_at"=>date('Y-m-d H:i:s'),
                                                                "forcely_check"=>"yes",
                                                                "forcely_reason"=>$rzn,
                                                                "forcely_status_was"=>$rzn_note_jsn,
                                                                "forcely_selection"=>$selected_status
                                                        );

                                  
                                  $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_order,$order_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                
                                   if($result_for_neutral){
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has been updated successfully.';
                                      
                                       }else{
                                           
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' has not been updated. Network Issue!';
                                       }
                                  
                              }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'QR status of :'.$qr_code.' can not be updated because Qr and delivery status is not atleast at delivered stage.\n Qr :'.$cur_qr_status.'\n delivery status :'.$delivery_status;
                                     
                               }
                          
                          
                         }else{
                                   
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Unknown QR!';
                                     
                               }      
                       
                 }else{
                                           $response['status'] = 200;
                                           $response['error'] = false;
                                           $response['message'] = 'Missing parameters!';
                 }
                 
                 
                   echo json_encode($response);
                     
     }
     
   
   
   
     public function timeslot_with_vendor_wise_deliveries_data_post(){
        $this->load->model('Vehicle_model');
        $response = array('status'=>400, 'error'=>true);
  //  $data = file_get_contents('php://input', 'r');
   
       $data = json_decode(file_get_contents('php://input'), true);
      
    //   echo 'helloo demo';
    //   print_r($data);
    //   die();
        
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
       // //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id']) && isset($_POST['timeslot']) && isset($_POST['date']) && isset($_POST['vendor_id'])){

            $response['status'] = 200;
            $response['error'] = false;
            $driver_id = $_POST['user_id'];
            $timeslot = $_POST['timeslot'];
            $date = $_POST['date'];
            $vendor_id = $_POST['vendor_id'];
            $result =  $this->order_model->get_vendor_deliveries_with_timeslot_data($driver_id, $timeslot, $date,$vendor_id);
        
        
        
            $response['data']['check'] = $result;
            // $bg_recived = $result[0]->bag_received;
            
            
            // to validate driver before starts a delivery must scan a van and allot this to him
              //$check_vehicle = $this->Vehicle_model->get_vehicle_Registration_num($driver_id);
            //  $check_vehicle=1;
             if($check_vehicle){
                 $check_vehicle -> scan ='yes';
             }else{
                //  sami bhae
                //  $check_vehicle -> scan ='No';
                $check_vehicle -> scan ='yes';
             }
            
            foreach($result as $key => $val){
              if($val->send_notification =='yes'){
                     $val->send_notification ='Yes';
                  }
                   
                  $val->scan=$check_vehicle -> scan;
              }
            
           
            
            $summary2 =  $this->order_model->get_deliveries_by_picked2_timeslot($driver_id, $timeslot, $date);
            if (count($result) > 0 ){
                for($i=0; $i<count($result); $i++){
                    $addr_link=json_decode($result[$i]->google_link_addrs);
                    // echo 'google address is:'.$addr_link->google_link.'<br>';
                    $result[$i]->geom = get_google_geocode($addr_link->google_link);
                    $result[$i]->google_link_is =$addr_link->google_link;
                }
                $response['message'] = "Deliveries List of a vendor are etc";
                $response['data']['deliveries'] = $result;
               
               
                
                
              
            //   echo '<pre>';
            //   print_r($response);
            //   die();
             
            //  $response['data']['vehicle_status'][] = $check_vehicle;
                echo json_encode($response);
            }else{
                $response['message'] = "Deliveries are not exist";
                $response['data']['deliveries'] = $result;
                echo json_encode($response);
            }
        }else{
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }     
    
    
    
    public function today_deliveries_with_timeslots_and_vendors_post(){
        
         $this->load->model('Vehicle_model');
        // $this->load->model('Vehicle_model');
        
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
       
      $headers = apache_request_headers();
      $this->is_authorized($headers['X-API-KEY']);
        //$this->is_session_exist($headers['Auth_token']);

      if (isset($_POST['user_id']) && isset($_POST['timeslot']) && isset($_POST['date'])){

            // $response['status'] = 200;
            // $response['error'] = false;
            $driver_id = $_POST['user_id'];
            $timeslot = $_POST['timeslot'];
            $date = $_POST['date'];
            
            

            $response['status'] = 200;
            $response['error'] = false;
           
           
            
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            if(!empty($this->input->post("date"))){
                $date = date('Y-m-d', strtotime($this->input->post("date")));
            
            $from_date = $date;
            $to_date =  $date;
            }
            

            //set badge count to 0
            // $where_badge = array('id' => $driver_id);
            // $this->user_auth->update(array('badge_count'=>1), $where_badge);

             
            // $response['data']['unseen-notification'] = $this->notification_model->count_unseen($driver_id);
            // $summary =  $this->order_model->get_deliveries_summary_by_driver($driver_id, $from_date, $to_date);
            // $summary2 =  $this->order_model->get_deliveries_by_picked($driver_id, $from_date, $to_date);
            // $segments =  $this->order_model->get_deliveries_segments_by_date($driver_id, $from_date, $to_date);
            // $time_slots= $this->order_model->get_timeslot_segments_by_date($driver_id, $from_date, $to_date);
            $time_slots_with_vendors= $this->order_model->get_timeslot_segments_by_date_and_vendors($driver_id, $from_date, $to_date,$timeslot);
            
            // $cash_collection =  $this->cash_model->get_cash_collection_summary_by_date($driver_id, $from_date, $to_date);
            // $response['data']['today_cash'][] = $cash_collection[0];
           
            //  $check_vehicle = $this->Vehicle_model->get_vehicle_Registration_num($driver_id);
            //  if($check_vehicle){
            //      $check_vehicle -> scan ='yes';
            //  }else{
                 
            //     //  sami bhae
            //     //  $check_vehicle -> scan ='No';
            //     $check_vehicle -> scan ='yes';
            //  }
             
             
            //   $response['data']['vehicle_status'][] = $check_vehicle;
              
             
            
            // if(empty($segments)){
            //     $segments = array("total"=>"",
            //                       "bag_received"=>"",
            //                       "delivery_img"=>"",
            //                       "completed"=>"",
            //                       "vendor_id"=>"",
            //                       "email"=>"",
            //                       "full_name"=>"",
            //                       "address"=>"",
            //                       "assigned"=>"",
            //                       "picked"=>""
                                  
            //                       );
            // }
            
            // $bag_collection =  $this->bag_model->get_bags_collection_summary_by_date($driver_id, $from_date, $to_date);
            // if (count($bag_collection) > 0){
            //     $response['data']['today_bags_collection'] = $bag_collection;
            // } else {
            //     $response['data']['today_bags_collection'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
            // }

            if ($time_slots_with_vendors){
                $response['message'] = "Deliveries count for today are etc";
                // $summary[0]->vendor_statistics = $segments;
                 $summary[0]->timeslot_with_vendor_statistics = $time_slots_with_vendors;
                $response['data']['today_deliveries'] = $summary[0];
                // $response['data']['today_bags_status'] = $summary2[0];
              
                echo json_encode($response);
            }else{
                $response['message'] = "You have not assigned any deliveries right now. You will get a notification when admin will assign you deliveries for today.";
                $response['data']['today_deliveries'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
                echo json_encode($response);
            }
        } else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
    }
    
    
    public function str_keeper_forcefuly_bags_list_post(){
        
           $this->load->model('order_model');
        
        $response = array('status'=>400, 'error'=>true);

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
       
      $headers = apache_request_headers();
      $this->is_authorized($headers['X-API-KEY']);
        //$this->is_session_exist($headers['Auth_token']);

        if (isset($_POST['user_id'])){
            
            

            $response['status'] = 200;
            $response['error'] = false;
           
            $strKeeper_id = $this->input->post('user_id');
            
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            if(!empty($this->input->post("date")) ){
                $sdate = date('Y-m-d', strtotime($this->input->post("date")));
                 $edate = date('Y-m-d', strtotime($this->input->post("date")));
            
            $from_date = $sdate;
            $to_date =  $edate;
            }
           
            //  $where = " qr.bsid =6 and qr.str_kpr_id=".$strKeeper_id." and o.qr_bag_id !=''  and o.str_keep_varification ='yes' and o.status ='Collected' and o.varified_by=".$strKeeper_id." and o.varified_at BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        
        $where = "  o.qr_bag_id !=''  and o.forcely_check ='yes'  and o.forcely_changed_by=".$strKeeper_id." and o.forcely_changed_at BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        
            // $results=$this->vendor_model->str_kpr_pending_bags($where);
            
             $report_data =  $this->order_model->get_str_keeper_forcefully_bags_list($where);
             
            //   $response['success'] = true;
            // $response['msg'] = $report_data;
            // $response['date'] = $from_date;
            //  echo json_encode($response);
            //  die();
        if($report_data['result']){
            $response['status'] = 200;
            $response['error'] = false;
            $response['data'] = $report_data["records"];
           
        }else{
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'No forcefully bag!';
            $response['data'] =[];
        }
            
            
             echo json_encode($response);
            //  if (isset($summary[0]->date)){
            //     $response['message'] = "Deliveries for today are etc";
            //     $summary[0]->vendor_statistics = $segments;
            //     $response['data']['today_deliveries'] = $summary[0];
            //     $response['data']['today_bags_status'] = $summary2[0];
            //     echo json_encode($response);
            // } else {
            //     $response['message'] = "You have not assigned any deliveries right now. You will get a notification when admin will assign you deliveries for today.";
            //     $response['data']['today_deliveries'] = ['date'=>date('d-m-Y'), 'assigned'=> "0", 'completed'=> "0"];
            //     echo json_encode($response);
            // }
        }else {
            $response['message'] = "Can not Access";
            echo json_encode($response);
        }
        
    }
    
    
    
    public function status_list($cur_bsid,$delivery_id=0,$delivery_canceled_check,$delivery_status){
        
          $status_list=array();
          if($cur_bsid==1 AND $delivery_id ==0){
                       
                       $status_list[0]=array('id'=>0,'value'=>'','msg'=>'Bag is already neutral.');
            
          }else if(($cur_bsid==3 OR $cur_bsid==2) AND $delivery_id !=0 AND $delivery_canceled_check =="yes"){

                      $status_list[0]=array('id'=>1,'value'=>'Neutral','msg'=>'');
  
          }else if( ( $cur_bsid==2) AND $delivery_id !=0  AND  ($delivery_status=="Assign" OR $delivery_status=="Not Assign")  ){
                      
                      $status_list[0]=array('id'=>1,'value'=>'Neutral','msg'=>'');
                      
          }else if( ( $cur_bsid==3) AND $delivery_id !=0  AND  ($delivery_status=="Assign")  ){
     
                      $status_list[0]=array('id'=>1,'value'=>'Neutral','msg'=>'');
    
          }else if($cur_bsid==3 AND $delivery_id !=0 AND $delivery_canceled_check =="no" AND  $delivery_status=="Ship"){
                      
                      $status_list[0]=array('id'=>1,'value'=>'Partner verfication & Neutral','msg'=>'');
                    //   $status_list[1]=array('id'=>4,'value'=>'Delivered','msg'=>'');
                      $status_list[1]=array('id'=>5,'value'=>'Collected','msg'=>'');
                      $status_list[2]=array('id'=>6,'value'=>'Received in Warehouse','msg'=>'');
        // storekeeper can complete,collected,verify, neutral that one
  
         }else if($cur_bsid==5 AND $delivery_status=="Delivered"){
             
                      $status_list[0]=array('id'=>1,'value'=>'Partner verfication & Neutral','msg'=>'');
                      $status_list[1]=array('id'=>5,'value'=>'Collected','msg'=>'');
                      $status_list[2]=array('id'=>6,'value'=>'Received in Warehouse','msg'=>'');

        //  collecected,verify,neutral
         }else if($cur_bsid==4 AND $delivery_status=="Collected"){
                      
                      $status_list[0]=array('id'=>1,'value'=>'Partner verfication & Neutral','msg'=>'');
                      $status_list[1]=array('id'=>5,'value'=>'Collected','msg'=>'');
                      $status_list[2]=array('id'=>6,'value'=>'Received in Warehouse','msg'=>'');
       
        //  collecected,verify,neutral
         }else if($cur_bsid==4 AND $delivery_status=="Delivered"){
                     
                      $status_list[0]=array('id'=>1,'value'=>'Partner verfication & Neutral','msg'=>'');
                      $status_list[1]=array('id'=>5,'value'=>'Collected','msg'=>'');
                      $status_list[2]=array('id'=>6,'value'=>'Received in Warehouse','msg'=>'');
        // collected, verify,neutral
  
        }else if($cur_bsid==5 AND $delivery_status=="Collected"){
            
                      $status_list[0]=array('id'=>1,'value'=>'Partner verfication & Neutral','msg'=>'');
                      $status_list[1]=array('id'=>6,'value'=>'Received in Warehouse','msg'=>'');

        //  verify,neutral
        }else if ( ( $cur_bsid==2) AND $delivery_id !=0  AND  $delivery_canceled_check =="yes" ){
     
                      $status_list[0]=array('id'=>1,'value'=>'Neutral','msg'=>'');
        // only can do neutral by go back
        
            
        }else if($cur_bsid==6 AND $delivery_status=="Collected"){
                      
                      $status_list[0]=array('id'=>1,'value'=>'Partner verfication & Neutral','msg'=>'');
       // can do neutral
        }else{
                     $status_list[0]=array('id'=>0,'value'=>'','msg'=>'Try Again!');
        }
        
        
        return $status_list;
        
    }
    
    
    
    
    
    //  }_15feb 2021 
    
    
    
    
      // sending menu options
    
     public function popup_options_post(){
             
                //  $this->load->model('order_model');
        
                 $response = array('status'=>400, 'error'=>true);

                 $data = json_decode(file_get_contents('php://input'), true);
                 $_POST = $data;
       
                 $headers = apache_request_headers();
                 $this->is_authorized($headers['X-API-KEY']);
                 $checkplatform= $headers['Platform'];
                  
                 $platform=$checkplatform;
                 
                 $menu_list=array();
                 $menu_list[0]=array('id'=>0,'value'=>'Dropped outside the door.');
                 $menu_list[1]=array('id'=>1,'value'=>'Handed over to Client.');
                 $menu_list[2]=array('id'=>2,'value'=>'Handed over to Maid.');
                 $menu_list[3]=array('id'=>3,'value'=>'Handed over to Security.');
                 $menu_list[4]=array('id'=>4,'value'=>'Left at Reception or Concierge.');
                 
                 if($platform =='ios'){
                         
                       $response['status'] = 200;
                       $response['error'] = false;
                       $response['message'] = 'Options Are:';
                       $response['data'] = $menu_list;
                           
                   }else if($platform =='android'){
                         
                       $response['status'] = 200;
                       $response['error'] = false;
                       $response['message'] = 'Options Are:';
                       $response['data'] = $menu_list;
                      
                         
                     }else{
                         
                           $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'Invalid Platform!';
                           $response['data'] = "" ;
                     }
                     
                   
                 echo json_encode($response);
             
         }
         
         
         
         // New July 2021
        
        public function bag_collection_opt_post(){
             
                //  $this->load->model('order_model');
        
                 $response = array('status'=>400, 'error'=>true);

                 $data = json_decode(file_get_contents('php://input'), true);
                 $_POST = $data;
       
                 $headers = apache_request_headers();
                 $this->is_authorized($headers['X-API-KEY']);
                 $checkplatform= $headers['Platform'];
                  
                 $platform=$checkplatform;
                 
                 $menu_list=array();
                 $menu_list[0]=array('id'=>0,'value'=>'No Bag was outside.');
                 $menu_list[1]=array('id'=>1,'value'=>'Client did not answer.');
                 $menu_list[2]=array('id'=>2,'value'=>'No one opened the door.');
                 $menu_list[3]=array('id'=>3,'value'=>'Location was wrong.');
                 $menu_list[4]=array('id'=>4,'value'=>'No bag with reception or security.');
                 
                 if($platform =='ios'){
                         
                       $response['status'] = 200;
                       $response['error'] = false;
                       $response['message'] = 'Options Are:';
                       $response['data'] = $menu_list;
                           
                   }else if($platform =='android'){
                         
                       $response['status'] = 200;
                       $response['error'] = false;
                       $response['message'] = 'Options Are:';
                       $response['data'] = $menu_list;
                      
                         
                     }else{
                         
                           $response['status'] = 200;
                           $response['error'] = false;
                           $response['message'] = 'Invalid Platform!';
                           $response['data'] = "" ;
                     }
                     
                   
                 echo json_encode($response);
             
         }
         
         
         
         public function logout_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;
        $headers = apache_request_headers();
        $this->is_authorized($headers['X-API-KEY']);
        if ((isset($_POST['user_id']))){
            
            // $version_user=$_POST['versions'];
            
            // $OS=$_POST['os'];
            // $OS= $headers['Platform'];
           
            
            $field=array(
                'device_token'=>'',
                'badge_count'=>0
                );
                  $where=$this->db->where('id',$_POST['user_id']);
                  $result=$this->order_model->update_for_logout_user($field, $where);
            
          
                
           if($result){
              echo json_encode(array("status"=>200, "error"=>false, "message"=>"Logout Successful"));
            }else{
                echo json_encode(array("status"=>400, "error"=>true, "message"=>"Invalid!"));
            }
            
            
            
           
        }else{
            echo json_encode(array("status"=>400, "error"=>true, "message"=>"Can not Access"));
        }
    }
    
    
      private function upload_image_open_bag_stemp($user_id, $tmp_doc, $doc, $name)
    {
        $target_dir = "upload_open_bag/";
        $file_type = pathinfo($target_dir . $doc, PATHINFO_EXTENSION);
        $file_name = date('Y-m-d-H-i-s') . '_' . $name . '_' . $user_id . '.' . $file_type;
        $file_rename = $target_dir . $file_name;
            // echo 'file rename is:';
            // echo $file_rename;
        if ($file_type == 'jpg' || $file_type == 'png' || $file_type == 'jpeg'){
            if (move_uploaded_file($tmp_doc, $file_rename)) {
                return $file_name;
            }
        }
        return false;
    }
    
    
    
       private function emptyBag_upload_image_stemp($user_id, $tmp_doc, $doc, $name)
    {
        $target_dir = "upload_empty_bag/";
        $file_type = pathinfo($target_dir . $doc, PATHINFO_EXTENSION);
        $file_name = date('Y-m-d-H-i-s') . '_' . $name . '_' . $user_id . '.' . $file_type;
        $file_rename = $target_dir . $file_name;
            // echo 'file rename is:';
            // echo $file_rename;
        if ($file_type == 'jpg' || $file_type == 'png' || $file_type == 'jpeg'){
            if (move_uploaded_file($tmp_doc, $file_rename)) {
                return $file_name;
            }
        }
        return false;
    }
    
        
       
    


}