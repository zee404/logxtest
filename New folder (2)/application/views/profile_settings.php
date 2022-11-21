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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Profile</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mb-3 header-title">General Settings</h4>

                                <form class="form-horizontal" action="<?php echo base_url('settings/save') ?>" method="post">

                                    <div class="form-group row mb-3">
                                        <label for="full_name" class="col-3 col-form-label">Full Name</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Name" value="<?php echo $this->session->userdata('name') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="inputEmail3" class="col-3 col-form-label">Email</label>
                                        <div class="col-9">
                                            <input type="email" class="form-control" id="inputEmail3" name="user_email" placeholder="Email" value="<?php echo $this->session->userdata('email') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="phone" class="col-3 col-form-label">Phone</label>
                                        <div class="col-9">
                                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $this->session->userdata('phone') ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                        </div>
                                    </div>
                                </form>

                            </div>  <!-- end card-body -->
                        </div>  <!-- end card -->
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mb-3 header-title">Change Password</h4>

                                <form class="form-horizontal" action="<?php echo base_url('settings/save/password') ?>" method="post">
                                    
                                    <div class="form-group row mb-3">
                                        <label for="inputPassword3" class="col-3 col-form-label">Curr Password</label>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Current Password" name="curr_pass">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="inputPassword5" class="col-3 col-form-label">New Password</label>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="inputPassword5" name="new_pass" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="re_pass" class="col-3 col-form-label">Retype Password</label>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="re_pass" name="re_pass" placeholder="Retype New Password">
                                        </div>
                                    </div>
                                    <!--div class="form-group row mb-3 justify-content-end">
                                        <div class="col-9">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkmeout">
                                                <label class="custom-control-label" for="checkmeout">Check me out !</label>
                                            </div>
                                        </div>
                                    </div-->
                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Update Password</button>
                                        </div>
                                    </div>
                                </form>

                            </div>  <!-- end card-body -->
                        </div>  <!-- end card -->
                    </div>
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

        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <!-- Init js -->

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       
    </body>

    <script type="text/javascript">
        <?php if(!empty($this->session->flashdata('success'))){ ?>
            swal.fire("", "<?php echo $this->session->flashdata('success') ?>", "success");
        <?php } ?>

        <?php if(!empty($this->session->flashdata('error'))){ ?>
            swal.fire("", "<?php echo $this->session->flashdata('error') ?>", "error");
        <?php } ?>
    </script>

</html>