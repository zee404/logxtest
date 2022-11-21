<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Cash extends CI_Controller
{

    /*Bag Status
    =Requested
    =Assign
    =Picked
    */

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Dubai');
        $this->output->enable_profiler(false);  //this show value at your page
        $this->load->model("Setting_model");
        $this->load->model("cash_model");
        $this->load->model('order_model');
    }

    public function upload()
    {
        $this->load->model('driver_model');
        
        //$where1 = array('status'=> 1,'is_deleted'=>0);
        $where1 = array('is_deleted'=>0);
        $where3 = array('status' => 1);
        $data['types'] =  $this->order_model->get_deliveries_type_where($where3);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        //$data['dtypes'] = $this->vendor_model->get_data('delivery_type');
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes']=$this->driver_model->get_combinations($extra['old_emirites_typ']);
        $data['areas'] = $this->order_model->get_areas();
        $data['payment']=$this->Setting_model->get_payment_type();
        
        // echo '<pre>';
        // print_r($data);
        //die();
        $this->load->view('cash/upload_file', $data);
    }

    public function upload_bag_request_by_file(){
        $file_data = array();

        $file_name = $this->upload_doc(@$_FILES['userfile']['tmp_name'], @$_FILES['userfile']['name'], 'g_bags');

        if ( ! $file_name)
        {
            $data['error'] = 'not upload';
             $where1 = array('status'=> 1,'is_deleted'=>0);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
            $this->load->view('bag/upload_file', $data);
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
                       $phone = validate_phone_number(trim(str_replace(' ', '', str_replace('-','',$data[1]))));
                       // $where = array('phone' => $phone, 'role_id' => 4);
//                        $customer = $this->customer_model->get_where($where);
                        $customer_id = 0;
                       // if (count($customer) > 0) {
//                            $customer_id = intval($customer[0]->id);
//                        }


                        $temp = (object)array('customer_id' => $customer_id, 'full_name' => $data[0], 'phone' => $phone, 'address' => $data[2], 'bags_qty' => $data[3]);
                        array_push($file_data, $temp);
                    }
                }
                fclose($handle);
            }
         $this->session->set_userdata("file_data",$file_data);
            $data['file_data'] =  $this->session->userdata("file_data");
            $data['file_data_js'] = json_encode($this->session->userdata("file_data"));
            
           // $data['file_data'] = $file_data;
           $data["vendor_id"] = $this->input->post('vendor_id');
            $data['vendors'] =  $this->vendor_model->get_where(array());
             $where2 = array('status' => 1);
            $data['types'] =  $this->order_model->get_deliveries_type_where($where2);
            $this->load->view('bag/temp_bag_collection', $data);
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

    public function save_file_bag_request(){
        $response = array('success' => false);

      $bags = $this->session->userdata("deliveries_data");
        $vendor_id = $this->session->userdata("vendor_id");
         $type_id = $_POST['type_id'];
    //  $bags = array("customer_id"=>1,"bags_qty"=>1);
    //  $vendor_id = 1;
    //  $pick_date =date('Y-m-d');
       $pick_date = date('Y-m-d', strtotime($_POST['pick_date']));

        if(count($bags) > 0){
             $counter=0;
         foreach ($bags as $key => $myorder) {
 $customer_id = $myorder->customer_id;
$counter++;
                //if customer already exist
            //    if($bags[$i]['customer_id'] != 0){
                    $bag_data = array(
                        //'status' =>  'Requested',//default set
                        'customer_id' => $myorder->customer_id,
                        'vendor_id' =>  $vendor_id,
                        'type_id' =>  $type_id,
                        'bags_qty' =>  $myorder->bags_qty,
                        'pick_date' =>  $pick_date,
                        'created_dt' => date("Y-m-d H:i:s"),
                        'created_terminal' => gethostname(),
                        'created_user' => $this->session->userdata('email')
                    );

                    //save bag collection
                    $result = $this->bag_model->add($bag_data);
              //  }else {
                    //if customer is new
               /*     $code = mt_rand(100000, 999999);
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
                            'bags_qty' =>  $bags[$i]['bags_qty'],
                            'pick_date' =>  $pick_date,
                            'created_dt' => date("Y-m-d H:i:s"),
                            'created_terminal' => gethostname()
                        );

                        //save order
                        $result = $this->bag_model->add($bag);
                    } */
             //   }

                if($result){
                    $response['success'] = true;
                }

            }

        }
        $this->session->unset_userdata("deliveries_data");
         $this->session->unset_userdata("file_data");
       $this->session->unset_userdata("vendor_id");
        echo json_encode($response);
    }
    
    // Taha minor changes according to live code
//     public function save_bags_old_demo()
//     {  
//         $data =[];
//         $this->load->model('bag_model');
//         $this->load->model('Vendor_model');
//         $ids = $this->input->post('myData');
//         // print_r($ids);
//         // die();
//         $pick_date = date('Y-m-d', strtotime($this->input->post('pick_date')));
//         $vender = $this->input->post('vender');
//         $action = $this->input->post('action');
//         if($action == 'validate')
//         {
//             foreach($ids AS $k => $id)
//             {
//                 $checked = $this->bag_model->get_customer_id1($id, $vender);
//                 $data[] = array('status'=>$checked['status'], 'customer'=>$checked['customer'], 'bag_data'=>$id);
//             }

