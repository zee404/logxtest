<?php
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view('forbidden');
         die();
        $imag = [];
         $d = FCPATH.'upload/';
         
        foreach(glob($d.'*',GLOB_BRACE) as $file){
        $imag[] =  basename($file);
        }
        
      print_r(count($imag));
      die();
    
    $ima = [];
    
   
    
    $path = FCPATH.'upload/';
    // ,png,jpg,jpeg
    // All data removed till nov 30 2020 
    //  ALL xlx del till jan 31 2021
        // foreach (glob($path.'*.{csv,xlsx,xls,png,jpg,jpeg}',GLOB_BRACE) as $file) 
    //   ,png,jpg,jpeg
    $im_cnt=0;
         foreach (glob($path.'*.{xlsx,xls,png,jpg,jpeg}',GLOB_BRACE) as $file) 
         {
             if (is_file($file)) 
             {
                //  < '2022-01-01' for xls
                // '2021-09-30  < '2021-11-30' 
                // 2021-12-15
                if (date('Y-m-d',filemtime($file)) < '2022-02-03') 
                {
                    
                    
                //  OLD //  unlink($fileX);
                // OLD  $ima[] = $file;
                     
                     
                    //  echo 'just searching';
                     if( strstr( $file, 'addr_img' ) ){
                        //  echo '<br>-----------------------<br> yes something is founded <br>';
                        //  echo $file;
                        //  echo '<br>------------------------<br>';
                         
                         $im_cnt=$im_cnt+1;
                     }else{
                            //  unlink($fileXYZ);
                              $ima[] = $file;
                              
                               echo "<pre>";
                                print_r($file);
                                echo "<pre>";
                     }
                    
                     
                    //  die();
                }
            }
        }
         echo "After Loop NEW<pre>";
         print_r(count($ima));
         echo "<pre><br> im am address images counter:".$im_cnt;
         
         
        //  die();
    }
    
    
    
     public function empty_bag()
    {
        $this->load->view('forbidden');
         die();
        $imag = [];
         $d = FCPATH.'upload_empty_bag/';
         
        foreach(glob($d.'*',GLOB_BRACE) as $file){
        $imag[] =  basename($file);
        }
        
      print_r(count($imag));
      die();
    
    $ima = [];
    
   
    
    $path = FCPATH.'upload_empty_bag/';
    // ,png,jpg,jpeg
    // All data removed till nov 30 2020 
    //  ALL xlx del till jan 31 2021
        // foreach (glob($path.'*.{csv,xlsx,xls,png,jpg,jpeg}',GLOB_BRACE) as $file) 
    //   ,png,jpg,jpeg
         foreach (glob($path.'*.{xlsx,xls,png,jpg,jpeg}',GLOB_BRACE) as $file) 
         {
             if (is_file($file)) 
             {
                //  < '2022-01-01' for xls
                // '2021-09-30  < '2021-11-30' 
                if (date('Y-m-d',filemtime($file)) < '2021-12-15') 
                {
                    
                    
                //  OLD //  unlink($fileX);
                // OLD  $ima[] = $file;
                     
                     
                    //  echo 'just searching';
                    //  if( strstr( $file, 'addr_img' ) ){
                    //      echo '<br>-----------------------<br> yes something is founded <br>';
                    //      echo $file;
                    //      echo '<br>------------------------<br>';
                    //  }else{
                            //  unlink($fileXYZ);
                              $ima[] = $file;
                              
                               echo "<pre>";
                                print_r($file);
                                echo "<pre>";
                    //  }
                    
                     
                    //  die();
                }
            }
        }
         echo "After Loop NEW<pre>";
         print_r(count($ima));
         echo "<pre>";
         
        //  die();
    }
    
    
    
    public function open_bag()
    {
        $this->load->view('forbidden');
         die();
        $imag = [];
         $d = FCPATH.'upload_open_bag/';
         
        foreach(glob($d.'*',GLOB_BRACE) as $file){
        $imag[] =  basename($file);
        }
        echo 'hi';
      print_r(count($imag));
      die();
    
    $ima = [];
    
   
    
    $path = FCPATH.'upload_open_bag/';
    // ,png,jpg,jpeg
    // All data removed till nov 30 2020 
    //  ALL xlx del till jan 31 2021
        // foreach (glob($path.'*.{csv,xlsx,xls,png,jpg,jpeg}',GLOB_BRACE) as $file) 
    //   ,png,jpg,jpeg
         foreach (glob($path.'*.{xlsx,xls,png,jpg,jpeg}',GLOB_BRACE) as $file) 
         {
             if (is_file($file)) 
             {
                //  < '2022-01-01' for xls
                // '2021-09-30  < '2021-11-30' 
                if (date('Y-m-d',filemtime($file)) < '2021-12-15') 
                {
                    
                    
                //  OLD //  unlink($fileX);
                // OLD  $ima[] = $file;
                     
                     
                    //  echo 'just searching';
                    //  if( strstr( $file, 'addr_img' ) ){
                    //      echo '<br>-----------------------<br> yes something is founded <br>';
                    //      echo $file;
                    //      echo '<br>------------------------<br>';
                    //  }else{
                            //  unlink($fileXYZ);
                              $ima[] = $file;
                              
                               echo "<pre>";
                                print_r($file);
                                echo "<pre>";
                    //  }
                    
                     
                     die();
                }
            }
        }
         echo "After Loop NEW<pre>";
         print_r(count($ima));
         echo "<pre>";
         
        //  die();
    }
    
      public function check_qr(){
             
                 $this->load->model('order_model');
        
                 $response = array('status'=>400, 'error'=>true);

                 
                 
                //  $qr_list='SUN929011240121,SUN120117240121,SUN505016240121,SUN368672240121,SUN484197240121,SUN393575240121,SUN169574240121,SUN249169240121,SUN149936240121,SUN824739240121,SUN969454240121,SUN704690240121,SUN276161240121,SUN430881240121,SUN634234240121,SUN229132240121,SUN533743240121,SUN180862240121,SUN497444240121,SUN238681240121,SUN408361240121';
                
                // Neutral code
                  
                  $qr_list='SUN408361240121,SUN238681240121,SUN497444240121,SUN956962240121,SUN721722240121,SUN180862240121,SUN729166240121,SUN533743240121,SUN229132240121,SUN634234240121,SUN430881240121,SUN276161240121,SUN704690240121,SUN969454240121,SUN824739240121,SUN149936240121,SUN249169240121,SUN169574240121,SUN393575240121,SUN484197240121,SUN295113240121,SUN368672240121,SUN444356240121,SUN504103240121,SUN505016240121,SUN120117240121,SUN929011240121,SUN754072240121,SUN487636240121,SUN656563240121,SUN454116240121,SUN602447240121,SUN426253240121,SUN524589240121,SUN589945240121,SUN332573240121,SUN424010240121,SUN706534240121,SUN554102240121,SUN771319240121,SUN813102240121,SUN727458240121,SUN663309240121,SUN229318240121,SUN650250240121,SUN354509240121,SUN357587240121,SUN341542240121,SUN116791240121,SUN582315240121';
                
                 $str_arr=explode(",",$qr_list);
                 
                 
                 echo 'LIST <pre>';
                 print_r($str_arr);
                 
                //  die();
                
                $arr_neutral=array();
                $arr_attachedtodeliv=array();
                $arr_pick_from=array();
                $arr_delivered=array();
                $arr_collected=array();
                $arr_recevied_in=array();
                $arr_xtra=array();
                
              
                 
                  for($i=0; $i<count($str_arr); $i++){
               
                 if (isset($str_arr[$i])){
                     
                       $platform='ios';
                       
                     //  $user_id=$this->input->post('user_id');
                       $qr=$str_arr[$i];
                     if($platform =='ios'){
                         
                       
                          $current_status=$this->order_model->get_qr_current_status_with_delivery_details($qr);
                           
                           
                           
                           
                           
                        //   Change status code
                        
                                    //     $user_id=25070;
                                    //     $qr_code=$current_status[0]->code;
                                    //     $delivery_id=$current_status[0]->delivery_id;
                                    //     $driver_id=30320;
                                    //     $reason='';
                                    //     $rzn_note_jsn='';
                                    //     $new_status='Neutral';
                                    //     $qrid=$current_status[0]->qrid;
                                   
                                   
                                    // $whr_for_qr=array('qrid'=>$current_status[0]->qrid);
                                    // $whr_for_delivery=array('order_id'=>$current_status[0]->delivery_id);
                                   
                                   
                                    //  if($current_status[0]->bsid ==4){
                                         
                                    //     //  Collected 25070
                                        
                                    //     echo 'i am delivered'.$current_status[0]->code.'<br>';
                                        
                                        
                                        
                                    //      $selection_res = $this->order_model->change_to_collected_qr_collected_deliv_rec_strkeeper($delivery_id,$driver_id,$qr_code,$user_id,$reason,$rzn_note_jsn,$new_status,$qrid);
                                          
                                    //     // Received in Warehouse  
                                    //  if($selection_res){    
                                    //          $data_bag_status= array(
                      
                                    //               'bsid'=>6,
                                    //               'str_kpr_id'=>$user_id
                                    //           );
                                    //          $data_ordertbl_update= array(
                                                
                                    //             'str_keep_varification'=>'yes',
                                    //             'varified_by'=>$user_id,
                                    //             'varified_at'=>date("Y-m-d H:i:s")
                                                
                                    //          );
                                   
                                    //          $selection_res2 = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                   
                                    //  }
                                    // // Neutral 
                                    
                                    // if($selection_res2){
                                    //  $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
                                    //  $data_for_neutral_bag_status= array(
                      
                                    //               'bsid'=>1,
                                    //               'str_kpr_id'=>$user_id
                                    //           );
                                               
                                    //  $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                     
                                     
                                    //  echo 'Neutral done';
                                    // }
                                               
                                    //  }else if($current_status[0]->bsid ==5){
                                         
                                    //       // Received in Warehouse  
                                  
                                    //          $data_bag_status= array(
                      
                                    //               'bsid'=>6,
                                    //               'str_kpr_id'=>$user_id
                                    //           );
                                    //          $data_ordertbl_update= array(
                                                
                                    //             'str_keep_varification'=>'yes',
                                    //             'varified_by'=>$user_id,
                                    //             'varified_at'=>date("Y-m-d H:i:s")
                                                
                                    //          );
                                   
                                    //          $selection_res2 = $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_bag_status,$data_ordertbl_update,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                   
                                   
                                   
                                    // // Neutral 
                                    
                                    // if($selection_res2){
                                    //  $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
                                    //  $data_for_neutral_bag_status= array(
                      
                                    //               'bsid'=>1,
                                    //               'str_kpr_id'=>$user_id
                                    //           );
                                               
                                    //  $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                     
                                     
                                    //  echo 'Neutral done';
                                    // }
                                         
                                    //  }else if($current_status[0]->bsid ==6){
                                         
                                    //      $data_for_neutral_deliv = array("is_neutral"=>1,"neutral_by"=>$user_id,"neutral_at"=>date("Y-m-d H:i:s"));
                                    //  $data_for_neutral_bag_status= array(
                      
                                    //               'bsid'=>1,
                                    //               'str_kpr_id'=>$user_id
                                    //           );
                                               
                                    //  $result_for_neutral= $this->order_model->change_qr_and_delivery_wrt_status_strkeeper($data_for_neutral_bag_status,$data_for_neutral_deliv,$delivery_id,$qrid,$whr_for_qr,$whr_for_delivery);
                                     
                                     
                                    //  echo 'Neutral done';
                                         
                                    //  }else if($current_status[0]->bsid ==2 OR $current_status[0]->bsid ==3){
                                         
                                    //       $selection_res=$this->order_model->change_to_neutral_qr_remove_deliv_rec_strkeeper($delivery_id,$qrid,$user_id,$reason,$rzn_note_jsn,$new_status);
                                    
                                    //  }
                        
                        
                        
                        // END
                           
                           
                           
                           
                           
                           
                           
                          
                                   
                                   if($current_status[0]->bsid ==1){
                                       
                                       echo '<br> neutral : <br>';
                                       
                                        echo '<br> ('.$i.') status '.'of : '.$qr.' : <pre>';
                           
                             echo '<br> qrid  :  '.$current_status[0]->qrid ;
                             echo '<br> code  :  '.$current_status[0]->code ;
                             echo '<br> bsid  :  '.$current_status[0]->bsid ;
                             echo '<br> qr_status  :  '.$current_status[0]->qr_status ;
                             echo '<br> delivery_id  :  '.$current_status[0]->delivery_id ;
                             
                              echo '<br> delivery_status  :  '.$current_status[0]->delivery_status ;
                              echo '<br> delivery_canceled_check  :  '.$current_status[0]->delivery_canceled_check ;
                               echo '<br> varified_by  :  '.$current_status[0]->varified_by ;
                                
                                
                                 echo '<br> neutral_by   :  '.$current_status[0]->neutral_by ;
                                 echo '<br> varified_by_n  :  '.$current_status[0]->varified_by_n ;
                                 echo '<br> str_keep_varification  :  '.$current_status[0]->str_keep_varification ;
                                  echo '<br> delivery_date  :  '.$current_status[0]->delivery_date ;
                                  echo '<br> delivered_date  :  '.$current_status[0]->delivered_date ;
                                  echo '<br> delivery_assigned_driver_name  :  '.$current_status[0]->delivery_assigned_driver_name ;
                                   echo '<br> bag_collected_dt  :  '.$current_status[0]->bag_collected_dt ;
                                   echo '<br>';
                                       
                                       
                                       array_push($arr_neutral,$current_status[0]->code);
                                      
                                   }else if($current_status[0]->bsid ==2){
                                       
                                       echo '<br> Attached to deliv <br>';
                                        echo '<br> ('.$i.') status '.'of : '.$qr.' : <pre>';
                           
                             echo '<br> qrid  :  '.$current_status[0]->qrid ;
                             echo '<br> code  :  '.$current_status[0]->code ;
                             echo '<br> bsid  :  '.$current_status[0]->bsid ;
                             echo '<br> qr_status  :  '.$current_status[0]->qr_status ;
                             echo '<br> delivery_id  :  '.$current_status[0]->delivery_id ;
                             
                              echo '<br> delivery_status  :  '.$current_status[0]->delivery_status ;
                              echo '<br> delivery_canceled_check  :  '.$current_status[0]->delivery_canceled_check ;
                               echo '<br> varified_by  :  '.$current_status[0]->varified_by ;
                                
                                
                                 echo '<br> neutral_by   :  '.$current_status[0]->neutral_by ;
                                 echo '<br> varified_by_n  :  '.$current_status[0]->varified_by_n ;
                                 echo '<br> str_keep_varification  :  '.$current_status[0]->str_keep_varification ;
                                  echo '<br> delivery_date  :  '.$current_status[0]->delivery_date ;
                                  echo '<br> delivered_date  :  '.$current_status[0]->delivered_date ;
                                  echo '<br> delivery_assigned_driver_name  :  '.$current_status[0]->delivery_assigned_driver_name ;
                                   echo '<br> bag_collected_dt  :  '.$current_status[0]->bag_collected_dt ;
                                   echo '<br>';
                                       
                                       array_push( $arr_attachedtodeliv,$current_status[0]->code);
                                       
                                   }else if($current_status[0]->bsid ==3){
                                       
                                       echo '<br> picked from warehouse <br>';
                                        echo '<br> ('.$i.') status '.'of : '.$qr.' : <pre>';
                           
                             echo '<br> qrid  :  '.$current_status[0]->qrid ;
                             echo '<br> code  :  '.$current_status[0]->code ;
                             echo '<br> bsid  :  '.$current_status[0]->bsid ;
                             echo '<br> qr_status  :  '.$current_status[0]->qr_status ;
                             echo '<br> delivery_id  :  '.$current_status[0]->delivery_id ;
                             
                              echo '<br> delivery_status  :  '.$current_status[0]->delivery_status ;
                              echo '<br> delivery_canceled_check  :  '.$current_status[0]->delivery_canceled_check ;
                               echo '<br> varified_by  :  '.$current_status[0]->varified_by ;
                                
                                
                                 echo '<br> neutral_by   :  '.$current_status[0]->neutral_by ;
                                 echo '<br> varified_by_n  :  '.$current_status[0]->varified_by_n ;
                                 echo '<br> str_keep_varification  :  '.$current_status[0]->str_keep_varification ;
                                  echo '<br> delivery_date  :  '.$current_status[0]->delivery_date ;
                                  echo '<br> delivered_date  :  '.$current_status[0]->delivered_date ;
                                  echo '<br> delivery_assigned_driver_name  :  '.$current_status[0]->delivery_assigned_driver_name ;
                                   echo '<br> bag_collected_dt  :  '.$current_status[0]->bag_collected_dt ;
                                   echo '<br>';
                                       
                                       array_push($arr_pick_from,$current_status[0]->code);
                                       
                                   }else if($current_status[0]->bsid ==4){
                                       
                                       echo '<br> delivered <br>';
                                        echo '<br> ('.$i.') status '.'of : '.$qr.' : <pre>';
                           
                             echo '<br> qrid  :  '.$current_status[0]->qrid ;
                             echo '<br> code  :  '.$current_status[0]->code ;
                             echo '<br> bsid  :  '.$current_status[0]->bsid ;
                             echo '<br> qr_status  :  '.$current_status[0]->qr_status ;
                             echo '<br> delivery_id  :  '.$current_status[0]->delivery_id ;
                             
                              echo '<br> delivery_status  :  '.$current_status[0]->delivery_status ;
                              echo '<br> delivery_canceled_check  :  '.$current_status[0]->delivery_canceled_check ;
                               echo '<br> varified_by  :  '.$current_status[0]->varified_by ;
                                
                                
                                 echo '<br> neutral_by   :  '.$current_status[0]->neutral_by ;
                                 echo '<br> varified_by_n  :  '.$current_status[0]->varified_by_n ;
                                 echo '<br> str_keep_varification  :  '.$current_status[0]->str_keep_varification ;
                                  echo '<br> delivery_date  :  '.$current_status[0]->delivery_date ;
                                  echo '<br> delivered_date  :  '.$current_status[0]->delivered_date ;
                                  echo '<br> delivery_assigned_driver_name  :  '.$current_status[0]->delivery_assigned_driver_name ;
                                   echo '<br> bag_collected_dt  :  '.$current_status[0]->bag_collected_dt ;
                                   echo '<br>';
                                       
                                       array_push($arr_delivered,$current_status[0]->code);
                                       
                                   }else if($current_status[0]->bsid ==5){
                                       
                                       echo '<br> Collected <br>';
                                        echo '<br> ('.$i.') status '.'of : '.$qr.' : <pre>';
                           
                             echo '<br> qrid  :  '.$current_status[0]->qrid ;
                             echo '<br> code  :  '.$current_status[0]->code ;
                             echo '<br> bsid  :  '.$current_status[0]->bsid ;
                             echo '<br> qr_status  :  '.$current_status[0]->qr_status ;
                             echo '<br> delivery_id  :  '.$current_status[0]->delivery_id ;
                             
                              echo '<br> delivery_status  :  '.$current_status[0]->delivery_status ;
                              echo '<br> delivery_canceled_check  :  '.$current_status[0]->delivery_canceled_check ;
                               echo '<br> varified_by  :  '.$current_status[0]->varified_by ;
                                
                                
                                 echo '<br> neutral_by   :  '.$current_status[0]->neutral_by ;
                                 echo '<br> varified_by_n  :  '.$current_status[0]->varified_by_n ;
                                 echo '<br> str_keep_varification  :  '.$current_status[0]->str_keep_varification ;
                                  echo '<br> delivery_date  :  '.$current_status[0]->delivery_date ;
                                  echo '<br> delivered_date  :  '.$current_status[0]->delivered_date ;
                                  echo '<br> delivery_assigned_driver_name  :  '.$current_status[0]->delivery_assigned_driver_name ;
                                   echo '<br> bag_collected_dt  :  '.$current_status[0]->bag_collected_dt ;
                                   echo '<br>';
                                       
                                       array_push($arr_collected,$current_status[0]->code);
                                       
                                   }else if($current_status[0]->bsid ==6){
                                       
                                       echo '<br> Received in warehouse <br>';
                                        echo '<br> ('.$i.') status '.'of : '.$qr.' : <pre>';
                           
                             echo '<br> qrid  :  '.$current_status[0]->qrid ;
                             echo '<br> code  :  '.$current_status[0]->code ;
                             echo '<br> bsid  :  '.$current_status[0]->bsid ;
                             echo '<br> qr_status  :  '.$current_status[0]->qr_status ;
                             echo '<br> delivery_id  :  '.$current_status[0]->delivery_id ;
                             
                              echo '<br> delivery_status  :  '.$current_status[0]->delivery_status ;
                              echo '<br> delivery_canceled_check  :  '.$current_status[0]->delivery_canceled_check ;
                               echo '<br> varified_by  :  '.$current_status[0]->varified_by ;
                                
                                
                                 echo '<br> neutral_by   :  '.$current_status[0]->neutral_by ;
                                 echo '<br> varified_by_n  :  '.$current_status[0]->varified_by_n ;
                                 echo '<br> str_keep_varification  :  '.$current_status[0]->str_keep_varification ;
                                  echo '<br> delivery_date  :  '.$current_status[0]->delivery_date ;
                                  echo '<br> delivered_date  :  '.$current_status[0]->delivered_date ;
                                  echo '<br> delivery_assigned_driver_name  :  '.$current_status[0]->delivery_assigned_driver_name ;
                                   echo '<br> bag_collected_dt  :  '.$current_status[0]->bag_collected_dt ;
                                   echo '<br>';
                                       
                                       array_push($arr_recevied_in,$current_status[0]->code);
                                   }else{
                                       echo '<br> xtra <br>';
                                        echo '<br> ('.$i.') status '.'of : '.$qr.' : <pre>';
                           
                             echo '<br> qrid  :  '.$current_status[0]->qrid ;
                             echo '<br> code  :  '.$current_status[0]->code ;
                             echo '<br> bsid  :  '.$current_status[0]->bsid ;
                             echo '<br> qr_status  :  '.$current_status[0]->qr_status ;
                             echo '<br> delivery_id  :  '.$current_status[0]->delivery_id ;
                             
                              echo '<br> delivery_status  :  '.$current_status[0]->delivery_status ;
                              echo '<br> delivery_canceled_check  :  '.$current_status[0]->delivery_canceled_check ;
                               echo '<br> varified_by  :  '.$current_status[0]->varified_by ;
                                
                                
                                 echo '<br> neutral_by   :  '.$current_status[0]->neutral_by ;
                                 echo '<br> varified_by_n  :  '.$current_status[0]->varified_by_n ;
                                 echo '<br> str_keep_varification  :  '.$current_status[0]->str_keep_varification ;
                                  echo '<br> delivery_date  :  '.$current_status[0]->delivery_date ;
                                  echo '<br> delivered_date  :  '.$current_status[0]->delivered_date ;
                                  echo '<br> delivery_assigned_driver_name  :  '.$current_status[0]->delivery_assigned_driver_name ;
                                   echo '<br> bag_collected_dt  :  '.$current_status[0]->bag_collected_dt ;
                                   echo '<br>';
                                       
                                        array_push($arr_xtra,$current_status[0]->code);
                                   }
                
                
                                   
                                   
                            
                         
                         
                         
                         
                     }else{
                         
                         
                     }
                     
                 
                     
                     
                 }
                 
                 
                 
                  } //end of for loop
                // echo json_encode($response);
                
                
                
                
               echo '<br> :::::::::::::::::::::: <br>';
               echo ' <br> Neutral :  <pre>';
                print_r($arr_neutral);
                
               echo ' <br> Attached to deliv :  <pre>';
                print_r($arr_attachedtodeliv);
                
               echo ' <br> Pick from ware house :  <pre>';
                print_r($arr_pick_from);
                
               echo ' <br> Delivered :  <pre>';
                print_r($arr_delivered);
                
                
               echo ' <br> Collected :  <pre>';
                print_r($arr_collected);
                
               echo ' <br> Received in whare house  :  <pre>';
                print_r($arr_recevied_in);
                
               echo ' <br> Xtra :  <pre>';
                print_r($arr_xtra);
               
               
               
               
              
               
             
         }
         
         
         
         
         
         
         
         
}
