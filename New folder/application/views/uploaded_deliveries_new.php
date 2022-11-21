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
         <link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />         
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
            div.dataTables_wrapper div.dataTables_filter {
                text-align: right;
                margin-top: -37px;
            }
            .btn-group{
                margin-top: -10px;
                margin-bottom: 10px;

            }
/*            table{*/
/*  margin: 0 auto;*/
/*  width: 100%;*/
/*  clear: both;*/
/*  border-collapse: collapse;*/
/*  table-layout: fixed; */
/*  word-wrap:break-word; */
/*}*/





/*New added 19 feb 2021*/


.lds-roller {
  display: inline-block;
  position: relative;
  /*width: 80px;*/
  /*height: 80px;*/
  
    top: 10%;
    left: 45%;
    z-index: 999;
  
  /*position: absolute;*/
  /*  left: 0;*/
  /*  right: 0;*/
  /*  top: 0;*/
  /*  bottom: 0;*/
  /*  display: none;*/
  /*  z-index: 9998;*/
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #fff;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


.overlay{
    /*display: none;*/
    /*position: fixed;*/
    /*width: 100%;*/
    /*height: 100%;*/
    /*top: 0;*/
    /*left: 0;*/
    /*z-index: 999;*/
    /*background: rgba(255,255,255,0.8) url("loader.gif") center no-repeat;*/
}

.overlay_ {
   rgba(255, 255, 255, 0.21);
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    /* display: none; */
    z-index: 9998;
   
}
/* Turn off scrollbar when body element has the loading class */

body.loading{
    /*overflow: hidden;   */
}
/* Make spinner image visible when body element has the loading class */
body.loading .overlay{
    /*display: block;*/
    /*background: rgba(255,255,255,0.8);*/
     /*width: 100%;*/
    /*height: 100%;*/
    /*top: 0;*/
    /*left: 0;*/
    /*z-index: 999;*/
}

.btn_set{
    margin:10px;
    color: #fff;
    background-color: #197990 !important;
    border-color: white;
}

.btn_set:hover {
background-color: #36404a !important;
    color: white !important;
    border: 7 green!important;
    border-style: groove !important;
    border: 3px solid #197990 !important;
    border-radius: 5px !important;
}

.btn-primary {
     color: #fff !important; 
    /* background-color: #00aee0; */
    /* border-color: #00afe2; */
    /* color: red; */
    /* background-color: #dee2e6; */
    border-color: white !important;
}

/* end */


.select2-drop-active{
    margin-top: -25px;
}

.select2-container--default .select2-selection--single {
    /* background-color: #fff; */
    /* border: 1px solid #aaa; */
    border-radius: 4px;
    height: 36px;
    width:250px;
}

.select2-container--default .select2-results>.select2-results__options {
    max-height: 400px;
    overflow-y: auto;
}


/*#truncateLongTexts {*/
/*  width: 500px;*/
/*  white-space: nowrap;*/
/*  overflow: hidden;*/
/*  text-overflow: ellipsis;*/
/*}*/

#truncateLongTexts{ overflow-y: hidden; margin-bottom: 10px; width:200px; }
#cucc2 { height: 60px; }




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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Operations </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Unassigned Deliveries</a></li>
                                  
                                </ol>
                            </div>
                           <h4 class="page-title">Unassigned Deliveries</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box" style="width: 104% !important; ">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    
                    <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?php echo $this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d') ?>" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?php echo $this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d') ?>">
                                         <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to" id="to_date" value="<?php echo $this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days')) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                   <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                 
                   <div class="col-md-2">
                                    <select id="partner_list" class="search_option_p form-control" name="partner_list" style="margin-bottom: 10px;">
                                        <option value="">Select Partner</option>
                                        <option value="0" >Select Partner (optional)</option>
                                        <?php if($vendors){foreach ($vendors as $key => $der) {?>
                                            <option value="<?= $der->id; ?>" ><?= $der->full_name; ?> &nbsp;&nbsp;&nbsp;</option>
                                        <?php }} ?>
                                    </select>
                                </div>
                
                 <div class="col-md-2">
                                    <select id="emirate_list" class="search_option_e form-control" name="emirate_list" style="margin-bottom: 10px;">
                                        <option value="">Select Emirate</option>
                                        <option value="0">Select Emirate (optional)</option>
                                        <?php if($emirates){foreach ($emirates as $key => $der) {?>
                                            <option value="<?= $der->id; ?>" ><?= $der->emirate_name; ?> &nbsp;&nbsp;&nbsp;</option>
                                        <?php }} ?>
                                    </select>
                                </div>
                
                 <div class="col-md-3">
                                    <select id="time_list" class="search_option_t form-control" name="time_list" style="margin-bottom: 10px;">
                                        <option value="">Select TimeSlot</option>
                                        <option value="0">Select TimeSlot (optional)</option>
                                        <?php if($timeslot){foreach ($timeslot as $key => $der) {?>
                                            <option value="<?= $der->basic_time_id; ?>" ><?= $der->name; ?> &nbsp;&nbsp;&nbsp;</option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                
                      <?php } ?>      
                    <div class="col-lg-2">
                          <div class="btn-group">
                                <button onclick="build_table_and_data(event)" class="btn_set btn blue">Get Report <i class="icon-plus"></i></button>
                        </div>
                                  

                    </div>
                </div>   
                            
                          </div> 
                            <div class="card-box" style="width: 104% !important;  ">  
                                <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
            
                              <div class="row" style="margin-top: -15px;margin-bottom: 10px; display: none;"id="action_btn">
                                <div class="col-md-3">
                                    <select id="driver_list" class="search_option form-control" name="driver_list" style="margin-bottom: 10px;">
                                        <option value="">Select Driver</option>
                                        <?php foreach ($drivers['records'] as $key => $der) {?>
                                            <option value="<?= $der->id; ?>" ><?= $der->full_name; ?> &nbsp;&nbsp;&nbsp;</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                 <div class="col-lg-6" >
                                    <button type="button" id="button"  class="btn btn_set">Assign</button>
                                     <button type="button" id="autobutton"  class="btn btn_set">Auto Assign</button>
                                    <!--<a href="#" id="delete_button" class="btn ">Delete</a>-->
                                    <button type="button"  id="delete_button" class="btn_set btn ">Delete</button>
                                    <button type="button" class="btn btn_set" id="cancelled_button">Cancel</button>
                                    <!--<button type="button" class="btn btn-danger" id="print_btn">Print Label</button>-->
                                    <!--<button type="button" class="btn btn-danger" id="print_btn1">Print Label1</button>-->
                                    <!--<button type="button" class="btn btn_set" id="print_btn2">Print Label</button>-->
                                    <?php //if(strtolower($this->session->userdata('role')) == 'admin'){ ?>
                                    <!--Testing QR-->
                                     <button type="button" class="btn btn_set" id="print_btn_test">Print Label</button>
                                     <?php //} ?>
                                    
                                    <button type="button" class="btn btn_set" id="print_btn_w_logo">Print Label With Logo</button>
                                  
                                   
                               </div>
                              </div>
                            <?php }else{ ?>
                                <div class="row" style="margin-top: -15px;margin-bottom: 10px; display: none;"id="action_btn">
                                 <div class="col-lg-4" >
                                    <!--<button type="button" class="btn btn_set" id="print_btn2" >Print Label</button>-->
                                    <!--<button type="button" class="btn btn_set" id="print_btn_w_logo">Print Label With Logo</button>-->
                                    
                                    <button type="button" class="btn btn_set" id="print_btn_test">Print Label</button>
                                    <button type="button" class="btn btn_set" id="print_btn_w_logo">Print Label With Logo</button>
                               </div>
                              </div>
                            <?php } ?>
                            
                            <!--text-nowrap-->
                            <!--<div class="portlet-body table-responsive" id="tickets">-->
                            <!--data-toggle="table"-->
                              <div class="card-box" style="overflow-x: auto;">  
                            <table id="order_table"  class="example  table  table-responsive  table-bordered " style="display:table;overflow-x: auto;">

                                <thead class="thead-light">

                                <tr>
                                     <th class="table-checkbox" ><input type="checkbox" class="checkAll" style="zoom: 2.5;"></th>

                                    <th data-field="id" data-sortable="true" data-formatter="">Order Id</th>
                                    
                                     <th data-field="suggestion" data-sortable="true" data-formatter="" style="min-width:20px">Suggested Driver</th>
                                    
                                    <th data-field="planid" data-sortable="true" data-formatter="dateFormatter">PlanID</th>
                                    <!-- <th data-field="name" data-sortable="true">QR</th> -->
                                    <th data-align="center" data-field="date" data-sortable="true" data-formatter="dateFormatter" >Customer</th>
                                    <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter" style="min-width:50px">Delivery Address</th>
                                    <th data-field="status" data-align="center"  data-sortable="true" data-formatter="">Notes</th>
                                    <th data-align="center" data-sortable="true" class="timeSlot" style="min-width:50px">Time Slot</th>
                                    <th data-field="d" data-align="center" data-sortable="true" data-formatter="">Partner</th>
                                    <th data-field="v" data-align="center" data-sortable="true" data-formatter="">Created At</th>
                                    <th data-field="x" data-align="center" data-sortable="true" data-formatter="">Pickup Location</th>
                                    <th data-field="r" data-align="center" data-sortable="true" data-formatter="">Product Type</th>
                                    <th data-field="xx" data-align="center" data-sortable="true" data-formatter="">Notification</th>
                                    
                                    
                                    <th data-field="pay" data-align="center" data-sortable="true" data-formatter="">Payment</th>
                                    <th data-field="cdi" data-align="center" data-sortable="true" data-formatter="">Company Delivery Id</th>
                                    <th data-field="gla"  data-sortable="true" data-formatter="" style="min-width:50px">Google Link(Address)</th>
                                   
                                    <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?> 
                                     <th data-field="action" data-align="center" data-sortable="" data-formatter="">Action</th> 
                                      <?php } ?>
                                    

                                </tr>
                                </thead>

                                <tbody id="table_body">
                                   
                                </tbody>
                            </table>
                           </div>
                              <!--</div>-->
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>








    <!--Delivery Edit infortaion 05-08-2021  start -->

          <div id="myModal" class="modal fade"   aria-hidden="true">
                <div class="modal-dialog modal-wide_">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h3 class="modal-title" id="mod_title">Edit Delivery Details</h3>
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        </div>
                        <div class="modal-body">
                           

                            <div class="row" id="v_summery_data" style="padding: 10px"></div>
                        </div>
                        <div class="modal-footer">
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue btn-info">Close</button>
                        </div>
                    </div>
                </div>
            </div>




      <!--End delivery edit model -->
  
                 <div id="custom-modals" class="modal-demo" style="padding: 35px;">
                      <blockquote class="hero">
                                        <p> Click <a href="<?php echo base_url(); ?>download/DriverCSVFormate.csv">HERE</a> to Download Driver CSV File Format!</p>
                                    </blockquote>

                                    <ul class="list-unstyled  margin-top-10 margin-bottom-10">
                                        <li><i class="icon-ok"></i> Driver Full Name ( Optional: Max. 90 characters )</li>
                                        <li><i class="icon-ok"></i> Driver Phone( Required: Max. 12 characters with country code )</li>
                                        <li><i class="icon-ok"></i> Driver Address ( Optional ) </li>
                                        <li><i class="icon-ok"></i> Driver Email ( Optional )</li>
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
         
         <!-- 19feb 2021-->
           <div id="test" ></div>
         <!---->
         <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js') ?>"></script>-->
        <?php } ?>
        
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/scripts/custom.js"></script>
        <!-- Sweet alert init js-->
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
         <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>

        <!-- Init js -->
         <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>
        
        

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
       
       <script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script> 
       
       
        <script type="text/javascript">
            deliv_ids = [];
            area_ids = [];
            emi_ids=[];
            slot_ids=[];
            tmp_deliv_ids=[];
             
             
       
        