//             echo json_encode(array('data'=>$data, 'action'=>'validate'));
//         }
//         else if($action == 'save')
//         {
//             foreach ($ids as $key => $id) {
//                 /*$cid = $this->bag_model->get_customer_id1($id, $vender);
//                 $cidd = !empty($cid) ? $cid[0]['id'] : 0; */
//                 //Service Type
//                   $service_typ = 2;
//                   $bag['service_type_id'] = $service_typ;
                   
//                      // To get area id by name code start
                
//                             $area_str=$id['address'];
//                       $area_arr=explode(",",$area_str);
//                       $indx= count($area_arr)-1;
//                       $Aname=$area_arr[$indx];
//                       $Aname=ltrim($Aname," ");
//                     $Aname=rtrim($Aname," ");
//                 $areaID=$this->order_model->getareaID_withName($Aname);
                      
//         // To get area id by name code END
                
                
//         // To get Emirate and slot id by name code start
//                     $string_emirate=$id['type_id'];;
//                     $emirate_arr=explode(",",$string_emirate);
//                     $eid=$emirate_arr[0];
//                 $emirateID=$this->order_model->getemirateID_withName($eid);
//                     $sid=$emirate_arr[1];
//                 $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
//          // To get emirate id by name code END
         
//          $bag['areaID'] = $areaID;
//          $bag['emirateID'] = $emirateID;
//          $bag['slotID'] = $slot_ID;
         
//          $bag['cash_address']=$id['address'];
         
         
//           // Track partner price start
//          $dt= $pick_date;
//          $vendor_id= $vender;
         
//          $ans=$this->cash_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ);
       
//                             if($ans[0]->ans == 'no'){
//                                 $p_price=$ans[0]->price;
//                                 $discount_track = 0;
//                             }else{
//                                 $p_price=$ans[0]->same_loc_price;
//                               $discount_track =$ans[1]->ids;
//                             }
         
//         //  print_r($ans);
//         //  die();
         
//              $bag['partner_price']= $p_price;
//              $bag['discount_track']= $discount_track;
//          //Track partner price end
            
             
         
//                 $data[] = array('total_amount'=>!empty($id['amount']) ? $id['amount'] : 0 ,'payment_type_id'=>!empty($id['ptype_id']) ? $id['ptype_id'] : 0 , 'customer_id'=>$id['cid'], 'pick_date'=>$pick_date,'vendor_id'=>$vender, 'created_dt' => date("Y-m-d H:i:s"), 'created_user'=>$this->session->userdata('email'), 'type_id'=>$id['type_id'], 'cash_notes'=>$id['bag_notes'], 'service_type_id' =>2, 'areaID' => $areaID, 'emirateID' => $emirateID,'slotID' => $slot_ID,'cash_notification' =>$id['notification'],'partner_price' =>$bag['partner_price'],'discount_track' =>$bag['discount_track']);
//             }
//             $result=  $this->Vendor_model->addcsv('cashs',$data);
//             $result['action'] = 'save';
//             echo json_encode($result);
//         }
//         else
//         {
//             echo json_encode(array('action'=>'invalid'));
//         }
        

        
       
// }


