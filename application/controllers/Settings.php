<?php 
defined('BASEPATH') OR exit('direct access denied');
/**
 * project settings
 */
class Settings extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model');
	}

	function index()
	{

	}

	function alerts()
	{
		$data['opts'] = $this->Setting_model->getOpts();
		$this->load->view('msg_settings', $data);
	}

	function save_option()
	{
		$option['option_name'] = $this->input->post('option_name');
		$option['option_value'] = $this->input->post('option_value');

		$this->Setting_model->saveOpts($option);
		redirect(base_url('settings/alerts?saved=true'));
	}

	function profile()
	{
		$this->load->view('profile_settings');
	}
	


	function save($what='general')
	{
		if(!empty($this->input->post()))
		{
			if($what == 'general')
			{
				$user['full_name'] = $this->input->post('full_name');
				$user['email'] = $this->input->post('user_email');
				$user['phone'] = $this->input->post('phone');

				$where = array('id' => $this->session->userdata('u_id'));

				$update = $this->Setting_model->update_data('users', $user, $where);
				if($update == true){
					$this->session->set_flashdata('success', 'Profile Info Updated');
					$this->session->set_userdata($user);
				}
				else
					$this->session->set_flashdata('error', 'Profile Updation Failed');

				redirect(base_url('settings/profile'));
			}
			else if($what == 'password')
			{
				if(!empty($this->input->post('curr_pass')) AND !empty($this->input->post('new_pass')) AND !empty($this->input->post('re_pass')) AND md5($this->input->post('curr_pass')) == $this->session->userdata('password') AND $this->input->post('new_pass') == $this->input->post('re_pass'))
				{
					$password['password'] = md5($this->input->post('new_pass'));
					$password['Password_partner'] = $this->input->post('new_pass');
					$password['plain_password'] = $this->input->post('new_pass');
					$updatee = $this->Setting_model->update_data('users', $password, array('id' => $this->session->userdata('u_id')));
					if($updatee)
					{
						$this->session->set_flashdata('success', 'Password Updated Successfully');
						$this->session->set_userdata('password', $password['password']);
					}
					else
						$this->session->set_flashdata('error', 'Password Updation Failed');
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Input');						
				}

				redirect(base_url('settings/profile'));
			}
		}
	}
	
	
	
	
	public function emirates()
	{
	    $this->load->model('order_model');
	    
		$data['emirates'] = $this->Setting_model->get_emirates();
		$data['timeslot'] =  $this->order_model->get_basic_timeslots();
 		$data['emi_with_time'] = $this->order_model->get_emirate_with_TimeSlots();
// 		echo '<pre>';
// 		print_r($data);
// 		die();
		$this->load->view('settings/emirates',$data);
	}
	
	public function payments()
	{
		$data['payment'] = $this->Setting_model->get_payment_type();
		$this->load->view('settings/payments',$data);
	}

	public function save_emirate()
	{
		$response = array('success' => false);
        $emirate_name = $this->input->post('emirate_name');
         $mods = $this->input->post('timeslots');
        $where = array('emirate_name' => $emirate_name);
        $emirates = $this->Setting_model->get_emirates($where);

        if(!$emirates){
            
           $timeslot = !empty($mods) ? implode(',', $mods) : '';
          
            $fields = array(
                'emirate_name' =>  $emirate_name,
                'status' =>  1,
                'basic_time_id' => $timeslot,
            );

            $result = $this->Setting_model->add_emirate($fields);
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
	}
	public function save_payment_type()
	{
		$response = array('success' => false);
        $payment_name = $this->input->post('payment_name');
        $where = array('payment_name' => $payment_name);
        $payments = $this->Setting_model->get_payment_type($where);

        if(!$payments){
            $fields = array(
                'payment_name' => $payment_name,
                
            );

            $result = $this->Setting_model->add_payment_type($fields);
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
	}

	public function update_emirate()
	{
		$response = array('success' => false);
        $emirate_id = $this->input->post('emirate_id');
         $mods = $this->input->post('timeslots');
         $timeslot = !empty($mods) ? implode(',', $mods) : '';

        $fields = array(
            'emirate_name' => $this->input->post('name'),
             'basic_time_id' => $timeslot,
        );

        $where = array('id'=> $emirate_id);
        $result = $this->Setting_model->update_emirate($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
	}

	public function get_emirate_by_id()
	{
		$response = array('success' => false);
		$emirate_id =  $this->input->post('emirate_id');
		$where = array('id' => $emirate_id);
		$emirate = $this->Setting_model->get_emirates($where);
		if(count($emirate) > 0){
            $response['success'] = true;
            $response['detail'] = $emirate;
		}
		echo json_encode($response);
	}
	public function update_paymentType()
	{
		$response = array('success' => false);
        $payment_id = $this->input->post('payment_id');

        $fields = array(
            'payment_name' => $this->input->post('name'),
        );

        $where = array('id'=> $payment_id);
        $result = $this->Setting_model->update_payment_type($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
	}
    
    public function get_paymentType_by_id()
	{
		$response = array('success' => false);
		$payment_id =  $this->input->post('payment_id');
		$where = array('id' => $payment_id);
		$payment = $this->Setting_model->get_payment_type($where);
		if(count($payment) > 0){
            $response['success'] = true;
            $response['detail'] = $payment;
		}
		echo json_encode($response);
	}
	public function delete_emirate($id)
	{
		$this->Setting_model->delete_emirate($id);
		redirect(base_url('settings/emirates?del=done'));
	}
	public function delete_payment($id)
	{
		$this->Setting_model->delete_payment($id);
		redirect(base_url('settings/payments?del=done'));
	}

	public function service_type()
	{
		$data['service_types'] = $this->Setting_model->get_service_types();
		$this->load->view('settings/service_type',$data);
	}

	public function save_service_type()
	{
		$response = array('success' => false);
        $service_type_name = $this->input->post('service_type_name');
        $where = array('name' => $service_type_name);
        $emirates = $this->Setting_model->get_service_types($where);

        if(!$emirates){
            $fields = array(
                'name' =>  $service_type_name,
                'status' =>  1,
            );

            $result = $this->Setting_model->add_service_type($fields);
            if($result){
                $response['success'] = true;
            }
        }

        echo json_encode($response);
	}

	public function update_service_type()
	{
		$response = array('success' => false);
        $service_type_id = $this->input->post('service_type_id');

        $fields = array(
            'name' => $this->input->post('name'),
        );

        $where = array('id'=> $service_type_id);
        $result = $this->Setting_model->update_service_type($fields, $where);
        if($result){
            $response['success'] = true;
        }

        echo json_encode($response);
	}

	public function get_service_type_by_id()
	{
		$response = array('success' => false);
		$service_type_id =  $this->input->post('service_type_id');
		$where = array('id' => $service_type_id);
		$service_type = $this->Setting_model->get_service_types($where);
		if(count($service_type) > 0){
            $response['success'] = true;
            $response['detail'] = $service_type;
		}
		echo json_encode($response);
	}

	public function delete_service_type($id)
	{
		$this->Setting_model->delete_service_type($id);
		redirect(base_url('settings/service_type?del=done'));
	}
	
		public function CompanyProfileQr(){
	    
	    $this->load->view('settings/CompanyProfileQr');
	}
}

 ?>