<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>The LOGX</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/logx-logo-512x512.png');?>">

        <!-- Plugins css -->
       
     
        
        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
         
           <link href="<?php echo base_url('assets/css/invoive.css');?>" rel="stylesheet" type="text/css" />
           <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
           
           
           
           <style>
    /*           body{*/
    /*    background-color:white;*/
    /*}*/
    
    
    body {
    margin: 0;
    font-family: Nunito;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    /* color: #adb5bd; */
    text-align: left;
    background-color:white;
    /*background-color: #303841;*/
}
    
    h1,h4,h2,h5{
        color:black;
         font-family: Nunito;
         line-height: 1.0;
    }
    h3,h6{
         font-family: Nunito;
         line-height: 1.0;
    }
    
    
    .mt-3, .my-3 {
    margin-top: 1.5rem!important;
       margin-bottom: -8px;
}

.mywrp{
    /*padding:21px 12px 0 12px;*/
    
    padding: 25px 88px 39px 80px;
    }
    
/*    .display-4 {*/
/*    font-size: 3rem;*/
    /* font-weight: 300; */
/*    line-height: 1.1;*/
/*}*/


.display-4 {
    font-size: 3rem;
    font-weight: lighter;
}

table {
    border-collapse: collapse;
    color: black;
}


li{
    padding-left: 36px;
}

.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -12px;
    margin-left: -12px;
    margin-bottom: -28px;
}



@media pdf {
    .html-content {
        /*font-size: 11px!important;*/
        overflow: hidden!important
    }

    .html-content footer {
        /*position: absolute;*/
        /*bottom: 10px;*/
        page-break-after: always
    }

    .html-content>tr:last-child {
        page-break-before: always
    }
}
           </style>

  
    </head>
    
    

    <body>

    

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

       
          
              
                   
            <div class="html-content">              
              <div class="mywrp">             
     
               <div class="  ">
                                
                               <!-- *************** mt-3 ,ml-2-->
                                   
                                     <div class="container " id="content">
                                             <div class=" row ">
                                                 <div class="col-md-6 ">
                                                    <img src="<?php echo base_url('assets/Capture.JPG');?>" width="250px" height="80px" alt="logx-img">
                                                 </div>
                                                 <div class="col-md-4 ">
                                                     <h2 class="blk display-4 text-right"><strong>TAX INVOICE</strong></h2>
                                                     <h4 class="text-right tax-inner2">Invoice# LGX_P<?php echo $inv_id; ?></h4>
                                                 </div>
                                                  
                                             </div>
         <h5><strong>LOGX TRANSPORT LLC</strong><br>
         <span class="address-inner">WAREHOUSE B4 BUILDING 2 AL QUOZ 3 NEXT TO AL<br>
     MANSOOR TYRES BEHIND GOLD AND DIAMOND PARK<br>
     AL QUOZ 3<br>
     DUBAI Dubai 0000<br>
     U.A.E<br>
     TRN <?php echo $trn; ?></span>
         </h5>
         
         <div class="row">
    <div class="col-md-4">
        <h5 class="tax-inner2" style="
    line-height: 1.1;
