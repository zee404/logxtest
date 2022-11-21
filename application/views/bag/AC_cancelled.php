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
.badge {
    color: #72747b;
    font-size: 10.5px !important;
}
table.dataTable thead > tr > th.sorting_asc
{
    background-color: #f1f5f7;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -36px;
} 
  .yellow {
  background-color: lightblue;
} 
.abc{
        vertical-align: middle;

}
.btn-group{
    margin-top: -10px;
    margin-bottom: 10px;

}    </style>
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Cancelled </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Cancelled Bag Collection</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">CANCELLED BAG COLLECTION</h4>
                            
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="width: 101% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                             <form action="<?php echo base_url('bag/AC_cancelled_by_created_date') ?>" method="post">
                    <div class="row">
                       
                    
                     <div class="col-lg-4">
                           <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        
                                   <div class="input-group input-large date-picker input-daterange" data-date="<?php if(!empty($selection["from"])){ echo $selection["from"]; }else{ echo date('Y-m-d'); } ?>">
                                    <input type="text" class="form-control" name="from" id="from_date" value="<?php if(!empty($selection["from"])){ echo $selection["from"]; }else{ echo date('Y-m-d'); } ?>">
                                    <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                    <input type="text" class="form-control" name="to" id="to_date" value="<?php if(!empty($selection["to"])){ echo $selection["to"]; }else{ echo date('Y-m-d', strtotime($cdate. ' + 1 days')); } ?>">
                                </div>
                      

                    </div>
                    
                    <div class="col-lg-2">
                          <div class="btn-group">
                          
                                <button class="btn blue" type="submit" style="color: #fff;background-color: #197990 !important;border-color: white; margin-top: 10px;">Get Records <i class="icon-plus"></i></button>
                           
                        </div>
                     </div>
                 </form>
                    
                </div> 
               
                </div>
                       
            </div>
                <div class="card-box" style="width: 104% !important;margin-left: 10px;">  
                
                <!--SELECT BOX CLICK ACTION-->
              <!--     <?php //if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>-->
              <!--   <div class="row">-->
              <!--      <div class="col-md-3">-->
              <!--          <select id="driver_list" class="form-control" name="driver_list">-->
              <!--              <option value="">Select Driver</option>-->
              <!--              <?php //foreach ($drivers['records'] as $key => $der) {?>-->
              <!--                  <option value="<?= $der->id; ?>" ><?= $der->email.' - '.$der->full_name; ?></option>-->
              <!--              <?php //} ?>-->
              <!--          </select>-->
              <!--      </div>-->
              <!--       <div class="col-lg-4" style="display: none;" id="action_btn">-->
              <!--          <button id="delete_button" type="button" class="btn btn-danger">Delete</button>-->
              <!--          <button id="re_process_button" type="button" class="btn btn-success">Again Process</button>-->
              <!--          <button id="print_btn" type="button" class="btn btn-danger">Print</button>-->
              <!--     </div>-->
              <!--    </div>-->
              <!--<?php// }else { ?>-->
              <!--  <div class="row">-->
                   
              <!--       <div class="col-lg-4" style="display: none;" id="action_btn">-->
                        
              <!--          <button id="print_btn" type="button" class="btn btn-danger" style="margin-bottom:15px;">Print</button>-->
              <!--     </div>-->
              <!--    </div>-->
              <!--<?php //} ?>-->
              
              <!--SELECT BOX CLICK ACTION END-->
                            
                                    <br>
                              <div class="table table-responsive">
                            <table class="example" data-toggle="table">

                                <thead class="thead-light">

                                <tr class="abc">
                                    <th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" name="checkbox" ></th>
                                    <th>SR No</th>
                                    <th >Customer Name</th>
                                    <th>Phone</th>
                                    <th>Partner</th>
                                    <th style="min-width: 100px">Type(Emirate With Time)</th>
                                    <th >Address</th>
                                    <th >Created</th>
                                    <th >Need To Be Picked Date</th>
                                    <th>No of Bags To Be Picked</th>
                                    <th>Notes</th>
                                    <th>Notification</th>
                                    <th >Status</th>
                                   
                                     <th style="min-width: 100px">Cancled At</th>
                                   <th style="min-width: 100px">Cancled By</th>
                                    <th style="min-width: 90px">Cancled Mode</th>
                                     <th style="min-width: 250px">Reason</th>
                                     <th style="min-width: 250px">Image</th>
                                     <th style="min-width: 250px">Cancellation Charges</th>
                                     <th style="min-width: 250px">Action</th>

                                </tr>
                                </thead>

                                <tbody >
                                  
                                <?php if ($bags['result']){
                                    foreach ($bags['records'] as $key => $bag) {?>
                                        <tr>
                                        <!--  <td><input type="checkbox" class="checkboxes" onclick="add_item(this.value)"  value="<?php echo $bag->bag_id;?>" /></td> -->
                                              <td><input type="checkbox" class="checkboxes" data-val="<?php echo $bag->bag_id;?>" value="<?php echo $bag->bag_id;?>" /></td>
                                            <td ><?php echo $key+1;?></td>
                                            <td ><?php echo ucfirst($bag->customer);?></td>
                                            <td ><?php echo $bag->c_phone;?></td>
                                            <td ><?php echo $bag->vendor;?></td>
                                             <td ><?php echo $bag->type;?></td>
                                            <td ><?php echo $bag->address;?></td>
                                            <td ><?php echo $bag->created_dt;?></td>
                                            <td ><?php echo $bag->pick_date;?></td>
                                            <td ><?php echo $bag->bags_qty;?></td>
                                            <td ><?php echo $bag->bag_notes; ?></td>
                                            <td ><?php echo $bag->bag_notification; ?></td>
                                            <td ><?php echo get_bag_status($bag->status);?></td>
                                            
                                             <td ><?php echo $bag->canceled_at;?></td>
                                            <td ><?php echo $bag->canceled_by;?></td>
                                            <td ><?php echo $bag->canceled_mode;?></td>
                                            <td ><?php echo $bag->canceled_reason ;?></td>
                                            
                                            
                                            <div class="mix-details">
                                                
                                            <td><?php if($bag->canceled_img!=""){?>
                                            <!--<a class="show_image" href="javascript:void(0)" data-image="<?php //echo base_url($bag->canceled_img) ?>">-->
                                           
                                            <a href="<?php echo base_url($bag->canceled_img);?>" target="_blank">
                                                view
                                              </a> <?php }else{ ?>
                                               NUN
                                              <?php }?></td>
                                          </div>
                                            <td ><?php echo $bag->cancellation_price;?></td>
                                            
                                            <td>
                                            <a class=" btn default btn-xs green-stripe"  data-toggle="modal" onclick="javascript:cancel_delivery(this)" href="#responsive_neww" pk="<?php echo $bag->bag_id;?>">
                                                    <i class="mdi mdi-square-edit-outline" style="font-size:20px;" ></i>
                                                </a>
                                                &nbsp;
                                            <button class="btn default btn-xs green-stripe"  onclick="javascript:revert(this)"   pk="<?php echo $bag->bag_id;?>">
                                                    <i class="dripicons-tag-delete" style="font-size:20px;" ></i>
                                                </button>
                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                        </tr>
                                </tbody>
                            </table>
                            </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

   <!--<div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">-->
   <!--             <div class="modal-dialog" style="width: 500px">-->
   <!--                 <div class="modal-content" style="width: 120% !important;">-->
   <!--                     <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">-->
   <!--                         <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
   <!--                         <h4 class="modal-title" id="mod_title" style="color: white;">Add Bags Collection</h4>-->
   <!--                     </div>-->

   <!--                     <div class="modal-body">-->

   <!--                         <div id="error_container" class="alert " style="display: none">-->
   <!--                             <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>-->
   <!--                             <p id="error_msg"></p>-->
   <!--                         </div>-->

   <!--                         <div class="portlet-body form">-->
                                <!-- BEGIN FORM-->
   <!--                             <form id="add_vendor_form"action="<?php echo base_url('vendor/save_vendor') ?>" method="post" class="horizontal-form" >-->
   <!--                                 <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">-->

   <!--                                 <div class="row">-->
   <!--                                      <div class="col-sm-6">-->
   <!--                                     <div class="form-group">-->
   <!--                                         <label>Select Module</label>-->
   <!--                                         <select  class="form-control" required="required" name="modules" id="modules_partner">-->
   <!--                                            <option>Dashboard</option>-->
   <!--                                             <option>Vendors</option>-->
   <!--                                             <option>Store Keepers</option>-->
   <!--                                             <option>Drivers</option>-->
   <!--                                             <option>Customers</option>-->
   <!--                                             <option>Deliveries</option>-->
   <!--                                             <option>QR Codes</option>-->
   <!--                                             <option>Bags Tracking</option>-->
   <!--                                             <option>Bags Collection</option>-->
   <!--                                             <option>Reports</option>-->
   <!--                                             <option>Extra Bags</option>-->
   <!--                                             <option>Settings</option>-->
   <!--                                             <option>Employees</option>-->
   <!--                                         </select>-->
   <!--                                         <input type="hidden" name="role_name" id="role_name">-->
   <!--                                     </div></div>-->
   <!--                                     <div class="col-md-6">-->
   <!--                                         <div class="form-group input-group-sm">-->
   <!--                                             <label class="control-label">Full Name</label>-->
   <!--                                             <input type="text" name="name" id="name" class="form-control">-->
   <!--                                         </div>-->
   <!--                                     </div>-->

   <!--                                     <div class="col-md-6">-->
   <!--                                         <div class="form-group input-group-sm">-->
   <!--                                             <label class="control-label">Email<span class="required">*</span></label>-->
   <!--                                             <input type="text" name="email" id="email" class="form-control">-->
   <!--                                         </div>-->
   <!--                                     </div>-->

   <!--                                     <div class="col-md-6">-->
   <!--                                         <div class="form-group input-group-sm">-->
   <!--                                             <label class="control-label">Phone<span class="required">*</span></label>-->
   <!--                                             <input type="text" name="phone" placeholder="971-123456789" id="phone" class="form-control">-->
   <!--                                         </div>-->
   <!--                                     </div>-->

   <!--                                     <div class="col-md-6">-->
   <!--                                         <div class="form-group input-group-sm">-->
   <!--                                             <label class="control-label">Address</label>-->
   <!--                                             <input type="text" name="address" id="address" class="form-control">-->
   <!--                                         </div>-->
   <!--                                     </div>-->
                                        
                                       

   <!--                                 </div>-->

                               
   <!--                         </div>-->

   <!--                     </div>-->

   <!--                     <div class="modal-footer">-->
   <!--                          <button id="save_vendor_btn" type="submit" style="background: black;color: white;" class="btn green">Save</button>-->
   <!--                          <button id="edit_vendor_btn" style="display: none" onclick="update_vendor()" type="button" class="btn green updatebtn" style="background: black;color: white;">Update</button>-->
   <!--                         <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>-->

                           
   <!--                     </div>-->
   <!--                      </form>-->
   <!--                 </div>-->
   <!--             </div>-->
   <!--         </div>-->
              
              
              <!--FOR EDIT -->
            
              <div id="responsive_neww" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-wide_">
                    <div class="modal-content">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="cancel_mod_title">Cancel Bag </h4>
                        </div>
                        <div class="modal-body">
                           

                            <div class="row" id="cancel_summery_data"></div>
                        </div>
                        <div class="modal-footer">
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue btn-info">Close</button>
                            <button id="responsive" onclick="cancel_confirm()" type="button" data-dismiss="modal" class="btn blue btn-danger">Confirm</button>
                        
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!--CANCEL EDIT END-->
       
                 
                
                <!--SHOW IMAGE MODEL-->
                
                 <!--<div id="image_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">-->
                 <!--               <div class="modal-dialog">-->
                 <!--                   <div class="modal-content">-->
                 <!--                       <div class="modal-header">-->
                 <!--                           <h4 class="modal-title" id="mySmallModalLabel">Bag Image</h4>-->
                 <!--                           <button type="button" style="background:red;" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                 <!--                       </div>-->
                 <!--                       <div class="modal-body">-->
                 <!--                           <img id="bag_image" class="img-responsive" src="" style="height: 100%; width: 100%; background:pink">-->
                 <!--                       </div>-->
                 <!--                   </div><!-- /.modal-content -->
                 <!--               </div><!-- /.modal-dialog -->
                 <!--           </div><!-- /.modal -->
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

       
        <script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        <script src="<?php echo base_url('assets/js/vendor.min.js') ?>"></script>
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
        $("#from_date").flatpickr({
            defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });

       global_bags_ids = [];

// SELECT BOX CLICK ACTION
// function delAll()
// {
//         var driver_id = $("#driver_list").val();
    
//         console.log(driver_id);

//          $.ajax({

//             url:'<?php echo base_url("Bag/assign_drivers_delivry") ?>',
//             method:'post',
//             data:{'bags_id':bags_id,driver_id:driver_id},
//             success:function(res)
//             {
//                  console.log(res);
//                 if(res){
//                     location.reload(); 
//                 }
//             },
//             error:function(err)
//             {
               
//             }
//         });
// }



    // $('#delete_button').on('click', function () {
    //     Swal.fire({
    //       title: 'Are you sure?',
    //       text: "You won't be able to revert this!",
    //       type: 'warning',
    //       showCancelButton: true,
    //       confirmButtonColor: '#3085d6',
    //       cancelButtonColor: '#d33',
    //       confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.value) {
    //             delete_bags();
    //         }
    //     })
    // });
    
    // $('#re_process_button').on('click', function () {
    //     Swal.fire({
    //       title: 'Are you sure?',
    //       text: "You won't be able to revert this!",
    //       type: 'warning',
    //       showCancelButton: true,
    //       confirmButtonColor: '#3085d6',
    //       cancelButtonColor: '#d33',
    //       confirmButtonText: 'Yes, Re Process it!'
    //     }).then((result) => {
    //         if (result.value) {
    //             re_process_bags_bags();
    //         }
    //     })
    // });

    $(document).ready(function () {
        
        //  $(".show_image").click(function(){
        //       $("#bag_image").attr("src", $(this).attr("data-image"));
        //         $("#image_modal").modal();
        //         //console.log(check);
        //     });
        
        // $("#print_btn").click(function(){
        //         var ids = [];
        //         $(".checkboxes:checked").each(function(){
        //             ids.push($(this).val());
        //         });

        //         if(ids.length < -1)
        //             return;
        //         ids = ids.join();
        //         window.open('<?php echo base_url() ?>report/print/bags/'+ids, '_blank');
        // });

        if($("tbody tr").not(".no-records-found").length > 0){
            console.log('dnt worked');
         
            $('.example').dataTable( {
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

        }


    });
    
    
   i_image_str = '';
    

//     function delete_bags(){
//   if(global_bags_ids.length > 0){
//             var url = "<?php echo base_url(); ?>"+"bag/delete_bags";
//             $fields = { 'bag_ids':global_bags_ids};
//             $.post(url, $fields, function(response){
//                 if(response.success){
//                     global_bags_ids = [];
//                     location.reload();
//                 }
//             },'json');
//             var msg = '<strong>Success!</strong> Data has been deleted.';
//             show_msg(msg, 'alert-success');
             
//         }else{
//             swal("No Row Selected", "", "error");
//         }

//     }
    
//     function re_process_bags_bags(){
//         if(global_bags_ids.length > 0){
//             var url = "<?php echo base_url(); ?>"+"bag/process_bags";
//             $fields = { 'bag_ids':global_bags_ids};
//             $.post(url, $fields, function(response){
//                 if(response.success){
//                     global_bags_ids = [];
//                     location.reload();
//                 }
//             },'json');
//             var msg = '<strong>Success!</strong> Bags has been processed.';
//             show_msg(msg, 'alert-success');
//         } else {
//             swal("No Row Selected", "", "error");
//         }
//     }
    
    //   function show_msg(container, msg, class_){
    //     $("#"+container).removeClass('alert-success');
    //     $("#"+container).removeClass('alert-danger');
    //     $("#"+container+" > p#error_msg").html(msg);
    //     $("#"+container).addClass(class_);
    //     $("#"+container).show();
    // }

function date_picker() {
    var date = new Date();
    if (jQuery().datepicker) {
        /*$('.date-picker').datepicker({
         //   rtl: App.isRTL(),
            autoclose: true
            //endDate : new Date(date.getFullYear(), date.getMonth(), date.getDate())

        });*/
        $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
    }
}



$(document).on('change', '.checkAll', function(){
       $this = $(this);
       global_bags_ids = [];
        $("tbody").find(".checkboxes").each(function(){
             
            if($this.prop('checked'))
            {
                //$("#action_btn").show();
                $(this).prop('checked', true);
                //$(this).parent().parent().addClass('redd');
                global_bags_ids.push(parseInt($(this).val()));
              
            }
            else
            {
                //$("#action_btn").hide();
                $(this).prop('checked', false);
               // $(this).parent().parent().removeClass('redd');
            }
        });
    });


// $(document).on('change', '.checkboxes', function(){
//     bags_id = $(this).attr("data-val");
//     $(this).parent().parent().toggleClass('redd');

//     if($('.checkboxes:checked').length > 0)
//     {
//         $("#action_btn").show();
//     }
//     else
//         $("#action_btn").hide();   

//     global_bags_ids = [];
//     $('.checkboxes:checked').each(function(){
//         global_bags_ids.push(Number($(this).val()));
//     });
// });

// SELECT BOX CLICK ACTION END




// FOR THERE EDIT CODE

 function cancel_delivery(ele){
           var delivery_id = $(ele).attr('pk');
           console.log('hi i am cancel delivery');
           get_order_by_id_cancel(delivery_id);
           
    }
    
    
    
     function get_order_by_id_cancel(id){
        //hide_error();
         console.log('hi i am start of get order by id');
        var track_id=0;
 
        var url = "<?php echo base_url(); ?>"+"bag/AC_get_bag_by_id";
        $fields = {'bag_id':id, 'track_ids':track_id};
        $.post(url, $fields, function(response){
            console.log(response);
            if(response.success){
                
                var detail = response.detail;
                   console.log(detail);
                
                var order_ = set_cancel_summery(detail);
                $("#cancel_summery_data").empty();
                $("#cancel_summery_data").append(order_);
                //$("#v_data").show();
                $("#loading").hide();
            }
        },'json');
        
         console.log('hi i am end of get cancel by id ');
    }
    
    function set_cancel_summery(detail){

        var cancel_summery = detail[0];
        console.log(cancel_summery);
     
         console.log('hi i am start of set cancel');
       

        //set order status
        // $("#cancel_mod_title").html('Delivery Details of '+summery.status);

        // var img_url = "<?php //echo base_url(); ?>"+"upload/"+summery.delivery_img;
        
        var  cancel_summery_data = '<div class="portlet-body form">';
        cancel_summery_data += '<input type="hidden" name="cancel_order_id" value="'+cancel_summery.bag_id+'" id="cancel_order_id" class="form-control">';
        // Partner + Customer
        cancel_summery_data += '<div class="row">';
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Partner</label>';
        cancel_summery_data += '<input type="text" name="partner_name" id="partner_name" class="form-control" value="'+cancel_summery.vendor+'"  disabled>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Customer</label>';
        cancel_summery_data += '<input type="text" name="customer_name" id="customer_name" class="form-control" value="'+cancel_summery.customer+'"  disabled>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += '</div>';
        
        
         // Status + Ammount
        cancel_summery_data += '<div class="row">';
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Status</label>';
        cancel_summery_data += '<input type="text" name="cancel_status" id="cancel_status" class="form-control" value="'+cancel_summery.status+'"  disabled>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Ammount</label>';
        cancel_summery_data += '<input type="text" name="ammount" id="ammount" class="form-control" value="'+cancel_summery.partner_price+'"  disabled>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += '</div>';
        
        
         // Paid OR unpaid + Img
        cancel_summery_data += '<div class="row">';
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Cancelation Mode</label>';
        
        if(cancel_summery.canceled_mode == 'Paid_cancel'){
        cancel_summery_data += '<select id="cancel_mode" class="form-control"><option value="Paid_cancel">Paid Cancel</option>  <option value="Unpaid_cancel">Unpaid Cancel</option></select>';
        }else if(cancel_summery.canceled_mode == 'Unpaid_cancel'){
        
           cancel_summery_data += '<select id="cancel_mode" class="form-control"><option value="Unpaid_cancel">Unpaid Cancel</option> <option value="Paid_cancel">Paid Cancel</option> </select>';
        
        }
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += ' <div class="col-md-6">';
        cancel_summery_data += '<div class="form-group input-group-sm"> <label class="control-label">Prof Image</label>';
        cancel_summery_data += '<input type="file"  name="i_image" id="i_image" class="form-control ">';
        cancel_summery_data += '<span id="i_img_msg" style="color: red"></span>';
        
        
        
        
        if(cancel_summery.canceled_img != ''){
            cancel_summery_data += '<a  style="color:green" name="check_img_avail" id="check_img_avail" class="form-control " href="'+cancel_summery.canceled_img+'" target="_blank">Image Available</a>';

        }else{
            
             cancel_summery_data += '<input type="text"  style="color:red" name="check_img_avail" id="check_img_avail" class="form-control " value="Not Available" />';
        }
        
        cancel_summery_data += '<img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_i_image">';
        
        
        
        
        
        cancel_summery_data += '</div> </div>';
        
        cancel_summery_data += '</div>';
        
        // Short Note
        
                     
        
        cancel_summery_data += '<div class="row">';
         
         cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Short Note</label>';
        cancel_summery_data += '<textarea name="note" id="note" rows="5" class="form-control" style="width:100%;" >'+cancel_summery.canceled_reason+'</textarea>';
        cancel_summery_data += ' </div> </div>';
        cancel_summery_data += '</div>';
        
        cancel_summery_data += '</div>';
          
          console.log(cancel_summery_data);
          
           console.log('hi i am end of set cancel summery');
        return cancel_summery_data;
    }
    
      function i_image(input) {
         console.log(input.files);
         
        if (input.files && input.files[0]) {
            console.log('i am working inside if................');
            var reader = new FileReader();
            reader.onload = function(e) {

                var type = input.files[0].type;
                var res=  type.split('/');
                if (res.length > 0){
                    if (res[1] !== 'png' && res[1] !== 'jpg' &&  res[1] !== 'jpeg' &&  res[1] !== 'pdf'){
                        $("#i_img_msg").append('invalid format');
                        $("#i_image").val('');
                    }else {
                        $("#i_img_msg").hide();
                    }
                }else {
                    $("#i_img_msg").append('invalid format');
                    $("#i_image").val('');
                }

                if (input.files[0].size > 1057152) {
                    $("#i_img_msg").append('Try to upload file less than 1MB!');
                    $("#i_image").val('');
                } else {
                     $("#i_img_msg").hide();
                    //  $("#i_img_msg").append('Good');
                    i_image_str = e.target.result;
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
  
    
    $('body').on('change', '#i_image', function(e){
    
        i_image(this);
       });
    

    
    
    function cancel_confirm(){
        
        var mode=$('#cancel_mode').val();
         Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to edit this Bag with "+mode+" charges!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, edit it!'
                }).then((result) => {
                  if (result.value) {
                      
                        $('input').removeAttr('disabled');
                        var cancel_o_id=$('#cancel_order_id').val();
                       
                        
                        if(mode == 'Unpaid_cancel'){
                            var cancelation_price=0;
                        }else{
                            var cancelation_price=$('#ammount').val();
                        }
                        var note=$('#note').val();
                        
                        if(i_image_str== ''){
                            var profImg='0';
                        }else{
                            var profImg=i_image_str;
                        }
                        
                        
                        console.log('hi i am confirm cancel:'+cancel_o_id);
                        console.log(mode);
                        console.log(cancelation_price);
                        console.log('note'+note);
                        console.log('image'+profImg);
                        
                        
                           $.ajax({
                                    url: '<?php echo base_url('bag/AC_cancel_bag/Edit');?>',
                                    type: 'POST',
                                    data: {
                                        
                                        'id':cancel_o_id,
                                        'mode':mode,
                                        'note':note,
                                        'profImg':profImg,
                                        'cancelation_price':cancelation_price
                                       
                                    },
                                    success: function (res) {
                                        console.log(res);
                                        swal.fire("Update Successfully!", "", "success").then(function(){ location.reload(); });
               
                                       
                                    },
                                    error: function (err) {
                                        console.log(err);
                                         swal('Network Issue!', 'Please Try Again!', 'error');
                                    }
                                });
                      
                        
                    }
                });
        
       
        
    }

 function revert(ele){
       var delivery_id = $(ele).attr('pk');
         
           
              Swal.fire({
              title: 'Are you sure!',
              text: "You want to revert cancelation ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, revert it!'
            }).then((result) => {
              if (result.value) {
                
                           $.ajax({
                                    url: '<?php echo base_url('bag/AC_revert_');?>',
                                    type: 'POST',
                                    data: {
                                        
                                        'id':delivery_id
                                        
                                       
                                    },
                                    success: function (res) {
                                        console.log(res);
                                        swal.fire("Revert Successfully!", "", "success").then(function(){ location.reload(); });
               
                                       
                                    },
                                    error: function (err) {
                                        console.log(err);
                                         swal('Network Issue!', 'Please Try Again!', 'error');
                                    }
                                });
              }
            });
           
  }
  
       </script>
  
    </body>

    <style type="text/css">
        .redd{
            background: lightblue;
        }

        .redd:hover{
            color: black !important;
        }
    </style>
</html>