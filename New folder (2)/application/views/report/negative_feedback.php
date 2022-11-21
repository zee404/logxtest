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


 .green{
        color:green;
    }
    .red{
        color:red;
    }

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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customer's Negative Feedback </a></li>
                                  
                                </ol>
                            </div>
                          <h4 class="page-title">Customer's Negative Feedback </h4>
                        </div>
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
          

                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card-box" >
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                     <div class="col-lg-3">
                         
                        

                    </div>
                    
                     <div class="col-lg-4">
                           <div class="input-group input-large  input-daterange" data-date="<?= date('Y-m-d'); ?>" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" name="from" id="from_date" value="<?= date('Y-m-d'); ?>">
                                <span class="" style="margin-top: 5px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                <input type="text" class="form-control" name="to" id="to_date" value="<?= date('Y-m-d'); ?>">
                            </div>
                    </div>
                    <div class="col-lg-2">
                          <div class="btn-group">
                          
                        <button onclick="get_reports(event)" class="btn blue"style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report <i class="icon-plus"></i></button>
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
                            <th>Delivery ID</th>
                            <th>Bag Type</th>
                            <th>Customer</th>
                            <th >Delivery Address</th>
                            <th>Notes</th>
                            <th style="min-height:200px;">Time Slot</th>
                            <th style="min-height:200px;">Emirate With TimeType</th>
                            <th>Delivery Status</th>
                            <th>Driver</th>
                            <th>Partner</th>
                            <th>Notification</th>
                            <th style="min-height:250px;">feedback</th>
                            <th>Proof Image</th>
                            <th>Reported at</th>
                            
                            <th>Status</th>
                            <th>Action</th>
                         </tr>
                        </thead>
                        <tbody id="table_body">
                            
                            <?php if(count($records) > 0){ 
                              
                              foreach($records as $key => $data){  ?>
                              
            <tr class="odd gradeX">
            <td ><?php echo $data->order_id ?> </td>
            <?php if($data->bag_type==NULL){echo '<td>Unknown</td>';}else if($data->bag_type==0){ echo '<td>Paper</td>'; }else if($data->bag_type==1){echo '<td>Cooling bag</td>';}else{
                echo '<td>Unknow</td>';
            }
            ?>
            <td ><?php if($data->name_on_delivery == NULL){echo $data->customer.'<br/>'.$data->c_phone;}else{echo $data->name_on_delivery.'<br/>'.$data->c_phone; } ?> </td>
             <td style="min-width:250px;"><?php if($data->delivery_address ==NULL){ echo $data->address; }else{echo $data->delivery_address;} ?> </td>
              <td style="min-width:150px;"><?php echo $data->note ?> </td>
              <td style="min-width:150px;"><?php echo $data->delivery_date.'<br/>'. $data->delivery_time ?> </td>
               <td style="min-width:150px;"><?php echo $data->delivery_type ?> </td>
                <td ><?php echo $data->status ?> </td>
            <td ><?php echo $data->driver .'<br/>'.$data->d_phone ?> </td>
            <td ><?php echo $data->vendor .'<br/>'.$data->v_phone ?> </td>
            <td><?php echo $data->send_notification ?> </td>
             <td style="min-width:250px;"><?php echo $data->feedback ?> </td>
             
              <td ><?php if($data->fed_img!=''){ ?>
                                             <a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="<?php echo $data->fed_img ?>" target="_blank">Available</a>
                                            <?php }else{ ?>
                                             <p class="red">Not Available</p>
                                            <?php } ?></td>
                                            
                                            
              <td ><?php echo $data->reported_at ?> </td>
            <td ><?php echo $data->fed_status ?> </td>
             
             <td style="min-width:150px;">
                <?php if($data->fed_status == 'Pending'){ ?>
                <select   class="ack form-control"><option value=""  data-orderId="" >--Select Status--</option><option value="Solved" data-orderId="<?php echo  $data->fed_id; ?>" >Acknowledged</option></select>
                <?php } ?>
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
   
    var delivery_table;
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
        var link_id = 'vendor_deliveries';
       // App.side_Menu(link_id);

        date_picker();
        init_table();

    });


    function get_reports(e){
        e.target.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading';
        //e.target.disabled = true;
        // var vendor_id = $("select#vendor_list option:selected").val();
        get_deliveries_report_by_vendor(e.target);

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

    function get_deliveries_report_by_vendor( el){
        // $("#download_btn_container").hide();
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');


        if(delivery_table){
            $('#report_table').dataTable().fnDestroy();
        }

        $("#table_body").empty();

        var url = "<?php echo base_url(); ?>"+"report/get_deliveries_negative_report_by_";
        $fields = {'start_date':from_date, 'end_date':to_date};

        
            el.disabled = true;

            $.post(url, $fields, function (response) {
                el.disabled = false;
                el.innerHTML = 'Get Report <i class="icon-plus"></i>';
                var data = '';
                $("#table_body").empty();

                if (response.success) {
                    
                    data = response.report_data.records;
                    console.log(data);
                    $("#table_body").append(set_report_data(data));

                    // $("#download_btn_container").show();
                }
                init_table();
            }, 'json');
        
    }

    function set_report_data(data){
        var tbody = '';

        $.each(data, function(i, e){
          tbody += '<tr class="odd gradeX">';
            tbody += '<td >'+ e.order_id +'</td>';
            if(e.bag_type==0){
                tbody += '<td >Paper</td>';
            }else if(e.bag_type==1){
                tbody += '<td >Cooling bag</td>';
            }else{
                tbody += '<td >Unknown</td>';
            }
            
            if(e.name_on_delivery ==null){
                
                tbody += '<td >'+ e.customer +'<br/>'+ e.c_phone +'</td>';
            }else{
                tbody += '<td >'+ e.name_on_delivery +'<br/>'+ e.c_phone +'</td>';
            }
            
            if(e.delivery_address ==null){
                
                tbody += '<td style="min-width:250px;">'+ e.address +'</td>';
            }else{
                tbody += '<td style="min-width:250px;">'+ e.delivery_address +'</td>';
            }
            
             
              tbody += '<td style="min-width:150px;">'+ e.note +'</td>';
              tbody += '<td style="min-width:150px;">'+ e.delivery_date +'<br/>'+ e.delivery_time +'</td>';
               tbody += '<td style="min-width:150px;">'+ e.delivery_type +'</td>';
                tbody += '<td >'+ e.status +'</td>';
            tbody += '<td >'+ e.driver +'<br/>'+ e.d_phone +'</td>';
            tbody += '<td >'+ e.vendor +'<br/>'+ e.v_phone +'</td>';
            tbody += '<td>'+ e.send_notification +'</td>';
             tbody += '<td style="min-width:250px;">'+ e.feedback +'</td>';
             
             tbody += '<td >';
             if(e.fed_img!=''){ 
                 
                 tbody += '<a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="'+e.fed_img+'" target="_blank">Available</a>';
                }else{
                    tbody += '<p class="red">Not Available</p>';
                          } 
             tbody += '</td>';
             
             
             
              tbody += '<td >'+ e.reported_at +'</td>';
            tbody += '<td >'+ e.fed_status +'</td>';
            
            tbody += '<td style="min-width:150px;">';
           if(e.fed_status == 'Pending'){
              
                tbody +='<select  class="ack form-control"><option value="" data-orderId=""  >--Select Status--</option><option value="Solved" data-orderId="'+e.fed_id+'" >Acknowledged</option></select>';
                 } 
           tbody += '</td>';
           
          
            tbody += '</tr >';
        });
        return tbody;
    }

    function submit_form(ele){
        var from_date = moment($("#from_date").val(), 'DD-MM-YYYY').subtract(0, 'days').format('YYYY-MM-DD 23:59:59');
        var to_date = moment($("#to_date").val(), 'DD-MM-YYYY').format('YYYY-MM-DD 23:59:59');
        // var vendor_id = $("select#vendor_list option:selected").val();
        // $("#csv_vendor_id").val(vendor_id);
        $("#csv_start_date").val(from_date);
        $("#csv_end_date").val(to_date);
        $("#"+ele).submit();
    }
    
    
    // $('body').on('change', '.year', function() {
     $("body").on('change','.ack',function(){
            var id=$(this).find(':selected').attr('data-orderId');
            var status=$(this).find(':selected').val();
            status=$.trim(status);
            console.log("id is"+id);
         console.log("hellooo"+status);
            
            if(id !='' && status !=''){
              update_status(id,status);
            }
        });
    var msg ='';
    function update_status(id,status){
        
         var url = '<?php echo base_url('Report/update_feedback_status');?>';
        
         
         
         console.log("id is"+id);
         console.log("hellooo"+status);
         if(status!='' && id!=''){
         
         swal.fire({
            title: "Are You Sure",
            type: "warning",
            showCancelButton: true
        }).then((ok) => {
            if (ok.value) {
                
                sweetAlert();
            //   console.log('msg is:'+msg); 
            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     data: {
            //         'id':id,
            //         'status':status
                    
            //     },
            //     success: function (res) {
            //         console.log(res);
            //         if(res=="success"){
                        
            //             swal("Updated", "Successfully Updated!", "success");
            //             window.location.reload();
            //         }else{
            //              swal("Error", "Network Error! Try again.", "error");
            //         }
                    
            //     },
            //     error: function (err) {
            //         console.log(err);
            //     }
            // });
        }else{
            console.log('cancelled');
        }
        });
        
        // mmm
        
    function sweetAlert(){
  (async () => {

  const { value: formValues } = await Swal.fire({
    title: 'Enter Message',
    html:
      '<input id="swal-input1" class="swal2-input">' ,
    focusConfirm: false,
    preConfirm: () => {
      return [
        document.getElementById('swal-input1').value
        
      ]
    }
  })

  if (formValues) {
    Swal.fire(JSON.stringify(formValues));
    // console.log(formValues[0])
     msg= formValues[0];
   console.log(msg);
       
          $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'id':id,
                    'status':status,
                    'msg':msg
                },
                success: function (res) {
                    console.log(res);
                    if(res=="success"){
                        
                        swal("Updated", "Successfully Updated!", "success");
                        window.location.reload();
                    }else{
                         swal("Error", "Network Error! Try again.", "error");
                    }
                    
                },
                error: function (err) {
                    console.log(err);
                }
            });
  }
  
 
   
   
  })()
}
        
        // mmmmm
         }
    }
    
    
    
    
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