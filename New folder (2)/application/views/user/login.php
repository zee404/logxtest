<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Logx || The Logistics Solutions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Logx || The Logistics Solutions" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
       <link rel="shortcut icon" href="<?php echo base_url('assets/images/logx-logo-512x512.png');?>">

        <!-- App css -->
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
 <style>
body.authentication-bg {
    /* background-color: #f7f7f7; */
    background-size: cover;
    background-position: center;
    background: #002E36;
}
a {
    color: #2AB1C9;
    /* color: #7e57c2; */
    text-decoration: none;
    background-color: transparent;
}
.abc{
    
    color:#72747b;
}
.custom-control-input:checked~.custom-control-label::before {
    /* color: #7e57c2; */
    border-color: #7e57c2;
    background-color: #2AB1C9;
}
 </style>
    </head>

    <body class="authentication-bg a" style="background-image: url(<?php echo base_url('images/logx-admin-portal-bg.png') ?>);">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card ">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="<?php echo base_url() ?>">
                                        <span><img src="<?php echo base_url('assets/images/Logo_with_new_icon.png');?>" style="width: 65%;"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>

                                <form action="<?php echo base_url()?>auth/login" method="post">
                                    <?php if (@$response['error']){?>
                                        <div class="alert alert-error bg-red">
                                            <button class="close" data-dismiss="alert" ></button>
                                            <span style="background-color: #e02222 !important;border-color: #e02222 !important;color: white;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;margin-left: -20px;"><?php echo $response['error_msg'];?> </span>
                                        </div>
                                    <?php }?>
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address </label>
                                        <input class="form-control" type="email" autocomplete="off" placeholder="User Email" name="username"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" autocomplete="off" placeholder="Password" name="password"/>
                                    </div>
                                         <input type="hidden" name="driver_id" value="3">
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-info btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                        
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                       
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- Vendor js -->
        <script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url(); ?>assets/js/app.min.js"></script>
        
    </body>
</html>