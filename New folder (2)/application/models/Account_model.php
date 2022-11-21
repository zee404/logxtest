<?php
/**
* Created by PhpStorm.
 * User: Ayesha
 * Date: 20/10/2020
 * Time: 10:45 AM
 */

class Account_model extends CI_Model{

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

    var $table_invoice = "invoices";
    

    public function __construct(){
        parent::__construct();
    }


     public function get_where_invoice($tb,$where){
       
        //$where['status'] = 0;
       
        $query = $this->db->select('*')->get_where($tb, $where);
       // return $this->db->last_query();
        return $query->result();
       
    }

    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table_invoice);
        return $query->row();
    }
    
    
     function get_vat_(){
        $query =$this->db->select('*')->from('vat')->where("id",1)->get()->result();
        // $query = $this->db->get('');
        return $query;
    }
    
    
    
    public function get_order_revenue($sd,$ed,$pid){
        
        // sum(case when ( o.`is_cancelled` = 'no') then o.partner_price else o.cancellation_price end) as total_reveneu,
        //	COUNT(o.order_id) AS 'orders', 
        // 	sum(case when (o.status = 'Assign' AND o.`is_cancelled` ='no') then o.partner_price else 0 end) as total_assign, 
        //  sum(case when (o.status = 'Not Assign' AND o.`is_cancelled` ='no' ) then o.partner_price else 0 end) as total_not_assign, 
        //  sum(case when (o.status = 'Ship' AND o.`is_cancelled` ='no') then o.partner_price else 0 end) as total_ship
         
           	
        	$orders_revinue= $this->db->query("SELECT  emi.id as emi_id,`emi`.`emirate_name` ,`u`.`email`, `u`.`phone`, `u`.`full_name`, `o`.`vendor_id`, 
           `emi_price`.price, `emi_price`.same_loc_price,
           	
         sum(case when ( (o.status = 'Delivered' OR o.status = 'Collected')  AND o.`is_cancelled` ='no' AND o.discount_track=0) then o.partner_price else 0 end) as total_delivered_full_price_revenue,
         sum(case when ((o.status = 'Delivered' OR o.status = 'Collected')  AND o.`is_cancelled` ='no' AND o.discount_track!=0) then o.partner_price else 0 end) as total_delivered_discount_price_revenue,
         sum(case when ((o.status = 'Delivered' OR o.status = 'Collected') AND o.`is_cancelled` ='no' AND o.discount_track=0) then 1 else 0 end) as total_num_of_delivered_delivries_full_price, 
         sum(case when ( (o.status = 'Delivered' OR o.status = 'Collected') AND o.`is_cancelled` ='no' AND o.discount_track!=0) then 1 else 0 end) as total_num_of_delivered_delivries_discount_price, 
         sum(case when ( (o.`is_cancelled` = 'yes') AND o.discount_track=0  ) then o.cancellation_price else 0 end) as total_canceled_full_price, 
         sum(case when ( (o.`is_cancelled` = 'yes') AND o.discount_track!=0  ) then o.cancellation_price else 0 end) as total_canceled_discount_price, 
        
         
         sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') AND o.discount_track=0 ) then 1 else 0 end) as total_paid_canceled_deliveries_full_price, 
         sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') AND o.discount_track!=0) then 1 else 0 end) as total_paid_canceled_deliveries_discount_price, 
        
         sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as total_UnPaid_canceled_deliveries
         
          
          
           	FROM `orders` as `o` 
           	JOIN `users` as `u` ON `o`.`vendor_id`= `u`.`id` 
           	JOIN `tbl_emirates` as `emi` ON `o`.`emirateID`= `emi`.`id`
            LEFT JOIN `tbl_delivery_quotations` as `emi_price` ON `o`.`emirateID` = `emi_price`.emirate AND `emi_price`.user_id =$pid AND `emi_price`.service_type =2 
            
           	WHERE `o`.`vendor_id` =$pid AND `o`.`delivery_date` BETWEEN '".date('Y-m-d', strtotime($sd))." 00:00:00' and '".date('Y-m-d', strtotime($ed))." 23:59:59'" ." GROUP BY `o`.`emirateID`
           	")->result();
           	
           	
           	
           	
           	
           	
           	// echo '<pre>';
           	// print_r($this->db->last_query());
           	// die();
           	// ->result();
        
        // echo '<pre>';
        //   print_r($orders_revinue);
           
        //   die();
        
        return 	$orders_revinue;
    }
    
    
     public function get_bag_revenue($sd,$ed,$pid){
        
        // `o`.`delivery_date` BETWEEN '".date('Y-m-d', strtotime($sd))." 00:00:00' and '".date('Y-m-d', strtotime($ed))." 23:59:59'"
        // COUNT(o.bag_id) AS 'orders',
        //  sum(case when ( o.`is_cancelled` = 'no') then o.partner_price else o.cancellation_price end) as total_reveneu,
        // sum(case when (o.status = 'Assign' AND o.`is_cancelled` ='no') then o.partner_price else 0 end) as total_assign,
        //  sum(case when (o.status = 'Requested' AND o.`is_cancelled` ='no' ) then o.partner_price else 0 end) as total_not_assign,

               
        
        	$bags_revinue= $this->db->query("SELECT emi.id as emi_id,`emi`.`emirate_name` ,`u`.`email`, `u`.`phone`, `u`.`full_name`, `o`.`vendor_id`, 
                `emi_price`.price, `emi_price`.same_loc_price,

              

               sum(case when ((o.status = 'Picked' OR o.status = 'No bag' ) AND o.`is_cancelled` ='no'  AND o.discount_track=0) then o.partner_price else 0 end) as total_bag_collections_full_price,
               sum(case when ((o.status = 'Picked' OR o.status = 'No bag' ) AND o.`is_cancelled` ='no' AND o.discount_track=0) then 1 else 0 end) as total_num_of_picked_bags_full_price, 
               sum(case when ((o.status = 'Picked' OR o.status = 'No bag' ) AND o.`is_cancelled` ='no'  AND o.discount_track !=0) then o.partner_price else 0 end) as total_bag_collections_discount_price,
               sum(case when ((o.status = 'Picked' OR o.status = 'No bag' ) AND o.`is_cancelled` ='no' AND o.discount_track !=0) then 1 else 0 end) as total_num_of_picked_bags_discount_price, 
               sum(case when ( (o.`is_cancelled` = 'yes') AND o.discount_track=0  ) then o.cancellation_price else 0 end) as total_canceled_full_price,
               sum(case when ( (o.`is_cancelled` = 'yes') AND o.discount_track!=0  ) then o.cancellation_price else 0 end) as total_canceled_discount_price,
               sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='')  AND o.discount_track=0 ) then 1 else 0 end) as total_paid_canceled_bags_full_price,
               sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='')  AND o.discount_track!=0) then 1 else 0 end) as total_paid_canceled_bags_discount_price,
               sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as total_UnPaid_canceled_bags
           	


               FROM `bags` as `o`
               JOIN `users` as `u` ON `o`.`vendor_id`= `u`.`id`
               JOIN `tbl_emirates` as `emi` ON `o`.`emirateID`= `emi`.`id`
                LEFT JOIN `tbl_bag_quotations` as `emi_price` ON `o`.`emirateID` = `emi_price`.emirate AND `emi_price`.user_id =$pid AND `emi_price`.service_type =2 
               WHERE `o`.`vendor_id` =$pid AND `o`.`pick_date` BETWEEN '".date('Y-m-d', strtotime($sd))." 00:00:00' and '".date('Y-m-d', strtotime($ed))." 23:59:59'"."               
               GROUP BY `o`.`emirateID`")->result();
           	
           	
           	
           	//pick_date
           	//created_dt
           	
           	
           	// echo '<pre>';
           	// print_r($this->db->last_query());
           	// die();
           	// ->result();
        
        // echo '<pre>';
        //   print_r($bags_revinue);
           
        //   die();
        
        return 	$bags_revinue;
    }
    
       public function add_new_invoice($inv_tb,$inv_data,$vat_is,$sd,$ed,$all_data){
     
      //   insert in invoice table and get invoice id for tracking creadit notes
        
               $inv_res= $this->db->insert($inv_tb,$inv_data);
               
                if($inv_res){
                    
                    // echo 'yes';
                    
                    $ID = $this->db->insert_id();
                    
                    //json data
                    
                    
                      $jdata=array(
                          
                          'all_data'=>$all_data,
                          'invoice_id'=>$ID,
                          'added_at' => date("Y-m-d H:i:s"),
                          'added_by' =>$this->session->userdata('role').','.$this->session->userdata('name')
                          
                          
                          );
                    
                    
                         $this->db->insert('invoice_details',$jdata);
                    //**********
                    
                    //   echo '<br>id is'.$ID;
                     $delivery_price = $this->input->post('delivery_price');
                     
                    //  echo '<br> $delivery_price <pre>';
                    //  print_r($delivery_price);
                     if($delivery_price){
                         
                        //  echo '<br> delivery price is not empty';
                        
                        foreach ($delivery_price as $key => $price) {
                         //   echo 'i am delivry qoutes key'.$descrip;
                              $data = array(
                                    'invoice_id' =>$ID,
                                    'note' =>$this->input->post('description['.$key.']'),
                                    'amount' =>$price,
                                    'added_at' => date("Y-m-d H:i:s"),
                                    'added_by' =>$this->session->userdata('role').','.$this->session->userdata('name'),
                                    'vat' => $vat_is,
                                    // 'updated_at' =>date("Y-m-d H:i:s"),
                                    // 'updated_by' =>''
               
                                );
                                
                                // echo 'data is: <br> <pre>';
                                // print_r($data);
                               
                                
                                     $single_insert_credits= $this->db->insert('credit_notes',$data);
                                     
                                     if($single_insert_credits){
                                        //   echo 'yes inserted'; 
                                     }else{
                                    //   echo 'not inserted <pre>';
                                      
                                    //   print_r($this->db->last_query());
                                       return false;
                                     }
                                     
                                    //  die();
                       }
                    
                    
                     }//end of if there are some credits
                    
                }else{
                    return false;
                }
             
                
            //   die();
               return $ID;
                  
     
        
        
       
        
      
      }
      

  
  
  
   public function save_vat_($d)
    {
        $id = $d['vat_id'];
        unset($d['vat_id']);
        
        $data['vat_']=$d['VAT_'];
        $data['updated_at']=date("Y-m-d H:i:s");
         $data['updated_by']=$this->session->userdata('role').','.$this->session->userdata('name');
         $this->db->where('id', $id);
            $res=$this->db->update('vat', $data);
            return $res;
        
    //  below code is to add vat
        // 
        // if($id == 0)
        // {
        //     $d['added_by'] = $this->session->userdata('u_id');
        //     $res=$this->db->insert('areas', $d);
        //     return $res;
            
        // }
        // else
        // {
           
        // }
    }
    
}




?>