$('#button').on('click', function () {
         if($("#driver_list").val() == '')
            {
               swal("", "Please Select Driver", "error");
                return;
            }
    deliv_ids = [];
    if($('.checkboxes:checked').length > 0){
        $('.checkboxes:checked').each(function(){
            deliv_ids.push(Number($(this).val()));
        });
        assign_deliv(deliv_ids);    
    }
    
 
});

function assign_deliv(ids)
{
        var driver_id = $("#driver_list").val();
    
        // console.log(driver_id);

         $.ajax({

            url:'<?php echo base_url("order/assign_drivers_delivry") ?>',
            method:'post',
            data:{'bags_id':ids,driver_id:driver_id},
            success:function(res)
            {
                //  console.log(res);
                // if(res){
                //     swal("Done", "Assigned Successfully", "success");
                //     location.reload(); 
                // }
                
                if(res){
                  
                    // location.reload(); 
                    
                  var txt=ids;
                 var keyword=txt.toString();
                 var trackname=keyword.split(",");
                //   alert(trackname.length);
           if(trackname.length > 0){
                      for(var j=0; j<trackname.length; j++){
                        //   alert(trackname[j]);
                          var rowId=trackname[j];
                        //   console.log(un_assign_table);
                          un_assign_table.row("#"+rowId).remove();
                        //   $('table#order_table tr#'+rowId).remove();
                      }
                       un_assign_table.draw();
                    } 
                    
                    
                      swal("Done", "Assigned Successfully", "success");
                }else{
                    swal("Network Error.", "Try Again", "error");
                    location.reload(); 
                    
                }
                
                
                
                
            },
            error:function(err)
            {
               
            }
        });
}

