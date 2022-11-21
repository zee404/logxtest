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
        <link href="<?php echo base_url('assets/libs/select2/select2.min.css') ?>" rel="stylesheet" type="text/css" />           
        <!--<link href="<?php echo base_url('assets/libs/switchery/switchery.min.css') ?>" rel="stylesheet" type="text/css" />-->

        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
             .columns {
            float: right!important;
            display: none;
        }
        td, th {
         border: 1px solid #dddddd;
        }
        .yellow {
          background-color: lightblue;
        }
                    .btn-danger {
            color: #fff;
            background-color: #197990 !important;
             border-color: white;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #00b6eb;
            border-color: #7e57c2;
        }
        .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

        }
  
        .badge {
            color: #72747b;
            font-size: 10.5px !important;
        }
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-top: -32px;
        }
        .badge {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            /* text-align: center; */
            white-space: unset;
            vertical-align: baseline;
            border-radius: .25rem;
            -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        }
        
        .big{ width: 20em; height: 20em; }
        
        .radio label::before {
    background-color: transparent;
    border-radius: 50%;
    border: 3px solid #008bb1;
    content: "";
    display: inline-block;
    height: 22px;
    left: 0;
    margin-left: -18px;
    position: absolute;
    -webkit-transition: border .5s ease-in-out;
    transition: border .5s ease-in-out;
    width: 22px;
    outline: 0!important;
}

.radio label::after {
    -webkit-transform: scale(0,0);
    background-color: #00b8ee;
    border-radius: 50%;
    content: " ";
    display: inline-block;
    height: 14px;
    left: 6px;
    margin-left: -20px;
    position: absolute;
    top: 4px;
    transform: scale(0,0);
    -webkit-transition: -webkit-transform .1s cubic-bezier(.8,-.33,.2,1.33);
    transition: -webkit-transform .1s cubic-bezier(.8,-.33,.2,1.33);
    transition: transform .1s cubic-bezier(.8,-.33,.2,1.33);
    transition: transform .1s cubic-bezier(.8,-.33,.2,1.33),-webkit-transform .1s cubic-bezier(.8,-.33,.2,1.33);
    width: 13px;
}
        
        
    /*    div.dataTables_wrapper {*/
    /*    width: 800px;*/
    /*    margin: 0 auto;*/
    /*}*/
    
     
            .card-box{
                 background: #36404a;
                 color:white;
            }
            
            
            
            
            .switch {
  position: relative;
  display: inline-block;
  width: 120px;
  height: 34px;
}

.switch input { display:none; }

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  position: absolute;
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  transform: translateX(86px);
}

/*------ ADDED CSS ---------*/
.Active
{
  display: none;
}

.Active, .Deactivate
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked + .slider .Active
{ display: block; }