"  >Bill to <br>
     <span class="blk" ><?php   $name  = strtoupper($partner_name); echo  $name; ?> </span><br>
     <span class="blk"><?php echo $email; ?> <br>
     </span>
     </h5>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-5">
        <h4 class="address-inner text-left">Invoice Address:<br><?php echo $address; ?></h4>
    
    
    </div>
    </div>
         
        
   
     <br>
     
     
     
     
     
     <!--<h5 style="margin-bottom:-9px;"></h5>-->
     <!--<h6 class="dubai">Dubai Silicon Oasis<br>-->
     <!--TRN 100225500600003</h6>-->
     <!--<br>-->
    
    
    
    
     <table class="first-table">
         <tr>
             <th>Invoice Date</th>
             <th>Terms</th>
             <th>Due Date</th>
         </tr>
         <tr>
             <td><span><?php  echo date('d M Y', strtotime($start_date)); ?></span> to <span><?php   echo date('d M Y', strtotime($end_date)); ?></span></td>
             <td>Net <?php echo $term; ?></td>
             <td><?php echo date('d M Y', strtotime($due_date));?></td>
         </tr>
     </table>
     
     
     
     
    
     <table class="first-table second-table">
        <tr>
            <th>#.&nbsp Item & Description</th>
            <th>Qty</th>
            <th>Rates</th>
            <th>Tax %</th>
            <th>Tax</th>
            <th>Amount</th>
        </tr>
        
        
       <?php 
       
       $words = explode(" ", $name);
        $firtsName = reset($words); 
         $lastName  = end($words);
         $name_intiates=substr($firtsName,0,1).substr($lastName ,0,1);
        //  echo 'XXXXXXXXXXXXX'.$name_intiates;
        
        
            //  $final_total=0;
            //  $total_taxable_am=0;
            //  $total_tax=0;  //standard_rate
             
             
             $iteration=0;
             
            //  Deliveries
       if (count($orders_data) > 0) { ?>
            <?php foreach($orders_data as $key => $data){ ?>  
                                 
                                   
                                   <tr>
                                       
                                       <td style="border-bottom: 0px solid lightgrey;"><strong><?php echo $iteration=$iteration+1; ?>.&nbsp;&nbsp;
                                        <?php echo $name_intiates; ?> DELIVERIES IN <?php $emi=strtoupper($data->emirate_name); echo $emi ; ?></strong> <br><span class="tablegrey">Refrigerated Deliveries in <?php echo $data->emirate_name; ?> </span></td>
                                      
                                       
                                   </tr>
                                   
                                   
                                   
                                          <?php
                                            //   $tax_perc=$vat;
                                            //   $total_m=$data->total_delivered_full_price_revenue;
                                               
                                            
                                             
                                            //   $mult=($total_m) * ($tax_perc);
                                            //   $final_taxed=$mult/100;
                                               
                                            //   $total_tax= $total_tax + $final_taxed;
                                            //   $total_taxable_am= $total_taxable_am + $data->total_delivered_full_price_revenue;
                                               
                                               ?> 
                                               
                                   
                                      <!--<tr> -->
                                      <!--<td></td>-->
                                      <!--<td> <?php echo $name_intiates; ?> DELIVERIES IN <?php $emi=strtoupper($data->emirate_name); echo $emi ; ?><br><span class="tablegrey">Refrigerated Deliveries in <?php echo $data->emirate_name; ?> </span></td>-->
                                      <!-- <td></td>-->
                                      <!-- <td></td>-->
                                      <!-- <td></td>-->
                                      <!-- <td></td>-->
                                      <!-- <td></td>-->
                                      <!-- </tr> -->
                                    
                                       
                                       <ul>
                                           <tr>
                                               
                                            
                                               
                                                 <td><li>Total Deliveries Full Price</li></td>
                                           <td><?php echo $data->total_num_of_delivered_delivries_full_price; ?></td>
                                           <td><?php echo $data->price; ?></td>
                                           <td><?php echo $vat; ?>%</td>
                                           <td><?php echo $data->final_taxed; ?></td>
                                           <td><?php echo round($data->total_delivered_full_price_revenue,4); ?></td>
                                           
                                           </tr>
                                           
                                           
                                           
                                           
                                            <tr>
                                               
                                               <?php
                                            //   $tax_perc_dis=$vat;
                                            //   $total_m_dis=$data->total_delivered_discount_price_revenue;
                                            //   $mult_dis=$total_m_dis*$tax_perc_dis;
                                            //   $final_taxed_dis=$mult_dis/100;
                                               
                                            //   $total_tax= $total_tax + $final_taxed_dis;
                                            //   $total_taxable_am= $total_taxable_am + $data->total_delivered_discount_price_revenue;
                                               ?> 
                                               
                                              
                                           <td><li>Total Deliveries Discounted Price</li></td>
                                           <td><?php echo $data->total_num_of_delivered_delivries_discount_price; ?></td>
                                           <td><?php echo $data->same_loc_price; ?></td>
                                           <td><?php echo $vat; ?>%</td>
                                           <td><?php echo $data->final_taxed_dis; ?></td>
                                           <td><?php echo round($data->total_delivered_discount_price_revenue,4); ?></td>
                                           
                                           </tr>
                                           
                                           
                                           
                                           <tr>
                                               
                                              
                                               
                                              
                                           <td><li>Total Deliveries Paid Canceled Full Price </li></td>
                                           <td><?php echo $data->total_paid_canceled_deliveries_full_price; ?></td>
                                           <td><?php echo $data->price; ?></td>
                                           <td><?php echo $vat; ?>%</td>
                                           <td><?php echo $data->final_taxed_canc_full; ?></td>
                                           <td><?php echo round($data->total_canceled_full_price,4) ?></td>
                                           
                                           </tr>
                                           
                                            <tr>
                                               
                                              
                                               
                                              
                                           <td><li>Total Deliveries Paid Canceled Discounted Price </li></td>
                                           <td><?php echo $data->total_paid_canceled_deliveries_discount_price; ?></td>
                                           <td><?php echo $data->same_loc_price; ?></td>
                                           <td><?php echo $vat; ?>%</td>
                                           <td><?php echo $data->final_taxed_canc_dis; ?></td>
                                           <td><?php echo round($data->total_canceled_discount_price,4); ?></td>
                                           
                                           </tr>
                                           
                                          
                                          
                                           
                                      
                                       </ul> 
                                      
                                      
                                 
      
      <?php } ?>
         <?php } ?>
         
         
         
         <!-- BAGS-->
         
  <?php       
          if (count($bags_data) > 0) { ?>
            <?php foreach($bags_data as $key => $data){ ?>  
                                 
                                   
                                   <tr>
                                       
                                       <td style="border-bottom: 0px solid lightgrey;"><strong><?php echo $iteration=$iteration+1; ?>.&nbsp;&nbsp;
                                        <?php echo $name_intiates; ?>  BAG COLLECTION IN <?php $emi=strtoupper($data->emirate_name); echo $emi ; ?></strong></td>
                                      
                                   </tr>
                                   
                                   
                                      <!--<tr> -->
                                      <!--<td></td>-->
                                      <!--<td> <?php echo $name_intiates; ?> BAG COLLECTION IN <?php $emi=strtoupper($data->emirate_name); echo $emi ; ?></td>-->
                                      <!-- <td></td>-->
                                      <!-- <td></td>-->
                                      <!-- <td></td>-->
                                      <!-- <td></td>-->
                                      <!-- <td></td>-->
                                      <!-- </tr> -->
                                    
                                       
                                       <ul>
                                           <tr>
                                               
                                               <?php
                                            //   $tax_perc=$vat;
                                            //   $total_m=$data->total_bag_collections_full_price;
                                               
                                            
                                             
                                            //   $mult=($total_m) * ($tax_perc);
                                            //   $final_taxed=$mult/100;
                                               
                                            //   $total_tax= $total_tax + $final_taxed;
                                            //   $total_taxable_am= $total_taxable_am + $data->total_bag_collections_full_price;
                                               
                                               ?> 
                                               
                                                <td><li>Total Bags Collection Full Price</li></td>
                                           <td><?php echo $data->total_num_of_picked_bags_full_price; ?></td>
                                           <td><?php echo $data->price; ?></td>
                                           <td><?php echo $vat; ?>%</td>
                                           <td><?php echo $data->final_taxed; ?></td>
                                           <td><?php echo round($data->total_bag_collections_full_price,4); ?></td>
                                           
                                           </tr>
                                           
                                           
                                           
                                           
                                            <tr>
                                               
                                               <?php
                                            //   $tax_perc_dis=$vat;
                                            //   $total_m_dis = $data->total_bag_collections_discount_price;
                                            //   $mult_dis=$total_m_dis*$tax_perc_dis;
                                            //   $final_taxed_dis=$mult_dis/100;
                                               
                                            //   $total_tax= $total_tax + $final_taxed_dis;
                                            //   $total_taxable_am= $total_taxable_am + $data->total_bag_collections_discount_price;
                                               ?> 
                                               
                                              
                                           <td><li>Total Bags Collection Discounted Price</li></td>
                                           <td><?php echo $data->total_num_of_picked_bags_discount_price; ?></td>
                                           <td><?php echo $data->same_loc_price; ?></td>
                                           <td><?php echo $vat; ?>%</td>
                                           <td><?php echo $data->final_taxed_dis; ?></td>
                                           <td><?php echo round($data->total_bag_collections_discount_price,4); ?></td>
                                           
                                           </tr>
                                           
                                           
                                           
                                           <tr>
                                               
                                             
                                           <td><li>Total Bags Collection Paid Canceled Full Price </li></td>
                                           <td><?php echo $data->total_paid_canceled_bags_full_price; ?></td>
                                           <td><?php echo $data->price; ?></td>
                                           <td><?php echo $vat; ?>%</td>
                                           <td><?php echo $data->final_taxed_canc; ?></td>
                                           <td><?php echo round($data->total_canceled_full_price,4); ?></td>
                                           
                                           </tr>
                                           
                                            <tr>
                                               
                                             
                                           <td><li>Total Bags Collection Paid Canceled Discounted Price </li></td>
                                           <td><?php echo $data->total_paid_canceled_bags_discount_price; ?></td>
                                           <td><?php echo $data->same_loc_price; ?></td>
                                           <td><?php echo $vat; ?>%</td>
                                           <td><?php echo $data->final_taxed_canc_dis; ?></td>
                                           <td><?php echo round($data->total_canceled_discount_price,4); ?></td>
                                           
                                           </tr>
                                           
                                          
                                          
                                           
                                      
                                       </ul> 
                                      
                                      
                                   <!-- echo "<td><br>".$data->total_num_of_delivered_delivries_full_price."<br>".$data->price."<br>".$vat."<br>".$final_taxed."<br>".$data->total_delivered_full_price_revenue."</td>"; -->
                                      
                                   <!--    <td><br>X<br>Y<br>Z</td>-->
                                      
                                   <!--    <td><br>X<br>Y<br>Z</td>-->
                                      
                                   <!--    <td><br>X<br>Y<br>Z</td>-->
                                      
                                   <!--    <td><br>X<br>Y<br>Z</td> -->
                                  
                                   <!--</tr>-->
      
      <?php } ?>
         <?php } ?>
         
       
       <?php  if($creadit_notes->credit_amount != 0)  { ?>
       <tr><td style="border-bottom: 0px solid lightgrey;"><strong><?php echo $iteration=$iteration+1; ?>.&nbsp;&nbsp;WAIVED NOTES</strong></td></tr>
        <tr>
           
            <!--<td>CREDIT NOTE-->
            <td>
            
              
       <?php if (count($creadit_notes) > 0) {
       
       
              
                                            //   $tax_perc_credit=$vat;
                                            //   $total_credit= $creadit_notes['credit_amount'];
                                            //   $mult_credit=$total_credit*$tax_perc_credit;
                                            //   $final_taxed_credit=$mult_credit/100;
                                                
                                            //     $total_tax= $total_tax - $final_taxed_credit;
                                            //     $total_taxable_am= $total_taxable_am - $creadit_notes['credit_amount'];
                                               
       
       ?>
       <ol>
                              <?php foreach($creadit_notes->note as $key => $data){ ?> 
                              
                              <li><?php echo  $data;  ?></li>
                
                 
                 <?php } ?>
                 
                  </ol>   
         <?php } ?>
            
           </td>  
           
           <td>1</td>
                   <td>-<?php echo $creadit_notes->credit_amount; ?></td>
                   <td><?php echo $vat; ?>%</td>
                   
                   
                   <td>-<?php echo $creadit_notes->final_taxed_credit; ?></td>
                   <td>-<?php echo $creadit_notes->credit_amount; ?></td>
               </tr> 
       <?php } ?>       
            
        
    </table>
    <table class="sub-table">
        <tr class="border-bottom">
            <td>Sub Total</td>
            <td><?php echo $total_taxable_am; ?></td>
            
        </tr>
        
        <tr>
            
            <td>Total taxable Amount</td>
            <td><?php echo $total_taxable_am; ?></td>
        </tr>
        <tr>
            <td>Standard Rate(5%)</td>
            <td><?php echo $total_tax; ?></td>
        </tr>
        <tr>
            <td><strong>Total</strong></td>
            <td><strong>AED<?php echo $final_total; ?></strong></td>
        </tr>
        <tr class="bg-grey">
            <td><strong>Balance due</strong></td>
            <td><strong>AED<?php echo $final_total; ?></strong></td>
        </tr>
        
        
         <tr>
            <td><strong>Total In Words:</strong></td>
            <td><strong style="font-style: italic">UAE Dirham <?php $num=convert_number_to_words($final_total); echo  ucwords($num); ?></strong></td>
        </tr>
    </table>
    <br>
    <h4 class="tax-inner">Tax Summary</h4>
    <table class="first-table second-table">
        <tr>
            <th>Tax Details</th>
            <th>Taxable Amount(AED)</th>
            <th>Tax Amount(AED)</th>
            <th>Total Amount(AED)</th>
        </tr>
        <tr>
            <td>Standard-rate(5%)</td>
            <td><?php echo $total_taxable_am ?></td>
            <td><?php echo $total_tax; ?></td>
            <td><?php echo $final_total; ?></td>
        </tr>
        <tr class="font-weight-bold">
            <td>Total</td>
            
            <td>AED<?php echo $total_taxable_am; ?></td>
            <td>AED<?php echo $total_tax; ?></td>
            <td>AED<?php echo $final_total; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <h4 class="tax-inner">Notes</h4>
    <p>Thank you for your business.</p>
     </div>
                              
                                   
                        </div>         
                               <!-- ************ -->
                                 
                                 </div>
                  </div>    
                 <!--                                     <div id="editor"></div>-->
