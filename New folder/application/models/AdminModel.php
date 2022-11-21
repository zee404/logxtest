<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model {
  

     public function add_document($tb,$data)
      {
       return $this->db->insert($tb,$data);
      }
    
}