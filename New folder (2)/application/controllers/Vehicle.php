<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 10:45 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dubai');
        $this->load->model('Vehicle_model');
        $this->load->model('Vehicle_status');
        $this->load->library('ci_qr_code');
        $this->config->load('qr_code');
        if (empty($this->session->userdata('name')) )
            redirect(base_url('auth/index')) or exit('no direct access allowed');
    }

    public function index()
    {
        $result =$this->Vehicle_model->get_listing();
        $list = [];
         if (count($result))
         {
             foreach ($result as $value){
                 $res=$this->get_vehicle_status($value['id']);
                //  print_r($res);
                //  die();
                 $list [] = (object)[
                     'id' => $value['id'],
                     'vehicle_status' => $res['status'],
                     'driver'=>$res['driver'],
                     'phone'=>$res['phone'],
                     'model_name' => $value['model_name'],
                     'type' => $value['type'],
                     'qr_code' => base_url($value['qr_code']),
                     'qr_code_a' => (!empty($value['qr_code'])) ? 'yes' : 'no',
                     'year' => $value['year'],
                     'i_image_a' => (!empty($value['i_image'])) ? 'yes' : 'no',
                     'i_image' => base_url($value['i_image']),
                     'i_exp' => $value['i_exp'],
                     'i_issue' => $value['i_issue'],
                     'm_image' => base_url($value['m_image']),
                     'm_image_a' => (!empty($value['m_image'])) ? 'yes' : 'no',
                     'm_exp' => $value['m_exp'],
                     'm_issue' => $value['m_issue'],
                     'r_image' => base_url($value['r_image']),
                     'r_image_a' => (!empty($value['r_image'])) ? 'yes' : 'no',
                     'r_exp' => $value['r_exp'],
                     'r_issue' => $value['r_issue'],
                     'v_image' => base_url($value['v_image']),
                     'v_image_a' => (!empty($value['v_image'])) ? 'yes' : 'no',
                     'v_number' => $value['v_number'],
                 ];
             }
         }
         $data['list'] = $list;
        //  echo '<pre>';
        //  print_r($data['list']);
        //  die();
        $this->load->view('vehicle_list',$data);
    }

    private function get_vehicle_status($vehicle_id)
    {
        $result = $this->Vehicle_status->get_vehicle_status($vehicle_id);
        if (!empty($result))
        {
            if (!empty($result->check_in) AND !empty($result->checkout))
            {
                $data=['status' =>'Vacant', 'driver'=>$result->driver, 'phone'=>$result->phone];
                return $data;
            }elseif(!empty($result->check_in) AND empty($result->checkout))
            {
                $data=['status' =>'Occupied', 'driver'=>$result->driver, 'phone'=>$result->phone];
                return $data;
                // return 'Occupied';
            }else
                {
                    $data=['status' =>'Occupied', 'driver'=>$result->driver, 'phone'=>$result->phone];
                return $data;
                // return 'Occupied';
            }
        }else{
            $data=['status' =>'Vacant', 'driver'=>$result->driver, 'phone'=>$result->phone];
                return $data;
            // return 'Vacant';
        }
    }


    private function upload_image($b64_string, $name)
    {
        $ext = 'pdf';
        $directory_path = 'assets/uploads/vehicle/';
        $type = ($name.'-'.get_unique_string('8'));

        try {
            if (!empty($b64_string))
            {
                $path = base64_to_file($b64_string, $ext, $type, $directory_path);

                return $path;
            }

        }
        catch (Exception $ex) {
            throw $ex;
        }
    }

    public function save_vehicle()
    {
       $id = $this->input->post('id');
       $i_exp = $this->input->post('i_exp');
        $i_issue = $this->input->post('i_issue');
       $m_exp = $this->input->post('m_exp');
       $m_issue = $this->input->post('m_issue');
       $r_exp = $this->input->post('r_exp');
       $r_issue = $this->input->post('r_issue');
       $modal_name = $this->input->post('modal_name');
       $type = $this->input->post('typee');
       $year = $this->input->post('year');
       $v_number = $this->input->post('v_number');
       $v_image_str = $this->input->post('v_image_str');
       $i_image_str = $this->input->post('i_image_str');
       $m_image_str = $this->input->post('m_image_str');
       $r_image_str = $this->input->post('r_image_str');

       $data = [
           'model_name' => strtolower($modal_name),
           'type' => $type,
           'year' => $year,
           'i_exp' => date('Y-m-d',strtotime($i_exp)),
           'i_issue' => date('Y-m-d',strtotime($i_issue)),
           'm_exp' => date('Y-m-d',strtotime($m_exp)),
           'm_issue' => date('Y-m-d',strtotime($m_issue)),
           'r_exp' => date('Y-m-d',strtotime($r_exp)),
           'r_issue' => date('Y-m-d',strtotime($r_issue)),
           'v_number' => $v_number,
           'updated_at' => date('Y-m-d'),
       ];
          $images=[];
       if (!empty($id) AND $id > 0){
           if (!empty($i_image_str)){
               $images['i_image'] = $this->upload_image($i_image_str,'insurance');
           }
           if (!empty($m_image_str)){
               $images['m_image'] = $this->upload_image($m_image_str,'municipal');
           }
           if (!empty($r_image_str)){
               $images['r_image'] = $this->upload_image($r_image_str,'registration');
           }
           if (!empty($v_image_str)){
               $images['v_image'] = $this->upload_image($v_image_str,'vehicle');
           }
       }else{
           $images = [
               'i_image' => (!empty($i_image_str))? $this->upload_image($i_image_str,'insurance') : null,
               'm_image' => (!empty($m_image_str)) ? $this->upload_image($m_image_str,'municipal') : null,
               'r_image' => (!empty($r_image_str)) ? $this->upload_image($r_image_str,'registration') : null,
               'v_image' => (!empty($v_image_str)) ? $this->upload_image($v_image_str,'vehicle') : null,
           ];
       }
       $final = array_merge($data,$images);
        if (!empty($id) AND $id > 0){
            $result =  $this->Vehicle_model->update($id,$final);
            // echo '<pre>';
            // print_r($final);
            // die();
        }else{
            $final['created_at'] = date('Y-m-d');
            $insert_id = $this->Vehicle_model->add_vehicle($final);
            $qrcode = (object)[
                'id' => $insert_id,
                'model_name' => strtolower($modal_name),
                'type' => $type,
                'year' => $year,
                'v_number' => $v_number,
            ];
            $qr_path = $this->print_qr($qrcode);
            $result = $this->Vehicle_model->add_qr($qr_path, $insert_id);
        }

        if($result){
            echo "success";
        }else{
            echo "error";//
        }

    }

    public function check_duplicate()
    {
        $vehicle_id = $this->input->post('vehicle_id');
        $modal_name = $this->input->post('modal_name');

        $res=$this->Vehicle_model->check_duplicate($vehicle_id,$modal_name);

        if($res){
            echo "Name Already Exists";
        }else{
            echo "";//
        }
    }

    public function delete_vehicle()
    {
        $vehicle_id = $this->input->post('id');

        $this->Vehicle_model->delete_vehicle($vehicle_id);
        echo "success";
    }

    private function print_qr($qr_data)
    {

        $qr_code_config = array();
        $qr_code_config['cacheable'] = $this->config->item('cacheable');
        $qr_code_config['cachedir'] = $this->config->item('cachedir');
        $qr_code_config['imagedir'] = $this->config->item('imagedir');
        $qr_code_config['errorlog'] = $this->config->item('errorlog');
        $qr_code_config['ciqrcodelib'] = $this->config->item('ciqrcodelib');
        $qr_code_config['quality'] = $this->config->item('quality');
        $qr_code_config['size'] = $this->config->item('size');
        $qr_code_config['black'] = $this->config->item('black');
        $qr_code_config['white'] = $this->config->item('white');
        $this->ci_qr_code->initialize($qr_code_config);


        // get full name and user details
        $image_name = get_unique_string() . ".png";

        // create user content
        $codeContents = "vehicle_id:";
        $codeContents .= "$qr_data->id";
        $codeContents .= "\n";
        $codeContents .= "model_name:";
        $codeContents .= "$qr_data->model_name";
        $codeContents .= "\n";
        $codeContents .= " type:";
        $codeContents .= "$qr_data->type";
        $codeContents .= "\n";
        $codeContents .= "year :";
        $codeContents .= $qr_data->year;
        $codeContents .= "\n";
        $codeContents .= "v_number :";
        $codeContents .= $qr_data->v_number;

        $params['data'] = $codeContents;
        $params['level'] = 'H';
        $params['size'] = 10;

        $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
         $this->ci_qr_code->generate($params);

        $this->data['qr_code_image_url'] = base_url() . $qr_code_config['imagedir'] . $image_name;

//        if(file_exists($file)){
//            header('Content-Description: File Transfer');
//            header('Content-Type: text/csv');
//            header('Content-Disposition: attachment; filename='.basename($file));
//            header('Content-Transfer-Encoding: binary');
//            header('Expires: 0');
//            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//            header('Pragma: public');
//            header('Content-Length: ' . filesize($file));
//            ob_clean();
//            flush();
//            readfile($file);
//            unlink($file); // deletes the temporary file
//
//            exit;
//        }
        return $qr_code_config['imagedir'] . $image_name;
    }
    
    
    
    
    
    
    
    public function upload_test($b64_string, $name)
    {
        $ext = '.png';
        $directory_path = 'assets/companyQR/';
        // $type = ($name.'-'.get_unique_string('8'));

        try {
            if (!empty($b64_string))
            {
                // $path = base64_to_file($b64_string, $ext,$name, $directory_path);

                return $b64_string.$ext;
            }

        }
        catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
     public function print_Cpm($qr_data)
    {

        $qr_code_config = array();
        $qr_code_config['cacheable'] = $this->config->item('cacheable');
        $qr_code_config['cachedir'] = $this->config->item('cachedir');
        $qr_code_config['imagedir'] = $this->config->item('imagedir');
        $qr_code_config['errorlog'] = $this->config->item('errorlog');
        $qr_code_config['ciqrcodelib'] = $this->config->item('ciqrcodelib');
        $qr_code_config['quality'] = $this->config->item('quality');
        $qr_code_config['size'] = $this->config->item('size');
        $qr_code_config['black'] = $this->config->item('black');
        $qr_code_config['white'] = $this->config->item('white');
        $this->ci_qr_code->initialize($qr_code_config);


        // get full name and user details
        $image_name = get_unique_string() . ".png";

        // create user content
        // $codeContents = "Company's website:";
        // $codeContents = base_url('assets/images/Logo_with_new_icon.png');
        $codeContents = "L O G X TRANSPORT LLC";
        $codeContents .= "\n";
        // $codeContents .= "\n";
        $codeContents .= "Refrigerated Logistics Solutions";
        $codeContents .= "\n";
        // $codeContents .= "\n";
        $codeContents .= "https://www.logxtransport.com";
        $codeContents .= "\n";
        // $codeContents .= "\n";
        $codeContents .= "+971 544009796";
        // $codeContents .= "\n";
        // $codeContents .= "The Logx:";
        // $codeContents .= "$qr_data->model_name";
        // $codeContents .= "\n";
        
        $params['data'] = $codeContents;
        $params['level'] = 'H';
        $params['size'] = 10;
        

        $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
         $this->ci_qr_code->generate($params);

        $this->data['qr_code_image_url'] = base_url() . $qr_code_config['imagedir'] . $image_name;


        return $qr_code_config['imagedir'] . $image_name;
    }
    
    
    
    public function QR(){
        
        $qrcode = (object)[
                'url' => 'https://demo.thelogx.com',
                
            ];
         $qr_path = $this->print_Cpm($qrcode);
    //   $res= $this->upload_test($qr_path,'Comapny_QR');
      echo 'qr_path <br>';
      echo $qr_path;
    //   echo '<br> res';
    //   echo $res;
      
      
        //     $config['upload_path'] = './companyQR/';
        //   $config['allowed_types'] = 'png';
        //   $config['max_size']    = 0;

        //  // print_r($this->input->post());

        //   $this->load->library('upload', $config);
        //   if (!$this->upload->do_upload('QR')){
        //       $res['error'] = $this->upload->display_errors();
        //     //   $res['page_data'] = 'admin/upload_view';
        //     //   $this->load->view('new_vendor',$res);
        //      // print_r('i am file upload');
        //       return false;
        //   }else{
        //     $data['QR'] = base_url()."companyQR/".$this->upload->data('file_name');
        //     // print_r('i am file upload else');
        //     echo '<pre>';
        //     print_r($data);
        //   }
            
    }
    
    
    
    // Ayesha 
    
      public function check_registration_num()
    {
     
      $v_number = $this->input->post('v_number');
    
      $result = $this->Vehicle_model->check_registration($v_number);
    //   print_r($result);
      if ($result) {
        echo "already exist";
      }else{
        echo "not available";
      }
    }
    



}

?>