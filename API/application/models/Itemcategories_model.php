<?php
class Itemcategories_model extends CI_Model {
    
    public function get_all(){
        $this->db->order_by("id", "desc");
        $query = $this->db->get("itemcategories");
        return $query->result();
    }

    public function get_by_id($id){
        $query = $this->db->get_where("itemcategories",array('id' => $id));
        return $query->row_array();
    }

    public function update($id,$data){
        $this->db->where('id',$id);
        $this->db->update("itemcategories",$data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete("itemcategories");
    }
    

}