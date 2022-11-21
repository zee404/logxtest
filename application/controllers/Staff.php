<?php
defined('BASEPATH') OR exit('Direct Access Denied');
class Staff extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        
        // date_default_timezone_set("Asia/Dubai");
        // if($this->session->userdata('role') != 'admin')
        // {
        //     $this->session->set_flashdata('error', 'Access Denied');
        //     redirect(base_url());
        // }
        // $this->output->enable_profiler(false);  //this show value at your page
        $this->load->model('staff_model', 'SM');
    }
    
    public function index()
    {
        $condition = "name in ('TEAM ADMINISTRATOR', 'RESOURCE PLANNER', 'ROUTE MANAGER')";
        $data['roles'] = $this->SM->readData('roles', $condition);
        $this->load->view('staff/add_staff', $data);
    }
    
    public function add()
    {
        if(!empty($this->input->post())){
            $rec['full_name'] = $this->input->post('s_name');
            $rec['username'] = $this->input->post('s_username');
            $rec['phone'] = $this->input->post('s_phone');
            $rec['email'] = $this->input->post('s_email');
            $rec['password'] = md5($this->input->post('s_pass'));
            $realPass = $this->input->post('s_pass');
            $rec['role_id'] = $this->input->post('s_role');
            $rec['allowed_modules'] = !empty($_POST['modules']) ? implode(',', $_POST['modules']) : '';
            $rec['status'] = 1;
            $rec['created_user'] = $this->session->userdata('email');
            $rec['created_dt'] = date('Y-m-d h:i:s');
            $uid = $this->SM->saveData('users', $rec);
            $roleName = $this->input->post('role_name');
            if($uid > 0)
            {
                $li = '<ul>';
                foreach($this->input->post('modules') AS $module)
                {
                    $li .= '<li>'.$module.'</li>';
                }
                $li .= '</ul>';
                $msg = 'Hi <b>'.$rec['full_name'].'</b><br>This is you to inform that You have been registered at <a href="https://www.thelogx.com/auth" target="_blank">LogX Portal</a> as <b>'.$roleName.'</b> with The Following Modules:<br><b>'.$li.'</b><br>Please Login Using the Followng Credentials<br><b>Email:</b>'.$rec['email'].'<br><b>Password:</b>'.$realPass.'<br><h3>Thank You!</h3>';
                send_email(array('to'=>$rec['email'], 'msg'=>$msg, 'subject'=>'LogX Login Credentials'));
                $this->session->set_flashdata('success', $rec['full_name'].' is Saved in Staff Record');
                redirect(base_url('staff'));
            }
        }
    }
    
    function show()
    {
        $data['emps'] = $this->SM->getEmployees();
        $this->load->view('staff/show_staff', $data);
    }
    
    function sess()
    {
        print_r($this->session->userdata());
    }
    
    function check_email()
    {
        $response = array('status'=>'error');
        if(!empty($this->input->post()) AND !empty($this->input->post('email')))
        {
            $email = $this->input->post('email');
            $cond = array('email'=>$email);
            $data['recs'] = $this->SM->readData('users', $cond);
            if(count($data['recs']) > 0)
            {
                $response = array('status'=>'error');
            }
            else
                $response = array('status'=>'success');
                
            echo json_encode($response);
        }
        else
        echo json_encode($response);
    }
    
    function del()
    {
        if(!empty($this->input->post('user-id')))
        {
            $uid = $this->input->post('user-id');
            $updateData = array('is_deleted'=>1);
            $cond = array('id'=>$uid);
            $this->SM->updateData('users', $cond, $updateData);
        }
    }
    function update()
    {
        $userId = $this->input->post('user_id');
        $update['email'] = $this->input->post('email');
        $update['phone'] = $this->input->post('phone');
        $update['role_id'] = $this->input->post('role_id');
        $update['full_name'] = $this->input->post('full_name');
        if(!empty($userId))
        {
            $cond = array('id'=>$userId);
            $this->SM->updateData('users', $cond, $update);
            echo 'done';
        }
        else
        echo 'failed';
    }
}