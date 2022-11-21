<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller
{

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

    public function dashboard(){
        $vendor_id = $this->session->userdata('u_id');
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');

        $where = "vendor_id = ".$vendor_id." and delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_not_assigned_deliveries'] = $this->order_model->count_not_assigned($where);

        $delivered_deliveries_where = "vendor_id = ".$vendor_id." and delivered_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_shipped_deliveries'] = $this->order_model->count_shipped($delivered_deliveries_where);

        $total_deliveries_where = "vendor_id = ".$vendor_id." and delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_deliveries'] = $this->order_model->count_all_by_delivery_date($total_deliveries_where);

        //request for collection
        $bags_req_where = "vendor_id = ".$vendor_id." and status = 'Requested' and pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_bags_collection'] = $this->bag_model->count_bags_collection($bags_req_where);

        //collected bags
        $bags_collected_where = "vendor_id = ".$vendor_id." and status = 'Picked' and collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_bags_collected'] = $this->bag_model->count_bags_collection($bags_collected_where);

        $customers_where = "o.vendor_id = ".$vendor_id." and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_customers'] = count($this->customer_model->get_delivery_customer($customers_where));

        $this->load->view('vendor/index', $response);
    }


    public function dashboard_stats(){
        $response = array('success'=> true);
        $vendor_id = $this->session->userdata('u_id');
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');

        $not_assigned_deliveries_where = "vendor_id = ".$vendor_id." and delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_not_assigned_deliveries'] = $this->order_model->count_not_assigned($not_assigned_deliveries_where);

        $delivered_deliveries_where = "vendor_id = ".$vendor_id." and delivered_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_shipped_deliveries'] = $this->order_model->count_shipped($delivered_deliveries_where);

        $total_deliveries_where = "vendor_id = ".$vendor_id." and delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_deliveries'] = $this->order_model->count_all_by_delivery_date($total_deliveries_where);

        //request for bag collection
        $bags_req_where = "vendor_id = ".$vendor_id." and status = 'Requested' and created_dt BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_bags_collection'] = $this->bag_model->count_bags_collection($bags_req_where)[0]->bags;

        //collected bags
        $bags_collected_where = "vendor_id = ".$vendor_id." and  status = 'Picked' and collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_bags_collected'] = $this->bag_model->count_bags_collection($bags_collected_where)[0]->bags;

        $customers_where = "o.vendor_id = ".$vendor_id." and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $response['total_customers'] = count($this->customer_model->get_delivery_customer($customers_where));
        //$response['total_customers'] = $this->customer_model->count($customers_where);

        //$customers_where = "vendor_id = ".$vendor_id." and created_dt BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        //$response['total_customers'] = $this->customer_model->count($customers_where);

        echo json_encode($response);
    }

    public function index(){
        $data['vendors'] =  $this->vendor_model->get_all_vendors();
        $this->load->view('vendor/manage', $data);
    }
  public function keepers(){
    $this->load->model('Vendor_model');
    $this->load->model('order_model');
    
    $data['types'] = $this->order_model->get_deliveriess_type_where();
    
    $data['vendors'] =  $this->Vendor_model->get_all_team();

    //$data['keepers'] =  $this->Vendor_model->get_all_keepers();
    // echo "<pre>";
    // print_r($data);
    // exit();
        $this->load->view('storkeper_list',$data);
    }
    
    
   
    
    
 public function uploadss()
    {
        
    // if (strtolower($this->session->userdata('role')) == 'admin') {   
        if (strtolower($this->session->userdata('role')) != 'vendor'){
      $this->load->model('Vendor_model');
     
      $data['vendors'] =  $this->Vendor_model->get_all_vendors();
      $this->load->view('vender_list',$data);
     }else{
           $this->load->view('forbidden');
       }
    }
    public function del()
    {
        $this->load->model('Vendor_model');
         $ids = $this->input->post('ids');
 
        $this->db->where_in('id', explode(",", $ids));
        $this->db->delete('users');
 
        echo json_encode(['success'=>"Item Deleted successfully."]);
  
        
}
 public function del_team()
    {
        $this->load->model('Vendor_model');
         $ids = $this->input->post('ids');
 
        $this->db->where_in('id', explode(",", $ids));
        $this->db->delete('users');
 
        echo json_encode(['success'=>"Deleted successfully."]);
  
        
    }
    public function check_email_validation()
    {
      $this->load->model('Vendor_model');
      $email        = $this->input->post('email');
      $role_type_id = $this->input->post('role_type_id');
      $result       = $this->Vendor_model->check_email_validation($email,$role_type_id);
      // print_r($result);
      if ($result) {
        echo "already available";
      }else{
        echo "not available";
      }
    }
    public function check_phone_validation()
    {
      $this->load->model('Vendor_model');
      $phone        = $this->input->post('phone');
      $role_type_id = $this->input->post('role_type_id');
      $result       = $this->Vendor_model->check_phone_validation($phone,$role_type_id);
      if ($result) {
        echo "already available";
      }else{
        echo "not available";
      }
    }
    public function save_vendor(){
          $this->load->model('Vendor_model');
          $mods = $this->input->post('tags');
          $data['email'] = $this->input->post('email');
          $data['phone'] = $this->input->post('phone');
          $data['role_id'] = 2;
          $data['full_name'] = $this->input->post('name');
          $data['address'] = $this->input->post('address');
          $data['password'] = md5($this->input->post('s_pass'));
          $data['Password_partner'] = $this->input->post('s_pass');
          $modules = !empty($mods) ? implode(',', $mods) : '';
          $data['modules'] = $modules;
          $data['status'] = '0';
          //print_r($data['modules'] );
          //die();
           $result=$this->Vendor_model->check_registration($data['email']);
         // $result=$this->Web_UserModel->check_registration($player['gmail']);
          if(count($result)>0){
            $this->session->set_flashdata('error', 'OOPs You already have a account. gmail already exist');
            redirect('Partner');
           }
         else{
              $this->session->set_flashdata('success', 'Partner has been successfully registered to The Logx and credential details have been sent to his email. Thanks');
           $this->Vendor_model->add_registration('users',$data);
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $modules = implode(',', $this->input->post('tags'));
            $password = $this->input->post('s_pass');
            // print_r( $data['email']);
            // die();
            $this->load->library('email');
            $config['protocol'] = 'sendmail';
          $config['mailpath'] = '/usr/sbin/sendmail';
          $config['charset'] = 'iso-8859-1';
          $config['wordwrap'] = TRUE;
          $this->email->initialize($config);
       
         $htmlContent = '<h2>Hi '.$name.',</h2>';
         $htmlContent .= '<h4>We welcome you onboard and hope for a good business relationship.</h4>';
         $htmlContent .= '<p>Please see your login credentials to access Logx Portal below:
with The Following Modules:'.ucfirst($modules).'</p>';
         $htmlContent .= '<ul>';
         $htmlContent .= '<li>Link: <a target="_blank" href="'.base_url().'">'.base_url().'</a></li>';
         $htmlContent .= '<li>Email:'.$email.'</li>';
         $htmlContent .= '<li>Password:'.$password.'</li></ul>';
         $htmlContent .= '<p>You can reach us anytime through support panel in Logx Portal.<br>Best of Luck<br>Team Logx</p>';
         $this->email->to($email);
         $this->email->from('admin@thelogx.com','TheLogx');
         $this->email->subject(' The Logx Transport Credentials');
         $this->email->message($htmlContent);
         $this->email->set_mailtype('html');
         //Send email
         $this->email->send();
         echo $this->email->print_debugger();
           //$data['email'] = $this->input->post('email');
           // print_r( $data['email']);
           // die();
          redirect('Partner');
       }
    }
     public function save_keeper(){
        
          $this->load->model('Vendor_model');
          $mods = $this->input->post('tags');

          $data['email'] = $this->input->post('email');
          $data['phone'] = $this->input->post('phone');
          $data['full_name'] = $this->input->post('name');
          $data['address'] = $this->input->post('address');
          $data['Password'] = md5($this->input->post('s_pass'));
          $data['Password_partner'] = $this->input->post('s_pass');
          $modules = !empty($mods) ? implode(',', $mods) : 'xxx';
          $data['modules'] = $modules;
          $data['role_id'] = $this->input->post('role_name');

           $result=$this->Vendor_model->check_team($data['email']);
           if(count($result)>0){
              $this->session->set_flashdata('error', 'OOPs You already have a account. gmail already exist');
               redirect('keepers');
             }
             else
             {
            $this->session->set_flashdata('success', 'Welcome to thelogx ! You have successfully registered ');
    
          $res=$this->Vendor_model->add_registration('users',$data);
          $email = $this->input->post('email');
          $name = $this->input->post('name');
          $role = $this->input->post('role_name');
          $modules = implode(',', $this->input->post('tags'));
          $password = $this->input->post('s_pass');
          
          
           $whr= array('id' => $role);
          $role_name=$this->vendor_model->get_rolename($whr);
         
            $this->load->library('email');
            $config['protocol'] = 'sendmail';
          $config['mailpath'] = '/usr/sbin/sendmail';
          $config['charset'] = 'iso-8859-1';
          $config['wordwrap'] = TRUE;
          $config['mailtype'] = 'html';
          $this->email->initialize($config);
         $htmlContent = '<h1>Sending email via SMTP server</h1>';
         $htmlContent .= '<h4>Hi '.$name.'</h4>';
         $htmlContent .= '<h4>Welcome to The Logx Transport.</h4>';
         $htmlContent .= '<p>This is you to inform that You have been registered at theLogx Portal as "'.$role_name.'" with The Following Modules:</p>';
          $htmlContent .= '<p>'.$modules.'</p>';
          $htmlContent .= '<p>Please Login Using the Followng Credentials</p>';
          $htmlContent .= '<p>Link:'.base_url().'</p>';
          $htmlContent .= '<p>Email:'.$email.'</p>';
          $htmlContent .= '<p>Password:'.$password.'</p>';
          $htmlContent .= '<h4>Thanks</h4>';
         $this->email->to($email);
         $this->email->from('admin@thelogx.com','Thelogx');
         $this->email->subject('The Logx Transport Credentials');
         $this->email->message($htmlContent);
         //Send email
         $this->email->send();
          $this->email->print_debugger();
           
          redirect('keepers');
     }
    }

// public function save_keeper(){
//         $response = array('success' => false);

//         //check duplicate vendor email
//         $where = array('email'=>$_POST['email']);
//         $vendor = $this->vendor_model->get_where2($where);
//         if(!$vendor) {
//             $invitation_code = mt_rand(100000, 999999);
//             $fields = array(
//                 'email' => $_POST['email'],
//                 'phone' => validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$_POST['phone'])))),
//                 'role_id' => 5,
//                 'full_name' => $_POST['name'],
//                 'address' => $_POST['address'],
//                 'password' => MD5($_POST['password']),
//                 'code' => $invitation_code,
//                 'status' => 0,
//                 'created_dt' => date("Y-m-d H:i:s"),
//                 'updated_dt' => date("Y-m-d H:i:s"),
//                 'created_user' => $this->session->userdata('email'),
//                 'updated_user' => $this->session->userdata('email'),
//                 'created_terminal' => gethostname(),
//                 'updated_terminal' => gethostname()
//             );

//             $msg = "Hi ".@$_POST['name']." Admin,<br/><br/>
//             We welcome you to use L O G X vendor <a target='_blank' href='".base_url()."'>Portal</a>,
//             Use below code and link to signup and manage Deliveries and Bag collections.<br/>
//             verification code ".$invitation_code."<br/><br/>
//             Regards, <br/><br/>

//             TEAM L O G X<br/>";

//             $result = $this->vendor_model->add($fields);

//             if ($result) {

//                 $response['success'] = true;

//                     //send email
//                 $param = array('to'=>$_POST['email'], 'msg'=>$msg, 'subject'=>'Welcome to LOGX', 'identification'=>'LOGX');
//               //  send_email($param);

//                 //method to send sms
//                 //$contact = validate_phone_number(trim(str_replace(' ', '', $_POST['phone'])));
//                 //send_expert_sms($contact, $msg);
//             }
//         }

//         echo json_encode($response);
//     }

//OLDDDDD
//   public function update_vendor(){
    
//         $response = array('success' => false);
//         $vendor_id = $_POST['vendor_id'];
//         $mods =  $_POST['modules'];
//         // $modules = !empty($mods) ? implode(',', $mods) : 'xxx';
       
//         $fields = array(
//             'contract_file' => $_POST['contract_file'],
//             'phone' =>  $_POST['phone'],
//             'email' =>  $_POST['email'],
//             'full_name' =>  $_POST['name'],
//             'address' =>  $_POST['address'],
//             'status' =>  0,
//             'Password_partner' =>  $_POST['Password_partner'],
//             'password' => md5($this->input->post('Password_partner')),
//             'modules'=>$mods,
//             'updated_dt' => date("Y-m-d H:i:s"),
//             'updated_user' => $this->session->userdata('username'),
//             'updated_terminal' => gethostname(),
           
//         );
       
//       //check if duplicate
//         if($this->input->post('email') != $this->input->post('old_email'))
//           $dec = $this->vendor_model->check_email($vendor_id, $this->input->post('email'));
//         else
//           $dec = true;
//         //end check

//         if($dec == true)
//         {

//         $where = array('id'=> $vendor_id);
//         $result = $this->vendor_model->update($fields, $where);
//         if($result){
//             $response['success'] = true;
//         }}
//         else
//           $response = array('success'=>false, 'msg'=>'Duplicate Email');

//         echo json_encode($response);
       
//     }



// TAHA comment for indoor team edit purpose
    //   public function update_team(){
    //     $response = array('success' => false);
    //     $vendor_id = $_POST['vendor_id'];
    //     $mods =  $_POST['modules'];
       
    //     $fields = array(
    //         'phone' =>  $_POST['phone'],
    //         'email' =>  $_POST['email'],
    //         'full_name' =>  $_POST['name'],
    //         'address' =>  $_POST['address'],
    //         'Password_partner' =>  $_POST['Password_partner'],
    //         'role_type_id' =>  $_POST['roles'],
    //         'modules' =>  $mods,
    //         'updated_dt' => date("Y-m-d H:i:s"),
    //         'updated_user' => $this->session->userdata('username'),
    //         'updated_terminal' => gethostname()
    //     );
    //      if($this->input->post('email') != $this->input->post('old_email'))
    //       $dec = $this->vendor_model->check_email($vendor_id, $this->input->post('email'));
    //     else
    //       $dec = true;
    //     //end check

    //     if($dec == true)
    //     {

    //     $where = array('id'=> $vendor_id);
    //     $result = $this->vendor_model->update($fields, $where);
    //     if($result){
    //         $response['success'] = true;
    //     }}
    //     else
    //       $response = array('success'=>false, 'msg'=>'Duplicate Email');

    //     echo json_encode($response);
       
    // }
    
    public function update_team(){
        $response = array('success' => false);
        $vendor_id = $_POST['vendor_id'];
        $mods =  $_POST['modules'];
       
        $pass=$_POST['Password_partner'];
        $fields = array(
            'phone' =>  $_POST['phone'],
            'email' =>  $_POST['email'],
            'full_name' =>  $_POST['name'],
            'address' =>  $_POST['address'],
            'Password_partner' =>  $_POST['Password_partner'],
            'password' => md5($pass),
            'role_type_id' =>  $_POST['roles'],
            'modules' =>  $mods,
            'updated_dt' => date("Y-m-d H:i:s"),
            'updated_user' => $this->session->userdata('username'),
            'updated_terminal' => gethostname()
        );
         if($this->input->post('email') != $this->input->post('old_email'))
          $dec = $this->vendor_model->check_email($vendor_id, $this->input->post('email'));
        else
          $dec = true;
        //end check

        if($dec == true)
        {

        $where = array('id'=> $vendor_id);
        $result = $this->vendor_model->update($fields, $where);
        if($result){
            $response['success'] = true;
        }}
        else
          $response = array('success'=>false, 'msg'=>'Duplicate Email');

        echo json_encode($response);
       
    }

//LAtest
// public function update_vendor_old(){
    
        
//       $this->load->model('Vendor_model');
//             $vid= $this->input->post('vendor_id');
//           $mods = $this->input->post('tags');
//           $data['email'] = $this->input->post('email');
//           $data['phone'] = $this->input->post('phone');
//           $data['role_id'] = 2;
//           $data['full_name'] = $this->input->post('name');
//           $data['address'] = $this->input->post('address');
//           $data['password'] = md5($this->input->post('s_pass'));
//           $data['Password_partner'] = $this->input->post('s_pass');
//           $modules = !empty($mods) ? implode(',', $mods) : '';
//           $data['modules'] = $modules;
//           $data['status'] = '0';
//           $data['delivery_message'] = $this->input->post('delivery_message');
//           $data['bag_message'] = $this->input->post('bag_message');
//           $data['cash_message'] = $this->input->post('cash_message');
//           $data['updated_dt'] = date("Y-m-d H:i:s");
//           $data['updated_user'] = $this->session->userdata('username');
//           $data[ 'updated_terminal'] = gethostname();
          
//           $f_chk=$this->uri->segment(3);
//           //$f_chk=$this->input->post('n_f_is');
//           echo $f_chk;

//         //  $chk_file=$this->input->post('contract_file');
//         //  echo 'below is chk file';
//         //  print_r($chk_file);
//          if($f_chk == '0'){
//              $data['contract_file'] =$this->input->post('contr_file');
//              print_r('i am if ');
//         }else{
            
//           $config['upload_path'] = './upload/';
//           $config['allowed_types'] = 'pdf|docx|doc';
//           $config['max_size']    = 0;

//       print_r('i am else');

//               $this->load->library('upload', $config);
//               //echo 'below is do upload';
//               // print_r($this->upload->do_upload('contract_file'));
//               if (!$this->upload->do_upload('contract_file')){
//                   $res['error'] = $this->upload->display_errors();
//                   $res['page_data'] = 'admin/upload_view';
//                   $this->load->view('new_vendor',$res);
//                   print_r('i am eroor in upload new file');
//                   return false;
//               }else{
//                 $data['contract_file'] = base_url()."upload/".$this->upload->data('file_name');
//                  print_r('i execute');
                 
//               }
          
//          }
//             $where = array('id'=> $vid);
//             $result = $this->vendor_model->update($data, $where);
//             $ans= $this->Vendor_model->edit_new_vendor($vid);
//             if($ans){
//                 $res='true';
//                 echo json_encode($res);
//             }else{
//                 $res='f';
//                 echo json_encode($res);
//             }
//           // redirect('partner');
    
// }

public function update_vendor(){
    
        
      $this->load->model('Vendor_model');
            $vid= $this->input->post('vendor_id');
          $mods = $this->input->post('tags');
          $data['email'] = $this->input->post('email');
          $data['phone'] = $this->input->post('phone');
          $data['role_id'] = 2;
          $data['full_name'] = $this->input->post('name');
          $data['address'] = $this->RemoveSpecialChar($this->input->post('address'));
          $data['password'] = md5($this->input->post('s_pass'));
          $data['Password_partner'] = $this->input->post('s_pass');
          $modules = !empty($mods) ? implode(',', $mods) : '';
          $data['modules'] = $modules;
          $data['status'] = '0';
          
          $data['delivery_message'] = $this->RemoveSpecialChar($this->input->post('delivery_message'));
          $data['bag_message'] = $this->RemoveSpecialChar($this->input->post('bag_message'));
          $data['cash_message'] = $this->RemoveSpecialChar($this->input->post('cash_message'));
          
          $data['updated_dt'] = date("Y-m-d H:i:s");
          $data['updated_user'] = $this->session->userdata('username');
          $data[ 'updated_terminal'] = gethostname();
          
          
          
          $term = $this->input->post('term');
          
          if($term == 00 OR $term == '00'){
              
              $data['term']=10;
          }else{
              
              $data['term']= $term;
          }
          
          
             $data['inv_email'] = $this->input->post('inv_email');
           $data['other_email'] = $this->input->post('other_email');
           $data['inv_address'] = $this->RemoveSpecialChar($this->input->post('inv_address'));
           $data['trn'] = $this->input->post('trn');
           
            $data['emails_for_mealplan'] = $this->input->post('plan_email');
          
          
          
          $f_chk=$this->uri->segment(3);
          //$f_chk=$this->input->post('n_f_is');
          echo $f_chk;

        //  $chk_file=$this->input->post('contract_file');
        //  echo 'below is chk file';
        //  print_r($chk_file);
         if($f_chk == '0'){
             $data['contract_file'] =$this->input->post('contr_file');
             print_r('i am if ');
        }else{
            
          $config['upload_path'] = './upload/';
          $config['allowed_types'] = 'pdf|docx|doc';
          $config['max_size']    = 0;

       print_r('i am else');

              $this->load->library('upload', $config);
              //echo 'below is do upload';
              // print_r($this->upload->do_upload('contract_file'));
              if (!$this->upload->do_upload('contract_file')){
                  $res['error'] = $this->upload->display_errors();
                  $res['page_data'] = 'admin/upload_view';
                  $this->load->view('new_vendor',$res);
                  print_r('i am eroor in upload new file');
                  return false;
              }else{
                $data['contract_file'] = base_url()."upload/".$this->upload->data('file_name');
                 print_r('i execute');
                 
              }
          
         }
            $where = array('id'=> $vid);
            $result = $this->vendor_model->update($data, $where);
            $ans= $this->Vendor_model->edit_new_vendor($vid);
            if($ans){
                $res='true';
                echo json_encode($res);
            }else{
                $res='f';
                echo json_encode($res);
            }
           // redirect('partner');
    
}

public function deli(){
    $this->load->model('Vendor_model');
    $id= $_POST["id"];
    $acti= $_POST["aci"];
    $ans= $this->Vendor_model->deli($id,$acti);
    if($ans){
            echo json_encode($ans);
    }else{
        
        echo json_encode($ans);
    }
    }
     public function update_keeper(){
        $response = array('success' => false);
        $vendor_id = $this->uri->segment(3);

        $fields = array(
            'phone' =>  $_POST['phone'],
            'email' =>  $_POST['email'],
            'full_name' =>  $_POST['name'],
            'address' =>  $_POST['address'],
            'updated_dt' => date("Y-m-d H:i:s"),
            'updated_user' => $this->session->userdata('username'),
            'updated_terminal' => gethostname()
        );

        $where = array('id'=> $vendor_id);
        $result = $this->vendor_model->update($fields, $where);
        if($result){
            $response['success'] = true;
        }

        redirect("vendor/keepers");
    }
    public function deleteVendor(){
        $response = array('success' => false);
        $vendor_id = $this->uri->segment(3);

        $fields = array(
            'status' =>  0,
            'is_deleted' =>  1,
            
        );

        $where = array('id'=> $vendor_id);
        $result = $this->vendor_model->update($fields, $where);
        if($result){
            $this->session->set_flashdata('success', 'Selected vendor is Sucessfully Deleted');
        }else{
           $this->session->set_flashdata('error', 'Something gone wrong.');  
        }

       redirect('vendor');
    }
     public function deleteKeeper(){
        $response = array('success' => false);
        $vendor_id = $this->uri->segment(3);

        $fields = array(
            'status' =>  0,
            'is_deleted' =>  1,
            
        );

        $where = array('id'=> $vendor_id);
        $result = $this->vendor_model->update($fields, $where);
        if($result){
            $this->session->set_flashdata('success', 'Selected Keeper is Sucessfully Deleted');
        }else{
           $this->session->set_flashdata('error', 'Something gone wrong.');  
        }

       redirect('vendor/keepers');
    }

    public function update_vendor_status(){
        $response = array('success' => false);
        $vendor_id = $_POST['vendor_id'];
        $status = $_POST['status'];

        $fields = array(
            'status' =>  $_POST['status'],
            'updated_dt' => date("Y-m-d H:i:s"),
            'updated_user' => $this->session->userdata('username'),
            'updated_terminal' => gethostname()
        );

        $where = array('id'=> $vendor_id, 'role_id'=>2);
        $result = $this->vendor_model->update($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }
      public function update_keeper_status(){
        $response = array('success' => false);
        $vendor_id = $_POST['vendor_id'];
        $status = $_POST['status'];

        $fields = array(
            'status' =>  $_POST['status'],
            'updated_dt' => date("Y-m-d H:i:s"),
            'updated_user' => $this->session->userdata('username'),
            'updated_terminal' => gethostname()
        );

        $where = array('id'=> $vendor_id, 'role_id'=>5);
        $result = $this->vendor_model->update($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }

    public function get_vendor_by_id(){
        $response = array('success' => false);
        $vendor_id = $_POST['vendor_id'];
        $where = array('id'=>$vendor_id);
        
        $vendor = $this->vendor_model->get_where($where);
        $bags_qout = $this->vendor_model->get_where_by_B($where);
        $cash_qout = $this->vendor_model->get_where_by_C($where);
        $deliv_qout = $this->vendor_model->get_where_by_D($where);
             
       
        if($vendor){
            $response['success'] = true;
            $response['vendor'] = $vendor;
            $response['bags_qout'] = $bags_qout;
            $response['cash_qout'] = $cash_qout;
            $response['deliv_qout'] = $deliv_qout;
            
        }
          
       

        echo json_encode($response);
    }
 public function get_team_by_id(){
        $response = array('success' => false);
        $vendor_id = $_POST['vendor_id'];
        $where = array('id'=>$vendor_id);
        $vendor = $this->vendor_model->getsss_where($where);

        if($vendor){
            $response['success'] = true;
            $response['vendor'] = $vendor;
        }

        echo json_encode($response);
    }


    public function get_vendors(){
        $response = array('success' => false);
        $vendors = $this->vendor_model->get_all_vendors();
        if($vendors){
            $response['success'] = true;
            $response['vendors'] = $vendors;
        }

        echo json_encode($response);
    }


    //DASHBOARD STATISTICS
    public function get_vendors_customers(){
        $response = array('success' => false);
        $vendors = $this->vendor_model->get_vendor_customers();
        if($vendors){
            $response['success'] = true;
            $response['vendor_wise'] = $vendors;
        }

        echo json_encode($response);
    }


    /***************************************************************************/
    /***********************ADMIN DASHBOARD**************************************/
    /***************************************************************************/

    //active mean those drivers to whom deliveries are assign
    public function delivery_vendors(){
        $start_date = @$_POST['vendor_start_date'] ? @$_POST['vendor_start_date'] : date('Y-m-d');
        $end_date = @$_POST['vendor_end_date'] ? @$_POST['vendor_end_date'] : date('Y-m-d');
        $vendor_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['vendors'] = $this->vendor_model->get_delivery_vendors($vendor_where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('vendor/delivery_vendor', $data);
    }

    public function get_assign_drivers(){
        $response = array('success' => false);
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');
        $vendor_where = " o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $vendors = $this->vendor_model->get_delivery_vendors($vendor_where);
        if($vendors){
            $response['success'] = true;
            $response['vendors'] = $vendors;
        }

        echo json_encode($response);
    }

    /***************************************************************************/
    /***********************VENDOR DASHBOARD************************************/
    /***************************************************************************/

    //active mean those drivers to whom deliveries are assign
    public function dashboard_delivery_list(){
        $start_date = @$_POST['delivery_start_date'] ? @$_POST['delivery_start_date'] : date('Y-m-d');
        $end_date = @$_POST['delivery_end_date'] ? @$_POST['delivery_end_date'] : date('Y-m-d');
        $vendor_id = $this->session->userdata('u_id');
        $vendor_where = "o.vendor_id = ".$vendor_id." and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['orders'] = $this->order_model->get_orders($vendor_where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('order/dashboard_v_deliveries', $data);
    }

    public function get_dashboard_delivery_list(){
        $response = array('success' => false);
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');
        $vendor_id = $this->session->userdata('u_id');
        $vendor_where = "o.vendor_id = ".$vendor_id." and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $orders = $this->order_model->get_orders($vendor_where);
        if($orders){
            $response['success'] = true;
            $response['orders'] = $orders;
        }

        echo json_encode($response);
    }

    public function dashboard_delivered_delivery_list(){
        $start_date = @$_POST['delivered_start_date'] ? @$_POST['delivered_start_date'] : date('Y-m-d');
        $end_date = @$_POST['delivered_end_date'] ? @$_POST['delivered_end_date'] : date('Y-m-d');
        $vendor_id = $this->session->userdata('u_id');
        $vendor_where = "o.status = 'Delivered' and o.vendor_id = ".$vendor_id." and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['orders'] = $this->order_model->get_orders($vendor_where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('order/dashboard_v_delivered', $data);
    }

    public function get_dashboard_delivered_delivery_list(){
        $response = array('success' => false);
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');
        $vendor_id = $this->session->userdata('u_id');
        $vendor_where = "o.status = 'Delivered' and o.vendor_id = ".$vendor_id." and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $orders = $this->order_model->get_orders($vendor_where);
        if($orders){
            $response['success'] = true;
            $response['orders'] = $orders;
        }

        echo json_encode($response);
    }

    public function dashboard_bag_request_list(){
        $start_date = @$_POST['pick_start_date'] ? @$_POST['pick_start_date'] : date('Y-m-d');
        $end_date = @$_POST['pick_end_date'] ? @$_POST['pick_end_date'] : date('Y-m-d');
        $vendor_id = $this->session->userdata('u_id');

        $where = " b.vendor_id = ".$vendor_id." and b.pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        $data['bags'] =  $this->bag_model->get_where($where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('bag/dashboard_v_list', $data);
    }

    public function get_by_pick_date(){
        $response = array('success' => false);
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');
        $vendor_id = $this->session->userdata('u_id');

        $where = " b.vendor_id = ".$vendor_id." and b.pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        $bags =  $this->bag_model->get_where($where);

        if($bags){
            $response['success'] = true;
            $response['bags'] = $bags;
        }

        echo json_encode($response);
    }
    /***************************************************************************/
    /***********************VENDOR ORDERS**************************************/
    /***************************************************************************/

    public function upload_deliveries()
    {
        $this->load->view('order/v_upload_file', array('error' => ' ' ));
    }

    public function upload_deliveries_by_feeds_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'order');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
            $this->load->view('order/v_upload_file', $data);
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
                    $delivery_time = $table[4+$increment][1];
                    $note = '';
                    $increment +=7;

                    if($phone && $address && $delivery_time) {
                        $phone = validate_phone_number(trim(str_replace(' ', '', $phone)));
                        $where = array('phone' => $phone, 'role_id' => 4);
                        $customer = $this->customer_model->get_where($where);
                        $customer_id = 0;
                        if (count($customer) > 0) {
                            $customer_id = intval($customer[0]->id);
                        }

                        $temp = (object)array('customer_id' => $customer_id, 'full_name' => $name, 'phone' => $phone, 'email' => '', 'address' => $address, 'delivery_time' => $delivery_time, 'note' => $note);
                        array_push($file_data, $temp);
                    }

                }//end for
            }

            $data['file_data'] = $file_data;
            $this->load->view('order/v_temp_order', $data);
        }
    }

    public function upload_deliveries_by_general_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'g_deliveries');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
            $this->load->view('order/v_upload_file', $data);
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

                 
                     $phone = $data[0];
                
                    if($data[0]!="" or $data[0]!=" "){
                        $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data[0]))));
                        }
                        $customer_id = 0;


                       $temp = (object)array('customer_id' => $customer_id, 'full_name' => trim($data[1]), 'phone' => $phone, 'address' => trim(str_replace("'","",$data[2])),'pickUp' => trim($data[3]), 'delivery_time' => $data[4], 'note' => $data[5]);
                        array_push($file_data, $temp);
                  
                }
                fclose($handle);
            }

           $this->session->set_userdata("file_data",$file_data);
            $data['file_data'] =  $this->session->userdata("file_data");
            $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
           // $data['vendors'] =  $this->vendor_model->get_where(array());
            $where = array('status' => 1);
            $data["vendor_id"] =  $this->session->userdata("u_id");
            $data['types'] =  $this->order_model->get_deliveries_type_where($where);
            $this->load->view('order/v_temp_order', $data);
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

    public function order(){
        $vendor_id = $this->session->userdata('u_id');
         $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        //$where = array('o.driver_id > ' => 0);
        $where = "o.vendor_id='".$vendor_id."' and o.driver_id > 0 and o.status !='Delivered' and o.status !='Collected' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        $data['orders'] =  $this->order_model->get_orders($where);
      
       
        $this->load->view('order/v_manage', $data);
    }
     public function orderCompleted(){
         $start_date = date('Y-m-d');
         $end_date = date('Y-m-d', strtotime($start_date. ' + 1 days')); 
        $vendor_id = $this->session->userdata('u_id');
         $where = "o.driver_id > 0 and o.vendor_id='".$vendor_id."' and (o.status = 'Delivered' or o.status='Collected') and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
       
        $data['orders'] =  $this->order_model->get_orders($where);
        $data["startDate"] = date('d-m-Y',strtotime($start_date));
        $data["endDate"] = date('d-m-Y',strtotime($end_date));
        $this->load->view('order/v_completed', $data);
    }

