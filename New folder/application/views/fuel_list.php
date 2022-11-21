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
        
         <script src="<?php echo base_url()?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
       
        
        <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />

        
    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header');?>        <!-- End Navigation Bar-->
       
   

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div id="print_box" class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                         <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Accounts </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Fuel</a></li>
                                    
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Fuel List</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                           
                            <div class="row">
                     
                    
                     <div class="col-lg-6">
                           
                            <div class="page-title-right">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary border-primary ">
                                                    From:<!-- <i class="mdi mdi-calendar-range font-13"></i> -->
                                                </span>
                                            </div>
                                            <input type="text" class="form-control shadow border-white" name="date" id="from_date" value="<?php echo $this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d') ?>">
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary border-primary ">
                                                    To:<!-- <i class="mdi mdi-calendar-range font-13"></i> -->
                                                </span>
                                            </div>
                                            <input type="text" class="form-control shadow border-white" name="date" id="to_date" value="<?php echo $this->uri->segment(4)?$this->uri->segment(4) : date('Y-m-d') ?>">
                                            
                                        </div>
                                    </div>
                                    
                                   <!--  <a href="javascript: void(0);" class="btn btn-primary btn-sm ml-2 font-14">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a> -->
                                   <!--  <a href="javascript: void(0);" class="btn btn-primary btn-sm ml-1 font-14">
                                        <i class="mdi mdi-filter-variant"></i>
                                    </a> -->
                                </form>
                            </div>
                            </div>
                    <div class="col-lg-6">
                          <div class="btn-group">
                               <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Get Report <i class="icon-plus"></i></button>
                        <!-- &nbsp &nbsp <button id="print"  onclick="PrintElem('print_box')" type="button" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Print Details</button>-->
                        &nbsp &nbsp
                              <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Add New Fuel </button>
                            </a>
                            &nbsp &nbsp
                            
                             <button style="color: #fff;background-color: #197990 !important;border-color: white;" class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" id="button" aria-controls="demo-custom-toolbar" disabled type="button"><span>Delete</span></button>

                    
                    </div>
                     </div>
                </div>   
                       
                                  
                                  
                                    <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <table  class="example table">

                                <thead class="thead-light">

                                <tr>
                                  <th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" ></th>
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th style="min-width: 200px" data-field="name" data-sortable="true">Title</th>
                                     <th data-field="" data-align="center" data-sortable="true" data-formatter="">Quantity(liter)</th>
                                    <th style="min-width: 200px" data-field="date" data-sortable="true" data-formatter="dateFormatter">Description</th>
                                    <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Date</th>
                                    
                                     <th data-field="l" data-align="center" data-sortable="true" data-formatter="">Added at</th>
                                    <th data-field="l" data-align="center" data-sortable="true" data-formatter="">Added by</th>
                                                
                                     <th data-field="Action" data-align="center" data-sortable="true" data-formatter="">Action</th>
                                    

                                </tr>
                                </thead>

                                <tbody>
                               <?php if(!empty($d['records'])){
                                $count=0; foreach ($d['records'] as $key => $data) {?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" value="<?php echo $data->id;?>" / id="" /  name="checkbox"></td>
                                            <td ><?php echo $key+1;?></td>
                                            <td ><?php echo $data->title;?></td>
                                            <td ><?php echo $data->amount;?></td>
                                            <td ><?php echo $data->description;?></td>
                                            <td ><?php echo $data->dated;?></td>
                                            
                                           
                                            
                                            
                                         
                                            <td ><?php echo $data->added_at;?></td>
                                            <td ><?php echo $data->added_by;?></td>
                                           
                                           
                                           <!--Action-->
                                            <td>
                                            <a class="" title="Edit" data-toggle="modal" onclick="javascript:show_model(this)" href="#responsive" flag="edit"  pk="<?php echo $data->id?>">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                                
                                            </td>
                                          <!--Action End-->
                                            
                                           </tr>
                                  <?php }} ?>

                               
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add New Fuel</h4>
                        </div>

                        <div class="modal-body">

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form name="form" id="add_vendor_form" action="<?php echo base_url('Driveryy/xx') ?>" method="post" class="horizontal-form" >
                                    <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">

                                     <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Title<span class="required">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Quantity (liters)<span style="color: red;">*</span></label>
                                                <input type="number" name="amount" id="amount" class="form-control" required>
                                            </div>
                                            <span id="amount_check_msg" style="color: red"></span>
                                        </div>
                                      </div>
                                              <div class="row">
                                               
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label">Date<span style="color: red;">*</span></label>
                                                        <input type="date" name="date" id="date" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                               
                                                
                                               
                                        <div class="col-md-8">
                                            <div class="form-group ">
                                                <label class="control-label">Description</label>
                                                <!--<input type="text" name="description" id="description" class="form-control" required>-->
                                                <textarea name="description" id="description" rows="5" class="form-control" style="width:100%;"></textarea>
                                            </div>
                                        </div>

                                
                     
                        
                         
                                        
                                       <!--Schedule Ends-->
                                  

                               
                            </div>

                        </div>

                        <div class="modal-footer">
                             <button id="save_vendor_btn" type="button" onclick="save_vendor()" style="background: black;color: white;" class="btn green">Save</button>
                             <button id="edit_vendor_btn" style="display: none; background: black;color: white;" onclick="update_vendor()" type="button" class="btn green updatebtn" style="background: black;color: white;">Update</button>
                            <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>

                           
                        </div>
                         </form>
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
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- shan -->
         <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--from below-->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
         
        <!-- Sweet alert init js-->
        <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>
           <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
         
         
       <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        
         
         
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
        
        // START SCHEDULE CODE
        // Again Enable select to get complete data of Schedule Drivers shift
            $('#add_vendor_form').submit(function() {
                $('select').removeAttr('disabled');
            });
      
	
  var tmp = [];
   $(document).ready(function () {

  
            <?php if (!empty($this->session->flashdata('error'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('error') ?>';
                swal(msgg, "", "error");
            <?php } ?>

            <?php if (!empty($this->session->flashdata('success'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('success') ?>';
                swal(msgg, "", "success");
            <?php } ?>

    $(document).on('change', "input[name='checkbox']", function() {
    var checked = $(this).val();
    if ($(this).is(':checked')) {
      tmp.push(checked);
    }else{
    tmp.splice($.inArray(checked, tmp),1);
    }

    $("#button").prop("disabled", tmp.length == 0);
  });

  $('#button').on('click', function () {
      
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it.'
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
            url:'<?php echo base_url("Driver/del_remove_fuel") ?>',
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
 $(document).on('change', '.checkAll', function(){
    tmp = [];
       $this = $(this);
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

        if(tmp.length > 0)
        {
            $("#button").prop("disabled", false);
        }
        else
            $("#button").prop("disabled", true);
    });

</script>
        <script type="text/javascript">
        
           $(document).ready(function () {
               
               
               
                $("#from_date").flatpickr({
           
            onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });
               
               
               
                     $('input[name="checkbox"]').on('change', function() {
  $(this).closest('tr').toggleClass('yellow', $(this).is(':checked'));
});
              $('#abc').on('click', function () {
               swal("Delete", "Successfully Deleted", "success");
              });

         
               $('.example').DataTable( {
                   "scrollX": true,
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
                
                
                function get_reports(e){
        e.target.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading';
        //e.target.disabled = true;
        // var vendor_id = $("select#vendor_list option:selected").val();
        $("#download_btn_container").hide();
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD');
        
       
        window.location.href = base_url+'driver/fuel_list/'+from_date+'/'+to_date;

    }
        </script>
       
<script type="text/javascript">

    
    license ='';
  
 
 function show_model(ele){
        hide_error();
        var flag = $(ele).attr('flag');
        //reset form values
        
     //  $('.del_when_open_new').remove();
        $('#add_vendor_form')[0].reset();
        

        if(flag == 'add'){
            //changed model title
            $("#mod_title").html('Add New Fuel');
            
            //change model button
            $("#edit_vendor_btn").hide();
            $("#save_vendor_btn").show();
        }

        if(flag == 'edit'){
            //changed model title
            $("#mod_title").html('Edit Fuel');
            //change model button
            $("#edit_vendor_btn").show();
            $("#save_vendor_btn").hide();
            var id = $(ele).attr('pk');
            
             var deliv_row_counter=0;

        
            get_by_id(id);

        }

    }

    function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
        $("#license_span").html('');
         $("#s_license_image").attr("src", "");
        hide_error();
        license='';
        $('#add_vendor_form')[0].reset();
        // location.reload();
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
    function get_by_id(id){
        hide_error();
        
         $('form')[0].reset();

        var url = "<?php echo base_url(); ?>"+"Driver/get_fuel_by_id";
        $fields = {'id':id};
        $.post(url, $fields, function(response){
            if(response.success) {
                var resp = response.res[0];
                $("#name").val(resp.title);
              $("#amount").val(resp.amount);
         $("#description").val(resp.description);
                $("#date").val(resp.dated);
           $("#vendor_id").val(resp.id);
                
                
               
             
                 //  //Schedule   
           
            }
        },'json');
    }

    function update_vendor(){
        hide_error();
        
        
        // var v_id=$("#vendor_id");
        var name = $("#name").val();
        var amount = $("#amount").val();
        var description= $("#description").val();
        var date = $("#date").val();
        var vendor_id = $("#vendor_id").val();
        
        
        if (name == ''){
            var error = '<strong>Error!</strong> Title is a required field.';
            show_msg(error, 'alert-danger');
            return false;
        }
        if (amount == '' || amount==0 || amount<0){
            var error = '<strong>Error!</strong> Please Enter Valid Quantity';
            show_msg(error, 'alert-danger');
            return false;
        }
        
        if (date == ''){
            var error = '<strong>Error!</strong> Please Enter Valid Date';
            show_msg(error, 'alert-danger');
            return false;
        }
     
     
    var valid_check=1;
    
    
       var formData = new FormData($('form')[1]);
           
        
       

       
        if(name && amount && date && vendor_id ){
           
        
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>"+"Driver/update_fuel",
            data:formData,
            processData: false,
            contentType: false,

            success: function (data) {
              console.log(data);
              var msg = '<strong>Success!</strong> Vendor updated.';
                    show_msg(msg, 'alert-success');
                    swal.fire("", "Data Updated Successfully", "success");
                    location.reload();
            }
          });
        
        }else{
            var error = '<strong>Error!</strong> Fill All Required(*) Fields.';
            show_msg(error, 'alert-danger');
            swal.fire("Error", "Fill All Required Fields(*)", "error");
        }
        
       


    }


    //SAVE vendor METHODS
    function save_vendor(){
        hide_error();
     console.log('hallo');
         var name = $("#name").val().trim();
        var amount = $("#amount").val();
        var description= $("#description").val().trim();
        var date = $("#date").val();
        var vendor_id = $("#vendor_id").val();
        
       
      

        var url = "<?php echo base_url(); ?>"+"Driver/save_fuel";


         if (name == ''){
            var error = '<strong>Error!</strong> Title is a required field.';
            show_msg(error, 'alert-danger');
            return false;
        }
        if (amount == '' || amount==0 || amount<0){
            var error = '<strong>Error!</strong> Please Enter Valid Quantity(liters)';
            show_msg(error, 'alert-danger');
            return false;
        }
        
        if (date == ''){
            var error = '<strong>Error!</strong> Please Enter Valid Date';
            show_msg(error, 'alert-danger');
            return false;
        }
        
      
        if( name && amount && date){
            $fields = {'name':name, 'amount': amount, 'description':description, 'date':date };
            $.post(url, $fields, function(response){
                console.log('i am respoooooooooooonnnnnnnnnnnnnnssssssssseeeeeeee');
                console.log(response);
                //response=JSON.parse(response);
                if(response.success){
                    console.log(response.success);
                    // var msg = '<strong>Success!</strong> Driver has saved.';
                    // show_msg(msg, 'alert-success');
                    swal.fire("Fuel has been Added Successfully.", "", "success");
                    location.reload();
                }else{
                    console.log('i am working')
                    show_msg('<strong>Error!</strong> Network Issue. Try again!', 'alert-danger');
                }
            },'json');
            //location.reload();
        }else{
            // var error = '<strong>Error!</strong> Fill All Required fields.';
            // show_msg(error, 'alert-danger');
             swal.fire("Error", "Fill All Required(*) fields", "error");
        }

    }

  



   
   

 

   
     function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('<link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" /><link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" /><link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" /><link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">        <link href="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" /><link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />          <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

setTimeout(function(){  
    mywindow.print();
    mywindow.close();
     }, 3000);
    

    return true;
}
    
     
     
    
</script>
<!--shan-->
<?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>
    </body>
</html>

<style type="text/css">
    .table {
        min-width: 100%;
    }
    .green{
        color:green;
    }
    .red{
        color:red;
    }
</style>