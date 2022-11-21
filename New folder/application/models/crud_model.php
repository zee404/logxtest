<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud_model extends CI_Model
{

    public function add($tb, $values)
    {
        $this->db->insert($tb, $values);
    }

  


    public function add_registration($tb, $values)
    {
        $record = $this->db->where('Email', $values['Email'])->get($tb)->result_array();
        if (empty($record)) {
            $this->db->insert($tb, $values);
            return 1;
        }
        return 0;
    }

  

   function isvalid($username, $password)
    {
        $query = $this->db
            ->where('userName', $username)
            ->where('password', md5($password))
            ->get('login');

        return $query->result();

    }
     public function updateRecord($d, $i)
    {
        $this->db->where(array('ID' => $i));
        $this->db->update('login', $d);
    }
     public function show_user()
    {
       
        $registration_form = $this->db->get('login')->result_array();
        return $registration_form;

    }
     function delRecord($id)
    {
        $this->db->where(array('ID' => $id));
        $this->db->delete('login');
    }

    function getRecord($eid = 0)
    {
        if ($eid == 0)
            return 0;

        $this->db->where(array('ID' => $eid));
        return $this->db->get('login')->result_array();
    }
    }