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
         <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
<style type="text/css">
   

form {
  margin-top: 20px;
}

select {
  width: 900px;
}
.chosen-container-multi .chosen-choices {
    width: 273px !important;
    height: 35px;
}
.chosen-container{
  width: 100% !important;
}
 td, th {
         border: 1px solid #dddddd;
        }
            .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #00b6eb;
    border-color: #7e57c2;
}
.btn-group{
    margin-top: -10px;
    margin-bottom: 10px;

}

    </style>
  
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
.updatebtn{
    background-color: black;
    color: white;
}
  .yellow {
  background-color: lightblue;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -36px;
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Custom Alerts</a></li>
                                  
                                </ol>
                            </div>
          <!--   <?php echo validation_errors();?>
            
                <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-success" id="error" style="align-content: center; background-color: red;">
                    <?php echo $this->session->flashdata('error') ?>
                </div>
                <?php } ?>
                   <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" id="success" style="align-content: center; background-color: green;color: white;">
                    <?php echo $this->session->flashdata('success') ?>
                </div>
                <?php } ?> -->
               
                            <h4 class="page-title">Custom Alert Messages</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        
                              <!-- <a href="#custom-modal" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a" id=""><i class="mdi mdi-plus-circle mr-1"></i> Add New Partner</a> -->

                             
                                <button onclick="javascript:$('#responsive').modal()" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Add New &nbsp;<i class="icon-plus"></i></button>
                                <br> <br>
                            
                            
                            <table  class=" example table">

                                <thead class="thead-light">

                                <tr>
                                    <th>SR No</th>
                                    <th>Opt Name</th>
                                    <th>Opt Value</th>

                                </tr>
                                </thead>

                                <tbody>
                                 <?php  foreach ($opts as $key => $opt) {?>
                                        <tr>
                                            <td ><?php echo $key+1;?></td>
                                            <td ><?php echo $opt['option_name'];?></td>
                                            <td ><?php echo $opt['option_value'];?></td>
                                         </tr>
                                   <?php }?>

                               
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>
  <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" style="width: 500px">
                    <div class="modal-content" style="width: 120% !important;">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add New Option</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        </div>

                        <div class="modal-body">

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                               <form id="add_vendor_form" action="<?php echo base_url('settings/save_option') ?>" method="post" class="horizontal-form" >
                                    <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">


                                            <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Select Option</label>
                                                <select class="form-control" name="option_name" required>
                                                    <option value="delivery_completion_msg">Delivery Completion Msg</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Option Value<span class="required">*</span></label>
                                                <input type="text" name="option_value" class="form-control" autocomplete="off" required>
                                            </div>
                                        </div>
                                        </div>


                               
                            </div>

                        </div>

                        <div class="modal-footer">
                             <button type="submit" style="background: black;color: white;" class="btn green">Save</button>
                            <button id="responsive" style="background: black;color: white;" type="button" data-dismiss="modal" class="btn default">Close</button>

                           
                        </div>
                         </form>
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
         <script src="<?php echo base_url('assets/plugins/jquery-1.10.2.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>

          <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

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

        <!-- Init js -->
          <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       
        <script type="text/javascript">
          $(document).ready(function () {
             
                if(document.location.href.indexOf('saved=true') > -1)
                {
                    swal("Saved", "Option Saved Successfully", "success");
                }
         
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
    </body>
</html>