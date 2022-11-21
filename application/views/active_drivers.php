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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Active Driver</a></li>
                                  
                                </ol>
                            </div>
                             <h4 class="page-title">Active Drivers</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                          

                               <h4 class="page-title">Active Drivers</h4>
                            <table id="demo-custom-toolbar"  data-toggle="table"
                                   data-toolbar="#demo-delete-row"
                                   data-search="true"
                                   data-show-refresh="true"
                                   data-show-columns="true"
                                   data-sort-name="id"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="5"
                                   data-pagination="true" data-show-pagination-switch="true" class="table-borderless">
                                <thead class="thead-light">
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="id" data-sortable="true" data-formatter="invoiceFormatter">SR No</th>
                                    <th data-field="name" data-sortable="true">Full Name</th>
                                    <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Phone</th>
                                    <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Address</th>
                                    <th data-field="Invitations" data-align="center" data-sortable="true" data-formatter="">Invitations</th>
                                    <th data-field="" data-align="center" data-sortable="true" data-formatter="">Action</th>

                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td></td>
                                    <td>UB-1609</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Unpaid</td>
                                    <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="fe-map-pin"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>UB-1610</td>
                                    <td>Woldt</td>
                                    <td>24 Jun 2017</td>
                                    <td>$ 15.00</td>
                                    <td>Paid</td>
                                    <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="fe-map-pin"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1611</td>
                                    <td>Leonardo</td>
                                    <td>25 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Shipped</td>
                                    <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="fe-map-pin"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1612</td>
                                    <td>Halladay</td>
                                    <td>27 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Refunded</td><td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="fe-map-pin"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1613</td>
                                    <td>Badgett</td>
                                    <td>28 Jun 2017</td>
                                    <td>$ 95.00</td>
                                    <td>Unpaid</td>
                                    <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="fe-map-pin"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>UB-1614</td>
                                    <td>Boudreaux</td>
                                    <td>29 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Paid</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1615</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Shipped</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1616</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Refunded</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1617</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Unpaid</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>UB-1618</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Paid</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1619</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Shipped</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1620</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Refunded</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1621</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Unpaid</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>UB-1622</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Paid</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1623</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Shipped</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>UB-1624</td>
                                    <td>Boudreaux</td>
                                    <td>22 Jun 2017</td>
                                    <td>$ 35.00</td>
                                    <td>Refunded</td>
                                </tr>
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
   <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.modal.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="custom-modal-title">Add New Customers</h4>
                    <div class="custom-modal-text text-left">
                        <form>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="position">Phone</label>
                                <input type="text" class="form-control" id="position" placeholder="Enter phone number">
                            </div>
                            <div class="form-group">
                                <label for="category">Location</label>
                                <input type="text" class="form-control" id="category" placeholder="Enter Location">
                            </div>
        
                            <div class="text-right">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                               
                            </div>
                        </form>
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
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>

        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        
    </body>
</html>