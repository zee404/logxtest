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
        
        <link href="<?php echo base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
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
        
        .adjust_t{
            margin-top: 40px;
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

</style>
  
    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header'); //End Navigation Bar
            //Assign default value of Active for every Emirate-Service pair in 2D array of PHP
            foreach ($emirites_typ as $key => $value) {
                $emirate=$emirites_typ[$key]->emirate_name;
                foreach ($service_typ as $key => $value) {
                    $service=$service_typ[$key]->name;
                    $service_tracker[$emirate][$service]='active';
                }
            }
            $emirates=json_encode($emirites_typ);
            $services=json_encode($service_typ);
            $service_tracker=json_encode($service_tracker);
        ?>

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
                                     <?php if (!empty($this->uri->segment(5))) { ?>
                                    <?php if ($this->uri->segment(5) == 'edit') { ?>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Plan / Schedule </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Plan / Schedule </a></li>
                                  
                                    <?php } }else{?>
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Plan / Schedule </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Add Plan / Schedule </a></li>
                                    <?php } ?>
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
                            <h4 class="page-title"> 
                             <?php if (!empty($this->uri->segment(5))) { ?>
                                    <?php if ($this->uri->segment(5) == 'edit') { ?>
                                    Edit Plan / Schedule 
                                    <?php } }else{?>
                                    Add Plan / Schedule 
                                    <?php } ?>
                                   </h4> 
                        </div>
                    </div>
                </div>     
              
              <!--Customer Label information is here-->
                        <div id="label_info_else" class="card-box" style="width: 100% !important; display:none;" >
                            </div>
                     
                      <!--<div id="label_info" class="card-box" style="width: 100% !important; " >-->
                      <!-- <div class="row">-->
                                
                                
                                  
                      <!--            <div class="container">-->
                      <!--            <div class="row">-->
                      <!--              <div class="col-md-3 grd hd">Name</div>-->
                      <!--              <div class="col-md-3 grd dt "id="name"><?php //echo $u_name ?></div>-->
                      <!--              <div class="col-md-3 grd hd" >Customer Code</div>-->
                      <!--              <div class="col-md-3 grd dt" id="Ccode"><?php //echo $PU_code ?></div>-->
                                   
                      <!--            </div>-->
                                  
                      <!--             <div class="row">-->
                      <!--              <div class="col-md-3 grd hd">Email</div>-->
                      <!--              <div class="col-md-3 grd dt" id="email"><?php //echo $u_email ?></div>-->
                      <!--              <div class="col-md-3 grd hd">Contact</div>-->
                      <!--              <div class="col-md-3 grd dt" id="phn"><?php //echo $phn ?></div>-->
                                   
                      <!--            </div>-->
                                  
                                  
                      <!--          </div>-->
                           
                                
                      <!-- </div>-->
                      <!-- </div>-->
                       <!--Label information Ends-->  
                       
                         <div id="label_info" class="card-box" >
                       <div class="table-responsive">
                                
                                
                                <table class="table table-dark">
 
  <tbody>
      <tr>
          <th scope="row" class="table-active">Customer Name</th>
          <td scope="row" id="name"><?php echo $u_name ?> </td>
      
          <th scope="row" class="table-active">Customer Code</th>
          <td scope="row" id="name"><?php echo $PU_code ?></td>
      </tr>
      
      <tr>
          <th scope="row" class="table-active">Email</th>
          <td scope="row" id="name"><?php echo $u_email ?></td>
      
          <th scope="row" class="table-active">Contact</th>
          <td scope="row" id="name"><?php echo $phn ?></td>
      </tr>
      
      <tr>
          <th scope="row" class="table-active">Partner</th>
          <td scope="row" id="name"><?php echo $vendor_n ?></td>
      
          <th scope="row" class="table-active">Plan ID</th>
          <td scope="row" id="name"><?php echo $plan_i ?></td>
      </tr>
      
      <tr>
          <th scope="row" class="table-active">Plan Starts at</th>
          <td><span id="sp_old_from_date"></span></td>
          
          <th scope="row" class="table-active">Plan Valid till</th>
          <td><span id="sp_old_to_date" style="color:red;"></span></td>
          
      </tr>
  </tbody>
</table>
                                  
                                  
                           
                                
                       </div>
                       </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card-box">
                            <?php if (!empty($error)) {
                                print_r($error);
                            } 
                            ?>
                            
                            <!--base_url('vendorXX/save_plan') -->
                            <form  onsubmit="return validateMyForm();" action="<?php echo base_url('MonthlyMeal/save_order_del') ?>" id="add_vendor_form"  name ="form" method="post" class="horizontal-form" enctype="multipart/form-data">
                                <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>" id="vendor_id" class="form-control">
                                 
                                  <input type="hidden" name="num_of_rows" value="" id="num_of_rows" class="form-control">
                                   <input type="hidden" name="tot_orders" value="" id="tot_orders" class="form-control">
                                   <input type="hidden" name="customer_id" value="<?php echo $c_id; ?>" id="customer_id" class="form-control">
                                <!--<input type="hidden" name="notif" value="No" id="notif" class="form-control">-->
                                <input type="hidden" name="img_chk" value="0" id="img_chk" class="form-control">
                               <input type="hidden" name="Start_date" value="0" id="Start_date" class="form-control">
                               <input type="hidden" name="Expiry_date" value="0" id="Expiry_date" class="form-control">
                                 <input type="hidden" name="today_date" value="0" id="today_date" class="form-control">
                                 
                                 <input type="hidden" name="addr_list_arr" value='<?php echo $mul_address; ?>' id="addr_list_arr" class="form-control">
                                 
                                 <input type="hidden" name="plan_id_is" value='' id="plan_id_is" class="form-control">
                               
                               
                                
                                <!--Manage Plans-->
                                <h2>Manage Plan/schedule For Deliveries</h2>
                                <br>
                                
                                <?php $cdate = date('Y-m-d');?>
                                
                           <?php if ($this->uri->segment(5) == 'edit') { ?>     
                            <button type="button" class="btn btn-info btn-lg" data-toggle="collapse" data-target="#demo">Add More Deliveries in Plan/schedule</button>    
                            <div  id="demo" class="row collapse" style="margin-top: 30px;">
                            
                            <?php }else{ ?> 
                            <div  class="row" style="margin-top: 30px;">
                            <?php } ?>
                                 <br>    
                                     <!--<div class="row">-->
                                     <!--    <div class="col-md-2"></div>-->
                                     <!-- <div class="col-md-5">-->
                                     <!--  <span id="sp_old_from_date" style="color:red;"></span> &nbsp; &nbsp;-->
                                     <!--  <span id="sp_old_to_date" style="color:red;"></span> <br><br>-->
                                     <!--  </div>-->
                                     <!--  </div>-->
                                
                                
                                 
                    
                    
                       
                         <!--<div class="col-md-2">-->
                         <!--     <label>Select first to enable</label>-->
                         <!--     <div class="form-group" style="margin-top:10px; margin-left:20px;">-->
                         <!--    <input type="checkbox" value="1" class="chk" id="skip" > Skip Weekends </div></div>-->
                             
                             
                             <!--TESTING WEEKends start-->
                             <div class="col-sm-4">
                                        <div class="form-group">
                                            <div id="output"></div>
                                            <label class="control-label">Select first to Skip Weekdays</label>
                                            <select data-placeholder="Choose Days (Optional) ..." name="tags[]" multiple="" class="chosen-select" id="module"  style="display:none" >
                                                <option value="Mon">Monday</option>
                                                <option value="Tue">Tuesday</option>
                                               
                                                <option value="Wed">Wednesday</option>
                                                <option value="Thu">Thursday</option>
                                                <option value="Fri">Friday</option>
                                                <option value="Sat">Saturday</option>
                                                <option value="Sun">Sunday</option>
                                                <!--<option value="chat">Live Support Chat</option>-->
                                            </select>
                                            <span id="msgmod" style="color: red;"></span>
                                        </div>
                                    </div>
                             
                             
                             <!--testing ends-->
                             
                             
                             
                             
                             
                             
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="col-md-10">
                                    
                                     <label>Select Start date & No. of Plan days*</label>
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?= date('Y-m-d', strtotime($cdate. ' + 1 days')); ?>" >
                                     
                                      <span class="input-group-addon" style="margin-top: 6px;">From&nbsp;&nbsp;</span>
                                       
                                       <input type="text" class="form-control flatpickr-input active" name="from" id="from_date" value="<?php  echo date('Y-m-d', strtotime($cdate. ' + 1 days')); ?>" required>
                                      
                                       <!--<span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span> -->
                                         <input  title="Enter No. of Plan days"  class="form-control" placeholder="e.g 7"  id="entered_plan_days" oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type="number" maxlength="2" min="1">
                        
                                        
                                        
                                        <button type="button" id="generate_days" class="btn btn-info">generate</button>
                                        
                                    </div>
                                </div>
                            </div>
                               
                              
                        </div>
                        
                        
                         <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-10">
                                    
                                     <label>Plan Expiry date is</label>
                                     <!--<input type="date" id="to_date" placeholder="End Date" style="color:red;" readonly/>-->
                                     <input type="text"  class="form-control flatpickr-input active" name="to" id="to_date" value="<?php  //echo date('Y-m-d', strtotime($cdate. ' + 2 days')); ?>"  style="color:red;" disabled>
                                      
                        
                        
                        </div>
                            </div>
                               
                              
                        </div>
                        
                         <!--<div class="col-md-4" id="cf">-->
                                        
                         <!--               <label for="v_image">Upload sheet <smal>/</smal> Image* Xls*</small></label>-->
                         <!--               <input type="file" accept=".xlsx, .xls, .png, .jpg, jpeg, .pdf ,.doc, .docx" name="v_image" id="v_image" class="form-control" >-->
                         <!--               <span id="v_img_msg" style="color: red"></span>-->
                         <!--               <input type="hidden" name="contr_file" id="contr_file" value="" class="form-control"  />-->
                                          
                         <!--        </div>-->
                         
                         
                         
                         
                             <!--    <br><br>-->
                             <!--    <div class="col-md-3 form-group" >-->
                             <!--        <label>Check to enable</label>-->
                             <!--     <div class="" style="margin-top:10px; margin-left:20px;">-->
                                      
                             <!--<input type="checkbox" value="Yes" class="notif_cls" id="notif_box" >Enable Notification</div>-->
                             <!--  </div>-->
                               
                             <!--  <div class="col-md-4 " >-->
                             <!--        <label style="margin-left:-79px;">Notes</label>-->
                             <!--     <div class="" style="margin-top:5px; margin-left:-66px;">-->
                                      
                             <!--<input type="text" class="form-control" value="" style="height:63px; width:375px;" id="notes" name="notes"  size ="40" /></div>-->
                             <!--  </div>-->
                               <div class="col-md-5 " ></div>
                               <div class="col-md-2 " >
                                     <label>Total No. of Plan Days</label>
                                  <div class="" style="margin-top:5px;">
                                      
                             <input type="text" class="form-control" value=""  id="no_of_days" name="no_of_days" readonly/></div>
                               </div>
                               
                               
                              </div>
                              
                              
                                
                              <hr>
                              
                              <div id="sch_plan" style="display:none">
                                
                                
                                <!--<h5>Delivery Quotations</h5>-->
                                <!--<div class="delivery_firstbox">-->
                                <!--    <div class="row" id="delivery_row_block_0">-->
                                <!--        <div class="col-sm-3">-->
                                <!--            <label for="emirate">Select Emirate *</label>-->
                                <!--            <select name="delivery_emirate[]" id="emirate" class="form-control" required>-->
                                                
                                <!--                 <?php //if (count($emirites_typ) > 0) { ?>-->
                                <!--                         <?php  //foreach ($emirites_typ as $data) { ?>-->
                                                   
                                <!--        <option class="" value="<?php //echo $data->id; ?>"> <?php //echo  $data->emirate_name; ?>-->
                                            
                                <!--        </option>-->
                                <!--         <?php //}} ?>-->
                                <!--            </select>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-3">-->
                                <!--            <label for="service_type">Service Type *</label>-->
                                <!--            <select name="delivery_service_type[]" id="service_type" class="form-control" required>-->
                                <!--                <?php //if (count($service_typ) > 0) { ?>-->
                                <!--                         <?php  //foreach ($service_typ as $data) { ?>-->
                                                   
                                <!--        <option class="" value="<?php //echo $data->id; ?>"> <?php //echo  $data->name; ?>-->
                                            
                                <!--        </option>-->
                                        
                                <!--        <?php //}} ?>-->
                                <!--            </select>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2">-->
                                <!--            <label for="price">Price*</label>-->
                                <!--            <input type="number" class="form-control" name="delivery_price[]" id="price" placeholder="(AED)" required>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2">-->
                                <!--        <label for="same_loc_price">Same Location Price*</label>-->
                                <!--            <input type="number" class="form-control" name="delivery_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required>-->
                                <!--             <input type="hidden" name="delivHid[]" value="" class="form-control"/>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2" id="btn_box_0">-->
                                <!--            <button id="add_delivery_row_btn_0" onclick="add_new_deliver_row(0)" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="ADD"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>-->
                                <!--            <button id="remove_delivery_row_btn_0" onclick="remove_delivery_row(0)" type="button" style="background: black;color: white;margin-top: 26px; display: none;" class="btn green" title="REMOVE"><i class="icon-close"></i></button>-->
                                <!--        </div>-->
                                       
                                <!--    </div>-->
                                <!--    <hr>-->
                                <!--</div>-->
                                
                                <!--<div class="delivery_pricing-box"></div>-->
                               
                                <!--<br>-->
                                <h2>Manage Schedule</h2>
                                <!--<div class="bag_firstbox">-->
                                <!--    <div class="row" id="bag_row_block_0">-->
                                <!--        <div class="col-sm-3">-->
                                <!--            <label for="emirate">Select Emirate *</label>-->
                                <!--            <select name="bag_emirate[]" id="emirate" class="form-control" required></select>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-3">-->
                                <!--            <label for="service_type">Service Type *</label>-->
                                <!--            <select name="bag_service_type[]" id="service_type" class="form-control" required></select>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2">-->
                                <!--            <label for="price">Price*</label>-->
                                <!--            <input type="number" class="form-control" name="bag_price[]" id="price" placeholder="(AED)" required>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2">-->
                                <!--        <label for="same_loc_price">Same Location Price*</label>-->
                                <!--            <input type="number" class="form-control" name="bag_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required>-->
                                <!--            <input type="hidden" name="bagsHid[]" value="" class="form-control"/>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2" id="btn_box_0">-->
                                <!--            <button id="add_bag_row_btn_0" onclick="add_new_bag_row(0)" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="ADD"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>-->
                                <!--            <button id="remove_bag_row_btn_0" onclick="remove_bag_row(0)" type="button" style="background: black;color: white;margin-top: 26px; display: none;" class="btn green" title="REMOVE"><i class="icon-close"></i></button>-->
                                <!--        </div>-->
                                        
                                <!--    </div>-->
                                <!--    <hr>-->
                                <!--</div>-->
                                <div class="Edit_bag_pricing-box"></div>
                                <div class="bag_pricing-box"></div>
                                <!--<div class="row">-->
                                <!--    <div class="col-sm-6">-->
                                <!--    <div class="form-group">-->
                                <!--        <label for="message">Custom bag message for customer*</label>-->
                                <!--        <textarea name="bag_message" id="bag_message" rows="5" class="form-control" style="width:100%;" required></textarea>-->
                                <!--    </div>-->
                                <!--    </div>-->
                                    
                                <!--</div>-->
                                <br>
                                <!--<h4>Cash Collection Quotation</h4>-->
                                <!--<div class="cash_firstbox">-->
                                <!--    <div class="row" id="cash_row_block_0">-->
                                <!--        <div class="col-sm-3">-->
                                <!--            <label for="emirate">Select Emirate *</label>-->
                                <!--            <select name="cash_emirate[]" id="emirate" class="form-control" required></select>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-3">-->
                                <!--            <label for="service_type">Service Type *</label>-->
                                <!--            <select name="cash_service_type[]" id="service_type" class="form-control" required></select>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2">-->
                                <!--            <label for="price">Price*</label>-->
                                <!--            <input type="number" class="form-control" name="cash_price[]" id="price" placeholder="(AED)" required>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2">-->
                                <!--        <label for="same_loc_price">Same Location Price*</label>-->
                                <!--            <input type="number" class="form-control" name="cash_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required>-->
                                <!--            <input type="hidden" name="cashHid[]" value="" class="form-control"/>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-2" id="btn_box_0">-->
                                <!--            <button id="add_cash_row_btn_0" onclick="add_new_cash_row(0)" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="ADD"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>-->
                                <!--            <button id="remove_cash_row_btn_0" onclick="remove_cash_row(0)" type="button" style="background: black;color: white;margin-top: 26px;display: none;" class="btn green" title="REMOVE"><i class="icon-close"></i></button>-->
                                <!--        </div>-->
                                        
                                <!--    </div>-->
                                <!--    <hr>-->
                                <!--</div>-->
                                
                                <!--<div class="cash_pricing-box"></div>-->
                                <!--<div class="row">-->
                                <!--    <div class="col-sm-6">-->
                                <!--    <div class="form-group">-->
                                <!--        <label for="message">Custom cash collection message for customer*</label>-->
                                <!--        <textarea name="cash_message" id="cash_message" rows="5" class="form-control" style="width:100%;" required></textarea>-->
                                <!--    </div>-->
                                <!--    </div>-->
                                    
                                <!--</div>-->
                                
                                </div>
                                <!--END OF SCH_plan div-->
                                <br>
                                
                                <?php if (!empty($this->uri->segment(5))) { ?>
                                    <?php if ($this->uri->segment(5) == 'edit') { ?>
                                        <input type="button" id="edit_vendor_btn" onclick="update_vendor()"  class=" btn green updatebtn" value="Update">
                                    <?php } ?>
                                    <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>
                                <?php }else{ ?>
                                    <button id="save_vendor_btn" type="submit" style="background: black;color: white;" class="btn green">Save</button>
                                    <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>
                                <?php } ?>
                             
                            </form>
                        </div>
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
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
        
         <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        
        
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
       <script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script>
       
        <script type="text/javascript">
          document.getElementById('output').innerHTML = location.search;
            $(".chosen-select").chosen();
        </script>

<script type="text/javascript">
    function close_model() {
        // window.location.href="<?php echo base_url('Manage') ?>";
        var test='<?php echo base_url(); ?>monthlyMeal/add_mealPlan';
                console.log(test);
                  window.location.replace(test);
    }
    
    save_check = 0;
    
    function validateMyForm()
{
    
    // console.log('checking multiselect');
    // console.log($("#module").val());
    
    
  if(save_check == 0)
  { 
    // alert("validation failed false");
    // returnToPreviousPage();
    swal('Select dates to schedule plan first!', 'This action is required(*)', 'error');
    return false;
  }else{
//   $("#addr_list_arr").val(addr_obj);
//   alert(addr_obj);
  return true;
  }
}

    $(document).ready(function () {
        
        var addr_obj='';
       



        
        
      <?php if (!empty($this->uri->segment(5))) { ?>
                                    <?php if ($this->uri->segment(5) == 'edit') { ?>    
                                    
                                    
                            //         $("#from_date").flatpickr({
            
                            //     //  minDate: moment(date_old_p).add(1,'days').format('YYYY-MM-DD'),
                            //     // onChange: function(sd, ds, ins){
                                    
                                    
                                    
                            //     // }
                            // });
                            
                            // $("#from_date").flatpickr({
                            //             // defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
                            //             // minDate: moment(date_old_p).add(1,'days').format('YYYY-MM-DD'),
                            //         });
                                    
                                    
                                    $(".flatpickr-input").flatpickr({
                                        // minDate:new Date()
                                    });
        
        
        <?php }}else{ ?>
                 
        //           $("#from_date").flatpickr({
        //     defaultDate: new Date(),
        //     onChange: function(sd, ds, ins){
        //         $("#to_date").flatpickr({
        //             defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
        //             minDate: ds,
        //         });
        //     }
        // });
        
        
        
        
        //date_picker();
        var day = new Date();
        console.log(day); // Apr 30 2000
        var nextDay = new Date(day);
        nextDay.setDate(day.getDate() + 1);
        // today.getMonth()+1;
        var nextM = new Date(day);
        nextM.setMonth(day.getMonth() + 3);
        console.log(nextM);
        
        $("#from_date").flatpickr({
          format: 'DD-MM-YYYY',
          minDate: nextDay,
          maxDate:nextM,
          onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: moment(nextDay).add(1,'days').format('YYYY-MM-DD'),
                   minDate: nextDay,
                   maxDate:nextM,
                });
          }
          
        });
        
        <?php } ?>
        
        
        <?php if (!empty($this->session->flashdata('error'))) { ?>
            var msgg = '<?php echo $this->session->flashdata('error') ?>';
            swal(msgg, "", "error");
        <?php } ?>
        <?php if (!empty($this->session->flashdata('success'))) { ?>
            var msgg = '<?php echo $this->session->flashdata('success') ?>';
            swal(msgg, "", "success");
        <?php } ?>
        
        
        
         $('.search_option').select2({
  placeholder: 'Select an option'
});


  $('.js-example-basic-single').select2({
  placeholder: 'Select an option'
});


    });
