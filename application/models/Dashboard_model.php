<?php

/**
 * a model to help out dashboard controller
 */
class Dashboard_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_deliveries($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			} else {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE action != 'Paused' and action != 'Freezed' and   vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
			}
		} else {
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			} else {

				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				//  return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Delivered' or status='Collected' THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE created BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

			}
		}
	}

	//   function get_un_deliveries_old_at_1_jan_2021($sd, $ed)
	// 	{
	// 		if($this->session->userdata('role') == 'vendor'){
	// 			$uid = $this->session->userdata('u_id');
	// 			if($sd == null AND $ed == null)
	// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `orders` WHERE vendor_id='$uid'")->result();
	// 			else
	// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `orders`  WHERE vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

	// 		}else{
	// 			if($sd == null AND $ed == null)
	// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `orders`")->result();
	// 			else
	// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `orders` WHERE delivery_date BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();
	// 		}

	// 	}

	function get_un_deliveries($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `orders` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `orders`  WHERE action != 'Paused' and  action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `orders` WHERE action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `orders` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}


	// 		function get_as_deliveries_old_at_1_jan_2021($sd, $ed)
	// 	{
	// 		if($this->session->userdata('role') == 'vendor'){
	// 			$uid = $this->session->userdata('u_id');
	// 			if($sd == null AND $ed == null)
	// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `orders` WHERE vendor_id='$uid'")->result();
	// 			else
	// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `orders`  WHERE vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

	// 		}else{
	// 			if($sd == null AND $ed == null)
	// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `orders`")->result();
	// 			else
	// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `orders` WHERE delivery_date BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();
	// 		}

	// 	}

	function get_as_deliveries($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `orders` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `orders`  WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `orders` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `orders` WHERE  action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	function get_v_bags($s_date, $e_date)
	{
		$s_date .= ' 00:00:00';
		$e_date .= ' 23:59:59';
		if ($this->session->userdata('role') == 'admin') {
			//  created_dt
			return $this->db->query("SELECT count(*) AS 'bags_counts' FROM `bags` WHERE status !='Assign' AND status!='Requested' AND is_cancelled='no' AND pick_date  BETWEEN ? AND ?", array($s_date, $e_date))->result_array();
			
		} else {
			$uid = $this->session->userdata('u_id');
			return $this->db->query("SELECT count(*) AS 'bags_counts' FROM `bags` WHERE status !='Assign' AND status!='Requested' AND is_cancelled='no' AND vendor_id = ? AND pick_date  BETWEEN ? AND ?", array($uid, $s_date, $e_date))->result_array();
		}
	}

	function get_v_unbags($s_date, $e_date)
	{
		$s_date .= ' 00:00:00';
		$e_date .= ' 23:59:59';
		// 		TAHA if($this->session->userdata('role') == 'admin')
		if ($this->session->userdata('role') != 'vendor')
			//   created_dt
			return $this->db->query("SELECT count(*) AS 'unbags_counts' FROM `bags` WHERE driver_id = 0 AND pick_date   BETWEEN ? AND ?", array($s_date, $e_date))->result_array();
		else {
			$uid = $this->session->userdata('u_id');
			return $this->db->query("SELECT count(*) AS 'unbags_counts' FROM `bags` WHERE driver_id = 0 AND vendor_id = ? AND pick_date  BETWEEN ? AND ?", array($uid, $s_date, $e_date))->result_array();
		}
	}

	function get_v_asbags($s_date, $e_date)
	{
		$s_date .= ' 00:00:00';
		$e_date .= ' 23:59:59';
		// 	TAHA	if($this->session->userdata('role') == 'admin')
		if ($this->session->userdata('role') != 'vendor')
			return $this->db->query("SELECT count(*) AS 'asbags_counts' FROM `bags` WHERE driver_id != 0 and status ='Assign' AND pick_date   BETWEEN ? AND ?", array($s_date, $e_date))->result_array();
		else {
			$uid = $this->session->userdata('u_id');
			return $this->db->query("SELECT count(*) AS 'asbags_counts' FROM `bags` WHERE  driver_id != 0 and status ='Assign'  AND vendor_id = ? AND pick_date  BETWEEN ? AND ?", array($uid, $s_date, $e_date))->result_array();
		}
	}


	function get_v_cashs($s_date, $e_date)
	{
		$s_date .= ' 00:00:00';
		$e_date .= ' 23:59:59';
		// 		if($this->session->userdata('role') == 'admin') TAHA
		if ($this->session->userdata('role') != 'vendor')
			return $this->db->query("SELECT count(*) AS 'cashs_counts' FROM `cashs` WHERE status = 'Picked Up' AND is_cancelled ='no' AND created_dt  BETWEEN ? AND ?", array($s_date, $e_date))->result_array();
		else {
			$uid = $this->session->userdata('u_id');
			return $this->db->query("SELECT count(*) AS 'cashs_counts' FROM `cashs` WHERE status = 'Picked Up' AND is_cancelled ='no' AND vendor_id = ? AND created_dt  BETWEEN ? AND ?", array($uid, $s_date, $e_date))->result_array();
		}
	}

	function get_v_ascashs($s_date, $e_date)
	{
		$s_date .= ' 00:00:00';
		$e_date .= ' 23:59:59';
		// 		if($this->session->userdata('role') == 'admin') TAHA
		if ($this->session->userdata('role') != 'vendor')

			return $this->db->query("SELECT count(*) AS 'ascashs_counts' FROM `cashs` WHERE status = 'Assigned' AND is_cancelled ='no' AND created_dt  BETWEEN ? AND ?", array($s_date, $e_date))->result_array();
		else {
			$uid = $this->session->userdata('u_id');
			return $this->db->query("SELECT count(*) AS 'ascashs_counts' FROM `cashs` WHERE status = 'Assigned' AND is_cancelled ='no' AND vendor_id = ? AND created_dt  BETWEEN ? AND ?", array($uid, $s_date, $e_date))->result_array();
		}
	}

	function get_v_uncashs($s_date, $e_date)
	{
		$s_date .= ' 00:00:00';
		$e_date .= ' 23:59:59';
		// 		if($this->session->userdata('role') == 'admin') TAHA
		if ($this->session->userdata('role') != 'vendor')
			return $this->db->query("SELECT count(*) AS 'uncash_counts' FROM `cashs` WHERE status = 'Requested' AND is_cancelled ='no' AND created_dt  BETWEEN ? AND ?", array($s_date, $e_date))->result_array();
		else {
			$uid = $this->session->userdata('u_id');
			return $this->db->query("SELECT count(*) AS 'uncashs_counts' FROM `cashs` WHERE status = 'Requested' AND is_cancelled ='no' AND vendor_id = ? AND created_dt  BETWEEN ? AND ?", array($uid, $s_date, $e_date))->result_array();
		}
	}



	function get_vendors($sd, $ed)
	{
		$sd .= ' 00:00:00';
		$ed .= ' 23:59:59';

		// 		created
		return $this->db->query("SELECT COUNT(DISTINCT(vendor_id)) AS 'total_partners' FROM `orders` WHERE   action != 'Paused' and action != 'Freezed' and  vendor_id != 0 AND delivery_date BETWEEN ? AND ?", array($sd, $ed))->result_array();
	}

	function get_drivers($sd, $ed)
	{

		//created
		$sd .= ' 00:00:00';
		$ed .= ' 23:59:59';
		return $this->db->query("SELECT COUNT(DISTINCT(driver_id)) AS 'total_drivers' FROM `orders` WHERE  action != 'Paused' and action != 'Freezed' and driver_id != 0 AND delivery_date BETWEEN ? AND ?", array($sd, $ed))->result_array();
	}

	function get_customers($sd, $ed)
	{
		$sd .= ' 00:00:00';
		$ed .= ' 23:59:59';
		if ($this->session->userdata('role') == 'admin')
			return $this->db->query("SELECT COUNT(DISTINCT(customer_id)) AS 'total_customers' FROM `orders` WHERE  action != 'Paused' and action != 'Freezed' and customer_id != 0 AND delivery_date BETWEEN ? AND ?", array($sd, $ed))->result_array();
		else {
			$uid = $this->session->userdata('u_id');
			//	return $this->db->query("SELECT COUNT(DISTINCT(customer_id))  AS 'total_customers' FROM `orders` WHERE customer_id != 0 AND vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd, $ed))->result();
			return $this->db->query("SELECT COUNT(*) AS 'total_customers' FROM `orders` WHERE  action != 'Paused' and action != 'Freezed' and customer_id != 0 AND vendor_id = ? AND delivery_date BETWEEN ? AND ?", array($uid, $sd, $ed))->result_array();
		}
	}

	function get_pie_charts($sd, $ed)
	{
		if ($sd == null and $ed == null)
			return $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 GROUP BY `orders`.`vendor_id` ORDER BY value DESC")->result();
		else
			return $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 AND (`orders`.delivery_date BETWEEN ? AND ?) GROUP BY `orders`.`vendor_id` ORDER BY value DESC", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
	}

	// Taha minor change according to live
	// 	function collect_notifs($type)
	// 	{
	// 		if($type == 'admin')
	// 		{
	// 			$data['order_notis'] = $this->db->query("SELECT orders.created as 'noti_time', orders.status, users.full_name,u.full_name as 'customer_name', 'order' as 'type' FROM orders    JOIN users ON users.email = orders.created_user AND users.role_id = 2  JOIN users as u ON u.id = orders.customer_id WHERE DATE(NOW()) = DATE(orders.created)  ORDER BY orders.order_id DESC")->result();

	// 			$data['bag_notis'] = $this->db->query("SELECT bags.created_dt as 'noti_time', bags.status, bags.bags_qty, users.full_name,u.full_name as 'customer_name', 'bag' as 'type' FROM bags  JOIN users ON users.email = bags.created_user AND users.role_id = 2  JOIN users as u ON u.id = bags.customer_id WHERE  DATE(NOW()) = DATE(bags.created_dt) ORDER BY bags.bag_id DESC")->result();

	// 			$data['cash_notis'] = $this->db->query("SELECT cashs.created_dt as 'noti_time', cashs.status, cashs.total_amount, users.full_name,u.full_name as 'customer_name', 'cash' as 'type' FROM cashs  JOIN users ON users.email = cashs.created_user AND users.role_id = 2  JOIN users as u ON u.id = cashs.customer_id WHERE DATE(NOW()) = DATE(cashs.created_dt) ORDER BY cashs.cash_id DESC")->result();


	// 			$data['order_cancel_notis'] = $this->db->query("SELECT orders.created as 'noti_time',orders.canceled_by as 'cancel_by', orders.status, users.full_name,u.full_name as 'customer_name', 'order_cancel' as 'type' FROM orders    JOIN users ON users.email = orders.created_user  AND users.role_id = 2  JOIN users as u ON u.id = orders.customer_id WHERE DATE(NOW()) = DATE(orders.created) AND orders.is_cancelled = 'yes'  ORDER BY orders.order_id DESC")->result();

	// 			$data['bag_cancel_notis'] = $this->db->query("SELECT bags.created_dt as 'noti_time', bags.canceled_by as 'cancel_by', bags.status, bags.bags_qty, users.full_name,u.full_name as 'customer_name', 'bag_cancel' as 'type' FROM bags  JOIN users ON users.email = bags.created_user  AND users.role_id = 2  JOIN users as u ON u.id = bags.customer_id WHERE  DATE(NOW()) = DATE(bags.created_dt) AND bags.is_cancelled = 'yes' ORDER BY bags.bag_id DESC")->result();

	// 			$data['cash_cancel_notis'] = $this->db->query("SELECT cashs.created_dt as 'noti_time', cashs.canceled_by as 'cancel_by',cashs.status, cashs.total_amount, users.full_name,u.full_name as 'customer_name', 'cash_cancel' as 'type' FROM cashs  JOIN users ON users.email = cashs.created_user AND users.role_id = 2  JOIN users as u ON u.id = cashs.customer_id WHERE DATE(NOW()) = DATE(cashs.created_dt) AND cashs.is_cancelled = 'yes' ORDER BY cashs.cash_id DESC")->result();


	// 			return $data;
	// 		}

	// 		else if($type == 'vendor')
	// 		{
	// 			$id = $this->session->userdata('u_id');
	// 			$data['order_notis'] = $this->db->query("SELECT orders.created as 'noti_time', orders.status, users.full_name, 'order' as 'type' FROM orders  JOIN users ON users.email = orders.created_user WHERE users.role_id = 1 AND orders.vendor_id = ? AND DATE(NOW()) = DATE(orders.created) ORDER BY orders.order_id DESC", $id)->result();

	// 			$data['bag_notis'] = $this->db->query("SELECT bags.created_dt as 'noti_time', bags.status, bags.bags_qty, users.full_name, 'bag' as 'type' FROM bags  JOIN users ON users.email = bags.created_user WHERE users.role_id = 1 AND bags.vendor_id = ? AND DATE(NOW()) = DATE(bags.created_dt) ORDER BY bags.bag_id DESC", $id)->result();

	// 			$data['cash_notis'] = $this->db->query("SELECT cashs.created_dt as 'noti_time', cashs.status, cashs.total_amount, users.full_name,u.full_name as 'customer_name', 'cash' as 'type' FROM cashs  JOIN users ON users.email = cashs.created_user WHERE users.role_id = 1 AND cashs.vendor_id = ? AND DATE(NOW()) = DATE(cashs.created_dt) ORDER BY cashs.cash_id DESC", $id)->result();

	// 			return $data;	
	// 		}

	// 		else
	// 			return array();
	// 	}

	function collect_notifs($type)
	{
		if ($type == 'admin') {
			$data['order_notis'] = $this->db->query("SELECT orders.created as 'noti_time', orders.status, users.full_name,u.full_name as 'customer_name', 'order' as 'type' FROM orders    JOIN users ON users.email = orders.created_user AND users.role_id = 2  JOIN users as u ON u.id = orders.customer_id WHERE DATE(NOW()) = DATE(orders.created)  ORDER BY orders.order_id DESC")->result();

			$data['bag_notis'] = $this->db->query("SELECT bags.created_dt as 'noti_time', bags.status, bags.bags_qty, users.full_name,u.full_name as 'customer_name', 'bag' as 'type' FROM bags  JOIN users ON users.email = bags.created_user AND users.role_id = 2  JOIN users as u ON u.id = bags.customer_id WHERE  DATE(NOW()) = DATE(bags.created_dt) ORDER BY bags.bag_id DESC")->result();

			$data['cash_notis'] = $this->db->query("SELECT cashs.created_dt as 'noti_time', cashs.status, cashs.total_amount, users.full_name,u.full_name as 'customer_name', 'cash' as 'type' FROM cashs  JOIN users ON users.email = cashs.created_user AND users.role_id = 2  JOIN users as u ON u.id = cashs.customer_id WHERE DATE(NOW()) = DATE(cashs.created_dt) ORDER BY cashs.cash_id DESC")->result();


			$data['order_cancel_notis'] = $this->db->query("SELECT orders.created as 'noti_time',orders.canceled_by as 'cancel_by', orders.status, users.full_name,u.full_name as 'customer_name', 'order_cancel' as 'type' FROM orders    JOIN users ON users.email = orders.created_user  AND users.role_id = 2  JOIN users as u ON u.id = orders.customer_id WHERE DATE(NOW()) = DATE(orders.created) AND orders.is_cancelled = 'yes'  ORDER BY orders.order_id DESC")->result();

			$data['bag_cancel_notis'] = $this->db->query("SELECT bags.created_dt as 'noti_time', bags.canceled_by as 'cancel_by', bags.status, bags.bags_qty, users.full_name,u.full_name as 'customer_name', 'bag_cancel' as 'type' FROM bags  JOIN users ON users.email = bags.created_user  AND users.role_id = 2  JOIN users as u ON u.id = bags.customer_id WHERE  DATE(NOW()) = DATE(bags.created_dt) AND bags.is_cancelled = 'yes' ORDER BY bags.bag_id DESC")->result();

			$data['cash_cancel_notis'] = $this->db->query("SELECT cashs.created_dt as 'noti_time', cashs.canceled_by as 'cancel_by',cashs.status, cashs.total_amount, users.full_name,u.full_name as 'customer_name', 'cash_cancel' as 'type' FROM cashs  JOIN users ON users.email = cashs.created_user AND users.role_id = 2  JOIN users as u ON u.id = cashs.customer_id WHERE DATE(NOW()) = DATE(cashs.created_dt) AND cashs.is_cancelled = 'yes' ORDER BY cashs.cash_id DESC")->result();


			return $data;
		} else if ($type == 'vendor') {
			$id = $this->session->userdata('u_id');
			$data['order_notis'] = $this->db->query("SELECT orders.created as 'noti_time', orders.status, users.full_name, 'order' as 'type' FROM orders  JOIN users ON users.email = orders.created_user WHERE users.role_id = 1 AND orders.vendor_id = ? AND DATE(NOW()) = DATE(orders.created) ORDER BY orders.order_id DESC", $id)->result();

			$data['bag_notis'] = $this->db->query("SELECT bags.created_dt as 'noti_time', bags.status, bags.bags_qty, users.full_name, 'bag' as 'type' FROM bags  JOIN users ON users.email = bags.created_user WHERE users.role_id = 1 AND bags.vendor_id = ? AND DATE(NOW()) = DATE(bags.created_dt) ORDER BY bags.bag_id DESC", $id)->result();

			$data['cash_notis'] = $this->db->query("SELECT cashs.created_dt as 'noti_time', cashs.status, cashs.total_amount, users.full_name,u.full_name as 'customer_name', 'cash' as 'type' FROM cashs  JOIN users ON users.email = cashs.created_user WHERE users.role_id = 1 AND cashs.vendor_id = ? AND DATE(NOW()) = DATE(cashs.created_dt) ORDER BY cashs.cash_id DESC", $id)->result();

			return $data;
		} else
			return array();
	}


	function calculate_compare_charts($sd, $ed)
	{
		// 		if($this->session->userdata('role') == 'admin') taha
		if ($this->session->userdata('role') != 'vendor') {
			// 			$data['orders'] = $this->db->query("SELECT DATE(created) AS 'c_date', COUNT(*) AS 'order_counts' FROM `orders` WHERE (created BETWEEN ? AND ?) AND status = 'Delivered' GROUP BY DATE(created) ORDER BY DATE(created) DESC LIMIT 0,100", array($sd." 00:00:00", $ed." 23:59:59"))->result();

			// AND status = 'Delivered' OR status='Collected'
			// created_dt for bags
			// AND status = 'Picked' for bag

			$data['orders'] = $this->db->query("SELECT DATE(delivery_date) AS 'c_date', COUNT(*) AS 'order_counts' FROM `orders` WHERE action != 'Paused' and action != 'Freezed' and (delivery_date BETWEEN ? AND ?)  GROUP BY DATE(delivery_date) ORDER BY DATE(delivery_date) DESC LIMIT 0,100", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

			$data['bags'] = $this->db->query("SELECT DATE(pick_date) AS 'c_date', COUNT(*) AS 'bag_counts' FROM `bags` WHERE (pick_date BETWEEN ? AND ?)  GROUP BY DATE(pick_date) ORDER BY DATE(pick_date) LIMIT 0, 100", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			$vid = $this->session->userdata('u_id');

			// 			$data['orders'] = $this->db->query("SELECT DATE(created) AS 'c_date', COUNT(*) AS 'order_counts' FROM `orders` WHERE (created BETWEEN ? AND ?) AND status = 'Delivered' AND vendor_id = ? GROUP BY DATE(created) ORDER BY DATE(created) DESC LIMIT 0,100", array($sd." 00:00:00", $ed." 23:59:59", $vid))->result();

			$data['orders'] = $this->db->query("SELECT DATE(delivery_date) AS 'c_date', COUNT(*) AS 'order_counts' FROM `orders` WHERE action != 'Paused' and action != 'Freezed' and (delivery_date BETWEEN ? AND ?)  AND vendor_id = ? GROUP BY DATE(delivery_date) ORDER BY DATE(delivery_date) DESC LIMIT 0,100", array($sd . " 00:00:00", $ed . " 23:59:59", $vid))->result();

			// 			$data['bags'] = $this->db->query("SELECT DATE(created_dt) AS 'c_date', COUNT(*) AS 'bag_counts' FROM `bags` WHERE (created_dt BETWEEN ? AND ?) AND status = 'Picked' AND vendor_id = ? GROUP BY DATE(created_dt) ORDER BY DATE(created_dt) LIMIT 0, 100", array($sd." 00:00:00", $ed." 23:59:59", $vid))->result();

			$data['bags'] = $this->db->query("SELECT DATE(pick_date) AS 'c_date', COUNT(*) AS 'bag_counts' FROM `bags` WHERE (pick_date BETWEEN ? AND ?)  AND vendor_id = ? GROUP BY DATE(pick_date) ORDER BY DATE(pick_date) LIMIT 0, 100", array($sd . " 00:00:00", $ed . " 23:59:59", $vid))->result();
		}

		return $data;
	}


	public function get_negative_fb_count($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_negative'   FROM feedbacks WHERE user_id='$uid' AND order_id=0 AND complaint_count=1  AND role_id=2 ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_negative'   FROM feedbacks  WHERE user_id='$uid' AND order_id=0 AND complaint_count=1 AND role_id=2 AND reported_at BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_negative'   FROM feedbacks WHERE   complaint_count=1  AND order_id !=0 AND role_id=4 ")->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT COUNT(*) AS 'total_negative'  FROM  feedbacks   WHERE  complaint_count=1  AND order_id !=0 AND role_id=4 AND reported_at BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}



	function get_positive_fb_count($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			// 			if($sd == null AND $ed == null)
			// 				return $this->db->query("SELECT COUNT(*) AS 'total_positive',   FROM `feedbacks` WHERE user_id='$uid' AND order_id=0 AND complaint_count=0  AND role_id=2 ")->result();
			// 			else
			// 				return $this->db->query("SELECT COUNT(*) AS 'total_positive',   FROM `feedbacks`  WHERE user_id='$uid' AND order_id=0 AND complaint_count=0 AND role_id=2 AND reported_at BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_positive'   FROM feedbacks  WHERE   complaint_count=0  AND order_id !=0 AND role_id=4 AND status='Satisfied' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_positive'   FROM feedbacks   WHERE  complaint_count=0  AND order_id !=0 AND role_id=4 AND status='Satisfied' AND reported_at BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}




	public function get_revenue($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM orders as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM orders as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM orders as o WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM orders as o  WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}


	public function get_fuel($sd, $ed)
	{

		// 	 TAHA if($this->session->userdata('role') == 'admin'){  
		if ($this->session->userdata('role') != 'vendor') {

			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when (`amount` > 0) then `amount` else 0 end) as total_fuel FROM fuel WHERE `BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (`amount` > 0) then `amount` else 0 end) as total_fuel FROM fuel WHERE `dated`  BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}


	public function get_exp($sd, $ed)
	{

		// 	 TAHA if($this->session->userdata('role') == 'admin'){  
		if ($this->session->userdata('role') != 'vendor') {

			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when (`amount` > 0) then `amount` else 0 end) as total_exp FROM expense WHERE `BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (`amount` > 0) then `amount` else 0 end) as total_exp FROM expense WHERE `dated`  BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}


	public function get_paid_canceled_deliv($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM orders as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM orders as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM orders as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM orders as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function get_unpaid_canceled_deliv($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM orders as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM orders as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM orders as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM orders as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function get_cash_need_to_collected_deliv($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM orders as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM orders as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM orders as o WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM orders as o  WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}


	public function get_cash_collected_deliv($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM orders as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM orders as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM orders as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM orders as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}


	public function get_revenue_from_bags($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu_bag
FROM bags as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu_bag
FROM bags as o 
WHERE o.vendor_id = $uid AND `o`.`pick_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu_bag FROM bags as o WHERE o.vendor_id != 0   AND `o`.`pick_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu_bag FROM bags as o  WHERE o.vendor_id != 0 AND `o`.`pick_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}





	// 	06 JULY 2021

	function get_drivers_details_new_count($st_dt, $end_dt)
	{

		$this->db->select("o.delivery_time,u.email,u.phone,u.full_name,o.driver_id, COUNT(o.order_id) AS 'orders',
        
          sum(case when (o.status = 'Delivered' OR o.status = 'Collected') then 1 else 0 end) as total_delivered,
          sum(case when (o.status = 'Assign' AND o.is_cancelled ='no') then 1 else 0 end) as total_assign,
          sum(case when (o.is_cancelled = 'yes'  ) then 1 else 0 end) as total_canceled,
          sum(case when (o.status = 'Ship' AND o.is_cancelled ='no' ) then 1 else 0 end) as total_ship
          ");

		$this->db->from('orders as o');
		$this->db->join('users as u', 'o.driver_id= u.id');

		$this->db->group_by('o.driver_id');
		$this->db->group_by('o.delivery_time');


		$where = "o.action != 'Paused' and o.action != 'Freezed' and  o.driver_id != 0 AND o.delivery_date BETWEEN  '" . $st_dt . " 00:00:00' and '" . $end_dt . " 23:59:59'";
		$this->db->where($where);

		$query = $this->db->get();

		// print_r($this->db->last_query());
		// die();

		$orders = $query->result();
		if ($orders) {
			$result['result'] = true;
			$result['records'] = $orders;
		} else {
			$result['result'] = false;
		}


		return $result;
	}

	function get_partner_details_new_count($st_dt, $end_dt)
	{


		$this->db->select("o.delivery_time, u.email,u.phone,u.full_name,o.vendor_id, COUNT(o.order_id) AS 'orders',
        
          sum(case when (o.status = 'Delivered' OR o.status = 'Collected') then 1 else 0 end) as total_delivered,

        
          sum(case when (o.status = 'Assign' AND o.is_cancelled ='no') then 1 else 0 end) as total_assign,

        
          sum(case when (o.status = 'Not Assign' AND o.is_cancelled ='no' ) then 1 else 0 end) as total_not_assign,

        
          sum(case when (o.is_cancelled = 'yes'  ) then 1 else 0 end) as total_canceled,
          
          sum(case when (o.status = 'Ship' AND o.is_cancelled ='no' ) then 1 else 0 end) as total_ship
          ");

		$this->db->from('orders as o');
		$this->db->join('users as u', 'o.vendor_id= u.id');


		$this->db->group_by('o.vendor_id');
		$this->db->group_by('o.delivery_time');


		$where = "o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.delivery_date BETWEEN  '" . $st_dt . " 00:00:00' and '" . $end_dt . " 23:59:59'";
		$this->db->where($where);

		$query = $this->db->get();

		// print_r($this->db->last_query());
		// die();

		$orders = $query->result();
		if ($orders) {
			$result['result'] = true;
			$result['records'] = $orders;
		} else {
			$result['result'] = false;
		}

		return $result;
	}

	function get_justification_page_partner_driver($where)
	{
		$this->db->select('o.order_id, o.signature,o.name_on_delivery,o.number_on_delivery,o.pickUp,o.note, o.signature_img,o.total_bag_recv_by_driver as bag_received,o.bag_received as own_bg_count,o.ice_bags as own_ice_bg,o.tot_ice_pack_received as ice_bags,o.cooling_bag_check,
        o.customer_id, o.driver_id, o.vendor_id, o.`status`, o.delivery_address,o.assigned_user,o.assigned_mode,o.canceled_at,o.canceled_by,o.canceled_reason,o.canceled_mode,o.canceled_img,o.partner_price,o.discount_track,
         DATE_FORMAT(o.delivery_date,"%d-%m-%Y") as delivery_date, o.delivery_time, o.created,o.assign_date,
          DATE_FORMAT(o.delivered_date,"%H:%i:%s") as delivered_time,DATE_FORMAT(o.delivered_date,"%d-%m-%Y") as delivered_date,
           qr.code,qr.qrImage,qr.bsid,bs.status as qrStatus,
        c.full_name as customer, d.full_name as driver, v.full_name as vendor, c.address,
        c.phone as c_phone, d.phone as d_phone, v.phone as v_phone, o.delivery_time as delivery_type, o.delivery_img, o.food_type, o.send_notification ,serv.name as service,emi.emirate_name as emirate ,o.cancellation_price,o.delivery_amount,o.driver_recvd_amount,o.other_payment_driver_recv');
		$this->db->from('orders as o');
		$this->db->join('users as c', 'c.id = o.customer_id');
		$this->db->join('users as d', 'd.id = o.driver_id', 'left');
		$this->db->join('users as v', 'v.id = o.vendor_id');
		// $this->db->join($this->table_type.' as t', 't.id = o.type_id');
		$this->db->join('qr_bags as qr', 'o.qr_bag_id = qr.qrid', 'left');
		$this->db->join('bags_status as bs', 'bs.bsid = qr.bsid', 'left');
		$this->db->join('tbl_service_type as serv', 'o.service_type_id = serv.id', 'left');
		$this->db->join(' tbl_emirates as emi', 'o.emirateID = emi.id', 'left');

		$this->db->where($where);

		$query = $this->db->get();
		// echo '<pre>';
		//   print_r($this->db->last_query());
		//  die();
		$orders = $query->result();
		if ($orders) {
			$result['result'] = true;
			$result['records'] = $orders;
		} else {
			$result['result'] = false;
		}


		return $result;
	}





	//TESTINGGGGG START

	function get_all_inshiped($sd, $ed)
	{

		// 			if($sd == null AND $ed == null)
		// 				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE action != 'Paused' and action != 'Freezed' ")->result();
		// 			else
		$d1 = $this->db->query("SELECT SUM(CASE WHEN status != 'Not Assign' AND status !='Delivered' and status!='Collected' AND status !='Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'inship_dels'  FROM `orders` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		$d2 = $this->db->query("SELECT SUM(CASE WHEN status != 'Not Assign' AND status !='Delivered' and status!='Collected' AND status !='Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'inship_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		$d3 = $this->db->query("SELECT SUM(CASE WHEN status != 'Not Assign' AND status !='Delivered' and status!='Collected' AND status !='Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'inship_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		$d4 = $this->db->query("SELECT SUM(CASE WHEN status != 'Not Assign' AND status !='Delivered' and status!='Collected' AND status !='Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'inship_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

		$d5 = $this->db->query("SELECT SUM(CASE WHEN status != 'Not Assign' AND status !='Delivered' and status!='Collected' AND status !='Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'inship_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		$d6 = $this->db->query("SELECT SUM(CASE WHEN status != 'Not Assign' AND status !='Delivered' and status!='Collected' AND status !='Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'inship_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

		$chunk1 = 0;
		$chunk2 = 0;
		$chunk3 = 0;
		$act_chunk = 0;

		$chunk4 = 0;
		$chunk5 = 0;

		$total_inship = 0;
		$chunk1 = !empty($d1[0]) ? $d1[0]->inship_dels : 0;
		$chunk2 = !empty($d2[0]) ? $d2[0]->inship_dels : 0;
		$chunk3 = !empty($d3[0]) ? $d3[0]->inship_dels : 0;
		$act_chunk = !empty($d4[0]) ? $d4[0]->inship_dels : 0;

		$chunk4 = !empty($d5[0]) ? $d5[0]->inship_dels : 0;
		$chunk5 = !empty($d6[0]) ? $d6[0]->inship_dels : 0;

		$total_inship = $act_chunk + $chunk1 + $chunk2 + $chunk3 + $chunk4 + $chunk5;
		return  $total_inship;
	}

	function get_deliveries_data_2021_04_01_from_2021_07_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			} else {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE action != 'Paused' and action != 'Freezed' and   vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
			}
		} else {
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			} else {

				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				//  return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Delivered' or status='Collected' THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE created BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

			}
		}
	}

	function get_un_deliveries_data_2021_04_01_from_2021_07_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31`  WHERE action != 'Paused' and  action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	function asdeliveries_data_2021_04_01_from_2021_07_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31`  WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-04-01_from_2021-07-31` WHERE  action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	public function get_revenue_data_2021_04_01_from_2021_07_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2021-04-01_from_2021-07-31` as o WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				//  echo 'hi plzzzzzzzz';
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2021-04-01_from_2021-07-31` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				//   echo 'res'.$res;
				// print_r($this->db->last_query());
				// die();
			}
		}
	}

	public function paid_canc_data_2021_04_01_from_2021_07_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2021-04-01_from_2021-07-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2021-04-01_from_2021-07-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function unpaid_canc_data_2021_04_01_from_2021_07_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2021-04-01_from_2021-07-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2021-04-01_from_2021-07-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_need_data_2021_04_01_from_2021_07_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2021-04-01_from_2021-07-31` as o WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2021-04-01_from_2021-07-31` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_coll_data_2021_04_01_from_2021_07_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2021-04-01_from_2021-07-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2021-04-01_from_2021-07-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2021-04-01_from_2021-07-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	// ----------------------------------------------------------------------------------------	
	function get_deliveries_data_2020_09_04_from_2021_03_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			} else {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE action != 'Paused' and action != 'Freezed' and   vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
			}
		} else {
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			} else {

				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				//  echo '<pre>';
				//  print_r($this->db->last_query());
				//die();
				//  return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Delivered' or status='Collected' THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE created BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

			}
		}
	}

	function get_un_deliveries_data_2020_09_04_from_2021_03_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2020-09-04_from_2021-03-31`  WHERE action != 'Paused' and  action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	function asdeliveries_data_2020_09_04_from_2021_03_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2020-09-04_from_2021-03-31`  WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2020-09-04_from_2021-03-31` WHERE  action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	public function get_revenue_data_2020_09_04_from_2021_03_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2020-09-04_from_2021-03-31` as o WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2020-09-04_from_2021-03-31` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function paid_canc_data_2020_09_04_from_2021_03_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2020-09-04_from_2021-03-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2020-09-04_from_2021-03-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function unpaid_canc_data_2020_09_04_from_2021_03_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2020-09-04_from_2021-03-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2020-09-04_from_2021-03-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_need_data_2020_09_04_from_2021_03_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2020-09-04_from_2021-03-31` as o WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2020-09-04_from_2021-03-31` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_coll_data_2020_09_04_from_2021_03_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2020-09-04_from_2021-03-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2020-09-04_from_2021-03-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2020-09-04_from_2021-03-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	// --------------------------------------------------------------------------------------------	
	function get_deliveries_data_2019_06_14_from_2020_09_03($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			} else {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE action != 'Paused' and action != 'Freezed' and   vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
			}
		} else {
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			} else {

				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				//  return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Delivered' or status='Collected' THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE created BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

			}
		}
	}

	function get_un_deliveries_data_2019_06_14_from_2020_09_03($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2019-06-14_from_2020-09-03`  WHERE action != 'Paused' and  action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	function asdeliveries_data_2019_06_14_from_2020_09_03($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2019-06-14_from_2020-09-03`  WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2019-06-14_from_2020-09-03` WHERE  action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	public function get_revenue_data_2019_06_14_from_2020_09_03($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2019-06-14_from_2020-09-03` as o WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2019-06-14_from_2020-09-03` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function paid_canc_data_2019_06_14_from_2020_09_03($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2019-06-14_from_2020-09-03` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2019-06-14_from_2020-09-03` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function unpaid_canc_data_2019_06_14_from_2020_09_03($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2019-06-14_from_2020-09-03` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2019-06-14_from_2020-09-03` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_need_data_2019_06_14_from_2020_09_03($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2019-06-14_from_2020-09-03` as o WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2019-06-14_from_2020-09-03` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_coll_data_2019_06_14_from_2020_09_03($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2019-06-14_from_2020-09-03` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2019-06-14_from_2020-09-03` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2019-06-14_from_2020-09-03` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}










	// 	ALLAH S

	// --------------------------------------------------------------------------------------------	
	function get_deliveries_data_2021_08_01_from_2021_10_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			} else {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE action != 'Paused' and action != 'Freezed' and   vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
			}
		} else {
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			} else {

				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				//  return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Delivered' or status='Collected' THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE created BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

			}
		}
	}

	function get_un_deliveries_data_2021_08_01_from_2021_10_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-08-01_from_2021-10-31`  WHERE action != 'Paused' and  action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	function asdeliveries_data_2021_08_01_from_2021_10_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-08-01_from_2021-10-31`  WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-08-01_from_2021-10-31` WHERE  action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	public function get_revenue_data_2021_08_01_from_2021_10_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2021-08-01_from_2021-10-31` as o WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2021-08-01_from_2021-10-31` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function paid_canc_data_2021_08_01_from_2021_10_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2021-08-01_from_2021-10-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2021-08-01_from_2021-10-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function unpaid_canc_data_2021_08_01_from_2021_10_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2021-08-01_from_2021-10-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2021-08-01_from_2021-10-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_need_data_2021_08_01_from_2021_10_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2021-08-01_from_2021-10-31` as o WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2021-08-01_from_2021-10-31` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_coll_data_2021_08_01_from_2021_10_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2021-08-01_from_2021-10-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2021-08-01_from_2021-10-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2021-08-01_from_2021-10-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}


	function re5($sd, $ed)
	{
		if ($sd == null and $ed == null) {
			$res4 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2021-08-01_from_2021-10-31` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 GROUP BY `orders`.`vendor_id` ORDER BY value DESC")->result();
		} else {
			$res4 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2021-08-01_from_2021-10-31` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 AND (`orders`.delivery_date BETWEEN ? AND ?) GROUP BY `orders`.`vendor_id` ORDER BY value DESC", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}

		return $res4;
		// 	 	echo 'res4:<br><pre>';
		// 		print_r($res4);
		// 		echo '------------------------------------------------------';

		// 		die();

	}

	// ALLAH E




	// 	ALLAH S

	// --------------------------------------------------------------------------------------------	
	function get_deliveries_data_2021_11_01_from_2022_01_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			} else {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE action != 'Paused' and action != 'Freezed' and   vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
			}
		} else {
			if ($sd == null and $ed == null) {
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			} else {

				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN delivered_status = 1 THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				//  return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Delivered' or status='Collected' THEN 1 ELSE 0 END) AS 'delivered_dels'  FROM `orders` WHERE created BETWEEN ? AND ?", array($sd." 00:00:00", $ed." 23:59:59"))->result();

			}
		}
	}

	function get_un_deliveries_data_2021_11_01_from_2022_01_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-11-01_from_2022-01-31`  WHERE action != 'Paused' and  action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN status = 'Not Assign' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'un_delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE action != 'Paused' and  action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	function asdeliveries_data_2021_11_01_from_2022_01_31($sd, $ed)
	{
		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid'")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-11-01_from_2022-01-31`  WHERE  action != 'Paused' and action != 'Freezed' and  vendor_id='$uid' AND delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected'  AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE  action != 'Paused' and action != 'Freezed' ")->result();
			else
				return $this->db->query("SELECT COUNT(*) AS 'total_dels', SUM(CASE WHEN driver_id > 0 AND status !='Delivered' and status!='Collected' AND `is_cancelled` = 'no' THEN 1 ELSE 0 END) AS 'as_delivered_dels'  FROM `data_2021-11-01_from_2022-01-31` WHERE  action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
	}

	public function get_revenue_data_2021_11_01_from_2022_01_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2021-11-01_from_2022-01-31` as o WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM `data_2021-11-01_from_2022-01-31` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function paid_canc_data_2021_11_01_from_2022_01_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2021-11-01_from_2022-01-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price!= 0 OR o.cancellation_price!='') ) then 1 else 0 end) as paid_canceled_deliv FROM `data_2021-11-01_from_2022-01-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function unpaid_canc_data_2021_11_01_from_2022_01_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price= 0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2021-11-01_from_2022-01-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.`is_cancelled` = 'yes' AND (o.cancellation_price =0 OR o.cancellation_price='') ) then 1 else 0 end) as unpaid_canceled_deliv FROM `data_2021-11-01_from_2022-01-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_need_data_2021_11_01_from_2022_01_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2021-11-01_from_2022-01-31` as o WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.delivery_amount !=0 )  then o.delivery_amount else 0 end) as cash_need_to_collect FROM `data_2021-11-01_from_2022-01-31` as o  WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	public function cash_coll_data_2021_11_01_from_2022_01_31($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');
			if ($sd == null and $ed == null)
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.vendor_id = $uid")->result();
			else
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv
FROM `data_2021-11-01_from_2022-01-31` as o 
WHERE o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		} else {
			if ($sd == null and $ed == null) {
				$sd = date('Y-m-d');
				$ed = date('Y-m-d');


				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2021-11-01_from_2022-01-31` as o WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();

				//   return 'hi';
			} else {
				return $this->db->query("SELECT sum(case when (o.driver_recvd_amount !=0 ) AND (o.status ='Delivered' OR o.status='Collected' ) AND o.`is_cancelled` = 'no'  then o.driver_recvd_amount else 0 end) as cash_collected_deliv FROM `data_2021-11-01_from_2022-01-31` as o  WHERE o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->last_query();
			}
		}
	}

	function re6($sd, $ed)
	{
		if ($sd == null and $ed == null) {
			$res4 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2021-11-01_from_2022-01-31` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 GROUP BY `orders`.`vendor_id` ORDER BY value DESC")->result();
		} else {
			$res4 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2021-11-01_from_2022-01-31` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 AND (`orders`.delivery_date BETWEEN ? AND ?) GROUP BY `orders`.`vendor_id` ORDER BY value DESC", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}

		return $res4;
		// 	 	echo 'res4:<br><pre>';
		// 		print_r($res4);
		// 		echo '------------------------------------------------------';

		// 		die();

	}

	// ALLAH E
































	function get_pie_charts_for_all($sd, $ed)
	{
		if ($sd == null and $ed == null) {
			$res1 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 GROUP BY `orders`.`vendor_id` ORDER BY value DESC")->result();
		} else {
			$res1 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 AND (`orders`.delivery_date BETWEEN ? AND ?) GROUP BY `orders`.`vendor_id` ORDER BY value DESC", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}
		// 			echo 'res1:<br><pre>';
		// 		print_r($this->db->last_query());
		// 		die();
		return $res1;

		// 		echo 'res1:<br><pre>';
		// 		print_r($res1);
		// 		echo '------------------------------------------------------';

		// 		die();

	}

	function re2($sd, $ed)
	{
		// echo 'hello';
		if ($sd == null and $ed == null) {
			$res2 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2019-06-14_from_2020-09-03` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 GROUP BY `orders`.`vendor_id` ORDER BY value DESC")->result();
		} else {
			$res2 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2019-06-14_from_2020-09-03` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 AND (`orders`.delivery_date BETWEEN ? AND ?) GROUP BY `orders`.`vendor_id` ORDER BY value DESC", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}

		return $res2;

		// 		echo 'res2:<br><pre>';
		// 		print_r($this->db->last_query());
		// 		die();
		// 		print_r($res2);
		// 		echo '------------------------------------------------------';
		// 	        die();

	}

	function re3($sd, $ed)
	{
		if ($sd == null and $ed == null) {
			$res3 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2020-09-04_from_2021-03-31` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 GROUP BY `orders`.`vendor_id` ORDER BY value DESC")->result();
		} else {
			$res3 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2020-09-04_from_2021-03-31` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 AND (`orders`.delivery_date BETWEEN ? AND ?) GROUP BY `orders`.`vendor_id` ORDER BY value DESC", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}

		return $res3;
		// 		echo 'res3:<br><pre>';
		// 		print_r($res3);
		// 		echo '------------------------------------------------------';

		// 		die();

	}
	function re4($sd, $ed)
	{
		if ($sd == null and $ed == null) {
			$res4 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2021-04-01_from_2021-07-31` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 GROUP BY `orders`.`vendor_id` ORDER BY value DESC")->result();
		} else {
			$res4 = $this->db->query("SELECT COUNT(`orders`.`order_id`) AS 'value', `users`.`full_name` AS 'label' FROM `data_2021-04-01_from_2021-07-31` as `orders` LEFT JOIN `users` ON `users`.`id` = `orders`.`vendor_id` WHERE `orders`.action != 'Paused' AND `orders`.action != 'Freezed' AND  `users`.is_deleted = 0 AND (`orders`.delivery_date BETWEEN ? AND ?) GROUP BY `orders`.`vendor_id` ORDER BY value DESC", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
		}

		return $res4;
		// 	 	echo 'res4:<br><pre>';
		// 		print_r($res4);
		// 		echo '------------------------------------------------------';

		// 		die();

	}


	// 	----------------------------------------------------------------------------------------------

	//TESTING ENDDDDDD



	// 	Allah plz Credit
	public function get_incomings_only($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');

			return $this->db->query("SELECT sum(case when ( `type` = 'Credit'  ) then amount else 0 end) as total_incomings
FROM partner_incoming 
WHERE vendor_id = $uid")->result();
		} else {

			return $this->db->query("SELECT sum(case when ( `type` = 'Credit'   ) then amount else 0 end) as total_incomings FROM partner_incoming   WHERE id>0 ")->result();
			// return $this->db->last_query();

		}
	}
	public function get_incomings($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');

			return $this->db->query("SELECT sum(case when ( `type` = 'Credit'  OR `type` = 'Waive Off') then amount else 0 end) as total_incomings
FROM partner_incoming 
WHERE vendor_id = $uid")->result();
		} else {

			return $this->db->query("SELECT sum(case when ( `type` = 'Credit'  OR `type` = 'Waive Off' ) then amount else 0 end) as total_incomings FROM partner_incoming   WHERE id>0 ")->result();
			// return $this->db->last_query();

		}
	}

	public function get_waived($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');

			return $this->db->query("SELECT sum(case when ( `type` = 'Waive Off') then amount else 0 end) as total_off
FROM partner_incoming 
WHERE vendor_id = $uid")->result();
		} else {

			return $this->db->query("SELECT sum(case when ( `type` = 'Waive Off' ) then amount else 0 end) as total_off FROM partner_incoming   WHERE id>0 ")->result();
			// return $this->db->last_query();

		}
	}

	public function get_extras($sd, $ed)
	{

		if ($this->session->userdata('role') == 'vendor') {
			$uid = $this->session->userdata('u_id');

			return $this->db->query("SELECT sum(case when ( `type` = 'Extra Charged' ) then amount else 0 end) as total_charged
FROM partner_incoming 
WHERE vendor_id = $uid")->result();
		} else {

			return $this->db->query("SELECT sum(case when ( `type` = 'Extra Charged'  ) then amount else 0 end) as total_charged FROM partner_incoming   WHERE id>0 ")->result();
			// return $this->db->last_query();

		}
	}

	public function get_exp_from_july_order($sd, $ed)
	{
		$julydate1 = date_create("2022-07-01");
		$julydate1 = date_format($julydate1, "Y-m-d");
		//   echo 'july:'.$julydate1.' - ed dt is:'.$ed;
		if ($julydate1 < $ed or $julydate1 == $ed) {
			// echo 'in';
			if ($this->session->userdata('role') == 'vendor') {
				$uid = $this->session->userdata('u_id');
				if ($sd == null and $ed == null)
					return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM orders as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' and o.vendor_id = $uid")->result();
				else
					return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu
FROM orders as o 
WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id = $uid AND o.`delivery_date` BETWEEN ? AND ?", array($julydate1 . " 00:00:00", $ed . " 23:59:59"))->result();
			} else {
				if ($sd == null and $ed == null) {
					$sd = date('Y-m-d');
					$ed = date('Y-m-d');
					return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM orders as o WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($julydate1 . " 00:00:00", $ed . " 23:59:59"))->result();

					//   return 'hi';
				} else {
					return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu FROM orders as o  WHERE o.action != 'Paused' and o.action != 'Freezed' AND o.vendor_id != 0 AND o.`delivery_date` BETWEEN ? AND ?", array($julydate1 . " 00:00:00", $ed . " 23:59:59"))->result();
					// return $this->db->last_query();
				}
			}
		} else {
			$array[] = new stdClass;
			$array[0]->total_reveneu = 0;
			return $array;
		}
	}

	public function get_exp_from_july_bags($sd, $ed)
	{

		$julydate1 = date_create("2022-07-01");
		$julydate1 = date_format($julydate1, "Y-m-d");

		if ($julydate1 < $ed or $julydate1 == $ed) {
			//  echo 'in';
			if ($this->session->userdata('role') == 'vendor') {
				$uid = $this->session->userdata('u_id');
				if ($sd == null and $ed == null)
					return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu_bag
FROM bags as o 
WHERE o.vendor_id = $uid")->result();
				else
					return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu_bag
FROM bags as o 
WHERE o.vendor_id = $uid AND `o`.`pick_date` BETWEEN ? AND ?", array($julydate1 . " 00:00:00", $ed . " 23:59:59"))->result();
			} else {
				if ($sd == null and $ed == null) {
					$sd = date('Y-m-d');
					$ed = date('Y-m-d');
					return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu_bag FROM bags as o WHERE o.vendor_id != 0   AND `o`.`pick_date` BETWEEN ? AND ?", array($julydate1 . " 00:00:00", $ed . " 23:59:59"))->result();

					//   return 'hi';
				} else {
					return $this->db->query("SELECT sum(case when ( o.`is_cancelled` = 'no'  ) then o.partner_price else o.cancellation_price end) as total_reveneu_bag FROM bags as o  WHERE o.vendor_id != 0 AND `o`.`pick_date` BETWEEN ? AND ?", array($julydate1 . " 00:00:00", $ed . " 23:59:59"))->result();
					// return $this->db->last_query();
				}
			}
		} else {
			$array[] = new stdClass;
			$array[0]->total_reveneu_bag = 0;
			return $array;
		}
	}








	// Allah plz



	function get_late_deliv_num($sd, $ed)
	{
		if ($this->session->userdata('role') != 'vendor') {
			if ($sd == null and $ed == null) {
				$res = $this->db->query('SELECT TIME_FORMAT(`delivered_date`, "%l:%i %p") as delivered_date_time,SUBSTRING_INDEX(delivery_time, "-", -1) as time_slot__  FROM `orders` WHERE  driver_id > 0 and (delivered_status = 1) ')->result_array();
			} else {
				$res = $this->db->query('SELECT   TIME_FORMAT(`delivered_date`, "%l:%i %p") as delivered_date_time,SUBSTRING_INDEX(delivery_time, "-", -1) as time_slot__ FROM `orders` WHERE  driver_id > 0 and (delivered_status = 1) AND  delivery_date BETWEEN ? AND ?', array($sd . ' 00:00:00', $ed . ' 23:59:59'))->result_array();


				$final_data = array();
				//  dd($res);
				if (count($res) > 0) {
					foreach ($res as $key => $data) {
						$time_sl = str_replace(")", "", $data['time_slot__']);
						$time_slot_time = date("h:i A", strtotime($time_sl));
						$delivery_time_driver = date("h:i A", strtotime($data['delivered_date_time']));

						if ($delivery_time_driver > $time_slot_time) {

							array_push($final_data, $data);
						}
					}

					return count($final_data);
				} else {
					return 0;
				}
			}
		} else {
			$this->load->view('forbidden');
		}
	}

	function get_deliveries_by_slots($sd, $ed)
	{
		// THIS IS THE SORT ORDE IN WHICH THE RESULT ARRAY WILL BE SORTED BASE ON TIME SLOT
		$s_order = array('(2AM-6AM)', '(2AM-7AM)', '(2AM-8AM)', '(5AM-7AM)', '(6AM-10AM)', '(8AM-12PM)', '(3PM-9PM)', '(5PM-10PM)');

		// ****************************************  THIS FUNCTION WILL RETURN ALL THE DELIVERIES FOR SPECIFIC TIME SLOT
		if ($this->session->userdata('role') != 'vendor') {
			if ($sd == null and $ed == null) {
				$deliveries_by_slots = $this->db->query("SELECT o.slotID as slot_id , b.name as 'slot',  COUNT(o.order_id) AS 'total_deliveries', SUM(CASE WHEN o.delivered_status =1 THEN 1 ELSE 0 END ) AS 'delivered_deliveries',SUM(CASE WHEN o.status !='Delivered'  and o.status != 'Collected' and o.driver_id > 0 and o.is_cancelled ='no' THEN 1 ELSE 0 END ) AS 'pending_deliveries' FROM orders as o JOIN basic_time_slots as b On o.slotID = b.basic_time_id  WHERE o.action != 'Paused' and o.action != 'Freezed'  Group By slotID")->result();
			} else {
				$deliveries_by_slots = $this->db->query("SELECT o.slotID as slot_id, b.name as 'slot',  COUNT(o.order_id) AS 'total_deliveries', SUM(CASE WHEN o.delivered_status =1 THEN 1 ELSE 0 END ) AS 'delivered_deliveries',SUM(CASE WHEN o.status !='Delivered'  and o.status != 'Collected' and o.driver_id > 0 and o.is_cancelled ='no' THEN 1 ELSE 0 END ) AS 'pending_deliveries' FROM orders as o JOIN basic_time_slots as b On o.slotID = b.basic_time_id  WHERE o.action != 'Paused' and o.action != 'Freezed' and  o.delivery_date BETWEEN ? AND ? Group By slotID order By slotID asc ", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
				// return $this->db->query("SELECT slotID  ,  COUNT(order_id) AS 'total_deliveries', SUM(CASE WHEN delivered_status =1 THEN 1 ELSE 0 END ) AS 'delivered_deliveries',SUM(CASE WHEN delivered_status !=1 THEN 1 ELSE 0 END ) AS pending_deliveries FROM `orders` WHERE action != 'Paused' and action != 'Freezed' and  delivery_date BETWEEN ? AND ? Group By slotID", array($sd . " 00:00:00", $ed . " 23:59:59"))->result();
			}
			usort($deliveries_by_slots, function ($a, $b) use ($s_order) {
				$pos_a = array_search($a->slot, $s_order);
				$pos_b = array_search($b->slot, $s_order);
				return $pos_a - $pos_b;
			});
			return $deliveries_by_slots;
		} else {
			$this->load->view('forbidden');
		}
	}
}