$('#autobutton').on('click', function () {
       
        $('button').prop('disabled', true);
    
     $('#autobutton').html('<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading');
     $('#test').html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
     
     $('#test').addClass("overlay_");
      $("body").addClass("loading"); 
       
    deliv_ids = [];
    area_ids = [];
    emi_ids=[];
    slot_ids=[];
    tmp_deliv_ids=[];
    if($('.checkboxes:checked').length > 0){
        $('.checkboxes:checked').each(function(){
            
            // let tmp_d = {
            //             'deliv_ids': Number($(this).val()),
            //             'area_ids': Number($(this).data("area_id")),
            //             'emi_ids': Number($(this).data("emi_id")),
            //             'slot_ids': Number($(this).data("slot_id"))
            //           }
                       
            //         tmp_deliv_ids.push(tmp_d);
                    
                        // 'area_ids': Number($(this).data("area_id")),
                        // 'emi_ids': Number($(this).data("emi_id")),
                        // 'slot_ids': Number($(this).data("slot_id"))
                    
                     let tmp_d = {
                        'deliv_ids': Number($(this).val())+'@'+Number($(this).data("area_id"))+'@'+Number($(this).data("emi_id"))+'@'+Number($(this).data("slot_id"))+'@'+$(this).data("n"),
                       }
                       
                    tmp_deliv_ids.push(tmp_d);
                    
                    
            // deliv_ids.push(Number($(this).val()));
            // area_ids.push(Number($(this).data('area_id')));
            // emi_ids.push(Number($(this).data('emi_id')));
            // slot_ids.push(Number($(this).data('slot_id')));
        });
        // console.log('i am auto button'+deliv_ids);
        //  auto_assign_deliv(deliv_ids, area_ids,emi_ids,slot_ids);    
        
         auto_assign_deliv(tmp_deliv_ids);  
    }
    
 
});