input:checked + .slider .Deactivate
{ display: none; }

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">  Partner </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customer List</a></li>
                                  
                                </ol>
                            </div>
                            <!--  <?php echo validation_errors();?>
            
                            <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-success" id="error" style="align-content: center; background-color: red;">
                                <?php echo $this->session->flashdata('error') ?>
                            </div>
                            <?php } ?>
                               <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success" id="success" style="align-content: center; background-color: green;color: white;">
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                            <?php } ?> -->
                            <h4 class="page-title"> Customer List</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                             <?php echo form_open_multipart('driver/upload_drivers_by_general_file'); ?>
                              
                                   
                                <!--<button type="button" id="new_cust_btn" class="btn blue" onclick="open_modal()" style="color: #fff;background-color: #197990 !important;border-color: white;">Add New Cutomer</button>-->
                        
                        
                        
                        
                        
                        
                        
                        <!--      <input type="file" name="userfile"class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="" data-overlaycolor="#38414a" style="width: 250px;height: 35px;margin-left: 597px;">
                               <a href="#custom-modals" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i>CSV Tips</a> -->
                                
                                   <br>
                                 
                                 
                                   <!--<button style="margin-left: 166px;margin-top: -55px;color: #fff;background-color: #197990 !important;border-color: white;" disabled class="btn btn-secondary buttons-csv buttons-html5 button" tabindex="0" id="button" aria-controls="demo-custom-toolbar" type="button" ><span>Delete</span></button>-->

                                    <br>
                            <?php echo form_close(); ?>
                            <!--<div class="">-->
                              <div class="card-box" style="overflow-x: auto;">  
                                      
              

                            <table  id="demo-custom-toolbar1" class="example table table-responsive table-bordered dataTable" style="display: table; overflow-x: auto;" >

                                <thead class="thead-light">

                                <tr>
                                    <th class="table-checkbox"><input type="checkbox"  class="group-checkable checkAll" ></th>
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th data-field="pid" data-sortable="true" data-formatter="">Customer Code</th>
                                    <th data-field="name" data-sortable="true">Full Name</th>
                                    <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Phone</th>
                                    <th data-field="email" data-sortable="true" data-formatter="dateFormatter">Email</th>
                                    <?php if (strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                    <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Partner</th>
                                <?php } ?>
                                    <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Address</th>
                                    
                                    <th data-field="qq" data-align="center" data-sortable="true" data-formatter="">Password</th>
                                    
                                    <th data-field="recent_loc" data-align="center" data-sortable="true" data-formatter="">Recent Location</th>
                                    <th data-field="loc_img" data-align="center" data-sortable="true" data-formatter="">Location Image</th>
                                    
                                    <th data-field="action" data-align="center" data-sortable="true" data-formatter="statusFormatter">Action</th>
                                    <th data-field="mealplan" data-align="center" data-sortable="true" data-formatter="statusFormatter">MealPlanner Status
                                   </th>
                                     
                                    

                                </tr>
                                </thead>

                                <tbody>

                                    <?php 
                                    // if ($customers) {
                                    //  foreach ($customers as $key => $customer) {?>
                                        <!-- <tr>
                                           <td><input type="checkbox" class="checkboxes" value="<?php// echo $customer->id;?>"  id=""   name="checkbox"></td>
                                            <td ><?php //echo $key+1;?></td>
                                            <td ><?php //echo ucfirst($customer->full_name);?></td>
                                            <td ><?php //echo $customer->phone;?></td>
                                            <?php// if (strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                            <td ><?php //echo $customer->vendor;?></td>
                                            <?php// } ?>
                                            <td ><?php //echo $customer->address;?></td>
                                            <td ><a class="" title="Edit" href="#" onclick="get_customer_by_id(<?php //echo $customer->id ?>)">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a></td>

                                           
                                        </tr> -->
                                    <?php //} } ?>


                                
                                </tbody>

                            </table>
                       
                           </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>
 <div id="responsive" class="modal fade"  aria-hidden="true">
                <div class="modal-dialog" style="width: 500px">
                    <div class="modal-content" style="min-width: 150%;">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            
                            <h4 class="modal-title " id="mod_title" style="color: white;">Add Customer</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="add_vendor_form" action="<?php echo base_url('Customer/save_customer_meta_edit') ?>" method="post" class="horizontal-form" >
                                   
                                    <input type="hidden" name="customer_id" id="customer_id">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            
                                             <label for="">Customer Code*</label>
                                            <div class="form-group " id="visib_blk" >
                                                
                                                <input type="text" name="customer_code" id="customer_code" class="form-control" disabled>
                                            </div>
                                        
                                        
                                        
                                        
                                       
                                        <div class="form-group" style="" id="visib_unblk">
                                       
                                           
                                            <!--<input type="text" name="s_pass" placeholder=""  class="form-control" required="" id="s_pass">&nbsp;&nbsp;&nbsp;<span class="input-group-btn">-->
                                            <input type="text" name="customer_codetw" id="customer_codetw" class="form-control"  >&nbsp;&nbsp;&nbsp;<span class="input-group-btn">
                                            <button style="color:white;background-color: black;" class="btn btn-default" type="button" onclick="gen_code()"><span class="glyphicon glyphicon-lock" aria-hidden="true">  </span> Generate Code</button>
                                            </span>
                                        </div>
                                        <span id="s_pass_sp"></span>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Full Name</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Email</label>
                                                <input type="text" name="email" id="email" class="form-control" >
                                                <span id="mailcheckmsg" style="color: red"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Phone<span class="required">*</span></label>
                                                <input type="text" name="phone" placeholder="971123456789" id="phone" class="form-control" onchange="check_phn()"  required >
                                            </div>
                                        </div>

                                      
                                        
                                        <div class="col-sm-6">
                                        <div class="input-group" style="margin-top: 22px;">
                                            <input type="text" name="s_pass" placeholder="Password Here" class="form-control"  id="s_pass" required>&nbsp;&nbsp;
                                        <span class="input-group-btn">
                                        <button style="background-color:black;" class="btn btn-default" type="button" onclick="gen_password()"><span class="glyphicon glyphicon-lock" aria-hidden="true">
                                        </span> Generate </button>
                                        </span>
                                        </div>
                                        </div>
                                        
                                        
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                            <label class="control-label">Notifications<span class="required">*</span></label>
                                                <div class="radio " style="margin-bottom: 8px;">
                                                   <input   type="radio" name="send_notification" id="Yes" value="Yes">
                                                   <label   for="Yes">
                                                     Yes
                                                   </label>
                                                 </div>
                                               
                                                 <div class="radio">
                                                    <input  type="radio" name="send_notification" id="No"  value="No">
                                                    <label  for="No">
                                                      No
                                                    </label>
                                                  </div>
                                                
                                     </div>
                                 </div>
                                        
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Notes<span class="required">*</span></label>
                                               
                                               
                                                 <textarea name="user_notes" id="user_notes"  class="form-control" rows="4" cols="15">  </textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                           <br><br>
                                           <label class="control-label">-------Address Details-------</label>
                                           <br><br>
                                            </div>
                                        
                                       
                                            
                                            
                                       <!--  <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label"> Delivery Time </label>
                                                <input type="time" name="time" id="Delivery_time" class="form-control">
                                            </div>
                                        </div> -->
                                        

                                        
                                        
                                        
                                        
                                        <!--Default Address-->
                                        
                                          <!--<div class="col-md-6">-->
                                          <!--  <div class="form-group ">-->
                                          <!--      <label class="control-label">Default Address</label>-->
                                          <!--      <select name="address" id="address" class="form-control">  </select>-->
                                          <!--  </div>-->
                                          <!--</div>-->
                                          
                                          
                                        
                                       <div class="delivery_firstbox">
                                    <div class="row" id="delivery_row_block_0">
                                   
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="control-label">Address*</label>
                                                <textarea name="mul_address[]" id="mul_address" class="form-control" rows="4" cols="50" required>  </textarea>
                                            </div>
                                            
                                            
                                            <input type="hidden" name="delivHid[]" value="" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label class="control-label">Google Link</label>
                                                <textarea name="google_address[]" id="google_address" class="form-control" rows="6" cols="30">  </textarea>
                                            </div>
                                        </div>
                                        
                                         <div class="col-sm-3">
                                            <label for="emirate">Emirate With Area*</label>
                                            <select name="delivery_emirate[]" id="emirate" class="search_option form-control" required>
                                                
                                                
                                                <?php if(count($areas)>0){ foreach($areas as $akey => $avalue){ echo '<option value="'.$avalue->area_id.'" >'.$avalue->area_name.' </option>' ; } } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="service_type">TimeSlot With Emirate*</label>
                                            <select name="delivery_service_type[]" id="service_type" class="search_option form-control" required>
                                                
                                                <?php if(count($timeslot)>0){ foreach($timeslot as $tkey => $tvalue){ echo '<option value="'.$tkey.'" >'.$tvalue.' </option>' ; } } ?>
                                            </select>
                                        </div>
                                        
                                        
                                         <div class="col-sm-2" id="btn_box_0">
                                            <button id="add_delivery_row_btn_0" onclick="add_new_deliver_row(0)" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="ADD NEW ADDRESS"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button id="remove_delivery_row_btn_0" onclick="remove_delivery_row(0)" type="button" style="background: black;color: white;margin-top: 26px; display: none;" class="btn green" title="REMOVE"><i class="icon-close"></i></button>
                                        </div>
                                        
                                        
                                        
                                    </div> <!--end of fisrt row block-->
                                    <hr>
                                </div>
                                
                                <div class="delivery_pricing-box"></div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        

                                    </div>

                               
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="save_vendor_btn" type="submit" class="btn green abc"style="background: black;color: white;">Save</button>
                            <!--<button id="edit_vendor_btn" onclick="update_vendor()" type="button" style="background: black;color: white;" class="btn green abcd"  >Update</button>-->
                            <!--<button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" style="background: black;color: white;" class="btn default">Close</button>-->
                             <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>
                       
                        </div>
                         </form>
                    </div>
                </div>
            </div>
  
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
<!-- shan -->
        <!-- Vendor js -->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>
           <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
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

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script> 
         <!--<script src="<?php echo base_url() ?>assets/libs/switchery/switchery.min.js"></script>-->

        <script type="text/javascript">
            function open_modal()
            {
                document.querySelector("#add_vendor_form").reset();
                $("#mod_title").text("Add New Customer");
                $("#responsive").modal();
            }

        $("table").hide();
