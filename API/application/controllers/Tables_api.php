<?php
require APPPATH . '/libraries/REST_Controller.php';
class Tables_api extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Tables_model');
        $this->crossorigin->initiate();
    }
    
    function Add_post(){
        $data = array(                                          
            'name'=> $this->input->post('name'),
            'organisation_id' => $this->input->post('organisation_id')       
        );
        if($_POST['name'] != "" && $_POST['organisation_id'] != ""){ 
            $this->db->insert('tables', $data);
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => CREATED_SUCCESS,RESP_DATA => $data));
        }else{
           $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => CREATE_FAILED));
        }

     }
    function ViewAll_get(){
        $data=$this->Tables_model->get_all();
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function View_get(){
        $id = $this->uri->segment(3);
        $data=$this->Tables_model->get_by_id($id);
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function Update_post(){
        $id = $this->uri->segment(3);
        if($_POST['name'] != "" && $_POST['organisation_id'] != ""){
            $query = $this->Tables_model->update($id,array(
                'name'=> $this->input->post('name'),
                'organisation_id' => $this->input->post('organisation_id')
            ));
            if ($this->db->affected_rows() > 0) {
                $update_details=$this->Tables_model->get_by_id($id);
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
        $table_details=$this->Tables_model->get_by_id($id);
        $this->Tables_model->delete($id);
        if($table_details){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => DELETED_SUCCESS,RESP_DATA => $table_details));
        }
    }
    
    

}