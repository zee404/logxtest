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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Cancelled Deliveries</a></li>
                                  
                                </ol>
                            </div>
                           <h4 class="page-title">Cancelled Deliveries</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box" style="width: 104% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    
                    <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?= date('Y-m-d'); ?>">
                                         <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to" id="to_date" value="<?= date('Y-m-d', strtotime($cdate. ' + 1 days')) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                  <!--   <div class="col-lg-3">
                         <select class="form-control" id="pageLength">
                                    <option value="100">Number of Records</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                    <option value="-1">All</option>
                                </select>

                    </div> -->
                    <div class="col-lg-2">
                          <div class="btn-group">
                                <button onclick="get_reports(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>
                        </div>
                                  

                    </div>
                </div>   
                            
                          </div> 
                            <div class="card-box" style="width: 104% !important;">  
                                <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
            
                              <div class="row" style="margin-top: -15px;margin-bottom: 10px; display: none;"id="action_btn">
                                <div class="col-md-3">
                                    <select id="driver_list" class="form-control" name="driver_list" style="margin-bottom: 10px;">
                                        <option value="">Select Driver</option>
                                        <?php foreach ($drivers['records'] as $key => $der) {?>
                                            <option value="<?= $der->id; ?>" ><?= $der->email.' - '.$der->full_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                 <div class="col-lg-4" >
                                    <a href="#" id="delete_button" class="btn btn-danger">Delete</a>
                                    <button type="button" class="btn btn-danger" id="process_button">Again Process</button>
                                    <button type="button" class="btn btn-danger" id="print_btn">Print</button>
                               </div>
                              </div>
                            <?php }else{ ?>
                                <div class="row" style="margin-top: -15px;margin-bottom: 10px; display: none;"id="action_btn">
                                 <div class="col-lg-4" >
                                    <button type="button" class="btn btn-danger" id="print_btn" style="margin-bottom: 15px;">Print</button>
                               </div>
                              </div>
                            <?php } ?>
                            <div class="table table-responsive">
                            <table id="order_table"  class="example "  data-toggle="table">

                                <thead class="thead-light">

                                <tr>
                                     <th class="table-checkbox" ><input type="checkbox" class="checkAll"></th>

                                    <th data-field="id" data-sortable="true" data-formatter="">Ser#</th>
                                    <!-- <th data-field="name" data-sortable="true">QR</th> -->
                                    <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Customer</th>
                                    <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Delivery Address</th>
                                    <th data-field="status" data-align="center"  data-sortable="true" data-formatter="">Notes</th>
                                    <th class="timeSlot" style="min-width: 100px !important">Time Slot</th>
                                    <th data-field="d" data-align="center" data-sortable="true" data-formatter="">Partner</th>
                                    <th data-field="v" data-align="center" data-sortable="true" data-formatter="">Created At</th>
                                    <th data-field="x" data-align="center" data-sortable="true" data-formatter="">Pickup Location</th>
                                    <th data-field="r" data-align="center" data-sortable="true" data-formatter="">Product Type</th>
                                    <th data-field="xx" data-align="center" data-sortable="true" data-formatter="">Notification</th>
                                    
                                     <th data-field="st" data-align="center" data-sortable="true" data-formatter="">Status</th>
                                      <th data-field="ca" data-align="center" data-sortable="true" data-formatter="">Cancled At</th>
                                       <th data-field="cb" data-align="center" data-sortable="true" data-formatter="">Cancled By</th>
                                        <th data-field="cm" data-align="center" data-sortable="true" data-formatter="">Cancled Mode</th>
                                         <th data-field="re" data-align="center" data-sortable="true" data-formatter="">Reason</th>
                                         <th data-field="img" data-align="center" data-sortable="true" data-formatter="">Image</th>
                                    
                                    <!-- <th data-field="s" data-align="center" data-sortable="true" data-formatter="">Status</th> -->
                                     
                                    

                                </tr>
                                </thead>

                                <tbody id="table_body">
                                    <?php if ($orders['result']){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                        <tr class="">
                                            <td ><input type="checkbox" class="checkboxes" data-val="<?php echo $order->order_id;?>"   value="<?php echo $order->order_id;?>" /></td>
                                            <td><?php echo $key+1;?></td>
                                            <!-- <td ><?php if($order->qrImage!=""){?><img src="<?php echo base_url($order->qrImage);?>" /> <?php } ?></td> -->
                                            <td><?php echo $order->c_phone.'<br/>';  echo $order->customer;  ?></td>
                                             <td ><?php echo $order->delivery_address;?></td>
                                             <td ><?php echo $order->note;?></td>
                                              <td ><?php echo $order->delivery_date." ".$order->delivery_time; ?></td>
                                            
                                            <td ><?php echo $order->v_phone.'<br/>'.$order->vendor;?></td>
                                            <td ><?php echo $order->created;?></td>
                                           
                                            <td><?php echo $order->pickUp;?></td>
                                           <td><?php echo $order->food_type ?></td>
                                           <td><?php echo $order->send_notification ?></td>
                                           
                                           <?php if($order->status == 'Ship'){ ?>
                                                <td>In Progress</td>
                                            <?php }else{ ?>
                                            <td><?php echo $order->status ?></td>
                                            <?php } ?>
                                           <td><?php echo $order->canceled_at;?></td>
                                           <td><?php echo $order->canceled_by;?></td>
                                           <td><?php echo $order->canceled_mode;?></td>
                                           <td><?php echo $order->canceled_reason ;?></td>
                                           
                                            <td><?php if($order->canceled_img!=""){?>
                                            <a href="<?php echo base_url().$order->canceled_img;?>" target="_blank">
                                                view
                                              </a> <?php }else{ ?>
                                               NUN
                                              <?php }?></td>
                                           <!--<td><?php //echo $order->canceled_img;?></td>-->
                                           
                                             <!--<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php // echo $order->note;?>">Read Note</button>-->
                                             
                                            <!-- <td ><?php echo get_order_status($order->status);?></td> -->

                                           

                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                            </div> <!-- end table responsive-->
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
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
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
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
        <script type="text/javascript">
            deliv_ids = [];
             
        
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
    
        console.log(driver_id);

         $.ajax({

            url:'<?php echo base_url("order/assign_drivers_delivry") ?>',
            method:'post',
            data:{'bags_id':ids,driver_id:driver_id},
            success:function(res)
            {
                 console.log(res);
                if(res){
                    swal("Done", "Assigned Successfully", "success");
                    location.reload(); 
                }
            },
            error:function(err)
            {
               
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
     var un_assign_table;
     function init_table(){
        if($('.example tbody tr').length <= 2)
            return;
        un_assign_table = $('.example').dataTable({
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
           
          
            "lengthMenu": [[ 10, 25, 50, 75, 100,-1], [ 10, 25, 50, 75, 100,"All"]],
            'fnDrawCallback': function(eee){
                $(".timeSlot").css({'width': '120px'});
            }
        });
    }

    function get_reports(e){
        if(un_assign_table)
            $('#order_table').dataTable().fnDestroy();
        $("#table_body").empty();
        get_deliveries_report_by_status(e.target);
    }

    function get_deliveries_report_by_status(el){
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        $("#table_body").empty();
        el.disabled = true;
        el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        var url = "<?php echo base_url(); ?>"+"report/get_deliveries_report_by_cancelled";
        $fields = {'start_date':from_date, 'end_date':to_date};
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
        console.log(data);
        $.each(data, function(i, e){
            tbody += '<tr class="gradeX">';
            tbody += '<td><input type="checkbox" class="checkboxes" value="'+ e.order_id+'" /></td>';
            tbody += '<td >'+ e.order_id +'</td>';
            //tbody += '<td ><img src="'+ url+e.qrImage +'" /></td>';
            tbody += '<td >'+ e.customer +' '+ e.c_phone +'</td>';
             tbody += '<td >'+ e.delivery_address + '</td>';
              tbody += '<td>'+e.note+ '</td>';
            tbody += '<td >'+ e.delivery_date +' '+ e.delivery_time +'</td>';
           
            tbody += '<td >'+ e.vendor +' '+ e.v_phone +'</td>';
            tbody += '<td >'+ e.created +'</td>';
          
            tbody += '<td >'+ e.pickUp +'</td>';
           
           
           
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
           
           if(e.status == 'Ship'){
                     tbody += '<td>In Progress</td>';
            }else{
                   tbody += '<td >'+ e.status +'</td>';
            }
            tbody += '<td>'+e.canceled_at+'</td>';
            tbody += '<td>'+e.canceled_by+'</td>';
            tbody += '<td>'+e.canceled_mode+'</td>';
            tbody += '<td>'+e.canceled_reason+'</td>';
                                           
            tbody += '<td>';
            if(e.canceled_img!=""){
             tbody +='<a href="'+e.canceled_img+'" target="_blank">view</a>';
                                                
             }else{ 
                tbody += 'NUN';
             }
              tbody += '</td>';

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

$('#process_button').on('click', function () {
        
      
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, processed it!'
}).then((result) => {
  if (result.value) {
    var idds = [];
    if($('.checkboxes:checked').length > 0){
        $('.checkboxes:checked').each(function(){
            idds.push(Number($(this).val()));
        });
        processAll(idds);    
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

function processAll(ids)
{
       
         $.ajax({

            url:'<?php echo base_url("Order/process_drivers_delivery") ?>',
            method:'post',
            data:{'order_ids':ids},
            success:function(res)
            {
              swal.fire("Processed", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
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
        
    </style>
</html>