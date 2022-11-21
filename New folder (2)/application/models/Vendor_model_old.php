<?php
/**
 * Created by PhpStorm.
 * User: Yousaf Harry
 * Date: 01/03/2018
 * Time: 1:13 PM
 */

class Vendor_model extends CI_Model{

    var $table = "users";

    public function __construct(){
        parent::__construct();
    }

    public function add_registration($tb,$data)
      {
        $this->db->insert($tb,$data);
        $data['email'] = $this->db->insert_id();
        $data['full_name'] = $this->db->insert_id();
        $data['modules'] = $this->db->insert_id();
        $data['Password_partner'] = $data['email'] =$data['full_name'] = $data['modules'];    
      return $data;
      }
    public function update_registration($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return true;
    }
    public function check_email_validation($email,$role_type_id)
    {
        // echo "called function";
        $this->db->where('email',$email);
        $this->db->where('role_id',$role_type_id);
        $this->db->where('is_deleted',0);
        return $this->db->get('users')->result();
        // print_r($res);
    }
    public function check_phone_validation($phone,$role_type_id)
    {
        // echo "called function";
        $this->db->where('phone',$phone, 'role_type_id',$role_type_id);
        return $this->db->get('users')->result();
        // print_r($res);
    }
         public function check_registration($gmail){
               $this->db->where('email',$gmail, 'role_type_id',2);
               return $this->db->get('users')->result();
           }
           public function phone_check($phone){
               $this->db->where('phone',$phone, 'role_type_id',2);
               return $this->db->get('users')->result();
           }
           public function phone_check_customer($phone){
               $this->db->where('phone',$phone, 'role_type_id',4);
               return $this->db->get('users')->result();
           }
     public function check_customer($gmail){
       $this->db->where('email',$gmail, 'role_type_id',4);
       return $this->db->get('users')->result();
   }
//     public function check_team($gmail){
//       $this->db->where('email',$gmail, 'role_type_id',6);
//       return $this->db->get('users')->result();
//   }
  public function check_team($gmail){
       $this->db->where('email',$gmail);
       return $this->db->get('users')->result();
   }
    public function addcsv($tb,$data)
      {
        $res = $this->db->insert_batch($tb,$data); 
        return array('data'=>$data, 'res'=>$res);
      }
   
    function get_max_id(){
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function get_where($where){
        $where['role_id'] = 2   ;
        //$where['status'] = 0;
        $where['is_deleted'] = 0;
        $query = $this->db->select('id, email, phone, full_name, address,Password_partner,modules, status')->get_where($this->table, $where);
        return $query->result();
    }
    public function get_where_cus($where){
        $where['role_id'] = 4   ;
        //$where['status'] = 0;
        $where['is_deleted'] = 0;
        $query = $this->db->select('id, email, phone, full_name, address,Password_partner,modules, status')->get_where($this->table, $where);
        return $query->result();
    }


     public function getsss_where($where){
        //$where['role_type_id'] = 1   ;
        //$where['status'] = 0;
       // $where['is_deleted'] = 0;
        $query = $this->db->select('id, email, phone, full_name, address,Password_partner,modules, role_type_id,status')->get_where($this->table, $where);
        return $query->result();
    }
 public function get_where2($where){
        $where['role_id'] = 5;
        $where['status'] = 1;
        $where['is_deleted'] = 0;
        $query = $this->db->select('id, email, phone, full_name, address, status')->get_where($this->table, $where);
        return $query->result();
    }

    public function get_all_vendors(){
        $where = array('u.role_id'=>2,'is_deleted'=>0);//for vendor only
        $this->db->select('u.id, email, phone, full_name, address,Password_partner,modules, u.status, code,u.user_account_status');
        $this->db->from($this->table.' as u');
        $this->db->join('roles as r', 'r.id = u.role_id');
        $this->db->where($where);
        $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_team(){
       // $where = array('u.role_type_id'=>7);//for vendor only
        $this->db->select('u.id, u.email, u.phone, u.full_name, u.address,u.Password_partner,u.modules, u.status, code,r.name, ll.login_date');
        $this->db->from($this->table.' as u');
        $this->db->join('roles as r', 'r.name= u.role_type_id');
        $this->db->join('login_log AS ll', 'll.user_id = u.id', 'left');
       // $this->db->where($where);
        $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }
    //  public function get_all_teamss(){
    //   //  $where = array('u.role_type_id'=>6);//for vendor only
    //     $this->db->select('u.id, u.email, u.phone, u.full_name, u.address,u.Password_partner,u.modules, u.status, code,r.name');
    //     $this->db->from($this->table.' as u');
    //     $this->db->join('roles as r', 'r.name = u.role_type_id');
    //   // $this->db->where($where);
    //     $this->db->group_by('u.id');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
public function get_all_keepers(){
       // $where = array('u.role_id'=>5,'is_deleted'=>0);//for vendor only
        $this->db->select('u.id, email, phone, full_name, address, u.status, code');
        $this->db->from($this->table.' as u');
        $this->db->join('roles as r', 'r.id = u.role_id');
       
        $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }
    //only return activate records
    public function count(){
        return $this->db->where('status',1)->from($this->table)->count_all_results();
    }

    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); //return last inserted category_id
    }

    function update($data, $where){
        return $this->db->update($this->table, $data, $where);
    }

      function update_teams($data, $where){
        return $this->db->update($this->table, $data, $where);
    }

    public function delete($where){
        return $this->db->delete($this->table, $where);
    }

    //DASHBOARD STATISTICS
    public function get_vendor_customers(){
        /*select count(*) as total_customers, c.vendor_id, v.full_name from users as c
        INNER JOIN users as v on v.id = c.vendor_id
        where c.role_id = 4 and c.vendor_id != 0
        GROUP BY c.vendor_id
        */
        $where = array('c.role_id '=>4,'c.vendor_id !='=>0);//for vendor only
        $this->db->select('count(*) as total_customers, c.vendor_id, v.full_name');
        $this->db->from($this->table.' as c');
        $this->db->join($this->table.' as v', 'v.id = c.vendor_id');
        $this->db->where($where);
        $this->db->group_by('c.vendor_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_delivery_vendors($where = null){
        $this->db->select('u.id, u.profile_image_url, u.full_name, u.status, u.address, o.order_id, u.email, u.phone, u.profile_image_url, u.role_id, o.delivery_date');
        $this->db->from($this->table.' as u');
        $this->db->join('orders as o', 'u.id = o.vendor_id');
        $this->db->where('u.role_id',2);

        //delivery date condition
        if($where){
            $this->db->where($where);
        }

        $this->db->group_by('u.id');
        $query = $this->db->get();
        return $query->result();
    }
    
      public function check_email($id, $email)
    {
        $this->db->where(array('email'=>$email));
        $recs = $this->db->get('users')->result_array();
        if(count($recs) > 0)
        {
            return false;
        }
        else
            return true;
    }

    public function get_data($t, $w = null)
    {
        if($w != null)
            $this->db->where($w);
        return $this->db->get($t)->result_array();
    }


}

?>
