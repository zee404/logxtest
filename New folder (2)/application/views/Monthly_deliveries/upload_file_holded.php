<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/logx-logo-512x512.png');?>">

        <!-- Plugins css -->
        <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
        <!-- App css -->
           <link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
            input[name=btSelectAll], input[name=btSelectItem] {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
    display: none;
}
tr td {
    background-color: white;
}

.alert{
    color: #0089ffa6;
}

.sty{
    font-weight: bold;
    font-family: 'Font Awesome 5 Free';
}
        </style>
    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header');?>        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Monthly Meal Plan</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Set Customer Meta </a></li>
                                  
                                </ol>
                            </div>
                          <h4 class="page-title">Customer By file</h4>
                        </div>
                    </div>
                </div>     
                 
                 <div class="page-content-wrapper">

        <div class="page-content">

            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                   
                  <div class="card-box">
                    <div class="row">
                    <!-- <div class="col-md-6">
                        <h3 class="page-title">
                            Deliveries
                        </h3>
                    </div> -->
                    <div class="col-md-2">
                      <h4 class="page-title">Cutomer Meta</h4>
                    </div>   
                    <!--<div class="col-md-2 form-group">-->
                    <!--    <label for="">Signature </label>-->
                    <!--    <select id="signature" class="form-control" name="signature" required >-->
                    <!--        <option value="">Select</option>-->
                    <!--        <option value="Yes" >Yes</option>-->
                    <!--        <option value="No" >No</option>-->
                    <!--    </select>-->
                    <!--</div>-->

