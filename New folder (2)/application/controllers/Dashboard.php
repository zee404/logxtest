<?php 
/**
 * a controller to deal all the calculations showed in Dashboard
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if(empty($this->session->userdata('email')))
			redirect(base_url());

		$this->load->model('dashboard_model', 'DM');
	}

	function index()
	{

	}

	// dashboard counter stats are calculated here
	function get_stats()
	{
		$data['deliveries'] = $this->DM->get_deliveries();
		$data['users'] = $this->DM->get_users();
	}

	function get_pie_chart()
	{
		$sd = !empty($this->input->post('start_date')) ? $this->input->post('start_date') : date('Y-m-d');
		$ed = !empty($this->input->post('end_date')) ? $this->input->post('end_date') : date('Y-m-d');
		$data['results'] = $this->DM->get_pie_charts($sd, $ed);
		
		echo json_encode($data);
	}

	function get_notifications()
	{
		$notis = $this->DM->collect_notifs(strtolower($this->session->userdata('role')));
		echo json_encode($notis);
	}

	function get_comp_chart()
	{
		$sd = !empty($this->input->post('start_date')) ? $this->input->post('start_date') : null;
		$ed = !empty($this->input->post('end_date')) ? $this->input->post('end_date') : null;
		if($sd == $ed)
		{	
			$sd = date('Y-m-d', strtotime('previous monday'));
			$ed = date('Y-m-d', strtotime('next monday'));
		}
		$d = $this->DM->calculate_compare_charts($sd, $ed);
		$timestamp = strtotime('previous Monday');
		$days = array();
		/*for ($i = 0; $i < 7; $i++) {
    		$days[] = date('Y-m-d', $timestamp);
    		$timestamp = strtotime('+1 day', $timestamp);
		}*/
		$sd = date('Y-m-d', strtotime($sd));
		$ed = date('Y-m-d', strtotime($ed));
		
		while($sd != $ed)
		{
			$days[] = $sd;
			$sd = date('Y-m-d', strtotime($sd.' +1 day'));	
		}

		$d['days'] = $days;
		echo json_encode($d);
	}
}

 ?>