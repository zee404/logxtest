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
        <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
        <!-- App css -->
           <link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
           <link href="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
          
         <link href="<?php echo base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />            
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
tr td {
    background-color: white;
}

.select2-drop-active{
    margin-top: -25px;
}

.select2-container--default .select2-selection--single {
    /* background-color: #fff; */
    /* border: 1px solid #aaa; */
    border-radius: 4px;
    height: 36px;
}


.select2-container--default .select2-results>.select2-results__options {
    max-height: 400px;
    overflow-y: auto;
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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Monthly Meal Plan</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Set Customers Meta </a></li>
                                  
                                </ol>
                            </div>
                          <h4 class="page-title">Upload Customers via File</h4>
                        </div>
                    </div>
                </div>


                <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="card-box">
                        
                        <div class="portlet-body">

                            <!--ERROR MSG-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="file-success-msg">
                                        <?php
                                        $data = $this->session->flashdata('data');
                                        if (isset($data)) {
                                            echo $data;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!--UPLOAD FILE FORM-->
                            <div class="row">
                                <!--GENERAL FILE UPLOAD -->
                                <div class="col-md-7">
                                    <?php //echo form_open_multipart('ptests/readd'); 
                                    echo form_open_multipart('order/upload_customers_file_by_general_file'); ?>
                                    <div class="row">
                                    <?php if (strtolower($this->session->userdata('role')) == 'admin' OR strtolower($this->session->userdata('role')) != 'vendor') { ?>
                                        <div class="col-md-5 form-group">
                                            <select id="vendor_list" class="form-control search_option" name="vendor_id" required>
                                                <option value="">Select Partner</option>
                                                <?php foreach ($vendors as $key => $ven) {?>
                                                <option value="<?= $ven->id; ?>" ><?= $ven->full_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    <?php }else{ ?>
                                        <input type="hidden" name="vendor_id" id="vendor_list" value="<?php echo $this->session->userdata('u_id') ?>">
                                    <?php } ?>
                                    
                                      
                                        <div class="col-md-5" style="margin-bottom: 20px;">
                                            <input type="file" name="userfile" id="uploadInputt" class="btn-file file-input" size="20" accept=".xlsx, .xls" style="display: none;" />
                                            <button type="button" class="btn btn-primary" id="uploadBtn" style="color: #fff;background-color: #197990 !important;">Select File To Upload *.xls</button><span id="file_namee"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <button id="submitUpload" style="color: #fff;background-color: #197990 !important; display: none;" type="submit" value="Upload" class="btn btn-primary">Upload</button>
                                        </div>
                                            
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>

                                <div class="col-md-5">
                                    <a href="#custom-modals" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"  style="color: #fff;background-color: #197990 !important;border-color: white;margin-left: -49px;height: 36px;"><i class="mdi mdi-plus-circle mr-1"></i>XLSX TIPS</a>
                                
                                    <!--<button id="openFormModal" class="btn btn-primary waves-effect waves-light" style="color: #fff;background-color: #197990 !important;">Upload Via Form</button>-->
                                </div>



                            </div>

                            

                        </div>
                    </div>
                </div>

</div>
            <!-- END PAGE CONTENT-->

                </div>
                </div>     
              

                <!--  <div class="row">

                            <div class="col-md-12  card-box" style="margin-left: 10px;">
                            <a href="# " class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"  style="color: #fff;background-color: #197990 !important;border-color: white;"><i class="mdi mdi-plus-circle mr-1"></i>Upload bag collection via file</a>
                                      
                                   
                            </div>



                            </div>
        </div>
        end wrapper -->
   
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
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        
            
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>

        <!-- Init js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js" integrity="sha256-zGo0JbZ5Sn6wU76MyVL0TrUZUq5GLXaFnMQCe/hSwVI=" crossorigin="anonymous"></script>
            <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <!-- Init js -->
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>
        
        <script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script>
        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $("input[name='order_date']").flatpickr({
                    minDate: new Date()
                });

                $("#openFormModal").click(e =>{
                    $("#delvModal").modal();
                });

                $("#uploadBtn").click(function(){
                    $("#uploadInputt").click();
                    
                });

                $("#uploadInputt").change(function(){
                    $("#submitUpload").show();
                    $("#file_namee").text($(this).val().split('\\').pop());

                });

                if(document.location.search.indexOf("saved=yes") > -1)
                    swal("Uploaded", "Order Placed Successfully", "success");

                $(".order_form_save").submit(function(e){
                //e.preventDefault();
                    var vid = $("select[name='order_vendor_id']").val();
                    var byName = logged_user.name;

                    send_bags_dels_noti({noti_to: vid, by_name: byName, by_type: logged_user.role == 'admin' ? 'admin' : 'general', 'product': 'Order'});

                    console.log('sending the notification');
                });
                
                
                
                
                $('.search_option').select2({
                      placeholder: 'Select Partner'
                    });


            });
            
        </script>

    </body>



    <div id="delvModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="post" action="<?php echo base_url('order/save_order_form') ?>" class="order_form_save">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Delivery Via Form Input</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <?php if (strtolower($this->session->userdata('role')) != 'vendor') { ?>
                                                    <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Name *</label>
                                                        <input type="text" name="order_name" class="form-control" id="field-1" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Phone# *</label>
                                                        <input type="text" class="form-control" id="field-2" name="order_phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Pickup Address *</label>
                                                        <input type="text" class="form-control" id="field-3" placeholder="Address" name="order_pickup" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-44" class="control-label">Area *</label>
                                                        <select class="form-control" name="order_area" required>
                                                            <option value="">Select Area</option>
                                                            <?php foreach($areas AS $area): ?>
                                                                <option value="<?php echo $area->area_id ?>"><?php echo $area->area_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="field-33" class="control-label">Delivery Address *</label>
                                                        <input type="text" class="form-control" id="field-33" placeholder="Address" name="del_address" required>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">

                                                    <div class="form-group">
                                                        <label for="field-4" class="control-label">Partner *</label>
                                                        <select class="form-control myVendors" id="field-4" name="order_vendor_id" required>
                                                            <option value="">Select Partner</option>
                                                            <?php foreach($vendors AS $vendor): ?>
                                                                <option value="<?php echo $vendor->id ?>"><?php echo $vendor->full_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Signature *</label>
                                                        <select class="form-control" name="order_signature" required>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-44" class="control-label">Emirate With Time*</label>
                                                        <select class="form-control" id="field-44" name="order_shift" required>
                                                            <option value="">Select Emirate with Time</option>
                                                            <?php foreach($dtypes AS $dtype): ?>
                                                                <option><?php echo $dtype ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-44" class="control-label">Notification *</label>
                                                        <select class="form-control" name="notification" required>
                                                            <option value="">Select</option>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-44" class="control-label">Product Type</label>
                                                        <input class="form-control" name="product_type">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Date</label>
                                                        <input type="text" name="order_date" class="form-control" value="<?php echo date('Y-m-d', strtotime('+1 day')) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group no-margin">
                                                        <label for="field-7" class="control-label">Notes</label>
                                                        <textarea name="order_note" class="form-control" id="field-7" placeholder="Write something about Order"></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Delivery Amount</label>
                                                            
                                                            
                                                           <input class="form-control" name="Delivery_Amount" id="Delivery_Amount" placeholder="(AED)"
                                            
                                                             oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                             type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0"
                                                             />
                                                        
                                                        </div>
                                                        </div>
                                                        
                                                        
                                                          <div class="col-md-8">
                                                         <div class="form-group">
                                                        <label class="control-label">Company Delivery Id</label>
                                                        <input  class="form-control" type="text" name="Company_Note" id="Company_Note" />
                                                        
                                                        
                                                        </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12">
                                                         <div class="form-group">
                                                        <label class="control-label">Google Link Address</label>
                                                        <input  class="form-control" type="text" name="google_link" id="google_link" />
                                                        
                                                        
                                                        </div>
                                                        </div>
                                            </div>
                                            
                                            <?php }else{ ?>
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Name *</label>
                                                        <input type="text" name="order_name" class="form-control" id="field-1" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Phone# *</label>
                                                        <input type="text" class="form-control" id="field-2" name="order_phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Pickup Address *</label>
                                                        <input type="text" class="form-control" id="field-3" placeholder="Address" name="order_pickup" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-44" class="control-label">Area *</label>
                                                        <select class="form-control" name="order_area" required>
                                                            <option value="">Select Area</option>
                                                            <?php foreach($areas AS $area): ?>
                                                                <option value="<?php echo $area->area_id ?>"><?php echo $area->area_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="field-33" class="control-label">Delivery Address *</label>
                                                        <input type="text" class="form-control" id="field-33" placeholder="Address" name="del_address" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="hidden" name="order_vendor_id" id="field-4" value="<?php echo $this->session->userdata('u_id') ?>">
                                                    <div class="form-group">
                                                        <label for="field-44" class="control-label">Emirate With Time*</label>
                                                        <select class="form-control" id="field-44" name="order_shift" required>
                                                            <option value="">Select Emirate with Time</option>
                                                            <?php foreach($dtypes AS $dtype): ?>
                                                                <option><?php echo $dtype ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Signature *</label>
                                                        <select class="form-control" name="order_signature" required>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-44" class="control-label">Notification *</label>
                                                        <select class="form-control" name="notification" required>
                                                            <option value="">Select</option>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label">Product Type</label>
                                                        <input class="form-control" name="product_type">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Date</label>
                                                        <input type="text" name="order_date" class="form-control" value="<?php echo date('Y-m-d', strtotime('+1 day')) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group no-margin">
                                                        <label for="field-7" class="control-label">Notes</label>
                                                        <textarea name="order_note" class="form-control" id="field-7" placeholder="Write something about Order"></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Delivery Amount</label>
                                                            
                                                            
                                                           <input class="form-control" name="Delivery_Amount" id="Delivery_Amount" placeholder="(AED)"
                                            
                                                             oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                             type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0"
                                                             />
                                                        
                                                        </div>
                                                        </div>
                                                        
                                                        
                                                          <div class="col-md-8">
                                                         <div class="form-group">
                                                        <label class="control-label">Company Delivery Id</label>
                                                        <input  class="form-control" type="text" name="Company_Note" id="Company_Note" />
                                                        
                                                        
                                                        </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12">
                                                         <div class="form-group">
                                                        <label class="control-label">Google Link Address</label>
                                                        <input  class="form-control" type="text" name="google_link" id="google_link" />
                                                        
                                                        
                                                        </div>
                                                        </div>
                                            </div>
                                        <?php } ?>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div><!-- /.modal -->

                            <div id="custom-modals" class="modal-demo" style="padding: 35px;">
                 
                                 <blockquote class="hero">
                                        <!-- <p> Click <a href="<?php echo base_url(); ?>download/DeliveriesCSVFormat.csv">HERE</a> to Download Deliveries CSV File Format!</p> -->
                                        <p > Click <a href="<?php echo base_url('ptests/excel_customer'); ?>" style="color: green !important;">HERE</a> to Download Customers XLSX File Format!</p>
                                    </blockquote>
                                    <ul class="list-unstyled  margin-top-10 margin-bottom-10">
                                        <li><i class="icon-ok"></i> CustomerID is the most important if you do not fill this system will automatically generate a unique customer id for identification purpose. ( Optional )</li>
                                        <li><i class="icon-ok"></i> Customer Full Name ( Optional: Max. 90 characters )</li>
                                        <li><i class="icon-ok"></i> Customer Phone ( Required: Max. 12 characters with country code )</li>
                                        <li><i class="icon-ok"></i> Customer Email ( Optional )</li>
                                        <li><i class="icon-ok"></i> Area ( Required )</li>
                                        <li><i class="icon-ok"></i> Villa address – Villa number, street name or number, Makani number, area and city ( Required )</li>
                                        <li><i class="icon-ok"></i> Apartment address – Apartment number, Building name, area and city </li>
                                        <li><i class="icon-ok"></i> Emirate With Time ( Required )</li>
                                        <li><i class="icon-ok"></i> Send Notification Option ( Required )</li>
                                        <li><i class="icon-ok"></i> Product Type ( Optional )</li>
                                    </ul> 
                </div>

</html>