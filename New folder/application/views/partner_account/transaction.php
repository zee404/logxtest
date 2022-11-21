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
        
         <link href="<?php echo base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <!--<link href="<?php echo base_url() ?>assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />-->
        
        <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />-->

        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />

        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
             .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

        }
        div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
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
    color: lightseagreen;
    font-size: 11.5px !important;
}



.select2-drop-active{
    margin-top: -25px;
}

.yellow {
          background-color: lightblue;
        }
        
        
        
.select2-drop-active{
    margin-top: -25px;
}

.select2-container--default .select2-selection--single {
    /* background-color: #fff; */
    /* border: 1px solid #aaa; */
    border-radius: 4px;
    height: 36px;
    width:250px;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Accounts </a></li>
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Partners</a></li>



                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Balance</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Balance Detail</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" >
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    <div class="col-lg-3">
                         <div class="page-title-box">
                            
                            <h4 class="page-title" style="margin-top: -36px;">Manage Balance Transactions</h4>

                        </div>

                    </div>
                      
                     <div class="col-lg-2"><?php if($this->session->userdata('role_id') == 1){ ?>
                             
                                
                                   <br>
                                   <button style="margin-left: 167px;margin-top: -57px;color: #fff;background-color: #197990 !important;border-color: white;" disabled class="btn btn-secondary buttons-csv buttons-html5 button" tabindex="0" id="button" aria-controls="demo-custom-toolbar" type="button"><span>Delete</span></button>

                                    <br>
                            <?php } echo form_close(); ?></div>
                    <div class="col-lg-2"> </div>
                     <div class="col-lg-1"></div>
                        
                   
                    
                     
                    
                 
                   
                </div>   
                
                
                
                  <div class="row"><p></p></div>
                 <div class="row">
                     
                      <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>" >
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?= date('Y-m-d'); ?>">
                                        <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to" id="to_date" value="<?php  echo date('Y-m-d', strtotime($cdate. ' + 1 days')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php if (strtolower($this->session->userdata('role')) != 'vendor') { ?>  
                     <div class="col-lg-3">
                        <select class="search_option form-control" name="search_option" id="search_option">
                            <option value="">--Select Partner--</option>
                            
                           <?php if (count($vendors) > 0) { ?>
                              <?php foreach($vendors as $data){ ?>
                               <option class="" value="<?php echo $data->id; ?>" > <?php echo  $data->full_name; ?> , <?php echo  $data->email; ?></option>
                               <?php } ?>
                
                                     <?php } ?>
                           
                            
                        </select>
                            </div> 
                            <?php } ?>
                            
                    <div class="col-lg-2">
                          <div class="btn-group">
                                <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report </button>
                        </div>
                                  

                    </div>
                     </div>
                    
                    <?php if (strtolower($this->session->userdata('role')) != 'vendor') { ?>  
                     <div class="row">
                           <div class="col-lg-6">
                               </div>
                     <div class="col-lg-6">
             
                    <div id="" class="btn-group" >
                            <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;margin-top: 10px;border-color: white;">Add TopUp &nbsp;</button>
                            </a>
                            &nbsp;
                             <a href="#responsive_addi" onclick="javascript:show_model(this)" flag="addi" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;margin-top: 10px;border-color: white;">Add Additional Charges &nbsp;</button>
                            </a>
                            &nbsp;
                             <a href="#responsive_waived" onclick="javascript:show_model(this)" flag="waived" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;margin-top: 10px;border-color: white;">Add Waive Off &nbsp;</button>
                            </a>
                    </div>
                     </div>
                </div>   
                            
                   <?php } ?>     
                        
               
                            
                          

                       
                         </div>  
                    
                    
                    
                
      
                          
                          
                               <!--<div class="card-box" style="overflow: auto;">  -->
                             <div class="card-box" style="overflow-x: auto;">  
                            <!--<table class="example table dataTable  table-bordered table-hover" id="example" data-toggle="table" >-->
                               <table class="example table table-responsive table-bordered table-hover" style="display: table; overflow-x: auto;" id="example">

                                <thead  style="background-color: #f1f5f7">

                                <tr   >
                                     <!--<th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" ></th>-->
                                  
                                  
                                     <!--<th></th>-->
                                    <th  style="min-width: 30px" data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    
                                    <!--<th data-align="center" data-field="inv_id" data-sortable="true">Invoice #</th>-->
                                    
                                    
                                    
                                    <th style="min-width: 100px;" data-align="center" data-field="partner" data-sortable="true">Partner</th>
                                    <th style="min-width: 100px;" data-align="center" data-field="typr"   data-sortable="true">Type</th>
                                    <th style="min-width: 100px;" data-align="center" data-field="amount" data-sortable="true">Amount</th>
                                    <th style="min-width: 150px;" data-align="center" data-field="notes"    data-sortable="true">notes</th>
                                    
                                      <th style="min-width: 120px;" data-align="center" data-field="receipt" data-sortable="true">Receipt</th>
                                     <th style="min-width: 80px" data-align="center" data-field="from" data-sortable="true">From</th>
                                     <th style="min-width: 80px" data-align="center" data-field="to" data-sortable="true">To</th>
                                    
                                       
                                   <th style="min-width: 100px" data-align="center" data-field="by" data-sortable="true">Created_by</th>
                                    <th style="min-width: 100px" data-align="center" data-field="at" data-sortable="true">Created_at</th>
                                   
                                    
                                   
                                   
                                    <!--<th data-field="" data-align="center" data-sortable="true" data-formatter="">Details</th>-->
                                     
                                    

                                </tr>
                                
                                
                                </thead>

                                <tbody id="table_body">
                                   
                                <?php if (count($invoices) > 0) { ?>
                              <?php foreach($invoices as $key => $invoices_data){ ?>   
                                   <tr>
                                
                                    <!--<td><input type="checkbox" class="checkboxes" value="<?php //echo $invoices_data->id; ?>"   / id="" /  name="checkbox"></td>-->
                                           
                                    <td ><?php echo $key+1; ?></td>
                                    
                                    <td ><?php echo $invoices_data->name; ?></td>
                                    
                                 <?php   if($invoices_data->type =='Credit'){ ?>
                
                                        <td style="font-weight: bold; color:#0c710cb8;"><?php echo $invoices_data->type; ?> </td>
                                        <td style="font-weight: bold; color:#0c710cb8;"><?php echo $invoices_data->amount; ?> &nbsp د.إ</td>
            
                                      <?php   }else if($invoices_data->type =='Waive Off'){ ?>
                 
                                        <td style="font-weight: bold; color:#ffff00b0;"><?php echo $invoices_data->type; ?> </td>
                                        <td style="font-weight: bold; color:#ffff00b0;"> <?php echo $invoices_data->amount; ?> &nbsp د.إ</td>
           
                                      <?php   }else if($invoices_data->type=='Extra Charged'){ ?>
                
                                        <td style="font-weight: bold; color:#ff0000ad;">- <?php echo $invoices_data->type; ?> </td>
                                        <td style="font-weight: bold; color:#ff0000ad;">- <?php echo $invoices_data->amount; ?> &nbsp د.إ</td>
           
                                      <?php   }else{ ?>
                
                                      <?php  } ?>
                                    
                                    <td ><?php echo $invoices_data->notes; ?> </td>
                                   
                                    
                                    
                                   <td>
                                     <?php if( $invoices_data->receipt !='' OR $invoices_data->receipt !=NULL){ ?>
                 <a class="Green" alt="Proof Image" title="Click to View" target="_blank" href="<?php echo base_url().$invoices_data->receipt; ?>"> <img src="<?php echo base_url().$invoices_data->receipt; ?>" width="50%" class="img-responsive img-thumbnail"></a>
            <?php   }else{ ?>
                   <span class="Red">Not Available </span>
              <?php  } ?>
              </td>                         
                                    
                                    
                                    <td ><?php echo $invoices_data->from_dt; ?></td>
                                    
                                     <td ><?php echo $invoices_data->to_dt ; ?> </td>
                                     <td><?php echo $invoices_data->created_by; ?> </td>
                                    <td ><?php echo $invoices_data->created_at; ?> </td>
                                   
                                   
                                    
                                    <!--<td ><button onclick="get_detail(<?php echo $invoices_data->invoice_id; ?>,'v')" flag="<?php echo $invoices_data->invoice_id; ?>" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">View Details</button>&nbsp; -->
                                    <!--<button onclick="get_detail(<?php echo $invoices_data->invoice_id; ?>,'d')" flag="<?php echo $invoices_data->invoice_id; ?>" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Download Details</button>-->
                         
                         
                                    <!--</td>-->
                                     </tr>
                                    

                               
                                
                                
                                <?php } ?>
         <?php } ?> 
                               
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

  
                 <div id="responsive" class="modal fade" aria-hidden="true">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header"style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add Balance</h4>
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            
                        </div>

                        <div class="modal-body">
                            

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>
                            
                           

                           <div id="form_body" class="portlet-body form">
                                <!-- BEGIN FORM test/ save_new_invoice -->
                                    <input type="hidden" name="id" value="0" id="vehicle_id" class="form-control">
                                   
                                    <div class="row" id="driver_Selecet_portion">
                                        <div class="col-md-9"> 
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Select Partner <span class="required">*</span></label>
                                                 <select class="js-example-basic-single "  data-toggle="select2" name="partner" id="partner" required>
                                                 <!--<select class="form-control"  name="partner" id="partner">-->
                                                      <option value="">---Select---</option>
                                                           <?php if (count($vendors) > 0) { ?>
                                                              <?php foreach($vendors as $data){ ?>
                                                               <option class="" value="<?php echo $data->id; ?>"> <?php echo  $data->full_name; ?> , <?php echo  $data->email; ?></option>
                                                               <?php } ?>
                                                
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                    
                                      <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Full Name</label>
                                                <p id="name_p"> </p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Email </label>
                                                <p id="email" ></p>
                                                  </div>
                                        </div>
                                        
                                       

                                    </div>
                                    
                                   
                                      
                                         <div class="row">
                                             
                                              <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Phone</label>
                                                <p id="phone" ></p>
                                            </div>
                                        </div>
                                        
                                           <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Pendings</label>
                                                <p id="pend"></p>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    
                                    
                                    
                                      
                                     
                                    <hr>
                                    
                                   
                                        <label class="control-label">Select From & To Date</label>
                                      
                                     <div class="row">
                                        
                                     <?php 
                   $cdate1 = date('Y-m-d');
                    ?>
                       
                            <div class="form-group">
                                <div class="col-md-12">
                                     
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>" >
                                        <!--<label class="control-label">Start Date</label>-->
                                        <input type="text" class="form-control" name="from_n" id="from_date_n" value="<?= date('Y-m-d'); ?>">
                                        <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp; <label class="control-label">To</label>&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to_n" id="to_date_n" value="<?php  echo date('Y-m-d', strtotime($cdate1. ' + 1 days')); ?>">
                                    </div>
                                </div>
                            </div>
                       

                                    </div>
                                    
                       
                       
                                <div >
                                    <div class="row">
                                      
                                       <div class="col-sm-5">
                                            <label for="amount">Amount</label>
                                            <input class="form-control" name="amount" id="amount" placeholder="(AED)"
                                            
                                             oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0"
                                                             >
                                        </div>
                                        
                                        
                                         <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="control-label">Upload Transaction Receipt</label>
                                <input type="file" name="i_image" id="i_image" class="form-control">
                                <span id="i_img_msg" style="color: red"></span>
                                <img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_i_image">
                            </div>
                        </div>
                                       
                                        
                                   </div>
                                   
                                   
                                   <div class="row">
                                        <div class="col-sm-6">
                                           
                                            <label class="control-label" for="notes">Notes </label>
                                            
                                            <textarea name="notes" id="notes" class="form-control" rows="2" cols="50" ></textarea>
                                           
                                        </div>
                                   </div>
                                </div>
                                
                            
                        <div class="modal-footer">
                          
                             <a id="save_vendor_btn"  style="color: #fff;background-color: #197990 !important;"  class="btn blue">Save</a>
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue" style="color: #fff;background-color: #197990 !important;">Close</button>
                        </div>
                        
                        
                       
                                
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            
            
            
           
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        
        
        <!-- Model for Update VAT-->
          <div id="responsive_vat" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" style="width: 300px">
                    <div class="modal-content" style="width: 380px;">
                        <div class="modal-header"style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <h4 class="modal-title" id="mod_title" style="color: white;">Update Vat</h4>
                            <button type="button" onclick="close_model_vat()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            
                        </div>

                        <div class="modal-body">
                            

                            <div id="error_container_vat" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg_vat(this)" type="button"></button>
                                <p id="error_msg_vat"></p>
                            </div>
                            
                           

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form  id="vat_form" action="#" method="post" class="horizontal-form" >
                                    <input type="hidden" name="vat_id" value="" id="vat_id" class="form-control">

                                    <div class="row">
                                       

                                        <div class="col-md-6">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Enter VAT <span class="required">*</span></label>
                                                <input   name="VAT_" id="VAT_" class="form-control" required 
                                                oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "4"
                                                             step="0.01"
                                                             min="0"/>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button"  onclick="save_vat()" class="btn blue" style="color: #fff;background-color: #197990 !important;" > Update</button>
                            <button id="responsive" onclick="close_model_vat()" type="button" data-dismiss="modal" class="btn blue" style="color: #fff;background-color: #197990 !important;">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            
            
               <!--Model for waived off start-->
               
               <div id="responsive_waived" class="modal fade" aria-hidden="true">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header"style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <h4 class="modal-title" id="mod_title_w" style="color: white;">Add Waived Amounts</h4>
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            
                        </div>

                        <div class="modal-body">
                            

                            <div id="error_container_w" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg_w"></p>
                            </div>
                            
                           

                            <div class="portlet-body form">
                                <!-- BEGIN FORM test/ save_new_invoice -->
                                <form id="add_area_form" action="<?php echo base_url('Account/add_waived') ?>" method="post" class="horizontal-form-lg" >
                                    <input type="hidden" name="driver_info_id" value="" id="driver_info_id" class="form-control">

                                    <div class="row" id="driver_Selecet_portion_w">
                                        <div class="col-md-9"> 
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Select Partner <span class="required">*</span></label>
                                                 <select class="js-example-basic-single "  data-toggle="select2" name="partner_w" id="partner_w" required>
                                                 <!--<select class="form-control"  name="partner" id="partner">-->
                                                      <option value="">---Select---</option>
                                                           <?php if (count($vendors) > 0) { ?>
                                                              <?php foreach($vendors as $data){ ?>
                                                               <option class="" value="<?php echo $data->id; ?>"> <?php echo  $data->full_name; ?> , <?php echo  $data->email; ?></option>
                                                               <?php } ?>
                                                
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                     <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Full Name</label>
                                                <p id="name_p_w"> </p>
                                                 <input type="hidden" name="name_p_ww" value="" id="name_p_ww" class="form-control">

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Email </label>
                                                <p id="email_w" ></p>
                                                 </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Phone</label>
                                                <p id="phone_w" ></p>
                                            </div>
                                        </div>

                                    </div>
                                    
                                   
                                      
                                        
                                   <br>
                                    
                                   
                                        <label class="control-label">Select Start & End Date</label>
                                       
                                     <div class="row">
                                        
                                       
                                        
                                         <?php 
                   $cdate1 = date('Y-m-d');
                    ?>
                       
                            <div class="form-group">
                                <div class="col-md-12">
                                     
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>" >
                                        <!--<label class="control-label">Start Date</label>-->
                                        <input type="text" class="form-control" name="from_n" id="from_date_n_w" value="<?= date('Y-m-d'); ?>">
                                        <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp; <label class="control-label">To</label>&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to_n" id="to_date_n_w" value="<?php  echo date('Y-m-d', strtotime($cdate1. ' + 1 days')); ?>">
                                    </div>
                                </div>
                            </div>
                       

                                    </div>
                                   
                                      <label class="control-label">Add  Notes</label>
                                      
                                      
                                      <hr>
                                <div class="delivery_firstbox">
                                    <div class="row" id="delivery_row_block_0">
                                       
                                        <div class="col-sm-6">
                                           
                                            <label class="control-label" for="description">Description </label>
                                            
                                            <textarea name="description[]" id="description" class="form-control" rows="2" cols="50" ></textarea>
                                           
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="price">Amount</label>
                                            <input class="form-control" name="delivery_price[]" id="price" placeholder="(AED)"
                                            
                                             oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0"
                                                             >
                                        </div>
                                       
                                        <div class="col-sm-2" id="btn_box_0">
                                            <button id="add_delivery_row_btn_0" onclick="add_new_deliver_row(0)" type="button" style="color: #fff;background-color: #197990 !important;margin-top: 26px;" class="btn green" title="ADD"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button id="remove_delivery_row_btn_0" onclick="remove_delivery_row(0)" type="button" style="color: #fff;background-color: #197990 !important;margin-top: 26px; display: none;" class="btn green" title="REMOVE"><i class="icon-close"></i></button>
                                        </div>
                                       
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="delivery_pricing-box"></div>
                                

<!--onclick="save_()"-->
                        <div class="modal-footer">
                            <button id="save" type="submit"  class="btn blue" style="color: #fff;background-color: #197990 !important;">Save</button>
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue" style="color: #fff;background-color: #197990 !important;">Close</button>
                        </div>
                        
                        
                        </form>
                                
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            
               <!--waived model end-->
               
               
                <!--Model for additional start-->
               
               <div id="responsive_addi" class="modal fade" aria-hidden="true">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header"style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <h4 class="modal-title" id="mod_title_a" style="color: white;">Add Additional Charges</h4>
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            
                        </div>

                        <div class="modal-body">
                            

                            <div id="error_container_w" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg_w"></p>
                            </div>
                            
                           

                            <div class="portlet-body form">
                                <!-- BEGIN FORM test/ save_new_invoice -->
                                <form id="add_area_form" action="<?php echo base_url('Account/add_additionals') ?>" method="post" class="horizontal-form-lg" >
                                    <input type="hidden" name="driver_info_id_x" value="" id="driver_info_id" class="form-control">

                                    <div class="row" id="driver_Selecet_portion_a">
                                        <div class="col-md-9"> 
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Select Partner <span class="required">*</span></label>
                                                 <select class="js-example-basic-single "  data-toggle="select2" name="partner_a" id="partner_a" required>
                                                 <!--<select class="form-control"  name="partner" id="partner">-->
                                                      <option value="">---Select---</option>
                                                           <?php if (count($vendors) > 0) { ?>
                                                              <?php foreach($vendors as $data){ ?>
                                                               <option class="" value="<?php echo $data->id; ?>"> <?php echo  $data->full_name; ?> , <?php echo  $data->email; ?></option>
                                                               <?php } ?>
                                                
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                     <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Full Name</label>
                                                <p id="name_p_a"> </p>
                                                 <input type="hidden" name="name_p_aa" value="" id="name_p_aa" class="form-control">

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Email </label>
                                                <p id="email_a" ></p>
                                                 </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Phone</label>
                                                <p id="phone_a" ></p>
                                            </div>
                                        </div>

                                    </div>
                                    
                                   
                                      
                                        
                                   <br>
                                    
                                   
                                        <label class="control-label">Select Start & End Date</label>
                                       
                                     <div class="row">
                                        
                                       
                                        
                                         <?php 
                   $cdate1 = date('Y-m-d');
                    ?>
                       
                            <div class="form-group">
                                <div class="col-md-12">
                                     
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>" >
                                        <!--<label class="control-label">Start Date</label>-->
                                        <input type="text" class="form-control" name="from_n_a" id="from_date_n_a" value="<?= date('Y-m-d'); ?>">
                                        <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp; <label class="control-label">To</label>&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to_n_a" id="to_date_n_a" value="<?php  echo date('Y-m-d', strtotime($cdate1. ' + 1 days')); ?>">
                                    </div>
                                </div>
                            </div>
                       

                                    </div>
                                   
                                      <label class="control-label">Add  Notes</label>
                                      
                                      
                                      <hr>
                                <div >
                                    <div class="row" >
                                       
                                        <div class="col-sm-6">
                                           
                                            <label class="control-label" for="description_a">Description </label>
                                            
                                            <textarea name="description_a" id="description_a" class="form-control" rows="2" cols="50" ></textarea>
                                           
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="price">Amount</label>
                                            <input class="form-control" name="amount_a" id="amount_a" placeholder="(AED)"
                                            
                                             oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0"
                                                             >
                                        </div>
                                       
                                        
                                    </div>
                                    <hr>
                                </div>
                                
                              
                                

<!--onclick="save_()"-->
                        <div class="modal-footer">
                            <button id="save" type="submit"  class="btn blue" style="color: #fff;background-color: #197990 !important;">Save</button>
                            <button id="responsive" onclick="close_model()" type="button" data-dismiss="modal" class="btn blue" style="color: #fff;background-color: #197990 !important;">Close</button>
                        </div>
                        
                        
                        </form>
                                
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            
               <!--additional model end-->

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
        
        
          <script src="<?php echo base_url() ?>assets/libs/multiselect/jquery.multi-select.js"></script>
          
          <!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>-->
        <script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script>
        <!--<script src="<?php echo base_url() ?>assets/libs/bootstrap-select/bootstrap-select.min.js"></script>-->
        
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>

        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>
         <script src="<?php echo base_url('assets/libs/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.responsive.min.js');?>"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        
       
        
        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       
        <script type="text/javascript">
          var tmp = [];
           i_image_str = '';
         $(document).ready(function () {
            
           <?php 
             if ($this->session->flashdata('success')) { ?>
             
                    swal.fire('Success','Record Updated Successfully','success');
             <?php   }else if($this->session->flashdata('error')){ ?>
                 swal.fire('error','Network Problem, Try again after some time.','error');
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
        $("#from_date_n").flatpickr({
            defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date_n").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });
        $("#from_date_n_w").flatpickr({
            defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date_n_w").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });
        $("#from_date_n_a").flatpickr({
            defaultDate: new Date(),
            onChange: function(sd, ds, ins){
                $("#to_date_n_a").flatpickr({
                    defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                    minDate: ds,
                });
            }
        });
        
         $('.search_option').select2({
  placeholder: 'Select an option'
});





  $('.js-example-basic-single').select2({
  placeholder: 'Select an option'
});



                 $(".hid").hide();
                
                
                
                <?php if (count($invoices) > 0) { ?>
                 init_table();
                <?php }else{ ?>
                
                <?php } ?>
        }); //end of document ready       
                  
                   $('#abc').on('click', function () {
                    swal("Delete", "Successfully Delete", "success");
                 });
                 
                 
                 
                 
                 
                 
                 
                 
                 
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
  
            
               
  function delAll()
{
    $.ajax({
            url:'<?php echo base_url("Account/del") ?>',
            method:'post',
            data:{ids: tmp.join()},
            success:function(res)
            {
               swal.fire("Deleted", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
            //   window.location.reload();
            },
            error:function(err)
            {
                console.log('not Delete');
            }
        });
}              
               
               
               
               
               
               
               
            if(document.location.href.indexOf("del=done") != -1)
            {
                swal("Balance Deleted", "", "success");
            }
          
            // Ayesha

            // $("#save_area_btn").click(function(){
            //     $("#add_area_form").submit();    
            // });
 
            
             

    

       
var un_assign_table;

  function init_table(){
      
      
        un_assign_table = $('#example').DataTable({
            
            //  "responsive": true,
            //   "scrollX": true,
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
        

    // un_assign_table.rows().invalidate().draw();
    }
    
    
 
    
    console.log('un_assign_table :'+un_assign_table);
    
    
    //  $(".del_area").click(function(e){
    function del_area(id){
         console.log('hiiiiiiiiiiiii');
                // aid = e.attr("data-id");
                aid=id;
                console.log('aid'+aid);
                swal({
                    title: "Are you sure?",
                    text: "You Will Not be Able to Revert This!",
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
                        window.location = "<?php echo base_url('driver/delete_driver_balance') ?>/"+aid;
                        } else {
                        console.log('canceeled');
                        e.preventDefault();
                    }
                });
            // });
    }
      
     function get_reports(e){
        $("#table_body").empty();
        get_deliveries_report_by_status(e.target);
    }

    function get_deliveries_report_by_status(el){
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        var option = $('#search_option').val();
        
        console.log('un_assign_table :'+un_assign_table);
        if(un_assign_table){
            $('#example').dataTable().fnDestroy();
        }

        $("#table_body").empty();

        var url = "<?php echo base_url(); ?>"+"Account/get_by_id_vendor_incomings";
        
        if(option != ''){
        $fields = {'start_date':from_date, 'end_date':to_date, 'status':option};
        el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        el.disabled = true; 
        $.post(url, $fields, function(response){
            el.disabled = false;
            el.innerHTML = 'Get Report';
            if(response.success){
                var data = response.report_data.invoices;
                
                 console.log(data);
                $("#table_body").append(set_report_data(data));
            }

            init_table();
        },'json');
        
        }else{
            // swal or error
            swal.fire("Kindly Select Partner!","","error");
        }
    }

    function set_report_data(data){
         var url = "<?php echo base_url(); ?>";
        var tbody = ''; 
        var login_user = '<?php echo strtolower($this->session->userdata('role')) ?>';


        
          var it=0;
        $.each(data, function(i, e){
           
           
           
           
            tbody += '<tr class="odd gradeX">';
          
            // tbody += '<td><input type="checkbox" class="checkboxes" value="'+e.id+'"  name="checkbox"/></td>';
         
          it=Number(it)+1;
            tbody += '<td >'+ it +'</td>';
            tbody += '<td >'+e.name+'</td>';
           
            
            if(e.type =='Credit'){
                
                 tbody += '<td style="font-weight: bold; color:#0c710cb8;">'+e.type+'</td>';
                tbody += '<td style="font-weight: bold; color:#0c710cb8;">'+e.amount+'&nbsp; د.إ</td>';
            
            }else if(e.type =='Waive Off'){
                 
                 tbody += '<td style="font-weight: bold; color:#ffff00b0;">'+e.type+'</td>';
                 tbody += '<td style="font-weight: bold; color:#ffff00b0;"> '+e.amount+'&nbsp; د.إ</td>';
           
            }else if(e.type=='Extra Charged'){
                
                tbody += '<td style="font-weight: bold; color:#ff0000ad;">'+e.type+'</td>';
                tbody += '<td style="font-weight: bold; color:#ff0000ad;"> -'+e.amount+'&nbsp; د.إ</td>';
           
            }else{
                
            }
            
            tbody += '<td >'+e.notes+'</td>';
           
              
                tbody += '<td >';
            if( e.receipt !='' || e.receipt !='NULL'){ 
                 tbody += ' <a class="Green" alt="Proof Image" title="Click to View" target="_blank"  href="'+base_url+e.receipt+'" > <img src="'+base_url+e.receipt+'" width="50%" class="img-responsive img-thumbnail"></a>';
           }else{ 
                   tbody += '<span class="Red">Not Available </span>';
              } 
              tbody += '</td>';                       
           tbody += '<td >'+e.from_dt+'</td>';
           
          
            tbody += '<td >'+e.to_dt+'</td>';
            tbody += '<td > -'+e.created_by+'</td>';
              tbody += '<td >'+e.created_at+'</td>';
            
        //     var v='v';
        //     var d='d';
        // tbody += '<button onclick="get_detail('+e.invoice_id+','+"'v'"+')" flag="'+e.invoice_id+'" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">View Details</button> &nbsp;';
        
        //  tbody += '<button onclick="get_detail('+e.invoice_id+','+"'d'"+')" flag="'+e.invoice_id+'" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Download Details</button> &nbsp;';
        
       
            
            tbody += '</td>';

            tbody += '</tr >';
        });
        
        $(".hid").show();
        
        return tbody;
    }
  
 function show_model(ele){
        var flag = $(ele).attr('flag');
        
        //reset form values
        
        // $('#add_returns_form')[0].reset();
         $('#form_body').find('img').attr('src', ''); 
         $("#form_body").find(':input').each(function() {
    switch(this.type) {
        case 'password':
        case 'text':
        case 'textarea':
        case 'file':
        case 'select-one':
        case 'select-multiple':
       
        case 'number':
        
            jQuery(this).val('');
            break;
            
         
    i_image_str = '';
   
        
    }
});
         
    console.log('flag is:'+flag);

        if(flag == 'add'){
            
            
            
            //changed model title
            $("#mod_title").html("Add Partner Balance");
            $("#driver_Selecet_portion").show();
            //change model button

            $("input[name='driver_info_id']").val(0);
            
            
              
            
            
            $("#partner").val(0);
            $("#ammount").val(0);
            $("#dates").val('');
            $("#descrip").val('');
             
             
            $("#name").html('');
            $("#email").html('');
            $("#phone").html('');
            $("#address").html('');
            $("#term").html('');
            $("#vat").html('');
            
            
            $("#pend").html('');
        }
        
        if(flag == 'add_r'){
            $("#mod_title_r").html("Add New Return Info");
            //change model button

            $("input[name='driver_info_r']").val(0);
        }

        if(flag == 'edit_taken_r'){
            //changed model title
            var xreturn_check=$(ele).attr('xreturn_check');
            console.log('xreturn_check'+xreturn_check);
            if(xreturn_check ==1){
            $("#mod_title").html("Edit Returned Ballance Info");
            
            }else{
                $("#mod_title").html("Edit Taken Ballance Info");
            }
            $("#driver_Selecet_portion").hide();
            
            var xname = $(ele).attr('xname');
            var xemail = $(ele).attr('xemail');
             var xaddr = $(ele).attr('xaddr');
            var xphn = $(ele).attr('xphn');
            var xdsc = $(ele).attr('xdsc');
            var xamm = $(ele).attr('xamm');
            var xsalary = $(ele).attr('xsalary');
            var xphn = $(ele).attr('xphn');
            var xdriver_id=$(ele).attr('tk');
            var xdriver_infoid=$(ele).attr('pk');
             var xdt=$(ele).attr('xdt');
              
            
            
            $("#driver_info_id").val(xdriver_infoid);
            $("#driver").val(xdriver_id);
            $("#ammount").val(xamm);
            $("#dates").val(xdt);
            $("#descrip").val(xdsc);
             
             
            $("#name").html(xname);
            $("#email").html(xemail);
            $("#phone").html(xphn);
            $("#address").html(xaddr);
            $("#c_salary").html(xsalary);
            
            var xpend=$("#pd").html();
            $("#pend").html(xpend);
           
             
        }
        
        
         if(flag == 'waived'){
            //changed model title
            $("#mod_title_w").html("Add Waived Amount");
            $("#driver_Selecet_portion_w").show();
            //change model button

            $("input[name='driver_info_id']").val(0);
            
            
              
            
            
            $("#partner_w").val(0);
            $("#ammount").val(0);
            $("#dates").val('');
            $("#descrip").val('');
             
             
            $("#name_p_w").html('');
            $("#email_w").html('');
            $("#phone_w").html('');
                 
        }
        
     
     
     if(flag == 'addi'){
            //changed model title
            $("#mod_title_a").html("Add Additional Charges");
            $("#driver_Selecet_portion_a").show();
            //change model button

            // $("input[name='driver_info_id']").val(0);
            
            
              
            
            
            $("#partner_a").val(0);
            $("#ammount_a").val(0);
            $("#dates").val('');
            $("#descrip_a").val('');
             
             
            $("#name_p_a").html('');
            $("#email_a").html('');
            $("#phone_a").html('');
                 
        }

    }

    function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
        hide_error();
      
    }
    
    function close_model_vat(){
       
    
        $("#responsive_vat").removeClass('in');
        $("#responsive_vat").hide();
        $("#responsive_vat").attr("aria-hidden","true");
        hide_error_vat();
    }
    function show_msg(msg, class_){
        $("#error_container").removeClass('alert-success');
        $("#error_container").removeClass('alert-danger');
        $("#error_msg").html(msg);
        $("#error_container").addClass(class_);
        $("#error_container").show();
    }
    function show_msg_vat(msg, class_){
        $("#error_container_vat").removeClass('alert-success');
        $("#error_container_vat").removeClass('alert-danger');
        $("#error_msg_vat").html(msg);
        $("#error_container_vat").addClass(class_);
        $("#error_container_vat").show();
    }

    function hide_error(){
        $("#error_msg").html('');
        $("#error_container").hide();
    }
    
    function hide_error_vat(){
        $("#error_msg_vat").html('');
        $("#error_container_vat").hide();
    }

    $("#save_vendor_btn").on('click', function () {
        var url = '<?php echo base_url('Account/add_balance_partner');?>';
        // if (i_image_str!='' && m_image_str!='' && r_image_str!='' && $("#i_exp").val() !== '' && $("#i_issue").val() !=='' && $("#m_exp").val() !== ''
           
          if ($("#partner").val() !== '' && $("#amount").val() !=='' && i_image_str!=='' && $("#from_date_n").val() !=='' && $("#to_date_n").val() !==''){
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'id':$("#id").val(),
                    'vendor_id':$("#partner").val(),
                    'amount':$("#amount").val(),
                    'notes':$("#notes").val(),
                    'pendings':$("#pend").val(),
                    'from_dt':$("#from_date_n").val(),
                    'to_dt':$("#to_date_n").val(),
                    'name_p':$("#name_p").html(),
                    
                    'i_image_str':i_image_str
                    
                },
                success: function (res) {
                    console.log(res);
                    swal("Sucess", "Record Updated Sucessfully", "sucess");
                    window.location.reload();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }else {
            swal("Error", "Fill All Required fields", "error");

        }

    });

    //SAVE vendor METHODS
    
     function save_(){
       hide_error();
        //  $("input[name='area_id']").val(alldata.area_id);
        var driver_id=$("#driver").val();
        var name = $("#name").html();
         var email = $("#email").html();
          var phone = $("#phone").html();
           var address = $("#address").html();
           
           var amm = $("#ammount").val();
           var date = $("#dates").val();
           if($("#driver_info_id").val() !=0 || $("#driver_info_id").val() !='')
           var driver_info_id=$("#driver_info_id").val();
           else
           var driver_info_id=0;
           
           var desc = $("#descrip").val();
           
           var salary=$("#c_salary").html();
         
        // area_name = area_name.replace(',','-');
       

        // var emirate_name=$("#emirate option:selected").html();
        // var emirate_id=$("#emirate option:selected").val();
        
        
        
        var url = "<?php echo base_url(); ?>"+"Driver/save_driver_info";
       
        if(driver_info_id ==0){
                            console.log('driver_id_is'+driver_id);
        if(amm && driver_id && date){
            
           
            $fields = {'driver_info_id':driver_info_id,'driver_id':driver_id, 'name':name ,'email':email,'phone':phone,'address':address,'ammount':amm,'dated':date,'description':desc,'salary':salary};
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong> Driver Balance has been saved.';
                    show_msg(msg, 'alert-success');
                   
                    setTimeout(function(){  location.reload(); }, 3000);
                   
                }else{
                    show_msg('<strong>Error!</strong> Driver Info Not Saved! ','alert-danger');
                }
            },'json');
            
           
        }else{
            var error = '<strong>Error!</strong> Invalid! Try Again.';
            show_msg(error, 'alert-danger');
        }
        
        
     }else{ //Edit Check
      
           if(amm && date  ){
               
             if($("#mod_title").html()=="Edit Taken Ballance Info"){   
            $fields = {'driver_info_id':driver_info_id,'ammount':amm,'dated':date,'description':desc};
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong>Updated Successfully.';
                    show_msg(msg, 'alert-success');
                   
                    setTimeout(function(){  location.reload(); }, 3000);
                   
                }else{
                    show_msg('<strong>Error!</strong>Not Updated!Network Problem,Try Again ','alert-danger');
                }
            },'json');
            
            }else if($("#mod_title").html()=="Edit Returned Ballance Info"){
                
                var pending_r=$("#pend").html();
                pending_r=parseInt(pending_r);
                   if(amm <= pending_r && amm!=0 ){
              
            $fields = {'driver_info_id':driver_info_id,'return_ammount':amm,'dated':date,'description':desc};
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong> Updated Successfully!';
                    show_msg(msg, 'alert-success');
                    setTimeout(function(){  location.reload(); }, 3000);
                    
                }else{
                    show_msg('<strong>Error!</strong> Not Updated!Network Problem,Try Again ','alert-danger');
                }
            },'json');
            
          }else{
              var error = '<strong>Error!</strong> Invalid Return Ammount eg:(returned ammount cant be greater then pending dues or equal to zero), Try Again!';
            show_msg(error, 'alert-danger');
            
            setTimeout(function(){ hide_error(); }, 9000);
            }
                
                
            }
        }else{
            var error = '<strong>Error!</strong> Invalid! Try Again.';
            show_msg(error, 'alert-danger');
        }
      
         
     }
    }
    
     
   
   
    function i_image(input) {
        console.log(input);
        console.log(input.files[0]);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {

                var type = input.files[0].type;
                var res=  type.split('/');
                if (res.length > 0){
                    if (res[1] !== 'png' && res[1] !== 'jpg' &&  res[1] !== 'jpeg' &&  res[1] !== 'pdf'){
                        $("#v_img_msg").append('invalid format');
                        $("#i_image").val('');
                    }else {
                        console.log('valid');
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
                    i_image_str = e.target.result;
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
   
   
    $("#i_image").on('change', function () {
        // console.log('this is:');
        // console.log(this);
        i_image(this);
    });
       //SAVE Retunrs
    
     function return_(){
       hide_error_r();
        //  $("input[name='area_id']").val(alldata.area_id);
        var driver_id=$("#driver_r").val();
        var name = $("#name_r").text();
         var email = $("#email_r").text();
          var phone = $("#phone_r").text();
          var address = $("#address_r").text();
          var pending_r=$("#total_due_r").text();
          
          pending_r=parseInt(pending_r);
           
          
          
           if($("#driver_info_r").val())
           var driver_info_r=$("#driver_info_r").val();
           else
           var driver_info_r=0;
           
           var amm = $("#ammount_r").val();
           var date = $("#receieve_date_r").val();
           var desc = $("#descrip_r").val();
          
           
        // area_name = area_name.replace(',','-');
       

        // var emirate_name=$("#emirate option:selected").html();
        // var emirate_id=$("#emirate option:selected").val();
        
       
        
        var url = "<?php echo base_url(); ?>"+"Driver/save_driver_info";
       
        
                            console.log('driver_id_is'+driver_id);
        if(amm && driver_id && date  ){
            
          if(amm <= pending_r && amm!=0 ){
              
            $fields = {'driver_info_id':driver_info_r,'driver_id':driver_id, 'name':name ,'email':email,'address':address, 'phone':phone,'return_ammount':amm,'dated':date,'description':desc,'return_check':1};
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong> Driver Returned Ammount has been saved.';
                    show_msg_r(msg, 'alert-success');
                    setTimeout(function(){  location.reload(); }, 3000);
                    
                }else{
                    show_msg_r('<strong>Error!</strong> Driver Returned Ammount Not Saved! ','alert-danger');
                }
            },'json');
            
          }else{
              var error = '<strong>Error!</strong> Invalid Return Ammount eg:(returned ammount cant be greater then pending dues), Try Again!';
            show_msg_r(error, 'alert-danger');
            
            setTimeout(function(){ hide_error_r(); }, 9000);
            }
        }else{
            var error = '<strong>Error!</strong> Missing fileds are required! Try Again.';
            show_msg_r(error, 'alert-danger');
            setTimeout(function(){ hide_error_r(); }, 9000);
        }
        
       
           
           
    }
     
    
    
    
    
    
    
    
    
    
    
    
    
  


     
     
     $("#partner").on('change', function () {
         
         console.log('...getting partner basic info...');
         var id=$(this).val();
         if(id !='')
         {
              $.ajax({
                url:"<?php echo base_url('Account/get_partner_by_id_ACC/'); ?>"+id,
                
                // data:{userid:user_id},
                // dataType:"json",
                success:function(data){
                   
                     data = JSON.parse(data);

                    console.log(data);
                    
                    $('#name_p').html(data.name);
                    $('#email').html(data.inv_email);
                    $('#phone').html(data.phone);
                    $('#address').html(data.inv_address);
                    $('#term').html(data.term);
                    $('#vat').html(data.vat);
                     $('#trn').html(data.trn);
                    
                    $("#vat_hid").val(data.vat);
                    $("#term_hid").val(data.term);
                    $('#address_hid').val(data.inv_address);
                     $('#email_hid').val(data.inv_email);
                     $('#trn_hid').val(data.trn);
                    console.log(data.vat);
                  
                    // $('#c_salary').html(data.salary);
                    // $('#pend').html(data.pendings);
                    

                    
                    
                        //   $('#rolename').val(data.rolename); 
                        //   $('#edit_hidden_id').val(data.role_id);
            


                }

            });
     
             
         }
           
});
     
     $("#partner_w").on('change', function () {
         
         console.log('...getting partner basic info...');
         var id=$(this).val();
         if(id !='')
         {
              $.ajax({
                url:"<?php echo base_url('Account/get_partner_by_id_ACC/'); ?>"+id,
                
                // data:{userid:user_id},
                // dataType:"json",
                success:function(data){
                   
                     data = JSON.parse(data);

                    console.log(data);
                    
                    $('#name_p_w').html(data.name);
                    $('#name_p_ww').val(data.name);
                    $('#email_w').html(data.inv_email);
                    $('#phone_w').html(data.phone);
                   
                  
                }

            });
     
             
         }
           
});
     
      $("#partner_a").on('change', function () {
         
         console.log('...getting partner basic info...');
         var id=$(this).val();
         if(id !='')
         {
              $.ajax({
                url:"<?php echo base_url('Account/get_partner_by_id_ACC/'); ?>"+id,
                
                // data:{userid:user_id},
                // dataType:"json",
                success:function(data){
                   
                     data = JSON.parse(data);

                    console.log(data);
                    
                    $('#name_p_a').html(data.name);
                    $('#name_p_aa').val(data.name);
                    $('#email_a').html(data.inv_email);
                    $('#phone_a').html(data.phone);
                   
                  
                }

            });
     
             
         }
           
});     
      
    
     var deliv_row_counter=0;
function add_new_deliver_row(id){
    // <input type="hidden" name="delivHid[]" value="" class="form-control" /></div>
    
    
    //getting values of emirates and service selected
    var description= $('#delivery_row_block_'+deliv_row_counter+' >div>textarea[name="description[]"]').val();
    var price= $('#delivery_row_block_'+deliv_row_counter+' >div>input[name="delivery_price[]"]').val();

    console.log('Description  value:'+description);
    console.log('Price  value:'+price);
    
    
    // if(emirate!='---Select---' && service!='' && service!='---Select---'){
        //producing new row
      //  id = parseInt(id) + 1;
       
          deliv_row_counter=deliv_row_counter+1;
     console.log('i am deliv counter after add a row:'+id+' and i am counter value:'+deliv_row_counter);
        var delivery_row = '<div class="row" id="delivery_row_block_'+deliv_row_counter+'"><div class="col-sm-6"><label for="description">Description *</label><textarea name="description[]" id="description" class="form-control" rows="2" cols="50" required></textarea></div><div class="col-sm-3"><label for="price">Amount*</label><input  class="form-control" name="delivery_price[]" id="price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='+"''"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type = "number" maxlength = "8" step="0.01" min="0" /></div><div class="col-sm-2" id="btn_box_0"><button id="remove_delivery_row_btn_'+deliv_row_counter+'" onclick="remove_delivery_row('+deliv_row_counter+')" type="button" style="color: #fff;background-color: #197990 !important;margin-top: 26px; " class="btn green" title="REMOVE"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></div></div><hr>';
       
        $(".delivery_pricing-box").append(delivery_row);
       
        
       
        
        //change icon only after current row processed successfully
        // $("#add_delivery_row_btn_"+id).hide();
         $("#remove_delivery_row_btn_"+id+1).show();
    // }else{
        
    //     swal("Please Enter Credit Notes Carefully", "", "warning");
       
    // }
}//function ends
function remove_delivery_row(id) {
    
    if(id !=deliv_row_counter){
        console.log('i am id not match counter is:'+deliv_row_counter);
        
    }else{
        deliv_row_counter=deliv_row_counter-1;
    }
   
    $("#delivery_row_block_"+id).remove();
   
}






function save_vat(){
       hide_error_vat();
       console.log('hiiii');
       
        var vat_id=$("#vat_id").val();
        var VAT_ = $("#VAT_").val();
       
        
        console.log('in save vat vat_id:'+vat_id);
        console.log('in save vat VAT_'+VAT_);
        var url = "<?php echo base_url(); ?>"+"Account/save_vat";
       
        
                            
        if(VAT_ && vat_id){
            
             console.log('i am if');
             
             
            $fields = {'vat_id':vat_id, 'VAT_':VAT_ };
            $.post(url, $fields, function(response){
                if(response.success){
                    
                    var msg = '<strong>Success!</strong> VAT has been Updated.';
                    show_msg_vat(msg, 'alert-success');
                    
                    console.log('xyz'+VAT_);
                    
                  
                    $("#VAT_").val(VAT_);
                    // location.reload();
                    
                    
                    $("#anc").attr("vat_val", VAT_);
                    $("#display_vat").html("VAT is "+VAT_)
                    
                    // <a id="anc" href="#responsive_vat" onclick="javascript:show_model(this)" flag="edit_vat" data-toggle="modal" vat_id="<?php echo $vat[0]->id; ?>" vat_val="<?php echo $vat[0]->vat_; ?>">
                    //     <button  class="btn  blue"  style="color: #fff;background-color: #197990 !important; border-color: white;">Update VAT</button>
                    //     </a>
                }else{
                    show_msg_vat('<strong>Error!</strong> VAT has been not Updated!','alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Invalid! Try Again.';
            show_msg_vat(error, 'alert-danger');
            
            console.log('i am else');
        }
    }
    
    
    
    
     function get_detail(id,op){
        
        console.log(id);
       // e.target.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Loading';
        //e.target.disabled = true;
        // var vendor_id = $("select#vendor_list option:selected").val();
      
        // var from_date = moment($("#from_date").val()).format('YYYY-MM-DD');
        // var to_date = moment($("#to_date").val()).format('YYYY-MM-DD');
        
       
        // window.location.href = base_url+'auth/Active_total_deliveries/'+from_date+'/'+to_date+'/'+id;
        
                window.location.href = base_url+'Account/invoice_detail/'+id+'/'+op;

    }
    
    
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
    
     $(document).on('change', '.checkAll', function(){
         
       $this = $(this);
        $("tbody").find("input[type='checkbox']").each(function(){
             
            if($this.prop('checked'))
            {
                $(this).prop('checked', true);
              $(this).parent().parent().addClass('yellow');
         }
            else
            {
                $(this).prop('checked', false);
                 $(this).parent().parent().removeClass('yellow');
            }
        });
        $("#button").prop('disabled', $(".checkboxes:checked").length == 0);
    });
   </script>
       
    </body>
</html>