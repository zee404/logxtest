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
        <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css"/>
         <link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
          <link href="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <!--  -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()?>assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()?>assets/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
      
        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
       <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
            .btn-danger {
                color: #fff;
                background-color: #197990 !important;
                 border-color: white;
            }
           table, th, td {
 border: 1px solid;
  border-color: #dee2e6;
}
            .badge {
                color: #72747b;
                font-size: 10.5px !important;
            }
            /*div.dataTables_wrapper div.dataTables_filter {
                text-align: right;
                margin-left: 800px;
            }*/
            .portlet.box.blue {
                border: 1px solid white;
                border-top: 0;
            }
            .btn-group{
                margin-top: -10px;
                margin-bottom: 10px;

            }
            div.dataTables_wrapper div.dataTables_filter {
                text-align: right;
                margin-top: -32px;
            }
            .table-striped tbody tr:nth-of-type(odd) {
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
                    <div class="col-md-4">
                        <div class="page-title-box">
                            <h4 class="page-title">Tracking Details</h4>
                        </div>
                    </div>
                    <div class="col-md-8">
                         <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Bag Tracking</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tracking Details</a></li>
                                  
                                </ol>
                            </div>
                             <!--<h4 class="page-title">Tracking Details</h4> -->
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="width: 101% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                           
                    <div class="row">
                       
                     
                       
                  
                     <div class="col-lg-4">
                            <div class="input-group input-large  input-daterange" data-date="<?= date('Y-m-d'); ?>" data-date-format="dd-mm-yyyy">
                            <input type="text" class="form-control" name="from" id="from_date" value="<?php  echo $from; ?>" disabled>
                            <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" name="to" id="to_date" value="<?php  echo $to; ?>" disabled>
                            </div>
                    </div>
                    
                   <div class="col-lg-2">
                        <!--<div class="btn-group">-->
                        <!--<button type="button" onclick="get_reports(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>-->
                        <!--</div>-->
                                  

                    </div>
              
                    
                </div> 
               
                </div>
                       
            </div>
                <div class="card-box" style="width: 100% !important;margin-left: 10px;">  
                   
               
                         <input type="hidden" name="total_rec" id="total_rec" >
                          <div class="table table-responsive">
                        <table class="table" id="order_table">
                                <thead>
                                <tr style="background-color: #f1f5f7">
                                    
                                    <th>OrderID</th>
                                    <th >Bag Type</th>
                                    <th >Bag Status</th>
                                    <th >Bag Delivered Customer Detail</th>
                                    <th>Vendor</th>
                                    
                                    
                                    <th>Vendor Attached Qr</th>
                                    <th>Vendor Attached Qr Date</th>
                                    <th>Driver Scan Qr from warehouse</th>
                                    <th>Driver Scan Qr Date</th>
                                    <th>Driver double varification(during delivery)</th>
                                    
                                    <th>Delivery date</th> 
                                    <th>Delivered at</th> 
                                    <th >Delivered By(Driver)</th>
                                    
                                    
                                    <th>Total Bags received by driver</th>
                                    <th>Total Ice packs received by driver</th>
                                    <th>Received bags Qr</th>
                                    
                                    
                                    <th>Own Bag picked from</th>
                                    <th>Own Bag picked by ID</th>
                                    <th>Own Bag picked by driver</th>
                                    <th>Own Bag picked at </th>
                                    <th>Own Bag picked Customer Details</th>
                                    
                                    
                                    <th>Own Bag Storekeeper Varification</th>
                                    <th>Own Bag Storekeeper Varified by</th>
                                    <th>Own Bag Storekeeper Varification Date</th>
                                    <th>Own Bag Neutral Varification</th>
                                    <th>Own Bag Neutral by Vendor</th>
                                    <th>Own Bag Neutral Date</th>
                                    
                                   
                                    <!--<th>Action</th>-->
                                  
                                </tr>
                                </thead>
                                <tbody id="table_body">

                                <?php if ($orders['result']){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                        <tr >
                                          
                                            <td style="min-width: 5px;"><?php echo $order->order_id;?></td>
                                              
                                              <?php if($order->cooling_bag_check ==0){
                                                  echo '<td style="min-width: 100px;">Paper</td>';
                                              }else if($order->cooling_bag_check ==1){
                                                   echo '<td style="min-width: 100px;">Cooling Bag</td>';
                                              }else if($order->cooling_bag_check ==2){
                                                    echo '<td style="min-width: 100px;">Unknown</td>';
                                              } ?>
                                            <td style="min-width: 100px;"><?php echo $order->status; ?></td>
                                            
                                            <td style="min-width: 250px; align:center;"><?php echo $order->name_on_delivery.'<br>'.$order->number_on_delivery.'<br>'.$order->delivery_address; ?></td>
                                            <td style="min-width: 150px; align:center;"><?php echo $order->vendor.'<br>'.$order->vendorPhone; ?></td>
                                             <?php if($order->bag_qr !=''){
                                              echo '<td style="min-width: 150px;">'.$order->bag_qr.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">None</td>';
                                              } ?>
                                              
                                              
                                               <?php if($order->qr_attached_dt_vendor !=''){
                                              echo '<td style="min-width: 100px;">'.$order->qr_attached_dt_vendor.'</td>';
                                              }else{
                                              echo '<td style="min-width: 100px;">None</td>';
                                              } ?>
                                              
                                              <?php if($order->driver_warehouse_scanning !=''){
                                              echo '<td style="min-width: 150px;">'.$order->driver_warehouse_scanning.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">No</td>';
                                              } ?>
                                              
                                              <?php if($order->driver_scanning_dt !=''){
                                              echo '<td style="min-width: 100px;">'.$order->driver_scanning_dt.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">None</td>';
                                              } ?>
                                              
                                              <!--Double verification-->
                                               <?php if($order->driver_verify_bag !=''){
                                              echo '<td style="min-width: 150px;"> yes <br>'.$order->driver_verify_bag.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">no</td>';
                                              } ?>
                                              
                                              <td style="min-width: 150px;"><?php echo $order->delivery_date;?></td>
                                              <td style="min-width: 150px;"><?php echo $order->delivered_date;?></td>
                                              
                                             
                                              
                                               <?php if($order->delivered_status ==1){
                                              echo '<td style="min-width: 150px;">'.$order->driver_who_deliver.'<br>'.$order->driver_deliverPhone.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">None</td>';
                                              } ?>
                                              
                                              <?php if($order->total_bag_recv_by_driver !=0){
                                              echo '<td style="min-width: 50px;">'.$order->total_bag_recv_by_driver.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">'.$order->total_bag_recv_by_driver.'</td>';
                                              } ?>
                                              
                                              <?php if($order->tot_ice_pack_received !=0){
                                              echo '<td style="min-width: 50px;">'.$order->tot_ice_pack_received.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">'.$order->tot_ice_pack_received.'</td>';
                                              } ?>
                                              
                                              
                                              <?php if($order->bag_received_qr !=''){
                                              echo '<td style="min-width: 150px;">'.$order->bag_received_qr.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">None</td>';
                                              } ?>
                                              
                                              <?php if($order->own_bag_rcv_order_id !=0 AND $order->status =='Collected'){
                                              echo '<td style="min-width: 150px;">Delivery</td>';
                                              echo '<td style="min-width: 50px;">'.$order->own_bag_rcv_order_id.'</td>';
                                              echo '<td style="min-width: 150px;aligne:center;">'.$order->driver_who_recv.'<br>'.$order->driver_recvPhone.'</td>';
                                              echo '<td style="min-width: 150px;">'.$order->own_bag_rcv_by_dt.'</td>';
                                              echo '<td style="min-width: 250px;aligne:center;">'.$order->customer_recv.'<br>'.$order->customer_recv_Phone.'<br>'.$order->customer_recv_address.'</td>';
                                                  
                                              }else if($order->own_bag_rcv_bag_collection_id !=0 AND $order->status =='Collected'){
                                              echo '<td style="min-width: 150px;">Bags Collection</td>';
                                              echo '<td style="min-width: 50px;">'.$order->own_bag_rcv_bag_collection_id.'</td>';
                                              echo '<td style="min-width: 150px;align:center;">'.$order->bag_driver_name.'<br>'.$order->bag_driver_phone.'</td>';
                                              echo '<td style="min-width: 150px;">'.$order->own_bag_rcv_by_dt.'</td>';
                                              echo '<td style="min-width: 250px;aligne:center;">'.$order->bag_customer_rcv.'<br>'.$order->bag_phn_rcv.'<br>'.$order->bag_rcv_address.'</td>';
                                                  
                                              
                                              }else{
                                              echo '<td style="min-width: 50px;">None</td>';
                                              echo '<td style="min-width: 50px;">0</td>';
                                              echo '<td style="min-width: 50px;">None</td>';
                                              echo '<td style="min-width: 50px;">None</td>';
                                              echo '<td style="min-width: 50px;">None</td>';
                                              
                                              } ?>
                                              
                                             <td style="min-width: 50px;"><?php echo $order->str_keep_varification; ?></td>
                                              <?php if($order->str_keepr_name !=NULL){
                                              echo '<td style="min-width: 150px;">'.$order->str_keepr_name.'<br>'.$order->str_keeper_Phone.'</td>';
                                              echo '<td style="min-width: 150px;">'.$order->varified_at.'</td>';
                                              }else{
                                              echo '<td style="min-width: 50px;">None</td>';
                                              echo '<td style="min-width: 50px;">None</td>';
                                              } ?>
                                              
                                              
                                              <?php if($order->is_neutral ==1){
                                                   echo '<td style="min-width: 50px;">yes</td>';
                                              echo '<td style="min-width: 150px;">'.$order->neutral_name.'<br>'.$order->neutral_Phone.'</td>';
                                              echo '<td style="min-width: 150px;">'.$order->neutral_at.'</td>';
                                              }else{
                                                  echo '<td style="width: 10%;">no</td>';
                                              echo '<td style="min-width: 50px;">None</td>';
                                              echo '<td style="min-width: 50px;">None</td>';
                                              } ?>
                                           

                                            <!--<td style="min-width: 50px;">Action</td>-->
                                            

                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

   <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" style="width: 500px">
                    <div class="modal-content" style="width: 120% !important;">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add Bags Collection</h4>
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="add_vendor_form"action="<?php echo base_url('vendor/save_vendor') ?>" method="post" class="horizontal-form" >
                                    <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">

                                    <div class="row">
                                         <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Module</label>
                                            <select  class="form-control" required="required" name="modules" id="modules_partner">
                                               <option>Dashboard</option>
                                                <option>Vendors</option>
                                                <option>Store Keepers</option>
                                                <option>Drivers</option>
                                                <option>Customers</option>
                                                <option>Deliveries</option>
                                                <option>QR Codes</option>
                                                <option>Bags Tracking</option>
                                                <option>Bags Collection</option>
                                                <option>Reports</option>
                                                <option>Extra Bags</option>
                                                <option>Settings</option>
                                                <option>Employees</option>
                                            </select>
                                            <input type="hidden" name="role_name" id="role_name">
                                        </div></div>
                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Full Name</label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Email<span class="required">*</span></label>
                                                <input type="text" name="email" id="email" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Phone<span class="required">*</span></label>
                                                <input type="text" name="phone" placeholder="971-123456789" id="phone" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Address</label>
                                                <input type="text" name="address" id="address" class="form-control">
                                            </div>
                                        </div>
                                        
                                       

                                    </div>

                               
                            </div>

                        </div>

                        <div class="modal-footer">
                             <button id="save_vendor_btn" type="submit" style="background: black;color: white;" class="btn green">Save</button>
                             <button id="edit_vendor_btn" style="display: none" onclick="update_vendor()" type="button" class="btn green updatebtn" style="background: black;color: white;">Update</button>
                            <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>

                           
                        </div>
                         </form>
                    </div>
                </div>
            </div>
      
       
                 <div id="custom-modals" class="modal-demo" style="padding: 35px;">
                        <blockquote class="hero">
                            <p> Click <a href="<?php echo base_url(); ?>download/BagCSVFormat.csv">HERE</a> to Download final Bag Collection CSV File Format!</p>
                        </blockquote>
                        <ul class="list-unstyled  margin-top-10 margin-bottom-10">
                            <li><i class="icon-ok"></i> Customer Full Name ( Optional: Max. 90 characters )</li>
                            <li><i class="icon-ok"></i> Customer Phone ( Required: Max. 12 characters with country code )</li>
                            <li><i class="icon-ok"></i> Customer Email ( Optional )</li>
                            <li><i class="icon-ok"></i> Bag Picked Address ( Required )</li>
                            <li><i class="icon-ok"></i> No of bags ( Required ) </li>
                        </ul>
                </div> 
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

       <!--shan-->
        <script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/vendor.min.js') ?>"></script>
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
       
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

          <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.responsive.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js" integrity="sha256-zGo0JbZ5Sn6wU76MyVL0TrUZUq5GLXaFnMQCe/hSwVI=" crossorigin="anonymous"></script>
       <script type="text/javascript">
        // $("#from_date").flatpickr({
        //     defaultDate: new Date(),
        //     onChange: function(sd, ds, ins){
        //         $("#to_date").flatpickr({
        //             defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
        //             minDate: ds,
        //         });
        //     }
        // });
    var global_order_ids = [];
    var assign_table;
    jQuery(document).ready(function(){
        
        var link_id = 'bagsTracking';
        //App.side_Menu(link_id);
        init_table();
        date_picker();

        $("#head_check").click(function(){
            if($("#head_check").prop('checked') == true){
                check_all();
            }else{
                un_check_all();
            }
        });

        $('input.checkboxes').click(function() {
            var number = this.value;
            if($(this).is(':checked')){
                add_id(number);
            }else{
                remove_id(number);
            }
        });

    });

    function date_picker() {
        var date = new Date();
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
              //  rtl: App.isRTL(),
                autoclose: true,
                dateFormat: 'yy-mm-dd',
                //endDate : new Date(date.getFullYear(), date.getMonth(), date.getDate())
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    function remove_id(removeItem){
        $("#action_btn").hide();
        global_order_ids.splice( $.inArray(removeItem, global_order_ids), 1 );

        if(global_order_ids.length > 0){
            $("#action_btn").show();
        }
    }

    function add_id(addItem){
        global_order_ids.push(addItem);

        if(global_order_ids.length > 0){
            $("#action_btn").show();
        }
    }

    function check_all(){
        var ele = $("input.checkboxes");
        ele.prop('checked', true);
        var parent = ele.parent('span');
        parent.addClass('checked');
        var inputs = $(".checkboxes");
        for(var i = 0; i < inputs.length; i++){
            var  id = $(inputs[i]).val();

            //check code already exist in array or not
            //if exist then no need to add in array
            if(jQuery.inArray(id, global_order_ids) == -1){
                global_order_ids.push(id);
            }
        }

        if(global_order_ids.length > 0){
            $("#action_btn").show();
        }
    }

    function un_check_all(){
        global_order_ids = [];
        var ele = $("input.checkboxes");
        ele.prop('checked', false);
        var parent = ele.parent('span');
        parent.removeClass('checked');
            $("#action_btn").hide();
    }

    function un_assign_drivers(){
        if(global_order_ids.length > 0 ){
            var url = "<?php echo base_url(); ?>"+"order/un_assign_drivers";
            $fields = {'order_ids':global_order_ids};
            $.post(url, $fields, function(response){
                if(response.success){
                    global_order_ids = [];
                    location.reload();
                }
            },'json');

            var msg = '<strong>Success!</strong> Data has saved.';
            show_msg(msg, 'alert-success');
        }else{
            var error = '<strong>Error!</strong>No Delivery selected.';
            show_msg(error, 'alert-danger');
        }

    }
    
    //GENERAL METHODS
    function init_table(){
        assign_table = $('#order_table').dataTable({
            dom: 'Blifrtip',
                    buttons: [
           
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
            ],
            "lengthMenu": [[ 10, 25, 50, 75, 100,-1], [ 10, 25, 50, 75, 100,"All"]]
        });
        
$('input.checkboxes').click(function() {
            var number = this.value;
            if($(this).is(':checked')){
                add_id(number);
            }else{
                remove_id(number);
            }
        });
    //assign_table.rows().invalidate().draw();
    }

    function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
    }

    function order_detail(ele){
        $("#v_data").hide();
        $("#loading").show();
        var order_id = $(ele).attr('pk');
        get_order_by_id(order_id);
    }

    //ORDER METHODS
    function get_order_by_id(id){
        //hide_error();

        var url = "<?php echo base_url(); ?>"+"order/get_order_by_id";
        $fields = {'order_id':id};
        $.post(url, $fields, function(response){
            if(response.success){
                var details = response.detail;
                var order_summery_detail = set_order_summery(details);
                $("#v_summery_data").empty();
                $("#v_summery_data").append(order_summery_detail);
                //$("#v_data").show();
                $("#loading").hide();
            }
        },'json');
    }

    function set_order_summery(summery_details){

        var summery = summery_details[0];

        //set order status
        $("#mod_title").html('Delivery Details '+Custom.get_order_status(parseInt(summery.status)));

        var img_url = "<?php echo base_url(); ?>"+"upload/"+summery.delivery_img;
        var  summery_data = '<div class="note note-info">';
        summery_data += '<h4 class="block">Delivery Details</h4>';

        summery_data += '<div class="row">';
        summery_data += '<div class="col-md-4">';
        summery_data += '<img src="'+img_url+'" width="100%">';
        summery_data += '</div>';
        summery_data += '<div class="col-md-8">';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>ID : </strong>'+summery.delivery_id+'</li>';
        summery_data += '<li><strong>Status : </strong>'+summery.status+'</li>';
        summery_data += '<li><strong>PU number : </strong>'+summery.pu_number+'</li>';
        summery_data += '<li><strong>Bags Received : </strong>'+summery.bag_received+'</li>';
        summery_data += '<li><strong>Created Date : </strong>'+summery.created+'</li>';
        summery_data += '<li><strong>Assign Date : </strong>'+summery.delivered_date+'</li>';
        summery_data += '<li><strong>Delivery Date : </strong>'+summery.delivered_date+'</li>';
        summery_data += '<li><strong>Delivery Time : </strong>'+summery.delivery_time+'</li>';
        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';
        summery_data += '</div>';
        summery_data += '</div>';

        summery_data += '<div class="note note-warning">';
        summery_data += '<h4 class="block">Customer Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+summery.customer+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.c_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';

        summery_data += '<div class="note note-info">';
        summery_data += '<h4 class="block">Vendor Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+summery.vendor+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.v_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';


        summery_data += '<div class="note note-success">';
        summery_data += '<h4 class="block">Driver Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+summery.driver+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.d_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';

        return summery_data;
    }

    function cancel_delivery(ele){
        var delivery_id = $(ele).attr('pk');
        var url = "<?php echo base_url(); ?>"+"order/cancel_delivery";
        $fields = {'delivery_id':delivery_id};
        $.post(url, $fields, function(response){
            if(response.success){
                location.reload();
            }
        },'json');
    }

    function get_reports(e){
        e.disabled = false;
        $("#table_body").empty();
        get_deliveries_report_by_status(e.target);
    }

    function get_deliveries_report_by_status(el){
        var from_date = $("#from_date").val()
        var to_date = $("#to_date").val();
        var vendor_id = $("select#vendor_list option:selected").val();
     

        if(assign_table){
            $('#order_table').dataTable().fnDestroy();
        }

        $("#table_body").empty();
        el.disabled = true;
        el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        var url = "<?php echo base_url(); ?>"+"order/get_deliveries_report_by_completed";
        $fields = {'start_date':from_date, 'end_date':to_date, 'vendor_id':vendor_id};
        $.post(url, $fields, function(response){
            el.disabled = false;
            el.innerHTML = 'Get Report <i class="icon-plus"></i>';
            if(response.success){
                var data = response.report_data.records;
                console.log('i am response data:'+data);

                $("#table_body").append(set_report_data(data));
            }

            init_table();
        },'json');
    }

    function set_report_data(data){
        
        var s_date = $("#from_date").val()
        var e_date = $("#to_date").val();
        var tbody = '';
 var url = "<?php echo base_url(); ?>";
        $.each(data, function(i, e){
            var total = parseInt(e.total);
            var tot_delivered= parseInt(e.total_delivered);
            var tot_assign=parseInt(e.total_assigned);
            
            var total_cooling_bag_delivered=parseInt(e.total_cooling_bag_delivered);
            var total_paper_bag_delivered=parseInt(e.total_paper_bag_delivered);
            var empty_cooler_bag_received=parseInt(e.empty_cooler_bag_received);
            var pending_bag_with_customer=parseInt(e.pending_bag_with_customer);
            
            
            
            var tot_bags=(tot_assign)+(tot_delivered);
            var bags_inprogress=tot_assign;
            var bags_with_customer=(total_cooling_bag_delivered)-(empty_cooler_bag_received);
            // var pending = parseInt(e.total) - parseInt(e.delivered);
            tbody += '<tr class="odd gradeX">';
          
            tbody += '<td >'+ e.customer +' '+ e.customerPhone +'</td>';
             tbody += '<td >'+ e.vendor +' '+ e.vendorPhone +'</td>';
             tbody += '<td >'+e.address +'</td>';
             
               tbody += '<td >'+tot_bags+'</td>';
               tbody += '<td >'+bags_inprogress+'</td>';
               tbody += '<td >'+tot_delivered+'</td>';
               
             tbody += '<td >'+e.total_cooling_bag_delivered+'</td>';
            tbody += '<td>'+e.total_paper_bag_delivered+'</td>';
             tbody += '<td>'+e.empty_cooler_bag_received+'</td>';
             
            tbody += '<td>'+bags_with_customer+'</td>';
            tbody += '<td><a class="btn btn-sm btn-primary" style="color: #fff;background-color: #197990 !important;border-color: white;"  href="<?php echo  base_url('order/bagTrackingDetails/'); ?>'+e.vender_id+'/'+e.id+'/'+s_date+'/'+e_date+'">Details</a></td>';
            
          
            tbody += '</tr >';
        });
        return tbody;
    }
       </script>
       <!--shan-->
    <?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>
    </body>
</html>