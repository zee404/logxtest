<!-- BEGIN SIDEBAR -->
<div class="page-sidebar navbar-collapse collapse">
<!-- BEGIN SIDEBAR MENU -->

<!--
Department_types
HR - 0
Programming - 1
-->

<ul class="page-sidebar-menu">

    <li>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"></div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    </li>

    <li><p></p></li>

<!------------------------------------------------------------------------------------------------------>
<!-------------------------------------START ADMIN LEFT MENU-------------------------------------------->
<!------------------------------------------------------------------------------------------------------>
    <?php //echo $this->session->userdata('role'); //die;?>
    <!-- ADMIN Dashboard -->
    <?php if($this->session->userdata('role') == 'admin'){ ?>
    <li class="start">
        <a href="<?php echo base_url()?>auth/dashboard">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
            <span class="selected"></span>
        </a>
    </li>


    <!--VENDORS-->
    <li class="">
        <a href="javascript:;">
            <i class="icon-tags"></i>
            <span class="title">Vendors</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
<!--            <li ><a id="add_services" href="--><?php //echo base_url()?><!--">Add Vendor</a></li>-->
            <li ><a id="vendor_list" href="<?php echo base_url()?>vendor/index">Vendors List</a></li>
        </ul>
    </li>
<!-- Store Keeper -->
 <li class="">
        <a href="javascript:;">
            <i class="icon-tags"></i>
            <span class="title">Store Keepers</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li ><a id="keeper_list" href="<?php echo base_url()?>vendor/keepers">Store Keepers List</a></li>
        </ul>
    </li>
    <!--DRIVER-->
    <li class="">
        <a href="javascript:;">
            <i class="icon-ambulance"></i>
            <span class="title">Drivers</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
<!--            <li ><a id="services_list" href="--><?php //echo base_url()?><!--driver">Drivers List</a></li>-->
            <li ><a id="manage_upload_drivers" href="<?php echo base_url()?>driver/upload">Upload Drivers</a></li>
            <li ><a id="manage_uploaded_drivers" href="<?php echo base_url()?>driver/uploaded">Uploaded Drivers</a></li>
            <li ><a id="manage_invited_drivers" href="<?php echo base_url()?>driver/invited">Invited Drivers</a></li>
            <li ><a id="manage_active_drivers" href="<?php echo base_url()?>driver/active">Active Drivers</a></li>
             <li ><a id="manage_active_drivers" href="<?php echo base_url()?>driver/liveLocations">Track Drivers</a></li>
        </ul>
    </li>

    <!--CUSTOMERS-->
    <li class="">
        <a href="javascript:;">
            <i class="icon-male"></i>
            <span class="title">Customers</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li ><a id="manage_upload_customers" href="<?php echo base_url()?>customer/upload">Upload Customers</a></li>
            <li ><a id="manage_uploaded_customers" href="<?php echo base_url()?>customer/uploaded">Uploaded Customers</a></li>
            <li ><a id="manage_invited_customers" href="<?php echo base_url()?>customer/invited">Invited Customers</a></li>
            <li ><a id="manage_active_customers" href="<?php echo base_url()?>customer/active">Active Customers</a></li>
        </ul>
    </li>


    <!--ORDERS-->
    <li class="">
        <a href="javascript:;">
            <i class="icon-shopping-cart"></i>
            <span class="title">Deliveries</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li ><a id="upload_orders" href="<?php echo base_url()?>order/upload">Upload Deliveries</a></li>
            <li ><a id="uploaded_orders" href="<?php echo base_url()?>order/uploaded">Unassigned Deliveries</a></li>
            <li ><a id="manage_order" href="<?php echo base_url()?>order">Assigned Deliveries</a></li>
            <li ><a id="completed_order" href="<?php echo base_url()?>order/orderCompleted">Completed Deliveries</a></li>
        </ul>
    </li>
     <li class="start" style="border-top: 1px solid #EEEEEE;">
        <a id="listingQr" href="<?php echo base_url()?>order/listingQr">
            <i class="icon-filter"></i>
            <span class="title">QR Codes</span>
            <span class="selected"></span>
        </a>
    </li>
 <li class="start" style="border-top: 1px solid #EEEEEE;">
        <a id="bagsTracking" href="<?php echo base_url()?>order/bagsTracking">
            <i class="icon-filter"></i>
            <span class="title">Bags Tracking</span>
            <span class="selected"></span>
        </a>
    </li>

    <li class="">
        <a href="javascript:;">
            <i class=" icon-archive"></i>
            <span class="title">Bags Collection</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li ><a id="upload_bags" href="<?php echo base_url()?>bag/upload">Upload Bags Collection</a></li>
            <li ><a id="unassigned_bag_list" href="<?php echo base_url()?>bag/unassigned">Unassigned Bags Collection</a></li>
            <li ><a id="picked_bags_list" href="<?php echo base_url()?>bag/assigned">Assigned Bags Collection</a></li>
            <li ><a id="completed_bags_list" href="<?php echo base_url()?>bag/completed">Completed Bags Collection</a></li>
        </ul>
    </li>

    <!--REPORTS-->
    <li class="">
        <a id="manage_report"  href="<?php echo base_url()?>report">
            <i class="icon-bar-chart"></i>
            <span class="title">Reports</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li ><a id="vendor_deliveries" href="<?php echo base_url()?>report/vendor_deliveries">Vendor Wise Deliveries</a></li>
            <li ><a id="driver_deliveries" href="<?php echo base_url()?>report/driver_deliveries">Driver Wise Deliveries</a></li>
            <li ><a id="deliveries_report" href="<?php echo base_url()?>report/deliveries">All Delivery Report</a></li>
            <li ><a id="deliveries_status_report" href="<?php echo base_url()?>report/status_deliveries">Status Wise Deliveries</a></li>
            <li ><a id="food_reading_report" href="<?php echo base_url()?>report/food_readings">Food Reading History</a></li>
            <li ><a id="manage_login_history" href="<?php echo base_url()?>report/login_history">Users Login log</a></li>
            <li ><a id="v_bags_report" href="<?php echo base_url()?>report/bag_collection_report">Bags Collection</a></li>
        </ul>
    </li>
 <li class="start" style="border-top: 1px solid #EEEEEE;">
        <a id="listingExtra" href="<?php echo base_url()?>order/extraBags">
            <i class="icon-filter"></i>
            <span class="title">Extra Bags</span>
            <span class="selected"></span>
        </a>
    </li>
    <!--GRAPH-->
    <li class="" style="display: none">
        <a href="javascript:;">
            <i class="icon-bolt"></i>
            <span class="title">Graph</span>
        </a>
    </li>


    <!--SETTING-->
    <li class="">
        <a href="javascript:;">
            <i class="icon-edit"></i>
            <span class="title">Settings</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li ><a id="deliveries_type" href="<?php echo base_url()?>order/type">Deliveries Type</a></li>
        </ul>
    </li>


    <!--HELP AND SUPPORT-->
    <li class="" style="display: none">
        <a href="javascript:;">
            <i class="icon-file"></i>
            <span class="title">Help and support</span>
        </a>
    </li>
    <?php } ?>

    <?php if($this->session->userdata('role') == 'Store Keeper'){ ?>
    <li class="start">
        <a href="<?php echo base_url()?>auth/dashboard2">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
            <span class="selected"></span>
        </a>
    </li>
 <!--ORDERS-->
    <li class="">
        <a href="javascript:;">
            <i class="icon-shopping-cart"></i>
            <span class="title">Deliveries</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
           
            <li ><a id="completed_order" href="<?php echo base_url()?>order/orderCompleted">Completed Deliveries</a></li>
        </ul>
    </li>
 <li class="start" style="border-top: 1px solid #EEEEEE;">
        <a id="bagsTracking" href="<?php echo base_url()?>order/bagsTracking">
            <i class="icon-filter"></i>
            <span class="title">Bags Tracking</span>
            <span class="selected"></span>
        </a>
    </li>
  

    

   
    <li class="">
        <a id="manage_report"  href="<?php echo base_url()?>report">
            <i class="icon-bar-chart"></i>
            <span class="title">Reports</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li ><a id="vendor_deliveries" href="<?php echo base_url()?>report/vendor_deliveries">Vendor Wise Deliveries</a></li>
            <li ><a id="driver_deliveries" href="<?php echo base_url()?>report/driver_deliveries">Driver Wise Deliveries</a></li>
            <li ><a id="deliveries_report" href="<?php echo base_url()?>report/deliveries">All Delivery Report</a></li>
            <li ><a id="deliveries_status_report" href="<?php echo base_url()?>report/status_deliveries">Status Wise Deliveries</a></li>
            <li ><a id="food_reading_report" href="<?php echo base_url()?>report/food_readings">Food Reading History</a></li>
            
            <li ><a id="v_bags_report" href="<?php echo base_url()?>report/bag_collection_report">Bags Collection</a></li>
        </ul>
    </li>
 
 
    <?php } ?>
