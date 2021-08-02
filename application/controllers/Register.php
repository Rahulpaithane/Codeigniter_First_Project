<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('register_model');
        if($this->session->userdata('email')){
         redirect('../home/');
         die();
      }

    }
    public function index()
    {
        $this->load->view('register');
    }
    
    function validation(){
     $this->form_validation->set_rules('name', 'Name', 'required|trim',array(
        'required'      => 'You Have Not Provided %s.',
     ));
     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',array(
        'required' => 'You Have Not Provided %s.',
        'is_unique' => 'This %s already exists.',
        'valid_email' => 'Invalid %s'
     ));
     $this->form_validation->set_rules('password', 'Password', 'required',array(
        'required'      => 'You Have Not Provided %s.',
     ));
     $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[10]',array(
        'required'      => 'You Have Not Provided %s.',
     ));
     if (empty($_FILES['profileImg']['name'])){
     $this->form_validation->set_rules('profileImg', 'Image', 'required',array(
        'required'      => 'You Have Not Provided %s.',
     ));
    }

     $uploadFileConfig =array(
          'upload_path'=>"././assets/profile_images",
          'allowed_types' =>"jpg|png|jpeg",
          'max_size'=>4000,
          'file_ext_tolower'=>true
     );
     $this->load->library('upload',$uploadFileConfig);

     if($this->form_validation->run() && $this->upload->do_upload('profileImg')){
      $encrypted_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, array('cost' => 12,));
      $file_data=$this->upload->data();
      $file_name=$file_data['file_name'];
      $data = array(
       'name'  => $this->input->post('name'),
       'email'  => $this->input->post('email'),
       'password' => $encrypted_password,
       'phone' => $this->input->post('phone'),
       'image' => $file_name
      );
      // print_r($data);
      $status = $this->register_model->insert_db($data);
      if($status){
        $this->session->set_flashdata('message', "Registered Successfull. Login Now");

        redirect('../login/');
      }
    }else
    {
      if($this->upload->display_errors()!=""){
        $this->session->set_flashdata('message', "Something Went Wrong! Try Again. or ".$this->upload->display_errors());
      }
     $this->index();
    }      
      
    }
    
}

/* End of file Register.php */

?>