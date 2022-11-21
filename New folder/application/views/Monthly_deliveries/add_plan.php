    <!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://demo.thelogx.com/assets/images/logx-logo-512x512.png">

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
         <link href="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
            <!-- Animation css -->
        <link href="<?php echo base_url() ?>assets/libs/animate/animate.min.css" rel="stylesheet" type="text/css" />
         
        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
            .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

            }table, td, th {
  border: 1px solid;
  border-color: #dee2e6;
}

.grd{
    border: 1px solid;
  border-color: #3c4650;
  padding:8px;
}

.hd{
    font-weight: bold;
    text-align:right;
}

.hdb{
     font-weight: bold;
    text-align:center;
}
.dt{
    font-weight: lighter;
    font-size:13px;
     text-align:left;
}
.bg_clr{
    
    background:#3c4650;
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

            div.dataTables_wrapper div.dataTables_filter {
                text-align: right;
                margin-top: -39px;
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
                                   <ol class="breadcrumb m-0">
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Meal Planner</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Plan Delivery Days</a></li>
                                  
                                </ol>
                            </div>
                             <h4 class="page-title">Plan Delivery Days</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="width: 104% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                       
                
                  
                    
                      
                       <div class="row">
                           
                           
                              
                             <!--TESTING WEEKends start-->
                          <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <div id="output"></div>
                                              <label class="control-label">Select Partner (Optional)</label>
                                               &nbsp;&nbsp;<button style="background: #36404a;color: green";class="btn btn-sm btn-primary waves-effect waves-light" title="Partner selection will help you to filtered customer list dropdown. You can select All OR multiple partners to get relevent customer list." data-plugin="tippy" data-tippy-animation="scale" data-tippy-inertia="true" data-tippy-duration="[600, 300]" data-tippy-arrow="true">Help</button>
                                              
                                            <!--<select data-placeholder="Choose Days (Optional) ..." name="tags[]" multiple="" class="chosen-select" id="module"  style="display:none" >-->
                                            <select class="js-example-basic-multiple form-control" name="partners[]" multiple="multiple"  >  
                                              
                                                <option value="all" selected>All Partners</option>
                                                     <?php if (count($partners) > 0) { ?>
                                                     <?php foreach($partners as $data){ ?>
                                                      <option class="" value="<?php echo $data->id; ?>"> <?php echo  $data->u_name; ?></option>
                                                       <?php } ?>
                
                                                      <?php } ?>
                                            </select>
                                            <span id="msgmod" style="color: red;"></span>
                                        </div>
                                    </div>
                             <?php } ?>
                             <!--testing ends-->
                           
                           
                            <!--<button id="mytooltip" type="button" style="color:green;" class="btn btn-outline-success">Customer List Updated.</button>-->
                            <div class="col-lg-3">
                              
                                <!--<div id="animationSandbox" class="my-element">-->
                               <span  id="mytooltip" title="the message" style="color: #11d511ed;
    <!--border: 4px solid #b1a5a5;-->
    <!--border-radius: 13px;-->
    <!--padding: 8px;-->
    <!--background: white;-->
    <!--font-size: medium;-->
    <!--border-bottom-left-radius: 1px;-->
    <!--border-top-left-radius: 24px;-->
    <!--text-align: center;-->
    ">successfully Updated.</span>
    <!--</div>-->
                             
                             
                             
                                 <label>Select Customer</label>
                        
                         <select class="search_option form-control" name="search_option" id="search_option">
                            <option value="">--Select--</option>
                            
                           <?php if (count($customer_name_code) > 0) { ?>
                              <?php foreach($customer_name_code as $data){ ?>
                               <option class="" value="<?php echo $data->id; ?>"> <?php echo  $data->u_name; ?>-<?php echo  $data->u_email; ?></option>
                               <?php } ?>
                
                          <?php } ?>
                           
                            
                        </select>
                        </div>&nbsp OR &nbsp &nbsp
                        <div class="col-lg-2">
                        <label>Search by Client Code</label>
                           
                            <select class="search_option form-control"  name="search_by_pu" id="search_by_pu">
                            <option value="">--Select--</option>
                            
                           <?php if (count($customer_name_code) > 0) { ?>
                              <?php foreach($customer_name_code as $data){ ?>
                               <option class="" value="<?php echo $data->id; ?>"> <?php echo  $data->PU_code; ?></option>
                               <?php } ?>
                
                          <?php } ?>
                           
                            
                        </select>

                    </div> 
                    <div class="col-lg-2">
                        <span>  </span>
                          <div class="btn-group">
                                <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 37px; margin-left :52px;">Get Report <i class="icon-plus"></i></button>
                        </div>
                     </div>
                     
                     <div class="col-lg-2">
                        
                          <div class="btn-group">
                                <button onclick="add_plan(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 37px; ">Add Plan / Schedule</button>
                        </div>
                     </div>
                     
                     
                     </div>
                     
                     </div> 
                     
                     
                     <!--Customer Label information is here-->
                        <div id="label_info_else" class="card-box" style="width: 104% !important; display:none;" >
                            </div>
                     
                       
                       <div id="label_info" class="card-box" style="width: 104% !important; display:none;" >
                       <div class="table-responsive">
                                
                                
                                <table class="table table-dark">
 
  <tbody>
      <tr>
          
          <th scope="row" class="table-active">Customer Name</th>
          <td scope="row" id="name"><span id="name"></span> </td>
      
          <th scope="row" class="table-active">Customer Code</th>
          <td scope="row" id="name"><span id="Ccode""></span></td>
      </tr>
      
      <tr>
          <th scope="row" class="table-active">Email</th>
          <td scope="row" id="name"><span id="email""></span></td>
      
          <th scope="row" class="table-active">Contact</th>
          <td scope="row" id="name"><span id="phn""></span></td>
      </tr>
      
      <tr>
          <th scope="row" class="table-active">Partner</th>
          <td scope="row" id="name"><span id="vendor_n""></span></td>
      
          <th scope="row"></th>
          <td scope="row" ></td>
      </tr>
      
      
  </tbody>
</table>
                                  
                                  
                           
                                
                       </div>
                       </div>
                       
                       <!--Label information Ends-->  
                       
                       <!--Total Bags Information-->
                       
                       <div id="label_info2" class="card-box" style="width: 104% !important; display:none" >
                     
                                
                                
                           <div class="table-responsive">
                                
                                
                                <table class="table table-dark">
 
                               <tbody>       
                                  
                                  
                                          <tr>
          
                                     <th scope="row">Total Bags</th>
                                     <th scope="row">Paper Bags Delivered</th>
                                    <th scope="row">Cooler Bags Dispathched</th>
                                    <th scope="row">Cooler Bags Returned</th>
                                    <!--<div class="col-md-3 hdb">Adjust Returned Bags</div>-->
                                    <th scope="row">Cooler Bags with Client</th>
                                </tr> 
                               
                                  
                                 <tr> 
                                  
                                    <td><span id="total_bags"></span></td>
                                    <td><span id="total_paper_bags"></span></td>
                                    <td><span id="total_cooler_bags"></span></td>
                                    <!--<div class="col-md-3 grd"><input type="number" name="bag_va" id="bag_va" />&nbsp <span id="btn_here"></span></div>-->
                                    <td><span id="total_r_bags"></span></td>
                                    <td><span id="rem_with_cilent"></span></td>
                                   
                                </tr>
                                  
                                  
                                </tbody>
                                </table>
                                </div>
                           
                                
                       </div>
                      
                     
                     <br><br>
                     <!--Total Bags Information End-->
                     
                     
                     
                       

                            <div class="card-box"  style="margin-top:20px; width: 104% !important;"> 
                            <?php if($this->session->userdata('role') != 'vendor') {?> 
                            <div class="row" id="action_row" style="margin-bottom: 15px; display: none;">
                                <div class="col-md-12">
                                   
                                    <button type="button" class="btn btn-danger" id="print_btn">Print Label</button>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="row" id="action_row" style="margin-bottom: 15px; display: none;">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger" id="print_btn">Print Label</button>
                                </div>
                            </div>
                            <?php } ?>
                            
                              <div class="card-box" style="overflow-x: auto;">  
                            
                            <table class="example1 table table-responsive table-bordered" style="display: table; overflow-x: auto;" id="order_table">
                            

                                <thead class="thead-light">

                                <tr style="height: 50px">
                                    <!--<th style="min-width: 50px">#</th>-->
                                    <th style="min-width: 130px">Plan ID</th>
                                    
                                    
                                    
                                    <th style="min-width: 130px">Plan Start Date</th>
                                    <th style="min-width: 130px">Plan End Date</th>
                                    <th style="min-width: 130px">Plan Days</th>
                                    <th style="min-width: 130px">Deliveries Details</th>
                                    
                                    <th style="min-width: 130px">Tot. Days</th>
                                    <th style="min-width: 130px">Status</th>
                                    
                                    <th style="min-width: 130px">Plan Detail</th>
                                    <th style="min-width: 100px">Action</th>
                                   
                                    

                                </tr>
                                </thead>


                                <tbody id="table_body">

                                
                                </tbody>
                            </table>
                        
                          <!-- </div> maybee-->
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>
         <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-wide_">
                    <div class="modal-content">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="mod_title">Delivery Details</h4>
                        </div>
                        <div class="modal-body">
                           

                            <div class="row" id="v_summery_data"></div>
                        </div>
                        <div class="modal-footer">
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue btn-info">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            <!--FOR CANCEL DELIVERY-->
            
              <div id="responsive_neww" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-wide_">
                    <div class="modal-content">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="cancel_mod_title">Cancel Delivery </h4>
                        </div>
                        <div class="modal-body">
                           

                            <div class="row" id="cancel_summery_data"></div>
                        </div>
                        <div class="modal-footer">
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue btn-info">Close</button>
                            <button id="responsive" onclick="cancel_confirm()" type="button" data-dismiss="modal" class="btn blue btn-danger">Confirm</button>
                        
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!--CANCEL DELIVERY END-->

  
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
         <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>

        <!-- Init js -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/scripts/custom.js"></script>
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>
        <script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script> 

      <script src="<?php echo base_url() ?>assets/libs/tippy-js/tippy.all.min.js"></script>
          <script src="<?php echo base_url() ?>assets/js/pages/animation.init.js"></script>

   
        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
       
       
        <script type="text/javascript">
         
           $(document).ready(function () {
               
                  $('#mytooltip').hide();
       
             $('.js-example-basic-multiple').select2();
            
            $("#print_btn").click(function(){
                var ids = [];
                $(".checkboxes:checked").each(function(){
                    ids.push($(this).val());
                });

                if(ids.length < -1)
                    return;
                ids = ids.join();
                window.open('<?php echo base_url() ?>report/AC_print/orders/'+ids, '_blank');
            });
            
            
            <?php if (!empty($this->session->flashdata('error'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('error') ?>';
                swal(msgg, "", "error");
            <?php } ?>

            <?php if (!empty($this->session->flashdata('success'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('success') ?>';
                swal(msgg, "", "success");
            <?php } ?>
            

            
            $("#from_date").flatpickr({
            defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });
        
        
        
        
        $('.search_option').select2({
  placeholder: 'Select an option'
});

         
               init_table();
                
               
               
           });
                
       
        </script>
       
<script type="text/javascript">
          i_image_str = '';
     var un_assign_table;
     function init_table(){
        un_assign_table = $('#order_table').DataTable({
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
        

    //assign_table.rows().invalidate().draw();
    }
  
    function get_reports(e){
        
        var option = $('#search_option').val();
        var code=$('#search_by_pu').val();
       
            if(option == 0 && code ==''){  
                 swal.fire("Kindly Select Customer first", "", "error");
            }else{
              
              $("#table_body").empty();
              get_deliveries_report_by_status(e.target);
            }
        
    }

    function get_deliveries_report_by_status(el){
        var partner=$('.js-example-basic-multiple').select2('val');
       
      
        // partner ==''? 0 : partner;
        // alert(partner);
        // die();
           
           
           
        var option = $('#search_option').val();
        var code=$('#search_by_pu').val();
        
        if(option != 0 || code != ''){
            
                 console.log('i am if');
                 console.log('option is :'+option);  
                 console.log('code is :'+code);
                
                                            
                            if(un_assign_table){
                                $('#order_table').dataTable().fnDestroy();
                            }
                    
                            $("#table_body").empty();
                    
                            var url = "<?php echo base_url(); ?>"+"MonthlyMeal/get_customercode_info_";
                            
                            $fields = {'code':code, 'id':option,'partner':partner};
                            el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
                            el.disabled = true; 
                            $.post(url, $fields, function(response){
                                el.disabled = false;
                                el.innerHTML = 'Get Report <i class="icon-plus"></i>';
                                if(response.success){
                                    console.log(response.success);
                                    var data = response.report_data;
                    
                                    $("#table_body").append(set_report_data(data));
                                }else{
                                    console.log(response.success);
                                    console.log(response);
                                    
                                    $("#label_info").css('display','none');
                                    $("#label_info2").css('display','none');
                                        $("#name").text(" ");
                                        $("#email").text(" ");
                                        $("#phn").text(" ");
                                        $("#c_t").text(" ");
                                        $("#Ccode").text(" ");
                                        $("#emi").text(" ");
                                        
                                         $("#label_info_else").css('display','block');
                                         $("#label_info_else").text('Nothing found / No plan is created yet !');
                                         $("#label_info_else").css('color','red');
                                }
                    
                                init_table();
                            },'json');
                
                           
            
        }else{
            $('#search_by_pu').css("border-color","red");
            $('#search_option').css("border-color","red");
            
             console.log('i am else ');
                console.log('option is :'+option);  
                console.log('code is :'+code);
        }

   
    }
    
   
    
    
    $("#animationSandbox").click(function(){
    //  const element = document.querySelector('.my-element');
                    // .style.backgroundColor = "red"
          element=document.querySelector('.my-element');   
           $("#animationSandbox").animate();
         element.classList.add('animate__animated', 'animate__bounceOutLeft');
         element.style.setProperty('--animate-duration', '0.5s');
                    element.addEventListener('animationend', () => {
                            alert('i rum');
                          });
          
                          
//          animateCSS('.my-element', 'bounce').then((message) => {
//   // Do something after the animation
//   alert('i rum');
// });                          
                          
    });                 
    
    $('.js-example-basic-multiple').change(function(){
          var partner=$('.js-example-basic-multiple').select2('val');
        //   alert(partner);
          
          if(partner !=""){
           var url = "<?php echo base_url(); ?>"+"monthlyMeal/get_customer_wrt_partner_mealplan";
             $fields = {'partner':partner };
            $.post(url, $fields, function(response){
                if(response.success){
             
                 setTimeout(function(){$('#mytooltip').show(); },100);  
  
             
                // alert('success!');
                        var data =response.result;
                     
                if(data.length >0){
                  $('#search_option').empty().trigger("change");
                             
                      for (var i = 0, length = data.length; i < length; i++) {
                            //   console.log(data[i].full_name);
                            //   console.log(data[i].id);
                                // create the option and append to Select2
                            var option = new Option(data[i].full_name, data[i].id, true, true);
                            $('#search_option').append(option).trigger('change');
                          }
                        }
                        
                         setTimeout(function(){$('#mytooltip').hide(); },3000); 
                         

                    
                 }else{
                    swal.fire("Oops!","No Customer Found, Try Again.","warning");
                    console.log('NOOOO');
                }
            },'json');
          
          
          
          }else{
            //   alert('select plz');
          }
    });
    
  
    function add_plan(e){
         var option = $('#search_option').val();
        var code=$('#search_by_pu').val();
        var url = "<?php echo base_url(); ?>";
        console.log(url);
        if(option != 0){
            
                 console.log('i am if');
                console.log('option is :'+option);  
                console.log('code is :'+code);
                
                 window.location = url+'MonthlyMeal/Plan_Manage/'+option+'/1';
                
                }else if(code != ''){
            
                console.log('i am else if');
                console.log('option is :'+option);  
                console.log('code is :'+code);
                
                 window.location = url+'vendor/Plan_Manage/'+code+'/2';
                }else{
            // $('#search_by_pu').css("border-color","red");
            // $('#search_option').css("border-color","red");
            
             console.log('i am else color should be red ');
                console.log('option is :'+option);  
                console.log('code is :'+code);
                swal.fire("Kindly Select Customer first", "", "error")
        }
    }

    function set_report_data(data){
         var url = "<?php echo base_url(); ?>";
        var tbody = ''; 
        var login_user = '<?php echo strtolower($this->session->userdata('role')) ?>';
         
         
         
                    var total_deliveries_are=parseInt(0);
                    var total_paper_bag_delivered=parseInt(0);
                    var total_cooling_bag_delivered=parseInt(0);
                    var empty_cooler_bag_received=parseInt(0);
                    var pending_bag_with_customer=parseInt(0);
                  
         
         
         
        $.each(data, function(i, e){
            
            // alert('i am data :'+data+' and i am i:'+i+' and i am e'+e);
            
            $("#label_info_else").css('display','none');
            $("#label_info").css('display','block');
            $("#name").text(" ");
            $("#email").text(" ");
            $("#phn").text(" ");
            $("#c_t").text(" ");
            $("#Ccode").text(" ");
            $("#emi").text(" ");
            
            var basic_info=JSON.parse(e.all_details);
            // $("#name").text(basic_info.full_name);
            $("#name").text(e.full_name);
            $("#email").text(basic_info.u_email);
            $("#phn").text(basic_info.phone);
            
            $("#Ccode").text(basic_info.pcustomer_id);
            $("#vendor_n").text(basic_info.vendor_name);
           
            console.log(basic_info);
            $("#label_info2").css('display','');
            
            
            //   $("#btn_here").html('<button id="adjust_bags" name="adjust_bags" class="btn btn-primary-sm" onclick="adjust_bag('+e.bags_id+')">Save</button>');
                   
                 total_deliveries_are  +=parseInt(e.total_deliveries_are);
                 total_paper_bag_delivered +=parseInt(e.total_paper_bag_delivered);
                 total_cooling_bag_delivered +=parseInt(e.total_cooling_bag_delivered);
                 empty_cooler_bag_received +=parseInt(e.empty_cooler_bag_received);
                 pending_bag_with_customer +=parseInt(e.pending_bag_with_customer);
                 
                    
                   $("#total_bags").text(total_deliveries_are);
                   $("#total_paper_bags").text(total_paper_bag_delivered);
                   $("#total_cooler_bags").text(total_cooling_bag_delivered);
                   $("#total_r_bags").text(empty_cooler_bag_received);
                   $("#rem_with_cilent").text(pending_bag_with_customer);
                   
            
            
            
            
                   
                   
                   var obj_reasons = JSON.parse(e.all_details);
                   
                       
                  tbody += '<tr class="odd gradeX" id="'+ e.plan_id+'">';
                //   tbody += '<td><input type="checkbox" class="checkboxes" value="'+ e.plan_id+'" /></td>';
                  tbody += '<td >'+ e.plan_id +'</td>';
                  
                  tbody += '<td >'+ e.plan_start_date +'</td>';
                  
                  tbody += '<td >'+ e.exp_date +'</td>';
                  tbody += '<td >'+ e.no_of_days +'</td>';
                  
                  tbody += '<td > <table class="table table-hover"><tbody><tr style="background:lightgrey;" title="click here to view details" ><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+e.plan_id+'/1" target="_blank">Tot. Deliveries </a></td><td> <a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+e.plan_id+'/1" target="_blank">'+e.total_deliveries_are+'</a></td></tr> <tr style="background:#b8f4b8;" title="Click here to view details"><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+e.plan_id+'/2" target="_blank">Tot. Completed</a></td><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+e.plan_id+'/2" target="_blank">'+e.completed+'</a></td></tr><tr style="background:#96d6f0;" title="Click here to view details"><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+e.plan_id+'/3" target="_blank">Tot. Pending </a></td> <td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+e.plan_id+'/3" target="_blank">'+e.pendings_are+'</a></td></tr><tr style="background:#f44a4a;" title="Click here to view details"><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+e.plan_id+'/4" target="_blank">Tot. Canceled</a></td> <td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_deliveries/'+e.plan_id+'/4" target="_blank">'+e.cancel+'</a></td></tr><tr style="background:lightgrey;" title="click here to view details" ><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_freeze/'+e.plan_id+'/5" target="_blank">Tot.Freezed Deliveries </a></td><td> <a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_freeze/'+e.plan_id+'/5" target="_blank">'+e.tot_freeze+'</a></td></tr> <tr style="background:lightgrey;" title="click here to view details" ><td><a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_freeze/'+e.plan_id+'/6" target="_blank">Tot.Paused Deliveries </a></td><td> <a class="isDisabled" href="<?php echo base_url();?>'+'MonthlyMeal/total_freeze/'+e.plan_id+'/6" target="_blank">'+e.tot_paused+'</a></td></tr></tbody></table>  </td>';
                  tbody += '<td > <table class="table table-hover"><tbody><tr><td>Tot. Days</td><td>'+e.total_deliveries_are+'</td></tr> <tr><td>Tot. Remaining Days</td><td>'+e.pendings_are+'</td></tr> <tr><td>Tot. Paused Deliveries</td><td>'+e.tot_paused+'</td></tr></tbody></table> </td>';
                      
                  if(e.completed_status ==0){
                        tbody += '<td > <span style="color: green;font-weight: 700;">Active</span> </td>';
                    }else if(e.completed_status ==1){
                        tbody += '<td > <span style="color: #197990;font-weight: 700;">Completed</span> </td>';
                    }else if(e.completed_status ==2){
                        tbody += '<td > <span style="color: #dee1e2;font-weight: 700;">Freezed</span> </td>';
                    }else if(e.completed_status ==3){
                        tbody += '<td > <span style="color: #fb0d0d;font-weight: 700;">canceled</span> </td>';
                    }    
                    
                
                tbody += '<td > <span title="Partner">'+basic_info.vendor_name+'</span><br><span title="created at">'+e.created_at+'</span> </td>';
                       
                       
                    
                    // res.data[i].action = '<a class="" title="View" data-toggle="modal" onclick="javascript:order_detail(this)" href="#myModal" pk="'+ res.data[i].plan_id +'"><i class="dripicons-preview" style=font-size: 30px;"></i></a>';
                   
                    var url = "<?php echo base_url(); ?>";
              
            //   Temporary block freez and del plan feature start
               
                //   tbody += '<td ><a class="" title="Edit" target="_blank" href="'+url+'MonthlyMeal/Plan_Manage/'+e.customer_id+'/1/edit/'+e.plan_id+'" flag="edit" pk="'+e.plan_id+'"><i class="mdi mdi-square-edit-outline"></i></a>&nbsp; <a class="" flag="view" target="_blank" href="'+url+'MonthlyMeal/view_plan/'+e.customer_id+'/1/view/'+e.plan_id+'" flag="view" pk="'+e.plan_id+'"><i class="mdi mdi-eye-outline "></i></a>&nbsp;<a class="" title="Delete" onclick="delete_plan('+e.plan_id+' , '+e.customer_id+' )"><i class="mdi mdi-delete"></i></a> &nbsp; '; 
                     
                //      console.log('e.completed_status: '+e.completed_status);
                //      if(e.completed_status ==0){
                //           tbody += ' <a class="" title="Freeze Plan" onclick="freeze_plan('+e.plan_id+' , '+e.customer_id+')"><i id="freeze_plans'+e.plan_id+'" class="fas fa-lock"></i></a>  </td>'; 
                //      }else if(e.completed_status ==2){
                //         tbody += ' <a class="" title="Defreeze Plan" onclick="freeze_plan('+e.plan_id+' , '+e.customer_id+')"><i id="freeze_plans'+e.plan_id+'" class="fas fa-unlock"></i></a> </td>'; 
                //      }
                
             //   Temporary block freez and del plan feature end     
                 
                 
                 
                 
                 tbody += '<td ><a class="" title="Edit" target="_blank" href="'+url+'MonthlyMeal/Plan_Manage/'+e.customer_id+'/1/edit/'+e.plan_id+'" flag="edit" pk="'+e.plan_id+'"><i class="mdi mdi-square-edit-outline" style="font-size: x-large;"></i></a> &nbsp; '; 
                  if(e.completed_status ==0){
                      
                      
                //  tbody += ' <a class="" title="Freeze Plan" data-dt="'+e.exp_date+'" onclick="freeze_plan('+e.plan_id+' , '+e.customer_id+',\' '+e.exp_date+' \')"><i id="freeze_plans'+e.plan_id+'" class="fas fa-lock" style="font-size: x-large;"></i></a>  &nbsp';    
                  }else if(e.completed_status ==2){
                    //   tbody += ' <a class="" title="Defreeze Plan" data-dt="'+e.exp_date+'" onclick="freeze_plan('+e.plan_id+' , '+e.customer_id+',\' '+e.exp_date+' \')"><i id="freeze_plans'+e.plan_id+'" class="fas fa-unlock" style="font-size: x-large;" ></i></a> </td>'; 
                  
                  } 
                //   tbody += ' <a class="" title="Defreeze Plan" data-dt="'+e.exp_date+'" onclick="def_freeze_plan('+e.plan_id+' , '+e.customer_id+',\' '+e.exp_date+' \')"><i id="defreeze_plans'+e.plan_id+'" class="fas fa-unlock" style="font-size: x-large;" ></i></a> '; 
                  
                  
                //   tempcloseing
              
                    tbody += ' &nbsp <a style="font-size: x-large;" class="" title="Edit Delivery Dates"  target="_blank" href="'+url+'MonthlyMeal/edit_delivery_date/'+e.customer_id+'/1/edit_delivery_date/'+e.plan_id+'" ><i class="fas fa-eraser" style="font-size: x-large;"></i></a>  ';
              
               tbody += ' &nbsp &nbsp <a class="" title="Pause/Hold MealPlan" data-dt="'+e.exp_date+'" onclick="pause_plan('+e.plan_id+' , '+e.customer_id+',\' '+e.exp_date+' \')"><i id="pause_plan'+e.plan_id+'" class="fa fa-pause" style="font-size: x-large;" ></i> </a> '; 
                
                
                
               tbody += ' &nbsp &nbsp <a class="" title="Resume/Play MealPlan" data-dt="'+e.exp_date+'" onclick="play_plan('+e.plan_id+' , '+e.customer_id+',\' '+e.exp_date+' \')"><i id="play_plan'+e.plan_id+'" class="fa fa-play" style="font-size: x-large;" ></i> </a> '; 
                   
                
                
                 <?php if($this->session->userdata('role') != 'vendor') {?>
                   tbody += ' &nbsp &nbsp &nbsp <a style="font-size: x-large;" class="" title="Delete"  onclick="delete_plan('+e.plan_id+' , '+e.customer_id+' )"><i class="mdi mdi-delete"></i></a>  </td>';
                   <?php }else{ ?>  
                  tbody += ' </td> ';
                 <?php } ?>
                 
                 
                 
                 
                 
                 
                 
                 
           // below is old part   
                   
            
        //   tbody += '<td>'
        //     tbody += '<a class="" title="Edit" href="'+url+'vendor/Plan_Manage/'+e.customer_id+'/1/edit/'+e.id+'" flag="edit" pk="'+e.id+'"><i class="mdi mdi-square-edit-outline"></i></a>&nbsp';
                                                    
        //     tbody += '<a class=""  flag="view" href="'+url+'vendor/view_plan/'+e.customer_id+'/1/view/'+e.id+'" flag="view" pk="'+e.id+'"><i class="mdi mdi-eye-outline "></i></a>';
        //     tbody += '<a class="" title="Delete"  onclick="delete_plan('+e.id+' , '+e.customer_id+' )"><i class="mdi mdi-delete"></i></a> &nbsp'; 
            
        //         if(e.plan_status == 'Active'){
        //           tbody += '<a class="" title="Freeze Plan"  onclick="freeze_plan('+e.id+' , '+e.customer_id+')"><i id="freeze_plans'+e.id+'" class="fas fa-lock"></i></a>';
        //         }else{
        //              tbody += '<a class="" title="Defreeze Plan"  onclick="freeze_plan('+e.id+' , '+e.customer_id+')"><i id="freeze_plans'+e.id+'" class="fas fa-unlock"></i></a>';
                
        //         }
        //     tbody += '</td>';

            tbody += '</tr >';
        });
        return tbody;
    }
    
    function freeze_plan_test(planID,CustomerID){
        
        
      var rowId=planID;
    //     $("#"+rowId).css("background-color","red");
      
        var mainid="freeze_plans"+rowId;
        // console.log(mainid);
    
    //  alert($("#"+planID).find("td:eq(20)").text('test'));
     
    }
    function freeze_plan(planID,CustomerID,dt){
        
     
        
   
      var rowId=planID;
    //     $("#"+rowId).css("background-color","red");
      
        var mainid="freeze_plans"+rowId;
        console.log(mainid);
               
            var dtt=new Date(dt);
           var tst_dt_y = new Date(dt);
        //   var froy=new Date(fro);
       
        if($("#"+mainid).hasClass("fa-lock")){
            
             tst_dt_y.setDate(dtt.getDate() + 1);
              var yyyy = tst_dt_y.getFullYear().toString();
              var mm = (tst_dt_y.getMonth()+1).toString(); // getMonth() is zero-based
              var dd  = tst_dt_y.getDate().toString();
              var final_date_Calculated= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
            
            
            
            var note=" This action will freezed the current deliveries and generate new deliveries that starts with "+final_date_Calculated;
            
        }else{
            var note="This action will delete the freezed deliveries as defreezed and reschedule the deliveries";
        }
        
        // alert(note);
        // Exit();
        
        if(planID){
          
            
             Swal.fire({
                  title: 'Are you sure?',
                  text: note,
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, save changes!'
                }).then((result) => {
                  if (result.value) {
                      
                       if($("#"+mainid).hasClass("fa-lock")){
                                        
                                    //      $("#"+mainid).removeClass("fa-lock");
                                    //   $("#"+mainid).addClass( "fa-unlock" );
                                       
                                       $status_is ='Freezed';
                                         $msg="Plan is freezed Successfully!";
                                         
                                         
                                    }else{
                                       
                                        //  $("#"+mainid).removeClass( "fa-unlock" );
                                        //  $("#"+mainid).addClass("fa-lock");
                                         $status_is ='Active';
                                         $msg="Plan Defreezed Successfully!";
                                    }
                                                  
                        if($status_is =='Freezed'){
                            var hit_url_is='<?php echo base_url('MonthlyMeal/freeze_the_plan');?>';
                        }else if($status_is =='Active'){
                            var hit_url_is='<?php echo base_url('MonthlyMeal/de_freeze_the_plan');?>';
                        }else{
                            
                        }
                       
                       
                           $.ajax({
                                    url: hit_url_is,
                                    type: 'POST',
                                    data: {
                                        
                                        'id':planID,
                                        'status':$status_is,
                                  },
                                    success: function (res) {
                                        // alert(res);
                                        if(res=='No data Found'){
                                            swal.fire("No Paused/Hold Deliveries Found To Reschedule.", "", "error");
                                        }else if(res=='all done'){
                                        swal.fire($msg, "", "success").then(function(){ 
                                            // location.reload(); 
                                           
                                            });
                                        }else if(res=='Select Date Properly'){
                                            
                                             swal.fire("Select Date Properly, Try Again.", "Network Error!", "error");
                                            
                                        }else if(res=='error'){
                                             swal.fire("Try Again!", "Network Error!", "error");
                                        }
                                        
               
                                       
                                    },
                                    error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                        swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                            
                                        });
                                    }
                                });
                      
                        
                    }
                });
        
            
        }else{
           
        }
        
    }
    
    function def_freeze_plan(planID,CustomerID,dt){
        
     
        
   
      var rowId=planID;
    //     $("#"+rowId).css("background-color","red");
      
        var mainid="defreeze_plans"+rowId;
        console.log(mainid);
               
            var dtt=new Date(dt);
           var tst_dt_y = new Date(dt);
        //   var froy=new Date(fro);
       
        if($("#"+mainid).hasClass("fa-lock")){
            
             tst_dt_y.setDate(dtt.getDate() + 1);
              var yyyy = tst_dt_y.getFullYear().toString();
              var mm = (tst_dt_y.getMonth()+1).toString(); // getMonth() is zero-based
              var dd  = tst_dt_y.getDate().toString();
              var final_date_Calculated= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
            
            
            
            var note=" This action will freezed the current deliveries and generate new deliveries that starts with "+final_date_Calculated;
            
        }else{
            var note="This action will delete the freezed deliveries as defreezed and reschedule the deliveries";
        }
        
        // alert(note);
        // Exit();
        
        if(planID){
          
            
             Swal.fire({
                  title: 'Are you sure?',
                  text: note,
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, save changes!'
                }).then((result) => {
                  if (result.value) {
                      
                       if($("#"+mainid).hasClass("fa-lock")){
                                        
                                    //      $("#"+mainid).removeClass("fa-lock");
                                    //   $("#"+mainid).addClass( "fa-unlock" );
                                       
                                       $status_is ='Freezed';
                                         $msg="Plan is freezed Successfully!";
                                         
                                         
                                    }else{
                                       
                                        //  $("#"+mainid).removeClass( "fa-unlock" );
                                        //  $("#"+mainid).addClass("fa-lock");
                                         $status_is ='Active';
                                         $msg="Plan Defreezed Successfully!";
                                    }
                                                  
                        if($status_is =='Freezed'){
                            var hit_url_is='<?php echo base_url('MonthlyMeal/freeze_the_plan');?>';
                        }else if($status_is =='Active'){
                            var hit_url_is='<?php echo base_url('MonthlyMeal/de_freeze_the_plan');?>';
                        }else{
                            
                        }
                       
                       
                           $.ajax({
                                    url: hit_url_is,
                                    type: 'POST',
                                    data: {
                                        
                                        'id':planID,
                                        'status':$status_is,
                                  },
                                    success: function (res) {
                                        // alert(res);
                                        if(res=='No data Found'){
                                            swal.fire("No Data Found! Try again.", "", "error");
                                        }else if(res=='all done'){
                                        swal.fire($msg, "", "success").then(function(){ 
                                            location.reload(); 
                                            // if($status_is =='Active'){
                                            //     $("#"+planID).css('background-color', '#36404a');
                                            //     $("#"+planID).find("td:eq(20)").text('Active');
                                            // }else{
                                            //     $("#"+planID).css('background-color', 'gray');
                                            //      $("#"+planID).find("td:eq(20)").text('Freezed');
                                                 
                                                 
                                            //       $("#"+mainid).removeClass("fa-lock");
                                            //       $("#"+mainid).addClass( "fa-unlock" );
                                            // }
                                            });
                                        }else if(res=='active done'){
                                            
                                             $("#"+mainid).removeClass( "fa-unlock" );
                                             $("#"+mainid).addClass("fa-lock");
                                            
                                        }else{
                                            
                                        }
                                        
               
                                       
                                    },
                                    error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                        swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                            
                                        });
                                    }
                                });
                      
                        
                    }
                });
        
            
        }else{
           
        }
        
    }
    
    
    
    
     function cancel_delivery(ele){
           var delivery_id = $(ele).attr('pk');
           console.log('hi i am cancel delivery');
           get_order_by_id_cancel(delivery_id);
           
    }
    
    
    
     function get_order_by_id_cancel(id){
        //hide_error();
         console.log('hi i am start of get order by id');
        var track_id=0;
 
        var url = "<?php echo base_url(); ?>"+"order/AC_get_order_by_id";
        $fields = {'order_id':id, 'track_ids':track_id};
        $.post(url, $fields, function(response){
            if(response.success){
                
                var detail = response.detail;
            
                
                var order_ = set_cancel_summery(detail);
                $("#cancel_summery_data").empty();
                $("#cancel_summery_data").append(order_);
                //$("#v_data").show();
                $("#loading").hide();
            }
        },'json');
        
         console.log('hi i am end of get cancel by id ');
    }
    
    function set_cancel_summery(detail){

        var cancel_summery = detail[0];
     
         console.log('hi i am start of set cancel');
       

        //set order status
        // $("#cancel_mod_title").html('Delivery Details of '+summery.status);

        // var img_url = "<?php //echo base_url(); ?>"+"upload/"+summery.delivery_img;
        
        var  cancel_summery_data = '<div class="portlet-body form">';
        cancel_summery_data += '<input type="hidden" name="cancel_order_id" value="'+cancel_summery.delivery_id+'" id="cancel_order_id" class="form-control">';
        // Partner + Customer
        cancel_summery_data += '<div class="row">';
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Partner</label>';
        cancel_summery_data += '<input type="text" name="partner_name" id="partner_name" class="form-control" value="'+cancel_summery.vendor+'"  disabled>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Customer</label>';
        cancel_summery_data += '<input type="text" name="customer_name" id="customer_name" class="form-control" value="'+cancel_summery.customer+'"  disabled>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += '</div>';
        
        
         // Status + Ammount
        cancel_summery_data += '<div class="row">';
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Status</label>';
        cancel_summery_data += '<input type="text" name="cancel_status" id="cancel_status" class="form-control" value="'+cancel_summery.status+'"  disabled>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Ammount</label>';
        cancel_summery_data += '<input type="text" name="ammount" id="ammount" class="form-control" value="'+cancel_summery.partner_price+'"  disabled>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += '</div>';
        
        
         // Paid OR unpaid + Img
        cancel_summery_data += '<div class="row">';
        cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Cancelation Mode</label>';
        cancel_summery_data += '<select id="cancel_mode" class="form-control"><option value="Paid_cancel">Paid Cancel</option>  <option value="Unpaid_cancel">Unpaid Cancel</option></select>';
        cancel_summery_data += ' </div> </div>';
        
        cancel_summery_data += ' <div class="col-md-6">';
        cancel_summery_data += '<div class="form-group input-group-sm"> <label class="control-label">Prof Image</label>';
        cancel_summery_data += '<input type="file"  name="i_image" id="i_image" class="form-control ">';
        
        cancel_summery_data += '<span id="i_img_msg" style="color: red"></span>';
        cancel_summery_data += '<img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_i_image">';
        cancel_summery_data += '</div> </div>';
        
        cancel_summery_data += '</div>';
        
        // Short Note
        
                     
        
        cancel_summery_data += '<div class="row">';
         
         cancel_summery_data += '<div class="col-md-6"><div class="form-group input-group-sm"><label class="control-label">Short Note</label>';
        cancel_summery_data += '<textarea name="note" id="note" rows="5" class="form-control" style="width:100%;"></textarea>';
        cancel_summery_data += ' </div> </div>';
        cancel_summery_data += '</div>';
        
        cancel_summery_data += '</div>';
          
          //console.log(cancel_summery_data);
          
           console.log('hi i am end of set cancel summery');
        return cancel_summery_data;
    }
    
    
    
    function download_xlx_(planid,c_id){
        myTest($planid,$uid)
    }
           
           
    
     function i_image(input) {
         console.log(input.files);
         
        if (input.files && input.files[0]) {
            console.log('i am working inside if................');
            var reader = new FileReader();
            reader.onload = function(e) {

                var type = input.files[0].type;
                var res=  type.split('/');
                if (res.length > 0){
                    if (res[1] !== 'png' && res[1] !== 'jpg' &&  res[1] !== 'jpeg' &&  res[1] !== 'pdf'){
                        $("#i_img_msg").append('invalid format');
                        $("#i_image").val('');
                    }else {
                        $("#i_img_msg").hide();
                    }
                }else {
                    $("#i_img_msg").append('invalid format');
                    $("#i_image").val('');
                }

                if (input.files[0].size > 1057152) {
                    $("#i_img_msg").append('Try to upload file less than 1MB!');
                    $("#i_image").val('');
                } else {
                     $("#i_img_msg").hide();
                    //  $("#i_img_msg").append('Good');
                    i_image_str = e.target.result;
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // $('#i_image').on('click',function(){
       
    //   console.log('yipiieeeeeeeeeeeeeeeee');
    //     // $('#asd').click();
        
    // });
    
    $('body').on('change', '#i_image', function(e){
    
       i_image(this);
       });
    
//     $(".pa").click(function(){
//     alert("The paragraph was clicked.");
//   });
    
    
    //   $("#i_image").click(function () {
    //      console.log('yuppppppppppppppp')
    //     i_image(this);
    //     console.log(this);
    // });
    
    function adjust_bag(id){
        
        var val_bag=$('#bag_va').val();
        var tot_bag=$('#total_bags').text();
        tot_bag=parseInt(tot_bag);
        val_bag=parseInt(val_bag);
        var id=id;
        
        if(tot_bag >= val_bag){
            var check=1;
        }else{
            var check=0;
        }
        
        
        
        // console.log('i am check:'+ check +'i am tot_bag' +tot_bag);
        if(val_bag && check ){
            $('#bag_va').css('border-color', '#3c4650');
            
             Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to save changes!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                  if (result.value) {
                      
                       
                           $.ajax({
                                    url: '<?php echo base_url('vendor/update_return_bags');?>',
                                    type: 'POST',
                                    data: {
                                        
                                        'id':id,
                                        'changes':val_bag,
                                        
                                       
                                    },
                                    success: function (res) {
                                        swal.fire("Save Changes Successfully!", "", "success").then(function(){ 
                                            location.reload(); 
                                            
                                        });
               
                                       
                                    },
                                    error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                    }
                                });
                      
                        
                    }
                });
        
            
        }else{
            $('#bag_va').css('border-color', 'red');
        }
        // console.log('i am adjust bag id: '+ val_bag);
    }
    
    function delete_plan(id,c_id){
        
          
           Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                  if (result.value) {
                      
                       
                           $.ajax({
                                    url: '<?php echo base_url('MonthlyMeal/delete_plan');?>',
                                    type: 'POST',
                                    data: {
                                        
                                        'plan_id':id,
                                        'c_id':c_id
                                        
                                       
                                    },
                                    success: function (res) {
                                        
                                    if(res== 'yes'){    
                                        swal.fire("Plan Deleted Successfully!", "", "success").then(function(){ 
                                            location.reload(); 
                                            
                                        });
                                    }else if(res == 'can not del plan'){
                                        swal.fire("Complete Mealplan can not be Deleted!", "", "error");
                                        
                                    }else if(res == 'No data Found'){
                                       
                                        swal.fire("No Data Found! Try again.", "", "error");
                                    }else if(res=='can not del plan All'){
                                        
                                        var msgg='Couple of deliveries haven\'t deleted.';
		    msgg=msgg+'<br><button class="btn btn-warning" data-toggle="collapse" data-target="#demo">More Information</button><div id="demo" class="collapse">Deliveries with completed or outdated status won\'t be deleted due to record maintenance, other deliveries deleted successfully.</div>';
		    
                                        swal.fire({
                                            title:'Incomplete Operation',
                                            html: msgg,
                                            type: "warning"
                                        }).then(function(){ 
                                            location.reload(); 
                                            
                                        });
                                    }else{
                                        
                                    }
                                       
                                    },
                                    error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                    }
                                });
                      
                        
                    }
                });
        
    }
    
    function cancel_confirm(){
        
        var mode=$('#cancel_mode').val();
        if(mode=='Paid_cancel'){
            var pmsg='paid cancellation';
        }else{
            var pmsg='unpaid cancellation';
        }
         Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to cancel this delivery with "+pmsg+" charges!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, cancel it!'
                }).then((result) => {
                  if (result.value) {
                      
                        $('input').removeAttr('disabled');
                        var cancel_o_id=$('#cancel_order_id').val();
                       
                        
                        if(mode == 'Unpaid_cancel'){
                            var cancelation_price=0;
                        }else{
                            var cancelation_price=$('#ammount').val();
                        }
                        var note=$('#note').val();
                        var profImg=i_image_str;
                        
                        // console.log('hi i am confirm cancel:'+cancel_o_id);
                        // console.log(mode);
                        // console.log(cancelation_price);
                        // console.log('note'+note);
                        // console.log('image'+profImg);
                        
                        
                           $.ajax({
                                    url: '<?php echo base_url('order/AC_cancel_order');?>',
                                    type: 'POST',
                                    data: {
                                        
                                        'id':cancel_o_id,
                                        'mode':mode,
                                        'note':note,
                                        'profImg':profImg,
                                        'cancelation_price':cancelation_price
                                       
                                    },
                                    success: function (res) {
                                        swal.fire("Delivery Cancelled Successfully", "", "success").then(function(){ 
                                            location.reload(); 
                                            
                                        });
               
                                       
                                    },
                                    error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                    }
                                });
                      
                        
                    }
                });
        
       
        
    }
    
       function order_detail(ele){
        $("#v_data").hide();
        $("#loading").show();
        var order_id = $(ele).attr('pk');
        var track_ids=$(ele).attr('tk');
        get_order_by_id(order_id,track_ids);
        // get_track_orders(track_ids);
    }

    
  

    //ORDER METHODS
    function get_order_by_id(id,track_ids){
        //hide_error();
//  console.log('i am get order id func');
        var url = "<?php echo base_url(); ?>"+"order/AC_get_order_by_id";
        $fields = {'order_id':id, 'track_ids':track_ids};
        $.post(url, $fields, function(response){
            if(response.success){
                //  console.log('i am inside get first response');
                var details = response.detail;
                var track = response.track;
                
                var order_summery_detail = set_order_summery(details,track);
                $("#v_summery_data").empty();
                $("#v_summery_data").append(order_summery_detail);
                //$("#v_data").show();
                $("#loading").hide();
            }
        },'json');
    }
    
    

    function set_order_summery(summery_details,tracking_details){

        var summery = summery_details[0];
        
        
       

        //set order status
        $("#mod_title").html('Delivery Details of '+summery.status);

        var img_url = "<?php echo base_url(); ?>"+"upload/"+summery.delivery_img;
          var sig_url = "<?php echo base_url(); ?>"+"upload/"+summery.signature_img;
        var  summery_data = '<div class="note note-info" style="background-color: #E8F6FC;">';
        summery_data += '<h4 class="block">Delivery Details</h4>';

        summery_data += '<div class="row">';
        summery_data += '<div class="col-md-4"><div class="row"><div class="col-md-12"><h5>Delivery Image</h5>';
        
        summery_data += '<img src="'+img_url+'" width="100%" class="img-responsive img-thumbnail">';
        summery_data += '</div>';
        summery_data += '<div class="col-md-12"><h5>Signature Image</h5>';
        summery_data += '<img src="'+sig_url+'" width="100%" class="img-responsive img-thumbnail">';
        summery_data += '</div>';
        summery_data += '</div></div>';
        summery_data += '<div class="col-md-8">';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>ID : </strong>'+summery.delivery_id+'</li>';
        summery_data += '<li><strong>Status : </strong>'+summery.status+'</li>';
        summery_data += '<li><strong>PU number : </strong>'+summery.pu_number+'</li>';
        summery_data += '<li><strong>Bags Received : </strong>'+summery.bag_received+'</li>';
        summery_data += '<li><strong>Created Date : </strong>'+summery.created+'</li>';
        summery_data += '<li><strong>Assign Date : </strong>'+summery.assign_date+'</li>';
        summery_data += '<li style="color:#B22222;"><strong>Delivery Date : </strong>'+summery.delivery_date+'</li>';
        summery_data += '<li style="color:#B22222;"><strong>Delivery Time : </strong>'+summery.delivery_time+'</li>';
        summery_data += '<li style="color:#B22222;"><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '<li><strong>Delivered Date : </strong>'+summery.delivered_date+'</li>';
        summery_data += '<li><strong>Delivered Time : </strong>'+summery.delivered_time+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';
        summery_data += '</div>';
        summery_data += '</div>';
 name = summery.name_on_delivery;
        if(summery.name_on_delivery==""){
            name = summery.customer;
                    
        }       
        summery_data += '<div class="note note-warning col-lg-12" style="background-color: #FCF3E1;margin-bottom: 18px;margin-top: 19px;">';
        summery_data += '<h4 class="block">Customer Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li style="color:#B22222;"><strong>Name : </strong>'+name+'</li>';
        summery_data += '<li style="color:#B22222;" ><strong>Phone : </strong>'+summery.c_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div>';

        summery_data += '<div class="note note-info col-lg-12"style="background-color: #E8F6FC;margin-bottom: 18px">';
        summery_data += '<h4 class="block">Partner Information</h4>';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li style="color:#B22222;"><strong>Name : </strong>'+summery.vendor+'</li>';
        summery_data += '<li ><strong>Phone : </strong>'+summery.v_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        summery_data += '</div><br>';

        
        summery_data += '<div class="note note-success col-lg-12" style="background-color: #E8F6FC; margin-bottom: 18px">';
        summery_data += '<h4 class="block">Driver Information</h4>';
        
        if(summery.status == 'Not Assign'){
            
            
        }else{
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li><strong>Name : </strong>'+summery.driver+'</li>';
        summery_data += '<li><strong>Phone : </strong>'+summery.d_phone+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
        
        }
        summery_data += '</div> <br>';
        
        
         summery_data += '<br> <div class="note note-success col-lg-12" style="background-color: #FCF3E1; margin-bottom: 18px">';
        summery_data += '<h4 class="block">Tracking Information</h4>';
        
         summery_data += '<ol>';
         for(var ite=0; ite< tracking_details.length; ite++){
            
            var tracking=tracking_details[ite];
            // console.log(tracking);
            
            
       summery_data += '<li style="color:#B22222;">';
        summery_data += '<ul class="list-unstyled">';
        summery_data += '<li style="color:#B22222;"><strong>Name on Delivery : </strong>'+tracking.customer+'</li>';
        summery_data += '<li  style="color:#B22222;"><strong>Phone : </strong>'+tracking.number_on_delivery+'</li>';
        summery_data += '<li style="color:#B22222;"><strong>Vendor : </strong>'+tracking.vendor+'</li>';
      summery_data += '<li style="color:#B22222;"><strong>Delivery Address : </strong>'+tracking.delivery_address+'</li>';
      summery_data += '<li style="color:#B22222;"><strong>Delivery Date : </strong>'+tracking.delivery_date+'</li>';
//        summery_data += '<li><strong>Address : </strong>'+summery.delivery_address+'</li>';
        summery_data += '</ul>';
       
       summery_data += '</li>';     
        }
        summery_data += '</ol>';
          summery_data += '</div>';
        return summery_data;
    }
    $(document).on('change', '.checkAll', function(){
        $this = $(this);
        if($this.prop('checked'))
        {
            // $("#action_row").show();
            $(".checkboxes").prop('checked', true);
            $(".checkboxes").parent().parent().addClass("redd");
        }
        else
        {
            // $("#action_row").hide();
            $(".checkboxes").prop('checked', false);
            $(".checkboxes").parent().parent().removeClass("redd");
        }
    });
    $(document).on('change', '.checkboxes', function(){
        if($(this).prop('checked'))
            $(this).parent().parent().addClass("redd");
        else
            $(this).parent().parent().removeClass("redd");

        // if($(".checkboxes").length > 0)
        //     $("#action_row").show();
        // else
        //     $("#action_row").hide();
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
     function pause_planXYX_OLD(planID,CustomerID,dt){
        
       var rowId=planID;
       var mainid="pause_plan"+rowId;
       console.log(mainid);
               
        var dtt=new Date(dt);
        var tst_dt_y = new Date(dt);
        //   var froy=new Date(fro);
       
        if($("#"+mainid).hasClass("fa fa-pause")){
            
             tst_dt_y.setDate(dtt.getDate() + 1);
              var yyyy = tst_dt_y.getFullYear().toString();
              var mm = (tst_dt_y.getMonth()+1).toString(); // getMonth() is zero-based
              var dd  = tst_dt_y.getDate().toString();
              var final_date_Calculated= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
            
            
            // that starts with "+final_date_Calculated;
            var note=" This action will paused the current deliveries. ";
            
        }else{
            var note="This action will generate the new deliveries started from selected date. ";
        }
        
        // alert(note);
        // Exit();
        
        if(planID){
          
            
             Swal.fire({
                  title: 'Are you sure?',
                  text: note,
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, save changes!'
                }).then((result) => {
                  if (result.value) {
                      
                       if($("#"+mainid).hasClass("fa fa-pause")){
                                        
                                    //      $("#"+mainid).removeClass("fa-lock");
                                    //   $("#"+mainid).addClass( "fa-unlock" );
                                       
                                       $status_is ='Paused';
                                         $msg="Plan Paused Successfully!";
                                         
                                         
                                    }else{
                                        
                                         $status_is ='Active';
                                         $msg="Plan Activated Successfully!";
                                    }
                                                  
                        if($status_is =='Paused'){
                            var hit_url_is='<?php echo base_url('MonthlyMeal/paused_the_plan');?>';
                        }else if($status_is =='Active'){
                            var hit_url_is='<?php echo base_url('MonthlyMeal/de_freeze_the_planTTT');?>';
                        }else{
                            
                        }
                       
                       
                           $.ajax({
                                    url: hit_url_is,
                                    type: 'POST',
                                    data: {
                                        
                                        'id':planID,
                                        'status':$status_is,
                                  },
                                    success: function (res) {
                                        // alert(res);
                                        if(res=='No data Found'){
                                            swal.fire("No Upcoming Deliveries Found.", "", "error");
                                        }else if(res=='all done'){
                                            // Swal.fire({title:"Good job!",text:"You clicked the button!",type:"success",confirmButtonClass:"btn btn-confirm mt-2"})
                                        swal.fire({title:"Great!",text:$msg,type:"success",confirmButtonClass:"btn btn-confirm mt-2"}).then(function(){ 
                                            location.reload(); 
                                           
                                            });
                                        }else if(res=='Error'){
                                            
                                             swal.fire("Network Issue! Try again.", "", "error");
                                            
                                        }else{
                                            
                                        }
                                        
               
                                       
                                    },
                                    error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                        swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                            
                                        });
                                    }
                                });
                      
                        
                    }
                });
        
            
        }else{
           
        }
        
    }
    
     function play_plan(planID,CustomerID,dt){
        
     
        
   
      var rowId=planID;
    //     $("#"+rowId).css("background-color","red");
      
        var mainid="play_plan"+rowId;
        console.log(mainid);
               
            var dtt=new Date(dt);
           var tst_dt_y = new Date(dt);
        //   var froy=new Date(fro);
       
        if($("#"+mainid).hasClass("fa fa-play")){
            
             tst_dt_y.setDate(dtt.getDate() + 1);
              var yyyy = tst_dt_y.getFullYear().toString();
              var mm = (tst_dt_y.getMonth()+1).toString(); // getMonth() is zero-based
              var dd  = tst_dt_y.getDate().toString();
              var final_date_Calculated= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
            
            
            
            var note=" This action will resume/play the paused/hold deliveries OR reschedule deliveries according to selected date.";
            
        }else{
            // var note="This action will delete the freezed deliveries as defreezed and reschedule the deliveries";
            var note='Error';
        }
        
        // alert(note);
        // Exit();
        
        if(planID){
          
      

// confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
    Swal.fire({
        title: "Are you sure?",
        text: note,
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, Resume Previous.",
        cancelButtonText: "Yes, Choice Date & Reschedule.",
        confirmButtonClass: "btn btn-outline-warning mt-2",
        cancelButtonClass: "btn btn-outline-warning ml-2 mt-2",
        
        buttonsStyling: !1,
    }).then((result) => {
        console.log(result.value);
        console.log(result.dismiss === Swal.DismissReason.cancel)
        if(result.value){  
            
            // Swal.fire({
            //     title: "Deleted!",
            //     text: "Your file has been deleted.",
            //     type: "success" 
                
            // });
            
            
              
                       if($("#"+mainid).hasClass("fa fa-play")){
                           $status_is ='Active';
                           $msg="MealPlan Resumed Successfully!";
                       }
                       if($status_is =='Active'){
                            var hit_url_is='<?php echo base_url('MonthlyMeal/resume_plan');?>';
                        }else{
                            
                        }
                        
                        
                        
                        $.ajax({   url: hit_url_is,
                                    type: 'POST',
                                    data: {
                                           'id':planID,
                                           'status':$status_is,
                                          },
                                    success: function (res) {
                                        // alert(res);
                                        if(res=='No data Found'){
                                            swal.fire("Oops...", "No previous hold deliveries found to resume.", "warning");
                                        }else if(res=='all done'){
                                      
                                        swal.fire({title:"Great!",text:$msg,type:"success",confirmButtonClass:"btn btn-confirm mt-2"}).then(function(){ 
                                            location.reload(); 
                                           
                                            });
                                        }else if(res=='Error'){
                                             swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                                 });
                                            
                                        }
                             },
                            error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                        swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                       });
                                    }
                                });
            
            
        }else if(result.dismiss === Swal.DismissReason.cancel) { 
         
        //      Swal.mixin({ 
        //          input: "text", 
        //          confirmButtonText: "Next &rarr;", 
        //          showCancelButton: !0, 
        //          progressSteps: ["1", "2", "3"] })
        // .queue([{ title: "Question 1", text: "Enter MealPlan Days" }, {title:"Question 2",  text: "Enter MealPlan Days Note"} ])
        // .then((result) => {
        //     result.value && Swal.fire({ title: "All done!", html: "Your answers: <pre><code>" + JSON.stringify(result.value) + "</code></pre>", confirmButtonText: "Lovely!" });
        // });
        
       
         swal({
    title: "Select MealPlan Reschedule Start Date ?",
    html:'<input id="datetimepicker" class="form-control" autofocus>',
    type: "warning",
    onOpen: function() {
      $("#datetimepicker").flatpickr({minDate:new Date()});
          }
    }).then((result) => {
        
        console.log(result.value);
        if(result.value){
            // alert('hiiiiiiiiii');
            // alert($("#datetimepicker").val());
            
            if($("#"+mainid).hasClass("fa fa-play")){
                           $status_is ='Active';
                           $msg="MealPlan Resumed & Rescheduled Successfully!";
                       }
                       if($status_is =='Active'){
                            var hit_url_is_='<?php echo base_url('MonthlyMeal/resume_reschedule_plan');?>';
                        }else{
                            
                        }
            if($("#datetimepicker").val() !=''){
                   $.ajax({   url: hit_url_is_,
                                    type: 'POST',
                                    data: {
                                           'id':planID,
                                           'status':$status_is,
                                           'starting_dt':$("#datetimepicker").val()
                                          },
                                    success: function (res) {
                                        // alert(res);
                                        if(res=='No data Found'){
                                            swal.fire("Oops...", "No previous hold deliveries found to resume.", "warning");
                                        }else if(res=='all done'){
                                        swal.fire({title:"Great!",text:$msg,type:"success",confirmButtonClass:"btn btn-confirm mt-2"}).then(function(){ 
                                            location.reload(); 
                                           
                                            });
                                        }else if(res=='Error'){
                                             swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                                 });
                                            
                                        }else if(res=='Select Date Properly'){
                                             swal.fire("Oops...", "Select Date Properly.", "warning");
                                        }
                             },
                            error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                        swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                       });
                                    }
                                });
            }else{
                 swal.fire("Oops...", "Select Date Properly.", "warning");
            }
            
            
            
        }
        
    });  
            
            
            
        }else{
            
        }
    });


        
        
     
        
        
        
