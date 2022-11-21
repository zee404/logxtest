<?php
defined('BASEPATH') OR exit('direct access denied');

class Staff_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }
    
    function readData($t, $where=null)
    {
        if($where != null)
            $this->db->where($where);
        return $this->db->get($t)->result_array();
    }
    
    function saveData($t, $data)
    {
        if(!empty($t) && !empty($data))
        {
            $this->db->insert($t, $data);
            return $this->db->insert_id();
        }
        else
            return 0;
    }
    
    function getEmployees()
    {
        $this->db->where("roles.name in ('TEAM ADMINISTRATOR', 'RESOURCE PLANNER', 'ROUTE MANAGER') AND users.status = 1 AND users.is_deleted = 0");
        $this->db->from('users');
        $this->db->select('users.*, roles.name AS role_name');
        $this->db->join('roles', 'roles.id = users.role_id', 'left');
        return $this->db->get()->result_array();
    }
    
    function updateData($t, $c, $d)
    {
        if(empty($t) OR empty($c) OR empty($d))
            return;
        $this->db->where($c);
        $this->db->update($t, $d);
    }
}

?>