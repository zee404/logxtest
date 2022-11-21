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
                            
                            <h4 class="page-title" style="margin-top: -36px;">Transactions History</h4>

                        </div>

                    </div>
                      
                    
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
                   
                            
                    <div class="col-lg-2">
                          <div class="btn-group">
                                <button onclick="get_reports(event)" class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;margin-top: 10px;">Get Report </button>
                        </div>
                                  

                    </div>
                     </div>
                    
               </div>  
                    
                    
                    
                
      
                          
                          
                               <!--<div class="card-box" style="overflow: auto;">  -->
                             <div class="card-box" style="overflow-x: auto;">  
                            <!--<table class="example table dataTable  table-bordered table-hover" id="example" data-toggle="table" >-->
                               <table class="example table table-responsive table-bordered table-hover" style="display: table; overflow-x: auto;" id="example">

                                <thead  style="background-color: #f1f5f7">

                                <tr >
                                     <!--<th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" ></th>-->
                                  
                                  
                                     <!--<th></th>-->
                                    <th style="min-width: 30px" data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    
                                   
                                    <th style="min-width: 100px" data-align="center" data-field="typr"   data-sortable="true">Type</th>
                                    <th style="min-width: 150px" data-align="center" data-field="amount" data-sortable="true">Amount</th>
                                    <th style="min-width: 150px" data-align="center" data-field="notes"    data-sortable="true">notes</th>
                                    
                                      <th  style="min-width: 150px" data-field="receipt" data-sortable="true">Receipt</th>
                                     <th style="min-width: 100px" data-align="center" data-field="from" data-sortable="true">From</th>
                                     <th style="min-width: 100px" data-align="center" data-field="to" data-sortable="true">To</th>
                                    
                                     <th style="min-width: 100px" data-align="center" data-field="at" data-sortable="true">Created_at</th>
                                   

                                </tr>
                                
                                
                                </thead>

                                <tbody id="table_body">
                                   
                                <?php if (count($invoices) > 0) { ?>
                              <?php foreach($invoices as $key => $invoices_data){ ?>   
                                   <tr>
                                
                                    <!--<td><input type="checkbox" class="checkboxes" value="<?php //echo $invoices_data->id; ?>"   / id="" /  name="checkbox"></td>-->
                                           
                                    <td ><?php echo $key+1; ?></td>
                                    
                                
                                 <?php   if($invoices_data->type =='Credit'){ ?>
                
                                        <td style="font-weight: bold; color:#0c710cb8;"><?php echo $invoices_data->type; ?> </td>
                                        <td style="font-weight: bold; color:#0c710cb8;"><?php echo $invoices_data->amount; ?> &nbsp د.إ</td>
            
                                      <?php   }else if($invoices_data->type =='Waive Off'){ ?>
                 
                                        <td style="font-weight: bold; color:#ffff00b0;"><?php echo $invoices_data->type; ?> </td>
                                        <td style="font-weight: bold; color:#ffff00b0;"> <?php echo $invoices_data->amount; ?> &nbsp د.إ</td>
           
                                      <?php   }else if($invoices_data->type=='Extra Charged'){ ?>
                
                                        <td style="font-weight: bold; color:#ff0000ad;"><?php echo $invoices_data->type; ?> </td>
                                        <td style="font-weight: bold; color:#ff0000ad;"> - <?php echo $invoices_data->amount; ?> &nbsp د.إ</td>
           
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
                                    
                                    <td ><?php echo $invoices_data->created_at; ?> </td>
                                   
                                   
                               
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
         
         $(document).ready(function () {
            
        
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
     





                 $(".hid").hide();
                
                
                
                <?php if (count($invoices) > 0) { ?>
                 init_table();
                <?php }else{ ?>
                
                <?php } ?>
        }); //end of document ready       
                  
                 
                 
                 
                 
                 
                 
                 
                 
       
        
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
    
      function get_reports(e){
        $("#table_body").empty();
        get_deliveries_report_by_status(e.target);
    }

    function get_deliveries_report_by_status(el){
        var from_date = moment($("#from_date").val()).format('YYYY-MM-DD 00:00:00');
        var to_date = moment($("#to_date").val()).format('YYYY-MM-DD 23:59:59');
        var option = <?php echo $this->session->userdata('u_id') ?>;
        
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
          
          
          it=Number(it)+1;
            tbody += '<td >'+ it +'</td>';
            
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
            if( e.receipt !='' ){ 
                 tbody += ' <a class="Green" alt="Proof Image" title="Click to View" target="_blank"  href="'+base_url+e.receipt+'" > <img src="'+base_url+e.receipt+'" width="50%" class="img-responsive img-thumbnail"></a>';
           }else{ 
                   tbody += '<span class="Red">Not Available </span>';
              } 
              tbody += '</td>';                       
           tbody += '<td >'+e.from_dt+'</td>';
           
          
            tbody += '<td >'+e.to_dt+'</td>';
           
              tbody += '<td >'+e.created_at+'</td>';
            
          
            tbody += '</td>';

            tbody += '</tr >';
        });
        
        $(".hid").show();
        
        return tbody;
    }
  
 

    function hide_error(){
        $("#error_msg").html('');
        $("#error_container").hide();
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
    
  
   </script>
       
    </body>
</html>