<?php
require APPPATH . '/libraries/REST_Controller.php';
class Organisations_api extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Organisation_model');
        $this->crossorigin->initiate();
    }
    
    function Add_post(){
        $data = array(                                          
            'name'=> $this->input->post('name'),
            'username'=> $this->input->post('username'),
            'password' => $this->input->post('password'),
            'api_url'=> $this->input->post('api_url'),
            'description'=> $this->input->post('description')            
        );
        if($_POST['name'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['api_url'] != "" &&  $_POST['description'] != ""){ 
            $this->db->insert('organisations', $data);
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => CREATED_SUCCESS,RESP_DATA => $data));
        }else{
           $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => CREATE_FAILED));
        }

     }
    function View_get(){
        $data=$this->Organisation_model->get_by_id($id);
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function Update_post(){
        $id = $this->uri->segment(3);
        if($_POST['name'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['api_url'] != "" &&  $_POST['description'] != ""){ 
            $query = $this->Organisation_model->update($id,array(
                'name'=> $this->input->post('name'),
                'username'=> $this->input->post('username'),
                'password' => $this->input->post('password'),
                'api_url'=> $this->input->post('api_url'),
                'description'=> $this->input->post('description')    
            ));
            if ($this->db->affected_rows() > 0) {
                $update_details=$this->Organisation_model->get_by_id($id);
                $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => UPDATED_SUCCESS,RESP_DATA => $update_details));  
            }else{
                $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => ALREADY_UPDATED)); 
            }
        }else{
            $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => UPDATE_FAILED));      
        }
        }
    function Delete_delete(){
        $id = $this->uri->segment(3);
        $organisation_details=$this->Organisation_model->get_by_id($id);
        $this->Organisation_model->delete($id);
        if($organisation_details){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => DELETED_SUCCESS,RESP_DATA => $organisation_details));
        }
    }
    
    

}