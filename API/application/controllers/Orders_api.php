<?php
require APPPATH . '/libraries/REST_Controller.php';
class Orders_api extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Orders_model');
        $this->crossorigin->initiate();
    }
    
    function Add_post(){
        $data = array(                                          
            'date'=> $this->input->post('date'),
            'date_time'=> $this->input->post('date_time'),
            'bill_no'=> $this->input->post('bill_no'),
            'ordertype_id'=> $this->input->post('ordertype_id'),
            'orderstatus_id'=> $this->input->post('orderstatus_id'),
            'discount'=> $this->input->post('discount'),
            'parcel_charge'=> $this->input->post('parcel_charge'),
            'total'=> $this->input->post('total'),
            'customer_id'=> $this->input->post('customer_id'),
            'table_id'=> $this->input->post('table_id'),
            'user_id'=> $this->input->post('user_id'),
            'organisation_id' => $this->input->post('organisation_id')       
        );
        if($_POST['date'] != ""  && $_POST['date_time'] != ""  && $_POST['bill_no'] != ""  && $_POST['ordertype_id'] != ""  && $_POST['orderstatus_id'] != ""  && $_POST['discount'] != ""  && $_POST['parcel_charge'] != ""  && $_POST['total'] != ""  && $_POST['customer_id'] != ""  && $_POST['table_id'] != ""  && $_POST['user_id'] != "" && $_POST['organisation_id'] != ""){ 
            $this->db->insert('orders', $data);
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => CREATED_SUCCESS,RESP_DATA => $data));
        }else{
           $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => CREATE_FAILED));
        }

     }
    function ViewAll_get(){
        $data=$this->Orders_model->get_all();
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function View_get(){
        $id = $this->uri->segment(3);
        $data=$this->Orders_model->get_by_id($id);
        if($data){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LISTING_SUCCESS,RESP_DATA => $data));
        }
    }
    function Update_post(){
        $id = $this->uri->segment(3);
        if($_POST['date'] != ""  && $_POST['date_time'] != ""  && $_POST['bill_no'] != ""  && $_POST['ordertype_id'] != ""  && $_POST['orderstatus_id'] != ""  && $_POST['discount'] != ""  && $_POST['parcel_charge'] != ""  && $_POST['total'] != ""  && $_POST['customer_id'] != ""  && $_POST['table_id'] != ""  && $_POST['user_id'] != "" && $_POST['organisation_id'] != ""){ 
                $query = $this->Orders_model->update($id,array(
                    'date'=> $this->input->post('date'),
                    'date_time'=> $this->input->post('date_time'),
                    'bill_no'=> $this->input->post('bill_no'),
                    'ordertype_id'=> $this->input->post('ordertype_id'),
                    'orderstatus_id'=> $this->input->post('orderstatus_id'),
                    'discount'=> $this->input->post('discount'),
                    'parcel_charge'=> $this->input->post('parcel_charge'),
                    'total'=> $this->input->post('total'),
                    'customer_id'=> $this->input->post('customer_id'),
                    'table_id'=> $this->input->post('table_id'),
                    'user_id'=> $this->input->post('user_id'),
                    'organisation_id' => $this->input->post('organisation_id') 
                ));
            if ($this->db->affected_rows() > 0) {
                $update_details=$this->Orders_model->get_by_id($id);
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
        $order_details=$this->Orders_model->get_by_id($id);
        $this->Orders_model->delete($id);
        if($order_details){
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => DELETED_SUCCESS,RESP_DATA => $order_details));
        }
    }
    
    

}