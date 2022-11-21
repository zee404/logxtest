   <!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://demo.thelogx.com/assets/images/logx-logo-512x512.png">

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
             table thead tr th{
            vertical-align: middle !important;
        }
              .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

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
th{
        padding: 0.5px !important;
        width: 1.4063px;
}
th.long{
    min-width: 90px;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -36px;
}

.isDisabled {
  color: currentColor;
  /*cursor: not-allowed;*/
  /*opacity: 0.5;*/
  text-decoration: none;
}

.select2-drop-active{
    margin-top: -25px;
}

.select2-container--default .select2-selection--single {
    /* background-color: #fff; */
    /* border: 1px solid #aaa; */
    border-radius: 4px;
    height: 36px;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Meal Planner</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Meal Plan Tracker</a></li>
                                  
                                </ol>
                            </div>
                             <h4 class="page-title">Meal Plan Tracker</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                            
                            
                            <!--NEWW ADD start-->
                            
                                    <!--<div class="row">-->
                            <div class="col-lg-3">
                         <label>Search Plan by Customer Name</label>
                         <select class=" search_option form-control" name="search_option" id="search_option">
                            <option value="">--Select--</option>
                            
                           <?php if (count($customer_name_code) > 0) { ?>
                              <?php foreach($customer_name_code as $data){ ?>
                               <option class="" value="<?php echo $data->plan_id; ?>"> <?php echo $data->plan_id.'-'.$data->full_name.'-'.$data->created_at; ?></option>
                               <?php } ?>
                
                          <?php } ?>
                           
                            
                        </select>
                        </div>&nbsp OR &nbsp &nbsp
                        <div class="col-lg-2">
                        <label>Search Plan by C.Code</label>
                        <!--<input class="form-control" type="text" name="search_by_pu" id="search_by_pu" placeholder="PU-1234" />-->
                        
                        <select class="search_option form-control"  name="search_by_pu" id="search_by_pu">
                            <option value="">--Select--</option>
                            
                           <?php if (count($customer_name_code) > 0) { ?>
                              <?php foreach($customer_name_code as $data){ ?>
                               <option class="" value="<?php echo $data->plan_id; ?>"> <?php echo  $data->plan_id.'-'.$data->pcustomer_id.'-'.$data->created_at; ?></option>
                               <?php } ?>
                
                          <?php } ?>
                           
                            
                        </select>
                        
                        

                    </div> 
                    
                    <div class="col-lg-2">
                        <label>Select Plan Status</label>
                        <select class="form-control"  name="statuss" id="statuss">
                            <option value="4">All</option>
                            <option value="0">Active</option>
                            <option value="1">Completed</option>
                            <option value="2">Hold/Freeze</option>
                            <option value="3">Canceled</option>
                        </select>
                        </div>
                    <!--<div class="col-lg-2">-->
                    <!--    <span>  </span>-->
                    <!--      <div class="btn-group">-->
                    <!--            <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 37px; margin-left :52px;">Get Report <i class="icon-plus"></i></button>-->
                    <!--    </div>-->
                    <!-- </div>-->
                     
                     <!--<div class="col-lg-2">-->
                        
                     <!--     <div class="btn-group">-->
                     <!--           <button onclick="add_plan(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 37px; ">Add Plan / Schedule</button>-->
                     <!--   </div>-->
                     <!--</div>-->
                     
                     
                     <!--</div>-->
                     
                            <!--MEWW ADD END-->
                            
                   <?php 
                   //$cdate = date('Y-m-d');
                    ?>
                        <!--<div class="col-md-4">-->
                        <!--    <div class="form-group">-->
                        <!--        <div class="col-md-12">-->
                        <!--            <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">-->
                                        
                                           <?php //$sdate=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d'); $edate=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days')); 
                                        //   echo $sdate; echo '<br>'.$edate;
                                        // echo 'hello';
                                        // die();
                                        
                                        
                                        ?>
                                    <!--    <input type="text" class="form-control" name="from" id="from_date" value="<?= $this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d'); ?>">-->
                                    <!--    <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>-->
                                    <!--    <input type="text" class="form-control" name="to" id="to_date" value="<?= $this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate. ' + 1 days')); ?>">-->
                                    <!--</div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                  <div class="col-lg-1"></div>
                    <div class="col-lg-2">
                          <div class="btn-group">
                            <!-- <button onclick="get_reports(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Records <i class="icon-plus"></i>
                            </button> -->
                            <button onclick="build_table_and_data(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 36px;">Get Records</i>
                            </button>
                        </div>
                                  

                    </div>
                </div>   
             </div>
             
             
                           <div class="card-box" style="overflow-x: auto;">  
                            
                            <table class="table table-responsive table-bordered" style="display: table; overflow-x: auto;" id="order_table">

                                <thead class="thead-light">

                                <tr style="height: 50px">
                                    <th style="min-width: 50px">#</th>
                                    <th style="min-width: 130px">Plan ID</th>
                                    
                                    <th style="min-width: 130px">Customer Code</th>
                                    <th style="min-width: 130px">Customer Detail</th>
                                    
                                    <th style="min-width: 130px">Plan Start Date</th>
                                    <th style="min-width: 130px">Plan End Date</th>
                                    <th style="min-width: 130px">Plan Days</th>
                                    <th style="min-width: 130px">Deliveries Details</th>
                                    
                                    <th style="min-width: 130px">Tot. Days</th>
                                    <th style="min-width: 130px">Status</th>
                                    
                                    <th style="min-width: 130px">Plan Detail</th>
                                    <th style="min-width: 100px">Action</th>
                                   
                                    

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

<!-- <div id="myModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="mod_title">Delivery Details</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row" id="v_summery_data"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


  <div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-wide_">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h4 class="modal-title" id="mod_title">Delivery Details</h4>
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
    jQuery(document).ready(function() {

        $("#from_date").flatpickr({
            
            <?php if($this->uri->segment(3) ==""){?>
             
             defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
            
            <?php }else{ ?>
              
            onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                  
                });
            }
            <?php } ?>
        });
        
        
        
        
         $('.search_option').select2({
  placeholder: 'PlanID-Customer Name/Code-PlanCreated Date'
});





  $('.js-example-basic-single').select2({
  placeholder: 'Select an option'
});

        
        var link_id = 'manage_upload_customers';
        build_table_and_data();
        
        <?php if (!empty($this->session->flashdata('error'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('error') ?>';
                swal(msgg, "", "error");
            <?php } ?>

            <?php if (!empty($this->session->flashdata('success'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('success') ?>';
                swal(msgg, "", "success");
            <?php } ?>
        
    });

</script>
<script type="text/javascript">
      var assign_table;
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
       
        
        $("#table_body").empty();
        
        get_deliveries_report_by_status(e.target);
    }

    function get_deliveries_report_by_status(el){
        console.log($("#from_date").val());
        //var from_date = moment($("#from_date").val(), 'DD-MM-YYYY').subtract(0, 'days').format('YYYY-MM-DD 00:00:00');
        //var to_date = moment($("#to_date").val(), 'DD-MM-YYYY').format('YYYY-MM-DD 23:59:59');
        var option = 'Assign';
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        

        $("#table_body").empty();

        var url = "<?php echo base_url(); ?>"+"report/get_deliveries_report_by_completed";
        $fields = {'start_date':from_date, 'end_date':to_date, 'status':option};
        el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        el.disabled = true;
        $.post(url, $fields, function(response){
            el.disabled = false;
            el.innerHTML = 'Get Records <i class="icon-plus"></i>';
            if(response.success){
                $("#loadinggf").hide();
                var data = response.report_data.records;
                // console.log(data);
               

                if (  $.fn.DataTable.isDataTable( '#order_table' ) ) {
                    $('#order_table').dataTable().fnDestroy();
                }

                $("#table_body").append(set_report_data(data));

                init_table();
            }

        },'json');
    }

     function set_report_data(data){
        var cStatus = "Completed";        
        var tbody = '';
 var url = "<?php echo base_url(); ?>";
        $.each(data, function(i, e){
            // console.log('e id');
            // console.log(e);
            tbody += '<tr class="odd gradeX">';
            // tbody += '<td><span><input type="checkbox" class="checkboxes" value="'+ e.order_id+'" style="margin-top:30% !important; margin-left:30% !important; width:16px !important; height:16px !important;" /></span></td>';
            tbody += '<td >'+ e.order_id +'</td>';
         //   tbody += '<td ><img src="'+ url+e.qrImage +'" /></td>';
            tbody += '<td >'+ e.name_on_delivery +' '+ e.number_on_delivery +'</td>';
            tbody += '<td >'+ e.delivery_address + '</td>'; 
             tbody += '<td >'+e.note+'</td>';
             tbody += '<td >'+ e.delivery_date +' '+e.delivery_time+'</td>';
            tbody += '<td >'+ e.driver +' '+ e.d_phone +'</td>';
            tbody += '<td >'+ e.vendor +' '+ e.v_phone +'</td>';
            tbody += '<td >'+ e.assign_date +'</td>';
            
             tbody += '<td >'+ e.pickUp +'</td>';
              
            tbody += '<td >'+ e.delivered_date +' '+e.delivered_time+'</td>';
           
             tbody += '<td >'+ e.bag_received+'</td>';
              tbody += '<td >'+ e.ice_bags+'</td>';
              
              tbody += '<td >'+ e.own_bag_receive_count+'</td>';
              tbody += '<td >'+ e.old_ice_bags+'</td>';
            //tbody += '<td >'+cStatus +'<br>';

             imagee = '';
            if(e.delivery_img != null){
                imagee = e.delivery_img;
            }

            //tbody += '<div class="mix-details">';
            tbody += '<td><a class="mix-preview fancybox-button" href="'+(imagee ? imagee : '#') +'" title="" data-rel="fancybox-button_">';
            //tbody += '<img style="max-width: 30%" class="img-responsive_" src="'+image+'" alt="">';
            tbody += imagee ? 'Available' : 'Not Available';
            tbody += '</a>';
            tbody += '</div>';
            tbody += '</td>';
            tbody += '<td>'+e.food_type+'</td>';
            tbody += '<td>'+e.send_notification+'</td>';
            tbody += '<td>'+e.assigned_user+'</td>';
            tbody += '<td>'+e.assigned_mode+'</td>';
            tbody += '<td>';
            tbody += '<a class="" title="View"data-toggle="modal" onclick="javascript:order_detail(this)" href="#responsive" pk="'+ e.order_id +'""><i class="dripicons-preview" style=font-size: 30px;"></i></a>';

       tbody += '</td>';

            tbody += '</tr >';
        });
        return tbody;
    }
    function order_detail(ele){
        $("#v_data").hide();
        $("#loading").show();
        var order_id = $(ele).attr('pk');
        get_order_by_id(order_id);
        // console.log('hiiiiiiiiiiiiii i am innnn order detail');
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

   base_url = '<?php echo base_url() ?>';
    function set_order_summery(summery_details){

        var summery = summery_details[0];
        //  console.log(summery.delivery_id);
        // console.log(summery.ice_bags);
        // console.log(summery.bag_received);

        //set order status
        $("#mod_title").html('Delivery Details '+Custom.get_order_status(parseInt(summery.status)));

        var img_url = summery.delivery_img ? "<?php echo base_url(); ?>"+"upload/"+summery.delivery_img : null;
        var sig_url = summery.signature_img ? "<?php echo base_url(); ?>"+"upload/"+summery.signature_img : null;
        var  summery_data = '<div class="note note-info" style="background-color: #E8F6FC;">';
        summery_data += '<h4 class="block">Delivery Details</h4>';

        summery_data += '<div class="row">';
        summery_data += '<div class="col-md-4"><div class="row"><div class="col-md-12"><h5>Delivery Image</h5>';
        summery_data += img_url ? '<img src="'+img_url+'" width="100%" class="img-responsive img-thumbnail">' : '<p>Not Available</p>';
        summery_data += '</div>';
        summery_data += '<div class="col-md-12"><h5>Signature Image</h5>';
        summery_data += sig_url ? '<img src="'+sig_url+'" width="100%" class="img-responsive img-thumbnail">' : '<p>Not Available</p>';
        summery_data += '</div>';
        summery_data += '</div></div>';
        summery_data += '<div class="col-md-8">';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>ID : </strong>'+summery.delivery_id+'</li>';
        summery_data += '<li><strong>Status : </strong>'+summery.status+'</li>';
        summery_data += '<li><strong>PU number : </strong>'+summery.pu_number+'</li>';
        summery_data += '<li><strong>Bags Received : </strong>'+summery.bag_received+'</li>';
        summery_data += '<li><strong>Created Date : </strong>'+summery.created+'</li>';
        summery_data += '<li><strong>Assign Date : </strong>'+summery.assign_date+'</li>';
        summery_data += '<li><strong>Delivery Date : </strong>'+summery.delivery_date+'</li>';
        summery_data += '<li><strong>Delivery Time : </strong>'+summery.delivery_time+'</li>';
        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
         summery_data += '<li><strong>Delivered Date : </strong>'+summery.delivered_date+'</li>';
        summery_data += '<li><strong>Delivered Time : </strong>'+summery.delivered_time+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';
        summery_data += '</div>';
        summery_data += '</div>';
name = summery.name_on_delivery;
        if(summery.name_on_delivery==""){
            name = summery.customer;
                    
        }       
        summery_data += '<div class="note note-warning col-lg-12"style="background-color: #FCF3E1;margin-bottom: 18px;margin-top: 19px;">';
        summery_data += '<h4 class="block">Customer Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+name+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.c_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';

        summery_data += '<div class="note note-info col-lg-12"style="background-color: #E8F6FC;margin-bottom: 18px">';
        summery_data += '<h4 class="block">Partner Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+summery.vendor+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.v_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';


        summery_data += '<div class="note note-warning col-lg-12" style="background-color: #FCF3E1;margin-bottom: 18px;margin-top: 19px;">';
        summery_data += '<h4 class="block">Driver Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+summery.driver+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.d_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';
        // bags info
     summery_data += '<div class="note note-info col-lg-12" style="background-color: #E8F6FC;margin-bottom: 18px""  >';
        summery_data += '<h4 class="block">Bags Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<form action="<?php echo base_url('order/update_bagsinfo/')?>'+summery.delivery_id+'" method="post">';
        summery_data += '<li><strong>Own Bags Received : </strong><input name="bag_received" type="number" class="form-control" value="'+summery.bg_count+'" /></li>';
        summery_data += '<li><strong>Own Ice Bags : </strong><input name="ice_bags" type="number" class="form-control" value="'+summery.ice_bags+'" /></li>';
summery_data += '<br /><button class="btn btn-info" type="submit">Update</button>';
summery_data += '</form>';
        summery_data += '</ul>';
        summery_data += '</div>';
        return summery_data;
    }

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
        console.log(from_date, '*****', to_date);
        
        var search_option=$("#search_option").val();
        var search_by_pu=$("#search_by_pu").val();
        var status=$("#statuss").val();
        
        console.log('search_option'.search_option);
        console.log('search_by_pu'.search_by_pu);
        
        $('#order_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo base_url('MonthlyMeal/get_MealPlans_report') ?>",
            "type": "POST",
            "data": {'start_date':from_date, 'end_date':to_date, 'status':status,'cid':search_option,'ccode':search_by_pu},
            "dataSrc": function(res){
                
                // console.log('hi');
                if(myel)
                {
                    myel.disabled = false;
                    myel.innerHTML = 'Get Records';    
                }
                // console.log(res.data);
                
                for(let i =0; i < res.data.length; i++)
                {   
                    console.log(res.data[i]);
                    res.data[i].td_count = i +1;
                    // res.data[i].name_on_delivery +' '+res.data[i].number_on_delivery;
                    // res.data[i].delivery_date += ' '+res.data[i].delivery_time;
                    // res.data[i].driver += ' '+res.data[i].d_phone;
                    // res.data[i].vendor += ' '+res.data[i].v_phone;
                    // res.data[i].delivered_date += ' '+res.data[i].delivered_time;
                     
                    
                    // res.data[i].name_on_delivery += ' '+res.data[i].number_on_delivery;
                    // res.data[i].delivery_img = res.data[i].delivery_img ? '<a target="_blank" href="'+base_url+'upload/'+res.data[i].delivery_img+'">Available</a>' : '<a style="color: red !important" href="#">Not Available</a>';
                    // // res.data[i].assigned_user += ' '+res.data[i].assigned_user;
                    // // res.data[i].assigned_mode += ' '+res.data[i].assigned_mode;
                    
                    
                   
                    
                    
                   
                    // if(res.data[i].forcely_reason =='forcefully_neutral_by_strkeeper'){
                    //     res.data[i].forcely_reason='N/A';
                    //     res.data[i].forcely_selection='forcefully direct Neutral';
                    // }
                    
                      
                       var obj_reasons = JSON.parse(res.data[i].all_details);
                       
                    //   res.data[i].delivery_status_was=obj_reasons.delivery_status;
                    //   res.data[i].qr_status_was=obj_reasons.cur_qr_status;
                       
                    //   res.data[i].new_delivery_status=res.data[i].status;
                    //   res.data[i].new_qr_status=res.data[i].qrStatus;
                      
                    //   res.data[i].qr_code=obj_reasons.qr_code;
                    // //   res.data[i].delivery_status_was=obj_reasons.delivery_status;
                    
                       res.data[i].customer_detail=res.data[i].full_name+' '+res.data[i].phone;
                       res.data[i].plan_detail='<span title="Partner">'+res.data[i].vendor_name+'</span><br><span title="created at">'+res.data[i].created_at+'</span>';
                       res.data[i].total_deliveries='<table class="table table-hover"><thead><th></th><th></th></thead><tbody><tr style="background:lightgrey;" title="click here to view details" ><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+res.data[i].plan_id+'/1" target="_blank">Tot. Deliveries </a></td><td> <a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+res.data[i].plan_id+'/1" target="_blank">'+res.data[i].total_deliveries_are+'</a></td></tr> <tr style="background:#b8f4b8;" title="Click here to view details"><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+res.data[i].plan_id+'/2" target="_blank">Tot. Completed</a></td><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+res.data[i].plan_id+'/2" target="_blank">'+res.data[i].completed+'</a></td></tr><tr style="background:#96d6f0;" title="Click here to view details"><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+res.data[i].plan_id+'/3" target="_blank">Tot. Pending </a></td> <td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+res.data[i].plan_id+'/3" target="_blank">'+res.data[i].pendings_are+'</a></td></tr><tr style="background:#f44a4a;" title="Click here to view details"><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+res.data[i].plan_id+'/4" target="_blank">Tot. Canceled</a></td> <td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+res.data[i].plan_id+'/4" target="_blank">'+res.data[i].cancel+'</a></td></tr><tr style="background:lightgrey;" title="click here to view details" ><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_freeze/'+res.data[i].plan_id+'/5" target="_blank">Tot.Freezed Deliveries </a></td><td> <a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_freeze/'+res.data[i].plan_id+'/5" target="_blank">'+res.data[i].tot_freeze+'</a></td></tr></tbody></table>';
                    
                    
                       res.data[i].total_days='<table class="table table-hover"><thead><th></th><th></th></thead><tbody><tr><td>Tot. Days</td><td>'+res.data[i].total_deliveries_are+'</td></tr> <tr><td>Tot. Remaining Days</td><td>'+res.data[i].pendings_are+'</td></tr></tbody></table>';
                    
                    
                    // res.data[i].action = '<a class="" title="View" data-toggle="modal" onclick="javascript:order_detail(this)" href="#myModal" pk="'+ res.data[i].plan_id +'"><i class="dripicons-preview" style=font-size: 30px;"></i></a>';
                   
                    var url = "<?php echo base_url(); ?>";
                    
                    
                    
                  // Temporary bock freez plan features start
                    // res.data[i].action = '<a class="" title="Edit" target="_blank" href="'+url+'MonthlyMeal/Plan_Manage/'+res.data[i].customer_id+'/1/edit/'+res.data[i].plan_id+'" flag="edit" pk="'+res.data[i].plan_id+'"><i class="mdi mdi-square-edit-outline"></i></a>&nbsp; <a class="" flag="view" target="_blank" href="'+url+'MonthlyMeal/view_plan/'+res.data[i].customer_id+'/1/view/'+res.data[i].plan_id+'" flag="view" pk="'+res.data[i].plan_id+'"><i class="mdi mdi-eye-outline "></i></a>&nbsp;<a class="" title="Delete" onclick="delete_plan('+res.data[i].plan_id+' , '+res.data[i].customer_id+' )"><i class="mdi mdi-delete"></i></a> &nbsp; '; 
                     
                    //  console.log('res.data[i].completed_status: '+res.data[i].completed_status);
                    //  if(res.data[i].completed_status ==0){
                    //       res.data[i].action =res.data[i].action+' <a class="" title="Freeze Plan" onclick="freeze_plan('+res.data[i].plan_id+' , '+res.data[i].customer_id+')"><i id="freeze_plans'+res.data[i].plan_id+'" class="fas fa-lock"></i></a>'; 
                    //  }else if(res.data[i].completed_status ==2){
                    //      res.data[i].action =res.data[i].action+' <a class="" title="Defreeze Plan" onclick="freeze_plan('+res.data[i].plan_id+' , '+res.data[i].customer_id+')"><i id="freeze_plans'+res.data[i].plan_id+'" class="fas fa-unlock"></i></a>'; 
                    //  }
                     
                // Temporary bock freez plan features end 
                
                
                res.data[i].action = '<a class="" title="Edit" target="_blank" href="'+url+'MonthlyMeal/Plan_Manage/'+res.data[i].customer_id+'/1/edit/'+res.data[i].plan_id+'" flag="edit" pk="'+res.data[i].plan_id+'"><i class="mdi mdi-square-edit-outline" style="font-size: x-large;"></i></a>'; 
                     
                
                     
                     
                     
                     
                     
                      if(res.data[i].completed_status ==0){
                        res.data[i].completed_status='<span style="color: green;font-weight: 700;">Active</span>';
                    }else if(res.data[i].completed_status ==1){
                        res.data[i].completed_status='<span style="color: #197990;font-weight: 700;">Completed</span>';
                    }else if(res.data[i].completed_status ==2){
                        res.data[i].completed_status='<span style="color: #dee1e2;font-weight: 700;">Freezed</span>';
                    }else if(res.data[i].completed_status ==3){
                        res.data[i].completed_status='<span style="color: #fb0d0d;font-weight: 700;">canceled</span>';
                    }
                }
                // console.log(res.data);
                return res.data;
            }
        },
        "columns": [
            { "data": "td_count" , "orderable": false},
            { "data": "plan_id", "orderable": true},
            
             { "data": "pcustomer_id", "orderable": false},
             { "data": "customer_detail", "orderable": false},
             { "data": "plan_start_date", "orderable": true},
             { "data": "exp_date", "orderable": true},
             { "data": "no_of_days", "orderable": false},
              
             { "data": "total_deliveries", "orderable": false},
             
             { "data": "total_days", "orderable": false},
             { "data": "completed_status", "orderable": false},
             
              { "data": "plan_detail", "orderable": false},
             
             
            
            { "data": "action", "orderable": false}
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

</script>
       
    </body>
    <style type="text/css">
        table td, th{
            text-align: center; 
        }

        table tr td a {
            color: #00afe2 !important;
        }

        .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    /*background-color: #7e57c2;
    border-color: #7e57c2;*/
    background: #009cc9; /*linear-gradient(to right, #004C5D 0%, #00BAF1 100%) !important; */
    border-color:#009cc9; /*linear-gradient(to right, #004C5D 0%, #00BAF1 100%) !important; */
}
    </style>
</html>