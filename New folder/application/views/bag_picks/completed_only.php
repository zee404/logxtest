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
         <link href="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
       
       <link href="<?php echo base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />           
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
            div.dataTables_wrapper div.dataTables_filter {
                text-align: right;
                margin-top: -37px;
            }
            .btn-group{
                margin-top: -10px;
                margin-bottom: 10px;

            }
            table{
  margin: 0 auto;
  width: 100%;
  clear: both;
  border-collapse: collapse;
  table-layout: fixed; 
  word-wrap:break-word; 
}





/*New added 19 feb 2021*/


.lds-roller {
  display: inline-block;
  position: relative;
  /*width: 80px;*/
  /*height: 80px;*/
  
    top: 10%;
    left: 45%;
    z-index: 999;
  
  /*position: absolute;*/
  /*  left: 0;*/
  /*  right: 0;*/
  /*  top: 0;*/
  /*  bottom: 0;*/
  /*  display: none;*/
  /*  z-index: 9998;*/
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #fff;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


.overlay{
    /*display: none;*/
    /*position: fixed;*/
    /*width: 100%;*/
    /*height: 100%;*/
    /*top: 0;*/
    /*left: 0;*/
    /*z-index: 999;*/
    /*background: rgba(255,255,255,0.8) url("loader.gif") center no-repeat;*/
}

.overlay_ {
   rgba(255, 255, 255, 0.21);
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    /* display: none; */
    z-index: 9998;
   
}
/* Turn off scrollbar when body element has the loading class */

body.loading{
    /*overflow: hidden;   */
}
/* Make spinner image visible when body element has the loading class */
body.loading .overlay{
    /*display: block;*/
    /*background: rgba(255,255,255,0.8);*/
     /*width: 100%;*/
    /*height: 100%;*/
    /*top: 0;*/
    /*left: 0;*/
    /*z-index: 999;*/
}

.btn_set{
    margin:10px;
    color: #fff;
    background-color: #197990 !important;
    border-color: white;
}

.btn_set:hover {
background-color: #36404a !important;
    color: white !important;
    border: 7 green!important;
    border-style: groove !important;
    border: 3px solid #197990 !important;
    border-radius: 5px !important;
}

.btn-primary {
     color: #fff !important; 
    /* background-color: #00aee0; */
    /* border-color: #00afe2; */
    /* color: red; */
    /* background-color: #dee2e6; */
    border-color: white !important;
}

/* end */


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


/*#truncateLongTexts {*/
/*  width: 500px;*/
/*  white-space: nowrap;*/
/*  overflow: hidden;*/
/*  text-overflow: ellipsis;*/
/*}*/

#truncateLongTexts{ overflow-y: hidden; margin-bottom: 10px; width:200px; }
#cucc2 { height: 60px; }

.dataTables_scrollBody {
overflow-y: visible !important;
overflow-x: initial !important;
}


.large-table-container-2 {
  max-width: 200px;
  overflow-x: scroll;
  overflow-y: auto;
  transform:rotateX(180deg);
}

.large-table-container-2 table {
  transform:rotateX(180deg);
}

.new_deliv{
    color: #197990;
   font-weight: bold;
    background-color: #ffa;
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Operations </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Collected Pickup Bags</a></li>
                                  
                                </ol>
                            </div>
                           <h4 class="page-title">Collected Pickup Bags</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box" style="width: 104% !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row" >
                    
                    <?php 
                   $cdate = date('Y-m-d');
                    ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group input-large date-picker input-daterange" data-date="<?php echo $this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d') ?>" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="from" id="from_date" value="<?php echo $this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d') ?>">
                                         <span class="input-group-addon" style="margin-top: 6px;">&nbsp;&nbsp;To&nbsp;&nbsp;</span>
                                        <input type="text" class="form-control" name="to" id="to_date" value="<?php echo $this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d', strtotime($cdate)) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                       
  <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
  <span><h4 style="color: #8c9295;">Optional Dropdown Filters</h4></span>
  <div class="row" style="margin: 4px;
   border: 2px solid #8c9295;
    border-radius: 10px;
    padding: 2px;
    padding-top: 20px;">
                 <div class="col-md-3">
                                    <select id="partner_list" class="search_option_p form-control" name="partner_list" style="margin-bottom: 10px;">
                                        <option value="">Select Partner</option>
                                        <?php if($vendors){foreach ($vendors as $key => $der) {?>
                                            <option value="<?= $der->id; ?>" ><?= $der->full_name; ?> &nbsp;&nbsp;&nbsp;</option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                
                                
                                <div class="col-md-3">
                                    <select id="emirate_list" class="search_option_e form-control" name="emirate_list" style="margin-bottom: 10px;">
                                        <option value="">Select Emirate</option>
                                        <?php if($emirates){foreach ($emirates as $key => $der) {?>
                                            <option value="<?= $der->id; ?>" ><?= $der->emirate_name; ?> &nbsp;&nbsp;&nbsp;</option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                
                                
                                <div class="col-md-3">
                                    <select id="time_list" class="search_option_t form-control" name="time_list" style="margin-bottom: 10px;">
                                        <option value="">Select TimeSlot</option>
                                        <?php if($timeslot){foreach ($timeslot as $key => $der) {?>
                                            <option value="<?= $der->basic_time_id; ?>" ><?= $der->name; ?> &nbsp;&nbsp;&nbsp;</option>
                                        <?php }} ?>
                                    </select>
                                </div>
                   <?php } ?>             
                                
                    <div class="col-lg-2">
                          <div class="btn-group">
                                <button onclick="get_reports(event)" class="btn_set btn blue">Get Report <i class="icon-plus"></i></button>
                        </div>
                     </div>
                </div>   
                            
                          </div> 
                            <div class="card-box" style="width: 104% !important;">  
                               
                            
                          
                            <table id="order_table"   class="example  table  table-responsive  table-bordered ">

                                <thead class="thead-light">

                                <tr>
                                    

                                    <th data-field="id" data-sortable="true" data-formatter="">Ser#</th>
                                    <th data-field="planid" data-sortable="true" data-formatter="dateFormatter">PlanID</th>
                                    <th data-field="planid" data-sortable="true" data-formatter="dateFormatter">DeliveryID</th>
                                     <th data-field="d" data-align="center" data-sortable="true" data-formatter="" style="min-width:100px">Partner</th>
                                    <th data-align="left" data-sortable="true" class="timeSlot" style="min-width:150px">Time Slot</th>
                                     <th data-align="left" data-field="left" data-sortable="true" data-formatter="dateFormatter" style="min-width:100px">Driver</th>
                                    
                                    
                                    <th data-field="status" data-align="left"  data-sortable="true" data-formatter="" style="min-width:250px">Bag Counts</th>
                                     <th data-field="status" data-align="left"  data-sortable="true" data-formatter="">Bag Notes</th>
                                     <th data-field="status" data-align="left"  data-sortable="true" data-formatter="">Additional Bag</th>
                                     <th data-field="status" data-align="left"  data-sortable="true" data-formatter="" style="min-width:150px">Additional Bag Image</th>
                                      <th data-align="center" data-field="left" data-sortable="true" data-formatter="dateFormatter" style="min-width:100px">Customer</th>
                                   
                                     
                                    <th data-field="amount" data-align="left" data-sortable="true" data-sorter="priceSorter" style="min-width:50px">Delivery Address</th>
                                     <th data-field="status" data-align="left"  data-sortable="true" data-formatter="">Bag Pickup Status</th>
                                     
                                    
                                     <th data-field="status" data-align="left"  data-sortable="true" data-formatter="">Delivery Status</th>
                                    
                                    
                                    <th data-field="v" data-align="date" data-sortable="true" data-formatter="" >Assigned At</th>
                                    <th data-field="v" data-align="left" data-sortable="true" data-formatter="">Assigned By</th>
                                    <th data-field="v" data-align="date" data-sortable="true" data-formatter="">Picked At</th>
                                    <th data-field="x" data-align="left" data-sortable="true" data-formatter="">Pickup Location</th>
                                    <th data-field="r" data-align="left" data-sortable="true" data-formatter="">Product Type</th>
                                    
                                   
                                    

                                </tr>
                                </thead>

                                <tbody id="table_body">
                                    <?php if ($orders['result']){
                                    foreach ($orders['records'] as $key => $order) { ?>
                                    
                                                   
                                      <tr class="" id="<?php echo $order->order_id;?>">
                                        <td><?php echo $key+1;?></td>
                                         <td><?php echo $order->plan_id;?></td>
                                         <td><?php echo $order->order_id;?></td>
                                        
                                        
                                         <td style="color: #2ab1c9;font-weight: 600;"><?php echo $order->vendor;?></td>
                                         <td style="color: #2ab1c9;font-weight: 600;"><?php echo $order->delivery_date." ".$order->delivery_time; ?></td>
                                         
                                         <td  style="color: #2ab1c9;font-weight: 600;"><?php echo $order->driver;?></td>
                                         
                                         
                                         
                                         
                                         
                                         
                                          <td>
                                              <div class="table-responsive">
                                               <table class="table  table-bordered ">
                                                      <thead>
                                                        <tr>
                                                          <th>Assigned</th>
                                                          <th>Picked</th>
                                                          <th>Extra</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                           <td><span style="color:#2ab1c9a6; font-weight:900;"><?php echo $order->total_bags;?>  </span> </td>
                                                           <td><span style="color:#008000; font-weight:900;"><?php echo $order->collected_bags;?>  </span> </td>
                                                           <td><span style="color:#ffff00ad; font-weight:900;"><?php  if($order->collected_bags >1){ echo $order->collected_bags-1;}else{echo "0";}?>  </span> </td>
                                                        </tr>
                                                        
                                                        </tbody>
                                                        </table></div>
                                        </td>
                                        
                                         <td> <?php echo $order->notes;  ?></td>
                                        <td> <?php echo $order->c_phone.'<br/>';  echo $order->customer;  ?></td>
                                        
                                        <?php if($order->bag_image !='' AND $order->driver_cancel_request !=1){
                                            echo '<td style="color:#00afe2 !important">Available</td>';
                                        }else{
                                            echo '<td style="color: red !important">Not Available</td>';
                                        }
                                        ?>
                                        
                                        <?php if($order->bag_image !='' AND $order->driver_cancel_request !=1){
                                            echo '<td><a class="Green" alt="Additional Bag Image" title="Click to View" target="_blank" href="'.base_url().'upload_addi_bagpick/'.$order->bag_image.'"><img src="'.base_url().'upload_addi_bagpick/'.$order->bag_image.'" width="100%" class="img-responsive img-thumbnail"></a></td>';
                                        }else{
                                            echo '<td>N/A</td>';
                                        }
                                        ?>
                                        
                                        
                                          <td id="cucc2"><div id="truncateLongTexts"><?php echo $order->delivery_address;?></div></td>
                                          
                                          <td><?php echo $order->pickup_status;?></td>
                                          
                                         
                                          
                                          <?php if($order->status =='Not Assign'){ 
                                          $status='Not Assigned';
                                           echo '<td >'.$status.'</td>';
                                          }else if($order->status=='Assign'){
                                          $status='Assigned';
                                          echo '<td>'.$status.'</td>';
                                          }else{
                                          $status=$order->status;
                                          echo '<td>'.$order->status.'</td>';
                                          } ?>
                                          
                                          
                                      <td ><?php echo $order->assigned_at;?></td>
                                      <td ><?php echo $order->assigned_by;?></td>
                                      <td ><?php echo $order->pickup_at;?></td>
                                           <td><?php echo $order->pickUp;?></td>
                                           <td><?php echo $order->food_type ?></td>
                                       </tr>
                              <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                            
                              <!--</div>-->
                        </div> <!-- end card-box-->
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
         
         <!-- 19feb 2021-->
           <div id="test" ></div>
         <!---->
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
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
        <script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
        <script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
        <!-- Init js -->
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>
        
        <script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script type="text/javascript">
            deliv_ids = [];
           
            tmp_deliv_ids=[];
             
        
      function unassign_dels(btn)
    {
         
        Swal.fire({
                  title: 'Warning',
                  text: "Are you sure?",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Proceed Unassign!'
                }).then((result) => {
                  if (result.value) {
                            btn.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
                            btn.disabled = true;
                            var all_ids = [];
                            $(".checkboxes:checked").each(function(){
                                all_ids.push(parseInt($(this).val()));
                            });
                            run_unassign_ajax(all_ids, btn);  
                    }
                
            });  
    }

     function run_unassign_ajax(ids, btn)
    {
        if(ids.length > 0)
        {
            $.ajax({
                url: '<?php echo base_url() ?>order/unassign_bagpicks',
                data: {'order_ids': ids},
                method: 'post',
                success: function(resp){
                    btn.innerHTML = 'Unassign';
                    btn.disabled = false;
                    rmsg = JSON.parse(resp);
                    if(rmsg.success)
                        swal.fire("Pickup Bags Unassigned Successfully", "", "success").then(function(){ location.reload(); });
                },
                error: function(err)
                {
                    btn.innerHTML = 'Unassign Pickup Bags';
                    btn.disabled = false;
                    swal.fire("Network or Server Error", "", "error");
                }
            });
        }
    }








           $(document).ready(function () {

            // var un_assign_table;

var x_check=<?php if($this->uri->segment(3) !=''){
    echo 0;
}else{
     echo 1;
} ?> ;
// console.log(x_check);
            $("#from_date").flatpickr({
                
                    
               onChange: function(sd, ds, ins){
                $("#to_date").flatpickr({
                    defaultDate: ds,
                    minDate: ds,
                });
            }
        });
            
            

           
             init_table();
             
             $('.search_option').select2({
  placeholder: 'Select an Driver'
});



$('.search_option_p').select2({
  placeholder: 'Select Partner'
});

$('.search_option_e').select2({
  placeholder: 'Select Emirate'
});

$('.search_option_t').select2({
  placeholder: 'Select TimeSlot'
});


                });
        </script>
        
<script type="text/javascript">
    
//      function init_table(){
         
        
//         if($('.example tbody tr').length <= 1)
//             return;
            
         
//         un_assign_table = $('.example').DataTable({
//          "language": {
//         "infoEmpty": "No records available - Got it?",
//     },
// dom: 'Blifrtip',
//                     buttons: [
           
//             {
//                 extend: 'csvHtml5',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//             {
//                 extend: 'pdfHtml5',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//             {
//                 extend: 'print',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//             'colvis'
//             ],
//             "lengthMenu": [[ 10, 25, 50, 75, 100,-1], [ 10, 25, 50, 75, 100,"All"]]
//         });
        
       
//         //  console.log('i am inside init_table after excute table:');
//         //  console.log(un_assign_table);
//     }
    
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
        
        // if($("#partner_list").val() == '')
        //     {
        //       swal("Required Field", "Please Select Partner", "warning");
        //         return;
        //   }else{
               
                // if(un_assign_table)
        // $('.example').dataTable().fnDestroy();
       
        $("#table_body").empty();
        get_deliveries_report_by_status(e.target);
            // }
    }

    function get_deliveries_report_by_status(el){
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        var option = 'Not Assign';
        var partner_id=$("#partner_list").val();
        var emirate_id=$("#emirate_list").val();
        var time_id=$("#time_list").val();

        if(un_assign_table){
            $('#order_table').dataTable().fnDestroy();
         }
       $("#table_body").empty();
       
       
        el.disabled = true;
        el.innerHTML = '<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading';
        var url = "<?php echo base_url(); ?>"+"report/get_collected_bagpicks";
        $fields = {'start_date':from_date, 'end_date':to_date, 'status':option,'id':partner_id,'time_id':time_id,'emirate_id':emirate_id};
        $.post(url, $fields, function(response){
            el.disabled = false;
            el.innerHTML = 'Get Report <i class="icon-plus"></i>';
            if(response.success){
                var data = response.report_data.records;
                    // console.log(data);
                    
                  //     $("#table_body").empty();
                 //   $("#table_body").find("tr").remove();
              
               $("#table_body").append(set_report_data(data));
                
               
            }
            
            //   if(!un_assign_table)
                          init_table();
            //   console.log('i am in not condition :'+un_assign_table);
            //  }
                    
        },'json');
    }
  function set_report_data(data){
         var url = "<?php echo base_url(); ?>";
        var tbody = '';
        console.log(data);
        var ky=1;
        $.each(data, function(i, e){
            
           
                tbody += '<tr class="gradeX" id="'+ e.order_id+'">';
           
            
            
            var the_str=e.delivery_address;
            var the_res = the_str.split(",");
            var the_ans= the_res[the_res.length - 1];
            
            var the_str2=e.delivery_time;
            var the_res2 = the_str2.split(",");
            var the_ans2= the_res2[the_res2.length - 1];
            
            
            ky=Number(ky)+Number(1);
            // tbody += '<td><input type="checkbox" class="checkboxes" value="'+ e.order_id+'" style="zoom: 2.5;"  /></td>';
            tbody += '<td >'+ ky +'</td>';
            tbody += '<td >'+ e.plan_id +'</td>';
            tbody += '<td >'+ e.order_id +'</td>';
            //tbody += '<td ><img src="'+ url+e.qrImage +'" /></td>';
             tbody += '<td style="color: #2ab1c9;font-weight: 600;">'+ e.vendor +'</td>';
              tbody += '<td style="color: #2ab1c9;font-weight: 600;">'+ e.delivery_date +' '+ e.delivery_time +'</td>';
           tbody += '<td >'+ e.driver+'</td>';
           
           
           tbody += '<td><div class="table-responsive"><table class="table  table-bordered ">';
           tbody += '<thead><tr><th>Assigned</th><th>Picked</th><th>Extra</th></tr></thead>';
           tbody += '<tbody><tr><td><span style="color:#2ab1c9a6; font-weight:900;">'+e.total_bags+'</span> </td>';
           tbody += '<td><span style="color:#008000; font-weight:900;">'+e.collected_bags+'</span></td>';
           
           if(e.collected_bags >1){ 
               var rems=Number(e.collected_bags)-Number(1);
               tbody += '<td><span style="color:#ffff00ad; font-weight:900;">'+rems+'</span> </td> ';
               
           }else{
               tbody += '<td><span style="color:#ffff00ad; font-weight:900;">0</span> </td> ';
               
           }  
             tbody += '</tr> </tbody></table></div></td>';
           
             tbody += '<td >'+ e.notes +'</td>';
            tbody += '<td >'+ e.customer +' '+ e.c_phone +'</td>';
            
            
            if(e.bag_image !='' && e.driver_cancel_request !=1){
                  tbody += '<td style="color:#00afe2 !important">Available</td>';
               }else{
                  tbody += '<td style="color: red !important">Not Available</td>';
                     }
                                       
                                        
            if(e.bag_image !='' && e.driver_cancel_request !=1){
                   tbody += '<td><a class="Green" alt="Additional Bag Image" title="Click to View" target="_blank" href="<?php echo base_url() ?>upload_addi_bagpick/'+e.bag_image+'"><img src="<?php echo base_url(); ?>upload_addi_bagpick/'+e.bag_image+'" width="100%" class="img-responsive img-thumbnail"></a></td>';
                 }else{
                    tbody += '<td>N/A</td>';
                      }
                                       
                                         
             tbody += '<td id="cucc2"><div id="truncateLongTexts">'+ e.delivery_address + '</div></td>';
              tbody += '<td>'+e.pickup_status+'</td>';
             
             if(e.status =='Not Assign'){ 
                 var status='Not Assigned';
                  tbody += '<td  style="color: #2ab1c9;font-weight: 600;">'+status+'</td>';
                 }else if(e.status=='Assign'){
                 var status='Assigned';
                 tbody += '<td  style="color: #2ab1c9;font-weight: 600;">'+status+'</td>';
                 }else{
                 
                 tbody += '<td  style="font-weight: 600;">'+e.status+'</td>';
                 }
             
            
            tbody += '<td >'+e.assigned_at+'</td>';
            tbody += '<td >'+e.assigned_by+'</td>';
            tbody += '<td >'+e.pickup_at+'</td>';
          
            tbody += '<td >'+ e.pickUp +'</td>';
            tbody += '<td>'+e.food_type+'</td>';
          
           tbody += '</tr >';
        });
        return tbody;
    }
$(document).on('change', '.checkboxes', function(){
        if($(this).prop('checked'))
            $(this).parent().parent().addClass("redd");
        else
            $(this).parent().parent().removeClass("redd");

        if($('.checkboxes:checked').length > 0)
        {
            $("#action_btn").show();
        }
        });

$(document).on('change', '.checkAll', function(){
    $this = $(this);
    if($this.prop('checked'))
    {
        //$(".checkboxes").addClass("redd");
        $("#action_btn").show();
        $(".checkboxes").each(function(){
            $(this).prop('checked', true);
            $(this).parent().parent().addClass("redd");
        });
    }
    else
    {
        $(".checkboxes").prop("checked", false);
        $(".checkboxes").parent().parent().removeClass("redd");
        $("#action_btn").hide();
    }
});










<?php if($this->session->flashdata('success')){ ?>

swal.fire('','Data Updated Successfully','success');
<?php }else if($this->session->flashdata('error')){ ?>
swal.fire('','Something went wrong. Try Again','error');
<?php } ?>


</script>
       
    </body>
<style type="text/css">
        .redd{
            background: lightblue;
        }

        .redd:hover{
            color: black !important;
        }
        th{
        padding: 0.5px !important;
        width: 1.4063px;
        vertical-align: middle !important;
}

div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
}
.fixed-table-container thead th .th-inner {
    padding: .0rem !important;
    margin-bottom: 14px;
}
  .activee {
  background: gold !important;
}      



.modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 110%;
    pointer-events: auto;
    background-color: #485561;
    background-clip: padding-box;
    border: 0 solid transparent;
    border-radius: .2rem;
    outline: 0;
}

    </style>
</html>