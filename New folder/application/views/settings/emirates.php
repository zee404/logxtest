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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
            .yellow {
          background-color: lightblue;
        }
            .columns {
            float: right!important;
            display: none;
        }
         td, th {
                 border: 1px solid #dddddd;
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

        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-top: -32px;
        }
        .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

        }
        </style>
<style type="text/css">
   

form {
    margin-top: 0px;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #00b6eb;
    border-color: #7e57c2;
}

select {
  width: 900px;
}
.chosen-container-multi .chosen-choices {
    width: 274px !important;
}
.chosen-container{
  width: 100% !important;
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Emirates</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Emirates</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="height: 50px !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    <div class="col-lg-3">
                         <div class="page-title-box">
                            
                            <h4 class="page-title" style="margin-top: -36px;">Manage your Emirates</h4>

                        </div>

                    </div>
                     <div class="col-lg-2"></div>
                     <div class="col-lg-5"></div>
                     <div class="col-lg-2">
             
                    <div id="" class="" >
                            <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;margin-top: -15px;border-color: white;">Add New &nbsp;<i class="icon-plus"></i></button>
                            </a>
                    </div>
                     </div>
                 
                   
                </div>   
                            
                               <!-- <div class="col-md-4">
                                 <h3>Bags Tracking</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?= date('d-m-Y'); ?>">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" value="<?= date('d-m-Y'); ?>"class="form-control" name="to" id="to_date">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                       
                          </div> 
                               <div class="card-box">  
                            
                            <table class="example" data-toggle="table"
                                  >

                                <thead class="thead-light">

                                <tr>
                                    
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th data-field="name" data-sortable="true">Emirate</th>
                                    
                                    <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Status</th>
                                    <th data-field="slots"  data-sortable="true" >TimeSlots</th>
                                    
                                    <th data-field="" data-align="center" data-sortable="true" data-formatter="">Action</th>
                                     
                                    

                                </tr>
                                </thead>

                                <tbody>
                                        <?php if(!empty($emi_with_time)){ foreach ($emi_with_time as $key => $emirate) {?>
                                        <tr>
                                         
                                        <td ><?php echo $key+1;?></td>
                                        <td ><?php echo $emirate->emirate_name;?></td>
                                             <td>
                                            <?php if($emirate->status == 1 ){ ?>
                                            <a style="text-decoration: none" href="#"  pk="<?= $emirate->id; ?>" flag="suspended"><span class="label label-sm label-success">Active</span></a>
                                            <?php }else{ ?>
                                            <a style="text-decoration: none"  href="#" pk="<?= $emirate->id; ?>" flag="active" ><span class="label label-sm label-warning">Suspended</span></a>
                                            <?php } ?>
                                            </td>
                                            <td><?php echo $emirate->basic_time_name ?></td>
                                            <td> 
                                                 <a style="color: #0090b8" title="Edit" data-toggle="modal" onclick="javascript:show_model(this)" href="#responsive" flag="edit" pk="<?php echo $emirate->id?>">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>

                                                <a style="color: #0090b8" title="Delete" class="del_type" href="javascript:void(0)" data-id="<?php echo $emirate->id ?>"><i class="mdi mdi-delete"></i></a>

                                               
                                            </td>
                                           
                                        </tr>
                                     <?php } } ?>

                               
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

  
                 <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" style="width: 300px">
                    <div class="modal-content" style="width: 380px;">
                        <div class="modal-header"style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add Emirate</h4>
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class=" portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="add_emirate_form" action="#" method="post" class="horizontal-form" >
                                    <input type="hidden" name="emirate_id" value="" id="emirate_id" class="form-control">

                                    <div class="row">

                                        <div class="col-sm-10">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Name <span class="required">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                        <div class="form-group input-group-sm">
                                            <div id="output"></div>
                                            <label class="control-label">Select Time Slot<span class="required">*</span></label>
                                            <select data-placeholder="Choose multiple time slots ..." name="tags[]" multiple="" class="chosen-select" id="module" required style="display:none" >
                                               <?php foreach ($timeslot as $key => $type) {?>
                                                  <?php if($type->status == 1 ){ ?>
                                                <option value="<?php echo $type->basic_time_id; ?>" ><?php echo $type->name;?></option>
                                                 <?php } ?>
                                             <?php } ?>
                                              
                                            </select>
                                            <span id="msgmod" style="color: red;"></span>
                                        </div>
                                    
                                          </div>
                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="save_emirate_btn" onclick="save_emirate()" type="button" class="btn green"style="background: black;color: white;">Save</button>
                            <button id="edit_emirate_btn" onclick="update_emirate()" type="button" class="btn green"style="background: black;color: white;">Update</button>
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
        <script src="<?php echo base_url('assets/plugins/jquery-1.10.2.min.js');?>"></script>

<!--shan-->
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
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>
         <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <!-- App js-->
<!--         <script src="<?php echo base_url('assets/plugins/jquery-1.10.2.min.js');?>"></script> -->
         
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
       
        <script type="text/javascript">
          document.getElementById('output').innerHTML = location.search;
            $(".chosen-select").chosen();
        </script>

       
        <script type="text/javascript">
        
           $(document).ready(function () {

            if(document.location.href.indexOf("del=done") != -1)
            {
                swal("Successfully Deleted", "", "success");
            }

            $(".del_type").click(function(e){
                aid = $(this).attr("data-id");
                swal({
                    title: "Are you sure? This Will Effect Areas,Drivers And Partners!",
                    text: "Releated areas, drivers-schedule and partners qoutaions also be delete by delete emirate!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(
                        function(isConfirm){
                 if ('value' in isConfirm){
                            swal({
                            title: "Are you sure?",
                            text: "You Will Not be Able to Recover This!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes, I am sure!',
                            cancelButtonText: "No, cancel it!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }).then(
                             //This is final action
                            function(isConfirm){
                                if ('value' in isConfirm){
                                window.location = "<?php echo base_url('settings/delete_emirate') ?>/"+aid;
                                } else {
                                console.log('canceeled');
                                e.preventDefault();
                            }
                          }); 
                 }else{
                     console.log('canceeled');
                                e.preventDefault();
                 }
                            
                        });
                  
                }); //top
            // });

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
    jQuery(document).ready(function() {
        var link_id = 'manage_upload_customers';
       // App.side_Menu(link_id);
    });

</script>
<script type="text/javascript">

 function show_model(ele){
         
        hide_error();
        var flag = $(ele).attr('flag');
        //reset form values
        $('#add_emirate_form')[0].reset();
        //console.log($('#add_emirate_form')[1]);
         
        
        if(flag == 'add'){
            //changed model title
           
            $("#mod_title").html('Add Emirate');
            //change model button
            $("#edit_emirate_btn").hide();
            // $("option:selected").removeAttr("selected");
            // $('#module').prop('selectedIndex', '-1');
            $("#save_emirate_btn").show();
        }

        if(flag == 'edit'){
            //changed model title
            $("#mod_title").html('Edit Emirate');
            //change model button
            $("#edit_emirate_btn").show();
            $("#save_emirate_btn").hide();
            var emirate_id = $(ele).attr('pk');
            $("option:selected").removeAttr("selected");
            get_emirate_by_id(emirate_id);

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

    //UPDATE Driver METHODS
    function get_emirate_by_id(id){
        
        
        hide_error();
        var url = "<?php echo base_url(); ?>"+"settings/get_emirate_by_id";
        $fields = {'emirate_id':id};
        $.post(url, $fields, function(response){
            if(response.success){
                var emirate = response.detail[0];
                console.log(emirate);
                $("#name").val(emirate.emirate_name);
                $("#emirate_id").val(emirate.id);
                
                 var selectedslots = emirate.basic_time_id ? emirate.basic_time_id.split(',') : [];
                 selectedslots.forEach(function(mod){
                 $("#module option[value='"+mod+"']").attr("selected", "selected");
                 console.log('hey abcd:'+mod);
                 });
                 $("#module").trigger("chosen:updated");
               
                // $("#type_status").val(type.status);
            }
        },'json');
    }

    function update_emirate(){
        hide_error();

        var name = $("#name").val();
         var timeslots=$("#module").val();
        // var status = $("#type_status").val();
        var emirate_id = $("#emirate_id").val();

        var url = "<?php echo base_url(); ?>"+"settings/update_emirate";
        console.log("NAME:"+name + "ID:"+emirate_id);
        if(name && emirate_id && timeslots!=0){
            $fields = {'name':name, 'emirate_id':emirate_id, 'timeslots':timeslots};
            $.post(url, $fields, function(response){
                if(response.success){
                    var msg = '<strong>Success!</strong> Emirate updated.';
                    show_msg(msg, 'alert-success');
                    location.reload();
                    // window.location = "<?php //echo base_url('type') ?>";
                }else{
                    show_msg('<strong>Error!</strong> Not Saved try latter.', 'alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Emirate not given.';
            show_msg(error, 'alert-danger');
        }

    }

    //SAVE vendor METHODS
    function save_emirate(){
        hide_error();

        var emirate_name = $("#name").val();
        var timeslots=$("#module").val();
        var url = "<?php echo base_url(); ?>"+"settings/save_emirate";

        if(emirate_name && timeslots!=0){
            $fields = {'emirate_name':emirate_name, 'timeslots':timeslots};
            $.post(url, $fields, function(response){
                if(response.success){
                    Swal.fire({position:"center",
                    type:"success",
                    title:"Emirate has saved with time slot and applied to all relevent areas.",
                    showConfirmButton:!1,
                    timer:8500});
                    //  swal("Emirate has saved with time slot and applied to all relevent areas.", "", "success").then(
                    //      location.reload(true);
                    //      );

                     location.reload(true);
                    // var msg = '<strong>Success!</strong> Emirate has saved.';
                    // show_msg(msg, 'alert-success');
                    // location.reload();
                }else{
                    show_msg('<strong>Error!</strong> Not Saved try latter.', 'alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Emirate not given.';
            show_msg(error, 'alert-danger');
        }

    }


   </script>
       
    </body>
</html>