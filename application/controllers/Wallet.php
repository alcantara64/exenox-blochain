<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
require APPPATH . '/coinbase/autoload.php';

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;

class Wallet extends BaseController{
	private $btcAddress = "1DmEFF3RcXNdCaEnxSZNcN8adXvJ8JreKB";
	private $ethAddress = "0x8bFa646B6bBdEd4f64c950caE884C22C1F0d38A9";
	private $btcValue = 0.0000375;
	private $ethValue = 0.0005;
	
	
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
		$this -> load-> model("wallet_model");
		
	}
	
	public function coinBase($accountID,$email){
		$configuration = Configuration::apiKey('BBMHhEgSCFmWhhSA','U0BPMOrjyiSOto4icvDmGB7HrTzsJUG1');
		$client = Client::create($configuration);
		$accountId =$accountID; 
		$account = $client->getAccount($accountId);
		$address = new Address([
			'name' => $email
		]);

		$client->createAccountAddress($account, $address);
		$addressId = $client->getAccountAddresses($account);
		$addresses = $client->getAccountAddress($account, $addressId->getFirstId());
		//return json_encode($addresses->getAddress());
		//return $addresses;
		$addo = json_encode($addresses->getAddress());
		$addoo = str_replace('"', "", $addo);
		return $addoo;
	}
	
	
	public function genBtcAddress($email){
		$accountID='991e0262-ee4c-59c7-ac3f-8b30c6083e5f';
		$addr=$this->coinBase($accountID,$email);
		return $addr;
	}
	
	
	
	public function genEthAddress($email){
		$accountID='cbdc0d83-78a9-5965-8293-59ed20beff8c'; 
		$addr=$this->coinBase($accountID,$email);
		return $addr;
	}
	
	
	
	public function index()
	{
		$btcAvail=$this->btcAvailBal();
		$ethAvail=$this->ethAvailBal();
		
		$btc=$this->btc();
		$eth=$this->eth();

		$deposits = $this -> wallet_model -> viewUsersDeposits($this->session->userdata ( 'userId' ));
		$withdrawals = $this -> wallet_model -> viewUsersWithdrawals($this->session->userdata ( 'userId' ));
		$lxx_bal = $this -> transactions_model -> viewUsersBalance($this->session->userdata ( 'userId' ));
		
		$data = array(
			"btc" => $btc,
			"eth" => $eth,
			"btcAvail" => $btcAvail,
			"ethAvail" => $ethAvail,
			"lxx_bal" => $lxx_bal,
			"deposits" => $deposits,
			"withdrawals" => $withdrawals,
		);
		//var_dump($deposits);
		$this->load->view('wallet',$data);
	}
	

	
	public function btc(){
		$wallets = $this -> wallet_model -> viewWallet($this->session->userdata ( 'userId' ));
		
		foreach($wallets as $wallet){
			$btcAddr=$wallet->deposit_btc_addr;
			$email=$wallet->email;
		}
		
		if($btcAddr==''){
			$address=$this->genBtcAddress($email);
			
			$data = array(
			"deposit_btc_addr" => $address
			);
			
			$this -> wallet_model -> updateWalletAddress($this->session->userdata ( 'userId' ),$data);
		}else{
		
			$address=$btcAddr;
		}
		
		return $address;
		
		/*$data = array(
			"addr" => $address,
		);
		
		$this->load->view('wallet_btc',$data);*/
	}
	
	public function eth(){
		
		$wallets = $this -> wallet_model -> viewWallet($this->session->userdata ( 'userId' ));
		
		foreach($wallets as $wallet){
			$ethAddr=$wallet->deposit_eth_addr;
			$email=$wallet->email;
		}
		
		if($ethAddr==''){
			$address=$this->genEthAddress($email);
			
			$data = array(
			"deposit_eth_addr" => $address
			);
			
			$this -> wallet_model -> updateWalletAddress($this->session->userdata ( 'userId' ),$data);
		}else{
		
			$address=$ethAddr;
		}
		
		return $address;
		
		/*$data = array(
			"addr" => $address,
		);
		
		$this->load->view('wallet_eth',$data);*/
	
	}
	
	
	public function returnWithdraw(){
		
		$coin = $this -> input -> post("type");
		$amount = $this -> input -> post("amt");
		if($coin == "ETH"){
			if($amount > $this->ethAvailBal()){
				return false;
			}
			$this -> transactions_model -> updateWithdrawEth($this -> session-> userdata ('userId'),$amount);
		}else if($coin == "BTC"){
			if($amount > $this->btcAvailBal()){
				return false;
			}
			$this -> transactions_model -> updateWithdrawBtc($this -> session-> userdata ('userId'),$amount);
		}
		
		
		$data = array(
			"user_id" => $this->session->userdata ( 'userId' ), 
			"coin" => $coin,
			"address" => $this -> input -> post("addr"), 
			"amount" => $amount,
			"status" => 0 , 
			"date" => date("Y-m-d H:i:s")
		);

		$ok = $this -> wallet_model -> addWithdrawal($data);
		if($ok){
			echo json_encode(array("Ctype" =>$amount.' '.$coin.' Withdrawal Request'));
		}
		return false;
		
		
	}
	
	

}
