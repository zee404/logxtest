<?php
/**
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
        
         $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        //$where = array('o.driver_id > ' => 0);
        if($this->session->userdata('role') == 'vendor')
            $where = "o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59' AND o.vendor_id = ".$this->session->userdata('u_id');
        else if($this->session->userdata('role') == 'admin')
            $where = "o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        $data['orders'] =  $this->order_model->get_orders($where);
        $this->load->view('order/manage', $data);
    }
     public function orderCompleted(){
        
         $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
     
        $where = "o.driver_id > 0 and ( o.status = 'Delivered' or o.status='Collected') and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
        //$data['orders'] =  $this->order_model->get_orders($where);
      
        //$this->load->view('order/completed',$data);
        $this->load->view('order/completed_order_table');
    }


public function bagsTracking(){
    $this->load->model('vendor_model');
    $this->load->model('order_model');
   // $userid = $this->session->userdata('user_id');
    $status =1;
    $where1 = array('is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
         $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        //$where = array('o.driver_id > ' => 0);
        $where="";
      // if($this->session->userdata('role') == 'admin'){
         // $where = "o.driver_id > 0 and  v.status='".$status."'  and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
         // $data['orders'] =  $this->order_model->get_tracking_statistics($where);
        
      
       // }else{
            $where = "o.driver_id > 0 and v.status='".$status."'  and o.vendor_id='' and  delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
            $data['orders'] =  $this->order_model->get_tracking_statistics($where);
             
     //   }
             // print_r($data);
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
    $userid = $this->session->userdata('user_id');
   $role = $this->session->userdata('role') == 'admin';
     
           
   $data['qrbags'] =  $this->order_model->get_qrBags();
             
        
        
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
         $userid = $this->session->userdata('user_id');
        $status =1;
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s');
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }

        $where="";
       if($this->session->userdata('role') == 'admin'){
        if($vendor_id){
            $where = "o.vendor_id='".$vendor_id."' and o.driver_id > 0 and  v.status='".$status."'  and delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         $report_data =  $this->order_model->get_tracking_statistics($where);
        }else{
            $where = "o.driver_id > 0 and  v.status='".$status."'  and delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         $report_data =  $this->order_model->get_tracking_statistics($where);
        }
         
        
      
        }else{
            $where = "o.driver_id > 0 and v.status='".$status."'  and o.vendor_id='".$userid."' and  delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
            $report_data =  $this->order_model->get_tracking_statistics($where);
             
        }
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }
    public function bagTrackingDetails(){
    $this->load->model('vendor_model');
    $customer = $this->uri->segment(3);
    $userid = $this->session->userdata('user_id');
     $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
    $status =1;
    $where1 = array('status'=> 1,'is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        // $cdate = date('Y-m-d');
      //  $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
       
        $where="";
       if($this->session->userdata('role') == 'admin'){
       
         $where = "o.driver_id > 0 and  v.status='".$status."' and o.customer_id='".$customer."' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
      
        }else{
            
             $where = "o.driver_id > 0 and v.status='".$status."' and o.customer_id='".$customer."'    and o.vendor_id='".$userid."' and delivery_date BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'";
         
             
        }
        
        $data['orders'] =  $this->order_model->get_orders2($where);
        $this->load->view('order/trackingDetails', $data);
    }
       public function get_bagTrackingDetails(){
         $userid = $this->session->userdata('user_id');
        $status =1;
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];
        $customer = @$_POST['customer_id'];
        if(!$start_date){
            $start_date = date('Y-m-d h:i:s');
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }

        $where="";
       if($this->session->userdata('role') == 'admin'){
        if($vendor_id){
            $where = "o.vendor_id='".$vendor_id."' and o.customer_id='".$customer."'  and o.driver_id > 0 and  v.status='".$status."'  and delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         $report_data =  $this->order_model->get_orders2($where);
        }else{
            $where = "o.driver_id > 0 and o.customer_id='".$customer."'  and  v.status='".$status."'  and delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         $report_data =  $this->order_model->get_orders2($where);
        }
         
        
      
        }else{
            $where = "o.driver_id > 0 and o.customer_id='".$customer."'  and v.status='".$status."'  and o.vendor_id='".$userid."' and  delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
            $report_data =  $this->order_model->get_orders2($where);
             
        }
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    } 
    public function upload()
    {
        $status =1;
        //$where1 = array('status'=> 1,'is_deleted'=>0);
        $where1 = array('is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        $data['dtypes'] = $this->vendor_model->get_data('delivery_type');
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


    public function upload_deliveries_by_general_file_new(){
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
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(TRUE);
            $spreadsheet = $reader->load($file_name);
            $worksheet = $spreadsheet->getActiveSheet();
            $namedDataArray = $worksheet->toArray(null, true, true, true);
            //print_r($namedDataArray);
                    foreach($namedDataArray AS $ii=>$data){
                        
                    //Used to skip 1st row
                    if($ii == 1 OR $data['A'] == '' OR $data['C'] == '' OR $data['D'] == '' OR $data['F'] == '' OR $data['H'] == '') { continue; }
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

                        $temp = (object)array('customer_id' => $customer_id, 'full_name' => trim(preg_replace('!\s+!', ' ', $data['B'])), 'phone' => preg_replace('!\s+!', ' ',$phone), 'address' => trim(preg_replace('!\s+!', ' ',str_replace("'","",$data['C'].', '.$data['D']))),'pickUp' => trim(preg_replace('!\s+!', ' ',$data['E'])), 'delivery_time' => $data['F'], 'note' => preg_replace('!\s+!', ' ',$data['G']), 'food_type' => preg_replace('!\s+!', ' ',$data['I']), 'notification' => preg_replace('!\s+!', ' ',$data['H']));
                        
                        array_push($file_data, $temp);
                  //  }
                }

                //print_r($file_data); die();
                
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
        //}
         
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
    
 public function save_order_del(){
        $response = array('success' => false);

        $deliveries =  $this->session->userdata("deliveries_data");
        
       
       
        $vendor_id = $this->session->userdata("vendor_id");
     //   $type_id = $_POST['type_id'];
        $signature = $this->input->post('signature');
       
        
        $delivery_date = date('Y-m-d H:i:sa', strtotime($this->input->post('delivery_date')));

     

        if(count($deliveries) > 0){
           $counter=0;
           foreach ($deliveries as $key => $myorder) {
           $customer_id = $myorder->customer_id;
$counter++;

                

                      
             
                    $order_data = array(
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
                        'food_type' => $myorder->food_type
                    );

                    //save order
                    $result = $this->order_model->add($order_data);
                   
                

                if($result){
                      $response['success'] = true;
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

    public function uploaded(){
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        //return active drivers only
        //$where = array('u.status'=> 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
        $data['drivers'] =  $this->driver_model->get_drivers();
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "o.driver_id = 0 and o.vendor_id = ".$vendor_id." and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }else{
            $where2 = "o.driver_id = 0 and o.status = 'Not Assign' and delivery_date BETWEEN '". date('Y-m-d', strtotime($cdate))." 00:00:00' and '". date('Y-m-d', strtotime($next))." 23:59:59'";
        }
        
        $data['orders'] =  $this->order_model->get_orders($where2);

        // print_r($data);
        // exit();
        $this->load->view('uploaded_deliveries', $data);
    }

    public function get_order_by_id(){
        $response = array('success' => false);
        $order_id = $_POST['order_id'];
        $order_detail =  $this->order_model->get_order_by_id($order_id);
        if(count($order_detail) > 0){
            $response['success'] = true;
            $response['detail'] = $order_detail;
        }

        echo json_encode($response);
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
                'driver_id' => $driver_id
               // 'updated_terminal' => gethostname()
                
            );
            $result =  $this->order_model->assign_drives($fields,$bag_ids);
        }
         echo json_encode($result);
    }

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
                        send_notification_to_user($data, 'save');
                    }


                }

        }

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
      $response = array('success' => false);
       
        $bag_ids = $this->input->post('bags_id');
        //$bag_ids = implode(',', $bag_ids);

        if(count($bag_ids) > 0){
               
             $where = $bag_ids;
        $result =  $this->order_model->delete_deliveries($where);
              
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

    public function areas()
    {
        $this->load->model('order_model');
        $data['areas'] = $this->order_model->get_areas();
        $this->load->view('manage_areas', $data);
    }

     public function role_type(){
        $this->load->model('order_model');
        //$data['types'] =  $this->order_model->get_deliveriess_type();
         $where = array('status' =>6);
        $data['types'] = $this->order_model->get_deliveriess_type_where($where);

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
        $order_type =  $this->order_model->get_deliveriess_type_where($where);
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
    public function save_role_type(){
        $response = array('success' => false);

        //check duplicate driver phone
        $type = $_POST['type_name'];
        $where = array('name' => $type);
        $delivery_type = $this->order_model->get_deliveries_type_where($where);

        if(!$delivery_type){
            $fields = array(
                'name' =>  $type,
                'status' =>  6,
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
            'name' =>  $_POST['name'],
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

        $fields = array(
            'bag_received' =>  $_POST['bag_received'],
            'ice_bags' =>  $_POST['ice_bags'],
        );

        $where = array('order_id'=> $order_id);
        $result = $this->order_model->update_bagsInfo($fields, $where);
        if($result){
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

        $where = array('id'=> $type_id);
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

    public function save_order_form()
    {
        if(!empty($this->input->post()))
        {
            // print_r($this->input->post());
            
            $cst['send_notification'] = $this->input->post('notification');
            $cst['full_name'] = $this->input->post('order_name');
            $cst['vendor_id'] = $this->input->post('order_vendor_id');
            $cst['phone'] = $this->input->post('order_phone');
            $cst['address'] = $this->input->post('del_address').', '.$this->input->post('order_area');
            $delivery['customer_id'] = $this->bag_model->save_customer($cst);

            $delivery['vendor_id'] = $this->input->post('order_vendor_id');
            $delivery['pickUp'] = $this->input->post('order_pickup');
            $delivery['delivery_address'] = $this->input->post('del_address').', '.$this->input->post('order_area');
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

    function del_area($id)
    {
        if($this->session->userdata('role') == 'admin')
        {
            $this->order_model->del_area($id);
            redirect(base_url('areas?del=done'));
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
        else
        {

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




}

?>