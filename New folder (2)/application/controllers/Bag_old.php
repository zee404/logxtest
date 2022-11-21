<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Bag extends CI_Controller
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
    }

    public function upload()
    {
        //$where1 = array('status'=> 1,'is_deleted'=>0);
        $where1 = array('is_deleted'=>0);
        $where3 = array('status' => 1);
        $data['types'] =  $this->order_model->get_deliveries_type_where($where3);
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        $data['dtypes'] = $this->vendor_model->get_data('delivery_type');
        $data['areas'] = $this->order_model->get_areas();
        $this->load->view('bag/upload_file', $data);
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
    public function save_bags()
    {  
        $data =[];
        $this->load->model('bag_model');
        $this->load->model('Vendor_model');
        $ids = $this->input->post('myData');
        //print_r($ids); exit();
        //$type_id = $this->input->post('type_id');
        $pick_date = date('Y-m-d', strtotime($this->input->post('pick_date')));
        $vender = $this->input->post('vender');
        // print_r($vender);
        // die();
        foreach ($ids as $key => $id) {
            # code...

            $cid = $this->bag_model->get_customer_id($id);
            $cidd = !empty($cid) ? $cid[0]['id'] : 0;
            
              //   die();
           // $ids[$key]['customer_id'] = $cidd;
            $data[] = array('bags_qty'=>!empty($id['qty']) ? $id['qty'] : 0 , 'customer_id'=>$cidd, 'pick_date'=>$pick_date,'vendor_id'=>$vender, 'created_dt' => date("Y-m-d H:i:s"), 'created_user'=>$this->session->userdata('email'), 'type_id'=>$id['type_id'], 'bag_notes'=>$id['bag_notes']);
        }
        $result=  $this->Vendor_model->addcsv('bags',$data);
        //full_name. address, phone,  
          //$data['full_name'] = $ids;
         //$result = $this->bag_model->add($bag_data);

        echo json_encode($result);

        
       
}
    public function unassigned(){
        //return active drivers only

        $where1 = array('status'=> 1,'is_deleted'=>0);
        //$where = array('u.status'=> 1);
        $where3 = array('status' => 1);
        //$data['drivers'] =  $this->driver_model->get_drivers($where);
        $data['drivers'] =  $this->driver_model->get_drivers();
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where2 = "b.driver_id = 0 and b.vendor_id=".$vendor_id;
        }else{
            $where2 = "b.driver_id = 0";
        }
         
        $where2 .= " and (b.pick_date='".$next."' or (b.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'))";
        $data['bags'] =  $this->bag_model->get_where($where2);
       // $data['customer'] =  $this->bag_model->get_customer_id();
        $data['vendors'] =  $this->vendor_model->get_where($where1);
        $data['types'] =  $this->order_model->get_deliveries_type_where($where3);
        $this->load->view('bag/unassigned',$data);
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
            $where = "b.driver_id = 0 and b.vendor_id=".$vendor_id;
        }else{
            $where = "b.driver_id = 0";
        }
        
        $where .= " and ((b.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or 
        (b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'))";
         $data['bags'] =  $this->bag_model->get_where($where);

        $this->load->view('bag/unassigned', $data);
    }
    public function assigned()
    {
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where = "b.driver_id != 0 and b.status='Assign' and b.vendor_id=".$vendor_id;
        }else{
            $where = "b.driver_id != 0 and b.status='Assign'";
        }
    
        $where .= " and (b.pick_date='".$next."' or (b.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'))";
        $data['orders'] =  $this->bag_model->get_where($where);
        $this->load->view('bag/assigned', $data);
        
    }
    public function completed()
    {
        $cdate = date('Y-m-d');
        $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
       if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where = "b.driver_id != 0 and b.status !='Assign' and b.vendor_id=".$vendor_id;
        }else{
            $where = "b.driver_id != 0 and b.status !='Assign'";
        }
    
        $where .= " and (b.pick_date='".$next."' or (b.created_dt BETWEEN '".$cdate." 00:00:00' and '".$next." 23:59:59'))";
        $data['orders'] =  $this->bag_model->get_where($where);
        $this->load->view('bag/completed', $data);
        
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
            $where = "b.driver_id != 0 and b.status='Assign' and b.vendor_id=".$vendor_id;
        }else{
            $where = "b.driver_id != 0 and b.status='Assign'";
        }
        
        $where .= " and ((b.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or 
        (b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or
        (b.collected_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'))";
         $data['orders'] =  $this->bag_model->get_where($where);
     }
        $this->load->view('bag/assigned', $data);
    }
    public function completed_by_created_date()
    {
      
        $from_date = $_POST['from'];
    
        $to_date = $_POST['to'];
        $data["selection"]= $_POST;
        if(strtolower($this->session->userdata('role')) == 'vendor'){
            $vendor_id = $this->session->userdata('u_id');
            $where = "b.driver_id != 0 and b.status !='Assign' and b.vendor_id=".$vendor_id;
        }else{
            $where = "b.driver_id != 0 and b.status !='Assign'";
        }
        
        $where .= " and ((b.created_dt BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or 
        (b.pick_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59') or
        (b.collected_date BETWEEN '".date('Y-m-d', strtotime($from_date))." 00:00:00' and '".date('Y-m-d', strtotime($to_date))." 23:59:59'))";

         $data['orders'] =  $this->bag_model->get_where($where);
        $this->load->view('bag/completed', $data);
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
            $result =  $this->bag_model->assign_drives($fields, $order_ids_);
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

 public function delete_bags(){
        $response = array('success' => false);
       
        $bag_ids = $this->input->post('bag_ids');
        $bag_ids = implode(',', $bag_ids);

        if(count($bag_ids) > 0){
               
            $where = $bag_ids;
        $result =  $this->bag_model->delete_bags($where);
              
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
        $bag_ids = $this->input->post('bag_ids');
        $order_ids_ = implode(',', $bag_ids);

        if(count($bag_ids) > 0){
            $fields = array(
                'status' => 'Assign',
                'driver_id' => $driver_id
               // 'updated_terminal' => gethostname()
            );

            //assign orders to drivers
            $result =  $this->bag_model->assign_drives($fields, $order_ids_);
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
                        'title' => 'Assign un-subscribe bag collection',
                        'for_whom' => 'Driver',
                        'message' => count($bag_ids).' un-subscribe Bag collection has been assigned'
                    );

                    //send notification
                    send_notification_to_user($data, 'save');
                }
            }
        }
        echo json_encode($response);
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

    public function save_bag_form()
    {
        // print_r($this->input->post());
        $cst['phone'] = $this->input->post('cst_phone');
        $cst['full_name'] = $this->input->post('cst_name');
        $cst['address'] = $this->input->post('del_address').', '.$this->input->post('area');
        $cst['vendor_id'] = $this->input->post('order_vendor_id');
        $cst['send_notification'] = $this->input->post('notification');

        $bag['type_id'] = $this->input->post('order_shift');
        $cstt = $this->bag_model->get_customer_id($cst);
        $bag['customer_id'] = $cstt[0]['id'];
        $bag['vendor_id'] = $this->input->post('order_vendor_id');
        $bag['bags_qty'] = $this->input->post('bag_qty');
        $bag['created_dt'] = date('Y-m-d H:i:s');
        $bag['pick_date'] = $this->input->post('bag_date');
        $bag['created_terminal'] = gethostname();
        $bag['created_user'] = $this->session->userdata('email');
        $bag['bag_notes'] = $this->input->post('bag_notes');
        
        //check if customer exist
        $res = $this->bag_model->save_bag_data($bag);
        if ($res) {
            $this->session->set_flashdata('success',"Bags informations successfully added.");
        }else{
            $this->session->set_flashdata('success',"ERROR Bags informations successfully added.");
        }
        redirect('uploads');
    }


}

?>