<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 24/3/2021
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MonthlyMeal extends CI_Controller
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
        
        $this->load->model('MonthlyMeals_model');
    }
   
   public function index(){
       echo 'hi';
       
   }



    ///////////////API//////////////////
    public function get_api(){
        $this->load->view('report/api', $data='');
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

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $report_data = $data['orders'] =  $this->order_model->get_orders_CSV($where);
        /**/

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($report_data, $delimiter, $newline);
        force_download('Deliveries.csv', $data);
    }


     /***************************************************************************/
    /********************************Monthly Meal*******************************/
    /***************************************************************************/
    
    
    /********************** Plan Status **************************/
    
    public function mealPlans(){
        // echo 'hi';
        // die();
        $result=$this->MonthlyMeals_model->get_customer_name_and_codes();
        // $result=$this->MonthlyMeals_model->get_user_with_codes();
        
       
         
        
        //  die();
        $data=array('customer_name_code'=>$result);
        
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('Monthly_deliveries/plan_list.php',$data);
    }
    
    public function add_mealPlan(){
       
        $result=$this->MonthlyMeals_model->get_user_with_codes();
       $partners=$this->MonthlyMeals_model->get_all_partners_for_mealplan();
        
        // $partners=array();
        $data=array('customer_name_code'=>$result,'partners'=>$partners);
        
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('Monthly_deliveries/add_plan.php', $data);
    }
    
    // 0 => Active
    // 1=> Completed
    // 2=> Hold/Freeze
    // 3=> Cancel

    public function get_MealPlans_report(){
        
        $response = array('success' => false, 'data'=>array(), 'recordsTotal'=>0, 'recordsFiltered'=>0, 'all_post'=>$this->input->post());
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $status = @$this->input->post('status');
        $ccode = @$this->input->post('ccode');
        $cid = @$this->input->post('cid');
        
        
        $start = !empty($this->input->post('start')) ? $this->input->post('start') : 0;
        $length = !empty($this->input->post('length')) ? $this->input->post('length') : 50;
        
        if(empty($start_date)){
            $start_date = date('Y-m-d');
        }

        if(empty($end_date)){
            $end_date = date('Y-m-d', strtotime('+1 days'));
        }
        
        
       //exit($start_date.'________'.$end_date);
        // if(strtolower($this->session->userdata('role')) == 'vendor'){
        //     $vendor_id = $this->session->userdata('u_id');
        //     $where = "o.driver_id > 0 AND o.vendor_id=".$vendor_id." AND (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        // }else{
            //  $where = "o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        
            // $where = "o.driver_id > 0 and (o.delivered_status = 1) AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        // }
        
        
       
        if(strtolower($this->session->userdata('role')) == 'admin'){
            
            // $where = "o.forcely_check ='yes'  AND  o.forcely_changed_at BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
            if($status != 4){ $where = "o.completed_status =$status";}else{ $where=" o.vendor_id!='' ";}
       
        }else{
            if(strtolower($this->session->userdata('role')) == 'vendor'){
               $vendor_id = $this->session->userdata('u_id');
               
             
               if($status != 4){ $where = "o.completed_status =$status AND o.vendor_id=$vendor_id";}else{
                    $where ="o.vendor_id=$vendor_id";
               }
            }
        }
        
        
        if($ccode!='' AND $cid!=''){
            $where .= " AND o.plan_id=$ccode  ";
        }else if($ccode!=''){
             $where .= " AND o.plan_id=$ccode  ";
        }else if($cid!=''){
             $where .= " AND o.plan_id=$cid  ";
        }

        //if searching is requested
        $search = null;
        if(!empty($this->input->post('search')['value']))
        {
            $search = $this->input->post('search')['value'];
            $search=strtolower($search);
            if($search=='acti' OR $search=='active' OR $search=='act'){$search=0;}else if($search=='complet' OR $search=='completed' OR $search=='complete'){$search=1;}else if($search=='freezed' OR $search=='freez' OR $search=='freez'){$search=2;}else if($search=='canceld' OR $search=='canceled' OR $search=='cancel'){$search=3;}else{}
            
            // o.plan_id '%".$search."%' OR 
            $where .= " AND (o.pcustomer_id LIKE '%".$search."%' OR o.plan_start_date LIKE '%".$search."%' OR o.vendor_name LIKE '%".$search."%' OR o.completed_status LIKE '%".$search."%'  OR c.full_name LIKE '%".$search."%' )";

        }
        $response['search'] = $search;
        
        
        //   echo 'i am search:'. $search;
        //   echo 'i am where:<br>'. $where;
        //   die();
          
        // echo 'i am order: ';
        // print_r($this->input->post('order'));
        //sorting code
        if(!empty($this->input->post('order')))
        {
            $table_order = $this->input->post('order')[0];
            $col_num = $table_order['column'];
            $order_dir = $table_order['dir'];
            
            // print_r($table_order);
            // die();
            // echo $col_num;
            // die();
            switch ($col_num) {
                
                 case 1:
                    $col_name = 'o.plan_id';
                    break;
                case 2:
                    $col_name = 'o.pcustomer_id';
                    break;    
                case 3:
                    $col_name = 'c.full_name';
                    break;
                    
                case 4:
                   $col_name = 'o.plan_start_date';
                   break;
                
                case 7:
                    // o.delivery_date
                    $col_name = 'o.completed_status';
                    break;
                case 8:
                    $col_name = 'o.vendor_name';
                    break;
                
                
                   
                default:
                    $col_name = null;
                    break;
            }
        }
        //end sorting

        $report_data =  $this->MonthlyMeals_model->get_Meal_plans($where, $start, $length, $col_name, $order_dir);
        // print_r($report_data);
        //     die();
        if(count($report_data) > 0){
            
           
            
            
        //     foreach($report_data as $key => $data){
        //     //  echo $data[plan_id].'<br>';
        //     //  $report_data[$key][exp_date]='test';
          
        //      $res=$this->MonthlyMeals_model->get_plan_exp($data[plan_id]);
        //      $stats = $this->MonthlyMeals_model->get_plan_stats($data[plan_id]);
             
        //       $report_data[$key][exp_date]=date('Y-m-d', strtotime($res[0]->delivery_date));
        //      $report_data[$key][no_of_days]=$stats[0]->no_days;
        //     //  echo '<pre>';
        //     //  print_r($res);
             
        //   }
             
            //  print_r($report_data);
            // die();
            
            $response['success'] = true;
            $response['data'] = $report_data;
            $response['draw'] = $this->input->post('draw');
            $response['recordsTotal'] = $this->MonthlyMeals_model->get_total_results_new($where);
            $response['recordsFiltered'] = $response['recordsTotal'];
           }
        // echo 'i am response <pre>';
        // print_r($response['recordsTotal']);
        //  echo '<pre>';
        // die();

        echo json_encode($response);
    }
    
    
    
    
    public function total_deliveries(){
         $planid=$this->uri->segment(3)? $this->uri->segment(3): 0;
        $op=$this->uri->segment(4)? $this->uri->segment(4): 0;
        
        // $vd=$this->uri->segment(5)? $this->uri->segment(5): 0;
        
        //  TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
             
             $where = "o.plan_id=$planid";
         }else{
             $v_id= $this->session->userdata('u_id');
             $where = "o.vendor_id=$v_id AND o.plan_id=$planid";
         } 
         
         if($op ==1){
             //  Total deliveries  AND o.action != 'Paused' 
             $where=$where." AND o.action != 'Freezed' ";
         }else if($op ==2){
           $where=$where." AND (o.status='Collected' OR o.status='Delivered') AND o.is_cancelled ='No' ";
         }else if($op ==3){
              //  Pending AND o.action != 'Paused'
              $where=$where." AND o.action != 'Freezed'  AND (o.status='Assign' OR o.status='Not Assign' OR o.status='Ship') AND o.is_cancelled ='No' ";
         }else if($op ==4){
            $where=$where." AND  o.is_cancelled ='Yes' AND o.action != 'Freezed'";
         }else{
             
         }

        //   echo $where;
        //   die();


          $orders=$this->MonthlyMeals_model->tot_deliv($where);
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
            
            // QUERY END
        $data['orders'] =$result;
        $data['op'] =$op;
    //     echo '<pre>';
    //      print_r($data);
    //   die();
       
        $this->load->view('Monthly_deliveries/tot_deliveries', $data);
    }
    
    
    public function Plan_Manage()
    {
     
       $this->load->model('order_model');
        $this->load->model('driver_model');
       
       $ch=$this->uri->segment(4);
       $plan_id=$this->uri->segment(6);
       
    //   echo $ch;
       if($ch == 1){
             
           $id=$this->uri->segment(3);
        //   echo '<br> id is:'.$id;
            $where = "u.id ='".$id."' ";
             $customer =  $this->MonthlyMeals_model->get_customer_info($where,$id);
           
       }else if($ch == 2){
           $code=$this->uri->segment(3);
        //   echo '<br> code is:'.$code;
        //   $code_id =$this->MonthlyMeals_model->get_id_by_code($code);
        //     $where = "u.id ='".$code_id."' ";
        //     $customer =  $this->vendor_model->get_customer_info($where,$code_id);
        $where = "u.id ='".$id."' ";
         $customer =  $this->MonthlyMeals_model->get_customer_info($where,$id);
       }
       
    //   echo '<pre>';
    //   print_r($customer);
    //  die();
    //   $data['vendors'] =  $this->Vendor_model->get_all_vendors();
      
   
       
        $service_typ=$this->MonthlyMeals_model->get_service_type_op();
        $emirites_typ=$this->MonthlyMeals_model->get_emirites_type_op();
        $area = $this->order_model->get_areas();
        
         $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $emi_with_time=$this->driver_model->get_combinations($data['old_emirites_typ']);
        //$emi_with_time =  $data['types'] =  $this->order_model->get_basic_timeslots();
        //  $customers =  $this->vendor_model->get_all_vendors(); 'customers' => $customers
        
        // echo '<pre>';
        // print_r($emi_with_time);
        // die();
        $passData=[
           'service_typ'=>$service_typ,
           'emirites_typ'=>$emirites_typ,
           'area' => $area,
           'time' => $emi_with_time,
           'u_name'=>$customer[0]->u_name,
           'u_email'=>$customer[0]->u_email,
           'phn'=>$customer[0]->phone,
           
           'PU_code'=>$customer[0]->customer_id,
           'vendor_n'=>$customer[0]->vendor,
           'plan_i'=>$plan_id,
           'mul_address'=>$customer[0]->mul_address,
           'c_id'=>$customer[0]->u_id,
           'vendor_id'=>$customer[0]->vendor_id,
           'send_notification' => $customer[0]->send_notification,
           'user_notes' => $customer[0]->user_notes
           
           
      ];
        
        // echo '<pre>';
        // print_r($passData);
        // die();
        $this->load->view('Monthly_deliveries/manage',$passData);
    }
    
    
    public function get_plan_detail_by_id(){
        $response = array('success' => false);
        $ch_plan_key = $this->input->post('id');
        $customerid =$this->input->post('customerid');
       
        // $where2 = array('customer_id'=>$c_id);
        
        // $ch_plan_key=$this->uri->segment(6);
        //  $where = array('id'=>$ch_plan_key);
        
        
        
         $where = "u.id ='".$customerid."' ";
         $customer =  $this->MonthlyMeals_model->get_customer_info($where,$customerid);
      
    if($customer){       
           $plan_data=$this->MonthlyMeals_model->get_plan_by_id($ch_plan_key);
           
       
             
       
        if($plan_data){
             $bags_qout = $this->MonthlyMeals_model->get_orders_by_plan_id($ch_plan_key);
             
          
             
             $stats = $this->MonthlyMeals_model->get_plan_stats($ch_plan_key);
             
           
             
                // echo '<pre>';      print_r($stats);
    //   die();
             $exp=$this->MonthlyMeals_model->get_plan_exp($ch_plan_key);
             
            //  print_r($exp);
            //  die();
            
            $response['success'] = true;
            $response['plan_data'] = $plan_data;
           
            $response['bags_qout'] = $bags_qout;
           
            $response['stats'] = $stats;
            
            $response['customer']=$customer;
            
            // $to_d=date('Y-m-d', strtotime(' +'+$stats[0]->no_days+' day'));
            
            // because total number of days mai fisrt day bhi include ho raha
            $actual_day=$stats[0]->no_days -1;
            $pas=' +'.$actual_day.' day';
            // echo 'i am a pass:::::::'+$pas;
            // die();
            // if($stats[0]->no_days !=0 && $stats[0]->no_days!=1){
            //  $to_d=date('Y-m-d', strtotime($pas, strtotime($plan_data[0]->plan_start_date))); 
            // }else if($stats[0]->no_days==1){
            //     $to_d=$plan_data[0]->plan_start_date;
            // }
            
            $to_d=date('Y-m-d', strtotime($exp[0]->delivery_date));
            
            // $stats[0]->from_d=$plan_data[0]->plan_start_date;
             $stats[0]->from_d = date('Y-m-d', strtotime($bags_qout[0]->delivery_date));
            
            $stats[0]->to_d=$to_d;
            $stats[0]->pas=$pas;
            
             $stats[0]->i_am_curr_dt=date('Y-m-d');
            
            
            
            
            
            
            
            
        }
        //   echo '<pre>';
        //   print_r($response);
        //   die();
       
    } //if customers found
        echo json_encode($response);
    }
        
        
        
        
        
        
        
        
        
        
        
        
     public function get_customercode_info_(){
        
         
        $response = array('success' => false);
       
        $code = $_POST['code'];
         $id = $_POST['id'];

        if($id != ''){
            
            //   $where = "p.customer_id =".$id;
             $report_data =  $this->MonthlyMeals_model->get_customer_info_and_bags_stats($id);
             
            //  echo '<pre>report_data';
            //  print_r($report_data);
            //  die();
            
        }else if($code != ''){
            
            $report_data =  $this->MonthlyMeals_model->get_customer_info_and_bags_stats($code);
            
        }else{
            
        }

     
       
        if($report_data){
            
            foreach($report_data as $key => $data){
                // echo $data->plan_id;
           
             $res=$this->MonthlyMeals_model->get_plan_exp($data->plan_id);
             $stats = $this->MonthlyMeals_model->get_plan_stats($data->plan_id);
             
             $res_planstart=$this->MonthlyMeals_model->get_plan_strt($data->plan_id);
             
             $data->exp_date=date('Y-m-d', strtotime($res[0]->delivery_date));
             $data->no_of_days=$stats[0]->no_days;
             
              $data->plan_start_date=date('Y-m-d', strtotime($res_planstart[0]->delivery_date));
            //  echo '<pre>';
            //  print_r($res);
             
           }
        
    //          echo '<pre>';
    //   print_r($data);
    //   die();
            
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }    
    
    
    
    
    // SAVE DELIVERIES OF MEALPLAN 
    
    public function save_order_del(){
        
        
       
        $response = array('success' => false);
       
          $index_arr='';
        //   $deliveries = $this->input->post();
        // echo 'i am deliv userdata session:';
        // echo '<pre>';
        // print_r($deliveries);
        // die();
        
        
        // echo $this->input->post('customer_id');
          
          $where = "u.id ='".$this->input->post('customer_id')."' ";
          
          $info=  $this->MonthlyMeals_model->get_customer_info($where);
          
        //   echo 'check :<pre>';
        //   print_r($info);
        //   die();
          
          if($info){
          $customer_info=$info[0];
          
          
          $date=$this->input->post('date');
        // Creating Plan first  
          
          $all_detail=array('discard'=>0,'error_details'=>array(),'pcustomer_id'=>$customer_info->customer_id,'email'=>$customer_info->u_email,'customer_id' => $customer_info->u_id, 'full_name' => $customer_info->u_name, 'phone' => $customer_info->phone,'vendor_id' =>$customer_info->vendor_id,'vendor_name'=>$customer_info->vendor);
          $all_detail = json_encode($all_detail);
          
          $plan_data=array(
                          
                        'customer_id'      => $customer_info->u_id,
                        'pcustomer_id'     => $customer_info->customer_id,
                        'all_details'       => $all_detail,
                        'plan_start_date'  => $date[0],
                        'total_days'       => count($date),
                        'created_at'       => date("Y-m-d H:i:s"),
                        'initial_plan'     => 1,
                        'vendor_id'        => $customer_info->vendor_id,
                        'vendor_name'      => $customer_info->vendor,
                        'completed_status' => 0
                        
                        );
                        
                        // echo ' i am plan data <pre> <br>';
                        // print_r($plan_data);
                    
                     $plan_result = $this->order_model->add_customer_meta('monthly_meal_plans',$plan_data);
                        // done plan
          
          
         if($plan_result){
             
            //  echo 'i am in plan has created:'.$plan_result['id'];
            //  die();
             
          
          // $deliveries =  $this->session->userdata("deliveries_data");
        // $deliveries = $this->input->post();
        // echo 'i am deliv userdata session:';
        // echo '<pre>';
        // print_r($deliveries);
        // echo 'here is';
        // // echo($this->input->post('addr_list_arr'));
        // addr_obj[refi].area_id
       
        
        //  echo $tg;
         
         
        //  echo '<pre> after: ';
        //  print_r($addr_list_arr);
        //  die();
       
        // die();
       
       
        $vendor_id = $this->input->post("vendor_id");
     //   $type_id = $_POST['type_id'];
        $signature = "Yes";
       
        
        // $delivery_date = date('Y-m-d H:i:sa', strtotime($this->input->post('delivery_date')));
        // $dt=$this->input->post('delivery_date');
        
        $customer_id =$this->input->post('customer_id');
         $tg=$this->input->post('addr_list_arr');
         $addr_list_arr=json_decode($tg);
         
        $area_array=$this->input->post('area');
        $emi_and_time_array=$this->input->post('time');
        $ref_addr=$this->input->post('addr_list');
        
        
        $send_notifications=$this->input->post('notification');
        $ProductType=$this->input->post('ProductType');
        $PickupPoint=$this->input->post('PickupPoint');
        $Delivery_Amount=$this->input->post('Delivery_Amount');
        
        $CompanyID=$this->input->post('CompanyID');
        $notes=$this->input->post('notes');
        $bagsHid=$this->input->post('bagsHid');
        $delivered_check=$this->input->post('delivered_check');
        $google_address=$this->input->post('google_address');
        $day=$this->input->post('day');
        
        
        
        

        if(count($date) > 0){
           
           $counter=0;
           foreach ($date as $key => $delivery_date) {
        //   $customer_id = $myorder->customer_id;
        $counter++;

                
         // To get area name by id  code start
                
                   $area_str=$myorder->address;
                   
                      $area_id=$area_array[$key];
                       
                $area_name=$this->MonthlyMeals_model->get_area_by_id($area_id);
               
            //   echo '<br> i am area name: '.$area_name;
               if($area_name != false){
                  $response['area_name'] = $area_name;
                 }else{
                     
                 }     
        // To get area id by name code END
                
                
        // To get Emirate and slot id by name code start
                    $string_emirate=$emi_and_time_array[$key];
                    $emirate_arr=explode(",",$string_emirate);
                    $eid=$emirate_arr[0];
                    //echo $eid;
                $emirate_name=$this->MonthlyMeals_model->getemirate_name_byID($eid);
                
                    $sid=$emirate_arr[1];
                    //echo $sid;
                $slot_name=$this->MonthlyMeals_model->gettimeslot_name_byID($sid);
               
                
                if($emirate_name != false AND $slot_name!=false ){
                    $response['emirate_name'] = $emirate_name;
                     $response['slot_name'] = $slot_name;
                     
                     $delivery_time=$emirate_name.','.$slot_name;
                }else{
                    
                }
                
         // To get emirate id by name code END
         
         
         $area_str=$addr_list_arr[$ref_addr[$key]]->address.', '.$area_name;
         
         //Service Type
         $service_typ = 2;
         
         // Track partner price start
         
         $ans=$this->order_model->get_partner_price($vendor_id,$delivery_date,$eid,$area_str,$service_typ,$delivery_time);
       
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
         
         
         //Track partner price end
         
         
        //  Google link addr
        
                $google_addr="";
                              $google_link = array("google_link"=>"None");
                            
                          $google_addr=$google_address[$key];
                          
                          if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                            //   echo '<br> i am inside if address is empty '.$google_addr;
                                  $google_link = array("google_link"=>"None");
                          }else{
                            //   echo '<br> i am inside else when address is not  empty '.$google_addr;
                              $google_link = array("google_link"=>$google_addr);
                           }
                          
                          $google_link_jsn = json_encode($google_link);
        
        // end google link addr
                
             $send_noti_new_check=$send_notifications[$key];
        
              
                    $order_data = array(
                        'send_notification' => $send_noti_new_check,
                        'status' =>  'Not Assign',
                        'name_on_delivery' =>  $customer_info->u_name,
                        'number_on_delivery' =>  $customer_info->phone,
                        'customer_id' => $customer_id,
                        'vendor_id' =>  $vendor_id,
                    //    'type_id' =>  $type_id,
                     
                        'signature' =>  $signature,
                        //'delivery_date' => date('Y-m-d', strtotime('+'.delivery_hours.' hours')),
                        'delivery_date' => date('Y-m-d H:i:s', strtotime($delivery_date)),
                        'delivery_address' =>  $area_str,
                        'pickUp' => $this->validate_items($PickupPoint[$key]),
                        'delivery_time' =>  $delivery_time,
                        //'note' =>  $deliveries[$i]['note'],
                        'note' => $this->validate_items($notes[$key]),
                        'created' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'updated_user' => $this->session->userdata('email'),
                        'created_terminal' => gethostname(),
                        'updated_terminal' => gethostname(),
                        'food_type' => $this->validate_items($ProductType[$key]),
                        'service_type_id' => $service_typ,
                        'areaID' => $area_id,
                        'emirateID' => $eid,
                        'slotID' => $sid,
                        'partner_price' => $p_price,
                        'discount_track' =>$discount_track,
                        'delivery_amount'=>$Delivery_Amount[$key],
                        'company_note'=>$this->validate_items($CompanyID[$key]),
                        'google_link_addrs'=> $google_link_jsn,
                        'day' =>$day[$key],
                        'mul_addr_id'=>$ref_addr[$key],
                        'plan_id' =>$plan_result['id'],
                        'pcustomer_id'=>$customer_info->customer_id
                        
                    );
                    
                    $tt=$tt+1;
                    //  echo '<br>order data is '.$tt.'<br>  : <pre>';
                    //  print_r($order_data);
                    //  die();
                    // save order service type id is initialy 2 to make all delivery with basic service (from tbl_service_Type)
                   
                   
                         $result = $this->order_model->add($order_data);
                         
                          if($result==0){
                             $tra=$tt+1;
                             $index_arr= $index_arr.",".$tra;
                         }
                   
                    
             
             
            //  uncomment below if *************
                if($result){
                      $response['success'] = true;
                      $response['vendor_id'] = $vendor_id;
                      $response['exceptions'] = $index_arr;
                     $name = $myorder->full_name;
                  
                    // $this->session->set_flashdata("success","Data is saved Successfully in un assigned Deliveries.");
                }

            } //end of main foreach 
            
             if($result){
               $this->session->set_flashdata('success', 'Customer Plan/Deliveries Schedule  has been successfully Saved!');
         
            //   redirect('monthlyMeal/mealPlans');
            //   innaya g
              redirect('monthlyMeal/add_mealPlan');
          }else{
               $this->session->set_flashdata('error', 'OOPs Some Issue Occures! Connection Problem, Try Again!');
            //   redirect('monthlyMeal/mealPlans');
             //   innaya g
              redirect('monthlyMeal/add_mealPlan');
          }

        }else{
            // echo "Please try again after 1 minute! And make sure you have selected start and end date";
             $this->session->set_flashdata('error', 'OOPs Some Issue Occures! Connection Problem,  And make sure you have selected start and end date, Try Again!');
            //   redirect('monthlyMeal/mealPlans');
             //   innaya g
              redirect('monthlyMeal/add_mealPlan');
        }
        
        
         }else{ // if a plan creats check end  
             $this->session->set_flashdata('error', 'OOPs Some Issue Occures! Connection Problem, Try Again! plan dosnt created');
            //   redirect('monthlyMeal/mealPlans');
             //   innaya g
              redirect('monthlyMeal/add_mealPlan');
        }  

      
        
    
    //   if($this->uri->segment(3) and $this->uri->segment(3)=="vendor"){
    //     $vendorC = $this->session->userdata('email');
    //      $msg = "Hi Admin,<br/><br/>
    //         New Schedule/Plan with Deliveries are added to the system by the vendor ".$vendorC.".<br/><br/>
    //         Regards, <br/><br/>

    //         TEAM L O G X<br/>";
    //          $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'New Plan/Schedule Deliveries Added', 'identification'=>'LOGX');
    //             send_email($param);
    //     }
        
        // echo json_encode($response);   
//echo json_encode($deliveries);
    //  echo json_encode($abc);
      
    }else{ //end of customer info
       
         $this->session->set_flashdata('error', 'OOPs Some Issue Occures! Connection Problem, Try Again! customer does not found');
              redirect('monthlyMeal/add_mealPlan');
    }
    
    
    }// end of funtion
    
    
    
    
    
    
    // EDIT Deliveries of Mealplan
    
    
    public function edit_order_deliv_plan(){
        
        
       
        $response = array('success' => false);
       
          $index_arr='';
          $deliveries = $this->input->post();
        echo 'i am deliv userdata session:';
        echo '<pre>';
        print_r($deliveries);
        // die();
        
        
        // echo $this->input->post('customer_id');
          
          $where = "u.id ='".$this->input->post('customer_id')."' ";
          
          $info=  $this->MonthlyMeals_model->get_customer_info($where);
          
          $plan_id_is=$this->input->post('plan_id_is');
         
          $plan_exist_check = $this->MonthlyMeals_model->get_plan_by_id($plan_id_is);
          
          
        //   echo 'check :<pre>';
        //   print_r($plan_exist_check);
        //   die();
          
          if($info AND $plan_exist_check){
          $customer_info=$info[0];
          
          
          $date=$this->input->post('date');
        // Creating Plan first  
          
        //   $all_detail=array('discard'=>0,'error_details'=>array(),'pcustomer_id'=>$customer_info->customer_id,'email'=>$customer_info->u_email,'customer_id' => $customer_info->u_id, 'full_name' => $customer_info->u_name, 'phone' => $customer_info->phone,'vendor_id' =>$customer_info->vendor_id,'vendor_name'=>$customer_info->vendor);
        //   $all_detail = json_encode($all_detail);
          
          $plan_data=array(
                       
                        'extended_by'      => $this->session->userdata('email'),
                        'extended_at'       => date("Y-m-d H:i:s")
                        
                        );
                        
                        // echo ' i am plan data <pre> <br>';
                        // print_r($plan_data);
                    $plan_tbl_whr=array("plan_id"=>$plan_id_is);
                     $plan_result = $this->MonthlyMeals_model->update_things_plan_tbl($plan_data,$plan_tbl_whr);
                        // done plan
          
         
         if($plan_result){
            
       
       
        $vendor_id = $this->input->post("vendor_id");
     //   $type_id = $_POST['type_id'];
        $signature = "Yes";
       
        
        // $delivery_date = date('Y-m-d H:i:sa', strtotime($this->input->post('delivery_date')));
        // $dt=$this->input->post('delivery_date');
        
        $customer_id =$this->input->post('customer_id');
         $tg=$this->input->post('addr_list_arr');
         $addr_list_arr=json_decode($tg);
         
        $area_array=$this->input->post('area');
        $emi_and_time_array=$this->input->post('time');
        $ref_addr=$this->input->post('addr_list');
        
        
        $send_notifications=$this->input->post('notification');
        $ProductType=$this->input->post('ProductType');
        $PickupPoint=$this->input->post('PickupPoint');
        $Delivery_Amount=$this->input->post('Delivery_Amount');
        
        $CompanyID=$this->input->post('CompanyID');
        $notes=$this->input->post('notes');
        $bagsHid=$this->input->post('bagsHid');
        $delivered_check=$this->input->post('delivered_check');
        $google_address=$this->input->post('google_address');
        $day=$this->input->post('day');
        
        
        $status=$this->input->post('delivery_status');
        $action=$this->input->post('freeze');
        $freezed_track=$this->input->post('freezed_track');
        
      
        
        
        
        

        if(count($date) > 0){
           
           $counter=0;
           foreach ($date as $key => $delivery_date) {
                               //   $customer_id = $myorder->customer_id;
              
                                $counter++;
               
        //  Stop when its not allowed to edit check
          if($delivered_check[$key] ==''){
                                //   echo '<br> deliveries that are NOT ignored'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key];
          
        
                                 // To get area name by id  code start
                
                                           $area_str=$myorder->address;
                   
                                              $area_id=$area_array[$key];
                       
                                        $area_name=$this->MonthlyMeals_model->get_area_by_id($area_id);
               
                                    //   echo '<br> i am area name: '.$area_name;
                                       if($area_name != false){
                                          $response['area_name'] = $area_name;
                                         }else{
                                             
                                         }     
                                // To get area id by name code END
                
                
                               // To get Emirate and slot id by name code start
                                           $string_emirate=$emi_and_time_array[$key];
                                           $emirate_arr=explode(",",$string_emirate);
                                           $eid=$emirate_arr[0];
                                           //echo $eid;
                                       $emirate_name=$this->MonthlyMeals_model->getemirate_name_byID($eid);
                
                                           $sid=$emirate_arr[1];
                                           //echo $sid;
                                       $slot_name=$this->MonthlyMeals_model->gettimeslot_name_byID($sid);
               
                
                                        if($emirate_name != false AND $slot_name!=false ){
                                            $response['emirate_name'] = $emirate_name;
                                             $response['slot_name'] = $slot_name;
                     
                                             $delivery_time=$emirate_name.','.$slot_name;
                                        }else{
                                            
                                        }
                
                                 // To get emirate id by name code END
         
         
                                        $area_str=$addr_list_arr[$ref_addr[$key]]->address.', '.$area_name;
         
                                        //Service Type
                                        $service_typ = 2;
         
         
         
        //  if it new add row in edit plan
        
        
                         // Track partner price start
           if($bagsHid[$key] =='' OR $bagsHid[$key] ==0) {
                // echo '<br> Price is calc for new delivery'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
          
                 $ans=$this->order_model->get_partner_price($vendor_id,$delivery_date,$eid,$area_str,$service_typ,$delivery_time);
                                // die();
                            if($ans[0]->ans == 'no'){
                            //   echo 'i am no';
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
         
         
         //Track partner price end
         
         
           }else if(($bagsHid[$key] !='' OR $bagsHid[$key] !=0 )){
        //  if its edit row on edit
                            //  echo '<br> Price is calc for edit delivery'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
          
        
              $ans=$this->MonthlyMeals_model->get_partner_price_m($vendor_id,$delivery_date,$eid,$area_str,$service_typ,$delivery_time,$bagsHid[$key]);
                                // die();
                            if($ans[0]->ans == 'no'){
                            //   echo 'i am no';
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
        
        
        
        
        
        
        
        
        
           }
        
        
         
         
        //  Google link addr
        
                $google_addr="";
                              $google_link = array("google_link"=>"None");
                            
                          $google_addr=$google_address[$key];
                          
                          if($google_addr =='' OR $google_addr =='0' OR $google_addr==' '){
                            //   echo '<br> i am inside if address is empty '.$google_addr;
                                  $google_link = array("google_link"=>"None");
                          }else{
                            //   echo '<br> i am inside else when address is not  empty '.$google_addr;
                              $google_link = array("google_link"=>$google_addr);
                           }
                          
                          $google_link_jsn = json_encode($google_link);
        
                        // end google link addr
                
                           $send_noti_new_check=$send_notifications[$key];
        
        // checking if its new row or row for edit 
    if($bagsHid[$key] =='' OR $bagsHid[$key] ==0){
            //   echo '<br>new delivery Row identified'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
                 
                 
                 
                    $order_data = array(
                        'send_notification' => $send_noti_new_check,
                        'status' =>  'Not Assign',
                        'name_on_delivery' =>  $customer_info->u_name,
                        'number_on_delivery' =>  $customer_info->phone,
                        'customer_id' => $customer_id,
                        'vendor_id' =>  $vendor_id,
                    //    'type_id' =>  $type_id,
                     
                        'signature' =>  $signature,
                        //'delivery_date' => date('Y-m-d', strtotime('+'.delivery_hours.' hours')),
                        'delivery_date' => date('Y-m-d H:i:s', strtotime($delivery_date)),
                        'delivery_address' =>  $area_str,
                        'pickUp' => $this->validate_items($PickupPoint[$key]),
                        'delivery_time' =>  $delivery_time,
                        //'note' =>  $deliveries[$i]['note'],
                        'note' => $this->validate_items($notes[$key]),
                        'created' => date("Y-m-d H:i:s"),
                        'created_user' => $this->session->userdata('email'),
                        'updated_user' => $this->session->userdata('email'),
                        'created_terminal' => gethostname(),
                        'updated_terminal' => gethostname(),
                        'food_type' => $this->validate_items($ProductType[$key]),
                        'service_type_id' => $service_typ,
                        'areaID' => $area_id,
                        'emirateID' => $eid,
                        'slotID' => $sid,
                        'partner_price' => $p_price,
                        'discount_track' =>$discount_track,
                        'delivery_amount'=>$Delivery_Amount[$key],
                        'company_note'=>$this->validate_items($CompanyID[$key]),
                        'google_link_addrs'=> $google_link_jsn,
                        'day' =>$day[$key],
                        'mul_addr_id'=>$ref_addr[$key],
                        'plan_id' =>$plan_id_is,
                        'pcustomer_id'=>$customer_info->customer_id
                        
                        
                        
                    );
                    
                    if(count($freezed_track)>0){
                        // echo 'yes freezed have some val'.$key.' :'.$freezed_track[$key];
                     if($freezed_track[$key]){
                         $order_data['freezed_track']=$freezed_track[$key];
                         
                     }
                 }
                    
                    
                    $tt=$tt+1;
                    //  echo '<br>order data from new rows is '.$tt.'<br>  : <pre>';
                    //  print_r($order_data);
                    //  die();
                    // save order service type id is initialy 2 to make all delivery with basic service (from tbl_service_Type)
                   
                   
                         $result = $this->order_model->add($order_data);
                         
                          if($result==0){
                             $tra=$tt+1;
                             $index_arr= $index_arr.",".$tra;
                         }
                   
                    
             
             
            //  uncomment below if *************
                if($result){
                      $response['success'] = true;
                      $response['vendor_id'] = $vendor_id;
                      $response['exceptions'] = $index_arr;
                    //  $name = $myorder->full_name;
                  
                    // $this->session->set_flashdata("success","Data is saved Successfully in un assigned Deliveries.");
                }
                
                
                
                // IF Row is for edit
             }else if($bagsHid[$key] !='' OR $bagsHid[$key] !=0){
                 
                //  echo '<br>EDIT delivery Row identified'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
          
                //  code for edits
                // delivered_check
                //  AND $delivered_check[$key] ==''
        if($status[$key] !='In Ship' AND $status[$key] !='Canceled' AND $status[$key] !='Delivered' AND $status[$key] !='Collected' AND $delivered_check[$key] ==''){
                //   echo '<br>EDIT delivery Row Status checks'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
          
                    $order_data_updt = array(
                        'send_notification' => $send_noti_new_check,
                        
                        // 'delivery_date' => date('Y-m-d H:i:s', strtotime($delivery_date)),
                        // 'day' =>$day[$key],
                        
                        'delivery_address' =>  $area_str,
                        'pickUp' => $this->validate_items($PickupPoint[$key]),
                        'delivery_time' =>  $delivery_time,
                       
                        'note' => $this->validate_items($notes[$key]),
                        'updated_user' => $this->session->userdata('email'),
                        'updated_terminal' => gethostname(),
                        'food_type' => $this->validate_items($ProductType[$key]),
                        'service_type_id' => $service_typ,
                        'areaID' => $area_id,
                        'emirateID' => $eid,
                        'slotID' => $sid,
                        'partner_price' => $p_price,
                        
                        'delivery_amount'=>$Delivery_Amount[$key],
                        'company_note'=>$this->validate_items($CompanyID[$key]),
                        'google_link_addrs'=> $google_link_jsn,
                        
                        'mul_addr_id'=>$ref_addr[$key],
                        'plan_id' =>$plan_id_is,
                        'pcustomer_id'=>$customer_info->customer_id,
                        'action'=>$action[$key]
                        
                    );
                    
                    if($ans[0]->ans == 'no'){
                        
                    }else{
                        $order_data_updt['discount_track'] =$discount_track;
                    }
                    
                    
                    
                    //  $tt=$tt+1;
                    //  echo '<br>order data from edit rows is '.$tt.'<br>  : <pre>';
                    //  print_r($order_data_updt);
                    //  die();
                     
                    $order_tbl_whr=array("order_id"=>$bagsHid[$key]);
                    $plan_result = $this->MonthlyMeals_model->update_things_order_tbl($order_data_updt,$order_tbl_whr);
                    
                    $result=$plan_result;
                    
                    
                    
                    
                }else{ // check if a delivery can be edit or not
                    $tt=$tt+1;
                    //  echo '<br>cant edit '.$tt.'<br>  : <pre>';
                    // echo '<br>Edit not allow check founds'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
          
                     
                }
             }        
             
             
          }else{ // end for main check if its required to update or add or not due to status eg delivered
              $tt=$tt+1;
                //  echo '<br> deliveries that are ignored'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key];
          
                   }
            } //end of main foreach 
            
            // die();
           
             if($result){
               $res='true';
                echo json_encode($res);
             }else{
               $res='f';
                echo json_encode($res);
          }

        }else{
                 $res='f';
                echo json_encode($res);
        }
        
        
         }else{ // if a plan creats check end  
                 $res='f';
                echo json_encode($res);
        }  

      
        
    
    //   if($this->uri->segment(3) and $this->uri->segment(3)=="vendor"){
    //     $vendorC = $this->session->userdata('email');
    //      $msg = "Hi Admin,<br/><br/>
    //         New Schedule/Plan with Deliveries are added to the system by the vendor ".$vendorC.".<br/><br/>
    //         Regards, <br/><br/>

    //         TEAM L O G X<br/>";
    //          $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'New Plan/Schedule Deliveries Added', 'identification'=>'LOGX');
    //             send_email($param);
    //     }
        
        // echo json_encode($response);   
//echo json_encode($deliveries);
    //  echo json_encode($abc);
      
    }else{ //end of customer info
       
                $res='f';
                echo json_encode($res);
    }
    
    
    }
    
    
    
    
    
    
    
     public function check_PU_validation(){
       
      $PU        = $this->input->post('PU');
      $role_type_id = $this->input->post('role_type_id');
      $result       = $this->MonthlyMeals_model->check_PU_validation($PU,$role_type_id);
      // print_r($result);
      if ($result) {
        echo "already available";
      }else{
        echo "not available";
      }
    }
    
    public function validate_items($str){
        // echo 'i am runing before  is:'.$str;
        $trim=trim(preg_replace('!\s+!', ' ',$str));
        $final=str_replace("聞"," ", $trim);
        // echo '<br>i am runing final is:'.$final;
        return $final;
    }
    
    
    
    
    public function total_freeze(){
         $planid=$this->uri->segment(3)? $this->uri->segment(3): 0;
        $op=$this->uri->segment(4)? $this->uri->segment(4): 0;
        
        // $vd=$this->uri->segment(5)? $this->uri->segment(5): 0;
        
        //  TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
             
             $where = "o.plan_id=$planid";
         }else{
             $v_id= $this->session->userdata('u_id');
             $where = "o.vendor_id=$v_id AND o.plan_id=$planid";
         } 
         
         if($op ==5){
             $where=$where." AND (o.action='Freezed') AND o.is_cancelled ='No' ";
         }else if($op ==6){
              $where=$where." AND (o.action='Paused') AND o.is_cancelled ='No' ";
         }else{
             
         }

        //   echo $where;
        //   die();


          $orders=$this->MonthlyMeals_model->tot_deliv($where);
        if ($orders){
            $result['result'] = true;
            $result['records'] = $orders;
        }else{
            $result['result'] = false;
        }
            
            // QUERY END
        $data['orders'] =$result;
        $data['op'] =$op;
    //     echo '<pre>';
    //      print_r($data);
    //   die();
       
        $this->load->view('Monthly_deliveries/tot_deliveries', $data);
    }
    
    
    
    public function freeze_the_planXhold(){
        $planID = $this->input->post('id');
      $status = $this->input->post('status');
     
     
      
    //   echo 'plan id is:'.$planID.' <br> status is :'.$status;
    //   die();
      
      $order_data_updt = array(
                      'action'=>$status,
                      'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'action_at'=>date("Y-m-d H:i:s")
                    );
      
      $today_dt=date('Y-m-d');
      $dt=$today_dt.' 00:00:00';
      
    //   echo $dt;
      
      $order_tbl_whr=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt' ";
      
       if($status=='Freezed'){$st=2; $order_tbl_whr=$order_tbl_whr." AND action!='Freezed' "; }else{$st=0;}
      
      $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
      
      if($order_updt_res){
          
           $plan_data_updt = array(
                      'completed_status'=>$st,
                      'freeze_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'freeze_at'=>date("Y-m-d H:i:s")
                    );
            $plan_tbl_whr=" plan_id = $planID AND (completed_status !=1) AND (completed_status!=3) ";
      
              
           $plan_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($plan_data_updt,$plan_tbl_whr,'monthly_meal_plans');
      
          
          if($plan_updt_res){
              echo $plan_updt_res;
          }else{
              echo $plan_updt_res;
          }
          
      }else{
          echo $order_updt_res;
      }
    //   $res=$this->db->select('*')->from('orders')->where($order_tbl_whr)->get()->result();
    //   echo '<pre>';
    //   print_r($this->db->last_query());
      
      
    }
    
    
       public function delete_frozen_order(){
        //  return true;
        //  die();
         $planID=$this->input->post('planid');
        //  $no_days=$this->input->post('no_of_days');
        //  $exp_dt=$this->input->post('exp_dt');
         $change_id=$this->input->post('change_id');
         $deli_id=$this->input->post('del_id');
         
           $status='Active';
          $order_data_updt = array(
                      'action'=>$status,
                      'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'action_at'=>date("Y-m-d H:i:s")
                    );
      
      $today_dt=date('Y-m-d');
      $dt=$today_dt.' 00:00:00';
      
    //   echo $dt;
      
      $order_tbl_whr=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt'  AND order_id =$change_id";
      
    //   if($status=='Freezed'){$st=2; $order_tbl_whr=$order_tbl_whr." AND action!='Freezed' "; }else{$st=0;}
      
      $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
            
            
            if($order_updt_res){
                
                               $where3 =array('order_id' => $deli_id);
                              $del_result = $this->MonthlyMeals_model->delete_orders_frozen($where3);
                              
                          }else{
                              $del_result=false;
                          }
                  
                  
                    
                    return $del_result;
            }
    
    
    
     public function freeze_the_plan(){
         $this->load->model('order_model');
        $planID = $this->input->post('id');
      $status = $this->input->post('status');
     $result=0;
      $secure_last_dt_old='';
      
      
      
      
    //   echo 'plan id is:'.$planID.' <br> status is :'.$status;
    //   die();
      
      
      if($status =='Freezed'){
           $today_dt=date('Y-m-d');
           $dt=$today_dt.' 00:00:00';
          
           $whr_is=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt' AND action!='Freezed' ";
               
           $old_Deliveries = $this->MonthlyMeals_model->get_all_upcoming_deliveries($whr_is);
        //   echo '<pre>';
        //   print_r($old_Deliveries);
           
          if(count($old_Deliveries) > 0){
            //   echo 'YES <pre>'.count($old_Deliveries);
              
              $new_start_dt=date('Y-m-d', strtotime($old_Deliveries[count($old_Deliveries) - 1]->delivery_date));
              $secure_last_dt_old= $old_Deliveries[count($old_Deliveries) - 1]->delivery_date;
        //   print_r($old_Deliveries);
           
          
           
          
           
           
           foreach($old_Deliveries as $key => $data){
            //   echo '<pre> $key is: '.$key.'val is: '.$data->delivery_date;
               
               
                $next_date = date('Y-m-d', strtotime($new_start_dt .' +1 day'));
                //   echo '   <pre>'.$new_start_dt.'    : '.$next_date;
                  $new_start_dt=$next_date;
                   
                   $new_order_data = array(
                        'send_notification'    => $data->send_notification,
                        'status'               => $data->status,
                        'name_on_delivery'     => $data->name_on_delivery,
                        'number_on_delivery'   => $data->number_on_delivery,
                        'customer_id'          => $data->customer_id,
                        'vendor_id'            => $data->vendor_id,
                        'signature'            =>  $data->signature,
                        'delivery_date'        => date('Y-m-d H:i:s', strtotime($next_date)),
                        'delivery_address'     => $data->delivery_address,
                        'pickUp'               => $data->pickUp,
                        'delivery_time'        => $data->delivery_time,
                        'note'                 => $data->note,
                        'created'              => date("Y-m-d H:i:s"),
                        'created_user'         => $this->session->userdata('email'),
                        'updated_user'         => $this->session->userdata('email'),
                        'created_terminal'     => gethostname(),
                        'updated_terminal'     => gethostname(),
                        'food_type'            => $data->food_type,
                        'service_type_id'      => $data->service_type_id,
                        'areaID'               => $data->areaID,
                        'emirateID'            => $data->emirateID,
                        'slotID'               => $data->slotID,
                        'partner_price'        => $data->partner_price,
                        'discount_track'       => $data->discount_track,
                        'delivery_amount'      => $data->delivery_amount,
                        'company_note'         => $data->company_note,
                        'google_link_addrs'    => $data->google_link_addrs,
                        'day'                  => $data->day,
                        'mul_addr_id'          => $data->mul_addr_id,
                        'plan_id'              => $data->plan_id,
                        'pcustomer_id'         => $data->pcustomer_id,
                        'freezed_track'        => $data->order_id,
                        'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                        'action_at'=>date("Y-m-d H:i:s")
                       
                        
                    );
                    
                    // echo '<pre>';
                    // print_r($new_order_data);
                    // die();
                    $result = $this->order_model->add($new_order_data);
                   
               
           }
           
           
    //       $order_data_updt = array(
    //                   'action'=>$status,
    //                   'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
    //                   'action_at'=>date("Y-m-d H:i:s")
    //                 );
                    
    //               $order_tbl_whr=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date BETWEEN '2021-07-30 00:00:00' AND '2021-08-02 00:00:00' AND action!='Freezed' AND freezed_track='' ";
    //             echo $order_tbl_whr;
    //             //   $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
                
    //  die();

        //   echo 'result value is :'.$result;
           if($result){
              
                $order_data_updt = array(
                      'action'=>$status,
                      'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'action_at'=>date("Y-m-d H:i:s")
                    );
                    
                  $order_tbl_whr=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date BETWEEN '$dt' AND  '$secure_last_dt_old' AND action!='Freezed'  ";
                
                //  echo ' whr is:'.$order_tbl_whr;
                  $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
                   
                //   print_r($this->db->last_query());
                if($order_updt_res){
                    echo 'all done';
                }else{
                    echo false;
                }
           }else{
            //   echo 'Not all new deliveries are generated!';
            echo false;
           }
                     
          
        //   die();
          }else{
           // echo 'No deliveries found';
              echo 'No data Found';
            //   die();
              }       
      
     
    }else{
          //if status is not freezed, the main check
      }
      
    }
    
    
    public function de_freeze_the_plan_XXXXX(){
        $planID = $this->input->post('id');
      $status = $this->input->post('status');
     
     
      
    //   echo 'plan id is:'.$planID.' <br> status is :'.$status;
    //   die();
      
      $order_data_updt = array(
                      'action'=>$status,
                      'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'action_at'=>date("Y-m-d H:i:s")
                    );
      
      $today_dt=date('Y-m-d');
      $dt=$today_dt.' 00:00:00';
      
    //   echo $dt;
      
      $order_tbl_whr=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt' ";
      
       if($status=='Freezed'){$st=2; $order_tbl_whr=$order_tbl_whr." AND action!='Freezed' "; }else{$st=0;}
      
      $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
      
      if($order_updt_res){
          
           $plan_data_updt = array(
                      'completed_status'=>$st,
                      'freeze_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'freeze_at'=>date("Y-m-d H:i:s")
                    );
            $plan_tbl_whr=" plan_id = $planID AND (completed_status !=1) AND (completed_status!=3) ";
      
              
           $plan_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($plan_data_updt,$plan_tbl_whr,'monthly_meal_plans');
      
          
          if($plan_updt_res){
              echo $plan_updt_res;
          }else{
              echo $plan_updt_res;
          }
          
      }else{
          echo $order_updt_res;
      }
    //   $res=$this->db->select('*')->from('orders')->where($order_tbl_whr)->get()->result();
    //   echo '<pre>';
    //   print_r($this->db->last_query());
      
      
    }
   
    public function de_freeze_the_plan(){
         $this->load->model('order_model');
        $planID = $this->input->post('id');
      $status = $this->input->post('status');
      $result=0;
      $secure_last_dt_old='';
      
      
      $response='';
      
    //   echo 'plan id is:'.$planID.' <br> status is :'.$status;
    //   die();
      
      
      if($status =='Active'){
           $today_dt=date('Y-m-d');
           $dt=$today_dt.' 00:00:00';
          
           $whr_is=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt' AND action ='Freezed' ";
               
           $freezed_Deliveries = $this->MonthlyMeals_model->get_all_freezed_deliveries_def($whr_is);
        //   echo '<pre>';
        //   print_r($this->db->last_query());
           
          if(count($freezed_Deliveries) > 0){
              
           $whr_is_Active=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt' AND action ='Active' ";
               
           $active_Deliveries = $this->MonthlyMeals_model->get_all_freezed_deliveries_def($whr_is_Active);
           
        //   echo '<pre>';
        //   print_r($this->db->last_query());
         
         
        
           
          if(count($freezed_Deliveries) > 0 AND count($active_Deliveries) > 0){
              
            //   foreeach is on active delivs because we need to del the active deliv and then update the freeze one., as many as active deliveries are in array we need to del them but with check of freezed remaining, so both are dependent on each other
              foreach($active_Deliveries as $key => $data){
                  
                //   echo 'count of freezed id:'.count($freezed_Deliveries).' AND count of active is:'.count($active_Deliveries);
                if(count($freezed_Deliveries) > 0 AND count($active_Deliveries) > 0){  
                    
                              $where_del =array('order_id' => $data->order_id);
                              $del_result = $this->MonthlyMeals_model->delete_orders_frozen($where_del);
                    
                //   echo '<br> delete delivery will be ordr id:'.$data->order_id.' dt :'.$data->delivery_date;
                //   echo '<br> update delivery will be order id:'.$freezed_Deliveries[$key]->order_id.' dt :'.$freezed_Deliveries[$key]->delivery_date;
                  
                //   $order_tbl_whr=" order_id=".$freezed_Deliveries[$key]->order_id;
                //   echo ' whr is:'.$order_tbl_whr;
                //   die();
                  
                  if($del_result){
                      
                       $order_data_updt = array(
                        'action'=>$status,
                        'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                        'action_at'=>date("Y-m-d H:i:s")
                       );
                    
                     $order_tbl_whr=" order_id=".$freezed_Deliveries[$key]->order_id;
                
                     //  echo ' whr is:'.$order_tbl_whr;
                     $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
                        
                        if($order_updt_res){
                             unset($active_Deliveries[$key]);
                             unset($freezed_Deliveries[$key]);
                             
                             $response="all done";
                        }else{
                            
                        }
                    }else{
                        
                    }
                    
                    
                      
                  }else{
                      break;
                   }
                 
                }
                
                echo $response;  
              }else{
                  echo 'No data Found';
              }
              
            //   die();
              
              
           
           
          
           
       
          }else{
           // echo 'No deliveries found';
              echo 'No data Found';
            //   die();
              } 
              
          }else{
              echo 'No freezed delivery Found';
          }          
      
     
   
      
    }
    
    
    public function delete_plan(){
        $plan_id= $this->input->post('plan_id');
        $customer_id =$this->input->post('c_id');

        // echo 'id'.$plan_id;
        // echo ',';
        // echo 'customer_id'.$customer_id;
        
         $today_dt=date('Y-m-d');
           $dt=$today_dt.' 00:00:00';
        
        
         $whr_is=" plan_id = $plan_id AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt' ";
               
           $Deliveries = $this->MonthlyMeals_model->get_all_freezed_deliveries_def($whr_is);
           
        //   echo '<pre>';
        //   print_r($Deliveries);
           
                //   $whr_=" plan_id =".$plan_id; 
                //     $check_orders= $this->MonthlyMeals_model->count_orders($whr_);
                    
                //     if($check_orders){
                //         // echo($check_orders);
                //         echo 'can not del plan';
                //     }else{
                //         echo 'yes';
                //     }
                    
                //     die();
        if(count($Deliveries) > 0){
                foreach($Deliveries as $key => $data){
                              $where_del =array('order_id' => $data->order_id);
                              $del_result = $this->MonthlyMeals_model->delete_orders_frozen($where_del);
                 }
                 
                 
                 if($del_result){
                     $whr_=" plan_id =".$plan_id; 
                    $check_orders= $this->MonthlyMeals_model->count_orders($whr_);
                    
                    
                    if($check_orders){
                        // echo($check_orders);
                        echo 'can not del plan All';
                    }else{
                          $whr_plan_is=" plan_id =".$plan_id;
                          $del_the_plan=$this->MonthlyMeals_model->delete_plan_all($whr_plan_is);
                          
                          if($del_the_plan){
                              echo 'yes';
                          }else{
                              echo 'No data Found';
                          }
                    }
                  }else{
                       echo 'Network Error';
                  }
          }else{
              
                    $whr_=" plan_id =".$plan_id; 
                    $check_orders= $this->MonthlyMeals_model->count_orders($whr_);
                    
                    if($check_orders){
                        // echo($check_orders);
                        echo 'can not del plan All';
                    }else{
                           $whr_plan_is=" plan_id =".$plan_id;
                          $del_the_plan=$this->MonthlyMeals_model->delete_plan_all($whr_plan_is);
                          
                          if($del_the_plan){
                              echo 'yes';
                          }else{
                              echo 'No data Found';
                          }
                    }
               
             } 
        // echo json_encode($res);
   }
   
   
   
   public function VendorPreDeliveriesReport(){
        
        $this->load->model('Vendor_model');
        $data['vendors'] =  $this->Vendor_model->get_where(array());
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('Monthly_deliveries/pre_delivery_report',$data);
        
      
    }
    
    public function get_pre_deliveries_report_by_vendor_plans(){
        
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];
        $status=0;

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        //  $this->session->userdata('role') == 'admin'  OR 
          if(strtolower($this->session->userdata('role')) != 'vendor'){
          
          if($vendor_id){
       
                //   $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.own_bag_rcv_by_dt  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                //  AND is_cancelled ='No'
             
                 $whr_is=" plan_id !=0 AND (status='Assign' OR status='Not Assign' OR status='Cancel') AND vendor_id='".$vendor_id."'  AND delivery_date  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59' AND action !='Freezed' ";
                 $Deliveries = $this->MonthlyMeals_model->get_all_upcoming_pre_deliveries($whr_is);
          }else{
              
          }
        }else{
            
            //  $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.own_bag_rcv_by_dt BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         
             
        }
        
        //  $report_data = $data['orders'] =  $Deliveries;
        
        // $report_data = $data['orders'] =  $this->order_model->get_orders($where);
        
        // echo '<pre>';
        // print_r($report_data);

        if($Deliveries){
            $response['success'] = true;
            $response['report_data'] = $Deliveries;
        }

        echo json_encode($response);
        
    }
    
    
    public function get_pre_deliveries_report_by_vendor_all(){
        
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];
        $status=0;

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        //  $this->session->userdata('role') == 'admin'  OR 
          if(strtolower($this->session->userdata('role')) != 'vendor'){
          
          if($vendor_id){
       
                //   $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.own_bag_rcv_by_dt  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                //  AND is_cancelled ='No'
             
                 $whr_is="(status='Assign' OR status='Not Assign' OR status='Cancel') AND vendor_id='".$vendor_id."'  AND delivery_date  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59' AND action !='Freezed' ";
                 $Deliveries = $this->MonthlyMeals_model->get_all_upcoming_pre_deliveries($whr_is);
          }else{
              
          }
        }else{
            
            //  $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.own_bag_rcv_by_dt BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
         
             
        }
        
        //  $report_data = $data['orders'] =  $Deliveries;
        
        // $report_data = $data['orders'] =  $this->order_model->get_orders($where);
        
        // echo '<pre>';
        // print_r($report_data);

        if($Deliveries){
            $response['success'] = true;
            $response['report_data'] = $Deliveries;
        }

        echo json_encode($response);
        
    }
    
    
    
    
        public function edit_delivery_date()
    {
     
       $this->load->model('order_model');
        $this->load->model('driver_model');
       
       $ch=$this->uri->segment(4);
       $plan_id=$this->uri->segment(6);
       
    //   echo $ch;
       if($ch == 1){
             
           $id=$this->uri->segment(3);
        //   echo '<br> id is:'.$id;
            $where = "u.id ='".$id."' ";
             $customer =  $this->MonthlyMeals_model->get_customer_info($where,$id);
           
       }else if($ch == 2){
           $code=$this->uri->segment(3);
        //   echo '<br> code is:'.$code;
        //   $code_id =$this->MonthlyMeals_model->get_id_by_code($code);
        //     $where = "u.id ='".$code_id."' ";
        //     $customer =  $this->vendor_model->get_customer_info($where,$code_id);
        $where = "u.id ='".$id."' ";
         $customer =  $this->MonthlyMeals_model->get_customer_info($where,$id);
       }
       
    //   echo '<pre>';
    //   print_r($customer);
    //  die();
    //   $data['vendors'] =  $this->Vendor_model->get_all_vendors();
      
   
       
        $service_typ=$this->MonthlyMeals_model->get_service_type_op();
        $emirites_typ=$this->MonthlyMeals_model->get_emirites_type_op();
        $area = $this->order_model->get_areas();
        
         $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $emi_with_time=$this->driver_model->get_combinations($data['old_emirites_typ']);
        //$emi_with_time =  $data['types'] =  $this->order_model->get_basic_timeslots();
        //  $customers =  $this->vendor_model->get_all_vendors(); 'customers' => $customers
        
        // echo '<pre>';
        // print_r($emi_with_time);
        // die();
        $passData=[
           'service_typ'=>$service_typ,
           'emirites_typ'=>$emirites_typ,
           'area' => $area,
           'time' => $emi_with_time,
           'u_name'=>$customer[0]->u_name,
           'u_email'=>$customer[0]->u_email,
           'phn'=>$customer[0]->phone,
           
           'PU_code'=>$customer[0]->customer_id,
           'vendor_n'=>$customer[0]->vendor,
           'plan_i'=>$plan_id,
           'mul_address'=>$customer[0]->mul_address,
           'c_id'=>$customer[0]->u_id,
           'vendor_id'=>$customer[0]->vendor_id
           
           
      ];
        
        // echo '<pre>';
        // print_r($passData);
        // die();
        $this->load->view('Monthly_deliveries/edit_delivery_date',$passData);
    }
    
  
    // Edit delivery date
     public function edit_order_deliverydateplan(){
        
        
       $report_jsn=array();
        $response = array('success' => false);
       
          $index_arr='';
          $deliveries = $this->input->post();
        // echo 'i am deliv userdata session:';
        // echo '<pre>';
        // print_r($deliveries);
        // die();
        
        
        // echo $this->input->post('customer_id');
          
          $where = "u.id ='".$this->input->post('customer_id')."' ";
          
          $info=  $this->MonthlyMeals_model->get_customer_info($where);
          
          $plan_id_is=$this->input->post('plan_id_is');
         
          $plan_exist_check = $this->MonthlyMeals_model->get_plan_by_id($plan_id_is);
          
          
        //   echo 'check :<pre>';
        //   print_r($plan_exist_check);
        //   die();
          
          if($info AND $plan_exist_check){
          $customer_info=$info[0];
          
          
          $date=$this->input->post('date');
        // Creating Plan first  
          
        //   $all_detail=array('discard'=>0,'error_details'=>array(),'pcustomer_id'=>$customer_info->customer_id,'email'=>$customer_info->u_email,'customer_id' => $customer_info->u_id, 'full_name' => $customer_info->u_name, 'phone' => $customer_info->phone,'vendor_id' =>$customer_info->vendor_id,'vendor_name'=>$customer_info->vendor);
        //   $all_detail = json_encode($all_detail);
          
         
       
        $vendor_id = $this->input->post("vendor_id");
  
       
        $customer_id =$this->input->post('customer_id');
        
        $bagsHid=$this->input->post('bagsHid');
        $delivered_check=$this->input->post('delivered_check');
        $day=$this->input->post('day');
        $status=$this->input->post('delivery_status');
        $action=$this->input->post('freeze');
        $freezed_track=$this->input->post('freezed_track');
        
      
        
        
        
        

        if(count($date) > 0){
           
           $counter=0;
           foreach ($date as $key => $delivery_date) {
                               //   $customer_id = $myorder->customer_id;
              
                                $counter++;
               
        //  Stop when its not allowed to edit check
          if($delivered_check[$key] ==''){
                                //   echo '<br> deliveries that are NOT ignored'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key];
          
        
                                
                
                
                            
        //  if it new add row in edit plan
        
        
       
        
         
        
        // checking if its new row or row for edit 
          if($bagsHid[$key] !='' OR $bagsHid[$key] !=0){
                 
                //  echo '<br>EDIT delivery Row identified'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
          
        if($status[$key] !='In Ship' AND $status[$key] !='Canceled' AND $status[$key] !='Delivered' AND $status[$key] !='Collected' AND $delivered_check[$key] ==''){
                //   echo '<br>EDIT delivery Row Status checks'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
          
        //   welcome
        
                   $existing_record_whr=array("order_id"=>$bagsHid[$key]);
                    $existing_record_order_result = $this->MonthlyMeals_model->get_existing_record_order($existing_record_whr);
                  
                  
     if(count($existing_record_order_result) >0){  
                  if($existing_record_order_result[0]->delivery_date_edit_report){
                      
                    //   echo 'report exist';
                      
                      $report_jsn=json_decode($existing_record_order_result[0]->delivery_date_edit_report);
                      
                    //   echo 'OLD';
                    //   print_r($report_jsn);
                       
                     
                       
                      
                      
                      $record=(object)array(
                          'deliverydate_edited_at'=> date('y-m-d H:i:s'),
                          'deliverydate_edited_by'=> $this->session->userdata('email'),
                          'user_id'               => $this->session->userdata('u_id'),
                          'old_delivery_date'     => $existing_record_order_result[0]->delivery_date,
                          'updated_delivery_date' => date('Y-m-d H:i:s', strtotime($delivery_date)),
                          'delivery_status'       => $existing_record_order_result[0]->status,
                          'action_status'         => $existing_record_order_result[0]->action,
                          'updated_terminal'      => gethostname(),
                           'day'                  => $existing_record_order_result[0]->day
                         
                         );
                         
                      
                         array_push($report_jsn,$record);
                        //  echo 'NEW';
                        //  print_r($report_jsn);
                        //   echo '---------------------';
                         $final = json_encode($report_jsn);
                      
                      
                  }else{
                    //   echo 'new report';
                     $record=(object)array(
                          'deliverydate_edited_at'=> date('y-m-d H:i:s'),
                          'deliverydate_edited_by'=> $this->session->userdata('email'),
                          'user_id'               => $this->session->userdata('u_id'),
                          'old_delivery_date'     => $existing_record_order_result[0]->delivery_date,
                          'updated_delivery_date' => date('Y-m-d H:i:s', strtotime($delivery_date)),
                          'delivery_status'       => $existing_record_order_result[0]->status,
                          'action_status'         => $existing_record_order_result[0]->action,
                          'updated_terminal'      => gethostname(),
                          'day'                   =>$existing_record_order_result[0]->day
                         );
                         
                         array_push($report_jsn, $record);
                         
                         $final = json_encode($report_jsn);
                    
                    
                  }
                  
                    $order_data_updt = array(
                         'delivery_date' => date('Y-m-d H:i:s', strtotime($delivery_date)),
                          'day' =>$day[$key],
                          'deliverydate_edit_check'=>1,
                          'delivery_date_edit_report'=> $final
                          
                       );
                    
                     
                     $tt=$tt+1;
                    //  echo '<br>order data from edit rows is '.$tt.'<br>  : <pre>';
                    //  print_r($order_data_updt);
                    //  die();
                     
                    $order_tbl_whr=array("order_id"=>$bagsHid[$key]);
                    $plan_result = $this->MonthlyMeals_model->update_things_order_tbl($order_data_updt,$order_tbl_whr);
                    
                    $result=$plan_result;
                    
     }else{
          $tt=$tt+1;
     } 
                    
                    
                }else{ // check if a delivery can be edit or not
                    $tt=$tt+1;
                    //  echo '<br>cant edit '.$tt.'<br>  : <pre>';
                    // echo '<br>Edit not allow check founds'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key].'bagsHid:'.$bagsHid[$key];
          
                     
                }
             }        
             
             
          }else{ // end for main check if its required to update or add or not due to status eg delivered
              $tt=$tt+1;
                //  echo '<br> deliveries that are ignored'.$key.' delvery check is'.$delivered_check[$key].' and status is '.$status[$key];
          
                   }
            } //end of main foreach 
            
            // die();
           
             if($result){
               $res='true';
                echo json_encode($res);
             }else{
               $res='f';
                echo json_encode($res);
          }

        }else{
                 $res='f';
                echo json_encode($res);
        }
        
        
         
      
        
    
    //   if($this->uri->segment(3) and $this->uri->segment(3)=="vendor"){
    //     $vendorC = $this->session->userdata('email');
    //      $msg = "Hi Admin,<br/><br/>
    //         New Schedule/Plan with Deliveries are added to the system by the vendor ".$vendorC.".<br/><br/>
    //         Regards, <br/><br/>

    //         TEAM L O G X<br/>";
    //          $param = array('to'=>"admin@thelogx.com", 'msg'=>$msg, 'subject'=>'New Plan/Schedule Deliveries Added', 'identification'=>'LOGX');
    //             send_email($param);
    //     }
        
        // echo json_encode($response);   
//echo json_encode($deliveries);
    //  echo json_encode($abc);
      
    }else{ //end of customer info
       
                $res='f';
                echo json_encode($res);
    }
    
    
    }
    
    
    
    
      // NEWWWWWWWWWWWWWWWWW PAUSE N PLAY
     public function paused_the_plan(){
         $this->load->model('order_model');
        $planID = $this->input->post('id');
      $status = $this->input->post('status');
     $result=0;
      $secure_last_dt_old='';
      
      
      
      
    //   echo 'plan id is:'.$planID.' <br> status is :'.$status;
    //   die();
      
      
      if($status =='Paused'){
           $today_dt=date('Y-m-d');
           $dt=$today_dt.' 00:00:00';
          
           $whr_is=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt' AND action!='Freezed'  AND action!='Paused'  ";
               
           $old_Deliveries = $this->MonthlyMeals_model->get_all_upcoming_deliveries_for_pause($whr_is);
           
        //   echo '<pre>';
          
        //   print_r($this->db->last_query());
        //   echo '<br>';          
        //   print_r($old_Deliveries);
           
          if(count($old_Deliveries) > 0){
            //   echo 'YES <pre>'.count($old_Deliveries);
              
              $new_start_dt=date('Y-m-d', strtotime($old_Deliveries[0]->delivery_date));
              $secure_last_dt_old= $old_Deliveries[0]->delivery_date;
              
            //   echo 'new_start_dt:'.$new_start_dt.'  secure_last_dt_old:'.$secure_last_dt_old;
        //   print_r($old_Deliveries);
           
          
             $order_data_updt = array(
                      'action'=>$status,
                      'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'action_at'=>date("Y-m-d H:i:s")
                    );
                    
                  $order_tbl_whr=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date BETWEEN '$dt' AND  '$secure_last_dt_old' AND action!='Freezed'  ";
                
                //  echo ' whr is:'.$order_tbl_whr;
                  $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
                   
                //   print_r($this->db->last_query());
                if($order_updt_res){
                    echo 'all done';
                }else{
                    echo false;
                }
        //   die();
          }else{
           // echo 'No deliveries found';
              echo 'No data Found';
            //   die();
              }       
      
     
    }else{
          //if status is not freezed, the main check
             echo 'Error';
      }
      
    }
    
    
    
    
    public function resume_plan(){
         $this->load->model('order_model');
        $planID = $this->input->post('id');
        $status = $this->input->post('status');
      $result=0;
      $secure_last_dt_old='';
      
      
      $response='';
      
    //   echo 'plan id is:'.$planID.' <br> status is :'.$status;
    //   die();
      
      
      if($status =='Active'){
           $today_dt=date('Y-m-d');
           $dt=$today_dt.' 00:00:00';
          
          
        //   AND delivery_date >= '$dt'
           $whr_is=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No'  AND action ='Paused' ";
               
           $paused_Deliveries = $this->MonthlyMeals_model->get_all_freezed_deliveries_def($whr_is);
        //   echo '<pre>';
        //   print_r($paused_Deliveries);
        //   echo '<pre> <br> Count is: '.count($paused_Deliveries);
        //   print_r($this->db->last_query());
        //   die();
          if(count($paused_Deliveries) > 0){
              
      
              
          
             $new_start_dt=date('Y-m-d', strtotime($paused_Deliveries[0]->delivery_date));
              $secure_last_dt_old= $paused_Deliveries[0]->delivery_date;
              
            //   echo '<pre> <br> new_start_dt:'.$new_start_dt.'  secure_last_dt_old:'.$secure_last_dt_old;
        //   print_r($old_Deliveries);
           
          
             $order_data_updt = array(
                      'action'=>$status,
                      'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'action_at'=>date("Y-m-d H:i:s")
                    );
                    
                    
                    // AND delivery_date BETWEEN '$dt' AND  '$secure_last_dt_old'
                    
                    
                  $order_tbl_whr=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No'  AND action='Paused'  ";
                
                //  echo ' whr is:'.$order_tbl_whr;
                  $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
                   
                //   print_r($this->db->last_query());
           
          
              if($order_updt_res){
                  echo 'all done';
              }else{
                  echo 'Error';
              }
       
          }else{
           // echo 'No deliveries found';
              echo 'No data Found';
            //   die();
              } 
              
          }else{
              echo 'Error';
          }          
      
     
   
      
    }
    
    
      public function resume_reschedule_plan(){
         $this->load->model('order_model');
        $planID = $this->input->post('id');
        $status = $this->input->post('status');
        $starting_dt = $this->input->post('starting_dt');
      
      $result=0;
      $secure_last_dt_old='';
      
      
      $response='';
      
    //   echo 'plan id is:'.$planID.' <br> status is :'.$status;
    //   die();
    
    $date_setting=date("Y-m-d", strtotime($starting_dt));
    $starting_date=$date_setting.' 00:00:00';
     
     $today_dt=date('Y-m-d');
     $dt=$today_dt.' 00:00:00';
     
   
     
    //  echo $date_setting;
    //  die();
      
      if($status =='Active' AND  ( $starting_date >= $dt) ){
           
        //   AND delivery_date >= '$dt'
           $whr_is=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No'  AND action ='Paused' ";
               
           $paused_Deliveries = $this->MonthlyMeals_model->get_all_freezed_deliveries_def($whr_is);
      
        //   echo '<pre>';
        //   print_r($paused_Deliveries);
           
          if(count($paused_Deliveries) > 0){
              
        
              
            //   foreeach is on active delivs because we need to del the active deliv and then update the freeze one., as many as active deliveries are in array we need to del them but with check of freezed remaining, so both are dependent on each other
                            $new_start_dt=$date_setting;
            
              foreach($paused_Deliveries as $key => $data){
                  
            //  echo '<br> key:'.$key;
               if($key !=0){
                     $next_date = date('Y-m-d', strtotime($new_start_dt .' +1 day'));
                        // echo '<br> The new_start_dt:'.$new_start_dt.' AND The next date:'.$next_date;
                  $new_start_dt=$next_date;
               }
                
                //   echo '<br> dates are:'.$new_start_dt.' 00:00:00';
                  $timestamp_xi = strtotime($new_start_dt);
                  $chk_day_=date("D",$timestamp_xi);
                //   echo '<br>day is'.$chk_day_;
                
                    $order_data_updt = array(
                      'action'=>$status,
                      'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'action_at'=>date("Y-m-d H:i:s"),
                      'delivery_date'=>$new_start_dt.' 00:00:00',
                      'day'=>$chk_day_
                    );
                    
                  $order_tbl_whr="order_id =".$data->order_id;
                
                //  echo '<br>whr is:'.$order_tbl_whr;
                //  echo '<br><pre> The Data is:';
                //  print_r($order_data_updt);
                  $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
                 
                 
             }
                // print_r($this->db->last_query());
              if( $order_updt_res){
                  echo 'all done';
              }else{
                  echo 'Error!';
              }
              
              
            //   die();
              
              
           
           
          
           
       
          }else{
           // echo 'No deliveries found';
              echo 'No data Found';
            //   die();
              } 
              
          }else{
              echo 'Select Date Properly';
          }          
      
     
   
      
    }
    
    
    
      function get_customer_wrt_partner_mealplan(){
        
        // print_r($this->input->post());
        // die();
        $check=0;
        $partner=$this->input->post('partner');
        if($partner[0] =='all'){
            $check=1;
        }
        $where_in=$partner;
        
         $response = array('success' => false);
        $result=0;
        
           $result=$this->MonthlyMeals_model->get_all_customers_wrt_partner_($where_in,$check);
        
          if($result){
            $response['success']=true;
            $response['result']=$result;
           
           
           
            // echo '<pre>';
            // print_r($response);
             echo json_encode($response);
           }else{
               echo json_encode($response);
           }
    }


      public function pause_fromdate_plan(){
         $this->load->model('order_model');
        $planID = $this->input->post('id');
        $status = $this->input->post('status');
        $starting_dt = $this->input->post('starting_dt');
      
      $result=0;
      $secure_last_dt_old='';
      
      
      $response='';
      
    //   echo 'plan id is:'.$planID.' <br> status is :'.$status;
    //   die();
    
    $date_setting=date("Y-m-d", strtotime($starting_dt));
    $starting_date=$date_setting.' 00:00:00';
     
     $today_dt=date('Y-m-d');
     $dt=$today_dt.' 00:00:00';
     
   
     
    //  echo $date_setting;
    //  die();
      
      if($status =='Paused' AND  ( $starting_date >= $dt) ){
           
        //   AND delivery_date >= '$dt'
           $whr_is=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date >= '$dt' AND action!='Freezed'  AND action!='Paused'  ";
                
        //   $paused_Deliveries = $this->MonthlyMeals_model->get_all_freezed_deliveries_def($whr_is);
           $old_Deliveries = $this->MonthlyMeals_model->get_all_upcoming_deliveries_for_pause($whr_is);
          
      
        //   echo '<pre>';
        //   print_r($paused_Deliveries);
           
          if(count($old_Deliveries) > 0){
               
               $new_start_dt=$date_setting;
               $secure_last_dt_old= $old_Deliveries[0]->delivery_date;
              
                //   echo 'new_start_dt:'.$new_start_dt.'  secure_last_dt_old:'.$secure_last_dt_old;
                //   print_r($old_Deliveries);
                  
                  
                   $order_data_updt = array(
                      'action'=>$status,
                      'action_by'=>strtolower($this->session->userdata('role')).' - '.$this->session->userdata('email'),
                      'action_at'=>date("Y-m-d H:i:s")
                    );
       
            
            
            $order_tbl_whr=" plan_id = $planID AND (status='Assign' OR status='Not Assign')  AND is_cancelled ='No' AND delivery_date BETWEEN '$starting_date' AND  '$secure_last_dt_old' AND action!='Freezed'  ";
                
                //  echo ' whr is:'.$order_tbl_whr;
                  $order_updt_res = $this->MonthlyMeals_model->update_freeze_defreez_order_data($order_data_updt,$order_tbl_whr,'orders');
                   
                //   print_r($this->db->last_query());
                if($order_updt_res){
                    echo 'all done';
                }else{
                    echo 'No data Found for';
                }
           
              
              
            //   die();
              
              
           
           
          
           
       
          }else{
           // echo 'No deliveries found';
              echo 'No data Found';
            //   die();
              } 
              
          }else{
              echo 'Select Date Properly';
          }          
      
     
   
      
    }
}

?>