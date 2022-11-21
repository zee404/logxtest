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
         <link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
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
tr td {
    background-color: white;
}
#fileName{
        position: absolute !important;
    left: 10px !important;
    bottom: -20px !important;
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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Operations</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bags Collection</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Upload Bags Collection via CSV OR via Form</h4>
                        </div>
                    </div>
                </div>     
              

                <!--  <div class="row">

                            <div class="col-md-12  card-box" style="margin-left: 10px;">
                            <a href="# " class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"  style="color: #fff;background-color: #197990 !important;border-color: white;"><i class="mdi mdi-plus-circle mr-1"></i>Upload bag collection via file</a>
                                      
                                   
                            </div>



                            </div>
                     -->
                 <div class="row">
                    <div class="col-sm-12 Uploadbuttton">
                        <div class="card-box" style="width: 104% !important;">
                         
                    <div class="row">
                    
                    <div class="col-lg-3  Uploadbuttton">
                         <div class="page-title-box">
                         
                        
                        <select id="type_list" class="form-control" name="type_id" required>
                            <option value="">Select Type</option>
                            <?php foreach ($types as $key => $type) {?>
                                <option value="<?= $type->id; ?>" data-type="" ><?= $type->name; ?></option>
                            <?php } ?>
                        </select>
                
                    </div>

                    </div>
                    
                      <div class="col-lg-4 Uploadbuttton">
                           <!-- <div style="" class="input-group input-medium_ date date-picker" data-date="<?php echo date('d-m-Y', strtotime("+1 day")); ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years"> -->
                            <input type="text" name="pick_date" id="pick_date" class="form-control" value="<?php echo date('Y-m-d') ?>"  alt="Pick date" title="pick date">
                            <span class="input-group-btn">
                            <button title="delivery date" class="btn default" type="button"><i class="icon-calendar"></i></button>
                            </span>
                        <!-- </div> -->
                    </div>
                    
                    
                   
              
                    
                </div> 
               
                </div>
                       
            </div>

               </div>       

                <div class="row">
                   
                    <div class="card-box" style="width: 175% !important;margin-left: 10px;">
                         
                    <div class="row">
                    <?php if($this->session->userdata('role_id') == 1){ ?>
                     <div class="col-md-2 form-group">
                       <select id="vendor_list" class="form-control" name="vendor_id" required>
                            <option value="">Select Partner</option>
                            <?php foreach ($vendors as $key => $ven) {?>
                                <option value="<?= $ven->id; ?>"><?= $ven->email.' - '.$ven->full_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } 
                else if($this->session->userdata('role_id') == 2){ ?>
                    <input type="hidden" name="vendor_id" id="vendor_list" value="<?php echo $this->session->userdata('u_id') ?>">
                <?php } ?>
                    <div class="col-md-3">
                        
                    
                         <input type="file" class="form-control" id="avatar"  name="userfile"class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="" data-overlaycolor="#38414a"  style="display:none;">
                        
                          <button type="button" class="btn btn-primary" id="imagebtn"style="color: #fff;background-color: #197990 !important;border-color: white;">Upload File </button>
                          <span id="fileName"></span>
                          
                   

                    </div>
                    
                     <div class="col-md-4">
                       <button data-toggle="modal" data-target="#csvTipsModal" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="csvTipsModal" data-overlaycolor="#38414a"  style="color: #fff;background-color: #197990 !important;border-color: white;margin-left: -49px;height: 36px;"><i class="mdi mdi-plus-circle mr-1"></i>CSV Tips</button>
                       <button id="openBagModal" class="btn btn-danger waves-effect waves-light" style="background-color: #197990 !important; border-color: #fff" type="button">Upload Bag Via Form</button>

                    </div>
                   <div class="col-md-3 Uploadbuttton">
                     <button type="button"  id="button" style="color: #fff;background-color: #197990 !important;border-color: white;" class="btn blue">Upload Bag Collection</button>
                </div> 
              
                    
                </div> 
               
                </div>
                       
           

             </div>             
                           
                     


                   <div class="card-boxs" style="margin-left: 10px;">
                     <table class="table " style="margin-left: 10px;">

                                <thead class="" style="background-color: #f1f5f7;">

                                <tr>
                                 <th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" ></th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>No. of Bags</th>
                                    <th>Notes</th>
                                   
                                    

                                </tr>
                                </thead>

                                <tbody  id="table_body">
                                  
                                </tbody>
                            </table>
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
         <script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <!-- <script src="<?php echo base_url()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> -->
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <!-- <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script> -->
        <!-- <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script> -->
        <!-- <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> -->
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <!-- <script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script> -->
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- <script src="<?php echo base_url()?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script> -->
        <!-- <script src="<?php echo base_url()?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script> -->
        <!-- <script src="<?php echo base_url()?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> -->

        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>
<!--shan-->
         <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
         
        <!-- <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script> -->
        <!-- <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>
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
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
         --><!-- Init js -->
        <!-- <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script> -->

        
<!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js" integrity="sha256-zGo0JbZ5Sn6wU76MyVL0TrUZUq5GLXaFnMQCe/hSwVI=" crossorigin="anonymous"></script>
        <?php 
        if ($this->session->flashdata('success')) {
            ?>
            <script type="text/javascript">
                swal("Added", "Bags informations successfully added", "success");
            </script>
            <?php
        }
        ?>
        <script type="text/javascript">
        $("#pick_date").flatpickr({
            defaultDate: moment().format('YYYY-MM-DD'),
            minDate: new Date()
         });
        $("#bag_date").flatpickr({
            defaultDate: new Date(),
            minDate: new Date(),
            static: true
        });
        $(".card-boxs").hide();
         $(".Uploadbuttton").hide();
           $(document).ready(function () {

            /*
            $(".myVendors").change(function(){
                if($(this).val())
                {
                    var vid = $(this).val();
                    $.ajax({
                        url: '<?php echo base_url("order/getCustomers") ?>',
                        data: {'vendor_id': vid},
                        method: 'post',
                        success: function(res)
                        {
                            $(".customers_list").empty();
                            res = JSON.parse(res);
                            if(res.error == false)
                            {
                                res.customers.forEach(custo => {
                                    $(".customers_list").append(`<option value="${custo.id}">${custo.full_name}</option>`);
                                });
                                
                            }
                        }
                    });
                }
            }); */

            $("#openBagModal").click(e =>{
                $("#bagsModal").modal();
            });


              $('#checkboxes').on('click', function () {
               swal("Delete", "Successfully Delete", "success");
              });
              $("#imagebtn").click(function () {
                $("#avatar").click();
                });
         
                $("input[name='userfile']").change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        console.log(reader.result);
                        $.csv.toArrays(reader.result, function(err, dt){
                            if(!err)
                            {
                                if(dt && dt.length > 0)
                                {
                                    dt.forEach(function(newArr, i){
                                        if(i ==0 || !newArr[0] || !newArr[1] || !newArr[2])
                                            return;

                                        $("#table_body").append('<tr><td><input checked type="checkbox" class="checkboxes" name="checkbox" id="savebtn" data-name="'+newArr[0]+'" data-phone="'+newArr[1]+'" data-address="'+newArr[2]+'" data-qty="'+newArr[3]+'"></td><td>'+newArr[0]+'</td><td>'+newArr[1]+'</td><td>'+newArr[2]+'</td><td>'+newArr[3]+'</td><td>'+newArr[4]+'</td></tr>');
                       
                                    });
                                }
                                  $(".card-boxs").show();
                                    $(".Uploadbuttton").show();
                            }
                        });
                    }

                reader.readAsText(e.target.files[0]);
                filename=e.target.files[0].name;
                 $("#fileName").text(filename);
                });

                myData = [];
                $(document).on('click', '.checkboxes', function(){
               
                    
                  });
             
               });

