<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class wallet_model extends CI_Model {

    
    function addWithdrawal($data){
        if($this->db->insert("withdrawals",$data)){
            return true;
        }else{
            return false;
        }
        
    }

	
	function addDeposit($data){
        if($this->db->insert("deposits",$data)){
            return true;
        }else{
            return false;
        }
        
    }
	
    function viewUsersDeposits($userId){
        $this->db->from("deposits");
        $this->db->where('user_id', $userId);
        $this->db->order_by('date', 'desc');
        $result = $this->db->get();
        return $result ->result();
    }
	
	
	function viewUsersWithdrawals($userId){
        $this->db->from("withdrawals");
        $this->db->where('user_id', $userId);
        $this->db->order_by('date', 'desc');
        $result = $this->db->get();
        return $result ->result();
    }
	
	function viewWallet($userId){
        $this->db->from("user_register");
        $this->db->where('id', $userId);
        $result = $this->db->get();
        return $result ->result();
    }
	
	
	function viewBal($userId){
        $this->db->from("lxx_balance");
        $this->db->where('user_id', $userId);
        $result = $this->db->get();
        return $result ->result();
    }
	
	
	 function updateWalletAddress($user_id,$data){
        $this->db->where('id', $user_id);
        $res = $this->db->update('user_register', $data);
        
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
    

}
