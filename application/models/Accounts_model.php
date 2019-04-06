<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class accounts_model extends CI_Model {

    
    function addAccount($data){
        if($this->db->insert("lxx_account",$data)){
            return true;
        }else{
            return false;
        }
        
    }

    function viewAccounts(){
        $this->db->from("lxx_account");
        $result = $this->db->get();
        return $result ->result();
    }

    function viewAccount($acctNo){
        $this->db->from("lxx_account");
        $this->db->where('acct_no', $acctNo);
        $result = $this->db->get();
        return $result ->result();
    }

    
    function viewAccountByUser($userId){
        $this->db->from("lxx_account");
        $this->db->where('user_id', $userId);
        $result = $this->db->get();
        return $result ->result();
    }
    function viewAccountByDates($date1,$date2){
        $this->db->from("lxx_account");
        $this->db->where('date_created >=', $date1);
        $this->db->where('date_created <=', $date2);
        $result = $this->db->get();
        return $result ->result();
    }
    
     function updateAccount($data,$acctNo){
        $this->db->where('acct_no', $acctNo);
        $res = $this->db->update('lxx_account', $data);
     }
    
    

}
