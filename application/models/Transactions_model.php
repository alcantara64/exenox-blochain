<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class transactions_model extends CI_Model {


    function viewUsersBalance($userId){
        $this->db->from("lxx_balance");
        $this->db->where('user_id', $userId);
        $result = $this->db->get();
        return $result ->result();
    }
	

    
    function addTransaction($data){
        if($this->db->insert("transaction",$data)){
            return true;
        }else{
            return false;
        }
        
    }

    function viewTransactions(){
        $this->db->from("transactions");
        $this->db->where('tx_id', $txId);
        $result = $this->db->get();
        return $result ->result();
    }

    function viewTransaction($txId){
        $this->db->from("transactions");
        $this->db->where('tx_id', $txId);
        $result = $this->db->get();
        return $result ->result();
    }
    
     function viewUsersTransactions($userId){
        $this->db->from("transactions");
        $this->db->where('user_id', $userId);
        $this->db->order_by('trans_date', 'desc');
        $result = $this->db->get();
        return $result ->result();
    }
    
    function viewTransactionsByDates($date1,$date2){
        $this->db->from("transactions");
        $this->db->where('trans_date >= ', $date1);
        $this->db->where('trans_date <= ', $date2);
        $result = $this->db->get();
        return $result ->result();
    }

    function viewTransactionsByStatus($status){
$this->db->select_sum('lxx_amount');
        $this->db->from("transactions");
        $this->db->where('trans_status', $status);
        
        $result = $this->db->get();
        return $result ->result();
    }

    function viewTransactionsByCoinUsed($coinUsed){
        $this->db->from("transactions");
        $this->db->where('coin_used', $coinUsed);
        
        $result = $this->db->get();
        return $result ->result();
    }

    function viewTransactionsByTransHashId($transHashId){
        $this->db->from("transactions");
        $this->db->where('trans_hash_id', $transHashId);
        
        $result = $this->db->get();
        return $result ->result();
    }

    function updateTransaction($data,$transId){
        $this->db->where('tx_id', $transId);
        $res = $this->db->update('transactions', $data);
        
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	
	// WALLET TRANSACTION
	
	 function viewUser($userId){
        $this->db->from("lxx_balance");
        $this->db->where('user_id', $userId);
       	$result = $this->db->get();
		return $result ->result();
    }
	
	function addUser($data){
        if($this->db->insert("lxx_balance",$data)){
            return true;
        }else{
            return false;
        }
        
    }
	
	function updateUserBalanceBtc($sAmount,$userId,$btc){
      	$this->db->set('lxx_bal', "lxx_bal + $sAmount", FALSE);
      	$this->db->set('lxx_main_bal', "lxx_main_bal + $sAmount", FALSE);
      	$this->db->set('btc_used', "btc_used + $btc", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	function updateUserBalanceEth($sAmount,$userId,$eth){
      	$this->db->set('lxx_bal', "lxx_bal + $sAmount", FALSE);
      	$this->db->set('lxx_main_bal', "lxx_main_bal + $sAmount", FALSE);
      	$this->db->set('eth_used', "eth_used + $eth", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	// WITHDRAWAL
	
	function updateWithdrawBtc($userId,$btc){
      	$this->db->set('btc_used', "btc_used + $btc", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	function updateWithdrawEth($userId,$eth){
      	$this->db->set('eth_used', "eth_used + $eth", FALSE);
		$this->db->where('user_id', $userId);
		$res = $this->db->update('lxx_balance');
        if($res){
            return true;
        }else{
            return false;
        }
        
     }
	
	
	  //PRE ICO
     function viewTransactionsByStatusPre($status){
    $this->db->select_sum('lxx_amount');
        $this->db->from("transaction");
        $this->db->where('trans_status', $status);
        
        $result = $this->db->get();
        return $result ->result();
    }
     
     
     function viewUsersTransactionsPre($userId){
        $this->db->from("transaction");
        $this->db->where('user_id', $userId);
        $this->db->order_by('trans_date', 'desc');
        $result = $this->db->get();
        return $result ->result();
    }
	
}
