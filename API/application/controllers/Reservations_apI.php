<?php
require APPPATH . '/libraries/REST_Controller.php';
class Reservations_api extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Reservations_model');
        $this->crossorigin->initiate();
    }
    
    function Add_post(){
        $data = array(                                          
            'date'=> $this->input->post('date'),
            'customer_id'=> $this->input->post('customer_id'),
            'chair_count'=> $this->input->post('chair_count'),
            'description'=> $this->input->post('description'),
            'organisation_id' => $this->input->post('organisation_id')       
        );
        if($_POST['date'] != ""  && $_POST['customer_id'] != ""  && $_POST['chair_count'] != ""  && $_POST['description'] != ""  && $_POST['organisation_id'] != ""){ 
            $this->db->insert('reservations', $data);
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => CREATED_SUCCESS,RESP_DATA => $data));
        }else{
           $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => CREATE_FAILED));
        }

     }
    function ViewAll_get(){
        $data=$this->Reservations_model->get_all();
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function View_get(){
        $id = $this->uri->segment(3);
        $data=$this->Reservations_model->get_by_id($id);
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function Update_post(){
        $id = $this->uri->segment(3);
        if($_POST['date'] != ""  && $_POST['customer_id'] != ""  && $_POST['chair_count'] != ""  && $_POST['description'] != ""  && $_POST['organisation_id'] != ""){
            $query = $this->Reservations_model->update($id,array(
                'date'=> $this->input->post('date'),
                'customer_id'=> $this->input->post('customer_id'),
                'chair_count'=> $this->input->post('chair_count'),
                'description'=> $this->input->post('description'),
                'organisation_id' => $this->input->post('organisation_id')  
            ));
            if ($this->db->affected_rows() > 0) {
                $update_details=$this->Reservations_model->get_by_id($id);
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
        $reservation_details=$this->Reservations_model->get_by_id($id);
        $this->Reservations_model->delete($id);
        if($reservation_details){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => DELETED_SUCCESS,RESP_DATA => $reservation_details));
        }
    }
    
    

}