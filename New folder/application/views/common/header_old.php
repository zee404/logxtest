<?php //print_r($this->session->userdata()) ?>
<header id="topnav"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
    
    #topnav{
background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);
    position: fixed;
    left: 0;
    right: 0;
    z-index: 1001;
    padding: 0 12px;
    -webkit-box-shadow: 0 2px 6px -2px rgba(0,0,0,.16), 0 2px 6px 0 rgba(0,0,0,.12);
    box-shadow: 0 2px 6px -2px rgba(0,0,0,.16), 0 2px 6px 0 rgba(0,0,0,.12);
}
#topnav .has-submenu.active .submenu li.active>a {
    color: #2AB1C9;
}
#topnav .has-submenu.active .submenu li>a {
    color: #2AB1C9;
}

#custom_loader
{
    position: fixed;
    top: 45%;
    left: 45%;
    z-index: 99999999999;
}

body{
} 
</style>


<!-- msg tune audio -->
<audio id="msg_tune">
  <source src="<?php echo base_url('assets/chat/audio/open-up.mp3') ?>" type="audio/mpeg">
</audio>


            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <!-- msg notification -->
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-message-square noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge head_noti_counter_chat" style="display: none;">1</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(51px, 70px, 0px);" x-placement="bottom-end">
    
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="javascript:void(0)" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Chat Notification
                                    </h5>
                                </div>
    
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div class="slimscroll noti-scroll msg_noti_area" style="width: auto; height: 510.994px;">
    
                                    <!-- item-->
                                    
                                </div><div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 121.33px;"></div><div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    
                                
    
                            </div>
                        </li>
                        <!-- end msg notification -->

                        <!-- start notification -->
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge head_noti_counter_gen" style="display: none;">2</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(51px, 70px, 0px);" x-placement="bottom-end">
    
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="javascript:void(0)" class="text-dark clearNoti">
                                                <small>Clear All</small>
                                            </a>
                                        </span>General Notification
                                    </h5>
                                </div>
    
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><div class="slimscroll noti-scroll notis_area" style="width: auto; min-height: 410.994px; overflow-y: auto;">
    
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
                                        margin-top: 17px;border-radius: 40px;color: #fff !important;background-color: #197990 !important;border-color: white;
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
                        <a href="<?php echo base_url() ?>" class="logo text-center">
                            <span class="logo-lg">
                                <img src="<?php echo base_url('assets/images/logos-logo-full.png');?>"  alt="" height="18">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
                                <img src="assets/images/logo-sm.png" alt="" height="24">
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
                            }
                            ?>

                            <?php if (in_array('dashboards',$modules) OR $user_data['role'] == 'admin') { ?>
                                <li class="has-submenu active">
                                    <a href="<?php echo base_url('auth/userdashboard');?>">
                                        <i class="fe-airplay"></i>Dashboards </a>
                                </li>
                            <?php } ?>
                            
                            <?php if ($user_data['role'] == 'admin') { ?>
                            <li class="has-submenu active">
                                  <a href="#">
                                    <i class="fe-users"></i>Partners <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                   <?php if (strtolower($this->session->userdata('role')) != 'vendor') {
                                       ?>
                                       <li>
                                        <a href="<?php echo base_url('Partner'); ?>">Partners List</a>
                                    </li>
                                       <?php
                                   } ?>
                                    
                                     <li>
                                        <a href="<?php echo base_url('upload_customer'); ?>">Customers List</a>
                                    </li>
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
                                <a href="">
                                    <i class="fe-git-pull-request"></i>Team  <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                   
                                   <!--  <li>
                                        <a href="<?php echo base_url('keepers'); ?>">Store Keepers List</a>
                                    </li> -->
                                     <li>
                                        <a href="<?php echo base_url('keepers'); ?>">Indoor Team</a>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">OutDoor Team <div class="arrow-down"></div></a>
                                        <ul class="submenu">
                                             <li>
                                        <a href="<?php echo base_url('upload_driver'); ?>">Driver List</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('track_driver'); ?>">Track Driver</a>
                                        </li>
                                        
                                        </ul>
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

                           

                        
                             <?php if (in_array('oprations',$modules) OR in_array('operations',$modules) OR $user_data['role'] == 'admin') { ?>
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
                                            

                                        </ul>
                                    </li>
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
                                                </ul>
                                            </li>
                                            <?php if(strtolower($this->session->userdata('role')) == 'admin'){ ?>
                                            <li>
                                                <a href="<?php echo base_url('extraBags'); ?>">Extra Bags</a>
                                            </li>
                                        <?php } ?>
                                            <li>
                                                <a href="<?php echo base_url('listingQr'); ?>">QR Codes</a>
                                            </li>
                                    

                                    
                                </ul>
                            </li>
                        <?php }?>
                         <?php if (in_array('reports',$modules) OR $user_data['role'] == 'admin') { ?>
                                <li class="has-submenu active">
                                <a href="#"> <i class="fe-trending-up"></i>Reports<div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <!-- <li>
                                        <ul> -->
                                            <?php if(strtolower($this->session->userdata('role')) == 'admin'){ ?>
                                            <li>
                                                <a href="<?php echo base_url('vendor_deliveries'); ?>">Partner Wise Deliveries</a>
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
                                        if(strtolower($this->session->userdata('role')) == 'vendor'){ ?>
                                            <li>
                                                <a href="<?php echo base_url('orderCompleted'); ?>">All Delivery Report</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('bag_collection_report'); ?>">Bags Collection</a>
                                            </li>
                                        <?php } ?>
                                        <!-- </ul>
                                    </li> -->
                                   
                                </ul>
                            </li>
                        <?php }?>
                         <?php if (in_array('setting',$modules) OR $user_data['role'] == 'admin') { ?>
                            <?php if(strtolower($this->session->userdata('role')) == 'admin'){ ?>
                             <li class="has-submenu active">
                                <a href="#"> <i class="fe-settings"></i>Settings <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo base_url('type'); ?>">Deliveries Type</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url('Order/role_type'); ?>">Role Type</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Order/areas'); ?>">Areas</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url('settings/emirates'); ?>">Emirates</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('settings/service_type'); ?>">Service Type</a>
                                    </li>
                                   <!--  <li>
                                        <a id="add_staff" href="<?php echo base_url('staff'); ?>">Employee List</a>
                                    </li>
                                     -->
                                    
                                   
                                    
                                </ul>
                            </li>
                            <?php  } } ?>
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

                            <?php if (in_array('chat',$modules) OR strtolower($this->session->userdata('role')) == 'vendor') { ?>
                                <li class="has-submenu active">
                                    <a href="javascript:void(0);" onclick="$('.chatbox-holder').toggle()">
                                        <i class="fe-message-square"></i>Chat </a>
                                </li>
                            <?php }  ?>
                            
                            <?php  if (strtolower($this->session->userdata('role')) == 'admin') { ?>
                                <li class="has-submenu active">
                                <a href="#"><i class="fe-message-square"></i>Live Support <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo base_url('chat'); ?>">Chat</a>
                                    </li>
                                     <li>
                                        <a href="<?php echo base_url('chat/history'); ?>">Chat History</a>
                                    </li>
                                </ul>
                            </li>
                            <?php }  ?>

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
                logx_chat_user = {'user_name': logged_user.name, 'user_email': logged_user.email};
            window.csr = logx_chat_user;
            document.title = "The Logx";
            
            setTimeout(function(){
                $("footer .container-fluid .row .col-md-6:first").html(`2017-19 Powered by MitByte`);
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
                background: #000;
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
                background: #eee;
            }
            .text-primary {
                color: #00a3d3!important;
            }
            .btn-primary {
                color: #fff;
                background-color: #00aee0;
                border-color: #00afe2;
            }
            .border-primary {
                border-color: #00afe2!important;
            }
            .bg-primary {
                background-color: #00acdf!important;
            }

            .flatpickr-day.endRange, .flatpickr-day.endRange.inRange, .flatpickr-day.endRange.nextMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.endRange:focus, .flatpickr-day.endRange:hover, .flatpickr-day.selected, .flatpickr-day.selected.inRange, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.selected:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange, .flatpickr-day.startRange.inRange, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.startRange:focus, .flatpickr-day.startRange:hover {
                background: #00b6eb;
                border-color: #00b6eb;
            }
        </style>