$(document).ready(function () {
    // $('.switcher').prop('checked', true);
            
            <?php if (!empty($this->session->flashdata('error'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('error') ?>';
                swal(msgg, "", "error");
            <?php } ?>

            <?php if (!empty($this->session->flashdata('success'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('success') ?>';
                swal(msgg, "", "success");
            <?php } ?>

                 setTimeout(function(){
            $("#success").fadeOut("slow");
            }
            , 5000);
                setTimeout(function(){
            $("#error").fadeOut("slow");
            }
            , 5000);
              $('input[name="checkbox"]').on('change', function() {
          $(this).closest('tr').toggleClass('yellow', $(this).is(':checked'));
        });
            setTimeout(function(){
                $("table").show();
                }, 2000);


              $('#abc').on('click', function () {
               swal("Delete", "Successfully Delete", "success");
              });
              
              $('.search_option').select2({
                       placeholder: 'Select an option'
                     });
                     
            //   $('.swictherz').switchery({
                 
            //   })         

         
    var checkinn=$('.example').DataTable( {
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
        "lengthMenu": [[ 10, 25, 50, 75, 100,-1], [ 10, 25, 50, 75, 100,"All"]],
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('Customer/get_all_customers'); ?>",
            "type": "POST"
            
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }],
       
        
      
    });
    
   
    

    
   
     
});
        </script>
        <script type="text/javascript">
  var tmp = [];
   $(document).ready(function () {

  
  
  $(document).on('change', "input[name='checkbox']", function() {
      $("#button").prop('disabled', !$("input[type='checkbox']:checked").length);
  var checked = $(this).val();
    if ($(this).is(':checked')) {
      tmp.push(checked);
    }else{
    tmp.splice($.inArray(checked, tmp),1);
    }
  });
 
  $('#button').on('click', function () {
      
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
    delAll();
  }
})
     
          
     
  });
  
});


