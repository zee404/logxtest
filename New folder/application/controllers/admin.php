<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller
{
   
    public function index()
     {
        
        $this->load->view('index');

     }
     public function staff()
     {
        
        $this->load->view('staff');

     }
     public function storkeeper_list()
     {
        
        $this->load->view('storkeper_list');

     }
     public function upload_driver()
     {
        
        $this->load->view('Upload_Drivers');

     }
     public function uploaded()
     {
        
        $this->load->view('uploaded_drivers');

     }
     public function invited_driver()
     {
        
        $this->load->view('invited_driver');

     }
      public function active_driver()
     {
        
        $this->load->view('active_drivers');

     }
     public function track_driver()
     {
        
        $this->load->view('track_driver');

     }
     public function upload_customer()
     {
        
        $this->load->view('upload_customer');

     }
     public function uploaded_customer()
     {
        
        $this->load->view('uploaded_customers');

     }

      public function invited_customer()
     {
        
        $this->load->view('invited_customers');

     }
      public function active_customer()
     {
        
        $this->load->view('active_customers');

     }

      public function upload_Deliveries()
     {
        
        $this->load->view('upload_deliveries');

     }
     public function uploaded_Deliveries()
     {
        
        $this->load->view('uploaded_deliveries');

     }




    
  

   
}