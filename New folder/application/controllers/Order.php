<?php
/**Newareas
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller
{

    /*Order Status
    =Not Assign
    =Assign
    =Ship
    =Delivered
    =Cancel
    =Return
    */

    // public function __construct(){
    //     parent::__construct();
    //      date_default_timezone_set("Asia/Dubai");
    //     $this->output->enable_profiler(false);  //this show value at your page
    //     $this->load->library('sma');
    // }
public function __construct()
    {
          parent::__construct();
           $this->load->library('sma');
           date_default_timezone_set('Asia/Dubai');
            if (empty($this->session->userdata('name')) )
        redirect(base_url('auth/index')) or exit('no direct access allowed');
    }
    public function index(){
        
        //  $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        //$where = array('o.driver_id > ' => 0);
        // if($this->session->userdata('role') == 'vendor')
        //     $where = "o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59' AND o.vendor_id = ".$this->session->userdata('u_id');
        // else if($this->session->userdata('role') == 'admin')
        //     $where = "o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        if($this->session->userdata('role') == 'vendor')
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59' AND o.vendor_id = ".$this->session->userdata('u_id');
        else
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        $data['orders'] =  $this->order_model->get_orders($where);
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('order/manage', $data);
    }
    
     public function delivries_status_AC(){
        
         $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
         
            $where = "o.action != 'Freezed' and o.action != 'Paused' and (o.status = 'Not Assign' or o.status = 'Assign'  or o.status = 'Delivered' or  o.status = 'ship') and o.delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        $data['orders'] =  $this->order_model->get_orders($where);
        // echo '<pre>';
        //  print_r($data);
       
        // print_r($this->db->last_query());
        //  die();
        $this->load->view('order/deliveries_status', $data);
    }
     public function orderCompleted(){
        
         $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
     
        $where = "o.driver_id > 0 and ( o.status = 'Delivered' or o.status='Collected') and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        //$data['orders'] =  $this->order_model->get_orders($where);
      
        //$this->load->view('order/completed',$data);
        $this->load->view('order/completed_order_table');
    }


// public function bagsTracking(){
//     $this->load->model('vendor_model');
//     $this->load->model('order_model');
//   // $userid = $this->session->userdata('user_id');
//     $status =1;
//     $where1 = array('is_deleted'=>0);
//         $data['vendors'] =  $this->vendor_model->get_where($where1);
//          $cdate = date('Y-m-d');
//         $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
//         //$where = array('o.driver_id > ' => 0);
//         $where="";
//       // if($this->session->userdata('role') == 'admin'){
//          // $where = "o.driver_id > 0 and  v.status='".$status."'  and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
//          // $data['orders'] =  $this->order_model->get_tracking_statistics($where);
        
      
//       // }else{
//             $where = "o.driver_id > 0 and v.status='".$status."'  and o.vendor_id='' and  delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
//             $data['orders'] =  $this->order_model->get_tracking_statistics($where);
             
//      //   }
//              // print_r($data);
//              // die();

//         $this->load->view('bags_tracking',$data);
//     }

public function bagsTracking(){
    $this->load->model('vendor_model');
    $this->load->model('order_model');
   $userid = $this->session->userdata('u_id');
    $status =0;
    $where1 = array('is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        //  $start_date = date('Y-m-d');
        // $end_date = date('Y-m-d', strtotime($start_date. ' + 1 days'));
        //$where = array('o.driver_id > ' => 0);
        // $where="";
    //   if($this->session->userdata('role') == 'admin'){
    //      $where = "o.driver_id > 0 and  v.status='".$status."'  and o.delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
    //      $data['orders'] =  $this->order_model->get_tracking_statistics($where);
        
      
    //   }else{
    //         $where = "o.driver_id > 0 and v.status='".$status."'  and o.vendor_id='".$userid."' and  delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
    //         $data['orders'] =  $this->order_model->get_tracking_statistics($where);
             
    //   }
    
    
 
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
        

        $where="";
    //  TAHA if($this->session->userdata('role') == 'admin'){
    if($this->session->userdata('role') != 'vendor'){
       
            $where = "o.vendor_id > 0 and o.driver_id > 0 and  v.status='".$status."'  and  o.action != 'Freezed' and o.action != 'Paused'  and o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         $data['orders'] =  $this->order_model->get_tracking_statistics($where);
       
        
      
        }else{
            $where = "o.driver_id > 0 and v.status='".$status."'  and o.vendor_id='".$userid."' and  o.action != 'Freezed' and o.action != 'Paused'  and  o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
            $data['orders'] =  $this->order_model->get_tracking_statistics($where);
             
        }
        
        $data['s_date']=$start_date;
        $data['e_date']=$end_date;
            // echo '<pre>';
            // print_r($data['orders']);
            // die();

        $this->load->view('bags_tracking',$data);
    }
    
     public function del()
    {
        $this->load->model('Order_model');
         $ids = $this->input->post('ids');
 
        $this->db->where_in('qrid', explode(",", $ids));
        $this->db->delete('qr_bags');
 
        echo json_encode(['success'=>"Item Deleted successfully."]);
  
        
    }

     public function listingQr(){
    $this->load->model('order_model');
    $userid = $this->session->userdata('u_id');
   $role = $this->session->userdata('role') == 'admin';
     
    //  echo 'test';
    //  die();
           
   $data['qrbags'] =  $this->order_model->get_qrBags();
             
        
        //   echo '<pre>';
        // print_r($data['qrbags']);
        // die();
     //   $data['orders'] =  $this->order_model->get_orders($where);
        $this->load->view('qr_codes', $data);
    }
     public function deleteQr(){
        $response = array('success' => false);
        $qr = $this->uri->segment(3);
        
      $result =  $this->order_model->deleteBag(array("qrid"=>$qr));
        
      
        if($result){
            $this->session->set_flashdata('success', 'Selected QR is Sucessfully Deleted');
        }else{
           $this->session->set_flashdata('error', 'Something gone wrong.');  
        }

       redirect('listingQr');
    }
     public function extraBags(){
        $this->load->model('order_model');
        $data['extraBags'] =  $this->order_model->get_extraBags();

    $this->load->view('extra_bags',$data);
    }
    public function get_deliveries_report_by_completed(){
        $userid = $this->session->userdata('u_id');
        $status = 0;
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];

        if(!$start_date){
            $start_date = date('Y-m-d');
        } else {
            $start_date = date('Y-m-d',strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d');
        } else {
            $end_date = date('Y-m-d',strtotime($end_date));
        }

        $where="";
    // TAHA  if($this->session->userdata('role') == 'admin'){
    if($this->session->userdata('role') != 'vendor'){
        if($vendor_id){
            $where = "o.vendor_id='".$vendor_id."' and o.driver_id > 0 and  v.status='".$status."'  and  o.action != 'Freezed' and o.action != 'Paused' and o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         $report_data =  $this->order_model->get_tracking_statistics($where);
        }else{
            $where = "o.driver_id > 0 and  v.status='".$status."' and  o.action != 'Freezed' and o.action != 'Paused' and o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         $report_data =  $this->order_model->get_tracking_statistics($where);
        }
         
        
      
        }else{
            $where = "o.driver_id > 0 and v.status='".$status."'  and o.vendor_id='".$userid."' and  o.action != 'Freezed' and o.action != 'Paused' and  o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
            $report_data =  $this->order_model->get_tracking_statistics($where);
             
        }
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }
        
        // print_r($response);
        echo json_encode($response);
    }
    public function bagTrackingDetails(){
    $this->load->model('vendor_model');
    $vender_id = $this->uri->segment(3);
    $customer_id = $this->uri->segment(4);
    // $userid = $this->session->userdata('user_id');
    $cdate = date('Y-m-d');
    $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
    
    if($this->uri->segment(5)){
       
        $cdate = date('Y-m-d', strtotime($this->uri->segment(5)));
        
    }
    
    if($this->uri->segment(6)){
       
        $next = date('Y-m-d', strtotime($this->uri->segment(6)));
        
    }
    
    
    $status =0;
    // $where1 = array('status'=> 0,'is_deleted'=>0);
        // $data['vendors'] =  $this->vendor_model->get_where($where1);
        
        //echo '<pre>';
     //   print_r($data);
        // echo 'i am user id:'.$userid;
        // echo '<br /> i am vendor id:'.$vender_id;
        // echo '<br /> i am customer id:'.$customer_id;
        // echo '<br />i am cdate:'.$cdate;
        // echo '-i am next:'.$next;
        // die();
        //$cdate = date('Y-m-d');
        //$next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
       
    //     $where="";
    //   TAHA if($this->session->userdata('role') == 'admin'){
    if($this->session->userdata('role') != 'vendor'){
          
          if($vender_id){
       
                  $where = "o.driver_id > 0 and o.action != 'Freezed' and o.action != 'Paused' and   v.status='".$status."' and (o.status='Assign' or o.status='Delivered' or o.status='Collected' or o.status='Ship') and o.cooling_bag_check !=3  and o.customer_id='".$customer_id."' and o.vendor_id='".$vender_id."' and o.delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
          }
        }else{
            
             $where = "o.driver_id > 0 and o.action != 'Freezed' and o.action != 'Paused' and  v.status='".$status."' and (o.status='Assign' or o.status='Delivered' or o.status='Collected' or o.status='Ship') and o.cooling_bag_check !=3 and o.customer_id='".$customer_id."'    and o.vendor_id='".$vender_id."' and o.delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
         
             
        }
        
         $data['orders'] =  $this->order_model->get_tracking_statistics_details($vender_id,$cdate,$next,$where);
         $data['from']=$cdate;
         $data['to']=$next;
        // echo '<pre>';
        //  print_r($data);
         
        //  die();
         $this->load->view('order/trackingDetails', $data);
    }
       public function get_bagTrackingDetails(){
        $userid = $this->session->userdata('u_id');
        $status =1;
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];
        $customer = @$_POST['customer_id'];
        if(!$start_date){
            $start_date = date('Y-m-d');
        } else {
            $start_date = date('Y-m-d', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d');
        } else {
            $end_date = date('Y-m-d', strtotime($end_date));
        }

    //     $where="";
    //   if($this->session->userdata('role') == 'admin'){
    //     if($vendor_id){
    //         $where = "o.vendor_id='".$vendor_id."' and o.customer_id='".$customer."'  and o.driver_id > 0 and  v.status='".$status."'  and delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
    //      $report_data =  $this->order_model->get_orders2($where);
    //     }else{
    //         $where = "o.driver_id > 0 and o.customer_id='".$customer."'  and  v.status='".$status."'  and delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
    //      $report_data =  $this->order_model->get_orders2($where);
    //     }
         
        
      
    //     }else{
    //         $where = "o.driver_id > 0 and o.customer_id='".$customer."'  and v.status='".$status."'  and o.vendor_id='".$userid."' and  delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
    //         $report_data =  $this->order_model->get_orders2($where);
             
    //     }
    //     if($report_data['result']){
    //         $response['success'] = true;
    //         $response['report_data'] = $report_data;
    //     }
        $where1 = array('status'=> 0,'is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        $data['orders'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date);
        echo json_encode($data);
    } 
    public function upload()
    {
        $this->load->model('driver_model');
        $status =1;
        //$where1 = array('status'=> 1,'is_deleted'=>0);
        $where1 = array('is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        //$data['dtypes'] = $this->vendor_model->get_data('delivery_type');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        $data['areas'] = $this->order_model->get_areas();
        $this->load->view('order/upload_file_old', $data);
    }

    public function upload_deliveries_by_feeds_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'order');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
            $this->load->view('order/upload_file', $data);
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
            $data['vendors'] =  $this->vendor_model->get_where(array());
            $this->load->view('order/temp_order', $data);
        }
    }

    public function upload_deliveries_by_general_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'g_deliveries');

        if ( ! $file_name)
        {
            $where1 = array('status'=> 1,'is_deleted'=>0);
            $data['vendors'] =  $this->vendor_model->get_where($where1);
            $data['error'] = 'not upload';
            //$this->load->view('order/upload_file', $data);
            $this->load->view('order/upload_file_old', $data);
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
                  //  if($data[1] && $data[3] && $data[4]) {
                    if($data[0]!="" or $data[0]!=" "){
                        $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data[0]))));
                        }
                      //  $where = array('phone' => $phone, 'role_id' => 4);
                       // $customer = $this->customer_model->get_where($where);
                        $customer_id = 0;
                      /*  if (count($customer) > 0) {
                            $customer_id = intval($customer[0]->id);
                        } */
                       

                        $temp = (object)array('customer_id' => $customer_id, 'full_name' => trim($data[1]), 'phone' => $phone, 'address' => trim(str_replace("'","",$data[2])),'pickUp' => trim($data[3]), 'delivery_time' => $data[4], 'note' => $data[5]);
                        
                        array_push($file_data, $temp);
                  //  }
                }

                fclose($handle);
            }
         $this->session->set_userdata("file_data",$file_data);
            $data['file_data'] =  $this->session->userdata("file_data");
            $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
           // $data['vendors'] =  $this->vendor_model->get_where(array());
            $where = array('status' => 1);
            $data["vendor_id"] = $this->input->post('vendor_id');
            $data['types'] =  $this->order_model->get_deliveries_type_where($where);
             $where1 = array('status'=> 1,'is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
       
            $this->load->view('order/temp_order', $data);
        }
         
    }

//This is old when no empty filed validation was not required comment on 07/02/2020 by coco
// Taha update minor changes according to live
    // public function upload_deliveries_by_general_file_new_old_demo(){
    //     $this->load->model('driver_model');
    //     require 'vendor/autoload.php';
    //     $file_data = array();

    //     $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'g_deliveries');

    //     if ( ! $file_name)
    //     {
    //         $where1 = array('status'=> 1,'is_deleted'=>0);
    //         $data['vendors'] =  $this->vendor_model->get_where($where1);
    //         $data['error'] = 'not upload';
    //         //$this->load->view('order/upload_file', $data);
    //         $this->load->view('order/upload_file_old', $data);
    //     }
    //     else
    //     {
            
    //         //$file = base_url().'upload/'.$file_name;
    //         $file_name = "upload/".$file_name;
    //         $sheetIndex = 0;
    //         $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
    //         $reader->setReadDataOnly(TRUE);
    //         $sheetnames = $reader->listWorksheetNames($file_name);
    //         $reader->setLoadSheetsOnly($sheetnames[$sheetIndex]);
    //         $spreadsheet = $reader->load($file_name);
    //         $namedDataArray = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    //         //print_r($namedDataArray);
    //                 foreach($namedDataArray AS $ii=>$data){
                        
    //                 //Used to skip 1st row
    //                 if($ii == 1 OR $data['A'] == '' OR $data['C'] == '' OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == '') { continue; }
    //                 $phone = $data['A'];
    //               //  if($data[1] && $data[3] && $data[4]) {
    //                 if($data['A']!="" or $data['A']!=" "){
    //                     $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
    //                     }
                        
    //                     // if($data['C']!="" or $data['C']!=" "){
    //                     // $address = str_replace("'","",$data['C']);
    //                     // $address =htmlspecialchars($address);
    //                     // }
    //                   //  $where = array('phone' => $phone, 'role_id' => 4);
    //                   // $customer = $this->customer_model->get_where($where);
    //                     $customer_id = 0;
    //                     /*if (count($customer) > 0) {
    //                         $customer_id = intval($customer[0]->id);
    //                     } */    
                        
    //                     if($data['C']!="" or $data['C']!=" "){ 
    //                           $ext=$data['C'];
    //                         //   echo '<br>';
    //                         //   echo 'i was the old'.$ext;
    //                           $stringpo=strpos( $data['C'], "" );
    //                           $stringpo +=1;
    //                           $address = substr_replace($ext," ",$stringpo,1);
    //                         //   echo 'Sresult:'.$address;
    //                           $stringpa=strpos( $data['C'], "'" );
    //                           $address = substr_replace($ext," ",$stringpa,1);
    //                         //   echo '<br>Final: ';
    //                         //   echo $address;
                               
    //                         //   echo '<br>';
    //                             //  $address=str_replace("\"," ",$data["C"]);
    //                              $address=str_replace("'","XX",$data["C"]);
    //                              $address =htmlspecialchars($address);
    //                              $address=trim(preg_replace('!\s+!', ' ',str_replace("'","",$data['C'].', '.$data['D'])));
                               
                                 
    //                          }else{
    //                              $address=trim(preg_replace('!\s+!', ' ',str_replace("'","", ', '.$data['D'])));
    //                          }
    //                     $temp = (object)array('customer_id' => $customer_id, 'full_name' => trim(preg_replace('!\s+!', ' ', $data['B'])), 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' =>$address ,'pickUp' => trim(preg_replace('!\s+!', ' ',$data['E'])), 'delivery_time' => $data['F'], 'note' => preg_replace('!\s+!', ' ',$data['G']), 'food_type' => preg_replace('!\s+!', ' ',$data['I']), 'notification' => preg_replace('!\s+!', ' ',$data['H']));
                        
    //                     array_push($file_data, $temp);
    //               //  }
    //             }
    //             // echo '<pre>';
    //             // print_r($file_data); die();
                
    //         }
    //      $this->session->set_userdata("file_data",$file_data);
    //         $data['file_data'] =  $this->session->userdata("file_data");
    //         $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
    //       // $data['vendors'] =  $this->vendor_model->get_where(array());
    //         $where = array('status' => 1);
    //         $data["vendor_id"] = $this->input->post('vendor_id');
    //          $data['types'] =  $this->order_model->get_deliveries_type_where($where);
    //         //  $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
    //         //  $data['types']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
            
    //          $where1 = array('status'=> 1,'is_deleted'=>0);
    //     $data['vendors'] =  $this->vendor_model->get_where($where1);
    //     // echo '<pre>';
    //     // print_r($data);
    //     // die();
       
    //         $this->load->view('order/temp_order', $data);
    //     //}
         
    // }
    
    
    //   public function upload_deliveries_by_general_file_new_old_at_1_jan_2021(){
    //     $this->load->model('driver_model');
    //     require 'vendor/autoload.php';
    //     $file_data = array();

    //     $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'g_deliveries');

    //     if ( ! $file_name)
    //     {
    //         $where1 = array('status'=> 1,'is_deleted'=>0);
    //         $data['vendors'] =  $this->vendor_model->get_where($where1);
    //         $data['error'] = 'not upload';
    //         //$this->load->view('order/upload_file', $data);
    //         $this->load->view('order/upload_file_old', $data);
    //     }
    //     else
    //     {
            
    //         //$file = base_url().'upload/'.$file_name;
    //         $file_name = "upload/".$file_name;
    //         $sheetIndex = 0;
    //         $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
    //         $reader->setReadDataOnly(TRUE);
    //         $sheetnames = $reader->listWorksheetNames($file_name);
    //         $reader->setLoadSheetsOnly($sheetnames[$sheetIndex]);
    //         $spreadsheet = $reader->load($file_name);
    //         $namedDataArray = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    //         //print_r($namedDataArray);
    //                 foreach($namedDataArray AS $ii=>$data){
                        
    //                 //Used to skip 1st row
    //                 if($ii == 1 OR $data['A'] == '' OR $data['C'] == '' OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == '') { continue; }
    //                 $phone = $data['A'];
    //               //  if($data[1] && $data[3] && $data[4]) {
    //                 if($data['A']!="" or $data['A']!=" "){
    //                     $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
    //                     }
    //                   //  $where = array('phone' => $phone, 'role_id' => 4);
    //                   // $customer = $this->customer_model->get_where($where);
    //                     $customer_id = 0;
    //                     /*if (count($customer) > 0) {
    //                         $customer_id = intval($customer[0]->id);
    //                     } */

    //                     $temp = (object)array('customer_id' => $customer_id, 'full_name' => trim(preg_replace('!\s+!', ' ', $data['B'])), 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => trim(preg_replace('!\s+!', ' ',str_replace("'","",$data['C'].', '.$data['D']))),'pickUp' => trim(preg_replace('!\s+!', ' ',$data['E'])), 'delivery_time' => $data['F'], 'note' => preg_replace('!\s+!', ' ',$data['G']), 'food_type' => preg_replace('!\s+!', ' ',$data['I']), 'notification' => preg_replace('!\s+!', ' ',$data['H']));
                        
    //                     array_push($file_data, $temp);
    //               //  }
    //             }
    //             // echo '<pre>';
    //             // print_r($file_data); die();
                
    //         }
    //      $this->session->set_userdata("file_data",$file_data);
    //         $data['file_data'] =  $this->session->userdata("file_data");
    //         $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
    //       // $data['vendors'] =  $this->vendor_model->get_where(array());
    //         $where = array('status' => 1);
    //         $data["vendor_id"] = $this->input->post('vendor_id');
    //          $data['types'] =  $this->order_model->get_deliveries_type_where($where);
    //         //  $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
    //         //  $data['types']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
            
    //          $where1 = array('status'=> 1,'is_deleted'=>0);
    //     $data['vendors'] =  $this->vendor_model->get_where($where1);
    //     // echo '<pre>';
    //     // print_r($data);
    //     // die();
       
    //         $this->load->view('order/temp_order', $data);
    //     //}
         
    // }
    
    
    
    public function upload_deliveries_by_general_file_new(){
        $this->load->model('driver_model');
        require 'vendor/autoload.php';
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'g_deliveries');

        if ( ! $file_name)
        {
            $where1 = array('status'=> 1,'is_deleted'=>0);
            $data['vendors'] =  $this->vendor_model->get_where($where1);
            $data['error'] = 'not upload';
            //$this->load->view('order/upload_file', $data);
            $this->load->view('order/upload_file_old', $data);
        }
        else
        {
            
            //$file = base_url().'upload/'.$file_name;
            $file_name = "upload/".$file_name;
            $sheetIndex = 0;
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(TRUE);
            $sheetnames = $reader->listWorksheetNames($file_name);
            $reader->setLoadSheetsOnly($sheetnames[$sheetIndex]);
            $spreadsheet = $reader->load($file_name);
            $namedDataArray = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            //print_r($namedDataArray);
                    foreach($namedDataArray AS $ii=>$data){
                        
                    //Used to skip 1st row
                    //OR $data['I'] == '' OR $data['J'] == '' OR $data['K'] == ''
                    
                    if($ii == 1 OR $data['A'] == '' OR $data['C'] == '' OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == ''  ) { continue; }
                    $phone = $data['A'];
                  //  if($data[1] && $data[3] && $data[4]) {
                    if($data['A']!="" or $data['A']!=" "){
                        $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
                        }
                      //  $where = array('phone' => $phone, 'role_id' => 4);
                      // $customer = $this->customer_model->get_where($where);
                        $customer_id = 0;
                        /*if (count($customer) > 0) {
                            $customer_id = intval($customer[0]->id);
                        } */
                             
                             
                            //  echo '<br> data is : ';
                            //  print_r($data);
                             
                             
                            //  ****************************************
                              
                              $amm=0;
                              $company_note="";
                              $google_addr="";
                              $google_link = array("google_link"=>"None");
                            
                            //  uncomment below and remove above
                            
                            
                         $amm = trim(preg_replace('!\s+!', ' ', $data['J']));
                         
                         
                         $company_note=str_replace("!","",$data['K']);
                         $company_note=trim(preg_replace('!\s+!', ' ', str_replace("'","",$company_note)));
                         
                         
                          if($amm =='' OR $amm ==0 OR $amm==' '){
                             
                                  $amm=0;
                               
                          }
                          
                          $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$data['L'])));
                          
                          
                          
                          $google_addr=str_replace("ʹ","", $google_addr);
                          
                         
                          
                           $google_addr=str_replace('"','', $google_addr);
                           
                            // echo '<br>'.$google_addr;
                          
                          
                          if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                              
                            //   echo '<br> i am inside if address is empty '.$google_addr;
                                  $google_link = array("google_link"=>"None");
                                    
                                    $google_link_jsn = json_encode($google_link);
                                //   $google_addr="None";
                               
                          }else{
                              
                            //   echo '<br> i am inside else when address is not  empty '.$google_addr;
                              $google_link = array("google_link"=>$google_addr);
                              $google_link_jsn = json_encode($google_link);
                          }
                          
                        //   echo '<br> before if : i am comapny note: '.$company_note;
                          
                        //   if($company_note =="" OR $company_note ==0 ){
                             
                        //           $company_note="testttttt";
                               
                        //   }
                         
                         
                         
                        //  *******************************************
                        //  echo '<br>i am ammount: '.$amm;
                        //  echo '<br> After if : i am comapny note: '.$company_note;
                        // die();
                        
                        // VALIDATIONS to remove ' and ʹ and ! 
                        
                           
                           $f_name=trim(preg_replace('!\s+!', ' ', $data['B']));
                           $f_name=str_replace("ʹ","", $f_name);
                        //   $f_name=preg_replace('/[^A-Za-z0-9\-]/', '', $f_name);
                           
                        //   $C=preg_replace('/[^A-Za-z0-9- \-]/', '-', $data['C']);
                        //   $D=preg_replace('/[^A-Za-z0-9- \-]/', '-', $data['D']);
                           
                           $addr= trim(preg_replace('!\s+!', ' ',str_replace("'","",$data['C'].', '.$data['D'])));
                           $addr=str_replace("ʹ","", $addr);
                            $addr=str_replace("ʻ","", $addr);
                            $addr=str_replace("’","", $addr);
                           
                            $addr=str_replace(" ‏","", $addr);
                           $addr=str_replace("‏","", $addr);
                           
                           
                           $pic_up=trim(preg_replace('!\s+!', ' ',$data['E']));
                           $pic_up=str_replace("ʹ","", $pic_up);
                        //   $pic_up=preg_replace('/[^A-Za-z0-9\-]/', '',  $pic_up);
                           
                           $notes=preg_replace('!\s+!', ' ',$data['G']);
                           $notes=str_replace("ʹ","", $notes);
                            $notes=str_replace("’","", $notes);
                             $notes=str_replace("'","", $notes);
                        //   $notes=preg_replace('/[^A-Za-z0-9\-]/', '',  $notes);
                           
                           $food_t=preg_replace('!\s+!', ' ',$data['I']);
                           $food_t=str_replace("ʹ","", $food_t);
                        //   $food_t=preg_replace('/[^A-Za-z0-9\-]/', '',  $food_t);
                        
                        
                      
                        // **************************************
                        
                         
                        $temp = (object)array('customer_id' => $customer_id, 'full_name' => $f_name, 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => $addr,'pickUp' => $pic_up, 'delivery_time' => $data['F'], 'note' => $notes, 'food_type' => $food_t, 'notification' => preg_replace('!\s+!', ' ',$data['H']),'Delivery_Amount' =>$amm,'Company_Note'=>$company_note,'google_link_addrs'=>$google_link_jsn);
                        
                        array_push($file_data, $temp);
                  //  }
                }
                // echo '<pre>';
                // print_r($file_data); die();
                
            }
            
            // echo '<pre> below is file data';
            //     print_r($file_data);
                
            //     echo '<br> jsondecode <br> <pre>';
                
            //     $xtra= json_decode($google_link_jsn);
                
            //     print_r($xtra);
            //      echo '<br> accessing <br> <pre>';
            //     echo $xtra->google_link;
            //  die();
            
            
         $this->session->set_userdata("file_data",$file_data);
            $data['file_data'] =  $this->session->userdata("file_data");
            $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
          // $data['vendors'] =  $this->vendor_model->get_where(array());
            $where = array('status' => 1);
            $data["vendor_id"] = $this->input->post('vendor_id');
             $data['types'] =  $this->order_model->get_deliveries_type_where($where);
            //  $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
            //  $data['types']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
            
             $where1 = array('status'=> 1,'is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        // echo '<pre>';
        // print_r($data);
        // die();
       
            $this->load->view('order/temp_order', $data);
        //}
         
    }

    
    
    //Excel upload deliv with validation of no empty field
    
//      public function upload_deliveries_by_general_file_new(){
//         require 'vendor/autoload.php';
//         $file_data = array();

//         $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'g_deliveries');

//         if ( ! $file_name)
//         {
//             $where1 = array('status'=> 1,'is_deleted'=>0);
//             $data['vendors'] =  $this->vendor_model->get_where($where1);
//             $data['error'] = 'not upload';
//             //$this->load->view('order/upload_file', $data);
//             $this->load->view('order/upload_file_old', $data);
//         }
//         else
//         {
            
//             //$file = base_url().'upload/'.$file_name;
//             $file_name = "upload/".$file_name;
//             $sheetIndex = 0;
//             $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
//             $reader->setReadDataOnly(TRUE);
//             $sheetnames = $reader->listWorksheetNames($file_name);
//             $reader->setLoadSheetsOnly($sheetnames[$sheetIndex]);
//             $spreadsheet = $reader->load($file_name);
//             $namedDataArray = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

//             unset($namedDataArray[1]);
//             $namedDataArray = array_values($namedDataArray);
//             $result = [];

//             $empty = 'no';

//             foreach($namedDataArray AS $ii=>$data) {
//                 if ($data['A'] == '' OR $data['B'] == '' OR $data['C'] == '' OR $data['D'] == ''
//                     OR $data['E'] == '' OR $data['F'] == '' OR $data['G'] == '' OR $data['H'] == '') {
//                     $empty = 'yes';
//                 } else {
//                     $empty = 'no';
//                 }
//                 if ($empty== 'yes'){
//                     break;
//                 }
//             }


//             foreach($namedDataArray AS $ii=>$data){

//                 $result[] = (object)[
//                               'full_name' => trim(($data['B'] == '' ? '<span style="color: red">Name Required</span>' : $data['B'])),
//                               'phone' => trim(($data['A'] == '' ? '<span style="color: red">Phone Required</span>' : $data['A'])),
//                               'address' => trim(($data['C'] == '' ? '<span style="color: red">Address Required</span>' : $data['C'])).''.trim(($data['D'] == '' ? '<span style="color: red">Area Required</span>' : $data['D'])),
//                               'pickUp' => trim(($data['E'] == '' ? '<span style="color: red">PickUp Required</span>' : $data['E'])),
//                               'delivery_time' => $data['F'] == '' ? '<span style="color: red">Time Required</span>' : $data['F'],
//                               'note' => $data['G'] == '' ? '<span style="color: red">Notes Required</span>' : $data['G'],
//                               'notification' => $data['H'] == '' ? '<span style="color: red">Notification Required</span>' : $data['H']
//                           ];

//             }

//             $data['result'] = $result;

//             $data['status'] = $empty;
//             if ($empty == 'yes'){

//                 $this->load->view('order/tempp_order', $data);
//             } else{
//                 foreach($namedDataArray AS $ii=>$data){

//                     //Used to skip 1st row
// //                    if($ii == 1 OR $data['A'] == ''
// //                        OR $data['C'] == ''
// //                        OR $data['D'] == ''
// //                        OR $data['F'] == ''
// //                        OR $data['H'] == '')
// //                    { continue; }
//                     $phone = $data['A'];
//                     //  if($data[1] && $data[3] && $data[4]) {
//                     if($data['A']!="" or $data['A']!=" "){
//                         $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
//                     }

//                     //  $where = array('phone' => $phone, 'role_id' => 4);
//                     // $customer = $this->customer_model->get_where($where);
//                     $customer_id = 0;
//                     /*if (count($customer) > 0) {
//                         $customer_id = intval($customer[0]->id);
//                     } */

//                     if (trim($data['C']) == ''){
//                         $data['address']='empty_address';
//                     }else{
//                         $data['address']='';
//                     }
//                     if (trim($data['D']) == ''){
//                         $data['area']='empty_area';
//                     } else{
//                         $data['area']='';
//                     }

//                     $temp = (object)array(
//                         'customer_id' => $customer_id,
//                         'full_name' => trim(preg_replace('!\s+!', ' ', $data['B'])),
//                         'phone' => preg_replace('!\s+!', ' ',$phone),
//                         'address' => trim(preg_replace('!\s+!', ' ',str_replace("'","",$data['C'].', '.$data['D']))),
//                         'pickUp' => trim(preg_replace('!\s+!', ' ',$data['E'])),
//                         'delivery_time' => $data['F'], 'note' => preg_replace('!\s+!', ' ',$data['G']),
//                         'food_type' => preg_replace('!\s+!', ' ',$data['I']),
//                         'notification' => preg_replace('!\s+!', ' ',$data['H']));

//                     array_push($file_data, $temp);
//                     //  }
//                 }