function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
        // hide_error();
        location.reload();
    }



function delAll()
{
    $.ajax({
            url:'<?php echo base_url("Customer/del") ?>',
            method:'post',
            data:{ids: tmp.join()},
            success:function(res)
            {
               swal.fire("Deleted", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
               window.location.reload();
            },
            error:function(err)
            {
                console.log('not Delete');
            }
        });
}
 $(document).on('change', '.checkAll', function(){
        $this = $(this);
        tmp = [];
        $("#button").prop("disabled", !$this.prop('checked'));

        $("tbody").find("input[type='checkbox']").each(function(){
             
            if($this.prop('checked'))
            {
                tmp.push($(this).val());
              $(this).prop('checked', true);
              $(this).parent().parent().addClass('yellow');
            }
            else
            {
                $(this).prop('checked', false);
                 $(this).parent().parent().removeClass('yellow');
            }
        });
    });

</script>
        <script type="text/javascript">
    jQuery(document).ready(function() {
        var link_id = 'manage_upload_customers';
       // App.side_Menu(link_id);
    });


    function get_customer_by_id(id){
        $("#mod_title").text("Edit Customer");
        document.querySelector("#add_vendor_form").reset();
        $("#responsive").modal();
        var url = "<?php echo base_url(); ?>"+"Customer/get_customer_by_id";
        $fields = {'customer_id':id};
        $.post(url, $fields, function(response){
            if(response.success) {
                // console.log(response);
                var vendor = response.customer[0];
                var areas = response.areas;
                var timeslot = response.timeslot;
                console.log('i am edit response');
                console.log(vendor);
                
                //  console.log(areas);
                //   console.log(timeslot);
                  if(vendor.mul_address !=''){
                  var default_opt=JSON.parse(vendor.mul_address);
                  
                //   console.log(default_opt);
                  }else{
                      var default_opt=[];
                  }
                //   console.log(default_opt[0].address);
                  
                //   var mySelect = $('#address');
                //           $.each(default_opt, function(val, text) {
                //               mySelect.append(
                //                   $('<option></option>').val(val).html(text)
                //               );
                //           });
                
                if(vendor.customer_id=='' || vendor.customer_id=='0'){
                    $("#visib_blk").hide();
                    $("#customer_code").val('');
                     $("#customer_codetw").val('');
                    $("#visib_unblk").show();
                }else{
                
                   $("#customer_code").val('');
                     $("#customer_codetw").val('');
                     $("#visib_blk").show();
                    $("#visib_unblk").hide();
                    
                    
                }
                 
                
                
                
                //Addrsses  
            for(let i = 0; i < default_opt.length; i++){
                
                let childArray = default_opt[i];
                 if(i>0){
                     var idd=childArray.id;
                     var jj=i-1;
                     console.log('i am jj:'+jj);
                        add_new_deliver_row(jj);
                    }
             console.log('i am deliv qouts counter of i :'+i);
            $('#delivery_row_block_'+i+' >div>select[name="delivery_emirate[]"]').val(childArray.area_id).trigger('change');
              <?php //if($this->uri->segment(2)=='edit') { ?> 
                        
                            // var emirate_selected= $("#delivery_row_block_"+i+">div>select[name='delivery_emirate[]']>option:selected").text();
                            // var temp_id='delivery_row_block_'+i;
                            //  ConServiceSelector="#"+temp_id+">div>select[name='delivery_service_type[]']";
                            //  dynamicConServiceOptions(emirate_selected,ConServiceSelector);
          <?php //} ?>
           
            $('#delivery_row_block_'+i+' >div>select[name="delivery_service_type[]"]').val(childArray.emirate_id+','+childArray.slot_id).trigger('change');
            $('#delivery_row_block_'+i+' >div>div>textarea[name="mul_address[]"]').val(childArray.address);
            $('#delivery_row_block_'+i+' >div>div>textarea[name="google_address[]"]').val(childArray.google_link_addrs);
            $('#delivery_row_block_'+i+' >div>input[name="delivHid[]"]').val(i);
            
            
             $("#remove_delivery_row_btn_"+i).attr("onclick","delete_rows_('"+i+"','d', '"+i+"')");
        // $("#remove_delivery_row_btn_"+i).attr("onclick","delete_rows_('"+i+"','d', '"+childArray.id+"')");
      //document.getElementById("remove_delivery_row_btn_"+i+").attribute("onclick","new_function_name()");
          
                  
            
         }
                  
                
                  
                  
                  
                   
                
                $("#name").val(vendor.full_name);
                $("#email").val(vendor.email);
                $("#phone").val(vendor.phone);
                // $("#address").val(vendor.address);
                $("#s_pass").val(vendor.Password_partner);
                $("#customer_id").val(vendor.id);
                
                $("#customer_code").val(vendor.customer_id);
                
                // welcome
                $("textarea#user_notes").val(vendor.user_notes);
                // $("#send_notification").val(vendor.send_notification);
                var anyi=vendor.send_notification;
                console.log(anyi);
                if(anyi!="")
                $("#"+anyi).prop('checked', true);
                
                
                
                // $("#mul_address").val(vendor.address);
                
              
            }
        },'json');
    }
$("#email").change(function(e){
    var email = $(this).val();
    console.log("Called email fun");
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('Vendor/check_email_validation') ?>",
        data:{email:email,role_type_id:4},
        success:function(response){
            console.log("response:"+response);
            if (response == "already available") {
                $("#mailcheckmsg").text("Email ("+email+") Already exist");
                $("#email").val("");
            }else{
                $("#mailcheckmsg").text("");
            }

        }
    });
});




