<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    function fetch_user_details($email){
        
        $query = $this->db->select('name, email,image,phone')->get_where('user', array('email' => $email));
        $data=$query->result_array();
        $return_data=$data[0];
            


        return $return_data;
       
    }

}

/* End of file Home_model.php */


?>