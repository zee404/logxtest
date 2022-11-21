<html>
<head>
    <meta charset="utf-8" />
    <title>The Logx</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="Moazam Ali" name="author" />
     <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css"/>
    
    
     <link href="<?php echo base_url('assets/plugins/bootstrap/css/print-style.css'); ?>" rel="stylesheet"  media="all" type="text/css" />
     
    <script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    
   

    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  media="all" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"  media="all" type="text/css">
<style type="text/css">
    #cardimgdiv img {
        margin-left: 0px !important;
    }
    .qrcard {
        height: auto !important;
        padding-top: 5px;
        padding-bottom: 5px;
        /*border-bottom: 1px dotted black;
        border-right: 1px dotted black;*/
        border: 4px solid black;
        height: 100%;
        min-height: 330px;
        /*max-height: 350px;*/
        border-bottom: none;
    }
    
    .b {
  /*white-space: nowrap; */
  width: 250px;
  height:100px;
  overflow: hidden;
  text-overflow: ellipsis; 
  /*border: 1px solid #000000;*/
  display: block;
}

    .qrcard p{
        margin: 5 !important;
        font-family: unset;
    }

    .qrcard:nth-of-type(even)
    {
        border-left: none;
    }
    .col_6{
        text-align: center;font-weight: 700;padding: 2px 0px;font-size: 21px;
    }
    .col_4{
        text-align: center;font-weight: 700;padding: 2px 0px;font-size: 18px;
    }
    .col_3{
        text-align: center;font-weight: 600;padding: 2px 0px;font-size: 14px;margin-left: -15px;
    }
    
    
   div#pagewidth {
			margin: 0px auto 0px auto ;
			overflow: hidden ;
			width: 500px ;
			}

		div#sitecontent {}

	</style>

	<!-- Print styles. -->
	<style type="text/css" media="print">

		div#pagewidth {
			display: inline ;
			}
</style>

</head>
<body onload="show_print()">
    
		    
    <!--<div class="container">-->
        <!-- BEGIN: Page Width. -->
	<div id="pagewidth">

		<!-- BEGIN: Site Content. -->
		<div id="sitecontent">
        <!--<div class="card">-->
            <!--<div class="container-fliud">-->
            
            
            
		    
                <div class="wrapper row">
                    <?php if(!empty($orders)){
                    foreach($orders AS $order){ ?>
                    <div class="qrcard col-xs-<?php echo $col ?>">
                        <p>Order Id: <strong><?php echo $order['order_id'] ?></strong></p>
                        <p>Date to be Delivered: <strong><?php echo $order['delivery_date'] ?></strong></p>
                        <p>Customer Name: <strong><?php echo $order['name_on_delivery'] ?></strong></p>
                        <p>Contact: <strong><?php echo $order['number_on_delivery'] ?></strong></p>
                        <p>Time Slot: <strong><?php echo $order['delivery_time'] ?></strong></p>
                        <p class="b">Address: <strong><?php echo $order['delivery_address'] ?></strong></p>
                        <?php if($check == 1){  ?>
                            
                            <p>Partner Price: <strong><?php echo $order['partner_price'] ?></strong></p>
                           
                        <?php } ?>
                    </div>
                    
                <?php } } ?>


                <?php if(!empty($bags)){
                    foreach($bags AS $bag){ ?>
                    <div class="qrcard col-xs-<?php echo $col ?>">
                        <p>Bag Id: <strong><?php echo $bag['bag_id'] ?></strong></p>
                        <p>Date to be Picked: <strong><?php echo $bag['pick_date'] ?></strong></p>
                        <p>Customer Name: <strong><?php echo $bag['full_name'] ?></strong></p>
                        <p>Contact: <strong><?php echo $bag['phone'] ?></strong></p>
                        <p>Time Slot: <strong><?php echo $bag['d_type'] ?></strong></p>
                        <p>Address: <strong><?php echo $bag['address'] ?></strong></p>
                    </div>
                <?php } } ?>
                
                
                <?php if(!empty($cashs)){
                    foreach($cashs AS $cash){ ?>
                    <div class="qrcard col-xs-<?php echo $col ?>">
                        <p>Cash Id: <strong><?php echo $cash['cash_id'] ?></strong></p>
                        <p>Date to be Picked: <strong><?php echo $cash['pick_date'] ?></strong></p>
                        <p>Customer Name: <strong><?php echo $cash['full_name'] ?></strong></p>
                        <p>Contact: <strong><?php echo $cash['phone'] ?></strong></p>
                        <p>Time Slot: <strong><?php echo $cash['d_type'] ?></strong></p>
                        <p>Address: <strong><?php echo $cash['address'] ?></strong></p>
                    </div>
                <?php } } ?>
                </div>
                
                
                              
               
            
        
         </div>
                               </div>
    
             <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- END JAVASCRIPTS -->
    
   
</body>

<script type="text/javascript">
    function show_print()
    {
        var divs = document.getElementsByClassName("qrcard");
        var length = divs.length;
        divs[length-1].style.borderBottom = "4px solid black";
        divs[length-2].style.borderBottom = "4px solid black";
        window.print()
    }
</script>

</html>
 
            