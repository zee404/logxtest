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
             .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

        }
        div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Areas</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Areas</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="height: 50px !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    <div class="col-lg-3">
                         <div class="page-title-box">
                            
                            <h4 class="page-title" style="margin-top: -36px;">Manage Delivery Areas</h4>

                        </div>

                    </div>
                     <div class="col-lg-2"></div>
                     <div class="col-lg-5"></div>
                     <div class="col-lg-2">
             
                    <div id="" class="" >
                            <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;margin-top: -15px;border-color: white;">Add New &nbsp;<i class="icon-plus"></i></button>
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
                            
                            <table class="example" data-toggle="table"
                                  >

                                <thead class="thead-light">

                                <tr>
                                    
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th data-field="name" data-sortable="true">Area</th>
                                    
                                    
                                    <th data-field="" data-align="center" data-sortable="true" data-formatter="">Action</th>
                                     
                                    

                                </tr>
                                </thead>

                                <tbody>
                                        <?php foreach ($areas as $key => $area) {?>
                                        <tr>
                                         
                                        <td ><?php echo $key+1;?></td>
                                        <td ><?php echo $area->area_name;?></td>
                                        <td> 
                                            <a class="" data-area='<?php echo json_encode($area) ?>' title="Edit" data-toggle="modal" onclick="javascript:show_model(this)" href="#responsive" flag="edit">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <a class="del_area" data-id="<?php echo $area->area_id ?>" href="javascript:void(0);">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
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
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add Area</h4>
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="add_area_form" action="<?php echo base_url('order/save_area') ?>" method="post" class="horizontal-form" >
                                    <input type="hidden" name="area_id" value="" id="type_id" class="form-control">

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Area Name <span class="required">*</span></label>
                                                <input type="text" name="area_name" id="name" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="save_area_btn" type="submit" class="btn green"style="background: black;color: white;">Save</button>
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
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
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
                swal("Area Deleted", "", "success");
            }
            $(".del_area").click(function(e){
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
                        window.location = "<?php echo base_url('order/del_area') ?>/"+aid;
                        } else {
                        console.log('canceeled');
                        e.preventDefault();
                    }
                });
            });

            $("#save_area_btn").click(function(){
                $("#add_area_form").submit();    
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
  
 function show_model(ele){
        var flag = $(ele).attr('flag');
        //reset form values
        $('#add_area_form')[0].reset();


        if(flag == 'add'){
            //changed model title
            $("#mod_title").html('Add New Area');
            //change model button

            $("input[name='area_id']").val(0);
        }

        if(flag == 'edit'){
            //changed model title
            $("#mod_title").html('Edit Area');
            //change model button

            alldata = JSON.parse($(ele).attr("data-area"));
            console.log(alldata);
            $("input[name='area_name']").val(alldata.area_name);
            $("input[name='area_id']").val(alldata.area_id);

        }

    }

    function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
        hide_error();
    }

  

    //SAVE vendor METHODS


   </script>
       
    </body>
</html>