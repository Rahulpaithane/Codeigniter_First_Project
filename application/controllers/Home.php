<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        if(!$this->session->userdata('email')){
           redirect('../login/');
           die();
        }
    }
    
    public function index()
    {
        $data["userData"]=$this->home_model->fetch_user_details($this->session->userdata('email'));
        $this->load->view('home',$data);

    }
    public function logout()
    {
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value)
        {
        $this->session->unset_userdata($row);
        }
        $this->session->set_flashdata('message', "Logout Successfull");

        redirect('../login/');
    }

}

/* End of file Home.php */

?>