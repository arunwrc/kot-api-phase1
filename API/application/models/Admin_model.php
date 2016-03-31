<?php
class Admin_model extends CI_Model {

    public function login($username,$password){
        $condition=array(
            'username'=>$username,
            'password'=>$password
        );
        $this->db->select()->from('admin')->where($condition);
        $query=$this->db->get(); 
        return $res = $query->first_row('array'); 
    }


}