// function auto_assign_deliv(ids, area_ids ,emi_ids,slot_ids)
function auto_assign_deliv(ids)
{
       // var driver_id = $("#driver_list").val();
    
        //console.log(driver_id);
        $.ajax({

            url:'<?php echo base_url("order/Auto_assign_drivers_delivry") ?>',
            method:'post',
            data:{'bags_id':ids},
            success:function(res)
            {
                //  console.log(res);
                if(res=='true'){
                    swal("Done", "Assigned Successfully", "success");
                    
                    // 19 feb 2021
                      $('button').prop('disabled', false);
    
                      $('#autobutton').html('Auto Assign');
                      $('#test').html('');
     
                      
                      $("body").removeClass("loading"); 
                      $("#test").removeClass("overlay_"); 
                    //   19 feb 2021
                    
                    location.reload(); 
                }else{
                    // swal("", "Some Deliveries Not Assigned Successfully! Kindly Update driver's slots schedule accordingly", "error");
                    // console.log('not assigned deliviries..............'+res->not_assigned);
                    
                     var returned_orders=JSON.parse(res);
                     
                    //   var remaining_orders=JSON.parse(res);
                      
                      
                      console.log('not assigned deliviries..............'+returned_orders.not_assigned);
                      
                      var remaining_orders=returned_orders.not_assigned;
                      
                    //   console.log(remaining_orders);
                      
                    //   die();
                    //   $('#1481').addClass("NOT");
                    
                    // 19 feb 2021
                    
                    $('button').prop('disabled', false);
    
                      $('#autobutton').html('Auto Assign');
                      $('#test').html('');
     
                      
                      $("body").removeClass("loading"); 
                      $("#test").removeClass("overlay_"); 
                    
                    // 19 feb 2021 end
                    var return_rzn=returned_orders['not_assigned_rzn'];
                     var textt = '<div class="row" ><div class="col-md-12" ><fieldset class="savepop-border"><legend class="savepop-border">Justification</legend>'+' <div class="portlet-body table-responsive">'+'<table  class="table-bordered table-hover table-striped">';
                    for(var i=0; i<return_rzn.length ; i++){ 
                   
                           textt = textt+'<tr><td></td></tr> <tr><td>'+i+') '+return_rzn[i]+'</td></tr>';

                    }
                     
                     textt = textt+'</table></div></fieldset></div></div>';
                     
                     
                      Swal.fire({
                                                                         title: 'Deliveries Detail that are not assigned',
                                                                         html: textt,
                                                                         type: 'warning',
                                                                         showCancelButton: true,
                                                                         confirmButtonColor: '#fda81a',
                                                                         cancelButtonColor: '#B22E06',
                                                                         confirmButtonText: 'Got It'
                                                                       }).then((result) => {
                                                                         if (result.value) {
                                                                        //   console.log('GOT IT');
                                                                           location.reload(); 
                                                                         }
                                                                       });
                     
                      $('.checkboxes:checked').each(function(){
                          var temp=Number($(this).val());
                        //   console.log('i am temp'+temp);
                          var matched=0;
                          for(var i=0; i<remaining_orders.length ; i++){
                              
                              if( temp == remaining_orders[i]){
                                  matched=matched+1;
                                //   console.log('i am inside if'+remaining_orders[i]);
                                //   $('#'+temp).css('color','red');
                                  $('#'+temp).css('background','red');
                                   remaining_orders.splice(i, 1);
                                 }
                                 if(matched>0)
                                  break;
                          
                          }
                             if(matched!=0){
                                 // $(this).prop("checked", false);
                                 
                             }else{
                                  $(this).prop("checked", false);
                                  $(this).removeClass("checkboxes");
                                  $(this).hide();
                                //  console.log('i am inside else'+remaining_orders[i]);
                             }
                            
                                
                            });
                             $(".checkboxes:checked").prop("checked", false);
                       
                    
                }
            },
           error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            }
        });
}

 $(document).ready(function () {

            $("#print_btn").click(function(){
                var ids = [];
                $(".checkboxes:checked").each(function(){
                    ids.push($(this).val());
                });

                if(ids.length < -1)
                    return;
                ids = ids.join();
                window.open('<?php echo base_url() ?>report/print/orders/'+ids, '_blank');
            });
            
            
            
             $("#print_btn2").click(function(){
                var ids = [];
                $(".checkboxes:checked").each(function(){
                    ids.push($(this).val());
                });

                if(ids.length < -1)
                    return;
                ids = ids.join();
                window.open('<?php echo base_url() ?>report/print/orders2/'+ids, '_blank');
            });
            
            
            $("#print_btn_w_logo").click(function(){
                var ids = [];
                $(".checkboxes:checked").each(function(){
                    ids.push($(this).val());
                });

                if(ids.length < -1)
                    return;
                ids = ids.join();
                window.open('<?php echo base_url() ?>report/print/orders3/'+ids, '_blank');
            });
            
            $("#print_btn1").click(function(){
                var ids = [];
                $(".checkboxes:checked").each(function(){
                    ids.push($(this).val());
                });

                if(ids.length < -1)
                    return;
                ids = ids.join();
                window.open('<?php echo base_url() ?>report/print/orders1/'+ids, '_blank');
            });
            
            $("#print_btn_test").click(function(){
                var ids = [];
                $(".checkboxes:checked").each(function(){
                    ids.push($(this).val());
                });

                if(ids.length < -1)
                    return;
                ids = ids.join();
                window.open('<?php echo base_url() ?>report/print/orders_test/'+ids, '_blank');
            });
            
            
            

var x_check=<?php if($this->uri->segment(3) !=''){
    echo 0;
}else{
     echo 1;
} ?> ;
// console.log(x_check);
            $("#from_date").flatpickr({
                
                    
               onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });
            
            

           
            //  init_table();
            
            build_table_and_data();
             
             $('.search_option').select2({
  placeholder: 'Select an Driver'
});



$('.search_option_p').select2({
  placeholder: 'Select Partner (optional)'
});

$('.search_option_e').select2({
  placeholder: 'Select Emirate (optional)'
});

$('.search_option_t').select2({
  placeholder: 'Select TimeSlot (optional)'
});



                });
        </script>
        
