<?php
require APPPATH . '/libraries/REST_Controller.php';
class Login_api extends REST_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Organisation_model');
        $this->load->model('User_model');
        $this->crossorigin->initiate();
    }
    
    function adminLogin_post(){
        $data = array(                                            // enable this for testing in postmaster
            'username'=> $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        //$data = json_decode(file_get_contents('php://input'),true); // will work with angular or jquery
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
    
    function ActiveAdminUser_get(){
        $userID = $this->session->userdata('admin_userid') ;
        if(! $userID){
            $this->response(array(RESP_STATUS => HTTP_NON_AUTHORITATIVE_INFORMATION,RESP_MSG => INVALID_SESSION));
            exit;
        }else{
            $this->response(array(RESP_STATUS => HTTP_OK));
        }
    }
    
    function adminLogout_delete(){
        if(isset($_SESSION['admin_userid'])){
            $this->session->sess_destroy();
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LOGOUT_SUCCESS));
            exit;
        }else{
            $this->response(array(RESP_STATUS => HTTP_NO_CONTENT)); 
        }
    }
    
    function organisationLogin_post(){
        $data = array(                                            // enable this for testing in postmaster
            'username'=> $this->input->post('username'),
            'password' => $this->input->post('password')
        ); 
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
        
        $organisation_details=$this->Organisation_model->login($username,$password);
        if(!$organisation_details){
            $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => INVALID_LOGIN));
        }else{
            $this->session->set_userdata('organisation_userid',$organisation_details['id']);
            $this->session->set_userdata('organisation_username',$organisation_details['username']);  
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LOGIN_SUCCESS,RESP_DATA => $organisation_details));
        }
    }
    
    function ActiveOrganisationUser_get(){
        $userID = $this->session->userdata('organisation_userid') ;
        if(! $userID){
            $this->response(array(RESP_STATUS => HTTP_NON_AUTHORITATIVE_INFORMATION,RESP_MSG => INVALID_SESSION));
            exit;
        }else{
            $this->response(array(RESP_STATUS => HTTP_OK));
        }
    }
    
    function organisationLogout_delete(){
        if(isset($_SESSION['organisation_userid'])){
            $this->session->sess_destroy();
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LOGOUT_SUCCESS));
            exit;
        }else{
            $this->response(array(RESP_STATUS => HTTP_NO_CONTENT)); 
        }
    }
    
    function userLogin_post(){
        $data = array(                                            // enable this for testing in postmaster
            'username'=> $this->input->post('username'),
            'password' => $this->input->post('password')
        );
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
        
        $user_details=$this->User_model->login($username,$password);
        if(!$user_details){
            $this->response(array(RESP_STATUS => HTTP_NO_CONTENT,RESP_MSG => INVALID_LOGIN));
        }else{
            $this->session->set_userdata('userid',$user_details['id']);
            $this->session->set_userdata('username',$user_details['username']);  
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LOGIN_SUCCESS,RESP_DATA => $user_details));
        }
    }
    
    function ActiveUser_get(){
        $userID = $this->session->userdata('userid') ;
        if(! $userID){
            $this->response(array(RESP_STATUS => HTTP_NON_AUTHORITATIVE_INFORMATION,RESP_MSG => INVALID_SESSION));
            exit;
        }else{
            $this->response(array(RESP_STATUS => HTTP_OK));
        }
    }
    
    function userLogout_delete(){
        if(isset($_SESSION['userid'])){
            $this->session->sess_destroy();
            $this->response(array(RESP_STATUS => HTTP_OK,RESP_MSG => LOGOUT_SUCCESS));
            exit;
        }else{
            $this->response(array(RESP_STATUS => HTTP_NO_CONTENT)); 
        }
    }

}