function gen_code()
{
    var first2=$("#name").val().substring(0, 2).toUpperCase();
    
    $("input[name='customer_codetw']").val(first2+'-'+Math.random().toString(36).substr(2, 5));
    var st=$("#customer_codetw").val();
    $('#s_pass_sp').css("color", "green");
                                                 
     $("#s_pass_sp").text("Checking...");
      
      $.ajax({
                                        type:"POST",
                                        url:"<?php echo base_url('MonthlyMeal/check_PU_validation') ?>",
                                        data:{PU:st,role_type_id:77},
                                        success:function(response){
                                            console.log("response:"+response);
                                            if (response == "already available") {
                                                $('#s_pass_sp').css("color", "red");
                                                $("#s_pass_sp").text("Code ' ("+st+") ' Already exist");
                                                $("#s_pass").val("");
                                            }else{
                                                 $('#s_pass_sp').css("color", "green");
                                                 $("#s_pass_sp").text("Available");
                                                 specialcharecter();
                                            }
                                
                                        }
                                    });
}

 // Validate PU CODE //
        $("#customer_codetw").on('change', function () {
            
                    console.log('pura_code testing');
                   
                    $text = $(this);
                    var st=$('#customer_codetw').val();
                    
                    //  var test = st.substring(0, 3);
                    //  var alphaExp = 'PU-';
                    //  var x=$text.val();
                    
                     var test_l=st.length;
                   
                     if (test_l >=1) {
                        //  $('#s_pass').val() =x ;
                         $('#customer_codetw').css("border", "1px solid green");
                           $('#s_pass_sp').text("Checking...");
                         $('#s_pass_sp').css("color", "green");
                         
                         
                               $.ajax({
                                        type:"POST",
                                        url:"<?php echo base_url('MonthlyMeal/check_PU_validation') ?>",
                                        data:{PU:st,role_type_id:77},
                                        success:function(response){
                                            console.log("response:"+response);
                                            if (response == "already available") {
                                                $('#s_pass_sp').css("color", "red");
                                                $("#s_pass_sp").text("Code ' ("+st+") ' Already exist");
                                                $("#customer_codetw").val("");
                                            }else{
                                                 $('#s_pass_sp').css("color", "green");
                                                 
                                                $("#s_pass_sp").text("Available");
                                                specialcharecter();
                                            }
                                
                                        }
                                    });
                          
                         
                
                     }else{
                         $('#customer_codetw').val('');
                         $('#customer_codetw').css("border", "1px solid red");
                        //  $('#s_pass').attr("Only 4 Numbers Allow After 'PU-' !");
                         $('#s_pass_sp').text("Customer Code is Compulsory !");
                         $('#s_pass_sp').css("color", "red");
                     }
                     
                     
              
        });


 function gen_password()
{
    $("input[name='s_pass']").val(Math.random().toString(36).slice(-8));
}
 // Validate Phone //
        $(function () {
                $('#phone').keyup(function (e) {
                    var key = e.charCode || e.keyCode || 0;
                    $text = $(this);
                     var alphaExp = /^[0-9]+$/;
                     var x=$text.val();
                     
                     if (x.match(alphaExp)) {
                         $('#phone').val() =x ;
                         $('#phone').css("border", "1px solid green");
                           
                          
                         
                     }else{
                         $('#phone').val('');
                         $('#phone').css("border", "1px solid red");
                         $('#phone').attr("placeholder", "Only Numbers Allowed!");
                     }
                     
                     
                })
        });
        
        function check_phn(){
            var check_phn_leng = $('#phone').val();
            console.log(check_phn_leng);
            if(check_phn_leng.length > 5){
                $('#phone').css("border", "1px solid ");
                $('#phone').val() =check_phn_leng;
                
            }else{
                $('#phone').val('');
                 $('#phone').css("border", "1px solid red");
                 $('#phone').attr("placeholder", "Invalid!");
            }
        }
        
        // ...................//
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         var deliv_row_counter=0;
function add_new_deliver_row(id){
    
    
    //   var areas = '<?php //echo $areas; ?>';
    //     areas=JSON.parse(areas);
        
    //     //getting services from php
    //     var timeslot = '<?php //echo $timeslot; ?>';
    //     timeslot=JSON.parse(services);
    
    
    
    //getting values of emirates and service selected
    var emirate= $('#delivery_row_block_'+deliv_row_counter+' >div>select[name="delivery_emirate[]"]>option:selected').text();
    var service= $('#delivery_row_block_'+deliv_row_counter+' >div>select[name="delivery_service_type[]"]>option:selected').text();

    console.log('i am deliv counter JUst start  value:'+deliv_row_counter);
    if(emirate!='---Select---' && service!='' && service!='---Select---'){
        //producing new row
      //  id = parseInt(id) + 1;
       
          deliv_row_counter=deliv_row_counter+1;
     console.log('i am deliv counter after add a row:'+id+' and i am counter value:'+deliv_row_counter);
        var delivery_row = '<div class="row" id="delivery_row_block_'+deliv_row_counter+'"> <div class="col-md-4"> <div class="form-group"> <label class="control-label">Address</label> <textarea name="mul_address[]" id="mul_address" class="form-control" rows="4" cols="50" required> </textarea> </div> <input type="hidden" name="delivHid[]" value="" class="form-control"/> </div> <div class="col-md-3"> <div class="form-group "> <label class="control-label">Google Link</label> <textarea name="google_address[]" id="google_address" class="form-control rows="6" cols="30""> </textarea> </div> </div> <div class="col-sm-3"> <label for="emirate">Emirate With Area*</label> <select name="delivery_emirate[]" id="emirate" class="search_option2 form-control" required><?php if(count($areas)>0){ foreach($areas as $akey => $avalue){ echo '<option value="'.$avalue->area_id.'" >'.$avalue->area_name.' </option>' ; } } ?>        </select> </div> <div class="col-sm-3"> <label for="service_type">TimeSlot With Emirate*</label> <select name="delivery_service_type[]" id="service_type" class="search_option2 form-control" required><?php if(count($timeslot)>0){ foreach($timeslot as $tkey => $tvalue){ echo '<option value="'.$tkey.'" >'.$tvalue.' </option>' ; } } ?></select> </div>  <div class="col-sm-2" id="btn_box_0"><button id="remove_delivery_row_btn_'+deliv_row_counter+'" onclick="remove_delivery_row('+deliv_row_counter+')" type="button" style="background: black;color: white;margin-top: 26px; " class="btn green" title="REMOVE"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></div></div><hr>';
        $(".delivery_pricing-box").append(delivery_row);
       
        
        //getting original id back
        id = parseInt(deliv_row_counter) - 1;
        
        //making emirate and service uneditable after new row appended
        //  $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]').attr("disabled", true);
        // $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]').css('background-color', 'silver');
        
        // $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').attr("disabled", true);
        // $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').css('background-color', 'silver');
        
       
        
        //change icon only after current row processed successfully
        // $("#add_delivery_row_btn_"+id).hide();
         $("#remove_delivery_row_btn_"+id+1).show();
         
         
          $('.search_option2').select2({
                   placeholder: 'Select an option'
                   });
    }else{
        
        swal("Please Select Emirate and Time-Slot Carefully", "", "warning");
       
    }
}//function ends
function remove_delivery_row(id) {
    
    if(id !=deliv_row_counter){
        console.log('i am id not match counter is:'+deliv_row_counter);
        
    }else{
        deliv_row_counter=deliv_row_counter-1;
    }
     console.log('i am deliv counter after del a row:'+id+' and i am counter value:'+deliv_row_counter);
    //getting values of emirates and service selected (updating)
   
    // var emirate= $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]>option:selected').text();
    
    // var service= $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]>option:selected').text();
    
    $("#delivery_row_block_"+id).remove();
   
}