<script type="text/javascript">
     var un_assign_table;
    function init_table(){

        if ($.fn.DataTable.isDataTable( '#order_table' ) ) {
            $('#order_table').dataTable().fnDestroy();
        }

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
    }
    
     function get_reports(e){
        if(un_assign_table)
        $('.example').dataTable().fnDestroy();
        // $('table .example').dataTable().fnDestroy();
        // $('.example').dataTable().fnDestroy();
        
        
            // $('#order_table').dataTable().fnDestroy();
        $("#table_body").empty();
        get_deliveries_report_by_status(e.target);
    }

    function get_deliveries_report_by_status(el){
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        var option = 'Not Assign';

        //   console.log(from_date);
        //   console.log(to_date);
        // $('table #order_table').dataTable().fnDestroy();
        $("#table_body").empty();
        el.disabled = true;
        el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        var url = "<?php echo base_url(); ?>"+"report/get_deliveries_report_by_notAssigned";
        $fields = {'start_date':from_date, 'end_date':to_date, 'status':option};
        $.post(url, $fields, function(response){
            el.disabled = false;
            el.innerHTML = 'Get Report <i class="icon-plus"></i>';
            if(response.success){
                var data = response.report_data.records;
                    // console.log(data);
                    $("#table_body").empty();
                //   $('table #order_table').dataTable().fnDestroy();
                   $("#table_body").find("tr").remove();
                   
                   
                $("#table_body").append(set_report_data(data));
                //  $('div#tickets table tbody').empty();
                // $('div#tickets table tbody:eq(0)').append(set_report_data(data));
                // console.log($('div#tickets table tbody').length);
               
            }
            
            //   if(!un_assign_table)
                          init_table();
            //   console.log('i am in not condition :'+un_assign_table);
            //  }
                    
        },'json');
    }
   
   function set_report_data(data){
         var url = "<?php echo base_url(); ?>";
        var tbody = '';
        // console.log(data);
        $.each(data, function(i, e){
           
            
            if(e.new_delivery_check){
                tbody += '<tr class="gradeX new_deliv" id="'+ e.order_id+'">';
            }else{
                tbody += '<tr class="gradeX" id="'+ e.order_id+'">';
            }
            
            
            var the_str=e.delivery_address;
            var the_res = the_str.split(",");
            var the_ans= the_res[the_res.length - 1];
            
            var the_str2=e.delivery_time;
            var the_res2 = the_str2.split(",");
            var the_ans2= the_res2[the_res2.length - 1];
            
            
            
            tbody += '<td><input type="checkbox" class="checkboxes" value="'+ e.order_id+'" style="zoom: 2.5;" data-area_id="'+ e.areaID+'" data-emi_id="'+e.emirateID+'"  data-slot_id="'+e.slotID+'"  data-n="'+the_ans+','+the_ans2+'" /></td>';
            tbody += '<td >'+ e.order_id +'</td>';
            
              tbody += '<td >'+ e.suggested_driver_name +' <br>'+e.suggested_driver_phone+'</td>';
            
             tbody += '<td >'+ e.plan_id +'</td>';
            //tbody += '<td ><img src="'+ url+e.qrImage +'" /></td>';
            
            
            
            
            
            
              <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                            
                                            var urlencodedtext="Dear Client,%0a%0aGood Day!%0a%0aWe have a meal plan delivery for you from "+e.vendor+" but unfortunately there is a slight delay in your area because of a unforeseen event, We are trying our best to reach you at the earliest, Sincere apologies for the inconvenience.%0a%0aMany Thanks for your patience and understanding.%0a%0a Regards,TEAM LOGX";
                                           
                                           
                                           
                                             tbody += '<td><a title="Click here to start whatsApp chat" target="_blank" href="https://wa.me/'+e.c_phone+'/?text='+urlencodedtext+'"  data-placement="left">'+e.customer +' '+ e.c_phone+' </a></td>';
                                          
                                         <?php }else{ ?>   
                                        tbody += '<td >'+ e.customer +' '+ e.c_phone +'</td>';
                                            <?php } ?>
            
            
            
            
            
            
             tbody += '<td id="cucc2"><div id="truncateLongTexts">'+ e.delivery_address + '</div></td>';
              tbody += '<td id="cucc2"><div id="truncateLongTexts">'+e.note+ '</div></td>';
            tbody += '<td >'+ e.delivery_date +' '+ e.delivery_time +'</td>';
           
            tbody += '<td >'+ e.vendor +' '+ e.v_phone +'</td>';
            tbody += '<td >'+ e.created +'</td>';
          
            tbody += '<td >'+ e.pickUp +'</td>';
            
            
            
            // 
            
           
           
           
            /*tbody += '<td >'+ e.status +'<br>';

            var image = '';
            if(e.delivery_img != null){
                image = e.delivery_img;
            }

            tbody += '<div class="mix-details">';
            tbody += '<a class="mix-preview fancybox-button" href="'+image+'" title="" data-rel="fancybox-button_">';
            tbody += '<img style="max-width: 30%" class="img-responsive_" src="'+image+'" alt="">';
            tbody += '</a>';
            tbody += '</div>';
            tbody += '</td>'; */

           tbody += '<td>'+e.food_type+'</td>';
           tbody += '<td>'+e.send_notification+'</td>';
           
           
            tbody += '<td >'+ e.delivery_amount +'</td>';
             tbody += '<td >'+ e.company_note +'</td>';
             
             if(e.google_link_addrs !=''){
                 var obj = JSON.parse(e.google_link_addrs);
                   tbody += '<td id="cucc2"><div id="truncateLongTexts">'+obj.google_link +'</div></td>';
             }else{
                 tbody += '<td id="cucc2"><div id="truncateLongTexts">'+ 'None' +'<div></td>';
             }
          //   
             
        //     console.log('obj is '+obj.google_link);
            //  zuzi
            
         <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>    
          tbody += '<td><a class="" title="Edit" data-toggle="modal" onclick="javascript:order_detail(this)" href="#myModal" pk="'+e.order_id+'"><i class="mdi mdi-square-edit-outline" style="font-size: x-large;"></i></a></td>';
            <?php } ?>     
            

            tbody += '</tr >';
        });
        return tbody;
    }

