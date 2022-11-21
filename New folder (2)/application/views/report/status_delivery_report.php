<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
/*div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-left: 800px;
}*/
/*.portlet.box.blue {*/
/*    border: 1px solid white;*/
/*    border-top: 0;*/
/*}*/
  .btn-group{
    margin-top: -10px;
    margin-bottom: 10px;

}   div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
}
/*.table-striped tbody tr:nth-of-type(odd) {*/
/*     background-color: white; */
/*}*/

        </style>
    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header');?>        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
<div class="page-container">
<div class="wrapper" style="background-color: #f1f5f7">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                         <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Reports </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Status Wise Deliveries </a></li>
                                  
                                </ol>
                            </div>                            
                            <h4 class="page-title">Status Wise Deliveries</h4>
                        </div>
                    </div>
                </div>
                </div>
                </div> 

<!-- BEGIN CONTENT -->
<div class="wrapper" >

<div class="container-fluid">
  

    <!-- BEGIN PAGE HEADER-->
      <div class="row ">
         <!--  <ul class="page-breadcrumb breadcrumb">
                <li class="btn-group" id="download_btn_container" style="display: none">
                    <?php echo form_open('report/csv_vendor_delivery_report', array('id'=>'vendor_deliveries','method'=>'post')); ?>
                    <input type="hidden" value="<?= date('Y-m-d')?>" name="csv_start_date" id="csv_start_date">
                    <input type="hidden" value="<?= date('Y-m-d')?>" name="csv_end_date" id="csv_end_date">
                    <input type="hidden" value="<?= date('Y-m-d')?>" name="csv_vendor_id" id="csv_vendor_id">
                    <button onclick="javascript:submit_form('vendor_deliveries')" type="submit_" class="btn green" style=" color: #fff;background-color: #197990 !important;border-color: white;">Download <i class="icon-download"></i></button>
                    <?php echo form_close(); ?>
                </li>
                  <h2 class="page-title" style="margin-top: -18px;">Status Wise Deliveries</h2>
            </ul> -->
                    <div class="col-sm-12">
                        <div class="card-box" style="width: 100% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    
                     <div class="col-lg-3">
                         
                          <select class="form-control" name="status_option" id="status_option">
                            <option value="Assign">Assign</option>
                            <option value="Not Assign">Not Assign</option>
                            <option value="Ship">Ship</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancel">Cancel</option>
                            <option value="Return">Return</option>
                        </select>

                    </div>
                     <div class="col-lg-4">
                           <div class="input-group input-large  input-daterange" data-date="<?= date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" name="from" id="from_date" value="<?= date('Y-m-d'); ?>">
                                   <span class="" style="margin-top: 5px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" name="to" id="to_date" value="<?= date('Y-m-d'); ?>">
                            </div>
                    </div>
                    <div class="col-lg-2">
                          <div class="btn-group">
                           
                         <button onclick="get_reports(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>
                        </div>
                                  

                    </div>
                </div>   
                       
                          </div> 
                             
                    </div> <!-- end col-->
                </div>
    <!-- END PAGE HEADER-->

    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
              
                <div class="card-box" style="overflow: auto;">
                        <table class="table table-striped table-bordered table-hover" id="report_table">
                        <thead id="table_header" style="background-color: #f1f5f7">
                        <tr>
                            <th>Delivery ID</th>
                            <th>Customer</th>
                            <th>Delivery Address</th>
                            <th>Notes</th>
                            <th>Time Slot</th>
                            <th style="min-width: 120px">Emirate With Time</th>
                            <th>Driver</th>
                            <th>Partner</th>
                          <th>Received Bags</th>
                            <th>Ice Packs</th>
                            <th>Delivery Date</th>
                            <th>Notification</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="table_body"></tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->

</div>
</div>
<!-- END CONTENT -->
</div>
        

         <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
       <!--  <footer class="footer">
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
        </footer> -->
        <!-- end Footer -->

        <!-- Right Sidebar -->
      
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        
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
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js" integrity="sha256-zGo0JbZ5Sn6wU76MyVL0TrUZUq5GLXaFnMQCe/hSwVI=" crossorigin="anonymous"></script> -->

<script type="text/javascript">
   
    var status_delivery;
    jQuery(document).ready(function() {

        $("#from_date").flatpickr({
            defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });
        
        var link_id = 'deliveries_status_report';
       // App.side_Menu(link_id);

        date_picker();

        //bind event with drop down
        $("#status_option").change(function(){
            get_reports();
        });

        get_deliveries_report_by_status();
    });

    function get_reports(e){
        $("#table_body").empty();
        if(e)
            get_deliveries_report_by_status(e.target);
        else
            get_deliveries_report_by_status();

    }

    //GENERAL METHODS
    function init_table(){
        status_delivery =  $('#report_table').dataTable( {
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

          
   
    function date_picker() {
        var date = new Date();
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                //rtl: App.isRTL(),
                autoclose: true
                //endDate : new Date(date.getFullYear(), date.getMonth(), date.getDate())

            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    //get sale item report
    function get_deliveries_report_by_status(el){
        $("#download_btn_container").hide();
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        var option = $("#status_option").val();

        if(status_delivery){
            $('#report_table').dataTable().fnDestroy();
        }

        $("#table_body").empty();
        if(el)
        {
            el.disbaled = true;
            el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>';
        }
        var url = "<?php echo base_url(); ?>"+"report/get_deliveries_report_by_status2";
        $fields = {'start_date':from_date, 'end_date':to_date, 'status':option};
        $.post(url, $fields, function(response){
            if(el)
            {
                el.disbaled = false;
                el.innerHTML = 'Get Report<i class="icon-plus"></i>';
            }
            var data = '';
            if(response.success){
                data = response.report_data.records;
                $("#table_body").append(set_report_data(data));
                $("#download_btn_container").show();
            }

            init_table();
        },'json');
    }

    function set_report_data(data){
        var tbody = '';

        $.each(data, function(i, e){
              tbody += '<tr class="odd gradeX">';
            tbody += '<td >'+ e.order_id +'</td>';
            tbody += '<td >'+ e.name_on_delivery +'<br/>'+ e.c_phone +'</td>';
             tbody += '<td >'+ e.delivery_address +'</td>';
              tbody += '<td >'+ e.note +'</td>';
              tbody += '<td >'+ e.delivery_date +'<br/>'+ e.delivery_time +'</td>';
               tbody += '<td >'+ e.delivery_type +'</td>';
            tbody += '<td >'+ e.driver +'<br/>'+ e.d_phone +'</td>';
            tbody += '<td >'+ e.vendor +'<br/>'+ e.v_phone +'</td>';
           tbody += '<td >'+ e.bag_received +'</td>';
              tbody += '<td >'+ e.ice_bags +'</td>';
            tbody += '<td >'+ e.delivery_date +'</td>';
           tbody += '<td >'+ e.send_notification +'</td>';
           
          
            tbody += '<td >'+ e.status+'</td>';
            tbody += '</tr >';
        });
        return tbody;
    }

    function submit_form(ele){
        var from_date = moment($("#from_date").val(), 'DD-MM-YYYY').subtract(0, 'days').format('YYYY-MM-DD 23:59:59');
        var to_date = moment($("#to_date").val(), 'DD-MM-YYYY').format('YYYY-MM-DD 23:59:59');
        var option = $("select#status_option option:selected").val();
        $("#csv_start_date").val(from_date);
        $("#csv_end_date").val(to_date);
        $("#csv_status").val(option);
        $("#"+ele).submit();
    }

</script>
       
    </body>
</html>