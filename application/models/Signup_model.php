<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class signup_model extends CI_Model {

    
    function addSignUp($data){
        if($this->db->insert("signup",$data)){
            return true;
        }else{
            return false;
        }
        
    }
    function getSignupData($link,$actType){
        $this->db->from("signup");
        $this->db->where('act_link', $link);
        $this->db->where('act_type', $actType);
        $result = $this->db->get();
        return $result ->result();
    }
    
     function deleteSignup($link) {

        $this->db->where('act_link', $link);

        if ($this->db->delete('signup')) {

            return true;
        } else {

            return false;
        }
    }
    
    

}