$(document).on('change', '.checkboxes', function(){
        if($(this).prop('checked'))
            $(this).parent().parent().addClass("redd");
        else
            $(this).parent().parent().removeClass("redd");

        if($('.checkboxes:checked').length > 0)
        {
            $("#action_btn").show();
        }
        });

$(document).on('change', '.checkAll', function(){
    $this = $(this);
    if($this.prop('checked'))
    {
        //$(".checkboxes").addClass("redd");
        $("#action_btn").show();
        $(".checkboxes").each(function(){
            $(this).prop('checked', true);
            $(this).parent().parent().addClass("redd");
        });
    }
    else
    {
        $(".checkboxes").prop("checked", false);
        $(".checkboxes").parent().parent().removeClass("redd");
        $("#action_btn").hide();
    }
});

$('#delete_button').on('click', function () {
        
      
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    var idds = [];
    if($('.checkboxes:checked').length > 0){
        $('.checkboxes:checked').each(function(){
            idds.push(Number($(this).val()));
        });
        delAll(idds);    
    }
  }
})
 
});

$('#cancelled_button').on('click', function () {
        
      
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, cancelled it!'
}).then((result) => {
  if (result.value) {
    var idds = [];
    if($('.checkboxes:checked').length > 0){
        $('.checkboxes:checked').each(function(){
            idds.push(Number($(this).val()));
        });
        cancelAll(idds);    
    }
  }
})
 
});


