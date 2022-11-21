<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logx-logo-512x512.png'); ?>">

    <!-- Plugins css -->
    <link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/libs/datatables/select.bootstrap4.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .fixed-table-loading {
            display: none;
        }

        .fixed-table-container thead th .th-inner {
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

        .btn-group {
            margin-top: -10px;
            margin-bottom: 10px;

        }
    </style>
</head>

<body>

    <!-- Navigation Bar-->
    <?php $this->load->view('common/header'); ?>
    <!-- End Navigation Bar-->

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Cancelled </a></li>
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
                        <form action="<?php echo base_url('order/AC_cancelled_by_created_date') ?>" method="post">
                            <div class="row">


                                <div class="col-md-4">
                                    <?php
                                    $cdate = date('Y-m-d');
                                    ?>

                                    <div class="input-group input-large date-picker input-daterange" data-date="<?php if (!empty($selection["from"])) {
                                                                                                                    echo $selection["from"];
                                                                                                                } else {
                                                                                                                    echo date('Y-m-d');
                                                                                                                } ?>">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?php if (!empty($selection["from"])) {
                                                                                                                        echo $selection["from"];
                                                                                                                    } else {
                                                                                                                        echo date('Y-m-d');
                                                                                                                    } ?>">
                                        <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to" id="to_date" value="<?php if (!empty($selection["to"])) {
                                                                                                                    echo $selection["to"];
                                                                                                                } else {
                                                                                                                    echo date('Y-m-d', strtotime($cdate . ' + 1 days'));
                                                                                                                } ?>">
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

                                        <button class="btn blue" type="submit" style="color: #fff;background-color: #197990 !important;border-color: white; margin-top: 10px;">Get Records <i class="icon-plus"></i></button>

                                    </div>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="card-box" style="width: 104% !important;">

                <!--   SELECT BOX CLICK ACTION -->
                <!--    <?php //if(strtolower($this->session->userdata('role')) != 'vendor'){ 
                        ?>-->

                <!--  <div class="row" style="margin-top: -15px;margin-bottom: 10px; display: none;"id="action_btn">-->
                <!--    <div class="col-md-3">-->
                <!--        <select id="driver_list" class="form-control" name="driver_list" style="margin-bottom: 10px;">-->
                <!--            <option value="">Select Driver</option>-->
                <!--            <?php //foreach ($drivers['records'] as $key => $der) {
                                ?>-->
                <!--                <option value="<?= $der->id; ?>" ><?= $der->email . ' - ' . $der->full_name; ?></option>-->
                <!--            <?php //} 
                                ?>-->
                <!--        </select>-->
                <!--    </div>-->
                <!--     <div class="col-lg-4" >-->
                <!--        <a href="#" id="delete_button" class="btn btn-danger">Delete</a>-->
                <!--        <button type="button" class="btn btn-danger" id="process_button">Again Process</button>-->
                <!--        <button type="button" class="btn btn-danger" id="print_btn">Print</button>-->
                <!--   </div>-->
                <!--  </div>-->
                <!--<?php // }else{ 
                    ?>-->
                <!--    <div class="row" style="margin-top: -15px;margin-bottom: 10px; display: none;"id="action_btn">-->
                <!--     <div class="col-lg-4" >-->
                <!--        <button type="button" class="btn btn-danger" id="print_btn" style="margin-bottom: 15px;">Print</button>-->
                <!--   </div>-->
                <!--  </div>-->
                <!--<?php  //} 
                    ?>-->


                <!--   SELECT BOX CLICK ACTION END -->

                <div class="table table-responsive pt-2">
                    <table id="order_table" class="table table-responsive" data-toggle="table">

                        <thead class="thead-light">

                            <tr>
                                <th class="table-checkbox"><input type="checkbox" class="checkAll"></th>
                                <th data-field="id" data-sortable="true" data-formatter="">Ser#</th>
                                <!-- <th data-field="name" data-sortable="true">QR</th> -->
                                <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Customer</th>
                                <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Delivery Address</th>
                                <th data-field="status" data-align="center" data-sortable="true" data-formatter="">Notes</th>
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
                                <th data-field="cc" data-align="center" data-sortable="true" data-formatter="">Cancellation Charges</th>
                                <th data-field="act" data-align="center" data-sortable="true" data-formatter="">Action</th>

                                <!-- <th data-field="s" data-align="center" data-sortable="true" data-formatter="">Status</th> -->


                                <!-- 19 -->
                            </tr>
                        </thead>

                        <tbody id="table_body">
                            <?php if ($orders['result']) {
                                foreach ($orders['records'] as $key => $order) { ?>
                                    <tr class="">
                                        <td><input type="checkbox" class="checkboxes" data-val="<?php echo $order->order_id; ?>" value="<?php echo $order->order_id; ?>" /></td>
                                        <td><?php echo $key + 1; ?></td>
                                        <!-- <td ><?php if ($order->qrImage != "") { ?><img src="<?php echo base_url($order->qrImage); ?>" /> <?php } ?></td> -->
                                        <td><?php echo $order->c_phone . '<br/>';
                                                    echo $order->customer;  ?></td>
                                        <td><?php echo $order->delivery_address; ?></td>
                                        <td><?php echo $order->note; ?></td>
                                        <td><?php echo $order->delivery_date . " " . $order->delivery_time; ?></td>
                                        <td><?php echo $order->v_phone . '<br/>' . $order->vendor; ?></td>
                                        <td><?php echo $order->created; ?></td>

                                        <td><?php echo $order->pickUp; ?></td>
                                        <td><?php echo $order->food_type ?></td>
                                        <td><?php echo $order->send_notification ?></td>

                                        <?php if ($order->status == 'Ship') { ?>
                                            <td>In Progress</td>
                                        <?php } else { ?>
                                            <td><?php echo $order->status ?></td>
                                        <?php } ?>
                                        <td><?php echo $order->canceled_at; ?></td>
                                        <td><?php echo $order->canceled_by; ?></td>
                                        <td><?php echo $order->canceled_mode; ?></td>
                                        <td><?php echo $order->canceled_reason; ?></td>

                                        <td><?php if ($order->canceled_img != "") { ?>
                                                <a href="<?php echo base_url() . $order->canceled_img; ?>" target="_blank">
                                                    view
                                                </a> <?php } else { ?>
                                                NUN
                                            <?php } ?></td>



                                        <td><?php echo $order->cancellation_price; ?></td>

                                        <td>
                                            <a class=" btn default btn-xs green-stripe" data-toggle="modal" onclick="javascript:cancel_delivery(this)" href="#responsive_neww" pk="<?php echo $order->order_id; ?>">
                                                <i class="mdi mdi-square-edit-outline" style="font-size:20px;"></i>
                                            </a>
                                            &nbsp;
                                            <button class="btn default btn-xs green-stripe" onclick="javascript:revert(this)" pk="<?php echo $order->order_id; ?>">
                                                <i class="dripicons-tag-delete" style="font-size:20px;"></i>
                                            </button>

                                        </td>


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


    <!--FOR EDIT -->

    <div id="responsive_neww" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-wide_">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                    <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="cancel_mod_title">Cancel Bag </h4>
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


    <!--CANCEL EDIT END-->
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
    <script src="<?php echo base_url('assets/js/vendor.min.js'); ?>"></script>
    <!--shan-->
    <?php if ($this->session->userdata('role_id') == 2) { ?>
        <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
    <?php } else if ($this->session->userdata('role_id') == 1) { ?>
        <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
        <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
        <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js') . '?vvv=' . date('YmdH') ?>"></script>-->
    <?php } ?>

    <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js'); ?>"></script>
    <!-- Bootstrap Tables js -->
    <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>

    <!-- Sweet alert init js-->
    <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js'); ?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js'); ?>"></script>
    <script src="<?php echo base_url() ?>assets/scripts/moment.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/scripts/moment-duration-format.js" type="text/javascript"></script>
    <!-- Init js -->
    <script src="<?php echo base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js'); ?>"></script>

    <!-- App js-->

    <script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/collect_notifications.js'); ?>"></script>
    <script type="text/javascript">
        // SELECT BOX CLICK ACTION



        $(document).ready(function() {

            // $("#print_btn").click(function(){
            //     var ids = [];
            //     $(".checkboxes:checked").each(function(){
            //         ids.push($(this).val());
            //     });

            //     if(ids.length < -1)
            //         return;
            //     ids = ids.join();
            //     window.open('<?php //echo base_url() 
                                ?>report/print/orders/'+ids, '_blank');
            // });


            $("#from_date").flatpickr({
                defaultDate: new Date(),
                onChange: function(sd, ds, ins) {
                    $("#to_date").flatpickr({
                        defaultDate: moment(new Date()).add(1, 'days').format('YYYY-MM-DD'),
                        minDate: ds,
                    });
                }
            });




            init_table();
        });
    </script>

    <script type="text/javascript">
        var un_assign_table;

        function init_table() {

            $('#order_table').DataTable({
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
                        orientation: 'landscape',
                        pageSize: 'A2',
                        exportOptions: {
                            columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,18,16,17]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis',

                ],
                "lengthMenu": [
                    [10, 25, 50, 75, 100, -1],
                    [10, 25, 50, 75, 100, "All"]
                ],
                'fnDrawCallback': function(eee) {
                    $(".timeSlot").css({
                        'width': '120px'
                    });
                }
            });

            // if ($('.example tbody tr').length <= 2)
            //     return;
            // un_assign_table = $('.example').dataTable({
            //     "scrollX": true,
            //     dom: 'Blifrtip',


            //     buttons: [

            //         {
            //             extend: 'csvHtml5',
            //             exportOptions: {
            //                 columns: ':visible'
            //             }
            //         },
            //         {
            //             extend: 'pdfHtml5',
            //             exportOptions: {
            //                 columns: ':visible'
            //             }
            //         },
            //         {
            //             extend: 'print',
            //             exportOptions: {
            //                 columns: ':visible'
            //             }
            //         },
            //         'colvis'
            //     ],


            //     "lengthMenu": [
            //         [10, 25, 50, 75, 100, -1],
            //         [10, 25, 50, 75, 100, "All"]
            //     ],
            //     'fnDrawCallback': function(eee) {
            //         $(".timeSlot").css({
            //             'width': '120px'
            //         });
            //     }
            // });
        }


        i_image_str = '';


        // OLD MEthod 
        //     function get_reports(e){
        //         if(un_assign_table)
        //             $('#order_table').dataTable().fnDestroy();
        //         $("#table_body").empty();
        //         get_deliveries_report_by_status(e.target);
        //     }

        //     function get_deliveries_report_by_status(el){
        //         var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        //         var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        //         $("#table_body").empty();
        //         el.disabled = true;
        //         el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        //         var url = "<?php echo base_url(); ?>"+"order/AC_cancelled_by_created_date";
        //         $fields = {'start_date':from_date, 'end_date':to_date};
        //         $.post(url, $fields, function(response){
        //             el.disabled = false;
        //             el.innerHTML = 'Get Report <i class="icon-plus"></i>';
        //             if(response.success){
        //                 var data = response.report_data.records;

        //                 $("#table_body").append(set_report_data(data));
        //             }

        //             init_table();
        //         },'json');
        //     }
        //   function set_report_data(data){
        //          var url = "<?php echo base_url(); ?>";
        //         var tbody = '';
        //         console.log(data);
        //         $.each(data, function(i, e){
        //             tbody += '<tr class="gradeX">';
        //             tbody += '<td><input type="checkbox" class="checkboxes" value="'+ e.order_id+'" /></td>';
        //             tbody += '<td >'+ e.order_id +'</td>';
        //             //tbody += '<td ><img src="'+ url+e.qrImage +'" /></td>';
        //             tbody += '<td >'+ e.customer +' '+ e.c_phone +'</td>';
        //              tbody += '<td >'+ e.delivery_address + '</td>';
        //               tbody += '<td>'+e.note+ '</td>';
        //             tbody += '<td >'+ e.delivery_date +' '+ e.delivery_time +'</td>';

        //             tbody += '<td >'+ e.vendor +' '+ e.v_phone +'</td>';
        //             tbody += '<td >'+ e.created +'</td>';

        //             tbody += '<td >'+ e.pickUp +'</td>';



        //             /*tbody += '<td >'+ e.status +'<br>';

        //             var image = '';
        //             if(e.delivery_img != null){
        //                 image = e.delivery_img;
        //             }

        //             tbody += '<div class="mix-details">';
        //             tbody += '<a class="mix-preview fancybox-button" href="'+image+'" title="" data-rel="fancybox-button_">';
        //             tbody += '<img style="max-width: 30%" class="img-responsive_" src="'+image+'" alt="">';
        //             tbody += '</a>';
        //             tbody += '</div>';
        //             tbody += '</td>'; */

        //           tbody += '<td>'+e.food_type+'</td>';
        //           tbody += '<td>'+e.send_notification+'</td>';

        //           if(e.status == 'Ship'){
        //                      tbody += '<td>In Progress</td>';
        //             }else{
        //                   tbody += '<td >'+ e.status +'</td>';
        //             }
        //             tbody += '<td>'+e.canceled_at+'</td>';
        //             tbody += '<td>'+e.canceled_by+'</td>';
        //             tbody += '<td>'+e.canceled_mode+'</td>';
        //             tbody += '<td>'+e.canceled_reason+'</td>';

        //             tbody += '<td>';
        //             if(e.canceled_img!=""){
        //              tbody +='<a href="'+e.canceled_img+'" target="_blank">view</a>';

        //              }else{ 
        //                 tbody += 'NUN';
        //              }
        //               tbody += '</td>';



        //               tbody += '<td>'+e.cancellation_price+'</td>';
        // tbody += '<td> <a class=" btn default btn-xs green-stripe"  data-toggle="modal" onclick="javascript:cancel_delivery(this)" href="#responsive_neww" pk="'+e.order_id+'"> <i class="mdi mdi-square-edit-outline" style="font-size:20px;" ></i></a>&nbsp ';
        // tbody += '<button class="btn default btn-xs green-stripe"  onclick="javascript:revert(this)"   pk="'+e.order_id+'"> <i class="dripicons-tag-delete" style="font-size:20px;" ></i></button></td>';          

        //             tbody += '</tr >';
        //         });
        //         return tbody;
        //     }

        // END OLD GET REPORT MEthod


        // SELECT BOX CLICK ACTION

        // $(document).on('change', '.checkboxes', function(){
        //         if($(this).prop('checked'))
        //             $(this).parent().parent().addClass("redd");
        //         else
        //             $(this).parent().parent().removeClass("redd");

        //         if($('.checkboxes:checked').length > 0)
        //         {
        //             $("#action_btn").show();
        //         }
        //         });

        $(document).on('change', '.checkAll', function() {
            $this = $(this);
            if ($this.prop('checked')) {
                //$(".checkboxes").addClass("redd");
                // $("#action_btn").show();
                $(".checkboxes").each(function() {
                    $(this).prop('checked', true);
                    //   $(this).parent().parent().addClass("redd");
                });
            } else {
                $(".checkboxes").prop("checked", false);
                $(".checkboxes").parent().parent().removeClass("redd");
                // $("#action_btn").hide();
            }
        });

        // $('#delete_button').on('click', function () {


        //   Swal.fire({
        //   title: 'Are you sure?',
        //   text: "You won't be able to revert this!",
        //   type: 'warning',
        //   showCancelButton: true,
        //   confirmButtonColor: '#3085d6',
        //   cancelButtonColor: '#d33',
        //   confirmButtonText: 'Yes, delete it!'
        // }).then((result) => {
        //   if (result.value) {
        //     var idds = [];
        //     if($('.checkboxes:checked').length > 0){
        //         $('.checkboxes:checked').each(function(){
        //             idds.push(Number($(this).val()));
        //         });
        //         delAll(idds);    
        //     }
        //   }
        // })

        // });

        // $('#process_button').on('click', function () {


        //   Swal.fire({
        //   title: 'Are you sure?',
        //   text: "You won't be able to revert this!",
        //   type: 'warning',
        //   showCancelButton: true,
        //   confirmButtonColor: '#3085d6',
        //   cancelButtonColor: '#d33',
        //   confirmButtonText: 'Yes, processed it!'
        // }).then((result) => {
        //   if (result.value) {
        //     var idds = [];
        //     if($('.checkboxes:checked').length > 0){
        //         $('.checkboxes:checked').each(function(){
        //             idds.push(Number($(this).val()));
        //         });
        //         processAll(idds);    
        //     }
        //   }
        // })

        // });


        // function delAll(ids)
        // {

        //          $.ajax({

        //             url:'<?php echo base_url("Order/delete_drivers_delivry") ?>',
        //             method:'post',
        //             data:{'bags_id':ids},
        //             success:function(res)
        //             {
        //               swal.fire("Deleted", "", "success");
        //               $("tbody").find("input[type='checkbox']:checked").each(function(){
        //                 $(this).parent().parent().remove();
        //               });
        //                   console.log(res);
        //                 if(res){
        //                     location.reload(); 
        //                 }
        //             },
        //             error:function(err)
        //             {

        //             }
        //         });
        // }

        // function processAll(ids)
        // {

        //          $.ajax({

        //             url:'<?php echo base_url("Order/process_drivers_delivery") ?>',
        //             method:'post',
        //             data:{'order_ids':ids},
        //             success:function(res)
        //             {
        //               swal.fire("Processed", "", "success");
        //               $("tbody").find("input[type='checkbox']:checked").each(function(){
        //                 $(this).parent().parent().remove();
        //               });
        //                   console.log(res);
        //                 if(res){
        //                     location.reload(); 
        //                 }
        //             },
        //             error:function(err)
        //             {

        //             }
        //         });
        // }

        // SELECT BOX CLICK ACTION END

        // From there EDIT start



        function cancel_delivery(ele) {
            var delivery_id = $(ele).attr('pk');
            console.log('hi i am cancel delivery');
            get_order_by_id_cancel(delivery_id);

        }



        function get_order_by_id_cancel(id) {
            //hide_error();
            console.log('hi i am start of get order by id');
            var track_id = 0;

            var url = "<?php echo base_url(); ?>" + "order/AC_get_order_by_id";
            $fields = {
                'order_id': id,
                'track_ids': track_id
            };
            $.post(url, $fields, function(response) {
                console.log(response);
                if (response.success) {

                    var detail = response.detail;
                    console.log(detail);

                    var order_ = set_cancel_summery(detail);
                    $("#cancel_summery_data").empty();
                    $("#cancel_summery_data").append(order_);
                    //$("#v_data").show();
                    $("#loading").hide();
                }
            }, 'json');

            console.log('hi i am end of get cancel by id ');
        }

        function set_cancel_summery(detail) {

            var cancel_summery = detail[0];
            console.log(cancel_summery);

            console.log('hi i am start of set cancel');


            //set order status
            // $("#cancel_mod_title").html('Delivery Details of '+summery.status);

            // var img_url = "<?php //echo base_url(); 
                                ?>"+"upload/"+summery.delivery_img;

            var cancel_summery_data = '<div class="portlet-body form">';
            cancel_summery_data += '<input type="hidden" name="cancel_order_id" value="' + cancel_summery.order_id + '" id="cancel_order_id" class="form-control">';
            // Partner + Customer
            cancel_summery_data += '<div class="row">';
            cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Partner</label>';
            cancel_summery_data += '<input type="text" name="partner_name" id="partner_name" class="form-control" value="' + cancel_summery.vendor + '"  disabled>';
            cancel_summery_data += ' </div> </div>';

            cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Customer</label>';
            cancel_summery_data += '<input type="text" name="customer_name" id="customer_name" class="form-control" value="' + cancel_summery.customer + '"  disabled>';
            cancel_summery_data += ' </div> </div>';

            cancel_summery_data += '</div>';


            // Status + Ammount
            cancel_summery_data += '<div class="row">';
            cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Status</label>';
            cancel_summery_data += '<input type="text" name="cancel_status" id="cancel_status" class="form-control" value="' + cancel_summery.status + '"  disabled>';
            cancel_summery_data += ' </div> </div>';

            cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Ammount</label>';
            cancel_summery_data += '<input type="text" name="ammount" id="ammount" class="form-control" value="' + cancel_summery.partner_price + '"  disabled>';
            cancel_summery_data += ' </div> </div>';

            cancel_summery_data += '</div>';


            // Paid OR unpaid + Img
            cancel_summery_data += '<div class="row">';
            cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Cancelation Mode</label>';

            if (cancel_summery.canceled_mode == 'Paid_cancel') {
                cancel_summery_data += '<select id="cancel_mode" class="form-control"><option value="Paid_cancel">Paid Cancel</option>  <option value="Unpaid_cancel">Unpaid Cancel</option></select>';
            } else if (cancel_summery.canceled_mode == 'Unpaid_cancel') {

                cancel_summery_data += '<select id="cancel_mode" class="form-control"><option value="Unpaid_cancel">Unpaid Cancel</option> <option value="Paid_cancel">Paid Cancel</option> </select>';

            }
            cancel_summery_data += ' </div> </div>';

            cancel_summery_data += ' <div class="col-md-6">';
            cancel_summery_data += '<div class="form-group input-group-sm"> <label class="control-label">Prof Image</label>';
            cancel_summery_data += '<input type="file"  name="i_image" id="i_image" class="form-control ">';
            cancel_summery_data += '<span id="i_img_msg" style="color: red"></span>';




            if (cancel_summery.canceled_img != '') {
                cancel_summery_data += '<a  style="color:green" name="check_img_avail" id="check_img_avail" class="form-control " href="' + cancel_summery.canceled_img + '" target="_blank">Image Available</a>';

            } else {

                cancel_summery_data += '<input type="text"  style="color:red" name="check_img_avail" id="check_img_avail" class="form-control " value="Not Available" />';
            }

            cancel_summery_data += '<img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_i_image">';





            cancel_summery_data += '</div> </div>';

            cancel_summery_data += '</div>';

            // Short Note



            cancel_summery_data += '<div class="row">';

            cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Short Note</label>';
            cancel_summery_data += '<textarea name="note" id="note" rows="5" class="form-control" style="width:100%;" >' + cancel_summery.canceled_reason + '</textarea>';
            cancel_summery_data += ' </div> </div>';
            cancel_summery_data += '</div>';

            cancel_summery_data += '</div>';

            console.log(cancel_summery_data);

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
                    var res = type.split('/');
                    if (res.length > 0) {
                        if (res[1] !== 'png' && res[1] !== 'jpg' && res[1] !== 'jpeg' && res[1] !== 'pdf') {
                            $("#i_img_msg").append('invalid format');
                            $("#i_image").val('');
                        } else {
                            $("#i_img_msg").hide();
                        }
                    } else {
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



        $('body').on('change', '#i_image', function(e) {

            i_image(this);
        });




        function cancel_confirm() {

            var mode = $('#cancel_mode').val();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to edit this delivery with " + mode + " charges!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, edit it!'
            }).then((result) => {
                if (result.value) {

                    $('input').removeAttr('disabled');
                    var cancel_o_id = $('#cancel_order_id').val();


                    if (mode == 'Unpaid_cancel') {
                        var cancelation_price = 0;
                    } else {
                        var cancelation_price = $('#ammount').val();
                    }
                    var note = $('#note').val();

                    if (i_image_str == '') {
                        var profImg = '0';
                    } else {
                        var profImg = i_image_str;
                    }


                    console.log('hi i am confirm cancel:' + cancel_o_id);
                    console.log(mode);
                    console.log(cancelation_price);
                    console.log('note' + note);
                    console.log('image' + profImg);


                    $.ajax({
                        url: '<?php echo base_url('order/AC_cancel_order/Edit'); ?>',
                        type: 'POST',
                        data: {

                            'id': cancel_o_id,
                            'mode': mode,
                            'note': note,
                            'profImg': profImg,
                            'cancelation_price': cancelation_price

                        },
                        success: function(res) {
                            console.log(res);
                            swal.fire("Update Successfully!", "", "success").then(function() {
                                location.reload();
                            });


                        },
                        error: function(err) {
                            console.log(err);
                            swal('Network Issue!', 'Please Try Again!', 'error');
                        }
                    });


                }
            });



        }

        function revert(ele) {
            var delivery_id = $(ele).attr('pk');


            Swal.fire({
                title: 'Are you sure!',
                text: "You want to revert cancelation ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, revert it!'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: '<?php echo base_url('order/AC_revert_'); ?>',
                        type: 'POST',
                        data: {

                            'id': delivery_id


                        },
                        success: function(res) {
                            console.log(res);
                            swal.fire("Revert Successfully!", "", "success").then(function() {
                                location.reload();
                            });


                        },
                        error: function(err) {
                            console.log(err);
                            swal('Network Issue!', 'Please Try Again!', 'error');
                        }
                    });
                }
            });

        }
    </script>

</body>
<style type="text/css">
    .redd {
        background: lightblue;
    }

    .redd:hover {
        color: black !important;
    }

    th {
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