</script>
<script type="text/javascript">
var status = false;

 contract ='';

bag_row_counters=0;
function gen_password()
{
    $("input[name='s_pass']").val('PU-'+Math.random().toString(36).slice(-4));
    var st=$("#s_pass").val();
    $('#s_pass_sp').css("color", "green");
                                                 
     $("#s_pass_sp").text("Checking...");
      
      $.ajax({
                                        type:"POST",
                                        url:"<?php echo base_url('Vendor/check_PU_validation') ?>",
                                        data:{PU:st,role_type_id:2},
                                        success:function(response){
                                            console.log("response:"+response);
                                            if (response == "already available") {
                                                $('#s_pass_sp').css("color", "red");
                                                $("#s_pass_sp").text("PU-Code ' ("+st+") ' Already exist");
                                                $("#s_pass").val("PU-");
                                            }else{
                                                 $('#s_pass_sp').css("color", "green");
                                                 
                                                $("#s_pass_sp").text("Available");
                                            }
                                
                                        }
                                    });
}

// $("#s_pass").on('change', function () {
      
//     });

var getDaysArray = function(start, end) {
    for(var arr=[],dt=new Date(start); dt<=end; dt.setDate(dt.getDate()+1)){
       

        arr.push(new Date(dt));
    }
    return arr;
};

$("#generate_days").on('click', function () {
     console.log('i am date onchange event step1 num of rows:');
     console.log($("#num_of_rows").val());

   if($("#entered_plan_days").val() !=''){
    var entered_plan_days=parseInt($("#entered_plan_days").val(),10) - parseInt(1);
   }else{
       
        $("#entered_plan_days").val(1);
       var entered_plan_days=parseInt($("#entered_plan_days").val(),10) - parseInt(1);
   }
    
    
    

      
   var fro=new Date($("#from_date").val());
      
   var fix_from=$("#from_date").val();
     
     
       
       var date=fro;
       var days=entered_plan_days;
       
    //   if(!isNaN(date.getTime())){
    //       date.setDate(date.getDate() + days);
    //         // alert(test_date);
    //      var yyyy = date.getFullYear().toString();
    //   var mm = (date.getMonth()+1).toString(); // getMonth() is zero-based
    //   var dd  = date.getDate().toString();
    //   var final_date_Calculated= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
       
    //   $("#to_date").val(final_date_Calculated);
    //     } else {
    //         alert("Invalid Date");  
    //     }
    
   
   var tst_dt_y = new Date(fro);
//   alert(tst_dt_y);

// Add 1 Day
// alert('enter days are'+entered_plan_days);

// alert(fro);
tst_dt_y.setDate(fro.getDate() + entered_plan_days);
// alert(tst_dt_y);

var yyyy = tst_dt_y.getFullYear().toString();
var mm = (tst_dt_y.getMonth()+1).toString(); // getMonth() is zero-based
var dd  = tst_dt_y.getDate().toString();
var final_date_Calculated= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding


      
      var to=final_date_Calculated;
      
       console.log('i am working');
      console.log(fix_from+'-'+to);
      
      var ddd  = (tst_dt_y.getDate()-1).toString();
      var final_date_Calculated_X= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (ddd[1]?ddd:"0"+ddd[0]); // padding
      $("#to_date").val(final_date_Calculated_X);
    //   alert(final_date_Calculated_X);
      
      
      
      
    //   TESSTTT
//   do{  
    var weekdayx = new Array(7);
                    weekdayx[0] = "Sun";
                    weekdayx[1] = "Mon";
                    weekdayx[2] = "Tue";
                    weekdayx[3] = "Wed";
                    weekdayx[4] = "Thu";
                    weekdayx[5] = "Fri";
                    weekdayx[6] = "Sat";
                    
    var wek_cehck_arr=$("#module").val(); 
    
    console.log('------------------------------------------------------------------------------');
    
    
    
    var assumed_days=parseInt(entered_plan_days);
    for(var str=0; str<=assumed_days; str++ ){ 
                    // alert(final_date_Calculated);
                    var st_dt_gen= new Date(fro);
                    st_dt_gen.setDate(fro.getDate() + parseInt(str));
                     
                     console.log('check date is :'+st_dt_gen);
                    
                    var sm_dt=new Date(to);
                   
                    // alert(sm_dt);
 dayx = weekdayx[st_dt_gen.getDay()];
 console.log('check dayx of generated date is '+dayx);
//  alert(dayx);
 
 
 
 if($("#module").val().includes(dayx)){
                    //   if($("#module").val()->check_wek == day){
                      
                      console.log('included day is : '+$("#module").val().includes(dayx));
                       console.log('XXXX day to skip is:'+dayx+' ite'+str);
                       
                       assumed_days=parseInt(assumed_days)+parseInt(1);
                       
                       sm_dt.setDate(sm_dt.getDate() + 1);
                       var yyyy = sm_dt.getFullYear().toString();
                        var mm = (sm_dt.getMonth()+1).toString(); // getMonth() is zero-based
                        // var dd  = tst_dt.getDate().toString();
                       var ddd  = (sm_dt.getDate()).toString();
                        final_date_Calculated= yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (ddd[1]?ddd:"0"+ddd[0]); // padding
                        to=final_date_Calculated;
                       $("#to_date").val(final_date_Calculated);
                       console.log('new updated end date is'+final_date_Calculated);
                        // var checkx=1
                   }else{
                       console.log('XXXX no day for skip is found'+' ite'+str);
                       
                    //   var checkx=0;
                   }

//   }while(checkx==0); 
   console.log('update from - to is :'+fix_from+' - '+to);
}
    // TESSTTT
      
      
    console.log('------------------------------------------------------------------------------');
     
    //   alert(fix_from+'-'+to);
        
        var a = moment(fix_from);
        var b = moment(to);
        var diffDays = b.diff(a, 'days');
        diffDays +=1;
        console.log('diffDays'+diffDays);
        $("#sch_plan").css('display', '');
        
        
       var daylist = getDaysArray(a,b);
       daylist.map((v)=>v.toISOString().slice(0,10)).join("");
       remove_bag_row();


// if ($('#skip').is(":checked"))
// {
//   var skip=1;
// }else{
//     var skip=0;
// }



if($("#module").val().length === 0){
   
    var skip=0;
}else{
    var skip=1;
}

console.log('weekend skip is :'+skip);


add_new_bag_row(0,diffDays,daylist,skip);

console.log('i am num of rows:');
console.log($("#num_of_rows").val());
});

 

// Call on Skip Enable or Disable

