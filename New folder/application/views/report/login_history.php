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
                            <h4 class="page-title">Users Login History</h4>
                         
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
                         <div class="input-group input-large  input-daterange" data-date="<?= date('Y-m-d'); ?>" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" name="from" id="from_date" value="<?php echo date('Y-m-d'); ?>">
                                     <span class="" style="margin-top: 5px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                    <input type="text" class="form-control" name="to" id="to_date" value="<?php echo date('Y-m-d'); ?>">
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
                                    <th>Login Date</th>
                                    <th>Login Time</th>
                                    <th>Logout Date</th>
                                    <th>Logout Time</th>
                                    <th>System</th>
                                    <th>IP</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="log_summary_data"></tbody>
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
  <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
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
        </div>
        

       
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
   
    var table;
    var flag = true;

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

        var link_id = 'manage_login_history';
      //  App.side_Menu(link_id);

        date_picker();

        get_login_history();

    });

    function date_picker() {
        var date = new Date();
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
               // rtl: App.isRTL(),
                autoclose: true,
                endDate : new Date(date.getFullYear(), date.getMonth(), date.getDate())

            });
        }
    }

   $(document).ready(function() {

    init_table();

});
    
function init_table(){
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
            "lengthMenu": [[ 10, 25, 50, 75, 100,-1], [ 10, 25, 50, 75, 100,"All"]]
        });
    }


    function get_login_history(e){
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        var url = "<?php echo base_url(); ?>"+"report/search_for_login_report";

        $fields = {"from_date":from_date, "to_date":to_date};

        if(e)
        {
            e.target.disabled = true;
            e.target.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        }

        $.post(url, $fields, function(response){
            if(e)
            {
                e.target.disabled = false;
                e.target.innerHTML = 'Get Report<i class="icon-plus"></i>';
            }
            console.log(response);

            var log_history = response.login_history.records;
            if(response.success && log_history.length > 0){
                show_values(log_history);
            }else {

                if (table) {
                    table.fnDestroy();
                }

                $("#log_summary_data").empty();
                init_table();


            }
        },'json');

    }

    function show_values(result){
        $("#log_summary_data").empty();
        var data = result;
        var tr = '';
        $.each(data, function(i, e){
            //var detail = e.records;
            var sr = parseInt(i) + parseInt(1);
            tr += '<tr class="odd gradeX" id="row_' + i + '">';
            tr += '<td >' + sr + '</td>';
            tr += '<td >' + e.full_name + '</td>';
            tr += '<td >' + e.phone + '</td>';
            tr += '<td >' + e.login_date + '</td>';
            tr += '<td >' + e.login_time + '</td>';
            tr += '<td >' + e.logout_date + '</td>';
            tr += '<td >' + e.logout_time + '</td>';
            tr += '<td >' + e.terminal + '</td>';
            tr += '<td >' + e.ip + '</td>';
            // tr += '<td><a class="btn default btn-xs green-stripe" data-toggle="modal" onclick="javascript:get_attend_details(this)" href="#responsive" u_id="'+e.user_id+'" date="'+ e.login_date +'"style="background: cadetblue;">View</a></td>';
            // tr += '</tr>';
        });

        if(table) {
            table.fnDestroy();
        }

        $("#log_summary_data").empty();
        $("#log_summary_data").append(tr);

        init_table();
    }

    function get_attend_details(ele){
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();

        $("#log_history_data").hide();
         $("#loading").show();
        $("#responsive").modal('show');
        var u_id = $(ele).attr('u_id');
        get_attend_details_by_u_id(u_id, from_date, to_date);
    }

    function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
    }

    function get_attend_details_by_u_id(u_id, from_date, to_date){
        $("#table_model_content").empty();
        var url = "<?php echo base_url(); ?>"+"report/get_log_details_by_user";
        $fields = {'u_id':u_id, 'from_date':from_date, 'to_date':to_date};
        $.post(url, $fields, function(response){
            if(response.success){
                var ro = response.login_history.records;
                $("#table_model_content").empty();
                var tbody ='';
                $.each(ro, function(i, el){
                    var count = parseInt(i)+parseInt(1)
                    tbody += '<tr class="odd gradeX">';
                    tbody += '<td>'+count+'</td>';
                    tbody += '<td>'+el.full_name+'</td>';
                    tbody += '<td>'+el.phone+'</td>';
                    tbody += '<td>'+el.login_date+'</td>';
                    tbody += '<td>'+el.login_time+'</td>';
                    tbody += '<td>'+el.logout_date+'</td>';
                    tbody += '<td>'+el.logout_time+'</td>';
                    tbody += '<td>'+el.terminal+'</td>';
                    tbody += '<td>'+el.ip+'</td>';
                    tbody +='</tr>';
                });
                $("#table_model_content").append(tbody);
                $("#log_history_data").show();
                // $("#loading").hide();

            }else{
                $("#table_model_content").empty();
                var error = '<tr class="odd"><td class="dataTables_empty" colspan="8" valign="top">No data available in table</td></tr>';
                $("#table_model_content").append(error);
                $("#log_history_data").show();
                // $("#loading").hide();
            }

        },'json');

    }

    //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal



</script>  
</body>
</html>