//                 // echo '<pre>';
//                 // print_r($file_data); die();
//                 $this->session->set_userdata("file_data",$file_data);
//                 $data['file_data'] =  $this->session->userdata("file_data");
//                 $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
//                 // $data['vendors'] =  $this->vendor_model->get_where(array());
//                 $where = array('status' => 1);
//                 $data["vendor_id"] = $this->input->post('vendor_id');
//                 $data['types'] =  $this->order_model->get_deliveries_type_where($where);
//                 $where1 = array('status'=> 1,'is_deleted'=>0);
//                 $data['vendors'] =  $this->vendor_model->get_where($where1);
//                 $data['status'] =  $empty;
//                 $this->load->view('order/temp_order', $data);
//                 }
//             }
         
//     }

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
    
    // comment for test 06 aug 2020
//  public function save_order_del(){
//         $response = array('success' => false);

//         $deliveries =  $this->session->userdata("deliveries_data");
//         // echo 'i am deliv userdata session:';
        
        
//         // echo '<pre>';
//         // print_r($deliveries);
        
       
       
//         $vendor_id = $this->session->userdata("vendor_id");
//         // echo 'vendor_id :'.$vendor_id ;
//      //   $type_id = $_POST['type_id'];
//         $signature = $this->input->post('signature');
       
        
//         $delivery_date = date('Y-m-d H:i:sa', strtotime($this->input->post('delivery_date')));
//         $dt=$this->input->post('delivery_date');
     

//         if(count($deliveries) > 0){
//           $counter=0;
//           foreach ($deliveries as $key => $myorder) {
//           $customer_id = $myorder->customer_id;
           
//         //   echo '<br> customer_id';
//         //   echo $customer_id;
// $counter++;

                
//                 //   $notif_data=array(
//                 //       'send_notification' => $myorder->notification
//                 //       );
//                 //     $notif_whr=$customer_id;
                
//          // To get area id by name code start
                
//                   $area_str=$myorder->address;
//                 //   echo '<br>before new change:'.$area_str;
//                 $area_str = preg_replace("/'/", '',$area_str);
//                   $area_str=str_replace("'","","$area_str");
//                   echo '<br>After new change:'.$area_str;
//                       $area_arr=explode(",",$area_str);
//                       $indx= count($area_arr)-1;
//                       $Aname=$area_arr[$indx];
//                       $Aname=ltrim($Aname," ");
//                         $Aname=rtrim($Aname," ");
//                         echo '<br> Area Name';
//                         echo $Aname;
//                 $areaID=$this->order_model->getareaID_withName($Aname);
                
//                 echo '<br> Area ID';
//                         echo $areaID;
//                 $response['areaID'] = $areaID;
                      
//         // To get area id by name code END
                
                
//         // To get Emirate and slot id by name code start
//                     $string_emirate=$myorder->delivery_time;
//                     $emirate_arr=explode(",",$string_emirate);
//                     $eid=$emirate_arr[0];
//                     //echo $eid;
//                      echo '<br> Emirate string :';
//                         echo $eid;
//                 $emirateID=$this->order_model->getemirateID_withName($eid);
//                  echo '<br> Emirate ID';
//                         echo 'Emi ID is:'.$emirateID.' : in bettwen emirate id should place.';
//                 $response['emirateID'] = $emirateID;
//                     $sid=$emirate_arr[1];
//                     echo 'sid :'.$sid;
//                 $slot_ID=$this->order_model->gettimeslotID_withName($sid);
//                 $response['slot_ID'] = $slot_ID;
//                 echo 'i am slot id:'.$slot_ID;
//          // To get emirate id by name code END
         
//          //Service Type
//          $service_typ = 2;
         
//          // Track partner price start
         
//          $ans=$this->order_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
//           echo '<br> Ans';
//                         echo $ans[0]->ans;
       
//                             if($ans[0]->ans == 'no'){
                               
//                                     if($ans[0]->price==''){
//                                         $p_price=0;
//                                         $discount_track = '';
//                                     }else{
//                                      $p_price=$ans[0]->price;
//                                      $discount_track = '';
//                                     }
                                    
//                                      echo '<br> p_price';
//                                     echo $p_price;
//                                       echo '<br> discount_track';
//                                     echo $discount_track;
//                             }else{
//                                 if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
//                                 $p_price=0;
//                                 else
//                                 $p_price=$ans[0]->same_loc_price;
                                
//                               $discount_track =$ans[1]->ids;
                               
//                               $base_discount_tracker=$ans[1]->ids;
//                                 $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
//                                 $field['discount_track']='0';
                                
//                                  echo '<br> p_price';
//                                     echo $p_price;
//                                       echo '<br> discount_track';
//                                     echo $discount_track;
                                    
//                                 $ansss=$this->order_model->update($field, $where_tracker);
                                
//                                  echo '<br> ABOVE anss';
//                                     echo $ansss;
                                     
//                                 $response['ansss']=$ansss;
                                
//                             }
         
//         //  print_r($ans);
//         //  die();
         
//          $send_noti_new_check=$myorder->notification;
//          if($send_noti_new_check =='yes' OR $send_noti_new_check =='YES'){
//              $send_noti_new_check='Yes';
//          }
//          //Track partner price end
                
//               $filter_addr=str_replace("'","","$myorder->address");
//                     $order_data = array(
//                         'send_notification' => $send_noti_new_check,
//                         'status' =>  'Not Assign',
//                         'name_on_delivery' =>  $myorder->full_name,
//                         'number_on_delivery' =>  $myorder->phone,
//                         'customer_id' => $customer_id,
//                         'vendor_id' =>  $vendor_id,
//                     //    'type_id' =>  $type_id,
                     
//                         'signature' =>  $signature,
//                         //'delivery_date' => date('Y-m-d', strtotime('+'.delivery_hours.' hours')),
//                         'delivery_date' => $delivery_date,
//                         'delivery_address' =>  $filter_addr,
//                         'pickUp' => $myorder->pickUp,
//                         'delivery_time' =>  $myorder->delivery_time,
//                         //'note' =>  $deliveries[$i]['note'],
//                         'note' => $myorder->note,
//                         'created' => date("Y-m-d H:i:s"),
//                         'created_user' => $this->session->userdata('email'),
//                         'updated_user' => $this->session->userdata('email'),
//                         'created_terminal' => gethostname(),
//                         'updated_terminal' => gethostname(),
//                         'food_type' => $myorder->food_type,
//                         'service_type_id' => $service_typ,
//                         'areaID' => $areaID,
//                         'emirateID' => $emirateID,
//                         'slotID' => $slot_ID,
//                         'partner_price' => $p_price,
//                         'discount_track' =>$discount_track
                        
//                     );

//                     //save order service type id is initialy 2 to make all delivery with basic service (from tbl_service_Type)
//                     $result = $this->order_model->add($order_data);
                    
//                     echo '<br>';
//                      echo 'Result of insert order';
//                                     echo $result;
                                      
//                     //  echo '<hr>';
//                     //  $notif_update=$this->order_model->notific_update($notif_data, $notif_whr);
//                     //  if($notif_update){
//                     //      $abc['respi']=true;
//                     //      $abc['vend'] = $vendor_id;
//                     //       $abc['nam'] = $myorder->full_name;
//                     //  }

//                 if($result){
//                       $response['success'] = true;
//                       $response['vendor_id'] = $vendor_id;
//                      $name = $myorder->full_name;
//                      $response['checkkkk']=$send_noti_new_check;
                    
//                     $this->session->set_flashdata("success","Data is saved Successfully in un assigned Deliveries.");
//                 }

//             }

//         }else{
//             echo "Please try again after 1 minute, something is wrong";
//         }

      
//         $this->session->unset_userdata("deliveries_data");
//          $this->session->unset_userdata("file_data");
//       $this->session->unset_userdata("vendor_id");
    
//       if($this->uri->segment(3) and $this->uri->segment(3)=="vendor"){
//         $vendorC = $this->session->userdata('email');
//          $msg = "Hi Admin,<br/><br/>
//             New Deliveries are added to the system by the vendor ".$vendorC.".<br/><br/>
//             Regards, <br/><br/>

//             TEAM L O G X<br/>";
//              $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'New Deliveries Added', 'identification'=>'LOGX');
//                 send_email($param);
        
        
//       }
        
//         echo json_encode($response);   
// //echo json_encode($deliveries);
//     //  echo json_encode($abc);
      
//     }

// Taha (update it with minor changes according to live code)
// public function save_order_del_old_demo(){
//         $response = array('success' => false);

//         $deliveries =  $this->session->userdata("deliveries_data");
//         // echo 'i am deliv userdata session:';
//         // echo '<pre>';
//         // print_r($deliveries);
        
       
       
//         $vendor_id = $this->session->userdata("vendor_id");
//      //   $type_id = $_POST['type_id'];
//         $signature = $this->input->post('signature');
       
        
//         $delivery_date = date('Y-m-d H:i:sa', strtotime($this->input->post('delivery_date')));
//         $dt=$this->input->post('delivery_date');
     

//         if(count($deliveries) > 0){
//           $counter=0;
//           foreach ($deliveries as $key => $myorder) {
//           $customer_id = $myorder->customer_id;
// $counter++;

                
//                 //   $notif_data=array(
//                 //       'send_notification' => $myorder->notification
//                 //       );
//                 //     $notif_whr=$customer_id;
                
//          // To get area id by name code start
                
//                   $area_str=$myorder->address;
//                       $area_arr=explode(",",$area_str);
//                       $indx= count($area_arr)-1;
//                       $Aname=$area_arr[$indx];
//                       $Aname=ltrim($Aname," ");
//                         $Aname=rtrim($Aname," ");
//                 $areaID=$this->order_model->getareaID_withName($Aname);
//                 $response['areaID'] = $areaID;
                      
//         // To get area id by name code END
                
                
//         // To get Emirate and slot id by name code start
//                     $string_emirate=$myorder->delivery_time;
//                     $emirate_arr=explode(",",$string_emirate);
//                     $eid=$emirate_arr[0];
//                     //echo $eid;
//                 $emirateID=$this->order_model->getemirateID_withName($eid);
//                 $response['emirateID'] = $emirateID;
//                     $sid=$emirate_arr[1];
//                     //echo $sid;
//                 $slot_ID=$this->order_model->gettimeslotID_withName($sid);
//                 $response['slot_ID'] = $slot_ID;
                
//          // To get emirate id by name code END
         
//          //Service Type
//          $service_typ = 2;
         
//          // Track partner price start
         
//          $ans=$this->order_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
//                             if($ans[0]->ans == 'no'){
                               
//                                     if($ans[0]->price==''){
//                                         $p_price=0;
//                                         $discount_track = '';
//                                     }else{
//                                      $p_price=$ans[0]->price;
//                                      $discount_track = '';
//                                     }
//                             }else{
//                                 if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
//                                 $p_price=0;
//                                 else
//                                 $p_price=$ans[0]->same_loc_price;
                                
//                                 // $p_price=$ans[0]->same_loc_price;
//                               $discount_track =$ans[1]->ids;
                               
//                               $base_discount_tracker=$ans[1]->ids;
//                                 $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
//                                 $field['discount_track']='0';
//                                 $ansss=$this->order_model->update($field, $where_tracker);
//                                 $response['ansss']=$ansss;
                                
//                             }
         
//         //  print_r($ans);
//         //  die();
         
         
//          //Track partner price end
//                  $send_noti_new_check=$myorder->notification;
//          if($send_noti_new_check =='yes' OR $send_noti_new_check =='YES'){
//              $send_noti_new_check='Yes';
//          }
              
//                     $order_data = array(
//                         'send_notification' => $send_noti_new_check,
//                         'status' =>  'Not Assign',
//                         'name_on_delivery' =>  $myorder->full_name,
//                         'number_on_delivery' =>  $myorder->phone,
//                         'customer_id' => $customer_id,
//                         'vendor_id' =>  $vendor_id,
//                     //    'type_id' =>  $type_id,
                     
//                         'signature' =>  $signature,
//                         //'delivery_date' => date('Y-m-d', strtotime('+'.delivery_hours.' hours')),
//                         'delivery_date' => $delivery_date,
//                         'delivery_address' =>  $myorder->address,
//                         'pickUp' => $myorder->pickUp,
//                         'delivery_time' =>  $myorder->delivery_time,
//                         //'note' =>  $deliveries[$i]['note'],
//                         'note' => $myorder->note,
//                         'created' => date("Y-m-d H:i:s"),
//                         'created_user' => $this->session->userdata('email'),
//                         'updated_user' => $this->session->userdata('email'),
//                         'created_terminal' => gethostname(),
//                         'updated_terminal' => gethostname(),
//                         'food_type' => $myorder->food_type,
//                         'service_type_id' => $service_typ,
//                         'areaID' => $areaID,
//                         'emirateID' => $emirateID,
//                         'slotID' => $slot_ID,
//                         'partner_price' => $p_price,
//                         'discount_track' =>$discount_track
                        
//                     );

//                     //save order service type id is initialy 2 to make all delivery with basic service (from tbl_service_Type)
//                     $result = $this->order_model->add($order_data);
                   
//                     //  $notif_update=$this->order_model->notific_update($notif_data, $notif_whr);
//                     //  if($notif_update){
//                     //      $abc['respi']=true;
//                     //      $abc['vend'] = $vendor_id;
//                     //       $abc['nam'] = $myorder->full_name;
//                     //  }

//                 if($result){
//                       $response['success'] = true;
//                       $response['vendor_id'] = $vendor_id;
//                      $name = $myorder->full_name;
                  
//                     $this->session->set_flashdata("success","Data is saved Successfully in un assigned Deliveries.");
//                 }

//             }

//         }else{
//             echo "Please try again after 1 minute, something is wrong";
//         }

      
//         $this->session->unset_userdata("deliveries_data");
//          $this->session->unset_userdata("file_data");
//       $this->session->unset_userdata("vendor_id");
    
//       if($this->uri->segment(3) and $this->uri->segment(3)=="vendor"){
//         $vendorC = $this->session->userdata('email');
//          $msg = "Hi Admin,<br/><br/>
//             New Deliveries are added to the system by the vendor ".$vendorC.".<br/><br/>
//             Regards, <br/><br/>

//             TEAM L O G X<br/>";
//              $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'New Deliveries Added', 'identification'=>'LOGX');
//                 send_email($param);
        
        
//       }
        
//         echo json_encode($response);   
// //echo json_encode($deliveries);
//     //  echo json_encode($abc);
      
//     }


// public function save_order_del_old_at_1_jan_2021(){
//         $response = array('success' => false);

//         $deliveries =  $this->session->userdata("deliveries_data");
//         // echo 'i am deliv userdata session:';
//         // echo '<pre>';
//         // print_r($deliveries);
        
       
       
//         $vendor_id = $this->session->userdata("vendor_id");
//      //   $type_id = $_POST['type_id'];
//         $signature = $this->input->post('signature');
       
        
//         $delivery_date = date('Y-m-d H:i:sa', strtotime($this->input->post('delivery_date')));
//         $dt=$this->input->post('delivery_date');
     

//         if(count($deliveries) > 0){
//           $counter=0;
//           foreach ($deliveries as $key => $myorder) {
//           $customer_id = $myorder->customer_id;
// $counter++;

                
//                 //   $notif_data=array(
//                 //       'send_notification' => $myorder->notification
//                 //       );
//                 //     $notif_whr=$customer_id;
                
//          // To get area id by name code start
                
//                   $area_str=$myorder->address;
//                       $area_arr=explode(",",$area_str);
//                       $indx= count($area_arr)-1;
//                       $Aname=$area_arr[$indx];
//                       $Aname=ltrim($Aname," ");
//                         $Aname=rtrim($Aname," ");
//                 $areaID=$this->order_model->getareaID_withName($Aname);
//                 $response['areaID'] = $areaID;
                      
//         // To get area id by name code END
                
                
//         // To get Emirate and slot id by name code start
//                     $string_emirate=$myorder->delivery_time;
//                     $emirate_arr=explode(",",$string_emirate);
//                     $eid=$emirate_arr[0];
//                     //echo $eid;
//                 $emirateID=$this->order_model->getemirateID_withName($eid);
//                 $response['emirateID'] = $emirateID;
//                     $sid=$emirate_arr[1];
//                     //echo $sid;
//                 $slot_ID=$this->order_model->gettimeslotID_withName($sid);
//                 $response['slot_ID'] = $slot_ID;
                
//          // To get emirate id by name code END
         
//          //Service Type
//          $service_typ = 2;
         
//          // Track partner price start
         
//          $ans=$this->order_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
//                             if($ans[0]->ans == 'no'){
                               
//                                     if($ans[0]->price==''){
//                                         $p_price=0;
//                                         $discount_track = '';
//                                     }else{
//                                      $p_price=$ans[0]->price;
//                                      $discount_track = '';
//                                     }
//                             }else{
//                                 if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
//                                 $p_price=0;
//                                 else
//                                 $p_price=$ans[0]->same_loc_price;
                                
//                                 // $p_price=$ans[0]->same_loc_price;
//                               $discount_track =$ans[1]->ids;
                               
//                               $base_discount_tracker=$ans[1]->ids;
//                                 $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
//                                 $field['discount_track']='0';
//                                 $ansss=$this->order_model->update($field, $where_tracker);
//                                 $response['ansss']=$ansss;
                                
//                             }
         
//         //  print_r($ans);
//         //  die();
         
         
//          //Track partner price end
//                  $send_noti_new_check=$myorder->notification;
//          if($send_noti_new_check =='yes' OR $send_noti_new_check =='YES'){
//              $send_noti_new_check='Yes';
//          }
              
//                     $order_data = array(
//                         'send_notification' => $send_noti_new_check,
//                         'status' =>  'Not Assign',
//                         'name_on_delivery' =>  $myorder->full_name,
//                         'number_on_delivery' =>  $myorder->phone,
//                         'customer_id' => $customer_id,
//                         'vendor_id' =>  $vendor_id,
//                     //    'type_id' =>  $type_id,
                     
//                         'signature' =>  $signature,
//                         //'delivery_date' => date('Y-m-d', strtotime('+'.delivery_hours.' hours')),
//                         'delivery_date' => $delivery_date,
//                         'delivery_address' =>  $myorder->address,
//                         'pickUp' => $myorder->pickUp,
//                         'delivery_time' =>  $myorder->delivery_time,
//                         //'note' =>  $deliveries[$i]['note'],
//                         'note' => $myorder->note,
//                         'created' => date("Y-m-d H:i:s"),
//                         'created_user' => $this->session->userdata('email'),
//                         'updated_user' => $this->session->userdata('email'),
//                         'created_terminal' => gethostname(),
//                         'updated_terminal' => gethostname(),
//                         'food_type' => $myorder->food_type,
//                         'service_type_id' => $service_typ,
//                         'areaID' => $areaID,
//                         'emirateID' => $emirateID,
//                         'slotID' => $slot_ID,
//                         'partner_price' => $p_price,
//                         'discount_track' =>$discount_track
                        
//                     );

//                     //save order service type id is initialy 2 to make all delivery with basic service (from tbl_service_Type)
//                     $result = $this->order_model->add($order_data);
                   
//                     //  $notif_update=$this->order_model->notific_update($notif_data, $notif_whr);
//                     //  if($notif_update){
//                     //      $abc['respi']=true;
//                     //      $abc['vend'] = $vendor_id;
//                     //       $abc['nam'] = $myorder->full_name;
//                     //  }

//                 if($result){
//                       $response['success'] = true;
//                       $response['vendor_id'] = $vendor_id;
//                      $name = $myorder->full_name;
                  
//                     $this->session->set_flashdata("success","Data is saved Successfully in un assigned Deliveries.");
//                 }

//             }

//         }else{
//             echo "Please try again after 1 minute, something is wrong";
//         }

      
//         $this->session->unset_userdata("deliveries_data");
//          $this->session->unset_userdata("file_data");
//       $this->session->unset_userdata("vendor_id");
    
//       if($this->uri->segment(3) and $this->uri->segment(3)=="vendor"){
//         $vendorC = $this->session->userdata('email');
//          $msg = "Hi Admin,<br/><br/>
//             New Deliveries are added to the system by the vendor ".$vendorC.".<br/><br/>
//             Regards, <br/><br/>

//             TEAM L O G X<br/>";
//              $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'New Deliveries Added', 'identification'=>'LOGX');
//                 send_email($param);
        
        
//       }
        
//         echo json_encode($response);   
// //echo json_encode($deliveries);
//     //  echo json_encode($abc);
      
//     }



    public function save_order_del(){
        $response = array('success' => false);
       
          $index_arr='';
          
        $deliveries =  $this->session->userdata("deliveries_data");
        // echo 'i am deliv userdata session:';
        // echo '<pre>';
        // print_r($deliveries);
        // die();
       
       
        $vendor_id = $this->session->userdata("vendor_id");
     //   $type_id = $_POST['type_id'];
        $signature = $this->input->post('signature');
       
        
        $delivery_date = date('Y-m-d H:i:sa', strtotime($this->input->post('delivery_date')));
        $dt=$this->input->post('delivery_date');
     
// $tt=0;
        if(count($deliveries) > 0){
           $counter=0;
           foreach ($deliveries as $key => $myorder) {
           $customer_id = $myorder->customer_id;
$counter++;

                
                //   $notif_data=array(
                //       'send_notification' => $myorder->notification
                //       );
                //     $notif_whr=$customer_id;
                
         // To get area id by name code start
                
                   $area_str=$myorder->address;
                       $area_arr=explode(",",$area_str);
                       $indx= count($area_arr)-1;
                       $Aname=$area_arr[$indx];
                       $Aname=ltrim($Aname," ");
                        $Aname=rtrim($Aname," ");
                $areaID=$this->order_model->getareaID_withName($Aname);
                $response['areaID'] = $areaID;
                      
        // To get area id by name code END
                
                
        // To get Emirate and slot id by name code start
                    $string_emirate=$myorder->delivery_time;
                    $emirate_arr=explode(",",$string_emirate);
                    $eid=$emirate_arr[0];
                    //echo $eid;
                $emirateID=$this->order_model->getemirateID_withName($eid);
                $response['emirateID'] = $emirateID;
                    $sid=$emirate_arr[1];
                    //echo $sid;
                $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                $response['slot_ID'] = $slot_ID;
                
         // To get emirate id by name code END
         
         //Service Type
         $service_typ = 2;
         
         // Track partner price start
         
         $ans=$this->order_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
                            if($ans[0]->ans == 'no'){
                               
                                    if($ans[0]->price==''){
                                        $p_price=0;
                                        $discount_track = '';
                                    }else{
                                     $p_price=$ans[0]->price;
                                     $discount_track = '';
                                    }
                            }else{
                                if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
                                $p_price=0;
                                else
                                $p_price=$ans[0]->same_loc_price;
                                
                                // $p_price=$ans[0]->same_loc_price;
                               $discount_track =$ans[1]->ids;
                               
                               $base_discount_tracker=$ans[1]->ids;
                                $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
                                $field['discount_track']='0';
                                $ansss=$this->order_model->update($field, $where_tracker);
                                $response['ansss']=$ansss;
                                
                            }
         
        //  print_r($ans);
        //  die();
        
        //   yumi
        //  echo '<br> i am response <pre> :';
        //               print_r($response);
         
         
         //Track partner price end
                 $send_noti_new_check=$myorder->notification;
         if($send_noti_new_check =='yes' OR $send_noti_new_check =='YES'){
             $send_noti_new_check='Yes';
         }
              
                    $order_data = array(
                        'send_notification' => $send_noti_new_check,
                        'status' =>  'Not Assign',
                        'name_on_delivery' =>  $myorder->full_name,
                        'number_on_delivery' =>  $myorder->phone,
                        'customer_id' => $customer_id,
                        'vendor_id' =>  $vendor_id,
                    //    'type_id' =>  $type_id,
                     
                        'signature' =>  $signature,
                        //'delivery_date' => date('Y-m-d', strtotime('+'.delivery_hours.' hours')),
                        'delivery_date' => $delivery_date,
                        'delivery_address' =>  $myorder->address,
                        'pickUp' => $myorder->pickUp,
                        'delivery_time' =>  $myorder->delivery_time,
                        //'note' =>  $deliveries[$i]['note'],
                        'note' => $myorder->note,
                        'created' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'updated_user' => $this->session->userdata('email'),
                        'created_terminal' => gethostname(),
                        'updated_terminal' => gethostname(),
                        'food_type' => $myorder->food_type,
                        'service_type_id' => $service_typ,
                        'areaID' => $areaID,
                        'emirateID' => $emirateID,
                        'slotID' => $slot_ID,
                        'partner_price' => $p_price,
                        'discount_track' =>$discount_track,
                        'delivery_amount'=>$myorder->Delivery_Amount,
                        'company_note'=>$myorder->Company_Note,
                        'google_link_addrs'=> $myorder->google_link_addrs
                        
                    );
                    
                    $tt=$tt+1;
                    
                    //   yumi
                    //   echo '<br>order data is '.$tt.'<br>  : ';
                    //   echo 'Customer name:'.$order_data['name_on_delivery'];
                      
                    //  print_r($order_data);
                    //  die();
                    // save order service type id is initialy 2 to make all delivery with basic service (from tbl_service_Type)
                   
                
                         $result = $this->order_model->add($order_data);
                         
                         //   yumi 
                        //  echo '<br> result is:'.$result.'<br>';
                         
                          if($result==0){
                             $tra=$tt+1;
                             $index_arr= $index_arr.",".$tra;
                         }
                   
                    //  $notif_update=$this->order_model->notific_update($notif_data, $notif_whr);
                    //  if($notif_update){
                    //      $abc['respi']=true;
                    //      $abc['vend'] = $vendor_id;
                    //       $abc['nam'] = $myorder->full_name;
                    //  }
             
             
            //  uncomment below if *************
                if($result){
                      $response['success'] = true;
                      $response['vendor_id'] = $vendor_id;
                       $response['exceptions'] = $index_arr;
                     $name = $myorder->full_name;
                  
                    $this->session->set_flashdata("success","Data is saved Successfully in un assigned Deliveries.");
                }

            }

        }else{
            echo "Please try again after 1 minute, something is wrong";
        }

      
        $this->session->unset_userdata("deliveries_data");
         $this->session->unset_userdata("file_data");
       $this->session->unset_userdata("vendor_id");
    
       if($this->uri->segment(3) and $this->uri->segment(3)=="vendor"){
        $vendorC = $this->session->userdata('email');
         $msg = "Hi Admin,<br/><br/>
            New Deliveries are added to the system by the vendor ".$vendorC.".<br/><br/>
            Regards, <br/><br/>

            TEAM L O G X<br/>";
             $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'New Deliveries Added', 'identification'=>'LOGX');
                send_email($param);
        
        
       }
        
        echo json_encode($response);   
