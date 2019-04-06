<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class staking_model extends CI_Model {

 function viewUsersBalance($userId){
        $this->db->from("lxx_balance");
        $this->db->where('user_id', $userId);
        $result = $this->db->get();
        return $result ->result();
    }
	
	

	
  
 function addStake($data){
        if($this->db->insert("staking",$data)){
            return true;
        }else{
            return false;
        }
        
    }
	
 function addEarning($data){
        if($this->db->insert("stake_earnings",$data)){
            return true;
        }else{
            return false;
        }
        
    }
	
	function addWithdraw($data){
        if($this->db->insert("stake_withdraw",$data)){
            return true;
        }else{
            return false;
        }
        
    }
	
   function viewUsersDeposits($userId){
        $this->db->from("staking");
        $this->db->where('user_id', $userId);
        $this->db->order_by('id', 'desc');
        $result = $this->db->get();
        return $result ->result();
    }
	
	
	function viewUsersWithdrawals($userId){
        $this->db->from("stake_withdraw");
        $this->db->where('user_id', $userId);
        $this->db->order_by('id', 'desc');
        $result = $this->db->get();
        return $result ->result();
    }
	
	
	
	function viewUsersEarnings($userId){
        $this->db->from("stake_earnings");
        $this->db->where('user_id', $userId);
        $this->db->order_by('id', 'desc');
        $result = $this->db->get();
        return $result ->result();
    }
	
	
	function updateBalanceLxx($sAmount,$userId){
      	$this->db->set('lxx_bal', "lxx_bal - $sAmount", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	
	function updateBalanceAddLxx($sAmount,$userId){
      	$this->db->set('lxx_bal', "lxx_bal + $sAmount", FALSE);
      	$this->db->set('lxx_main_bal', "lxx_main_bal + $sAmount", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	
	function updateBalanceStake($sAmount,$userId){
      	$this->db->set('stake_bal', "stake_bal + $sAmount", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	function updateBalanceInterest($sAmount,$userId){
      	$this->db->set('stake_interest', "stake_interest - $sAmount", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	function updateBalancePaidout($sAmount,$userId){
      	$this->db->set('stake_paidout', "stake_paidout + $sAmount", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }


}
