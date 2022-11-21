<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 10/06/2018
 * Time: 1:13 PM
 */

class Notification_model extends CI_Model{
    var $table_user = "users";
    var $table = "notification_log";

    public function __construct(){
        parent::__construct();
    }

    public function get_where($where){
        $this->db->select('n.*, u.full_name, u.phone');
        $this->db->from($this->table.' as n');
        $this->db->join($this->table_user.' as u', 'u.id = n.user_id');
        if($where){
            $this->db->where($where);
        }
        $this->db->order_by('n.notification_log_id','desc');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_device_token($where){
        $query = $this->db->select('device_token,  platform, badge_count')->get_where($this->table_user, $where);
        return $query->result();
    }

    //only no of customers
    //only return not assigned
    public function count_unseen($user_id){
        $this->db->where('last_seen_dt is NULL');
        $this->db->from($this->table);
        if($user_id){
            $this->db->where('user_id',$user_id);
        }
        return $this->db->count_all_results();
    }

    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); //return last inserted id
    }

    function update($data, $where){
        return $this->db->update($this->table, $data, $where);
    }

    public function delete($where){
        return $this->db->delete($this->table, $where);
    }

    function increment_badge_counter($where){
        $number = 1;
        $operator = '+';
        return $this->db->where($where)->set('badge_count', 'badge_count  '.$operator.' '.(int)$number, FALSE)->update($this->table_user);
    }

    function get_all_vendors()
    {
        return $this->db->query("SELECT users.id AS 'vendor_id', users.full_name AS 'vendor_name' FROM users LEFT JOIN roles ON roles.id = users.role_id WHERE roles.name = 'vendor'")->result_array();
    }

}

?>