public function save_bags()
    {  
        $data =[];
        $this->load->model('bag_model');
        $this->load->model('Vendor_model');
        $ids = $this->input->post('myData');
        // print_r($ids);
        // die();
        $pick_date = date('Y-m-d', strtotime($this->input->post('pick_date')));
        $vender = $this->input->post('vender');
        $action = $this->input->post('action');
        if($action == 'validate')
        {
            foreach($ids AS $k => $id)
            {
                $checked = $this->bag_model->get_customer_id1($id, $vender);
                $data[] = array('status'=>$checked['status'], 'customer'=>$checked['customer'], 'bag_data'=>$id);
            }

            echo json_encode(array('data'=>$data, 'action'=>'validate'));
        }
        else if($action == 'save')
        {
            foreach ($ids as $key => $id) {
                /*$cid = $this->bag_model->get_customer_id1($id, $vender);
                $cidd = !empty($cid) ? $cid[0]['id'] : 0; */
                //Service Type
                   $service_typ = 2;
                   $bag['service_type_id'] = $service_typ;
                   
                     // To get area id by name code start
                
                            $area_str=$id['address'];
                       $area_arr=explode(",",$area_str);
                       $indx= count($area_arr)-1;
                       $Aname=$area_arr[$indx];
                       $Aname=ltrim($Aname," ");
                    $Aname=rtrim($Aname," ");
                $areaID=$this->order_model->getareaID_withName($Aname);
                      
        // To get area id by name code END
                
                
        // To get Emirate and slot id by name code start
                    $string_emirate=$id['type_id'];;
                    $emirate_arr=explode(",",$string_emirate);
                    $eid=$emirate_arr[0];
                $emirateID=$this->order_model->getemirateID_withName($eid);
                    $sid=$emirate_arr[1];
                $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
         // To get emirate id by name code END
         
         $bag['areaID'] = $areaID;
         $bag['emirateID'] = $emirateID;
         $bag['slotID'] = $slot_ID;
         
         $bag['cash_address']=$id['address'];
         
         
          // Track partner price start
         $dt= $pick_date;
         $vendor_id= $vender;
         
         $ans=$this->cash_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ);
       
                            if($ans[0]->ans == 'no'){
                                $p_price=$ans[0]->price;
                                $discount_track = 0;
                            }else{
                                $p_price=$ans[0]->same_loc_price;
                              $discount_track =$ans[1]->ids;
                            }
         
        //  print_r($ans);
        //  die();
         
             $bag['partner_price']= $p_price;
             $bag['discount_track']= $discount_track;
         //Track partner price end
            
             
         
                $data[] = array('total_amount'=>!empty($id['amount']) ? $id['amount'] : 0 ,'payment_type_id'=>!empty($id['ptype_id']) ? $id['ptype_id'] : 0 , 'customer_id'=>$id['cid'], 'pick_date'=>$pick_date,'vendor_id'=>$vender, 'created_dt' => date("Y-m-d H:i:s"), 'created_user'=>$this->session->userdata('email'), 'type_id'=>$id['type_id'], 'cash_notes'=>$id['bag_notes'], 'service_type_id' =>2, 'areaID' => $areaID, 'emirateID' => $emirateID,'slotID' => $slot_ID,'cash_notification' =>$id['notification'],'partner_price' =>$bag['partner_price'],'discount_track' =>$bag['discount_track']);
            }
            $result=  $this->Vendor_model->addcsv('cashs',$data);
            $result['action'] = 'save';
            echo json_encode($result);
        }
        else
        {
            echo json_encode(array('action'=>'invalid'));
        }
 }
    public function cancelled() {
        //return active drivers only
        $where1 = array('status'=> 1,'is_deleted'=>0);
        $where3 = array('status' => 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
        $data['drivers'] =  $this->driver_model->get_drivers();
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        $where2 = "";
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 .= "ch.vendor_id=".$vendor_id;
        }
        $where2 .= (($where2 != "") ? " and " : "")." (ch.pick_date='".$cdate."' or (ch.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'))";
        $data['cash'] =  $this->cash_model->get_where($where2,true);

       // $data['customer'] =  $this->bag_model->get_customer_id();
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        //$data['types'] =  $this->order_model->get_deliveries_type_where($where3);
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('cash/cancelled',$data);
    }
    
    public function cancelled_by_created_date() {
        $where2 = array('u.status'=> 1 );
        $data['drivers'] =  $this->driver_model->get_drivers($where2);
        $from_date = !empty($this->input->post('from')) ? $this->input->post('from') : date('Y-m-d', strtotime('-1 day'));
    
        $to_date = !empty($this->input->post('to')) ? $this->input->post('to') : date('Y-m-d');
        $data["selection"]= $_POST;
        $where = "";
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where .= "ch.vendor_id=".$vendor_id;
        }
        
        $where .= (($where != "") ? " and " : "")." ((ch.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or 
        (ch.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'))";
        $data['cash'] =  $this->cash_model->get_where($where,true);

        $this->load->view('cash/cancelled', $data);
    }
    
    public function unassigned(){
        //return active drivers only
        $where1 = array('status'=> 1,'is_deleted'=>0);
        //$where = array('u.status'=> 1);
        $where3 = array('status' => 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
       
       
    //   here
        $data['drivers'] =  $this->driver_model->get_drivers();
       
        
       
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "((ch.driver_id = 0) or (ch.driver_id IS NULL) ) and ch.vendor_id=".$vendor_id;
        }else{
            $where2 = "((ch.driver_id = 0) or (ch.driver_id IS NULL))";
        }
        $where2 .= " and ch.status = 'Requested' ";
        $where2 .= " and (ch.pick_date='".$next."' or (ch.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'))";
        $data['cash'] =  $this->cash_model->get_where($where2);
        // $data['cash'] =  $this->cash_model->speedtest($where2);
        
        //   echo '<pre>';
        // print_r($data);
        // die();

       // $data['customer'] =  $this->bag_model->get_customer_id();
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        
        
        
        //$data['types'] =  $this->order_model->get_deliveries_type_where($where3);
        $this->load->view('cash/unassigned',$data);
    }
 public function unassigned_by_created_date()
    {
        $where2 = array('u.status'=> 1 );
        $data['drivers'] =  $this->driver_model->get_drivers($where2);
        $from_date = !empty($this->input->post('from')) ? $this->input->post('from') : date('Y-m-d', strtotime('-1 day'));
    
        $to_date = !empty($this->input->post('to')) ? $this->input->post('to') : date('Y-m-d');
        $data["selection"]= $_POST;
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where = "ch.driver_id = 0 and ch.vendor_id=".$vendor_id;
        }else{
            $where = " (ch.driver_id = 0 or ch.driver_id IS NULL)";
        }
        
        $where .= " and ((ch.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or 
        (ch.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'))";
         $data['cash'] =  $this->cash_model->get_where($where);

        $this->load->view('cash/unassigned', $data);
    }
    public function assigned()
    {
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where = "ch.driver_id != 0 and ch.status='Assign' and ch.vendor_id=".$vendor_id;
        }else{
            $where = "ch.driver_id != 0 and ch.status='Assigned'";
        }
    
        $where .= " and (ch.pick_date='".$next."' or (ch.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'))";
        $data['orders'] =  $this->cash_model->get_where($where);
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('cash/assigned', $data);
        
    }
    public function completed()
    {
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
       if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where = "ch.driver_id != 0 and ch.status ='Picked Up' and ch.vendor_id=".$vendor_id;
        }else{
            $where = "ch.driver_id != 0 and ch.status ='Picked Up'";
        }
    
        $where .= " and (ch.pick_date='".$next."' or (ch.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'))";
        $data['orders'] =  $this->cash_model->get_where($where);
 
        $this->load->view('cash/completed', $data);
        
    }

    public function assigned_by_created_date()
    {
        $data = array('orders'=>array());
        if(!empty($_POST)){
            $from_date = $_POST['from'];
        
            $to_date = $_POST['to'];
            $data["selection"]= $_POST;
            if(strtolower($this->session->userdata('role')) == 'vendor'){
                $vendor_id = $this->session->userdata('u_id');
                $where = "ch.driver_id != 0 and ch.status='Assigned' and ch.vendor_id=".$vendor_id;
            }else{
                $where = "ch.driver_id != 0 and ch.status='Assigned'";
            }
            
            $where .= " and ((ch.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or 
            (ch.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or
            (ch.collected_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'))";
             $data['orders'] =  $this->cash_model->get_where($where);
        }
        $this->load->view('cash/assigned', $data);
    }
    public function completed_by_created_date()
    {
      
        $from_date = $_POST['from'];
    
        $to_date = $_POST['to'];
        $data["selection"]= $_POST;
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where = "ch.driver_id != 0 and ch.status !='Assigned' and ch.vendor_id=".$vendor_id;
        }else{
            $where = "ch.driver_id != 0 and ch.status !='Assigned'";
        }
        
        $where .= " and ((ch.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or 
        (ch.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or
        (ch.collected_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'))";

         $data['orders'] =  $this->cash_model->get_where($where);
        $this->load->view('cash/completed', $data);
    }
   public function un_assign_driver(){
        $response = array('success' => false);
        $order_ids = $_POST['order_ids'];
        // $order_ids = array("354");
        $order_ids_ = implode(',', $order_ids);

        if(count($order_ids) > 0){
            $fields = array(
                'status' => 'Requested',
                'driver_id' => 0,
              
                'assign_date' =>  "0000-00-00 00:00:00",
               
                'created_terminal' => gethostname()
            );

            //assign orders to drivers
            $result =  $this->cash_model->assign_drives($fields, $order_ids_);
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
    }

public function delete_drivers_delivry()
{
      $response = array('success' => false);
       
        $bag_ids = $_POST['bags_id'];
        //$bag_ids = implode(',', $bag_ids);

        if(count($bag_ids) > 0){
               
            $where = $bag_ids;
            $result =  $this->bag_model->delete_bags($where);
              
                if($result){
                    $response['success'] = true;
                }

        }

        echo json_encode($response);
    }

    public function delete_cash(){
        $response = array('success' => false);
       
        $cash_ids = $this->input->post('cash_ids');
        $cash_ids_str = implode(',', $cash_ids);

        if(count($cash_ids) > 0){
            $result =  $this->cash_model->delete_cash($cash_ids_str);
            if($result){
                $response['success'] = true;
            }
        }
        echo json_encode($response);
    }
    
    public function process_cash(){
        $response = array('success' => false);
       
        $cash_ids = $this->input->post('cash_ids');
        if(count($cash_ids) > 0){
            $fields = array(
                'is_cancelled' => 'no'
            );
            $result =  $this->cash_model->update_cash_by_ids($cash_ids,$fields);
            if($result){
                $response['success'] = true;
            }
        }
        echo json_encode($response);
    }
    
    public function cancel_cash(){
        $response = array('success' => false);
        $cash_ids = $this->input->post('cash_ids');
        if(count($cash_ids) > 0){
            $fields = array(
                'is_cancelled' => 'yes'
            );
            $result =  $this->cash_model->update_cash_by_ids($cash_ids,$fields);
            if($result){
                $response['success'] = true;
            }
        }
        echo json_encode($response);
    }
    public function assign_drivers_delivry()
    {
        $driver_id = $_POST['driver_id'];
        $bag_ids = $_POST['bags_id'];
        //$order_ids_ = implode(',', $bag_ids);

         if(count($bag_ids) > 0){
            $fields = array(
                'status' => 'Assign',
                'driver_id' => $driver_id
               // 'updated_terminal' => gethostname()
                
            );
            $result =  $this->bag_model->assign_drives($fields,$bag_ids);
        }
         echo json_encode($result);
    }
    public function assign_drivers(){
        $response = array('success' => false);
        $driver_id = $this->input->post('driver_id');
        $cash_ids = $this->input->post('cash_ids');
        $cash_ids_str = implode(',', $cash_ids);

        if(count($cash_ids) > 0){
            $fields = array(
                'status' => 'Assigned',
                'assigned_mode' => 'Manual',
                'assigned_user' => $this->session->userdata('email'),
                  'assign_date' =>  date("Y-m-d H:i:s"),
                'driver_id' => $driver_id
               // 'updated_terminal' => gethostname()
            );

            //assign orders to drivers
            $result =  $this->cash_model->assign_drives($fields, $cash_ids_str);
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
                        'status_code' => intval(502),
                        'title' => 'Assign un-subscribe cash collection',
                        'for_whom' => 'Driver',
                        'message' => count($bag_ids).' un-subscribe Cash collection has been assigned'
                    );

                    //send notification
                    send_notification_to_user($data, 'save');
                }
            }
        }
        echo json_encode($response);
    }
    
    
    
      public function Auto_assign_drivers(){
        
      
        $bag_ids = $this->input->post('bag_ids');
        $deliv_ids = implode(',', $bag_ids);
     
           
            $delivries=$this->cash_model->get_related_deliveries($deliv_ids);
            // echo '<pre>';
            // print_r($delivries);
            
            $not_assigned=array();
             //$assigned_deliviries_ids=array();
            foreach($delivries as $key => $value){
                $emiID= $value->emirateID;
                $areaID= $value->areaID;
                $slotID= $value->slotID;
                $ID=$value->cash_id;

#Should get today delivery count of driver before insertion of every delivery  
              
                $driver_id_arr=$this->bag_model->get_related_drivers();  
            //      echo '<br>this is driver list:<pre>';
            // print_r($driver_id_arr);
        //   die();
                foreach($driver_id_arr as $Dkey => $Dvalue){
                    
                    if($emiID==$Dvalue->emirate_id && $areaID==$Dvalue->area_id && $slotID==$Dvalue->time_slot_id && !($Dvalue->DRIVERS_TODAY_DELIVERIRS > 150) ){
                        
                        
                        
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
                                    'status' => 'Assigned',
                                    'driver_id' => $Driver_ID,
                                    'assign_date' =>  date("Y-m-d H:i:s"),
                                    'assigned_user' => $this->session->userdata('email'),
                                    'assigned_mode' => 'Auto',
                                    'driver_id' => $Driver_ID
                                 
                                    
                                );
                                // echo '<br>these are fileds:<pre>';
                                // print_r($fields);
                 $result =  $this->cash_model->auto_assign_drives($fields,$ID);
                //  echo '<br>result:<pre>';
                //  print_r($result);
                    
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

    /***************************************************************************/
    /********************ADMIN DASHBOARD LIST******************************/
    /***************************************************************************/
    public function dashboard_list(){
        $start_date = @$_POST['pick_start_date'] ? @$_POST['pick_start_date'] : date('Y-m-d');
        $end_date = @$_POST['pick_end_date'] ? @$_POST['pick_end_date'] : date('Y-m-d');

        $where = " b.pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        $data['bags'] =  $this->bag_model->get_where($where);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('bag/dashboard_list', $data);
    }

    public function get_by_pick_date(){
        $response = array('success' => false);
        $start_date = $_POST['start_date'] ? $_POST['start_date'] : date('Y-m-d');
        $end_date = $_POST['end_date'] ? $_POST['end_date'] : date('Y-m-d');

        $where = " b.pick_date BETWEEN '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'";
        $bags =  $this->bag_model->get_where($where);

        if($bags){
            $response['success'] = true;
            $response['bags'] = $bags;
        }

        echo json_encode($response);
    }

// Taha minor change according to live code
    // public function save_cash_form()
    // {
    //     $cst['phone'] = $this->input->post('cst_phone');
    //     $cst['full_name'] = $this->input->post('cst_name');
    //     $cst['address'] = $this->input->post('del_address').', '.$this->input->post('area');
    //     $cst['vendor_id'] = $this->input->post('order_vendor_id');
    //     $cst['send_notification'] = $this->input->post('notification')?$this->input->post('notification'):1;

    //     $cashArr = [];
    //     $cstt = $this->cash_model->get_customer_id($cst);
    //     $cashArr['customer_id'] = $cstt[0]['id'];
    //     $cashArr['vendor_id'] = $this->input->post('order_vendor_id');
    //     $cashArr['type_id'] = $this->input->post('type_id');
    //     $cashArr['total_amount'] = $this->input->post('amount');
    //     $cashArr['payment_type_id'] = $this->input->post('ptype_id');
    //   // $cashArr['amount_received'] = $this->input->post('amount');
    //     $cashArr['status'] = 'Requested';
    //     $cashArr['created_dt'] = date('Y-m-d-H-i-s');
    //     $cashArr['pick_date'] = $this->input->post('pick_date');
    //     $cashArr['created_terminal'] = gethostname();
    //     $cashArr['created_user'] = $this->session->userdata('email');
    //     $cashArr['cash_note'] = $this->input->post('cash_notes');
    //     $cashArr['cash_notification'] = $this->input->post('notification');
    //     $service_typ=2;
    //      $cashArr['service_type_id'] = $service_typ;
        
    //      // To get area id by name code start
                
    //               $area_str=$this->input->post('del_address').', '.$this->input->post('area');
    //                   $area_arr=explode(",",$area_str);
    //                   $indx= count($area_arr)-1;
    //                   $Aname=$area_arr[$indx];
    //                   $Aname=ltrim($Aname," ");
    //                 $Aname=rtrim($Aname," ");
    //             $areaID=$this->order_model->getareaID_withName($Aname);
                      
    //     // To get area id by name code END
                
               
    //     // To get Emirate and slot id by name code start
    //                 $string_emirate=$this->input->post('type_id');
    //                 $emirate_arr=explode(",",$string_emirate);
    //                 $eid=$emirate_arr[0];
    //             $emirateID=$this->order_model->getemirateID_withName($eid);
    //                 $sid=$emirate_arr[1];
    //             $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
    //      // To get emirate id by name code END
         
    //      $cashArr['areaID'] = $areaID;
    //      $cashArr['emirateID'] = $emirateID;
    //      $cashArr['slotID'] = $slot_ID;
         
         
    //       // Track partner price start
    //      $dt= $cashArr['pick_date'];
    //      $vendor_id= $cashArr['vendor_id'];
         
    //      $ans=$this->cash_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
    //      //echo $this->db->last_query();
       
    //                         if($ans[0]->ans == 'no'){
                                
                                
    //                             if($ans[0]->price==''){
    //                                 $p_price=0;
    //                                 $discount_track = '';
    //                             }else{
    //                              $p_price=$ans[0]->price;
    //                              $discount_track = '';
    //                             }
                                
    //                         }else{
    //                              if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
    //                             $p_price=0;
    //                             else
    //                             $p_price=$ans[0]->same_loc_price;
                                
                                
    //                           $discount_track =$ans[1]->ids;
                              
                              
    //                           $base_discount_tracker=$ans[1]->ids;
    //                             $where_tracker=$this->db->where('cash_id',$base_discount_tracker);
                                
    //                             $field['discount_track']='0';
    //                             $ans=$this->cash_model->update($field, $where_tracker);
    //                         }
         
    //     // print_r($ans);
    //     //  die();
         
    //          $cashArr['partner_price']= $p_price;
    //          $cashArr['discount_track']= $discount_track;
    //          $cashArr['cash_address']=$area_str;
    //      //Track partner price end
        
    //     $res = $this->cash_model->save_cash_data($cashArr);
    //     if ($res) {
    //         $this->session->set_flashdata('success',"Cash informations successfully added.");
    //     }else{
    //         $this->session->set_flashdata('success',"ERROR Cash informations successfully added.");
    //     }
    //     redirect('upload_cash');
    // }
    
     public function save_cash_form()
    {
        $cst['phone'] = $this->input->post('cst_phone');
        $cst['full_name'] = $this->input->post('cst_name');
        $cst['address'] = $this->input->post('del_address').', '.$this->input->post('area');
        $cst['vendor_id'] = $this->input->post('order_vendor_id');
        $cst['send_notification'] = $this->input->post('notification')?$this->input->post('notification'):1;

        $cashArr = [];
        $cstt = $this->cash_model->get_customer_id($cst);
        $cashArr['customer_id'] = $cstt[0]['id'];
        $cashArr['vendor_id'] = $this->input->post('order_vendor_id');
        $cashArr['type_id'] = $this->input->post('type_id');
        $cashArr['total_amount'] = $this->input->post('amount');
        $cashArr['payment_type_id'] = $this->input->post('ptype_id');
       // $cashArr['amount_received'] = $this->input->post('amount');
        $cashArr['status'] = 'Requested';
        $cashArr['created_dt'] = date('Y-m-d-H-i-s');
        $cashArr['pick_date'] = $this->input->post('pick_date');
        $cashArr['created_terminal'] = gethostname();
        $cashArr['created_user'] = $this->session->userdata('email');
        $cashArr['cash_note'] = $this->input->post('cash_notes');
        $cashArr['cash_notification'] = $this->input->post('notification');
        $service_typ=2;
         $cashArr['service_type_id'] = $service_typ;
        
         // To get area id by name code start
                
                   $area_str=$this->input->post('del_address').', '.$this->input->post('area');
                       $area_arr=explode(",",$area_str);
                       $indx= count($area_arr)-1;
                       $Aname=$area_arr[$indx];
                       $Aname=ltrim($Aname," ");
                    $Aname=rtrim($Aname," ");
                $areaID=$this->order_model->getareaID_withName($Aname);
                      
        // To get area id by name code END
                
               
        // To get Emirate and slot id by name code start
                    $string_emirate=$this->input->post('type_id');
                    $emirate_arr=explode(",",$string_emirate);
                    $eid=$emirate_arr[0];
                $emirateID=$this->order_model->getemirateID_withName($eid);
                    $sid=$emirate_arr[1];
                $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
         // To get emirate id by name code END
         
         $cashArr['areaID'] = $areaID;
         $cashArr['emirateID'] = $emirateID;
         $cashArr['slotID'] = $slot_ID;
         
         
           // Track partner price start
         $dt= $cashArr['pick_date'];
         $vendor_id= $cashArr['vendor_id'];
         
         $ans=$this->cash_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
         //echo $this->db->last_query();
       
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
                                $where_tracker=$this->db->where('cash_id',$base_discount_tracker);
                                
                                $field['discount_track']='0';
                                $ans=$this->cash_model->update($field, $where_tracker);
                            }
         
        // print_r($ans);
        //  die();
         
             $cashArr['partner_price']= $p_price;
             $cashArr['discount_track']= $discount_track;
             $cashArr['cash_address']=$area_str;
         //Track partner price end
        
        $res = $this->cash_model->save_cash_data($cashArr);
        if ($res) {
            $this->session->set_flashdata('success',"Cash informations successfully added.");
        }else{
            $this->session->set_flashdata('success',"ERROR Cash informations successfully added.");
        }
        redirect('upload_cash');
    }

    public function create_csutomer()
    {
        $code = mt_rand(100000, 999999);
        $customer_data = array(
            'full_name' => $this->input->post('full_name'),
            'phone' => $this->input->post('phone'),
            'vendor_id' => $this->input->post('vendor_id'),
            'role_id' => 4,
            'address' => $this->input->post('address'),
            'code' => $code,
            'created_dt' => date("Y-m-d H:i:s"),
            'created_user' => $this->session->userdata('email'),
            //'is_child' => $is_child,
            'created_terminal' => gethostname()
        );
    $this->db->insert('users', $customer_data);
    $cid = $this->db->insert_id();
    echo json_encode(array('customer_id' => $cid));
    }

    public function update_customer()
    {
        $customer_data = array(
            'full_name' => $this->input->post('full_name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'created_user' => $this->session->userdata('email'),
            'created_terminal' => gethostname()
        );
        $cid = $this->input->post('customer_id');
        $this->db->where(array('id'=>$cid));
        $this->db->update('users', $customer_data);

        echo json_encode(array('customer_id'=>$cid));
    }

//   Taha minor changes according to live code
    // function save_cash_end()
    // {
    //     $ids = array();
    //     if(!empty($this->input->post('cash')))
    //     {
    //         $cash = $this->input->post('cash');
    //         // echo 'CASHHHHH:<pre>';
    //         // print_r($cash);
    //         // die();
    //         foreach($cash as $ch)
    //         {
    //             $cashArr = [];
    //             $cashArr['customer_id'] = $ch['customer_id'];
    //             $cashArr['vendor_id'] = $ch['vendor_id'];
    //             $cashArr['type_id'] = $ch['type_id'];
    //             $cashArr['total_amount'] = $ch['amount'];
    //             $cashArr['payment_type_id'] = $ch['ptype_id'];
    //             //$cashArr['amount_received'] = $ch['amount'];
    //             $cashArr['status'] = 'Requested';
    //             $cashArr['created_dt'] = date('Y-m-d-H-i-s');
    //             $cashArr['pick_date'] = $ch['pick_date'];
    //             $cashArr['created_terminal'] = gethostname();
    //             $cashArr['created_user'] = $this->session->userdata('email');
    //             $cashArr['cash_note'] = $ch['bag_notes'];
    //             $cashArr['cash_notification'] = $ch['notification'];
                
    //             $service_typ=2;
    //              $cashArr['service_type_id'] = $service_typ;
            
    //          // To get area id by name code start
                
    //               $area_str=$ch['address'];
    //                   $area_arr=explode(",",$area_str);
    //                   $indx= count($area_arr)-1;
    //                   $Aname=$area_arr[$indx];
    //                   $Aname=ltrim($Aname," ");
    //                 $Aname=rtrim($Aname," ");
    //             $areaID=$this->order_model->getareaID_withName($Aname);
                      
    //     // To get area id by name code END
                
                
    //     // To get Emirate and slot id by name code start
    //                 $string_emirate=$cashArr['type_id'];;
    //                 $emirate_arr=explode(",",$string_emirate);
    //                 $eid=$emirate_arr[0];
    //             $emirateID=$this->order_model->getemirateID_withName($eid);
    //                 $sid=$emirate_arr[1];
    //             $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
    //      // To get emirate id by name code END
         
    //      $cashArr['areaID'] = $areaID;
    //     $cashArr['emirateID'] = $emirateID;
    //     $cashArr['slotID'] = $slot_ID;
        
        
    //      // Track partner price start
    //      $dt= $ch['pick_date'];
    //      $vendor_id= $ch['vendor_id'];
         
    //      $ans=$this->cash_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
    //                         if($ans[0]->ans == 'no'){
    //                             if($ans[0]->price==''){
    //                                 $p_price=0;
    //                                 $discount_track = '';
    //                             }else{
    //                              $p_price=$ans[0]->price;
    //                              $discount_track = '';
    //                             }
    //                         }else{if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
    //                             $p_price=0;
    //                             else
    //                             $p_price=$ans[0]->same_loc_price;
                                
    //                           $discount_track =$ans[1]->ids;
                              
    //                           $base_discount_tracker=$ans[1]->ids;
    //                             $where_tracker=$this->db->where('cash_id',$base_discount_tracker);
                                
    //                             $field['discount_track']='0';
    //                             $ans=$this->cash_model->update($field, $where_tracker);
    //                             array_push($ids, $ans);
    //                         }
         
    //     //  print_r($ans);
    //     //  die();
         
    //          $cashArr['partner_price']= $p_price;
    //          $cashArr['discount_track']= $discount_track;
    //          $cashArr['cash_address']=$ch['address'];
    //      //Track partner price end

    //             $this->db->insert('cashs', $cashArr);
    //             //  print_r($cashArr);
    //             //  echo '<pre> last query <br>:';
    //             //  print_r($this->db->last_query());
               
    //             array_push($ids, $this->db->insert_id());
    //             //  echo 'ids:';
    //             // print_r($ids);
    //         }
    //         echo json_encode($ids);
    //     }
    // }
    
     function save_cash_end()
    {
        $ids = array();
        if(!empty($this->input->post('cash')))
        {
            $cash = $this->input->post('cash');
            // echo 'CASHHHHH:<pre>';
            // print_r($cash);
            // die();
            foreach($cash as $ch)
            {
                $cashArr = [];
                $cashArr['customer_id'] = $ch['customer_id'];
                $cashArr['vendor_id'] = $ch['vendor_id'];
                $cashArr['type_id'] = $ch['type_id'];
                $cashArr['total_amount'] = $ch['amount'];
                $cashArr['payment_type_id'] = $ch['ptype_id'];
                //$cashArr['amount_received'] = $ch['amount'];
                $cashArr['status'] = 'Requested';
                $cashArr['created_dt'] = date('Y-m-d-H-i-s');
                $cashArr['pick_date'] = $ch['pick_date'];
                $cashArr['created_terminal'] = gethostname();
                $cashArr['created_user'] = $this->session->userdata('email');
                $cashArr['cash_note'] = $ch['bag_notes'];
                $cashArr['cash_notification'] = $ch['notification'];
                
                $service_typ=2;
                 $cashArr['service_type_id'] = $service_typ;
            
             // To get area id by name code start
                
                   $area_str=$ch['address'];
                       $area_arr=explode(",",$area_str);
                       $indx= count($area_arr)-1;
                       $Aname=$area_arr[$indx];
                       $Aname=ltrim($Aname," ");
                    $Aname=rtrim($Aname," ");
                $areaID=$this->order_model->getareaID_withName($Aname);
                      
        // To get area id by name code END
                
                
        // To get Emirate and slot id by name code start
                    $string_emirate=$cashArr['type_id'];;
                    $emirate_arr=explode(",",$string_emirate);
                    $eid=$emirate_arr[0];
                $emirateID=$this->order_model->getemirateID_withName($eid);
                    $sid=$emirate_arr[1];
                $slot_ID=$this->order_model->gettimeslotID_withName($sid);
                
         // To get emirate id by name code END
         
         $cashArr['areaID'] = $areaID;
        $cashArr['emirateID'] = $emirateID;
        $cashArr['slotID'] = $slot_ID;
        
        
         // Track partner price start
         $dt= $ch['pick_date'];
         $vendor_id= $ch['vendor_id'];
         
         $ans=$this->cash_model->get_partner_price($vendor_id,$dt,$emirateID,$area_str,$service_typ,$string_emirate);
       
                            if($ans[0]->ans == 'no'){
                                if($ans[0]->price==''){
                                    $p_price=0;
                                    $discount_track = '';
                                }else{
                                 $p_price=$ans[0]->price;
                                 $discount_track = '';
                                }
                            }else{if($ans[0]->same_loc_price == 0 OR $ans[0]->same_loc_price == '')
                                $p_price=0;
                                else
                                $p_price=$ans[0]->same_loc_price;
                                
                              $discount_track =$ans[1]->ids;
                              
                              $base_discount_tracker=$ans[1]->ids;
                                $where_tracker=$this->db->where('cash_id',$base_discount_tracker);
                                
                                $field['discount_track']='0';
                                $ans=$this->cash_model->update($field, $where_tracker);
                                array_push($ids, $ans);
                            }
         
        //  print_r($ans);
        //  die();
         
             $cashArr['partner_price']= $p_price;
             $cashArr['discount_track']= $discount_track;
             $cashArr['cash_address']=$ch['address'];
         //Track partner price end

                $this->db->insert('cashs', $cashArr);
                //  print_r($cashArr);
                //  echo '<pre> last query <br>:';
                //  print_r($this->db->last_query());
               
                array_push($ids, $this->db->insert_id());
                //  echo 'ids:';
                // print_r($ids);
            }
            echo json_encode($ids);
        }
    }
    
    public function cash_status_AC(){
        //   $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
       
          
       
    
        // // $where .= "ch.pick_date='".$cdate."' or (ch.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59')";
        //  $where = "(ch.status = 'Requested' or ch.status = 'Assigned'  or ch.status = 'Picked' or ch.status = 'No Cash') and ch.pick_date BETWEEN '".$cdate."' and '".$next."'";
        // $data['orders'] =  $this->cash_model->get_where($where);
        // // echo '<pre>';
        // // print_r($data);
        // // die();
        redirect('auth/userdashboard');
        $this->load->view('cash/cash_status', $data);
    }
    
    
    public function AC_get_cash_by_id(){
        $response = array('success' => false);
        $cash_id = $_POST['cash_id'];
        $track_id =explode(",",$_POST['track_ids']);
        $order_detail =  $this->cash_model->get_cash_by_id($cash_id);
        $track_detail =  $this->cash_model->get_trackbag_by_id($track_id);
          
         
          
          
        if(count($order_detail) > 0){
            $response['success'] = true;
            $response['detail'] = $order_detail;
           $response['track'] =  $track_detail;
        }
          
        //   echo '<pre>';
        //   print_r($response);
        echo json_encode($response);
    }
    
      public function AC_cancel_cash(){
        
                $ID=$this->input->post('id');
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
                    $path=$this->upload_image($profImg,'cancel_cash');
                $cancel_by=$this->session->userdata('email');
                          
                          // to save the exact cancelletaion status of delivery when its cancel
                        
                        
                        $get_old_status=$this->cash_model->get_old_status($ID,'cancel');
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
                
             $where=$this->db->where('cash_id',$ID);
            $res=$this->cash_model->update($fields, $where);
            
            if($res){
                $ans=$this->cash_model->notify_to($ID,'cancel');
                  $this->cash_model->send_cancelation_email($ID);
            }else{
                
            }
            
            return $res;
                
                
    }
    
    
    
    public function AC_revert_(){
        
        $ID=$this->input->post('id');
        
        $get_old_status=$this->cash_model->get_old_status($ID,'revert');
        
            $update_by=$this->session->userdata('email');
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
            
            
            $where=$this->db->where('cash_id',$ID);
            $res=$this->cash_model->update($fields, $where);
            
            if($res){
                $ans=$this->cash_model->notify_to($ID,'revert');
                $this->cash_model->send_cancelation_email($ID,'revert');
            }else{
                
            }
            
            return $res;
        
    }
    
    
    
    private function upload_image($b64_string,$name)
    {
        $ext = 'pdf';
        $directory_path ='assets/Canceled_Uploads/cash/';
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
    
    
    public function AC_cancelled_(){
        
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        $where = "";
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where .= "ch.vendor_id=".$vendor_id;
        }
        $where .= (($where2 != "") ? " and " : "")."  (ch.pick_date='".$cdate."' or (ch.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'))";
        $data['cash'] =  $this->cash_model->get_where($where,true);
        $this->load->view('cash/AC_cancelled', $data);
    
        
    }
    
    
    public function AC_cancelled_by_created_date()
    {
        $data = array('orders'=>array());
      if(!empty($_POST)){
        $from_date = $_POST['from'];
        $to_date = $_POST['to'];
        $data["selection"]= $_POST;
        $where = "";
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where .= "ch.vendor_id=".$vendor_id;
        }
        
        $where .= (($where2 != "") ? " and " : "")."  (ch.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59')";
         $data['cash'] =  $this->cash_model->get_where($where, true);
     }
        $this->load->view('cash/AC_cancelled', $data);
    }



}

?>