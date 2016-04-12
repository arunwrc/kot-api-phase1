<?php
require APPPATH . '/libraries/REST_Controller.php';
class Users_api extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->crossorigin->initiate();
    }
    
    function Add_post(){
        $data = array(                                          
            'name'=> $this->input->post('name'),
            'username'=> $this->input->post('username'),
            'password' => $this->input->post('password'),
            'usertype_id' => $this->input->post('usertype_id'),
            'organisation_id' => $this->input->post('organisation_id')
        );
        if($_POST['name'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['usertype_id'] != "" &&  $_POST['organisation_id'] != ""){ 
            $this->db->insert('users', $data);
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => CREATED_SUCCESS,RESP_DATA => $data));
        }else{
           $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => CREATE_FAILED));
        }

     }
    function ViewAll_get(){
        $data=$this->User_model->get_all();
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function View_get(){
        $id = $this->uri->segment(3);
        $data=$this->User_model->get_by_id($id);
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function Update_post(){
        $id = $this->uri->segment(3);
        if($_POST['name'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['usertype_id'] != "" &&  $_POST['organisation_id'] != ""){ 
            $query = $this->User_model->update($id,array(
                'name'=> $this->input->post('name'),
                'username'=> $this->input->post('username'),
                'password' => $this->input->post('password'),
                'usertype_id'=> $this->input->post('usertype_id'),
                'organisation_id'=> $this->input->post('organisation_id')    
            ));
            if ($this->db->affected_rows() > 0) {
                $update_details=$this->User_model->get_by_id($id);
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
        $user_details=$this->User_model->get_by_id($id);
        $this->User_model->delete($id);
        if($user_details){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => DELETED_SUCCESS,RESP_DATA => $user_details));
        }
    }
    
    

}