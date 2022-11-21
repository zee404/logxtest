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
             .columns {
            float: right!important;
            display: none;
        }
        td, th {
         border: 1px solid #dddddd;
        }
        .yellow {
          background-color: lightblue;
        }
                    .btn-danger {
            color: #fff;
            background-color: #197990 !important;
             border-color: white;
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
  
        .badge {
            color: #72747b;
            font-size: 10.5px !important;
        }
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-top: -32px;
        }
        .badge {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            /* text-align: center; */
            white-space: unset;
            vertical-align: baseline;
            border-radius: .25rem;
            -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">  Partner </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customer List</a></li>
                                  
                                </ol>
                            </div>
                            <!--  <?php echo validation_errors();?>
            
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
                            <h4 class="page-title"> Customer List</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                             <?php echo form_open_multipart('driver/upload_drivers_by_general_file'); ?>
                              
                                   
                                <button type="button" id="new_cust_btn" class="btn blue" onclick="open_modal()" style="color: #fff;background-color: #197990 !important;border-color: white;">Add New Cutomer</button>
                        <!--      <input type="file" name="userfile"class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="" data-overlaycolor="#38414a" style="width: 250px;height: 35px;margin-left: 597px;">
                               <a href="#custom-modals" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i>CSV Tips</a> -->
                                
                                   <br>
                                   <button style="margin-left: 166px;margin-top: -55px;color: #fff;background-color: #197990 !important;border-color: white;" disabled class="btn btn-secondary buttons-csv buttons-html5 button" tabindex="0" id="button" aria-controls="demo-custom-toolbar" type="button" ><span>Delete</span></button>

                                    <br>
                            <?php echo form_close(); ?>
                            <table  id="demo-custom-toolbar1" class="example table table-bordered  table-hover dataTable no-footer">

                                <thead class="thead-light">

                                <tr>
                                    <th class="table-checkbox"><input type="checkbox"  class="group-checkable checkAll" ></th>
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th data-field="name" data-sortable="true">Full Name</th>
                                    <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Phone</th>
                                    <?php if (strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                    <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Partner</th>
                                <?php } ?>
                                    <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Address</th>
                                    
                                    <th data-field="qq" data-align="center" data-sortable="true" data-formatter="">Password</th>
                                    
                                    <th data-field="action" data-align="center" data-sortable="true" data-formatter="statusFormatter">Action</th>
                                     
                                    

                                </tr>
                                </thead>

                                <tbody>

                                    <?php 
                                    // if ($customers) {
                                    //  foreach ($customers as $key => $customer) {?>
                                        <!-- <tr>
                                           <td><input type="checkbox" class="checkboxes" value="<?php// echo $customer->id;?>"  id=""   name="checkbox"></td>
                                            <td ><?php //echo $key+1;?></td>
                                            <td ><?php //echo ucfirst($customer->full_name);?></td>
                                            <td ><?php //echo $customer->phone;?></td>
                                            <?php// if (strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                            <td ><?php //echo $customer->vendor;?></td>
                                            <?php// } ?>
                                            <td ><?php //echo $customer->address;?></td>
                                            <td ><a class="" title="Edit" href="#" onclick="get_customer_by_id(<?php //echo $customer->id ?>)">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a></td>

                                           
                                        </tr> -->
                                    <?php //} } ?>


                                
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
                            
                            <h4 class="modal-title " id="mod_title" style="color: white;">Add Customer</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="add_vendor_form" action="<?php echo base_url('Customer/save_customer') ?>" method="post" class="horizontal-form" >
                                   
                                    <input type="hidden" name="customer_id" id="customer_id">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Full Name</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Email<span class="required">*</span></label>
                                                <input type="text" name="email" id="email" class="form-control" required>
                                                <span id="mailcheckmsg" style="color: red"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Phone<span class="required">*</span></label>
                                                <input type="text" name="phone" placeholder="971123456789" id="phone" class="form-control" onchange="check_phn()"  required >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Address</label>
                                                <input type="text" name="address" id="address" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        <div class="input-group" style="margin-top: 22px;">
                                            <input type="text" name="s_pass" placeholder="Password Here" class="form-control"  id="s_pass" required>&nbsp;&nbsp;
                                        <span class="input-group-btn">
                                        <button style="background-color:black;" class="btn btn-default" type="button" onclick="gen_password()"><span class="glyphicon glyphicon-lock" aria-hidden="true">
                                        </span> Generate </button>
                                        </span>
                                        </div>
                                        </div>
                                       <!--  <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label"> Delivery Time </label>
                                                <input type="time" name="time" id="Delivery_time" class="form-control">
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <?php 
                                            // print_r($this->session->userdata());
                                            if ($this->session->userdata('role') == 'vendor') {
                                                ?>
                                                <input type="hidden" name="Partner_name" id="modules_partner" value="<?php echo $this->session->userdata('u_id'); ?>">
                                                <?php
                                            }else{
                                            ?>
                                        <div class="form-group">
                                            <label>Select Partner</label>
                                            <select  class="form-control" required="required" name="Partner_name" id="modules_partner">
                                                <option value="">Select</option>
                                                 <?php if ($vendors) {
                                                   foreach ($vendors as $result) { ?>

                                                 <option value="<?php echo $result->id;?>"><?php echo $result->full_name;?></option>  
                                                 <?php
                                                 } 
                                                      } ?>  
                                            </select>
                                         
                                        </div>
                                    <?php } ?>


                                    </div>

                                        

                                    </div>

                               
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="save_vendor_btn" type="submit" class="btn green abc"style="background: black;color: white;">Save</button>
                            <!--<button id="edit_vendor_btn" onclick="update_vendor()" type="button" style="background: black;color: white;" class="btn green abcd"  >Update</button>-->
                            <!--<button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" style="background: black;color: white;" class="btn default">Close</button>-->
                        </div>
                         </form>
                    </div>
                </div>
            </div>
  
                 <div id="custom-modals" class="modal-demo" style="padding: 35px;">
                      <blockquote class="hero">
                                        <p> Click <a href="<?php echo base_url(); ?>download/DriverCSVFormate.csv">HERE</a> to Download Driver CSV File Format!</p>
                                    </blockquote>

                                    <ul class="list-unstyled  margin-top-10 margin-bottom-10">
                                        <li><i class="icon-ok"></i> Driver Full Name ( Optional: Max. 90 characters )</li>
                                        <li><i class="icon-ok"></i> Driver Phone( Required: Max. 12 characters with country code )</li>
                                        <li><i class="icon-ok"></i> Driver Address ( Optional ) </li>
                                        <li><i class="icon-ok"></i> Driver Email ( Optional )</li>
                                    </ul>
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
<!-- shan -->
        <!-- Vendor js -->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
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
         <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script type="text/javascript">
            function open_modal()
            {
                document.querySelector("#add_vendor_form").reset();
                $("#mod_title").text("Add New Customer");
                $("#responsive").modal();
            }

        $("table").hide();
$(document).ready(function () {
            
            <?php if (!empty($this->session->flashdata('error'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('error') ?>';
                swal(msgg, "", "error");
            <?php } ?>

            <?php if (!empty($this->session->flashdata('success'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('success') ?>';
                swal(msgg, "", "success");
            <?php } ?>

                 setTimeout(function(){
            $("#success").fadeOut("slow");
            }
            , 5000);
                setTimeout(function(){
            $("#error").fadeOut("slow");
            }
            , 5000);
              $('input[name="checkbox"]').on('change', function() {
          $(this).closest('tr').toggleClass('yellow', $(this).is(':checked'));
        });
            setTimeout(function(){
                $("table").show();
                }, 2000);


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
        "lengthMenu": [[ 10, 25, 50, 75, 100,-1], [ 10, 25, 50, 75, 100,"All"]],
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('Customer/get_all_customers'); ?>",
            "type": "POST"
            
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});
        </script>
        <script type="text/javascript">
  var tmp = [];
   $(document).ready(function () {

  
  
  $(document).on('change', "input[name='checkbox']", function() {
      $("#button").prop('disabled', !$("input[type='checkbox']:checked").length);
  var checked = $(this).val();
    if ($(this).is(':checked')) {
      tmp.push(checked);
    }else{
    tmp.splice($.inArray(checked, tmp),1);
    }
  });
 
  $('#button').on('click', function () {
      
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    delAll();
  }
})
     
          
     
  });
  
});


function delAll()
{
    $.ajax({
            url:'<?php echo base_url("Customer/del") ?>',
            method:'post',
            data:{ids: tmp.join()},
            success:function(res)
            {
               swal.fire("Deleted", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
               window.location.reload();
            },
            error:function(err)
            {
                console.log('not Delete');
            }
        });
}
 $(document).on('change', '.checkAll', function(){
        $this = $(this);
        tmp = [];
        $("#button").prop("disabled", !$this.prop('checked'));

        $("tbody").find("input[type='checkbox']").each(function(){
             
            if($this.prop('checked'))
            {
                tmp.push($(this).val());
              $(this).prop('checked', true);
              $(this).parent().parent().addClass('yellow');
            }
            else
            {
                $(this).prop('checked', false);
                 $(this).parent().parent().removeClass('yellow');
            }
        });
    });

</script>
        <script type="text/javascript">
    jQuery(document).ready(function() {
        var link_id = 'manage_upload_customers';
       // App.side_Menu(link_id);
    });


    function get_customer_by_id(id){
        $("#mod_title").text("Edit Customer");
        document.querySelector("#add_vendor_form").reset();
        $("#responsive").modal();
        var url = "<?php echo base_url(); ?>"+"Customer/get_customer_by_id";
        $fields = {'customer_id':id};
        $.post(url, $fields, function(response){
            if(response.success) {
                console.log(response);
                var vendor = response.customer[0];
                console.log('xyzgdfhd');
                
                $("#name").val(vendor.full_name);
                $("#email").val(vendor.email);
                $("#phone").val(vendor.phone);
                $("#address").val(vendor.address);
                  $("#s_pass").val(vendor.Password_partner);
                $("#customer_id").val(vendor.id);
              
            }
        },'json');
    }
$("#email").change(function(e){
    var email = $(this).val();
    console.log("Called email fun");
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('Vendor/check_email_validation') ?>",
        data:{email:email,role_type_id:4},
        success:function(response){
            console.log("response:"+response);
            if (response == "already available") {
                $("#mailcheckmsg").text("Email ("+email+") Already exist");
                $("#email").val("");
            }else{
                $("#mailcheckmsg").text("");
            }

        }
    });
});

 function gen_password()
{
    $("input[name='s_pass']").val(Math.random().toString(36).slice(-8));
}
 // Validate Phone //
        $(function () {
                $('#phone').keyup(function (e) {
                    var key = e.charCode || e.keyCode || 0;
                    $text = $(this);
                     var alphaExp = /^[0-9]+$/;
                     var x=$text.val();
                     
                     if (x.match(alphaExp)) {
                         $('#phone').val() =x ;
                         $('#phone').css("border", "1px solid green");
                           
                          
                         
                     }else{
                         $('#phone').val('');
                         $('#phone').css("border", "1px solid red");
                         $('#phone').attr("placeholder", "Only Numbers Allowed!");
                     }
                     
                     
                })
        });
        
        function check_phn(){
            var check_phn_leng = $('#phone').val();
            console.log(check_phn_leng);
            if(check_phn_leng.length > 5){
                $('#phone').css("border", "1px solid ");
                $('#phone').val() =check_phn_leng;
                
            }else{
                $('#phone').val('');
                 $('#phone').css("border", "1px solid red");
                 $('#phone').attr("placeholder", "Invalid!");
            }
        }
        
        // ...................//
</script>

<!--shan-->
       <?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>
    </body>
</html>