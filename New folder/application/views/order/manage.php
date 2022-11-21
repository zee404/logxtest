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
            
            #truncateLongTexts{ overflow-y: hidden; margin-bottom: 10px; width:150px; }
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Assign Deliveries</a></li>
                                  
                                </ol>
                            </div>
                           <h4 class="page-title">Assign Deliveries</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="width: 104% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                       
                       <form  id="add_vendor_formXLS"  name ="add_vendor_formXLS" method="post" class="horizontal-form" >
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
                 <!--    <div class="col-lg-3">
                         
                         <select class="form-control" name="vendor_list" id="vendor_list">
                            <option value="">Number of records</option>
                            <option value="">100</option>
                            <option value="">200</option>
                            <option value="">300</option>
                           
                            
                        </select>

                    </div> -->
                    <div class="col-lg-2">
                          <div class="btn-group">
                                <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>
                        </div>
                                  

                    </div>
                    
                    
                     <div class="col-lg-2">
                          <div class="btn-group">
                                <button type="submit" formaction="<?php echo base_url('ptests/excel_for_assigned'); ?>" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Download .xls Report</button>
                        </div>
                                  

                    </div>
                </div>   
                            
                             
                       </form>
                       
                          </div> 

                            <div class="card-box"  style="width: 104% !important;"> 
                            <?php if($this->session->userdata('role') != 'vendor') {?> 
                            <div class="row" id="action_row" style="margin-bottom: 15px; display: none;">
                               <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <button onclick="unassign_dels(this)" type="button" class="btn btn-primary" style="color: #fff;background-color: #197990 !important;border-color: white">Unassign</button>
                                    <button type="button" class="btn btn-danger" id="cancelled_button">Cancel</button>
                                    <!--<button type="button" class="btn btn-danger" id="print_btn">Print Label</button>-->
                                     
                                     
                                     <!--<button type="button" class="btn btn-danger" id="print_btn2">Print Label</button>-->
                                     <button type="button" class="btn btn_set btn-danger" id="print_btn_test">Print Label</button>
                                      <button type="button" class="btn btn_set btn-danger" id="print_btn_w_logo">Print Label With Logo</button>
                                
                                 &nbsp;&nbsp;
                                     
                                      <?php if($this->session->userdata('role') == 'admin') {?> 
                                      <button onclick="ManualComplete_dels(this)" type="button" class="btn btn-primary" style="color: #fff;background-color: #197990 !important;border-color: white">Complete Manual <small>(for expected delivery date)</small></button>
                                    
                                      <?php } ?>
                                
                                </div>
                          </div>
                        <?php }else{ ?>
                            <div class="row" id="action_row" style="margin-bottom: 15px; display: none;">
                                <div class="col-md-12">
                                    <!--<button type="button" class="btn btn-danger" id="print_btn">Print Label</button>-->
                                     <!--<button type="button" class="btn btn-danger" id="print_btn2">Print Label</button>-->
                                     
                                     <button type="button" class="btn btn_set btn-danger" id="print_btn_test">Print Label</button>
                                      <button type="button" class="btn btn_set btn-danger" id="print_btn_w_logo">Print Label With Logo</button>
                                
                                </div>
                            </div>
                            <?php } ?>
                            <table  class="example1 table table-responsive"  id="order_table">

                                <thead class="thead-light">

                                <tr>
                                    <th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll"  style ="zoom: 2.5;"></th>
                                     <th>Sr No</th>
                                    <th>Order ID</th>
                                   
                                    <!-- <th>QR</th> -->
                                    <th>Customer</th>
                                    <th>Delivery Address</th>
                                    <th>Notes</th>
                                    <th style="min-width: 100px">Time Slot</th>
                                    <th>Driver</th>
                                    <th>Partner</th>
                                    <th>Assigned At</th>
                                    <th>Pickup Location</th>
                                    <th>Product Type</th>
                                    <th>Notification</th>
                                    <!-- <th>Deliverd At</th> -->
                                    <!-- <th>Status</th> -->
                                    <th>Assigned By</th>
                                    <th>Assign Mode</th>
                                    <th>Google Link(Address)</th>
                                     
                                   <th style="min-width: 70px">Action</th>
                                     
                                    

                                </tr>
                                </thead>

                                <tbody id="table_body">

                                <?php if ($orders['result']){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                        <tr>
                                         <td ><input type="checkbox" class="checkboxes" style ="zoom: 2.5;" value="<?php echo $order->order_id; ?>"> </td>
                                            <td ><?php echo $key+1;?></td>
                                            <td ><?php echo $order->order_id;?></td>
                                            <!-- <td ><?php if($order->qrImage!=""){?><img src="<?php echo base_url($order->qrImage);?>" /> <?php } ?></td> -->
                                            
                                            
                                          <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>    
                                             <?php $urlencodedtext="Dear Client,%0a%0aGood Day!%0a%0aWe have a meal plan delivery for you from ".strtoupper($order->vendor)." but unfortunately there is a slight delay in your area because of a unforeseen event, We are trying our best to reach you at the earliest, Sincere apologies for the inconvenience.%0a%0aMany Thanks for your patience and understanding.%0a%0aRegards,TEAM LOGX";
                                           
                                           
                                           ?>
                                            
                                             
                                            <td><a title="Click here to start whatsApp chat" target="_blank" href="https://wa.me/<?php echo $order->number_on_delivery; ?>/?text=<?php echo $urlencodedtext; ?>"  data-placement="left"><?php echo $order->number_on_delivery.'<br/>'; if($order->customer=="No Name"){ echo $order->name_on_delivery;}else{ echo $order->name_on_delivery; }?></a></td>
                                            
                                            <?php }else{ ?> 
                                          <td> <?php echo $order->number_on_delivery.'<br/>'; if($order->customer=="No Name"){ echo $order->name_on_delivery;}else{ echo $order->name_on_delivery; }?></td>
                                            <?php } ?>
                                           
                                           
                                           
                                           
                                           
                                            <td><?php echo $order->delivery_address;?></td>
                                            <td><?php echo $order->note;?></td>
                                            <td><?php echo $order->delivery_date." ".$order->delivery_time;?></td>
                                            <td><?php echo $order->d_phone.'<br/>'.$order->driver;?></td>
                                            <td><?php echo $order->v_phone.'<br/>'.$order->vendor;?></td>
                                            <td><?php echo $order->assign_date;?></td>
                                            <td ><?php echo $order->pickUp;?></td>
                                            <td><?php echo $order->food_type ?></td>
                                            <td><?php echo $order->send_notification ?></td>
                                            <td><?php echo $order->assigned_user ?></td>
                                            <td><?php echo $order->assigned_mode ?></td>
                                              
                                              <!--<td> <button type="button" class="btn btn-default btn-sm btn-small" data-toggle="tooltip" data-placement="top" title="<?php echo $order->note;?>">Read Note</button></td>-->
                                            <!-- <td><?php echo $order->delivered_date." ".$order->delivered_time;?></td> -->
                                           
                                           
                                            <!-- <td><?php echo get_order_status($order->status);?></td> -->
                                            
                                            
                                            
                                            
                                              <?php  
                                            if($order->google_link_addrs !=''){
                                             $gogle_adr=json_decode($order->google_link_addrs);
                                             $gad=$gogle_adr->google_link;
                                            }else{
                                                $gad="None";
                                            }
                                             ?>
                                            <td id="cucc2"><div id="truncateLongTexts"><?php echo  $gad; ?></div></td>

                                            <td>
                                             
                                                 <a class="" title="View" data-toggle="modal" onclick="javascript:order_detail(this)" href="#responsive" pk="<?php echo $order->order_id;?>">
                                                    <i class="dripicons-preview" style="font-size: 20px;"></i>
                                                </a>
                                                 &nbsp;
                                            <?php if($order->status != 'Delivered'){?>
                                                <?php if(strtolower($this->session->userdata('role')) == 'admin'){  ?>
                                                 <a class="Delete" onclick="javascript:cancel_delivery(this)" href="#responsive" pk="<?php echo $order->order_id;?>">
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
            });  
             
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
                    if(res){
                        location.reload(); 
                    }
                },
                error:function(err)
                {
                   
                }
            });
        }        
        </script>
       
