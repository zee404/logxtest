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
       <link href="fSelect.css" rel="stylesheet">
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Partner </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Partner List</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title"> Partner List</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                         
                              <!-- <a href="#custom-modal" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a" id=""><i class="mdi mdi-plus-circle mr-1"></i> Add New Partner</a> -->

                               <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Add New Employee &nbsp;<i class="icon-plus"></i></button>
                            </a>
                            
                          <br><br>
                            <table id="demo-custom-toolbar" class="example" data-toggle="table"
                                   data-toolbar="#demo-delete-row"
                                    data-search="true"
                                   data-show-refresh="true"
                                   data-show-columns="true"
                                    data-page-list="[5, 10, 20]"
                                   data-page-size="5"
                                   data-pagination="true" data-show-pagination-switch="true" class="table-borderless">
                                   
                                <thead class="thead-light">

                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th data-field="name" data-sortable="true">Full Name</th>
                                    <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Phone</th>
                                    <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Email</th>
                                    <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Role</th>
                                    <th data-field="m" data-align="center" data-sortable="true" data-formatter="statusFormatter">Modules</th>
                                    <th data-field="p" data-align="center" data-sortable="true" data-formatter="statusFormatter">Password</th>
                                     <th data-field="Action" data-align="center" data-sortable="true" data-formatter="">Action</th>
                                    

                                </tr>
                                </thead>

                                <tbody>
                               
                               
                                        <tr>
                                            <td></td>
                                            <td >1</td>
                                            <td >usman</td>
                                            <td >7-65656898956</td>
                                            <td >usman@gmail.com</td>
                                            <td >Dashboard</td>
                                            <td style="color: #72747b">johartown</td>
                                            <td style="color: #72747b">123456</td>
                                             <td>
                                           
                                           <!--  <a href="javascript:void(0);" class="action-icon"> <i class="fe-map-pin"></i></a> -->
                                              
                                                 <a title="Edit" class="" data-toggle="modal" onclick="javascript:show_model(this)" href="#responsive" flag="edit" data-id="2">
                                                    <i class="fe-edit"></i>
                                                </a>


                                                  <a href="javascript:void(0);"  id="abc" class="action-icon"> <i class="fe-delete"></i></a>


                                        </td>

                                            
                                           </tr>


                               
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
                    <div class="modal-content" style="width: 150% !important;">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title " id="mod_title" style="color: white;">Add New Employee</h4>
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                           <div class="row">
                                
                                <div class="col-md-12">
                                    <form method="POST" action="<?php echo base_url('staff/add') ?>" id="emp_form">
                                        <div class="row">
                                            <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="s_name" required>
                                        </div></div>
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>username</label>
                                            <input type="text" class="form-control" name="s_username" required>
                                        </div></div>
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="s_email" required>
                                        </div></div>
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="s_phone" required>
                                        </div></div>
                                        <!-- <div class="col-sm-6">-->
                                        <!--<div class="form-group">-->
                                        <!--    <label>Password</label>-->
                                        <!--    <input type="text" class="form-control" name="s_pass" required>-->
                                        <!--</div></div>-->
                                         <div class="col-sm-6">
                                        <div class="input-group" style="margin-top:22px;">
                                            <input type="text" name="s_pass" class="form-control" required>
                                        <span class="input-group-btn">
                                        <button style="color: #727247" class="btn btn-default" type="button" onclick="gen_password()"><span class="glyphicon glyphicon-lock" aria-hidden="true">
                                        </span> Generate Password</button>
                                        </span>
                                        </div>
                                        </div>
                                      
                                        <!--<div class="form-group">-->
                                        <!--    <label>Password</label>-->
                                        <!--    <input type="password" class="form-control" name="s_pass">-->
                                        <!--</div>-->
                                      <!--   <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="text" name="s_pass" class="form-control" required>
                                        <span class="input-group-btn">
                                        <button style="color: #727247" class="btn btn-default" type="button" onclick="gen_password()"><span class="glyphicon glyphicon-lock" aria-hidden="true">
                                        </span> Generate Password</button>
                                        </span>
                                        </div>
                                        </div> -->
                                        <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                           
                                            <input type="text" name="role_name"class="form-control" id="role_name">
                                        </div></div>
                                      
                                         <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Module</label>
                                            <select multiple class="form-control" required="required" name="modules" id="modules_partner">
                                               <option>Dashboard</option>
                                                <option>Vendors</option>
                                                <option>Store Keepers</option>
                                                <option>Drivers</option>
                                                <option>Customers</option>
                                                <option>Deliveries</option>
                                                <option>QR Codes</option>
                                                <option>Bags Tracking</option>
                                                <option>Bags Collection</option>
                                                <option>Reports</option>
                                                <option>Extra Bags</option>
                                                <option>Settings</option>
                                                <option>Employees</option>
                                                <option>Chat</option>
                                                <option>Chat History</option>
                                            </select>
                                            <input type="hidden" name="role_name" id="role_name">
                                        </div></div>
                                        <div class="col-sm-12">
                                            <div class="form-group" style="">
                                        <button type="submit" class="pull-left btn btn-success" style="margin-top: 24px; margin-left: 0%">SAVE</button></div></div>
                                    </form>
                                </div>


                            </div>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>

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
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
    <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="fSelect.js"></script>
        <script type="text/javascript">
        
           $(document).ready(function () {
              $('#abc').on('click', function () {
               swal("Delete", "Successfully Delete", "success");
              });

         
                $('.example').DataTable( {
                    dom: 'Brtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                });
        </script>
     <script type="text/javascript">
var allEmps = JSON.parse('<?php echo json_encode($emps) ?>');
var $selectedUser = 0;
var updateEle = null;
    jQuery(document).ready(function() {
        $(".delEmp").click(function(e){
            e.preventDefault();
            var ele = $(this);
            var eid = $(this).attr("data-id");
            console.log(eid);
            $.ajax({
                url: '<?php echo base_url("staff/del") ?>',
                method: 'post',
                data: {'user-id': eid},
                success: function(res){
                    ele.parent().parent().remove();
                },
                error: function(){
                    console.log('emp deletion error');
                }
            });
        });
        
        var link_id = 'show_staff';
        App.side_Menu(link_id);

        if($("#total_rec").val() > 0){
            init_table();
        }
    });

    //GENERAL METHODS
    function update_emp()
    {
        $name = $("#name").val();
        $phone = $("#phone").val();
        $email = $("#email").val();
        $role_id = $("#roles").val();
        
        if($name && $phone && $email && $role_id && $selectedUser != 0)
        {
            $.ajax({
                url: '<?php echo base_url("staff/update") ?>',
                method: 'post',
                data: {'full_name': $name, 'phone': $phone, 'email': $email, 'role_id': $role_id, 'user_id': $selectedUser},
                success: function(res){
                    if(res == 'done')
                    {
                        $(updateEle).parent().parent().find("td:eq(1)").text($("#name").val());
                        $(updateEle).parent().parent().find("td:eq(2)").text($("#phone").val());
                        $(updateEle).parent().parent().find("td:eq(3)").text($("#email").val());
                        $(updateEle).parent().parent().find("td:eq(4)").text($("#roles option:selected").text());
                        $("#responsive").modal('hide');
                    }
                }
            });
        }
        else
        {
            console.log('invalid input');
        }
        
    }
    
   

    function show_model(ele){
        hide_error();
        var flag = $(ele).attr('flag');
        //reset form values
        $('#add_driver_form')[0].reset();

        if(flag == 'edit'){
            //changed model title
            $("#mod_title").html('Edit Employee');
            //change model button
            $("#edit_driver_btn").show();
            $("#save_driver_btn").hide();
            var emp_id = $selectedUser = $(ele).attr('data-id');
            get_emp_by_id(emp_id);
            updateEle = ele;

        }

    }
    
    function get_emp_by_id($id)
    {
        var emp = allEmps.filter(emp => emp.id == $id);
        //return emp;
        if(emp && emp.length > 0){
            $("#phone").val(emp[0].phone);
            $("#name").val(emp[0].full_name);
            $("#email").val(emp[0].email);
            $("#roles option[value='"+emp[0].role_id+"']").attr("selected", "selected");
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

</script>
<script type="text/javascript">
var status = false;
function gen_password()
{
    $("input[name='s_pass']").val(Math.random().toString(36).slice(-8));
}
    jQuery(document).ready(function() {
        
        $("#emp_form").submit(function(e){
            
            if(!status)
            {
                alert('Email Already in Use');
                e.preventDefault();
                return;
            }
            else if(status && $("#modules").val().length > 0){
                if(!confirm("Are You Sure ?"))
                {
                    e.preventDefault();
                    return;
                }
                
            }
            else
            {
                alert('Please Select Modules');
            }
        });
        
        //check if email is already in use or not
        $("input[name='s_email']").blur(function(){
            var $email = $(this).val();
            if($email && $email.length > 0)
            {
                $.ajax({
                    url: '<?php echo base_url("staff/check_email") ?>',
                    type: 'post',
                    data: {'email': $email},
                    success: function(res){
                             console.log(res);
                             res = JSON.parse(res);
                             if(res.status == 'success')
                             {
                                 status = true;
                                 $("input[name='s_email']").css({'color': 'green'});
                             }
                             else
                             {
                                 
                                 status = false;
                                 $("input[name='s_email']").css({'color': 'red'});
                                 alert($email+' is already in use. Please Change');
                             }
                    },
                    error: function(){
                        console.log('Network Error while validating email');
                    }
                });
            }
        });
        
        $(".form_submt").submit(function(e){
            if($("select").val())
            {
                
            }
            else
                e.preventDefault();
        });
        
        $("select[name='s_role']").change(function(){
            var tex = $("select[name='s_role'] option:selected").text();
            $("#role_name").val(tex);
            console.log(tex);
        });
        
        $("#modules").show().multiselect({includeSelectAllOption: true, nonSelectedText: 'Select Modules', buttonWidth: '200px', selectAllValue: '-1',
            allSelectedText: 'All Modules',
            enableFiltering: true,
            onChange: function(option, checked){
                
            },
            onSelectAll: function(){
                
            },
            onInitialized: function(select, container) {
                    //$(select).multiselect('selectAll', true);
                }
        })
        
        var link_id = 'add_staff';
        App.side_Menu(link_id);
    });

</script>
      
   
      
    </body>
</html>