<!--<button id="cmd">generate PDF</button>-->
 <!--<input type="hidden"  id="cls" style="background: black;color: white;" onclick="close_()"  class="btn default" value="Close" />-->

<div class="row">
    <div class="col-md-1"></div>
     <div class="col-md-3">
 <button id="cls" style="background: black;color: white;" onclick="close_()" type="button" class="btn default">Close</button>
 </div>
 </div>
<!-- <button  style="background: black;color: white;" onclick="demoFromHTML()" type="button" class="btn default">NEW</button>-->
                             
               
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

      
        <!-- end Footer -->

        <!-- Right Sidebar -->
      
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/plugins/jquery-1.10.2.min.js');?>"></script>


        
        <script src="<?php //echo base_url('assets/js/vendor.min.js');?>"></script>

         
        <!--<script src="<?php //echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>-->
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
         
         
        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>
        

        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>
       
        <!-- App js-->
<!--         <script src="<?php echo base_url('assets/plugins/jquery-1.10.2.min.js');?>"></script> -->
         
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        
          


     
        
        
        
      

       
      


    

    


 
<script type="text/javascript">


function close_(){
        window.location.href="<?php echo base_url('invoice') ?>";
    }



// var doc = new jsPDF();
// var specialElementHandlers = {
//     '#editor': function (element, renderer) {
//         return true;
//     }
// };

