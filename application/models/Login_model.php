<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function valid_user_db($email,$user_pass){

        $query = $this->db->get_where('user', array('email' => $email));
        $data=$query->result_array();
        $return_data=array();

        if(!empty($data)){
            $decrypted_password = password_verify($user_pass, $data[0]['password']);
            if($user_pass == $decrypted_password){
                $return_data =["is_loggedin"=>'yes',"status"=>2,"message"=>"Login Successfull","email"=>$email];
            }else{
                $return_data =["is_loggedin"=>'no',"status"=>1,"message"=>"Password Incorrect"];

            }
        }else{
            $return_data=["status"=>0,"message"=>"No User With $email Found. Please Register"];
        }

        return $return_data;

    }

}

/* End of file Login_model.php */

?>