//  var buttons = $('<div>')
//     .append(createButton('Ok', function() {
//     //   swal.close();
//       console.log('ok'); 
//     })).append(createButton('Later', function() {
//     //   swal.close();
//       console.log('Later'); 
//     })).append(createButton('Cancel', function() {
//     //   swal.close();
//       console.log('Cancel');
//     }));
    
  
//     swal({
//       title: "Are you sure?",
//       html: buttons,
//       type: "warning",
//       showConfirmButton: false,
//       showCancelButton: false
//     });
            
       
        
    
        
            
        }else{
           
        }
        
    }
    
    function pause_plan(planID,CustomerID,dt){
        
     
        
   
      var rowId=planID;
    //     $("#"+rowId).css("background-color","red");
      
         var mainid="pause_plan"+rowId;
        console.log(mainid);
               
            var dtt=new Date(dt);
           var tst_dt_y = new Date(dt);
        //   var froy=new Date(fro);
       
        // if($("#"+mainid).hasClass("fa fa-pause")){
         if($("#"+mainid).hasClass("fa fa-pause")){    
             tst_dt_y.setDate(dtt.getDate() + 1);
              var yyyy = tst_dt_y.getFullYear().toString();
              var mm = (tst_dt_y.getMonth()+1).toString(); // getMonth() is zero-based
              var dd  = tst_dt_y.getDate().toString();
              var final_date_Calculated= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
            
            
            
            // var note=" This action will resume/play the paused/hold deliveries OR reschedule deliveries according to selected date.";
            var note=" This action will paused the current deliveries Or deliveries under selected date. ";
        }else{
            // var note="This action will delete the freezed deliveries as defreezed and reschedule the deliveries";
            var note='Error ';
        }
        
        // alert(note);
        // Exit();
        
        if(planID){
          
      

// confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
    Swal.fire({
        title: "Are you sure?",
        text: note,
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, Pause Current MealPlan.",
        cancelButtonText: "Yes, Choice Date & Pause.",
        confirmButtonClass: "btn btn-outline-warning mt-2",
        cancelButtonClass: "btn btn-outline-warning ml-2 mt-2",
        
        buttonsStyling: !1,
    }).then((result) => {
        // console.log(result.value);
        // console.log(result.dismiss === Swal.DismissReason.cancel)
        if(result.value){  
            
            // Swal.fire({
            //     title: "Deleted!",
            //     text: "Your file has been deleted.",
            //     type: "success" 
                
            // });
            
             if($("#"+mainid).hasClass("fa fa-pause")){
                                        
                                    //      $("#"+mainid).removeClass("fa-lock");
                                    //   $("#"+mainid).addClass( "fa-unlock" );
                                       
                                       $status_is ='Paused';
                                         $msg="Plan Paused Successfully!";
                                         
                                         
                                    }
                                                  
                        if($status_is =='Paused'){
                            var hit_url_is='<?php echo base_url('MonthlyMeal/paused_the_plan');?>';
                        }else if($status_is =='Active'){
                            // var hit_url_is='<?php echo base_url('MonthlyMeal/de_freeze_the_planTTT');?>';
                        }else{
                            
                        }
                       
                       
                           $.ajax({
                                    url: hit_url_is,
                                    type: 'POST',
                                    data: {
                                        
                                        'id':planID,
                                        'status':$status_is,
                                  },
                                    success: function (res) {
                                        // alert(res);
                                        if(res=='No data Found'){
                                            swal.fire("Oops...", "No Upcoming Deliveries Found.", "warning");
                                        }else if(res=='all done'){
                                            // Swal.fire({title:"Good job!",text:"You clicked the button!",type:"success",confirmButtonClass:"btn btn-confirm mt-2"})
                                        swal.fire({title:"Great!",text:$msg,type:"success",confirmButtonClass:"btn btn-confirm mt-2"}).then(function(){ 
                                            location.reload(); 
                                           
                                            });
                                        }else if(res=='Error'){
                                            
                                             swal.fire("Network Issue! Try again.", "", "error");
                                            
                                        }else if(res=='No data Found for'){
                                            swal.fire("Oops...", "No Deliveries Found. Try Again.", "warning");
                                        }else{
                                            swal.fire("Oops...", "Try Again.", "warning");
                                        }
                                        
               
                                       
                                    },
                                    error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                        swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                            
                                        });
                                    }
                                });
            
            
              
                       
            
        }else if(result.dismiss === Swal.DismissReason.cancel) { 
        
         swal({
    title: "Select MealPlan Pause From Date ?",
    html:'<input id="datetimepicker" class="form-control" autofocus>',
    type: "warning",
    onOpen: function() {
      $("#datetimepicker").flatpickr({minDate:new Date()});
          }
    }).then((result) => {
        
        console.log(result.value);
        if(result.value){
            // alert('hiiiiiiiiii');
            // alert($("#datetimepicker").val());
            
             if($("#"+mainid).hasClass("fa fa-pause")){
                                        
                                    //      $("#"+mainid).removeClass("fa-lock");
                                    //   $("#"+mainid).addClass( "fa-unlock" );
                                       
                                       $status_is ='Paused';
                                         $msg="Plan Paused Successfully!";
                                         
                                         
                                    }
                       if($status_is =='Paused'){
                            var hit_url_is_='<?php echo base_url('MonthlyMeal/pause_fromdate_plan');?>';
                        }else{
                            
                        }
            if($("#datetimepicker").val() !=''){
                   $.ajax({   url: hit_url_is_,
                                    type: 'POST',
                                    data: {
                                           'id':planID,
                                           'status':$status_is,
                                           'starting_dt':$("#datetimepicker").val()
                                          },
                                    success: function (res) {
                                        // alert(res);
                                        if(res=='No data Found'){
                                            swal.fire("Oops...", "No Upcoming Deliveries Found.", "warning");
                                        }else if(res=='all done'){
                                        swal.fire({title:"Great!",text:$msg,type:"success",confirmButtonClass:"btn btn-confirm mt-2"}).then(function(){ 
                                            location.reload(); 
                                           
                                            });
                                        }else if(res=='Error'){
                                             swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                                 });
                                            
                                        }else if(res=='No data Found for'){
                                            swal.fire("Oops...", "No Deliveries Found. Try Again.", "warning");
                                        }else if(res=='Select Date Properly'){
                                             swal.fire("Oops...", "Select Date Properly.", "warning");
                                        }else{
                                             swal.fire("Oops...", "Try Again.", "warning");
                                               location.reload();
                                        }
                             },
                            error: function (err) {
                                        console.log('eeeeeeeeeeeeeeeeeerroorrrrrr');
                                        console.log(err);
                                        swal.fire("Network Issue! Try again.", "", "error").then(function(){ 
                                            location.reload(); 
                                       });
                                    }
                                });
            }else{
                 swal.fire("Oops...", "Select Date Properly.", "warning");
            }
            
            
            
        }
        
    });  
            
            
            
        }else{
            
        }
    });


        
        
     
        
        
        
//  var buttons = $('<div>')
//     .append(createButton('Ok', function() {
//     //   swal.close();
//       console.log('ok'); 
//     })).append(createButton('Later', function() {
//     //   swal.close();
//       console.log('Later'); 
//     })).append(createButton('Cancel', function() {
//     //   swal.close();
//       console.log('Cancel');
//     }));
    
  
//     swal({
//       title: "Are you sure?",
//       html: buttons,
//       type: "warning",
//       showConfirmButton: false,
//       showCancelButton: false
//     });
            
       
        
    
        
            
        }else{
           
        }
        
    }
    
    

     
</script>
       
    </body>
    <style type="text/css">
        table tr td a {
            color: #00afe2 !important;
        }
        .redd{
            background: lightblue;
            color: black !important;
        }

        .redd:hover{
            background: white;
        }
    </style>
</html>