<!------------------------------------------------------------------------------------------------------>
<!----------------------------------------START VENDOR LEFT MENU---------------------------------------->
<!------------------------------------------------------------------------------------------------------>
    <!-- VENDOR Dashboard -->
    <?PHP if($this->session->userdata('role') == 'vendor'){ ?>
        <li class="start">
            <a href="<?php echo base_url()?>vendor/dashboard">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>
            </a>
        </li>

        <!--CUSTOMERS-->
        <li class="">
            <a href="javascript:;">
                <i class="icon-male"></i>
                <span class="title">Customers</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li ><a id="v_manage_customers" href="<?php echo base_url()?>customer/v_customers">Customers List</a></li>
            </ul>
        </li>

        <!--ORDERS-->
        <li class="">
            <a href="javascript:;">
                <i class="icon-shopping-cart"></i>
                <span class="title">Deliveries</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li ><a id="v_upload_orders" href="<?php echo base_url()?>vendor/upload_deliveries">Upload Deliveries</a></li>
                <li ><a id="v_new_order_list" href="<?php echo base_url()?>vendor/uploaded">Unassigned Deliveries</a></li>
                <li ><a id="v_order_list" href="<?php echo base_url()?>vendor/order">Assigned Deliveries</a></li>
                 <li ><a id="v_completed_order_list" href="<?php echo base_url()?>vendor/orderCompleted">Completed Deliveries</a></li>
            </ul>
        </li>
        <li class="start" style="border-top: 1px solid #EEEEEE;">
        <a id="listingQr" href="<?php echo base_url()?>order/listingQr">
            <i class="icon-filter"></i>
            <span class="title">QR Codes</span>
            <span class="selected"></span>
        </a>
    </li>
<li class="start" style="border-top: 1px solid #EEEEEE;">
        <a id="bagsTracking" href="<?php echo base_url()?>order/bagsTracking">
            <i class="icon-filter"></i>
            <span class="title">Bags Tracking</span>
            <span class="selected"></span>
        </a>
    </li>

        <!--ORDERS-->
        <li class="">
            <a href="javascript:;">
                <i class=" icon-archive"></i>
                <span class="title">Bags Collection</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li ><a id="v_upload_bags" href="<?php echo base_url()?>vendor/upload">Upload Bags Collection</a></li>
                <li ><a id="v_unassigned_bag_list" href="<?php echo base_url()?>vendor/unassigned">Unassigned Bags Collection</a></li>
                <li ><a id="v_assigned_bag_list" href="<?php echo base_url()?>vendor/assigned">Assigned Bags Collection</a></li>
                 <li ><a id="v_completed_bag_list" href="<?php echo base_url()?>vendor/completed">Completed Bags Collection</a></li>
            </ul>
        </li>

        <!--REPORTS-->
        <li class="">
            <a id="manage_report"  href="<?php echo base_url()?>report">
                <i class="icon-bar-chart"></i>
                <span class="title">Reports</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
<!--                <li ><a id="v_customers_report" href="--><?php //echo base_url()?><!--">Customers Report</a></li>-->
                <li ><a id="v_deliveries_report" href="<?php echo base_url()?>vendor/deliveries_report">Deliveries</a></li>
                <li ><a id="v_bags_report" href="<?php echo base_url()?>vendor/bag_collection_report">Bags Collection</a></li>
<!--                <li ><a id="v_food_reading_report" href="--><?php //echo base_url()?><!--vendor/food_reading_report">Food Reading</a></li>-->
            </ul>
        </li>

    <?php } ?>


</ul>
<!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->