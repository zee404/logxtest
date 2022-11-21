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
.btn-group{
    margin-top: -10px;
    margin-bottom: 10px;

}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Total Bag Collection</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Total Bags Collection</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box" style="width: 104% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                     <form action="<?php echo base_url('bag/total_by_created_date') ?>" method="post">
                    <div class="row">
                    
                     <div class="col-lg-4">
                      <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group input-large date-picker input-daterange" data-date="<?php if(!empty($selection["from"])){ echo $selection["from"]; }else{ echo date('Y-m-d'); } ?>">
                                    <input type="text" class="form-control" name="from" id="from_date" value="<?php if(!empty($selection["from"])){ echo $selection["from"]; }else{ echo date('Y-m-d'); } ?>">
                                     <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                    <input type="text" class="form-control" name="to" id="to_date" value="<?php if(!empty($selection["to"])){ echo $selection["to"]; }else{ echo date('Y-m-d', strtotime($cdate. ' + 1 days')); } ?>">
                                </div>
                      
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="col-lg-2">
                          <div class="btn-group">
                              <button class="btn blue" type="submit"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Data <i class="icon-plus"></i></button>
                           <!--  <a href="#" onclick="javascript:get_reports()">
                                <button class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;">Get Records <i class="icon-plus"></i></button>
                            </a> -->
                        </div>
                                  

                    </div>
                    <?php if(strtolower($this->session->userdata('role')) == 'vendor'){ ?>
                     <div class="col-md-4 action_btn" id="action_btn" style="display: none;">
                     <button type="button" class="btn btn-danger" id="print_btn">Print Label</button>
                             
                        </div>
                    <?php }else{  ?>
                        <div class="col-md-4 action_btn" id="action_btn" style="display: none;">
                       
                        <button type="button" onclick="un_assign_drivers(event)" class="btn btn-danger">Un-Assign Driver</button>
                        
                        <button type="button" onclick="cancel_bags()" class="btn btn-danger">cancel Bags</button>
                           
                        <button type="button" class="btn btn-danger" id="print_btn">Print Label</button>     
                        </div>
                    <?php } ?>
                </div>   
                            
                               <!-- <div class="col-md-4">
                                 <h3>Bags Tracking</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?= date('Y-m-d'); ?>">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" value="<?= date('Y-m-d'); ?>"class="form-control" name="to" id="to_date">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                       
                          </div> <div class="card-box" style="overflow: auto;">  
                             
                               
                            <table  class="example" data-toggle="table">

                                <thead class="thead-light">

                                <tr>
                                     <th class="table-checkbox">
                                    <input type="checkbox" class="group-checkable" id="head_check" />
                                    </th>
                                        <th>Order No</th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th data-field="d" data-align="center" data-sortable="true" data-formatter="">Partner</th>
                                        <th>Driver</th>
                                         <th>Type(Emirate with Time)</th>
                                        <th>Created</th>
                                        <th>Assign Date</th>
                                        <th>Need To Be Picked Date</th>
                                        <th>Notes</th>
                                        <th>Notification</th>
                                        <th>Status</th>
                                        <th>Assigned By</th>
                                        <th>Assign Mode</th>
                                </tr>
                                </thead>

                                <tbody>
                                      <?php if (!empty($orders['result'])){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                        <tr>
                                              <td><input type="checkbox" class="checkboxes" onclick=""  value="<?php echo $order->bag_id;?>" /></td>
                                            <td ><?php echo $order->bag_id;?></td>
                                            <td ><?php echo $order->customer; ?></td>
                                            <td ><?php echo $order->c_phone;?></td>
                                            <td ><?php echo $order->address;?></td>
                                            <td ><?php echo $order->vendor;?></td>
                                            <td ><?php echo $order->driver;?></td>
                                            <td ><?php echo $order->type;?></td>
                                            <td ><?php echo $order->created_dt;?></td>
                                            <td ><?php echo $order->assign_date;?></td>
                                            <td ><?php echo $order->pick_date;?></td>
                                            <td ><?php echo $order->bag_notes; ?></td>
                                            <td ><?php echo $order->bag_notification; ?></td>
                                            <td > 
                                            <div class="mix-details">
                                            <?php 
                                            if($order->status=="Assign"){
                                                echo '<span class="label label-sm label-warning">Assigned</span>';
                                            }else  if($order->status=="Requested"){
                                                echo '<span class="label label-sm label-info">Un.Assigned</span>';
                                            }else if($order->status=="Picked" || $order->status=="No bag"){
                                                echo '<span class="label label-sm label-success">Completed</span>';
                                            }else{
                                                echo  '<span class="label label-sm label-default "></span>';
                                            }
                                            ?>
                                            <?php if($order->proof_image!=""){ ?>
                                <a class="mix-preview fancybox-button" href="<?php echo $order->proof_image; ?>" title="" data-rel="fancybox-button_">
                                <img style="max-width: 30%" class="img-responsive_" src="<?php echo $order->proof_image; ?>" alt="">
                                </a>
                                </div>
                                <?php } ?>
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
        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>

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


              $("#from_date").flatpickr({
                // defaultDate: new Date(),
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
       var global_bags_ids = [];

    //     function add_item(addItem){
        
    //    if(jQuery.inArray(addItem, global_bags_ids) !== -1){
    //      // alert(global_bags_ids.length);
    //             global_bags_ids.splice( $.inArray(addItem, global_bags_ids), 1 );

    //     if(global_bags_ids.length > 0){
    //         $(".action_btn").show();
    //     }else{
    //         $(".action_btn").hide();
    //     }
              
    //         }else{
    //              global_bags_ids.push(addItem);
    // //    alert(global_bags_ids.length);
        
    //     if(global_bags_ids.length > 0){
    //         $(".action_btn").show();
    //     }
                 
    //         }
        
    // }
function un_assign_drivers(e){
  //  alert(global_bags_ids);
        let el = e.target;
        if(global_bags_ids.length > 0 ){
            el.disabled = true;
            el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
            var url = "<?php echo base_url(); ?>"+"index.php/bag/un_assign_driver";
            $fields = {'order_ids':global_bags_ids};
            $.post(url, $fields, function(response){
                el.disabled = false;
                el.innerHTML = 'Un-Assign Driver';
                if(response.success){
                    global_bags_ids = [];
                     swal("", "Successfully Un-Assign", "success");
                      window.location.reload();
                }
            },'json');

         
        }else{
             swal("", "No Delivery selected", "error");
          
        }

    }


    $(document).on('change', '#head_check', function(){
        $this = $(this);
        if($this.prop('checked'))
        {
            $(".checkboxes").prop('checked', true);
            $(".checkboxes").parent().parent().addClass("redd");
        }
        else
        {
            $(".checkboxes").prop('checked', false);
            $(".checkboxes").parent().parent().removeClass("redd");
        }
    });

    // $(document).on('change', '.checkboxes', function(){
    //     if($(this).prop('checked'))
    //     {
    //         $(this).parent().parent().addClass("redd");
    //     }
    //     else
    //     {
    //         $(this).parent().parent().removeClass("redd");
    //     }
    // });
    
    function cancel_bags() {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Cancel it!'
        }).then((result) => {
          if (result.value) {
            if(global_bags_ids.length > 0){
                var url = "<?php echo base_url(); ?>"+"bag/cancel_bags";
                $fields = { 'bag_ids':global_bags_ids};
                $.post(url, $fields, function(response){
                    if(response.success){
                        global_bags_ids = [];
                        location.reload();
                    }
                },'json');
                var msg = '<strong>Success!</strong> Bags has been cancelled.';
                show_msg(msg, 'alert-success');
            } else {
                swal("No Row Selected", "", "error");
            }
          }
        });
    }
    function show_msg(container, msg, class_){
        $("#"+container).removeClass('alert-success');
        $("#"+container).removeClass('alert-danger');
        $("#"+container+" > p#error_msg").html(msg);
        $("#"+container).addClass(class_);
        $("#"+container).show();
    }
</script>
       
    </body>
    <style type="text/css">
        .redd{
            background: lightblue;
        }
    </style>
</html>