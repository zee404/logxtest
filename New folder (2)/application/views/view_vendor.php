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
                <div class="row">
                    <div class="col-12">
                         <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Partner </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Partner Detail</a></li>
                                  
                                </ol>
                            </div>
                             <h4 class="page-title"> Partner Detail</h4>
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                  <div class="card-box" id="print_box">
                                       <form id="add_vendor_form"  method="post" class="horizontal-form" enctype="multipart/form-data">
                                <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Full Name</label>
                                            <p id="name"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Email<span class="required">*</span></label>
                                            <p id="email"></p>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Phone<span class="required">*</span></label>
                                             <p id="phone"></p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Address</label>
                                           <p id="address"></p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Password*</label>
                                        <div class="input-group" style="">
                                             <p id="s_pass"></p>
                                         
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div id="output"></div>
                                            <label class="control-label">Select Module<span class="required">*</span></label>
                                            <p id="module"  ></p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm-4" id="cf">
                                        <label for="contract_file">Contract File* <small>(.Pdf / .Doc) file format only</small></label>
                                        <p id="contract_file"></p>
                                        
                                       
                                    </div>
                                    
                                    
                                     <div class="col-md-2">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Term<span class="required">*</span></label>
                                             <p id="term"></p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Invoice Email<span class="required">*</span></label>
                                             <p id="inv_email"></p>
                                           
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Other Email</label>
                                             <p id="other_email"></p>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">MealPlaner Email</label>
                                             <p id="plan_email"></p>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Invoice Address<span class="required">*</span></label>
                                             <p id="inv_address"></p>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">TRN Number<span class="required">*</span></label>
                                             <p id="trn"></p>
                                           
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <h4>Delivery Quotations</h4>
                                <div class="delivery_firstbox">
                                    <div class="row" id="delivery_row_block_0">
                                        <div class="col-sm-3">
                                            <label for="price">Select Emirate *</label>
                                           <p id="emirate"></p>
                                      
                                       </div>
                                       
                              
                                        <div class="col-sm-3">
                                            <label for="price">Service Type *</label>
                                             <p id="service_type"></p>
                                           
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="price">Price*</label>
                                             <p id="price"></p>
                                          
                                        </div>
                                        <div class="col-sm-2">
                                        <label for="same_loc_price">Same Location Price*</label>
                                           <p id="same_loc_price"></p>
                                       
                                        </div>
                                       
                                       
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="delivery_pricing-box"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message"><h5>Custom delivery message for customer</h5></label>
                                        <p id="delivery_message"></p>
                                       
                                    </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <h4>Bags Collection Quotation</h4>
                                <div class="bag_firstbox">
                                    <div class="row" id="bag_row_block_0">
                                        <div class="col-sm-3">
                                            <label for="emirate">Select Emirate *</label>
                                            <p id="emirate"></p>
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="service_type">Service Type *</label>
                                              <p id="service_type"></p>
                                           
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="price">Price*</label>
                                              <p id="price"></p>
                                           
                                        </div>
                                        <div class="col-sm-2">
                                        <label for="same_loc_price">Same Location Price*</label>
                                          <p id="same_loc_price"></p>
                                        
                                            
                                        </div>
                                       
                                        
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="bag_pricing-box"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message"><h5>Custom bag message for customer</h5></label>
                                        <p id="bag_message"></p>
                                      
                                    </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <h4>Cash Collection Quotation</h4>
                                <div class="cash_firstbox">
                                    <div class="row" id="cash_row_block_0">
                                        <div class="col-sm-3">
                                            <label for="emirate">Select Emirate *</label>
                                            <p id="emirate"></p>
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="service_type">Service Type *</label>
                                              <p id="service_type"></p>

                                        </div>
                                        <div class="col-sm-2">
                                            <label for="price">Price*</label>
                                             <p id="price"></p>
                                        
                                        </div>
                                        <div class="col-sm-2">
                                        <label for="same_loc_price">Same Location Price*</label>
                                         <p id="same_loc_price"></p>
                                           
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="cash_pricing-box"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message"><h5>Custom cash collection message for customer</h5></label>
                                        <p id="cash_message"></p>
                                        
                                    </div>
                                    </div>
                                    
                                </div>
                                <br>
                                
                               
                                   
                                    <button id="responsive" style="background: black;color: white;" onclick="close_()" type="button" data-dismiss="modal" class="btn default">Close</button>
                                    <button id="print" style="background: black;color: white;" onclick="PrintElem('print_box')" type="button" class="btn default">Print</button>
                               
                             
                            </form>
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
    function close_(){
        window.location.href="<?php echo base_url('Partner') ?>";
    }

    
</script>

 
<script type="text/javascript">



function add_new_deliver_row(id){
    id = parseInt(id) + 1;
    var delivery_row = '<div class="row" id="delivery_row_block_'+id+'"><div class="col-sm-3"><label for="emirate">Select Emirate *</label><p id="emirate"></p></div><div class="col-sm-3"><label for="service_type">Service Type *</label><p id="service_type"></p></div><div class="col-sm-2"><label for="price">Price*</label><p id="price"></p></div><div class="col-sm-2"><label for="same_loc_price">Same Location Price*</label><p id="same_loc_price"></p></div></div><hr>';
    $(".delivery_pricing-box").append(delivery_row);
}



function add_new_bag_row(id){


    id = parseInt(id) + 1;
     var bag_row = '<div class="row" id="bag_row_block_'+id+'"><div class="col-sm-3"><label for="emirate">Select Emirate *</label><p id="emirate"></p></div><div class="col-sm-3"><label for="service_type">Service Type *</label><p id="service_type"></p></div><div class="col-sm-2"><label for="price">Price*</label><p id="price"></p></div><div class="col-sm-2"><label for="same_loc_price">Same Location Price*</label><p id="same_loc_price"></p></div></div><hr>';
    

    $(".bag_pricing-box").append(bag_row);
}