<script type="text/javascript">
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
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        var option = 'Assign';

        if(un_assign_table){
            $('#order_table').dataTable().fnDestroy();
        }

        $("#table_body").empty();

        var url = "<?php echo base_url(); ?>"+"report/get_deliveries_report_by_status";
        
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
           tbody += '<td><input type="checkbox" class="checkboxes" style ="zoom: 2.5;" value="'+ e.order_id+'" /></td>';
           tbody += '<td>'+(i+1)+'</td>';
            tbody += '<td >'+ e.order_id +'</td>';
             //tbody += '<td ><img src="'+ url+e.qrImage +'" /></td>';
             
             
               <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                            
            var urlencodedtext="Dear Client,%0a %0aGood Day!%0a%0aWe have a meal plan delivery for you from "+e.vendor+" but unfortunately there is a slight delay in your area because of a unforeseen event, We are trying our best to reach you at the earliest, Sincere apologies for the inconvenience. %0a%0aMany Thanks for your patience and understanding.%0a %0a Regards,TEAM LOGX";
                                           
            tbody += '<td><a title="Click here to start whatsApp chat" target="_blank" href="https://wa.me/'+e.number_on_delivery+'/?text='+urlencodedtext+'"  data-placement="left">'+e.name_on_delivery +' '+ e.number_on_delivery+' </a></td>';
                                          
                                         <?php }else{ ?>   
                                        tbody += '<td >'+ e.name_on_delivery +' '+ e.number_on_delivery +'</td>';
                                            <?php } ?>
            // tbody += '<td >'+ e.name_on_delivery +' '+ e.number_on_delivery +'</td>';
            tbody += '<td >'+ e.delivery_address + '</td>';   
             tbody += '<td >'+e.note+'</td>'; 
              tbody += '<td >'+ e.delivery_date +' '+e.delivery_time+'</td>';
            tbody += '<td >'+ e.driver +' '+ e.d_phone +'</td>';
            tbody += '<td >'+ e.vendor +' '+ e.v_phone +'</td>';
            tbody += '<td >'+ e.assign_date +'</td>';
            
              tbody += '<td >'+ e.pickUp +'</td>';
              tbody += '<td >'+ e.food_type +'</td>';
            tbody += '<td >'+ e.send_notification +'</td>';
            tbody += '<td >'+ e.assigned_user +'</td>';
            tbody += '<td >'+ e.assigned_mode +'</td>';
            
            
            
             if(e.google_link_addrs !=''){
                 var obj = JSON.parse(e.google_link_addrs);
                   tbody += '<td >'+obj.google_link +'</td>';
             }else{
                 tbody += '<td >'+ 'None' +'</td>';
             }
            

            tbody += '<td>';
            tbody += '<a class="btn default btn-xs green-stripe" data-toggle="modal" onclick="javascript:order_detail(this)" href="#responsive" pk="'+ e.order_id +'"> <i class="dripicons-preview" style="font-size: 20px;color: #7e57c2;"></i></a>&nbsp;';
            if(e.status != 'Delivered') {
                if (login_user == 'admin') {
                    tbody += '<a title="Cancel" onclick="javascript:cancel_delivery(this)" href="#" pk="' + e.order_id + '">';
                tbody += '<i class="dripicons-tag-delete"style="font-size: 20px;color: #7e57c2;"></i></a>';    
                }
                
            }
            tbody += '</td>';

            tbody += '</tr >';
        });
        return tbody;
    }
     function cancel_delivery(ele){


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
    var delivery_id = $(ele).attr('pk');
        var url = "<?php echo base_url(); ?>"+"order/cancel_delivery";
        $fields = {'delivery_id':delivery_id};
        $.post(url, $fields, function(response){
            if(response.success){
                
                un_assign_table.row($(ele).parents('tr')).remove().draw();
            }
        },'json');
  }
});


        
    }
       function order_detail(ele){
        $("#v_data").hide();
        $("#loading").show();
        var order_id = $(ele).attr('pk');
        get_order_by_id(order_id);
    }

    function unassign_dels(btn)
    {
        // btn.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        // btn.disabled = true;
        // var all_ids = [];
        // $(".checkboxes:checked").each(function(){
        //     all_ids.push(parseInt($(this).val()));
        // });
        // run_unassign_ajax(all_ids, btn);
        
        
         Swal.fire({
                  title: 'Warning',
                  text: "Are you sure?",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Proceed Unassign!'
                }).then((result) => {
                  if (result.value) {
                            btn.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
                            btn.disabled = true;
                            var all_ids = [];
                            $(".checkboxes:checked").each(function(){
                                all_ids.push(parseInt($(this).val()));
                            });
                            run_unassign_ajax(all_ids, btn);  
                    }
                
            });  
    }

    function run_unassign_ajax(ids, btn)
    {
        if(ids.length > 0)
        {
            $.ajax({
                url: '<?php echo base_url() ?>order/unassign_orders',
                data: {'order_ids': ids},
                method: 'post',
                success: function(resp){
                    btn.innerHTML = 'Unassign';
                    btn.disabled = false;
                    rmsg = JSON.parse(resp);
                    if(rmsg.success){
                        swal.fire("Deliveries Unassigned Successfully", "", "success");
                        // .then(function(){ location.reload(); });
                        // location.reload();
                        
                         $("tbody").find("input[type='checkbox']:checked").each(function(){
                    $(this).parent().parent().remove();
                   });
                      location.reload();
                    }
                    
                        
                        
                },
                error: function(err)
                {
                    btn.innerHTML = 'Unassign';
                    btn.disabled = false;
                    swal.fire("Network or Server Error", "", "error");
                }
            });
        }
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
        summery_data += '<div class="note note-warning col-lg-12" style="background-color: #FCF3E1;margin-bottom: 18px;margin-top: 19px;">';
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

        '<br>'
        summery_data += '<div class="note note-success col-lg-12" style="background-color: #E8F6FC;">';
        summery_data += '<h4 class="block">Driver Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+summery.driver+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.d_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';

        return summery_data;
    }
    $(document).on('change', '.checkAll', function(){
        $this = $(this);
        if($this.prop('checked'))
        {
            $("#action_row").show();
            $(".checkboxes").prop('checked', true);
            $(".checkboxes").parent().parent().addClass("redd");
        }
        else
        {
            $("#action_row").hide();
            $(".checkboxes").prop('checked', false);
            $(".checkboxes").parent().parent().removeClass("redd");
        }
    });
    $(document).on('change', '.checkboxes', function(){
        if($(this).prop('checked'))
            $(this).parent().parent().addClass("redd");
        else
            $(this).parent().parent().removeClass("redd");

        if($(".checkboxes").length > 0)
            $("#action_row").show();
        else
            $("#action_row").hide();
    });
    
    
    
    
    
     // Manual Complete
     function ManualComplete_dels(btn)
    {
        // btn.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        // btn.disabled = true;
        // var all_ids = [];
        // $(".checkboxes:checked").each(function(){
        //     all_ids.push(parseInt($(this).val()));
        // });
        // run_unassign_ajax(all_ids, btn);
        
        
        Swal.fire({
                  title: 'Are you sure? ',
                  text: "This will complete the selected deliveries according to expected delivery date",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Proceed Manual Complete!'
                }).then((result) => {
                  if (result.value) {
                            btn.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
                            btn.disabled = true;
                            var all_ids = [];
                            $(".checkboxes:checked").each(function(){
                                all_ids.push(parseInt($(this).val()));
                            });
                            run_ManualComplete_ajax(all_ids, btn);  
                    }
                
            });  
    }
    
    
     function run_ManualComplete_ajax(ids, btn)
    {
        if(ids.length > 0)
        {
            $.ajax({
                url: '<?php echo base_url() ?>order/manualComplete_orders',
                data: {'order_ids': ids},
                method: 'post',
                success: function(resp){
                    btn.innerHTML = 'Complete Manual <small>(for expected delivery date)</small>';
                    btn.disabled = false;
                    rmsg = JSON.parse(resp);
                    if(rmsg.success)
                        swal.fire("Deliveries Manual Completed Successfully", "", "success").then(function(){ location.reload(); });
                },
                error: function(err)
                {
                    btn.innerHTML = 'Complete Manual <small>(for expected delivery date)</small>';
                    btn.disabled = false;
                    swal.fire("Network or Server Error", "", "error");
                }
            });
        }
    }
    // Manual complete end
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