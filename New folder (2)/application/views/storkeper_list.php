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
.chosen-container-multi .chosen-choices {
    width: 273px !important;
    height: auto !important;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Team </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Indoor Team</a></li>
                                  
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
               
                            <h4 class="page-title">Indoor Team List</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        
                              <!-- <a href="#custom-modal" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a" id=""><i class="mdi mdi-plus-circle mr-1"></i> Add New Partner</a> -->

                              <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Add New Member &nbsp;<i class="icon-plus"></i></button>
                            </a>
                          <!--    <input type="file" name="userfile"class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="" data-overlaycolor="#38414a" style="width: 250px;height: 35px;margin-left: 597px;">
                              
                          
                               <a href="#custom-modals" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i>CSV Tips</a> -->
                                
                                   <br>
                                   <button style="margin-left: 170px;margin-top: -57px;color: #fff;background-color: #197990 !important;border-color: white;" class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" id="button" aria-controls="demo-custom-toolbar" type="button" disabled><span>Delete</span></button>

                                    <br>
                            
                            
                            <table  class=" example table table-responsive">

                                <thead class="thead-light">

                                <tr>
                                      <th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" ></th>
                                   
                                    <th>SR No</th>
                                    <th >Full Name</th>
                                    <th >Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Modules</th>
                                    <th>Role</th>
                                    <th >Password</th>
                                    <th >Status</th>
                                    <th >Action</th>
                                    

                                </tr>
                                </thead>

                                <tbody>
                                 <?php  foreach ($vendors as $key => $vendor) {?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" value="<?php echo $vendor->id;?>" / id="" /  name="checkbox"></td>
                                             <td ><?php echo $key+1;?></td>
                                            <td ><?php echo $vendor->full_name;?></td>
                                            <td ><?php echo $vendor->phone;?></td>
                                            <td ><?php echo $vendor->email;?></td>
                                            <td><?php echo $vendor->address;?></td>
                                            <td><?php echo $vendor->modules;?></td>
                                            <td><?php echo $vendor->name;?></td>
                                            <td><?php echo $vendor->Password_partner;?></td>
                                            <td><?php echo !empty($vendor->login_date) ? 'active' : 'inactive' ?></td>
                                          
                                            <td>
                                           <a class="" title="Edit" data-toggle="modal" onclick="javascript:show_model(this)" href="#responsive" flag="edit"  pk="<?php echo $vendor->id?>">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                          <!--   <a href="javascript:void(0);" class="action-icon"> <i class="fe-delete"></i></a>
                                                -->
                                            </td>
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
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add New Member</h4>
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                               <form id="add_vendor_form" action="<?php echo base_url('vendor/save_keeper') ?>" method="post" class="horizontal-form" >
                                    <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">


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
                                                <input type="text" name="phone" placeholder="971-123456789" id="phone" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Address</label>
                                                <input type="text" name="address" id="address" class="form-control" required>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                          
                                        <div id="output"></div>
                                         <label class="control-label">Select Module</label>
                                          <select data-placeholder="Choose tags ..." name="tags[]" multiple class="chosen-select" id="module" required>
                                            <option value="Dashboards">Dashboards</option>
                                            <option value="Partners">Partners</option>
                                            <option value="Team">Team</option>
                                            <option value="oprations">Operations</option>
                                            <option value="Reports">Reports</option>
                                            <option value="Setting">Setting</option>
                                            <option value="Vendors_Reports">Vendors Reports</option>
                                            <option value="Accounts">Accounts</option>
                                          </select>
                                         <span id="msgmod" style="color: red;"></span>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <label>Select Role</label>
                                        <select class="form-control" name="role_name" id="role" required>
                                        <option value="">Select Role</option>
                                        <?php foreach ($types as  $der) {?>
                                            <option value="<?= $der->id; ?>" ><?= $der->name; ?></option>
                                        <?php } ?>
                                    </select>
                                        </div>
                                         <div class="col-sm-8">
                                        <div class="input-group" style="margin-top: 22px;">
                                            <input type="text" name="s_pass" placeholder="Password Here" class="form-control"  id="s_pass">&nbsp;&nbsp;&nbsp;<span class="input-group-btn" required >
                                        <button style="color:white;background-color: black;" class="btn btn-default" type="button" onclick="gen_password()"><span class="glyphicon glyphicon-lock" aria-hidden="true">  </span> Generate</button>
                                        </span>
                                        </div>
                                        </div>
                                        </div>


                               
                            </div>

                        </div>

                        <div class="modal-footer">
                             <button id="save_vendor_btn" type="submit" style="background: black;color: white;" class="btn green">Save</button>
                             <button id="edit_vendor_btn" style="display: none" onclick="update_vendor()" type="button" class="btn green updatebtn" style="background: black;color: white;">Update</button>
                            <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>

                           
                        </div>
                         </form>
                    </div>
                </div>
            </div>
      
        <!-- end wrapper -->
 <!--   <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.modal.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="custom-modal-title" id="mod_title">Add New Partner</h4>
                    <div class="custom-modal-text text-left">
                       <form  id="add_vendor_form" action="#" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="position">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
                            </div>
                            <div class="form-group">
                                <label for="category">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Location">
                            </div>
        
                            <div class="text-right">
                                <button  onclick="save_vendor()" type="button"  class="btn btn-success waves-effect waves-light">Save</button>
                               
                            </div>
                        </form>
                    </div>
                </div> --> 
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
<!--shan-->
        <!-- Vendor js -->
         <script src="<?php echo base_url('assets/plugins/jquery-1.10.2.min.js');?>"></script>
         <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
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
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script type="text/javascript">
          document.getElementById('output').innerHTML = location.search;
            $(".chosen-select").chosen();
        </script>
        <script type="text/javascript">
        
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
            url:'<?php echo base_url("Vendor/del_team") ?>',
            method:'post',
            data:{ids: tmp.join()},
            success:function(res)
            {
               swal.fire("Deleted", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
            },
            error:function(err)
            {
                console.log('not Delete');
            }
        });
}


