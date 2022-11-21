<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
//$route['login'] = 'crud/login';
$route['Partner'] = 'Vendor/uploadss';
$route['login'] = 'auth/index';
$route['register'] = 'auth/register';
$route['staff'] = 'staff/index';
$route['uploads'] = 'Bag/upload';
$route['unassigned'] = 'Bag/unassigned';
$route['assigned'] = 'Bag/assigned';
$route['cancelled'] = 'Bag/cancelled';
$route['completed'] = 'Bag/completed';
$route['upload_cash'] = 'Cash/upload';
$route['unassigned_cash'] = 'Cash/unassigned';
$route['assigned_cash'] = 'Cash/assigned';
$route['completed_cash'] = 'Cash/completed';
$route['cancelled_cash'] = 'Cash/cancelled';
$route['upload_driver'] = 'Driver/upload_driver';
///$route['keepers'] = 'Vender/keepers';



$route['cancelled_Bag_'] = 'Bag/AC_cancelled_';
$route['cancelled_Cash_'] = 'Cash/AC_cancelled_';
$route['cancelled_Delivery_'] = 'Order/AC_cancelled_';
$route['keepers'] = 'Vendor/keepers';
$route['upload_Deliveries'] = 'Order/upload';
$route['check'] = 'Order/check';
$route['order'] = 'Order/index';
$route['Delivery_Status'] ='Order/delivries_status_AC';
$route['Bag_Status'] ='Bag/bag_status_AC';
$route['Cash_Status'] ='Cash/cash_status_AC';
$route['bagsTracking'] = 'Order/bagsTracking';
$route['orderCompleted'] = 'Order/orderCompleted';
$route['order_cancelled'] = 'Order/cancelled';
$route['listingQr'] = 'Order/listingQr';
$route['vendor_deliveries'] = 'Report/vendor_deliveries';
$route['driver_deliveries'] = 'Report/driver_deliveries';
$route['deliveries'] = 'Report/deliveries';
$route['status_deliveries'] = 'Report/status_deliveries';
$route['food_readings'] = 'Report/food_readings';
$route['login_history'] = 'Report/login_history';
$route['user_activity'] = 'Report/user_activity';
$route['bag_collection_report'] = 'Report/bag_collection_report';
$route['extraBags'] = 'Order/extraBags';
$route['type'] = 'Order/type';
$route['Newtype'] = 'Order/Newtype';
$route['timeslots'] = 'Order/timeslots';
$route['areas'] = 'Order/areas';
$route['manage_areas'] = 'Order/Newareas';
$route['uploaded'] = 'admin/uploaded';
$route['invited_driver'] = 'admin/invited_driver';
$route['active_driver'] = 'admin/active_driver';
$route['track_driver'] = 'Driver/track_driver';
// $route['upload_customer'] = 'admin/upload_customer';
//$route['blog-fashion/(:any)'] = 'User/fashion_blog/$1';

$route['upload_customer'] = 'Customer/upload';
$route['uploaded_customer'] = 'admin/uploaded_customer';
$route['active_customer'] = 'admin/active_customer';
//$route['upload_deliveries'] = 'admin/upload_Deliveries';

// old unassigned
// $route['uploaded_Deliveries'] = 'Order/uploaded';
// new after paggination
$route['uploaded_Deliveries'] = 'Order/uploaded_deliveries_';


$route['Storekeepers'] = 'Vendor/storekeepers';
$route['positive_feedback'] = 'Report/positive_feedback';
$route['vendor_suggestion'] = 'Report/vendor_feedback';
$route['negative_feedback'] = 'Report/negative_feedback';
$route['negative_feedback_details'] = 'Report/negative_feedback_details';
$route['vendor_deliveries_complete_report'] = 'Report/vendor_deliveries_complete_report';
$route['expense_list'] = 'Driver/expense_list'; 
$route['fuel_list'] = 'Driver/fuel_list';

$route['vehicle/list'] = 'Vehicle/index';
$route['vehicle/save'] = 'Vehicle/save';


// TA

$route['customersMeta'] = 'Order/upload_customers_meta';

$route['invoice'] = 'Account/index';
$route['balance'] = 'Account/transaction';


$route['dashboard_all_data'] = 'Auth/userdashboardxyz';

$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;