$('#button').on('click', function () {
    if(!$("#vendor_list").val())
    {
       swal("", "Please Select Shift Type", "error");
        return;
    }
    if(!$("#type_list").val())
    {
       swal("", "Please Select Type", "error");
        return;
    }
   
      myData = [];
     $('.checkboxes').each(function(){
        if($(this).prop('checked')){
            var name = $(this).attr("data-name");
            var phones = $(this).attr("data-phone");
            var address = $(this).attr("data-address");
                    var qty = $(this).attr("data-qty");
                    var phone = phones.replace('-','');
                   // phone = phones.replace(' ','');
                  myData.push({'name':name, 'phone':phone, 'address':address, 'qty':qty});
        }
     });
    console.log(myData);
    delAll();
 
});


function delAll()
{
        var type_id = $("select#type_list option:selected").val();
        var pick_date = $("#pick_date").val();
        var vender = $("#vendor_list").val();
        console.log(vender);

    $.ajax({

            url:'<?php echo base_url("Bag/save_bags") ?>',
            method:'post',
            data:{'myData':myData,'type_id':type_id,'pick_date':pick_date,'vender':vender},
            success:function(res)
            {
                 console.log(res);
                if(res){
                    location.reload(); 
                }
            },
            error:function(err)
            {
               
            }
        });
}

        </script>
    </body>

    <!-- <div id="custom-modals" class="modal fadein modal-demo" aria-hidden="true" style="padding: 35px;">
                 
                     <blockquote class="hero">
                        <p> Click <a href="<?php echo base_url(); ?>download/bagCSVFormat.csv" style="color: dodgerblue;">HERE</a> to Download Customers CSV File Format!</p>
                    </blockquote>
                    <ul class="list-unstyled  margin-top-10 margin-bottom-10">
                        <li><i class="icon-ok"></i> Customer Full Name ( Optional: Max. 90 characters )</li>
                        <li><i class="icon-ok"></i> Customer Phone ( Required: Max. 12 characters with country code )</li>
                        <li><i class="icon-ok"></i> Customer Email ( Optional )</li>
                        <li><i class="icon-ok"></i> Bag Picked Address ( Required )</li>
                        <li><i class="icon-ok"></i>No of bags ( Required ) </li>
                     
                    </ul>   
    </div> -->