// $('#cmd').click(function () {
//     doc.fromHTML($('#print_box').html(), 15, 15, {
//         'width': 170,
//             'elementHandlers': specialElementHandlers
//     });
//     doc.save('sample-file.pdf');
// });




//Create PDf from HTML...
// function CreatePDFfromHTML() {


   
   $("#cls").hide();
   
   
    var HTML_Width = $(".html-content").width();
    var HTML_Height = $(".html-content").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".html-content")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        
        
    //     var file_n=<?php   echo $uf=date('d M Y', strtotime($end_date)); ?>;
    //   file_n=<?php   $name  = strtoupper($partner_name); echo $name ?>;
       
       var file_n="LOGX_P INVOICE FOR <?php   echo date('d M Y', strtotime($end_date)); ?> <?php   $name  = strtoupper($partner_name); echo $name ?>.pdf";
        
        
        <?php if($this->uri->segment(2)!='invoice_detail') { ?>
        pdf.save(file_n);
          window.location.href="<?php echo base_url('invoice') ?>";
        <?php } ?>
        
        <?php if($this->uri->segment(4)=='v') { ?>
             $("#cls").show();
         <?php }else if ($this->uri->segment(4)=='d'){ ?>
               pdf.save(file_n);
               window.location.href="<?php echo base_url('invoice') ?>";
         <?php } ?>
         
       
       
       // $(".html-content").hide();
    });
