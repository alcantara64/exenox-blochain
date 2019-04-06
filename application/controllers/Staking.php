<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Staking extends BaseController {

	private $lxxToken = 0.35;
	//private $db = 'lxx_balance';
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	public function __construct(){
		parent::__construct();
		$this->isLoggedIn(); 
		$this -> load-> model("accounts_model");
		$this -> load-> model("transactions_model");
		$this -> load-> model("user_model");
		$this -> load-> model("staking_model");
		
	}
	public function index()
	{
		$deposits = $this -> staking_model -> viewUsersDeposits($this->session->userdata ( 'userId' ));
		$withdrawals = $this -> staking_model -> viewUsersWithdrawals($this->session->userdata ( 'userId' ));
		$lxx_account = $this -> staking_model -> viewUsersBalance($this->session->userdata ( 'userId' ));
		$stake_earn = $this -> staking_model -> viewUsersEarnings($this->session->userdata ( 'userId' ));
		
		
		$data = array(
			"lxx_account" => $lxx_account,
			"deposits" => $deposits,
			"stake_earn" => $stake_earn,
			"withdrawals" => $withdrawals,
		);

		$this->load->view('staking',$data);
	}

	
	public function createStake(){
		
	$lxx_account = $this -> staking_model -> viewUsersBalance($this->session->userdata ( 'userId' ));
	
		foreach($lxx_account as $bal){
		$lxx_bal=$bal->lxx_bal;
		}
	
		if($this -> input -> post("amount1") > $lxx_bal){
			redirect("/staking");
		}else{
			
		$date=date("Y-m-d H:i");
	    $mod_date = strtotime($date."+ 7 days");
		$releaseDate =date("Y-m-d H:i",$mod_date);
		$c_date = strtotime($date."+ 1 days");
		$countDate =date("Y-m-d H:i",$c_date);
		
		if($this -> input -> post("time1")==60){
			$timeZone=0;
		}else{
			$timeZone=$this -> input -> post("time1");
		}
		
		 $timezone_offset_minutes = $timeZone;  // $_GET['timezone_offset_minutes']
		// Convert minutes to seconds
		 $timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);

		date_default_timezone_set($timezone_name);
		
		$startDate =date("Y-m-d");
		$eDate =date("Y-m-d");
		
		
		
		$roi=round($this -> input -> post("roi1"),2);
		$daily=round($this -> input -> post("daily1"),2);
		$data = array(
			"user_id" => $this->session->userdata ( 'userId' ), 
			"amount" => $this -> input -> post("amount1"),
			"interest" => $this -> input -> post("interest1"), 
			"daily_amount" => $daily, 
			"roi" => $roi, 
			"day" => 0, 
			"total_days" => 7, 
			"status" => 0 , 
			"earn_date" => $eDate, 
			"count_date" => $countDate, 
			"stake_date" => $startDate,
			"release_date" => $releaseDate
		);

		$ok = $this -> staking_model -> addStake($data);
		if($ok){
			
			$sAmount=$this -> input -> post("amount1");
			$userId = $this->session->userdata ( 'userId' );

			$check=$this -> staking_model -> updateBalanceLxx($sAmount,$userId);
			if($check){
				$this -> staking_model -> updateBalanceStake($sAmount,$userId);
				$this->session->set_flashdata('success', 'Stake Placed Successfully');
				redirect("/staking");
			}else{
				$this->session->set_flashdata('error', 'ERROR');
				redirect("/staking");
			}
		}
			$this->session->set_flashdata('error', 'There was an error stake was not placed');
			redirect("/staking");
	}

	}


	public function stakeWithdraw()
	{
		
	   $lxx_account = $this -> staking_model -> viewUsersBalance($this->session->userdata ( 'userId' ));
	
		foreach($lxx_account as $bal){
		$lxx_bal=$bal->stake_interest;
		}
	
		if($this -> input -> post("amount") > $lxx_bal){
			redirect("/staking");
		}else{
			
		$amount=$this -> input -> post("amount");	
		$token=$this ->lxxToken;
		$lxx_token=floor($amount/$token);
		$withdraw=round($this -> input -> post("amount"),2);	
			
		
		date_default_timezone_set('Africa/lagos');
		
		$currentDateTime=date('m/d/Y H:i:s');
		$newDateTime = date('h:i A', strtotime($currentDateTime));
		$sDate =date("Y-m-d").' '.$newDateTime;  
		
		 $timezone_offset_minutes = $this -> input -> post("time1");  // $_GET['timezone_offset_minutes']
		// Convert minutes to seconds
		 $timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);

		date_default_timezone_set($timezone_name);
		
		$wDate =date("Y-m-d H:i");	
		
	
		$data = array(
			"user_id" => $this->session->userdata ( 'userId' ), 
			"amount" => $withdraw,
			"lxx_token" => $lxx_token,
			"coin" => $this -> input -> post("coin"), 
			"wallet_addr" => $this -> input -> post("addr"), 
			"status" => 0,
			"withdraw_date" => $wDate,
			"server_date" => $sDate
		);

		$ok = $this -> staking_model -> addWithdraw($data);
		if($ok){
				$sAmount=$this -> input -> post("amount");
				$userId = $this->session->userdata ( 'userId' );
				$this -> staking_model -> updateBalanceInterest($sAmount,$userId);
				$this->session->set_flashdata('success', 'Withrawal Successful');
				
				redirect("/staking");
			}else{
				$this->session->set_flashdata('error', 'ERROR');
				redirect("/staking");
			}
	}
	}
	
	public function tokenBuy(){
		
	$userId = $this->session->userdata ( 'userId' );	
	$amount=$this -> input -> post("amountl");	
	$token=$this ->lxxToken;
	$buy=floor($amount/$token);
	
	$ok =$this -> staking_model -> updateBalanceInterest($amount,$userId);
	$ok =$this -> staking_model -> updateBalanceAddLxx($buy,$userId);
	$ok =$this -> staking_model -> updateBalancePaidout($amount,$userId);
		
	$this->load->helper('string');
	$id = random_string('alnum', 64);
	$data = array(
			"tx_id" => $id, 
			"user_id" => $userId, 
			"lxx_amount" => $buy,
			"amount_used" => $amount, 
			"unit_price" => $token,
			"trans_hash_id" => null, 
			"coin_used" => 'STAKE', 
			"trans_type" => 'CR', 
			"trans_status" => 1 , 
			"trans_date" => date("Y-m-d H:i:s"),
			"last_updated" => date("Y-m-d H:i:s")
		);

	$ok = $this -> transactions_model -> addTransaction($data);
		
	if($ok){
			$this->session->set_flashdata('success', 'Transaction Successful');
			redirect("/staking");
		}else{
			$this->session->set_flashdata('error', 'ERROR');
			redirect("/staking");
		}

	}
	
	
}