<div id="bagsModal" class="modal fadein" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="post" action="<?php echo base_url('bag/save_bag_form') ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Bag Via Form Inputs</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <?php if(strtolower($this->session->userdata('role')) == 'vendor'){ ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Name</label>
                                                        <input type="text" name="cst_name" class="form-control" id="field-1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Phone# *</label>
                                                        <input type="text" class="form-control" id="field-2" name="cst_phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-33" class="control-label">Address *</label>
                                                        <input type="text" class="form-control" id="field-33" placeholder="Address" name="del_address" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="field-33" class="control-label">Shift *</label>
                                                        <select class="form-control" id="field-44" name="order_shift" required>
                                                            <option value="">Select Shift</option>
                                                            <?php foreach($dtypes AS $dtype): ?>
                                                                <option value="<?php echo $dtype['id'] ?>"><?php echo $dtype['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="order_vendor_id" id="field-4" value="<?php echo $this->session->userdata('u_id') ?>">
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="field-6" class="control-label">Bags Quantity *</label>
                                                    <input type="number" min="1" class="form-control" name="bag_qty" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" name="bag_date" id="bag_date" class="form-control" value="<?php echo date('Y-m-d', strtotime('+1 day')) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group no-margin">
                                                        <label for="field-7" class="control-label">Notes</label>
                                                        <textarea name="bag_notes" class="form-control" id="field-7" placeholder="Write something about Bag"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
                                       <?php }else{ ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Name</label>
                                                        <input type="text" name="cst_name" class="form-control" id="field-1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Phone# *</label>
                                                        <input type="text" class="form-control" id="field-2" name="cst_phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-33" class="control-label">Address *</label>
                                                        <input type="text" class="form-control" id="field-33" placeholder="Address" name="del_address" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-33" class="control-label">Shift *</label>
                                                        <select class="form-control" id="field-44" name="order_shift" required>
                                                            <option value="">Select Shift</option>
                                                            <?php foreach($dtypes AS $dtype): ?>
                                                                <option value="<?php echo $dtype['id'] ?>"><?php echo $dtype['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
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
                                                <div class="col-md-5">
                                                    <label for="field-6" class="control-label">Bags Quantity *</label>
                                                    <input type="number" min="1" class="form-control" name="bag_qty" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" name="bag_date" id="bag_date" class="form-control" required value="<?php echo date('Y-m-d', strtotime('+1 day')) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group no-margin">
                                                        <label for="field-7" class="control-label">Notes</label>
                                                        <textarea name="bag_notes" class="form-control" id="field-7" placeholder="Write something about Bag"></textarea>
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



                           
                <div id="csvTipsModal" class="modal fadein" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-header">
                                            <h4 class="modal-title">CSV TIPS</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body p-4">
                                            
                                             <blockquote class="hero">
                        <p> Click <a href="<?php echo base_url(); ?>download/bagCSVFormat.csv" style="color: dodgerblue;">HERE</a> to Download Bags Collection CSV File Format!</p>
                    </blockquote>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-caret-right"></i> Customer Full Name ( Optional: Max. 90 characters )</li>
                        <li><i class="fas fa-caret-right"></i> Customer Phone ( Required: Max. 12 characters with country code )</li>
                        <li><i class="fas fa-caret-right"></i> Customer Email ( Optional )</li>
                        <li><i class="fas fa-caret-right"></i> Bag Picked Address ( Required )</li>
                        <li><i class="fas fa-caret-right"></i> No of bags ( Required ) </li>
                     
                    </ul>   
                                        </div>
                                       
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div>
                                </div>
                                
                            </div><!-- /.modal -->




</html>