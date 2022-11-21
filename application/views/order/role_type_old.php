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

        }  div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
}
         
            .btn-danger {
    color: #fff;
    background-color: #197990 !important;
     border-color: white;
}
.badge {
    color: lightseagreen;
    font-size: 11.5px !important;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Settings </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Role Type</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Indoor Team's Role</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="height: 50px !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    <!-- <div class="col-lg-3">
                         <div class="page-title-box">
                            
                            <h4 class="page-title" style="margin-top: -36px;">Manage your Role type</h4>

                        </div>

                    </div>
                     <div class="col-lg-2"></div>
                     <div class="col-lg-5"></div> -->
                     <div class="col-lg-2">
             
                    <div id="" class="" >
                            <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;margin-top: -15px;border-color: white;">Add Role &nbsp;<i class="icon-plus"></i></button>
                            </a>
                    </div>
                     </div>
                 
                   
                </div>   
                            
                               <!-- <div class="col-md-4">
                                 <h3>Bags Tracking</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?= date('d-m-Y'); ?>">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" value="<?= date('d-m-Y'); ?>"class="form-control" name="to" id="to_date">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                       
                          </div> 
                               <div class="card-box">  
                            
                            <table  class="example" data-toggle="table"
                                  >

                                <thead class="thead-light">

                                <tr>
                                    
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th data-field="name" data-sortable="true">Type</th>
                                    
                                    <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Status</th>
                                    <th data-field="" data-align="center" data-sortable="true" data-formatter="">Action</th>
                                     
                                    

                                </tr>
                                </thead>

                                <tbody>
                                        <?php foreach ($types as $key => $type) {?>
                                        <tr>
                                         
                                        <td ><?php echo $key+1;?></td>
                                        <td ><?php echo $type->name;?></td>
                                             <td>
                                            <?php if($type->status == 6 ){ ?>
                                            <!-- <a style="text-decoration: none" href="#" onclick="javascript:update_status(this)" pk="<?= $type->id; ?>" flag="suspended" title="Click to suspended"> --><span class="label label-sm label-success">Active</span><!-- </a> -->
                                            <?php }else{ ?>
                                            <!-- <a style="text-decoration: none"  href="#" onclick="javascript:update_status(this)" pk="<?= $type->id; ?>" flag="active" title="Click to active"> --><span class="label label-sm label-warning">Suspended</span><!-- </a> -->
                                            <?php } ?>
                                            </td>
                                            <td> 
                                                 <a style="color: #0090b8" title="Edit" data-toggle="modal" onclick="javascript:show_model(this)" href="#responsive" flag="edit" pk="<?php echo $type->id?>">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>

                                                <a style="color: #0090b8" class="del_type" href="javascript:void(0)" data-id="<?php echo $type->id ?>"><i class="mdi mdi-delete"></i></a>

                                               
                                            </td>
                                           
                                        </tr>
                                     <?php } ?>

                               
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

  
                 <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" style="width: 300px">
                    <div class="modal-content" style="width: 380px;">
                        <div class="modal-header"style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add Role Type</h4>
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="add_type_form" action="#" method="post" class="horizontal-form" >
                                    <input type="hidden" name="type_id" value="" id="type_id" class="form-control">

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Name <span class="required">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="save_type_btn" onclick="save_delivery_type()" type="button" class="btn green"style="background: black;color: white;">Save</button>
                            <button id="edit_type_btn" onclick="update_delivery_type()" type="button" class="btn green"style="background: black;color: white;">Update</button>
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn default"style="background: black;color: white;">Close</button>
                        </div>

                    </div>
                </div>
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
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       
        <script type="text/javascript">
        
           $(document).ready(function () {

            if(document.location.href.indexOf("del=done") != -1)
            {
                swal("Deleted", "", "success");
            }

            $(".del_type").click(function(e){
                aid = $(this).attr("data-id");
                swal({
                    title: "Are you sure?",
                    text: "You Will Not be Able to Recover This!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(
                    function(isConfirm){
                        if ('value' in isConfirm){
                        window.location = "<?php echo base_url('order/del_tb/role') ?>/"+aid;
                        } else {
                        console.log('canceeled');
                        e.preventDefault();
                    }
                });
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
      //  App.side_Menu(link_id);
    });

</script>
<script type="text/javascript">
  
 function show_model(ele){
        hide_error();
        var flag = $(ele).attr('flag');
        //reset form values
        $('#add_type_form')[0].reset();


        if(flag == 'add'){
            //changed model title
            $("#mod_title").html('Add Role Type');
            //change model button
            $("#edit_type_btn").hide();
            $("#save_type_btn").show();
        }

        if(flag == 'edit'){
            //changed model title
            $("#mod_title").html('Edit Role Type');
            //change model button
            $("#edit_type_btn").show();
            $("#save_type_btn").hide();
            var type_id = $(ele).attr('pk');
            get_type_by_id(type_id);

        }

    }

    function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
        hide_error();
    }

    function show_msg(msg, class_){
        $("#error_container").removeClass('alert-success');
        $("#error_container").removeClass('alert-danger');
        $("#error_msg").html(msg);
        $("#error_container").addClass(class_);
        $("#error_container").show();
    }

    function hide_error(){
        $("#error_msg").html('');
        $("#error_container").hide();
    }

    //UPDATE Driver METHODS
    function get_type_by_id(id){
        hide_error();

        var url = "<?php echo base_url(); ?>"+"order/get_deliverys_type_by_id";
        $fields = {'type_id':id};
        $.post(url, $fields, function(response){
            if(response.success){
                var type = response.detail[0];
                $("#name").val(type.name);
                $("#type_id").val(type.id);
                $("#type_status").val(type.status);
            }
        },'json');
    }

    function update_delivery_type(){
        hide_error();

        var name = $("#name").val();
        var status = $("#type_status").val();
        var type_id = $("#type_id").val();

        var url = "<?php echo base_url(); ?>"+"order/update_deliverys_type";

        if(name && type_id){
            $fields = {'name':name, 'type_id':type_id};
            $.post(url, $fields, function(response){
                if(response.success){
                    var msg = '<strong>Success!</strong> Delivery type updated.';
                    show_msg(msg, 'alert-success');
                    location.reload();
                }else{
                    show_msg('<strong>Error!</strong> Not Saved try latter.', 'alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Delivery type not given.';
            show_msg(error, 'alert-danger');
        }

    }

    //SAVE vendor METHODS
    function save_delivery_type(){
        hide_error();

        var type_name = $("#name").val();
        // alert(type_name);
        var url = "<?php echo base_url(); ?>"+"order/save_role_type";

        if(type_name){
            $fields = {'type_name':type_name};
            $.post(url, $fields, function(response){
                if(response.success){
                    var msg = '<strong>Success!</strong> Delivery Type has saved.';
                    show_msg(msg, 'alert-success');
                    location.reload();
                }else{
                    show_msg('<strong>Error!</strong> Not Saved try latter.', 'alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Delivery type not given.';
            show_msg(error, 'alert-danger');
        }

    }


    function update_status(ele){
        hide_error();

        var status_type = $(ele).attr('flag');
        var type_id = $(ele).attr('pk');

        var url = "<?php echo base_url(); ?>"+"order/update_delivery_type_status";

        if(status_type && type_id){
           var status = (status_type == 'suspended') ? 0 : 1;

            $fields = {'status':status, 'type_id':type_id};
            $.post(url, $fields, function(response){
                if(response.success){
                    location.reload();
                }
            },'json');
        }
    }


   </script>
       
    </body>
</html>