//echo json_encode($deliveries);
    //  echo json_encode($abc);
      
    }


    public function get_vendor_customers()
    {
        if(!empty($this->session->userdata('u_id')) AND !empty($this->input->post('vendor_id')))
        {
            $vid = $this->input->post('vendor_id');
            $customers = $this->order_model->getCustomers($vid);
            echo json_encode(array('customers'=>$customers));
        }
        else
            echo json_encode(array('error'=>true));
    }

    public function save_delivry()
    {
       
        $data =[];
        $this->load->model('bag_model');
        $this->load->model('order_model');
        $ids = $this->input->post('myData');
        //print_r($ids); exit();
        $type_id = $this->input->post('type_id');
        
        $pick_date = date('Y-m-d', strtotime($this->input->post('pick_date')));
        $vender = $this->input->post('vender');
       
        foreach ($ids as  $id) {
         
            $cid = $this->bag_model->get_customer_id($id, $vender);

            $cidd = !empty($cid) ? $cid[0]['id'] : 0;
               $data[] = array('name_on_delivery'=>!empty($id['full_name']) ? $id['full_name'] : 'no name' ,'number_on_delivery'=>$id['phone'],'delivery_date'=>$id['Delivery_time'],'delivery_address'=>$id['address'],'pickUp'=>$id['pickup_point'],'note'=>$id['Note'],'customer_id'=>$cidd, 'signature'=>$type_id,'delivery_date'=>$pick_date,'vendor_id'=>$vender,'status' => 'Not Assign','created' => date("Y-m-d H:i:s"),'created_user' => $this->session->userdata('email'),'updated_user' => $this->session->userdata('email'),'created_terminal' => gethostname(),'updated_terminal' => gethostname());
        
        }
        $result=  $this->order_model->addcsv('orders',$data);
      
        echo json_encode($result);

        
       
}
    
    public function createqr(){
         $this->load->model('order_model');
        $quantity =$_POST["quantity"];
        
        // TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
            $user_id=0;
        }else{
            $user_id = $this->session->userdata('u_id');
        }
        if(isset($quantity)){
            for($i=0; $i<$quantity; $i++){
                // We will create a unique result variable for last inserted id
          $qrString =   strtoupper(date("D")).mt_rand(111111,999999).date("dmy");
                    $qrString = trim($qrString);
                    $this->sma->qrcode("text",$qrString,"6","H","",$qrString); // use in last parameter result id
                    $update_data["code"]=$qrString;
                    $update_data["qrImage"]= "qr_codes/".$qrString.".png"; // use result id instead of qrstring
                    $update_data["bsid"]=1;
                    $update_data["createdAt"]=date("Y-m-d H:i:s");
                    $update_data["vendor_id"]=$user_id;
                    
                    $result_update = $this->order_model->createnew("qr_bags",$update_data);
                    }
                    }
                    redirect("listingQr");
    }
    public function save_file_deliveries(){
        $response = array('success' => false);

      
        $type_id = $_POST['type_id'];
        $signature = $_POST['signature'];
       
        
        $delivery_date = date('Y-m-d H:i:sa', strtotime($_POST['delivery_date']));

        $where = "vendor_id = ".$vendor_id." and delivery_date BETWEEN '".date('Y-m-d', strtotime($delivery_date))." 00:00:00' and '".date('Y-m-d', strtotime($delivery_date))." 23:59:59'";
        $result = $this->order_model->get_where($where);

        $additional = count($result) > 0 ? 'Yes' : 'No';

        if(count($deliveries) > 0){
            for($i=0; $i<count($deliveries); $i++) {

                //if customer already exist
                if($deliveries[$i]['customer_id'] != 0){
                    $order_data = array(
                        'status' =>  'Not Assign',
                        'customer_id' => $deliveries[$i]['customer_id'],
                        'vendor_id' =>  $vendor_id,
                        'type_id' =>  $type_id,
                        'additional' => $additional,
                        'signature' =>  $signature,
                        //'delivery_date' => date('Y-m-d', strtotime('+'.delivery_hours.' hours')),
                        'delivery_date' => $delivery_date,
                        'delivery_address' =>  $deliveries[$i]['address'],
                        'delivery_time' =>  $deliveries[$i]['delivery_time'],
                        //'note' =>  $deliveries[$i]['note'],
                        'note' => is_premium_delivery($deliveries[$i]['delivery_time']),
                        'created' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'updated_user' => $this->session->userdata('email'),
                        'created_terminal' => gethostname(),
                        'updated_terminal' => gethostname()
                    );

                    //save order
                    $result = $this->order_model->add($order_data);
                }else {
                    //if customer is new
                    $code = mt_rand(100000, 999999);
                    $fields = array(
                       
                        'phone' => $deliveries[$i]['phone'],
                        'role_id' => 4,
                        'send_invitation' => 0,
                        'vendor_id' => $vendor_id,
                        'full_name' => $deliveries[$i]['full_name'],
                        'address' => $deliveries[$i]['address'],
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

                        $order = array(
                            'status' =>  'Not Assign',
                            'customer_id' => $customer_id,
                            'vendor_id' =>  $vendor_id,
                            'type_id' =>  $type_id,
                            'additional' => $additional,
                            //'delivery_date' => date('Y-m-d', strtotime('+'.delivery_hours.' hours')),
                            'delivery_date' => $delivery_date,
                            'delivery_address' =>  $deliveries[$i]['address'],
                            'delivery_time' =>  $deliveries[$i]['delivery_time'],
                            'created' => date("Y-m-d H:i:s"),
                            'created_user' => $this->session->userdata('email'),
                            'updated_user' => $this->session->userdata('email'),
                            'created_terminal' => gethostname(),
                            'updated_terminal' => gethostname()
                        );

                        //save order
                        $result = $this->order_model->add($order);
                    }
                }

                if($result){
                    $response['success'] = true;
                }

            }

        }

        echo json_encode($response);
    }

   public function uploaded_livetest(){
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        //return active drivers only
        //$where = array('u.status'=> 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
       
       // $data['drivers_with_shift'] =$this->order_model->get_related_drivers();  
        //  $data['drivers'] =  $this->order_model->get_drivers_new_appr();
         
        //  $data['drivers_count'] =  $this->order_model->get_drivers_count_appr();
        //  $data['drivers_with_shift'] =$this->order_model->get_emis_new_appr(); 
        
        // die();
        
         $data['drivers'] =  $this->driver_model->get_drivers_basic_inf();
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and   o.driver_id = 0 and o.vendor_id = ".$vendor_id." and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and  o.action != 'Paused' and  o.driver_id = 0 and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
      
      
              $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
      
      
        }
        
        $data['orders'] =  $this->order_model->get_orders_basic_inf($where2);
        
        // echo '<pre>';
        // print_r($data['orders']);
        // die();
        // exit();
        
        $this->load->model('driver_model');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        $data['areas'] = $this->order_model->get_areas();
        
        // dd($data);
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('uploaded_deliveries', $data);
    }
       
    // public function uploaded_old(){
    //     // $cdate = date('Y-m-d');
    //     // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
    //     $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
    //     $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
    //     //return active drivers only
    //     //$where = array('u.status'=> 1);
    //     //$data['drivers'] =  $this->driver_model->get_drivers($where);
    //     $data['drivers'] =  $this->driver_model->get_drivers();
    //     if(strtolower($this->session->userdata('role')) == 'vendor'){
    //         $vendor_id = $this->session->userdata('u_id');
    //         $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and o.driver_id = 0 and o.vendor_id = ".$vendor_id." and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
    //     }else{
    //         $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and o.driver_id = 0 and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
    //     }
        
    //     $data['orders'] =  $this->order_model->get_orders($where2);
        
    //     // SPOON
        
    //     $this->load->model('driver_model');
    //     $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
    //     $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
    //     $data['areas'] = $this->order_model->get_areas();

    //     // print_r($data);
    //     // exit();
    //     $this->load->view('uploaded_deliveries', $data);
    // }
    
    
     public function uploaded_bckup_001(){
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        //return active drivers only
        //$where = array('u.status'=> 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
        //   $data['drivers'] =  $this->driver_model->get_drivers();
        
        $data['drivers'] =  $this->driver_model->get_drivers_basic_inf();
        
      
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and o.driver_id = 0 and o.vendor_id = ".$vendor_id." and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and o.driver_id = 0 and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }
        
        // $data['orders'] =  $this->order_model->get_orders($where2);
         $data['orders'] =  $this->order_model->get_orders_basic_inf($where2);
         
          foreach( $data['orders'][records] as $key=>$data_is){
            // echo $data_is->order_id;
            $customer_id=$data_is->customer_id;
            $delivery_address=$data_is->delivery_address;
            $delivery_time=$data_is->delivery_time;
            
            
             $delivery_address = str_replace("'", "", $delivery_address);
          $findings=$this->order_model->get_latest_driver($customer_id,$delivery_address,$delivery_time);
         
          if($findings){
              $data_is->suggested_driver_name=$findings[0]->full_name;
              $data_is->suggested_driver_id=$findings[0]->driver_id;
              $data_is->new_delivery_check=0;
          }else{
              $data_is->suggested_driver_name='New Delivery';
              $data_is->suggested_driver_id=0;
              $data_is->new_delivery_check=1;
          }
          
        //   echo '<pre>';
        //   print_r($data_is);
        //   echo '<pre>';
        }
       
        
        // SPOON
        
        $this->load->model('driver_model');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        $data['areas'] = $this->order_model->get_areas();

        // print_r($data);
        // exit();
        $this->load->view('uploaded_deliveries', $data);
    }
    
     public function uploaded(){
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        //return active drivers only
        //$where = array('u.status'=> 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
        //   $data['drivers'] =  $this->driver_model->get_drivers();
        
        $data['drivers'] =  $this->driver_model->get_drivers_basic_inf();
        
      
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and o.driver_id = 0 and o.vendor_id = ".$vendor_id." and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and o.driver_id = 0 and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }
        
        // $data['orders'] =  $this->order_model->get_orders($where2);
         $data['orders'] =  $this->order_model->get_orders_basic_inf($where2);
         
         
         
        // ******** SUGGESTED DRIVER ***************//
        
        foreach( $data['orders'][records] as $key=>$data_is){
            // echo $data_is->order_id;
            $customer_id=$data_is->customer_id;
            $delivery_address=$data_is->delivery_address;
            $delivery_time=$data_is->delivery_time;
            
            
             //   $day = date('D');
            $paymentDate = $data_is->delivery_date;
           $day = date('D', strtotime($paymentDate));
       
           // 1 for Sunday , 7 for Saturday
                if($day=='Sat'){$weekday_check=7;}else if($day=='Sun'){$weekday_check=1;}else{$weekday_check=0;}
            
          if($weekday_check){
            //   Today is weekend
               $findings=$this->order_model->get_latest_driver_weekends($customer_id,$delivery_address,$delivery_time,$weekday_check);
               if($findings){
                     $data_is->suggested_driver_name=$findings[0]->full_name;
                     $data_is->suggested_driver_id=$findings[0]->driver_id;
                     $data_is->new_delivery_check=0;
                     $data_is->date_was=$findings[0]->delivery_date;
                     $data_is->day_was=$findings[0]->day;
                     $data_is->suggested_driver_phone=$findings[0]->phone;
              
             }else{
                 $check_for_new_delivery=$this->order_model->check_for_new_delivery_($customer_id,$delivery_address,$delivery_time);
                //  dd($check_for_new_delivery);
                  if($check_for_new_delivery){
                     $data_is->suggested_driver_name='NA';
                     $data_is->suggested_driver_id=0;
                     $data_is->new_delivery_check=0;
                     $data_is->date_was=$check_for_new_delivery[0]->delivery_date;
                     $data_is->day_was=$check_for_new_delivery[0]->day;
                     $data_is->suggested_driver_phone='';
                  }else{
                    //   Delivery is new no data found for any day of week
                     $data_is->suggested_driver_name='New Delivery';
                     $data_is->suggested_driver_id=0;
                     $data_is->new_delivery_check=1;
                     $data_is->date_was='NA';
                     $data_is->day_was='No result found';
                     $data_is->suggested_driver_phone='';
                    
                  }
               }
         
           }else{
            //   Today is a weekday
             $findings=$this->order_model->get_latest_driver_weekdays($customer_id,$delivery_address,$delivery_time);
         
               if($findings){
              $data_is->suggested_driver_name=$findings[0]->full_name;
              $data_is->suggested_driver_id=$findings[0]->driver_id;
              $data_is->new_delivery_check=0;
              $data_is->date_was=$findings[0]->delivery_date;
              $data_is->day_was=$findings[0]->day;
              $data_is->suggested_driver_phone=$findings[0]->phone;
               }else{
              
              
               $check_for_new_delivery=$this->order_model->check_for_new_delivery_($customer_id,$delivery_address,$delivery_time);
                  if($check_for_new_delivery){
                     $data_is->suggested_driver_name='NA';
                     $data_is->suggested_driver_id=0;
                     $data_is->new_delivery_check=0;
                     $data_is->date_was=$check_for_new_delivery[0]->delivery_date;
                     $data_is->day_was=$check_for_new_delivery[0]->day;
                     $data_is->suggested_driver_phone='';
                  }else{
                    //   Delivery is new no data found for any day of week
                     $data_is->suggested_driver_name='New Delivery';
                     $data_is->suggested_driver_id=0;
                     $data_is->new_delivery_check=1;
                     $data_is->date_was='NA';
                     $data_is->day_was='No result found';
                     $data_is->suggested_driver_phone='';
                    
                  }
          }
            
           }
          
      
        } //END
        
        
        // **********************************************//
       
        
        // SPOON
        
        $this->load->model('driver_model');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        $data['areas'] = $this->order_model->get_areas();

        // print_r($data);
        // exit();
        $this->load->view('uploaded_deliveries', $data);
    }
    
    
    
    public function uploaded_test(){
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        // $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        // $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        
        // **********
         
        //   $cdate= '2022-04-30';
        //   $next= '2022-04-30';
        //   echo '<br>cdate:'.$cdate;
        //   die();
        // ********
        
        //return active drivers only
        //$where = array('u.status'=> 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
        //   $data['drivers'] =  $this->driver_model->get_drivers();
        
        $data['drivers'] =  $this->driver_model->get_drivers_basic_inf();
        
      
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and o.driver_id = 0 and o.vendor_id = ".$vendor_id." and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused' and o.driver_id = 0 and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }
        
        // $data['orders'] =  $this->order_model->get_orders($where2);
         $data['orders'] =  $this->order_model->get_orders_basic_inf($where2);
         
        //  dd($data['orders']);
        
        
       // ******** SUGGESTED DRIVER ***************//
        
        foreach( $data['orders'][records] as $key=>$data_is){
            // echo $data_is->order_id;
            $customer_id=$data_is->customer_id;
            $delivery_address=$data_is->delivery_address;
            $delivery_time=$data_is->delivery_time;
            
            
             //   $day = date('D');
            $paymentDate = $data_is->delivery_date;
           $day = date('D', strtotime($paymentDate));
       
           // 1 for Sunday , 7 for Saturday
                if($day=='Sat'){$weekday_check=7;}else if($day=='Sun'){$weekday_check=1;}else{$weekday_check=0;}
            
          if($weekday_check){
            //   Today is weekend
               $findings=$this->order_model->get_latest_driver_weekends($customer_id,$delivery_address,$delivery_time,$weekday_check);
               if($findings){
                     $data_is->suggested_driver_name=$findings[0]->full_name;
                     $data_is->suggested_driver_id=$findings[0]->driver_id;
                     $data_is->new_delivery_check=0;
                     $data_is->date_was=$findings[0]->delivery_date;
                     $data_is->day_was=$findings[0]->day;
                     $data_is->suggested_driver_phone=$findings[0]->phone;
              
             }else{
                 $check_for_new_delivery=$this->order_model->check_for_new_delivery_($customer_id,$delivery_address,$delivery_time);
                //  dd($check_for_new_delivery);
                  if($check_for_new_delivery){
                     $data_is->suggested_driver_name='NA';
                     $data_is->suggested_driver_id=0;
                     $data_is->new_delivery_check=0;
                     $data_is->date_was=$check_for_new_delivery[0]->delivery_date;
                     $data_is->day_was=$check_for_new_delivery[0]->day;
                     $data_is->suggested_driver_phone='';
                  }else{
                    //   Delivery is new no data found for any day of week
                     $data_is->suggested_driver_name='New Delivery';
                     $data_is->suggested_driver_id=0;
                     $data_is->new_delivery_check=1;
                     $data_is->date_was='NA';
                     $data_is->day_was='No result found';
                     $data_is->suggested_driver_phone='';
                    
                  }
               }
         
           }else{
            //   Today is a weekday
             $findings=$this->order_model->get_latest_driver_weekdays($customer_id,$delivery_address,$delivery_time);
         
               if($findings){
              $data_is->suggested_driver_name=$findings[0]->full_name;
              $data_is->suggested_driver_id=$findings[0]->driver_id;
              $data_is->new_delivery_check=0;
              $data_is->date_was=$findings[0]->delivery_date;
              $data_is->day_was=$findings[0]->day;
              $data_is->suggested_driver_phone=$findings[0]->phone;
               }else{
              
              
               $check_for_new_delivery=$this->order_model->check_for_new_delivery_($customer_id,$delivery_address,$delivery_time);
                  if($check_for_new_delivery){
                     $data_is->suggested_driver_name='NA';
                     $data_is->suggested_driver_id=0;
                     $data_is->new_delivery_check=0;
                     $data_is->date_was=$check_for_new_delivery[0]->delivery_date;
                     $data_is->day_was=$check_for_new_delivery[0]->day;
                     $data_is->suggested_driver_phone='';
                  }else{
                    //   Delivery is new no data found for any day of week
                     $data_is->suggested_driver_name='New Delivery';
                     $data_is->suggested_driver_id=0;
                     $data_is->new_delivery_check=1;
                     $data_is->date_was='NA';
                     $data_is->day_was='No result found';
                     $data_is->suggested_driver_phone='';
                    
                  }
          }
            
           }
          
      
        } //END
        
        
        // **********************************************//
       
          dd($data['orders'][records]);
        
        // SPOON
        
        $this->load->model('driver_model');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        $data['areas'] = $this->order_model->get_areas();

        // print_r($data);
        // exit();
        $this->load->view('uploaded_deliveries', $data);
    }

    public function get_order_by_id(){
        $response = array('success' => false);
        $order_id = $_POST['order_id'];
        
        $order_detail  =  $this->order_model->get_order_by_id($order_id);
       
        if(count($order_detail) > 0){
            $response['success'] = true;
            $response['detail'] = $order_detail;
        }

        echo json_encode($response);
    }
    
    public function AC_get_order_by_id(){
        $response = array('success' => false);
        $order_id = $_POST['order_id'];
        $track_id =explode(",",$_POST['track_ids']);
        $order_detail =  $this->order_model->get_order_by_id($order_id);
          $track_detail =  $this->order_model->get_trackorder_by_id($track_id);
          
         
          
          
        if(count($order_detail) > 0){
            $response['success'] = true;
            $response['detail'] = $order_detail;
            $response['track'] =  $track_detail;
        }
          
        //   echo '<pre>';
        //   print_r($response);
        echo json_encode($response);
    }
    
    
    
    public function AC_cancel_order(){
        $this->load->model('Vehicle_model');
           
                $orderID=$this->input->post('id');
                $mode=$this->input->post('mode');
                $note=$this->input->post('note');
                $cancel_fee=$this->input->post('cancelation_price');
                
                $profImg=$this->input->post('profImg');
                
                
                
                if($profImg == '0'){
                    
                   
                $cancel_by=$this->session->userdata('email');
                $fields = array(
                'is_cancelled' => 'yes',
                'canceled_mode' => $mode,
                'canceled_reason' => $note,
                
                'cancellation_price' => $cancel_fee,
            );
                    
                }else{
                     $path=$this->upload_image($profImg,'cancel_deliv');
                $cancel_by=$this->session->userdata('email');
                
                
                // to save the exact cancelletaion status of delivery when its cancel
                        
                        
                        $get_old_status=$this->order_model->get_old_status($orderID,'cancel');
                       
                       
                $fields = array(
                'is_cancelled' => 'yes',
                'canceled_at' =>  date("Y-m-d H:i:s"),
                'canceled_by' =>  $cancel_by,
                'canceled_mode' => $mode,
                'canceled_reason' => $note,
                'canceled_img' => $path,
                'cancellation_price' => $cancel_fee,
                'status' =>'Cancel',
                'cancellation_status' =>$get_old_status
                  );
                }
                
              $check= $this->uri->segment(3);
              if($check == 'Edit'){
                  unset($fields['canceled_at']);
                    unset($fields['canceled_by']);
              }
                
            $where=$this->db->where('order_id',$orderID);
            $res=$this->order_model->update($fields, $where);
            
            if($res){
                $ans=$this->order_model->notify_to($orderID,'cancel');
                $this->order_model->send_cancelation_email($orderID);
                
                //   Bag pickup addition 
             $check_for_deliv=$this->Vehicle_model->get_bagpic_qr_basic_detail($orderID);
             
             if($check_for_deliv[0]->bag_pickup_status == 'assigned'){
                    
                    $qr_data_field=array(
                                   'pickup_status'=>'Cancelled',
                                   'delivery_status'=>'Cancel'
                                    );
                                  $qr_whr="delivery_id =".$orderID; 
              
                           $upd_qr_tbl=$this->Vehicle_model->update_in_tbl("bagspickup",$qr_data_field,$qr_whr);
                           if($upd_qr_tbl){
                               $this->order_model->notify_to_driver_about_bagpickup($orderID,'c');
                           }
                      
                 }
             
            // End bag pickup addition
            }else{
                
            }
            
            return $res;
                
               
            
            
            
                
    }
    
    
     public function AC_revert_(){
        $this->load->model('Vehicle_model');
        $ID=$this->input->post('id');
        
              $get_old_status=$this->order_model->get_old_status($ID,'revert');
        
        $fields = array(
                'is_cancelled' => 'no',
                'canceled_at' =>  '',
                'canceled_by' =>  '',
                'canceled_mode' => '',
                'canceled_reason' => '',
                'canceled_img' => '',
                'cancellation_price' => '',
                'status' =>$get_old_status,
                'cancellation_status' => ''
            );
            
            
            $where=$this->db->where('order_id',$ID);
            $res=$this->order_model->update($fields, $where);
            
            
            if($res){
                $ans=$this->order_model->notify_to($ID,'revert');
                $this->order_model->send_cancelation_email($ID,'revert');
                
                //   Bag pickup addition 
             $check_for_deliv=$this->Vehicle_model->get_bagpic_qr_basic_detail($ID);
             
             if($check_for_deliv[0]->bag_pickup_status == 'assigned'){
                    
                    $qr_data_field=array(
                                   'pickup_status'=>'Pending',
                                   'collected_bags'=>0,
                                   'delivery_status'=>$get_old_status
                                    );
                                  $qr_whr="delivery_id =".$ID; 
              
                           $upd_qr_tbl=$this->Vehicle_model->update_in_tbl("bagspickup",$qr_data_field,$qr_whr);
                           if($upd_qr_tbl){
                               $this->order_model->notify_to_driver_about_bagpickup($ID,'r');
                           }
                      
                 }
             
            // End bag pickup addition
                
                
                
            }else{
                
            }
            
            return $res;
        
    }
    
    
    
    private function upload_image($b64_string,$name)
    {
        $ext = 'pdf';
        $directory_path ='assets/Canceled_Uploads/delivery/';
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
    public function cancelled(){
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        //return active drivers only
        //$where = array('u.status'=> 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
        $data['drivers'] =  $this->driver_model->get_drivers();
        $where2 = "";
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 .= "o.vendor_id = ".$vendor_id." and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 .= "delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }
        
        $data['orders'] =  $this->order_model->get_orders($where2,true);
         
        //  echo '<pre>';
        // print_r($data['orders']);
        // die();
        // exit();
        $this->load->view('order/cancelled', $data);
    }

      public function assign_drivers_delivry()
    {
        $driver_id = $this->input->post('driver_id');
        $bag_ids = $this->input->post('bags_id');
        //$order_ids_ = implode(',', $bag_ids);

         if(count($bag_ids) > 0){
            $bag_ids = implode(',', $bag_ids);
            $fields = array(
                'status' => 'Assign',
                
                'assign_status' => 1,
                'assign_date' =>  date("Y-m-d H:i:s"),
                'updated_user' => $this->session->userdata('email'),
                'updated_terminal' => gethostname(),
                'driver_id' => $driver_id,
                'assigned_user' => $this->session->userdata('email'),
                'assigned_mode' => 'Manual',
                'cooling_bag_check'=>2,
               // 'updated_terminal' => gethostname()
                
            );
            $result =  $this->order_model->assign_drives($fields,$bag_ids);
        }
        
        //get device token
                    $where = array('id' => $driver_id);
                    $user = $this->notification_model->get_device_token($where);
                    
                    // echo 'users data are:';
                    // print_r($user);
                    if (count($user) > 0 && @$user[0]->device_token != '') {

                        $data = array(
                            'user_id' => $driver_id,
                            'device_token' => $user[0]->device_token,
                            'platform' => $user[0]->platform,
                            'status_code' => intval(500),
                            'title' => 'Assign deliveries',
                            'for_whom' => 'Driver',
                            'badge' => $user[0]->badge_count,
                            'message' => count($bag_ids).' Deliveries has been assigned at '.date("Y-m-d H:i:s")
                        );

                        //send notification
                        $x=send_notification_to_user($data, 'save');
                        // $response['check'] = $x;
                    }
         echo json_encode($result);
    }
    
     public function Auto_assign_drivers_delivry_copy_backup()
    {
       // $driver_id = $this->input->post('driver_id');
        $bag_ids = $this->input->post('bags_id');
        $deliv_ids = implode(',', $bag_ids);
     
             $delivries=$this->order_model->get_related_deliveries($deliv_ids);
            // echo '<pre>';
            // print_r($delivries);
            //  echo '<pre>';
            // print_r($driver_id_arr);
            $not_assigned=array();
             //$assigned_deliviries_ids=array();
            foreach($delivries as $key => $value){
                $emiID= $value->emirateID;
                $areaID= $value->areaID;
                $slotID= $value->slotID;
                $ID=$value->order_id;

#Should get today delivery count of driver before insertion of every delivery  
              
                $driver_id_arr=$this->order_model->get_related_drivers();                
                foreach($driver_id_arr as $Dkey => $Dvalue){
                    
                    if($emiID==$Dvalue->emirate_id && $areaID==$Dvalue->area_id && $slotID==$Dvalue->time_slot_id && $Dvalue->DRIVERS_TODAY_DELIVERIRS!=150){
                        
                        
                        
                         $temp_compareing_arr[$Dvalue->user_id]=$Dvalue->DRIVERS_TODAY_DELIVERIRS;
                         
                       
                        
                    }
                }
                
                if(!empty($temp_compareing_arr)){
                    //  echo '<br>i was old <pre> ';
                    //  print_r($temp_compareing_arr);
                
                    arsort($temp_compareing_arr);
                    // echo '<br>i am new <pre> ';
                    // print_r($temp_compareing_arr);
                    
                    $Driver_ID=key($temp_compareing_arr);
                    
                            $fields = array(
                                    'status' => 'Assign',
                                    'assign_status' => 1,
                                    'assign_date' =>  date("Y-m-d H:i:s"),
                                    'updated_user' => $this->session->userdata('email'),
                                    'updated_terminal' => gethostname(),
                                    'driver_id' => $Driver_ID,
                                    'assigned_user' => $this->session->userdata('email'),
                                    'assigned_mode' => 'Auto',
                                    'cooling_bag_check'=>2,
                                  // 'updated_terminal' => gethostname()
                                    
                                );
                 $result =  $this->order_model->auto_assign_drives($fields,$ID);
                 
                    //  test 06 aug 2020 ayesha
                    
                                         //get device token
                                        $where = array('id' => $Driver_ID);
                                        $user = $this->notification_model->get_device_token($where);
                    
                                        if (count($user) > 0 && @$user[0]->device_token != '') {
                    
                                            $data = array(
                                                'user_id' => $Driver_ID,
                                                'device_token' => $user[0]->device_token,
                                                'platform' => $user[0]->platform,
                                                'status_code' => intval(500),
                                                'title' => 'Assign deliveries',
                                                'for_whom' => 'Driver',
                                                'badge' => $user[0]->badge_count,
                                                'message' => 'Delivery has been assigned'
                                            );
                    
                                            //send notification
                                            $x=send_notification_to_user($data, 'save');
                                            // $response['check'] = $x;
                                        }
                                        
                                        // end
                    
                }else{
                    $not_assigned[]=$ID;
                }
               unset($temp_compareing_arr);
            }
            // echo '<br>i am not assigned:<pre>';
            // print_r($not_assigned);
            if(!empty($not_assigned)){
                echo json_encode($not_assigned);
            }else{
                
                echo json_encode(true);
            }
            
            
        
        
    }
    
    
    
    // added at 18 june 2021 start
    
     public function Auto_assign_drivers_delivry()
     {
        // $driversArr = json_decode($this->input->post('dirvers'));
        // $drivers_tot_Deliv_rec =json_decode($this->input->post('drivers_tot_Deliv_rec'));
        
       
         $drivers_count =  $this->order_model->get_drivers_count_appr();
         $drivers_with_shift =$this->order_model->get_emis_new_appr();
         
         $driversArr=$drivers_with_shift;
         $drivers_tot_Deliv_rec =$drivers_count['records'];
         
        // echo "Posted data :";
        // print_r($driversArr);
        // print_r($this->input->post());
        
        // die();
       // $driver_id = $this->input->post('driver_id');
        $bag_ids = $this->input->post('bags_id');
        // $deliv_ids = implode(',', $bag_ids);
        
        
        // $emi  = $this->input->post('emi_ids');
        // $area = $this->input->post('area_ids');
        // $slot = $this->input->post('slot_ids');
        
        $assigned_drivers=array();
       
        
        // $emi_ids  = implode(',', $emi);
        // $area_ids = implode(',', $area); 
        // $slot_ids = implode(',', $slot);
     
            //  $delivries=$this->order_model->get_related_deliveries($deliv_ids);
            // echo '<pre>';
            // print_r($delivries);
            //  echo '<pre>';
            // print_r($driver_id_arr);
            $not_assigned=array();
             $not_assigned_rzn=array();
             //$assigned_deliviries_ids=array();
            foreach($bag_ids as $key => $value){
                
                // echo $value[deliv_ids];
                // die();
                $all_4_ids=explode('@',$value[deliv_ids]);
                // print_r($all_4_ids);
                
                // echo $all_4_ids[0];
                // die();
                
                
                $ID     = $all_4_ids[0];
                $areaID = $all_4_ids[1];
                $emiID  = $all_4_ids[2];
                $slotID = $all_4_ids[3];
                $names  = $all_4_ids[4];
                
                
                // $emiID= $emi[$key];
                // $areaID= $area[$key];
                // $slotID=  $slot[$key];
                // $ID=$value;

#Should get today delivery count of driver before insertion of every delivery  
          $limit_full_drivers=''; 
          
                // $driver_id_arr=$this->order_model->get_related_drivers();                
                foreach($driversArr as $Dkey => $Dvalue){
                    // echo 'hello i am foreeach for driver searching';
                    // && $Dvalue->DRIVERS_TODAY_DELIVERIRS!=200
                    
                    
                    if($emiID==$Dvalue->emirate_id && $areaID==$Dvalue->area_id && $slotID==$Dvalue->time_slot_id ){
                       
                        
                        
                        //  echo '<br> true of if inside driver search';
                        $arr_indx=array_search($Dvalue->user_id, array_column($drivers_tot_Deliv_rec, 'id'));
                        
                        // echo 'arr_index_is: '.$arr_indx;
                        if($drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS !=200){
                            
                           $limit_full_drivers='';
                        // echo $key.' - and the total delivs are: '.$drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS.' - '.$drivers_tot_Deliv_rec[$arr_indx]->full_name.' - '.$drivers_tot_Deliv_rec[$arr_indx]->id;
                        
                        
                        // echo ' <br> old :'.$drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS;
                        //  $temp_compareing_arr[$Dvalue->user_id]=$Dvalue->DRIVERS_TODAY_DELIVERIRS;
                         $temp_compareing_arr[$Dvalue->user_id]=$drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS;
                        
                        //  $Dvalue->DRIVERS_TODAY_DELIVERIRS= $Dvalue->DRIVERS_TODAY_DELIVERIRS+1;
                        
                        $drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS=$drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS+1;
                        
                        // echo 'after :'.$drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS;
                         break;
                        }else{
                           if($limit_full_drivers==''){
                               $limit_full_drivers=$drivers_tot_Deliv_rec[$arr_indx]->full_name.'(tot_assigned_deliv)-'.$drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS;
                           }else{
                            $limit_full_drivers=$limit_full_drivers.','.$drivers_tot_Deliv_rec[$arr_indx]->full_name.'(tot_assigned_deliv)-'.$drivers_tot_Deliv_rec[$arr_indx]->DRIVERS_TODAY_DELIVERIRS;
                           }
                        }
                    }
                }
                // die();
                if(!empty($temp_compareing_arr)){
                    //  echo '<br>i was old <pre> ';
                    //  print_r($temp_compareing_arr);
                //   echo '<br> result of driver search i am not empty temp_compering arr';
                    arsort($temp_compareing_arr);
                    // echo '<br>i am new <pre> ';
                    // print_r($temp_compareing_arr);
                    
                    $Driver_ID=key($temp_compareing_arr);
                    
                            $fields = array(
                                    'status' => 'Assign',
                                    'assign_status' => 1,
                                    'assign_date' =>  date("Y-m-d H:i:s"),
                                    'updated_user' => $this->session->userdata('email'),
                                    'updated_terminal' => gethostname(),
                                    'driver_id' => $Driver_ID,
                                    'assigned_user' => $this->session->userdata('email'),
                                    'assigned_mode' => 'Auto',
                                    'cooling_bag_check'=>2,
                                  // 'updated_terminal' => gethostname()
                                    
                                );
                    $result =  $this->order_model->auto_assign_drives($fields,$ID);
                //  echo ' fields : <pre>';
                //  print_r($fields);
                 
                 
                  array_push($assigned_drivers,$Driver_ID);
                 
                    //  test 06 aug 2020 ayesha
                    
                                    //      //get device token
                                    //     $where = array('id' => $Driver_ID);
                                    //     $user = $this->notification_model->get_device_token($where);
                                    //  echo ' users : <pre>';  
                                    //     print_r($user);
                    
                                    //     if (count($user) > 0 && @$user[0]->device_token != ''){
                    
                                    //         $data = array(
                                    //             'user_id' => $Driver_ID,
                                    //             'device_token' => $user[0]->device_token,
                                    //             'platform' => $user[0]->platform,
                                    //             'status_code' => intval(500),
                                    //             'title' => 'Assign deliveries',
                                    //             'for_whom' => 'Driver',
                                    //             'badge' => $user[0]->badge_count,
                                    //             'message' => 'Delivery has been assigned'
                                    //         );
                    
                                    //         //send notification
                                    //                             // $x=send_notification_to_user($data, 'save');
                                    //         // $response['check'] = $x;
                                    //     }
                                        
                                        // end
                    
                }else{
                    $not_assigned[]=$ID;
                    
                    if($limit_full_drivers==''){
                    $not_assigned_rzn[]='No match found (Emirate-Area-Timeslot) for order id:'.$ID.' - '.$names;
                    }else{
                     
                     $not_assigned_rzn[]='No Order Space found for order id:'.$ID.' Qualified Drivers are: '.$limit_full_drivers;
                    }
                }
               unset($temp_compareing_arr);
            }
            // echo '<br>i am not assigned:<pre>';
            // print_r($not_assigned);
            
            
              $drivers_selected_arr=array_unique($assigned_drivers);
            foreach($drivers_selected_arr as $key1 => $Driver_ID){
                             //get device token
                                        $where = array('id' => $Driver_ID);
                                        $user = $this->notification_model->get_device_token($where);
                                    //  echo ' users : <pre>';  
                                    //  print_r($user);
                    
                                        if (count($user) > 0 && @$user[0]->device_token != ''){
                    
                                            $data = array(
                                                'user_id' => $Driver_ID,
                                                'device_token' => $user[0]->device_token,
                                                'platform' => $user[0]->platform,
                                                'status_code' => intval(500),
                                                'title' => 'Assign deliveries',
                                                'for_whom' => 'Driver',
                                                'badge' => $user[0]->badge_count,
                                                'message' => 'Some Deliveries has been assigned'
                                            );
                    
                                            //send notification
                                                                $x=send_notification_to_user($data, 'save');
                                            // $response['check'] = $x;
                                        }
                                        
            }
                                        
            
            // die();
            if(!empty($not_assigned)){
                
                $response=array(
                    'not_assigned' =>$not_assigned,
                    'not_assigned_rzn' =>$not_assigned_rzn
                    );
                    
                    echo json_encode($response);
                // echo json_encode($not_assigned);
                // echo '**********Rejected******';
                // print_r($not_assigned_rzn);
            }else{
                
                echo json_encode(true);
            }
            
            
        
        
    }
    
    
    // end

    public function assign_drivers(){
        $response = array('success' => false);
        $driver_id = $_POST['driver_id'];
        $order_ids = $_POST['order_ids'];
        $order_ids_ = implode(',', $order_ids);

        if(count($order_ids) > 0){
                $fields = array(
                    'status' => 'Assign',
                    'driver_id' => $driver_id,
                    'assign_status' => 1,
                    'assign_date' =>  date("Y-m-d H:i:s"),
                    'updated_user' => $this->session->userdata('email'),
                    'updated_terminal' => gethostname()
                );

                //assign orders to drivers
                $result =  $this->order_model->assign_drives($fields, $order_ids_);
                if($result){
                    $response['success'] = true;

                    //get device token
                    $where = array('id' => $driver_id);
                    $user = $this->notification_model->get_device_token($where);

                    if (count($user) > 0 && @$user[0]->device_token != '') {

                        $data = array(
                            'user_id' => $driver_id,
                            'device_token' => $user[0]->device_token,
                            'platform' => $user[0]->platform,
                            'status_code' => intval(500),
                            'title' => 'Assign deliveries',
                            'for_whom' => 'Driver',
                            'badge' => $user[0]->badge_count,
                            'message' => count($order_ids).' Deliveries has been assigned'
                        );

                        //send notification
                        $x=send_notification_to_user($data, 'save');
                        // $response['check'] = $x;
                    }


                }

        }
        
        print_r($response);

        echo json_encode($response);
    }
       public function print_qr(){
       
        $this->load->model('order_model');
        $bags_ids = $this->uri->segment(3);
        $data['col'] = 12 / $this->uri->segment(4);
      

        if($bags_ids!=""){
                
                
                //assign orders to drivers
                $data["result"]=  $this->order_model->get_print_qr($bags_ids);
                $this->load->view('printqr', $data);

        }

        
    }
     public function print_info(){
       
       
        $bags_ids = $this->uri->segment(3);
      

        if($bags_ids!=""){
                
                
                //assign orders to drivers
                $data["result"]=  $this->order_model->get_print_info($bags_ids);
                $this->load->view('order/printinfo', $data);

        }

        
    }

