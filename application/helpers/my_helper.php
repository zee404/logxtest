<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 19/8/2016
 * Time: 2:59 PM
 */
require_once('expt.php');

function check_module($page)
{
    $ci = &get_instance();
    $modules = $ci->session->userdata('modules');
   if (strpos($modules, $page) !== false) {

   }
   else
    {
        exit('Not Allowed');
    } 
}
function send_notification_to_user($data_arr, $save_flag) {

    #prep the bundle
    
    // echo 'data arry is:<br>';
    // print_r($data_arr);
    $msg = array
    (
        'body' 	=> $data_arr['message'],
        'title'	=> $data_arr['title'],
        'for_whom'  => $data_arr['for_whom'],
        'status_code'=> $data_arr['status_code'],
        'badge'=> !empty($data_arr['badge']) ? $data_arr['badge'] : '',
        'sound' => 'default',
        'vibrate' => 'true'
       // 'icon'	=> 'myicon',/*Default Icon*/
       // 'sound' => 'mySound'/*Default sound*/
    );
    $fields = array
    (
        'to'		=> $data_arr['device_token'],
        'notification'	=> $msg
    );


    //increment badge_counter
    $CI = get_instance();
    $where = array('id' => $data_arr['user_id']);
    $CI->notification_model->increment_badge_counter($where);


    $headers = array
    (
        // 'Authorization: key=' . 'AIzaSyADtOFoYX_YcbCCteOIbwFX7Y3os6UADM4', // Server API Key (or Legacy Server API Key)
       
       'Authorization: key=' . 'AAAABmRSIVI:APA91bHfzfm5CTgVxdfQaEbm7YTjQphzHHq23Q2GXsGC5QapcDqwIwHDL_ICbT_8GigNtglmO1AcNch-2Z8wuAnmydZe5yKI9JG3BKAg8yYVDeag8ywf5h3zaMwq1EpCrwT71GUISGEG',
      
        'Content-Type: application/json'
    );
#Send Reponse To FireBase Server
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );

//  echo 'result is:'.$result;
//  print_r($result);
        if($save_flag == 'save') {
            $fields = array(
                'user_id' => $data_arr['user_id'],
                'created_dt' => date('Y-m-d h:i:s'),
                'message' => $data_arr['message'],
                'title' => $data_arr['title'],
                'status_code' => $data_arr['status_code']
            );
            save_notification($fields);
        }
       return $result;
}