public function get_deliveries_report_by_completed(){
       $start_date = date('Y-m-d',strtotime($_POST["from"]));
         $end_date = date('Y-m-d',strtotime($_POST["to"]));
        $vendor_id = $this->session->userdata('u_id');
         $where = "o.driver_id > 0 and o.vendor_id='".$vendor_id."' and (o.status = 'Delivered' or o.status='Collected') and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
       
        $data['orders'] =  $this->order_model->get_orders($where);
        $data["startDate"] = date('d-m-Y',strtotime($start_date));
        $data["endDate"] = date('d-m-Y',strtotime($end_date));
        $this->load->view('order/v_completed', $data);
    }
    public function uploaded(){
        $vendor_id = $this->session->userdata('u_id');
         $where = "o.vendor_id = ".$vendor_id." and driver_id = 0 and o.status = 'Not Assign'";
        $data['orders'] =  $this->order_model->get_orders($where);
        $this->load->view('order/v_new_orders', $data);
    }


    public function get_vendors_orders_report(){
        $response = array('success' => false);
        $vendor_id = $this->session->userdata('u_id');
        $orders = $this->order_model->get_order_report_by_vendor($vendor_id);
        if($orders){
            $response['success'] = true;
            $response['order_wise'] = $orders;
        }

        echo json_encode($response);
    }



    /***************************************************************************/
    /***********************VENDOR BAGS**************************************/
    /***************************************************************************/

    public function upload()
    {
        $this->load->view('bag/v_upload_file', array('error' => ' ' ));
    }

    public function upload_bag_request_by_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'g_bags');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
            $this->load->view('bag/v_upload_file', $data);
        }
        else
        {
            $file = base_url().'upload/'.$file_name;
            if (($handle = fopen($file, "r")) !== FALSE) {
                $flag = true;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    //Used to skip 1st row
                    if($flag) { $flag = false; continue; }

                    if($data[2] && $data[3]) {
                        $phone = validate_phone_number(trim(str_replace(' ', '', $data[1])));
                        $where = array('phone' => $phone, 'role_id' => 4);
                        $customer = $this->customer_model->get_where($where);
                        $customer_id = 0;
                        if (count($customer) > 0) {
                            $customer_id = intval($customer[0]->id);
                        }


                        $temp = (object)array('customer_id' => $customer_id, 'full_name' => $data[0], 'phone' => $phone, 'address' => $data[2], 'bags_qty' => $data[3]);
                        array_push($file_data, $temp);
                    }
                }
                fclose($handle);
            }

            $data['file_data'] = $file_data;
            $data['vendors'] =  $this->vendor_model->get_where(array());
            $where2 = array('status' => 1);
            $data['types'] =  $this->order_model->get_deliveries_type_where($where2);
            $this->load->view('bag/v_temp_bag_collection', $data);
        }
    }

    public function save_file_bag_request(){
        $response = array('success' => false);

        $bags = $_POST['bags_data'];
        $vendor_id = $_POST['vendor_id'];
         $type_id = $_POST['type_id'];
        $pick_date = date('Y-m-d', strtotime($_POST['pick_date']));

        if(count($bags) > 0){
            for($i=0; $i<count($bags); $i++) {

                //if customer already exist
                if($bags[$i]['customer_id'] != 0){
                    $bag_data = array(
                        //'status' =>  'Requested',//default set
                        'customer_id' => $bags[$i]['customer_id'],
                        'vendor_id' =>  $vendor_id,
                        'type_id' =>  $type_id,
                        'bags_qty' =>  $bags[$i]['bags_qty'],
                        'pick_date' =>  $pick_date,
                        'created_dt' => date("Y-m-d H:i:s"),
                        'created_terminal' => gethostname()
                    );

                    //save bag collection
                    $result = $this->bag_model->add($bag_data);
                }else {
                    //if customer is new
                    $code = mt_rand(100000, 999999);
                    $fields = array(
                       
                        'phone' => $bags[$i]['phone'],
                        'role_id' => 4,
                        'send_invitation' => 0,
                        'vendor_id' => $vendor_id,
                        'full_name' => $bags[$i]['full_name'],
                        'address' => $bags[$i]['address'],
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
                    $customer_id = $this->customer_model->add($fields);
                    if ($customer_id) {
                        $bag = array(
                            'customer_id' => $customer_id,
                            'vendor_id' =>  $vendor_id,
                            'pick_date' =>  $pick_date,
                            'bags_qty' =>  $bags[$i]['bags_qty'],
                            'created_dt' => date("Y-m-d H:i:s"),
                            'created_terminal' => gethostname()
                        );

                        //save order
                        $result = $this->bag_model->add($bag);
                    }
                }

                if($result){
                    $response['success'] = true;
                }

            }

        }

        echo json_encode($response);
    }

    public function unassigned(){
        //return only not assign drivers bags request
        $vendor_id = $this->session->userdata('u_id');
        $where = array('b.driver_id'=> 0, 'b.vendor_id'=>$vendor_id);
        $data['bags'] =  $this->bag_model->get_where($where);

        $this->load->view('bag/v_unassigned', $data);
    }

    public function assigned()
    {
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d', strtotime($from_date. ' + 1 days'));
        $vendor_id = $this->session->userdata('u_id');
        $where = "b.driver_id != 0 and  b.status = 'Assign'  and b.vendor_id = ".$vendor_id;
        $where .= " and b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        $data['bags'] =  $this->bag_model->get_where($where);
        $this->load->view('bag/v_assigned', $data);
    }
 public function completed()
    {
                
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d', strtotime($from_date. ' + 1 days'));
        $vendor_id = $this->session->userdata('u_id');
        $where = "b.driver_id != 0 and  b.status != 'Assign'  and b.vendor_id = ".$vendor_id;
        $where .= " and b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        $data['bags'] =  $this->bag_model->get_where($where);
        $this->load->view('bag/v_completed', $data);
    }

    public function assigned_by_created_date()
    {
        $response = array('success' => false);
        $from_date = $_POST['start_date'];
        $to_date = $_POST['end_date'];
         $data["selection"]= $_POST;
        $vendor_id = $this->session->userdata('u_id');

        //return only not assign drivers bags request
        $where = "b.driver_id != 0 and b.status = 'Assign'  and b.vendor_id = ".$vendor_id;
        $where .= " and b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        $bags =  $this->bag_model->get_where($where);
        if($bags['result']) {
            $response['success'] = true;
            $response['bags'] = $bags['records'];
        }
        echo json_encode($response);
    }
 public function completed_by_created_date()
    {
        $response = array('success' => false);
        $from_date = $_POST['start_date'];
        $to_date = $_POST['end_date'];
        $vendor_id = $this->session->userdata('u_id');

        //return only not assign drivers bags request
        $where = "b.driver_id != 0 and b.status != 'Assign'  and b.vendor_id = ".$vendor_id;
        $where .= " and b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        $bags =  $this->bag_model->get_where($where);
        if($bags['result']) {
            $response['success'] = true;
            $response['bags'] = $bags['records'];
        }
        echo json_encode($response);
    }

    //dashboard
    public function get_vendors_bag_collection_report(){
        $response = array('success' => false);
        $vendor_id = $this->session->userdata('u_id');
        $where = "created_dt BETWEEN '".date('Y-m-d', strtotime('-30 days'))." 00:00:00' and '".date('Y-m-d')." 23:59:59'";
        $where .= " and vendor_id = ".$vendor_id;
        $requests = $this->bag_model->get_bag_collection_request_report_by_vendor($where);
        if($requests){
            $response['success'] = true;
            $response['requests_count'] = $requests;
        }

        echo json_encode($response);
    }

    /***************************************************************************/
    /***********************VENDOR REPORTING************************************/
    /***************************************************************************/

    public function deliveries_report(){
         $start_date = date('Y-m-d');
         $end_date = date('Y-m-d', strtotime($start_date. ' + 1 days')); 
        $vendor_id = $this->session->userdata('u_id');
         $where = "o.vendor_id='".$vendor_id."' and o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
       
        $data['orders'] =  $this->order_model->get_orders($where);
        $data["startDate"] = date('d-m-Y',strtotime($start_date));
        $data["endDate"] = date('d-m-Y',strtotime($end_date));
        
        $this->load->view('report/v_delivery_report', $data);
    }

    public function get_deliveries_report_by_date(){
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = $this->session->userdata('u_id');

        if(!$start_date){
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $where .= ' and o.vendor_id = '.$vendor_id;
        
        $data['orders'] =  $this->order_model->get_orders($where);
        $data["startDate"] = date('d-m-Y',strtotime($start_date));
        $data["endDate"] = date('d-m-Y',strtotime($end_date));
        
        $this->load->view('report/v_delivery_report', $data);
    }

    public function bag_collection_report(){
        $this->load->view('report/v_bag_collection_report', $data='');
    }

    public function get_bag_collection_by_date(){
        $response = array('success' => false);
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $vendor_id=0;
        if($this->session->userdata('role') == 'vendor'){
        $vendor_id = $this->session->userdata('u_id');
        }
        if(empty($start_date)){
            $start_date = date('Y-m-d 00:00:00');
        }

        if(empty($end_date)){
            $end_date = date('Y-m-d 23:59:59');
        }

        $where = "b.pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        if($this->session->userdata('role') == 'vendor'){
        $where .= ' and b.vendor_id = '.$vendor_id;
         }
        $report_data =  $this->bag_model->get_where($where);
        if(count(@$report_data['records'])> 0 ) {
            $response['success'] = true;
            $response['report_data'] = $report_data['records'];
        }
        
        
        // echo '<pre>';
        // print_r($response);
        // die();
        
        echo json_encode($response);
    }

    public function food_reading_report(){
        $this->load->view('report/v_food_reading_report', $data='');
    }

    public function get_food_reading_report(){
        $response = array('success' => false);
        $from_date = @$_POST['start_date'];
        $to_date = @$_POST['end_date'];
        $vendor_id = $this->session->userdata('u_id');

        if(!$from_date){
            $from_date = date('Y-m-d h', strtotime($from_date));
        }

        if(!$to_date){
            $to_date = date('Y-m-d');
        }

        $where_data = "r.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'";
        //$where_data .= " and vendor_id =".$vendor_id;
        $report_data =  $this->driver_model->get_food_reading_where($where_data, $driver_id='');
        if($report_data){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }


    /***************************************************************************/
    /********************************DOWNLOAD CSV*******************************/
    /***************************************************************************/
    public function csv_deliveries_report(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');


        /**/
        $start_date = @$_POST['csv_start_date'];
        $end_date = @$_POST['csv_end_date'];
        $vendor_id = $this->session->userdata('u_id');

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $where .= ' and o.vendor_id = '.$vendor_id;
        $report_data =  $this->order_model->get_orders_CSV($where);
        /**/

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($report_data, $delimiter, $newline);
        force_download('Deliveries.csv', $data);
    }

    public function csv_bag_collection_report(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');


        /**/
        $start_date = @$_POST['csv_start_date'];
        $end_date = @$_POST['csv_end_date'];
        $vendor_id=0;
        if($this->session->userdata('role') == 'vendor'){
        $vendor_id = $this->session->userdata('u_id');
        }
        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "b.pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
       if($this->session->userdata('role') == 'vendor'){
        $where .= ' and b.vendor_id = '.$vendor_id;
        }
        $report_data =  $this->bag_model->get_where_CSV($where);
        /**/

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($report_data, $delimiter, $newline);
        force_download('BagCollection.csv', $data);
    }
    
    //By Dilshad at 26-12-2019
     /// Add new vendor 
    public function add_new()
    {
        $this->load->model('Vendor_model');
        $service_typ=$this->Vendor_model->get_service_type_op();
        $emirites_typ=$this->Vendor_model->get_emirites_type_op();
        
        $passData=[
           'service_typ'=>$service_typ,
           'emirites_typ'=>$emirites_typ
      ];
        
        $this->load->view('new_vendor',$passData);
    }
    
//       public function save_new_vendor_old()
//     {
        
       
//       $this->load->model('Vendor_model');
//           $mods = $this->input->post('tags');
//           $data['email'] = $this->input->post('email');
//           $data['phone'] = $this->input->post('phone');
//           $data['role_id'] = 2;
//           $data['full_name'] = $this->input->post('name');
//           $data['address'] = $this->input->post('address');
//           $data['password'] = md5($this->input->post('s_pass'));
//           $data['Password_partner'] = $this->input->post('s_pass');
//           $modules = !empty($mods) ? implode(',', $mods) : '';
//           $data['modules'] = $modules;
//           $data['status'] = '0';
//           $data['delivery_message'] = $this->input->post('delivery_message');
//           $data['bag_message'] = $this->input->post('bag_message');
//           $data['cash_message'] = $this->input->post('cash_message');

//           $config['upload_path'] = './upload/';
//           $config['allowed_types'] = 'pdf|docx|doc';
//           $config['max_size']    = 0;

//          // print_r($this->input->post());

//           $this->load->library('upload', $config);
//           if (!$this->upload->do_upload('contract_file')){
//               $res['error'] = $this->upload->display_errors();
//               $res['page_data'] = 'admin/upload_view';
//               $this->load->view('new_vendor',$res);
//              // print_r('i am file upload');
//               return false;
//           }else{
//             $data['contract_file'] = base_url()."upload/".$this->upload->data('file_name');
//             // print_r('i am file upload else');
//           }

//         // print_r('i am abc');
//           // print_r($data['modules'] );
//         //   die();
//           $result=$this->Vendor_model->check_registration($data['email']);
//          // $result=$this->Web_UserModel->check_registration($player['gmail']);
//           if(count($result)>0){
//             $this->session->set_flashdata('error', 'OOPs You already have a account. email already exist');
//             redirect('Partner');
//           }
//          else{
//               $this->session->set_flashdata('success', 'Partner has been successfully registered to The Logx and credential details have been sent to his email. Thanks');
//           $this->Vendor_model->add_new_vendor('users',$data);
//             $email = $this->input->post('email');
//             $name = $this->input->post('name');
//             $modules = implode(',', $this->input->post('tags'));
//             $password = $this->input->post('s_pass');
//              //print_r( $data['email']);
//             // die();
//             $this->load->library('email');
//             $config['protocol'] = 'sendmail';
//           $config['mailpath'] = '/usr/sbin/sendmail';
//           $config['charset'] = 'iso-8859-1';
//           $config['wordwrap'] = TRUE;
//           $this->email->initialize($config);
       
//          $htmlContent = '<h2>Hi '.$name.',</h2>';
//          $htmlContent .= '<h4>We welcome you onboard and hope for a good business relationship.</h4>';
//          $htmlContent .= '<p>Please see your login credentials to access Logx Portal below:
// with The Following Modules:'.ucfirst($modules).'</p>';
//          $htmlContent .= '<ul>';
//          $htmlContent .= '<li>Link: <a target="_blank" href="'.base_url().'">'.base_url().'</a></li>';
//          $htmlContent .= '<li>Email:'.$email.'</li>';
//          $htmlContent .= '<li>Password:'.$password.'</li></ul>';
//          $htmlContent .= '<p>You can reach us anytime through support panel in Logx Portal.<br>Best of Luck<br>Team Logx</p>';
//          $this->email->to($email);
//          $this->email->from('admin@thelogx.com','TheLogx');
//          $this->email->subject(' The Logx Transport Credentials');
//          $this->email->message($htmlContent);
//          $this->email->set_mailtype('html');
//          //Send email
//          $this->email->send();
//          echo $this->email->print_debugger();
//           $data['email'] = $this->input->post('email');
//          // print_r( $data['email']);
//         //   die();
//           redirect('Partner');
//       }
//     }



    public function save_new_vendor()
    {
         
       
      $this->load->model('Vendor_model');
          $mods = $this->input->post('tags');
          $data['email'] = $this->input->post('email');
          $data['phone'] = $this->input->post('phone');
          $data['role_id'] = 2;
          $data['full_name'] = $this->input->post('name');
          $data['address'] = $this->RemoveSpecialChar($this->input->post('address'));
          
          
          $data['password'] = md5($this->input->post('s_pass'));
          $data['Password_partner'] = $this->input->post('s_pass');
          $modules = !empty($mods) ? implode(',', $mods) : '';
          $data['modules'] = $modules;
          $data['status'] = '0';
          $data['delivery_message'] = $this->RemoveSpecialChar($this->input->post('delivery_message'));
          $data['bag_message'] = $this->RemoveSpecialChar($this->input->post('bag_message'));
          $data['cash_message'] = $this->RemoveSpecialChar($this->input->post('cash_message'));
          
          
          $term = $this->input->post('term');
          
          if($term == 00 OR $term == '00' OR $term == 0 OR $term == '0'){
              
              $data['term']=10;
          }else{
              
              $data['term']= $term;
          }
          
           $data['inv_email'] = $this->input->post('inv_email');
           $data['other_email'] = $this->input->post('other_email');
           $data['inv_address'] = $this->RemoveSpecialChar($this->input->post('inv_address'));
           $data['trn'] = $this->input->post('trn');
           
           $data['emails_for_mealplan'] = $this->input->post('plan_email');
             
        //   echo '<pre>';
        //   print_r($this->input->post());
        //   die();
        

          $config['upload_path'] = './upload/';
          $config['allowed_types'] = 'pdf|docx|doc';
          $config['max_size']    = 0;

         // print_r($this->input->post());

          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('contract_file')){
              $res['error'] = $this->upload->display_errors();
              $res['page_data'] = 'admin/upload_view';
              
               $this->session->set_flashdata('error', 'OOPs The file type you are trying to upload is not allowed. Try Again!');
               redirect('Partner');
              
             //   $this->load->view('new_vendor',$res);
             // print_r('i am file upload');
              return false;
          }else{
            $data['contract_file'] = base_url()."upload/".$this->upload->data('file_name');
            // print_r('i am file upload else');
          }

        // print_r('i am abc');
          // print_r($data['modules'] );
        //   die();
          
          
            // $result=$this->Vendor_model->check_registration_new($data['email']);
        
         
         
         
        //   if($result = 0){
        //     $this->session->set_flashdata('error', 'OOPs You already have a account. email already exist');
          
        //     redirect('Partner');
        //   }else{
               $res= $this->Vendor_model->add_new_vendor('users',$data);
           
           if($res){
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $modules = implode(',', $this->input->post('tags'));
            $password = $this->input->post('s_pass');
             //print_r( $data['email']);
            // die();
        //     $this->load->library('email');
        //     $config['protocol'] = 'sendmail';
        //   $config['mailpath'] = '/usr/sbin/sendmail';
        //   $config['charset'] = 'iso-8859-1';
        //   $config['wordwrap'] = TRUE;
        //   $this->email->initialize($config);
       
//          $htmlContent = '<h2>Hi '.$name.',</h2>';
//          $htmlContent .= '<h4>We welcome you onboard and hope for a good business relationship.</h4>';
//          $htmlContent .= '<p>Please see your login credentials to access Logx Portal below:
// with The Following Modules:'.ucfirst($modules).'</p>';
//          $htmlContent .= '<ul>';
//          $htmlContent .= '<li>Link: <a target="_blank" href="'.base_url().'">'.base_url().'</a></li>';
//          $htmlContent .= '<li>Email:'.$email.'</li>';
//          $htmlContent .= '<li>Password:'.$password.'</li></ul>';
//          $htmlContent .= '<p>You can reach us anytime through support panel in Logx Portal.<br>Best of Luck<br>Team Logx</p>';
//          $this->email->to($email);
//          $this->email->from('admin@thelogx.com','TheLogx');
//          $this->email->subject(' The Logx Transport Credentials');
//          $this->email->message($htmlContent);
//          $this->email->set_mailtype('html');
//          //Send email
//          $this->email->send();
         
         $email_res=false;
         $email_res=$this->send_partner_email_inviation($email,$name,$modules,$password );
        //  new mail code start
        
       //echo 'email res is '.$email_res;
        
        // new mail code end
         
         
         
         
         
         
         
         
        //  echo $this->email->print_debugger();
        //   $data['email'] = $this->input->post('email');
         // print_r( $data['email']);
        //   die();
        
        if($email_res){
        $this->session->set_flashdata('success', 'Partner has been successfully registered to The Logx and credential details have been sent to the email. Thanks');
          
          redirect('Partner');
          
        }else{
             $this->session->set_flashdata('error', 'Email is not send due to network issue!');
          
            redirect('Partner');
        }
          
           }else{
               $this->session->set_flashdata('error', 'Try Again!');
          
            redirect('Partner');
           }
    //   }
    }
    
    
   
public function send_partner_email_inviation($email,$name,$modules,$password ){
    
//      	$config = Array(
// 			'protocol' => 'smtp',
// 			'smtp_port' => 465,
// 			'smtp_user' => 'admin@thelogx.com',
// 			'mailtype' => 'html',
// 			'charset' => 'utf-8'
// 		);
// 		$this->load->library('email');
// 		$this->email->set_newline("\r\n");
// 	  $htmlContent = '<h2>Hi '.$name.',</h2>';
//          $htmlContent .= '<h4>We welcome you onboard and hope for a good business relationship.</h4>';
//          $htmlContent .= '<p>Please see your login credentials to access Logx Portal below:
// with The Following Modules:'.ucfirst($modules).'</p>';
//          $htmlContent .= '<ul>';
//          $htmlContent .= '<li>Link: <a target="_blank" href="'.base_url().'">'.base_url().'</a></li>';
//          $htmlContent .= '<li>Email:'.$email.'</li>';
//          $htmlContent .= '<li>Password:'.$password.'</li></ul>';
//          $htmlContent .= '<p>You can reach us anytime through support panel in Logx Portal.<br>Best of Luck<br>Team Logx</p>';
//  		$this->email->to($email);
//       //  $this->email->to('ayesha.attique.work@gmail.com');
// 		$this->email->from('admin@thelogx.com','TheLogx');
// 		$this->email->subject(' The Logx Transport Credentials');
// 		$this->email->message($htmlContent);
// 		$this->email->set_mailtype("html");
// 		$email=$this->email->send();
		
		
// 		return $email;




      $this->load->library('email');
            $config['protocol'] = 'sendmail';
          $config['mailpath'] = '/usr/sbin/sendmail';
          $config['charset'] = 'iso-8859-1';
          $config['wordwrap'] = TRUE;
          $this->email->initialize($config);
       
         $htmlContent = '<h2>Hi '.$name.',</h2>';
         $htmlContent .= '<h4>We welcome you onboard and hope for a good business relationship.</h4>';
         $htmlContent .= '<p>Please see your login credentials to access Logx Portal below:
with The Following Modules:'.ucfirst($modules).'</p>';
         $htmlContent .= '<ul>';
         $htmlContent .= '<li>Link: <a target="_blank" href="'.base_url().'">'.base_url().'</a></li>';
         $htmlContent .= '<li>Email:'.$email.'</li>';
         $htmlContent .= '<li>Password:'.$password.'</li></ul>';
         $htmlContent .= '<p>You can reach us anytime through support panel in Logx Portal.<br>Best of Luck<br>Team Logx</p>';
         $this->email->to($email);
         $this->email->from('admin@thelogx.com','TheLogx');
         $this->email->subject(' The Logx Transport Credentials');
         $this->email->message($htmlContent);
         $this->email->set_mailtype('html');
         //Send email
         $res=$this->email->send();
          $this->email->print_debugger();
         
         return $res;
}


    // Edit Vendor
    public function edit()
    {
        $id = $this->uri->segment(3);
        // $this->load->view('new_vendor');
        
         $this->load->model('Vendor_model');
        $service_typ=$this->Vendor_model->get_service_type_op();
        $emirites_typ=$this->Vendor_model->get_emirites_type_op();
        
        $passData=[
           'service_typ'=>$service_typ,
           'emirites_typ'=>$emirites_typ
      ];
        
        $this->load->view('new_vendor',$passData);
    }

    public function view()
    {
        $id = $this->uri->segment(3);
       // $this->load->view('new_vendor');
       
        $this->load->model('Vendor_model');
        $service_typ=$this->Vendor_model->get_service_type_op();
        $emirites_typ=$this->Vendor_model->get_emirites_type_op();
        
        $passData=[
           'service_typ'=>$service_typ,
           'emirites_typ'=>$emirites_typ
      ];
        
        $this->load->view('view_vendor',$passData);
    }
    
    
    // new added 29-05-2020
    
     public function storekeepers(){
    $this->load->model('Vendor_model');
    $this->load->model('order_model');
    
    // $data['types'] = $this->order_model->get_deliveriess_type_where();
    
    $data['vendors'] =  $this->Vendor_model->get_all_storekeepers();

    //$data['keepers'] =  $this->Vendor_model->get_all_keepers();
    // echo "<pre>";
    // print_r($data);
    // die();
    // exit();
        $this->load->view('store_keeper',$data);
    }
    
    
    
    public function save_storekeeper(){
        
          $this->load->model('Vendor_model');
        //   $mods = $this->input->post('tags');

          $data['email'] = $this->input->post('email');
          $string=$this->input->post('phone');
          $phn = str_replace("-", "", $string);
          $data['phone'] = $phn;
          $data['full_name'] = $this->input->post('name');
          $data['address'] = $this->input->post('address');
          $data['Password'] = md5($this->input->post('s_pass'));
          $data['Password_partner'] = $this->input->post('s_pass');
        //   $modules = !empty($mods) ? implode(',', $mods) : 'xxx';
        //   $data['modules'] = $modules;
          $data['role_id'] = 5; //role id 5 is for storekeeper

           $result=$this->Vendor_model->check_team($data['email']);
           if(count($result)>0){
              $this->session->set_flashdata('error', 'OOPs You already have a account. email already exist');
               redirect('Storekeepers');
             }
             else
             {
            $this->session->set_flashdata('success', 'You have successfully registered a storekeeper! ');
    
          $this->Vendor_model->add_store_keeper_regis('users',$data);
          $email = $this->input->post('email');
          $phone = $this->input->post('phone');
          $name = $this->input->post('name');
          $role = $this->input->post('role_name');
         
          $password = $this->input->post('s_pass');
         
            $this->load->library('email');
            $config['protocol'] = 'sendmail';
          $config['mailpath'] = '/usr/sbin/sendmail';
          $config['charset'] = 'iso-8859-1';
          $config['wordwrap'] = TRUE;
          $config['mailtype'] = 'html';
          $this->email->initialize($config);
         $htmlContent = '<h1>Sending email via SMTP server</h1>';
         $htmlContent .= '<h4>Hi '.$name.'</h4>';
         $htmlContent .= '<h4>Welcome to The Logx Transport.</h4>';
         $htmlContent .= '<p>This is you to inform that You have been registered at theLogx Portal as "Store Keeper".</p>';
       
          $htmlContent .= '<p>Please Login Using the Following Credentials</p>';
          $htmlContent .= '<p>iPhone</p>';
          $htmlContent .= '<p>Link: https://apps.apple.com/us/app/l-o-g-x/id1398600417 </p>';
           $htmlContent .= '<p>Android</p>';
          $htmlContent .= '<p>Link: https://play.google.com/store/apps/details?id=com.logx.logxapp </p>';
          
          $htmlContent .= '<p>Phone:'.$phone.'</p>';
          $htmlContent .= '<p>Password:'.$password.'</p>';
          $htmlContent .= '<h4>Thanks</h4>';
        //  $this->email->to('ayesha.attique.work@gmail.com');
        
        $this->email->to($email);
         $this->email->from('admin@thelogx.com','Thelogx');
         $this->email->subject('The Logx Transport Credentials');
         $this->email->message($htmlContent);
         //Send email
         $this->email->send();
         echo $this->email->print_debugger();
           
          redirect('Storekeepers');
     }
    }
    
    
     public function update_storekeeper(){
        $response = array('success' => false);
        $vendor_id = $_POST['vendor_id'];
        // $mods =  $_POST['modules'];
        
        
        $string=$_POST['phone'];
          $phn = str_replace("-", "", $string);
          
       
        $fields = array(
            'phone' =>  $phn,
            'email' =>  $_POST['email'],
            'full_name' =>  $_POST['name'],
            'address' =>  $_POST['address'],
            'Password_partner' =>  $_POST['Password_partner'],
            // 'role_type_id' =>  $_POST['roles'],
            // 'modules' =>  $mods,
            'updated_dt' => date("Y-m-d H:i:s"),
            'updated_user' => $this->session->userdata('username'),
            'updated_terminal' => gethostname()
        );
         if($this->input->post('email') != $this->input->post('old_email'))
          $dec = $this->vendor_model->check_email($vendor_id, $this->input->post('email'));
        else
          $dec = true;
        //end check

        if($dec == true)
        {

        $where = array('id'=> $vendor_id);
        $result = $this->vendor_model->update($fields, $where);
        if($result){
            $response['success'] = true;
        }}
        else
          $response = array('success'=>false, 'msg'=>'Duplicate Email');

        echo json_encode($response);
       
    }
    
    
     public function get_storekeeper_by_id(){
        $response = array('success' => false);
        $vendor_id = $_POST['vendor_id'];
        $where = array('id'=>$vendor_id);
        $vendor = $this->vendor_model->getsss_where($where);

        if($vendor){
            $response['success'] = true;
            $response['vendor'] = $vendor;
        }

        echo json_encode($response);
    }
    
    
     
    public function RemoveSpecialChar($str) { 
      
    // Using str_replace() function  
    // to replace the word  
    $res = str_replace( array( '\'', '"', 
    ',' , ';', '<', '>' ), ' ', $str); 
      
    // Returning the result  
    return $res; 
    } 
    
    
     public function update_emails_vendor(){
        
        $response = array('success' => false);
        
        
          $mods = $this->input->post('emails');
          $id = $this->input->post('id');
          $key = $this->input->post('key');
           $emails = !empty($mods) ? implode(',', $mods) : '';
           
            $emails =trim($emails, ',');
           
        //   echo 'ans is:<br>';
        //   echo $emails;
           
        //   echo '<br> key and id are :'.$key.' :'.$id;
           
            $where = array('id'=> $id);
            
           if($key==0){
            
               $fields = array(
                  'emails_for_zero_bags' =>  $emails,
                );
                
                $result = $this->vendor_model->update($fields, $where);
           }else if($key ==1){
               
                $fields = array(
                  'emails_for_invoice' =>  $emails,
                );
                
                $result = $this->vendor_model->update($fields, $where);
               
           }else if($key ==2){
              
               $fields = array(
                  'emails_for_report' =>  $emails,
                );
                
                $result = $this->vendor_model->update($fields, $where);
           }else if($key ==3){
              
               $fields = array(
                  'mul_emails_for_mealplan' =>  $emails,
                );
                
                $result = $this->vendor_model->update($fields, $where);
           }else{
               echo json_encode($response);
               
           }

         
       
         if($result){
            $response['success']=true;
           }
       
         echo json_encode($response);
        
    }
    
    
    
    // update logo images
    
      public function update_logo_imgs(){
        
        $response = array('success' => false);
    //   print_r($this->input->post());
        
          $img_log = $this->input->post('xyza');
          $id = $this->input->post('id');
          $existing_check = $this->input->post('hid_chk');
          
    //   die();   
          
        //   IMG CODE
        
          $config['upload_path'] = './upload_vendor_logo/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']    = 0;

         // print_r($this->input->post());

          $xcheck=$this->load->library('upload', $config);
          
        //   echo 'xcheck'.$xcheck;
          
          if (!$this->upload->do_upload('xyza')){
              
            //   echo 'i do not run';
              $res['error'] = $this->upload->display_errors();
              $res['page_data'] = 'admin/upload_view';
              
               $this->session->set_flashdata('error', 'OOPs The file type you are trying to upload is not allowed. Try Again!');
            //   redirect('Partner');
              
             //   $this->load->view('new_vendor',$res);
             // print_r('i am file upload');
             
            //  print_r($res);
            //  echo false;
              $result =false;
          }else{
            //   echo 'i run';
            $data['img_log'] = "upload_vendor_logo/".$this->upload->data('file_name');
            
            
            //  $data = $this->upload->data();  
            //      $config['image_library'] = 'gd2';  
            //      $config['source_image'] = './upload/'.$data["file_name"];  
            //      $config['create_thumb'] = FALSE;  
            //      $config['maintain_ratio'] = FALSE;  
            //      $config['quality'] = '30%';  
            //      $config['width'] = 300;  
            //      $config['height'] = 300;  
            //      $config['new_image'] = './upload/'.$data["file_name"]; 
                 
            //      echo 'config is :';
            //      print_r($config);
            //      $this->load->library('image_lib', $config);  
            //      $resiz_res=$this->image_lib->resize();  
                 
            //      echo 'resiz_res:'.$resiz_res;
            //     //  $this->load->model('main_model');  
            //      $image_data = array(  
            //           'name'          =>     $data["file_name"]  
            //           );  
                //  $this->main_model->insert_image($image_data);  
                //  echo $this->main_model->fetch_image();  
            
            
            
            
            
            // print_r($image_data);
            // print_r('i am file upload else');
            
            
             $where = array('id'=> $id);
            
        
               $fields = array(
                  'partner_logo' =>  $data['img_log']
                );
                
              
                $result = $this->vendor_model->update_partner_logo($fields, $where);
               
          }
        
        // IMG CODE ENDs
       
           
           
           
           
           
           
           
        //   die();
           
         
          

         
       
         if($result){
            $response['success']=true;
            $response['result']=$result;
            $response['image_path']= base_url().$data['img_log'];
             echo json_encode($response);
           }else{
               echo json_encode($response);
           }
       
        
        
    }



}

?>