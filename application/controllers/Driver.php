<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller
{
    //role_id = 3 = driver

    // public function __construct(){
    //     parent::__construct();
    //     date_default_timezone_set('Asia/Dubai');
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
        $where = array('u.status'=> 1);
        $data['drivers'] =  $this->driver_model->get_drivers($where);
        $this->load->view('driver/active', $data);
    }
    
    public function liveLocations(){
        $where = array('u.status'=> 1);
        $data['drivers'] =  $this->driver_model->get_drivers($where);
        $this->load->view('driver/map', $data);
    }
public function getCurrrentLocation(){
                   
        if(!empty($_POST['did']) && is_numeric($_POST['did'])){
                        
            $location =$this->driver_model->getCurrrentLocation($_POST['did']); ?>
           
            <?php 
            if(isset($location)){
           echo json_encode(array("lat" => $location["lat"], "lng" => $location["lng"])); 
             
            }      
        }
}

    public function invited(){
        $where = array('u.status' => 0, 'u.send_invitation !=' => 0);
        $data['drivers'] =  $this->driver_model->get_drivers($where);
        $this->load->view('driver/invited', $data);
    }



    public function uploaded(){
        $where = array('u.status' => 0, 'u.send_invitation' => 0);
        $data['drivers'] =  $this->driver_model->get_drivers($where);
        $this->load->view('driver/uploaded', $data);
    }
     public function track_driver()
     {
        
        $data['drivers'] =  $this->driver_model->get_drivers();
        $this->load->view('track_driver',$data);

     }

    public function index(){
        $data['drivers'] =  $this->driver_model->get_drivers();
        $this->load->view('driver/manage', $data);
    }


    public function update_driver(){
        $response = array('success' => false);
        $driver_id = $_POST['driver_id'];

        $fields = array(
            'email' =>  $_POST['email'],
            'full_name' =>  $_POST['name'],
            //'phone' =>  $_POST['phone'],
            'address' =>  $_POST['address'],
            'updated_dt' => date("Y-m-d H:i:s"),
            'updated_user' => $this->session->userdata('email'),
            'updated_terminal' => gethostname()
        );

        $where = array('id'=> $driver_id);
        $result = $this->driver_model->update($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }


    public function get_driver_by_id(){
        $response = array('success' => false);
        $driver_id = $_POST['driver_id'];
        $where = array('id'=>$driver_id, 'role_id'=>3);
        $driver = $this->driver_model->get_where($where);
        if($driver){
            $response['success'] = true;
            $response['driver'] = $driver;
        }

        echo json_encode($response);
    }


    public function get_driver_location_by_id(){
        $response = array('success' => false);
        $driver_id = $_POST['driver_id'];
        $where = array('driver_id'=>$driver_id);
        $driver = $this->driver_model->get_location_where($where);
        if($driver){
            $response['success'] = true;
            $response['driver_loc'] = $driver;
        }

        echo json_encode($response);
    }


    public function get_drivers_list(){
        $response = array('success' => false);
        $drivers = $this->driver_model->get_drivers();
        if($drivers){
            $response['success'] = true;
            $response['drivers'] = $drivers;
        }

        echo json_encode($response);
    }


    // public function save_driver(){
    //     $response = array('success' => false);

    //     //check duplicate driver phone
    //     $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$_POST['phone']))));
    //     $where = array('phone' => $phone);
    //     $driver = $this->driver_model->get_where($where);

    //     if(!$driver){
    //         $code = mt_rand(100000, 999999);
    //         $fields = array(
    //             'email' =>  @$_POST['email'],
    //             'phone' =>  validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$_POST['phone'])))),
    //             'role_id' =>  3,
    //             'full_name' =>  @$_POST['name'],
    //             'address' =>  @$_POST['address'],
    //             'code' => $code,
    //             'status' =>  0,
    //             'created_dt' => date("Y-m-d H:i:s"),
    //             'updated_dt' => date("Y-m-d H:i:s"),
    //             'created_user' => $this->session->userdata('email'),
    //             'updated_user' => $this->session->userdata('email'),
    //             'created_terminal' => gethostname(),
    //             'updated_terminal' => gethostname()
    //         );

    //         //save customer
    //         $result = $this->driver_model->add($fields);
    //         if($result){

    //             //method to send sms
    //             $msg = "Hi ".@$_POST['name'].",<br/> Welcome to L O G X , we invite you to use our app to manage your Deliveries and Bag collections. <br/>
    //                     Click on the <a href='https://itunes.apple.com/us/app/l-o-g-x/id1398600417?mt=8&ign-mpt=uo%3D4'> Link </a>
    //                     to get started and your verification code ".$code."<br/>
    //                     Best of Luck, <br/>
    //                     TEAM L O G X";
    //             //$msg = "LoGx invite you to use its services to maintain your deliveries & routs. Please <a href='https://itunes.apple.com/us/app/l-o-g-x/id1398600417?ls=1&mt=8'> Click</a> on the link below to download our mobile application, IOS Application Link and verification code ".$code;
    //             send_expert_sms($_POST['phone'], $msg);
    //             $response['success'] = true;
    //         }
    //     }

    //     echo json_encode($response);
    // }


    public function save_file_drivers(){
        $response = array('success' => false);

        $drivers = $_POST['file_drivers'];

        if(count($drivers) > 0){
            for($i=0; $i<count($drivers); $i++) {

                //if driver not already exist
                if($drivers[$i]['driver_id'] == 0){
                    $fields = array(
                        'email' =>  $drivers[$i]['email'],
                        'phone' => $drivers[$i]['phone'],
                        'role_id' =>  3,
                        'send_invitation' => 0,
                        'vendor_id' => 0,
                        'full_name' =>  $drivers[$i]['full_name'],
                        'address' =>  $drivers[$i]['address'],
                        'status' =>  0,
                        'created_dt' => date("Y-m-d H:i:s"),
                        'updated_dt' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'updated_user' => $this->session->userdata('email'),
                        'created_terminal' => gethostname(),
                        'updated_terminal' => gethostname()
                    );

                    //save driver
                    $result = $this->driver_model->add($fields);
                    if($result){
                        $response['success'] = true;
                    }
                }

            }

        }

        echo json_encode($response);
    }


    /***************************************************************************/
    /********************DASHBOARD LIST****************************************/
    /***************************************************************************/
    //active mean those drivers to whom deliveries are assign
    public function assign_drivers(){
        $start_date = @$_POST['driver_start_date'] ? @$_POST['driver_start_date'] : date('Y-m-d');
        $end_date = @$_POST['driver_end_date'] ? @$_POST['driver_end_date'] : date('Y-m-d');
        $driver_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['drivers'] = $this->driver_model->get_assign_delivery_drivers($driver_where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('driver/assign_driver', $data);
    }

    public function get_assign_drivers(){
        $response = array('success' => false);
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');
        $driver_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $drivers = $this->driver_model->get_assign_delivery_drivers($driver_where);
        if($drivers){
            $response['success'] = true;
            $response['drivers'] = $drivers;
        }

        echo json_encode($response);
    }
    /***************************************************************************/
    /********************UPLOAD DRIVERS VIA FILE******************************/
    /***************************************************************************/
    public function upload()
    {
      $this->load->model('Vendor_model');
    
    $data['vendors'] =  $this->Vendor_model->get_all_vendors();
        $this->load->view('vender_list',$data);
    }
     public function get_vendor_by_id(){
         $this->load->model('order_model');
         
        $response = array('success' => false);
        $vendor_id = $_POST['vendor_id'];
        $where = array('id'=>$vendor_id);
        
        $vendor = $this->driver_model->get_where($where);
        // print_r($vendor);
        // die();
        $where2=array('user_id'=>$vendor_id);
        $xv=$this->driver_model->get_where_driver_schedule($where2);
        
        //   echo 'hi';
        // print_r($xv);
        // die();
        if($vendor){
            $response['success'] = true;
            $response['vendor'] = $vendor;
            
            
            $response['schedule'] = $xv;
           
        }

        echo json_encode($response);
    }
        public function del()
    {
        $this->load->model('driver_model');
         $ids = $this->input->post('ids');
 
       
        $res=$this->driver_model->delete_drivers_sched_and_driver($ids);
        if($res){
             $this->db->where_in('id', explode(",", $ids));
             $res2=$this->db->delete('users');
             if($res2)
             echo json_encode(['success'=>"Item Deleted successfully."]);
        }
 
        
  
        
    }
   public function update_vendor(){
        // echo 'hi';
        // die();
        $response = array('success' => false);
        $vendor_id = $this->input->post('vendor_id');
        // $old_email=$this->uri->segment(3);
        // echo $old_email;
        // die();
        
         $v_issue=$this->input->post('v_issue');
             $v_exp=$this->input->post('v_exp');
             $i_issue=$this->input->post('i_issue');
             $i_exp=$this->input->post('i_exp');
             $o_issue=$this->input->post('o_issue');
             $o_exp=$this->input->post('o_exp');
             $l_issue=$this->input->post('l_issue');
             $l_exp=$this->input->post('l_exp');
             
              $contract_file=$this->input->post('contract');
             $visa=$this->input->post('visa');
             $other=$this->input->post('other');
             $id_card=$this->input->post('id_card');
             $license=$this->input->post('license');

        $fields = array(
            'phone' =>  $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'full_name' =>  $this->input->post('name'),
            'address' =>  $this->input->post('address'),
            'Password_partner' => $this->input->post('s_pass'),
            'updated_dt' => date("Y-m-d H:i:s"),
            'updated_user' => $this->session->userdata('username'),
            'updated_terminal' => gethostname(),
            
            
           'visa_issue'=> date('Y-m-d',strtotime($v_issue)),
            'visa_exp'=> date('Y-m-d',strtotime($v_exp)),
            
            'other_issue'=> date('Y-m-d',strtotime($o_issue)),
            'other_exp'=> date('Y-m-d',strtotime($o_exp)),
           
            'license_issue'=> date('Y-m-d',strtotime($l_issue)),
            'license_exp'=> date('Y-m-d',strtotime($l_exp)),
           
            'id_issue'=> date('Y-m-d',strtotime($i_issue)),
           'id_exp'=> date('Y-m-d',strtotime($i_exp)),
            'salary'=> $this->input->post('salary')
        );
        
        
        if (!empty($contract_file)){
               $fields['contract_file'] = $this->upload_image($contract_file,'Driver_contract');
           }
           if (!empty($visa)){
               $fields['visa_card'] = $this->upload_image($visa,'Driver_visa');
           }
           if (!empty($other)){
               $fields['other_card'] = $this->upload_image($other,'Driver_otherCard');
           }
           if (!empty($id_card)){
               $fields['id_card'] = $this->upload_image($id_card,'Driver_idCard');
           }
            if (!empty($license)){
               $fields['license_card'] = $this->upload_image($license,'Driver_license');
           }
            
        
        
        //  if($this->input->post('email') != $old_email)
        //   $dec = $this->vendor_model->check_email($vendor_id, $this->input->post('email'));
        // else
          $dec = true;
        //end check

        if($dec == true)
        {

        $where = array('id'=> $vendor_id);
        $result = $this->driver_model->update_driver($fields, $where);
          $ans= $this->driver_model->edit_driver_schedule($vendor_id);
        if($result){
          
            $response['success'] = true;
        }}
        else
          $response = array('success'=>false, 'msg'=>'Duplicate Email');

        echo json_encode($response);

        // $where = array('id'=> $vendor_id);
        // $result = $this->driver_model->update_driver($fields, $where);
        // if($result){
        //     $response['success'] = true;
        // }

        // echo json_encode($response);
    }
    public function upload_driver()
    {
        $this->load->model('Vendor_model');
        $this->load->model('driver_model');
         $this->load->model('order_model');
         
         $where = array('u.is_deleted'=> 0);
        $data['drivers'] =  $this->driver_model->get_drivers($where);
        // print_r($data['drivers']['records']);
        // die();
        $data['vendors'] =  $this->Vendor_model->get_all_vendors();
        // $data['emirites_typ'] = $this->vendor_model->get_data('delivery_type');
        $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        //AREA => service_typ / 
        $data['service_typ'] = $this->order_model->get_areas();
        $data['emirites_typ']=$this->driver_model->get_combinations($data['old_emirites_typ']);
         $data['driver_Sch']=$this->driver_model->get_driver_schd();
        
        // echo '<pre>';
        // print_r($data['driver_Sch']);
        // die();
        	//$data['emi_with_time'] = $this->order_model->get_emirate_with_TimeSlots();
        // 	echo '<pre>';
        // 	print_r($data);
        //   die();
       $this->load->view('Upload_Drivers',$data);
    }
    

    //   public function save_driver(){
          
    //     $this->load->model('driver_model');
    //     $data['email'] = $this->input->post('email');
    //     $data['phone'] = $this->input->post('phone');
    //     $data['role_id'] =3;
    //     $data['full_name'] = $this->input->post('name');
    //     $data['address'] = $this->input->post('address');
    //     $data['Password_partner'] = $this->input->post('s_pass');
    //      // $data['vendor_id'] = $this->input->post('Partner_name');
         
    //       // print_r($data);
    //       // die();
    //       $this->driver_model->add_registration('users',$data);
    //       redirect('upload_driver');
      
    // }
    
     private function upload_image($b64_string, $name)
    {
        $ext = 'pdf';
        $directory_path = 'assets/Driver_uploads/';
        $type = ($name.'-'.get_unique_string('8'));

        try {
            if (!empty($b64_string))
            {
                $path = base64_to_file($b64_string, $ext, $type, $directory_path);

                return $path;
            }

        }
        catch (Exception $ex) {
            throw $ex;
        }
    }
 public function save_driver(){
          $response = array('success' => false);
        $this->load->model('driver_model');
        $data['email'] = $this->input->post('email');
        $data['phone'] = str_replace('-', '', $this->input->post('phone'));
        $data['role_id'] =3;
        $data['full_name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['Password_partner'] = $this->input->post('s_pass');
        
             $v_issue=$this->input->post('v_issue');
             $v_exp=$this->input->post('v_exp');
             $i_issue=$this->input->post('i_issue');
             $i_exp=$this->input->post('i_exp');
             $o_issue=$this->input->post('o_issue');
             $o_exp=$this->input->post('o_exp');
             $l_issue=$this->input->post('l_issue');
             $l_exp=$this->input->post('l_exp');
             
             $contract_file=$this->input->post('contract');
             $visa=$this->input->post('visa');
             $other=$this->input->post('other');
             $id_card=$this->input->post('id_card');
             $license=$this->input->post('license');
             
       // $data['contract_file']= $contract_file;
       // $data['visa_card']=$visa;
        $data['visa_issue']=date('Y-m-d',strtotime($v_issue));
        $data['visa_exp']=date('Y-m-d',strtotime($v_exp));
        //$data['other_card']=$other;
        $data['other_issue']=date('Y-m-d',strtotime($o_issue));
        $data['other_exp']=date('Y-m-d',strtotime($o_exp));
        //$data['license_card']= $license;
        $data['license_issue']=date('Y-m-d',strtotime($l_issue));
        $data['license_exp']=date('Y-m-d',strtotime($l_exp));
        //$data['id_card']=$id_card;
        $data['id_issue']=date('Y-m-d',strtotime($i_issue));
        $data['id_exp']=date('Y-m-d',strtotime($i_exp));
        $data['salary']=$this->input->post('salary');
        
        
           if (!empty($contract_file)){
               $data['contract_file'] = $this->upload_image($contract_file,'Driver_contract');
           }
           if (!empty($visa)){
               $data['visa_card'] = $this->upload_image($visa,'Driver_visa');
           }
           if (!empty($other)){
               $data['other_card'] = $this->upload_image($other,'Driver_otherCard');
           }
           if (!empty($id_card)){
               $data['id_card'] = $this->upload_image($id_card,'Driver_idCard');
           }
            if (!empty($license)){
               $data['license_card'] = $this->upload_image($license,'Driver_license');
           }
        
        $result=$this->driver_model->check_team($data['email']);
           if(count($result)>0){
              $this->session->set_flashdata('error', 'OOPs You already have a account. gmail already exist');
             
            //   redirect('upload_driver');
             }
             else
             {
                $this->session->set_flashdata('success', 'Welcome to thelogx ! Driver have successfully registered ');
                $user_result=$this->driver_model->add_registration('users',$data);
                // echo '<pre>';
                // print_r($user_result);
                // die();
                  $userID=$user_result['userID'];
                $check=$this->driver_model->add_drivers_shift('driver_shift_schedules',$userID);
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                $password = $this->input->post('s_pass');
                 
                    $this->load->library('email');
                    $config['protocol'] = 'sendmail';
                  $config['mailpath'] = '/usr/sbin/sendmail';
                  $config['charset'] = 'iso-8859-1';
                  $config['wordwrap'] = TRUE;
                  $this->email->initialize($config);
                 $htmlContent = '<h1>Sending email via SMTP server</h1>';
                 $htmlContent .= '<p>Please copy confirmation code and put into feild</p>';
                 $htmlContent = '<h2>welcome to thelogx! hi <p style="color:black">'.$name.'</p> you have been registered <br><p style="color:black">.Your signing details  are given below. Email=> '.$email.'/ Password=> '.$password.' <br>  Thanks </h2>';
                 $this->email->to($email);
                 $this->email->from('admin@thelogx.com','theLogx');
                 $this->email->subject('Forget Password');
                 $this->email->message($htmlContent);
                 //Send email
                 $this->email->send();
                  $this->email->print_debugger();
                 
                  // redirect('upload_driver');
                
                if($check){
                    $response['success'] = true;
                }
              }
              
              echo json_encode($response);
              
            }

    // public function sendEmail()
    // {
    //     $id = $this->input->post('id');
    //     $

    // }

    public function upload_drivers_by_general_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'driver');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
            $this->load->view('vender_list', $data);
           
        }
        else
        {       
            $file = base_url().'upload/'.$file_name;
            if (($handle = fopen($file, "r")) !== FALSE) {
                $flag = true;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $data = array_map("utf8_encode", $data);
                    //Used to skip 1st row
                    if($flag) { $flag = false; continue; }

                    if($data[1]){
                         $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data[1]))));
                        $where = array('phone' => $phone, 'role_id' => 3);
                        $driver = $this->driver_model->get_where($where);
                        $driver_id = 0;
                        if (count($driver) > 0) {
                            $driver_id = intval($driver[0]->id);
                        }

                        $temp = (object) array('driver_id'=>$driver_id, 'full_name'=>$data[0], 'phone'=>$phone, 'address'=>$data[2], 'email'=>$data[3] );
                        array_push($file_data, $temp);
                    }

                }
                fclose($handle);
            }
            
            $data['file_data'] = $file_data;
            print_r($data['file_data']);
            //$this->load->view('vender_list', $data);
        }
    }
    public function Save()
    {
      $this->load->model('AdminModel');
       $data['full_name '] = $this->input->post('name');
       $data['email'] = $this->input->post('email');
       $data['address'] = $this->input->post('address');
       $data['phone'] = $this->input->post('number');
        $this->AdminModel->add_document('vender_list',$data);
       
        redirect('Partner');
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
    /**************************SEND SMS TO DRIVERS******************************/
    /***************************************************************************/
    public function send_sms(){
      
        $response = array('success' => false);
        $numbers = $_POST['sms_numbers'];
       
        if(count($numbers) > 0) {
            for ($i = 0; $i < count($numbers); $i++) {
                $code = mt_rand(100000, 999999);

                $where = array('phone'=> $numbers[$i]['phone']);
                $result = $this->customer_model->update_existing_notification($code, $where);

                if($result){

                    //method to send sms
                    $msg = "Hi, Welcome to L O G X , we invite you to use our app to manage your Deliveries and Bag collections.\r\n Click on the link to get started http://bit.do/ezEEa \r\n Verification Code: ".$code."\r\n \r\n Best of Luck, \r\n \r\n TEAM L O G X";
                    //$msg = "LoGx invite you to use its services to maintain your deliveries & routs. <a href='https://itunes.apple.com/us/app/l-o-g-x/id1398600417?ls=1&mt=8'> Click</a> to download our mobile application & verification code ".$code;
                   $res = send_expert_sms($numbers[$i]['phone'], $msg);
                        if($res)  {
                            $response['success'] = true;
                        }                                            
                   
                      
                    
                  
                }

            }
        }

        echo json_encode($response);
    }
    
    public function deli(){
   
        $id= $_POST["id"];
        $acti= $_POST["aci"];
        $ans= $this->driver_model->delte_schedule_row($id,$acti);
        if($ans){
                echo json_encode($ans);
        }else{
            
            echo json_encode($ans);
        }
    
        
    }
    
    
    
    // ACCOUNTS
    
    public function driver_account(){
        
        $res=$this->driver_model->get_drivers();
        $data['drivers'] =  $res['records'];
        //  $data['drivers_Acc'] =  $this->driver_model->get_drivers_Acc();
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        $this->load->view('driver_account',$data);
        
    }
    
    public function get_driver_by_id_ACC(){
        $id=$this->uri->segment(3);
        // echo $id;
        // $where = array('u.id'=> $id);
        $res=$this->driver_model->get_driver_by_id_Acc($id);
        $acc=$this->driver_model->get_driver_pending_dues($id);
        // $data =  $res[0];
         foreach ($res as $row) {
          $output['id']=$row->id;
           $output['name']=$row->full_name;
           $output['email']=$row->email;
           $output['phone']=$row->phone;
           $output['address']=$row->address;
           $output['salary']=$row->salary;
          $output['pendings']=$acc[0]->Pendings;
       }
       
    //   print_r($acc);
       echo json_encode($output);
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        //return $data;
       
        
    }
    
    
    
    public function get_driver_by_id_ACC_for_return(){
        $id=$this->uri->segment(3);
        // echo $id;
        // $where = array('u.id'=> $id);
        $res=$this->driver_model->get_driver_by_id_Acc($id);
        $acc=$this->driver_model->get_driver_pending_dues($id);
        // $data =  $res[0];
         foreach ($res as $row) {
          $output['id']=$row->id;
           $output['name']=$row->full_name;
           $output['email']=$row->email;
           $output['phone']=$row->phone;
           $output['address']=$row->address;
           $output['salary']=$row->salary;
          $output['pendings']=$acc[0]->Pendings;
       }
       
    //   print_r($acc);
       echo json_encode($output);
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        //return $data;
       
        
    }
    
    function save_driver_info()
    {
        $response = array('success' => false);
        
        $pdata = $this->input->post();
      
        $result=$this->driver_model->driver_info($pdata);
        if($result){
            $response['success']=true;
        }
       
         echo json_encode($response);

        //redirect(base_url('areas'));
    }
    
    function delete_driver_balance($id){
       
        if($this->session->userdata('role') == 'admin')
        {
            $this->driver_model->del_driver_balance($id);
            redirect(base_url('driver/driver_account?del=done'));
        }
    
    }
    
    
    public function expense_list(){
        $this->load->model('driver_model');
         
         $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
         $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');

         //  dated
        // added_at
         
         $where = "e.dated BETWEEN '".date('Y-m-d', strtotime($cdate))." 00:00:00' and '".date('Y-m-d', strtotime($next))." 23:59:59'";
        
        
        $data['d'] =  $this->driver_model->get_expense($where);
        // print_r($data['d']['records']);
        // die();
      
        
       $this->load->view('expenses',$data);
    }
    
    
     private function upload_image_expense($b64_string, $name)
    {
        $ext = 'pdf';
        $directory_path = 'assets/expenses_prof/';
        $type = ($name.'-'.get_unique_string('8'));

        try {
            if (!empty($b64_string))
            {
                $path = base64_to_file($b64_string, $ext, $type, $directory_path);

                return $path;
            }

        }
        catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function save_expense(){
          $response = array('success' => false);
        $this->load->model('driver_model');
       
        $data['title'] = $this->input->post('name');
        $data['amount'] = $this->input->post('amount');
        $data['description'] = $this->input->post('description');
        $data['dated'] = date('Y-m-d',strtotime($this->input->post('date')));
        
        $data['added_by'] = $this->session->userdata('email');
        
            
             $license=$this->input->post('license');
             
     
        
            if (!empty($license)){
               $data['prof_img'] = $this->upload_image_expense($license,'expense_prof');
           }
        
            
           $result=$this->driver_model->add_insert_data('expense',$data);
            //   echo '<pre>';
            //     print_r($result);
            //     die();
             if($result){
                 $this->session->set_flashdata('success', 'Expense has been added successfully. ');
                 $response['success'] = true;
             }else{
                 $this->session->set_flashdata('error', 'Network Issue! Try again. ');
             }
                
                
                
                
                
               
              
              
              echo json_encode($response);
              
            }
            
      public function get_expense_by_id(){
         $this->load->model('order_model');
         
        $response = array('success' => false);
        $id = $_POST['id'];
        $where = array('id'=>$id);
        
        $res = $this->driver_model->get_where_data_from('expense',$where);
        // print_r($res);
        // die();
        
        if($res){
            $response['success'] = true;
            $response['res'] = $res;
            
        }

        echo json_encode($response);
    }   
    
    public function update_expense(){
        // echo 'hi';
        // die();
        $response = array('success' => false);
        $id = $this->input->post('vendor_id');
         $data['title'] = $this->input->post('name');
        $data['amount'] = $this->input->post('amount');
        $data['description'] = $this->input->post('description');
        $data['dated'] = date('Y-m-d',strtotime($this->input->post('date')));
        
        $data['updated_at'] = date('Y-m-d h:i:s');
        
        $data['updated_by'] = $this->session->userdata('email');
       
        // 'updated_user' => $this->session->userdata('username'),
        //     'updated_terminal' => gethostname(),
         
             
             $license=$this->input->post('license');
          
          if (!empty($license)){
               $data['prof_img'] = $this->upload_image_expense($license,'expense_prof');
           }
     
        $where = array('id'=> $id);
        $result = $this->driver_model->update_data_changes('expense',$data, $where);
          
        if($result){
          
            $response['success'] = true;
        }else{
          $response = array('success'=>false, 'msg'=>'Network Issue');
        }
        echo json_encode($response);

        
       
    }
    
    
     public function del_remove_expense()
    {
        $this->load->model('driver_model');
         $ids = $this->input->post('ids');
 
        $res=$this->driver_model->delete_remove_del('expense',$ids);
        if($res){
              echo json_encode(['success'=>"Item Deleted successfully."]);
        }else{
            echo json_encode(['error'=>"Network Issue!."]);
        }
  }


     public function fuel_list(){
        $this->load->model('driver_model');
         
         $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
         $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');

         
        //  dated
        // added_at
         $where = "f.dated BETWEEN '".date('Y-m-d', strtotime($cdate))." 00:00:00' and '".date('Y-m-d', strtotime($next))." 23:59:59'";
        
        
        $data['d'] =  $this->driver_model->get_fuel($where);
        // print_r($data['d']['records']);
        // die();
      
        
       $this->load->view('fuel_list',$data);
    }
    
      public function del_remove_fuel()
    {
        $this->load->model('driver_model');
         $ids = $this->input->post('ids');
 
        $res=$this->driver_model->delete_remove_del('fuel',$ids);
        if($res){
              echo json_encode(['success'=>"Item Deleted successfully."]);
        }else{
            echo json_encode(['error'=>"Network Issue!."]);
        }
  }
  
    public function update_fuel(){
        // echo 'hi';
        // die();
        $response = array('success' => false);
        $id = $this->input->post('vendor_id');
         $data['title'] = $this->input->post('name');
        $data['amount'] = $this->input->post('amount');
        $data['description'] = $this->input->post('description');
        $data['dated'] = date('Y-m-d',strtotime($this->input->post('date')));
        
        $data['updated_at'] = date('Y-m-d h:i:s');
        
        $data['updated_by'] = $this->session->userdata('email');
       
        // 'updated_user' => $this->session->userdata('username'),
        //     'updated_terminal' => gethostname(),
         
        $where = array('id'=> $id);
        $result = $this->driver_model->update_data_changes('fuel',$data, $where);
          
        if($result){
          
            $response['success'] = true;
        }else{
          $response = array('success'=>false, 'msg'=>'Network Issue');
        }
        echo json_encode($response);

        
       
    }
    
    public function get_fuel_by_id(){
         $this->load->model('order_model');
         
        $response = array('success' => false);
        $id = $_POST['id'];
        $where = array('id'=>$id);
        
        $res = $this->driver_model->get_where_data_from('fuel',$where);
        // print_r($res);
        // die();
        
        if($res){
            $response['success'] = true;
            $response['res'] = $res;
            
        }

        echo json_encode($response);
    } 
    
    public function save_fuel(){
          $response = array('success' => false);
        $this->load->model('driver_model');
       
        $data['title'] = $this->input->post('name');
        $data['amount'] = $this->input->post('amount');
        $data['description'] = $this->input->post('description');
        $data['dated'] = date('Y-m-d',strtotime($this->input->post('date')));
        
        $data['added_by'] = $this->session->userdata('email');
        
         
        $result=$this->driver_model->add_insert_data('fuel',$data);
            //   echo '<pre>';
            //     print_r($result);
            //     die();
             if($result){
                 $this->session->set_flashdata('success', 'fuel has been added successfully. ');
                 $response['success'] = true;
             }else{
                 $this->session->set_flashdata('error', 'Network Issue! Try again. ');
             }
                
                
                
                
                
               
              
              
              echo json_encode($response);
              
            }
    

}

?>