function send_notification_to_user_($data_arr, $save_flag)
{
    $data = array();
    // Put your device token here (without spaces):
    //$deviceToken = 'E10DCB2CC9437EC2C1A39F79934C5A13344DBDBA8159217F43CCE84818A3C1AC';//Fahad token
    //$deviceToken = 'A5140214C621F87F21132535087B3439B029175BBB28EB1AE5AB8E18F6D8E6EC';//Azher token
    //$deviceToken = 'C30FB1EE26A38DDB94597D8EEE58CD9598E670B4D970CB7A6406EAAE71B5B53B';//Azher token
    $deviceToken = $data_arr['device_token'];
    //$deviceToken = $data_arr['device_token'];
    // Put your private key's passphrase here:
    $passphrase = '57R2QGAAB8';

    ////////////////////////////////////////////////////////////////////////////////
    $ctx = stream_context_create();
    stream_context_set_option($ctx, 'ssl', 'local_cert', 'pushcert.pem');
    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
    // Open a connection to the APNS server
    $fp = stream_socket_client(
        'ssl://gateway.sandbox.push.apple.com:2195', $err,
        $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

    if (!$fp)
        exit("Failed to connect: $err $errstr" . PHP_EOL);

    $data['response'] = 'Connected to APNS' . PHP_EOL;

    // Create the payload body
    $body['aps'] = array(
        'alert' => $data_arr['message'],
        'sound' => 'default',
        'title' => $data_arr['title'],
        'for_whom'  => $data_arr['for_whom'],
        'status_code'=> $data_arr['status_code'],
        'badge'=> +1,
    );

    // Encode the payload as JSON
    $payload = json_encode($body);

    // Build the binary notification
    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

    // Send it to the server
    $result = fwrite($fp, $msg, strlen($msg));

    //send notification from production

    //pro_send_notification_to_user($data_arr, $save_flag);

    if (!$result) {
        $data['response'] = 'Message not delivered' . PHP_EOL;
        $data['success'] = false;
    }else {
        $data['response'] = 'Message successfully delivered' . PHP_EOL;
        $data['success'] = true;

        if($save_flag == 'save') {
            $fields = array(
                'user_id' => $data_arr['user_id'],
                'created_dt' => date('Y-m-d h:i:s'),
                'message' => $data_arr['message'],
                'title' => $data_arr['title'],
                'status_code' => $data_arr['status_code']
            );
            save_notification($fields);
        }
    }

    // Close the connection to the server
    fclose($fp);
    return $data;
}

function pro_send_notification_to_user($data_arr, $save_flag)
{
    $data = array();
    $deviceToken = $data_arr['device_token'];
    // Put your private key's passphrase here:
    $passphrase = '57R2QGAAB8';

    $ctx = stream_context_create();
    //stream_context_set_option($ctx, 'ssl', 'local_cert', 'Pro_pushcert.pem');
    stream_context_set_option($ctx, 'ssl', 'local_cert', 'p_pushcert.pem');
    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
    // Open a connection to the APNS server
    $fp = stream_socket_client(
        'ssl://gateway.sandbox.push.apple.com:2195', $err,
        $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

    if (!$fp)
        exit("Failed to connect: $err $errstr" . PHP_EOL);

    $data['response'] = 'Connected to APNS' . PHP_EOL;

    // Create the payload body
    $body['aps'] = array(
        'alert' => $data_arr['message'],
        'sound' => 'default',
        'title' => $data_arr['title'],
        'for_whom'  => $data_arr['for_whom'],
        'status_code'=> $data_arr['status_code'],
        'badge'=> +1,
    );

    // Encode the payload as JSON
    $payload = json_encode($body);

    // Build the binary notification
    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

    // Send it to the server
    $result = fwrite($fp, $msg, strlen($msg));

    if (!$result) {
        $data['response'] = 'Message not delivered' . PHP_EOL;
        $data['success'] = false;
    }else {
        $data['response'] = 'Message successfully delivered' . PHP_EOL;
        $data['success'] = true;

        if($save_flag == 'save') {
            $fields = array(
                'user_id' => $data_arr['user_id'],
                'created_dt' => date('Y-m-d h:i:s'),
                'message' => $data_arr['message'],
                'title' => $data_arr['title'],
                'status_code' => $data_arr['status_code']
            );
            save_notification($fields);
        }
    }
    // Close the connection to the server
    fclose($fp);
    return $data;
}

function save_notification($data){
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('notification_model');
    $CI->notification_model->add($data);
}

function send_expert_sms($destination, $msg)
{
    //$destination = '971544009796';
    $data = array('response'=>false);
// Creating an object of ExpertTexting SMS Class.
    $expertTexting = new experttexting_sms();
// Sender of the SMS – PreRegistered through the Customer Area.
    //$expertTexting->from    = 'Sender Number Here';
    $expertTexting->from    = EXPERT_FROM_NO;
// The full international mobile number without the + or 00
    $expertTexting->to      = without_dash_number($destination);
// The SMS content.
    $expertTexting->msgtext = $msg;
// Use the below method to sent simple text message.
// Uncomment the line below to run this call.
// Use the below method to sent Send multilangual SMS method that have unicode characters in them.
// Uncomment the line below to run this call.
//echo $expertTexting->sendUnicode();
// Use the below method to query your account balance
// The below call is uncommented thus it will run on page execution.
    //echo $expertTexting->QueryBalance();
    $response_array = $expertTexting->send();

    //response status code
/*
0 	Request is successful
1 	Request has failed.
2 	Parameters are missing.
3 	Credentials are invalid.
4 	Parameters are invalid.
5 	Result has returned empty.
6 	Status is invalid.
*/

    //convert xml to json
    $xml = simplexml_load_string($response_array);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);

    if ($array['Status'] == 'SUCCESS'){
        $data["response"] = true;
        return $data["response"];
    }else{
        return $json;
    }
}

function is_logged_in() {
    $CI =& get_instance();
    $user = $CI->session->userdata('username');
    if (!isset($user)) {
        return true;
    }
    else {
        return false;
    }
}
/*
<a href="#" class="btn btn-xs default">Default <i class="icon-user"></i></a>
<a href="#" class="btn btn-xs red">Red <i class="icon-edit"></i></a>
<a href="#" class="btn btn-xs blue"><i class="icon-file-alt"></i> Blue</a>
<a href="#" class="btn btn-xs green">Green <i class="icon-font"></i></a>
<a href="#" class="btn btn-xs yellow">Yellow <i class="icon-search"></i></a>
<a href="#" class="btn btn-xs purple"><i class="icon-remove"></i> Purple</a>
<a href="#" class="btn btn-xs green">Green <i class="icon-plus"></i></a>
<a href="#" class="btn btn-xs dark">Dark <i class="icon-link"></i></a>


<span class="label label-sm label-success">Approved</span>--
<span class="label label-sm label-info">Pending</span>--
<span class="label label-sm label-warning">Suspended</span>
<span class="label label-sm label-danger">Blocked</span>
*/
function getStatusHtml($status){
    $status_html = '';
    switch($status){
        case -2:
            $status_html ='<span class="label label-sm label-danger">Overdue</span>';
            break;
        case -1:
            $status_html ='<span class="label label-sm label-info">Open</span>';
            break;
        case 1:
            $status_html='<span class="label label-sm label-success">Close</span>';
            break;
        case 2:
            $status_html ='<span class="label label-sm label-warning">Void</span>';
            break;
        case 3:
            $status_html ='<span class="label label-warning arrowed">Refunded</span>';
            break;
        default:
            $status_html ='<span class="label arrowed">Unknown</span>';
            break;
        }
    return $status_html;
}

function get_customer_status($status){
    $status_html = '';
    switch($status){
        case 0:
            $status_html ='<span class="label label-sm label-danger">Inactive</span>';
            break;
        case 1:
            $status_html='<span class="label label-sm label-success">Active</span>';
            break;
        default:
            $status_html ='<span class="label arrowed">Unknown</span>';
            break;
    }
    return $status_html;
}

function get_google_geocode($address){

    // url encode the address
    $address = urlencode($address);

    // google map geocode api url
          //https://maps.googleapis.com/maps/api/geocode/json?address="Villa 12, Golden Villas.Street 51A,Rashidiya,Dubai"&key=AIzaSyBIfk_cb0nHQNvpdgf9dEc0_WTTcd90dS8
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyAomPncS0JKuJDs_xE5ztpiWP_h9vouSpU";

    // get the json response
    $resp_json = file_get_contents($url);

    // decode the json
    $resp = json_decode($resp_json, true);

    // response status will be 'OK', if able to geocode given address
    if($resp['status']=='OK'){

        // get the important data
        $lat = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $long = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
       // $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";

        // verify if data is complete
        if($lat && $long){

            // put the data in the array
            $data_arr = array();
            $data_arr['lng'] = $long;
            $data_arr['lat'] = $lat;
            return $data_arr;
        }else{
            return false;
        }

    }else{
        //echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}

function generate_token ($len = 32)
{
    // Array of potential characters, shuffled.
    $chars = array(
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    );
    shuffle($chars);
    $num_chars = count($chars) - 1;
    $token = '';
    // Create random token at the specified length.
    for ($i = 0; $i < $len; $i++)
    {
        $token .= $chars[mt_rand(0, $num_chars)];
    }
    return $token;
}
/*Order Status
=Not Assign
=Assign
=Ship
=Delivered
=Cancel
=Return
*/
function get_order_status($status){
    $status_html = '';
    switch($status){
        case 'Not Assign':
            $status_html ='<span class="label label-sm label-primary">Not Assign</span>';
            break;
        case 'Assign':
            $status_html='<span class="label label-sm label-warning">Assigned</span>';
            break;
        case 'Ship':
            $status_html='<span class="label label-sm label-info">Shipped</span>';
            break;
        case 'Delivered':
            $status_html='<span class="label label-sm label-success">Delivered</span>';
            break;
        case 'Cancel':
            $status_html='<span class="label label-sm label-danger">Cancel</span>';
            break;
        default:
            $status_html ='<span class="label label-sm label-default ">Returned</span>';
            break;
    }
    return $status_html;
}


function get_bag_status($status){
    $status_html = '';
    switch($status){
        case 'Assign':
            $status_html='<span class="label label-sm label-warning">Assign</span>';
            break;
        case 'Requested':
            $status_html='<span class="label label-sm label-info">Requested</span>';
            break;
        case 'Picked':
            $status_html='<span class="label label-sm label-success">Picked</span>';
            break;
        default:
            $status_html ='<span class="label label-sm label-default ">Return</span>';
            break;
    }
    return $status_html;
}

/**
 * A function to show the send_sms() from the library
 * Used to send an SMS message
 */
function send_plivo_sms($destination, $msg)
{
    $CI =& get_instance();
    $CI->load->library('plivo');
//923204557433//fahad
//923024726236//ban
//923218860542//imran
    $sms_data = array(
        'src' => '+923334774108', //The phone number to use as the caller id (with the country code). E.g. For USA 15671234567
        'dst' => $destination, // The number to which the message needs to be send (regular phone numbers must be prefixed with country code but without the ‘+’ sign) E.g., For USA 15677654321.
        //'dst' => '+'.$destination, // The number to which the message needs to be send (regular phone numbers must be prefixed with country code but without the ‘+’ sign) E.g., For USA 15677654321.
        //'dst' => '2222222222<3333333333', // receiver's phone number with country code
        'text' => $msg, // The text to send
        'type' => 'sms', //The type of message. Should be 'sms' for a text message. Defaults to 'sms'
        'url' => base_url() . 'plivo_test/receive_sms', // The URL which will be called with the status of the message.
        'method' => 'POST', // The method used to call the URL. Defaults to. POST
    );

    /*
     * look up available number groups
     */
    $response_array = $CI->plivo->send_sms($sms_data);

    if ($response_array[0] == '200')
    {
        $data["response"] = json_decode($response_array[1], TRUE);
        return $data["response"];
    }
    else
    {
        /*
         * the response wasn't good, show the error
         */
        return $response_array;
    }
}

function is_premium_delivery($str_time){
    $tmp_delivery_time = explode("TO", $str_time);
    //print_r(trim($tmp_delivery_time[0]));
    $from = trim($tmp_delivery_time[0]);
    //print_r(explode(" ",trim($tmp_delivery_time[1]))[0]);
    $to = explode(" ",trim($tmp_delivery_time[1]))[0];
    //echo round(abs(strtotime($to) - strtotime($from)) / 60,2). " minute";
    $time_diff = round(abs(strtotime($to) - strtotime($from)) / 60,2);
    if($time_diff <= 60){
        return "Premium delivery";
    }else{
        return "Regular delivery";
    }
}
//Its 9 digit number without country code +971
function validate_phone_number($number){
    //$phone = '';
    $number = str_replace('-','',$number);
    if(strlen($number) == 9){
        return number_prefix.$number;

    }

    if(strlen($number) == 10 || strlen($number) == 11 || substr($number, 0, 1) == '0'){
        $number = ltrim($number, '0');
        return number_prefix.$number;
    }

    return $number;

}

function without_dash_number($full_num){
    if(strpos($full_num, '-') !== false){
    $num_arr = explode('-', $full_num);
    $code = $num_arr[0];
    $number = $num_arr[1];
    return $code.$number;
    }else{ return $full_num; }
}

function check_overdue($data){
    $date = new DateTime($data);
    $now = new DateTime();

    if($date < $now) {
       return -2;
    }else{
        return -1;
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function get_datetime_formate($date){
    $newDate = date("j M,Y H:i a", strtotime($date));
    //$newDate = date("d-m-Y H:i a", strtotime($date));
    return $newDate;
}

function get_time_formate($date){
    $newDate = date("H:i a", strtotime($date));
    return $newDate;
}

function get_date_formate($date){
    $newDate = date("j M, y", strtotime($date));
    return $newDate;
}

function get_date_only($date){
    $newDate = date("d/m/Y", strtotime($date));
    return $newDate;
}

function get_date_year(){
    return date("Y");
}

function send_email($param){
    $response = array('success' => false);
    $ci = & get_instance();


 $config['protocol'] = 'smtp';
		  
	    $config['smtp_host'] = 'mail.thelogx.com';
            $config['smtp_port'] = 465;
           // $config['smtp_user'] = "remoteappalerts@aii-3.com";
          //  $config['smtp_pass'] = "ra$123";
		
            $ci->load->library('email', $config);
            
            
            
//$ci->email->initialize($config);
//$ci->email->set_mailtype("html");
//$ci->email->set_newline("\r\n");

    $from_email = "info@thelogx.com";
 // $from_email = "info@techbytecorp.com";
   // $ci->load->library('email');
    $ci->email->set_newline("\r\n");
    $ci->email->from($from_email, $param['identification']);
    $ci->email->set_mailtype("html");
    $ci->email->to($param['to']);
    $ci->email->subject($param['subject']);
    $ci->email->message($param['msg']);
    //Send mail
    if($ci->email->send()){
        $response['success'] = true;
    }

    return $response;
}

function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}
if(!function_exists('dd'))
{
    function dd($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        die();
    }
}

if(!function_exists('base64_to_file'))
{
    /**
     * Create File from base 64 string
     * @param $base64_string
     * @param $file_ext
     * @param $type
     * @return string
     */
    function base64_to_file($base64_string, $file_ext, $type, $directory_path)
    {
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
        $ext0 = explode('/',$data[0]);
        $ext1 = explode(';',$ext0[1]);
       $ext = $ext1[0];


        // if directory not found, create directory
        
        if (!file_exists(FCPATH.$directory_path)) {
            
            mkdir(FCPATH.$directory_path, 0777, true);
        }
        $path = $directory_path.$type.'.'.$ext;
        $output_file = FCPATH.$path;

        // open the output file for writing
        $file = fopen( $output_file, 'wb' );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite($file, base64_decode($data[1]));


        // clean up the file resource
        fclose($file);

        return $path;
    }
}

if(!function_exists('get_unique_string'))
{
    function get_unique_string($length = 8)
    {
        return substr(md5(uniqid(mt_rand(), true)), 0, $length);
    }
}



?>