</script>
<script type="text/javascript">
    function gen_password()
{
    $("input[name='s_pass']").val(Math.random().toString(36).slice(-8));
}
    
    function show_model(ele){
        hide_error();
        var flag = $(ele).attr('flag');
        //reset form values
        $('#add_vendor_form')[0].reset();
        $("#email").prop("readonly", false);
        $("#phone").prop("readonly", false);

        if(flag == 'add'){
            //changed model title
            $("#mod_title").html('Add New Team');
            //change model button
            $("#edit_vendor_btn").hide();
            $("#save_vendor_btn").show();
        }

        if(flag == 'edit'){
            //changed model title
            $("#mod_title").html('Edit Team');
            //change model button
            $("#edit_vendor_btn").show();
            $("#save_vendor_btn").hide();
            var vendor_id = $(ele).attr('pk');
        //    $("#email").prop("readonly", true);
         //   $("#phone").prop("readonly", true);
            get_vendor_by_id(vendor_id);

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

    //UPDATE vendor METHODS
    function get_vendor_by_id(id){
        hide_error();

        var url = "<?php echo base_url(); ?>"+"vendor/get_team_by_id";
        $fields = {'vendor_id':id};
        $.post(url, $fields, function(response){
            if(response.success) {
                var vendor = response.vendor[0];
                $("#name").val(vendor.full_name);
                $("#email").val(vendor.email);
                   oldEmail = vendor.email;
                $("#phone").val(vendor.phone);
                $("#address").val(vendor.address);
                $("#s_pass").val(vendor.Password_partner);
                $("#role").val(vendor.role_type_id);

                   var selectedMods = vendor.modules ? vendor.modules.split(',') : [];
                selectedMods.forEach(function(mod){
                    $("#module option[value='"+mod+"']").attr("selected", "selected");
                });

                $("#module").trigger("chosen:updated");
                
                $("#vendor_id").val(vendor.id);
            }
        },'json');
    }

    function update_vendor(){
        hide_error();

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var Password_partner=$("#s_pass").val();
        
        var modules=$("#module").val();
        if (modules == '') 
            modules = 'Not Assignd';
        else
            modules = modules.join(',');

        console.log(modules);
        var roles=$("#role").val();

        var vendor_id = $("#vendor_id").val();

        var url = "<?php echo base_url(); ?>"+"vendor/update_team";

        if(email && vendor_id){
            $fields = {'name':name, 'email': email, 'address':address,'old_email':oldEmail, 'vendor_id':vendor_id, 'phone':phone,'Password_partner':Password_partner,'modules':modules,'roles':roles};
            $.post(url, $fields, function(response){
                if(response.success){
                    var msg = '<strong>Success!</strong> Vendor updated.';
                    show_msg(msg, 'alert-success');
                    location.reload();
                }else{
                    show_msg('<strong>Error!</strong>Not Saved try latter Information Duplicate.', 'alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Vendor not given.';
            show_msg(error, 'alert-danger');
        }

    }

    function update_vendor_status(ele){
        hide_error();
         var status = $(ele).attr('status');
      var st = "";
      if(status==0){
        alert("You are going to suspend..");
      }else{
        alert("You are going to activate..");
      }

if (window.confirm('Are you sure to continue?'))
{
     var status = $(ele).attr('status');
        var vendor_id = $(ele).attr("vendor_id");

        var url = "<?php echo base_url(); ?>"+"vendor/update_vendor_status";

        if(status && vendor_id){
            $fields = {'status':status, 'vendor_id':vendor_id};
            $.post(url, $fields, function(response){
                if(response.success){
                    var msg = '<strong>Success!</strong> Vendor updated.';
                    show_msg(msg, 'alert-success');
                    location.reload();
                }else{
                    show_msg('<strong>Error!</strong> Not Saved try latter.', 'alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Vendor not given.';
            show_msg(error, 'alert-danger');
        }

}
else
{
    // They clicked no
}
       
    }


    //SAVE vendor METHODS
    function save_vendor(){
        hide_error();

        //var num_regex = /^\$?[0-9]+(\.[0-9][0-9])?$/;
        var num_regex = /^([0-9]{3})\-\$?[0-9]+(\.[0-9][0-9])?$/;
        var name = $("#name").val().trim();
        var email = $("#email").val().trim();
        var phone = $("#phone").val();
        var address = $("#address").val().trim();

        var url = "<?php echo base_url(); ?>"+"vendor/save_vendor";

        if (phone == ''){
            var error = '<strong>Error!</strong> Please Enter Phone number';
            show_msg(error, 'alert-danger');
            return false;
        }


        if (!phone.match(num_regex)){
            var error = '<strong>Error!</strong> Please Enter Valid Phone number';
            show_msg(error, 'alert-danger');
            return false;
        }

        if(email && phone){
            $fields = {'name':name, 'email': email, 'phone':phone, 'address':address};
            $.post(url, $fields, function(response){
                if(response.success){
                    var msg = '<strong>Success!</strong> Vendor has saved.';
                    show_msg(msg, 'alert-success');
                    location.reload();
                }else{
                    show_msg('<strong>Error!</strong> Email already exist.', 'alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Vendor not given.';
            show_msg(error, 'alert-danger');
        }

    }

    $(document).on('change', '.checkAll', function(){
       tmp = [];
       $this = $(this);
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
$("#email").change(function(e){
    var email = $(this).val();
    console.log("Called email fun");
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('Vendor/check_email_validation') ?>",
        data:{email:email,role_type_id:15},
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

$("#save_vendor_btn").click(function(e){
    var md = $("#module").val();
    if (md.length <= 0) {
        $("#msgmod").text("Please select at least one option");
    }else{
        $("#msgmod").text("");
    }
});
</script>
<!--shan-->
<?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>
    </body>
</html>