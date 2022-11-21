<?php

/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 19/8/2016
 * Time: 10:45 AM
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    // public function __construct(){
    //     parent::__construct();
    //     date_default_timezone_set('Asia/Dubai');
    //     $this->output->enable_profiler(false);  //this show value at your page
    // }
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dubai');
        if (empty($this->session->userdata('name')))
            redirect(base_url('auth/index')) or exit('no direct access allowed');
    }
    public function deliveries()
    {
        $this->load->view('report/delivery_report', $data = '');
    }

    public function get_deliveries_report_by_date()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data = $data['orders'] =  $this->order_model->get_orders($where);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }

    public function vendor_deliveries()
    {
        $this->load->model('Vendor_model');
        $data['vendors'] =  $this->Vendor_model->get_where(array());
        $this->load->view('report/vendor_delivery_report', $data);
    }

    public function get_deliveries_report_by_vendor()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data = $data['orders'] =  $this->order_model->get_orders($where);

        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }

    public function driver_deliveries()
    {
        //return active drivers only
        $this->load->model('driver_model');
        $where = array('u.status' => 1);
        $data['drivers'] =  $this->driver_model->get_drivers($where);
        $this->load->view('report/driver_delivery_report', $data);
    }

    public function get_deliveries_report_by_driver()
    {
        $response = array('success' => false);
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $driver_id = @$this->input->post('driver_id');

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.action != 'Freezed' and o.action != 'Paused' and o.driver_id = " . $driver_id . " and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data = $data['orders'] =  $this->order_model->get_orders($where);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }

    public function status_deliveries()
    {
        $this->load->view('report/status_delivery_report');
    }

    public function get_deliveries_report_by_status()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        $user_id = $this->session->userdata("u_id");
        $where = "o.action != 'Freezed' and o.action != 'Paused' and o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        if ($this->session->userdata("role") == 'vendor') {
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id='" . $user_id . "' and o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        }
        if ($this->session->userdata("role") != 'vendor') {
            // ----------------------------- IF URL  HAS SLOT ID THEN SHOW COMPLETED DELIVERY ONLY FOR THAT SLOT
            if (@$_POST['slot_id'] != 0) {
                $where .= 'AND o.slotID =' . @$this->input->post('slot_id');
            }
        }

        $report_data =  $this->order_model->get_orders($where);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }
    public function get_deliveries_report_by_status2()
    {
        $response = array('success' => false);
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $status = @$this->input->post('status');

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        $user_id = $this->session->userdata("u_id");
        $where = "o.action != 'Freezed' and o.action != 'Paused' and o.status = '" . $status . "' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        if ($this->session->userdata("role") == 'vendor') {
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id='" . $user_id . "' and o.status = '" . $status . "' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        }
        $report_data =  $this->order_model->get_orders($where);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }


    public function AC_get_deliveries_report_by_status()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        $user_id = $this->session->userdata("u_id");

        if ($status != '') {
            //  $where = "o.status ='".$status."' ";
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.status ='" . $status . "' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        }


        $report_data =  $this->order_model->get_orders($where);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }



    public function AC_get_bags_report_by_status()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];

        if (!$start_date) {
            $start_date = date('Y-m-d', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d', strtotime($end_date));
        }
        $user_id = $this->session->userdata("u_id");

        if ($status != '') {
            //  $where = "o.status ='".$status."' ";
            $where = "b.status ='" . $status . "' and b.pick_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . "' and '" . date('Y-m-d', strtotime($end_date)) . "'";
        } else {
            $where = "b.pick_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . "' and '" . date('Y-m-d', strtotime($end_date)) . "'";
        }


        $report_data =  $this->bag_model->get_where($where);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }


        // print_r($this->db->last_query());
        // echo '<br> result is <br> <pre>';
        // print_r($response);
        echo json_encode($response);
    }


    public function AC_get_cashs_report_by_status()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];

        if (!$start_date) {
            $start_date = date('Y-m-d', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d', strtotime($end_date));
        }
        $user_id = $this->session->userdata("u_id");

        if ($status != '') {
            //  $where = "o.status ='".$status."' ";
            $where = "ch.status ='" . $status . "' and ch.pick_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . "' and '" . date('Y-m-d', strtotime($end_date)) . "'";
        } else {
            $where = "ch.pick_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . "' and '" . date('Y-m-d', strtotime($end_date)) . "'";
        }


        $report_data =  $this->cash_model->get_where($where);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }


        // print_r($this->db->last_query());
        // echo '<br> result is <br> <pre>';
        // print_r($response);
        echo json_encode($response);
    }

    public function get_deliveries_report_by_notAssigned_backup_001()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];


        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and o.status = 'Not Assign' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.status = 'Not Assign' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        }

        $report_data =  $this->order_model->get_orders($where);

        foreach ($report_data[records] as $key => $data_is) {
            // echo $data_is->order_id;
            $customer_id = $data_is->customer_id;
            $delivery_address = $data_is->delivery_address;
            $delivery_time = $data_is->delivery_time;

            $findings = $this->order_model->get_latest_driver($customer_id, $delivery_address, $delivery_time);

            if ($findings) {
                $data_is->suggested_driver_name = $findings[0]->full_name;
                $data_is->suggested_driver_id = $findings[0]->driver_id;
                $data_is->new_delivery_check = 0;
            } else {
                $data_is->suggested_driver_name = 'New Delivery';
                $data_is->suggested_driver_id = 0;
                $data_is->new_delivery_check = 1;
            }
        }


        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }

    public function get_deliveries_report_by_notAssigned()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];


        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and o.status = 'Not Assign' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.status = 'Not Assign' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        }

        $report_data =  $this->order_model->get_orders($where);




        // ******** SUGGESTED DRIVER ***************//

        foreach ($report_data[records] as $key => $data_is) {
            // echo $data_is->order_id;
            $customer_id = $data_is->customer_id;
            $delivery_address = $data_is->delivery_address;
            $delivery_time = $data_is->delivery_time;

            $delivery_address = str_replace("'", "", $delivery_address);

            //   $day = date('D');
            $paymentDate = $data_is->delivery_date;
            $day = date('D', strtotime($paymentDate));

            // 1 for Sunday , 7 for Saturday
            if ($day == 'Sat') {
                $weekday_check = 7;
            } else if ($day == 'Sun') {
                $weekday_check = 1;
            } else {
                $weekday_check = 0;
            }

            if ($weekday_check) {
                //   Today is weekend
                $findings = $this->order_model->get_latest_driver_weekends($customer_id, $delivery_address, $delivery_time, $weekday_check);
                if ($findings) {
                    $data_is->suggested_driver_name = $findings[0]->full_name;
                    $data_is->suggested_driver_id = $findings[0]->driver_id;
                    $data_is->new_delivery_check = 0;
                    $data_is->date_was = $findings[0]->delivery_date;
                    $data_is->day_was = $findings[0]->day;
                    $data_is->suggested_driver_phone = $findings[0]->phone;
                } else {
                    $check_for_new_delivery = $this->order_model->check_for_new_delivery_($customer_id, $delivery_address, $delivery_time);
                    //  dd($check_for_new_delivery);
                    if ($check_for_new_delivery) {
                        $data_is->suggested_driver_name = 'NA';
                        $data_is->suggested_driver_id = 0;
                        $data_is->new_delivery_check = 0;
                        $data_is->date_was = $check_for_new_delivery[0]->delivery_date;
                        $data_is->day_was = $check_for_new_delivery[0]->day;
                        $data_is->suggested_driver_phone = '';
                    } else {
                        //   Delivery is new no data found for any day of week
                        $data_is->suggested_driver_name = 'New Delivery';
                        $data_is->suggested_driver_id = 0;
                        $data_is->new_delivery_check = 1;
                        $data_is->date_was = 'NA';
                        $data_is->day_was = 'No result found';
                        $data_is->suggested_driver_phone = '';
                    }
                }
            } else {
                //   Today is a weekday
                $findings = $this->order_model->get_latest_driver_weekdays($customer_id, $delivery_address, $delivery_time);

                if ($findings) {
                    $data_is->suggested_driver_name = $findings[0]->full_name;
                    $data_is->suggested_driver_id = $findings[0]->driver_id;
                    $data_is->new_delivery_check = 0;
                    $data_is->date_was = $findings[0]->delivery_date;
                    $data_is->day_was = $findings[0]->day;
                    $data_is->suggested_driver_phone = $findings[0]->phone;
                } else {


                    $check_for_new_delivery = $this->order_model->check_for_new_delivery_($customer_id, $delivery_address, $delivery_time);
                    if ($check_for_new_delivery) {
                        $data_is->suggested_driver_name = 'NA';
                        $data_is->suggested_driver_id = 0;
                        $data_is->new_delivery_check = 0;
                        $data_is->date_was = $check_for_new_delivery[0]->delivery_date;
                        $data_is->day_was = $check_for_new_delivery[0]->day;
                        $data_is->suggested_driver_phone = '';
                    } else {
                        //   Delivery is new no data found for any day of week
                        $data_is->suggested_driver_name = 'New Delivery';
                        $data_is->suggested_driver_id = 0;
                        $data_is->new_delivery_check = 1;
                        $data_is->date_was = 'NA';
                        $data_is->day_was = 'No result found';
                        $data_is->suggested_driver_phone = '';
                    }
                }
            }
        } //END


        // **********************************************//


        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }


    public function get_deliveries_report_by_cancelled()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];


        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        $where = "";
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where .= "o.vendor_id = " . $vendor_id . " and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where .= " o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        }

        $report_data =  $this->order_model->get_orders($where, true);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }
        //   echo '<pre>';
        //   print_r($report_data) ; 
        echo json_encode($response);
    }
    public function get_deliveries_report_by_completed()
    {
        set_time_limit(0);
        $response = array('success' => false, 'data' => array(), 'recordsTotal' => 0, 'recordsFiltered' => 0, 'all_post' => $this->input->post());
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $status = @$this->input->post('status');
        $start = !empty($this->input->post('start')) ? $this->input->post('start') : 0;
        $length = !empty($this->input->post('length')) ? $this->input->post('length') : 50;

        // $start = '';
        // $length = '';

        if (empty($start_date)) {
            $start_date = date('Y-m-d');
        }

        if (empty($end_date)) {
            $end_date = date('Y-m-d', strtotime('+1 days'));
        }


        //exit($start_date.'________'.$end_date);
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.driver_id > 0 AND o.vendor_id=" . $vendor_id . " AND (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' AND '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            //  $where = "o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";

            $where = "o.driver_id > 0 and (o.delivered_status = 1) AND o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' AND '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

            // ----------------------------- IF URL  HAS SLOT ID THEN SHOW COMPLETED DELIVERY ONLY FOR THAT SLOT
            if (@$this->input->post('slot_id') != 0) {
                $where .= 'AND o.slotID =' . @$this->input->post('slot_id');
            }
        }



        //if searching is requested
        $search = null;
        if (!empty($this->input->post('search')['value'])) {
            $search = $this->input->post('search')['value'];

            $data_search   = preg_split('/\s+/', $search);

            $searchs = $data_search;
            // echo '<pre>';
            // print_r($data_search);
            // die();

            foreach ($searchs as $search) {
                $where .= " AND (o.plan_id LIKE '%" . $search . "%' OR o.company_note LIKE '%" . $search . "%' OR o.delivered_to LIKE '%" . $search . "%' OR o.name_on_delivery LIKE '%" . $search . "%' OR o.number_on_delivery LIKE '%" . $search . "%' OR o.delivery_time LIKE '%" . $search . "%' OR c.full_name LIKE '%" . $search . "%' OR d.full_name LIKE '%" . $search . "%' OR v.full_name LIKE '%" . $search . "%' OR o.delivery_address LIKE '%" . $search . "%' OR o.delivery_time LIKE '%" . $search . "%' OR o.food_type LIKE '%" . $search . "%' OR o.pickUp LIKE '%" . $search . "%' OR c.phone LIKE '%" . $search . "%' OR d.phone LIKE '%" . $search . "%' OR v.phone LIKE '%" . $search . "%')";
            }
            //   echo '<pre>';
            // echo $where.'<br>';
            // die();

        }
        $response['search'] = $search;

        //sorting code
        if (!empty($this->input->post('order'))) {
            $table_order = $this->input->post('order')[0];
            $col_num = $table_order['column'];
            $order_dir = $table_order['dir'];
            switch ($col_num) {

                case 1:
                    $col_name = 'o.order_id';
                    break;

                case 2:
                    $col_name = 'o.plan_id';
                    break;

                case 3:
                    $col_name = 'o.company_note';
                    break;

                case 5:
                    $col_name = 'o.name_on_delivery';
                    break;

                case 8:
                    $col_name = 'o.delivery_date';
                    break;
                case 10:
                    // o.delivery_date
                    $col_name = 'd.full_name';
                    break;
                case 11:
                    $col_name = 'v.full_name';
                    break;
                case 12:
                    $col_name = 'o.assign_date';
                    break;

                case 14:
                    $col_name = 'o.delivered_date';
                    break;

                default:
                    $col_name = null;
                    break;
            }
        }
        //end sorting

        $report_data =  $this->order_model->get_orders_where($where, $start, $length, $col_name, $order_dir);


        if (count($report_data) > 0) {
            $response['success'] = true;
            $response['data'] = $report_data;
            $response['draw'] = $this->input->post('draw');
            $response['recordsTotal'] = $this->order_model->get_total_results_new($where);
            $response['recordsFiltered'] = $response['recordsTotal'];
        }


        echo json_encode($response);
    }




    public function food_readings()
    {
        $this->load->view('report/food_reading_report', $data = '');
    }

    public function get_food_reading_report()
    {
        $response = array('success' => false);
        $from_date = @$_POST['start_date'];
        $to_date = @$_POST['end_date'];

        if (!$from_date) {
            $from_date = date('Y-m-d h', strtotime($from_date));
        }

        if (!$to_date) {
            $to_date = date('Y-m-d');
        }

        $where_date = "r.created_dt BETWEEN '" . date('Y-m-d', strtotime($from_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($to_date)) . " 23:59:59'";
        $report_data =  $this->driver_model->get_food_reading_where($where_date, $driver_id = '');
        if ($report_data) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }

    ///////////////API//////////////////
    public function get_api()
    {
        $this->load->view('report/api', $data = '');
    }


    /***************************************************************************/
    /********************************USER LOG***********************************/
    /***************************************************************************/
    public function login_history()
    {
        $this->load->view("report/login_history");
    }

    public function search_for_login_report()
    {
        $response = array('success' => false);

        $from_date = date('Y-m-d', strtotime($this->input->post('from_date')));
        $to_date = date('Y-m-d', strtotime($this->input->post('to_date')));
        $login_history = $this->user_auth->get_login_history('', $from_date, $to_date);
        // print_r( $login_history);
        // die();
        if ($login_history) {
            $response['success'] = true;
            $response['login_history'] = $login_history;
        }

        echo json_encode($response);
    }


    public function get_log_details_by_user()
    {
        $response = array('success' => false);

        $from_date = date('Y-m-d', strtotime($this->input->post('from_date')));
        $to_date = date('Y-m-d', strtotime($this->input->post('to_date')));
        $user_id = $this->input->post('u_id');
        $login_history = $this->user_auth->get_login_history($user_id, $from_date, $to_date);

        if ($login_history['result']) {
            $response['success'] = true;
            $response['login_history'] = $login_history;
        }

        echo json_encode($response);
    }

    /***************************************************************************/
    /********************************DOWNLOAD CSV*******************************/
    /***************************************************************************/

    public function csv_vendor_delivery_report()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');


        /**/
        $start_date = @$_POST['csv_start_date'];
        $end_date = @$_POST['csv_end_date'];
        $vendor_id = @$_POST['csv_vendor_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.vendor_id = " . $vendor_id . " and o.created BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data =  $this->order_model->get_orders_CSV($where);
        /**/

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($report_data, $delimiter, $newline);
        force_download('VendorDeliveries.csv', $data);
    }

    public function csv_driver_deliveries_report()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');


        /**/
        $start_date = @$_POST['csv_start_date'];
        $end_date = @$_POST['csv_end_date'];
        $driver_id = @$_POST['csv_driver_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.driver_id = " . $driver_id . " and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data = $data['orders'] =  $this->order_model->get_orders_CSV($where);
        /**/

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($report_data, $delimiter, $newline);
        force_download('DriverDeliveries.csv', $data);
    }

    public function csv_deliveries_report()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');


        /**/
        $start_date = @$_POST['csv_start_date'];
        $end_date = @$_POST['csv_end_date'];

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data = $data['orders'] =  $this->order_model->get_orders_CSV($where);
        /**/

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($report_data, $delimiter, $newline);
        force_download('Deliveries.csv', $data);
    }

    public function csv_status_deliveries_report()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');


        /**/
        $start_date = @$_POST['csv_start_date'];
        $end_date = @$_POST['csv_end_date'];
        $status = @$_POST['csv_status'];

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.status = '" . $status . "' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data =  $this->order_model->get_orders_CSV($where);
        /**/

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($report_data, $delimiter, $newline);
        force_download('StatusWiseDeliveries.csv', $data);
    }

    public function csv_food_reading_report()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');


        /**/
        $start_date = @$_POST['csv_start_date'];
        $end_date = @$_POST['csv_end_date'];

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where_date = "r.created_dt BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data =  $this->driver_model->get_food_reading_where_CSV($where_date, '');
        /**/

        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($report_data, $delimiter, $newline);
        force_download('FoodReadingReport.csv', $data);
    }

    public function bag_collection_report()
    {
        $this->load->view('report/v_bag_collection_report', $data = '');
    }

    public function user_activity()
    {
        $this->load->model('User_auth');

        if ($this->uri->segment(2) && $this->uri->segment(3)) {
            $from_date = $this->uri->segment(2);
            $to_date = $this->uri->segment(3);
        } else {
            $from_date = date("Y-m-d");
            $to_date = date("Y-m-d");
        }

        $where = array('activity_log.visiting_time >=' => $from_date, 'activity_log.visiting_time <=' => $to_date);
        $data['activity_logs'] = $this->User_auth->user_activity($where);
        $this->load->view('report/user_activity', $data);
    }

    // Server side datatable pagination 
    // Function For datatable server side paginaiton
    public function get_user_activity()
    {
        $this->load->model('User_auth');
        $data = $row = array();

        $activities =  $this->User_auth->get_user_activity($_POST);

        $i = $_POST['start'];
        foreach ($activities as $activity) {
            $i++;
            $data[] = array($i, $activity->full_name, $activity->phone, date('Y-m-d', strtotime($activity->visiting_time)), date('H:m:s', strtotime($activity->visiting_time)), $activity->page_url, $activity->ip_address);
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->User_auth->countAll(),
            "recordsFiltered" => $this->User_auth->countFiltered($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }


    public function print_backup_001($type = null, $ids = null)
    {
        if (!empty($type) and !empty($ids)) {
            $ids = explode(',', $ids);
            if ($type == 'bags') {
                $data['bags'] = $this->order_model->getBags($ids);
                //print_r($data);
            } else if ($type == 'orders' or $type == 'orders1' or $type == 'orders2' or $type == 'orders3') {
                // $data['orders'] = $this->order_model->getOrders($ids);
                $data['orders'] = $this->order_model->getOrders_details_N($ids);

                foreach ($data['orders'] as $key => $data_is) {

                    $customer_id = $data_is['customer_id'];
                    $delivery_address = $data_is['delivery_address'];
                    $delivery_time = $data_is['delivery_time'];

                    $findings = $this->order_model->get_latest_driver($customer_id, $delivery_address, $delivery_time);

                    if ($findings) {
                        $data['orders'][$key]['suggested_driver_name'] = $findings[0]->full_name;
                        $data['orders'][$key]['suggested_driver_id'] = $findings[0]->driver_id;
                        $data['orders'][$key]['new_delivery_check'] = 0;
                    } else {
                        $data['orders'][$key]['suggested_driver_name'] = 'New Delivery';
                        $data['orders'][$key]['suggested_driver_id'] = 0;
                        $data['orders'][$key]['new_delivery_check'] = 1;
                    }

                    //   dd($data_is);
                }
            } else if ($type == 'cashs') {
                $data['cashs'] = $this->order_model->getCashs($ids);
            } else {
                die("Invalid selection");
            }
            $data['col'] = 12 / 2;

            $data['check'] = 0;



            if ($type == 'orders1') {
                $this->load->view('labels_view', $data);
            } else if ($type == 'orders2') {
                $this->load->view('test_label_2', $data);
            } else if ($type == 'orders3') {
                $this->load->view('test_label_3', $data);
            } else {
                $this->load->view('print_reports', $data);
            }
        }
    }


    public function print($type = null, $ids = null)
    {
        if (!empty($type) and !empty($ids)) {
            $ids = explode(',', $ids);
            if ($type == 'bags') {
                $data['bags'] = $this->order_model->getBags($ids);
                //print_r($data);
            } else if ($type == 'orders' or $type == 'orders1' or $type == 'orders2' or $type == 'orders3' or $type == 'orders_test' or $type == 'compacts_prints') {
                // $data['orders'] = $this->order_model->getOrders($ids);
                $data['orders'] = $this->order_model->getOrders_details_N($ids);

                foreach ($data['orders'] as $key => $data_is) {

                    $customer_id = $data_is['customer_id'];
                    $delivery_address = $data_is['delivery_address'];
                    $delivery_time = $data_is['delivery_time'];

                    $delivery_address = str_replace("'", "", $delivery_address);

                    $findings = $this->order_model->get_latest_driver($customer_id, $delivery_address, $delivery_time);

                    if ($findings) {
                        $data['orders'][$key]['suggested_driver_name'] = $findings[0]->full_name;
                        $data['orders'][$key]['suggested_driver_id'] = $findings[0]->driver_id;
                        $data['orders'][$key]['new_delivery_check'] = 0;
                    } else {
                        $data['orders'][$key]['suggested_driver_name'] = 'New Delivery';
                        $data['orders'][$key]['suggested_driver_id'] = 0;
                        $data['orders'][$key]['new_delivery_check'] = 1;
                    }

                    //   dd($data_is);
                }

                // ******** SUGGESTED DRIVER ***************//

                foreach ($data['orders'] as $key => $data_is) {

                    $customer_id = $data_is['customer_id'];
                    $delivery_address = $data_is['delivery_address'];
                    $delivery_time = $data_is['delivery_time'];


                    //   $day = date('D');
                    $paymentDate = $data_is['delivery_date'];
                    $day = date('D', strtotime($paymentDate));

                    // 1 for Sunday , 7 for Saturday
                    if ($day == 'Sat') {
                        $weekday_check = 7;
                    } else if ($day == 'Sun') {
                        $weekday_check = 1;
                    } else {
                        $weekday_check = 0;
                    }

                    if ($weekday_check) {
                        //   Today is weekend
                        $findings = $this->order_model->get_latest_driver_weekends($customer_id, $delivery_address, $delivery_time, $weekday_check);
                        if ($findings) {
                            $data['orders'][$key]['suggested_driver_name'] = $findings[0]->full_name;
                            $data['orders'][$key]['suggested_driver_id']  = $findings[0]->driver_id;
                            $data['orders'][$key]['new_delivery_check']   = 0;
                            $data['orders'][$key]['date_was']             = $findings[0]->delivery_date;
                            $data['orders'][$key]['day_was']              = $findings[0]->day;
                        } else {
                            $check_for_new_delivery = $this->order_model->check_for_new_delivery_($customer_id, $delivery_address, $delivery_time);
                            //  dd($check_for_new_delivery);
                            if ($check_for_new_delivery) {
                                $data['orders'][$key]['suggested_driver_name'] = 'NA';
                                $data['orders'][$key]['suggested_driver_id']  = 0;
                                $data['orders'][$key]['new_delivery_check']   = 0;
                                $data['orders'][$key]['date_was']             = $check_for_new_delivery[0]->delivery_date;
                                $data['orders'][$key]['day_was']              = $check_for_new_delivery[0]->day;
                            } else {
                                //   Delivery is new no data found for any day of week
                                $data['orders'][$key]['suggested_driver_name'] = 'New Delivery';
                                $data['orders'][$key]['suggested_driver_id']  = 0;
                                $data['orders'][$key]['new_delivery_check']   = 1;
                                $data['orders'][$key]['date_was']             = 'NA';
                                $data['orders'][$key]['day_was']              = 'No result found';
                            }
                        }
                    } else {
                        //   Today is a weekday
                        $findings = $this->order_model->get_latest_driver_weekdays($customer_id, $delivery_address, $delivery_time);

                        if ($findings) {
                            $data['orders'][$key]['suggested_driver_name'] = $findings[0]->full_name;
                            $data['orders'][$key]['suggested_driver_id']  = $findings[0]->driver_id;
                            $data['orders'][$key]['new_delivery_check']   = 0;
                            $data['orders'][$key]['date_was']             = $findings[0]->delivery_date;
                            $data['orders'][$key]['day_was']              = $findings[0]->day;
                        } else {


                            $check_for_new_delivery = $this->order_model->check_for_new_delivery_($customer_id, $delivery_address, $delivery_time);
                            if ($check_for_new_delivery) {
                                $data['orders'][$key]['suggested_driver_name'] = 'NA';
                                $data['orders'][$key]['suggested_driver_id']  = 0;
                                $data['orders'][$key]['new_delivery_check']   = 0;
                                $data['orders'][$key]['date_was']             = $check_for_new_delivery[0]->delivery_date;
                                $data['orders'][$key]['day_was']              = $check_for_new_delivery[0]->day;
                            } else {
                                //   Delivery is new no data found for any day of week
                                $data['orders'][$key]['suggested_driver_name'] = 'New Delivery';
                                $data['orders'][$key]['suggested_driver_id']  = 0;
                                $data['orders'][$key]['new_delivery_check']   = 1;
                                $data['orders'][$key]['date_was']             = 'NA';
                                $data['orders'][$key]['day_was']              = 'No result found';
                            }
                        }
                    }
                } //END


                // **********************************************//            



            } else if ($type == 'cashs') {
                $data['cashs'] = $this->order_model->getCashs($ids);
            } else {
                die("Invalid selection");
            }
            $data['col'] = 12 / 2;

            $data['check'] = 0;



            if ($type == 'orders1') {
                $this->load->view('labels_view', $data);
            } else if ($type == 'orders2') {
                $this->load->view('test_label_2', $data);
            } else if ($type == 'orders3') {
                $this->load->view('test_label_3', $data);
            } else if ($type == 'orders_test') {
                // $this->load->view('test_label_2_test', $data);
                $this->load->view('compact_prints', $data);
            } else if ($type == 'compacts_prints') {
                $this->load->view('compact_prints', $data);
            } else {
                $this->load->view('print_reports', $data);
            }
        }
    }


    public function AC_print($type = null, $ids = null)
    {
        if (!empty($type) and !empty($ids)) {
            $ids = explode(',', $ids);
            if ($type == 'bags') {
                $data['bags'] = $this->order_model->getBags($ids);
                //print_r($data);
            } else if ($type == 'orders') {
                $data['orders'] = $this->order_model->getOrders($ids);
            } else {
                die("Invalid selection");
            }
            $data['col'] = 12 / 2;

            $data['check'] = 1;
            $this->load->view('print_reports', $data);
        }
    }




    // FEEDBACK

    public function positive_feedback()
    {
        $this->load->model('Vendor_model');
        $data['vendors'] =  $this->Vendor_model->get_where(array());


        $start_date = date('Y-m-d h:i:s');



        $end_date = date('Y-m-d h:i:s');


        $where = "f.role_id =4  and f.status ='Satisfied'  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $res = $this->order_model->get_feedback($where);
        $data['records'] = $res['records'];




        // echo '<pre>';
        // print_r($data['records']);
        // die();
        $this->load->view('report/positive_feedback', $data);
    }


    public function negative_feedback()
    {
        $this->load->model('Vendor_model');
        $data['vendors'] =  $this->Vendor_model->get_where(array());


        $start_date = date('Y-m-d h:i:s');



        $end_date = date('Y-m-d h:i:s');


        $where = "f.role_id =4  and f.status ='Pending' and complaint_count=1  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $res = $this->order_model->get_feedback($where);
        $data['records'] = $res['records'];




        // echo '<pre>';
        // print_r($this->db->last_query());
        // print_r($data['records']);
        // die();
        $this->load->view('report/negative_feedback', $data);
    }

    public function negative_feedback_details()
    {
        $this->load->model('Vendor_model');
        $data['vendors'] =  $this->Vendor_model->get_where(array());


        $start_date = date('Y-m-d h:i:s');



        $end_date = date('Y-m-d h:i:s');


        $where = "f.role_id =4  and f.status ='Solved' and complaint_count=1  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $res = $this->order_model->get_feedback($where);
        $data['records'] = $res['records'];




        // echo '<pre>';
        // print_r($data['records']);
        // die();
        $this->load->view('report/negative_feedback_detail', $data);
    }




    public function vendor_feedback()
    {
        $this->load->model('Vendor_model');
        $data['vendors'] =  $this->Vendor_model->get_where(array());


        $start_date = date('Y-m-d h:i:s');



        $end_date = date('Y-m-d h:i:s');


        $where = "f.role_id =2  and f.status ='Pending'  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $res = $this->order_model->get_feedback_vendor($where);
        $data['records'] = $res['records'];




        // echo '<pre>';
        // print_r($data['records']);
        // die();
        $this->load->view('report/vendors_suggestions', $data);
    }

    // for vendor

    public function get_vendor_suggestion_by_()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];
        $op = @$_POST['op'];

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s');
        }
        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }


        $where = "f.user_id = " . $vendor_id . " and f.role_id =2  and f.status ='" . $op . "'  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data = $data['orders'] =  $this->order_model->get_feedback_vendor($where);

        // $report_data=$where;

        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        // print_r($report_data);
        echo json_encode($response);
    }


    // Update Feedback status

    public function update_feedback_status()
    {
        $id = @$_POST['id'];
        $status = @$_POST['status'];
        $msg = @$_POST['msg'];

        if ($msg == '') {

            $msg = "We are sorry about the difficulty you encountered.
        We are working on it and promise to serve you the best services possible always.
        Please accept our apologies.
        
        Team L O G X";
        }


        $data = array(
            'status' => $status
        );

        $where = "id = " . $id;

        $res = $this->order_model->update_feedback_status($where, $data);

        $x = $this->order_model->feedback_reply_notification($where, $msg);

        // echo $x;

        if ($res) {
            echo "success";
            // print_r($x);
        } else {
            echo "error";
            // print_r($x);
        }
    }

    // For customer
    public function get_deliveries_positive_report_by_vendor()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];


        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s');
        }
        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }

        $where = "o.vendor_id = " . $vendor_id . " and f.role_id =4  and f.status ='Satisfied'  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        $report_data = $data['orders'] =  $this->order_model->get_feedback($where);

        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        // print_r($report_data);
        echo json_encode($response);
    }


    // for negative feedback customers

    public function get_deliveries_negative_report_by_()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        // $vendor_id = @$_POST['vendor_id'];


        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s');
        }
        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }


        $where = "f.role_id =4  and f.status ='Pending' and complaint_count=1  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

        $report_data = $data['orders'] =  $this->order_model->get_feedback($where);

        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        // print_r($report_data);
        echo json_encode($response);
    }




    // for negative feedback details filter
    public function get_deliveries_negative_details_by_()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];
        $op = @$_POST['op'];

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s');
        }
        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }


        if ($op != 'ALL') {
            if ($vendor_id) {
                $where = "o.vendor_id = " . $vendor_id . " and f.role_id =4  and f.status ='" . $op . "' and complaint_count=1  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
            } else {
                $where = "f.role_id =4  and f.status ='" . $op . "' and complaint_count=1  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
            }
        } else {

            if ($vendor_id) {
                $where = "o.vendor_id = " . $vendor_id . " and f.role_id =4  and (f.status ='Pending' or f.status ='Solved') and complaint_count=1  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
            } else {
                $where = "f.role_id =4  and (f.status ='Pending' or f.status ='Solved') and complaint_count=1  and f.reported_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
            }
        }


        $report_data = $data['orders'] =  $this->order_model->get_feedback($where);

        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        // print_r($report_data);
        echo json_encode($response);
    }



    public function AC_get_driver_balance_report_by_date()
    {

        $this->load->model('driver_model');

        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $driver_id = @$_POST['status'];


        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s');
        }
        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }


        $where = "driver_id=" . $driver_id . "  and added_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

        $report_data = $data['orders'] =  $this->driver_model->get_driver_account_detail($where);
        $pd = $this->driver_model->get_driver_pending_dues($driver_id);
        $tt = $this->driver_model->get_driver_taken_dues($driver_id);
        // $tg=$this->driver_model->get_driver_pending_dues($driver_id);

        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
            $response['pd'] = $pd[0]->Pendings;
            $response['tt'] = $tt[0]->tt;
            $response['tr'] = $tt[0]->tr;
        }

        // print_r($response);
        echo json_encode($response);
    }


    public function vendor_deliveries_complete_report()
    {

        $this->load->model('Vendor_model');
        $this->load->model('driver_model');

        $data['vendors'] =  $this->Vendor_model->get_where(array());
        $extra['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
        $data['dtypes'] = $this->driver_model->get_combinations($extra['old_emirites_typ']);
        // echo '<pre>';
        // print_r($data);
        // die();
        $this->load->view('report/vendor_deliveries_complete_report', $data);
    }

    public function get_deliveries_report_by_vendor_every_detail()
    {

        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $vendor_id = @$_POST['vendor_id'];
        $status = 0;

        if (!$start_date) {
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }


        //   if($this->session->userdata('role') == 'admin' OR strtolower($this->session->userdata('role')) == 'vendor'){

        if ($vendor_id) {

            //   $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.own_bag_rcv_by_dt  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";

            $where = "o.driver_id > 0 and  v.status='" . $status . "' and (o.status='Collected' or o.status = 'Delivered') and o.cooling_bag_check !=3 and o.vendor_id='" . $vendor_id . "' and (o.delivery_date  BETWEEN '" . $start_date . " 00:00:00' and '" . $end_date . " 23:59:59' or o.varified_at  BETWEEN '" . $start_date . " 00:00:00' and '" . $end_date . " 23:59:59')";
        }
        // }else{

        //     //  $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.own_bag_rcv_by_dt BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";


        // }

        $report_data = $data['orders'] =  $this->order_model->get_tracking_statistics_details($vendor_id, $start_date, $end_date, $where);

        // $report_data = $data['orders'] =  $this->order_model->get_orders($where);

        // echo '<pre>';
        // print_r($report_data);

        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        echo json_encode($response);
    }


    // _15feb

    public function get_deliveries_report_by_forcefully()
    {

        $response = array('success' => false, 'data' => array(), 'recordsTotal' => 0, 'recordsFiltered' => 0, 'all_post' => $this->input->post());
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $status = @$this->input->post('status');
        $start = !empty($this->input->post('start')) ? $this->input->post('start') : 0;
        $length = !empty($this->input->post('length')) ? $this->input->post('length') : 50;

        if (empty($start_date)) {
            $start_date = date('Y-m-d');
        }

        if (empty($end_date)) {
            $end_date = date('Y-m-d', strtotime('+1 days'));
        }


        //exit($start_date.'________'.$end_date);
        // if(strtolower($this->session->userdata('role')) == 'vendor'){
        //     $vendor_id = $this->session->userdata('u_id');
        //     $where = "o.driver_id > 0 AND o.vendor_id=".$vendor_id." AND (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        // }else{
        //  $where = "o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";

        // $where = "o.driver_id > 0 and (o.delivered_status = 1) AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        // }

        if (strtolower($this->session->userdata('role')) == 'admin') {

            $where = "o.forcely_check ='yes'  AND  o.forcely_changed_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' AND '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else { }

        //if searching is requested
        $search = null;
        if (!empty($this->input->post('search')['value'])) {
            $search = $this->input->post('search')['value'];
            $where .= " AND (o.bag_qr LIKE '%" . $search . "%' OR o.name_on_delivery LIKE '%" . $search . "%' OR o.number_on_delivery LIKE '%" . $search . "%' OR o.delivery_time LIKE '%" . $search . "%' OR c.full_name LIKE '%" . $search . "%' OR d.full_name LIKE '%" . $search . "%' OR v.full_name LIKE '%" . $search . "%' OR o.delivery_address LIKE '%" . $search . "%' OR o.delivery_time LIKE '%" . $search . "%' OR o.food_type LIKE '%" . $search . "%' OR o.pickUp LIKE '%" . $search . "%' OR c.phone LIKE '%" . $search . "%' OR d.phone LIKE '%" . $search . "%' OR v.phone LIKE '%" . $search . "%')";
        }
        $response['search'] = $search;

        //sorting code
        if (!empty($this->input->post('order'))) {
            $table_order = $this->input->post('order')[0];
            $col_num = $table_order['column'];
            $order_dir = $table_order['dir'];
            switch ($col_num) {

                case 1:
                    $col_name = 'o.order_id';
                    break;
                case 8:
                    $col_name = 'o.bag_qr';
                    break;
                case 13:
                    $col_name = 'o.name_on_delivery';
                    break;
                case 17:
                    // o.delivery_date
                    $col_name = 'd.full_name';
                    break;
                case 18:
                    $col_name = 'v.full_name';
                    break;
                case 19:
                    $col_name = 'o.assign_date';
                    break;
                case 21:
                    $col_name = 'o.delivered_date';
                    break;

                default:
                    $col_name = null;
                    break;
            }
        }
        //end sorting

        $report_data =  $this->order_model->get_orders_where_forcefully($where, $start, $length, $col_name, $order_dir);
        if (count($report_data) > 0) {
            $response['success'] = true;
            $response['data'] = $report_data;
            $response['draw'] = $this->input->post('draw');
            $response['recordsTotal'] = $this->order_model->get_total_results_new($where);
            $response['recordsFiltered'] = $response['recordsTotal'];
        }
        // echo '<pre>';
        // print_r($response);
        //  echo '<pre>';
        // die();

        echo json_encode($response);
    }


    // BAG PICKUPS START

    public function get_notAssigned_bagpicks()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];
        $vendor_id = $_POST['id'];
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused'  and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

            if ($vendor_id) {
                $where = $where . " and o.vendor_id = " . $vendor_id;
            }

            if ($emirate_id) {
                $where = $where . " and o.emirateID = " . $emirate_id;
            }

            if ($time_id) {
                $where = $where . " and o.slotID = " . $time_id;
            }
        }

        $report_data =  $this->order_model->get_orders($where);



        // dd($report_data);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        //   echo '<pre>';
        //   print_r($response);
        //   die();
        echo json_encode($response);
    }

    public function get_Assigned_bagpicks()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];
        $vendor_id = $_POST['id'];
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused'    and o.bag_pickup_status='assigned' and o.is_cancelled='no' and b.created_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

            if ($vendor_id) {
                $where = $where . " and o.vendor_id = " . $vendor_id;
            }

            if ($emirate_id) {
                $where = $where . " and o.emirateID = " . $emirate_id;
            }

            if ($time_id) {
                $where = $where . " and o.slotID = " . $time_id;
            }

            $where = $where . " and b.pickup_status = 'Pending' and b.delivery_id > 0";
        }

        $report_data =  $this->order_model->get_orders_basic_inf_bg_pickups($where);



        // dd($report_data);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        //   echo '<pre>';
        //   print_r($response);
        //   die();
        echo json_encode($response);
    }

    public function get_collected_bagpicks()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];
        $vendor_id = $_POST['id'];
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused'    and o.bag_pickup_status='assigned' and o.is_cancelled='no' and b.created_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

            if ($vendor_id) {
                $where = $where . " and o.vendor_id = " . $vendor_id;
            }

            if ($emirate_id) {
                $where = $where . " and o.emirateID = " . $emirate_id;
            }

            if ($time_id) {
                $where = $where . " and o.slotID = " . $time_id;
            }

            $where = $where . " and b.pickup_status = 'Collected' and b.delivery_id > 0";
        }

        $report_data =  $this->order_model->get_orders_basic_inf_bg_pickups_detailed($where);



        // dd($report_data);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        //   echo '<pre>';
        //   print_r($response);
        //   die();
        echo json_encode($response);
    }

    public function get_canceled_bagpicks()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];
        $vendor_id = $_POST['id'];
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused'    and o.bag_pickup_status='assigned' and o.is_cancelled='yes' and b.created_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

            if ($vendor_id) {
                $where = $where . " and o.vendor_id = " . $vendor_id;
            }

            if ($emirate_id) {
                $where = $where . " and o.emirateID = " . $emirate_id;
            }

            if ($time_id) {
                $where = $where . " and o.slotID = " . $time_id;
            }

            $where = $where . " and b.pickup_status = 'Cancelled' ";
        }

        $report_data =  $this->order_model->get_orders_basic_inf_bg_pickups_detailed($where, true);



        // dd($report_data);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        //   echo '<pre>';
        //   print_r($response);
        //   die();
        echo json_encode($response);
    }

    public function get_req_canceled_bagpicks()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];
        $vendor_id = $_POST['id'];
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused'    and o.bag_pickup_status='assigned' and o.is_cancelled='no' and b.created_at BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59' and  b.driver_cancel_request=1";

            if ($vendor_id) {
                $where = $where . " and o.vendor_id = " . $vendor_id;
            }

            if ($emirate_id) {
                $where = $where . " and o.emirateID = " . $emirate_id;
            }

            if ($time_id) {
                $where = $where . " and o.slotID = " . $time_id;
            }
        }

        $report_data =  $this->order_model->get_orders_basic_inf_bg_pickups_detailed($where);



        // dd($report_data);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        //   echo '<pre>';
        //   print_r($response);
        //   die();
        echo json_encode($response);
    }

    public function get_notAssigned_bagpicks_partner_wiseee()
    {
        $response = array('success' => false);
        $start_date = @$_POST['start_date'];
        $end_date = @$_POST['end_date'];
        $status = @$_POST['status'];
        $vendor_id = $_POST['id'];
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused'  and (o.status = 'Not Assign' OR o.status = 'Assign') and o.bag_pickup_status='unassigned' and o.is_cancelled='no' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

            if ($vendor_id) {
                $where = $where . " and o.vendor_id = " . $vendor_id;
            }

            if ($emirate_id) {
                $where = $where . " and o.emirateID = " . $emirate_id;
            }

            if ($time_id) {
                $where = $where . " and o.slotID = " . $time_id;
            }
        }


        $report_data  =  $this->order_model->get_unassigned_bagpicks_partnerwise_detail($where);


        // dd($report_data);
        if ($report_data['result']) {
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }

        //   echo '<pre>';
        //   print_r($response);
        //   die();
        echo json_encode($response);
    }

    // END BAG PICKUPS


    public function get_deliveries_report_by_notAssigned_paginated()
    {
        set_time_limit(0);
        $response = array('success' => false, 'data' => array(), 'recordsTotal' => 0, 'recordsFiltered' => 0, 'all_post' => $this->input->post());
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $status = @$this->input->post('status');
        $start = !empty($this->input->post('start')) ? $this->input->post('start') : 0;
        $length = !empty($this->input->post('length')) ? $this->input->post('length') : 50;

        $vendor_id = $_POST['id'];
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];

        // $vendor_id   = 0;
        // $time_id     = 0;
        // $emirate_id  = 0;

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and o.status = 'Not Assign' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.status = 'Not Assign' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

            if ($vendor_id) {
                $where = $where . " and o.vendor_id = " . $vendor_id;
            }

            if ($emirate_id) {
                $where = $where . " and o.emirateID = " . $emirate_id;
            }

            if ($time_id) {
                $where = $where . " and o.slotID = " . $time_id;
            }
        }



        //if searching is requested
        $search = null;
        if (!empty($this->input->post('search')['value'])) {
            $search = $this->input->post('search')['value'];

            $data_search   = preg_split('/\s+/', $search);
            // getting parts of search string as array 

            $searchs = $data_search;
            // echo '<pre>';
            // print_r($data_search);
            // die();

            foreach ($searchs as $search) {
                $where .= " AND (o.order_id LIKE '%" . $search . "%' OR sug.full_name LIKE '%" . $search . "%' OR sug.phone LIKE '%" . $search . "%' OR o.number_on_delivery LIKE '%" . $search . "%' OR o.delivery_time LIKE '%" . $search . "%' OR c.full_name LIKE '%" . $search . "%' OR v.full_name LIKE '%" . $search . "%' OR o.delivery_address LIKE '%" . $search . "%' OR o.delivery_time LIKE '%" . $search . "%' OR o.food_type LIKE '%" . $search . "%' OR o.pickUp LIKE '%" . $search . "%' OR c.phone LIKE '%" . $search . "%'  OR v.phone LIKE '%" . $search . "%')";
            }
            //   echo '<pre>';
            // echo $where.'<br>';
            // die();

        }
        $response['search'] = $search;
        // dd($response['search']);
        //sorting code
        if (!empty($this->input->post('order'))) {
            $table_order = $this->input->post('order')[0];
            $col_num = $table_order['column'];
            $order_dir = $table_order['dir'];
            switch ($col_num) {

                case 1:
                    $col_name = 'o.order_id';
                    break;

                case 2:
                    $col_name = 'sug.full_name';
                    break;

                case 3:
                    $col_name = 'o.plan_id';
                    break;

                case 4:
                    $col_name = 'c.full_name';
                    break;

                case 7:
                    $col_name = 'o.delivery_time';
                    break;


                case 8:
                    $col_name = 'v.full_name';
                    break;


                default:
                    $col_name = null;
                    break;
            }
        }
        //end sorting





        // echo '<pre> whr:'.$where.' <br>strt:'.$start.' <br> length:'.$length.' <br> colnm:'.$col_name.' <br> dir:'.$order_dir;

        $report_data =  $this->order_model->get_orders_pagination($where, false, $start, $length, $col_name, $order_dir);
        // $report_data =  $this->order_model->get_orders_where($where, $start, $length, $col_name, $order_dir);
        // dd($report_data);
        if (count($report_data) > 0) {
            // ******** SUGGESTED DRIVER ***************//

            foreach ($report_data as $key => $data_is) {
                if ($data_is['suggested_driver_id']) {
                    //   driver suggestion exist in db
                    $report_data[$key]['new_delivery_check']   = 0;
                } else {
                    //when no suggtion of driver in database

                    $customer_id = $data_is['customer_id'];
                    $delivery_address = $data_is['delivery_address'];
                    $delivery_time = $data_is['delivery_time'];

                    $delivery_address = str_replace("'", "", $delivery_address);

                    //   $day = date('D');
                    $paymentDate = $data_is['delivery_date'];
                    $day = date('D', strtotime($paymentDate));

                    // 1 for Sunday , 7 for Saturday
                    if ($day == 'Sat') {
                        $weekday_check = 7;
                    } else if ($day == 'Sun') {
                        $weekday_check = 1;
                    } else {
                        $weekday_check = 0;
                    }

                    if ($weekday_check) {
                        //   Today is weekend
                        $findings = $this->order_model->get_latest_driver_weekends($customer_id, $delivery_address, $delivery_time, $weekday_check);
                        if ($findings) {
                            $report_data[$key]['suggested_driver_name'] = $findings[0]->full_name;
                            $report_data[$key]['suggested_driver_id']  = $findings[0]->driver_id;
                            $report_data[$key]['new_delivery_check']   = 0;
                            $report_data[$key]['date_was']             = $findings[0]->delivery_date;
                            $report_data[$key]['day_was']              = $findings[0]->day;
                            $report_data[$key]['suggested_driver_phone'] = $findings[0]->phone;


                            $data_in = array('suggested_driver_id' => $findings[0]->driver_id, 'last_assigned_date' => $findings[0]->delivery_date);
                            $where_info = "order_id =" . $data_is['order_id'];
                            $in_res = $this->order_model->update($data_in, $where_info);
                        } else {
                            $check_for_new_delivery = $this->order_model->check_for_new_delivery_($customer_id, $delivery_address, $delivery_time);
                            //  dd($check_for_new_delivery);
                            if ($check_for_new_delivery) {
                                $report_data[$key]['suggested_driver_name'] = 'NA';
                                $report_data[$key]['suggested_driver_id'] = 0;
                                $report_data[$key]['new_delivery_check'] = 0;
                                $report_data[$key]['date_was'] = $check_for_new_delivery[0]->delivery_date;
                                $report_data[$key]['day_was'] = $check_for_new_delivery[0]->day;
                                $report_data[$key]['suggested_driver_phone'] = '';
                            } else {
                                //   Delivery is new no data found for any day of week
                                $report_data[$key]['suggested_driver_name'] = 'New Delivery';
                                $report_data[$key]['suggested_driver_id'] = 0;
                                $report_data[$key]['new_delivery_check'] = 1;
                                $report_data[$key]['date_was'] = 'NA';
                                $report_data[$key]['day_was'] = 'No result found';
                                $report_data[$key]['suggested_driver_phone'] = '';
                            }
                        }
                    } else {
                        //   Today is a weekday
                        $findings = $this->order_model->get_latest_driver_weekdays($customer_id, $delivery_address, $delivery_time);

                        if ($findings) {
                            $report_data[$key]['suggested_driver_name'] = $findings[0]->full_name;
                            $report_data[$key]['suggested_driver_id'] = $findings[0]->driver_id;
                            $report_data[$key]['new_delivery_check'] = 0;
                            $report_data[$key]['date_was'] = $findings[0]->delivery_date;
                            $report_data[$key]['day_was'] = $findings[0]->day;
                            $report_data[$key]['suggested_driver_phone'] = $findings[0]->phone;

                            $data_in = array('suggested_driver_id' => $findings[0]->driver_id, 'last_assigned_date' => $findings[0]->delivery_date);
                            $where_info = "order_id =" . $data_is['order_id'];
                            $in_res = $this->order_model->update($data_in, $where_info);
                        } else {


                            $check_for_new_delivery = $this->order_model->check_for_new_delivery_($customer_id, $delivery_address, $delivery_time);
                            if ($check_for_new_delivery) {
                                $report_data[$key]['suggested_driver_name'] = 'NA';
                                $report_data[$key]['suggested_driver_id'] = 0;
                                $report_data[$key]['new_delivery_check'] = 0;
                                $report_data[$key]['date_was'] = $check_for_new_delivery[0]->delivery_date;
                                $report_data[$key]['day_was'] = $check_for_new_delivery[0]->day;
                                $report_data[$key]['suggested_driver_phone'] = '';
                            } else {
                                //   Delivery is new no data found for any day of week
                                $report_data[$key]['suggested_driver_name'] = 'New Delivery';
                                $report_data[$key]['suggested_driver_id'] = 0;
                                $report_data[$key]['new_delivery_check'] = 1;
                                $report_data[$key]['date_was'] = 'NA';
                                $report_data[$key]['day_was'] = 'No result found';
                                $report_data[$key]['suggested_driver_phone'] = '';
                            }
                        }
                    }
                }
            } //END loop


            // **********************************************//
        }


        if (count($report_data) > 0) {
            $response['success'] = true;
            $response['data'] = $report_data;
            $response['draw'] = $this->input->post('draw');
            $response['recordsTotal'] = $this->order_model->get_total_results_new_pagii($where);
            $response['recordsFiltered'] = $response['recordsTotal'];
        }
        //  dd($response);

        echo json_encode($response);
    }





    public function get_deliveries_report_by_notAssigned_paginatedTESTTT()
    {
        set_time_limit(0);
        $response = array('success' => false, 'data' => array(), 'recordsTotal' => 0, 'recordsFiltered' => 0, 'all_post' => $this->input->post());
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $status = @$this->input->post('status');
        $start = !empty($this->input->post('start')) ? $this->input->post('start') : 0;
        $length = !empty($this->input->post('length')) ? $this->input->post('length') : 50;

        $vendor_id = $_POST['id'];
        $time_id = $_POST['time_id'];
        $emirate_id = $_POST['emirate_id'];

        // $vendor_id   = 0;
        // $time_id     = 0;
        // $emirate_id  = 0;

        if (!$start_date) {
            $start_date = date('Y-m-d h', strtotime($start_date));
        }

        if (!$end_date) {
            $end_date = date('Y-m-d h:i:s');
        }
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.vendor_id = " . $vendor_id . " and o.status = 'Not Assign' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            $where = "o.action != 'Freezed' and o.action != 'Paused' and o.status = 'Not Assign' and o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' and '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";

            if ($vendor_id) {
                $where = $where . " and o.vendor_id = " . $vendor_id;
            }

            if ($emirate_id) {
                $where = $where . " and o.emirateID = " . $emirate_id;
            }

            if ($time_id) {
                $where = $where . " and o.slotID = " . $time_id;
            }
        }



        //if searching is requested
        $search = null;
        if (!empty($this->input->post('search')['value'])) {
            $search = $this->input->post('search')['value'];

            $data_search   = preg_split('/\s+/', $search);

            $searchs = $data_search;
            // echo '<pre>';
            // print_r($data_search);
            // die();

            foreach ($searchs as $search) {
                $where .= " AND (o.order_id LIKE '%" . $search . "%' OR sug.full_name LIKE '%" . $search . "%' OR sug.phone LIKE '%" . $search . "%' OR o.number_on_delivery LIKE '%" . $search . "%' OR o.delivery_time LIKE '%" . $search . "%' OR c.full_name LIKE '%" . $search . "%' OR v.full_name LIKE '%" . $search . "%' OR o.delivery_address LIKE '%" . $search . "%' OR o.delivery_time LIKE '%" . $search . "%' OR o.food_type LIKE '%" . $search . "%' OR o.pickUp LIKE '%" . $search . "%' OR c.phone LIKE '%" . $search . "%'  OR v.phone LIKE '%" . $search . "%')";
            }
            //   echo '<pre>';
            // echo $where.'<br>';
            // die();

        }
        $response['search'] = $search;
        // dd($response['search']);
        //sorting code
        if (!empty($this->input->post('order'))) {
            $table_order = $this->input->post('order')[0];
            $col_num = $table_order['column'];
            $order_dir = $table_order['dir'];
            switch ($col_num) {

                case 1:
                    $col_name = 'o.order_id';
                    break;

                case 2:
                    $col_name = 'sug.full_name';
                    break;

                case 3:
                    $col_name = 'o.plan_id';
                    break;

                case 4:
                    $col_name = 'c.full_name';
                    break;

                case 7:
                    $col_name = 'o.delivery_time';
                    break;


                case 8:
                    $col_name = 'v.full_name';
                    break;


                default:
                    $col_name = null;
                    break;
            }
        }
        //end sorting



        $testarr = array();

        // echo '<pre> whr:'.$where.' <br>strt:'.$start.' <br> length:'.$length.' <br> colnm:'.$col_name.' <br> dir:'.$order_dir;

        $report_data =  $this->order_model->get_orders_pagination($where, false, $start, $length, $col_name, $order_dir);
        // $report_data =  $this->order_model->get_orders_where($where, $start, $length, $col_name, $order_dir);
        // dd($report_data);
        if (count($report_data) > 0) {
            // ******** SUGGESTED DRIVER ***************//
            // dd($report_data);
            foreach ($report_data as $key => $data_is) {
                if ($data_is['suggested_driver_id']) {
                    //   driver suggestion exist in db
                    $report_data[$key]['new_delivery_check']   = 0;
                } else {
                    //when no suggtion of driver in database

                    $customer_id = $data_is['customer_id'];
                    $delivery_address = $data_is['delivery_address'];
                    $delivery_time = $data_is['delivery_time'];

                    $delivery_address = str_replace("'", "", $delivery_address);

                    //   $day = date('D');
                    $paymentDate = $data_is['delivery_date'];
                    $day = date('D', strtotime($paymentDate));

                    // 1 for Sunday , 7 for Saturday
                    if ($day == 'Sat') {
                        $weekday_check = 7;
                    } else if ($day == 'Sun') {
                        $weekday_check = 1;
                    } else {
                        $weekday_check = 0;
                    }

                    if ($weekday_check) {
                        //   Today is weekend
                        $findings = $this->order_model->get_latest_driver_weekends($customer_id, $delivery_address, $delivery_time, $weekday_check);
                        if ($findings) {
                            $report_data[$key]['suggested_driver_name'] = $findings[0]->full_name;
                            $report_data[$key]['suggested_driver_id']  = $findings[0]->driver_id;
                            $report_data[$key]['new_delivery_check']   = 0;
                            $report_data[$key]['date_was']             = $findings[0]->delivery_date;
                            $report_data[$key]['day_was']              = $findings[0]->day;
                            $report_data[$key]['suggested_driver_phone'] = $findings[0]->phone;


                            $data_in = array('suggested_driver_id' => $findings[0]->driver_id, 'last_assigned_date' => $findings[0]->delivery_date);
                            $where_info = "order_id =" . $data_is['order_id'];
                            $in_res = $this->order_model->update($data_in, $where_info);
                        } else {
                            $check_for_new_delivery = $this->order_model->check_for_new_delivery_($customer_id, $delivery_address, $delivery_time);
                            //  dd($check_for_new_delivery);
                            if ($check_for_new_delivery) {
                                $report_data[$key]['suggested_driver_name'] = 'NA';
                                $report_data[$key]['suggested_driver_id'] = 0;
                                $report_data[$key]['new_delivery_check'] = 0;
                                $report_data[$key]['date_was'] = $check_for_new_delivery[0]->delivery_date;
                                $report_data[$key]['day_was'] = $check_for_new_delivery[0]->day;
                                $report_data[$key]['suggested_driver_phone'] = '';
                            } else {
                                //   Delivery is new no data found for any day of week
                                $report_data[$key]['suggested_driver_name'] = 'New Delivery';
                                $report_data[$key]['suggested_driver_id'] = 0;
                                $report_data[$key]['new_delivery_check'] = 1;
                                $report_data[$key]['date_was'] = 'NA';
                                $report_data[$key]['day_was'] = 'No result found';
                                $report_data[$key]['suggested_driver_phone'] = '';
                            }
                        }
                    } else {
                        //   Today is a weekday


                        $testarr[$key]['msg'] = 'FINDINGS';
                        $testarr[$key]['custid'] = $customer_id;
                        $testarr[$key]['addr'] = $delivery_address;
                        $testarr[$key]['time'] = $delivery_time;

                        $findings = $this->order_model->get_latest_driver_weekdays($customer_id, $delivery_address, $delivery_time);

                        if ($findings) {
                            $report_data[$key]['suggested_driver_name'] = $findings[0]->full_name;
                            $report_data[$key]['suggested_driver_id'] = $findings[0]->driver_id;
                            $report_data[$key]['new_delivery_check'] = 0;
                            $report_data[$key]['date_was'] = $findings[0]->delivery_date;
                            $report_data[$key]['day_was'] = $findings[0]->day;
                            $report_data[$key]['suggested_driver_phone'] = $findings[0]->phone;

                            $data_in = array('suggested_driver_id' => $findings[0]->driver_id, 'last_assigned_date' => $findings[0]->delivery_date);
                            $where_info = "order_id =" . $data_is['order_id'];
                            $in_res = $this->order_model->update($data_in, $where_info);
                        } else {


                            $testarr[$key]['msg'] = 'FAILD IN FINDINGS SO CHECKING NEW DELIVERY';
                            $testarr[$key]['custid'] = $customer_id;
                            $testarr[$key]['addr'] = $delivery_address;
                            $testarr[$key]['time'] = $delivery_time;


                            $check_for_new_delivery = $this->order_model->check_for_new_delivery_($customer_id, $delivery_address, $delivery_time);
                            if ($check_for_new_delivery) {
                                $report_data[$key]['suggested_driver_name'] = 'NA';
                                $report_data[$key]['suggested_driver_id'] = 0;
                                $report_data[$key]['new_delivery_check'] = 0;
                                $report_data[$key]['date_was'] = $check_for_new_delivery[0]->delivery_date;
                                $report_data[$key]['day_was'] = $check_for_new_delivery[0]->day;
                                $report_data[$key]['suggested_driver_phone'] = '';
                            } else {


                                $testarr[$key]['msg'] = 'Field in new delivery test so it is a new one';
                                $testarr[$key]['custid'] = 0;
                                $testarr[$key]['addr'] = 0;
                                $testarr[$key]['time'] = 0;

                                //   Delivery is new no data found for any day of week
                                $report_data[$key]['suggested_driver_name'] = 'New Delivery';
                                $report_data[$key]['suggested_driver_id'] = 0;
                                $report_data[$key]['new_delivery_check'] = 1;
                                $report_data[$key]['date_was'] = 'NA';
                                $report_data[$key]['day_was'] = 'No result found';
                                $report_data[$key]['suggested_driver_phone'] = '';
                            }
                        }
                    }
                } //chikn
            } //END loop


            // **********************************************//
        }

        //   dd($testarr);
        if (count($report_data) > 0) {
            $response['success'] = true;
            $response['data'] = $report_data;
            $response['draw'] = $this->input->post('draw');
            $response['recordsTotal'] = $this->order_model->get_total_results_new_pagii($where);
            $response['recordsFiltered'] = $response['recordsTotal'];
        }
        //  dd($response);

        echo json_encode($response);
    }



    public function get_deliveries_report_by_completed_latedelivs()
    {
        //  set_time_limit(0);
        $response = array('success' => false, 'data' => array(), 'all_post' => $this->input->post());
        $start_date = @$this->input->post('start_date');
        $end_date = @$this->input->post('end_date');
        $status = @$this->input->post('status');
        $start = !empty($this->input->post('start')) ? $this->input->post('start') : 0;
        $length = !empty($this->input->post('length')) ? $this->input->post('length') : 50;

        // $start = '';
        // $length = '';

        if (empty($start_date)) {
            $start_date = date('Y-m-d');
        }

        if (empty($end_date)) {
            $end_date = date('Y-m-d', strtotime('+1 days'));
        }


        //exit($start_date.'________'.$end_date);
        if (strtolower($this->session->userdata('role')) == 'vendor') {
            $vendor_id = $this->session->userdata('u_id');
            $where = "o.driver_id > 0 AND o.vendor_id=" . $vendor_id . " AND (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' AND '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        } else {
            //  $where = "o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";

            $where = "o.driver_id > 0 and (o.delivered_status = 1) AND o.delivery_date BETWEEN '" . date('Y-m-d', strtotime($start_date)) . " 00:00:00' AND '" . date('Y-m-d', strtotime($end_date)) . " 23:59:59'";
        }



        //if searching is requested
        // $search = null;
        // if(!empty($this->input->post('search')['value']))
        // {
        //     $search = $this->input->post('search')['value'];

        //     $data_search   = preg_split('/\s+/', $search);

        //     $searchs=$data_search;
        //     // echo '<pre>';
        //     // print_r($data_search);
        //     // die();

        //     foreach($searchs as $search){
        //     $where .= " AND (o.plan_id LIKE '%".$search."%' OR o.company_note LIKE '%".$search."%' OR o.delivered_to LIKE '%".$search."%' OR o.name_on_delivery LIKE '%".$search."%' OR o.number_on_delivery LIKE '%".$search."%' OR o.delivery_time LIKE '%".$search."%' OR c.full_name LIKE '%".$search."%' OR d.full_name LIKE '%".$search."%' OR v.full_name LIKE '%".$search."%' OR o.delivery_address LIKE '%".$search."%' OR o.delivery_time LIKE '%".$search."%' OR o.food_type LIKE '%".$search."%' OR o.pickUp LIKE '%".$search."%' OR c.phone LIKE '%".$search."%' OR d.phone LIKE '%".$search."%' OR v.phone LIKE '%".$search."%')";
        //     }
        //     //   echo '<pre>';
        //     // echo $where.'<br>';
        //     // die();

        // }
        // $response['search'] = $search;

        //sorting code
        // if(!empty($this->input->post('order')))
        // {
        //     $table_order = $this->input->post('order')[0];
        //     $col_num = $table_order['column'];
        //     $order_dir = $table_order['dir'];
        //     switch ($col_num) {

        //          case 10:
        //             $col_name = 'o.order_id';
        //             break;

        //          case 11:
        //             $col_name = 'o.plan_id';
        //             break;

        //         case 12:
        //             $col_name = 'o.company_note';
        //             break;    

        //         case 7:
        //             $col_name = 'o.name_on_delivery';
        //             break;

        //         case 1:
        //             $col_name ='o.delivery_date';
        //             break;
        //         case 5:
        //             // o.delivery_date
        //             $col_name = 'd.full_name';
        //             break;
        //         case 6:
        //             $col_name = 'v.full_name';
        //             break;
        //         case 15:
        //             $col_name = 'o.assign_date';
        //             break;

        //         case 4:
        //             $col_name = 'o.delivered_date';
        //             break;

        //         default:
        //             $col_name = null;
        //             break;
        //     }
        // }
        //end sorting

        $report_data =  $this->order_model->get_orders_where_late_deliv($where, $start, $length, $col_name, $order_dir);

        //   dd($report_data);
        $final_data = array();
        if (count($report_data) > 0) {
            foreach ($report_data as $key => $data) {


                $time_sl = str_replace(")", "", $data['time_slot__']);

                $time_slot_time = date("h:i A", strtotime($time_sl));
                $delivery_time_driver = date("h:i A", strtotime($data['delivered_date_time']));
                //  echo 'time_sl:'.$time_sl.' and time_slot_time:'.$time_slot_time.'<br> delivery time:'.$delivery_time_driver;

                if ($delivery_time_driver > $time_slot_time) {
                    // echo '<pre> Late delivery';
                    // print_r($data);
                    // echo 'time_slot_time:'.$time_slot_time.'<br> delivery time:'.$delivery_time_driver.'<br>';

                    $datetime1 = new DateTime($delivery_time_driver);
                    $datetime2 = new DateTime($time_slot_time);
                    $interval = $datetime1->diff($datetime2);
                    $di = $interval->format('%hh %im');
                    $data['diff_is'] = $di;

                    array_push($final_data, $data);


                    //  die();
                } else {
                    // echo '<br> on time delivery';
                    //   echo ' time_slot_time:'.$time_slot_time.'<br> delivery time:'.$delivery_time_driver.'<br>';

                }
            }





            // dd($final_data);
            // die();

            $response['success'] = true;
            $response['data'] = $final_data;
            // $response['draw'] = $this->input->post('draw');
            // $response['recordsTotal'] = $this->order_model->get_total_results_new_late_deliv($where);
            // $response['recordsFiltered'] = $response['recordsTotal'];

        }


        echo json_encode($response);
    }
}
