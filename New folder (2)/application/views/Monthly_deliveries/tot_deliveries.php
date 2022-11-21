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
            
            
            .btn_set{
    margin:10px;
    color: #fff;
    background-color: #197990 !important;
    border-color: white;
}

.btn_set:hover {
background-color: #36404a !important;
    color: white !important;
    border: 7 green!important;
    border-style: groove !important;
    border: 3px solid #197990 !important;
    border-radius: 5px !important;
}

.btn-primary {
     color: #fff !important; 
    /* background-color: #00aee0; */
    /* border-color: #00afe2; */
    /* color: red; */
    /* background-color: #dee2e6; */
    border-color: white !important;
}
        </style>
    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header');  if($op ==1){ $val='MealPlan Total'; }else if($op ==2){ $val='MealPlan Completed'; }else if($op ==3){ $val='MealPlan Pending';}else if($op ==4){ $val='MealPlan Canceled';}else if($op ==5){ $val='MealPlan Freezed';  $del_btn_html='<button type="button"  id="delete_button" class="btn_set btn ">Delete</button>'; }else if($op ==6){ $val='MealPlan Paused';}else{ $val=''; $del_btn_html='';}   ?>        <!-- End Navigation Bar-->

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
                                   <li class="breadcrumb-item"><a href="<?php echo base_url('auth/userdashboard');?>">Dashboard </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo $val; ?> Delivery Deltails</a></li>
                                  
                                </ol>
                            </div>
                          <h4 class="page-title"><?php echo $val; ?> Deliveries</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                       

                            <div class="card-box"  style="width: 104% !important;"> 
                            <?php if($this->session->userdata('role') != 'vendor') {?> 
                            <div class="row"  style="margin-bottom: 15px; display: none;" id="action_btn" >
                                <div class="col-md-12">
                                   
                                    <!--<button type="button" class="btn btn-danger" id="print_btn">Print Label</button>-->
                                    <?php echo $del_btn_html; ?>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="row" id="action_row" style="margin-bottom: 15px; display: none;">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger" id="print_btn">Print Label</button>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <div class="table table-responsive">
                            <table  class="example1 "  id="order_table">

                                <thead class="thead-light">

                                <tr>
                                   
                                   <th class="table-checkbox" ><input type="checkbox" class="checkAll" style="zoom: 2.5;"></th>        
                                     
                                     <th>Sr No</th>
                                    <th>Order ID</th>
                                    <th>Bag type</th>
                                    
                                    
                                    <th>Order status</th>
                                 <?php   if($op ==5){ echo '<th>Delivery status</th>'; } ?>
                                    <th>Partner</th>
                                    <th>Emirate</th>
                                    <th>Service</th>
                                    
                                    <th>Cash Need to Collected</th>
                                    <th>Collected Cash</th>
                                    
                                    <!-- <th>QR</th> -->
                                    <th>Customer</th>
                                    <th style="min-width:30px;">Delivery Address</th>
                                    <th>Notes</th>
                                    <th>Time Slot</th>
                                    <th>Driver</th>
                                    
                                    <th>Assigned At</th>
                                    <th>Pickup Location</th>
                                    <th>Product Type</th>
                                    
                                    <th>Assigned By</th>
                                    <th>Assign Mode</th>
                                    
                                     <th>Price</th>
                                     <th>cancelation Type</th>
                                     <th>cancelation Price</th>
                                     
                                     
                                   
                                     
                                    

                                </tr>
                                </thead>

                                <tbody id="table_body">

                                <?php if ($orders['result']){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                        <tr>
                                         <!--<td ><input type="checkbox" class="checkboxes" value="<?php echo $order->order_id; ?>"> </td>-->
                                         <td ><input type="checkbox" class="checkboxes" data-val="<?php echo $order->order_id; ?>"  value="<?php echo $order->order_id; ?>"  style="zoom: 2.5;" /></td>
                                           
                                       
                                       
                                        <?php if($order->discount_track != '0' AND  $order->discount_track != ''){  ?>
                                             <td ><span style=" color:pink;" class="badge"><?php echo $key+1;?> &nbsp (Discounted)</span></td>
                                         <?php  }else{  ?>
                                               <td ><?php echo $key+1;?></td>
                                           <?php    }     ?>
           
                                            
                                            <td ><?php echo $order->order_id;?></td>
                                            <?php if($order->cooling_bag_check == 0){
                                             echo '<td>Paper bag</td>';
                                            }else if($order->cooling_bag_check == 1){
                                                 echo '<td>Cooler bag</td>';
                                            }else{
                                                 echo '<td>Unknown</td>';
                                            }?>
                                            
                                            
                                                  <?php if($order->status == 'Ship'){ ?>
                                                <td>In Progress</td>
                                            <?php }else if($order->status =='Assign'){
                                                 echo '<td>Assigned</td>';
                                            }else if($order->status =='Not Assign'){
                                                 echo '<td>Not Assigned</td>';
                                            }else if( $order->status == 'Cancel'){
                                                echo '<td>Canceled</td>';
                                            }else{ ?>
                                            <td><?php echo $order->status ?></td>
                                            <?php } ?>
                                            
                                            <?php if($op ==5){ echo '<td>'.$order->action.'</td>'; } ?>
                                            
                                            <td><?php echo $order->v_phone.'<br/>'.$order->vendor;?></td>
                                            <td><?php echo $order->emirate ?></td>
                                            <td><?php echo $order->service ?></td>
                                            
                                            
                                            <td><?php echo round($order->delivery_amount,4); ?></td>
                                            <td><?php echo round($order->driver_recvd_amount,4); ?></td>
                                            
                                            
                                            <td><?php echo $order->number_on_delivery.'<br/>'; if($order->customer=="No Name"){ echo $order->name_on_delivery;}else{ echo $order->name_on_delivery; }?></td>
                                            <td style="min-width: 300px"><?php echo $order->delivery_address;?></td>
                                            <td><?php echo $order->note;?></td>
                                            <td><?php echo $order->delivery_date." ".$order->delivery_time;?></td>
                                            <td><?php echo $order->d_phone.'<br/>'.$order->driver;?></td>
                                            
                                            <td><?php echo $order->assign_date;?></td>
                                            <td ><?php echo $order->pickUp;?></td>
                                            <td><?php echo $order->food_type ?></td>
                                            
                                            <td><?php echo $order->assigned_user ?></td>
                                            <td><?php echo $order->assigned_mode ?></td>
                                      
                                            <td><?php echo $order->partner_price ?></td>
                                            
                                           <td><?php if($order->canceled_mode =='Unpaid_cancel'){
                                           
                                                   echo 'Unpaid';
                                           }else if($order->canceled_mode =='Paid_cancel'){
                                                   echo 'Paid';
                                           }else{
                                           
                                                     echo 'None';
                                           } ?></td>
                                            <td><?php echo $order->cancellation_price ?></td>

                                            

                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                            
                            </div>
                            
                            
                            
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
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
       <!--<script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>-->
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

            
            $("#from_date").flatpickr({
            
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
       e.target.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading';
        
        $("#download_btn_container").hide();
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD');
       
        window.location.href = base_url+'auth/Active_total_deliveries/'+from_date+'/'+to_date;
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