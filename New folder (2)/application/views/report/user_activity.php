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
.portlet.box.blue {
    border: 1px solid white;
    border-top: 0;
}
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Login History </a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Users Activity</h4>
                         
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
          
                    <div class="col-sm-12">
                        <div class="card-box" style="width: 100% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                              <div class="col-lg-3" >
                           
                            </div>
                     <div class="col-lg-4">
                         <div class="input-group input-large  input-daterange">
                                    <input type="text" class="form-control" name="from" id="from_date" value="<?php echo date('Y-m-d'); ?>">
                                     <span class="" style="margin-top: 5px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                    <input type="text" class="form-control" name="to" id="to_date" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                                </div>
                    </div>
                    <div class="col-lg-2">
                          <div class="btn-group">
                            <button onclick="get_login_history(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>
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
                     <table class="table table-striped table-bordered table-hover" id="users_log_list_table_data">
                            <thead id="thead_data"style="background-color: #f1f5f7">
                                <tr>
                                    <th>Sr No</th>
                                    <th>User</th>
                                    <th>Phone</th>
                                    <th>Visiting Date</th>
                                    <th>Visiting Time</th>
                                    <!-- <th>Logout Date</th>
                                    <th>Logout Time</th> -->
                                    <th>Page</th>
                                    <th>IP</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="log_summary_data">
                                <?php 
                                // if ($activity_logs) {
                                //     $counter = 1;
                                //     foreach ($activity_logs as $log) {
                                    ?>
                                    <!-- <tr>
                                        <td><?php //echo $counter; ?></td>
                                        <td><?php //echo $log->full_name; ?></td>
                                        <td><?php //echo $log->phone; ?></td>
                                        <td><?php// echo date('Y-m-d', strtotime($log->visiting_time)); ?></td>
                                        <td><?php //echo date('H:m:s', strtotime($log->visiting_time)); ?></td>
                                        <td><?php// echo $log->page_url ?></td>
                                        <td><?php //echo $log->ip_address; ?></td>
                                    </tr> -->
                                    <?php
                                //     $counter++;
                                //     }
                                // }
                                ?>
                            </tbody>
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
 <!--  <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-wide">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="mod_title">User Log Details</h4>
                    </div>
                    <div class="modal-body">
                        <div id="loading">
                            <div id="site_statistics_loading" style="text-align: center;">
                                <img src="<?php echo base_url()?>assets/img/loading.gif" alt="loading"/>
                            </div>
                        </div>

                        <div class="portlet box blue" style="/*margin-bottom: 0px; display: none;*/" id="log_history_data">

                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Phone</th>
                                            <th>Login Date</th>
                                            <th>Login Time</th>
                                            <th>Logout Date</th>
                                            <th>Logout Time</th>
                                            <th>System</th>
                                            <th>IP</th>

                                        </tr>
                                        </thead>
                                        <tbody id="table_model_content">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue default">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
        

       
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        
        <script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        <script src="<?php echo base_url('assets/js/vendor.min.js') ?>"></script>
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
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

        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
       
  <script type="text/javascript">
      $("#from_date").flatpickr({
            defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    minDate: ds,
                    maxDate: new Date()
                });
            }
        });
    var table;
    var flag = true;

    jQuery(document).ready(function() {

        var link_id = 'manage_login_history';
      //  App.side_Menu(link_id);

        date_picker();

        get_login_history();

    });

    function get_login_history() {
        var from_date   = $("#from_date").val();
        var to_date     = $("#to_date").val();
        window.location.href="<?php echo base_url('user_activity/') ?>"+from_date+"/"+to_date;
    }

   $(document).ready(function() {

    init_table();

});
    
// function init_table(){
        table = $('#users_log_list_table_data').dataTable({
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
            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            // Initial no order.
            "order": [],
            // Load data from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('Report/get_user_activity'); ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties
            "columnDefs": [{ 
                "targets": [0],
                "orderable": false
            }]
        });
    // }


    

</script>  
</body>
</html>