function specialcharecter()

            {

                var iChars = "!`@#$%^&*()+=[]\\\';,./{}|\":<>?~";   

                var data = $("#customer_codetw").val();

                for (var i = 0; i < data.length; i++)

                {      

                    if (iChars.indexOf(data.charAt(i)) != -1)

                    {    

                    alert ("Your string has special characters. \nThese are not allowed.");

                    $("#customer_codetw").val("");

                    return false; 

                    } 

                }

            }
            
            
//              if (checkinn) {
//   alert('im done');
//         $(document).find(".js-switchery").each(function(k,v) {
//       var elems = $(document).find('.js-switchery'+k);
//       var switchery = new Switchery(elems[0]);
//  });
//  if ($.fn.DataTable.isDataTable( '#example' ) ) {
    //  var elem = document.querySelector('.js-switchery');
    //   var init = new Switchery(elem);
// }





























function update_meal_plan_eligible(val,id){
     
    //   "$('#f-contact-us-active').is(':checked')
    //  alert($("#"+"togBtn"+id).is(':checked'));
    //  var ili=$("#"+"togBtn"+id).val();
    //  alert('ili'+ili);
    //  alert(id);
    
    var status=$("#"+"togBtn"+id).is(':checked');
       console.log('status is :'+status);
      
        var url = "<?php echo base_url(); ?>"+"customer/update_mealplan_customer_status";
       
        
                            
        // if(VAT_ && vat_id){
        
         
            $fields = {'val':val, 'id':id ,'status':status };
            $.post(url, $fields, function(response){
                if(response.success){
                    
                //     var msg = '<strong>Success!</strong>  Updated.';
                //   swal("Updated Successfully.", "", "success");
                   
                   swal({
     title: "Great",
     text: "Updated Successfully.",
     type: "success",
    showConfirmButton: false,
      timer: 1500
     });
    
                    
                    console.log('YESSS');
                    
                 }else{
                    swal.fire("Network Problem! Try again.","","error");
                    console.log('NOOOO');
                }
            },'json');
      
    }
</script>

<!--shan-->
       <?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>
    </body>
</html>