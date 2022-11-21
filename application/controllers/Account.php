<?php
/**
 * Created by PhpStorm.
 * User: Ayesha
 * Date: 20/10/2020
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{

    /*Order Status
    =Not Assign
    =Assign
    =Ship
    =Delivered
    =Collected
    =Cancel
    =Return
    
    */
    
    
    /*Bag Status
    
       =Requeste    
       =Assig    
       =Picke    
       =No bag (on no bag found)
    
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
        
        
         $this->load->model('Vendor_model');
         $this->load->model('Account_model');
    }
    public function index(){
        
        // echo date("m-Y",strtotime("-1 month")).'<br>';
        //  echo date("m-Y").'<br>';
        // echo date("Y-n-j", strtotime("first day of previous month"));
        // $ed=date('Y-m-d');
        // $month_year=date('m-Y', strtotime($ed));
        // echo '<br>'.$month_year;
        
       // die();
         
    //      $cdate = date("m-Y");
    //     $prev = date("m-Y",strtotime("-1 month"));
        
    //      $where = "month_year BETWEEN '".$prev."' and '".$cdate."'";
     
    //   $data['invoices'] =  $this->Account_model->get_where_invoice('invoices',$where);
       
        $cdate=date("Y-m-d");
         $prev=date("Y-m-01",strtotime("-2 month"));      
        
         $where = "generated_at BETWEEN '".date('Y-m-d', strtotime($prev))." 00:00:00' and '".date('Y-m-d', strtotime($cdate))." 23:59:59'";
     
       $data['invoices'] =  $this->Account_model->get_where_invoice('invoices',$where);
        
        // echo '<pre>';
        
        // print_r($data['invoices']);
        
        // echo '<pre> <br>';
        // print_r($this->db->last_query());
        // die();
        
        
        //   if($this->session->userdata('role') != 'vendor');
        
        
        
        //   $res=$this->driver_model->get_drivers();
        // $data['drivers'] =  $res['records'];
        //  $data['drivers_Acc'] =  $this->driver_model->get_drivers_Acc();
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        
        
        // invoices
        
        // echo 'hiiii';
        
        
        
        
        // $data['invoices'] =  $this->Account_model->get_where_invoice('invoices',array());
        $data['vendors'] =  $this->Vendor_model->get_where(array());
        $data['vat'] = $this->Account_model->get_vat_();
        
       
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('invoice',$data);
            
     
    }
    
      public function get_by_id_vendor_invoice(){
        
        // echo date("m-Y",strtotime("-2 month")).'<br>';
        // echo date("Y-n-j", strtotime("first day of previous month"));
        // $ed=date('Y-m-d');
        // $month_year=date('m-Y', strtotime($ed));
        // echo '<br>'.$month_year;
        
        // die();
        
        //  $cdate = date('Y-m-d');
        // $next = date('Y-m-d', strtotime($cdate. ' + 1 days'));
        
        //   if($this->session->userdata('role') != 'vendor');
        
        
        
        //   $res=$this->driver_model->get_drivers();
        // $data['drivers'] =  $res['records'];
        //  $data['drivers_Acc'] =  $this->driver_model->get_drivers_Acc();
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        
        
        // invoices
        
        // echo 'hiiii';
        
        
         $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $partner_id = @$_POST['status'];

       
         if(!$start_date){
            $start_date = date('Y-m-d h:i:s');
         }
         if(!$end_date){
             $end_date = date('Y-m-d h:i:s');
         }
       
    //   inv_end_dt
      $where = "partner_id=".$partner_id."  and generated_at BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
     
        // $where = array (
        //     "partner_id" =>$partner_id,
        //     "inv_end_dt"  'BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59' "
        //     );
     
       
        $report_data['invoices'] =  $this->Account_model->get_where_invoice('invoices',$where);
        // $report_data['vendors'] =  $this->Vendor_model->get_where(array());
        // $report_data['vat'] = $this->Account_model->get_vat_();
        
       
       if( $report_data['invoices']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
           
        }
    
    // echo '<pre>';
    // print_r($this->db->last_query());
    // echo '<hr>';
    //     print_r($response);
    //     die();
        echo json_encode($response);
            
     
    }
    
    
    
    
    
     public function invoice_detail(){
        //  $st_dt=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d');
        // $end_dt=$this->uri->segment(5)? $this->uri->segment(5): date('Y-m-d');
        
        $id=$this->uri->segment(3)? $this->uri->segment(3): 0;
        
        // echo 'id is:'.$id.'<br>';
        
        //  TAHA if($this->session->userdata('role') == 'admin'){
        if($this->session->userdata('role') != 'vendor'){
             
             if($id){
                //  $where = "o.vendor_id=$vd and o.delivery_date BETWEEN '".$st_dt." 00:00:00' and '".$end_dt." 23:59:59'";
                
                 $where =array(
                     'invoice_id'=>$id
                     );
               
                 
                  $data['invoices'] =  $this->Account_model->get_where_invoice('invoice_details',$where);
                  
                  
                                     if ($data['invoices']){
                                            //  $result['result'] = true;
                                            //  $result['records'] = $orders;
                                            
                                            
                                            // echo '<pre>';
                                            //   print_r($data['invoices'][0]->all_data);
                                            // die();
                                                $datax = json_decode($data['invoices'][0]->all_data);
                                                $datax->inv_id=$data['invoices'][0]->id;
                                                // inv_id
                                                // echo '<pre>';
                                                // print_r($datax);
                                                
        //                                         print_r($datax->creadit_notes->credit_amount);
                                                
        //                                          if($datax->creadit_notes['credit_amount'] = 0){
              
        //       echo '<br>yes its  zero';
        //   }else{
        //       echo '<br>yes its  not zero';
        //   }
                                                // die();
                                                
                                                
                                                
                                                 $this->load->view('test',$datax);
                                                // echo '<br> <hr> <pre>';
                                                // print_r($datax);
                                                // die();
                                            
                                            
                                      }else{
                                        //   $result['result'] = false;
                                            }
            
             }
         }
            
           
        // echo '<pre>';
        
        // print_r($data);
        // die();
        //   print_r($this->db->last_query());
        //  die();
        // $orders = $query->result();
        
            
            // QUERY END
        // $data['orders'] =$result;
        // echo '<pre>';
        //  print_r($data);
       
       
        // $this->load->view('active_total_delivries', $data);
    }
    
    
    
     public function get_partner_by_id_ACC(){
        $id=$this->uri->segment(3);
        // echo $id;
        // $where = array('u.id'=> $id);
        $res=$this->Vendor_model->get_partner_by_id_Acc($id);
        
        $vat= $this->Account_model->get_vat_();
        
        // $acc=$this->driver_model->get_driver_pending_dues($id);
        // $data =  $res[0];
         foreach ($res as $row) {
          $output['id']=$row->id;
           $output['name']=$row->full_name;
           $output['email']=$row->email;
           $output['phone']=$row->phone;
           $output['address']=$row->address;
           $output['term']=$row->term;
          $output['inv_email']=$row->inv_email;
          $output['inv_address']=$row->inv_address;
          $output['trn']=$row->trn;
          
           
          $output['vat']=$vat[0]->vat_;
        
        //   $output['pendings']=$acc[0]->Pendings;
       }
       
    //   print_r($acc);
       echo json_encode($output);
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        //return $data;
       
        
    }
    
     public function test()
    {
         $this->load->view('test');
    }
    
    
    
    public function save_vat(){
       
        $response = array('success' => false);
        
        $pdata = $this->input->post();
      
        $result=$this->Account_model->save_vat_($pdata);
        if($result){
            $response['success']=true;
        }
       
         echo json_encode($response);
    }
    
    
     public function save_new_invoice()
    {
        
        // $this->load->view('gener_invoice');
        // die();
        
        //  $this->load->model('Vendor_model');
         
        //   $mods = $this->input->post('tags');
        $pid=$this->input->post('partner');
          $data['partner'] = $pid;
          $data['email']=$this->input->post('email_hid');
          $data['address']=$this->input->post('address_hid');
          $data['trn']=$this->input->post('trn_hid');
        
        //   $data['role_id'] = 2;
          
          
          
          
          $term = $this->input->post('term_hid');
          $vat_is=$this->input->post('vat_hid');
          $data['vat'] = $vat_is;
          
          
          if($term == 00 OR $term == '00' OR $term == '' OR $term == 0){
              
              $data['term']=10;
          }else{
              
              $data['term']= $term;
          }
        
        
          $sd=date('Y-m-d', strtotime($this->input->post('from_n')));
          $ed=date('Y-m-d', strtotime($this->input->post('to_n')));
          
          $data['start_date'] = $sd;
          $data['end_date'] =  $ed;
          $data['due_date']= date('Y-m-d', strtotime($ed. ' + '.$data['term'].' days'));
          
     
          $data['orders_data']=$this->Account_model->get_order_revenue($sd,$ed,$pid);
           $data['bags_data']=$this->Account_model->get_bag_revenue($sd,$ed,$pid);
          //Calculate orders
          
        //   die();
             $final_total=0;
             $total_taxable_am=0;
             $total_tax=0;  //standard_rate
             $tax_perc=$vat_is;
          if (count($data['orders_data']) > 0) { 
           
             foreach($data['orders_data'] as $key => $data_order){   
            
            //   $data->final_taxed=2;
                 
                //Calculations for full price
                    $total_m=$data_order->total_delivered_full_price_revenue;
                    $mult=($total_m) * ($tax_perc);
                   
                    $final_taxed=$mult/100;
                    $final_taxed=round($final_taxed,4);
                    
                    
                    $total_tax= $total_tax + $final_taxed;
                    // $total_tax=round($total_tax,4);
                    
                    $total_taxable_am= $total_taxable_am + $data_order->total_delivered_full_price_revenue;
                    // $total_taxable_am= round($total_taxable_am,4);
                    
                    $data_order->final_taxed = $final_taxed;
                    
                    
                    
                //Calculations for discounted price
                
                  $total_m_dis=$data_order->total_delivered_discount_price_revenue;
                  $mult_dis=$total_m_dis*$tax_perc;
                  $final_taxed_dis=$mult_dis/100;
                  
                  $final_taxed_dis=round($final_taxed_dis,4);
                  
                  
                  $total_tax= $total_tax + $final_taxed_dis;
                //   $total_tax=round($total_tax,4);
                  
                  $total_taxable_am= $total_taxable_am + $data_order->total_delivered_discount_price_revenue;
                //   $total_taxable_am=round($total_taxable_am,4);
                  
                  $data_order->final_taxed_dis = $final_taxed_dis;
                  
                 
                //Calculations for Paid Canceled full price
                
                  $total_m_canc=$data_order->total_canceled_full_price;
                  $mult_canc=$total_m_canc*$tax_perc;
                  
                  $final_taxed_canc=$mult_canc/100;
                        $final_taxed_canc=round($final_taxed_canc,4);                             
                  $total_tax= $total_tax + $final_taxed_canc;
                    //   $total_tax=round($total_tax,4);
                  
                  $total_taxable_am= $total_taxable_am + $data_order->total_canceled_full_price;
                        // $total_taxable_am=round($total_taxable_am,4);
                   
                  $data_order->final_taxed_canc_full = $final_taxed_canc;
                  
                  
                  
                  
                  
                  
                  //Calculations for Paid Canceled discount price
                
                  $total_m_canc_dis=$data_order->total_canceled_discount_price;
                  $mult_canc_dis=$total_m_canc_dis*$tax_perc;
                  
                  $final_taxed_canc_dis=$mult_canc_dis/100;
                      $final_taxed_canc_dis=round($final_taxed_canc_dis,4);
                                                
                  $total_tax= $total_tax + $final_taxed_canc_dis;
                      
                  
                  $total_taxable_am= $total_taxable_am + $data_order->total_canceled_discount_price;
                    
                   
                  $data_order->final_taxed_canc_dis = $final_taxed_canc_dis;
         
                  
             }  //end for loop 
          }  //end if check
          
          
          
          
          
     //*********
          
          
    //Calculate Bags
    
    
        if (count($data['bags_data']) > 0) {
            foreach($data['bags_data'] as $key => $data_bag){
                
                // Calculations for full price
                
                   
                  
                   $total_m=$data_bag->total_bag_collections_full_price;
                   $mult=($total_m) * ($tax_perc);
                   $final_taxed=$mult/100;
                   
                       $final_taxed=round( $final_taxed,4);
                                               
                   $total_tax= $total_tax + $final_taxed;
                   $total_taxable_am= $total_taxable_am + $data_bag->total_bag_collections_full_price;
                
                   $data_bag->final_taxed = $final_taxed;
                   
                   
                // Calculations for discounted price
                
                    $total_m_dis = $data_bag->total_bag_collections_discount_price;
                    $mult_dis=$total_m_dis*$tax_perc;
                    $final_taxed_dis=$mult_dis/100;
                    
                     $final_taxed_dis=round($final_taxed_dis,4);
                    
                                               
                    $total_tax= $total_tax + $final_taxed_dis;
                    $total_taxable_am= $total_taxable_am + $data_bag->total_bag_collections_discount_price;
                                               
                
                    $data_bag->final_taxed_dis = $final_taxed_dis;
                
                
                // Calculations for Paid canceled full price 
                
                
                    $total_m_canc=$data_bag->total_canceled_full_price;
                    $mult_canc=$total_m_canc*$tax_perc;
                    $final_taxed_canc=$mult_canc/100;
                    
                      $final_taxed_canc=round($final_taxed_canc,4);
                    
                                                
                    $total_tax= $total_tax + $final_taxed_canc;
                    $total_taxable_am= $total_taxable_am + $data_bag->total_canceled_full_price;
                    
                     $data_bag->final_taxed_canc = $final_taxed_canc;
                     
                      // Calculations for Paid canceled discount price 
                
                
                    $total_m_canc_dis=$data_bag->total_canceled_discount_price;
                    $mult_canc_dis=$total_m_canc_dis*$tax_perc;
                    $final_taxed_canc_dis=$mult_canc_dis/100;
                    
                      $final_taxed_canc_dis=round($final_taxed_canc_dis,4);
                                                
                    $total_tax= $total_tax + $final_taxed_canc_dis;
                    $total_taxable_am= $total_taxable_am + $data_bag->total_canceled_discount_price;
                    
                     $data_bag->final_taxed_canc_dis = $final_taxed_canc_dis;
                                              
                
                
            } // end of for loop
        } // end if check
    
    
    
    //*********
    
    
    //Calculated Credit notes
    
    $credit_amount=0;
    // $note='';
   
    
    $delivery_price = $this->input->post('delivery_price'); 
     
      if(count($delivery_price) > 0){  
      foreach ($delivery_price as $key => $price) {
           
                $credit_amount =$credit_amount + number_format($price, 2);
                
                // $output =  str_replace(',,', '-', $this->input->post('description['.$key.']'));
                // $output =  str_replace(',', '-', $output);
                // $output= trim($output, ',');
                  
                //      if($key ==0){
                 
                //          $note =$output;
                //      }else{
                //           $note =$note.','.$output;
                //      }
                
      }
      
    }
      
       $data['creadit_notes']->note=$this->input->post('description');
       $data['creadit_notes']->credit_amount=$credit_amount;
       
               $total_credit= $credit_amount;
              
               $mult_credit=$total_credit*$tax_perc;
               $final_taxed_credit=$mult_credit/100;
               
                 $final_taxed_credit=round($final_taxed_credit,4);
                                                
               $total_tax= $total_tax - $final_taxed_credit;
               $total_taxable_am= $total_taxable_am - $credit_amount;
               
                $data['creadit_notes']->final_taxed_credit=$final_taxed_credit;
               
               
               //Final total
               
               $final_total=$total_taxable_am+$total_tax;
               
               
               $data['total_tax']=round($total_tax,4);
               $data['total_taxable_am']=round($total_taxable_am,4);
               $data['final_total']=round($final_total,4);
               $data['partner_name']=$data['orders_data'][0]->full_name;
               $data['email']=$data['orders_data'][0]->email;                                
      
      
             $month_year=date('m-Y');
      
          $inv_tb_data=array(
            
            'partner_name'=>$data['partner_name'],
            'partner_email'=> $data['email'],
            'inv_start_dt'=>$sd,
            'inv_end_dt'=>$ed,
            'inv_term'=>$data['term'],
            'inv_due_dt'=>$data['due_date'],
            'partner_id'=>$pid,
            'taxable_amount'=>$total_taxable_am,
            'tax_generated'=>$total_tax,
            'total_amount'=>$final_total,
            'total_credit_am'=>$total_credit,
            'inv_status'=>'Pending',
            'generated_at'=>date("Y-m-d H:i:s"),
            'generated_by'=>$this->session->userdata('role').','.$this->session->userdata('name'),
            'month_year'=>$month_year,
            'vat_is'=>$vat_is
            
            
            );  
            
            
        //         echo '<pre>';
        //   print_r($data);
        //   die();
          
        //   echo 'hi';
        //   print_r($data['creadit_notes']->credit_amount);
        
        
        //   if($creadit_notes->credit_amount != 0){
              
        //       echo '<br>yes its not zero';
        //   }else{
        //       echo '<br>yes its  zero';
        //   }
        //   die();
          
        //   echo '<hr><br>ENCODED<pre>';
          
         $Xtst= json_encode($data);
        //  echo $Xtst;
           
        //   echo '<br><hr>test<pre>';
          
        //   $Ytst = json_decode($Xtst);
          
        //   print_r($Ytst);
          
        //   die();
            
            
            // echo '<pre>';
            // print_r($inv_tb_data);
            // die();
          
          
                 $new_invoice=$this->Account_model->add_new_invoice('invoices',$inv_tb_data,$vat_is,$sd,$ed,$Xtst);
                
                
                $data['inv_id']=$new_invoice;
         $this->load->view('test',$data);
                                    //****************   
                                     //     echo 'date is '.$data['start_date'].'<br>';
        
                                     // echo 'due date is '.$data['due_date'].'<br>';
        
                                     // echo 'orders <br><hr><pre>';
                                     // print_r($data['orders_data']);
        
                                     //  echo 'bags <br><hr><pre>';
                                     // print_r($data['bags_data']);
        
        
                                     // echo 'Credit notes <br> <hr><pre>';
                                     // print_r($creadit_notes);
        
                                     // echo '<br><hr><hr>';
                                     // echo '$total_taxable_am : '.$total_taxable_am.'<br>';
                                     //  echo '$total_tax : '.$total_tax.'<br>';
                                     //  echo '$final_total : '.$final_total.'<br>';
        
                                     //   die();
                                     //   ************
        
      
                                    //   echo '<pre>';
                                     //   print_r($data);
                                     //   die();
        
     }
     
     
       public function del()
    {
        
         $ids = $this->input->post('ids');
         
              $explod_is=explode(",", $ids);
 
        // $this->db->where_in('invoice_id', explode(",", $ids));
        
        echo ' explod is: <pre>';
        print_r($explod_is);
        // $this->db->delete('invoices');
 
        // echo json_encode(['success'=>"Item Deleted successfully."]);
  
        
}




public function transaction(){
     
        $cdate=date("Y-m-d");
         $prev=date("Y-m-01",strtotime("-2 month"));      
        
         $where = "created_at BETWEEN '".date('Y-m-d', strtotime($prev))." 00:00:00' and '".date('Y-m-d', strtotime($cdate))." 23:59:59'";
     
       $data['invoices'] =  $this->Account_model->get_months_incomings('invoices',$where);
        
        // dd($data);
        // echo '<pre>';
        
        // print_r($data['invoices']);
        
        // echo '<pre> <br>';
        // print_r($this->db->last_query());
        // die();
        
        
        //   if($this->session->userdata('role') != 'vendor');
        
        
        
        //   $res=$this->driver_model->get_drivers();
        // $data['drivers'] =  $res['records'];
        //  $data['drivers_Acc'] =  $this->driver_model->get_drivers_Acc();
        //  echo '<pre>';
        //  print_r($data);
        //  die();
        
        
        // invoices
        
        // echo 'hiiii';
        
        
        
        
        // $data['invoices'] =  $this->Account_model->get_where_invoice('invoices',array());
        $data['vendors'] =  $this->Vendor_model->get_where(array());
      
        
       
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('partner_account/transaction',$data);
            
     
    }
    
     public function add_balance_partner()
    {
       $id = $this->input->post('id');
       $vendor_id = $this->input->post('vendor_id');
       $amount = $this->input->post('amount');
       $notes = $this->input->post('notes');
       $pendings = $this->input->post('pendings');
       $from_dt = $this->input->post('from_dt');
       $to_dt = $this->input->post('to_dt');
       $name_p = $this->input->post('name_p');
      
       $i_image_str = $this->input->post('i_image_str');
      

       $data = [
           'vendor_id'=>$vendor_id,
           'name' => strtolower($name_p),
           'amount' =>  $amount,
           'notes' => $notes,
           'from_dt' => date('Y-m-d',strtotime($from_dt)),
           'to_dt' => date('Y-m-d',strtotime($to_dt)),
           'effected_date' => date('Y-m-d',strtotime($from_dt)),
           'created_at' => date('Y-m-d  H:i:s'),
           'type'=>'Credit',
           'created_by'=>$this->session->userdata('name'),
           'old_balance' => (!empty($pendings))? $pendings:0
          
       ];
         
      if (!empty($id) AND $id > 0){
          if (!empty($i_image_str)){
              $data['receipt'] = $this->upload_image($i_image_str,'add_balance');
          }
           
      }else{
           
               $data['receipt'] = (!empty($i_image_str))? $this->upload_image($i_image_str,'add_balance') : null;
               
           
       }
       
        if (!empty($id) AND $id > 0){
            // $result =  $this->Vehicle_model->update($id,$final);
            // echo '<pre>';
            // print_r($final);
            // die();
        }else{
          
        //   dd($data);
            $insert_id = $this->Account_model->add_topup($data);
            $result=$insert_id;
            // $result = $this->Vehicle_model->add_qr($qr_path, $insert_id);
        }

        if($result){
            echo "success";
        }else{
            echo "error";//
        }

    }
    
    
    
    private function upload_image($b64_string, $name)
    {
        $ext = 'pdf';
        $directory_path = 'assets/uploads/partner_balance/';
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
    
     public function add_waived()
    {
        
        
       
       $vendor_id = $this->input->post('partner_w');
       
       $from_dt = $this->input->post('from_n');
       $to_dt = $this->input->post('to_n');
       $name_p = $this->input->post('name_p_ww');
       
       $data = [
           'vendor_id'=>$vendor_id,
           'name' => strtolower($name_p),
           'from_dt' => date('Y-m-d',strtotime($from_dt)),
           'to_dt' => date('Y-m-d',strtotime($to_dt)),
           'effected_date' => date('Y-m-d',strtotime($from_dt)),
           'created_at' => date('Y-m-d  H:i:s'),
           'type'=>'Waive Off',
           'created_by'=>$this->session->userdata('name'),
           'old_balance' => 0
          
       ];
        
       
    
    //Calculated Credit notes
    
    $delivery_price = $this->input->post('delivery_price');
    $description = $this->input->post('description');
    
    
    
     
      if(count($delivery_price) > 0){  
      foreach ($delivery_price as $key => $price) {
                $data['amount'] =  number_format($price, 2);
                $data['notes']  =  !empty($description[$key])? $description[$key] : '';
                
                // echo '<pre>';
                // print_r($data);
                $insert_id = $this->Account_model->add_topup($data);
               $result=$insert_id;
        }
      }
      
      if($result){
          $this->session->set_flashdata("success","Record Updated Successfully.");
      }else{
          $this->session->set_flashdata("error","Network Problem, Try again after some time.");
      }
      
     redirect(base_url('balance'));
        
     }
     
     public function add_additionals()
    {
        
        
       
       $vendor_id = $this->input->post('partner_a');
       
       $from_dt = $this->input->post('from_n_a');
       $to_dt = $this->input->post('to_n_a');
       $name_p = $this->input->post('name_p_aa');
       
       $data = [
           'vendor_id'=>$vendor_id,
           'name' => strtolower($name_p),
           'from_dt' => date('Y-m-d',strtotime($from_dt)),
           'to_dt' => date('Y-m-d',strtotime($to_dt)),
           'effected_date' => date('Y-m-d',strtotime($from_dt)),
           'created_at' => date('Y-m-d  H:i:s'),
           'type'=>'Extra Charged',
           'created_by'=>$this->session->userdata('name'),
           'old_balance' => 0,
           'amount' => number_format($this->input->post('amount_a'), 2),
           'notes'  => $this->input->post('description_a')
       ];
        
       
               $insert_id = $this->Account_model->add_topup($data);
               $result=$insert_id;
        
      if($result){
          $this->session->set_flashdata("success","Record Updated Successfully.");
      }else{
          $this->session->set_flashdata("error","Network Problem, Try again after some time.");
      }
      
     redirect(base_url('balance'));
        
     } 
     
     
      public function get_by_id_vendor_incomings(){
        
       
        
         $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $partner_id = @$_POST['status'];

       
         if(!$start_date){
            $start_date = date('Y-m-d h:i:s');
         }
         if(!$end_date){
             $end_date = date('Y-m-d h:i:s');
         }
       
   
      $where = "vendor_id=".$partner_id."  and created_at BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' and '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
      
        $report_data['invoices'] =  $this->Account_model->get_where_detail_is('partner_incoming',$where);
       
        
       
       if( $report_data['invoices']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
           
        }
    
    // echo '<pre>';
    // print_r($this->db->last_query());
    // echo '<hr>';
    //     print_r($response);
    //     die();
        echo json_encode($response);
            
     
    }
    
    public function balance_Detail_v(){
     
        $cdate=date("Y-m-d");
         $prev=date("Y-m-01",strtotime("-2 month"));      
        
        $partner_id=$this->session->userdata('u_id');
         $where = " vendor_id=".$partner_id." and created_at BETWEEN '".date('Y-m-d', strtotime($prev))." 00:00:00' and '".date('Y-m-d', strtotime($cdate))." 23:59:59'";
     
       $data['invoices'] =  $this->Account_model->get_months_incomings('invoices',$where);
        
       
        $this->load->view('partner_account/transaction_p',$data);
            
     
    }
    
 

}

?>