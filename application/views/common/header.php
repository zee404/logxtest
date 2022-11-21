<?php //print_r($this->session->userdata()) ?>
<header id="topnav"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
    
    #topnav{
/*background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);*/
    background:#36404a!important;
    color:#98a6ad!important;
    position: fixed;
    left: 0;
    right: 0;
    z-index: 1001;
    padding: 0 12px;
    /*-webkit-box-shadow: 0 2px 6px -2px rgba(0,0,0,.16), 0 2px 6px 0 rgba(0,0,0,.12);*/
    /*box-shadow: 0 2px 6px -2px rgba(0,0,0,.16), 0 2px 6px 0 rgba(0,0,0,.12);*/
}
#topnav .navigation-menu>li .submenu.open{
    background:#36404a!important;
}
.navigation-menu>li{
     color:#98a6ad;
}
/*.navigation-menu>li .submenu {*/
/*    position: absolute;*/
/*    top: 100%;*/
/*    left: 0;*/
/*    z-index: 1000;*/
/*    padding: 10px 0;*/
/*    list-style: none;*/
/*    min-width: 200px;*/
/*    text-align: left;*/
/*    visibility: hidden;*/
/*    opacity: 0;*/
/*    margin-top: 10px;*/
/*    border-radius: 4px;*/
/*    -webkit-transition: all .2s ease;*/
/*    transition: all .2s ease;*/
/*    background-color: #36404a;*/
/*    -webkit-box-shadow: rgba(50,58,70,.15) 0 0 40px 0;*/
/*    box-shadow: rgba(50,58,70,.15) 0 0 40px 0;*/
/*}*/

.navigation-menu>li .submenu:before {
    left: 16px;
    top: -10px;
    content: "";
    display: block;
    position: absolute;
    background-color: transparent;
    border-left: 12px solid transparent;
    border-right: 12px solid transparent;
    border-bottom: 12px solid #364049;
    z-index: 9999;
}

.navigation-menu>li .submenu li .submenu:before {
    left: -20px;
    top: 10px;
    border-top: 12px solid transparent;
    border-bottom: 12px solid transparent;
    border-right: 12px solid #36404a;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #36404a;
    opacity: 1;
}
.border-white {
    border-color: #45525f!important;
}
#topnav .has-submenu.active>a{
    color:#98a6ad;
    background:#36404a!important;
}
#topnav .has-submenu.active>a:hover{
    color:white;
}
#topnav .has-submenu.active .submenu li.active>a {
    /*color: #2AB1C9;*/
    color:white;
    /*background:#3c4650;*/
}
#topnav .has-submenu.active .submenu li>a {
    /*color: #2AB1C9;*/
    color:#98a6ad;
    background:#36404a;
}

#topnav .has-submenu.active .submenu li>a:hover {
    /*color: #2AB1C9;*/
    color:white;
    
}

#custom_loader
{
    position: fixed;
    top: 45%;
    left: 45%;
    z-index: 99999999999;
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin: 10px 0;
    font-weight: 500;
    font-family: Poppins,sans-serif!important;
    color: #1a1d20;
}
.text-dark {
    color: #727476!important;
}

.legend tr {
    height: 30px;
    /* font-family: "Cerebri Sans,sans-serif"; */
    font-family: Poppins,sans-serif;
}

body{
    background:#3c4650;
    /*color:white!important;*/
     font-family: Poppins,sans-serif!important;
} 
.text-muted {
    /*color: #3c4650!important;*/
    color: #98a6ad!important
}
</style>


 <!--msg tune audio -->
<audio id="msg_tune">
  <source src="<?php //echo base_url('assets/chat/audio/open-up.mp3') ?>" type="audio/mpeg">
</audio>

<?php $chk_auth=$this->session->userdata('auth_check');
  if($chk_auth==''){
    //   echo 'empty';
         session_destroy();
        header("Location: https://thelogx.com/auth/index", true, 301);
            exit();
  }else if($chk_auth=='abcd123456'){
    //     print_r($this->session->userdata());
    //   echo 'allowed';
  }else{
    //   echo 'not allowed';
      session_destroy();
      header("Location: https://thelogx.com/auth/index", true, 301);
            exit();
        // $this->load->view('user/login', $data=null);
  }
