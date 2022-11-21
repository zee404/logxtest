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
                                     <li class="breadcrumb-item"><a href="javascript: void(0);">Oprations</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Deliveriess</a></li>
                                  
                                </ol>
                            </div>
                          <h4 class="page-title">Upload Deliveries via File OR via Formsssssss</h4>
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
                         
                    <div class="row Uploadbuttton">
                     
                     <div class="col-lg-1 Uploadbuttton">
                         <div class="page-title-box">
                         <label for="">Signature </label>
                       
                        </div>

                    </div>
                    <div class="col-lg-3 Uploadbuttton">
                         <div class="page-title-box">

                         <select id="signature" class="form-control" name="signature" required >
                            <option value="">Select</option>
                            <option value="Yes" >Yes</option>
                            <option value="No" >No</option>
                        </select>
                
                    </div>

                    </div>
                    
                      <div class="col-lg-4 Uploadbuttton">
                         <div style="width: 188px !important;" class="input-group input-medium_ date date-picker" data-date="<?php echo date('d-m-Y', strtotime("+1 day")); ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" name="pick_date" id="pick_date" class="form-control" value="<?php echo date('d-m-Y', strtotime("+1 day")); ?>" placeholder="<?php echo date('d-m-Y', strtotime("+1 day")); ?>" alt="Pick date" title="pick date">
                            <span class="input-group-btn">
                            <button title="delivery date" class="btn default" type="button"><i class="icon-calendar"></i></button>
                            </span>
                        </div>
                    </div>
                <div class="col-lg-2 Uploadbuttton" style="margin-left: -230px;">
                     <button type="button"  id="button" style="color: #fff;background-color: #197990 !important;border-color: white;" class="btn blue">Upload Deliveries</button>
                </div> 
                    
                    <div class="col-lg-2">
                         
                     </div>
              
                    
                </div> 
               
                </div>
                       
            </div>

                      

                <div class="row">
                    <div class="col-sm-12">
                    <div class="card-box" style="width: 175% !important;margin-left: 10px;">
                         
                    <div class="row">
                    <?php if($this->session->userdata('role_id') == 1){ ?>
                     <div class="col-md-3 form-group">
                       <select id="vendor_list" class="form-control" name="vendor_id" required>
                            <option value="">Select Partner</option>
                            <?php foreach ($vendors as $key => $ven) {?>
                                <option value="<?= $ven->id; ?>"><?= $ven->full_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php }
                else if($this->session->userdata('role_id') == 2){ ?>
                    <input type="hidden" name="vendor_id" id="vendor_list" value="<?php echo $this->session->userdata('u_id') ?>">
                <?php } ?>
                    <div class="col-md-2">
                        
                    
                         <input type="file" class="form-control" id="avatar"  name="userfile"class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="" data-overlaycolor="#38414a"  style="display:none;">
                        
                          <button type="button" class="btn btn-primary" id="imagebtn"style="color: #fff;background-color: #197990 !important;border-color: white;width: 141px;">Select File </button>
                          <span id="fileName"></span>
                          
                   

                    </div>
                    
                     <div class="col-md-4">
                       <a href="#custom-modals" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"  style="color: #fff;background-color: #197990 !important;border-color: white;margin-left: -49px;height: 36px;"><i class="mdi mdi-plus-circle mr-1"></i>CSV Tips</a>
                       <button id="openFormModal" class="btn btn-primary waves-effect waves-light" style="color: #fff;background-color: #197990 !important;">Upload Via Form</button>
                    </div>
                   
                    
              
                    
                </div> 
               
                </div>
                       
            </div>

             </div>             
                           
                    <div id="custom-modals" class="modal-demo" style="padding: 35px;">
                 
                                 <blockquote class="hero">
                                        <p> Click <a href="<?php echo base_url(); ?>download/DeliveriesCSVFormat.csv">HERE</a> to Download Deliveries CSV File Format!</p>
                                    </blockquote>
                                    <ul class="list-unstyled  margin-top-10 margin-bottom-10">
                                        <li><i class="icon-ok"></i> Customer Full Nameee ( Optional: Max. 90 characters )</li>
                                        <li><i class="icon-ok"></i> Customer Phone ( Required: Max. 12 characters with country code )</li>
                                        <li><i class="icon-ok"></i> Customer Email ( Optional )</li>
                                        <li><i class="icon-ok"></i> Villa address – Villa number, street name or number, Makani number, area and city ( Required )</li>
                                        <li><i class="icon-ok"></i> Apartment address – Apartment number, Building name, area and city </li>
                                    </ul> 
                </div> 
                   <div class="card-boxs" style="margin-left: 10px;">
                     <table class="table " style="margin-left: 10px;">

                                <thead class="" style="background-color: #f1f5f7;">

                                <tr>
                                    <th></th>
                                    <th>Phone</th>
                                    <th>Full Namee</th>
                                    <th>Address</th>
                                    <th>PickUp Point</th>
                                    <th>Delivery Time</th>
                                    <th>Note</th>
                                    <th>Action</th>
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

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
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

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script type="text/javascript">
            now_customers = [];
             $("#pick_date").flatpickr({
            defaultDate: new Date()
        });

         $(document).on('click', '.takeAction', function(e){
            thisData = JSON.parse($(this).parent().attr("data-err"));
            $("._oldCustomer input[name='full_name']").val(thisData ? thisData.full_name : '');
            $("._oldCustomer input[name='phone']").val(thisData ? thisData.phone : '');
            $("._oldCustomer textarea").val(thisData ? thisData.address : '');

            $("#compareModal").modal();

            //get new data of file
            _checkbox = $(this).parent().parent().find("input[type='checkbox']");
            $("._newCustomer input[name='full_name']").val(_checkbox.attr("data-name"));
            $("._newCustomer input[name='phone']").val(_checkbox.attr("data-phone"));
            $("._newCustomer textarea").val(_checkbox.attr("data-address"));
         });    
        $(".card-boxs").hide();
         $(".Uploadbuttton").hide();
           $(document).ready(function () {

            if(document.location.search.indexOf("saved=yes") > -1)
                swal("Uploaded", "Order Placed Successfully", "success");

            if(document.location.search.indexOf("done=no") > -1)
                swal("Not Uploaded", "Order Placing Failed", "error");

            $("#openFormModal").click(e =>{
                $("#delvModal").modal();
            });
              $('#checkboxes').on('click', function () {
               swal("Delete", "Successfully Delete", "success");
              });
              $("#imagebtn").click(function () {
                if(!$("#vendor_list").val())
                    {
                        swal("", "Select Vendor First", "error");
                        return;
                    }
                    else
                $("#avatar").click();
                });
                

                $("#vendor_list").change(function(){
                    if($(this).val())
                    {
                        $vid = $(this).val();
                        $.ajax({
                            'method': 'post',
                            url: '<?php echo base_url("order/get_vendor_customers") ?>',
                            data: {'vendor_id': $vid},
                            success: function(res){
                                res = JSON.parse(res);
                                now_customers = res.customers;

                            }
                        });
                    }
                });

                $("input[name='userfile']").change(function(e){
                    
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        console.log(reader.result);
                        $.csv.toArrays(reader.result, function(err, dt){
                            if(!err)
                            {
                                $("#vendor_list").prop("disabled", true);
                                if(dt && dt.length > 0)
                                {
                                    dt.forEach(function(newArr, i){
                                        if(i ==0 || !newArr[0] || !newArr[1] || !newArr[2] || !newArr[3]|| !newArr[4])
                                            return;
                                        fff = validate_customers(newArr);
                                        console.log(fff);
                                        let html = fff.length > 0 ? '<button class="btn btn-danger takeAction">Action</button>' : '<span class="text-success">OK</span>';
                                        console.log('html is ', html);
                                        $("#table_body").append(`<tr><td><input checked type="checkbox" class="checkboxes" name="checkbox" id="savebtn" data-name="${newArr[1]}" data-phone="${newArr[0]}" data-address="${newArr[2]}" data-pic="${newArr[3]}" data-delivery="${newArr[4]}"data-note="${newArr[5]}"></td><td>${newArr[0]}</td><td>${newArr[1]}</td><td>${newArr[2]}</td><td>${newArr[3]}</td><td>${newArr[4]}</td><td>${newArr[5]}</td><td data-err='${JSON.stringify(fff[0])}'>${html}</td></tr>`);
                       
                                    });
                                }
                                  $(".card-boxs").show();
                                    $(".Uploadbuttton").show();
                            }
                            else{
                                swal("File Reading Error", "", "error");
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
    $button = $(this);
      if(!$("#vendor_list").val())
    {
       swal("", "Please Select Partner", "error");
        return;
    }
    if(!$("#signature").val())
    {
       swal("", "Please Select Signature", "error");
        return;
    }
      myData = [];
     $('.checkboxes').each(function(){
        if($(this).prop('checked')){
            
            var phones = $(this).attr("data-phone");
            var full_name = $(this).attr("data-name");
            var address = $(this).attr("data-address");
            var pickup_point = $(this).attr("data-pic");
            var Delivery_time = $(this).attr("data-delivery");
        //    alert(Delivery_time);
            var Note = $(this).attr("data-note");
            var phone = phones.replace('-','');
                   // phone = phones.replace(' ','');
                  myData.push({'phone':phone,'full_name':full_name,  'address':address, 'pickup_point':pickup_point,'Delivery_time':Delivery_time,'Note':Note});
        }
     });
    console.log(myData);
    delAll($button);
 
});

$("shift").submit(function(){
    if(!$(this).val())
        return;
});
function delAll($bt)
{
    $bt.prop('disabled', true);
    $bt.html('<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Uploading');
    var type_id = $("select#signature option:selected").val();
    var pick_date = $("#pick_date").val();
    var vender = $("#vendor_list").val();
    console.log(vender);

    $.ajax({

            url:'<?php echo base_url("order/save_delivry") ?>',
            method:'post',
            data:{'myData':myData,'type_id':type_id,'pick_date':pick_date,'vender':vender},
            success:function(res)
            {
                $bt.prop("disabled", false);
                $bt.html('Upload Deliveries');
                 console.log(res);
                if(res){
                    //location.reload(); 
                }
            },
            error:function(err)
            {
               $bt.prop("disabled", false);
               $bt.html('Upload Deliveries');
            }
        });
}
partial_matched = [];
function validate_customers(customer)
{
    partial_matched = [];
    /*let found = now_customers.filter(cst => {
        return cst.address != customer[2] || cst.phone != customer[0].replace('-', '');
    });*/

    now_customers.forEach(cst => {
        if(cst.phone == customer[0].replace('-', '') && cst.address == customer[2])
        {
            return;
        }
        else if(cst.phone == customer[0].replace('-', '') || cst.address == customer[2])
        {
            partial_matched.push(cst);
        }
        else
        {
            return;
        }
    });

    return partial_matched;
    //return found;
}

        </script>
    </body>


<div id="compareModal"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Customer Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="_oldCustomer">
                            <h4>Customer Info(Previous)</h4>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="full_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form class="_newCustomer">
                            <h4>Customer Info(New)</h4>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="full_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="delvModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="post" action="<?php echo base_url('order/save_order_form') ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Delivery Via FORM INPUTS</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body p-4">
                                            
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
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="field-33" class="control-label">Delivery Address *</label>
                                                        <input type="text" class="form-control" id="field-33" placeholder="Address" name="del_address" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-44" class="control-label">Shift *</label>
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
                                                <div class="col-md-12">
                                                    <div class="form-group no-margin">
                                                        <label for="field-7" class="control-label">Order Details</label>
                                                        <textarea name="order_note" class="form-control" id="field-7" placeholder="Write something about Order"></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div><!-- /.modal -->




</html>