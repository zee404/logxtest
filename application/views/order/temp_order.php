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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Oprations</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Deliveries </a></li>
                                  
                                </ol>
                            </div>
                          <h4 class="page-title">Deliveries by file</h4>
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
                      <h4 class="page-title">Deliveries</h4>
                    </div>   
                    <div class="col-md-2 form-group">
                        <label for="">Signature </label>
                        <select id="signature" class="form-control" name="signature" required >
                            <option value="">Select</option>
                            <option value="Yes" >Yes</option>
                            <option value="No" >No</option>
                        </select>
                    </div>

<input type="hidden" name="vendor_id"  value="<?php if(isset($vendor_id)){ 
     $this->session->set_userdata('vendor_id', $vendor_id);
    echo $vendor_id; } ?>" required />
                    <div class="col-md-2 form-group">
                        <label for="">Delivery Date </label>
                        <div style="width: 188px !important;" class="input-group input-medium_ date date-picker" data-date="<?php echo date('d-m-Y', strtotime('+1 day')); ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" name="delivery_date" id="delivery_date" class="form-control" value="<?php echo date('d-m-Y', strtotime('+1 day')); ?>" placeholder="<?php echo date('d-m-Y', strtotime('+1 day')); ?>" alt="delivery date" title="delivery date" required>
                            <span class="input-group-btn">
                            <button title="delivery date" class="btn default" type="button"><i class="icon-calendar"></i></button>
                            </span>
                        </div>
                    </div>

                    <div id="action_btn" class="col-md-2 form-group" style="padding-top: 27px">
                    <?php if(empty($myerrors)){ ?>
                    
                    <button type="button" style="color: #fff;background-color: #197990 !important;" name="submit" onclick="javascript:validatedata()" class="btn btn-primary">Upload Deliveries</button>
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
                        <div class="portlet-body table-responsive text-nowrap">

                            <table class="table  table-striped table-bordered table-hover" id="customer_table">
                                <thead>
                                <tr>
                                    <th>Sr No</th>
                                   
                                    <th>Phone</th>
                                    <th>Full Name</th>
                                    <th style="min-width:100px;">Address</th>
                                    <th>PickUp Point</th>
                                    <th>Delivery Time</th>
                                    <th>Note</th>
                                    <th>Notification</th>
                                    
                                    <th>Food Type</th>
                                    <th>Payment</th>
                                    <th>CompanyID / Unique Id</th>
                                    <!--<th>Google Link Address</th>-->
                                    <th>Error</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="deliveries_body">

                                <?php if(count($file_data) > 0){
                                    $this->session->set_userdata("file_data_",$file_data);
                                    // print_r($file_data);
                                    $myerrors = array();
                                    $new_file_data = array();
                                    foreach ($file_data as $key => $order) {
                                        
                                        $name = $order->full_name;
                                        $address = $order->address;
                                        $pickUp = $order->pickUp;
                                        $phone = $order->phone;
                                        $notification = $order->notification;
                                        
                                        
                                        // For json type google link address
                                        
                                         $xtra= json_decode($order->google_link_addrs);
                                         
                                            $google_link_addrs = $xtra->google_link;
                                                                                                                                                                                                                                                                                       
                                $customer = $this->customer_model->getSpecificCustomer($vendor_id,$name,$phone,$address, $notification);
        $temp = (object)array('customer_id' => $customer["customer_id"], 'full_name' => $name, 'phone' => $phone, 'address' => $address, 'pickUp' => $pickUp, 'delivery_time' =>  $order->delivery_time, 'note' => $order->note, 'food_type' => $order->food_type, 'notification' => $order->notification , 'Delivery_Amount'=>$order->Delivery_Amount,'Company_Note'=>$order->Company_Note,'google_link_addrs'=>$order->google_link_addrs);
                        array_push($new_file_data, $temp);    
                                                                     ?>
                                    
                                        <?php 
                                        // new logic start from here for customer validation
                                        $is_correct = 0;
                                        
                                        
                                        
                                        
                                                                                                                                                                                                                                                
                                        $class=''; 
                                        if($customer["customer_id"] == 0 or $customer["error"]!=0){
                                            $class = 'danger';
                                        $is_correct = 1;
                                         array_push($myerrors,ucfirst($order->full_name)); 
                                        } 
                                         $number = $order->phone;
                                         $address = trim(str_replace(' ', '',$order->address));
                                         $time = trim(str_replace(' ', '',$order->delivery_time));
                                         $color = 'black';
                     if ($number!="" and (strpos($number, 'E') !== false or strpos($number, '.') !== false)) {
                            $color = 'red';
                            array_push($myerrors,ucfirst($order->full_name)); 
                            $is_correct=1;
                            $class = 'danger';
               
                        }else{
                           $color = 'black';
                        }
                        if($number!="" and (strlen($number)!=12 or preg_match("/[a-z]/i", $number))){
                            $color = 'red';
                             array_push($myerrors,ucfirst($order->full_name)); 
                             $is_correct=1;
                             $class = 'danger';
                          
                        }
                        if($address=="" or $time==""){
                            $is_correct=1;
                            array_push($myerrors,ucfirst($order->full_name)); 
                            $class = 'danger';
                        }
                                        ?>
                                        <tr class="odd gradeX <?php echo $class; ?>" >
                                            <td ><?php 
                                            if($is_correct==0){
                                            echo '<i class="icon-check" style="color:green"></i>'." ";
                                            }else{
                                                echo '<i class="icon-remove-circle" style="color:red"></i>'." "; 
                                            } 
                                            echo $key+1;
                                            
                                            ?></td>
                                           
                                            <td><?php 
                                            
                                            echo $number; ?></td>
                                            <td><?php echo ucfirst($order->full_name);?></td>
                                            <td ><?php echo $order->address;?></td>
                                            <td><?php echo $order->pickUp;?></td>
                                            <td><?php echo $order->delivery_time;?></td>
                                            <td><?php echo $order->note;?></td>
                                            <td><?php echo $order->notification; ?></td>
                                            <td><?php echo $order->food_type; ?></td>
                                            <td><?php echo $order->Delivery_Amount; ?></td>
                                            <td><?php echo $order->Company_Note; ?></td>
                                            
                                            <!--<td><?php //echo $google_link_addrs; ?></td>-->
                                            
                                            <td><?php echo $customer["error_detail"];?></td>
                                            <td>
                                            <?php if($customer["error"] !=0 ){ ?>
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $customer['customer_id']; ?>" style="color: #fff;background-color: #197990 !important;">
  Details
</button>
<div class="modal fade" id="myModal<?php echo $customer['customer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $customer['customer_id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title" id="myModalLabel<?php echo $customer['customer_id']; ?>">Customer Details </h4>
      </div>
      <div class="modal-body">
      <div class="row">
      
      <div class="col-md-6">
      <h5>Customer Info (Previous)</h5>
      <form action="<?php  echo base_url('customer/updateInfo/').$customer['customer_id']; ?>" method="post" class="prev_from">

  <div class="form-group">
    <label for="name" style="color: <?php echo $customer['full_name'] != $order->full_name ? 'red !important' : 'black !important'; ?>">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $customer['full_name']; ?>" name="full_name" />
  </div>
  <div class="form-group">
    <label for="phone" style="color: <?php echo $customer['phone'] != $order->phone ? 'red !important' : 'black !important'; ?>">Phone</label>
    <input type="text" class="form-control" id="phone" placeholder="971555502260" name="phone" value="<?php echo $customer['phone']; ?>" />
  </div>
  <div class="form-group">
    <label for="phone" style="color: <?php echo $customer['address'] != $order->address ? 'red !important' : 'black !important'; ?>">Address</label>
    <textarea id="address" name="address" class="form-control"><?php echo $customer["address"]; ?></textarea>
  </div>
 
  <button type="button" onclick="update_custo(this)" class="btn btn-primary" style="color: #fff;background-color: #197990 !important;">Update Info</button>

</form>
      </div>
      <div class="col-md-6">
      <h5>Customer Info (New)</h5>
      <form action="<?php echo base_url('customer/createCustomer/').$vendor_id; ?>" method="post" class="new_form">
      
  <div class="form-group">
    <label for="name" style="color: <?php echo $customer['full_name'] != $order->full_name ? 'red !important' : 'black !important'; ?>">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $order->full_name; ?>" name="full_name">
  </div>
  <div class="form-group">
    <label for="phone" style="color: <?php echo $customer['phone'] != $order->phone ? 'red !important' : 'black !important'; ?>">Phone</label>
    <input type="text" class="form-control" id="phone" placeholder="971555502260" name="phone" value="<?php echo $number; ?>">
  </div>
  <div class="form-group">
    <label for="phone" style="color: <?php echo $customer['address'] != $order->address ? 'red !important' : 'black !important'; ?>">Address</label>
    <textarea id="address" name="address" class="form-control"><?php echo $order->address; ?></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary" style="color: #fff;background-color: #197990 !important;">Create New</button>
</form>
      </div>
      
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<?php } ?>
</td>
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
        $("#delivery_date").flatpickr({
          format: 'DD-MM-YYYY'
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
     
     
        var signature = $("select#signature option:selected").val();
        var delivery_date = $("#delivery_date").val();
        if(delivery_date && signature){
          save_deliveries();
        }else{
            swal.fire('', 'Signature, Delivery date & Deliveries all are required.', 'error');
            
            return false;
        }

    }

    function save_deliveries(){
    
      //  var type_id = $("select#delivery_type option:selected").val();
        var signature = $("select#signature option:selected").val();
        var delivery_date = $("#delivery_date").val();
        if( delivery_date && signature){
            
            var url = "<?php echo base_url(); ?>"+"order/save_order_del";
           
            // save_order_del,save_file_deliveries
            $fields = {'delivery_date':delivery_date, 'signature':signature};
            $.post(url, $fields, function(response){
                
                console.log('i am resp:'+response);
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


</script>

<style type="text/css">
  .danger{
    color: red !important;
  }
</style>
</html>