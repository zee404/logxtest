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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Operations </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Unassigned Bag Collection</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">UNASSIGNED BAG COLLECTION</h4>
                            
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="width: 101% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                             <form action="<?php echo base_url('bag/unassigned_by_created_date') ?>" method="post">
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
                   <?php if(strtolower($this->session->userdata('role')) == 'admin'){ ?>
                 <div class="row">
                    <div class="col-md-3">
                        <select id="driver_list" class="form-control" name="driver_list">
                            <option value="">Select Driver</option>
                            <?php foreach ($drivers['records'] as $key => $der) {?>
                                <option value="<?= $der->id; ?>" ><?= $der->email.' - '.$der->full_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                     <div class="col-lg-4" style="display: none;" id="action_btn">
                        <button type="button" id="button" style="color: #fff;background-color: #197990 !important;border-color: white;" class="btn btn-primary">Assign</button>
                        <button id="delete_button" type="button" class="btn btn-danger">Delete</button>
                        <button id="print_btn" type="button" class="btn btn-danger">Print</button>
                   </div>
                  </div>
              <?php } ?>
                            
                                    <br>
                            
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
                                            <td ><?php echo $bag->send_notification; ?></td>
                                            <td ><?php echo get_bag_status($bag->status);?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                        </tr>
                                </tbody>
                            </table>
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
        $('#button').on('click', function () {
           var drslt = $("#driver_list").val();
        if(!drslt)
        {
            swal("", "Please Select Driver", "error");
            $("#driver_list").focus();
            return;
        }
        else
            assign_drivers();
            
        });


function delAll()
{
        var driver_id = $("#driver_list").val();
    
        console.log(driver_id);

         $.ajax({

            url:'<?php echo base_url("Bag/assign_drivers_delivry") ?>',
            method:'post',
            data:{'bags_id':bags_id,driver_id:driver_id},
            success:function(res)
            {
                 console.log(res);
                if(res){
                    location.reload(); 
                }
            },
            error:function(err)
            {
               
            }
        });
}


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
    delete_bags();
  }
})
    
 
});

    $(document).ready(function () {
        
        $("#print_btn").click(function(){
                var ids = [];
                $(".checkboxes:checked").each(function(){
                    ids.push($(this).val());
                });

                if(ids.length < -1)
                    return;
                ids = ids.join();
                window.open('<?php echo base_url() ?>report/print/bags/'+ids, '_blank');
        });

        if($("tbody tr").not(".no-records-found").length > 0){
            console.log('dt worked');
         
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
    
    
   
    

    function delete_bags(){
   if(global_bags_ids.length > 0){
            var url = "<?php echo base_url(); ?>"+"bag/delete_bags";
            $fields = { 'bag_ids':global_bags_ids};
            $.post(url, $fields, function(response){
                if(response.success){
                    global_bags_ids = [];
                   
                    
                }
            },'json');
 location.reload();
                    
            var msg = '<strong>Success!</strong> Data has been deleted.';
            show_msg(msg, 'alert-success');
             
        }else{
            swal("No Row Selected", "", "error");
        }

    }
      function show_msg(container, msg, class_){
        $("#"+container).removeClass('alert-success');
        $("#"+container).removeClass('alert-danger');
        $("#"+container+" > p#error_msg").html(msg);
        $("#"+container).addClass(class_);
        $("#"+container).show();
    }

    function assign_drivers(){
        console.log('cmoningot ');
        var driver_id = parseInt($("#driver_list").val());
        if(global_bags_ids.length > 0 && driver_id){
            console.log("Called"+global_bags_ids+"DRIVER:"+driver_id);
            var url = "<?php echo base_url(); ?>"+"bag/assign_drivers";
            $fields = {'driver_id':driver_id, 'bag_ids':global_bags_ids};
            $.post(url, $fields, function(response){
                console.log("RES:"+response);
                if(response.success){
                    window.location = '<?php echo base_url() ?>/unassigned';
                    global_bags_ids = [];
                }
            },'json');
                    swal("Done", "Assigned Successfully", "success");
         window.location.reload();
         
        }

    }

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
                $("#action_btn").show();
                $(this).prop('checked', true);
                $(this).parent().parent().addClass('redd');
                global_bags_ids.push(parseInt($(this).val()));
              
            }
            else
            {
                $("#action_btn").hide();
                $(this).prop('checked', false);
                $(this).parent().parent().removeClass('redd');
            }
        });
    });


$(document).on('change', '.checkboxes', function(){
    bags_id = $(this).attr("data-val");
    $(this).parent().parent().toggleClass('redd');

    if($('.checkboxes:checked').length > 0)
    {
        $("#action_btn").show();
    }
    else
        $("#action_btn").hide();   

    global_bags_ids = [];
    $('.checkboxes:checked').each(function(){
        global_bags_ids.push(Number($(this).val()));
    });
});




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