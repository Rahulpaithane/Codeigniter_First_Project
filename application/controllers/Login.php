<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if($this->session->userdata('email')){
           redirect('../home/');
           die();
        }
      
        
    }

    public function index()
    {
        $this->load->view('login');
    }
    function validation(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',array(
           'required' => 'You Have Not Provided %s.',
           'valid_email' => 'Invalid %s'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required',array(
           'required'      => 'You Have Not Provided %s.',
        ));
        
        if($this->form_validation->run()){
            $user_password=$this->input->post('password');
            $email = $this->input->post('email');
            $data = $this->login_model->valid_user_db($email,$user_password);

            if($data['status'] == 0){
                //  echo $data['message'];
                $this->session->set_flashdata('message', $data['message']);
                $this->index();
            }
            if($data['status'] == 1){
                //  echo $data['message'];
                $this->session->set_flashdata('message', $data['message']);
                $this->index();
            }
            if($data['status'] == 2){
                //  echo $data['message'];
                $this->session->set_flashdata('message', $data['message']);
                $this->session->set_userdata('email', $data['email']);
                redirect("../home/");


            }
       }else{
        $this->index();
       }      
         
    }
}

/* End of file Login.php */

?>