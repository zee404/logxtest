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
        <!--<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css"/>-->
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
        <!--<link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>-->
        <!--<link href="<?php echo base_url()?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>-->
        <!--<link href="<?php echo base_url()?>assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>-->
        <!--<link href="<?php echo base_url()?>assets/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>-->
        <!--<link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet" type="text/css"/>-->
        <link href="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
      
        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
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
.btn-group{
    margin-top: -10px;
    margin-bottom: 10px;

}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
}
/*div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-left: 800px;
}*/

.select2-drop-active{
    margin-top: -25px;
}

.select2-container--default .select2-selection--single {
    /* background-color: #fff; */
    /* border: 1px solid #aaa; */
    border-radius: 4px;
    height: 36px;
}


.select2-container--default .select2-results>.select2-results__options {
    max-height: 400px;
    overflow-y: auto;
}

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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Vendors Report </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor Wise Complete Report </a></li>
                                  
                                </ol>
                            </div>
                          <h4 class="page-title">Vendor Wise Complete Report</h4>
                        </div>
                    </div>
                </div>
                </div>
                </div> 
                </div>

<!-- BEGIN CONTENT -->
<div class="wrapper" >

<div class="container-fluid">
  
 <form action="<?php echo base_url('Ptests/partner_report') ?>" id="add_vendor_form"  name ="form" method="post" class="horizontal-form" >
    <!-- BEGIN PAGE HEADER-->
      <div class="row">
         
          

                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card-box" >
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                     <div class="col-lg-3">
                         
                         <select class="form-control search_option" name="vendor_list" id="vendor_list" required="">
                            <option value="">Select Partner</option>
                            <?php foreach ($vendors as $key => $ven) {?>
                                <option value="<?= $ven->id; ?>" ><?= $ven->email.' - '.$ven->full_name; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                     <div class="col-lg-4">
                           <div class="input-group input-large  input-daterange" data-date="<?= date('Y-m-d'); ?>" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" name="from" id="from_date" value="<?= date('Y-m-d'); ?>">
                                <span class="" style="margin-top: 5px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" name="to" id="to_date" value="<?= date('Y-m-d'); ?>">
                            </div>
                    </div>
                    <div class="col-lg-5">
                          <div class="btn-group">
                          
                        <button onclick="get_reports(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report </button>
                        &nbsp &nbsp  <button type="submit" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Download Report</button>
                        <!--&nbsp &nbsp <button type="submit" formaction="<?php echo base_url('ptests/partner_report_seprate'); ?>" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Seprate</button>-->
                        &nbsp &nbsp <button type="submit" formaction="<?php echo base_url('ptests/partner_report_email'); ?>" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Send Email</button>
                        <!--&nbsp &nbsp <button type="submit" formaction="<?php echo base_url('ptests/bag_pickup_report'); ?>" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Download Bag Pickup Report</button>-->
                   
                    </div>
                                  

                    </div>
                    
                    
                </div>   
                       
                          </div> 
                             
                    </div> <!-- end col-->
                </div>
                
                
                <!--NEW ADDINGS-->
                <div class="row">
         
          

                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card-box" >
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                     <div class="col-lg-3">
                         
                         <select class="search_option2 form-control" name="emirate_list" id="emirate_list" >
                            <option value="">Select Emirate-TimeSlot (Optional)</option>
                              <?php foreach($dtypes AS $dtype): ?>
                                  <option><?php echo $dtype ?></option>
                                <?php endforeach; ?>
                        </select>

                    </div>
                     
                    <div class="col-lg-5">
                          <div class="btn-group">
                          
                         &nbsp &nbsp <button type="submit" formaction="<?php echo base_url('ptests/bag_pickup_report'); ?>" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Download Bag Pickup Report</button>
                   
                    </div>
                                  

                    </div>
                    
                    
                </div>   
                       
                          </div> 
                             
                    </div> <!-- end col-->
                </div>
                
                
                <!--NEW ADDINGS END-->
                
                
                 </form> 
    <!-- END PAGE HEADER-->

    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
              
               <div class="card-box" style="overflow: auto;"> 
                   
                    <table class="table table-striped table-bordered table-hover" id="report_table">
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
        
        <!--givin error-->
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

       <!--<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>-->
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
<script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script> 



        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js" integrity="sha256-zGo0JbZ5Sn6wU76MyVL0TrUZUq5GLXaFnMQCe/hSwVI=" crossorigin="anonymous"></script> -->
    
<script type="text/javascript">
   
    var delivery_table;
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
        var link_id = 'vendor_deliveries';
       // App.side_Menu(link_id);

        date_picker();
        init_table();
     
        $('.search_option').select2({
  placeholder: 'Select Partner'
});

 $('.search_option2').select2({
  placeholder: 'Select EmirateTimeSlot (Optional)'
});
        
        <?php if (!empty($this->session->flashdata('error'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('error') ?>';
                console.log(msgg);
                swal(msgg, "", "error");
            <?php } ?>

            <?php if (!empty($this->session->flashdata('success'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('success') ?>';
                console.log(msgg);
                swal(msgg, "", "success");
            <?php } ?>

    });


    function get_reports(e){
        //e.target.disabled = true;
        var vendor_id = $("select#vendor_list option:selected").val();
        
        if(vendor_id){
            e.target.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading';
        
        get_deliveries_report_by_vendor(vendor_id, e.target);
        }else{
            swal('missing fields', 'Please Select vendor!', 'error');
        }

    }

    //GENERAL METHODS
    function init_table(){

       delivery_table = $('#report_table').dataTable( {
                  "scrollX": true,
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
                
                autoclose: true
               // endDate : new Date(date.getFullYear(), date.getMonth(), date.getDate())

            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    function get_deliveries_report_by_vendor(vendor_id, el){
        $("#download_btn_container").hide();
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');


        if(delivery_table){
            $('#report_table').dataTable().fnDestroy();
        }

        $("#table_body").empty();

        var url = "<?php echo base_url(); ?>"+"report/get_deliveries_report_by_vendor_every_detail";
        $fields = {'start_date':from_date, 'end_date':to_date, 'vendor_id':vendor_id};

        if(vendor_id) {
            el.disabled = true;

            $.post(url, $fields, function (response) {
                el.disabled = false;
                el.innerHTML = 'Get Report <i class="icon-plus"></i>';
                var data = '';
                $("#table_body").empty();

                if (response.success) {
                    
                    data = response.report_data.records;
                    $("#table_body").append(set_report_data(data));

                    $("#download_btn_container").show();
                }
                init_table();
            }, 'json');
        }else{
            init_table();
        }
    }

    function set_report_data(data){
        var tbody = '';

        $.each(data, function(i, e){
            
            console.log(e);
          tbody += '<tr class="odd gradeX">';
            tbody += '<td style="min-width: 5px;">'+ e.order_id +'</td>';
           
                                              
              if(e.cooling_bag_check ==0){
                  tbody +='<td style="min-width: 100px;">Paper</td>';
              }else if(e.cooling_bag_check ==1){
                   tbody +='<td style="min-width: 100px;">Cooling Bag</td>';
              }else if(e.cooling_bag_check ==2){
                    tbody +='<td style="min-width: 100px;">Unknown</td>';
              } 
            tbody +='<td style="min-width: 100px;">'+e.status+'</td>';
            
            tbody +='<td style="min-width: 250px; align:center;">'+e.name_on_delivery+'<br>'+e.number_on_delivery+'<br>'+e.delivery_address+'</td>';
            tbody +='<td style="min-width: 150px; align:center;">'+e.vendor+'<br>'+e.vendorPhone+'</td>';
             if(e.bag_qr !=''){
              tbody +='<td style="min-width: 150px;">'+e.bag_qr+'</td>';
              }else{
              tbody +='<td style="min-width: 50px;">None</td>';
              } 
                                              
                                              
               if(e.qr_attached_dt_vendor !=''){
              tbody+='<td style="min-width: 100px;">'+e.qr_attached_dt_vendor+'</td>';
              }else{
              tbody+= '<td style="min-width: 100px;">None</td>';
              } 
              
              if(e.driver_warehouse_scanning !=''){
             tbody+= '<td style="min-width: 150px;">'+e.driver_warehouse_scanning+'</td>';
              }else{
              tbody+= '<td style="min-width: 50px;">No</td>';
              } 
                                              
               if(e.driver_scanning_dt !=''){
             tbody+= '<td style="min-width: 100px;">'+e.driver_scanning_dt+'</td>';
              }else{
             tbody+='<td style="min-width: 50px;">None</td>';
              } 
              
            //   <!--Double verification-->
                if(e.driver_verify_bag !=''){
              tbody+='<td style="min-width: 150px;"> yes <br>'+e.driver_verify_bag+'</td>';
              }else{
              tbody+='<td style="min-width: 50px;">no</td>';
              }
              
              tbody+='<td style="min-width: 150px;">'+e.delivery_date+'</td>';
              tbody+='<td style="min-width: 150px;">'+e.delivered_date+'</td>';
              
                                             
                                              
               if(e.delivered_status ==1){
              tbody+='<td style="min-width: 150px;">'+e.driver_who_deliver+'<br>'+e.driver_deliverPhone+'</td>';
              }else{
              tbody+='<td style="min-width: 50px;">None</td>';
              } 
              
               if(e.total_bag_recv_by_driver !=0){
              tbody+='<td style="min-width: 50px;">'+e.total_bag_recv_by_driver+'</td>';
              }else{
              tbody+='<td style="min-width: 50px;">'+e.total_bag_recv_by_driver+'</td>';
              } 
              
               if(e.tot_ice_pack_received !=0){
              tbody+='<td style="min-width: 50px;">'+e.tot_ice_pack_received+'</td>';
              }else{
              tbody+='<td style="min-width: 50px;">'+e.tot_ice_pack_received+'</td>';
              } 
                                              
                                              
               if(e.bag_received_qr !=''){
              tbody+='<td style="min-width: 150px;">'+e.bag_received_qr+'</td>';
              }else{
              tbody+='<td style="min-width: 50px;">None</td>';
              } 
              
               if(e.own_bag_rcv_order_id !=0 && e.status =='Collected'){
              tbody+='<td style="min-width: 150px;">Delivery</td>';
              tbody+='<td style="min-width: 50px;">'+e.own_bag_rcv_order_id+'</td>';
              tbody+='<td style="min-width: 150px;aligne:center;">'+e.driver_who_recv+'<br>'+e.driver_recvPhone+'</td>';
              tbody+='<td style="min-width: 150px;">'+e.own_bag_rcv_by_dt+'</td>';
              tbody+='<td style="min-width: 250px;aligne:center;">'+e.customer_recv+'<br>'+e.customer_recv_Phone+'<br>'+e.customer_recv_address+'</td>';
                  
              }else if(e.own_bag_rcv_bag_collection_id !=0 && e.status =='Collected'){
              tbody+='<td style="min-width: 150px;">Bags Collection</td>';
              tbody+='<td style="min-width: 50px;">'+e.own_bag_rcv_bag_collection_id+'</td>';
              tbody+='<td style="min-width: 150px;align:center;">'+e.bag_driver_name+'<br>'+e.bag_driver_phone+'</td>';
              tbody+='<td style="min-width: 150px;">'+e.own_bag_rcv_by_dt+'</td>';
              tbody+='<td style="min-width: 250px;aligne:center;">'+e.bag_customer_rcv+'<br>'+e.bag_phn_rcv+'<br>'+e.bag_rcv_address+'</td>';
                                
              }else{
              tbody+='<td style="min-width: 50px;">None</td>';
              tbody+='<td style="min-width: 50px;">0</td>';
              tbody+='<td style="min-width: 50px;">None</td>';
              tbody+='<td style="min-width: 50px;">None</td>';
              tbody+='<td style="min-width: 50px;">None</td>';
              
              } 
              
             tbody+='<td style="min-width: 50px;">'+e.str_keep_varification+'</td>';
               if(e.str_keepr_name !='NULL' || e.str_keepr_name !=''){
              tbody+='<td style="min-width: 150px;">'+e.str_keepr_name+'<br>'+e.str_keeper_Phone+'</td>';
              tbody+='<td style="min-width: 150px;">'+e.varified_at+'</td>';
              }else{
              tbody+='<td style="min-width: 50px;">None</td>';
              tbody+='<td style="min-width: 50px;">None</td>';
              } 
              
              
               if(e.is_neutral ==1){
                   tbody+='<td style="min-width: 50px;">yes</td>';
              tbody+='<td style="min-width: 150px;">'+e.neutral_name+'<br>'+e.neutral_Phone+'</td>';
              tbody+='<td style="min-width: 150px;">'+e.neutral_at+'</td>';
              }else{
                  tbody+='<td style="width: 10%;">no</td>';
              tbody+='<td style="min-width: 50px;">None</td>';
              tbody+='<td style="min-width: 50px;">None</td>';
              } 
                                           
            tbody += '</tr >';
        });
        
        console.log(tbody);
        return tbody;
    }

    function submit_form(ele){
        var from_date = moment($("#from_date").val(), 'DD-MM-YYYY').subtract(0, 'days').format('YYYY-MM-DD 23:59:59');
        var to_date = moment($("#to_date").val(), 'DD-MM-YYYY').format('YYYY-MM-DD 23:59:59');
        var vendor_id = $("select#vendor_list option:selected").val();
        $("#csv_vendor_id").val(vendor_id);
        $("#csv_start_date").val(from_date);
        $("#csv_end_date").val(to_date);
        $("#"+ele).submit();
    }
 $(document).ready(function () {
         
         
                $('.example').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print','colvis'
                    ]
                });
                });
</script>
       
    </body>
</html>