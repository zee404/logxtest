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

        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
             .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

        }
        div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
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
    color: lightseagreen;
    font-size: 11.5px !important;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Team </a></li>
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Outdoor Team </a></li>



                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Driver Accounts</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Driver Accounts</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="height: 150px !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    <div class="col-lg-3">
                         <div class="page-title-box">
                            
                            <h4 class="page-title" style="margin-top: -36px;">Manage Driver Accounts</h4>

                        </div>

                    </div>
                     <div class="col-lg-2"></div>
                     <div class="col-lg-3"></div>
                     <div class="col-lg-2">
             
                    <div id="" class="" >
                            <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;margin-top: -15px;border-color: white;">Add Balance &nbsp;<i class="icon-plus"></i></button>
                            </a>
                    </div>
                     </div>
                     
                      <div class="col-lg-2">
             
                    <div id="" class="" >
                            <a href="#responsive_n" onclick="javascript:show_model(this)" flag="add_r" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;margin-top: -15px;border-color: white;">Add Returns &nbsp;<i class="icon-plus"></i></button>
                            </a>
                    </div>
                     </div>
                 
                   
                </div>   
                
                  <div class="row"><p></p></div>
                 <div class="row">
                     
                      <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>" >
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?= date('Y-m-d'); ?>">
                                        <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to" id="to_date" value="<?php  echo date('Y-m-d', strtotime($cdate. ' + 1 days')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                     <div class="col-lg-3">
                         
                         <select class="form-control" name="search_option" id="search_option">
                            <option value="">--Select Driver--</option>
                            
                           <?php if (count($drivers) > 0) { ?>
                              <?php foreach($drivers as $data){ ?>
                               <option class="" value="<?php echo $data->id; ?>" > <?php echo  $data->full_name; ?> , <?php echo  $data->email; ?></option>
                               <?php } ?>
                
                <?php } ?>
                           
                            
                        </select>

                    </div> 
                    <div class="col-lg-2">
                          <div class="btn-group">
                                <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>
                        </div>
                                  

                    </div>
                    
                    
                </div>   
                            
                        
                        
               
                            
                          

                       
                         </div>  <!-- End of main card box -->
                         
                                    
                          
                              <!--Common Content Starts-->
                               
                  <div class="card-box hid" style="height: 150px !important;">                 
                 <div class="row">
  
                        <div class="table-responsive"> 
                         <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                                                 <th>Phone</th>
                                                 <th>Address</th>
                                                 <th>salary</th>
                                                 <th>Total Taken</th>
                                                 <th>Total Returned</th>
                                                 <th>Pending Dues</th>
                          </tr>
                        </thead>
                       
                         <tbody>
                             <td id="n"></td>
                             <td id="p"></td>
                             <td id="a"></td>
                             <td id="s"></td>
                             <td style="color:red;" id="tt"></td>
                             <td style="color:green;" id="tr">-</td>
                             <td id="pd"></td>
                             
                         </tbody>
                     </table>
                        </div>
                     
                    
                    
                    
                    
                
                
                </div>
                        
          </div>     
                        
                          <!--Common Content Ends--> 
                          
                          
                               <div class="card-box">  
                            
                            <table class="example" id="example" data-toggle="table" >

                                <thead class="thead-light">

                                <tr>
                                    
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    
                                    <th data-field="Fine" data-sortable="true">Date</th>
                                    <th data-field="Fine Date" data-sortable="true">Ammount</th>
                                    <th data-field="Fine Date" data-sortable="true">Ammount Type</th>
                                    <th data-field="Loan" data-sortable="true">Description</th>
                                
                                    <th data-field="Added" data-sortable="true">Added By</th>
                                   
                                    
                                    
                                    <th data-field="" data-align="center" data-sortable="true" data-formatter="">Action</th>
                                     
                                    

                                </tr>
                                </thead>

                                <tbody id="table_body">
                                   
                               
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

  
                 <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header"style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add Info</h4>
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            
                        </div>

                        <div class="modal-body">
                            

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>
                            
                           

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="add_area_form" action="#" method="post" class="horizontal-form-lg" >
                                    <input type="hidden" name="driver_info_id" value="" id="driver_info_id" class="form-control">

                                    <div class="row" id="driver_Selecet_portion">
                                        <div class="col-md-8">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Select Driver <span class="required">*</span></label>
                                                 <select class="form-control"  name="driver" id="driver">
                                                      <option value="">---Select---</option>
                                                           <?php if (count($drivers) > 0) { ?>
                                                              <?php foreach($drivers as $data){ ?>
                                                               <option class="" value="<?php echo $data->id; ?>"> <?php echo  $data->full_name; ?> , <?php echo  $data->email; ?></option>
                                                               <?php } ?>
                                                
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                     <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Full Name</label>
                                                <p id="name"> </p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Email </label>
                                                <p id="email" ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Phone</label>
                                                <p id="phone" ></p>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Address </label>
                                                <p id="address"></p>
                                            </div>
                                        </div>
                                      </div>  
                                      <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Current Salary </label>
                                                <p id="c_salary"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Pending Dues </label>
                                                <p id="pend"></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr><br>
                                     <div class="row">
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Amount <span class="required">*</span></label>
                                                <input type="number" name="ammount" id="ammount" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Date <span class="required">*</span></label>
                                                <input type="date" name="dates" id="dates" class="form-control" >
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Description </label>
                                                <input type="text" name="descrip" id="descrip" class="form-control" >
                                            </div>
                                        </div>
                                        
                                        
                                       
                                        
                                       
                                        

                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="save" type="button" onclick="save_()" class="btn green"style="background: black;color: white;">Save</button>
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn default"style="background: black;color: white;">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            
            
            
            <!-- Model for Add Returns-->
            
                           <div id="responsive_n" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header"style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <h4 class="modal-title" id="mod_title_r" style="color: white;">Add Return Info</h4>
                            <button type="button" onclick="close_model_r()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            
                        </div>

                        <div class="modal-body">
                            

                            <div id="error_container_r" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg_r"></p>
                            </div>
                            
                           

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="add_returns_form" action="#" method="post" class="horizontal-form-lg" >
                                    <input type="hidden" name="driver_info_r" value="" id="driver_info_r" class="form-control">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Select Driver <span class="required">*</span></label>
                                                 <select class="form-control"  name="driver_r" id="driver_r">
                                                      <option value="">---Select---</option>
                                                           <?php if (count($drivers) > 0) { ?>
                                                              <?php foreach($drivers as $data){ ?>
                                                               <option class="" value="<?php echo $data->id; ?>"> <?php echo  $data->full_name; ?> , <?php echo  $data->email; ?></option>
                                                               <?php } ?>
                                                
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                     <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Full Name</label>
                                                <p id="name_r" ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Email </label>
                                                <p id="email_r" ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Phone</label>
                                                <p id="phone_r" ></p>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Address </label>
                                                <p id="address_r" ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Pending Dues </label>
                                                <p id="total_due_r" ></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br><hr>
                                     <div class="row">
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Ammount<span class="required">*</span></label>
                                                <input type="number" name="ammount_r" id="ammount_r" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Receive Date <span class="required">*</span></label>
                                                <input type="date" name="receieve_date_r" id="receieve_date_r" class="form-control" >
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Description </label>
                                                <input type="text" name="descrip_r" id="descrip_r" class="form-control" >
                                            </div>
                                        </div>
                                        
                                        
                                        
                                      
                                        

                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="save" type="button" onclick="return_()" class="btn green"style="background: black;color: white;">Save</button>
                            <button id="responsive_n" onclick="close_model_r()" type="button" data-dismiss="modal" class="btn default"style="background: black;color: white;">Close</button>
                        </div>

                    </div>
                </div>
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

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>

<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>

        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>
         <script src="<?php echo base_url('assets/libs/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.responsive.min.js');?>"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       
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
        
           $(document).ready(function () {
                $(".hid").hide();
                //   init_table();
                  
                  
                   $('#abc').on('click', function () {
                    swal("Delete", "Successfully Delete", "success");
                 });

             });
               
               
            if(document.location.href.indexOf("del=done") != -1)
            {
                swal("Balance Deleted", "", "success");
            }
          
            // Ayesha

            // $("#save_area_btn").click(function(){
            //     $("#add_area_form").submit();    
            // });
 
            
             

    

        </script>
       
<script type="text/javascript">

var un_assign_table;

  function init_table(){
        un_assign_table = $('#example').DataTable({
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
        

    //assign_table.rows().invalidate().draw();
    }
    
    
    
    //  $(".del_area").click(function(e){
    function del_area(id){
         console.log('hiiiiiiiiiiiii');
                // aid = e.attr("data-id");
                aid=id;
                console.log('aid'+aid);
                swal({
                    title: "Are you sure?",
                    text: "You Will Not be Able to Revert This!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(
                    function(isConfirm){
                        if ('value' in isConfirm){
                        window.location = "<?php echo base_url('driver/delete_driver_balance') ?>/"+aid;
                        } else {
                        console.log('canceeled');
                        e.preventDefault();
                    }
                });
            // });
    }
      
     function get_reports(e){
        $("#table_body").empty();
        get_deliveries_report_by_status(e.target);
    }

    function get_deliveries_report_by_status(el){
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        var option = $('#search_option').val();

        if(un_assign_table){
            $('#example').dataTable().fnDestroy();
        }

        $("#table_body").empty();

        var url = "<?php echo base_url(); ?>"+"report/AC_get_driver_balance_report_by_date";
        
        if(option != ''){
        $fields = {'start_date':from_date, 'end_date':to_date, 'status':option};
        el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        el.disabled = true; 
        $.post(url, $fields, function(response){
            el.disabled = false;
            el.innerHTML = 'Get Report <i class="icon-plus"></i>';
            if(response.success){
                var data = response.report_data.records;
                 var tt=response.tt;
                 var pd=response.pd;
                 var tr=response.tr;
                 console.log(data);
                $("#table_body").append(set_report_data(data,tt,pd,tr));
            }

            init_table();
        },'json');
        
        }else{
            // swal or error
            swal.fire("Select Driver Please!","","error");
        }
    }

    function set_report_data(data,tt,pd,tr){
         var url = "<?php echo base_url(); ?>";
        var tbody = ''; 
        var login_user = '<?php echo strtolower($this->session->userdata('role')) ?>';


         $("#tt").html(tt);
         $("#tr").html(tr);
         $("#pd").html(pd);
         
        $.each(data, function(i, e){
            console.log(e);
            $("#n").html(e.name);
            $("#p").html(e.phone);
            $("#a").html(e.address);
            $("#s").html(e.salary);
            
            // $("#TD").text(e.TD);
            
            tbody += '<tr class="odd gradeX">';
           tbody += '<td><input type="checkbox" class="checkboxes" value="'+ e.i+'" /></td>';
           
          
            tbody += '<td >'+ e.dated +'</td>';
             
              if(e.return_check == 0){
               tbody += '<td ><span style=" color:red;"> '+e.ammount+'</span></td>';
                tbody += '<td >Taken</td>';
           }else{
               tbody += '<td ><span style=" color:green;"> &nbsp -'+e.return_ammount+'</span></td>';
                tbody += '<td >Returned</td>';
           }
           
            tbody += '<td >'+ e.description +'</td>';
            tbody += '<td >'+ e.added_by + '</td>';   
            
            tbody += '<td>';
            if(e.return_check == 0){
            tbody += '<a class="btn default btn-xs green-stripe" data-area="'+e+'" data-id="'+e.id+'" title="Edit Taken" data-toggle="modal" onclick="javascript:show_model(this)" href="#responsive" flag="edit_taken_r" pk="'+ e.id +'" tk="'+ e.driver_id +'" xname="'+ e.name +'"  xaddr="'+ e.address +'" xamm="'+ e.ammount +'" xdt="'+ e.dated +'"  xdsc="'+ e.description +'" xemail="'+ e.email +'" xphn="'+ e.phone +'" xsalary="'+ e.salary +'" xreturn_check="'+ e.return_check +'"> <i class="mdi mdi-square-edit-outline"></i></a>&nbsp';
            }else{
                tbody +='<a class="btn default btn-xs green-stripe" data-return="'+e+'" title="Edit Return" data-toggle="modal" data-id="'+e.id+'" onclick="javascript:show_model(this)" href="#responsive" flag="edit_taken_r"  pk="'+ e.id +'" tk="'+ e.driver_id +'" xname="'+ e.name +'"  xaddr="'+ e.address +'" xamm="'+ e.return_ammount +'" xdt="'+ e.dated +'"  xdsc="'+ e.description +'" xemail="'+ e.email +'" xphn="'+ e.phone +'" xsalary="'+ e.salary +'" xreturn_check="'+ e.return_check +'"><i class="mdi mdi-square-edit-outline"></i></a>&nbsp';
            }
              tbody += '<a onclick="del_area('+e.id+')" data-id="'+e.id+'" href="javascript:void(0);"><i class="mdi mdi-delete"></i></a>';
              
            
            tbody += '</td>';

            tbody += '</tr >';
        });
        
        $(".hid").show();
        
        return tbody;
    }
  
 function show_model(ele){
        var flag = $(ele).attr('flag');
        
        //reset form values
        $('#add_area_form')[0].reset();
        $('#add_returns_form')[0].reset();


        if(flag == 'add'){
            //changed model title
            $("#mod_title").html("Add New Ballance Info");
            $("#driver_Selecet_portion").show();
            //change model button

            $("input[name='driver_info_id']").val(0);
            
            $("#driver").val(0);
            $("#ammount").val(0);
            $("#dates").val('');
            $("#descrip").val('');
             
             
            $("#name").html('');
            $("#email").html('');
            $("#phone").html('');
            $("#address").html('');
            $("#c_salary").html('');
            
            
            $("#pend").html('');
        }
        if(flag == 'add_r'){
            $("#mod_title_r").html("Add New Return Info");
            //change model button

            $("input[name='driver_info_r']").val(0);
        }

        if(flag == 'edit_taken_r'){
            //changed model title
            var xreturn_check=$(ele).attr('xreturn_check');
            console.log('xreturn_check'+xreturn_check);
            if(xreturn_check ==1){
            $("#mod_title").html("Edit Returned Ballance Info");
            
            }else{
                $("#mod_title").html("Edit Taken Ballance Info");
            }
            $("#driver_Selecet_portion").hide();
            
            var xname = $(ele).attr('xname');
            var xemail = $(ele).attr('xemail');
             var xaddr = $(ele).attr('xaddr');
            var xphn = $(ele).attr('xphn');
            var xdsc = $(ele).attr('xdsc');
            var xamm = $(ele).attr('xamm');
            var xsalary = $(ele).attr('xsalary');
            var xphn = $(ele).attr('xphn');
            var xdriver_id=$(ele).attr('tk');
            var xdriver_infoid=$(ele).attr('pk');
             var xdt=$(ele).attr('xdt');
              
            
            
            $("#driver_info_id").val(xdriver_infoid);
            $("#driver").val(xdriver_id);
            $("#ammount").val(xamm);
            $("#dates").val(xdt);
            $("#descrip").val(xdsc);
             
             
            $("#name").html(xname);
            $("#email").html(xemail);
            $("#phone").html(xphn);
            $("#address").html(xaddr);
            $("#c_salary").html(xsalary);
            
            var xpend=$("#pd").html();
            $("#pend").html(xpend);
           
             
        }
        
        // if(flag == 'edit_r'){
        //     //changed model title
        //     $("#mod_title").html("Edit Ballance Info");
        //     //change model button
            
        //     alldata = JSON.parse($(ele).attr("data-area"));
        //     console.log(alldata);
        //     var str = alldata.area_name; 
        //     var s1 = /\(/;
        //     var s2=/\)/;
        //     var rs1 = str.search(s1);
        //     var rs2=str.search(s2)
        //     var mystr = str.slice(rs1+1,rs2);
        //     var area_name_without_emirate=mystr;
        //     $("input[name='area_name']").val(area_name_without_emirate);
        //     $("input[name='area_id']").val(alldata.area_id);
        //     $("select[name='emirate']").val(alldata.emirate_id);
             
        // }


    }

    function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
        hide_error();
      
    }
    
    function close_model_r(){
       
    
        $("#responsive_n").removeClass('in');
        $("#responsive_n").hide();
        $("#responsive_n").attr("aria-hidden","true");
        hide_error_r();
    }
    function show_msg(msg, class_){
        $("#error_container").removeClass('alert-success');
        $("#error_container").removeClass('alert-danger');
        $("#error_msg").html(msg);
        $("#error_container").addClass(class_);
        $("#error_container").show();
    }
    function show_msg_r(msg, class_){
        $("#error_container_r").removeClass('alert-success');
        $("#error_container_r").removeClass('alert-danger');
        $("#error_msg_r").html(msg);
        $("#error_container_r").addClass(class_);
        $("#error_container_r").show();
    }

    function hide_error(){
        $("#error_msg").html('');
        $("#error_container").hide();
    }
    
    function hide_error_r(){
        $("#error_msg_r").html('');
        $("#error_container_r").hide();
    }

  

    //SAVE vendor METHODS
    
     function save_(){
       hide_error();
        //  $("input[name='area_id']").val(alldata.area_id);
        var driver_id=$("#driver").val();
        var name = $("#name").html();
         var email = $("#email").html();
          var phone = $("#phone").html();
           var address = $("#address").html();
           
           var amm = $("#ammount").val();
           var date = $("#dates").val();
           if($("#driver_info_id").val() !=0 || $("#driver_info_id").val() !='')
           var driver_info_id=$("#driver_info_id").val();
           else
           var driver_info_id=0;
           
           var desc = $("#descrip").val();
           
           var salary=$("#c_salary").html();
         
        // area_name = area_name.replace(',','-');
       

        // var emirate_name=$("#emirate option:selected").html();
        // var emirate_id=$("#emirate option:selected").val();
        
        
        
        var url = "<?php echo base_url(); ?>"+"Driver/save_driver_info";
       
        if(driver_info_id ==0){
                            console.log('driver_id_is'+driver_id);
        if(amm && driver_id && date){
            
           
            $fields = {'driver_info_id':driver_info_id,'driver_id':driver_id, 'name':name ,'email':email,'phone':phone,'address':address,'ammount':amm,'dated':date,'description':desc,'salary':salary};
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong> Driver Balance has been saved.';
                    show_msg(msg, 'alert-success');
                   
                    setTimeout(function(){  location.reload(); }, 3000);
                   
                }else{
                    show_msg('<strong>Error!</strong> Driver Info Not Saved! ','alert-danger');
                }
            },'json');
            
           
        }else{
            var error = '<strong>Error!</strong> Invalid! Try Again.';
            show_msg(error, 'alert-danger');
        }
        
        
     }else{ //Edit Check
      
           if(amm && date  ){
               
             if($("#mod_title").html()=="Edit Taken Ballance Info"){   
            $fields = {'driver_info_id':driver_info_id,'ammount':amm,'dated':date,'description':desc};
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong>Updated Successfully.';
                    show_msg(msg, 'alert-success');
                   
                    setTimeout(function(){  location.reload(); }, 3000);
                   
                }else{
                    show_msg('<strong>Error!</strong>Not Updated!Network Problem,Try Again ','alert-danger');
                }
            },'json');
            
            }else if($("#mod_title").html()=="Edit Returned Ballance Info"){
                
                var pending_r=$("#pend").html();
                pending_r=parseInt(pending_r);
                   if(amm <= pending_r && amm!=0 ){
              
            $fields = {'driver_info_id':driver_info_id,'return_ammount':amm,'dated':date,'description':desc};
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong> Updated Successfully!';
                    show_msg(msg, 'alert-success');
                    setTimeout(function(){  location.reload(); }, 3000);
                    
                }else{
                    show_msg('<strong>Error!</strong> Not Updated!Network Problem,Try Again ','alert-danger');
                }
            },'json');
            
          }else{
              var error = '<strong>Error!</strong> Invalid Return Ammount eg:(returned ammount cant be greater then pending dues or equal to zero), Try Again!';
            show_msg(error, 'alert-danger');
            
            setTimeout(function(){ hide_error(); }, 9000);
            }
                
                
            }
        }else{
            var error = '<strong>Error!</strong> Invalid! Try Again.';
            show_msg(error, 'alert-danger');
        }
      
         
     }
    }
    
     
   
   
   
   
       //SAVE Retunrs
    
     function return_(){
       hide_error_r();
        //  $("input[name='area_id']").val(alldata.area_id);
        var driver_id=$("#driver_r").val();
        var name = $("#name_r").text();
         var email = $("#email_r").text();
          var phone = $("#phone_r").text();
          var address = $("#address_r").text();
          var pending_r=$("#total_due_r").text();
          
          pending_r=parseInt(pending_r);
           
          
          
           if($("#driver_info_r").val())
           var driver_info_r=$("#driver_info_r").val();
           else
           var driver_info_r=0;
           
           var amm = $("#ammount_r").val();
           var date = $("#receieve_date_r").val();
           var desc = $("#descrip_r").val();
          
           
        // area_name = area_name.replace(',','-');
       

        // var emirate_name=$("#emirate option:selected").html();
        // var emirate_id=$("#emirate option:selected").val();
        
       
        
        var url = "<?php echo base_url(); ?>"+"Driver/save_driver_info";
       
        
                            console.log('driver_id_is'+driver_id);
        if(amm && driver_id && date  ){
            
          if(amm <= pending_r && amm!=0 ){
              
            $fields = {'driver_info_id':driver_info_r,'driver_id':driver_id, 'name':name ,'email':email,'address':address, 'phone':phone,'return_ammount':amm,'dated':date,'description':desc,'return_check':1};
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong> Driver Returned Ammount has been saved.';
                    show_msg_r(msg, 'alert-success');
                    setTimeout(function(){  location.reload(); }, 3000);
                    
                }else{
                    show_msg_r('<strong>Error!</strong> Driver Returned Ammount Not Saved! ','alert-danger');
                }
            },'json');
            
          }else{
              var error = '<strong>Error!</strong> Invalid Return Ammount eg:(returned ammount cant be greater then pending dues), Try Again!';
            show_msg_r(error, 'alert-danger');
            
            setTimeout(function(){ hide_error_r(); }, 9000);
            }
        }else{
            var error = '<strong>Error!</strong> Missing fileds are required! Try Again.';
            show_msg_r(error, 'alert-danger');
            setTimeout(function(){ hide_error_r(); }, 9000);
        }
        
       
           
           
    }
     
    
    
    
    
    
    
    
    
    
    
    
    
  


     
     
     $("#driver").on('change', function () {
         
         console.log('hiiiiii');
         var driver_id=$(this).val();
         if(driver_id !='')
         {
              $.ajax({
                url:"<?php echo base_url('Driver/get_driver_by_id_ACC/'); ?>"+driver_id,
                
                // data:{userid:user_id},
                // dataType:"json",
                success:function(data){
                   
                     data = JSON.parse(data);

                    console.log(data);
                    
                    $('#name').html(data.name);
                    $('#email').html(data.email);
                    $('#phone').html(data.phone);
                    $('#address').html(data.address);
                    $('#c_salary').html(data.salary);
                    $('#pend').html(data.pendings);
                    

                    
                    
                        //   $('#rolename').val(data.rolename); 
                        //   $('#edit_hidden_id').val(data.role_id);
            


                }

            });
     
             
         }
           
});
           
           $("#driver_r").on('change', function () {
         
         console.log('hiiiiii');
         var driver_id=$(this).val();
         if(driver_id !='')
         {
              $.ajax({
                url:"<?php echo base_url('Driver/get_driver_by_id_ACC_for_return/'); ?>"+driver_id,
                
                success:function(data){
                   
                     data = JSON.parse(data);

                    console.log(data);
                    
                    $('#name_r').html(data.name);
                    $('#email_r').html(data.email);
                    $('#phone_r').html(data.phone);
                    $('#address_r').html(data.address);
                    $('#total_due_r').html(data.pendings);
                  
                }

            });
     
             
         }  
         
       
    });
   </script>
       
    </body>
</html>