$("#skip").on('change', function () {
     console.log('i am before output of num of rows:');
console.log($("#num_of_rows").val());


    

      var to=$("#to_date").val();
      var fro=$("#from_date").val();
      
     
      console.log('i am working');
      console.log(fro);
        console.log(to);
        
        var a = moment(fro);
        var b = moment(to);
        var diffDays = b.diff(a, 'days');
        diffDays +=1;
        console.log(diffDays);
        $("#sch_plan").css('display', '');
        
        
       var daylist = getDaysArray(a,b);
daylist.map((v)=>v.toISOString().slice(0,10)).join("");


remove_bag_row();


if ($('#skip').is(":checked"))
{
  var skip=1;
}else{
    var skip=0;
}

console.log('skip  is: '+ skip);
add_new_bag_row(0,diffDays,daylist,skip);

console.log('i am num of rows:');
var testy =$("#num_of_rows").val();
console.log($("#num_of_rows").val());
var up_dte = $('#bag_row_block_'+testy+'>div>input[name="date[]"]').val();
var up_dts = $('#bag_row_block_1 >div>input[name="date[]"]').val();

$("#to_date").val(up_dte);
$("#from_date").val(up_dts);

});














    
    // Validate Phone //
        $("#s_pass").on('change', function () {
            
                    console.log('pura_code testing');
                   
                    $text = $(this);
                    var st=$('#s_pass').val();
                    
                     var test = st.substring(0, 3);
                     var alphaExp = 'PU-';
                     var x=$text.val();
                     var test_l=st.length;
                     console.log(test);
                     if (test == alphaExp && test_l ==7) {
                        //  $('#s_pass').val() =x ;
                         $('#s_pass').css("border", "1px solid green");
                           $('#s_pass_sp').text("Checking...");
                         $('#s_pass_sp').css("color", "green");
                         
                         
                               $.ajax({
                                        type:"POST",
                                        url:"<?php echo base_url('Vendor/check_PU_validation') ?>",
                                        data:{PU:st,role_type_id:2},
                                        success:function(response){
                                            console.log("response:"+response);
                                            if (response == "already available") {
                                                $('#s_pass_sp').css("color", "red");
                                                $("#s_pass_sp").text("PU-Code ' ("+st+") ' Already exist");
                                                $("#s_pass").val("PU-");
                                            }else{
                                                 $('#s_pass_sp').css("color", "green");
                                                 
                                                $("#s_pass_sp").text("Available");
                                            }
                                
                                        }
                                    });
                          
                         
                     }else if(test != alphaExp || (test_l > 7 )){
                         $('#s_pass').val('PU-');
                         $('#s_pass').css("border", "1px solid red");
                         $('#s_pass_sp').text("Only 4 Numbers Allow After 'PU-' !");
                         $('#s_pass_sp').css("color", "red");
                     }else if( test != alphaExp || (test_l < 7 )){
                         $('#s_pass').val('PU-');
                         $('#s_pass').css("border", "1px solid red");
                        //  $('#s_pass').attr("Only 4 Numbers Allow After 'PU-' !");
                         $('#s_pass_sp').text("Only 4 Numbers Allow After 'PU-' !");
                         $('#s_pass_sp').css("color", "red");
                     }
                     
                     
              
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
        
        
        function check_image(input,id) {
        console.log('I AM IN');
        console.log(input.files[0]);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {

                var type = input.files[0].type;
                var res=  type.split('/');
                if (res.length > 0){
                    if (res[1] !== 'doc' && res[1] !== 'pdf' &&  res[1] !== 'dox'){
                       
                        $("#"+id+"_img_msg").text('');
                        $("#"+id+"_img_msg").append('invalid format');
                        $("#"+id+"_image").val('');
                    }else {
                        $("#"+id+"_img_msg").text('');
                    }
                }else {
                    $("#"+id+"_img_msg").text('');
                    $("#"+id+"_img_msg").append('invalid format');
                    $("#"+id+"_image").val('');
                }

                if (input.files[0].size > 1057152) {
                    $("#"+id+"_img_msg").text('');
                    $("#"+id+"_img_msg").append('Try to upload file less than 1MB!');
                    $("#"+id+"_image").val('');
                } else {
                    $("#"+id+"_img_msg").text('');
                    
                    _image = e.target.result;
                    console.log(id);
                   
                   if(id=='contract'){
                      contract  = _image;
                      
                      console.log('i  am contract');
                        console.log(contract);
                    }else{
                        console.log('not any condition is working');
                    }
                     
                    
                    
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    
    //  $("#v_image").on('change', function () {
    //   check_image(this,'v');
    // });
    
    $("#contract_image").on('change', function () {
       check_image(this,'contract');
    });


$('#add_vendor_form').submit(function() {
    $('select').removeAttr('disabled');
    $('input').removeAttr('disabled');
    $('textarea').removeAttr('disabled');
    console.log('I AMM WORKINGGGGGGGGGGGGGGGGGGGGGGGG');
    
    // console.log($("#contr_file").text());
    // var d = document.getElementById('contr_file');
    // console.log('d is:'+ d);
    //  var fileName = d.target.files[0].name;
    //         alert('The file "' + fileName +  '" has been selected.');
    // if(d == ''){
    //     alert('Empty');
    // }else{
    //     alert('full');
    // }
          var formData = new FormData($('form')[0]);
        
    
    
    // $("#contr_pic").val(contract);
                    //   $("#v_pic").val(v);
   
    
});
  
</script>
 
<script type="text/javascript">

// function delivery_serv(){
//   // var get_servic=$(this).children("option:selected").val();
//   var i=0;
//   var get_servic= $('#delivery_row_block_'+i+' >div>select[name="delivery_service_type[]"]').val();
//   var get_emi= $('#delivery_row_block_'+i+' >div>select[name="delivery_emirate[]"]').val();
//   console.log('get servic:'+get_servic);
//   console.log('get servic:'+get_emi);
//   console.log('i is:'+i);
//   if(get_emi != ''){
//       //  $("#theSelect option:selected").attr('disabled','disabled')
//       i=i+1;
//       //for(let jj=0; jj<3; jj--){
//       if($('#delivery_row_block_'+i+' >div>select[name="delivery_service_type['+"0"+']"]').val() == get_servic){
//           $('#delivery_row_block_'+i+' >div>select[name="delivery_service_type[]"]').attr('disabled','disabled');
//           console.log('i run');
//       }
      
//         console.log('emi is not empty so service is disabled');
//         console.log('i is:'+i);
        
//       //}
//   }
    
// }
$("#email").change(function(e){
    var email = $(this).val();
    console.log("Called email fun");
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('Vendor/check_email_validation') ?>",
        data:{email:email,role_type_id:2},
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

    //this script is related to emirates+services=service_tracker (unique pairs) (updating)
    
//     function dynamicEmirateOptions(selector="select[name='delivery_emirate[]']"){
// 		//producing emirate options dynamically
// 		var emirate_options='<option value="">---Select---</option>';
// 		for (let emirate in emirates){
// 			emirate_options+="<option value="+emirates[emirate].id+">"+emirates[emirate].emirate_name+"</option>";
		
// 		}
// 		$(selector).html('');
// 		$(selector).append(emirate_options);
// 	}
	

// 	function dynamicServiceOptions(selector="select[name='delivery_service_type[]']"){
// 		//producing conditional services options dynamically
// 		console.log('hello i am dynamic service option creator');
// 		var service_options='<option value="">---Select---</option>';
// 		for (let service in services){
// 			service_options+="<option value="+services[service].id+">"+services[service].name+"</option>";
// 		}
// 		$(selector).html('');
// 		$(selector).append(service_options);
// 	}
// 	function dynamicConServiceOptions(emirate,selector="select[name='delivery_service_type[]']"){
// 		//producing conditional services options dynamically
// 		var service_options='<option value="">---Select---</option>';
// 		for (let service in services){
// 			service_name=services[service].name;
// 			if(service_tracker[emirate][service_name]=='inactive'){
// 				service_options+="<option value="+services[service].id+" disabled style='color:red'>"+services[service].name+"</option>";
// 			}else{
// 				service_options+="<option value="+services[service].id+">"+services[service].name+"</option>";
// 			}
// 		}
// 		$(selector).html('');
// 		$(selector).append(service_options);
// 	}
// 	function dynamicBagConServiceOptions(emirate,selector="select[name='bag_service_type[]']"){
//         //producing conditional services options dynamically
//         var service_options='<option value="">---Select---</option>';
//         for (let service in services){
//             service_name=services[service].name;
//             if(bag_service_tracker[emirate][service_name]=='inactive'){
//                 service_options+="<option value="+services[service].id+" disabled style='color:red'>"+services[service].name+"</option>";
//             }else{
//                 service_options+="<option value="+services[service].id+">"+services[service].name+"</option>";
//             }
//         }
//         $(selector).html('');
//         $(selector).append(service_options);
//     }
    // function dynamicCashConServiceOptions(emirate,selector="select[name='cash_service_type[]']"){
    //     //producing conditional services options dynamically
    //     var service_options='<option value="">---Select---</option>';
    //     for (let service in services){
    //         service_name=services[service].name;
    //         if(cash_service_tracker[emirate][service_name]=='inactive'){
    //             service_options+="<option value="+services[service].id+" disabled style='color:red'>"+services[service].name+"</option>";
    //         }else{
    //             service_options+="<option value="+services[service].id+">"+services[service].name+"</option>";
    //         }
    //     }
    //     $(selector).html('');
    //     $(selector).append(service_options);
    // }
	//for delivery
// 	dynamicEmirateOptions();
// 	dynamicServiceOptions();
	//for bags
// 	dynamicEmirateOptions("select[name='bag_emirate[]']");
// 	dynamicServiceOptions("select[name='bag_service_type[]']");
	//for cash
// 	dynamicEmirateOptions("select[name='cash_emirate[]']");
// 	dynamicServiceOptions("select[name='cash_service_type[]']");
	
    // $('body').on('click', 'select[name="delivery_emirate[]"]', function() {
    //     var emirate_selected= $(this).find('option:selected').text();
    //     var id=$(this).parent().parent().attr('id');
    //     ConServiceSelector="#"+id+">div>select[name='delivery_service_type[]']";
       
    //     dynamicConServiceOptions(emirate_selected,ConServiceSelector);
        
        
    // });
    // $('body').on('click', 'select[name="bag_emirate[]"]', function() {
        // var emirate_selected= $(this).find('option:selected').text();
        // var id=$(this).parent().parent().attr('id');
      //  console.log("show_bag_service_tracker")
	   // show_bag_service_tracker();
	    //console.log("show_service_tracker");
	   // show_service_tracker();
	   //console.log('yyyyyyyy'+id);
    //     bagConServiceSelector="#"+id+">div>select[name='bag_service_type[]']";
    //     dynamicBagConServiceOptions(emirate_selected,bagConServiceSelector);
        
        
    // });
    // $('body').on('click', 'select[name="cash_emirate[]"]', function() {
    //     var emirate_selected= $(this).find('option:selected').text();
    //     var id=$(this).parent().parent().attr('id');
    //     cashConServiceSelector="#"+id+">div>select[name='cash_service_type[]']";
    //     dynamicCashConServiceOptions(emirate_selected,cashConServiceSelector);
        
        
    // });





function copy_to_next(i){
    
    
    // var ar=$('#bag_row_block_'+id+' >div>input[name="addr[]"]').val();
    // if(ar != ''){
    // id +=1;
    // $('#bag_row_block_'+id+' >div>input[name="addr[]"]').val(ar);
    // console.log(ar);
        
    // }
    
    
    
    
    console.log('copy +1 of '+i);
    // console.log($('#bag_row_block_'+i+'>div>select[name="addr_list[]"]').val());
    var refi=$('#bag_row_block_'+i+'>div>select[name="addr_list[]"]').val();
    if(refi !=''){
    i +=1;
    console.log('i is after add '+i);
      $('#bag_row_block_'+i+'>div>select[name="addr_list[]"]').val(refi)
     $('#bag_row_block_'+i+'>div>select[name="area[]"]').val(addr_obj[refi].area_id);
     $('#bag_row_block_'+i+'>div>select[name="time[]"]').val(addr_obj[refi].emirate_id+','+addr_obj[refi].slot_id);
     $('#bag_row_block_'+i+'>div>textarea[name="google_address[]"]').val(addr_obj[refi].google_link_addrs);
     
    }
    
}


function copy_all(id){
    
    
    var refi=$('#bag_row_block_'+id+'>div>select[name="addr_list[]"]').val();
    //  console.log(ar);
    if(refi != '' && id!=''){
        var rows_length=bag_row_counters;
        
        if(id < rows_length){
        console.log('i am id value: '+id+' and i am rows_length in copy all func :'+rows_length);
        //   u=1;
        //  u=u+ref;
        //  console.log(u);
        for(var u =parseInt(id)+parseInt(1); u <= rows_length; u++ ){
            
            $('#bag_row_block_'+u+'>div>select[name="addr_list[]"]').val(refi)
            $('#bag_row_block_'+u+'>div>select[name="area[]"]').val(addr_obj[refi].area_id);
            $('#bag_row_block_'+u+'>div>select[name="time[]"]').val(addr_obj[refi].emirate_id+','+addr_obj[refi].slot_id);
            $('#bag_row_block_'+u+'>div>textarea[name="google_address[]"]').val(addr_obj[refi].google_link_addrs);
            
            
            console.log('i am u iteration counter :');
            console.log(u);
          }
        
        }
        
    }
}


//   bag_row_counters=0;
function add_new_bag_row(id,total_gen,daylist,skip){
    //getting values of emirates and service selected
    // var emirate= $('#bag_row_block_'+bag_row_counter+' >div>select[name="bag_emirate[]"]>option:selected').text();
    // var service= $('#bag_row_block_'+bag_row_counter+' >div>select[name="bag_service_type[]"]>option:selected').text();
    // console.log('i am bag counter JUst start  value:'+bag_row_counters);
//   if(emirate!='---Select---' && service!='' && service!='---Select---'){
        //producing new row
        // bag_row_counter=bag_row_counter+1;
        
        var scroll='';
         var weekday = new Array(7);
                    weekday[0] = "Sun";
                    weekday[1] = "Mon";
                    weekday[2] = "Tue";
                    weekday[3] = "Wed";
                    weekday[4] = "Thu";
                    weekday[5] = "Fri";
                    weekday[6] = "Sat";
            
            var day_i = 0;  
            
            
            <?php if($this->uri->segment(5)=='edit') { ?>
                
                var  bag_row_counter=old_bag_rows_counter;
                //Open last single double of exiting orders UMX
                
                //  $('#bag_row_block_'+old_bag_rows_counter+'>div>select[name="S_D[]"]').attr("disabled", false);
                bag_row_counter +=1;
                
                scroll=bag_row_counter;
                
                var line_='<h3 id="'+bag_row_counter+'" class="div1c">New Delivery</h3>';
                  
            <?php }else{ ?>
                        old_bag_rows_counter=0;
                   var bag_row_counter=1;
                   
                   var line_='';
                   
            <?php } ?>
           
           <?php if($this->uri->segment(5)=='') { ?> 
            
            var mul_='<?php echo $mul_address; ?>';
               console.log('mul address in add plan '+mul_);
              
                 addr_obj =JSON.parse(mul_);
            
             <?php } ?>
             
            
        for(var new_iter =1 ; new_iter<= total_gen; new_iter++){
        // console.log('i am bag counter after add a row:'+id+' and i am counter value:'+bag_row_counter);
        
        // console.log(daylist.length);

                      // for (var i = 0; i < daylist.length; i++) {
    
                        
                        date = daylist[day_i];
                        // var days =  date.substring(0, 3);
                    year = date.getFullYear();
                    month = date.getMonth()+1;
                    dt = date.getDate();
                    
                    
                    
                   
                    
                    
                    day = weekday[date.getDay()];
                    if (dt < 10) {
                      dt = '0' + dt;
                    }
                    if (month < 10) {
                      month = '0' + month;
                    }
                    
                    if(new_iter<= total_gen){
                        
                        var EXPI= year+'-' + month + '-'+dt;
                        $("#Expiry_date").val(EXPI);
                        
                        console.log('FINAL EXPI IS'+EXPI);
                    }
                    
                    // console.log(year+'-' + month + '-'+dt+ '-' +day);
                    
                        // console.log(daylist[i]);
                    // }
                   var check=0;
            //   if(day == 'Fri' || day == 'Sat'){
            //       var check=1
                  
            //   }else{
            //       var check=0;
            //   }
               
               
               
            //   test start weekends
                
            //   for(var week_=$("#module").val().length; )
               
               if($("#module").val().length === 0){
                    var check=0;
               }else{
                    console.log('i am modelue array is :');
                    console.log($("#module").val());
                //   for(var check_wek=$("#module").val().length; check_wek<0 ; check_wek--){
                var wek_cehck_arr=$("#module").val();
                  if($("#module").val().includes(day)){
                    //   if($("#module").val()->check_wek == day){
                      
                      console.log($("#module").val().includes(day));
                       console.log('day to skip is:'+day);
                       
                        var check=1
                   }else{
                       console.log('no day for skip is found');
                       
                       var check=0;
                   }
                   
                //   }
               }
            
            //  test ends weekends
               
               
               
               console.log('i am a  day:'+ day);
     console.log('i am skip :'+ skip +'check condition :'+ check);
    if(skip && check){
        
        day_i +=1;
                    console.log('i am else');
       
                }else{
                    
                    if(bag_row_counter ==1){
                        
                         console.log('i am 1 of new row adding');
                    //   var bag_row = '<div class="row" id="bag_row_block_'+bag_row_counter+'"><div class="col-sm-2"> <label for="date">Date</label><input type="text" class="form-control" name="date[]" id="date" value="'+year+'-' + month + '-'+dt+'" readonly></div><div class="col-sm-1"> <label for="day">Day</label><input type="text" class="form-control" name="day[]" id="day" value="'+day+'" readonly></div><div class="col-sm-2"> <label for="emirate">Select Emirate & Area*</label><select  name="area[]" id="area" class="form-control abc" required><?php if (count($area) > 0) { ?> <?php foreach ($area as $data) { ?> <option class="" value="<?php echo $data->area_name; ?>"> <?php echo $data->area_name; ?> </option><?php }} ?></select> </div><div class="col-sm-3"> <label for="addr">Address*</label> &nbsp  <span onclick="copy_to_next('+bag_row_counter+')" class="btn btn-xs">copy +1</span> &nbsp <span onclick="copy_all('+bag_row_counter+')" class="btn btn-xs">copy all</span><input type="text" class="form-control" name="addr[]" id="addr" placeholder="house no 00 near street 00" required> </div><div class="col-sm-2"> <label for="time">Select Time Slot*</label> <select  name="time[]" id="time" class="form-control abc" required><?php if (count($time) > 0) { ?> <?php foreach ($time as $data) { ?> <option class="" value="<?php echo $data; ?>"> <?php echo $data; ?> </option><?php }} ?></select> </div>  <div class="col-sm-2"> <label for="S_D">Single/Double*</label> <select  name="S_D[]" id="S_D" class="form-control abc SD_block" onchange="check_sd('+bag_row_counter+')"  required><option class="" value="single">Single</option><option class="" value="double">Double</option></select> </div><input type="hidden" name="bagsHid[]" value="" class="form-control" /> <input type="hidden" name="delivered_check[]" value="" id="delivered_check"/>  </div><hr>';
                
                var bag_row = line_+'<div class="jumbotron row" id="bag_row_block_'+bag_row_counter+'"><div class=" col-sm-2"> <label for="date">Date</label><input type="text" class="form-control" name="date[]" id="date" value="'+year+'-' + month + '-'+dt+'" readonly></div><div class="col-sm-1"> <label for="day">Day</label><input type="text" class="form-control" name="day[]" id="day" value="'+day+'" readonly></div> <div class="col-sm-4"> <label for="emirate">Select Address*</label>  &nbsp  <span onclick="copy_to_next('+bag_row_counter+')" class="btn btn-xs">copy +1</span> &nbsp <span onclick="copy_all('+bag_row_counter+')" class="btn btn-xs">copy all</span><select  name="addr_list[]" id="addr_list" class="search_option form-control abc" onchange="myFunction_addr('+bag_row_counter+')" required">';
                      
                            if(addr_obj != undefined || addr_obj.length != 0) { 
                                for(var list=0; list< addr_obj.length; list++){
                                    
                                    bag_row +='<option  class=""  value="'+list+'"> '+addr_obj[list].address +'</option>';
                                    
                                    
                                }
                            }
                                
                                
                                bag_row +=' </select> </div><div class="col-sm-2"> <label for="emirate">Emirate & Area</label><select  name="area[]" id="area" class="form-control abc" required><?php if (count($area) > 0) { ?> <?php foreach ($area as $data) { ?> <option class="" value="<?php echo $data->area_id; ?>"> <?php echo $data->area_name; ?> </option><?php }} ?></select> </div><div class="col-sm-2"> <label for="time">Time Slot*</label> <select  name="time[]" id="time" class="form-control abc" required><?php if (count($time) > 0) { ?> <?php foreach ($time as $key => $data) { ?> <option class="" value="<?php echo $key; ?>"> <?php echo $data; ?> </option><?php }} ?></select> </div>  <div class="adjust_t col-sm-3"> <label for="S_D">Google Link*</label> <textarea name="google_address[]" id="google_address" class="form-control rows=" 6" cols="30" readonly></textarea></div>  <div class="adjust_t col-sm-2"><label for="PickupPoint">Pickup Point</label> <input  class="form-control" type="text" name="PickupPoint[]" id="PickupPoint"  value="Office Location" /> </div>    <div class="adjust_t col-sm-2"><label for="Product Type">Product Type</label> <input  class="form-control" type="text" name="ProductType[]" id="ProductType" value="Food/Liquid"/> </div>  <div class="adjust_t col-sm-2"><label for="Delivery Amount">Delivery Amount</label> <input class="form-control" name="Delivery_Amount[]" id="Delivery_Amount" placeholder="(AED)" oninput="javascript:validity.valid||(value='+"' '"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type="number" maxlength="8" step="0.01" min="0"> </div>  <div class="adjust_t col-sm-2"><label for="CompanyID">CompanyID/UniqueID</label> <input  class="form-control" type="text" name="CompanyID[]" id="CompanyID"/> </div> <div class="adjust_t col-sm-3"><label for="notes">Notes</label> <textarea name="notes[]"  class="form-control rows=" 6" cols="30"></textarea></div> <div class="adjust_t col-sm-2"><label for="notification">Notification</label> <select class="form-control" name="notification[]" required=""><option value="Yes">Yes</option><option value="No">No</option></select></div>  <input type="hidden" name="bagsHid[]" value="" class="form-control" /> <input type="hidden" name="delivered_check[]" value="" id="delivered_check"/> </div><hr>';
 
                
                
                
                            $(".bag_pricing-box").append(bag_row);
                            
                            // Setting initial values to area and timeslot of added address
                             $('#bag_row_block_'+bag_row_counter+' >div>select[name="area[]"]').val(addr_obj[0].area_id);
                            $('#bag_row_block_'+bag_row_counter+' >div>select[name="time[]"]').val(addr_obj[0].emirate_id+','+addr_obj[0].slot_id);
                            $('#bag_row_block_'+bag_row_counter+' >div>textarea[name="google_address[]"]').val(addr_obj[0].google_link_addrs);
                            
                            
                            
                            
                             $('#bag_row_block_'+bag_row_counter+' >div>select[name="area[]"]').attr("disabled", true);
                            $('#bag_row_block_'+bag_row_counter+' >div>select[name="time[]"]').attr("disabled", true);
                            
                            
                            bag_row_counters +=1;
                            bag_row_counter +=1;
                            day_i +=1;
                        
                    }else{
                        
                         console.log('i am if others of new row added');
                        //  var bag_row = '<div class="row" id="bag_row_block_'+bag_row_counter+'"><div class="col-sm-2"> <label for="date">Date</label><input type="text" class="form-control" name="date[]" id="date" value="'+year+'-' + month + '-'+dt+'" readonly></div><div class="col-sm-1"> <label for="day">Day</label><input type="text" class="form-control" name="day[]" id="day" value="'+day+'" readonly></div><div class="col-sm-2"> <label for="emirate">Select Emirate & Area*</label><select  name="area[]" id="area" class="form-control abc" required><?php if (count($area) > 0) { ?> <?php foreach ($area as $data) { ?> <option class="" value="<?php echo $data->area_name; ?>"> <?php echo $data->area_name; ?> </option><?php }} ?></select> </div><div class="col-sm-3"> <label for="addr">Address*</label> &nbsp  <span onclick="copy_to_next('+bag_row_counter+')" class="btn btn-xs">copy +1</span> <input type="text" class="form-control" name="addr[]" id="addr" placeholder="house no 00 near street 00" required> </div><div class="col-sm-2"> <label for="time">Select Time Slot*</label> <select  name="time[]" id="time" class="form-control abc" required><?php if (count($time) > 0) { ?> <?php foreach ($time as $data) { ?> <option class="" value="<?php  echo $data; ?>"> <?php echo $data; ?> </option><?php }} ?></select> </div>  <div class="col-sm-2"> <label for="S_D">Single/Double*</label> <select   name="S_D[]" id="S_D" class="form-control abc SD_block" onchange="check_sd('+bag_row_counter+')" required><option class="" value="single">Single</option><option class="" value="double">Double</option></select> </div><input type="hidden" name="bagsHid[]" value="" class="form-control" /> <input type="hidden" name="delivered_check[]" value="" id="delivered_check"/></div> <hr> ';
                
                               
                     var bag_row = line_+'<div class="jumbotron row" id="bag_row_block_'+bag_row_counter+'"><div class=" col-sm-2"> <label for="date">Date</label><input type="text" class="form-control" name="date[]" id="date" value="'+year+'-' + month + '-'+dt+'" readonly></div><div class="col-sm-1"> <label for="day">Day</label><input type="text" class="form-control" name="day[]" id="day" value="'+day+'" readonly></div> <div class="col-sm-4"> <label for="emirate">Select Address*</label>  &nbsp  <span onclick="copy_to_next('+bag_row_counter+')" class="btn btn-xs">copy +1</span> <select  name="addr_list[]" id="addr_list" class="search_option form-control abc" onchange="myFunction_addr('+bag_row_counter+')" required">';
                      
                            if(addr_obj != undefined || addr_obj.length != 0) { 
                                for(var list=0; list< addr_obj.length; list++){
                                    
                                    bag_row +='<option  class=""  value="'+list+'"> '+addr_obj[list].address +'</option>';
                                    
                                    
                                }
                            }
                                
                                
                                bag_row +=' </select> </div><div class="col-sm-2"> <label for="emirate">Emirate & Area</label><select  name="area[]" id="area" class="form-control abc" required><?php if (count($area) > 0) { ?> <?php foreach ($area as $data) { ?> <option class="" value="<?php echo $data->area_id; ?>"> <?php echo $data->area_name; ?> </option><?php }} ?></select> </div><div class="col-sm-2"> <label for="time">Time Slot*</label> <select  name="time[]" id="time" class="form-control abc" required><?php if (count($time) > 0) { ?> <?php foreach ($time as $key => $data) { ?> <option class="" value="<?php echo $key; ?>"> <?php echo $data; ?> </option><?php }} ?></select> </div>  <div class="adjust_t col-sm-3"> <label for="S_D">Google Link*</label> <textarea name="google_address[]" id="google_address" class="form-control rows=" 6" cols="30" readonly></textarea></div>  <div class="adjust_t col-sm-2"><label for="PickupPoint">Pickup Point</label> <input  class="form-control" type="text" name="PickupPoint[]" id="PickupPoint"  value="Office Location" /> </div>    <div class="adjust_t col-sm-2"><label for="Product Type">Product Type</label> <input  class="form-control" type="text" name="ProductType[]" id="ProductType" value="Food/Liquid"/> </div>  <div class="adjust_t col-sm-2"><label for="Delivery Amount">Delivery Amount</label> <input class="form-control" name="Delivery_Amount[]" id="Delivery_Amount" placeholder="(AED)" oninput="javascript:validity.valid||(value='+"' '"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type="number" maxlength="8" step="0.01" min="0"> </div>  <div class="adjust_t col-sm-2"><label for="CompanyID">CompanyID/UniqueID</label> <input  class="form-control" type="text" name="CompanyID[]" id="CompanyID"/> </div>  <div class="adjust_t col-sm-3"><label for="notes">Notes</label> <textarea name="notes[]" class="form-control rows=" 6" cols="30"></textarea></div> <div class="adjust_t col-sm-2"><label for="notification">Notification</label> <select class="form-control" name="notification[]" required=""><option value="Yes" >Yes</option><option value="No">No</option></select></div>  <input type="hidden" name="bagsHid[]" value="" class="form-control" /> <input type="hidden" name="delivered_check[]" value="" id="delivered_check"/> </div><hr>';
 
                
                            $(".bag_pricing-box").append(bag_row);
                            
                             <?php if($this->uri->segment(5)=='edit') { ?>
                             
                             $('#bag_row_block_'+bag_row_counter).css('background-color', '#4fc6e1ad');
                             <?php } ?>
                            
                            // Setting initial values to area and timeslot of added address
                            $('#bag_row_block_'+bag_row_counter+' >div>select[name="area[]"]').val(addr_obj[0].area_id);
                            $('#bag_row_block_'+bag_row_counter+' >div>select[name="time[]"]').val(addr_obj[0].emirate_id+','+addr_obj[0].slot_id);
                            
                            // alert(addr_obj[0].google_link_addrs);
                             $('#bag_row_block_'+bag_row_counter+' >div>textarea[name="google_address[]"]').val(addr_obj[0].google_link_addrs);
                            
                            
                            $('#bag_row_block_'+bag_row_counter+' >div>select[name="area[]"]').attr("disabled", true);
                            $('#bag_row_block_'+bag_row_counter+' >div>select[name="time[]"]').attr("disabled", true);
                            
                            bag_row_counters +=1;
                            bag_row_counter +=1;
                            day_i +=1;
                        
                    }
                    
                } //END of else of skip and check
        } //END of for loop
       
          $("#num_of_rows").val(bag_row_counters);
          $("#no_of_days").val(bag_row_counters);
          
          $scv=parseInt($("#no_of_days").val());
          
          if($scv > 0 || $scv !=''){
              
              save_check =1;
          }
          
          var last_row_val=$("#num_of_rows").val();
         $("#tot_orders").val(bag_row_counters);
         //   $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
          
       
        // var emirate_selector="#bag_row_block_"+bag_row_counter+">div>select[name='bag_emirate[]']";
        // dynamicEmirateOptions(emirate_selector);
        // var service_selector="#bag_row_block_"+bag_row_counter+" >div>select[name='bag_service_type[]]'";
        // dynamicServiceOptions(service_selector);
        
        // //getting original id back
        // id = parseInt(bag_row_counter) - 1;
        
        //making emirate and service uneditable after new row appended
        // $('#bag_row_block_'+id+' >div>select[name="bag_emirate[]"]').attr("disabled", true); 
        // $('#bag_row_block_'+id+' >div>select[name="bag_emirate[]"]').css('background-color', 'silver');
        // $('#bag_row_block_'+id+' >div>select[name="bag_service_type[]"]').attr("disabled", true);
        // $('#bag_row_block_'+id+' >div>select[name="bag_service_type[]"]').css('background-color', 'silver');
        // changeBagSES('inactive',emirate,service);
          
                         //  $("#bag_row_block_"+bag_row_counter+">div>select[name='bag_emirate[]']").trigger('click');
           

        //show_bag_service_tracker();
        //change icon only after current row processed successfully
        // $("#add_bag_row_btn_"+id).hide();
        // $("#remove_bag_row_btn_"+id).show();
        
    //   var element = $("#bag_row_block_"+bag_row_counter+">div>select[name='bag_emirate[]']").prop('id');
    //   console.log('i am idddddddddd:'+element);
            // var e = document.createEvent('MouseEvents');
            // e.initEvent('click', true, true);
            // $('#'+element).dispatchEvent(e);
     
//   }else{
//         swal("Please Select Emirate and Service Carefully", "", "warning");
//     }

    
    
    
    
//     document.body.scrollTop = 0; // For Safari
//   document.documentElement.scrollTop = 0;

    // alert("$('#bag_row_block_'"+scroll+")");
    //  $("html, body").animate({ scrollTop: $('#bag_row_block_'+scroll).scrollTop() }, 1000);
    
    
    
    $('#to_date').val($('#bag_row_block_'+bag_row_counters+' >div>input[name="date[]"]').val());
    
     console.log('$("#bag_row_block_"'+scroll);
      <?php if($this->uri->segment(5)=='edit') { ?>
     $("html, body").animate({ scrollTop: $("#bag_row_block_"+scroll).offset().top}, 1000);
      <?php } ?>

}    //function ends



function remove_bag_row() {
        
        <?php if($this->uri->segment(5)=='edit') { ?>
             var condition_check =old_bag_rows_counter;
        <?php }else{ ?>
             var condition_check =0;
        <?php } ?>
         if(bag_row_counters > condition_check){
        console.log('i am greater to 0 counter is:'+bag_row_counters);
   
           console.log('condition chechk is:'+ condition_check);
        for(var r=bag_row_counters; r>condition_check; r--){
        
        $(".bag_pricing-box").find('hr').remove();
         $("#bag_row_block_"+bag_row_counters).remove();
       
        // For remove line heading of new delivery start
           $("#"+bag_row_counters).remove();
            $(".div1c").remove();
         //  End
      
           bag_row_counters=bag_row_counters-1;
       
        
          console.log('after remove 1 row bag counter is :'+ bag_row_counters);
          
          $("#tot_orders").val(bag_row_counters);
         
        }
        
    }else{
        console.log('i am = to 0 counter is:'+bag_row_counters);
    }
    
        // //getting values of emirates and service selected (updating)
        // var emirate= $('#bag_row_block_'+id+' >div>select[name="bag_emirate[]"]>option:selected').text();
        
        // var service= $('#bag_row_block_'+id+' >div>select[name="bag_service_type[]"]>option:selected').text();
        //  if(emirate!='---Select---' && service!='' && service!='---Select---'){
        //   changeBagSES('active',emirate,service);
        //  }
       
    }






// $("#add_vendor_form").submit(function());
<?php // if (!empty($this->uri->segment(3))) { ?>
<?php if($this->uri->segment(5)=='edit') { ?>
 console.log('helloooooooooooooooooooooo');
    get_vendor_by_id(<?php echo $this->uri->segment(3) ?>,<?php echo $this->uri->segment(6) ?>);
     
       bag_row_counters=0;
       old_bag_rows_counter=0;
       
      
<?php } ?>
 function get_vendor_by_id(id,planid){
     $("#plan_id_is").val(planid);
    var url = "<?php echo base_url(); ?>"+"MonthlyMeal/get_plan_detail_by_id";
    $fields = {'id':planid,'customerid':id};
    $.post(url, $fields, function(response){
        if(response.success) {
            console.log(response);
            var vendor = response.plan_data[0];
            var stats = response.stats[0];
            var customer = response.customer[0];
            
            
             var formattedDate = new Date();
                  var d = formattedDate.getDate();
                   var m =  formattedDate.getMonth();
                   m += 1;  // JavaScript months are 0-11
                var y = formattedDate.getFullYear();
                
                if (d < 10) {
                      d = '0' + d;
                    }
                    if (m < 10) {
                      m = '0' + m;
                    }
                
                $("#today_date").val(y+'-'+m+'-'+d);
                var tody_dt=$("#today_date").val();
                // .val(y+'-'+m+'-'+d);
                
                
                console.log('..............chechkinggg new date..............');
                console.log(new Date());
                console.log($("#today_date").val());
                 console.log('..............chechkinggg today date..............');
                  
           
            
        //       var xyz_file=vendor.plan_sheet;
        //       if(xyz_file == ''){
        //           $("#cf").append("<span><a id='av' style='color:red;'><b>Not Available</b></a></span>");
        //           $('#av').removeAttr("href");
        //       }else{
        //           $("#cf").append("<span><a id='av' style='color:green;'><b>Already Available</b></a></span>");
        //     $('#av').attr("href",xyz_file);
        //   $('#contr_file').val(xyz_file);
        //       }
              
              
              
            //   
            
            
               var m11='Start Date: '+stats.from_d;
               $("#sp_old_from_date").text(m11);
              
              
               var m11='Expiry Date: '+stats.to_d;
                 $("#sp_old_to_date").text(m11);
            // 
            
            
              $("#Expiry_date").val(stats.to_d);
              $("#Start_date").val(stats.from_d);
            //   $("#to_date").val(vendor.to_d);
            // $("#from_date").val(vendor.from_d);
            
            $("#notes").val(vendor.notes);
            
             var date_old_p=stats.to_d;
            
            
            // RECENT FIND ISSUE
           $("#num_of_rows").val(stats.no_days);
            $("#no_of_days").val(stats.no_days);
           
                              if(vendor.send_notification == 'Yes'){
                       
                            $("#notif_box").prop( "checked", true );
                        }
           
           $("#vendor_id").val(vendor.vendor_id);
          
          
            bag_row_counters=parseInt(stats.no_days);
            old_bag_rows_counter=parseInt(stats.no_days);
            
            console.log('bag_row_counters is:' + bag_row_counters);
            console.log('old bag_row_counters is:' + old_bag_rows_counter);
            
            
            var i_am_curr_dt=stats.i_am_curr_dt;
            
            
            
            
            // var filename = uurl.split('//').pop();
            // filename =filename.split('/').pop();
            // console.log(filename);
           //  $("#contract_file").val(filename);
            
            console.log('i am start loop');
          
            
         $("#sch_plan").css('display', '');
        //BAGS QOUTS
             var i=1;
            for(let j = 0; j < response.bags_qout.length; j++){
                console.log('helo ayesha');
                let childArray = response.bags_qout[j];
                console.log('i am bags qouts counter of i at strt :'+i);
                 var o_d=childArray.o_date;
                 
                 
        <?php if($this->session->userdata('role_id') != 2){ ?>
                if( o_d < tody_dt || childArray.status =='Ship' || childArray.status =='Collected' || childArray.status =='Delivered'  || childArray.cancel == 'yes'){
                    // alert(o_d+'(  o_d < tody_dt  )'+tody_dt+' status is'+childArray.status);
        <?php }else{ ?>
                if( o_d <= tody_dt || childArray.status =='Ship' || childArray.status =='Collected' || childArray.status =='Delivered'  || childArray.cancel == 'yes' ){  
                    // alert(o_d+'( o_d <= tody_dt  )'+tody_dt+' status is'+childArray.status);
       <?php } ?>
       
       
                    //   console.log('helo ayesha');
                        addr_obj=JSON.parse(customer.mul_address);
                         console.log('i am if and addr obj'+addr_obj);
                      var bag_row = '<div class="jumbotron row" id="bag_row_block_'+i+'"><div class=" col-sm-2"> <label for="date">Date</label><input type="text" class="form-control" name="date[]" id="date" value="'+childArray.o_date+'" readonly></div><div class="col-sm-1"> <label for="day">Day</label><input type="text" class="form-control" name="day[]" id="day" value="'+childArray.o_day+'" readonly></div> <div class="col-sm-4"> <label for="emirate">Select Address*</label><select  name="addr_list[]" id="addr_list" class="search_option form-control abc" onchange="myFunction_addr('+i+')" required">';
                      
                            if(addr_obj != undefined || addr_obj.length != 0) { 
                                for(var list=0; list< addr_obj.length; list++){
                                    
                                    bag_row +='<option  class=""  value="'+list+'"> '+addr_obj[list].address +'</option>';
                                    
                                    
                                }
                            }
                                
                                
                                bag_row +=' </select> </div><div class="col-sm-2"> <label for="emirate">Emirate & Area</label><select  name="area[]" id="area" class="form-control abc" required><?php if (count($area) > 0) { ?> <?php foreach ($area as $data) { ?> <option class="" value="<?php echo $data->area_id; ?>"> <?php echo $data->area_name; ?> </option><?php }} ?></select> </div><div class="col-sm-2"> <label for="time">Time Slot*</label> <select  name="time[]" id="time" class="form-control abc" required><?php if (count($time) > 0) { ?> <?php foreach ($time as $key => $data) { ?> <option class="" value="<?php echo $key; ?>"> <?php echo $data; ?> </option><?php }} ?></select> </div>  <div class="adjust_t col-sm-3"> <label for="S_D">Google Link*</label> <textarea name="google_address[]" id="google_address" class="form-control rows=" 6" cols="30" readonly></textarea></div>  <div class="adjust_t col-sm-2"><label for="Bagtype">Bag Type</label> <input  class="form-control" type="text" name="Bagtype[]" id="Bagtype" value="" readonly/> </div> <div class="adjust_t col-sm-2"><label for="PickupPoint">Pickup Point</label> <input  class="form-control" type="text" name="PickupPoint[]" id="PickupPoint"  value="Office Location" /> </div>    <div class="adjust_t col-sm-2"><label for="Product Type">Product Type</label> <input  class="form-control" type="text" name="ProductType[]" id="ProductType" value="Food/Liquid"/> </div>  <div class="adjust_t col-sm-2"><label for="Delivery Amount">Delivery Amount</label> <input class="form-control" name="Delivery_Amount[]" id="Delivery_Amount" placeholder="(AED)" oninput="javascript:validity.valid||(value='+"' '"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type="number" maxlength="8" step="0.01" min="0"> </div>  <div class="adjust_t col-sm-2"><label for="CompanyID">CompanyID/UniqueID</label> <input  class="form-control" type="text" name="CompanyID[]" id="CompanyID"/> </div> <div class="adjust_t col-sm-3"><label for="notes">Notes</label> <textarea name="notes[]"  class="form-control rows=" 6" cols="30"></textarea></div> <div class="adjust_t col-sm-2"><label for="notification">Notification</label> <select class="form-control" name="notification[]" required=""><option value="Yes" >Yes</option><option value="No" >No</option></select></div>  <div class="adjust_t col-sm-2"><label for="freeze">Action</label> <select   name="freeze[]"  class="form-control"  onchange="freeze_check('+i+')"  pk="" required><option class="" value="Active">Active</option><option class="" value="Freezed">Freeze</option></select>  </div> <div class="adjust_t col-sm-2"><label for="order_status">Delivery Status</label><input type="text" class="form-control" name="delivery_status[]" id="delivery_status" value="" readonly /></div>  <input type="hidden" name="bagsHid[]" value="'+childArray.order_id+'" class="form-control" /> <input type="hidden" name="delivered_check[]" value="" id="delivered_check"/> </div><hr>';
                
                            $(".Edit_bag_pricing-box").append(bag_row);
                            
                            
                            // Block the row and set deleivered to 1
                            
                       console.log('order date :'+o_d+' current date :'+tody_dt);
                       var vp=1;
                      $('#bag_row_block_'+i+'>input[name="delivered_check[]"]').val(vp);
                      $('#bag_row_block_'+i).attr("disabled", true);
                      $('#bag_row_block_'+i+' >div>select[name="area[]"]').attr("disabled", true);
                      $('#bag_row_block_'+i+' >div>select[name="time[]"]').attr("disabled", true);
                    //   $('#bag_row_block_'+i+'>div>select[name="S_D[]"]').attr("disabled", true);
                      
                      $('#bag_row_block_'+i+'>div>select[name="freeze[]"]').attr("disabled", true);
                      
                        $('#bag_row_block_'+i+'>div>select[name="addr_list[]"]').attr("disabled", true);
                        $('#bag_row_block_'+i+'>div>input[name="CompanyID[]"]').attr("disabled", true);
                        $('#bag_row_block_'+i+'>div>textarea[name="notes[]"]').attr("disabled", true);
                         $('#bag_row_block_'+i+'>div>select[name="notification[]"]').attr("disabled", true);
                         
                          $('#bag_row_block_'+i+'>div>input[name="PickupPoint[]"]').attr("disabled", true);
                          $('#bag_row_block_'+i+'>div>input[name="ProductType[]"]').attr("disabled", true);
                        
                        $("#bag_row_block_"+i).css('background-color', 'rgb(138 151 164)');
                        
                        $('#bag_row_block_'+i+' >div>input[name="Delivery_Amount[]"]').attr("disabled", true);
                      console.log('i am inside block case');
                           
                           
                        
                    }else{
                        
                        //  console.log('i am if');
                    //   var bag_row = '<div class="row" id="bag_row_block_'+i+'"><div class="col-sm-2"> <label for="date">Date</label><input type="text" class="form-control" name="date[]" id="date" value="'+childArray.o_date+'" readonly></div><div class="col-sm-1"> <label for="day">Day</label><input type="text" class="form-control" name="day[]" id="day" value="'+childArray.day+'" readonly></div><div class="col-sm-2"> <label for="emirate">Select Emirate & Area*</label><select  name="area[]" id="area" class="form-control abc" required><?php if (count($area) > 0) { ?> <?php foreach ($area as $data) { ?> <option class="" value="<?php echo $data->area_name; ?>"> <?php echo $data->area_name; ?> </option><?php }} ?></select> </div><div class="col-sm-3"> <label for="addr">Address*</label> &nbsp  <span onclick="copy_to_next('+i+')" class="btn btn-xs">copy +1</span> <input type="text" class="form-control" name="addr[]" id="addr" value="'+childArray.addr+'" required> </div><div class="col-sm-2"> <label for="time">Select Time Slot*</label> <select  name="time[]" id="time" class="form-control abc" required><?php if (count($time) > 0) { ?> <?php foreach ($time as $data) { ?> <option class="" value="<?php  echo $data; ?>"> <?php echo $data; ?> </option><?php }} ?></select> </div>  <div class="col-sm-1"> <label for="S_D">Sing/Doub*</label> <select   name="S_D[]" id="S_D" class="form-control abc SD_block"  onchange="check_sd('+i+','+vendor.id+','+vendor.customer_id+')" required><option class="" value="single">Single</option><option class="" value="double">Double</option></select> </div><div class="col-sm-1"><label for="freeze">Status</label> <select   name="freeze[]" id="freeze" class="form-control"  onchange="freeze_check('+i+' , '+vendor.id+')"   pk="" required><option class="" value="Active">Active</option><option class="" value="Freezed">Freeze</option><option class="" value="Skipped">Skip</option></select></div><input type="hidden" name="bagsHid[]" value="'+childArray.order_id+'" class="form-control" /> <input type="hidden" name="delivered_check[]" value="" id="delivered_check"/> </div><hr>';
                
                    //         $(".Edit_bag_pricing-box").append(bag_row);
                            
                            
                            
                            
                            
                            addr_obj=JSON.parse(customer.mul_address);
                         console.log('i am if and addr obj'+addr_obj);
                      var bag_row = '<div class="jumbotron row" id="bag_row_block_'+i+'"><div class=" col-sm-2"> <label for="date">Date</label><input type="text" class="form-control" name="date[]" id="date" value="'+childArray.o_date+'" readonly></div><div class="col-sm-1"> <label for="day">Day</label><input type="text" class="form-control" name="day[]" id="day" value="'+childArray.o_day+'" readonly></div> <div class="col-sm-4"> <label for="emirate">Select Address*</label> &nbsp  <span onclick="copy_to_next('+i+')" class="btn btn-xs">copy +1</span><select  name="addr_list[]" id="addr_list" class="search_option form-control abc" onchange="myFunction_addr('+i+')" required">';
                      
                            if(addr_obj != undefined || addr_obj.length != 0) { 
                                for(var list=0; list< addr_obj.length; list++){
                                    
                                    bag_row +='<option  class=""  value="'+list+'"> '+addr_obj[list].address +'</option>';
                                    
                                    
                                }
                            }
                                
                                
                                bag_row +=' </select> </div><div class="col-sm-2"> <label for="emirate">Emirate & Area</label><select  name="area[]" id="area" class="form-control abc" required><?php if (count($area) > 0) { ?> <?php foreach ($area as $data) { ?> <option class="" value="<?php echo $data->area_id; ?>"> <?php echo $data->area_name; ?> </option><?php }} ?></select> </div><div class="col-sm-2"> <label for="time">Time Slot*</label> <select  name="time[]" id="time" class="form-control abc" required><?php if (count($time) > 0) { ?> <?php foreach ($time as $key => $data) { ?> <option class="" value="<?php echo $key; ?>"> <?php echo $data; ?> </option><?php }} ?></select> </div>  <div class="adjust_t col-sm-3"> <label for="S_D">Google Link*</label> <textarea name="google_address[]" id="google_address" class="form-control rows=" 6" cols="30" readonly></textarea></div>  <div class="adjust_t col-sm-2"><label for="Bagtype">Bag Type</label> <input  class="form-control" type="text" name="Bagtype[]" id="Bagtype" value="" readonly/> </div> <div class="adjust_t col-sm-2"><label for="PickupPoint">Pickup Point</label> <input  class="form-control" type="text" name="PickupPoint[]" id="PickupPoint"  value="Office Location" /> </div>    <div class="adjust_t col-sm-2"><label for="Product Type">Product Type</label> <input  class="form-control" type="text" name="ProductType[]" id="ProductType" value="Food/Liquid"/> </div>  <div class="adjust_t col-sm-2"><label for="Delivery Amount">Delivery Amount</label> <input class="form-control" name="Delivery_Amount[]" id="Delivery_Amount" placeholder="(AED)" oninput="javascript:validity.valid||(value='+"' '"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type="number" maxlength="8" step="0.01" min="0"> </div>  <div class="adjust_t col-sm-2"><label for="CompanyID">CompanyID/UniqueID</label> <input  class="form-control" type="text" name="CompanyID[]" id="CompanyID"/> </div>  <div class="adjust_t col-sm-3"><label for="notes">Notes</label> <textarea name="notes[]"  class="form-control rows=" 6" cols="30"></textarea></div> <div class="adjust_t col-sm-2"><label for="notification">Notification</label> <select class="form-control" name="notification[]" required=""><option value="Yes" >Yes</option><option value="No">No</option></select></div> <div class="adjust_t col-sm-2"><label for="freeze">Action</label> <select   name="freeze[]"  class="form-control"  onchange="freeze_check('+i+')"  pk="" required><option class="" value="Active">Active</option><option class="" value="Freezed">Freeze</option></select>  </div> <div class="adjust_t col-sm-2"><label for="order_status">Delivery Status</label><input type="text" class="form-control" name="delivery_status[]" id="delivery_status" value="" readonly /></div>  <input type="hidden" name="bagsHid[]" value="'+childArray.order_id+'" class="form-control" /> <input type="hidden" name="delivered_check[]" value="" id="delivered_check"/> </div><hr>';
                
                            $(".Edit_bag_pricing-box").append(bag_row);
                            
                            
                            $('#bag_row_block_'+i+' >div>select[name="area[]"]').attr("disabled", true);
                            $('#bag_row_block_'+i+' >div>select[name="time[]"]').attr("disabled", true);
                          
                        
                    }        
                
                 
                //  Temporary i did this
                //  $('#bag_row_block_'+i+' >div>select[name="freeze[]"]').attr("disabled", true);
                 
                 
                 
               $('#bag_row_block_'+i+' >div>select[name="addr_list[]"]').val(childArray.mul_addr_id);    
              $('#bag_row_block_'+i+' >div>select[name="area[]"]').val(childArray.area_name);
               $('#bag_row_block_'+i+' >div>select[name="time[]"]').val(childArray.emirateID+','+childArray.slotID);
               
               
                var g_addr=JSON.parse(childArray.google_link_addrs);
                $('#bag_row_block_'+i+'>div>textarea[name="google_address[]"]').val(g_addr.google_link);
                
                
                
                
               
                  if(childArray.o_status == 'Merged'){
               
                    $('#bag_row_block_'+i+'>div>select[name="freeze[]"]').val('Active');
                
                  }else{
                      
                      $('#bag_row_block_'+i+'>div>select[name="freeze[]"]').val(childArray.o_status);
                  }
                if(childArray.o_status == 'Freezed'){
                    
                    $("#bag_row_block_"+i).css('background-color', 'silver');
                }else if(childArray.o_status == 'Skipped'){
                    
                     $("#bag_row_block_"+i).css('background-color', '#404143');
                     $("#bag_row_block_"+i).attr("pk","S");
                }
                
                var deliv_status='';
                var color='';
                if(childArray.status =='Not Assign' && childArray.cancel!='yes'){
                    deliv_status='Not Assigned';
                    color='#ffff00cc';
                   
                }else if(childArray.status =='Assign' && childArray.cancel!='yes'){
                    
                    deliv_status='Assigned';
                    color='#ffa500de';
                    
                }else if(childArray.status =='Cancel' && childArray.cancel!='yes'){
                    deliv_status='Canceled';
                    color='#ff0000a6';
                    
                   
                }else if(childArray.status =='Delivered' && childArray.cancel!='yes'){
                    deliv_status='Delivered';
                    color='#00800078';
                  
                }else if(childArray.status =='Collected' && childArray.cancel!='yes'){
                    deliv_status='Delivered';
                    color='#00800078';
                    
                     
                }else if(childArray.status =='Ship' && childArray.cancel!='yes'){
                    deliv_status='In Ship';
                    color='#0000ff5c';
                    
               }else if(childArray.status == 'Cancel' || childArray.cancel == 'yes'){
                    deliv_status='Canceled';
                    color='#ff0000a6';
                         
                }else{
                    deliv_status='Unknown';
                } 
                
                $('#bag_row_block_'+i+'>div>input[name="delivery_status[]"]').val(deliv_status);
                $('#bag_row_block_'+i+'>div>input[name="delivery_status[]"]').css('background-color', color);
                
                
                
                
                
                $('#bag_row_block_'+i+'>div>input[name="ProductType[]"]').val(childArray.food_type);
                $('#bag_row_block_'+i+'>div>input[name="PickupPoint[]"]').val(childArray.pickUp);
                $('#bag_row_block_'+i+'>div>input[name="CompanyID[]"]').val(childArray.company_note);
                $('#bag_row_block_'+i+'>div>input[name="Delivery_Amount[]"]').val(childArray.delivery_amount);
                
                $('#bag_row_block_'+i+'>div>textarea[name="notes[]"]').val(childArray.note);
                $('#bag_row_block_'+i+'>div>select[name="notification[]"]').val(childArray.send_notification);
                
                
                
                
                var bag_type='';
                if(childArray.bag_type ==0){
                   bag_type='Paper bag';
                }else if(childArray.bag_type ==1){
                    bag_type='Cooling bag QR:'+childArray.bag_qr;
               }else{
                   bag_type='Unknown';
                   
                }
                
                $('#bag_row_block_'+i+'>div>input[name="Bagtype[]"]').val(bag_type);
                
                 i +=1;
                // console.log(childArray.single_doub);
        //         <?php //if($this->uri->segment(2)=='edit') { ?> 
                        
        //                     var emirate_selected= $("#bag_row_block_"+i+">div>select[name='bag_emirate[]']>option:selected").text();
        //                     var temp_id='bag_row_block_'+i;
        //                     bagConServiceSelector="#"+temp_id+">div>select[name='bag_service_type[]']";
        //                     dynamicBagConServiceOptions(emirate_selected,bagConServiceSelector);
        //   <?php //} ?>
        //       $('#bag_row_block_'+i+' >div>select[name="bag_service_type[]"]').val(childArray.tbl_bag_servi);
        //       $('#bag_row_block_'+i+' >div>input[name="bag_price[]"]').val(childArray.tbl_bag_price);
        //       $('#bag_row_block_'+i+' >div>input[name="bag_same_loc_price[]"]').val(childArray.tbl_bag_same_loc_p);
        //       $('#bag_row_block_'+i+' >div>input[name="bagsHid[]"]').val(childArray.id);
        //       $("#remove_bag_row_btn_"+i).attr("onclick","delete_rows_('"+i+"','b', '"+childArray.id+"')");
                  
                  
                    if(childArray.o_status == 'Freezed'){
                                     
                                      $("#bag_row_block_"+i).css('background-color', 'rgb(138 151 164)');
                                    }
                  
                }
                
                //  console.log('hello this is child arry test');
                //   console.log(childArray.o_status);
                
                  var last_row_val=$("#no_of_days").val();
          
          $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
                  
                  
                                // var date_old_plan_incr_by_next = moment(date_old_p).add(1, 'days');
                //               // date_old_plan_incr_by_next = date_old_p.setDate(date_old_p.getDate() + 1)
                  
                //   $(".flatpickr-input").flatpickr({
                //     minDate:date_old_p
                // });
                // date_old_p
                
            //     $("#from_date").flatpickr({
            
            //  minDate: moment(date_old_p).add(1,'days').format('YYYY-MM-DD'),
            // onChange: function(sd, ds, ins){
            //     $("#from_date").flatpickr({
            //         // defaultDate: moment(new Date()).add(1,'days').format('YYYY-MM-DD'),
            //         minDate: moment(date_old_p).add(1,'days').format('YYYY-MM-DD'),
            //     });
            
                         
                          console.log(i_am_curr_dt);
                         if(i_am_curr_dt < date_old_p){
                             console.log('current date is small than to plan last date');
                             
                             $(".flatpickr-input").flatpickr({
                                        minDate: moment(date_old_p).add(1,'days').format('YYYY-MM-DD')
                                    });
                             
                             
                         }else if(i_am_curr_dt > date_old_p){
                             console.log('current date is big than plan last date');
                             
                             $(".flatpickr-input").flatpickr({
                                        minDate: moment(i_am_curr_dt).add(1,'days').format('YYYY-MM-DD')
                                    });
                         }else{
                             
                             console.log('this else statment for minimum date selection while editing');
                             $(".flatpickr-input").flatpickr({
                                        minDate: moment(i_am_curr_dt).add(1,'days').format('YYYY-MM-DD')
                                    });
                         }
            
                                    
                                    
                                    
                                    
                                    
                                    
                                   
                
        //     }
        // });
        
  
        }
    },'json');
    
   
 
}

//   console.log('HI I AM bagrowcounter when just rows created during edit view'+bag_row_counters);
// $(".SD_block").change(function(e){
    
//     console.log(e);
//     console.log('This is single double change class');
// });



function check_sd(id,planid=0,custid=0){
    console.log('This is it'+id);
    
    console.log('YESS I AM WORKING at the start of single-doub checking:::');
    var previd = id;
    
    // 
    var last_row_val=$("#num_of_rows").val();
     console.log('prev id is:'+ previd);
     
     var sd_val =$('#bag_row_block_'+id+'>div>select[name="S_D[]"]').val();
     if(sd_val == 'double'){
         
                                                 //  if double selected get last date of rows that are already saved in db
         
           if(id <= old_bag_rows_counter &&  bag_row_counters == old_bag_rows_counter ){
               
                                                           //its mean no new rows are added other than already exist in db
               
               
                                                // *******************************************************************
    
        Swal.fire({
                         title: 'Are you sure?',
                         html: 'Record will Update permanently',
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#005266',
                         cancelButtonColor: '#B22E06',
                         confirmButtonText: 'Yes, Sure!'
                      }).then((result) => {
                         if (result.value) {
                             
                              if($('#bag_row_block_'+id+' > div >input[name="day[]"]').val() == 'Thu'){
                                  
                                   var mainid=$('#bag_row_block_'+id+'>input[name="bagsHid[]"]').val();
                                   
                                    console.log('yes it is thursday');
                                   
                                    var next_day_temp=id+1;
                              
                              if($('#bag_row_block_'+next_day_temp+' > div >input[name="day[]"]').val() == 'Fri'){
                                        
                                         var row_id=$('#bag_row_block_'+next_day_temp+'>input[name="bagsHid[]"]').val();
                                         
                                         
                                         
                                        //  Delete From DB
                                        
                                             $.ajax({
                                        type: 'post',
                                        dataTye: 'json',
                                        data:{'id':row_id,
                                              'planid':planid,
                                              'tot_rows':old_bag_rows_counter,
                                              'custid':custid,
                                              'mainid':mainid
                                        },
                                      url: "<?php echo base_url('vendor/delete_old_order') ?>",
                                      success: function (data){
                                          
                                                            Swal.fire({title:"Updated!",
                                                            text:"",
                                                            type:"success",
                                                            confirmButtonClass:"btn btn-confirm mt-2"});
                                          
                                          
                        var old_last_date_was =$('#bag_row_block_'+old_bag_rows_counter+'>div>input[name="date[]"]').val();
                    // true with in old rows ids
                    
                    console.log('oldddiee bag row couner was:'+old_bag_rows_counter );
                    
                    
                       
                          $('#bag_row_block_'+next_day_temp).next('hr').remove();
                                   
                                   $('#bag_row_block_'+next_day_temp).remove();
                    
                        console.log('BB is : '+bag_row_counters);
                        // this is id of all next rows from the deleted one
                                         var get_above_row_id =next_day_temp+1;
                                         
                                         
                                          for(var it=next_day_temp; it < bag_row_counters; it++ ){
                                         console.log('ITeration is : '+it);
                                         console.log('get_above_row_id is : '+get_above_row_id);
                                         
                                       
                                          
                                           var old_onchange_param =$('#bag_row_block_'+get_above_row_id+'>div>select[name="S_D[]"]').attr('onchange');
                                           var old_freeze_param =$('#bag_row_block_'+get_above_row_id+'>div>select[name="freeze[]"]').attr('onchange');
                                            var old_span_param =$('#bag_row_block_'+get_above_row_id+'> div> span').attr('onclick');

                                   console.log('*********************old_onchange_param: '+old_onchange_param);
                                   console.log('*********************old_freeze_param: '+old_freeze_param);
                                   console.log('*********************old_span_param: '+old_span_param);
                                   
                                     var result_arr = old_onchange_param.split(",");
                                     var planID=parseInt(result_arr[1]);
                                     var customerID=parseInt(result_arr[2].replace(")", "").trim());
                                     
                                     
                                     console.log('plan id is :'+planID);
                                     console.log('cust id is :'+customerID);
                                     
                                     
                                         $('#bag_row_block_'+get_above_row_id).attr('id', 'bag_row_block_'+it);      
                                        //  $('#bag_row_block_'+it+'>div>select[name="S_D[]"]').attr('onchange','check_sd('+it+','+planID+','+customerID+')');
                                         $('#bag_row_block_'+it+'>div>select[name="freeze[]"]').attr('onchange','freeze_check('+it+')');
                                         $('#bag_row_block_'+it+'> div> span').attr('onclick','copy_to_next('+it+')');

                                         get_above_row_id +=1;
                                     }
                                   
                                   console.log('AND next day is friday');
                      
                    
                                    
                                    var get_previous_row_id=old_bag_rows_counter - 1;
                    //   var dtt=$('#bag_row_block_'+old_bag_rows_counter+'>div>input[name="date[]"]').val();
                     var dtt=$('#bag_row_block_'+get_previous_row_id+'>div>input[name="date[]"]').val();
                      console.log('step 0:'+dtt);
                          
                        //   $('hr:last').remove();
                        //   $('#bag_row_block_'+old_bag_rows_counter).remove();    
                          
                          
                                console.log('old last row value'+last_row_val);
                                      last_row_val -=1;
                                 console.log('new last row value'+last_row_val);       
                                 console.log('old bag row count'+bag_row_counters);
                                      bag_row_counters -=1;
                                    console.log('new bag row count'+bag_row_counters);
                                    
                                  $("#num_of_rows").val(last_row_val);
                                  $("#no_of_days").val(last_row_val);
                                  
                                 
                                
                               
                                 $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
                                          
                      
                          
                          
                          
                             console.log('oldddiee date was:'+old_last_date_was );
                            //  $(".flatpickr-input").flatpickr({
                            //             minDate: old_last_date_was
                            //         });
                                    
                                     old_bag_rows_counter -=1;
                                              
                                      
                                      
                                                  var dt = new Date(dtt);
                                 console.log('step 1:'+dt);
                                //  dt.setDate( dt.getDate() - 1 ,'yyyy-mm-dd');
                                //  var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate()-1);
                                //  As id was already previous date
                                 var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                                 console.log('step 3:'+newDate);
                                 var formattedDate = new Date(newDate);
                          var d = formattedDate.getDate();
                          var m =  formattedDate.getMonth();
                          m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();
                        
                                if (d < 10) {
                                              d = '0' + d;
                                            }
                                            if (m < 10) {
                                              m = '0' + m;
                                            }
                          
                           
                           
                        
                                 console.log($("#to_date").val());
                                 console.log(y+m+d);
                                 
                                  $("#to_date").val(y+'-'+m+'-'+d);
                          $("#Expiry_date").val(y+'-'+m+'-'+d);
                           
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                      }
                                    
                                    
                                    
                      
                               
                              });
                                        
                                        // End Del
                                         
                                         
                                     
                                        
                                  
                                  
                              }else{
                                        
                                        var row_id=$('#bag_row_block_'+old_bag_rows_counter+'>input[name="bagsHid[]"]').val();
                                        
                                        
                                         $.ajax({
                                        type: 'post',
                                        dataTye: 'json',
                                        data:{'id':row_id,
                                              'planid':planid,
                                              'tot_rows':old_bag_rows_counter,
                                              'custid':custid,
                                              'mainid':mainid
                                        },
                                      url: "<?php echo base_url('vendor/delete_old_order') ?>",
                                      success: function (data){
                                          
                                                            Swal.fire({title:"Updated!",
                                                            text:"",
                                                            type:"success",
                                                            confirmButtonClass:"btn btn-confirm mt-2"});
                                          
                                          
                        var old_last_date_was =$('#bag_row_block_'+old_bag_rows_counter+'>div>input[name="date[]"]').val();
                    // true with in old rows ids
                    
                    console.log('oldddiee bag row couner was:'+old_bag_rows_counter );
                      
                    
                                    
                                    var get_previous_row_id=old_bag_rows_counter - 1;
                    //   var dtt=$('#bag_row_block_'+old_bag_rows_counter+'>div>input[name="date[]"]').val();
                     var dtt=$('#bag_row_block_'+get_previous_row_id+'>div>input[name="date[]"]').val();
                      console.log('step 0:'+dtt);
                          
                          $('hr:last').remove();
                          $('#bag_row_block_'+old_bag_rows_counter).remove();    
                          
                                      last_row_val -=1;
                                      bag_row_counters -=1;
                                  
                                  $("#num_of_rows").val(last_row_val);
                                  $("#no_of_days").val(last_row_val);
                                  
                                 
                                
                               
                                 $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
                                          
                      
                          
                          
                          
                             console.log('oldddiee date was:'+old_last_date_was );
                             $(".flatpickr-input").flatpickr({
                                        minDate: old_last_date_was
                                    });
                                    
                                     old_bag_rows_counter -=1;
                                              
                                      
                                      
                                                  var dt = new Date(dtt);
                                 console.log('step 1:'+dt);
                                //  dt.setDate( dt.getDate() - 1 ,'yyyy-mm-dd');
                                //  var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate()-1);
                                //  As id was already previous date
                                 var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                                 console.log('step 3:'+newDate);
                                 var formattedDate = new Date(newDate);
                          var d = formattedDate.getDate();
                          var m =  formattedDate.getMonth();
                          m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();
                        
                                if (d < 10) {
                                              d = '0' + d;
                                            }
                                            if (m < 10) {
                                              m = '0' + m;
                                            }
                          
                           
                           
                        
                                 console.log($("#to_date").val());
                                 console.log(y+m+d);
                                 
                                  $("#to_date").val(y+'-'+m+'-'+d);
                          $("#Expiry_date").val(y+'-'+m+'-'+d);
                           
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                      }
                                    
                                    
                                    
                      
                               
                              });
                                    }
                              }else{
                                  
                                  var row_id=$('#bag_row_block_'+old_bag_rows_counter+'>input[name="bagsHid[]"]').val();
                                  var mainid=$('#bag_row_block_'+id+'>input[name="bagsHid[]"]').val();
                                  
                                  
                                   $.ajax({
                                        type: 'post',
                                        dataTye: 'json',
                                        data:{'id':row_id,
                                              'planid':planid,
                                              'tot_rows':old_bag_rows_counter,
                                              'custid':custid,
                                              'mainid':mainid
                                        },
                                      url: "<?php echo base_url('vendor/delete_old_order') ?>",
                                      success: function (data){
                                          
                                                            Swal.fire({title:"Updated!",
                                                            text:"",
                                                            type:"success",
                                                            confirmButtonClass:"btn btn-confirm mt-2"});
                                          
                                          
                        var old_last_date_was =$('#bag_row_block_'+old_bag_rows_counter+'>div>input[name="date[]"]').val();
                    // true with in old rows ids
                    
                    console.log('oldddiee bag row couner was:'+old_bag_rows_counter );
                      
                    
                                    
                                    var get_previous_row_id=old_bag_rows_counter - 1;
                    //   var dtt=$('#bag_row_block_'+old_bag_rows_counter+'>div>input[name="date[]"]').val();
                     var dtt=$('#bag_row_block_'+get_previous_row_id+'>div>input[name="date[]"]').val();
                      console.log('step 0:'+dtt);
                          
                          $('hr:last').remove();
                          $('#bag_row_block_'+old_bag_rows_counter).remove();    
                          
                                      console.log('old last row value'+last_row_val);
                                      last_row_val -=1;
                                 console.log('new last row value'+last_row_val);       
                                 console.log('old bag row count'+bag_row_counters);
                                      bag_row_counters -=1;
                                    console.log('new bag row count'+bag_row_counters);
                                  
                                  $("#num_of_rows").val(last_row_val);
                                  $("#no_of_days").val(last_row_val);
                                  
                                 
                                
                               
                                 $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
                                          
                      
                          
                          
                          
                             console.log('oldddiee date was:'+old_last_date_was );
                             $(".flatpickr-input").flatpickr({
                                        minDate: old_last_date_was
                                    });
                                    
                                     old_bag_rows_counter -=1;
                                              
                                      
                                      
                                                  var dt = new Date(dtt);
                                 console.log('step 1:'+dt);
                                //  dt.setDate( dt.getDate() - 1 ,'yyyy-mm-dd');
                                //  var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate()-1);
                                //  As id was already previous date
                                 var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                                 console.log('step 3:'+newDate);
                                 var formattedDate = new Date(newDate);
                          var d = formattedDate.getDate();
                          var m =  formattedDate.getMonth();
                          m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();
                        
                                if (d < 10) {
                                              d = '0' + d;
                                            }
                                            if (m < 10) {
                                              m = '0' + m;
                                            }
                          
                           
                           
                        
                                 console.log($("#to_date").val());
                                 console.log(y+m+d);
                                 
                                  $("#to_date").val(y+'-'+m+'-'+d);
                          $("#Expiry_date").val(y+'-'+m+'-'+d);
                           
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                      }
                                    
                                    
                                    
                      
                               
                              });
                                  
                              }
                           
                             
                             
   
                          }else{
                                   
                                    $('#bag_row_block_'+id+'>div>select[name="S_D[]"]').val('single');        
                                          
                                  } // confirm buton end
                          
                          
                          
                      }) //main swal then part end
    
    
    
    // *********************************************************************
               
          
                  }else{
                      
                        $("#tot_orders").val(bag_row_counters);
                          console.log('last row date was step 0:'+dtt);
                          var nxt=id+1;
                          if($('#bag_row_block_'+id+' > div >input[name="day[]"]').val() == 'Thu' && $('#bag_row_block_'+id+'>input[name="bagsHid[]"]').val() !='' && $('#bag_row_block_'+nxt+' > div >input[name="day[]"]').val() == 'Fri'  && $('#bag_row_block_'+nxt+'>input[name="bagsHid[]"]').val() !=''  ){
                              
                              console.log('yes This is thursday and nextt day is friday and baghids are not empty should del from data base and update others');
                              console.log('old_bag_rows_counter'+old_bag_rows_counter);
                              
                            //   Delete Update
                               
                                  Swal.fire({
                         title: 'Are you sure?',
                         html: 'Record will Update permanently',
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#005266',
                         cancelButtonColor: '#B22E06',
                         confirmButtonText: 'Yes, Sure!'
                      }).then((result) => {
                         if (result.value) {
                                

                           var mainid=$('#bag_row_block_'+id+'>input[name="bagsHid[]"]').val();
                            
                           var row_id=$('#bag_row_block_'+nxt+'>input[name="bagsHid[]"]').val(); 

                             


                                        //  Delete From DB
                                        
                                             $.ajax({
                                        type: 'post',
                                        dataTye: 'json',
                                        data:{'id':row_id,
                                              'planid':planid,
                                              'tot_rows':old_bag_rows_counter,
                                              'custid':custid,
                                              'mainid':mainid
                                        },
                                      url: "<?php echo base_url('vendor/delete_old_order') ?>",
                                      success: function (data){
                                          
                                                            Swal.fire({title:"Updated!",
                                                            text:"",
                                                            type:"success",
                                                            confirmButtonClass:"btn btn-confirm mt-2"});
                                          
                                          
                     
                    
                    console.log('oldddiee bag row couner was:'+old_bag_rows_counter );
                    
                    
                       
                          $('#bag_row_block_'+nxt).next('hr').remove();
                                   
                                   $('#bag_row_block_'+nxt).remove();
                    
                        console.log('BB is : '+bag_row_counters);
                         console.log('old_bag_rows_counter : '+old_bag_rows_counter);
                        // this is id of all next rows from the deleted one
                                         var get_above_row_id =nxt+1;
                                         
                                         
                                          for(var it=nxt; it < bag_row_counters; it++ ){
                                         console.log('ITeration is : '+it);
                                         console.log('get_above_row_id is : '+get_above_row_id);
                                         
                                          
                                       if(it < old_bag_rows_counter){

                                           var old_onchange_param =$('#bag_row_block_'+get_above_row_id+'>div>select[name="S_D[]"]').attr('onchange');
                                           var old_freeze_param =$('#bag_row_block_'+get_above_row_id+'>div>select[name="freeze[]"]').attr('onchange');
                                           var old_span_param =$('#bag_row_block_'+get_above_row_id+'> div> span').attr('onclick');

                                   console.log('*********************old_onchange_param: '+old_onchange_param);
                                   console.log('*********************old_freeze_param: '+old_freeze_param);
                                   console.log('*********************old_span_param: '+old_span_param);
                                     
                                  
                                     var result_arr = old_onchange_param.split(",");
                                     var planID=parseInt(result_arr[1]);
                                     var customerID=parseInt(result_arr[2].replace(")", "").trim());
                                     
                                     
                                     console.log('plan id is :'+planID);
                                     console.log('cust id is :'+customerID);
                                     
                                     
                                         $('#bag_row_block_'+get_above_row_id).attr('id', 'bag_row_block_'+it);      
                                        //  $('#bag_row_block_'+it+'>div>select[name="S_D[]"]').attr('onchange','check_sd('+it+','+planID+','+customerID+')');
                                         $('#bag_row_block_'+it+'>div>select[name="freeze[]"]').attr('onchange','freeze_check('+it+')');
                                         $('#bag_row_block_'+it+'> div> span').attr('onclick','copy_to_next('+it+')');

                                        
                                        
                                         get_above_row_id +=1;
                                      
                                         }else{

                                             console.log('Hello Ayesha comon track get_above_row_id : '+get_above_row_id);
                                              $('#bag_row_block_'+get_above_row_id).attr('id', 'bag_row_block_'+it); 
	                                         $('#bag_row_block_'+it+'>div>select[name="S_D[]"]').attr('onchange','check_sd('+it+')');
	                                          $('#bag_row_block_'+it+'> div> span').attr('onclick','copy_to_next('+it+')');
	                                         get_above_row_id +=1;

		                                    }
                                          
                                      
                                    
                                  
                                     }
                                   
                                   console.log('AND next day is friday');


                                    last_row_val -=1;
                                    bag_row_counters -=1;
                                    old_bag_rows_counter -=1;


                                    console.log('last_row_val After:'+last_row_val); 
                                     console.log('get date of bag row counter which date gona extract:'+bag_row_counters);
                                   var dtt=$('#bag_row_block_'+bag_row_counters+'>div>input[name="date[]"]').val();
                                    
                                    $("#num_of_rows").val(last_row_val);
                                    $("#no_of_days").val(last_row_val);


                                      var dt = new Date(dtt);
                                  console.log('step 1:'+dt);
                                //  dt.setDate( dt.getDate() - 1 ,'yyyy-mm-dd');
                                 var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                                 console.log('step 2:'+newDate);
                                 var formattedDate = new Date(newDate);
                          var d = formattedDate.getDate();
                           var m =  formattedDate.getMonth();
                           m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();
                        
                                if (d < 10){
                                              d = '0' + d;
                                            }
                                            if (m < 10){
                                              m = '0' + m;
                                            }
                          
                           
                           $("#to_date").val(y+'-'+m+'-'+d);
                           $("#Expiry_date").val(y+'-'+m+'-'+d);
                        
                                 console.log(y+m+d);
                                 console.log($("#to_date").val());
                               
                               
                                //  $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
                                $('#bag_row_block_'+bag_row_counters+'>div>select[name="S_D[]"]').attr("disabled", true);
                                          
                      console.log('IIIIIMMMMMMMMMMMMMPPPPPPPPPPPPPPP counter:'+bag_row_counters);
                               

                                    }
                               
                              });
                                        
                                        // End Del
                                         



                                } else{
                                      $('#bag_row_block_'+id+'>div>select[name="S_D[]"]').val('single');
                                } // confirm buton end
                        }) //main swal then part end
                            
                            // End Delete Update
                              
                          }else if($('#bag_row_block_'+id+' > div >input[name="day[]"]').val() == 'Thu'){
                              console.log('yes it is thursday from new created orders');
                              var next_day_temp=id+1;
                              
                              if($('#bag_row_block_'+next_day_temp+' > div >input[name="day[]"]').val() == 'Fri'){
                                  
                                     $('#bag_row_block_'+next_day_temp).next('hr').remove();
                                   
                                   $('#bag_row_block_'+next_day_temp).remove();
                                   
                                     console.log('BB is : '+bag_row_counters);
                                     var get_above_row_id =next_day_temp+1;
                                     
                                     
                                     for(var it=next_day_temp; it < bag_row_counters; it++ ){
                                         console.log('ITeration is : '+it);
                                         console.log('get_above_row_id is : '+get_above_row_id);
                                         
                                          $('#bag_row_block_'+get_above_row_id).attr('id', 'bag_row_block_'+it); 
                                         $('#bag_row_block_'+it+'>div>select[name="S_D[]"]').attr('onchange','check_sd('+it+')');
                                         $('#bag_row_block_'+it+'> div> span').attr('onclick','copy_to_next('+it+')');
                                         get_above_row_id +=1;
                                     }
                                   
                                   console.log('AND next day is friday');
                                   
                                   
                                      last_row_val -=1;
                                      bag_row_counters -=1;
                                  console.log('last_row_val After:'+last_row_val); 
                                 
                                   var dtt=$('#bag_row_block_'+bag_row_counters+'>div>input[name="date[]"]').val();
                                        //   var tot_orders_are=last_row_val -1;
                                    $("#num_of_rows").val(last_row_val);
                                  $("#no_of_days").val(last_row_val);
                                  
                                     var dt = new Date(dtt);
                                  console.log('step 1:'+dt);
                                //  dt.setDate( dt.getDate() - 1 ,'yyyy-mm-dd');
                                 var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                                 console.log('step 2:'+newDate);
                                 var formattedDate = new Date(newDate);
                          var d = formattedDate.getDate();
                           var m =  formattedDate.getMonth();
                           m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();
                        
                                if (d < 10){
                                              d = '0' + d;
                                            }
                                            if (m < 10){
                                              m = '0' + m;
                                            }
                          
                           
                           $("#to_date").val(y+'-'+m+'-'+d);
                           $("#Expiry_date").val(y+'-'+m+'-'+d);
                        
                                 console.log(y+m+d);
                                 console.log($("#to_date").val());
                               
                               
                                //  $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
                                $('#bag_row_block_'+bag_row_counters+'>div>select[name="S_D[]"]').attr("disabled", true);
                                          
                      console.log('IIIIIMMMMMMMMMMMMMPPPPPPPPPPPPPPP counter:'+bag_row_counters);
                                  
                                  
                                  
                              }else{
                                  
                                     $('hr:last').remove();
                                   console.log('AND next day is NOT friday');
                                    $('#bag_row_block_'+last_row_val).remove();
                                    
                                    
                                     last_row_val -=1;
                                      bag_row_counters -=1;
                                  console.log('last_row_val After:'+last_row_val); 
                                 
                                   var dtt=$('#bag_row_block_'+bag_row_counters+'>div>input[name="date[]"]').val();
                                   
                                    $("#num_of_rows").val(last_row_val);
                                  $("#no_of_days").val(last_row_val);
                                  
                                  
                                     var dt = new Date(dtt);
                                  console.log('step 1:'+dt);
                                //  dt.setDate( dt.getDate() - 1 ,'yyyy-mm-dd');
                                 var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                                 console.log('step 2:'+newDate);
                                 var formattedDate = new Date(newDate);
                          var d = formattedDate.getDate();
                           var m =  formattedDate.getMonth();
                           m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();
                        
                                if (d < 10){
                                              d = '0' + d;
                                            }
                                            if (m < 10){
                                              m = '0' + m;
                                            }
                          
                           
                           $("#to_date").val(y+'-'+m+'-'+d);
                           $("#Expiry_date").val(y+'-'+m+'-'+d);
                        
                                 console.log(y+m+d);
                                 console.log($("#to_date").val());
                               
                               
                                //  $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
                                $('#bag_row_block_'+bag_row_counters+'>div>select[name="S_D[]"]').attr("disabled", true);
                                          
                      console.log('IIIIIMMMMMMMMMMMMMPPPPPPPPPPPPPPP counter:'+bag_row_counters);
                              }
                          }else{
                               $('hr:last').remove();
                              console.log('No its not thursday');
                               $('#bag_row_block_'+last_row_val).remove();
                               
                               
                                last_row_val -=1;
                                      bag_row_counters -=1;
                                  console.log('last_row_val After:'+last_row_val); 
                                 
                                   var dtt=$('#bag_row_block_'+bag_row_counters+'>div>input[name="date[]"]').val();
                                   
                                    $("#num_of_rows").val(last_row_val);
                                  $("#no_of_days").val(last_row_val);
                                  
                                  
                                     var dt = new Date(dtt);
                                  console.log('step 1:'+dt);
                                //  dt.setDate( dt.getDate() - 1 ,'yyyy-mm-dd');
                                 var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                                 console.log('step 2:'+newDate);
                                 var formattedDate = new Date(newDate);
                          var d = formattedDate.getDate();
                           var m =  formattedDate.getMonth();
                           m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();
                        
                                if (d < 10){
                                              d = '0' + d;
                                            }
                                            if (m < 10){
                                              m = '0' + m;
                                            }
                          
                           
                           $("#to_date").val(y+'-'+m+'-'+d);
                           $("#Expiry_date").val(y+'-'+m+'-'+d);
                        
                                 console.log(y+m+d);
                                 console.log($("#to_date").val());
                               
                               
                                //  $('#bag_row_block_'+last_row_val+'>div>select[name="S_D[]"]').attr("disabled", true);
                                $('#bag_row_block_'+bag_row_counters+'>div>select[name="S_D[]"]').attr("disabled", true);
                                          
                      console.log('IIIIIMMMMMMMMMMMMMPPPPPPPPPPPPPPP counter:'+bag_row_counters);
                          
                               
                          }
                         
                                            // console.log('last_row_val before:'+last_row_val); 
                                            // console.log('num of rows mean orders before:');
                                            // console.log($("#num_of_rows").val());
                                            
                                            // console.log('num of days before:');
                                            // console.log($("#no_of_days").val());
                                            // console.log('bag row counter is in sd:'+bag_row_counters);
                                            
                                            
                                     
                                 
                                  
                                //   console.log('num of rows mean orders after:');
                                //             console.log($("#num_of_rows").val());
                                //              console.log('num of days after:');
                                //             console.log($("#no_of_days").val());
                                  
                                 
                               
                      
                  } //when new rows dealing
         
        
         
         
          
             
              
          
     
       
         
        
          
                 
          
         }
   
}

function myFunction_addr(i){
    console.log('tayyab'+i);
    console.log($('#bag_row_block_'+i+'>div>select[name="addr_list[]"]').val());
    var refi=$('#bag_row_block_'+i+'>div>select[name="addr_list[]"]').val();
    
    console.log(addr_obj[refi].address);
    
     $('#bag_row_block_'+i+'>div>select[name="area[]"]').val(addr_obj[refi].area_id);
     $('#bag_row_block_'+i+'>div>select[name="time[]"]').val(addr_obj[refi].emirate_id+','+addr_obj[refi].slot_id);
     $('#bag_row_block_'+i+'>div>textarea[name="google_address[]"]').val(addr_obj[refi].google_link_addrs);
    
}


function freeze_check(id){
    
    console.log('YESS I AM WORKING inside freeze check');
   
    
     console.log('Before Freeze  id is:'+ id);
     
     var freeze =$('#bag_row_block_'+id+'>div>select[name="freeze[]"]').val();
     
     console.log('Before using freez value was:'+ freeze);
     if(freeze == 'Freezed'){
       
        // $('#bag_row_block_'+id+').attr("disabled", true);
        // $('#bag_row_block_'+id+'>div>input[name="freeze[]"]').val('Active');
       
         
         console.log($('#bag_row_block_'+id+'>div>select[name="freeze[]"]').val());
        //  add_row_freeze(id);
        
        
        
        Swal.fire({
                         title: 'Are you sure?',
                         html: 'This will hold the delivery',
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#005266',
                         cancelButtonColor: '#B22E06',
                         confirmButtonText: 'Yes, Update it!'
                      }).then((result) => {
                         if (result.value) {
                             
                              $("#bag_row_block_"+id).css('background-color', '#978282');
                                 $("#bag_row_block_"+id).attr("pk","F");
                           
                          } // confirm buton end
                          
                          
                          
                      }) //main swal then part end
         
     }else if(freeze == 'Active'){
         console.log('Before  val is:'+ freeze);
      
        var pk_check=$("#bag_row_block_"+id).attr("pk");
        console.log('pk chcek'+pk_check);
           
           if(pk_check == 'S'){
               console.log('Skipped was the old status');
                 $('#bag_row_block_'+id).css('background-color', '#36404a');
           }else{
               
               console.log('freezed was the old status');
                      console.log('id is :'+id+' old row counter is:'+old_bag_rows_counter);
         if(id <= old_bag_rows_counter &&  bag_row_counters == old_bag_rows_counter ){
               
              console.log('its mean no new rows are added other than already exist in db');
               
               
    // *******************************************************************
    
        Swal.fire({
                         title: 'Are you sure?',
                         html: 'This will have impact on delivery',
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#005266',
                         cancelButtonColor: '#B22E06',
                         confirmButtonText: 'Yes, Update it!'
                      }).then((result) => {
                         if (result.value) {
                             
                             $('#bag_row_block_'+id).css('background-color', 'rgb(72 85 97)');
                           
                            //  var row_id=$('#bag_row_block_'+old_bag_rows_counter+'>input[name="bagsHid[]"]').val();
                            //  var mainid=$('#bag_row_block_'+id+'>input[name="bagsHid[]"]').val();
                             
                             
                            
                            //   var no_d =  parseInt(old_bag_rows_counter);
                            //      no_d = no_d -1;
                                 
                            //     var e_x_d =$('#bag_row_block_'+no_d+'>div>input[name="date[]"]').val();
                                
                            //      console.log(e_x_d);
                                 
                            //                   $.ajax({
                            //             type: 'post',
                            //             dataTye: 'json',
                            //             data:{'del_id':row_id,
                            //                   'planid':planid,
                            //                   'no_of_days':no_d,
                            //                   'exp_dt':e_x_d,
                            //                   'change_id':mainid
                            //             },
                            //           url: "<?php echo base_url('vendor/delete_frozen_order') ?>",
                            //           success: function (data){
                                          
                            // Swal.fire({title:"Updated!",
                            // text:"",
                            // type:"success",
                            // confirmButtonClass:"btn btn-confirm mt-2"});
                                          
                                          
                            //               $('#bag_row_block_'+id).css('background-color', '#36404a');
                            //           console.log($('#bag_row_block_'+id+'>div>select[name="freeze[]"]').val());
                                      
                            //               $('hr:last').remove();
                            //               $('#bag_row_block_'+bag_row_counters).remove();
                            //           bag_row_counters -=1;
                            //   $('#bag_row_block_'+bag_row_counters+'>div>select[name="S_D[]"]').attr("disabled", true);
                                      
                            //           var pr_id=$('#bag_row_block_'+bag_row_counters+'>div>input[name="date[]"]').val();
                                       
                            //           $("#no_of_days").val(bag_row_counters);
                            //         //   var pr_id = new Date(pr_id);
                            //                                 //   console.log('date:'+pr_id);
                                                            
                                                            
                            //                           $("#to_date").val(pr_id);
                            //                             $("#Expiry_date").val(pr_id);
                                     
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                            //           }
                                    
                                    
                                    
                      
                               
                            //   });
                               
                               
                                 
                           
                          
                           
                                                                 } // confirm buton end
                          
                          
                          
                      }) //main swal then part end
    
    
    
    // *********************************************************************
               
          
                  }else{
                      
                    //   console.log('its mean new rows are added other than already exist in db');
                    //                  $('#bag_row_block_'+id).css('background-color', '#36404a');
                    //                   console.log($('#bag_row_block_'+id+'>div>select[name="freeze[]"]').val());
                                      
                    //                       $('hr:last').remove();
                    //                       $('#bag_row_block_'+bag_row_counters).remove();
                    //                   bag_row_counters -=1;
                    //                     $('#bag_row_block_'+bag_row_counters+'>div>select[name="S_D[]"]').attr("disabled", true);
                    //                   var pr_id=$('#bag_row_block_'+bag_row_counters+'>div>input[name="date[]"]').val();
                                       
                    //                   $("#no_of_days").val(bag_row_counters);
                    //                 //   var pr_id = new Date(pr_id);
                    //                                         //   console.log('date:'+pr_id);
                                                            
                                                            
                    //                                   $("#to_date").val(pr_id);
                    //                                     $("#Expiry_date").val(pr_id);
                                     
                                              
                                                  
                                              }
       
           }
       
        //   console.log('freeze id is:'+ id);
     }else if(freeze == 'Skipped'){
         
         console.log("befor pk was:");
         console.log($("#bag_row_block_"+id).attr("pk"));
          $("#bag_row_block_"+id).css('background-color', '#404143');
         
         console.log($('#bag_row_block_'+id+'>div>select[name="freeze[]"]').val());
        $("#bag_row_block_"+id).attr("pk","S");
        console.log($("#bag_row_block_"+id).attr("pk"));
     }
    //  console.log(freeze);
}


function add_row_freeze(id){
    
     var f_addr= $('#bag_row_block_'+id+'>div>input[name="addr[]"]').val();
    
    //  var f_day= $('#bag_row_block_'+id+'>div>input[name="day[]"]').val();
     var f_area= $('#bag_row_block_'+id+'>div>select[name="area[]"]').val();
     var f_time= $('#bag_row_block_'+id+'>div>select[name="time[]"]').val();
     var f_sd= $('#bag_row_block_'+id+'>div>select[name="S_D[]"]').val();  
     var f_status= $('#bag_row_block_'+id+'>div>select[name="freeze[]"]').val(); 
     
      var f_date= $('#bag_row_block_'+bag_row_counters+'>div>input[name="date[]"]').val();
      var dt = new Date(f_date);
                                  console.log('step 1:'+dt);
                                
                                 var newDate = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate()+1);
                                 console.log('step 2:'+newDate);
                                 var formattedDate = new Date(newDate);
                          var d = formattedDate.getDate();
                           var m =  formattedDate.getMonth();
                           m += 1;  // JavaScript months are 0-11
                        var y = formattedDate.getFullYear();
                        
                                if (d < 10) {
                                              d = '0' + d;
                                            }
                                            if (m < 10) {
                                              m = '0' + m;
                                            }
                                            
                                    
                          
                           
                           $("#to_date").val(y+'-'+m+'-'+d);
                            $("#Expiry_date").val(y+'-'+m+'-'+d);
                           
                           
                           var weekday = new Array(7);
                                    weekday[0] = "Sun";
                                    weekday[1] = "Mon";
                                    weekday[2] = "Tue";
                                    weekday[3] = "Wed";
                                    weekday[4] = "Thu";
                                    weekday[5] = "Fri";
                                    weekday[6] = "Sat";
                            
                            console.log(newDate.getDay());
                            
                          var f_day = weekday[newDate.getDay()];
                           
                           bag_row_counters +=1;
                            var bag_row = '<div class="row" id="bag_row_block_'+bag_row_counters+'"><div class="col-sm-2"> <label for="date">Date</label><input type="text" class="form-control" name="date[]" id="date" value="" readonly></div><div class="col-sm-1"> <label for="day">Day</label><input type="text" class="form-control" name="day[]" id="day" value="'+f_day+'" readonly></div><div class="col-sm-2"> <label for="emirate">Select Emirate & Area*</label><select  name="area[]" id="area" class="form-control abc" required><?php if (count($area) > 0) { ?> <?php foreach ($area as $data) { ?> <option class="" value="<?php echo $data->area_name; ?>"> <?php echo $data->area_name; ?> </option><?php }} ?></select> </div><div class="col-sm-3"> <label for="addr">Address*</label> &nbsp  <span onclick="copy_to_next('+bag_row_counters+')" class="btn btn-xs">copy +1</span> <input type="text" class="form-control" name="addr[]" id="addr" value="'+f_addr+'" required> </div><div class="col-sm-2"> <label for="time">Select Time Slot*</label> <select  name="time[]" id="time" class="form-control abc" required><?php if (count($time) > 0) { ?> <?php foreach ($time as $data) { ?> <option class="" value="<?php  echo $data; ?>"> <?php echo $data; ?> </option><?php }} ?></select> </div>  <div class="col-sm-1"> <label for="S_D">Sing/Doub*</label> <select   name="S_D[]" id="S_D" class="form-control abc SD_block"  onchange="check_sd('+bag_row_counters+')" required><option class="" value="single">Single</option><option class="" value="double">Double</option></select> </div><div class="col-sm-1"><label for="freeze">Status</label> <select   name="freeze[]" id="freeze" class="form-control"  onchange="freeze_check('+bag_row_counters+')"  pk="" required><option class="" value="Active">Active</option><option class="" value="Freezed">Freeze</option></select></div><input type="hidden" name="bagsHid[]" value="" class="form-control" /> <input type="hidden" name="delivered_check[]" value="" id="delivered_check"/> </div><hr>';
                
                            $(".bag_pricing-box").append(bag_row);
                        
                        $('#bag_row_block_'+bag_row_counters+'>div>input[name="date[]"]').val(y+'-'+m+'-'+d);
                        $('#bag_row_block_'+bag_row_counters+'>div>select[name="area[]"]').val(f_area);
                        $('#bag_row_block_'+bag_row_counters+'>div>select[name="time[]"]').val(f_time);
                        $('#bag_row_block_'+bag_row_counters+'>div>select[name="S_D[]"]').val(f_sd);
                        var dum_valo= -1;
                        $('#bag_row_block_'+bag_row_counters+'>input[name="bagsHid[]"]').val(dum_valo);
                        
                        // if(f_status == 'Freezed'){
                             $('#bag_row_block_'+bag_row_counters+'>div>select[name="freeze[]"]').val('Active');
                        // }else{
                            
                            // $('#bag_row_block_'+bag_row_counters+'>div>select[name="freeze[]"]').val('Active');
                        // }
                        
                        
                        var unclock_old_sd_select = bag_row_counters-1;
                        console.log('i am bag_row_counters that assigne to no of days soon:'+bag_row_counters);
                       $('#bag_row_block_'+bag_row_counters+'>div>select[name="freeze[]"]').attr("disabled", true);
                        $('#bag_row_block_'+bag_row_counters+'>div>select[name="S_D[]"]').attr("disabled", true);
                        $('#bag_row_block_'+unclock_old_sd_select+'>div>select[name="S_D[]"]').attr("disabled", false);
                       $("#no_of_days").val(bag_row_counters);
     
    
}

 $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            // alert('The file "' + fileName +  '" has been selected.');
            if(fileName == ''){
                $("#img_chk").val(0);
                console.log($("#img_chk").val());
            }else{
                $("#img_chk").val(1);
                   console.log($("#img_chk").val());
            }
        });
        
        
function delete_rows_(rid,id1,id2){
    var rid=rid;
    var aci=id1;
    var id=id2;
    
    Swal.fire({
                         title: 'Are you sure?',
                         html: 'Record will delete permanently',
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#005266',
                         cancelButtonColor: '#B22E06',
                         confirmButtonText: 'Yes, Delete it!'
                      }).then((result) => {
                         if (result.value) {
                            
                           
                            Swal.fire({title:"Deleted!",
                            text:"",
                            type:"success",
                            confirmButtonClass:"btn btn-confirm mt-2"}).then((result)=>{
                                if(result.value){
                                    
                                     $.ajax({
                                        type: 'post',
                                        dataTye: 'json',
                                        data:{id:id,aci:aci},
                                       url: "<?php echo base_url('vendor/deli') ?>",
                                      success: function (data) {
                                              console.log(aci);
                                              if(aci=='b'){
                                                  remove_bag_row(rid)
                                              }else if(aci=='c'){
                                               remove_cash_row(rid)
                                              }else if(aci =='d'){
                                                  remove_delivery_row(rid)
                                              }
                                    }
                               });
                              }
                           }) // then action end
                          } // confirm buton end
                      }) //main swal then part end
    
}


function save_pura_customer(){
    
    $('select').removeAttr('disabled');
     var formData = new FormData($('form')[0]);
     
     formData.append('v',v);
        formData.append('contract',contract);
        
        console.log('jsadhjsndxams');
         $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>"+"vendor/save_new_pura_customer",
            data:formData,
            processData: false,
            contentType: false,

            success: function (data) {
              console.log(data);
              var msg = '<strong>Success!</strong> Vendor updated.';
                    show_msg(msg, 'alert-success');
                    swal.fire("", "Data Update Successfully!", "success");
                    location.reload();
            }
          });
}

function update_vendor(){
    
//FIRST CHECK EMPTY VALIDATIONS

// alert('hi');
    $('select').removeAttr('disabled');
    $('input').removeAttr('disabled');
    $('textarea').removeAttr('disabled');

  

    var valid_check=1;
    // if($("#name").val() =='' || $("#email").val() =='' || $("#phone").val() =='' || $("#address").val() =='' || $("#s_pass").val() =='' || $("#module").val() =='' || $("#delivery_message").val() ==''  || $("#bag_message").val() ==''  || $("#cash_message").val() ==''   ){
    //     valid_check=0;
    //      console.log('Error :'+valid_check);
    // }
    
    //DELIVERY EMPTY FIELD CHECK
  
      var addr_array = new Array();

            
        var addr_array = $("select[name='addr_list[]']").map(function(){return $(this).val();}).get();
        console.log(addr_array);
         console.log(addr_array.length);
        
              for(var i=0;i<addr_array.length;i++){
                if(addr_array[i] === "" || addr_array.length == 0){
                  valid_check=0;
                  console.log('valid check is :'+valid_check);
                //   alert('valid check is'+valid_check);
                    }else{
                        console.log(addr_array[i]);
                    }
            }
            
    
            
    
    
    
    
    if(valid_check == 1){
        
   
       
    
    

    
    //  console.log($('#v_image').val());
    //  if($('#v_image').val() == ''){
    //      var n_f_is=0;
    //  }else{
    //      var n_f_is=1;
    //  }
    // var inp2 =$('#av').attr('href');
         
          
    
    var formData = new FormData($('form')[0]);
    // formData.append('n_f_is',n_f_is);
    
   
   // console.log(inp2);

          $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "<?php echo base_url('monthlyMeal/edit_order_deliv_plan') ?>",
            data:formData,
            processData: false,
            contentType: false,

            success: function (data) {
               console.log(data);
              Swal.fire({position:"center",
                    type:"success",
                    title:"Data has been updated successfully.",
                    showConfirmButton:!1,
                    timer:49000});
                    
                    var test='<?php echo base_url(); ?>monthlyMeal/add_mealPlan';
                console.log(test);
                  window.location.replace(test);
            }
          });

      
    }else{
        swal('missing fields', 'Please Fill the Required(*) Fields', 'error');
        console.log('Error :'+valid_check);
    }
        
        

    }
    
    $("#notif_box").on('change', function () {
       if ($('#notif_box').is(":checked")){
           
           $("#notif").val("Yes");
           var not=$("#notif").val();
           console.log('i am change i am yes notif is:'+ not);
       }else{
           $("#notif").val("No");
           var not=$("#notif").val();
           console.log('i am change i am No notif is:'+ not);
       }
       
       
       
         
        
       
      
    });
  
//shan 
<?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>
</script>



    </body>
</html>