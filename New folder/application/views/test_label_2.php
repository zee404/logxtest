<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<style>
    .wrapper {
        margin: 50px auto;
        width: 280px;
        height: 370px;
        background: white;
        border-radius: 10px;
        -webkit-box-shadow: 0px 0px 8px rgba(0,0,0,0.3);
        -moz-box-shadow:    0px 0px 8px rgba(0,0,0,0.3);
        box-shadow:         0px 0px 8px rgba(0,0,0,0.3);
        position: relative;
        z-index: 90;
         -webkit-print-color-adjust:exact;
    }

    .ribbon-wrapper-green {
        width: 85px;
        height: 88px;
        overflow: hidden;
        position: absolute;
        top: -3px;
        left: -3px;
         -webkit-print-color-adjust:exact;
    }
    .ribbon-green {
        font: bold 15px Sans-Serif;
        color: #fff;
        text-align: center;
        text-shadow: rgba(255,255,255,0.5) 0px 1px 0px;
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        position: relative;
        padding: 3px 0;
        left: -29px;
        top: 15px;
        width: 120px;
        background-color: #2ab1c9;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#000000), to(#2ab1c9));
        background-image: -webkit-linear-gradient(top, #000000, #2ab1c9);
        background-image: -moz-linear-gradient(top, #000000, #2ab1c9);
        background-image: -ms-linear-gradient(top, #000000, #2ab1c9);
        background-image: -o-linear-gradient(top, #000000, #2ab1c9);
        color: #fff;
        -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
        box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
         -webkit-print-color-adjust:exact;
    }
    .ribbon-green:after,
    .ribbon-green:after{
        content: "";
        border-top: 3px solid #6e8900;
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        position:absolute;
        bottom: -3px;
         -webkit-print-color-adjust:exact;
    }
    .ribbon-green:before{
        right: 0;
         -webkit-print-color-adjust:exact;
    }
    .ribbon-green:after{
        left: 0;
         -webkit-print-color-adjust:exact;
    }
    .break_check{
        break-inside: avoid;
    }
    
    
/*    @media print {*/
/*  div {*/
/*    break-inside: avoid;*/
/*  }*/
/*}*/


/*@media print {*/
/*  pre, blockquote,div {page-break-inside: avoid;}*/
/*}*/


img{
     break-inside: avoid;
}
@media print {
  /*section div div div .break_check {page-break-before: always;}*/
  /*div {page-break-inside: avoid;}*/
  /*footer{page-break-after: always;}*/
  
  /*.pagebreak { page-break-after: always; } */
  
}
@media print {
   

    .page-braek { page-break-inside: avoid; }
}
</style>
<body>
<section>
    <div class="container">
       
            
             <?php if(!empty($orders)){ $count=1;
                    foreach($orders AS $key => $order){ ?>
                
            <?php if($count % 2 !=0 OR $count == 1){?>
                      <div class="row pt-5 page-braek"  style="display:flex;">
                          
                <?php $x=1; } ?>
     
            <div class="col-md-5 "  style=" border: 3px solid;border-radius: 28px; margin-right: 20px; margin-bottom: 10px; /*min-height:480px;*/ ">
               
            
                <img src="<?php echo base_url('assets/images/logos-logo-full.png')?>"  style="/*height: 30px; margin-top: 40px; margin-bottom: 25px; margin-left: 7.5rem; */ height: 27px;margin-top: 27px; margin-bottom: 10px;  margin-left: 7.5rem;" alt="">
                <div class="ribbon-wrapper-green"  style="float: left; padding-top: 8px;">
                    <div class="ribbon-green"><?php echo $order['order_id'] ?></div>
                </div>
                <div style="padding: 10px">
                    
                    <!--First Row-->
                    <div class="row" style="border-top: 3px solid black;">
                        
                        <div class="col-md-5" style=" /* border-right: 3px solid black; */ padding-top: 10px; padding-bottom: 10px; /*height: 50px; */"> 
                          <span  style="/* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500; ">From :</span> 
                            <b><?php echo $order['vendor']; ?></b>
                        </div>
                        
                         <div class="col-md-2" style="  padding-top: 10px; padding-bottom: 10px;">
                             <img src="<?php echo base_url('assets/images/xyz1.png'); ?>" style="width: 30px;">
                         </div>
                        
                        <div class="col-md-5" style=" /*height: 50px; */ padding-top: 10px; padding-bottom: 10px; overflow: hidden;"> 
                          <span style="/* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500; ">To:</span> 
                          <b><?php echo $order['name_on_delivery'] ?></b>
                        </div>
                        
                    </div>
                    
                    
                    <!--Second Row-->
                    
                    
                    <div class="row" style="border-top: 3px solid black; padding-top: 10px; padding-bottom: 10px;">
                       
                        <div class="col-md-12" style=" /* height: 50px; */ text-align: center;">
                            <span style="/* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500;  ">Area:</span> 
                             <b><?php $area_arr=explode(",",$order['delivery_address']);
                                              $indx= count($area_arr)-1;
                                              $Aname=$area_arr[$indx];
                                              $Aname=ltrim($Aname," ");
                                              $Aname=rtrim($Aname," ");
                                              echo $Aname;?>
                            </b>
                        </div>
                    </div>
                    
                    <!--Third Row-->
                    
                    <div class="row" style="border-top: 3px solid black; padding-top: 7px; padding-bottom: 7px">
                        
                         <div class="col-md-6" style="border-right: 3px solid black;">
                             
                          <b><?php $titl='Driver';if($order['driver']==''){ if($order['suggested_driver_name']!='New Delivery' AND $order['suggested_driver_name']!='NA'){echo $order['suggested_driver_name'];$titl='Expected Driver'; }else{echo 'N/A';} }else{ echo $order['driver']; } ?></b>
                             <div style=" /* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500; "><?php echo $titl; ?></div>
                     
                         
                         
                         </div>
                        
                         <div class="col-md-6" >
                           <b> <?php echo $order['delivery_time'] ?></b>
                           <div style=" /* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500; ">Time Slot</div>
                        </div>
                   </div>
                   
                   
                   <!--Fourth Row-->
                    
                   
                    <div class="row" style="border-top:2px solid black; padding-top: 7px">
                         <div class="col-md-4" style="border-right: 3px solid black;">
                             <b> <?php $date=date_create($order['delivery_date']); echo date_format($date,"d/M/Y"); ?></b>
                             <div style=" /* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500; ">Delivery Date</div>
                         </div>
                   
                        <div class="col-md-4" style="border-right: 3px solid black;"> 
                          <b><?php if($order['driver']==''){echo 'Not Assign'; }else{ echo 'Assigned'; } ?></b>
                          <div style=" /* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500; ">Status</div>
                        </div>
                        
                        <div class="col-md-4" style="overflow: hidden;">
                             <b><?php echo $order['number_on_delivery'] ?></b>
                             <div style=" /* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500; ">Contact</div>
                        </div>
                    </div>

                <!--</div>-->


                <!--Fifth Row-->
                <div class="row" style="padding-left: 10px;padding-right: 10px; padding-bottom: 10px;">
                    <div class="col-md-9" style="border-top: 3px solid; border-right: 3px solid;" >
                        <div class="" style="font-size: 13px;/*height:100px;*/overflow: hidden;text-overflow: ellipsis;/*border: 1px solid #000000;*/ display: block;">
                           <span style=" /* color: #686868;font-size: 10px;font-weight: 100;*/  color: #515151;font-size: 10px;font-weight: 500; ">Address:</span>
                           <b><?php echo $order['delivery_address'] ?></b>
                        </div>
                    </div>
                    
                    <div class="col-md-3" style="border-top: 3px solid;">
                      <div> 
                        <?php if($order['qrImage']!=""){ ?>
                        <img src="<?php echo base_url().$order['qrImage']; ?>" style="height: 80px; /*float: right;*/  padding-top: 2px;padding-bottom: 2px;" alt="">
                        <?php }else{ ?>
                          <b>N/A</b>
                        <?php } ?>
                       </div>
                    </div>
                </div>
                
                
            </div> <!-- Main div end-->
           
            <?php if($x==2){ echo '</div>';} if($count % 2 !=0 OR $count == 1){ $x=$x+1; }
                 
               $count=$count+1;
            ?>
                
               </div>
         
              <?php } } ?>
               
    </div>
</section>
</body>



<script>
    
    window.print();
</script>
</html>