<input type="hidden" name="vendor_id"  value="<?php if(isset($vendor_id)){ 
     $this->session->set_userdata('vendor_id', $vendor_id);
    echo $vendor_id; } ?>" required />
                    <!--<div class="col-md-2 form-group">-->
                    <!--    <label for="">Delivery Date </label>-->
                    <!--    <div style="width: 188px !important;" class="input-group input-medium_ date date-picker" data-date="<?php echo date('d-m-Y', strtotime('+1 day')); ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years">-->
                    <!--        <input type="text" name="delivery_date" id="delivery_date" class="form-control" value="<?php echo date('d-m-Y', strtotime('+1 day')); ?>" placeholder="<?php echo date('d-m-Y', strtotime('+1 day')); ?>" alt="delivery date" title="delivery date" required>-->
                    <!--        <span class="input-group-btn">-->
                    <!--        <button title="delivery date" class="btn default" type="button"><i class="icon-calendar"></i></button>-->
                    <!--        </span>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div id="action_btn" class="col-md-2 form-group" style="padding-top: 27px">
                    <?php if(empty($myerrors)){ ?>
                    
                    <button type="button" style="color: #fff;background-color: #197990 !important;" name="submit" onclick="javascript:validatedata()" class="btn btn-primary" id="customer_upload_btn">Upload Customers</button>
                    <?php }else{ ?>
                 <?php } ?>
                </div>


                    <!-- END PAGE TITLE & BREADCRUMB-->
                  </div>
                  </div>
                </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div id="error_container" class="alert " style="display: none">
                        <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                        <p id="error_msg"></p>
                    </div>
                </div>
                <?php 
                /*
                if($this->session->flashdata("success")){
                    ?>
                     <div class="col-md-12">
                    <div class="alert alert-success">
  <strong>Success!</strong> <?php echo $this->session->flashdata("success"); ?>
</div>
                       
                    
                </div>
                    <?php
                } */
                ?>

                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="card-box">
                        <!-- <div class="portlet-title">
                            <div class="caption"><i class="icon-shopping-cart"></i>Deliveries by file</div>
                        </div> -->
                        
                        <!-- text-nowrap   => for scrol bar-->
                        <div class="portlet-body table-responsive">

                            <table class="table  table-striped table-bordered table-hover" id="customer_table">
                                <thead>
                                <tr>
                                    <th>Sr No</th>
                                    
                                    <th style="min-width:100px;">Basic(Customer ID ,Phone, full name, Email)</th>
                                   
                                    <th>Delivery Details (Area with Emirate,Time Slot) </th>
                                     <th>Default Delivery Address</th>
                                    
                                    <th>Others (Note, Notification)</th>
                                    <!--<th>Plan StartDate</th>-->
                                    <!--<th>Total No.Days</th>-->
                                    
                                    <!--<th>Google Link Address</th>-->
                                    <th style="max-width:20px;">Error Details</th>
                                    <!--<th>Action</th>-->
                                </tr>
                                </thead>
                                <tbody id="deliveries_body">

                                <?php if(count($file_data) > 0){
                                    $this->session->set_userdata("file_data_",$file_data);
                                    // print_r($file_data);
                                    $myerrors = array();
                                    $new_file_data = array();
                                    foreach ($file_data as $key => $info) {
                                        
                                        $name = $info->full_name;
                                        $address = $info->address;
                                        $pickUp = $info->pickUp;
                                        $phone = $info->phone;
                                        $notification = $info->notification;
                                        
                                        
                                        // For json type google link address
                                        
                                         $xtra= json_decode($info->google_link_addrs);
                                         
                                            $google_link_addrs = $xtra->google_link;
                                                                                                                                                                                                                                                                                       
        //                         $customer = $this->customer_model->getSpecificCustomer($vendor_id,$name,$phone,$address, $notification);
        // $temp = (object)array('customer_id' => $customer["customer_id"], 'full_name' => $name, 'phone' => $phone, 'address' => $address, 'pickUp' => $pickUp, 'delivery_time' =>  $order->delivery_time, 'note' => $order->note, 'food_type' => $order->food_type, 'notification' => $order->notification , 'Delivery_Amount'=>$order->Delivery_Amount,'Company_Note'=>$order->Company_Note,'google_link_addrs'=>$order->google_link_addrs);
        //                  
                                                                     ?>
                                    
                                       <!--i cut chunk from here-->
                                     <?php if($info->discard == 0){$class='';}else{$class='danger';} ?>
                                        <tr id="<?php echo $key ?>" class="odd gradeX <?php echo $class; ?>" >
                                            <td  ><?php 
                                            if($info->discard == 0){
                                            echo '<i class="icon-check" style="color:green; font-weight: bold;" title="Accepted"></i>'." ";
                                            
                                            array_push($new_file_data, $info);   
                                            }else{
                                                echo '<i class="fa fa-times-circle" style="color:red; font-weight: bold;" title="Entry Rejected!, Kindy have a look on error details"></i>'." "; 
                                            } 
                                            echo $key+1;
                                            
                                            ?></td>
                                           
                                            
                                            <td><?php echo '<i class="fas fa-id-badge" style="font-size:13px;" title="Customer ID"> '.$info->pcustomer_id.'</i> <br>'.'<i class="fas fa-phone" style="font-size:13px;" title="Phone"> '.$info->phone.'</i><br> <i class="fas fa-user-alt" style="font-size:13px;" title="Full Name"> '.ucfirst($info->full_name).' </i><br><i class="fa fa-envelope" style="font-size:13px;" title="Email"> '.$info->email.'</i>';?></td>
                                            
                                            <td ><div style="width:120px !important;"><?php echo '<i class="fa fa-globe" aria-hidden="true" style="font-size:13px;" title="Area with Emirate"> '.$info->area_name.'</i><br> <i class="fas fa-user-clock" aria-hidden="true" style="font-size:13px;" title="Time-Slot with Emirate"> '.$info->time_slot_with_emirate.'</i>'; ?></td></div>
                                            <td ><div style="min-width:150px !important;font-weight: bold;
    font-family: 'Font Awesome 5 Free';"><?php echo $info->address;?></div></td>
                                            <td><?php echo '<i class="fa fa-comment" aria-hidden="true" style="font-size:13px;" title="Notes"> '.$info->note.'</i> <br> <i class="fa fa-bell" aria-hidden="true" style="font-size:13px;" title="Notification"> '.$info->notification.'</i>';?></td>
                                           
                    <!--                        <td class="sty"><div class="col-md-2 form-group">-->
                    <!--    <label for="">Select(yyyy-mm-dd)</label>-->
                    <!--    <div style="width: 188px !important;" class="input-group input-medium_ date date-picker " data-date="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years">-->
                    <!--       <?php if($info->discard == 0){ ?>-->
                    <!--        <input type="text" name="plan_date[]" id="<?php echo $info->pcustomer_id; ?>" class="form-control all_dates" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" placeholder="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" alt="select plan date (yyyy-mm-dd)" title="select plan date (yyyy-mm-dd)" required>-->
                    <!--        <?php }else{ ?>-->
                    <!--        <input type="text"  id="<?php echo $key; ?>" class="form-control all_dates" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" placeholder="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" alt="select plan date (yyyy-mm-dd)" title="select plan date (yyyy-mm-dd)" required>-->
                           
                    <!--        <?php } ?>-->
                    <!--        <span class="input-group-btn">-->
                    <!--        <button title="plan start date" class="btn default" type="button"><i class="icon-calendar"></i></button>-->
                    <!--        </span>-->
                    <!--    </div>-->
                    <!--</div></td>-->
                                    <!--        <td class="sty">-->
                                    <!--            <div class="col-sm-2">-->
                                    <!--    <label for="">Enter No. Plan Days (Optional)</label>-->
                                    <!--    <div class="input-group" style="width: 100px !important;">-->
                                            <!--required=""-->
                                    <!--        <?php if($info->discard == 0){ ?>-->
                                    <!--        <input  title="Enter Total No. of Plan days. if you ignore this or enter 0 no initial auto plan will creat." name="plan_days[]" class="form-control" placeholder="e.g 7"  id=plan_d_<?php echo $key; ?> oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type="number" maxlength="2" min="0">-->
                                    <!--         <?php }else{ ?>-->
                                    <!--         <input  title="Enter Total No. of Plan days. if you ignore this or enter 0 no initial auto plan will creat."  class="form-control" placeholder="e.g 7"  id=plan_d_<?php echo $key; ?> oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type="number" maxlength="2" min="0">-->
                                            
                                    <!--          <?php } ?>-->
                                             
                                    <!--    </div>-->
                                    <!--</div></td>-->
                                            
                                            
                                            
                                            <td class="sty"> <?php if(count($info->error_details) >0 ){ 
                                                if($info->discard == 0){echo '<ol class="alert">';}else{echo '<ol class="danger">';}
                                                
                                                  foreach($info->error_details AS $issue_ind => $issue_is){
                                                  
                                                      echo '<li>'.$issue_is.'</li>'; ?>
                                                   
                                                   
                                                    <?php
                                                    //   }
                                                      
                                                     } //loop end
                                                     
                                                     
                                                     
                                                      //   if($issue_is =='There already exists an account registered with this phone number.' AND count($info->error_details) ==1 ){
                                                     if( ( (in_array("There already exists an account registered with this phone number.",$info->error_details) ) AND ( in_array("There already exists an account registered with this customer id.",$info->error_details) ) AND count($info->error_details) ==2 ) OR (in_array("There already exists an account registered with this phone number.",$info->error_details) AND count($info->error_details) ==1)  ){
                        
                                                          ?>
                                                          
                                                        <!--<button   onclick="update_custi('<?php echo $info->pcustomer_id ?>','<?php echo $info->phone ?>','<?php echo  $info->full_name ?>','<?php echo  $info->email ?>','<?php echo  $info->area_name ?>','<?php echo  $info->time_slot_with_emirate ?>','<?php echo  $info->address ?>','<?php echo  $info->note ?>','<?php echo  $info->notification ?>','<?php echo  $google_link_addrs ?>','<?php echo  $info->pickUp ?>','<?php echo  $info->mul_add ?>')" class=" btn btn-warning" title="This will update customer with provided information and resolve the error." >Resolve This</button>-->
                                                    
                                                       <button   value='<?php echo json_encode($info) ?>'  class='vote btn btn-warning' title='This will update customer with provided information and resolve the error.' >Resolve This</button>
                                                   <?php }
                                                     
                                                     
                                                 echo '</ol>';
                                                   }else{
                                                       echo 'No Error';
                                                   }
                                            ?></td>
                                            
                                            
                                            <!--<td><?php //echo $google_link_addrs; ?></td>-->
                                            
                                           <!--last 2 tds-->
                                        </tr>
                                    <?php }
                                     
                                     $this->session->set_userdata("deliveries_data",$new_file_data);
                                     
                                     
                                     ?>
                                <?php }else{?>
                                    <tr>
                                        <td colspan="8" align="center" style="color:red;">
                                            No Records Found
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

            <!--Action Buttons-->
            <!--div id="action_btn" class="row" style="display: none_">
                <div class="col-md-5">
                <?php if(empty($myerrors)){ ?>
                    <button type="button" name="submit" onclick="javascript:validatedata()" class="btn btn-primary">Upload Deliveries</button>
                    <?php }else{ ?>
                 <?php } ?>
               </div>
            </div -->
</form>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>   
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
   
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2015 - 2019 &copy; UBold theme by <a href="">Coderthemes</a> 
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

        <!-- Right Sidebar -->
      
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>

        <!-- Init js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js" integrity="sha256-zGo0JbZ5Sn6wU76MyVL0TrUZUq5GLXaFnMQCe/hSwVI=" crossorigin="anonymous"></script>
            <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <!-- Init js -->
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       
    </body>


<script type="text/javascript">
    var global_deliveries_data = [];

    jQuery(document).ready(function() {
        global_deliveries_data = <?php echo ($file_data_js); ?>;

    
        //date_picker();
        var day = new Date();
        console.log(day); // Apr 30 2000
        var nextDay = new Date(day);
        nextDay.setDate(day.getDate() + 1);
        // today.getMonth()+1;
        var nextM = new Date(day);
        nextM.setMonth(day.getMonth() + 3);
        console.log(nextM);
        
        $(".all_dates").flatpickr({
          format: 'DD-MM-YYYY',
          minDate: nextDay,
          maxDate:nextM
          
          
        });

    });

    function date_picker() {
        var date = new Date();
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                startDate : new Date(date.getFullYear(), date.getMonth(), date.getDate()),
                //  endDate : new Date(date.getFullYear(), date.getMonth(), date.getDate()),
                rtl: App.isRTL(),
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    function remove_number(removeItem){

//        global_customer_data = jQuery.grep(global_customer_data, function(i, value) {
//            return value.phone != '+'+removeItem;
//        });

        for (var n=0; n < global_customer_data.length; n++) {
            if (global_customer_data[n].phone === removeItem) {
                global_customer_data.splice(n,1);
                break;
            }
        }
    }

 function validatedata(){
      
        // var el= "$('#customer_upload_btn')";
        $('button').prop('disabled', true);
       $('#customer_upload_btn').prop('disabled', true);
      $('#customer_upload_btn').html('<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading');
        
        var signature = $("select#signature option:selected").val();
        var delivery_date = $("#delivery_date").val();
        
        var im_check=0;
        <?php $deliveries_cust =  $this->session->userdata("deliveries_data"); 
          
          if($deliveries_cust){ ?>
          im_check=1;
          <?php }else{ ?>
          im_check=0;
          <?php } ?>
        
        if(im_check){
          save_deliveries();
        }else{
            swal.fire('', 'You Can not Upload These Customers. Kindly have a look on Error Details.', 'error');
            
            return false;
        }

    }

    function save_deliveries(){
    
    
       console.log($("input[name='plan_date[]']"));
       
       
        // var plandate = $("input[name='plan_date[]']")
        //       .map(function(){return $(this).val();}).get();
              
            //   console.log(plandate);
            //   for(var i=0;i<plandate.length;i++){
            //     console.log('i am plan date'+plandate[i]);
            //   }
              
        //  var plan_days = $("input[name='plan_days[]']")
        //       .map(function(){return $(this).val();}).get();
            //   console.log(plan_days);
            //  for(var j=0;j<plan_days.length;j++){
            //     console.log('i am plan days'+plan_days[j]);
            //   } 
              
      //  var type_id = $("select#delivery_type option:selected").val();
        var signature = 'No'
        var delivery_date = new Date();
        if( delivery_date && signature){
            
            var url = "<?php echo base_url(); ?>"+"order/save_customer_and_init_plan";
           
            // save_order_del,save_file_deliveries
            // ,'plandate':plandate,'plan_days':plan_days
            $fields = {'delivery_date':delivery_date, 'signature':signature};
            $.post(url, $fields, function(response){
                
                console.log('i am resp:'+response);
                // el.disabled = false;
                // el.innerHTML = 'Upload Customers';
                 $('button').prop('disabled', false);
                $('#customer_upload_btn').prop('disabled', false);
                $('#customer_upload_btn').html('Upload Customers');
                
                if(response.success){
                    
                    global_deliveries_data = [];
                    $("#deliveries_body").empty();
                    $("#action_btn").hide();
                    
                    if(response.exceptions !=""){
                        swal.fire("", "Data has been Saved else :"+response.exceptions, "success");
                    }else{

                    swal.fire("", "Data has been Saved", "success");
                       
                    }
                    //send notification
                    if('vendor_id' in response)
                    {
                        send_bags_dels_noti({noti_to: response.vendor_id, by_name: logged_user.name, by_type: logged_user.role == 'admin' ? 'admin' : 'general', 'product': 'order'});
                    }
                }else{
                    console.log('i am else');
                }
            },'json');
        }else{
          swal.fire("", "Signature, Vendor, Delivery date & Deliveries all are required", "error");
        }

    }


    function show_msg(msg, class_){
        $("#error_container").removeClass('alert-success');
        $("#error_container").removeClass('alert-danger');
        $("#error_msg").html(msg);
        $("#error_container").addClass(class_);
        $("#error_container").show();
    }

    function hide_error(){
        $("#error_msg").html('');
        $("#error_container").hide();
    }

    function update_custo(elem)
    {
      $elem = $(elem);
      $oldForm = $elem.parent();
      $newForm = $elem.parent().parent().parent().find(".new_form");

      $oldForm.find("input[type='text']:eq(0)").val($newForm.find("input[type='text']:eq(0)").val());
      $oldForm.find("input[type='text']:eq(1)").val($newForm.find("input[type='text']:eq(1)").val());
      $oldForm.find("textarea").val($newForm.find("textarea").val());

      setTimeout(function(){
        $oldForm.submit();
      }, 500);
    }
    
    
    
    // function update_custi(pcustomer_id,phone,full_name,email,area_name,time_slot_with_emirate,address,note,notification,google_link_addrs,pickUp,muladd){
    function update_custi(info){
    
    console.log(info);
    die();
    console.log(pcustomer_id,phone,full_name,email,area_name,time_slot_with_emirate,address,note,notification,google_link_addrs,pickUp);
    
    // var formDatax=('pcustomer_id',pcustomer_id);
    
//     var request = $.ajax({
//   url: "<?php echo base_url('vendor/update_logo_imgsXYZUX') ?>",
//   type: "POST",
//   data: {pcustomer_id : pcustomer_id},
//   dataType: "html"
// });

// die();

// if(pcustomer_id ==''){
//     var first2=$("input[name='vendor_id']").val().substring(0, 2).toUpperCase();
    
//   pcustomer_id=first2+'-'+Math.random().toString(36).substr(2, 5);
// }


var vend=$("input[name='vendor_id']").val();
      $.ajax({
            type: 'post',
          
            url: "<?php echo base_url('order/update_customer_for_mealplan') ?>",
            data: {pcustomer_id : pcustomer_id ,phone:phone, full_name:full_name, area_name:area_name, time_slot_with_emirate:time_slot_with_emirate,address:address,note:note,notification:notification,google_link_addrs:google_link_addrs,pickUp:pickUp,vendor_id:vend,mul_address:muladd },
            
           dataType: "html",

            success: function (data){
                // alert(data);
              console.log(data);
                  var jsn_data=   JSON.parse(data);
                //   alert(jsn_data.success);
                   if(jsn_data.success ==true){   
                       swal({
                             title: "Updated!",
                             text: "Updated Successfully.",
                             type: "success",
                            showConfirmButton: false,
                              timer: 9500
                             });
                             
                                // alert('when success:'+jsn_data.image_path);
                                // alert('a text was:'+$('#'+frmid+'>a').text());
                                $('#'+frmid+'>a').text('Available');
                                $('#'+frmid+'>a').attr('href', jsn_data.image_path);
                                $('#'+frmid+'>a').attr('style', 'color: green;');
                                $('#'+frmid+'>a').attr('target', '_blank');
                                
                                
                                
                   }else{
                         swal.fire("OOPs The file type you are trying to upload is not allowed. Try Again!","","error");
                   }       
                             
                          
                            //  alert('when false: '+jsn_data.['image_path']);
            },
            
        error: function(){
          swal.fire("OOPs Network Problem. Try Again after some time!","","error");
          
        //   alert('when false: '+data['image_path']);
        }    
            
                //           if(response.success){
                    
                //       console.log(response);
                   
                //   swal({
                //              title: "Updated!",
                //              text: "Updated Successfully.",
                //              type: "success",
                //             showConfirmButton: false,
                //               timer: 1500
                //              });
    
                    
                 
                    
                //   }else{
                //     swal.fire("Network Problem! Try again.","","error");
                //     console.log('NOOOO');
                // }
            
            
          });

    
    }
    
    
    $(".vote").click(function(){
     var val_is = $(this).attr('value');
     
                        //  $(this).prop('disabled', true);
                        //      $(this).text('Resolved');
                             
                             var tr_id=$(this).closest('tr').attr('id');
                           
                             $only_thi=$(this).closest('tr');
                             $only_thi.removeClass("danger");
                             
                              $only_thi.find("td").eq(5).find("button").prop('disabled', true);
                             $only_thi.find("td").eq(5).find("button").html('<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading');
                            
                           
                            //   $only_thi.find("td").eq(5).html('<span style="color:#ebeb07; font-weight: bold; font-size: large" >RESOLVED</span>');
                            
                            
                            //  alert(tr_id);
     
    //  console.log(val_is);
    //  alert(val_is);
    //  die();
     
      $.ajax({
            type: 'post',
          
            url: "<?php echo base_url('order/update_customer_for_mealplan') ?>",
            data: {info:val_is },
            
          dataType: "html",

            success: function (data){
                // alert(data);
              console.log(data);
                  var jsn_data=   JSON.parse(data);
                //   alert(jsn_data.success);
                  if(jsn_data.success ==true){   
                      swal({
                             title: "Updated!",
                             text: "Customer Updated Successfully.",
                             type: "success",
                            showConfirmButton: false,
                              timer: 1500
                             });
                             
                              $only_thi.css({ 'color': '#f7b84b' });
                             $only_thi.find("td").eq(0).html('<i class="icon-check" style="color:#f7b84b; font-weight: bold; font-size: xx-large" title="Resolved And Accepted"></i>');
                            
                             $only_thi.find("td").eq(5).find("button").html('<span style="color:#ebeb07; font-weight: bold; font-size: large" >RESOLVED</span>');
                            
                           
                  }else{
                         swal.fire("OOPs Network Error. Try Again!","","error");
                  }       
                             
                          
                            //  alert('when false: '+jsn_data.['image_path']);
            },
            
        error: function(){
          swal.fire("OOPs Network Problem. Try Again after some time!","","error");
          
        //   alert('when false: '+data['image_path']);
        }    
            
                //           if(response.success){
                    
                //       console.log(response);
                   
                //   swal({
                //              title: "Updated!",
                //              text: "Updated Successfully.",
                //              type: "success",
                //             showConfirmButton: false,
                //               timer: 1500
                //              });
    
                    
                 
                    
                //   }else{
                //     swal.fire("Network Problem! Try again.","","error");
                //     console.log('NOOOO');
                // }
            
            
          });
});
    
   


</script>

<style type="text/css">
  .danger{
    color: red !important;
  }
</style>
</html>