function add_new_cash_row(id){
   

    id = parseInt(id) + 1;
     var cash_row = '<div class="row" id="cash_row_block_'+id+'"><div class="col-sm-3"><label for="emirate">Select Emirate *</label><p id="emirate"></p></div><div class="col-sm-3"><label for="service_type">Service Type *</label><p id="service_type"></p></div><div class="col-sm-2"><label for="price">Price*</label><p id="price"></p></div><div class="col-sm-2"><label for="same_loc_price">Same Location Price*</label><p id="same_loc_price"></p></div></div><hr>';
     
    $(".cash_pricing-box").append(cash_row);
}




// $("#add_vendor_form").submit(function());
<?php if (!empty($this->uri->segment(3))) { ?>

    get_vendor_by_id(<?php echo $this->uri->segment(3) ?>);
<?php } ?>
 function get_vendor_by_id(id){
    var url = "<?php echo base_url(); ?>"+"vendor/get_vendor_by_id";
    $fields = {'vendor_id':id};
    $.post(url, $fields, function(response){
        if(response.success) {
            console.log(response);
            var vendor = response.vendor[0];
            $("#name").html(vendor.full_name);
            $("#email").html(vendor.email);
            
            $("#phone").html(vendor.phone);
            $("#address").html(vendor.address);
            $("#s_pass").html(vendor.Password_partner);
            $("#delivery_message").html(vendor.delivery_message);
            $("#bag_message").html(vendor.bag_message);
            $("#cash_message").html(vendor.cash_message);
            
            $("#term").html(vendor.term);
            
             $("#inv_email").html(vendor.inv_email);
              $("#other_email").html(vendor.other_email);
               $("#inv_address").html(vendor.inv_address);
                $("#trn").html(vendor.trn);
            
              $("#plan_email").html(vendor.emails_for_mealplan);
         
            var selectedMods = vendor.modules ? vendor.modules.split(',') : [];
            selectedMods.forEach(function(mod){
                $("#module").append(mod+', ');
                
                
            });

           
        
            
            
      
            

            
             // var xyz_file=vendor.contract_file;
             // $('#contract_file').val(vendor.contract_file);
               var xyz_file=vendor.contract_file;
              if(xyz_file == ''){
                  $("#contract_file").append("<span><a id='av' style='color:red;'><b>Not Available</b></a></span>");
            
              }else{
                   $("#contract_file").append("<span><a id='av' style='color:green;'><b>Available</b></a></span>");
                      $('#av').attr("href",xyz_file);
                  
              }
         
              
           
            
            
            // var filename = uurl.split('//').pop();
            // filename =filename.split('/').pop();
            // console.log(filename);
           //  $("#contract_file").val(filename);
            
            console.log('i am start loop');
            //var bags = response.bags_qout[0];
            
        //  //DELIVERY QOUTS   
            for(let i = 0; i < response.deliv_qout.length; i++){
                
                let childArray = response.deliv_qout[i];
                 if(i>0){
                     var idd=childArray.id;
                     var jj=i-1;
                        add_new_deliver_row(jj);
                    }
             console.log('i am cash qouts counter of i :'+i);
            $('#delivery_row_block_'+i+' >div>p[id="emirate"]').html(childArray.tbl_emi_names);
            $('#delivery_row_block_'+i+' >div>p[id="service_type"]').html(childArray.tbl_serv_names);
            $('#delivery_row_block_'+i+' >div>p[id="price"]').html(childArray.tbl_deliv_price);
            $('#delivery_row_block_'+i+' >div>p[id="same_loc_price"]').html(childArray.tbl_deliv_same_loc_p);
           
           
          
                  
            
         }
         
        //BAGS QOUTS
        
            for(let i = 0; i < response.bags_qout.length; i++){
                
                let childArray = response.bags_qout[i];
                
                 if(i>0){
                    var idd=childArray.id;
                    var jj=i-1;
                     add_new_bag_row(jj);
                        
                    }
                  
              $('#bag_row_block_'+i+' >div>p[id="emirate"]').html(childArray.tbl_emi_names);
              $('#bag_row_block_'+i+' >div>p[id="service_type"]').html(childArray.tbl_serv_names);
              $('#bag_row_block_'+i+' >div>p[id="price"]').html(childArray.tbl_bag_price);
              $('#bag_row_block_'+i+' >div>p[id="same_loc_price"]').html(childArray.tbl_bag_same_loc_p);
             
             
                  
                }
                
        //CASH QOUTS
        
         for(let i = 0; i < response.cash_qout.length; i++){
                
                let childArray = response.cash_qout[i];
                
                if(i>0){
                    var idd=childArray.id;
                    var jj=i-1;
                     add_new_cash_row(jj);
                        
                    }
                  
             $('#cash_row_block_'+i+' >div>p[id="emirate"]').html(childArray.tbl_emi_names)
              $('#cash_row_block_'+i+' >div>p[id="service_type"]').html(childArray.tbl_serv_names);
              $('#cash_row_block_'+i+' >div>p[id="price"]').html(childArray.tbl_cash_price);
              $('#cash_row_block_'+i+' >div>p[id="same_loc_price"]').html(childArray.tbl_cash_same_loc_p);
             
                }
        }
    },'json');
}
        

    
  
//shan
<?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>

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

    mywindow.print();
    mywindow.close();

    return true;
}
</script>
    </body>
</html>