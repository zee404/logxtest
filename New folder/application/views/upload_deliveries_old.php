<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/logx-logo-512x512.png');?>">

        <!-- Plugins css -->
        <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
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
            input[name=btSelectAll], input[name=btSelectItem] {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
    display: none;
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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Driver</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Upload Driver</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Upload Drivers</h4>
                        </div>
                    </div>
                </div>     
              

                 <div class="row">

                            <div class="col-md-12  card-box">
                            
                            
                           
                              <a href="# " class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a" style="color: #fff;background-color: #197990 !important;border-color: white;"><i class="mdi mdi-plus-circle mr-1"></i>Upload Customer via file</a>
                                      
                                   
                                </div>


                            </div>
                    
                 <div class="row">

                            <div class="col-md-12  card-box">
                                        <label><strong>Select Vender</strong></label>
                                        <br>
                                    <select id="end" style="width: 400px;height: 30px;">
                                      <option value="">Select Driver</option>
                                            
                                      <option value="">usman</option>
                                      <option value="">hamza</option>
                                      <option value="">Bilal</option>
                                      <option value="">sabahat</option>
                                                               
                                    </select>
                               <br> <br>
                                <input type="file" name="userfile" class="btn-file file-input" size="20" />
                            
                            <br><br><br>
                                <input type="submit" value="Upload "/>
                                      
                                   
                                </div>


                            </div>
                           

                            <div class="row" >
                                <div class="col-md-12  card-box">
                                    <!-- Blockquotes -->
                                   

                                     <blockquote class="hero">
                                        <p> Click <a href="" style="color: dodgerblue;">HERE</a> to Download Customers CSV File Format!</p>
                                    </blockquote>
                                    <ul class="list-unstyled  margin-top-10 margin-bottom-10">
                                        <li><i class="icon-ok"></i> Customer Full Name ( Optional: Max. 90 characters )</li>
                                        <li><i class="icon-ok"></i> Customer Phone ( Required: Max. 12 characters with country code )</li>
                                        <li><i class="icon-ok"></i> Customer Email ( Optional )</li>
                                        <li><i class="icon-ok"></i> Deliveries Address ( Required )</li>
                                        <li><i class="icon-ok"></i> Delivery Time ( Required ) </li>
                                        <li><i class="icon-ok"></i> Notes ( Optional )</li>
                                    </ul>
                                </div>
                            </div>  
                <!-- end row-->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
   
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
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>

        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        
    </body>
</html>