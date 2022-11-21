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
            .btn-danger {
    color: #fff;
    background-color: #197990 !important;
     border-color: white;
}
 .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

        }
.badge {
    color: #72747b;
    font-size: 10.5px !important;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -38px;
}
.btn-danger:hover {
    color: #fff;
    border-color: #0090b8;
}
.btn-danger.focus, .btn-danger:focus {
    -webkit-box-shadow: 0 0 0 0.15rem rgba(243,111,130,.5);
    box-shadow: 0 0 0 0.15rem rgb(255, 255, 255);
}
.btn-danger:not(:disabled):not(.disabled).active:focus, .btn-danger:not(:disabled):not(.disabled):active:focus, .show>.btn-danger.dropdown-toggle:focus {
    -webkit-box-shadow: 0 0 0 0.15rem rgba(243,111,130,.5);
    box-shadow: 0 0 0 0.15rem rgb(255, 255, 255);
}
.btn-danger:not(:disabled):not(.disabled).active, .btn-danger:not(:disabled):not(.disabled):active, .show>.btn-danger.dropdown-toggle {`
    color: #fff;
    background-color: #0097c2;
    border-color: #0097c2;
}
.btn-danger:not(:disabled):not(.disabled).active, .btn-danger:not(:disabled):not(.disabled):active, .show>.btn-danger.dropdown-toggle {
    color: #fff;
    background-color: #0097c2;
    border-color: #0098c3;
}
.btn-danger:not(:disabled):not(.disabled).active:focus, .btn-danger:not(:disabled):not(.disabled):active:focus, .show>.btn-danger.dropdown-toggle:focus {
    -webkit-box-shadow: 0 0 0 0.15rem rgba(243,111,130,.5);
    box-shadow: 0 0 0 0.15rem rgb(255, 255, 255);
}
.row_col_box {
    width: 47%;
    position: absolute;
    left: 35%;
    top: 88px;
}
        </style>
        
        <style type="text/css">
    
    .green{
        color:green;
    }
    .red{
        color:red;
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">QR Codes</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">QR Codes </h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="height: 50px !important;">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                        <div class="row">
                    <div class="col-lg-2">
                         <div class="page-title-box">
                            
                            <h4 class="page-title" style="margin-top: -36px;">All QR Bags</h4>

                        </div>

                    </div>
                     <div class="col-lg-2">
                       
                             <a href="#custom-modals" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"style="margin-top: -19px;">Status Details</a>
                                  

                    </div>
                     <div class="col-lg-5">
                         
                                    <form action="<?php echo base_url("order/createqr"); ?>" method="post">
                                    <div class="input-group input-large ">
                                       <label style="margin-top: -11px;">Enter Required Quantity:</label>
                                       &nbsp;&nbsp;&nbsp;
                                         <input type="text" maxlength="3" class="form-control" id="quantity" name="quantity" required / style="margin-top: -17px">  &nbsp;&nbsp;&nbsp;
                                         <button class="btn btn-danger create-btn" type="submit" style="margin-top: -18px;">Create New</button>
                                    </div>
                                     </form>


                    </div>
                     <div class="col-lg-3" style="display: none;" id="action_btn">
                             <button style="margin-top: -20px;color: #fff;background-color: #197990 !important;border-color: white;" class="btn btn-secondary buttons-csv buttons-html5 button" tabindex="0" id="button" aria-controls="demo-custom-toolbar" type="button" ><span>Delete</span></button>
                              <!--<button class="btn btn-danger" id="print_qr" style="margin-top: -20px;margin-left: 15px;">Print QR</button> -->
                           </div>
                   
                </div> 


                          </div> 
                               <div class="card-box">  
                                <!-- <div class="row"> -->
                                  <div class="row_col_box" style="display: none;">
                                    <label style="padding: 7px 0 0 0;">QR Prints Per Page : </label>
                                    <button class="btn btn-danger" id="print_qr" style="float: right;">Print QR</button>
                                    <select class="form-control" id="row_col" style="width: 56%;float: right;margin-right: 11px;">
                                      <option value="2">08 <small>(4 Rows 2 Columns)</small></option>
                                      <option value="3">12 <small>(4 Rows 3 Columns)</small></option>
                                      <option value="4">16 <small>(4 Rows 4 Columns)</small></option>
                                    </select>

                                  </div>
                                <!-- </div> -->
                                
                                <?php 
                            if ($this->session->userdata()) {
                                $user_data = $this->session->userdata();
                                
                                $modules = explode(',',strtolower($user_data['modules']));
                            //   echo '<pre>';
                            //   print_r($modules);
                            }
                            ?>
                                
                            <table  class="example able table-responsive" data-toggle="table"
                                  >

                                <thead class="thead-light">

                                <tr>
                                     <th class="table-checkbox" style="width: 2%;">
                                    <input type="checkbox" class="group-checkable checkAll" id="" />
                                    </th>
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th data-field="name" data-sortable="true">QR Code</th>
                                    <th data-field="date" data-sortable="true" data-formatter="dateFormatter">QR Images</th>
                                    <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Created at</th>
                                    <th data-field="status" data-align="center" data-sortable="true">Status</th>
                                    <th data-field="cur" data-align="center" data-sortable="true" data-formatter="">Current Customer</th>
                                   <?php if($this->session->userdata('role') == 'admin' OR ($this->session->userdata('role_id') >5 AND in_array('oprations',$modules) ) ){ 
                                   
                                   echo '<th data-field="owner" data-align="center" data-sortable="true" data-formatter="">Qr Owner(Vendor)</th>';
                                   }?>
                                    

                                </tr>
                                </thead>

                                <tbody>
                                    
                            <?php if($this->session->userdata('role') == 'admin' OR ($this->session->userdata('role_id') >5 AND in_array('oprations',$modules) )){ ?>
                            
                               <?php $counter =0; foreach($qrbags as $bags){
                                    $counter++; ?>
                                    
                                        <tr>
                                             <td><input type="checkbox" class="checkboxes" value="<?php echo $bags->qrid;?>" id=""  name="checkbox"></td>
                                          
                                            <td ><?php echo $counter;?></td>
                                            <td ><?php echo $bags->code;?></td>
                                            <!--<td ><img src="<?php echo base_url($bags->qrImage);?>" /></td>-->
                                            <td ><?php if($bags->qrImage!=''){ ?>
                                             <a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="<?php echo base_url($bags->qrImage) ?>" target="_blank">Available</a>
                                            <?php }else{ ?>
                                             <p class="red">Not Available</p>
                                            <?php } ?></td>
                                           
                                            <td><?php echo $bags->createdAt;?></td>
                                            <td><?php echo $bags->status;?></td>
                                            <td><?php echo $bags->full_name.'<br />'.$bags->phone;?></td>
                                            
                                            <td><?php echo $bags->qr_vendor_owner.'<br />'.$bags->vendor_owner_phn;?></td>
                                            
                                           
                                        </tr>
                                 
                                    <?php }?>
                            
                          <?php  }else{  ?>       
                                     <?php $counter =0; foreach($qrbags as $bags){
                                    $counter++; 
                                     $userid = $this->session->userdata("u_id");
                                    //  if($bags->status !='Neutral' AND $bags->vendor_id !=$userid){
                                       if($bags->status !='Neutral' AND $bags->vendor_id !=$userid){ 
                                           
                                     }else if($bags->status !='Neutral' AND $bags->b_vendor ==0){
                                     
                                         
                                     }else if(($bags->b_vendor ==0 AND $bags->status =='Neutral') OR $bags->b_vendor ==$userid){
                                    ?>
                                    
                                   
                                    
                                   
                                        <tr>
                                             <td><input type="checkbox" class="checkboxes" value="<?php echo $bags->qrid;?>" id=""  name="checkbox"></td>
                                          
                                            <td ><?php echo $counter;?></td>
                                            <td ><?php echo $bags->code;?></td>
                                            <!--<td ><img src="<?php echo base_url($bags->qrImage);?>" /></td>-->
                                           <td ><?php if($bags->qrImage!=''){ ?>
                                             <a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="<?php echo base_url($bags->qrImage) ?>" target="_blank">Available</a>
                                            <?php }else{ ?>
                                             <p class="red">Not Available</p>
                                            <?php } ?></td>
                                            <td><?php echo $bags->createdAt;?></td>
                                            <td><?php echo $bags->status;?></td>
                                            <td><?php echo $bags->full_name.'<br />'.$bags->phone;?></td>
                                            
                                           
                                        </tr>
                                  <?php
                                     }
                                  ?>
                                    <?php }?>
                               <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

  
                 <div id="custom-modals" class="modal-demo">
                       <div class="modal-body">
      <h3 id="h6"style="margin-left: 21px;"> Bags now have these statuses</h3>
       
      <ul class="list" id="list">
      <style>
      #h6{
        color:black;
      }
     #list li{
        color:black !important;
      }
      </style>
      
<li>1- Neutral (Not attached to any delivery) - Default one</li>
<li>2- Attached to Delivery (by Partner in ware house)</li>
<li>3- Picked from Warehouse (by driver from ware house)</li>
<li>4- Delivered (to customer by driver)</li>
<li>5- Collected (from customer by driver)</li>
<li>1- Neutral (Scanned by Vendor in ware house) - Again Default one</li>
</ul> 
       
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
<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php //echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php //echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
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
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
         <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>


        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       <script type="text/javascript">
  var tmp = [];
   $(document).ready(function () {

   $('.checkboxes').on('change', function () {

            if($(this).is(":checked"))
            {
               $('#action_btn').show();
               $('.row_col_box').show();
                $(this).parent().parent().addClass('yellow');
            }   
            else
            {
                $('.row_col_box').hide();
                $('#action_btn').hide();
                $(this).parent().parent().removeClass('yellow');
            } 

            });
  
  $(document).on('change', "input[name='checkbox']", function() {
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
  
});


function delAll()
{
    $.ajax({
            url:'<?php echo base_url("Order/del") ?>',
            method:'post',
            data:{ids: tmp.join()},
            success:function(res)
            {
               swal.fire("Deleted", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
               $("#button").hide();
               // window.location.reload();
            },
            error:function(err)
            {
                console.log('not Delete');
            }
        });
}


</script>
        <script type="text/javascript">
        
            //       $(document).ready(function () {
            //   $('#abc').on('click', function () {
            //   swal("Delete", "Successfully Delete", "success");
            //   });

         
            //     var table = $('.example').DataTable( {
            //         dom: 'Blifrtip',
            //         buttons: [
           
            //         {
            //             extend: 'csvHtml5',
            //             exportOptions: {
            //                 columns: ':visible'
            //             }
            //         },
            //         {
            //             extend: 'pdfHtml5',
            //             exportOptions: {
            //                 columns: ':visible'
            //             }
            //         },
                    
            //             // extend: 'print',
            //             // exportOptions: {
            //             //     columns: ':visible'
            //             // }
                        
            //           {
            //             extend: 'print',
            //             text: 'Print all',
            //             exportOptions: {
            //                 modifier: {
            //                     selected: null
            //                 }
            //             }
            //         },
            //             {
            //                 extend: 'print',
            //                 text: 'Print selected'
            //             },
                        
                    
            //         'colvis'
            //         ],
            //         select: true,
            //         "lengthMenu": [[ 10, 25, 50, 75, 100,-1], [ 10, 25, 50, 75, 100,"All"]]
            //     });
        
           $(document).ready(function () {
              $('#abc').on('click', function () {
               swal("Delete", "Successfully Delete", "success");
              });

         
                var table = $('.example').DataTable( {
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
                $("#print_qr").click(function(){
                  var favorite = [];
                  $.each($("input[name='checkbox']:checked"), function(){
                      favorite.push($(this).val());
                  });
                  
                  if (favorite.length > 0) {
                    // alert("My favourite sports are: " + favorite.join(","));
                    var row_col = $("#row_col").val();
                    window.open(
                      "<?php echo base_url('Order/print_qr/') ?>"+favorite.join(",")+"/"+row_col,
                      '_blank' // <- This is what makes it open in a new window.
                    );
                    // window.location.href="<?php echo base_url('Order/print_qr/') ?>"+favorite.join(",")+"/"+row_col;
                  }else{
                    swal.fire("Please select QR first", "", "error");
                  }
                });

          });
            $(document).on('change', '.checkAll', function(){
        $this = $(this);
        tmp = [];
        $("tbody").find("input[type='checkbox']").each(function(){
            if($this.prop('checked'))
            {
              tmp.push($(this).val());
                $(this).prop('checked', true);
                $('#action_btn').show();
                $('.row_col_box').show();
                 $(this).parent().parent().addClass('yellow');
            }
            else
            {
                $(this).prop('checked', false);
               $('#action_btn').hide();
               $('.row_col_box').hide();
                $(this).parent().parent().removeClass('yellow');
             }
        });

        //if(tmp.length > 0)
    });

        </script>
        <script type="text/javascript">
    jQuery(document).ready(function() {
        var link_id = 'manage_upload_customers';
       // App.side_Menu(link_id);
    });

$(".create-btn").click(function (e) {
  // alert();
  var quantity = $("#quantity").val();
  if (quantity != '') {

    document.getElementById('custom_loader').style.visibility = "visible";
  }
});





</script>


       
    </body>
</html>