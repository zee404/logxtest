<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 1/3/2018
 * Time: 10:45 AM
 */

class User_auth extends CI_Model{

    var $table = "users";
    var $table_roles = "roles";
    var $table_log = "login_log";

    public function __construct(){
        parent::__construct();

        $this->column_order = array(null,'users.full_name','users.phone','activity_log.visiting_time','activity_log.visiting_time','activity_log.page_url,activity_log.ip_address');
        $this->column_search = array('users.full_name','users.phone','activity_log.ip_address');
        $this->order = array('activity_log.visiting_time' => 'desc');
    }


//     public function login($where){
//             $this->db->select('u.id, u.email, u.phone, u.full_name, u.role_id, u.modules, r.name as role');
//             $this->db->from($this->table.' as u');
//             $this->db->join($this->table_roles.' as r', 'on u.role_id = r.id');
//             $this->db->where($where);
//           // $this->db->where('u.status',1);
//             $query = $this->db->get();
//             return $query->row();
// //        $table = (isset($table)) ? $table : $this->table ;
// //        $query= $this->db->get_where($table, $where);
// //        return $query->row();
//     }
  public function login($where, $rid = 0){
            $this->db->select('u.id, u.email, u.phone, u.full_name, u.password, u.role_id, u.modules, r.name as role');
            $this->db->from($this->table.' as u');
            $this->db->join($this->table_roles.' as r', 'on u.role_id = r.id');
            $this->db->where($where);
            if($rid != 0)
                $this->db->where('u.role_id != '.$rid);
           // $this->db->where('u.status',1);
            $query = $this->db->get();
            // print_r($query);
            // exit();
            return $query->row();
//        $table = (isset($table)) ? $table : $this->table ;
//        $query= $this->db->get_where($table, $where);
//        return $query->row();
    }

    public function get_user_by_id($where){
        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }

    public function get_where($where){
        $query = $this->db->get_where($this->table, $where);
        return $query->result();
    }

    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update($data, $where){
        return $this->db->update($this->table, $data, $where);
    }

    public function delete($where){
        return $this->db->delete($this->table, $where);
    }

    public function get(){
        $this->db->select('p.name, p.id, up.user_id');
        $this->db->from($this->table_permission.' as p');
        $this->db->join($this->table_user_permission.' as up', 'on up.permission_id = p.id');
        $this->db->where('p.status',1);
        $query = $this->db->get();
        return $query->result();

        $result = array ();
        $where = array('agency_id'=>0);
        $query = $this->db->get_where($this->table, $where);
        $regions = $query->result();
        if ($regions){
            $result['result'] = true;
            $result['records'] = $regions;
        }else{
            $result['result'] = false;
        }
        return $result;
    }


    /***************************************************************************************
     ******************************************ROLES****************************************
     ***************************************************************************************/

    public function add_permission($data){
        return $this->db->insert($this->table_user_permission, $data);
    }

    public function add_role_permission($data){
        return $this->db->insert($this->table_role_permissions, $data);
    }

    public function delete_permission($where){
        return $this->db->delete($this->table_user_permission, $where);
    }

    public function delete_role_permission($where){
        return $this->db->delete($this->table_role_permissions, $where);
    }

    public function get_user_permission($user_id){
        $this->db->select('p.name, p.id, up.user_id');
        $this->db->from($this->table_permission.' as p');
        $this->db->join($this->table_user_permission.' as up', 'on up.permission_id = p.id');
        $this->db->where('p.status',1);
        $this->db->where('up.user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_permission_by_department($department_id){
        $this->db->select('p.name, p.id, p.department_id');
        $this->db->from($this->table_permission.' as p');
        $this->db->where('p.status',1);
        $this->db->where('p.department_id', $department_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_roles(){
        $result = array ();
        $where = array('status'=>1);
        $query = $this->db->get_where($this->table_roles, $where);
        $roles = $query->result();
        if ($roles){
            $result['result'] = true;
            $result['records'] = $roles;
        }else{
            $result['result'] = false;
        }
        return $result;
    }

    public  function  get_user_role($user_id){
        $this->db->select('r.name, r.id, ur.user_id, r.department_id');
        $this->db->from($this->table_roles.' as r');
        $this->db->join($this->table_user_role.' as ur', 'on ur.role_id = r.id');
        $this->db->where('r.status',1);
        $this->db->where('ur.user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_assigned_roles($where){
        return $this->db->delete($this->table_user_role, $where);
    }

    public function add_user_roles($data){
        return $this->db->insert($this->table_user_role, $data);
    }

    public function get_role_permissions($role_id){
        $this->db->select('p.name, p.id, rp.role_id');
        $this->db->from($this->table_permission.' as p');
        $this->db->join($this->table_role_permissions.' as rp', 'on rp.permission_id = p.id');
        $this->db->where('p.status',1);
        $this->db->where('rp.role_id', $role_id);
        $query = $this->db->get();
        return $query->result();
    }


    /***************************************************************************/
    /********************************USERS LOG**********************************/
    /***************************************************************************/
    function save_log($data){
        return $this->db->insert($this->table_log, $data);
    }

    function update_log($data, $where){
        return $this->db->update($this->table_log, $data, $where);
    }

    function get_login_user(){
        $user_id = $this->session->userdata('u_id');
        $login_date = date('Y-m-d');

        $this->db->select('id');
        $this->db->from($this->table_log);
        $this->db->where('user_id',$user_id);
        $this->db->where('login_date',$login_date);
        $this->db->where('logout_date','0000-00-00');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $result = $query->row();
    }

    public function get_login_history($user_id, $first_date, $second_date){
        $result = array ();

        $condition = " l.login_date BETWEEN  " . "'" . $first_date . "'" . " AND " . "'" . $second_date . "'";
        $this->db->select('l.*, u.full_name, u.email, u.phone');
        $this->db->from($this->table_log.' as l');
        $this->db->join($this->table.' as u', 'on u.id = l.user_id');

        if($user_id)
            $this->db->where('l.user_id = '.$user_id);

        $this->db->where($condition);
        $this->db->order_by('l.login_date','desc');

        if($user_id == '')
            $this->db->group_by('user_id');

        $query = $this->db->get();
        $history = $query->result();
        if ($history){
            $result['result'] = true;
            $result['records'] = $history;
        }else{
            $result['result'] = false;
        }
        return $result;

    }



    public function user_activity($where)
    {
        $logs = $this->db->select('activity_log.log_id,activity_log.page_url,activity_log.visiting_time,activity_log.user_id, activity_log.ip_address, users.id,users.phone,users.full_name')
            ->from('activity_log')
            ->join('users','activity_log.user_id=users.id')
            // ->where($where)
            ->get()->result();
        return $logs;
    }


    //Function For datatable server side paginaiton
    public function get_user_activity($postData){
        $this->_get_datatables_query($postData);
        if ($this->uri->segment(2) && $this->uri->segment(3)) {
            $from_date = $this->uri->segment(2);
            $to_date = $this->uri->segment(3);
            $where = array('activity_log.visiting_time >='=>$from_date,'activity_log.visiting_time <='=>$to_date);
            $this->db->where($where);
        }
        
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
     
    }
    
    /*
     * Count all records
     */
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }


    private function _get_datatables_query($postData){
        $this->db->select('activity_log.page_url,activity_log.visiting_time, activity_log.ip_address,users.phone,users.full_name');
        $this->db->from('activity_log');
        $this->db->join('users','activity_log.user_id=users.id');
        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }




}

?>
