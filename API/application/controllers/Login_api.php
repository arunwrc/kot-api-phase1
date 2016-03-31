<?php
require APPPATH . '/libraries/REST_Controller.php';
class Login_api extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        //$this->crossorigin->initiate();
    }
    
    function adminLogin_post(){
        /*$data = array(                                            // enable this for testing in postmaster
            'username'=> $this->input->post('username'),
            'password' => $this->input->post('password')
        );*/  
        $data = json_decode(file_get_contents('php://input'),true); // will work with angular or jquery
        if(isset($data['username'])) {
            $username = $data['username'];
        }else{
            $username = "";
        }
        if(isset($data['password'])) {
            $password = $data['password'];
        }else{
            $password = "";
        }
        
        $admin_details=$this->Admin_model->login($username,$password);
        if(!$admin_details){
            $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => INVALID_LOGIN));
        }else{
            $this->session->set_userdata('admin_userid',$admin_details['id']);
            $this->session->set_userdata('admin_username',$admin_details['username']);   //echo $_SESSION['admin_username'];
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LOGIN_SUCCESS,DATA => $admin_details));
        }
    }

}