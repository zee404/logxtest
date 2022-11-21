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
                                   <li class="breadcrumb-item"><a href="<?php echo base_url('auth/userdashboard');?>">Dashboard </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bag Revenue Details</a></li>
                                  
                                </ol>
                            </div>
                          <h4 class="page-title">Bag Revenue Details</h4>
                        </div>
                    </div>
                </div>
                </div>
                </div> 
                </div>

<!-- BEGIN CONTENT -->
<div class="wrapper" id="print_box">

<div class="container-fluid">
  

    <!-- BEGIN PAGE HEADER-->
      <div class="row ">
          

                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card-box"  >
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                     
                    
                     <div class="col-lg-8">
                           
                            <div class="page-title-right">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary border-primary ">
                                                    From:<!-- <i class="mdi mdi-calendar-range font-13"></i> -->
                                                </span>
                                            </div>
                                            <input type="text" class="form-control shadow border-white" name="date" id="from_date" value="<?php echo $this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d') ?>">
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary border-primary ">
                                                    To:<!-- <i class="mdi mdi-calendar-range font-13"></i> -->
                                                </span>
                                            </div>
                                            <input type="text" class="form-control shadow border-white" name="date" id="to_date" value="<?php echo $this->uri->segment(4)?$this->uri->segment(4) : date('Y-m-d') ?>">
                                            
                                        </div>
                                    </div>
                                    
                                   <!--  <a href="javascript: void(0);" class="btn btn-primary btn-sm ml-2 font-14">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a> -->
                                   <!--  <a href="javascript: void(0);" class="btn btn-primary btn-sm ml-1 font-14">
                                        <i class="mdi mdi-filter-variant"></i>
                                    </a> -->
                                </form>
                            </div>
                            </div>
                    <div class="col-lg-4">
                          <div class="btn-group">
                              
                              <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>
                         &nbsp &nbsp <button id="print"  onclick="PrintElem('print_box')" type="button" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Print Details</button>
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
                   
                    <table class="table table-striped table-bordered table-hover" id="report_table">
                        <thead id="table_header"style="background-color: #f1f5f7">
                        <tr>
                             <th>Sr#</th>
                            <th>Partner</th>
                            <th>email</th>
                            <th>Total Bags</th>
                            <th>Total Revenue</th>
                            <th>Total Completed Revenue</th>
                            <th>Total Completed Bags</th>
                            <th>Total Assigned Revenue</th>
                            <th>Total Assigned Bags</th>
                            <th>Total Unassigned Revenue</th>
                            <th>Total Unassigned Bags</th>
                            <th>Total Cancelled Revenue</th>
                              <th>Total Cancelled Bags</th>
                            <!--<th>Total Inship Revenue</th>-->
                            <th>Action</th>
                        
                            
                        </tr>
                        </thead>
                        <tbody id="table_body">
                            
                            <?php if(count($records) > 0){ 
                              $count=0;
                              foreach($records as $key => $data){  
                              $count=$count+1;
                              ?>
                              
            <tr class="odd gradeX">
            <td ><?php echo $count ?> </td>
            <td ><?php echo $data->full_name.'<br/>'.$data->phone ?> </td>
             <td ><?php echo $data->email ?> </td>
              <td><?php echo $data->bags ?> </td>
              <td><?php echo round($data->total_reveneu,4); ?> </td>
              <td><?php echo round($data->total_bag_completed,4); ?> </td>
              <td><?php echo $data->total_num_of_bags_completed ?> </td>
               
                <td><?php echo round($data->total_assign,4); ?> </td>
                <td><?php echo $data->total_num_assign; ?> </td>
                
                
                <td ><?php echo round($data->total_not_assign,4); ?> </td>
                <td ><?php echo $data->total_num_not_assign; ?> </td>
                
                
            <td ><?php echo round($data->total_canceled,4); ?> </td>
            <td ><?php echo $data->total_num_canceled; ?> </td>
            
            <td ><button onclick="get_detail(event,<?php echo $data->vendor_id ?>)" flag="<?php echo $data->vendor_id ?>" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Details</button>
                         
                                </td>
            
           
          
            </tr >
                              
                            
                            <?php }}?>
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
   
   var base_url=<?php echo base_url ?> ;
    var delivery_table;
    jQuery(document).ready(function() {

        $("#from_date").flatpickr({
           
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

    });


    function get_reports(e){
        e.target.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading';
        //e.target.disabled = true;
        // var vendor_id = $("select#vendor_list option:selected").val();
        $("#download_btn_container").hide();
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD');
        
       
        window.location.href = base_url+'auth/revenue/'+from_date+'/'+to_date;

    }
    
    
    function get_detail(e,id){
        
        console.log(id);
        e.target.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading';
        //e.target.disabled = true;
        // var vendor_id = $("select#vendor_list option:selected").val();
        $("#download_btn_container").hide();
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD');
        
       
        window.location.href = base_url+'auth/Active_total_bags/'+from_date+'/'+to_date+'/'+id;

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
    
    
    function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('<link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" /><link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" /><link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" /><link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">        <link href="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" /><link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />          <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

setTimeout(function(){  
    mywindow.print();
    mywindow.close();
     }, 3000);
    

    return true;
}

    // function get_deliveries_report_by_vendor(vendor_id, el){
    //     $("#download_btn_container").hide();
    //     var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
    //     var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');


    //     if(delivery_table){
    //         $('#report_table').dataTable().fnDestroy();
    //     }

    //     $("#table_body").empty();

    //     var url = "<?php echo base_url(); ?>"+"report/get_deliveries_positive_report_by_vendor";
    //     $fields = {'start_date':from_date, 'end_date':to_date, 'vendor_id':vendor_id};

    //     if(vendor_id) {
    //         el.disabled = true;

    //         $.post(url, $fields, function (response) {
    //             el.disabled = false;
    //             el.innerHTML = 'Get Report <i class="icon-plus"></i>';
    //             var data = '';
    //             $("#table_body").empty();

    //             if (response.success) {
                    
    //                 data = response.report_data.records;
    //                 console.log(data);
    //                 $("#table_body").append(set_report_data(data));

    //                 $("#download_btn_container").show();
    //             }
    //             init_table();
    //         }, 'json');
    //     }else{
    //         init_table();
    //     }
    // }

    // function set_report_data(data){
    //     var tbody = '';

    //     $.each(data, function(i, e){
    //       tbody += '<tr class="odd gradeX">';
    //         tbody += '<td >'+ e.order_id +'</td>';
    //         tbody += '<td >'+ e.name_on_delivery +'<br/>'+ e.c_phone +'</td>';
    //          tbody += '<td style="min-width:250px;">'+ e.delivery_address +'</td>';
    //           tbody += '<td style="min-width:150px;">'+ e.note +'</td>';
    //           tbody += '<td style="min-width:150px;">'+ e.delivery_date +'<br/>'+ e.delivery_time +'</td>';
    //           tbody += '<td style="min-width:150px;">'+ e.delivery_type +'</td>';
    //             tbody += '<td >'+ e.status +'</td>';
    //         tbody += '<td >'+ e.driver +'<br/>'+ e.d_phone +'</td>';
    //         tbody += '<td >'+ e.vendor +'<br/>'+ e.v_phone +'</td>';
    //         tbody += '<td>'+ e.send_notification +'</td>';
    //          tbody += '<td style="min-width:250px;">'+ e.feedback +'</td>';
    //           tbody += '<td >'+ e.reported_at +'</td>';
    //         tbody += '<td >'+ e.fed_status +'</td>';
           
          
    //         tbody += '</tr >';
    //     });
    //     return tbody;
    // }

    // function submit_form(ele){
    //     var from_date = moment($("#from_date").val(), 'DD-MM-YYYY').subtract(0, 'days').format('YYYY-MM-DD 23:59:59');
    //     var to_date = moment($("#to_date").val(), 'DD-MM-YYYY').format('YYYY-MM-DD 23:59:59');
    //     var vendor_id = $("select#vendor_list option:selected").val();
    //     $("#csv_vendor_id").val(vendor_id);
    //     $("#csv_start_date").val(from_date);
    //     $("#csv_end_date").val(to_date);
    //     $("#"+ele).submit();
    // }
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