public function delete_drivers_delivry()
{
    $this->load->model('Vehicle_model');
      $response = array('success' => false);
       
        $bag_ids = $this->input->post('bags_id');
        //$bag_ids = implode(',', $bag_ids);

        if(count($bag_ids) > 0){
               
               //   Bag pickup addition  
                  $ids_arr=$bag_ids;
                   
                    // dd($ids_arr);
                    if(count($ids_arr)>0){
                        for($i=0; $i<count($ids_arr);$i++){
                            
                            $check_for_deliv=$this->Vehicle_model->get_bagpic_qr_basic_detail($ids_arr[$i]);
             
                            if($check_for_deliv[0]->bag_pickup_status == 'assigned'){
                    
                            $qr_data_field=array(
                                   'pickup_status'=>'Cancelled',
                                   'delivery_status'=>'Deleted',
                                   'updated_at'=>date("Y-m-d H:i:s"),
                                   'updated_user'=>$this->session->userdata('email')
                                    );
                                  $qr_whr="delivery_id =".$ids_arr[$i]; 
              
                                $upd_qr_tbl=$this->Vehicle_model->update_in_tbl("bagspickup",$qr_data_field,$qr_whr);
                                 if($upd_qr_tbl){
                                   $this->order_model->notify_to_driver_about_bagpickup($ids_arr[$i],'c');
                                  }
                      
                               }
                        }
                    }
                    
                         // End bag pickup addition
               
             $where = $bag_ids;
        $result =  $this->order_model->delete_deliveries($where);
              
                if($result){
                    $response['success'] = true;
                }

        }

        echo json_encode($response);
    }
    public function cancel_drivers_delivery()
    {
        $this->load->model('Vehicle_model');
        
      $response = array('success' => false);
       
        $order_ids = $this->input->post('order_ids');
        
        
        if(count($order_ids) > 0){
           foreach($order_ids as $val){   
            $get_old_status=$this->order_model->get_old_status($val,'cancel');
            $fields = array(
                'is_cancelled' => 'yes',
                'canceled_mode' => 'Unpaid_cancel',
                'canceled_at' =>  date("Y-m-d H:i:s"),
                'canceled_by' =>  $this->session->userdata('email') ,
                'status' =>'Cancel',
                'cancellation_status' =>$get_old_status
                
            );
            $result =  $this->order_model->update_in($fields, $val);
            if($result){
                $ans=$this->order_model->notify_to($val,'cancel');
                
                //   Bag pickup addition 
             $check_for_deliv=$this->Vehicle_model->get_bagpic_qr_basic_detail($val);
             
             if($check_for_deliv[0]->bag_pickup_status == 'assigned'){
                    
                    $qr_data_field=array(
                                   'pickup_status'=>'Cancelled',
                                   'delivery_status'=>'Cancel'
                                    );
                                  $qr_whr="delivery_id =".$val; 
              
                           $upd_qr_tbl=$this->Vehicle_model->update_in_tbl("bagspickup",$qr_data_field,$qr_whr);
                           if($upd_qr_tbl){
                               $this->order_model->notify_to_driver_about_bagpickup($val,'c');
                           }
                      
                 }
             
            // End bag pickup addition
                
                
            }
           }
            if($result){
                $response['success'] = true;
            }
        }
        echo json_encode($response);
    }
    
    
    
    public function process_drivers_delivery()
    {
         $this->load->model('Vehicle_model');
      $response = array('success' => false);
       
        $order_ids = $this->input->post('order_ids');
       
        
        if(count($order_ids) > 0){
             foreach($order_ids as $val){
           $get_old_status=$this->order_model->get_old_status($val,'revert');
           
           $fields = array(
                'is_cancelled' => 'no',
                'canceled_at' =>  '',
                 'canceled_by' =>  '' ,
                 'status' =>$get_old_status,
                 'cancellation_status' => ''
            );
            $result =  $this->order_model->update_in($fields, $val);
            if($result){
                $ans=$this->order_model->notify_to($val,'revert');
                
                //   Bag pickup addition 
             $check_for_deliv=$this->Vehicle_model->get_bagpic_qr_basic_detail($val);
             
             if($check_for_deliv[0]->bag_pickup_status == 'assigned'){
                    
                    $qr_data_field=array(
                                   'pickup_status'=>'Pending',
                                   'collected_bags'=>0,
                                   'delivery_status'=>$get_old_status
                                    );
                                  $qr_whr="delivery_id =".$val; 
              
                           $upd_qr_tbl=$this->Vehicle_model->update_in_tbl("bagspickup",$qr_data_field,$qr_whr);
                           if($upd_qr_tbl){
                               $this->order_model->notify_to_driver_about_bagpickup($val,'r');
                           }
                      
                 }
             
            // End bag pickup addition
                
                
            }
        }
        
            
            
           
            if($result){
                $response['success'] = true;
            }
        }
        echo json_encode($response);
    }
  public function delete_deliveries(){
        $response = array('success' => false);
       
        $order_ids = $_POST['order_ids'];
        $order_ids_ = implode(',', $order_ids);

        if(count($order_ids) > 0){
               
            $where = $order_ids_;
        $result =  $this->order_model->delete_deliveries($where);
              
                if($result){
                    $response['success'] = true;
                }

        }

        echo json_encode($response);
    }

    public function un_assign_drivers(){
        $response = array('success' => false);
        $order_ids = $_POST['order_ids'];
        $order_ids_ = implode(',', $order_ids);

        if(count($order_ids) > 0){
            $fields = array(
                'status' => 'Not Assign',
                'driver_id' => 0,
                'assign_status' => 0,
                'assign_date' =>  "0000-00-00 00:00:00",
                'updated_user' => $this->session->userdata('email'),
                'updated_terminal' => gethostname()
            );

            //assign orders to drivers
            $result =  $this->order_model->assign_drives($fields, $order_ids_);
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
    }


    //return last 30 days deliveries
    public function get_deliveries_stats(){
        $response = array('success' => false);
        $from_date = date('Y-m-d', strtotime('-30 days'));
        $to_date = date('Y-m-d', strtotime('-0 days'));
        $summary =  $this->order_model->get_deliveries_summary_by_date($from_date, $to_date);
        if($summary){
            $response['success'] = true;
            $response['deliveries'] = $summary;
        }

        echo json_encode($response);
    }

    public function cancel_delivery(){
        $delivery_id = $_POST['delivery_id'];
        $response = array('success' => false);
        $where = array('order_id'=>$delivery_id);
        $result =  $this->order_model->delete($where);
        if($result){
            $response['success'] = true;
        }
        echo json_encode($response);
    }


    /***************************************************************************/
    /********************DASHBOARD LIST****************************************/
    /***************************************************************************/

    public function dashboard_list(){
        //return active drivers only
        $where = array('u.status'=> 1);
        $data['drivers'] =  $this->driver_model->get_drivers($where);

        $start_date = @$_POST['not_assign_start_date'] ? @$_POST['not_assign_start_date'] : date('Y-m-d');
        $end_date = @$_POST['not_assign_end_date'] ? @$_POST['not_assign_end_date'] : date('Y-m-d');

        $where = "o.status = 'Not Assign' and delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['orders'] = $this->order_model->get_orders($where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('order/dashboard_not_assign', $data);
    }

    public function dashboard_delivered_list(){
        $start_date = @$_POST['delivered_start_date'] ? @$_POST['delivered_start_date'] : date('Y-m-d');
        $end_date = @$_POST['delivered_end_date'] ? @$_POST['delivered_end_date'] : date('Y-m-d');

        $where = "o.status = 'Delivered' and delivered_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['orders'] = $this->order_model->get_orders($where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('order/dashboard_delivered', $data);
    }

    public function dashboard_delivery_list(){
        $start_date = @$_POST['delivery_start_date'] ? @$_POST['delivery_start_date'] : date('Y-m-d');
        $end_date = @$_POST['delivery_end_date'] ? @$_POST['delivery_end_date'] : date('Y-m-d');

        $where = "delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $data['orders'] = $this->order_model->get_orders($where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('order/dashboard_deliveries', $data);
    }

    /**************************************************************/
    /************************DELIVERIES TYPE***********************/
    /**************************************************************/
    public function type(){
        $this->load->model('order_model');
        $data['types'] =  $this->order_model->get_deliveries_type();
        $this->load->view('order/manage_type', $data);
    }
    // AYESHA NEW CHANGES
    public function Newtype(){
        $this->load->model('order_model');
        $this->load->model('Setting_model');
        $data['types'] =  $this->order_model->get_deliveries_type();
        $data['emirates'] = $this->Setting_model->get_emirates();
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('order/Newmanage_type', $data);
    }

    public function areas()
    {
        $this->load->model('order_model');
        $data['areas'] = $this->order_model->get_areas();
        $this->load->view('manage_areas', $data);
    }
    public function Newareas(){
        
        $this->load->model('order_model');
        $this->load->model('Setting_model');
        
        $data['areas'] = $this->order_model->get_areas();
         $data['emirates'] = $this->Setting_model->get_emirates();
        $this->load->view('Newmanage_areas', $data);
    }
    
     public function timeslots(){
        $this->load->model('order_model');
        $this->load->model('Setting_model');
         $data['types'] =  $this->order_model->get_basic_timeslots();
        // echo 'hello';
        // echo '<pre>';
        // print_r($data);
        
         $this->load->view('order/timeslots', $data);
    }
    
     public function get_timeslot_by_id(){
        $response = array('success' => false);

        $type_id = $_POST['type_id'];
        $where = array('basic_time_id' => $type_id);
        $slot_type =  $this->order_model->get_timeslot_where($where);
        if(count($slot_type) > 0){
            $response['success'] = true;
            $response['detail'] = $slot_type;
        }

        echo json_encode($response);
    }
    

     public function role_type(){
        $this->load->model('order_model');
        //$data['types'] =  $this->order_model->get_deliveriess_type();
         $where = array('status' =>6);
        $data['types'] = $this->order_model->get_deliveriess_type_where();

        $this->load->view('order/role_type', $data);
    }

    public function get_delivery_type_by_id(){
        $response = array('success' => false);

        $type_id = $_POST['type_id'];
        $where = array('id' => $type_id);
        $order_type =  $this->order_model->get_deliveries_type_where($where);
        if(count($order_type) > 0){
            $response['success'] = true;
            $response['detail'] = $order_type;
        }

        echo json_encode($response);
    }
    public function get_deliverys_type_by_id(){
        $response = array('success' => false);

        $type_id = $_POST['type_id'];
        $where = array('id' => $type_id);
        $order_type =  $this->order_model->get_deliveriess_type_where_id_is($where);
        if(count($order_type) > 0){
            $response['success'] = true;
            $response['detail'] = $order_type;
        }

        echo json_encode($response);
    }

    public function get_active_type(){
        $response = array('success' => false);
     
        $where = array('status' => 1);
        $types =  $this->order_model->get_deliveries_type_where($where);
        if($types){
            $response['success'] = true;
            $response['types'] = $types;
        }
        echo json_encode($response);
    }

    public function save_delivery_type(){
        $response = array('success' => false);

        //check duplicate driver phone
        $type = $_POST['type_name'];
        $where = array('name' => $type);
        $delivery_type = $this->order_model->get_deliveries_type_where($where);

        if(!$delivery_type){
            $fields = array(
                'name' =>  $type,
                'status' =>  1,
            );

            $result = $this->order_model->add_delivery_type($fields);
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
    }
    // AYESHA NEW CHANGES
    public function Newsave_delivery_type(){
        $response = array('success' => false);

        //check duplicate driver phone
        $type = $_POST['type_name'];
        $emirateID=$_POST['emirate_id'];
        $where = array('name' => $type);
        $delivery_type = $this->order_model->get_deliveries_type_where($where);

        if(!$delivery_type){
            $fields = array(
                'name' =>  $type,
                'status' =>  1,
                'emirate_id' =>$emirateID,
            );

            $result = $this->order_model->add_delivery_type($fields);
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
    }
    
     public function save_basic_timeslot(){
        $response = array('success' => false);

        //check duplicate driver phone
        $type = $_POST['type_name'];
       
        $where = array('name' => $type);
        $slot_type = $this->order_model->get_timeslot_where($where);

        if(!$slot_type){
            $fields = array(
                'name' =>  $type,
                'status' =>  1,
                
            );

            $result = $this->order_model->add_timeslot($fields);
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
    }
    
    public function update_timeslot_status(){
        $response = array('success' => false);
        $type_id = $_POST['type_id'];

        $fields = array(
            'status' =>  $_POST['status']
        );

        $where = array('basic_time_id'=> $type_id);
        $result = $this->order_model->update_timeslot($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }
    
     public function update_timeslot(){
        $response = array('success' => false);
        $type_id = $_POST['type_id'];

        $fields = array(
            'name' => $_POST['name'],
            
        );

        $where = array('basic_time_id'=> $type_id);
        $result = $this->order_model->update_timeslot($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }
    
    public function save_role_type(){
        $response = array('success' => false);

        //check duplicate driver phone
        $type = $_POST['type_name'];
        $where = array('name' => $type);
        $delivery_type = $this->order_model->get_deliveries_type_where($where);

        if(!$delivery_type){
            $fields = array(
                'name' =>  $type,
                'status' =>  1,
            );

            $result = $this->order_model->add_deliverys_type($fields);
           
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
    }

    public function update_delivery_type(){
        $response = array('success' => false);
        $type_id = $_POST['type_id'];

        $fields = array(
            'name' => $_POST['name'],
            'emirate_id' => $_POST['emirate_id'],
        );

        $where = array('id'=> $type_id);
        $result = $this->order_model->update_delivery_type($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }
     public function update_deliverys_type(){
        $response = array('success' => false);
        $type_id = $_POST['type_id'];

        $fields = array(
            'name' =>  $_POST['name'],
        );

        $where = array('id'=> $type_id);
        $result = $this->order_model->update_deliverys_type($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }
    public function update_bagsinfo(){
      
        $response = array('success' => false);
        $order_id = $this->uri->segment(3);

          $bgs=$_POST['bag_received'];
          
          if($bgs ==0 OR $bgs =='0'){
              $status='Delivered';
              
              $d = array(
                            'bsid' =>4,
                        );
          }else if($bgs ==1 OR $bgs >1){
              $status='Collected';
              
              $d = array(
                            'bsid' =>5,
                        );
          }
        
        $fields = array(
            'bag_received' =>  $_POST['bag_received'],
            'ice_bags' =>  $_POST['ice_bags'],
            'status'=>$status
        );

        $where = array('order_id'=> $order_id);
        $result = $this->order_model->update_bagsInfo($fields, $where);
        if($result){
            
            $get_qr_bag_id=$this->order_model->get_qr_bag_id($where);
            
            if($get_qr_bag_id AND $get_qr_bag_id[0]->qr_bag_id !='' AND $get_qr_bag_id[0]->qr_bag_id!=0){
                
                 
                        
                $qrID_bg=$get_qr_bag_id[0]->qr_bag_id;       
                $where_qr = array('qrid'=>$qrID_bg);        
                
                $updt_qr_status_for_strkpr=$this->order_model->updt_qr_status_for_strkpr($d, $where_qr);
            }
            $response['success'] = true;
        }

        redirect("order/orderCompleted");
    }

    public function update_delivery_type_status(){
        $response = array('success' => false);
        $type_id = $_POST['type_id'];

        $fields = array(
            'status' =>  $_POST['status']
        );

        $where = array('basic_time_id'=> $type_id);
        $result = $this->order_model->update_delivery_type($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }


    public function getCustomers()
    {
        //exit('thanks');
        if(!empty($this->input->post('vendor_id')))
        {
            $vid = $this->input->post('vendor_id');
            $customers = $this->order_model->getCustomers($vid);
            echo json_encode(array('error'=>false, 'customers'=>$customers));
        }
        else
            echo json_encode(array('error'=>true, 'msg'=>'Empty Input'));
    }
// Taha minor changes accorinding to live logx
    // public function save_order_form_old_demo()
    // {
        
    //     // print_r($_POST);
    //     // die();
    //     if(!empty($this->input->post()))
    //     {
    //         $service_typ=2;
    //         // print_r($this->input->post());
    //         $area = $this->order_model->get_area_by_id($this->input->post('order_area'));
    //         $cst['send_notification'] = $this->input->post('notification');
    //         $cst['full_name'] = $this->input->post('order_name');
    //         $cst['vendor_id'] = $this->input->post('order_vendor_id');
    //         $cst['phone'] = $this->input->post('order_phone');
    //         $cst['address'] = $this->input->post('del_address').', '.$area->area_name;
    //         $cst['Password_partner'] ='logx_tracking';
    //         $delivery['customer_id'] = $this->bag_model->save_customer($cst);
            
    //         $delivery['send_notification'] = $this->input->post('notification');
    //         $delivery['vendor_id'] = $this->input->post('order_vendor_id');
    //         $delivery['pickUp'] = $this->input->post('order_pickup');
    //         $delivery['delivery_address'] = $this->input->post('del_address').', '.$area->area_name;
    //         // $delivery['customer_id'] = $this->input->post('order_customer_id');
    //         $delivery['note'] = $this->input->post('order_note');
    //         $delivery['number_on_delivery'] = $this->input->post('order_phone');
    //         $delivery['name_on_delivery'] = $this->input->post('order_name');
    //         $delivery['signature'] = $this->input->post('order_signature');
    //         $delivery['status'] = 'Not Assign';
    //         $delivery['created'] = date('Y-m-d H:i:sa');
    //         $delivery['delivery_date'] = !empty($this->input->post('order_date')) ? date('Y-m-d H:i:sa', strtotime($this->input->post('order_date'))) : date('Y-m-d H:i:sa');
    //         $delivery['created_user'] = $this->session->userdata('email');
    //         $delivery['created_terminal'] = gethostname();
    //         $delivery['delivery_time'] = $this->input->post('order_shift');
    //         $delivery['food_type'] = $this->input->post('product_type');
    //         // this is id of basic service in tbl_service_type , initially set every upload delivery with basic service.
    //         $delivery['service_type_id'] = $service_typ;
            
    //          // To get area id by name code start
                
    //               $area_str=$this->input->post('del_address').', '.$area->area_name;
    //                   $area_arr=explode(",",$area_str);
    //                   $indx= count($area_arr)-1;
    //                   $Aname=$area_arr[$indx];
    //                   $Aname=ltrim($Aname," ");
    //                 $Aname=rtrim($Aname," ");
    //             $areaID=$this->order_model->getareaID_withName($Aname);
                      
    //     // To get area id by name code END
                
                
    //     // To get Emirate and slot id by name code start
    //                 $string_emirate=$this->input->post('order_shift');
    //                 $emirate_arr=explode(",",$string_emirate);
    //                 $eid=$emirate_arr[0];
    //             $emirateID=$this->order_model->getemirateID_withName($eid);
    //                 $sid=$emirate_arr[1];
    //             $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
    //      // To get emirate id by name code END
         
    //      $delivery['areaID'] = $areaID;
    //      $delivery['emirateID'] = $emirateID;
    //      $delivery['slotID'] = $slot_ID;
         
         
    //     //  
        
         
    //      // Track partner price start
    //      $vendor_id=$cst['vendor_id'];
    //      $dt=$this->input->post('order_date');
    //      $area_str=$delivery['delivery_address'];
         
    //      $ans=$this->order_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
    //                         if($ans[0]->ans == 'no'){
                                
    //                               if($ans[0]->price==''){
    //                                 $p_price=0;
    //                                 $discount_track = '';
    //                                 }else{
    //                                  $p_price=$ans[0]->price;
    //                                  $discount_track = '';
    //                                 }
                                    
    //                         }else{
    //                             $p_price=$ans[0]->same_loc_price;
    //                           $discount_track =$ans[1]->ids;
                               
    //                             $base_discount_tracker=$ans[1]->ids;
    //                             $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
    //                             $field['discount_track']='0';
    //                             $ans=$this->order_model->update($field, $where_tracker);
    //                         }
                            
    //             $delivery['partner_price'] = $p_price;
    //             $delivery['discount_track'] = $discount_track;
         
    //     //  print_r($ans);
    //     //  die();
         
         
    //      //Track partner price end
         
         
    //         $this->order_model->addcsv('orders', array($delivery));
    //         redirect(base_url('upload_Deliveries?saved=yes'));
    //     }
    //     else
    //     {
    //         redirect(base_url('upload_Deliveries?saved=no'));
    //     }
    // }
    
    // public function save_order_form_old_at_1_jan_2021()
    // {
    //     if(!empty($this->input->post()))
    //     {
    //         $service_typ=2;
    //         // print_r($this->input->post());
    //         $area = $this->order_model->get_area_by_id($this->input->post('order_area'));
    //         $cst['send_notification'] = $this->input->post('notification');
    //         $cst['full_name'] = $this->input->post('order_name');
    //         $cst['vendor_id'] = $this->input->post('order_vendor_id');
    //         $cst['phone'] = $this->input->post('order_phone');
    //         $cst['address'] = $this->input->post('del_address').', '.$area->area_name;
    //         $cst['Password_partner'] ='logx_tracking';
    //         $delivery['customer_id'] = $this->bag_model->save_customer($cst);
            
    //         $delivery['send_notification'] = $this->input->post('notification');
    //         $delivery['vendor_id'] = $this->input->post('order_vendor_id');
    //         $delivery['pickUp'] = $this->input->post('order_pickup');
    //         $delivery['delivery_address'] = $this->input->post('del_address').', '.$area->area_name;
    //         // $delivery['customer_id'] = $this->input->post('order_customer_id');
    //         $delivery['note'] = $this->input->post('order_note');
    //         $delivery['number_on_delivery'] = $this->input->post('order_phone');
    //         $delivery['name_on_delivery'] = $this->input->post('order_name');
    //         $delivery['signature'] = $this->input->post('order_signature');
    //         $delivery['status'] = 'Not Assign';
    //         $delivery['created'] = date('Y-m-d H:i:sa');
    //         $delivery['delivery_date'] = !empty($this->input->post('order_date')) ? date('Y-m-d H:i:sa', strtotime($this->input->post('order_date'))) : date('Y-m-d H:i:sa');
    //         $delivery['created_user'] = $this->session->userdata('email');
    //         $delivery['created_terminal'] = gethostname();
    //         $delivery['delivery_time'] = $this->input->post('order_shift');
    //         $delivery['food_type'] = $this->input->post('product_type');
    //         // this is id of basic service in tbl_service_type , initially set every upload delivery with basic service.
    //         $delivery['service_type_id'] = $service_typ;
            
    //          // To get area id by name code start
                
    //               $area_str=$this->input->post('del_address').', '.$area->area_name;
    //                   $area_arr=explode(",",$area_str);
    //                   $indx= count($area_arr)-1;
    //                   $Aname=$area_arr[$indx];
    //                   $Aname=ltrim($Aname," ");
    //                 $Aname=rtrim($Aname," ");
    //             $areaID=$this->order_model->getareaID_withName($Aname);
                      
    //     // To get area id by name code END
                
                
    //     // To get Emirate and slot id by name code start
    //                 $string_emirate=$this->input->post('order_shift');
    //                 $emirate_arr=explode(",",$string_emirate);
    //                 $eid=$emirate_arr[0];
    //             $emirateID=$this->order_model->getemirateID_withName($eid);
    //                 $sid=$emirate_arr[1];
    //             $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
    //      // To get emirate id by name code END
         
    //      $delivery['areaID'] = $areaID;
    //      $delivery['emirateID'] = $emirateID;
    //      $delivery['slotID'] = $slot_ID;
         
         
    //     //  
        
         
    //      // Track partner price start
    //      $vendor_id=$cst['vendor_id'];
    //      $dt=$this->input->post('order_date');
    //      $area_str=$delivery['delivery_address'];
         
    //      $ans=$this->order_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
    //                         if($ans[0]->ans == 'no'){
                                
    //                               if($ans[0]->price==''){
    //                                 $p_price=0;
    //                                 $discount_track = '';
    //                                 }else{
    //                                  $p_price=$ans[0]->price;
    //                                  $discount_track = '';
    //                                 }
                                    
    //                         }else{
    //                              if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
    //                             $p_price=0;
    //                             else
    //                             $p_price=$ans[0]->same_loc_price;
                                
                                
    //                           $discount_track =$ans[1]->ids;
                               
    //                             $base_discount_tracker=$ans[1]->ids;
    //                             $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
    //                             $field['discount_track']='0';
    //                             $ans=$this->order_model->update($field, $where_tracker);
    //                         }
                            
    //             $delivery['partner_price'] = $p_price;
    //             $delivery['discount_track'] = $discount_track;
         
    //     //  print_r($ans);
    //     //  die();
         
         
    //      //Track partner price end
         
         
    //         $this->order_model->addcsv('orders', array($delivery));
    //         redirect(base_url('upload_Deliveries?saved=yes'));
    //     }
    //     else
    //     {
    //         redirect(base_url('upload_Deliveries?saved=no'));
    //     }
    // }
    
    public function save_order_form()
    {
        if(!empty($this->input->post()))
        {
            $service_typ=2;
            // print_r($this->input->post());
            $area = $this->order_model->get_area_by_id($this->input->post('order_area'));
            
            
            // Validations
               
                        //   $f_name=trim(preg_replace('!\s+!', ' ', $this->input->post('order_name') ));
                        //   $f_name=str_replace("ʹ","", $f_name);
                        
                        //   $addr= trim(preg_replace('!\s+!', ' ',str_replace("'","",$data['C'].', '.$data['D'])));
                        //   $addr=str_replace("ʹ","", $addr);
                           
                           
                        //   $pic_up=trim(preg_replace('!\s+!', ' ',$data['E']));
                        //   $pic_up=str_replace("ʹ","", $pic_up);
                       
                        //   $notes=preg_replace('!\s+!', ' ',$data['G']);
                        //   $notes=str_replace("ʹ","", $notes);
                          
                        //   $food_t=preg_replace('!\s+!', ' ',$data['I']);
                        //   $food_t=str_replace("ʹ","", $food_t);
            
            
            
            // Validations End
            
            
            
            
            
            $cst['send_notification'] = $this->input->post('notification');
            $cst['full_name'] = $this->input->post('order_name');
            $cst['vendor_id'] = $this->input->post('order_vendor_id');
            $cst['phone'] = $this->input->post('order_phone');
            $cst['address'] = $this->input->post('del_address').', '.$area->area_name;
            
            
               $cst['address']= trim(preg_replace('!\s+!', ' ',str_replace("'","",$cst['address'])));
                          $cst['address']=str_replace("ʹ","", $cst['address']);
                
            
            
            
            
            $cst['Password_partner'] ='logx_tracking';
            $delivery['customer_id'] = $this->bag_model->save_customer($cst);
            
            $delivery['send_notification'] = $this->input->post('notification');
            $delivery['vendor_id'] = $this->input->post('order_vendor_id');
            $delivery['pickUp'] = $this->input->post('order_pickup');
            $delivery['delivery_address'] = $this->input->post('del_address').', '.$area->area_name;
            // $delivery['customer_id'] = $this->input->post('order_customer_id');
            $delivery['note'] = $this->input->post('order_note');
            $delivery['number_on_delivery'] = $this->input->post('order_phone');
            $delivery['name_on_delivery'] = $this->input->post('order_name');
            $delivery['signature'] = $this->input->post('order_signature');
            $delivery['status'] = 'Not Assign';
            $delivery['created'] = date('Y-m-d H:i:sa');
            $delivery['delivery_date'] = !empty($this->input->post('order_date')) ? date('Y-m-d H:i:sa', strtotime($this->input->post('order_date'))) : date('Y-m-d H:i:sa');
            $delivery['created_user'] = $this->session->userdata('email');
            $delivery['created_terminal'] = gethostname();
            $delivery['delivery_time'] = $this->input->post('order_shift');
            $delivery['food_type'] = $this->input->post('product_type');
            // this is id of basic service in tbl_service_type , initially set every upload delivery with basic service.
            $delivery['service_type_id'] = $service_typ;
            
            
            
            
             $delivery['delivery_address']= trim(preg_replace('!\s+!', ' ',str_replace("'","",$delivery['delivery_address'])));
                          $delivery['delivery_address']=str_replace("ʹ","", $delivery['delivery_address']);
                 
            
            
            
             // To get area id by name code start
                
                   $area_str=$this->input->post('del_address').', '.$area->area_name;
                       $area_arr=explode(",",$area_str);
                       $indx= count($area_arr)-1;
                       $Aname=$area_arr[$indx];
                       $Aname=ltrim($Aname," ");
                    $Aname=rtrim($Aname," ");
                $areaID=$this->order_model->getareaID_withName($Aname);
                      
        // To get area id by name code END
                
                
        // To get Emirate and slot id by name code start
                    $string_emirate=$this->input->post('order_shift');
                    $emirate_arr=explode(",",$string_emirate);
                    $eid=$emirate_arr[0];
                $emirateID=$this->order_model->getemirateID_withName($eid);
                    $sid=$emirate_arr[1];
                $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
         // To get emirate id by name code END
         
         $delivery['areaID'] = $areaID;
         $delivery['emirateID'] = $emirateID;
         $delivery['slotID'] = $slot_ID;
         
         
        //  
        
         
         // Track partner price start
         $vendor_id=$cst['vendor_id'];
         $dt=$this->input->post('order_date');
         $area_str=$delivery['delivery_address'];
         
         
           
                         
         
         $ans=$this->order_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
                            if($ans[0]->ans == 'no'){
                                
                                  if($ans[0]->price==''){
                                    $p_price=0;
                                    $discount_track = '';
                                    }else{
                                     $p_price=$ans[0]->price;
                                     $discount_track = '';
                                    }
                                    
                            }else{
                                 if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
                                $p_price=0;
                                else
                                $p_price=$ans[0]->same_loc_price;
                                
                                
                               $discount_track =$ans[1]->ids;
                               
                                $base_discount_tracker=$ans[1]->ids;
                                $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
                                $field['discount_track']='0';
                                $ans=$this->order_model->update($field, $where_tracker);
                            }
                            
                $delivery['partner_price'] = $p_price;
                $delivery['discount_track'] = $discount_track;
                
                $amm = $this->input->post('Delivery_Amount');
                
                 if($amm =='' OR $amm ==0 OR $amm==' '){
                             $amm=0;
                        }
                              
                
                $delivery['delivery_amount'] =$amm;
                $delivery['company_note'] = $this->input->post('Company_Note');
                
                 $google_addr = $this->input->post('google_link');
                 $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$google_addr)));
                 $google_addr=str_replace("ʹ","", $google_addr);
                 $google_addr=str_replace('"','', $google_addr);
                           
                   if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                       //   echo '<br> i am inside if address is empty '.$google_addr;
                                  $google_link = array("google_link"=>"None");
                                  $google_link_jsn = json_encode($google_link);
                              
                        }else{
                           //   echo '<br> i am inside else when address is not  empty '.$google_addr;
                              $google_link = array("google_link"=>$google_addr);
                              $google_link_jsn = json_encode($google_link);
                          }
                 
                 $delivery['google_link_addrs'] =$google_link_jsn;
         
        //  print_r($ans);
        //  die();
        
        
        // echo '<pre>';
        // print_r($delivery);
        // die();
         
         
         //Track partner price end
         
         
            $this->order_model->addcsv('orders', array($delivery));
            redirect(base_url('upload_Deliveries?saved=yes'));
        }
        else
        {
            redirect(base_url('upload_Deliveries?saved=no'));
        }
    }

    function test()
    {
        $status =1;
        $where1 = array('status'=> 1,'is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        $data['dtypes'] = $this->vendor_model->get_data('delivery_type');
        $this->load->view('order/upload_file', $data);
        //$this->load->view('order/upload_file_old', $data);
    }

    function unassign_orders()
    {
        if(!empty($this->input->post('order_ids')))
        {
            $ids = $this->input->post('order_ids');
            $this->order_model->update_orders($ids);
            echo json_encode(array('success'=>true));
        }
    }

    function save_area()
    {
        $pdata = $this->input->post();

        $this->order_model->update_area($pdata);

        redirect(base_url('areas'));
    }
    function Newsave_area()
    {
        $response = array('success' => false);
        
        $pdata = $this->input->post();
      
        $result=$this->order_model->Newupdate_area($pdata);
        if($result){
            $response['success']=true;
        }
       
         echo json_encode($response);

        //redirect(base_url('areas'));
    }

    function del_area($id)
    {
        if($this->session->userdata('role') == 'admin')
        {
            $this->order_model->del_area($id);
            redirect(base_url('manage_areas?del=done'));
        }else{
             redirect(base_url('manage_areas?del=notAllowed'));
        }
    }

    function del_tb($table, $id)
    {
        if($table == 'role')
        {
            $this->order_model->del_rec('roles', array('id'=>$id));
            redirect(base_url('Order/role_type?del=done'));
        }
        else if($table == 'del_type')
        {
           
            $this->order_model->del_rec('delivery_type', array('id'=>$id));
            redirect(base_url('type?del=done'));
        }
        else if($table == 'del_timeslot')
        {
             $all_Emirates=$this->order_model->fetch_all_emirates();
            foreach($all_Emirates as $key => $value){
                $timeslots=$value->basic_time_id;
                $timeslots=explode(',',$timeslots);
                                            //  echo '<br>i am old <pre>:';
                                            // print_r($timeslots);
                        
                        foreach($timeslots as $key2 => $val){
                            
                             if($id == $val){
                                 $pos=$key2;
                                          //   echo '<br>i am pos:'.$pos;
                                 unset($timeslots[$pos]);
                                            // echo '<br>i am new <pre>:';
                                            //  print_r($timeslots);
                                 
                                  $Updated_timeslots=implode(",",$timeslots);
                                            //echo '<br>i am updated :'.$Updated_timeslots.'<hr>';
                               $IDD=$value->id;
                               $data = array( 
                                        'basic_time_id'=> $Updated_timeslots 
                            
                                            );
                            
                                  $this->db->where('id',$IDD);
                                  $this->db->update('tbl_emirates',$data); 
                             }
                        }
               
                
            }//end of foreach main
             $this->order_model->del_schedules_timeslots($id);
             $this->order_model->del_rec('basic_time_slots', array('basic_time_id'=>$id));
            
            redirect(base_url('timeslots?del=done'));

        }else{
            
        }
    }

    function readFile()
    {
        require 'vendor/autoload.php';
        $file_name = "areas.xlsx";
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($file_name);
        //$worksheet = $spreadsheet->getActiveSheet();
        $worksheet = $spreadsheet->setActiveSheetIndex(1);
        $namedDataArray = $worksheet->toArray(null, true, true, true);

        foreach($namedDataArray AS $ii=>$data){
            if($ii == 1 OR empty($data['A']))
                continue;
            echo $data['A']."<br>";
            $this->db->insert('areas', array('area_name' => $data['A'], 'added_by' => $this->session->userdata('u_id')));

            }
    }

   
  public function check(){
       $this->load->model('order_model');
        $this->load->model('driver_model');
       
      $area_str='St#2 B Blockz, DUBAI(Mytest1)';
      
     
      $area_arr=explode(",",$area_str);

      $indx= count($area_arr)-1;
      $Aname=$area_arr[$indx];
    
    // $a= str_replace(' ','',$Aname);
         $Aname=ltrim($Aname," ");
         $Aname=rtrim($Aname," ");
   
     $areaID=$this->order_model->getareaID_withName($Aname);
    // //  print_r($this->db->last_query());
    // //  die();
     
    //     $string_emirate='Abu dhabi,(8AM-12PM)';
    //     $emirate_arr=explode(",",$string_emirate);
    //     $eid=$emirate_arr[0];
    // $emirateID=$this->order_model->getemirateID_withName($eid);
    //     $sid=$emirate_arr[1];
    // $slot_ID=$this->order_model->gettimeslotID_withName($sid);
    
    echo '<br> I AM area ID :<pre>';
    print_r($areaID);
    // echo '<br> I AM EMIRATE ID :<pre>';
    // print_r($emirateID);
    // echo '<br> I AM SLOT ID :<pre>';
    // print_r($slot_ID);
    
    // AA
//  $areas = $this->order_model->get_areas();
// 		$areas = array_column($areas, 'area_name');
	
//     foreach($areas as $key => $value){
//         //$area_str='St#2 B Block, DUBAI (Mytest1)';
//         $area_str='St#4 B Block, '.$value;
//         echo '<br>i was the string:'.$area_str.'<br>';
//       // die();
        
//       $area_arr=explode(",",$area_str);

//       $indx= count($area_arr)-1;
//       $Aname=$area_arr[$indx];
//       echo '<br>old:'.$Aname.'<br>';
      
//         $Aname=ltrim($Aname," ");
//          $Aname=rtrim($Aname," ");
//         echo '<br>new:'.$Aname.'<br>';
         
//           $areaID=$this->order_model->getareaID_withName($Aname);
//           echo '<br> I AM area ID :<pre>';
//           print_r($areaID);
         
         
        
//     }
    
//   // AA
//      $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
//      $data['emirites_typ']=$this->driver_model->get_combinations($data['old_emirites_typ']);
//  	 $types = array_values($data['emirites_typ']);
 	 
//  	 foreach($types as $key => $value){
 	     
 	     
//  	    $string_emirate=$value;
//         $emirate_arr=explode(",",$string_emirate);
//         $eid=$emirate_arr[0];
//         $emirateID=$this->order_model->getemirateID_withName($eid);
//         $sid=$emirate_arr[1];
//         $slot_ID=$this->order_model->gettimeslotID_withName($sid);
        
//         echo '<br> I AM EMIRATE ID :<pre>';
//         print_r($emirateID);
//         echo '<br> I AM SLOT ID :<pre>';
//         print_r($slot_ID);
//  	 }
    
   }
   
   
   
    // public function AC_cancelled__old_at_1_jan_2021(){
        
    //     $cdate = date('Y-m-d');
    //     $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
    //     $where2 = "";
    //     if(strtolower($this->session->userdata('role')) == 'vendor'){
    //         $vendor_id = $this->session->userdata('u_id');
    //         $where2 .= "o.vendor_id = ".$vendor_id." and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
    //     }else{
    //         $where2 .= "delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
    //     }
       
    //     $data['orders'] =  $this->order_model->get_orders($where2,true);
    //     $this->load->view('order/AC_cancelled', $data);
    
        
    // }
     public function AC_cancelled_(){
        
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
         $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
       
       
          $where2 = "";
          if($this->uri->segment(5)){
            $new_check= $this->uri->segment(5);
              if($new_check=="paid"){
                  $where2 .= " action != 'Freezed' and action != 'Paused' and (cancellation_price != 0 OR cancellation_price !='') and ";
              }else if($new_check=="unpaid"){
                  $where2 .= " action != 'Freezed' and action != 'Paused' and (cancellation_price= 0 OR cancellation_price='') and ";
              }
          }
        // echo 'cdate'.$cdate;
        // echo '<br>next'.$next;
        
      
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 .= "vendor_id = ".$vendor_id." and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 .= "delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }
        
        // echo '<br> where2'.$where2;
        // die();
        $data['orders'] =  $this->order_model->get_orders($where2,true);
        $this->load->view('order/AC_cancelled', $data);
    
        
    }
    
     public function AC_cancelled_by_created_date()
    {
        $data = array('orders'=>array());
      if(!empty($_POST)){
        $from_date = $_POST['from'];
        $to_date = $_POST['to'];
        $data["selection"]= $_POST;
        $where2 = "";
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 .= " action != 'Freezed' and action != 'Paused' and vendor_id = ".$vendor_id." and delivery_date BETWEEN '". date('Y-m-d', strtotime($from_date))." 00:00:00' and '". date('Y-m-d', strtotime($to_date))." 23:59:59'";
        }else{
            $where2 .= " action != 'Freezed' and action != 'Paused' and delivery_date BETWEEN '". date('Y-m-d', strtotime($from_date))." 00:00:00' and '". date('Y-m-d', strtotime($to_date))." 23:59:59'";
        }
       
        $data['orders'] =  $this->order_model->get_orders($where2,true);
    
        $this->load->view('order/AC_cancelled', $data);
    }
    
        
    }
    
    public function checkemail(){
       
       echo 'hi';
    //   $res=$this->order_model->get_user_by_id('1638');
     $res= $this->order_model->send_cancelation_email('1638');
      echo $res;
   }
   public function tt(){
      $res= $this->order_model->get_customer_deliveries_by_date();
      echo '<pre>';
      print_r($res);
   }


    // new added 29-05-20
    
      public function update_role_type_status(){
        $response = array('success' => false);
        $type_id = $_POST['type_id'];

        $fields = array(
            'status' =>  $_POST['status']
        );

        $where = array('id'=> $type_id);
        $result = $this->order_model->update_deliverys_type($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
    }


    public function testXYZ(){
        
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
                
                echo 'QR matched for owner: '.$item->vendor_id.' as qr_bag_id from orders: '.$item->qr_bag_id.' == QR ID'.$qr->qrid.'<br>';
                
                // $data = [
                //     'vendor_id'=> $item->vendor_id,
                //     ];
                //     $where = ['qrid'=>$qr->qrid];
                // $this->order_model->update_process($data, $where);
                }else{
                    // echo 'QR DOES NOT matched for owner: '.$item->vendor_id.' as qr_bag_id from orders: '.$item->qr_bag_id.' != QR ID'.$qr->qrid.'<br>';
                
                }
            }
        }
                echo '<pre>';
                echo 'success';
                echo '</pre>';
        
        
    }
    
    
    public function r(){
        
        $res=$this->order_model->get_qr_current_status('FRI560002110920');
        
        echo '<pre>';
        print_r($res);
        
    }
    
    public function forcefully_stroekeeper_report(){
        
        //  $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
     
        //   echo 'cdate'.$cdate;
        //   echo '<br>next'.$next;
        //   die();
        $where = "o.driver_id > 0 and ( o.status = 'Delivered' or o.status='Collected') and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        //$data['orders'] =  $this->order_model->get_orders($where);
      
        //$this->load->view('order/completed',$data);
        $this->load->view('forcefully_storekeeper_report');
    }
    
    
    
    // New Module TA 25-April-2021 Start
    
    public function upload_customers_meta()
    {
        $this->load->model('driver_model');
        $status =1;
        //$where1 = array('status'=> 1,'is_deleted'=>0);
        $where1 = array('is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        //$data['dtypes'] = $this->vendor_model->get_data('delivery_type');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        $data['areas'] = $this->order_model->get_areas();
        $this->load->view('Monthly_deliveries/upload_monthly_cust_file', $data);
    }
    
    // public function upload_customers_file_by_general_file_old(){
    //     $this->load->model('driver_model');
    //     $this->load->model('Vendor_model');
    //      $this->load->model('Order_model');
        
    //     require 'vendor/autoload.php';
    //     $file_data = array();
        
    //      $where_vend['id']=$this->input->post('vendor_id');
         
    //      $vendor_name_is = $this->Vendor_model->get_vendor_name_TA($where_vend);
         
    //      if($vendor_name_is){
    //          $vendor_name_is_= $vendor_name_is[0]->full_name;
    //      }else{
    //          $vendor_name_is_ = 'nothing';
    //      }
        

    //     $file_name = $this->upload_doc_customers_meta(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], $vendor_name_is_.'_'.'CutomersMeta');
        
       

    //     if ( ! $file_name)
    //     {
    //         $where1 = array('status'=> 1,'is_deleted'=>0);
    //         $data['vendors'] =  $this->vendor_model->get_where($where1);
    //         $data['error'] = 'not upload';
    //         //$this->load->view('order/upload_file', $data);
    //         $this->load->view('Monthly_deliveries/upload_file_holded', $data);
    //     }
    //     else
    //     {
        
    //     // print_r($file_name);
    //     // echo '<pre>';
    //     // die();
            
    //         //$file = base_url().'upload/'.$file_name;
                      
    //         $file_name = "uploaded_customers_meta/".$file_name;
    //         $sheetIndex = 0;
    //         $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
    //         $reader->setReadDataOnly(TRUE);
    //         $sheetnames = $reader->listWorksheetNames($file_name);
            
    //         $reader->setLoadSheetsOnly($sheetnames[$sheetIndex]);
    //         $spreadsheet = $reader->load($file_name);
           
    //         $namedDataArray = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    //         //   print_r($namedDataArray);
    //         // die();
    //         // echo 'I am a testing of new module <pre>';
            
    //         // $check_duplicate=array();
            
            
    //         //   foreach($namedDataArray AS $ii=>$data){
                        
                      
    //         //         //Used to skip 1st row
    //         //         //OR $data['I'] == '' OR $data['J'] == '' OR $data['K'] == ''
    //         //         if($ii == 1 OR $data['A'] == '' OR $data['B'] == ''  OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == '' OR $data['J'] == ''  ) { continue; }
                   
                   
                    
                 
                    
    //         //          if($data['L'] == '' OR $data['L'] == '0'){
    //         //         echo '<br>';
    //         //          $tempo=substr($vendor_name_is_, 0, 2);
    //         //          $tempid=(strtoupper($tempo).'-'.get_unique_string('4'));  
    //         //         // echo strtoupper($tempo).mt_rand(111111,999999).date("dmy");
    //         //         echo $tempid;
    //         //           $data['L'] =$tempid;
    //         //          }
                     
    //         //          echo '<br>Data is inside one <pre> <br>';
    //         //          print_r($data);
                     
                     
    //         //           $check_duplicate[$ii]=trim($data['L']);
                      
                      
    //         //         //   Checking customer id in not already exist in database 
                    
    //         //         $database_check= $this->Vendor_model->check_unique_customerid_result($data['L']);
                    
    //         //         echo '<br>Database result is';
    //         //         print_r($database_check);
                    
    //         //         if(count($database_check) > 0){
                        
    //         //             echo 'this entry should rejected <br>';
    //         //         }else{
    //         //             echo ' Accepted <br>';
    //         //         }
                    
                    
                    
                    
    //         //          $areaID=$this->order_model->getareaID_withName($data['F']);
    //         //         //   $response['areaID'] = $areaID;
                    
    //         //         echo '<br> area id'.$areaID.'<br>';
                    
    //         //          $emirate_arr=explode(",",$data['H']);
    //         //         $eid=$emirate_arr[0];
                   
    //         //     $emirateID=$this->order_model->getemirateID_withName($eid);
    //         //      echo '<br> emirate id: '.$emirateID.'<br>';
                 
    //         //         $sid=$emirate_arr[1];
                  
    //         //     $slot_ID=$this->order_model->gettimeslotID_withName($sid);
    //         //     echo '<br> slot id: '.$slot_ID.'<br>';
                    
    //         //   }
              
    //         //   echo '<pre> <br> i am duplicate check array <br>';
              
    //         //   print_r($check_duplicate);
              
    //         //   echo '<pre> <br> i am result check array <br>';
              
    //         //   $re=array_values(array_unique(array_diff_key($check_duplicate, array_unique($check_duplicate))));
              
    //         //   print_r($re);
              
    //         //   echo '<br> 2nd';
    //         //   print_r(array_count_values($check_duplicate));
              
    //         //   echo '<br> 3rd';
              
    //         //   $unique = array_unique($check_duplicate);
    //         //   $duplicates = array_diff_assoc($check_duplicate, $unique);
              
    //         //   print_r($duplicates);
    //         //  die();
    //           $check_duplicate_contact=array();
    //           $check_duplicate=array();
    //           $error_details=array();
    //           $discard=false;
    //           $z_index=0;
    //                 foreach($namedDataArray AS $ii=>$data){
                        
                      
    //                 //Used to skip 1st row
    //                 //OR $data['I'] == '' OR $data['J'] == '' OR $data['K'] == ''
                  
                    
    //                 if($ii == 1 OR $data['A'] == '' OR $data['B'] == ''  OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == '' OR $data['J'] == ''  ) { continue; }
    //                     $discard=false;
    //                     $errors_str='';
    //                      $error_details=array();
                         
    //                 //   Check duplicate customer id 
                    
                    
    //                 // check special charcters
                    
    //                  if(!empty($data['L']) OR $data['L'] != '' OR $data['L'] != ' ' OR $data['L'] != '0'){
                             
                             
    //                         //  echo '<br>'.$ii.' i am old id :'.$data['L'];
    //                         $x_filter_id=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['L']); 
    //                         $x_filter_id=preg_replace('/[^A-Za-z_0-9-\s]+/', ' ', $x_filter_id);
    //                         $data['L']=$x_filter_id;
    //                         //  echo '<br>'.$ii.' i am new id :'.$data['L'];
    //                       }
                    
    //                 //  generate auto customer id if its empty
    //                   if($data['L'] == '' OR $data['L'] == '0' OR $data['L'] == ' '){
                            
    //                         //   echo '<br>'.$ii.' i am old id and empty :'.$data['L'];
    //                          $tempo=substr($vendor_name_is_, 0, 2);
    //                          $tempid=(strtoupper($tempo).'-'.get_unique_string('4'));  
    //                                 // echo strtoupper($tempo).mt_rand(111111,999999).date("dmy");
    //                                 //  echo $tempid;
    //                         $data['L'] =$tempid;
                            
    //                         // echo '<br>'.$ii.' i am new id after auto create :'.$data['L']; esha khan
    //                      }
                        
                         
    //                       //   Checking customer id if not already exist in database 
    //                  $database_check= $this->Vendor_model->check_unique_customerid_result($data['L']);
                     
    //                  if($database_check){
    //                       $discard=true;
    //                     //   $error_details[$ii]='There already exists an account registered with this customer id.';
    //                       array_push($error_details,'There already exists an account registered with this customer id.');
    //                  }
                     
    //                   //   Checking customer contact number if not already exist in database 
    //                  $phone_check= $this->Vendor_model->check_unique_phone_result(validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A'])))));
                     
    //                  if($phone_check){
    //                       $discard=true;
    //                     //   $error_details[$ii]='There already exists an account registered with this customer id.';
    //                       array_push($error_details,'There already exists an account registered with this phone number.');
    //                  }
                     
    //                 // end duplicate customer id check
                   
                   
    //                 //   check Area with emirate
                   
    //                     $areaID=$this->order_model->getareaID_withName($data['F']);
    //                     if(!$areaID){
    //                         $discard=true;
    //                         // $error_details[$ii]='Area does not exists.';
    //                         array_push($error_details,'Area does not exists.');
    //                       }
    //                             // echo '<br> area id'.$areaID.'<br>';
                    
    //                     $emirate_arr=explode(",",$data['H']);
    //                     $eid=$emirate_arr[0];
                   
    //                      $emirateID=$this->order_model->getemirateID_withName($eid);
    //                             // echo '<br> emirate id: '.$emirateID.'<br>';
    //                      if(!$emirateID){
    //                          $discard=true;
    //                         //  $error_details[$ii]='Emirate does not exists.';
    //                          array_push($error_details,'Emirate does not exists.');
    //                      }
                 
    //                      $sid=$emirate_arr[1];
                  
    //                      $slot_ID=$this->order_model->gettimeslotID_withName($sid);
    //                             //  echo '<br> slot id: '.$slot_ID.'<br>';
    //                      if(!$slot_ID){
    //                          $discard=true;
    //                         //  $error_details[$ii]='Time Slot does not exists.';
    //                          array_push($error_details,'Time Slot does not exists.');
    //                      }
                   
                   
    //               //    End check area and emirate
                   
    //               if(!$discard){
                       
    //                   //  insert for futher checking
    //                   $check_duplicate[$z_index]=trim($data['L']);
    //                   $check_duplicate_contact[$z_index]=validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
                      
                      
    //                     $phone = $data['A'];
    //               //  if($data[1] && $data[3] && $data[4]) {
                 
    //             //  Phone number
    //                 if($data['A']!="" or $data['A']!=" "){
    //                     $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
    //                     }
                    
    //                     $customer_id = 0;
                        
                             
    //              //  fullName             
    //                       $f_name=trim(preg_replace('!\s+!', ' ', $data['B']));
    //                       $f_name=str_replace("ʹ","", $f_name);
                            
    //              //  Email          
    //                         if (filter_var($data['C'], FILTER_VALIDATE_EMAIL)) {
    //                                 // echo("$email is a valid email address");
                                    
    //                                  $condition=array('email' => $data['C']);
    //                               $email_check = $this->Order_model->check_customer_email_TA($condition);
    //                               if($email_check){
    //                                 //   $errors_str='"'.$data['C'].'" There already exists an account registered with this email address.';
    //                                     array_push($error_details,'"'.$data['C'].'" There already exists an account registered with this email address.');
    //                                   $data['C']='';
    //                               }
    //                          }else{
    //                                 // echo("$email is not a valid email address");
    //                                 // $errors_str='"'.$data['C'].'" This email address is not valid.';
    //                                  array_push($error_details,'"'.$data['C'].'" This email address is not valid.');
    //                                 $data['C']='';
    //                               }
                              
    //             // Address  
                
    //                 // echo 'test simple address is<br>'.$data['C'].'<br>';
    //                         $x_filter_address=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
    //                         $x_filter_address=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $x_filter_address); 
                         
    //                       $addr= trim(preg_replace('!\s+!', ' ',str_replace("'","",$x_filter_address.', '.$data['F'])));
                           
    //                       $addr=str_replace("ʹ","", $addr);
    //                       $addr=str_replace(" ‏","", $addr);
    //                       $addr=str_replace("‏","", $addr);
                
                
                
                
                
    //         //Google address  
    //                           $google_addr="";
    //                           $google_link = array("google_link"=>"None");
                            
    //                      $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$data['E'])));
    //                       $google_addr=str_replace("ʹ","", $google_addr);
    //                       $google_addr=str_replace('"','', $google_addr);
                          
    //                       if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                              
    //                         //   echo '<br> i am inside if address is empty '.$google_addr;
    //                               $google_link = array("google_link"=>"None");
    //                               $google_link_jsn = json_encode($google_link);
    //                       }else{
                              
    //                         //   echo '<br> i am inside else when address is not  empty '.$google_addr;
    //                           $google_link = array("google_link"=>$google_addr);
    //                           $google_link_jsn = json_encode($google_link);
    //                       }
                          
    //                       // VALIDATIONS to remove ' and ʹ and ! 
                        
                             
    //                       $pic_up=trim(preg_replace('!\s+!', ' ',$data['G']));
    //                       $pic_up=str_replace("ʹ","", $pic_up);
                       
                           
    //                       $notes=preg_replace('!\s+!', ' ',$data['I']);
    //                       $notes=str_replace("ʹ","", $notes);
                     
                           
    //                       $food_t=preg_replace('!\s+!', ' ',$data['K']);
    //                       $food_t=str_replace("ʹ","", $food_t);
                          
    //               // End Validations **************************************
    //                     // $ii
    //                     //  $error_details[0]=$errors_str;
                        
    //                     $all_detail=array('discard'=>0,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $f_name, 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => $addr,'pickUp' => $pic_up, 'delivery_time' => $data['H'], 'note' => $notes, 'food_type' => $food_t, 'notification' => preg_replace('!\s+!', ' ',$data['J']),'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id' =>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'file_name'=>$file_name);
    //                       $all_detail = json_encode($all_detail);
                          
    //                     //  .' ,'.$data['F']
    //                       $mul_add=array();
                          
                          
    //                     //   Address check and balance
    //                         $Addresscheck=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
    //                         $Addresscheck=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $Addresscheck); 
                         
    //                       $Addresscheck= trim(preg_replace('!\s+!', ' ',str_replace("'","",$Addresscheck)));
                           
    //                       $Addresscheck=str_replace("ʹ","", $Addresscheck);
    //                       $Addresscheck=str_replace(" ‏","", $Addresscheck);
    //                       $Addresscheck=str_replace("‏","", $Addresscheck);
                        
    //                     //   End address check n balance
                          
                          
                          
    //                       $fix=(object)array('address' => $Addresscheck, 'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'google_link_addrs'=>$google_addr );
                         
                        
    //                     // echo '<br> i am mul <br><pre>';
                        
    //                      array_push($mul_add, $fix);
    //                     //   print_r($mul_add);
    //                       $mul_add = json_encode($mul_add);
                          
                          
    //                     $temp = (object)array('discard'=>0,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $f_name, 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => $addr,'pickUp' => $pic_up, 'delivery_time' => $data['H'], 'note' => $notes, 'food_type' => $food_t, 'notification' => preg_replace('!\s+!', ' ',$data['J']),'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id' =>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'mul_add'=>$mul_add,'all_detail'=>$all_detail);
                        
                        
    //                  }else{
                         
    //                       $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$data['E'])));
    //                       $google_addr=str_replace("ʹ","", $google_addr);
    //                       $google_addr=str_replace('"','', $google_addr);
                          
    //                       if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                              
    //                         //   echo '<br> i am inside if address is empty '.$google_addr;
    //                               $google_link = array("google_link"=>"None");
    //                               $google_link_jsn = json_encode($google_link);
    //                       }else{
                              
    //                         //   echo '<br> i am inside else when address is not  empty '.$google_addr;
    //                           $google_link = array("google_link"=>$google_addr);
    //                           $google_link_jsn = json_encode($google_link);
    //                       }
    //                      $all_detail=array('discard'=>1,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $data['B'], 'phone' => $data['A'], 'address' => $data['D'].' ,'.$data['F'],'pickUp' => $data['G'], 'delivery_time' => $data['H'], 'note' => $data['I'], 'food_type' => $data['K'], 'notification' => preg_replace('!\s+!', ' ',$data['J']),'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id'=>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'file_name'=>$file_name);
    //                      $all_detail = json_encode($all_detail);
                         
                         
    //                      $mul_add=array();
    //                     //  .' ,'.$data['F']
    //                      $fix=(object)array('address' => $data['D'], 'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'google_link_addrs'=>$google_addr );
    //                      array_push($mul_add, $fix);
    //                     //   print_r($mul_add);
    //                       $mul_add = json_encode($mul_add);
                        
    //                     // echo '<br> i am mul <br>';
    //                     // print_r($mul_add);
    //                      //  array_push($mul_add, $data['D'].' ,'.$data['F']);
                         
                         
    //                     //  array_push($mul_add, $data['D'].' ,'.$data['F']);
    //                       $mul_add = json_encode($mul_add);
                         
                         
    //                      $temp = (object)array('discard'=>1,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $data['B'], 'phone' => $data['A'], 'address' => $data['D'].' ,'.$data['F'],'pickUp' => $data['G'], 'delivery_time' => $data['H'], 'note' => $data['I'], 'food_type' => $data['K'], 'notification' => preg_replace('!\s+!', ' ',$data['J']),'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id'=>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'all_detail'=>$all_detail,'mul_add'=>$mul_add);
                        
    //                     //   echo '<br> DISCARDEDD <br>';
    //                  }
                     
    //                     $z_index=$z_index+1;
    //                     array_push($file_data, $temp);
    //               //  }
    //             }
    //             // echo '<br>i am file data <pre>';
    //             // print_r($file_data); 
                
    //         }
            
    //         // die();
            
    //                 // echo '<pre> <br> i am duplicate check array <br>';
    //                 //  print_r($check_duplicate);
              
    //           $unique = array_unique($check_duplicate);
    //           $duplicates = array_diff_assoc($check_duplicate, $unique);
                   
    //                 //  echo '<pre> <br> i am the result <br>';
    //                 //  print_r($duplicates);
    //             $unique_phone = array_unique($check_duplicate_contact);
    //           $duplicates_phone = array_diff_assoc($check_duplicate_contact, $unique_phone);     
                     
    //             // for dublicate customer codes
    //              foreach($duplicates AS $index_=>$value_){
                     
    //                 //  echo '<br> i am index :'.$index_.' i am value :'.$value_.'<br><pre>';
    //                 //  print_r($file_data[$index_]);
                     
    //                  if($file_data[$index_]->pcustomer_id == $value_)
    //                  {
    //                     //  echo '<br> yes its matched <br> <pre>';
    //                      $file_data[$index_]->discard=1;
    //                      array_push($file_data[$index_]->error_details,'Dublicate Customer Id found.');
    //                                 //  print_r($file_data[$index_]);
    //                  }
                     
    //              }
        
    //             //  For duplicate contacts
    //              foreach($duplicates_phone AS $index_=>$value_){
                     
    //                 //  echo '<br> i am index :'.$index_.' i am value :'.$value_.'<br><pre>';
    //                 //  print_r($file_data[$index_]);
                     
    //                  if($file_data[$index_]->phone == $value_)
    //                  {
    //                     //  echo '<br> yes its matched <br> <pre>';
    //                      $file_data[$index_]->discard=1;
    //                      array_push($file_data[$index_]->error_details,'Dublicate Phone No found.');
    //                                 //  print_r($file_data[$index_]);
    //                  }
                     
    //              }
                
    //         // die();
    //         // echo '<pre> below is file data';
    //         //     print_r($file_data);
    //         //     die();
           
            
    //      $this->session->set_userdata("file_data",$file_data);
    //         $data['file_data'] =  $this->session->userdata("file_data");
    //         $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
    //       // $data['vendors'] =  $this->vendor_model->get_where(array());
    //         $where = array('status' => 1);
    //         $data["vendor_id"] = $this->input->post('vendor_id');
    //          $data['types'] =  $this->order_model->get_deliveries_type_where($where);
    //         //  $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
    //         //  $data['types']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
            
    //          $where1 = array('status'=> 1,'is_deleted'=>0);
    //     $data['vendors'] =  $this->vendor_model->get_where($where1);
    //     // echo '<pre>';
    //     // print_r($data);
    //     // die();
       
    //         // $this->load->view('order/temp_order', $data);
    //         $this->load->view('Monthly_deliveries/upload_file_holded', $data);
    //     //}
         
    // }
    
    // old version mealplan setting start
    //  public function upload_customers_file_by_general_file_www(){
    //     $this->load->model('driver_model');
    //     $this->load->model('Vendor_model');
    //      $this->load->model('Order_model');
        
    //     require 'vendor/autoload.php';
    //     $file_data = array();
        
    //      $where_vend['id']=$this->input->post('vendor_id');
         
    //      $vendor_name_is = $this->Vendor_model->get_vendor_name_TA($where_vend);
         
    //      if($vendor_name_is){
    //          $vendor_name_is_= $vendor_name_is[0]->full_name;
    //      }else{
    //          $vendor_name_is_ = 'nothing';
    //      }
        

    //     $file_name = $this->upload_doc_customers_meta(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], $vendor_name_is_.'_'.'CutomersMeta');
        
       

    //     if ( ! $file_name)
    //     {
    //         $where1 = array('status'=> 1,'is_deleted'=>0);
    //         $data['vendors'] =  $this->vendor_model->get_where($where1);
    //         $data['error'] = 'not upload';
    //         //$this->load->view('order/upload_file', $data);
    //         $this->load->view('Monthly_deliveries/upload_file_holded', $data);
    //     }
    //     else
    //     {
        
    //     // print_r($file_name);
    //     // echo '<pre>';
    //     // die();
            
    //         //$file = base_url().'upload/'.$file_name;
                      
    //         $file_name = "uploaded_customers_meta/".$file_name;
    //         $sheetIndex = 0;
    //         $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
    //         $reader->setReadDataOnly(TRUE);
    //         $sheetnames = $reader->listWorksheetNames($file_name);
            
    //         $reader->setLoadSheetsOnly($sheetnames[$sheetIndex]);
    //         $spreadsheet = $reader->load($file_name);
           
    //         $namedDataArray = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    //         //   print_r($namedDataArray);
    //         // die();
    //         // echo 'I am a testing of new module <pre>';
            
    //         // $check_duplicate=array();
            
            
    //         //   foreach($namedDataArray AS $ii=>$data){
                        
                      
    //         //         //Used to skip 1st row
    //         //         //OR $data['I'] == '' OR $data['J'] == '' OR $data['K'] == ''
    //         //         if($ii == 1 OR $data['A'] == '' OR $data['B'] == ''  OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == '' OR $data['J'] == ''  ) { continue; }
                   
                   
                    
                 
                    
    //         //          if($data['L'] == '' OR $data['L'] == '0'){
    //         //         echo '<br>';
    //         //          $tempo=substr($vendor_name_is_, 0, 2);
    //         //          $tempid=(strtoupper($tempo).'-'.get_unique_string('4'));  
    //         //         // echo strtoupper($tempo).mt_rand(111111,999999).date("dmy");
    //         //         echo $tempid;
    //         //           $data['L'] =$tempid;
    //         //          }
                     
    //         //          echo '<br>Data is inside one <pre> <br>';
    //         //          print_r($data);
                     
                     
    //         //           $check_duplicate[$ii]=trim($data['L']);
                      
                      
    //         //         //   Checking customer id in not already exist in database 
                    
    //         //         $database_check= $this->Vendor_model->check_unique_customerid_result($data['L']);
                    
    //         //         echo '<br>Database result is';
    //         //         print_r($database_check);
                    
    //         //         if(count($database_check) > 0){
                        
    //         //             echo 'this entry should rejected <br>';
    //         //         }else{
    //         //             echo ' Accepted <br>';
    //         //         }
                    
                    
                    
                    
    //         //          $areaID=$this->order_model->getareaID_withName($data['F']);
    //         //         //   $response['areaID'] = $areaID;
                    
    //         //         echo '<br> area id'.$areaID.'<br>';
                    
    //         //          $emirate_arr=explode(",",$data['H']);
    //         //         $eid=$emirate_arr[0];
                   
    //         //     $emirateID=$this->order_model->getemirateID_withName($eid);
    //         //      echo '<br> emirate id: '.$emirateID.'<br>';
                 
    //         //         $sid=$emirate_arr[1];
                  
    //         //     $slot_ID=$this->order_model->gettimeslotID_withName($sid);
    //         //     echo '<br> slot id: '.$slot_ID.'<br>';
                    
    //         //   }
              
    //         //   echo '<pre> <br> i am duplicate check array <br>';
              
    //         //   print_r($check_duplicate);
              
    //         //   echo '<pre> <br> i am result check array <br>';
              
    //         //   $re=array_values(array_unique(array_diff_key($check_duplicate, array_unique($check_duplicate))));
              
    //         //   print_r($re);
              
    //         //   echo '<br> 2nd';
    //         //   print_r(array_count_values($check_duplicate));
              
    //         //   echo '<br> 3rd';
              
    //         //   $unique = array_unique($check_duplicate);
    //         //   $duplicates = array_diff_assoc($check_duplicate, $unique);
              
    //         //   print_r($duplicates);
    //         //  die();
    //           $check_duplicate_contact=array();
    //           $check_duplicate=array();
    //           $error_details=array();
    //           $discard=false;
    //           $z_index=0;
    //                 foreach($namedDataArray AS $ii=>$data){
                        
                      
    //                 //Used to skip 1st row
    //                 //OR $data['I'] == '' OR $data['J'] == '' OR $data['K'] == ''
                  
                    
    //                 if($ii == 1 OR $data['A'] == '' OR $data['B'] == ''  OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == '' OR $data['J'] == ''  ) { continue; }
    //                     $discard=false;
    //                     $errors_str='';
    //                      $error_details=array();
                         
    //                 //   Check duplicate customer id 
                    
                    
    //                 // check special charcters
                    
    //                  if(!empty($data['L']) OR $data['L'] != '' OR $data['L'] != ' ' OR $data['L'] != '0'){
                             
                             
    //                         //  echo '<br>'.$ii.' i am old id :'.$data['L'];
    //                         $x_filter_id=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['L']); 
    //                         $x_filter_id=preg_replace('/[^A-Za-z_0-9-\s]+/', ' ', $x_filter_id);
    //                         $data['L']=$x_filter_id;
    //                         //  echo '<br>'.$ii.' i am new id :'.$data['L'];
    //                       }
                    
    //                 //  generate auto customer id if its empty
    //                   if($data['L'] == '' OR $data['L'] == '0' OR $data['L'] == ' '){
                            
    //                         //   echo '<br>'.$ii.' i am old id and empty :'.$data['L'];
    //                          $tempo=substr($vendor_name_is_, 0, 2);
    //                          $tempid=(strtoupper($tempo).'-'.get_unique_string('4'));  
    //                                 // echo strtoupper($tempo).mt_rand(111111,999999).date("dmy");
    //                                 //  echo $tempid;
    //                         $data['L'] =$tempid;
                            
    //                         // echo '<br>'.$ii.' i am new id after auto create :'.$data['L']; esha khan
    //                      }
                        
                         
    //                       //   Checking customer id if not already exist in database 
    //                  $database_check= $this->Vendor_model->check_unique_customerid_result($data['L']);
                     
    //                  if($database_check){
    //                       $discard=true;
    //                     //   $error_details[$ii]='There already exists an account registered with this customer id.';
    //                       array_push($error_details,'There already exists an account registered with this customer id.');
    //                  }
                     
    //                   //   Checking customer contact number if not already exist in database 
    //                  $phone_check= $this->Vendor_model->check_unique_phone_result(validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A'])))));
                     
    //                  if($phone_check){
    //                       $discard=true;
    //                     //   $error_details[$ii]='There already exists an account registered with this customer id.';
    //                       array_push($error_details,'There already exists an account registered with this phone number.');
    //                  }
                     
    //                 // end duplicate customer id check
                   
                   
    //                 //   check Area with emirate
                   
    //                     $areaID=$this->order_model->getareaID_withName($data['F']);
    //                     if(!$areaID){
    //                         $discard=true;
    //                         // $error_details[$ii]='Area does not exists.';
    //                         array_push($error_details,'Area does not exists.');
    //                       }
    //                             // echo '<br> area id'.$areaID.'<br>';
                    
    //                     $emirate_arr=explode(",",$data['H']);
    //                     $eid=$emirate_arr[0];
                   
    //                      $emirateID=$this->order_model->getemirateID_withName($eid);
    //                             // echo '<br> emirate id: '.$emirateID.'<br>';
    //                      if(!$emirateID){
    //                          $discard=true;
    //                         //  $error_details[$ii]='Emirate does not exists.';
    //                          array_push($error_details,'Emirate does not exists.');
    //                      }
                 
    //                      $sid=$emirate_arr[1];
                  
    //                      $slot_ID=$this->order_model->gettimeslotID_withName($sid);
    //                             //  echo '<br> slot id: '.$slot_ID.'<br>';
    //                      if(!$slot_ID){
    //                          $discard=true;
    //                         //  $error_details[$ii]='Time Slot does not exists.';
    //                          array_push($error_details,'Time Slot does not exists.');
    //                      }
                   
                   
    //               //    End check area and emirate
                   
    //               if(!$discard){
                       
    //                   //  insert for futher checking
    //                   $check_duplicate[$z_index]=trim($data['L']);
    //                   $check_duplicate_contact[$z_index]=validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
                      
                      
    //                     $phone = $data['A'];
    //               //  if($data[1] && $data[3] && $data[4]) {
                 
    //             //  Phone number
    //                 if($data['A']!="" or $data['A']!=" "){
    //                     $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
    //                     }
                    
    //                     $customer_id = 0;
                        
                             
    //              //  fullName             
    //                       $f_name=trim(preg_replace('!\s+!', ' ', $data['B']));
    //                       $f_name=str_replace("ʹ","", $f_name);
                            
    //              //  Email   
                 
    //              if(!empty($data['C'])){
    //                         if (filter_var($data['C'], FILTER_VALIDATE_EMAIL)) {
    //                                 // echo("$email is a valid email address");
                                    
    //                                  $condition=array('email' => $data['C']);
    //                               $email_check = $this->Order_model->check_customer_email_TA($condition);
    //                               if($email_check){
    //                                 //   $errors_str='"'.$data['C'].'" There already exists an account registered with this email address.';
    //                                     array_push($error_details,'"'.$data['C'].'" There already exists an account registered with this email address.');
    //                                   $data['C']='';
    //                               }
    //                          }else{
    //                                 // echo("$email is not a valid email address");
    //                                 // $errors_str='"'.$data['C'].'" This email address is not valid.';
    //                                  array_push($error_details,'"'.$data['C'].'" This email address is not valid.');
    //                                 $data['C']='';
    //                               }
                                  
    //              }else{
    //                  $data['C']='';
    //              }
                              
    //             // Address  
                
    //                 // echo 'test simple address is<br>'.$data['C'].'<br>';
    //                         $x_filter_address=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
    //                         $x_filter_address=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $x_filter_address); 
                         
    //                       $addr= trim(preg_replace('!\s+!', ' ',str_replace("'","",$x_filter_address.', '.$data['F'])));
                           
    //                       $addr=str_replace("ʹ","", $addr);
    //                       $addr=str_replace(" ‏","", $addr);
    //                       $addr=str_replace("‏","", $addr);
                
                
                
                
                
    //         //Google address  
    //                           $google_addr="";
    //                           $google_link = array("google_link"=>"None");
                            
    //                      $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$data['E'])));
    //                       $google_addr=str_replace("ʹ","", $google_addr);
    //                       $google_addr=str_replace('"','', $google_addr);
                          
    //                       if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                              
    //                         //   echo '<br> i am inside if address is empty '.$google_addr;
    //                               $google_link = array("google_link"=>"None");
    //                               $google_link_jsn = json_encode($google_link);
    //                       }else{
                              
    //                         //   echo '<br> i am inside else when address is not  empty '.$google_addr;
    //                           $google_link = array("google_link"=>$google_addr);
    //                           $google_link_jsn = json_encode($google_link);
    //                       }
                          
    //                       // VALIDATIONS to remove ' and ʹ and ! 
                        
                             
    //                       $pic_up=trim(preg_replace('!\s+!', ' ',$data['G']));
    //                       $pic_up=str_replace("ʹ","", $pic_up);
                       
                           
    //                       $notes=preg_replace('!\s+!', ' ',$data['I']);
    //                       $notes=str_replace("ʹ","", $notes);
                     
                           
    //                       $food_t=preg_replace('!\s+!', ' ',$data['K']);
    //                       $food_t=str_replace("ʹ","", $food_t);
                          
    //               // End Validations **************************************
    //                     // $ii
    //                     //  $error_details[0]=$errors_str;
                        
    //                     $all_detail=array('discard'=>0,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $f_name, 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => $addr,'pickUp' => $pic_up, 'delivery_time' => $data['H'], 'note' => $notes, 'food_type' => $food_t, 'notification' => preg_replace('!\s+!', ' ',$data['J']),'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id' =>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'file_name'=>$file_name);
    //                       $all_detail = json_encode($all_detail);
                          
    //                     //  .' ,'.$data['F']
    //                       $mul_add=array();
                          
                          
    //                     //   Address check and balance
    //                         $Addresscheck=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
    //                         $Addresscheck=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $Addresscheck); 
                         
    //                       $Addresscheck= trim(preg_replace('!\s+!', ' ',str_replace("'","",$Addresscheck)));
                           
    //                       $Addresscheck=str_replace("ʹ","", $Addresscheck);
    //                       $Addresscheck=str_replace(" ‏","", $Addresscheck);
    //                       $Addresscheck=str_replace("‏","", $Addresscheck);
                        
    //                     //   End address check n balance
                          
                          
                          
    //                       $fix=(object)array('address' => $Addresscheck, 'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'google_link_addrs'=>$google_addr );
                         
                        
    //                     // echo '<br> i am mul <br><pre>';
                        
    //                      array_push($mul_add, $fix);
    //                     //   print_r($mul_add);
    //                       $mul_add = json_encode($mul_add);
                          
                          
    //                     $temp = (object)array('discard'=>0,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $f_name, 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => $addr,'pickUp' => $pic_up, 'delivery_time' => $data['H'], 'note' => $notes, 'food_type' => $food_t, 'notification' => preg_replace('!\s+!', ' ',$data['J']),'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id' =>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'mul_add'=>$mul_add,'all_detail'=>$all_detail);
                        
                        
    //                  }else{
                         
    //                       $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$data['E'])));
    //                       $google_addr=str_replace("ʹ","", $google_addr);
    //                       $google_addr=str_replace('"','', $google_addr);
                          
    //                       if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                              
    //                         //   echo '<br> i am inside if address is empty '.$google_addr;
    //                               $google_link = array("google_link"=>"None");
    //                               $google_link_jsn = json_encode($google_link);
    //                       }else{
                              
    //                         //   echo '<br> i am inside else when address is not  empty '.$google_addr;
    //                           $google_link = array("google_link"=>$google_addr);
    //                           $google_link_jsn = json_encode($google_link);
    //                       }
    //                      $all_detail=array('discard'=>1,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $data['B'], 'phone' => $data['A'], 'address' => $data['D'].' ,'.$data['F'],'pickUp' => $data['G'], 'delivery_time' => $data['H'], 'note' => $data['I'], 'food_type' => $data['K'], 'notification' => preg_replace('!\s+!', ' ',$data['J']),'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id'=>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'file_name'=>$file_name);
    //                      $all_detail = json_encode($all_detail);
                         
                         
    //                      $mul_add=array();
    //                     //  .' ,'.$data['F']
    //                      $fix=(object)array('address' => $data['D'], 'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'google_link_addrs'=>$google_addr );
    //                      array_push($mul_add, $fix);
    //                     //   print_r($mul_add);
    //                       $mul_add = json_encode($mul_add);
                        
    //                     // echo '<br> i am mul <br>';
    //                     // print_r($mul_add);
    //                      //  array_push($mul_add, $data['D'].' ,'.$data['F']);
                         
                         
    //                     //  array_push($mul_add, $data['D'].' ,'.$data['F']);
    //                       $mul_add = json_encode($mul_add);
                         
                         
    //                      $temp = (object)array('discard'=>1,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $data['B'], 'phone' => $data['A'], 'address' => $data['D'].' ,'.$data['F'],'pickUp' => $data['G'], 'delivery_time' => $data['H'], 'note' => $data['I'], 'food_type' => $data['K'], 'notification' => preg_replace('!\s+!', ' ',$data['J']),'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id'=>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'all_detail'=>$all_detail,'mul_add'=>$mul_add);
                        
    //                     //   echo '<br> DISCARDEDD <br>';
    //                  }
                     
    //                     $z_index=$z_index+1;
    //                     array_push($file_data, $temp);
    //               //  }
    //             }
    //             // echo '<br>i am file data <pre>';
    //             // print_r($file_data); 
                
    //         }
            
    //         // die();
            
    //                 // echo '<pre> <br> i am duplicate check array <br>';
    //                 //  print_r($check_duplicate);
              
    //           $unique = array_unique($check_duplicate);
    //           $duplicates = array_diff_assoc($check_duplicate, $unique);
                   
    //                 //  echo '<pre> <br> i am the result <br>';
    //                 //  print_r($duplicates);
    //             $unique_phone = array_unique($check_duplicate_contact);
    //           $duplicates_phone = array_diff_assoc($check_duplicate_contact, $unique_phone);     
                     
    //             // for dublicate customer codes
    //              foreach($duplicates AS $index_=>$value_){
                     
    //                 //  echo '<br> i am index :'.$index_.' i am value :'.$value_.'<br><pre>';
    //                 //  print_r($file_data[$index_]);
                     
    //                  if($file_data[$index_]->pcustomer_id == $value_)
    //                  {
    //                     //  echo '<br> yes its matched <br> <pre>';
    //                      $file_data[$index_]->discard=1;
    //                      array_push($file_data[$index_]->error_details,'Dublicate Customer Id found.');
    //                                 //  print_r($file_data[$index_]);
    //                  }
                     
    //              }
        
    //             //  For duplicate contacts
    //              foreach($duplicates_phone AS $index_=>$value_){
                     
    //                 //  echo '<br> i am index :'.$index_.' i am value :'.$value_.'<br><pre>';
    //                 //  print_r($file_data[$index_]);
                     
    //                  if($file_data[$index_]->phone == $value_)
    //                  {
    //                     //  echo '<br> yes its matched <br> <pre>';
    //                      $file_data[$index_]->discard=1;
    //                      array_push($file_data[$index_]->error_details,'Dublicate Phone No found.');
    //                                 //  print_r($file_data[$index_]);
    //                  }
                     
    //              }
                
    //         // die();
    //         // echo '<pre> below is file data';
    //         //     print_r($file_data);
    //         //     die();
           
            
    //      $this->session->set_userdata("file_data",$file_data);
    //         $data['file_data'] =  $this->session->userdata("file_data");
    //         $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
    //       // $data['vendors'] =  $this->vendor_model->get_where(array());
    //         $where = array('status' => 1);
    //         $data["vendor_id"] = $this->input->post('vendor_id');
    //          $data['types'] =  $this->order_model->get_deliveries_type_where($where);
    //         //  $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
    //         //  $data['types']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
            
    //          $where1 = array('status'=> 1,'is_deleted'=>0);
    //     $data['vendors'] =  $this->vendor_model->get_where($where1);
    //     // echo '<pre>';
    //     // print_r($data);
    //     // die();
       
    //         // $this->load->view('order/temp_order', $data);
    //         $this->load->view('Monthly_deliveries/upload_file_holded', $data);
    //     //}
         
    // }
    //  old version mealplan setting end
    
    
    public function upload_customers_file_by_general_file(){
        
        $this->load->model('driver_model');
        $this->load->model('Vendor_model');
         $this->load->model('Order_model');
        
        require 'vendor/autoload.php';
        $file_data = array();
        
         $where_vend['id']=$this->input->post('vendor_id');
         
         $vendor_name_is = $this->Vendor_model->get_vendor_name_TA($where_vend);
         
         if($vendor_name_is){
             $vendor_name_is_= $vendor_name_is[0]->full_name;
         }else{
             $vendor_name_is_ = 'nothing';
         }
        

        $file_name = $this->upload_doc_customers_meta(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], $vendor_name_is_.'_'.'CutomersMeta');
        
       

        if ( ! $file_name)
        {
            $where1 = array('status'=> 1,'is_deleted'=>0);
            $data['vendors'] =  $this->vendor_model->get_where($where1);
            $data['error'] = 'not upload';
            //$this->load->view('order/upload_file', $data);
            $this->load->view('Monthly_deliveries/upload_file_holded', $data);
        }
        else
        {
        
        // print_r($file_name);
        // echo '<pre>';
        // die();
            
            //$file = base_url().'upload/'.$file_name;
                      
            $file_name = "uploaded_customers_meta/".$file_name;
            $sheetIndex = 0;
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(TRUE);
            $sheetnames = $reader->listWorksheetNames($file_name);
            
            $reader->setLoadSheetsOnly($sheetnames[$sheetIndex]);
            $spreadsheet = $reader->load($file_name);
           
            $namedDataArray = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            //   print_r($namedDataArray);
            // die();
            // echo 'I am a testing of new module <pre>';
            
            // $check_duplicate=array();
            
            
            //   foreach($namedDataArray AS $ii=>$data){
                        
                      
            //         //Used to skip 1st row
            //         //OR $data['I'] == '' OR $data['J'] == '' OR $data['K'] == ''
            //         if($ii == 1 OR $data['A'] == '' OR $data['B'] == ''  OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == '' OR $data['J'] == ''  ) { continue; }
                   
                   
                    
                 
                    
            //          if($data['L'] == '' OR $data['L'] == '0'){
            //         echo '<br>';
            //          $tempo=substr($vendor_name_is_, 0, 2);
            //          $tempid=(strtoupper($tempo).'-'.get_unique_string('4'));  
            //         // echo strtoupper($tempo).mt_rand(111111,999999).date("dmy");
            //         echo $tempid;
            //           $data['L'] =$tempid;
            //          }
                     
            //          echo '<br>Data is inside one <pre> <br>';
            //          print_r($data);
                     
                     
            //           $check_duplicate[$ii]=trim($data['L']);
                      
                      
            //         //   Checking customer id in not already exist in database 
                    
            //         $database_check= $this->Vendor_model->check_unique_customerid_result($data['L']);
                    
            //         echo '<br>Database result is';
            //         print_r($database_check);
                    
            //         if(count($database_check) > 0){
                        
            //             echo 'this entry should rejected <br>';
            //         }else{
            //             echo ' Accepted <br>';
            //         }
                    
                    
                    
                    
            //          $areaID=$this->order_model->getareaID_withName($data['F']);
            //         //   $response['areaID'] = $areaID;
                    
            //         echo '<br> area id'.$areaID.'<br>';
                    
            //          $emirate_arr=explode(",",$data['H']);
            //         $eid=$emirate_arr[0];
                   
            //     $emirateID=$this->order_model->getemirateID_withName($eid);
            //      echo '<br> emirate id: '.$emirateID.'<br>';
                 
            //         $sid=$emirate_arr[1];
                  
            //     $slot_ID=$this->order_model->gettimeslotID_withName($sid);
            //     echo '<br> slot id: '.$slot_ID.'<br>';
                    
            //   }
              
            //   echo '<pre> <br> i am duplicate check array <br>';
              
            //   print_r($check_duplicate);
              
            //   echo '<pre> <br> i am result check array <br>';
              
            //   $re=array_values(array_unique(array_diff_key($check_duplicate, array_unique($check_duplicate))));
              
            //   print_r($re);
              
            //   echo '<br> 2nd';
            //   print_r(array_count_values($check_duplicate));
              
            //   echo '<br> 3rd';
              
            //   $unique = array_unique($check_duplicate);
            //   $duplicates = array_diff_assoc($check_duplicate, $unique);
              
            //   print_r($duplicates);
            //  die();
              $check_duplicate_contact=array();
              $check_duplicate=array();
              $error_details=array();
              $discard=false;
              $z_index=0;
                    foreach($namedDataArray AS $ii=>$data){
                        
                      
                    //Used to skip 1st row
                    //OR $data['I'] == '' OR $data['J'] == '' OR $data['K'] == ''
                  
                    // OR $data['H'] == '' OR $data['J'] == ''
                    if($ii == 1 OR $data['A'] == '' OR $data['B'] == ''  OR $data['D'] == '' OR $data['F'] == ''   ) { continue; }
                        $discard=false;
                        $errors_str='';
                         $error_details=array();
                         
                    //   Check duplicate customer id 
                    
                    
                    // check special charcters
                    
                     if(!empty($data['L']) OR $data['L'] != '' OR $data['L'] != ' ' OR $data['L'] != '0'){
                             
                             
                            //  echo '<br>'.$ii.' i am old id :'.$data['L'];
                            $x_filter_id=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['L']); 
                            $x_filter_id=preg_replace('/[^A-Za-z_0-9-\s]+/', ' ', $x_filter_id);
                            $data['L']=$x_filter_id;
                            //  echo '<br>'.$ii.' i am new id :'.$data['L'];
                          }
                    
                    //  generate auto customer id if its empty
                       if($data['L'] == '' OR $data['L'] == '0' OR $data['L'] == ' '){
                            
                            //   echo '<br>'.$ii.' i am old id and empty :'.$data['L'];
                             $tempo=substr($vendor_name_is_, 0, 2);
                             $tempid=(strtoupper($tempo).'-'.get_unique_string('4'));  
                                    // echo strtoupper($tempo).mt_rand(111111,999999).date("dmy");
                                    //  echo $tempid;
                            $data['L'] =$tempid;
                            
                            // echo '<br>'.$ii.' i am new id after auto create :'.$data['L']; esha khan
                         }
                        
                         
                          //   Checking customer id if not already exist in database 
                     $database_check= $this->Vendor_model->check_unique_customerid_result($data['L']);
                     
                     if($database_check){
                          $discard=true;
                        //   $error_details[$ii]='There already exists an account registered with this customer id.';
                          array_push($error_details,'There already exists an account registered with this customer id.');
                     }
                     
                       //   Checking customer contact number if not already exist in database 
                    //  $phone_check= $this->Vendor_model->check_unique_phone_result(validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A'])))));
                   
                //  Tahababycoco  $addrs_filterization, New approach bcz multi partner deal krne aur logx mai phly se hi bht duplicate entry hyn agar address bhi chnge hy to new customer create ho ra
                   $addrs_filterization=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
                   
                 
                   $where_condition_for_duplicate_user=array(
                       'vendor_id'=>$this->input->post('vendor_id'),
                       'phone'=>validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))))
                       );
                     $phone_check= $this->customer_model->get_where($where_condition_for_duplicate_user);
                //   echo '<pre>';
                //     print_r($this->db->last_query());
                    // array_push($error_details,'yeeeee: '.);
                     
                     if($phone_check){
                          $discard=true;
                        //   $error_details[$ii]='There already exists an account registered with this customer id.'; .'-'.$phone_check[0]->id
                          array_push($error_details,'There already exists an account registered with this phone number.');
                     }
                     
                    // end duplicate customer id check
                   
                   
                    //   check Area with emirate
                   
                        $areaID=$this->order_model->getareaID_withName($data['F']);
                        if(!$areaID){
                            $discard=true;
                            // $error_details[$ii]='Area does not exists.';
                            array_push($error_details,'Area does not exists.');
                          }
                                // echo '<br> area id'.$areaID.'<br>';
                    
                        $emirate_arr=explode(",",$data['H']);
                        $eid=$emirate_arr[0];
                   
                         $emirateID=$this->order_model->getemirateID_withName($eid);
                                // echo '<br> emirate id: '.$emirateID.'<br>';
                         if(!$emirateID){
                             $discard=true;
                            //  $error_details[$ii]='Emirate does not exists.';
                             array_push($error_details,'Emirate does not exists.');
                         }
                 
                         $sid=$emirate_arr[1];
                  
                         $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                                //  echo '<br> slot id: '.$slot_ID.'<br>';
                         if(!$slot_ID){
                             $discard=true;
                            //  $error_details[$ii]='Time Slot does not exists.';
                             array_push($error_details,'Time Slot does not exists.');
                         }
                   
                   
                  //    End check area and emirate
                   
                   if(!$discard){
                       
                       //  insert for futher checking
                      $check_duplicate[$z_index]=trim($data['L']);
                      $check_duplicate_contact[$z_index]=validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
                      
                      
                        $phone = $data['A'];
                  //  if($data[1] && $data[3] && $data[4]) {
                 
                //  Phone number
                    if($data['A']!="" or $data['A']!=" "){
                        $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data['A']))));
                        }
                    
                        $customer_id = 0;
                        
                             
                 //  fullName             
                          $f_name=trim(preg_replace('!\s+!', ' ', $data['B']));
                          $f_name=str_replace("ʹ","", $f_name);
                            
                 //  Email   
                 
                 if(!empty($data['C'])){
                            if (filter_var($data['C'], FILTER_VALIDATE_EMAIL)) {
                                    // echo("$email is a valid email address");
                                    
                                     $condition=array('email' => $data['C']);
                                   $email_check = $this->Order_model->check_customer_email_TA($condition);
                                   if($email_check){
                                    //   $errors_str='"'.$data['C'].'" There already exists an account registered with this email address.';
                                        array_push($error_details,'"'.$data['C'].'" There already exists an account registered with this email address.');
                                       $data['C']='';
                                   }
                             }else{
                                    // echo("$email is not a valid email address");
                                    // $errors_str='"'.$data['C'].'" This email address is not valid.';
                                     array_push($error_details,'"'.$data['C'].'" This email address is not valid.');
                                    $data['C']='';
                                  }
                                  
                 }else{
                     $data['C']='';
                 }
                              
                // Address  
                
                    // echo 'test simple address is<br>'.$data['C'].'<br>';
                            $x_filter_address=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
                            $x_filter_address=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $x_filter_address); 
                         
                          $addr= trim(preg_replace('!\s+!', ' ',str_replace("'","",$x_filter_address.', '.$data['F'])));
                           
                          $addr=str_replace("ʹ","", $addr);
                          $addr=str_replace(" ‏","", $addr);
                          $addr=str_replace("‏","", $addr);
                
                
                
                
                
            //Google address  
                              $google_addr="";
                              $google_link = array("google_link"=>"None");
                            
                         $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$data['E'])));
                          $google_addr=str_replace("ʹ","", $google_addr);
                          $google_addr=str_replace('"','', $google_addr);
                          
                          if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                              
                            //   echo '<br> i am inside if address is empty '.$google_addr;
                                  $google_link = array("google_link"=>"None");
                                  $google_link_jsn = json_encode($google_link);
                          }else{
                              
                            //   echo '<br> i am inside else when address is not  empty '.$google_addr;
                              $google_link = array("google_link"=>$google_addr);
                              $google_link_jsn = json_encode($google_link);
                          }
                          
                           // VALIDATIONS to remove ' and ʹ and ! 
                        
                             
                          $pic_up=trim(preg_replace('!\s+!', ' ',$data['G']));
                          $pic_up=str_replace("ʹ","", $pic_up);
                       
                           
                          $notes=preg_replace('!\s+!', ' ',$data['I']);
                          $notes=str_replace("ʹ","", $notes);
                     
                           
                          $food_t=preg_replace('!\s+!', ' ',$data['K']);
                          $food_t=str_replace("ʹ","", $food_t);
                          
                  // End Validations **************************************
                        // $ii
                        //  $error_details[0]=$errors_str;
                        
                        $all_detail=array('discard'=>0,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $f_name, 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => $addr,'pickUp' => $pic_up, 'delivery_time' => $data['H'], 'note' => $notes, 'food_type' => $food_t, 'notification' => $data['J']? preg_replace('!\s+!', ' ',$data['J']):"No",'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id' =>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'file_name'=>$file_name);
                          $all_detail = json_encode($all_detail);
                          
                        //  .' ,'.$data['F']
                          $mul_add=array();
                          
                          
                        //   Address check and balance
                            $Addresscheck=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
                            $Addresscheck=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $Addresscheck); 
                         
                          $Addresscheck= trim(preg_replace('!\s+!', ' ',str_replace("'","",$Addresscheck)));
                           
                          $Addresscheck=str_replace("ʹ","", $Addresscheck);
                          $Addresscheck=str_replace(" ‏","", $Addresscheck);
                          $Addresscheck=str_replace("‏","", $Addresscheck);
                        
                        //   End address check n balance
                          
                          
                          
                          $fix=(object)array('address' => $Addresscheck, 'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'google_link_addrs'=>$google_addr );
                         
                        
                        // echo '<br> i am mul <br><pre>';
                        
                         array_push($mul_add, $fix);
                        //   print_r($mul_add);
                          $mul_add = json_encode($mul_add);
                          
                          
                        $temp = (object)array('discard'=>0,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $f_name, 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => $addr,'pickUp' => $pic_up, 'delivery_time' => $data['H'], 'note' => $notes, 'food_type' => $food_t, 'notification' => $data['J']? preg_replace('!\s+!', ' ',$data['J']):"No",'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id' =>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'mul_add'=>$mul_add,'all_detail'=>$all_detail);
                        
                        
                     }else{
                         
                          $google_addr=trim(preg_replace('!\s+!', '',str_replace("'","",$data['E'])));
                          $google_addr=str_replace("ʹ","", $google_addr);
                          $google_addr=str_replace('"','', $google_addr);
                          
                          if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                              
                            //   echo '<br> i am inside if address is empty '.$google_addr;
                                  $google_link = array("google_link"=>"None");
                                  $google_link_jsn = json_encode($google_link);
                          }else{
                              
                            //   echo '<br> i am inside else when address is not  empty '.$google_addr;
                              $google_link = array("google_link"=>$google_addr);
                              $google_link_jsn = json_encode($google_link);
                          }
                         $all_detail=array('discard'=>1,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $data['B'], 'phone' => $data['A'], 'address' => $data['D'].' ,'.$data['F'],'pickUp' => $data['G'], 'delivery_time' => $data['H'], 'note' => $data['I'], 'food_type' => $data['K'], 'notification' => $data['J']? preg_replace('!\s+!', ' ',$data['J']):"No",'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id'=>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'file_name'=>$file_name);
                         $all_detail = json_encode($all_detail);
                         
                         
                         $mul_add=array();
                        //  .' ,'.$data['F']
                        
                        
                        // APPLY VALIDATIONS FOR DEALING SAME CONTACT NUMBER CUSTOMER Start
                        
                        // Address
                           $x_filter_address=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
                            $x_filter_address=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $x_filter_address); 
                         
                          $addr= trim(preg_replace('!\s+!', ' ',str_replace("'","",$x_filter_address.', '.$data['F'])));
                           
                          $addr=str_replace("ʹ","", $addr);
                          $addr=str_replace(" ‏","", $addr);
                          $addr=str_replace("‏","", $addr);
                        
                        //   Address check and balance
                            $Addresscheck=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$data['D']); 
                            $Addresscheck=preg_replace('/[^A-Za-z_0-9-_#\s]+/', ' ', $Addresscheck); 
                         
                          $Addresscheck= trim(preg_replace('!\s+!', ' ',str_replace("'","",$Addresscheck)));
                           
                          $Addresscheck=str_replace("ʹ","", $Addresscheck);
                          $Addresscheck=str_replace(" ‏","", $Addresscheck);
                          $Addresscheck=str_replace("‏","", $Addresscheck);
                        
                        //   End address check n balance
                        
                        
                        // Name
                         $f_name=trim(preg_replace('!\s+!', ' ', $data['B']));
                          $f_name=str_replace("ʹ","", $f_name);
                            
                 //  Email   
                 
                 if(!empty($data['C'])){
                            if (filter_var($data['C'], FILTER_VALIDATE_EMAIL)) {
                                    // echo("$email is a valid email address");
                                    
                                     $condition=array('email' => $data['C']);
                                   $email_check = $this->Order_model->check_customer_email_TA($condition);
                                   if($email_check){
                                         // array_push($error_details,'"'.$data['C'].'" There already exists an account registered with this email address.');
                                       $data['C']='';
                                   }
                             }else{
                                    // echo("$email is not a valid email address");
                                     //  array_push($error_details,'"'.$data['C'].'" This email address is not valid.');
                                    $data['C']='';
                                  }
                                  
                 }else{
                     $data['C']='';
                 }
                        
                        
                        // print_r($error_details);
                        
                        
                        // REMOVING CUSTOMER UNIQUE ID ASWELL BECAUSE WANTED SMOOTHNES 
                        
                        //   if( (in_array("There already exists an account registered with this phone number.",$error_details) ) AND ( in_array("There already exists an account registered with this customer id.",$error_details) ) AND count($error_details) ==2 ){
                          
                        // //   echo 'im in if check';
                        //       $ofset_is_=array_search("There already exists an account registered with this customer id.",$error_details);
                        //     //  echo '<br> ofset_is_ is:'.$ofset_is_;
                        //       $rs=array_splice($error_details, $ofset_is_, 1);
                        //     //   echo '<br> i am rs'.$rs.'<pre> and new errors are:';
                        //     //   print_r($error_details);
                        //   }
                            //   die();                    
                        
                        
                        // VALIDATIONS to remove ' and ʹ and ! 
                        
                             
                          $pic_up=trim(preg_replace('!\s+!', ' ',$data['G']));
                          $pic_up=str_replace("ʹ","", $pic_up);
                       
                           
                          $notes=preg_replace('!\s+!', ' ',$data['I']);
                          $notes=str_replace("ʹ","", $notes);
                     
                           
                          $food_t=preg_replace('!\s+!', ' ',$data['K']);
                          $food_t=str_replace("ʹ","", $food_t);
                        
                        
                        // APPLY VALIDATIONS FOR DEALING SAME CONTACT NUMBER CUSTOMER End
                        
                        
                        
                        
                        
                        //  $fix=(object)array('address' => $data['D'], 'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'google_link_addrs'=>$google_addr );
                       
                            $fix=(object)array('address' => $Addresscheck, 'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'google_link_addrs'=>$google_addr );
                        
                         array_push($mul_add, $fix);
                        //   print_r($mul_add);
                          $mul_add = json_encode($mul_add);
                        
                        // echo '<br> i am mul <br>';
                        // print_r($mul_add);
                         //  array_push($mul_add, $data['D'].' ,'.$data['F']);
                         
                         
                        //  array_push($mul_add, $data['D'].' ,'.$data['F']);
                          $mul_add = json_encode($mul_add);
                         
                         
                        //  $temp = (object)array('discard'=>1,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $data['B'], 'phone' => $data['A'], 'address' => $data['D'].' ,'.$data['F'],'pickUp' => $data['G'], 'delivery_time' => $data['H'], 'note' => $data['I'], 'food_type' => $data['K'], 'notification' => $data['J']? preg_replace('!\s+!', ' ',$data['J']):"No",'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id'=>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'all_detail'=>$all_detail,'mul_add'=>$mul_add);
                             $temp = (object)array('discard'=>1,'error_details'=>$error_details,'area_id'=>$areaID,'emirate_id'=>$emirateID,'slot_id'=>$slot_ID,'area_name'=>$data['F'],'time_slot_with_emirate'=>$data['H'],'pcustomer_id'=>$data['L'],'email'=>$data['C'],'customer_id' => $customer_id, 'full_name' => $f_name, 'phone' => $data['A'], 'address' =>$addr,'pickUp' => $pic_up, 'delivery_time' => $data['H'], 'note' => $notes, 'food_type' => $food_t, 'notification' => $data['J']? preg_replace('!\s+!', ' ',$data['J']):"No",'Delivery_Amount' =>0,'Company_Note'=>'','google_link_addrs'=>$google_link_jsn,'vendor_id'=>$this->input->post('vendor_id'),'vendor_name'=>$vendor_name_is_,'all_detail'=>$all_detail,'mul_add'=>$mul_add);
                        
                        
                        //   echo '<br> DISCARDEDD <br>';
                     }
                     
                        $z_index=$z_index+1;
                        array_push($file_data, $temp);
                  //  }
                }
                // echo '<br>i am file data <pre>';
                // print_r($file_data); 
                
            }
            
            // die();
            
                    // echo '<pre> <br> i am duplicate check array <br>';
                    //  print_r($check_duplicate);
              
               $unique = array_unique($check_duplicate);
               $duplicates = array_diff_assoc($check_duplicate, $unique);
                   
                    //  echo '<pre> <br> i am the result <br>';
                    //  print_r($duplicates);
                $unique_phone = array_unique($check_duplicate_contact);
               $duplicates_phone = array_diff_assoc($check_duplicate_contact, $unique_phone);     
                     
                // for dublicate customer codes
                 foreach($duplicates AS $index_=>$value_){
                     
                    //  echo '<br> i am index :'.$index_.' i am value :'.$value_.'<br><pre>';
                    //  print_r($file_data[$index_]);
                     
                     if($file_data[$index_]->pcustomer_id == $value_)
                     {
                        //  echo '<br> yes its matched <br> <pre>';
                         $file_data[$index_]->discard=1;
                         array_push($file_data[$index_]->error_details,'Dublicate Customer Id found.');
                                    //  print_r($file_data[$index_]);
                     }
                     
                 }
        
                //  For duplicate contacts
                 foreach($duplicates_phone AS $index_=>$value_){
                     
                    //  echo '<br> i am index :'.$index_.' i am value :'.$value_.'<br><pre>';
                    //  print_r($file_data[$index_]);
                     
                     if($file_data[$index_]->phone == $value_)
                     {
                        //  echo '<br> yes its matched <br> <pre>';
                         $file_data[$index_]->discard=1;
                         array_push($file_data[$index_]->error_details,'Dublicate Phone No found.');
                                    //  print_r($file_data[$index_]);
                     }
                     
                 }
                
            // die();
            // echo '<pre> below is file data';
            //     print_r($file_data);
            //     die();
           
            
         $this->session->set_userdata("file_data",$file_data);
            $data['file_data'] =  $this->session->userdata("file_data");
            $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
          // $data['vendors'] =  $this->vendor_model->get_where(array());
            $where = array('status' => 1);
            $data["vendor_id"] = $this->input->post('vendor_id');
             $data['types'] =  $this->order_model->get_deliveries_type_where($where);
            //  $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
            //  $data['types']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
            
             $where1 = array('status'=> 1,'is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        // echo '<pre>';
        // print_r($data);
        // die();
       
            // $this->load->view('order/temp_order', $data);
            $this->load->view('Monthly_deliveries/upload_file_holded', $data);
        //}
         
    }
    
    
     public function upload_doc_customers_meta($tmp_doc, $doc, $name)
    {
        $response = array('success' => false);

        $target_dir = "uploaded_customers_meta/";
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
    
    
    
    // public function save_customer_and_init_plan_old(){
    //     $response = array('success' => false);
        
    //     $index_arr='';

    //     $deliveries_cust =  $this->session->userdata("deliveries_data");
    //                          // echo 'i am deliv userdata session:';
    //                          // echo '<pre>';
    //                          // print_r($deliveries_cust);
    //                          // die();
    //     $plandate= $this->input->post("plandate");
    //     $plan_days= $this->input->post("plan_days");
        
    //                                 // print_r($plandate);
    //                                 // die();
        
    //                                 // foreach ($deliveries_cust as $key => $myorder_cust){
            
    //                                 //   echo 'hello'.date('D', strtotime($plandate[$key]) );
    //                                 // }
    //                                 // die();
    //                                 // test day
    
    //      foreach ($deliveries_cust as $key => $myorder_cust){
    //         //  echo '<br> i am plan date: '.$plandate[$key];
    //         //  echo '<br> i am plan day: '.$plan_days[$key];
            
    //         if($plan_days[$key] > 0){ $plan_days_are=$plan_days[$key]; }else{ $plan_days_are=0; }
    //         $_cust_data=array(
    //             'role_id'          => 4,
    //             'email'            => $myorder_cust->email ,
    //             'phone'            => $myorder_cust->phone,
    //             'full_name'        => $myorder_cust->full_name,         
    //             'address'          => $myorder_cust->address,
    //             'vendor_id'        => $myorder_cust->vendor_id,
    //             'Password_partner' => 'Logx_012',
                
    //             'customer_id'      => $myorder_cust->pcustomer_id,
    //             'mul_address'      => $myorder_cust->mul_add,
    //             'all_detail'       =>$myorder_cust->all_detail,
    //             'plan_start_date'  =>$plandate[$key],
    //             'plan_total_days'  =>$plan_days_are
                
    //             );
            
             
             
    //         //  echo '<pre> customer data is:';
    //         //  print_r($_cust_data);
             
             
    //          $customer_result= $this->order_model->add_customer_meta('users',$_cust_data);
             
             
             
    //          if($customer_result){
    //             if($plan_days[$key] > 0){
    //                 $the_customer_id=$customer_result['id'];
                    
                    
    //                 // Initial plan is creating 
                    
    //                 $plan_data=array(
                          
    //                     'customer_id'      => $the_customer_id,
    //                     'pcustomer_id'     => $myorder_cust->pcustomer_id,
    //                     'all_details'       => $myorder_cust->all_detail,
    //                     'plan_start_date'  => $plandate[$key],
    //                     'total_days'       => $plan_days_are,
    //                     'created_at'       => date("Y-m-d H:i:s"),
    //                     'initial_plan'     => 1,
    //                     'vendor_id'        => $myorder_cust->vendor_id,
    //                     'vendor_name'      => $myorder_cust->vendor_name,
    //                     'completed_status' => 0
                        
    //                     );
                        
    //                     // echo ' i am plan data <pre> <br>';
    //                     // print_r($plan_data);
                    
    //                  $plan_result = $this->order_model->add_customer_meta('monthly_meal_plans',$plan_data);
    //                 // done plan
                    
    //                 //Service Type
    //                   $service_typ = 2;
    //         if($plan_result){    
                
                
    //             // Calculating Priceing start
                
    //             $string_emirate=$myorder_cust->emirate_id.','.$myorder_cust->slot_id;
    //               $ans=$this->order_model->get_partner_price($myorder_cust->vendor_id,date('Y-m-d H:i:sa', strtotime($plandate[$key])),$myorder_cust->emirate_id,$myorder_cust->address,$service_typ,$myorder_cust->delivery_time);
       
    //                         if($ans[0]->ans == 'no'){
                               
    //                                 if($ans[0]->price==''){
    //                                     $p_price=0;
    //                                     $discount_track = '';
    //                                 }else{
    //                                  $p_price=$ans[0]->price;
    //                                  $discount_track = '';
    //                                 }
    //                         }else{
    //                             if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
    //                             $p_price=0;
    //                             else
    //                             $p_price=$ans[0]->same_loc_price;
                                
    //                             // $p_price=$ans[0]->same_loc_price;
    //                           $discount_track =$ans[1]->ids;
                               
    //                           $base_discount_tracker=$ans[1]->ids;
    //                             $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
    //                             $field['discount_track']='0';
    //                             $ansss=$this->order_model->update($field, $where_tracker);
    //                             $response['ansss']=$ansss;
                                
    //                         }
                
    //             // Calculating pricing end
                
                  
                
                
                
                
                
                
                
    //                 $order_data = array(
    //                     'send_notification'   => $myorder_cust->notification,
    //                     'status'              =>  'Not Assign',
    //                     'name_on_delivery'    =>  $myorder_cust->full_name,
    //                     'number_on_delivery'  =>  $myorder_cust->phone,
    //                     'customer_id'         => $the_customer_id,
    //                     'vendor_id'           =>  $myorder_cust->vendor_id,
    //                     // 'signature'           =>  'Yes',
                      
                        
    //                     'delivery_address'    =>  $myorder_cust->address,
    //                     'pickUp'              => $myorder_cust->pickUp,
    //                     'delivery_time'       =>  $myorder_cust->delivery_time,
                    
    //                     'note'                => $myorder_cust->note,
    //                     'created'             => date("Y-m-d H:i:s"),
    //                     'created_user'        => $this->session->userdata('email'),
    //                     'updated_user'        => $this->session->userdata('email'),
    //                     'created_terminal'    => gethostname(),
    //                     'updated_terminal'    => gethostname(),
    //                     'food_type'           => $myorder_cust->food_type,
    //                     'service_type_id'     => $service_typ,
    //                     'areaID'              => $myorder_cust->area_id,
    //                     'emirateID'           => $myorder_cust->emirate_id,
    //                     'slotID'              => $myorder_cust->slot_id,
    //                     'partner_price'       => $p_price,
    //                     'discount_track'      => $discount_track,
                        
    //                     // 'delivery_amount'     =>$myorder_cust->Delivery_Amount,
    //                     // 'company_note'=>$myorder_cust->Company_Note,
                        
    //                     'google_link_addrs'=> $myorder_cust->google_link_addrs,
                        
                        
    //                     'delivery_date'        => date('Y-m-d H:i:s', strtotime($plandate[$key])),
    //                     'pcustomer_id'         => $myorder_cust->pcustomer_id,
    //                     'plan_id'              => $plan_result['id'],
    //                     'day'                  => date('D', strtotime($plandate[$key]) )
                        
                        
    //                 );
                 
    //                 // add first date
                    
    //                             // echo '<br>The first insertion is order data is '.$tt.'<br>  : ';
    //                             //   print_r($order_data);
               
    //              $result = $this->order_model->add_plan_order($order_data);
                         
    //                           //  echo ' i am order tbl rslt: '.$result;
                 
    //                           //   echo 'i start :::'.$plandate[$key].':::';
    //              for($iter=1; $iter < $plan_days[$key]; $iter++){
                 
    //                                       //   echo ' iter: '.$iter.' gen date is: '.date('Y-m-d H:i:sa', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
    //                                       // date('Y-m-d H:i:sa', strtotime($plandate[$key]))
    //                 $order_data['delivery_date'] = date('Y-m-d H:i:s', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
    //                 $order_data['day'] =date('D', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
                          
    //                     // Calculating Priceing start
                
    //             // $string_emirate=$myorder_cust->emirate_id.','.$myorder_cust->slot_id;
    //               $ans=$this->order_model->get_partner_price($myorder_cust->vendor_id,$order_data['delivery_date'],$myorder_cust->emirate_id,$myorder_cust->address,$service_typ,$myorder_cust->delivery_time);
       
    //                         if($ans[0]->ans == 'no'){
                               
    //                                 if($ans[0]->price==''){
    //                                     $p_price=0;
    //                                     $discount_track = '';
    //                                 }else{
    //                                  $p_price=$ans[0]->price;
    //                                  $discount_track = '';
    //                                 }
    //                         }else{
    //                             if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
    //                             $p_price=0;
    //                             else
    //                             $p_price=$ans[0]->same_loc_price;
                                
    //                             // $p_price=$ans[0]->same_loc_price;
    //                           $discount_track =$ans[1]->ids;
                               
    //                           $base_discount_tracker=$ans[1]->ids;
    //                             $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
    //                             $field['discount_track']='0';
    //                             $ansss=$this->order_model->update($field, $where_tracker);
    //                             $response['ansss']=$ansss;
                                
    //                         }
                
    //             // Calculating pricing end
                          
                          
                          
    //                       $order_data['partner_price'] =$p_price;
    //                       $order_data['discount_track'] =$discount_track;
                          
    //                                 //   echo '<br>order data is '.$tt.'<br>  : ';
    //                                 //  print_r($order_data);
    //                       $result = $this->order_model->add_plan_order($order_data);
    //                               //   echo ' i am order tbl rslt: '.$result;
                 
    //                     }
                        
                        
                        
    //             } //end of plan result            
                
    //              }else{
                     
    //              }
    //          }else{
                 
                 
    //              echo 'no customer created'.$customer_result;
    //          }
    //      }
        
        
    //      //  uncomment below if *************
    //             if($result){
    //                   $response['success'] = true;
    //                   $response['vendor_id'] = $vendor_id;
    //                   $response['exceptions'] = $index_arr;
                    
                  
    //                 $this->session->set_flashdata("success","Data is saved Successfully");
    //             }else{
    //                 $this->session->set_flashdata("success","Data is saved Successfully"."else".$index_arr);
    //             }
                
    //             $this->session->unset_userdata("deliveries_data");
    //             $this->session->unset_userdata("file_data");
    //             $this->session->unset_userdata("vendor_id");
                
    //              echo json_encode($response);   
        
          
      
    // }
    
    // New Module TA 25-April-2021 Ends
    
    // 29 may 2021
    
    // below is old version of customer meta setting start
    // public function save_customer_and_init_plan_www(){
    //     $response = array('success' => false);
    //     $response['exceptions']=false;
        
    //     $index_arr='';
    //     $string_exp='';

    //     $deliveries_cust =  $this->session->userdata("deliveries_data");
    //                         //   echo 'i am deliv userdata session:';
    //                         //   echo '<pre>';
    //                         //   print_r($deliveries_cust);
    //                         //   die();
    //     // $plandate= $this->input->post("plandate");
    //     // $plan_days= $this->input->post("plan_days");
        
    //                                 // print_r($plandate);
    //                                 // die();
        
    //                                 // foreach ($deliveries_cust as $key => $myorder_cust){
            
    //                                 //   echo 'hello'.date('D', strtotime($plandate[$key]) );
    //                                 // }
    //                                 // die();
    //                                 // test day
    
    //      foreach ($deliveries_cust as $key => $myorder_cust){
    //         //  echo '<br> i am plan date: '.$plandate[$key];
    //         //  echo '<br> i am plan day: '.$plan_days[$key];
            
    //         if($plan_days[$key] > 0){ $plan_days_are=$plan_days[$key]; }else{ $plan_days_are=0; }
           
    //     //   $myorder_cust->email
    //     // if($key == 0 OR $key == 2){ $tst=NULL;}else{$tst=$myorder_cust->email;}
    //         $_cust_data=array(
    //             'role_id'          => 4,
    //             'email'            => $myorder_cust->email ,
    //             'phone'            => $myorder_cust->phone,
    //             'full_name'        => $myorder_cust->full_name,         
    //             'address'          => $myorder_cust->address,
    //             'vendor_id'        => $myorder_cust->vendor_id,
    //             'Password_partner' => 'Logx_012',
                
    //             'customer_id'      => $myorder_cust->pcustomer_id,
    //             'mul_address'      => $myorder_cust->mul_add,
    //             'all_detail'       =>$myorder_cust->all_detail,
    //             'send_notification' =>$myorder_cust->notification,
    //              'user_notes'       =>$myorder_cust->note
    //             // 'plan_start_date'  =>$plandate[$key],
    //             // 'plan_total_days'  =>$plan_days_are
                
    //             );
            
             
             
    //         //  echo '<pre> customer data is:';
    //         //  print_r($_cust_data);
    //         //  die();
             
             
    //          $customer_result= $this->order_model->add_customer_meta('users',$_cust_data);
             
    //         //  print_r($customer_result);
    //         //  die();
             
             
    //          //  THIS BELOW CODE IS FOR GENERATE CUSTOMER'S INITIAL PLAN . start
            
    //         //  if($customer_result){
              
    //         //     if($plan_days[$key] > 0){
    //         //         $the_customer_id=$customer_result['id'];
                    
                    
    //         //         // Initial plan is creating 
                    
    //         //         $plan_data=array(
                          
    //         //             'customer_id'      => $the_customer_id,
    //         //             'pcustomer_id'     => $myorder_cust->pcustomer_id,
    //         //             'all_details'       => $myorder_cust->all_detail,
    //         //             'plan_start_date'  => $plandate[$key],
    //         //             'total_days'       => $plan_days_are,
    //         //             'created_at'       => date("Y-m-d H:i:s"),
    //         //             'initial_plan'     => 1,
    //         //             'vendor_id'        => $myorder_cust->vendor_id,
    //         //             'vendor_name'      => $myorder_cust->vendor_name,
    //         //             'completed_status' => 0
                        
    //         //             );
                        
    //         //             // echo ' i am plan data <pre> <br>';
    //         //             // print_r($plan_data);
                    
    //         //          $plan_result = $this->order_model->add_customer_meta('monthly_meal_plans',$plan_data);
    //         //         // done plan
                    
    //         //         //Service Type
    //         //           $service_typ = 2;
    //         // if($plan_result){    
                
                
    //         //     // Calculating Priceing start
                
    //         //     $string_emirate=$myorder_cust->emirate_id.','.$myorder_cust->slot_id;
    //         //       $ans=$this->order_model->get_partner_price($myorder_cust->vendor_id,date('Y-m-d H:i:sa', strtotime($plandate[$key])),$myorder_cust->emirate_id,$myorder_cust->address,$service_typ,$myorder_cust->delivery_time);
       
    //         //                 if($ans[0]->ans == 'no'){
                               
    //         //                         if($ans[0]->price==''){
    //         //                             $p_price=0;
    //         //                             $discount_track = '';
    //         //                         }else{
    //         //                          $p_price=$ans[0]->price;
    //         //                          $discount_track = '';
    //         //                         }
    //         //                 }else{
    //         //                     if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
    //         //                     $p_price=0;
    //         //                     else
    //         //                     $p_price=$ans[0]->same_loc_price;
                                
    //         //                     // $p_price=$ans[0]->same_loc_price;
    //         //                   $discount_track =$ans[1]->ids;
                               
    //         //                   $base_discount_tracker=$ans[1]->ids;
    //         //                     $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
    //         //                     $field['discount_track']='0';
    //         //                     $ansss=$this->order_model->update($field, $where_tracker);
    //         //                     $response['ansss']=$ansss;
                                
    //         //                 }
                
    //         //     // Calculating pricing end
                
                  
                
                
                
                
                
                
                
    //         //         $order_data = array(
    //         //             'send_notification'   => $myorder_cust->notification,
    //         //             'status'              =>  'Not Assign',
    //         //             'name_on_delivery'    =>  $myorder_cust->full_name,
    //         //             'number_on_delivery'  =>  $myorder_cust->phone,
    //         //             'customer_id'         => $the_customer_id,
    //         //             'vendor_id'           =>  $myorder_cust->vendor_id,
    //         //             // 'signature'           =>  'Yes',
                      
                        
    //         //             'delivery_address'    =>  $myorder_cust->address,
    //         //             'pickUp'              => $myorder_cust->pickUp,
    //         //             'delivery_time'       =>  $myorder_cust->delivery_time,
                    
    //         //             'note'                => $myorder_cust->note,
    //         //             'created'             => date("Y-m-d H:i:s"),
    //         //             'created_user'        => $this->session->userdata('email'),
    //         //             'updated_user'        => $this->session->userdata('email'),
    //         //             'created_terminal'    => gethostname(),
    //         //             'updated_terminal'    => gethostname(),
    //         //             'food_type'           => $myorder_cust->food_type,
    //         //             'service_type_id'     => $service_typ,
    //         //             'areaID'              => $myorder_cust->area_id,
    //         //             'emirateID'           => $myorder_cust->emirate_id,
    //         //             'slotID'              => $myorder_cust->slot_id,
    //         //             'partner_price'       => $p_price,
    //         //             'discount_track'      => $discount_track,
                        
    //         //             // 'delivery_amount'     =>$myorder_cust->Delivery_Amount,
    //         //             // 'company_note'=>$myorder_cust->Company_Note,
                        
    //         //             'google_link_addrs'=> $myorder_cust->google_link_addrs,
                        
                        
    //         //             'delivery_date'        => date('Y-m-d H:i:s', strtotime($plandate[$key])),
    //         //             'pcustomer_id'         => $myorder_cust->pcustomer_id,
    //         //             'plan_id'              => $plan_result['id'],
    //         //             'day'                  => date('D', strtotime($plandate[$key]) )
                        
                        
    //         //         );
                 
    //         //         // add first date
                    
    //         //                     // echo '<br>The first insertion is order data is '.$tt.'<br>  : ';
    //         //                     //   print_r($order_data);
               
    //         //      $result = $this->order_model->add_plan_order($order_data);
                         
    //         //                   //  echo ' i am order tbl rslt: '.$result;
                 
    //         //                   //   echo 'i start :::'.$plandate[$key].':::';
    //         //      for($iter=1; $iter < $plan_days[$key]; $iter++){
                 
    //         //                               //   echo ' iter: '.$iter.' gen date is: '.date('Y-m-d H:i:sa', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
    //         //                               // date('Y-m-d H:i:sa', strtotime($plandate[$key]))
    //         //         $order_data['delivery_date'] = date('Y-m-d H:i:s', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
    //         //         $order_data['day'] =date('D', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
                          
    //         //             // Calculating Priceing start
                
    //         //     // $string_emirate=$myorder_cust->emirate_id.','.$myorder_cust->slot_id;
    //         //       $ans=$this->order_model->get_partner_price($myorder_cust->vendor_id,$order_data['delivery_date'],$myorder_cust->emirate_id,$myorder_cust->address,$service_typ,$myorder_cust->delivery_time);
       
    //         //                 if($ans[0]->ans == 'no'){
                               
    //         //                         if($ans[0]->price==''){
    //         //                             $p_price=0;
    //         //                             $discount_track = '';
    //         //                         }else{
    //         //                          $p_price=$ans[0]->price;
    //         //                          $discount_track = '';
    //         //                         }
    //         //                 }else{
    //         //                     if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
    //         //                     $p_price=0;
    //         //                     else
    //         //                     $p_price=$ans[0]->same_loc_price;
                                
    //         //                     // $p_price=$ans[0]->same_loc_price;
    //         //                   $discount_track =$ans[1]->ids;
                               
    //         //                   $base_discount_tracker=$ans[1]->ids;
    //         //                     $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
    //         //                     $field['discount_track']='0';
    //         //                     $ansss=$this->order_model->update($field, $where_tracker);
    //         //                     $response['ansss']=$ansss;
                                
    //         //                 }
                
    //         //     // Calculating pricing end
                          
                          
                          
    //         //               $order_data['partner_price'] =$p_price;
    //         //               $order_data['discount_track'] =$discount_track;
                          
    //         //                         //   echo '<br>order data is '.$tt.'<br>  : ';
    //         //                         //  print_r($order_data);
    //         //               $result = $this->order_model->add_plan_order($order_data);
    //         //                       //   echo ' i am order tbl rslt: '.$result;
                 
    //         //             }
                        
                        
                        
    //         //     } //end of plan result            
                
    //         //      }else{
                     
    //         //      }
    //         //  }else{
                 
                 
    //         //      echo 'no customer created'.$customer_result;
    //         //  }
             
             
    //         //  End 
            
            
            
    //         // Comment this when uncomment GENERATE CUSTOMER'S INITIAL PLAN
    //         if($customer_result){
                
    //             // echo 'final result is:'.$customer_result;
    //          }else{
                 
    //             $response['exceptions'] = $response['exceptions'].$myorder_cust->phone.'-'.$myorder_cust->full_name.'-'.$myorder_cust->address.' , ';
    //             $string_exp=$response['exceptions'];
    //         }
            
           
            
    //      } //end of loop
        
        
    //      //  uncomment below if *************
    //             if(!$response['exceptions']){
    //                   $response['success'] = true;
    //                   $response['vendor_id'] = $vendor_id;
                    
    //                 // $this->session->set_flashdata("success","Data is saved Successfully");
    //             }else{
                    
    //                 $response['success'] = true;
    //                 $response['vendor_id'] = $vendor_id;
                    
    //                 // $this->session->set_flashdata("error","Some Data is Not saved Successfully!".$string_exp);
    //             }
                
    //             // echo json_encode($response); 
    //             // die();
                
    //             $this->session->unset_userdata("deliveries_data");
    //             $this->session->unset_userdata("file_data");
    //             $this->session->unset_userdata("vendor_id");
                
    //              echo json_encode($response);   
        
          
      
    // }
    //  Above is old version of customer meta setting End
    
    public function save_customer_and_init_plan(){
        $response = array('success' => false);
        $response['exceptions']=false;
        
        $index_arr='';
        $string_exp='';

        $deliveries_cust =  $this->session->userdata("deliveries_data");
                            //   echo 'i am deliv userdata session:';
                            //   echo '<pre>';
                            //   print_r($deliveries_cust);
                            //   die();
        // $plandate= $this->input->post("plandate");
        // $plan_days= $this->input->post("plan_days");
        
                                    // print_r($plandate);
                                    // die();
        
                                    // foreach ($deliveries_cust as $key => $myorder_cust){
            
                                    //   echo 'hello'.date('D', strtotime($plandate[$key]) );
                                    // }
                                    // die();
                                    // test day
    
         foreach ($deliveries_cust as $key => $myorder_cust){
            //  echo '<br> i am plan date: '.$plandate[$key];
            //  echo '<br> i am plan day: '.$plan_days[$key];
            
            if($plan_days[$key] > 0){ $plan_days_are=$plan_days[$key]; }else{ $plan_days_are=0; }
           
        //   $myorder_cust->email
        // if($key == 0 OR $key == 2){ $tst=NULL;}else{$tst=$myorder_cust->email;}
            $_cust_data=array(
                'role_id'          => 4,
                'email'            => $myorder_cust->email ,
                'phone'            => $myorder_cust->phone,
                'full_name'        => $myorder_cust->full_name,         
                'address'          => $myorder_cust->address,
                'vendor_id'        => $myorder_cust->vendor_id,
                'Password_partner' => 'Logx_012',
                
                'customer_id'      => $myorder_cust->pcustomer_id,
                'mul_address'      => $myorder_cust->mul_add,
                'all_detail'       =>$myorder_cust->all_detail,
                'send_notification' =>$myorder_cust->notification,
                'user_notes'       =>$myorder_cust->note,
               
                // 'plan_start_date'  =>$plandate[$key],
                // 'plan_total_days'  =>$plan_days_are
                
                       'created_dt' => date("Y-m-d H:i:s"),
                        'updated_dt' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'updated_user' => $this->session->userdata('email'),
                        'created_terminal' => gethostname(),
                        'updated_terminal' => gethostname()
                
                );
            
             
             
            //  echo '<pre> customer data is:';
            //  print_r($_cust_data);
            //  die();
             
             
             $customer_result= $this->order_model->add_customer_meta('users',$_cust_data);
             
            //  print_r($customer_result);
            //  die();
             
             
             //  THIS BELOW CODE IS FOR GENERATE CUSTOMER'S INITIAL PLAN . start
            
            //  if($customer_result){
              
            //     if($plan_days[$key] > 0){
            //         $the_customer_id=$customer_result['id'];
                    
                    
            //         // Initial plan is creating 
                    
            //         $plan_data=array(
                          
            //             'customer_id'      => $the_customer_id,
            //             'pcustomer_id'     => $myorder_cust->pcustomer_id,
            //             'all_details'       => $myorder_cust->all_detail,
            //             'plan_start_date'  => $plandate[$key],
            //             'total_days'       => $plan_days_are,
            //             'created_at'       => date("Y-m-d H:i:s"),
            //             'initial_plan'     => 1,
            //             'vendor_id'        => $myorder_cust->vendor_id,
            //             'vendor_name'      => $myorder_cust->vendor_name,
            //             'completed_status' => 0
                        
            //             );
                        
            //             // echo ' i am plan data <pre> <br>';
            //             // print_r($plan_data);
                    
            //          $plan_result = $this->order_model->add_customer_meta('monthly_meal_plans',$plan_data);
            //         // done plan
                    
            //         //Service Type
            //           $service_typ = 2;
            // if($plan_result){    
                
                
            //     // Calculating Priceing start
                
            //     $string_emirate=$myorder_cust->emirate_id.','.$myorder_cust->slot_id;
            //       $ans=$this->order_model->get_partner_price($myorder_cust->vendor_id,date('Y-m-d H:i:sa', strtotime($plandate[$key])),$myorder_cust->emirate_id,$myorder_cust->address,$service_typ,$myorder_cust->delivery_time);
       
            //                 if($ans[0]->ans == 'no'){
                               
            //                         if($ans[0]->price==''){
            //                             $p_price=0;
            //                             $discount_track = '';
            //                         }else{
            //                          $p_price=$ans[0]->price;
            //                          $discount_track = '';
            //                         }
            //                 }else{
            //                     if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
            //                     $p_price=0;
            //                     else
            //                     $p_price=$ans[0]->same_loc_price;
                                
            //                     // $p_price=$ans[0]->same_loc_price;
            //                   $discount_track =$ans[1]->ids;
                               
            //                   $base_discount_tracker=$ans[1]->ids;
            //                     $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
            //                     $field['discount_track']='0';
            //                     $ansss=$this->order_model->update($field, $where_tracker);
            //                     $response['ansss']=$ansss;
                                
            //                 }
                
            //     // Calculating pricing end
                
                  
                
                
                
                
                
                
                
            //         $order_data = array(
            //             'send_notification'   => $myorder_cust->notification,
            //             'status'              =>  'Not Assign',
            //             'name_on_delivery'    =>  $myorder_cust->full_name,
            //             'number_on_delivery'  =>  $myorder_cust->phone,
            //             'customer_id'         => $the_customer_id,
            //             'vendor_id'           =>  $myorder_cust->vendor_id,
            //             // 'signature'           =>  'Yes',
                      
                        
            //             'delivery_address'    =>  $myorder_cust->address,
            //             'pickUp'              => $myorder_cust->pickUp,
            //             'delivery_time'       =>  $myorder_cust->delivery_time,
                    
            //             'note'                => $myorder_cust->note,
            //             'created'             => date("Y-m-d H:i:s"),
            //             'created_user'        => $this->session->userdata('email'),
            //             'updated_user'        => $this->session->userdata('email'),
            //             'created_terminal'    => gethostname(),
            //             'updated_terminal'    => gethostname(),
            //             'food_type'           => $myorder_cust->food_type,
            //             'service_type_id'     => $service_typ,
            //             'areaID'              => $myorder_cust->area_id,
            //             'emirateID'           => $myorder_cust->emirate_id,
            //             'slotID'              => $myorder_cust->slot_id,
            //             'partner_price'       => $p_price,
            //             'discount_track'      => $discount_track,
                        
            //             // 'delivery_amount'     =>$myorder_cust->Delivery_Amount,
            //             // 'company_note'=>$myorder_cust->Company_Note,
                        
            //             'google_link_addrs'=> $myorder_cust->google_link_addrs,
                        
                        
            //             'delivery_date'        => date('Y-m-d H:i:s', strtotime($plandate[$key])),
            //             'pcustomer_id'         => $myorder_cust->pcustomer_id,
            //             'plan_id'              => $plan_result['id'],
            //             'day'                  => date('D', strtotime($plandate[$key]) )
                        
                        
            //         );
                 
            //         // add first date
                    
            //                     // echo '<br>The first insertion is order data is '.$tt.'<br>  : ';
            //                     //   print_r($order_data);
               
            //      $result = $this->order_model->add_plan_order($order_data);
                         
            //                   //  echo ' i am order tbl rslt: '.$result;
                 
            //                   //   echo 'i start :::'.$plandate[$key].':::';
            //      for($iter=1; $iter < $plan_days[$key]; $iter++){
                 
            //                               //   echo ' iter: '.$iter.' gen date is: '.date('Y-m-d H:i:sa', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
            //                               // date('Y-m-d H:i:sa', strtotime($plandate[$key]))
            //         $order_data['delivery_date'] = date('Y-m-d H:i:s', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
            //         $order_data['day'] =date('D', strtotime(' +'.$iter.' day', strtotime($plandate[$key])));
                          
            //             // Calculating Priceing start
                
            //     // $string_emirate=$myorder_cust->emirate_id.','.$myorder_cust->slot_id;
            //       $ans=$this->order_model->get_partner_price($myorder_cust->vendor_id,$order_data['delivery_date'],$myorder_cust->emirate_id,$myorder_cust->address,$service_typ,$myorder_cust->delivery_time);
       
            //                 if($ans[0]->ans == 'no'){
                               
            //                         if($ans[0]->price==''){
            //                             $p_price=0;
            //                             $discount_track = '';
            //                         }else{
            //                          $p_price=$ans[0]->price;
            //                          $discount_track = '';
            //                         }
            //                 }else{
            //                     if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
            //                     $p_price=0;
            //                     else
            //                     $p_price=$ans[0]->same_loc_price;
                                
            //                     // $p_price=$ans[0]->same_loc_price;
            //                   $discount_track =$ans[1]->ids;
                               
            //                   $base_discount_tracker=$ans[1]->ids;
            //                     $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
            //                     $field['discount_track']='0';
            //                     $ansss=$this->order_model->update($field, $where_tracker);
            //                     $response['ansss']=$ansss;
                                
            //                 }
                
            //     // Calculating pricing end
                          
                          
                          
            //               $order_data['partner_price'] =$p_price;
            //               $order_data['discount_track'] =$discount_track;
                          
            //                         //   echo '<br>order data is '.$tt.'<br>  : ';
            //                         //  print_r($order_data);
            //               $result = $this->order_model->add_plan_order($order_data);
            //                       //   echo ' i am order tbl rslt: '.$result;
                 
            //             }
                        
                        
                        
            //     } //end of plan result            
                
            //      }else{
                     
            //      }
            //  }else{
                 
                 
            //      echo 'no customer created'.$customer_result;
            //  }
             
             
            //  End 
            
            
            
            // Comment this when uncomment GENERATE CUSTOMER'S INITIAL PLAN
            if($customer_result){
                
                // echo 'final result is:'.$customer_result;
             }else{
                 
                $response['exceptions'] = $response['exceptions'].$myorder_cust->phone.'-'.$myorder_cust->full_name.'-'.$myorder_cust->address.' , ';
                $string_exp=$response['exceptions'];
            }
            
           
            
         } //end of loop
        
        
         //  uncomment below if *************
                if(!$response['exceptions']){
                      $response['success'] = true;
                      $response['vendor_id'] = $vendor_id;
                    
                    // $this->session->set_flashdata("success","Data is saved Successfully");
                }else{
                    
                    $response['success'] = true;
                    $response['vendor_id'] = $vendor_id;
                    
                    // $this->session->set_flashdata("error","Some Data is Not saved Successfully!".$string_exp);
                }
                
                // echo json_encode($response); 
                // die();
                
                $this->session->unset_userdata("deliveries_data");
                $this->session->unset_userdata("file_data");
                $this->session->unset_userdata("vendor_id");
                
                 echo json_encode($response);   
        
          
      
    }
    
    
     public function update_customer_for_mealplan(){
        // tahababy
         $this->load->model('customer_model');
         $this->load->model('Vendor_model');
         $response=array("success"=>false);
         $myorder_cust=json_decode($this->input->post('info'));
        //  echo '<pre>';
         $all_list=json_decode($myorder_cust->all_detail);
        //  print_r($all_list);
         $error_list=$all_list->error_details;
        
        //   print_r($error_list);
          
        
        //   die();
       $phone=validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$myorder_cust->phone))));
         
         $where=array('role_id' =>4,
                     'phone' => $phone,
                     'vendor_id'=>$myorder_cust->vendor_id
                     );
     
        $phone_check= $this->customer_model->get_where_latest($where);
        //  print_r($this->db->last_query());
        //  echo '<pre> <br> Old DAta is: <br>';
        //  print_r($phone_check);
        
                          
            
                 if ($phone_check[0]->mul_address ==''){
                        // echo 'EMPTY MULADDRESS';
                        
                         $data_mul_addr=json_decode($myorder_cust->mul_add);
                         $extract_new_address=json_decode($data_mul_addr);
                        
                        
                        //  CALCULATE AREAID, EMIRATEID, SLOTID for old address
                        
                        $area_str=$phone_check[0]->address;
                        // echo 'area_str:'.$area_str;
                       $area_arr=explode(",",$area_str);
                  
                       
                       $indx= count($area_arr)-1;
                       $Aname=$area_arr[$indx];
                       $Aname=ltrim($Aname," ");
                        $Aname=rtrim($Aname," ");
                        
                        // echo 'i am area name'.$Aname;
                $areaID=$this->order_model->getareaID_withName($Aname);
                
                array_splice($area_arr, 1, $indx); 
                $required_addr=implode(" ",$area_arr);
                // echo 'RESULTS:'.$required_addr;
               
                // echo  $areaID;
                    //   $Aname_arr=explode("(", $Aname);
                    //   print_r($Aname_arr);
                    //   $Eminame=$Aname_arr[0];
                    //   echo 'i am Eminame :'.$Eminame;
                    
                    // die();
                      
                                //   $google_link = array("google_link"=>"None");
                                //   $google_link_jsn = json_encode($google_link);

                        $fix=(object)array('address' => $required_addr, 'area_id'=>$areaID,'emirate_id'=>0,'slot_id'=>0,'google_link_addrs'=>$google_link_jsn );
                        array_push($extract_new_address, $fix);
                        // echo 'AFTER:';
                        // print_r($extract_new_address);
                        
                        $extract_new_address_jsn=json_encode($extract_new_address);
             
                     
                 }else if($phone_check[0]->mul_address !=''){
                        
                        //  echo 'MULADDRESS EXIST';
                         $data_mul_addr=json_decode($myorder_cust->mul_add);
                         $extract_new_address=json_decode($data_mul_addr);
                         
                         
                         $old_mul_address=json_decode($phone_check[0]->mul_address);
                        //  for($i=0; $i<count($old_mul_address); $i++){
                             
                            //  if($old_mul_address[$i]->google_link_addrs ==""){
                            //       $google_link = array("google_link"=>"None");
                            //       $google_link_jsn = json_encode($google_link);
                            //      $old_mul_address[$i]->google_link_addrs= $google_link_jsn;
                            //  }
                             
                            //   array_push($extract_new_address, $old_mul_address[$i]);
                            
                            array_push($old_mul_address,$extract_new_address[0]);
                        //  }
                         
                        //   echo 'AFTER:';
                        // print_r($old_mul_address);
                        
                        // $extract_new_address_jsn=json_encode($extract_new_address);
                           $extract_new_address_jsn=json_encode($old_mul_address);
                        //   echo $extract_new_address_jsn;
                     
                       
                 }else{}
                //  die();
                 
                    $_cust_data=array(
                
                               'email'            => $myorder_cust->email ,
                               'phone'            => $phone,
                               'full_name'        => $myorder_cust->full_name,         
                               'address'          => $myorder_cust->address,
                               'mul_address'      => $extract_new_address_jsn,
                               'all_detail'       =>$myorder_cust->all_detail,
                               'send_notification' =>$myorder_cust->notification,
                               'user_notes'       =>$myorder_cust->note,
               
                                'created_dt' => date("Y-m-d H:i:s"),
                                'updated_dt' => date("Y-m-d H:i:s"),
                                'created_user' => $this->session->userdata('email'),
                                'updated_user' => $this->session->userdata('email'),
                                'created_terminal' => gethostname(),
                                'updated_terminal' => gethostname()
                
                        );
                        
                        if ($phone_check[0]->customer_id ==''){
                        //   echo 'no cust id found';
                             //   Checking customer id if not already exist in database 
                            // $database_check= $this->Vendor_model->check_unique_customerid_result($myorder_cust->pcustomer_id);
                        
                          if(( in_array("There already exists an account registered with this customer id.", $error_list) )){ 
                            // if($database_check){
                              $vendor_name_is_= $myorder_cust->vendor_name;
                              $tempo=substr($vendor_name_is_, 0, 2);
                             $tempid=(strtoupper($tempo).'-'.get_unique_string('4'));  
                             
                             $_cust_data['customer_id'] = $tempid;
                            
                            // echo '<br>'.$ii.' i am new id after auto create :'.$tempid; 
                        
                        
                             }else{
                                //  echo 'already unique'; 
                                  $_cust_data['customer_id'] = $myorder_cust->pcustomer_id;
                             }
                             
                    
                           
                        }
                //   print_r($_cust_data);
                //   die();
                
                $where_=array('id' => $phone_check[0]->id);
                
                $res=$this->customer_model->update($_cust_data, $where_);
                if($res){
                    $response["success"] =true;
                }
               echo json_encode($response);
                     
                     
                    
        
    }
    
    public function get_order_by_id_for_edit_(){
        $response = array('success' => false);
        $order_id = $_POST['order_id'];
        
        $order_detail  =  $this->order_model->get_order_by_id_for_edit($order_id);
        
        $add_correction=explode(",",$order_detail[0]->delivery_address);
        array_pop($add_correction);
    //   print_r($add_correction);
       
       $str=implode(",",$add_correction);
    //   echo $str;
    //   die();
    
    $order_detail[0]->delivery_address2=$str;
    
        if(count($order_detail) > 0){
            $response['success'] = true;
            $response['detail'] = $order_detail;
        }

        echo json_encode($response);
    }
    
    
     public function edit_unassigned_delivery_info(){
      
        $response = array('success' => false);
        $order_id = $this->uri->segment(3)?$this->uri->segment(3):0;
        $service_typ=2;
        $delivery=array();
              
              $vendor_id    = $this->input->post('partner_id_is');
              $order_area   = $this->input->post('order_area');
              $order_shift  = $this->input->post('order_shift');
              $del_address  = $this->input->post('del_address');
              $pickup       = $this->input->post('order_pickup');
              $notification = $this->input->post('notification');
              $product_type = $this->input->post('product_type');
              $note         = $this->input->post('order_note');
              $amm          = $this->input->post('Delivery_Amount');
              $current_emiID= $this->input->post('emirate_id');
              $d_dt         = $this->input->post('dt');
               
              $google_addr  =trim(preg_replace('!\s+!', '',str_replace("'","",$this->input->post('google_link')))); 
              $google_addr=str_replace("ʹ","", $google_addr);
              $google_addr=str_replace('"','', $google_addr); 
            // GOOGLE LINK  
              if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                            //   echo '<br> i am inside if address is empty '.$google_addr;
                                  $google_link = array("google_link"=>"None");
                                  $google_link_jsn = json_encode($google_link);
                         }else{
                            //   echo '<br> i am inside else when address is not  empty '.$google_addr;
                              $google_link = array("google_link"=>$google_addr);
                              $google_link_jsn = json_encode($google_link);
                          }
                          
            // DELIVERY AMOUNT
            if($amm =='' OR $amm ==0 OR $amm==' '){
                  $amm=0;
               }
               
            //PICKUP ADDRESS
            $pic_up=trim(preg_replace('!\s+!', ' ',$pickup));
            $pic_up=str_replace("ʹ","", $pic_up);
            
            
            // NOTE
            $notes=trim(preg_replace('!\s+!', ' ',$note));
            $notes=str_replace("ʹ","", $notes);
            
            // FOODTYPE
            
             $food_t=trim(preg_replace('!\s+!', ' ',$product_type));
             $food_t=str_replace("ʹ","", $food_t);
             
             
            //  ADDRESS
            
            
                       $x_filter_address=str_replace( array( '\'', '"','.', ' ‬-' , ';', '<', '>','‏', ), '',$del_address); 
                    //   $x_filter_address=preg_replace('/[^A-Za-z_0-9\s]+/', ' ', $x_filter_address); 

                       $area = $this->order_model->get_area_by_id($order_area);  
                       $addr= trim(preg_replace('!\s+!', ' ',str_replace("'","",$x_filter_address.', '.$area->area_name)));
                       $addr=str_replace("ʹ","", $addr);
                       $addr=str_replace(" ‏","", $addr);
                       $addr=str_replace("‏","", $addr);
                       
                       
            
            // PRICING
            
                       $areaID  =$order_area;
            
            
                       // To get Emirate and slot id by name code start
                               $string_emirate=$order_shift;
                               $emirate_arr=explode(",",$string_emirate);
                               $eid=$emirate_arr[0];
                           $emirateID=$this->order_model->getemirateID_withName($eid);
                               $sid=$emirate_arr[1];
                           $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
                            // To get emirate id by name code END
         
                            $delivery['areaID'] = $areaID;
                            $delivery['emirateID'] = $emirateID;
                            $delivery['slotID'] = $slot_ID;
                            
                // echo 'current_emiID='.$current_emiID.'new='.$emirateID;            
    if($current_emiID!=$emirateID){             
                     
         $dt=$d_dt;
         $area_str=$addr;
         
         $ans=$this->order_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
                            if($ans[0]->ans == 'no'){
                                
                                  if($ans[0]->price==''){
                                    $p_price=0;
                                    $discount_track = '';
                                    }else{
                                     $p_price=$ans[0]->price;
                                     $discount_track = '';
                                    }
                                    
                            }else{
                                 if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
                                $p_price=0;
                                else
                                $p_price=$ans[0]->same_loc_price;
                                
                                
                               $discount_track =$ans[1]->ids;
                               
                                $base_discount_tracker=$ans[1]->ids;
                                $where_tracker=$this->db->where('order_id',$base_discount_tracker);
                                
                                $field['discount_track']='0';
                                $ans=$this->order_model->update($field, $where_tracker);
                            }
                            
                $delivery['partner_price'] = $p_price;
                $delivery['discount_track'] = $discount_track;        
         
         
               }
         
         
         
         
               $delivery['send_notification']    = $notification;
               $delivery['pickUp']               = $pic_up;
               $delivery['delivery_address']     = $addr;
               $delivery['note']                 = $notes;
               $delivery['last_edit_by']         = $this->session->userdata('email');
               $delivery['last_edit_at']         = date('Y-m-d H:i:sa');
               $delivery['delivery_time']        = $order_shift;
               $delivery['food_type']            = $food_t;
               $delivery['service_type_id']      = $service_typ;
               $delivery['delivery_amount']      = $amm;
               $delivery['google_link_addrs']    = $google_link_jsn;
               
               
                   
            // lili  
                $oldaddr=$this->input->post('hid_address');
                
                
                
               
                 $where_orderid=$this->db->where('order_id',$order_id);
                $results=$this->order_model->update($delivery, $where_orderid);
            //   echo '<pre>';
            //   print_r($delivery);
            //   $this->session->set_flashdata('error', 'Something gone wrong. Try Again.');
               
               if($results){
                   
                    //lili p.s 0 means same address other than 0 means changes found
                 if(strcmp($oldaddr,$addr) !==0){
                     $whr_user_is=$this->db->where('id',$this->input->post('hid_cust_id'));
                     $data_addr_count=array('addressCount'=>1);
                       $this->order_model->update_user_address_counter($data_addr_count, $whr_user_is);
                   }
                   
                   
                   $response['success'] = true;
                  $this->session->set_flashdata('success', 'Data Update Successfully.');
               }else{
                    $this->session->set_flashdata('error', 'Something gone wrong. Try Again.');  
               }
               
              
         redirect("order/uploaded");
    }
    
    
    
    
      function manualComplete_orders()
    {
         $ans=false;
        if(!empty($this->input->post('order_ids')))
        {
            $ids = $this->input->post('order_ids');
            
            // echo '<pre>';
            // print_r($ids);
            // die();
            
            
            if(count($ids) >0){
                for($i=0; $i<count($ids); $i++){
                    
                    $deliver_date=$this->order_model->get_delivery_date($ids[$i]);
                    if($deliver_date){
                    $ans=$this->order_model->update_orders_manualComplete($ids[$i],$deliver_date);
                    // echo  $ans;
                    // die();
                    }
                    
                }
            }
            
            if($ans){
              echo json_encode(array('success'=>true));
            }else{
                echo json_encode(array('success'=>false));
            }
        }
    }
    
    
    // bag pickup module
    public function unassigned_bagpicks(){
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        $user_vendi=$this->uri->segment(5)? $this->uri->segment(5): 0;
        $emirate_id=$this->uri->segment(6)? $this->uri->segment(6): 0;
        $time_id=$this->uri->segment(7)? $this->uri->segment(7): 0;
        
         $data['drivers'] =  $this->driver_model->get_drivers_basic_inf();
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused'  and o.vendor_id = ".$vendor_id." and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned'and o.is_cancelled='no' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and  o.action != 'Paused'  and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned'and o.is_cancelled='no' and o.delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
      
      
              $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
      
      
        }
        
        if($user_vendi){
             $where2 = $where2." and o.vendor_id=".$user_vendi;
        }
        
        if($emirate_id){
               $where2 = $where2." and o.emirateID = ".$emirate_id;
            }
            
            if($time_id){
               $where2 = $where2." and o.slotID = ".$time_id;
            }
        
      
        // dd($data['vendors']);
        $data['orders'] =  $this->order_model->get_orders_basic_inf($where2);
       
      
        
        // $this->load->model('driver_model');
        // $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        // $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        // $data['areas'] = $this->order_model->get_areas();
        
        $this->load->model('Setting_model');
        $data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
        
        // dd($data);
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('bag_picks/bag_pickup', $data);
    }
    
    
    public function assign_drivers_bagpicks()
    {
        $driver_id = $this->input->post('driver_id');
        $bag_ids = $this->input->post('bags_id');
        $bag_ids_arr = $this->input->post('bags_id');
        
       
        //$order_ids_ = implode(',', $bag_ids);
       
        
         if(count($bag_ids) > 0){
         
            $bag_ids = implode(',', $bag_ids);
            $fields = array(
                'bag_pickup_status' => 'assigned'
            );
            $result =  $this->order_model->assign_drives($fields,$bag_ids);
            
            
              // insert in bagspickup
              
              if($result){
                  echo 'hello i run';
                   for($i=0; $i<count($bag_ids_arr); $i++){
                //   echo 'HI'.$bag_ids_arr[$i].'<br>';
                $check_for_deliv='';
                $check_for_deliv=$this->order_model->get_bagpic_qr_sta($bag_ids_arr[$i]);
                if($check_for_deliv){
                  
                        // insert data in bag picks table
                        
                        echo '<br> Here we need to insert bagpicks';
                        $bagpickdata=array(
                            'driver_id'=>       $driver_id,
                            'partner_id'=>      $check_for_deliv[0]->vendor_id,
                            'delivery_id'=>     $check_for_deliv[0]->delivery_id,
                            'delivery_status'=> $check_for_deliv[0]->status,
                            'delivery_date'=>   $check_for_deliv[0]->delivery_date,
                            'pickup_status'=>   'Pending',
                            'total_bags'=>       1, 
                            'created_at'=>       date("Y-m-d H:i:s"),
                            
                            'name_on_delivery'=> $check_for_deliv[0]->name_on_delivery,
                            'customer_name'=>    $check_for_deliv[0]->full_name,
                            'assigned_user' => $this->session->userdata('email'),
                            'QR'=>$check_for_deliv[0]->delivery_status_qr,
                            'customer_id'=>      $check_for_deliv[0]->customer_id
                            
                            
                            );
                            
                        $res=$this->order_model->add_backpicks($bagpickdata);
                    
                }  
                  }
                    }
        }
        
      
        
        // //get device token
        //             $where = array('id' => $driver_id);
        //             $user = $this->notification_model->get_device_token($where);

        //             if (count($user) > 0 && @$user[0]->device_token != ''){

        //                 $data = array(
        //                     'user_id' => $driver_id,
        //                     'device_token' => $user[0]->device_token,
        //                     'platform' => $user[0]->platform,
        //                     'status_code' => intval(500),
        //                     'title' => 'Assign deliveries',
        //                     'for_whom' => 'Driver',
        //                     'badge' => $user[0]->badge_count,
        //                     'message' => count($bag_ids).' Deliveries has been assigned at '.date("Y-m-d H:i:s")
        //                 );
                           
        //                   echo '<pre>';
        //                   print_r($data);
        //                 //   die();
        //                 //send notification
        //                 $x=send_notification_to_user($data, 'save');
        //                 // $response['check'] = $x;
        //             }
                    
                    // die();
         echo json_encode($res);
    }
    // bag pickup end
    
    // new edits bag picks
    
     public function assigned_bagpicks(){
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
       
        
         
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused'  and o.vendor_id = ".$vendor_id." and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and  o.action != 'Paused'  and  o.bag_pickup_status='assigned' and o.is_cancelled='no' and b.created_at BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'   and b.pickup_status = 'Pending' and b.delivery_id > 0 ";
      
      
              $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
      }
        
      
        // dd($data['vendors']);
        $data['orders'] =  $this->order_model->get_orders_basic_inf_bg_pickups($where2);
    //   dd($data);
        $this->load->model('Setting_model');
        $data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
        
        // dd($data);
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('bag_picks/assigned_bag_picks', $data);
    }
    
    function unassign_bagpicks()
    {
        if(!empty($this->input->post('order_ids')))
        {
            $ids = $this->input->post('order_ids');
            
               $where_bags = $ids;
               $result =  $this->order_model->delete_bagpicks($where_bags);
            
            if($result){
                $order_tbl_update=$this->order_model->update_order_bagpickup_data($ids);
                
                
                    echo json_encode(array('success'=>true));
                
            }
            
            
        }
    }
    
    public function pickup_bags_report(){
        
        
        $st_dt=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $end_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        
        // echo 'dtxx:'.$st_dt.' - '.$end_dt.'<br>';
        
        // die();
        
         $result=$this->order_model->get_partner_details_new_count_for_bagpicks($st_dt,$end_dt);
        //  dd($result);
        // echo '<pre>';
        // print_r($result);
        // echo 'hi';
        // die();
          $this->load->view('bag_picks/completed_bag_pickup',$result);
        
       
    }
    
    
    public function collected_bagpicks(){
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
       
        
         
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused'  and o.vendor_id = ".$vendor_id." and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and  o.action != 'Paused'  and  o.bag_pickup_status='assigned' and o.is_cancelled='no' and b.created_at BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'   and b.pickup_status = 'Collected' and b.delivery_id > 0 ";
      
      
              $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
      }
        
      
        // dd($data['vendors']);
        $data['orders'] =  $this->order_model->get_orders_basic_inf_bg_pickups_detailed($where2);
    //   dd($data);
        $this->load->model('Setting_model');
        $data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
        
        // dd($data);
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('bag_picks/completed_only', $data);
    }
    
     public function req_cancelled_bagpicks(){
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
       
        
         
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused'  and o.vendor_id = ".$vendor_id." and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and  o.action != 'Paused'  and  o.bag_pickup_status='assigned' and o.is_cancelled='no' and b.created_at BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59' and  b.driver_cancel_request=1  ";
      
      
              $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
      }
        
      
        // dd($data['vendors']);
        $data['orders'] =  $this->order_model->get_orders_basic_inf_bg_pickups_detailed($where2);
    //   dd($data);
        $this->load->model('Setting_model');
        $data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
        
        // dd($data);
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('bag_picks/req_canceled_bagpicks', $data);
    }
    
    public function cancelled_bagpicks(){
        // $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        
        $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
       
        
         
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused'  and o.vendor_id = ".$vendor_id." and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and  o.action != 'Paused'  and  o.bag_pickup_status='assigned' and o.is_cancelled='yes' and b.created_at BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'  and  b.pickup_status = 'Cancelled' ";
      
      
              $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
      }
        
      
        // dd($data['vendors']);
        $data['orders'] =  $this->order_model->get_orders_basic_inf_bg_pickups_detailed($where2,true);
    //   dd($data);
        $this->load->model('Setting_model');
        $data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
        
        // dd($data);
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('bag_picks/canceled_bagpicks', $data);
    }
    
    
    public function unassignedBagPicksPartnerwise(){
        
        
       $cdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
        $next=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
       
        
         $data['drivers'] =  $this->driver_model->get_drivers_basic_inf();
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.action != 'Freezed' and   o.action != 'Paused'  and o.vendor_id = ".$vendor_id." and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned'and o.is_cancelled='no' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.action != 'Freezed' and  o.action != 'Paused'  and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned'and o.is_cancelled='no' and o.delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
      
      
              $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
      
      
        }
        
      
      
        $data['orders'] =  $this->order_model->get_unassigned_bagpicks_partnerwise_detail($where2);
      
      
        //  dd($data);
        $this->load->model('Setting_model');
        $data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
        
        // dd($data);
       
        
       
        
        
          $this->load->view('bag_picks/unassigned_bag_pickup_partner',$data);
        
       
    }
    
    
    
     public function assign_drivers_bagpicks_partner_wise()
    {
        $driver_id = $this->input->post('driver_id');
        $vendor_ids = $this->input->post('vendor_ids');
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];
        
         $cdate = @$_POST['from_date'];
         $next = @$_POST['to_date'];
        
        $bag_ids=array();
        
        // first need to fetch all data vendor wise
        
        if(!$cdate){
            $cdate = date('Y-m-d h', strtotime($cdate));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        if(count($vendor_ids) > 0){
            for($it=0;$it<count($vendor_ids);$it++){
                
             $where2 = "o.vendor_id=".$vendor_ids[$it]." and o.action != 'Freezed' and  o.action != 'Paused'  and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned'and o.is_cancelled='no' and o.delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
              if($emirate_id){
               $where2 = $where2." and o.emirateID = ".$emirate_id;
            }
            
            if($time_id){
               $where2 = $where2." and o.slotID = ".$time_id;
            }
              $results_are=$this->order_model->fetch_bagid_by_partner_bgpickup($where2);
            //   echo '<pre><br>';
            //   print_r($results_are);
              
              if($results_are){
                  $id_we_need = array_column($results_are, 'order_id');
                 if($it==0){
                     $bag_ids=$id_we_need;
                 }else{
                     $bag_ids=array_merge($bag_ids,$id_we_need);
                 } 
             }
            }
         }
        // dd($bag_ids);
        // die();
        
        // done fetching
        
        $bag_ids_arr = $bag_ids;
        
           if(count($bag_ids) > 0){
         
            $bag_ids = implode(',', $bag_ids);
            $fields = array(
                'bag_pickup_status' => 'assigned'
            );
            $result =  $this->order_model->assign_drives($fields,$bag_ids);
            
            
              // insert in bagspickup
              
              if($result){
               
                   for($i=0; $i<count($bag_ids_arr); $i++){
                //   echo 'HI'.$bag_ids_arr[$i].'<br>';
                $check_for_deliv='';
                $check_for_deliv=$this->order_model->get_bagpic_qr_sta($bag_ids_arr[$i]);
                if($check_for_deliv){
                  
                        // insert data in bag picks table
                        
                        // echo '<br> Here we need to insert bagpicks';
                        $bagpickdata=array(
                            'driver_id'=>       $driver_id,
                            'partner_id'=>      $check_for_deliv[0]->vendor_id,
                            'delivery_id'=>     $check_for_deliv[0]->delivery_id,
                            'delivery_status'=> $check_for_deliv[0]->status,
                            'delivery_date'=>   $check_for_deliv[0]->delivery_date,
                            'pickup_status'=>   'Pending',
                            'total_bags'=>       1, 
                            'created_at'=>       date("Y-m-d H:i:s"),
                            
                            'name_on_delivery'=> $check_for_deliv[0]->name_on_delivery,
                            'customer_name'=>    $check_for_deliv[0]->full_name,
                            'assigned_user' => $this->session->userdata('email'),
                            'QR'=>$check_for_deliv[0]->delivery_status_qr,
                            'customer_id'=>      $check_for_deliv[0]->customer_id
                            
                            
                            );
                            
                        $res=$this->order_model->add_backpicks($bagpickdata);
                    
                }  
                  }
                    }
        }
        
      
         echo json_encode($res);
    }
    
  
    // end bag pick new edits
     
      public function uploaded_deliveries_(){
      
       $data=array();
         $data['drivers'] =  $this->driver_model->get_drivers_basic_inf();
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
           }else{
               $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
         }
        
       
        $this->load->model('driver_model');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        $data['areas'] = $this->order_model->get_areas();
        
        
        $this->load->model('Setting_model');
        $data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
        
        // dd($data);
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('uploaded_deliveries_new', $data);
   
    }
    
     public function uploaded_deliveries_Xx(){
      
       $data=array();
         $data['drivers'] =  $this->driver_model->get_drivers_basic_inf();
        
        
        if(strtolower($this->session->userdata('role')) == 'vendor'){
           }else{
               $where_vendor = array('is_deleted'=>0);
              $data['vendors'] =  $this->vendor_model->get_vendor_basic_inf($where_vendor);
         }
        
       
        $this->load->model('driver_model');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        $data['areas'] = $this->order_model->get_areas();
        
        
        $this->load->model('Setting_model');
        $data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
        
        // dd($data);
        // echo '<pre>';
        // print_r($data);
        
        $this->load->view('testviewuploaded', $data);
   
    }
    
    
     public function delayed_orders(){
        
//   if($this->session->userdata('role') == 'admin'){
    if($this->session->userdata('role') != 'vendor'){
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
     
        // $where = "o.driver_id > 0 and ( o.status = 'Delivered' or o.status='Collected') and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        //$data['orders'] =  $this->order_model->get_orders($where);
      
        //$this->load->view('order/completed',$data);
        $this->load->view('order/late_deliveries');
        
     }else{
         $this->load->view('forbidden');
     }
    }


}

?>