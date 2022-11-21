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
         <link href="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
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
.btn-group{
    margin-top: -10px;
    margin-bottom: 10px;

}

.badge {
    color: #72747b;
    font-size: 10.5px !important;
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Completed Cash Collection</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Completed Cash Collection</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box" style="width: 104% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                     <form action="<?php echo base_url('cash/completed_by_created_date') ?>" method="post">
                    <div class="row">
                    
                     <div class="col-lg-4">
                      <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group input-large date-picker input-daterange" data-date="<?php if(!empty($selection["from"])){ echo $selection["from"]; }else{ echo date('Y-m-d'); } ?>" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" name="from" id="from_date" value="<?php if(!empty($selection["from"])){ echo $selection["from"]; }else{ echo date('Y-m-d'); } ?>">
                                     <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                    <input type="text" class="form-control" name="to" id="to_date" value="<?php if(!empty($selection["to"])){ echo $selection["to"]; }else{ echo date('Y-m-d', strtotime($cdate. ' + 1 days')); } ?>">
                                </div>
                      
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-lg-2">
                        <div class="btn-group">
                           
                                <button class="btn blue" type="submit" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Records <i class="icon-plus"></i></button>
                          
                        </div>
                                  

                    </div>
                 <!--    <div class="col-lg-2">
                        <div class="btn-group">
                           
                        <a href="#" onclick="javascript:un_assign_drivers();" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;">Un-Assign Driver</a> 
                        </div>         

                    </div>
 -->

                </div>   
                </form>            
                             
                          </div>
                           <div class="card-box" style="width: 104% !important; ">  
                            
                            <table class="example table table-responsive table-bordered"  style="display: table; overflow-x: auto;"  data-toggle="table">

                                <thead class="thead-light">

                                <tr>
                               
                                <th>Order No</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Partner</th>
                                <th>Driver</th>
                                <th>Type(Emirate With Time)</th>
                                <th>Created</th>
                                <th>Assign Date</th>
                                <th>Need To Be Picked Date</th>
                                <th>Received Cash</th>
                                <th>Collected Date</th>
                                <th>Notes</th>
                                <th>Notification</th>
                                <th>Status</th>
                                <th>Assigned By</th>
                                <th>Assign Mode</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php  if (!empty($orders['result'])){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                        <tr class="odd gradeX">
                                           <!--  <td><input type="checkbox" class="checkboxes" value="<?php echo $order->cash_id;?>" /></td> -->
                                            <td ><?php echo $order->cash_id;?></td>
                                            <td ><?php echo $order->customer; ?></td>
                                            <td ><?php echo $order->c_phone;?></td>
                                            <td ><?php echo $order->address;?></td>
                                            <td ><?php echo $order->vendor;?></td>
                                            <td ><?php echo $order->driver;?></td>
                                            <td ><?php echo $order->type;?></td>
                                            <td ><?php echo $order->created_dt;?></td>
                                            <td ><?php echo $order->assign_date;?></td>
                                            <td ><?php echo $order->pick_date;?></td>
                                            <td ><?php echo $order->total_amount;?></td>
                                            <td ><?php echo $order->collected_date;?></td>
                                            <td ><?php echo $order->cash_notes; ?></td>
                                            <td ><?php echo $order->cash_notification; ?></td>
                                            <td > 
                                            <div class="mix-details">
                                                <a class="show_image" href="javascript:void(0)" data-image="<?php echo str_replace('demo.', '', $order->proof_image) ?>">
                                            <?php 
                                            if($order->status=="Assigned"){
                                                echo '<span class="label label-sm label-warning">Assigned</span>';
                                            }else  if($order->status=="Requested"){
                                                echo '<span class="label label-sm label-info">Requested</span>';
                                            }else if($order->status=="Picked Up"){
                                                echo '<span class="label label-sm label-success">Picked</span>';
                                            }else  if($order->status=="No Cash"){
                                                echo  '<span class="label label-sm label-danger">No bag</span>';
                                            }else{
                                                echo  '<span class="label label-sm label-default "></span>';
                                            }
                                            ?>
                                          </a>
                                </div>
                                
                                    </td>
                                            <td><?php echo $order->assigned_user; ?></td>
                                    <td><?php echo $order->assigned_mode; ?></td> 
                                          

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


                <div id="image_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="mySmallModalLabel">Bag Image</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <img id="bag_image" class="img-responsive" src="" style="height: 100%; width: 100%">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
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
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
         <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
       <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script type="text/javascript">
         
           $(document).ready(function () {


            $(".show_image").click(function(){
                $("#bag_image").attr("src", $(this).attr("data-image"));
                $("#image_modal").modal();
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
                
              $('#abc').on('click', function () {
               swal("Delete", "Successfully Delete", "success");
              });

         
                $('.example').DataTable( {
                    
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
        });
        </script>
        <script type="text/javascript">
    jQuery(document).ready(function() {
        var link_id = 'manage_upload_customers';
       // App.side_Menu(link_id);
    });

</script>
       
    </body>
</html>