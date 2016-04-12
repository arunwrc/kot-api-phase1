<?php
class User_model extends CI_Model {

    public function login($username,$password){
        $condition=array(
            'username'=>$username,
            'password'=>$password
        );
        $this->db->select()->from('users')->where($condition);
        $query=$this->db->get(); 
        return $res = $query->first_row('array'); 
    }

    public function get_all(){
        $this->db->order_by("id", "desc");
        $query = $this->db->get("users");
        return $query->result();
    }

    public function get_by_id($id){
        $query = $this->db->get_where("users",array('id' => $id));
        return $query->row_array();
    }

    public function update($id,$data){
        $this->db->where('id',$id);
        $this->db->update("users",$data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete("users");
    }

}