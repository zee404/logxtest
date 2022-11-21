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
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logx-logo-512x512.png');?>">

    <!-- Plugins css -->
    <link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url('assets/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet"
        type="text/css" />
    <!-- App css -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- Navigation Bar-->
    <?php $this->load->view('common/header');?>
    <!-- End Navigation Bar-->
    <!--======================SELECT BOX CODE END==================================-->

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Team </a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Fleet</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Vehicle List</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Vehicle List</h4>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <!--  <h4 class="header-title">Vender list</h4> -->
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sro-12 col-md-12 col-lg-12 col-xl-12 table-responsive">
                                <table class="example table table-bordered">

                                    <thead class="thead-light">

                                        <tr>
                                            <!--                                    <th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" ></th>-->
                                            <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                            <th data-field="status" data-align="center" data-sortable="false">
                                                Registration Number</th>
                                            <th data-field="name" data-sortable="true">Make</th>
                                            <th data-field="" data-align="center" data-sortable="true"
                                                data-formatter="">Model</th>
                                            <th data-field="date" data-sortable="true">Year</th>
                                            <!-- <th data-field="date" data-sortable="true" >Vehicle Status</th> -->
                                            <th data-field="date" data-sortable="true">Recent Driver</th>




                                            <th data-field="Action" data-align="center" data-sortable="true"
                                                data-formatter="">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if(!empty($list)){
                                    $count=0; foreach ($list as $key => $value) {?>
                                        <tr>
                                            <!--                                            <td><input type="checkbox" class="checkboxes" value="--><?php //echo $driver->id;?>
                                            <!--" / id="" /  name="checkbox"></td>-->
                                            <td><?php echo $value->id;?></td>
                                            <td><?php echo $value->v_number;?></td>
                                            <td><?php echo $value->model_name;?></td>
                                            <td><?php echo $value->type;?></td>
                                            <td><?php echo $value->year;?></td>
                                            <!-- <td ><?php echo $value->vehicle_status;?></td> -->
                                            <td style="text-align:left">
                                                <table class="table-bordered">
                                                    <thead>
                                                        <th>Driver</th>
                                                        <th>Phone</th>
                                                        <th>Check in</th>
                                                        <th>Check out</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php     if(count ($value->drivers))
                                                            {
                                                                foreach($value->drivers as $driver){
                                                                    ?>
                                                        <tr class="<?php if (!$driver['check_out']){ echo 'bg-danger';} ?>" >
                                                           <td><?php echo $driver['name'] ?></td>
                                                           <td><?php echo $driver['phone'] ?></td>
                                                           <td><?php echo $driver['check_in'] ?></td>
                                                           <td><?php 
                                                           if($driver['check_out']){
                                                            echo $driver['check_out'];
                                                           }else{
                                                            echo "Occupied";
                                                           }
                                                           ?></td>
                                                        </tr>
                                                            <?php    }  }?>
                                                    </tbody>
                                                </table>
                                              

                                            </td>
                                            <td>
                                                <a class="" title="Edit" data-toggle="modal" href="#responsive"
                                                    onclick="javascript:show_model(this)" flag="edit"
                                                    pk="<?php echo $value->id?>">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                                <a class="" flag="edit" href="javascript:void(0)"
                                                    pk="<?php echo $value->id?>">
                                                    <i class="mdi mdi-eye-outline "></i>
                                                </a>
                                                <a class=""
                                                    onclick="javascript:delete_vehicle('<?php echo $value->id?>')"
                                                    flag="edit" pk="<?php echo $value->id?>">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
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
    <div style="display: none">
        <div id="table_html" class="ml-5 mt-5">
            <div class="container">
                <div class="card">
                    <div class="container-fliud">
                        <div class="row" id="">
                            <div class="col-md-3"></div>
                            <div>
                                <img style="width: 500px; height: 500px" id="print_qr" src="" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <span style="margin: 20px"><b>Vehicle No: </b><span id="pr_v_no"></span></span>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <span style="margin-left: 20px; margin-bottom: 20px"><b>Make: </b><span
                                    id="pr_v_name"></span></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
    <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
    <!-- Bootstrap Tables js -->
    <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>
    <!-- shan -->
    <?php if($this->session->userdata('role_id') == 2){ ?>
    <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
    <?php } else if($this->session->userdata('role_id') == 1){ ?>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
    <!--from below-->
    <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
    <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
    <?php } ?>

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
    <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
    <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/print.js');?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

    <!-- Init js -->
    <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

    <!-- App js-->

    <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
    <style type="text/css">
    #cardimgdiv img {
        margin-left: 0px !important;
    }

    #qrcard {
        height: auto !important;
        padding-top: 10px;
        padding-bottom: 10px;
        border-bottom: 1px dotted black;
        border-right: 1px dotted black;
    }

    .col_6 {
        text-align: center;
        font-weight: 700;
        padding: 2px 0px;
        font-size: 21px;
    }

    .col_4 {
        text-align: center;
        font-weight: 700;
        padding: 2px 0px;
        font-size: 18px;
    }

    .col_3 {
        text-align: center;
        font-weight: 600;
        padding: 2px 0px;
        font-size: 14px;
        margin-left: -15px;
    }
    </style>
    <script type="text/javascript">
    list = '<?php echo json_encode($list)?>';
    v_image_str = '';
    i_image_str = '';
    m_image_str = '';
    r_image_str = '';


    function show_model(ele) {
        var flag = $(ele).attr('flag');
        //reset form values
        //$('#form_body')[0].reset();
        //  $('#form_body').find('input:text').val('');
        // // $('#form_body').find('input:date').val(00/00/0000);
        //  $('#form_body').find('input:file').val('');
        //  $('#form_body').find('img').val('');
        //  $('#form_body').find('span').val('');
        $('#form_body').find('img').attr('src', '');

        $("#form_body").find(':input').each(function() {
            switch (this.type) {
                case 'password':
                case 'text':
                case 'textarea':
                case 'file':
                case 'select-one':
                case 'select-multiple':
                case 'date':
                case 'number':

                    jQuery(this).val('');
                    break;

                    v_image_str = '';
                    i_image_str = '';
                    m_image_str = '';
                    r_image_str = '';

            }
        });
        if (flag == 'add') {

            $("input[name='vehicle_id']").val(0);
            $("#modal_name").prop("readonly", false);
            // $("#type").prop("readonly", true);
            $("#v_number").prop("readonly", false);
        }

        if (flag == 'edit') {
            //changed model title
            $("#mod_title").html('Edit Vehicle');
            var edit_id = $(ele).attr('pk');
            //change model button
            edit_vehicle(edit_id);



        }

    }

    function close_model() {
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden", "true");

    }


    function v_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var type = input.files[0].type;
                var res = type.split('/');
                if (res.length > 0) {
                    if (res[1] !== 'png' && res[1] !== 'jpg' && res[1] !== 'jpeg' && res[1] !== 'pdf') {
                        $("#v_img_msg").append('invalid format');
                        $("#v_image").val('');
                    } else {
                        $("#v_img_msg").hide();
                    }
                } else {
                    $("#v_img_msg").append('invalid format');
                    $("#v_image").val('');
                }

                if (input.files[0].size > 1057152) {
                    $("#v_img_msg").append('Try to upload file less than 1MB!');
                    $("#v_image").val('');
                } else {
                    $("#v_img_msg").hide();
                    v_image_str = e.target.result;
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function i_image(input) {
        console.log(input);
        console.log(input.files[0]);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {

                var type = input.files[0].type;
                var res = type.split('/');
                if (res.length > 0) {
                    if (res[1] !== 'png' && res[1] !== 'jpg' && res[1] !== 'jpeg' && res[1] !== 'pdf') {
                        $("#v_img_msg").append('invalid format');
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
                    i_image_str = e.target.result;
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function m_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {

                var type = input.files[0].type;
                var res = type.split('/');
                if (res.length > 0) {
                    if (res[1] !== 'png' && res[1] !== 'jpg' && res[1] !== 'jpeg' && res[1] !== 'pdf') {
                        $("#m_img_msg").append('invalid format');
                        $("#m_image").val('');
                    } else {
                        $("#m_img_msg").hide();
                    }
                } else {
                    $("#m_img_msg").append('invalid format');
                    $("#m_image").val('');
                }

                if (input.files[0].size > 1057152) {
                    $("#m_img_msg").append('Try to upload file less than 1MB!');
                    $("#m_image").val('');
                } else {
                    $("#m_img_msg").hide();
                    m_image_str = e.target.result;
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function r_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {

                var type = input.files[0].type;
                var res = type.split('/');
                if (res.length > 0) {
                    if (res[1] !== 'png' && res[1] !== 'jpg' && res[1] !== 'jpeg' && res[1] !== 'pdf') {
                        $("#r_img_msg").append('invalid format');
                        $("#r_image").val('');
                    } else {
                        $("#r_img_msg").hide();
                    }
                } else {
                    $("#r_img_msg").append('invalid format');
                    $("#r_image").val('');
                }

                if (input.files[0].size > 1057152) {
                    $("#r_img_msg").append('Try to upload file less than 1MB!');
                    $("#r_image").val('');
                } else {
                    $("#r_img_msg").hide();
                    r_image_str = e.target.result;
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#v_image").on('change', function() {
        v_image(this);
    });

    $("#i_image").on('change', function() {
        console.log('this is:');
        console.log(this);
        i_image(this);
    });

    $("#m_image").on('change', function() {
        m_image(this);
    });

    $("#r_image").on('change', function() {
        r_image(this);
    });

    $("#i_issue").on('change', function() {
        if ($("#i_exp").val() < $("#i_issue").val()) {
            $('#i_exp').val("");
            $('#i_issue').val("");
            $("#ins_date").append('Invalid dates');
        } else {
            $("#ins_date").hide();
        }
    });

    $("#v_number").change(function(e) {

        var v_number = $(this).val();
        console.log('checking registration');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Vehicle/check_registration_num') ?>",
            data: {
                v_number: v_number
            },
            success: function(response) {
                console.log("response:" + response);
                if (response == "already exist") {
                    $("#v_num_msg").text("Registration number (" + v_number + ") Already exist");
                    $("#v_number").val("");
                } else {
                    $("#v_num_msg").text("");
                }

            }
        });

    });

    $("#m_issue").on('change', function() {
        if ($("#m_exp").val() < $("#m_issue").val()) {
            $('#m_exp').val("");
            $('#m_issue').val("");
            $("#mun_date").append('Invalid dates');
        } else {
            $("#mun_date").hide();
        }
    });

    $("#r_issue").on('change', function() {
        if ($("#r_exp").val() < $("#r_issue").val()) {
            $('#r_exp').val("");
            $('#r_issue').val("");
            $("#reg_date").append('Invalid dates');
        } else {
            $("#reg_date").hide();
        }
    });

    // $("#modal_name").on('blur', function () {
    //     var url = '<?php echo base_url('Vehicle/check_duplicate');?>';
    //     $.ajax({
    //         url: url,
    //         type: 'POST',
    //         data: {
    //             'modal_name':$("#modal_name").val(), 'vehicle_id': $("#vehicle_id").val()
    //         },
    //         success: function (res) {
    //             $("#modal_msg").text(res);
    //         },
    //         error: function (err) {
    //             console.log(err);
    //         }
    //     });
    // });

    $("#save_vendor_btn").on('click', function() {
        var url = '<?php echo base_url('Vehicle/save_vehicle');?>';
        // if (i_image_str!='' && m_image_str!='' && r_image_str!='' && $("#i_exp").val() !== '' && $("#i_issue").val() !=='' && $("#m_exp").val() !== ''

        if ($("#i_exp").val() !== '' && $("#i_issue").val() !== '' && $("#m_exp").val() !== '' &&
            $("#r_issue").val() !== '' && $("#modal_name").val() !== '' && $("#r_exp").val() !== '' &&
            $("#type").val() !== '' && $("#year").val() !== '' && $("#year").val() !== '' &&
            $("#v_number").val() != '' && $("#m_issue").val() !== '') {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'id': $("#vehicle_id").val(),
                    'i_exp': $("#i_exp").val(),
                    'i_issue': $("#i_issue").val(),
                    'm_exp': $("#m_exp").val(),
                    'm_issue': $("#m_issue").val(),
                    'r_exp': $("#r_exp").val(),
                    'r_issue': $("#r_issue").val(),
                    'modal_name': $("#modal_name").val(),
                    'typee': $("#type").val(),
                    'year': $("#year").val(),
                    'v_number': $("#v_number").val(),
                    'v_image_str': v_image_str,
                    'i_image_str': i_image_str,
                    'm_image_str': m_image_str,
                    'r_image_str': r_image_str
                },
                success: function(res) {
                    console.log(res);
                    window.location.reload();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        } else {
            swal("Error", "Fill All Required fields", "error");

        }

    });

    function edit_vehicle(edit_id) {
        var result = JSON.parse(list);
        var myRecord = result.filter(record => record.id == edit_id);
        var myR = myRecord[0];
        $("#vehicle_id").val(myR.id);

        //assigning server side present values to editRecordForm
        $("#modal_name").val(myR.model_name ? myR.model_name : '');
        $("#type").val(myR.type ? myR.type : '');
        $("#year").val(myR.year ? myR.year : '');
        $("#v_number").val(myR.v_number ? myR.v_number : '');
        $("#department").val(myR.department ? myR.department : '');
        if (myR.v_image !== '') {
            $('#s_v_image').attr('src', myR.v_image);
        }
        if (myR.v_image !== '') {
            $('#s_v_image').attr('src', myR.v_image);
        }
        if (myR.m_image !== '') {
            $('#s_m_image').attr('src', myR.m_image);
        }
        if (myR.i_image !== '') {
            $('#s_i_image').attr('src', myR.i_image);
        }
        if (myR.r_image !== '') {
            $('#s_r_image').attr('src', myR.r_image);
        }

        $("#i_exp").val(myR.i_exp ? myR.i_exp : '');
        $("#i_issue").val(myR.i_issue ? myR.i_issue : '');


        $("#m_exp").val(myR.m_exp ? myR.m_exp : '');
        $("#m_issue").val(myR.m_issue ? myR.m_issue : '');

        $("#r_exp").val(myR.r_exp ? myR.r_exp : '');
        $("#r_issue").val(myR.r_issue ? myR.r_issue : '');


        $("#modal_name").prop("readonly", true);
        // $("#type").prop("readonly", true);
        $("#v_number").prop("readonly", true);
    }

    function delete_vehicle(id) {
        var url = '<?php echo base_url('Vehicle/delete_vehicle');?>';
        swal.fire({
            title: "Are You Sure",
            type: "warning",
            showCancelButton: true
        }).then((ok) => {
            if (ok.value) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        'id': id,
                    },
                    success: function(res) {
                        window.location.reload();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            } else {
                console.log('cancelled');
            }
        })
        return false;
    }

    function print_qr(edit_id) {
        $('#print_qr').attr('src', '');
        $('#pr_v_name').html('');
        $('#pr_v_no').html('');
        var result = JSON.parse(list);
        var myRecord = result.filter(record => record.id == edit_id);
        console.log(myRecord);
        var myR = myRecord[0];
        console.log(myR);
        $('#print_qr').attr('src', myR.qr_code);
        $('#pr_v_name').append(myR.model_name);
        $('#pr_v_no').append(myR.v_number);

        setTimeout(function() {
            printJS({
                printable: 'table_html',
                type: 'html',
                targetStyles: ['*']
            });
            $('#print_qr').click();

        }, 1000);
    }
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('input[name="checkbox"]').on('change', function() {
            $(this).closest('tr').toggleClass('yellow', $(this).is(':checked'));
        });
        $('#abc').on('click', function() {
            swal("Delete", "Successfully Delete", "success");
        });


        $('.example').DataTable({
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
            "lengthMenu": [
                [10, 25, 50, 75, 100, -1],
                [10, 25, 50, 75, 100, "All"]
            ]
        });
    });
    </script>