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
    #qrcard {
        height: auto !important;
        padding-top: 10px;
        padding-bottom: 10px;
        border-bottom: 1px dotted black;
        border-right: 1px dotted black;
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
</style>

</head>
<body onload="window.print()">
    <div class="container">
        <div class="card">
            <div class="container-fliud">
            
                <div class="wrapper row" id="">
                 <?php
                            if(!empty($result))
                            {
                                $counter=0;
                            foreach($result as $row){ 
                                $counter++;
                               
                                ?>
                    <div class="col-xs-<?php echo $col ?>" id="qrcard">
                        <div class="col-lg-12">
                            <div class="row">
                                    <div class="col-lg-12" id="cardimgdiv" style="text-align: center;">
                                        <img width="150px" height="150px" src="<?php echo base_url($row['qrImage']);?>" />
                                    </div>
                                <div class="col-lg-12" id="namediv">
                                    <h4 class="col_<?php echo $col ?>"><?php echo $row["code"];?></h4>
                                        
                                </div>
                            </div>
                        </div>
                        
                        <!--<div class="col-lg-12" id="Pnumberdiv"><h5 style="text-align: left;"><?php // echo $row["number_on_delivery"];?></h5></div>-->
                        <!--<div class="col-lg-12" id="addressdiv"><h5 style="text-align: left;"><?php // echo substr($row["delivery_address"],0,65);?></h5></div>  -->
                    
                    </div>
                     <?php } } ?>
                </div>
               
            </div>
        </div>
    </div>
             <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- END JAVASCRIPTS -->
</body>
</html>
 
            