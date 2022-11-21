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
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -36px;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Oprations </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Completed Deliveries</a></li>
                                  
                                </ol>
                            </div>
                             <h4 class="page-title">Completed Delivereisxxxxxx</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                   <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?= date('d-m-Y'); ?>">
                                        <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to" id="to_date" value="<?php  echo date('d-m-Y', strtotime($cdate. ' + 1 days')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                  <!--    <div class="col-lg-3">
                         
                         <select class="form-control" name="vendor_list" id="vendor_list">
                            <option value="">Number of Records</option>
                            <option value="">100</option>
                            <option value="">200</option>
                            <option value="">300</option>
                           
                            
                        </select>

                    </div> -->
                    <div class="col-lg-2">
                          <div class="btn-group">
                            <button onclick="get_reports(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Records <i class="icon-plus"></i>
                            </button>
                        </div>
                                  

                    </div>
                </div>   
                            
                               <!-- <div class="col-md-4">
                                 <h3>Bags Tracking</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?= date('d-m-Y'); ?>">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" value="<?= date('d-m-Y'); ?>"class="form-control" name="to" id="to_date">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                       
                          </div>
                           <div class="card-box">  
                            
                            <table class="example table table-responsive table-bordered table-hover dataTable no-footer" id="order_table">

                                <thead class="thead-light">

                                <tr>
                                 
                                    <th>Order_ID</th>
                                    <th>Customer</th>
                                    <th >Delivery Address</th>
                                    <th>Notes</th>
                                    <th>Time Slot</th>
                                    <th>Driver</th>
                                    <th >Partner</th>
                                    <th >Assigned At</th>
                                    <th>Pickup Location</th>
                                    <th >Delivery At</th>
                                    <th>Bag Received</th>
                                    <th >Ice Packs</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                   
                                    

                                </tr>
                                </thead>

                                <tbody id="table_body">
                                     <?php if ($orders['result']){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                        <tr>
                                           <!--  <td><input type="checkbox" class="checkboxes" value="<?php echo $order->order_id;?>" /></td> -->
                                            <td><?php echo $order->order_id;?></td>
                                             
                                            <td><?php echo $order->number_on_delivery.'<br/>'; if($order->customer=="No Name"){ echo $order->name_on_delivery;}else{ echo $order->name_on_delivery; } ?></td>
                                            <td><?php echo $order->delivery_address;?></td>
                                            <td> <?php echo $order->note;?></td>
                                            <td><?php echo $order->delivery_date." ".$order->delivery_time;?></td>
                                            <td><?php echo $order->d_phone.'<br/>'.$order->driver;?></td>
                                            <td><?php echo $order->v_phone.'<br/>'.$order->vendor;?></td>
                                            <td><?php echo $order->assign_date;?></td>
                                           
                                            <td ><?php echo $order->pickUp;;?></td>
                                              
                                            
                                            <td><?php echo $order->delivered_date." ".$order->delivered_time;?></td>
                                            
                                            <td><?php echo $order->bag_received;?></td>
                                            <td><?php echo $order->ice_bags;?></td>
                                            <td><?php echo "Completed";?></td>
                                            <td>
                                               
                                                 <a class="" title="View"data-toggle="modal" onclick="javascript:order_detail(this)" href="#responsive" pk="<?php echo $order->order_id;?>">
                                                    <i class="dripicons-preview" style="font-size: 20px;"></i>
                                                </a>
                                               
                                            </td >

                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

  <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-wide_">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="mod_title">Delivery Details</h4>
                        </div>
                        <div class="modal-body">
                           

                            <div class="row" id="v_summery_data"></div>
                        </div>
                        <div class="modal-footer">
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue default">Close</button>
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
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
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
       
        <script type="text/javascript">
          $("#from_date").flatpickr({
            defaultDate: new Date()
        });
        $("#to_date").flatpickr({
           defaultDate: new Date()
        });
           $(document).ready(function () {

              init_table(); 

              $('#abc').on('click', function () {
               swal("Delete", "Successfully Delete", "success");
              });

         
               
                });
        </script>
        <script type="text/javascript">
    jQuery(document).ready(function() {
        var link_id = 'manage_upload_customers';
      //  App.side_Menu(link_id);
    });

</script>
<script type="text/javascript">
      var assign_table;
       function init_table(){

        // if ($.fn.DataTable.isDataTable( '#order_table' ) ) {
        //     $('#order_table').dataTable().fnDestroy();
        // }

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
        
        if(assign_table){
            $('#order_table').dataTable().fnDestroy();
        }

       

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

                if(assign_table){
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
            //tbody += '<td >'+cStatus +'<br>';

             imagee = '';
            if(e.delivery_img != null){
                imagee = e.delivery_img;
            }

            //tbody += '<div class="mix-details">';
            tbody += '<td><a class="mix-preview fancybox-button" href="'+(imagee ? imagee : '#') +'" title="" data-rel="fancybox-button_">';
            //tbody += '<img style="max-width: 30%" class="img-responsive_" src="'+image+'" alt="">';
            tbody += imagee ? 'Image Available' : 'Image Not Available';
            tbody += '</a>';
            tbody += '</div>';
            tbody += '</td>';

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
        var sig_url = "<?php echo base_url(); ?>"+"upload/"+summery.signature_img;
        var  summery_data = '<div class="note note-info" style="background-color: #E8F6FC;">';
        summery_data += '<h4 class="block">Delivery Details</h4>';

        summery_data += '<div class="row">';
        summery_data += '<div class="col-md-4"><div class="row"><div class="col-md-12"><h5>Delivery Image</h5>';
        
        summery_data += '<img src="'+img_url+'" width="100%" class="img-responsive img-thumbnail">';
        summery_data += '</div>';
        summery_data += '<div class="col-md-12"><h5>Signature Image</h5>';
        summery_data += '<img src="'+sig_url+'" width="100%" class="img-responsive img-thumbnail">';
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
        // bags info
     summery_data += '<div class="note note-success">';
        summery_data += '<h4 class="block">Bags Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<form action="<?php echo base_url('order/update_bagsinfo/')?>'+summery.delivery_id+'" method="post">';
        summery_data += '<li><strong>Bags Received : </strong><input name="bag_received" type="number" class="form-control" value="'+summery.bag_received+'" /></li>';
        summery_data += '<li><strong>Ice Bags : </strong><input name="ice_bags" type="number" class="form-control" value="'+summery.ice_bags+'" /></li>';
summery_data += '<br /><button class="btn btn-info" type="submit">Update</button>';
summery_data += '</form>';
        summery_data += '</ul>';
        summery_data += '</div>';
        return summery_data;
    }

</script>
       
    </body>
</html>