?>
  


            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <!-- msg notification -->
                        <!--<li class="dropdown notification-list">-->
                        <!--    <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">-->
                        <!--        <i class="fe-message-square noti-icon"></i>-->
                        <!--        <span class="badge badge-danger rounded-circle noti-icon-badge head_noti_counter_chat" style="display: none;">1</span>-->
                        <!--    </a>-->
                            <!-- UN <div class="dropdown-menu dropdown-menu-right dropdown-lg" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(51px, 70px, 0px);" x-placement="bottom-end">-->
                        <!--    <div class="dropdown-menu dropdown-menu-right dropdown-lg" style="position: absolute; " x-placement="bottom-end">-->
    
                                <!-- item-->
                        <!--        <div class="dropdown-item noti-title">-->
                        <!--            <h5 class="m-0">-->
                        <!--                <span class="float-right">-->
                        <!--                    <a href="javascript:void(0)" class="text-dark">-->
                        <!--                        <small>Clear All</small>-->
                        <!--                    </a>-->
                        <!--                </span>Chat Notification-->
                        <!--            </h5>-->
                        <!--        </div>-->
    
                        <!--        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div class="slimscroll noti-scroll msg_noti_area" style="width: auto; height: 510.994px;">-->
    
                                    <!-- item-->
                                    
                        <!--        </div><div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 121.33px;"></div><div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>-->
    
                                
    
                        <!--    </div>-->
                        <!--</li>-->
                        <!-- end msg notification -->

                        <!-- start notification -->
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge head_noti_counter_gen" style="display: none;">2</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg" style="position: absolute; will-change: transform; top: 0px; left: 10px; transform: translate3d(51px, 70px, 0px);" x-placement="bottom-end">
    
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="javascript:void(0)" class="text-dark clearNoti">
                                                <small style="margin-left:5px;">Clear All</small>
                                            </a>
                                        </span>General Notification
                                    </h5>
                                </div>
    
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div class="slimscroll noti-scroll notis_area" style="width: auto; min-height: 410.994px; overflow-y: auto; ">
    
                                    <!-- item-->
                                    
                                </div><div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 121.33px;"></div><div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    
                                <!-- All-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fi-arrow-right"></i>
                                </a> -->
    
                            </div>
                        </li>
                        <!-- end notification -->


                        <li class="dropdown notification-list">
                           
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            
                        </li>
    
                        
                        <li class="dropdown notification-list">
                            <p class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <!-- <img src="<?php echo base_url('assets/images/user.png');?>" alt="user-image" class="rounded-circle"> -->
                                <i class="fe-user noti-icon"></i>
                                <span class="pro-user-name ml-1">
                                    Hi  <?php echo $this->session->userdata('name'); ?><i class=""></i> 

                                </span>
                            </p>
                                </li>
                            <style type="text/css">
                                .logoutwidth{
                                        /*margin-top: 17px;border-radius: 40px;color: #fff !important;background-color: #197990 !important;border-color: white;*/
                                    margin-top: 17px;border-radius: 40px;color: #fff !important;background-color: #3c4650 !important;border-color: white;
                                   
                                    
                                }
                             </style>
                              <a href=" <?php echo base_url('auth/logout');?>"class="btn blue logoutwidth">Logout</a>
                               &nbsp;
                                
                              
                           
                    
                      
               
    
                       <!--  <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li> -->
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="<?php echo base_url('auth/userdashboard') ?>" class="logo text-center">
                            <span class="logo-lg">
                                <img src="<?php echo base_url('assets/images/logos-logo-full.png');?>"  alt="" height="18">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
                                <img src="<?php echo base_url('assets/images/Logo_with_new_icon.png');?>" alt="" height="24">
                            </span>
                        </a>
                    </div>
    
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            
                      
                    </ul>
                </div> <!-- end container-fluid-->
            </div>
            <!-- end Topbar -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <?php 
                            if ($this->session->userdata()) {
                                $user_data = $this->session->userdata();
                                
                                $modules = explode(',',strtolower($user_data['modules']));
                            //   echo '<pre>';
                            //   print_r($modules);
                            }
                            ?>

                            <?php if (in_array('dashboards',$modules) OR $user_data['role'] == 'admin') { ?>
                                <li class="has-submenu active">
                                    <a href="<?php echo base_url('auth/userdashboard');?>">
                                        <i class="fe-airplay"></i>Dashboards <div class="arrow-down"></div></a>
                               <!--</li>-->
                                <!--Remove when enable all dashboard-->
                                <?php if ($user_data['role'] == 'admin') { ?>
                                <ul class="submenu">
                                    <li>
                                    <a href="<?php echo base_url('dashboard_all_data');?>">
                                        <i class="fe-airplay"></i>&nbsp; Dashboard All Data </a>
                                </li>
                                </ul>
                                
                                </li>
                           <?php } ?>
                            <?php } ?>
                            
                            <?php if (in_array('partners',$modules) OR $user_data['role'] == 'admin' or $user_data['role'] == 'vendor') { ?>
                            <li class="has-submenu active">
                                  <a href="#">
                                    <i class="fe-users"></i>Partners <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                   <?php if (strtolower($this->session->userdata('role')) != 'vendor') { ?>
                                    <?php //if (strtolower($this->session->userdata('role')) == 'admin') {
                                       ?>
                                       <li>
                                        <a href="<?php echo base_url('Partner'); ?>">Partners List</a>
                                    </li>
                                       <?php
                                   } ?>
                                    <?php //if (strtolower($this->session->userdata('role')) == 'admin' OR $this->session->userdata("u_id") ==40062 OR (strtolower($this->session->userdata('role')) != 'vendor')) { ?>
                                    
                                     <?php //if ((strtolower($this->session->userdata('role')) == 'vendor') OR (strtolower($this->session->userdata('role')) == 'admin')) {  ?>
                                  
                                     <li>
                                        <a href="<?php echo base_url('upload_customer'); ?>">Customers List</a>
                                    </li>
                                     <?php //} ?>
                                     <?php //} ?>
                                    <!-- <li class="has-submenu">
                                        <a href="#">Customers <div class="arrow-down"></div></a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="<?php echo base_url('upload_customer'); ?>">Upload Customers</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('uploaded_customer'); ?>">Uploaded Customers</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('invited_customer'); ?>">Invited Customers</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('active_customer'); ?>">Active Customers</a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    -->
                                </ul>
                            </li>
                        <?php } ?>
                         <?php if (in_array('team',$modules) OR $user_data['role'] == 'admin') { ?>
                             <li class="has-submenu active">
                                <a href="#"><i class="fe-git-pull-request"></i>Team  <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                   
                                   <!--  <li>
                                        <a href="<?php echo base_url('keepers'); ?>">Store Keepers List</a>
                                    </li> -->
                                     <li>
                                        <a href="<?php echo base_url('keepers'); ?>">Indoor Team</a>
                                    </li>
                                    
                                    
                                    
                                    <li class="has-submenu">
                                        <a href="#">Outdoor Team <div class="arrow-down"></div></a>
                                        <ul class="submenu">
                                             <li>
                                        <a href="<?php echo base_url('upload_driver'); ?>">Driver List</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('track_driver'); ?>">Track Driver</a>
                                        </li>
                                        
                                        
                                        </ul>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo base_url('Storekeepers'); ?>">Store Keepers</a>
                                    </li>
                                    
                                      
                                           
                                          
                                           <!--  <li>
                                                <a href="#">Show Employee</a>
                                            </li> -->
                                   <!--  <li class="has-submenu">
                                        <a href="#">Deliveries <div class="arrow-down"></div></a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="<?php echo base_url('upload_deliveries'); ?>">Upload Deliveries</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('uploaded_Deliveries'); ?>">Unassigned Deliveries</a>
                                            </li>
                                            <li>
                                                <a href="#">Assigned Deliveries</a>
                                            </li>
                                            <li>
                                                <a href="#">Completed Deliveries</a>
                                            </li>
                                            
                                        </ul>
                                    </li> -->
                                   
                                </ul>
                            </li>
                            <?php }?>

                          <!--   <li class="has-submenu">
                                <a href="#"> <i class="fe-cpu"></i>Drivers<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                   <li>
                                        <a href="<?php echo base_url('driver'); ?>">Upload Drivers</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('uploaded'); ?>">Uploaded Drivers</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('invited_driver'); ?>  ">Invited Drivers</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('active_driver'); ?>">Active Drivers</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url('track_driver'); ?>">Track Drivers</a>
                                    </li>
                                </ul>
                            </li> -->

                           

                        
                             <?php if (in_array('oprations',$modules) OR $user_data['role'] == 'admin') { ?>
                            <li class="has-submenu active">
                                <a href="#"> <i class="fe-sunrise"></i>Operations <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    
                                    <li>
                                        <a href="<?php echo base_url('bagsTracking'); ?>">Bags Tracking</a>
                                    </li>
                                    
                                    <li class="has-submenu">
                                        <a href="#">Bags Collection <div class="arrow-down"></div></a>
                                        <ul class="submenu">
                                             <li>
                                        <a href="<?php echo base_url('uploads'); ?>">Upload Bags Collection</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('unassigned'); ?>">Unassigned Bags Collection</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('assigned'); ?>">Assigned Bags Collection</a>
                                        </li>
                                         <li>
                                            <a href="<?php echo base_url('completed'); ?>">Completed Bags Collection</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('cancelled'); ?>">Cancelled Bags Collection</a>
                                        </li>      

                                        </ul>
                                    </li>
                                    <!--Cash Collection Start From here-->
                                     
                                    <li class="has-submenu">
                                        <a href="#" >Cash Collection<div class="arrow-down"></div></a>
                                        <ul class="submenu">
                                             <li>
                                        <a href="<?php echo base_url('upload_cash'); ?>">Upload Cash Collection</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('unassigned_cash'); ?>">Unassigned Cash Collection</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('assigned_cash'); ?>">Assigned Cash Collection</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('completed_cash'); ?>">Completed Cash Collection</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('cancelled_cash'); ?>">Cancelled Cash Collection</a>
                                        </li>    

                                        </ul>
                                    </li>
                                    
                                  
                                    <!--Cash Collection Ends Here-->
                                     <li class="has-submenu active">
                                                <a href="#">Deliveries <div class="arrow-down"></div></a>
                                                <ul class="submenu">
                                                     <li>
                                                        <a href="<?php echo base_url('upload_Deliveries'); ?>">Upload Deliveries</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('uploaded_Deliveries'); ?>">Unassigned Deliveries</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('order'); ?>">Assigned Deliveries</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('orderCompleted'); ?>">Completed Deliveries</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('order_cancelled'); ?>">Cancelled Deliveries</a>
                                                    </li>
                                                    <?php 
                                                    if(strtolower($this->session->userdata('role')) != 'vendor'){ 
                                                    // if(strtolower($this->session->userdata('role')) == 'admin'){ 
                                                    ?>
                                                     <li>
                                                        <a href="<?php echo base_url('order/delayed_orders'); ?>">Delayed Deliveries</a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            
                                            <?php  //if(strtolower($this->session->userdata('role')) == 'admin'){ ?>
                                            <!--Bag pickups-->
                                            
                                             <?php if(strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                              <li class="has-submenu active">
                                                <a href="#">Bag Pickup <div class="arrow-down"></div></a>
                                                <ul class="submenu">
                                                      <li>
                                                        <a href="<?php echo base_url('order/unassignedBagPicksPartnerwise'); ?>">Unassigned Pickup Bags (<small>Partner Wise)</small></a>
                                                    </li>
                                                    
                                                     <li>
                                                        <a href="<?php echo base_url('order/unassigned_bagpicks'); ?>">Unassigned Pickup Bags (<small>Delivery Wise)</small></a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a href="<?php echo base_url('order/assigned_bagpicks'); ?>">Assigned Pickup Bags</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('order/collected_bagpicks'); ?>">Collected Pickup Bags</a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a href="<?php echo base_url('order/req_cancelled_bagpicks'); ?>">Requested Cancel </a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a href="<?php echo base_url('order/cancelled_bagpicks'); ?>">Cancelled Pickup Bags </a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a href="<?php echo base_url('order/pickup_bags_report'); ?>">Report Pickup Bags</a>
                                                    </li>
                                                    
                                                    
                                                    
                                                </ul>
                                                </li>
                                             
                                             
                                             <?php //} ?>
                                            
                                            <!--end bag pickups-->
                                            <?php } ?>
                                            
                                            
                                            <?php // if(strtolower($this->session->userdata('role')) == 'admin'){ ?>
                                            
                                             <?php if (strtolower($this->session->userdata('role')) != 'vendor') { ?> 
                                            <li>
                                                <a href="<?php echo base_url('extraBags'); ?>">Extra Bags</a>
                                            </li>
                                        <?php } ?>
                                            <li>
                                                <a href="<?php echo base_url('listingQr'); ?>">QR Codes</a>
                                            </li>
                                         
                                          <?php if (strtolower($this->session->userdata('role')) != 'vendor') { ?>      
                                            <li class="has-submenu">
                                        <a href="#">Fleet <div class="arrow-down"></div></a>
                                        <ul class="submenu">
                                             <li>
                                        <a href="<?php echo base_url('vehicle/list'); ?>">Vehicle List</a>
                                        </li>
                                        <li>
                                        <a href="<?php echo base_url('vehicle/vehicle_drivers'); ?>">Vehicle Drivers</a>
                                        </li>

                                        </ul>
                                    </li>
                                    
                                        <?php } ?>
                                    
                                </ul>
                            </li>
                        <?php }?>
                         <?php if (in_array('reports',$modules) OR $user_data['role'] == 'admin') { ?>
                                <li class="has-submenu active">
                                <a href="#"> <i class="fe-trending-up"></i>Reports<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <!-- <li>
                                        <ul> -->
                                            <?php if(strtolower($this->session->userdata('role')) == 'admin' OR in_array('reports',$modules) AND strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                            <li>
                                                <a href="<?php echo base_url('vendor_deliveries'); ?>">Partner Wise Deliveries</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('positive_feedback'); ?>">Customer's Positive Feedback</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('negative_feedback'); ?>">Customer's Negative Feedback</a>
                                            </li>
                                            
                                            <li>
                                                <a href="<?php echo base_url('negative_feedback_details'); ?>">Customer's -ve Feedback Detail</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('vendor_suggestion'); ?>">Partner's Suggestions</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('driver_deliveries'); ?>">Driver Wise Deliveries</a>
                                            </li>
                                            <li>
                                                <!-- <a href="<?php //echo base_url('deliveries'); ?>">All Delivery Report</a> -->
                                                <a href="<?php echo base_url('orderCompleted'); ?>">All Delivery Report</a>
                                                
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('status_deliveries'); ?>">Status Wise Deliveries</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('food_readings'); ?>">Food Reading History</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('login_history'); ?>">User Login History</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('user_activity'); ?>">User Activity</a>
                                            </li>

                                            <li>
                                                <a href="<?php echo base_url('bag_collection_report'); ?>">Bags Collection</a>
                                            </li>
                                        <?php } 
                                        if(strtolower($this->session->userdata('role')) == 'vendor' OR in_array('reports',$modules)){ ?>
                                            <li>
                                                <a href="<?php echo base_url('orderCompleted'); ?>">All Delivery Report</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('bag_collection_report'); ?>">Bags Collection</a>
                                            </li>
                                        <?php } ?>
                                        <!-- </ul>
                                    </li> -->
                                    
                                    
                                      <?php if ($user_data['role'] == 'admin') { ?>
                                            
                                            <li>
                                                <a href="<?php echo base_url('Order/forcefully_stroekeeper_report'); ?>">Manual Storekeeper Report</a>
                                            </li>
                                        
                                        <?php } ?>
                                   
                                </ul>
                            </li>
                        <?php }?>
                         <?php if (in_array('setting',$modules) OR $user_data['role'] == 'admin' AND strtolower($this->session->userdata('role')) != 'vendor') { ?>
                            <?php if(strtolower($this->session->userdata('role')) != 'vendor' AND in_array('setting',$modules) OR strtolower($this->session->userdata('role')) == 'admin' ){ ?>
                             <li class="has-submenu active">
                                <a href="#"> <i class="fe-settings"></i>Settings <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo base_url('settings/profile'); ?>">Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('settings/CompanyProfileQr '); ?>">Company Profile QR</a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="<?php echo base_url('type'); ?>">Deliveries Type</a>-->
                                    <!--</li>-->
                                    <!-- <li>-->
                                    <!--    <a href="<?php echo base_url('Newtype'); ?>">NEW Deliveries Type</a>-->
                                    <!--</li>-->
                                     <li>
                                        <a href="<?php echo base_url('timeslots'); ?>">Basic Time Slot</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url('Order/role_type'); ?>">Role Type</a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="<?php echo base_url('Order/areas'); ?>">OLDAreas</a>-->
                                    <!--</li>-->
                                    <li>
                                        <a href="<?php echo base_url('Order/Newareas'); ?>">Areas</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url('settings/emirates'); ?>">Emirates</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('settings/service_type'); ?>">Service Type</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('settings/payments'); ?>">Payment Type</a>
                                    </li>
                                   <!--  <li>
                                        <a id="add_staff" href="<?php echo base_url('staff'); ?>">Employee List</a>
                                    </li>
                                     -->
                                    
                                   
                                    
                                </ul>
                            </li>
                            <?php  } else{ ?>
                                <li class="has-submenu active">
                                <a href="#"> <i class="fe-settings"></i>Settings <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo base_url('settings/profile'); ?>">Profile</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <?php } }?>
                            <!--  <li class="has-submenu">
                                <a href="#">
                                    <i class="fe-layers"></i>Employees <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                       
                                                
                                            <li>
                                                <a href="#">Add Employee</a>
                                            </li>
                                            <li>
                                                <a href="#">Show Employee</a>
                                            </li>
                                            
                                       
                                    </li>

                                </ul>
                            </li> -->

                            <!--<?php // if (in_array('chat',$modules) OR strtolower($this->session->userdata('role')) == 'vendor') { ?>-->
                            <!--    <li class="has-submenu active">-->
                            <!--        <a href="javascript:void(0);" onclick="$('.chatbox-holder').toggle()">-->
                            <!--            <i class="fe-message-square"></i>Chat </a>-->
                            <!--    </li>-->
                            <!--<?php //}  ?>-->
                            
                            <!--COMMENT LIVE CHAT-->
                            <!--<?php  //if (strtolower($this->session->userdata('role')) == 'admin' OR in_array('livechat',$modules)) { ?>-->
                            <!--    <li class="has-submenu active">-->
                            <!--    <a href="#"><i class="fe-message-square"></i>Live Support <div class="arrow-down"></div></a>-->
                            <!--    <ul class="submenu">-->
                            <!--        <li>-->
                            <!--            <a href="<?php //echo base_url('chat'); ?>">Chat</a>-->
                            <!--        </li>-->
                            <!--         <li>-->
                            <!--            <a href="<?php //echo base_url('chat/history'); ?>">Chat History</a>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!-- <?php// }  ?> -->
                           
                           
                            <?php  if (strtolower($this->session->userdata('role')) == 'admin' OR in_array('accounts',$modules)) { ?>
                                <li class="has-submenu active">
                                <a href="#"><i class="fe-message-square"></i>Accounts <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                         <a href="#">Operations <div class="arrow-down"></div></a>
                                         
                                         <ul class="submenu">
                                             <li>
                                               <a href="<?php echo base_url('Delivery_Status'); ?>">Delivery</a>
                                             </li>
                                             <li>
                                              <a href="<?php echo base_url('Bag_Status'); ?>">Bag</a>
                                             </li>
                                             <li>
                                              <a href="<?php echo base_url('Cash_Status'); ?>">Cash</a>
                                             </li>
                                             
                                             <li>
                                               <a href="<?php echo base_url('expense_list'); ?>">Expense</a>
                                             </li>
                                             <li>
                                               <a href="<?php echo base_url('fuel_list'); ?>">Fuel</a>
                                             </li>
                                             
                                             <li>
                                               <a href="<?php echo base_url('Driver/driver_account'); ?>">Driver Account</a>
                                            </li>
                                            
                                             <li>
                                               <a href="<?php echo base_url('invoice'); ?>">Partner Invoice</a>
                                            </li>
                                        </ul>
                                             
                                    </li>
                                    
                                    
                                    
                                    <li class="has-submenu">
                                         <a href="#">Cancelled <div class="arrow-down"></div></a>
                                         
                                         <ul class="submenu">
                                             <li>
                                               <a href="<?php echo base_url('cancelled_Delivery_'); ?>">Delivery</a>
                                             </li>
                                             <li>
                                               <a href="<?php echo base_url('cancelled_Bag_'); ?>">Bag</a>
                                             </li>
                                             <li>
                                              <a href="<?php echo base_url('cancelled_Cash_'); ?>">Cash</a>
                                             </li>
                                        </ul>
                                             
                                    </li>
                                    <!--OR in_array('accounts',$modules)-->
                                  <?php  if (strtolower($this->session->userdata('role')) == 'admin' ) { ?>
                              
                                      <li class="has-submenu">
                                         <a href="#">Partners <div class="arrow-down"></div></a>
                                         
                                         <ul class="submenu">
                                              <li>
                                              <a href="<?php echo base_url('balance'); ?>">Partners Balance</a>
                                             </li>
                                             <!--<li>-->
                                             <!--  <a href="<?php echo base_url('cancelled_Bag_'); ?>">Bag</a>-->
                                             <!--</li>-->
                                             <!--<li>-->
                                             <!-- <a href="<?php echo base_url('cancelled_Cash_'); ?>">Cash</a>-->
                                             <!--</li>-->
                                        </ul>
                                             
                                    </li>
                                    
                                    <?php } ?>       
                                   
                                    
                                </ul>
                            </li>
                            <?php }  ?>
                            
                            
                            
                            
                            <?php if (in_array('vendors_reports',$modules) OR $user_data['role'] == 'admin' OR strtolower($this->session->userdata('role')) == 'vendor') { ?>
                                <li class="has-submenu active">
                                <a href="#"> <i class="fe-trending-up"></i>Vendors Reports<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <!-- <li>
                                        <ul> -->
                                            <?php if((strtolower($this->session->userdata('role')) == 'admin' OR in_array('vendors_reports',$modules)) OR strtolower($this->session->userdata('role')) == 'vendor'){ ?>
                                            <li>
                                                <a href="<?php echo base_url('vendor_deliveries_complete_report'); ?>">Vendor Wise Complete Report</a>
                                            </li>
                                            
                                        <?php } ?>
                                        <!-- </ul>
                                    </li> -->
                                   
                                </ul>
                            </li>
                        <?php }?>
                        
                        
                        
                        <!--start Tempory i hold this from other partners and users only admin and a test partner 40062 can view this-->
                        <?php //if((strtolower($this->session->userdata('role')) == 'admin') OR $this->session->userdata("u_id") ==40062){ ?>
                                           
                        <li class="has-submenu active">
                                <a href="#"> <i class="fe-trending-up"></i>Meal Planner<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <!-- <li>
                                        <ul> -->
                                            
                                           
                                            <li>
                                                <a href="<?php echo base_url('customersMeta'); ?>">Add Customers to Meal Planner</a>
                                                <a href="<?php echo base_url('monthlyMeal/add_mealPlan'); ?>">Plan Delivery Days</a>
                                                <a href="<?php echo base_url('monthlyMeal/mealPlans'); ?>">Meal Plan Tracker</a>
                                                
                                                 <?php if((strtolower($this->session->userdata('role')) == 'admin') OR strtolower($this->session->userdata('role')) != 'vendor'){ ?>
                                                <a href="<?php echo base_url('monthlyMeal/VendorPreDeliveriesReport'); ?>">Vendor PreDeliveries Report</a>
                                                  <?php } ?>
                                            </li>
                                            
                                            
                                            
                                       
                                        <!-- </ul>
                                    </li> -->
                                   
                                </ul>
                            </li>
                        
                         <?php //} ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <!--END new tab-->
                        
                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->

        </header>

        <!-- loader on every page -->
        <div id="custom_loader" align="center">
            <div class="loader_container">
                
            <div class="spinner-border avatar-lg text-primary m-2 " role="status"></div>
            </div>
        </div>
        <!-- end loader -->

        <script type="text/javascript">
            base_url = '<?php echo base_url() ?>';
            try{
            logged_user = (JSON.parse('<?php echo json_encode($this->session->userdata()) ?>'));
            if(logged_user.role_id == 1)
                logx_chat_user = {'agent_name': logged_user.name, 'agent_email': logged_user.email};
            else
                logx_chat_user = {'user_id': logged_user.u_id,'user_name': logged_user.name, 'user_email': logged_user.email};
            window.csr = logx_chat_user;
            document.title = "The Logx";
            
            setTimeout(function(){
                $("footer .container-fluid .row .col-md-6:first").html(`2017-19 Powered by LOGX`);
            }, 1000);

            document.addEventListener("DOMContentLoaded", function(){
                document.getElementById('custom_loader').style.visibility = "hidden";
            });
        }
        catch{
            console.log('error in upper script');
            document.addEventListener("DOMContentLoaded", function(){
                document.getElementById('custom_loader').style.visibility = "hidden";
            });   
        }

        </script>



        <style type="text/css">
            #custom_loader{
                /*background: #000;*/
                background:#3c4650
                opacity: 0.3;
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
            }
            .loader_container{
                margin-top: 15%;
            }
            
           
            .submenu li:hover {
                /*background: #eee;*/
                /*background: red;*/
                /*background: green;*/
                /*color:white;*/
            }
            .text-primary {
                /*color: #00a3d3!important;*/
                color:#98a6ad!important;
            }
            .btn-primary {
                /*color: #fff;*/
                /*background-color: #00aee0;*/
                /*border-color: #00afe2;*/
                color: red;
                background-color: #dee2e6;
                border-color: #45525f;
            }
            .border-primary {
                /*border-color: #00afe2!important;*/
                border-color: #45525f!important;
                
            }
            .bg-primary {
                /*background-color: #00acdf!important;*/
                background-color: #36404a!important;
                color: #98a6ad;
            }

            .flatpickr-day.endRange, .flatpickr-day.endRange.inRange, .flatpickr-day.endRange.nextMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.endRange:focus, .flatpickr-day.endRange:hover, .flatpickr-day.selected, .flatpickr-day.selected.inRange, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.selected:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange, .flatpickr-day.startRange.inRange, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.startRange:focus, .flatpickr-day.startRange:hover {
                /*background: #00b6eb;*/
                /*border-color: #00b6eb;*/
                
                 background: #36404a;
                border-color: #45525f;
            }
            
            .card-box{
                 background: #36404a;
                 color:white;
            }
           p > a {
                color: #98a6ad;
                text-decoration: none;
                background-color: transparent;
            }
            a:hover {
                    color: white;
                    text-decoration: none;
                }
            .page-title-box .page-title {
                color:#98a6ad!important;
            }
            
            .navbar-custom{
                background:#38414a;
            }
            .footer {
                background:#38414a;
            }
            
            .form-control{
                background:#36404a;
            }
            .text_color{
                color:#dee2e6;
            }
    /*          path[Attributes Style] {*/
    /*fill: rgb(54, 64, 74);*/
    /*stroke: rgb(255, 255, 255);*/
  
        </style>


 <script>
  function initFreshChat() {
    window.fcWidget.init({
      token: "0fa8f439-1405-4685-8f18-3757b885ef71",
      host: "https://wchat.freshchat.com"
    });
    
    console.log('chat is runing');
  }
  function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"Freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
</script>