function delAll(ids)
{
       
         $.ajax({

            url:'<?php echo base_url("Order/delete_drivers_delivry") ?>',
            method:'post',
            data:{'bags_id':ids},
            success:function(res)
            {
              swal.fire("Deleted", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
                //   console.log(res);
                if(res){
                    location.reload(); 
                }
            },
            error:function(err)
            {
               
            }
        });
}

function cancelAll(ids)
{
       
         $.ajax({

            url:'<?php echo base_url("Order/cancel_drivers_delivery") ?>',
            method:'post',
            data:{'order_ids':ids},
            success:function(res)
            {
              swal.fire("Cancelled", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
                //   console.log(res);
                if(res){
                    location.reload(); 
                }
            },
            error:function(err)
            {
               
            }
        });
}





// ZUZI START
  function order_detail(ele){
        $("#v_data").hide();
        $("#loading").show();
        var order_id = $(ele).attr('pk');
        // alert(order_id);
        get_order_by_id(order_id);
        // console.log('hiiiiiiiiiiiiii i am innnn order detail');
    }
    
    
    function get_order_by_id(id){
        //hide_error();

        var url = "<?php echo base_url(); ?>"+"order/get_order_by_id_for_edit_";
        $fields = {'order_id':id};
        $.post(url, $fields, function(response){
            if(response.success){
                var details = response.detail;
                var order_summery_detail = set_order_summery(details);
                $("#v_summery_data").empty();
                $("#v_summery_data").append(order_summery_detail);
                
                
                
               $('.main .search_option_new').select2({
                  
                      
                         placeholder: "Select an Option",
                         
                      });
               
               $('#order_area').val(details[0].areaID);
               $('#order_area').trigger('change');
               $('#order_shift').val(details[0].delivery_time);
               $('#order_shift').trigger('change');
               
               
                //$("#v_data").show();
                $("#loading").hide();
            }
        },'json');
    }
    
    
    base_url = '<?php echo base_url() ?>';
    function set_order_summery(summery_details){

        var summery = summery_details[0];
        

        //set order status
        // $("#mod_title").html('Basic Details ');

                                 
        var  summery_data = '<div class="row"><div class="note note-warning col-lg-12" style="background-color: #E8F6FC;margin-bottom: 5px;">';
        summery_data += '<h4 class="block">Delivery Details</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>ORDER ID : </strong>'+summery.delivery_id+'</li>';
       
        
        summery_data += '<li><strong>Delivery Date : </strong>'+summery.delivery_date+'</li>';
        summery_data += '<li><strong>Delivery Time : </strong>'+summery.delivery_time+'</li>';
        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        
        name = summery.name_on_delivery;
        if(summery.name_on_delivery==""){
            name = summery.customer;
                    
        }
        
        
        summery_data += '<h4 class="block">Customer Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+name+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.c_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        
        summery_data += '<h4 class="block">Partner Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+summery.vendor+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.v_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        
        
        summery_data += '</div>';
       
       
       
        

      


        
        // bags info
     summery_data += '<div class="note note-info col-lg-12" style="background-color: #E8F6FC;margin-bottom: 5px""  >';
        summery_data += '<h4 class="block">Other Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<form action="<?php echo base_url('order/edit_unassigned_delivery_info/')?>'+summery.delivery_id+'" method="post">';
        // summery_data += '<input type="text" style="display:none;" id="edit_order_id" name="edit_order_id" value="'+summery.delivery_id+'" />';
        summery_data += '<input type="text" style="display:none;" id="dt" name="dt" value="'+summery.d_dt+'" />';
        summery_data += '<input type="text" style="display:none;" id="emirate_id" name="emirate_id" value="'+summery.emirateID+'" />';
        summery_data += '<input type="text" style="display:none;" id="partner_id_is" name="partner_id_is" value="'+summery.vendor_id+'" />';

      summery_data += '<div class="row">';
    //   Area and timeSlot
        summery_data += '<div class="col-md-6"><div class="form-group"><label for="field-44" class="control-label">Area *</label><div class="main"><select class="search_option_new form-control" name="order_area" id="order_area" required><option value="">Select Area</option><?php foreach($areas AS $area): ?><option value="<?php echo $area->area_id ?>"><?php echo $area->area_name ?></option><?php endforeach; ?></select></div></div></div>';
        summery_data += '<div class="col-md-6"><div class="form-group"><label for="field-44" class="control-label">Emirate With Time*</label><div class="main"><select class="search_option_new form-control" id="order_shift" name="order_shift" required><option value="">Select Emirate with Time</option><?php foreach($dtypes AS $dtype): ?><option><?php echo $dtype ?></option><?php endforeach; ?></select></div></div></div>';
        // 
         summery_data += '</div>';
         
         
        //  Delivery address
        
        summery_data += '<div class="row"><div class="col-md-8"><div class="form-group"><label for="field-33" class="control-label">Delivery Address *</label><textarea type="text" class="form-control" id="field-33" placeholder="Address" name="del_address" required>'+summery.delivery_address2+'</textarea></div></div>';
         summery_data += '</div>';
        // 


        // PickUP
         summery_data += '<div class="row"><div class="col-md-8"><div class="form-group"><label for="field-3" class="control-label">Pickup Address*</label><input type="text" value="'+summery.pickUp+'" class="form-control" id="field-3" placeholder="Address" name="order_pickup" required></div></div></div>';  
        
        summery_data += '<div class="row">';
        //Notification
        
          
           summery_data += '<div class="col-md-4"><div class="form-group"><label for="field-44" class="control-label">Notification *</label><select  class="form-control" name="notification" required>';
           if(summery.send_notification =='Yes'){
               summery_data += '<option selected>Yes</option><option>No</option></select></div></div>';
           }else{
               summery_data += '<option >Yes</option><option selected>No</option></select></div></div>';
           }
           
           
         // Product Type
         summery_data += '<div class="col-md-8"><div class="form-group"><label class="control-label">Product Type</label><input class="form-control" name="product_type" value="'+summery.food_type+'"> </div></div>';
         summery_data += '</div>';
         
         summery_data += '<div class="row">';
       
        //  Notes and Payment
        summery_data += '<div class="col-md-8"><div class="form-group no-margin"><label for="field-7" class="control-label">Notes</label><textarea  name="order_note" class="form-control" id="field-7" placeholder="Write something about Order">'+summery.note+'</textarea> </div></div>';
        summery_data += '<div class="col-md-4"><div class="form-group"><label class="control-label">Delivery Amount</label><input class="form-control" value="'+summery.delivery_amount+'" name="Delivery_Amount" id="Delivery_Amount" placeholder="(AED)" oninput="javascript:validity.valid||(value=\' \');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type = "number" maxlength = "8" step="0.01" min="0" /></div></div>';
        summery_data += '</div>';
        
        
        //Google link
        
        if(summery.google_link_addrs !=''){
               var gogle_adrx=JSON.parse(summery.google_link_addrs);
              var gadx=gogle_adrx.google_link;
               }else{
                     var gadx="None";
                     }
                                             
        summery_data += '<div class="row">';
        summery_data += '<div class="col-md-12"><div class="form-group"><label class="control-label">Google Link Address</label><textarea  class="form-control" type="text" name="google_link" id="google_link">'+gadx+'</textarea></div></div>';
        summery_data += '</div>';
       
       
    //   lili
        summery_data += '<br /><input name="hid_address" type="hidden" value="'+summery.delivery_address+'"/>';
summery_data += '<br /><input name="hid_cust_id" type="hidden" value="'+summery.customer_id+'"/>';
 

summery_data += '<br /><button class="btn btn-info" type="submit">Update</button>';
summery_data += '</form>';
        summery_data += '</ul>';
        summery_data += '</div>';
        
        
        
          
        
        
        return summery_data;
    }

// ZUZI ENDS


 
function build_table_and_data(e)
    {
        myel = null;
        if(e)
        {
            myel = e.target;
            myel.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        }
        $('#order_table').dataTable().fnDestroy();
        $("#table_body").empty();
        from_date = $("#from_date").val();
        to_date = $("#to_date").val();
        var option = 'Not Assign';
        
         var partner_id=$("#partner_list").val();
        var emirate_id=$("#emirate_list").val();
        var time_id=$("#time_list").val();
        
        console.log(from_date, '*****', to_date);
        
        //   "pageLength" : 10,
        // alert('hallo');
       un_assign_table= $('#order_table').DataTable({
        
        "processing": true,
        "serverSide": true,
        
        "ajax": {
            "url": "<?php echo base_url('report/get_deliveries_report_by_notAssigned_paginated') ?>",
            "type": "POST",
            "data": {'start_date':from_date, 'end_date':to_date, 'status':option,'id':partner_id,'time_id':time_id,'emirate_id':emirate_id},
            "dataSrc": function(res){
                // console.log(res)
                if(myel)
                {
                    myel.disabled = false;
                    myel.innerHTML = 'Get Records <i class="icon-plus"></i>';    
                }
               
                for(let i =0; i < res.data.length; i++)
                {   
                    
                    // console.log(res.data[i]);
                    // res.data[i].countie=Number(i)+Number(1);
                   
                     if( res.data[i].new_delivery_check){
                               res.data[i].rw= '<tr class="gradeX " id="'+  res.data[i].order_id+'">';
                            //   $(row).addClass('gradeX');
                            //   $(row).addClass('new_deliv');
                             res.data[i].suggestion= '<td >'+res.data[i].suggested_driver_name+'</td>';
                          }else{
                               res.data[i].rw= '<tr class="gradeX" id="'+res.data[i].order_id+'">';
                               
                               if(res.data[i].suggested_driver_phone !=''){
                                    //   var dt__x = moment(res.data[i].date_was, "YYYY-MM-DD");
                                     var dt__x = moment(res.data[i].date_was + " 12:00", "DD-MM-YYYY HH:mm:ss").utc().format("dddd")
                                    // alert(dt__x);
                                      var fin_day=dt__x;
                                      
                                      res.data[i].suggestion= '<td><span title="Last assigned at:'+fin_day+'('+res.data[i].date_was+')">'+ res.data[i].suggested_driver_name +' <br>'+res.data[i].suggested_driver_phone+'</span></td>';
                                  }else{
                                      res.data[i].suggestion= '<td >N/A</td>';
                                  }                      
                          }
                          
                          
                     var the_str=res.data[i].delivery_address;
                     var the_res = the_str.split(",");
                     var the_ans= the_res[the_res.length - 1];
            
                     var the_str2=res.data[i].delivery_time;
                     var the_res2 = the_str2.split(",");
                     var the_ans2= the_res2[the_res2.length - 1];
            
            
            
            res.data[i].checki= '<td><input type="checkbox" class="checkboxes" value="'+ res.data[i].order_id+'" style="zoom: 2.5;" data-area_id="'+ res.data[i].areaID+'" data-emi_id="'+res.data[i].emirateID+'"  data-slot_id="'+res.data[i].slotID+'"  data-n="'+the_ans+','+the_ans2+'" /></td>';
          
         
            
                 <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                  var urlencodedtext="Dear Client,%0a%0aGood Day!%0a%0aWe have a meal plan delivery for you from "+res.data[i].vendor+" but unfortunately there is a slight delay in your area because of a unforeseen event, We are trying our best to reach you at the earliest, Sincere apologies for the inconvenience.%0a%0aMany Thanks for your patience and understanding.%0a%0a Regards,TEAM LOGX";
                  res.data[i].customer_= '<td><a title="Click here to start whatsApp chat" target="_blank" href="https://wa.me/'+res.data[i].c_phone+'/?text='+urlencodedtext+'"  data-placement="left">'+res.data[i].customer +' '+ res.data[i].c_phone+' </a></td>';
                <?php }else{ ?>   
                   res.data[i].customer_= '<td >'+ res.data[i].customer +' '+ res.data[i].c_phone +'</td>';
                  <?php } ?>
            
             res.data[i].delivery_address= '<td id="cucc2"><div id="truncateLongTexts">'+ res.data[i].delivery_address + '</div></td>';
               res.data[i].note= '<td id="cucc2"><div id="truncateLongTexts">'+ res.data[i].note+ '</div></td>';
             res.data[i].time_= '<td >'+  res.data[i].delivery_date +' '+  res.data[i].delivery_time +'</td>';
           
            res.data[i].vend= '<td >'+ res.data[i].vendor +' '+ res.data[i].v_phone +'</td>';
            
           
             if(res.data[i].google_link_addrs !=''){
                 var obj = JSON.parse(res.data[i].google_link_addrs);
                   res.data[i].google_link_= '<td id="cucc2"><div id="truncateLongTexts">'+obj.google_link +'</div></td>';
             }else{
                 res.data[i].google_link_= '<td id="cucc2"><div id="truncateLongTexts">'+ 'None' +'<div></td>';
             }
             
             
              <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>    
          res.data[i].action= '<td><a class="" title="Edit" data-toggle="modal" onclick="javascript:order_detail(this)" href="#myModal" pk="'+res.data[i].order_id+'"><i class="mdi mdi-square-edit-outline" style="font-size: x-large;"></i></a></td>';
            <?php } ?>  
           
                    
                    
                    
                    
                }
                // console.log(res.data);
                return res.data;
            }
        },
         "rowId": "rw",
         "createdRow": function( row, data, dataIndex){
            //  alert(data['suggestion']);
                if( data['suggestion'] ==  `<td >New Delivery</td>`){
                    $(row).addClass('new_deliv');
                }
             
         },
        "columns": [
            { "data": "checki" , "orderable": false},
            { "data": "order_id" , "orderable": true},
            { "data": "suggestion", "orderable": true},
            { "data": "plan_id", "orderable": false},
            { "data": "customer_" , "orderable": true},
            { "data": "delivery_address", "orderable": false},
            { "data": "note", "orderable": false},
            { "data": "time_" , "orderable": true},
            
           
            { "data": "vend" },
            { "data": "created" },
            { "data": "pickUp", "orderable": false},
              { "data": "food_type", "orderable": false},
            { "data": "send_notification", "orderable": false},
            { "data": "delivery_amount"},
            { "data": "company_note"},
            { "data": "google_link_"},
           <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>    
        
            { "data": "action", "orderable": false}
               <?php } ?>  
        ],
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
          
           "lengthMenu": [[ 50, 100, 200, 300, 500, 1000, 3000], [ 50, 100, 200, 300, 500, 1000, 3000]]

    });
    }


<?php if($this->session->flashdata('success')){ ?>

swal.fire('','Data Updated Successfully','success');
<?php }else if($this->session->flashdata('error')){ ?>
swal.fire('','Something went wrong. Try Again','error');
<?php } ?>


</script>



       
    </body>
<style type="text/css">
        .redd{
            background: lightblue;
        }

        .redd:hover{
            color: black !important;
        }
        th{
        padding: 0.5px !important;
        width: 1.4063px;
        vertical-align: middle !important;
}

div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
}
.fixed-table-container thead th .th-inner {
    padding: .0rem !important;
    margin-bottom: 14px;
}
  .activee {
  background: gold !important;
}      



.modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 110%;
    pointer-events: auto;
    background-color: #485561;
    background-clip: padding-box;
    border: 0 solid transparent;
    border-radius: .2rem;
    outline: 0;
}

.new_deliv{
    color: #197990;
   font-weight: bold;
    background-color: #ffa;
}

    </style>
</html>