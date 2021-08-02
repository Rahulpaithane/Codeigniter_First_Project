<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function insert_db($data){
        $this->db->insert('user',$data);
        return true;
    }

    

}

/* End of file Register_model.php */

?>