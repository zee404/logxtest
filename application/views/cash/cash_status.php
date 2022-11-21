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
            .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

            }table, td, th {
  border: 1px solid;
  border-color: #dee2e6;
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
                margin-top: -39px;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Accounts</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                                  
                                </ol>
                            </div>
                           <h4 class="page-title">Cash</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="width: 104% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
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
                            <option value="">All records</option>
                            <option value="Requested">Only Unassigned</option>
                            <option value="Assigned">Only Assigned</option>
                            <option value="Picked">Only Picked</option>
                            <option value="No Cash">No Cash Found</option>
                           
                            
                        </select>

                    </div> 
                    <div class="col-lg-2">
                          <div class="btn-group">
                                <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>
                        </div>
                                  

                    </div>
                </div>   
                            
                             

                       
                          </div> 

                            <div class="card-box"  style="width: 104% !important;"> 
                            <?php if($this->session->userdata('role') != 'vendor') {?> 
                            <div class="row" id="action_row" style="margin-bottom: 15px; display: none;">
                                <div class="col-md-12">
                                   
                                    <button type="button" class="btn btn-danger" id="print_btn">Print Label</button>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="row" id="action_row" style="margin-bottom: 15px; display: none;">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger" id="print_btn">Print Label</button>
                                </div>
                            </div>
                            <?php } ?>
                            <table  class="example1 table table-responsive"  id="order_table">

                                <thead class="thead-light">

                                <tr>
                                    <th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" ></th>
                                     <th>Sr No</th>
                                    <th>Cash ID</th>
                                   
                                    <!-- <th>QR</th> -->
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Notes</th>
                                    <th style="min-width: 100px">Type(Emirate With Time)</th>
                                    <th>Driver</th>
                                    
                                    <th>Assigned At</th>
                                    <th>Need To Be Picked Date</th>
                                    <th>Received Ammount</th>
                                    <th>Collected Date</th>
                                    <th>Notification</th>
                                 
                                    <th>Assigned By</th>
                                    <th>Assign Mode</th>
                                    <th>Cash status</th>
                                    <th>Partner</th>
                                    <th>Emirate</th>
                                    <th>Service</th>
                                     <th>Price</th>
                                     
                                     
                                   <th style="min-width: 70px">Action</th>
                                     
                                    

                                </tr>
                                </thead>

                                <tbody id="table_body">

                                <?php if ($orders['result']){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                        <tr>
                                         <td ><input type="checkbox" class="checkboxes" value="<?php echo $order->cash_id; ?>"> </td>
                                        <?php if($order->discount_track != '0' AND  $order->discount_track != ''){  ?>
                                             <td ><span style=" color:pink;" class="badge"><?php echo $key+1;?> &nbsp (Discounted)</span></td>';
                                         <?php  }else{  ?>
                                               <td ><?php echo $key+1;?></td>
                                           <?php    }     ?>
         
                                            
                                            <td ><?php echo $order->cash_id;?></td>
                                            
                                            <td><?php echo $order->customer.'<br/>'.c_phone; ?> </td>
                                            <td><?php echo $order->address;?></td>
                                            <td><?php echo $order->cash_note;?></td>
                                            <td><?php echo $order->type_id;?></td>
                                            <td><?php echo $order->driver.'<br/>'.$order->d_phone;?></td>
                                            
                                            <td><?php echo $order->assign_date;?></td>
                                            <td ><?php echo $order->pick_date;?></td>
                                            <td><?php echo $order->amount_received ?></td>
                                            <td><?php echo $order->collected_date ?></td>
                                            <td><?php echo $order->cash_notification ?></td>
                                            <td><?php echo $order->assigned_user ?></td>
                                            <td><?php echo $order->assigned_mode ?></td>
                                            <!--<?php //if($order->status == 'Ship'){ ?>-->
                                            <!--    <td>In Progress</td>-->
                                            <!--<?php // }else{ ?>-->
                                            <td><?php echo $order->status ?></td>
                                            <!--<?php //} ?>-->
                                            <td><?php echo $order->v_phone.'<br/>'.$order->vendor;?></td>
                                            <td><?php echo $order->emirate ?></td>
                                            <td><?php echo $order->service ?></td>
                                            <td><?php echo $order->partner_price ?></td>
                                            
                                              
                                              <!--<td> <button type="button" class="btn btn-default btn-sm btn-small" data-toggle="tooltip" data-placement="top" title="<?php echo $order->note;?>">Read Note</button></td>-->
                                            <!-- <td><?php //echo $order->delivered_date." ".$order->delivered_time;?></td> -->
                                           
                                           
                                            <!-- <td><?php //echo get_order_status($order->status);?></td> -->

                                            <td>
                                             
                                                 <a class="" title="View" data-toggle="modal" onclick="javascript:order_detail(this)" href="#responsive" pk="<?php echo $order->cash_id;?>" tk="<?php echo $order->discount_track;?>">
                                                    <i class="dripicons-preview" style="font-size: 20px;"></i>
                                                </a>
                                                 &nbsp;
                                            <?php if($order->status != 'Picked' && $order->status  !='No Cash'){?>
                                                <?php if(strtolower($this->session->userdata('role')) == 'admin'){  ?>
                                                 <a class="Delete"  data-toggle="modal" onclick="javascript:cancel_delivery(this)" href="#responsive_neww" pk="<?php echo $order->cash_id;?>">
                                                    <i class="dripicons-tag-delete" style="font-size:20px;" ></i>
                                                </a>
                                            <?php } ?>
                                                
                                                <?php } ?>
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
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="mod_title">Delivery Details</h4>
                        </div>
                        <div class="modal-body">
                           

                            <div class="row" id="v_summery_data"></div>
                        </div>
                        <div class="modal-footer">
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue btn-info">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            <!--FOR CANCEL DELIVERY-->
            
              <div id="responsive_neww" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-wide_">
                    <div class="modal-content">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="cancel_mod_title">Cancel Cash </h4>
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
            
            
            <!--CANCEL DELIVERY END-->

  
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
         <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>

        <!-- Init js -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/scripts/custom.js"></script>
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script type="text/javascript">
         
           $(document).ready(function () {
       
            
            
            $("#print_btn").click(function(){
                var ids = [];
                $(".checkboxes:checked").each(function(){
                    ids.push($(this).val());
                });

                if(ids.length < -1)
                    return;
                ids = ids.join();
                window.open('<?php echo base_url() ?>report/AC_print/orders/'+ids, '_blank');
            });
            

            
            $("#from_date").flatpickr({
            defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });

         
               init_table();
                
               
               
           });
                
       
        </script>
       
<script type="text/javascript">
          i_image_str = '';
     var un_assign_table;
     function init_table(){
        un_assign_table = $('#order_table').DataTable({
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
  
    function get_reports(e){
        $("#table_body").empty();
        get_deliveries_report_by_status(e.target);
    }

    function get_deliveries_report_by_status(el){
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD');
        var option = $('#search_option').val();

        if(un_assign_table){
            $('#order_table').dataTable().fnDestroy();
        }

        $("#table_body").empty();

        var url = "<?php echo base_url(); ?>"+"report/AC_get_cashs_report_by_status";
        
        $fields = {'start_date':from_date, 'end_date':to_date, 'status':option};
        el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        el.disabled = true; 
        $.post(url, $fields, function(response){
            el.disabled = false;
            el.innerHTML = 'Get Report <i class="icon-plus"></i>';
            if(response.success){
                var data = response.report_data.records;

                $("#table_body").append(set_report_data(data));
            }

            init_table();
        },'json');
    }

    function set_report_data(data){
         var url = "<?php echo base_url(); ?>";
        var tbody = ''; 
        var login_user = '<?php echo strtolower($this->session->userdata('role')) ?>';

        $.each(data, function(i, e){
            console.log(e);
            tbody += '<tr class="odd gradeX">';
           tbody += '<td><input type="checkbox" class="checkboxes" value="'+ e.cash_id+'" /></td>';
           
           if(e.discount_track != '0' && e.discount_track != ''){
               tbody += '<td ><span style=" color:pink;" class="badge">'+(i+1)+'&nbsp (Discounted)</span></td>';
           }else{
               tbody += '<td>'+(i+1)+'</td>';
           }
           
            tbody += '<td >'+ e.cash_id +'</td>';
             //tbody += '<td ><img src="'+ url+e.qrImage +'" /></td>';
            tbody += '<td >'+ e.customer +' '+ e.c_phone +'</td>';
            tbody += '<td >'+ e.address + '</td>';   
             tbody += '<td >'+e.cash_note+'</td>'; 
              tbody += '<td >'+ e.type_id +'</td>';
             
            tbody += '<td >'+ e.driver +' '+ e.d_phone +'</td>';
           
            tbody += '<td >'+ e.assign_date +'</td>';
             tbody += '<td >'+ e.pick_date +'</td>';
            tbody += '<td >'+ e.amount_received +'</td>';
              tbody += '<td >'+ e.collected_date +'</td>';
              
            tbody += '<td >'+ e.cash_notification +'</td>';
            tbody += '<td >'+ e.assigned_user +'</td>';
            tbody += '<td >'+ e.assigned_mode +'</td>';
           
            // if(e.status == 'Ship'){
            //          tbody += '<td>In Progress</td>';
            // }else{
                   tbody += '<td >'+ e.status +'</td>';
            // }
            
            tbody += '<td >'+ e.vendor +' '+ e.v_phone +'</td>';
               
               tbody += '<td >'+ e.emirate +'</td>';
               tbody += '<td >'+ e.service  +'</td>';
                  tbody += '<td >'+ e.partner_price  +'</td>';
           
                                            
                                            
                                            

            tbody += '<td>';
            tbody += '<a class="btn default btn-xs green-stripe" data-toggle="modal" onclick="javascript:order_detail(this)" href="#responsive" pk="'+ e.cash_id +'" tk="'+ e.discount_track +'" > <i class="dripicons-preview" style="font-size: 20px;color: #7e57c2;"></i></a>&nbsp;';
            if(e.status != 'Picked' && e.status !='No Cash') {
                if (login_user == 'admin') {
                    tbody += '<a title="Cancel" data-toggle="modal" onclick="javascript:cancel_delivery(this)" href="#responsive_neww" pk="' + e.cash_id + '"  >';
                tbody += '<i class="dripicons-tag-delete"style="font-size: 20px;color: #7e57c2;"></i></a>';    
                }
                
            }
            tbody += '</td>';

            tbody += '</tr >';
        });
        return tbody;
    }
     function cancel_delivery(ele){
           var delivery_id = $(ele).attr('pk');
           console.log('hi i am cancel delivery');
           get_order_by_id_cancel(delivery_id);
           
    }
    
    
    
     function get_order_by_id_cancel(id){
        //hide_error();
         console.log('hi i am start of get order by id');
        var track_id=0;
 
        var url = "<?php echo base_url(); ?>"+"cash/AC_get_cash_by_id";
        $fields = {'cash_id':id, 'track_ids':track_id};
        $.post(url, $fields, function(response){
            if(response.success){
                
                var detail = response.detail;
            
                
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
     
         console.log('hi i am start of set cancel');
       

        //set order status
        // $("#cancel_mod_title").html('Delivery Details of '+summery.status);

        // var img_url = "<?php //echo base_url(); ?>"+"upload/"+summery.delivery_img;
        
        var  cancel_summery_data = '<div class="portlet-body form">';
        cancel_summery_data += '<input type="hidden" name="cancel_order_id" value="'+cancel_summery.cash_id+'" id="cancel_order_id" class="form-control">';
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
        cancel_summery_data += '<select id="cancel_mode" class="form-control"><option value="Paid_cancel">Paid Cancel</option>  <option value="Unpaid_cancel">Unpaid Cancel</option></select>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += ' <div class="col-md-6">';
        cancel_summery_data += '<div class="form-group input-group-sm"> <label class="control-label">Prof Image</label>';
        cancel_summery_data += '<input type="file"  name="i_image" id="i_image" class="form-control ">';
        
        cancel_summery_data += '<span id="i_img_msg" style="color: red"></span>';
        cancel_summery_data += '<img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_i_image">';
        cancel_summery_data += '</div> </div>';
        
        cancel_summery_data += '</div>';
        
        // Short Note
        
                     
        
        cancel_summery_data += '<div class="row">';
         
         cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Short Note</label>';
        cancel_summery_data += '<textarea name="note" id="note" rows="5" class="form-control" style="width:100%;"></textarea>';
        cancel_summery_data += ' </div> </div>';
        cancel_summery_data += '</div>';
        
        cancel_summery_data += '</div>';
          
          //console.log(cancel_summery_data);
          
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
         if(mode=='Paid_cancel'){
            var pmsg='paid cancellation';
        }else{
            var pmsg='unpaid cancellation';
        }
         Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to cancel this Cash with "+pmsg+" charges!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, cancel it!'
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
                        var profImg=i_image_str;
                        
                        console.log('hi i am confirm cancel:'+cancel_o_id);
                        console.log(mode);
                        console.log(cancelation_price);
                        console.log('note'+note);
                        console.log('image'+profImg);
                        
                        
                           $.ajax({
                                    url: '<?php echo base_url('cash/AC_cancel_cash');?>',
                                    type: 'POST',
                                    data: {
                                        
                                        'id':cancel_o_id,
                                        'mode':mode,
                                        'note':note,
                                        'profImg':profImg,
                                        'cancelation_price':cancelation_price
                                       
                                    },
                                    success: function (res) {
                                        swal.fire("Cash Cancelled Successfully", "", "success").then(function(){ location.reload(); });
               
                                       
                                    },
                                    error: function (err) {
                                        console.log(err);
                                         swal('Network Issue', 'Please Try Again!', 'error');
                                    }
                                });
                      
                        
                    }
                });
        
       
        
    }
    
       function order_detail(ele){
        $("#v_data").hide();
        $("#loading").show();
        var order_id = $(ele).attr('pk');
        var track_ids=$(ele).attr('tk');
        get_order_by_id(order_id,track_ids);
        // get_track_orders(track_ids);
    }

    
  

    //ORDER METHODS
    
    function get_order_by_id(id,track_ids){
        //hide_error();
 console.log('i am get order id func');
        var url = "<?php echo base_url(); ?>"+"cash/AC_get_cash_by_id";
        $fields = {'cash_id':id, 'track_ids':track_ids};
        $.post(url, $fields, function(response){
            if(response.success){
                 console.log('i am inside get first response');
                var details = response.detail;
                var track = response.track;
                
                var order_summery_detail = set_order_summery(details,track);
                $("#v_summery_data").empty();
                $("#v_summery_data").append(order_summery_detail);
                //$("#v_data").show();
                $("#loading").hide();
            }
        },'json');
    }
    
    

    function set_order_summery(summery_details,tracking_details){

        var summery = summery_details[0];
        
        
       

        //set order status
        $("#mod_title").html('Cash Details of '+summery.status);

        var img_url = summery.proof_image;
          
        var  summery_data = '<div class="note note-info" style="background-color: #E8F6FC;">';
        summery_data += '<h4 class="block">Cash Details</h4>';

        summery_data += '<div class="row">';
        summery_data += '<div class="col-md-4"><div class="row"><div class="col-md-12"><h5>Profe Image</h5>';
        
        summery_data += '<img src="'+img_url+'" width="100%" class="img-responsive img-thumbnail">';
        summery_data += '</div>';
       
        summery_data += '</div></div>';
        summery_data += '<div class="col-md-8">';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>ID : </strong>'+summery.cash_id+'</li>';
        summery_data += '<li><strong>Status : </strong>'+summery.status+'</li>';
        summery_data += '<li ><strong>Total Ammount : </strong>'+summery.total_amount+'</li>';
        summery_data += '<li><strong>Receieved Ammount : </strong>'+summery.amount_received+'</li>';
        summery_data += '<li><strong>Collected At : </strong>'+summery.collected_date+'</li>';
        summery_data += '<li><strong>Created Date : </strong>'+summery.created_date+'</li>';
        summery_data += '<li><strong>Assign Date : </strong>'+summery.assign_date+'</li>';
        
        
        summery_data += '<li style="color:#67737b;"><strong>Need to be Picked At : </strong>'+summery.pick_date+'</li>';
       
        summery_data += '<li style="color:#67737b;"><strong>Cash Address : </strong>'+summery.address+'</li>';
        
        
        summery_data += '</ul>';
        summery_data += '</div>';
        summery_data += '</div>';
        summery_data += '</div>';
 name = summery.name_on_delivery;
            
        summery_data += '<div class="note note-warning col-lg-12" style="background-color: #FCF3E1;margin-bottom: 18px;margin-top: 19px;">';
        summery_data += '<h4 class="block">Customer Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li style="color:#67737b;"><strong>Name : </strong>'+summery.customer+'</li>';
        summery_data += '<li style="color:#67737b;" ><strong>Phone : </strong>'+summery.c_phone+'</li>';
        summery_data += '<li style="color:#67737b;"><strong>Customer Address : </strong>'+summery.c_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';

        summery_data += '<div class="note note-info col-lg-12"style="background-color: #E8F6FC;margin-bottom: 18px">';
        summery_data += '<h4 class="block">Partner Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li style="color:#67737b;"><strong>Name : </strong>'+summery.vendor+'</li>';
        summery_data += '<li ><strong>Phone : </strong>'+summery.v_phone+'</li>';
        summery_data += '<li ><strong>Emirate : </strong>'+summery.emirate+'</li>';
        summery_data += '<li ><strong>Service : </strong>'+summery.service+'</li>';
        summery_data += '<li ><strong>Base Price : </strong>'+summery.partner_price+'</li>';
        summery_data += '</ul>';
        summery_data += '</div><br>';

         
        summery_data += '<div class="note note-success col-lg-12" style="background-color: #E8F6FC; margin-bottom: 18px">';
        summery_data += '<h4 class="block">Driver Information</h4>';
        
        if(summery.status == 'Requested'){
            
            
        }else{
                summery_data += '<ul class="list-unstyled">';
               
                summery_data += '<li><strong>Name : </strong>'+summery.driver+'</li>';
                summery_data += '<li><strong>Phone : </strong>'+summery.d_phone+'</li>';
        //        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
                summery_data += '</ul>';
        }
        summery_data += '</div> <br>';
        
       
         summery_data += '<br> <div class="note note-success col-lg-12" style="background-color: #FCF3E1; margin-bottom: 18px">';
        summery_data += '<h4 class="block">Tracking Information</h4>';
        
         summery_data += '<ol>';
         for(var ite=0; ite< tracking_details.length; ite++){
            
            var tracking=tracking_details[ite];
            // console.log(tracking);
            
            
       summery_data += '<li style="color:#67737b;">';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li style="color:#67737b;"><strong>Customer : </strong>'+tracking.customer+'</li>';
        summery_data += '<li  style="color:#67737b;"><strong>Phone : </strong>'+tracking.c_phone+'</li>';
        summery_data += '<li style="color:#67737b;"><strong>Vendor : </strong>'+tracking.vendor+'</li>';
      summery_data += '<li style="color:#67737b;"><strong>Pickup Address : </strong>'+tracking.cash_address+'</li>';
      summery_data += '<li style="color:#67737b;"><strong>Need To Be Picked Date : </strong>'+tracking.pickup_date+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
       
       summery_data += '</li>';     
        }
        summery_data += '</ol>';
          summery_data += '</div>';
        return summery_data;
    }
    $(document).on('change', '.checkAll', function(){
        $this = $(this);
        if($this.prop('checked'))
        {
            // $("#action_row").show();
            $(".checkboxes").prop('checked', true);
            $(".checkboxes").parent().parent().addClass("redd");
        }
        else
        {
            // $("#action_row").hide();
            $(".checkboxes").prop('checked', false);
            $(".checkboxes").parent().parent().removeClass("redd");
        }
    });
    $(document).on('change', '.checkboxes', function(){
        if($(this).prop('checked'))
            $(this).parent().parent().addClass("redd");
        else
            $(this).parent().parent().removeClass("redd");

        // if($(".checkboxes").length > 0)
        //     $("#action_row").show();
        // else
        //     $("#action_row").hide();
    });
    
    
    
     
</script>
       
    </body>
    <style type="text/css">
        table tr td a {
            color: #00afe2 !important;
        }
        .redd{
            background: lightblue;
            color: black !important;
        }

        .redd:hover{
            background: white;
        }
    </style>
</html>