// }



// function demoFromHTML() {
//     var pdf = new jsPDF('p', 'pt', 'letter');
//     // source can be HTML-formatted string, or a reference
//     // to an actual DOM element from which the text will be scraped.
//     source = $('#content')[0];
//     // we support special element handlers. Register them with jQuery-style
//     // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
//     // There is no support for any other type of selectors
//     // (class, of compound) at this time.
//     specialElementHandlers = {
//         // element with id of "bypass" - jQuery style selector
//         '#bypassme': function (element, renderer) {
//             // true = "handled elsewhere, bypass text extraction"
//             return true
//         }
//     };
//     margins = {
//         top: 80,
//         bottom: 60,
//         left: 40,
//         width: 522
//     };
//     // all coords and widths are in jsPDF instance's declared units
//     // 'inches' in this case
//     pdf.fromHTML(
//         source, // HTML string or DOM elem ref.
//         margins.left, // x coord
//         margins.top, { // y coord
//             'width': margins.width, // max width of content on PDF
//             'elementHandlers': specialElementHandlers
//         },
//         function (dispose) {
//             // dispose: object with X, Y of the last line add to the PDF
//             //          this allow the insertion of new lines after html
//             pdf.save('Test.pdf');
//         }, margins
//     );
// }

</script>
    </body>
</html>