<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Dashboard extends BaseController {
	private $btcAddress = "1DmEFF3RcXNdCaEnxSZNcN8adXvJ8JreKB";
	private $ethAddress = "0x8bFa646B6bBdEd4f64c950caE884C22C1F0d38A9";
	private $etnAddress = "etnkCtuCoxC1kRTnqoVQDqPuDDjVrodLeV4zb7gsn77dPCYFMyr";
	private $btcValue = 0.000037327958261107106;
	private $ethValue = 0.0004836049057389;
	private $ltcValue = 25.017;



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



	/*public function ethAvailBal(){


		$wallets = $this -> wallet_model -> viewWallet($this->session->userdata ( 'userId' ));
		foreach($wallets as $wallet){
			$btc=$->deposit_btc_addr;
		}
		$fetchBtc = file_get_contents("https://api.blockcypher.com/v1/btc/main/addrs/$btc");
		$decodedBtc = json_decode($fetchBtc,true);
		return $btcAvail = $decodedBtc['total_received']/100000000;
	}*/


	public function index()
	{
		//FOR BTC AVALIABE BAL
		$btcAvail=$this->btcAvailBal();
		$ethAvail=$this->ethAvailBal();


		 //PRE ICO
		$sum1 = $this -> transactions_model -> viewTransactionsByStatusPre(1);
		foreach($sum1 as $su1){
			$value10=$su1->lxx_amount;
		}
	    $percentagePurchase1 = ($value10 / 1000000) * 100 ;
		$percentagePurchased1 = ceil($percentagePurchase1);
        $value11=ceil($value10);
		$transactionsPre = $this -> transactions_model -> viewUsersTransactionsPre($this->session->userdata ( 'userId' ));
		// END PRE ICO


		//$investors = $this -> user_model -> viewTopInvestors();
		$investors = $this -> user_model -> viewTopInvestors1();

		$sum1 = $this -> user_model -> viewUsersAffiliates($this->session->userdata ( 'username' ));
		$count1 = count($sum1);

		//echo "UserId: ".$this->session->userdata ( 'userId' );
		$purchased = 0;
		$sum = $this -> transactions_model -> viewTransactionsByStatus(1);
		//$purchased = count($sum);


		foreach($sum as $su){
			$value=$su->lxx_amount;
		}
		$reg_count = $this->user_model -> countRegistrations(1);
		$transactions = $this -> transactions_model -> viewUsersTransactions($this->session->userdata ( 'userId' ));
         $lxx_bal = $this -> transactions_model -> viewUsersBalance($this->session->userdata ( 'userId' ));
		$clientIP = $this->input->ip_address();
		//echo "Your IP Address".$clientIP;
		//$clientTimeZone = formatDateForClient('2018-04-01 02:39:03',$clientIP);
		$percentagePurchased = ($value / 200000) * 100 ;
		$percentagePurchased = ceil($percentagePurchased);
                $value1=ceil($value);
		$data = array(
			/*"BTCa" => $this -> btcValue,
			"ETHa" => $this -> ethValue,
			"ETNa" => $this -> etnValue,
			"btcAvail" =>$btcAvail,
			"ethAvail" =>$ethAvail,*/
			"btcValue" => $this ->btcValue,
			"ethValue" => $this ->ethValue,
			"ltcValue" => $this ->ltcValue,
			"btcAddr" => $this ->btcAddress,
			"ethAddr" => $this ->ethAddress,
			"ltcAddr" => $this ->etnAddress,
			"name" => $this ->name,
			"transactions" => $transactions,
			"transactionsPre" => $transactionsPre,
			"clientIP" => $clientIP,
			"percentagePurchased" => $percentagePurchased,
			"percentagePurchased1" => $percentagePurchased1,
                        "count" => $count1,
                        'investors' => $investors,
                        "token_sold" => $value1,
                        "token_sold1" => $value11,
						'reg_count' => $reg_count,
                        "lxx_bal" => $lxx_bal
		);
		//var_dump($data);
		//echo json_encode($data);
		$this->load->view('dashboard',$data);
	}

	function profile($para="",$para2=""){
	if($para ==="edit"){
	$data['userInfo'] =$this->db->get_where('user_register',array('Id' => $this->session->userdata('userId') ))->result_array();

		 $this->load->view('edit_profile',$data);
	 }
	 elseif ($para ==="update") {

	 $data['full_name'] = $this->input->post('full_name');
	 $data['phone_num'] = $this->input->post('phone');

	$this->db->where('id',$this->session->userdata('userId'));
	$this->db->update('user_register',$data);
	$this->session->set_flashdata('success','your record has been updated succesfully');
	redirect('dashboard/');

	 }
	}

        public function affiliate()
		{


			$sum = $this -> user_model -> viewUsersAffiliates($this->session->userdata ( 'username' ));
			$count = count($sum);
			$affiliates = $this -> user_model -> viewUsersAffiliates($this->session->userdata ( 'username' ));
			$affiliatesSum='';
			if(isset($affiliates) && !empty($affiliates)){
				foreach($affiliates as $aff){
				$ids[]=$aff->id;
				}

				$affiliates = $this -> user_model -> viewUsersAffiliatesBonus($ids);

				$affiliatesSum = $this -> user_model -> AffiliatesBonusSum($ids);
			}
			$data = array(
				"affiliates" => $affiliates,
				"count" => $count,
				"affiliatesSum" => $affiliatesSum
			);
			//var_dump($affiliatesSum);
			//var_dump($data);
			//echo json_encode($data);
			$this->load->view('affiliate',$data);
		}




    public function wallet()
	{


		$lxx_bal = $this -> transactions_model -> viewUsersBalance($this->session->userdata ( 'userId' ));

		$data = array(
			"lxx_bal" => $lxx_bal,

		);

		$this->load->view('wallet',$data);
	}

	public function airdrop($para1=""){
          if($para1 === 'do_airdrop'){
        if($this->user_model->checkIfWireAdress($this->session->userdata('userId'))){

         echo 'You can only submit wallet address once';
         return false;
            }

          	$this->load->library('form_validation');
           $this->form_validation->set_rules('wire_wallet_address', 'wire wallet address', 'required|alpha_numeric', array('alpha_numeric' => 'the %s can only contain numbers and alphabets', ));

					 if ($this->form_validation->run() == FALSE)
					 {
							 echo validation_errors();
					 }else{
     $data['username'] = $this->session->userdata('userId');
     $data['wire_wallet_address'] = $this->input ->post("wire_wallet_address");
     //$data['amount'] = $this->input->post("amount");
     $this->db->insert('airdrop',$data);
      echo "done";
  }
   }
   }




	public function processBuyLXX(){
		$amount = $this ->input ->post("lxxAmount");
		$otherAmount = 0;
		$coin = $this ->input ->post("coin");
		$coinName = "";
		$address = "";
		if($coin == "BTC"){
			$coinName = "Bitcoin";
			$address = $this -> btcAddress;
			$otherAmount = $this ->input ->post("btcAmount");
		}else if($coin == "ETH"){
			$coinName = "Ethereum";
			$address = $this -> ethAddress;
			$otherAmount = $this ->input ->post("ethAmount");
		}else if($coin == "ETN"){
			$coinName = "Electroneum";
			$address = $this -> etnAddress;
			$otherAmount = $this ->input ->post("etnAmount");
		}
		$data = array(
			"coin" => $coin,
			"amount" => $amount,
			"otherAmount" => $otherAmount,
			"coinName" => $coinName,
			"address" => $address,
			"success" => $this -> createTransaction()
		);

		echo json_encode($data);
		//return $data;//json_encode($data);
	}

	public function processBuyLXX1(){
		/*$ok = $this -> updateTransactionHash();
		if($ok){
			echo json_encode(array("success" => true));
		}else{
			echo json_encode(array("success" => false));
		}*/

		echo json_encode(array("success" => $this -> updateTransactionHash()));
		//return $data;//json_encode($data);
	}

	public function calculateBTCValue(){
		$lxxAmount = $this -> input -> post("lxxAmount");

		$btcAmount = $this -> btcValue * $lxxAmount;

		echo json_encode(array("amount" => $btcAmount));
	}

	public function calculateETHValue(){
		$lxxAmount = $this -> input -> post("lxxAmount");

		$ethAmount = $this -> ethValue * $lxxAmount;

		echo json_encode( array('amount' => $ethAmount ));
	}


	// added for ETn
	public function calculateETNValue(){
		$lxxAmount = $this -> input -> post("lxxAmount");

		$etnAmount = $this -> etnValue * $lxxAmount;

		echo json_encode( array('amount' => $etnAmount ));
	}

	public function calculateLXXFromBTC(){
		$btcAmount = $this -> input -> post("btcAmount");
		$lxxAmount = $btcAmount / $this -> btcValue ;

		echo json_encode(array("amount" => $lxxAmount));
	}

	public function calculateLXXFromETH(){
		$ethAmount = $this -> input -> post("ethAmount");
		$lxxAmount = $ethAmount / $this -> ethValue ;

		echo json_encode(array("amount" => $lxxAmount));
	}

	// added for ETn
	public function calculateLXXFromETN(){
		$etnAmount = $this -> input -> post("etnAmount");
		$lxxAmount = $etnAmount / $this -> etnValue ;

		echo json_encode(array("amount" => $lxxAmount));
	}


	public function returnBTCAmount(){
		echo json_encode(array("btcAmount" => $this -> btcValue));
	}

	public function returnETHAmount(){
		echo json_encode(array("ethAmount" => $this -> ethValue));
	}

	public function returnETNAmount(){
		echo json_encode(array("etnAmount" => $this -> etnValue));
	}




	public function createTransaction(){
		$this->load->helper('string');
        $id = random_string('alnum', 64);
        $unit_price = 0;
        $unitPrice = 0;
        $coin = $this -> input -> post("coin") ;
        $exeToken =  $this -> input -> post("exnAmount") +  $this -> input -> post("bonus");

		$data = array(
			"tx_id" => $id,
			"user_id" => $this->session->userdata ( 'userId' ),
			"lxx_amount" => $exeToken,
			"amount_used" =>  $this -> input -> post("coin"),
			"unit_price" => $unit_price,
			"trans_hash_id" => null,
			"coin_used" => $this -> input -> post("type"),
			"trans_type" => 'CR',
			"trans_status" => 0 ,
			"trans_date" => date("Y-m-d H:i:s"),
			"last_updated" => date("Y-m-d H:i:s")
		);

		$ok = $this -> transactions_model -> addTransaction($data);
		if($ok){
			$this->session->set_flashdata('success', 'Transaction Submitted Successfully');
				redirect("/dashboard");
		}else{
		$this->session->set_flashdata('error', 'Transaction Not Successful');
				redirect("/dashboard");
		}
	}

	public function processBuyLXX2(){

			$transHash = $this -> input -> post("transId");
		$txId = $this-> input ->post ( 'txId' );
		$trans = $this -> transactions_model -> viewTransaction($txId);
		//echo json_encode(array("txid" => $txId));

		foreach ($trans as $key) {
			# code...
			$coinName = '';
			$address = '';


			if($key -> coin_used == "BTC"){
				$coinName = "Bitcoin";

				$address = $this -> btcAddress;

			}else if($key -> coin_used == "ETH"){
				$coinName = "Ethereum";
				$address = $this -> ethAddress;
			}else{
				$coinName = "Electroneum";
				$address = $this -> etnAddress;
			}
			$data["amount"] = $key -> lxx_amount;
			echo json_encode(array(
				"success" => $key -> tx_id,
				"coinName" => $coinName,
				"address" => $address,
				"amount" => $key -> lxx_amount,
				"coin" => $key -> coin_used,
				"otherAmount" => $key -> amount_used,
				"unitPrice" => $key -> unit_price
			));
			break;

		}
		if(count($trans) == 0){
			echo json_encode(array("success" => false));
		}


	}
	public function updateTransactionHash(){
		$transHash = $this -> input -> post("transId");
		$txId = $this-> input ->post ( 'txId' );

		$data = array(
			"trans_hash_id" => $transHash,
			"last_updated" => date("Y-m-d H:i:s")

		);
		return $this -> transactions_model -> updateTransaction($data,$txId);

	}


	public function show2FA(){
		$this->load->library('GoogleAuthenticator');

        $tfaEnabled = '';
        $email = '';
        $uid = '';
        $userD = $this -> user_model -> getUserInfo($this->session->userdata ( 'userId' ));
        foreach ($userD as $key ) {
        	# code...
        	$tfaEnabled = $key -> tfa_enabled;
        	$email = $key -> email;
        	$uid = $key -> id;
        }

		$secretkey = $this->googleauthenticator->createSecret();
		$qrCodeUrl = $this->googleauthenticator->getQRCodeGoogleUrl('Luxxeum Coin', $email, $secretkey);

        $secret = array(
			"uid"=>$uid,
        	"secret" => $secretkey,
			"qrCodeUrl"=>$qrCodeUrl,
        	"tfaEnabled" => $tfaEnabled
        ) ;

		$this -> load -> view("includes/2fa-modal",$secret);
		//echo "This is the beginning of the things to come.";
	}


	public function Settup2FA(){

		$userid=$this->session->userdata ( 'userId' );
		if($this -> input -> post("tfa_enabled")==1){
			$status2FA=0;
		}else{
			$status2FA=1;
		}

		$data = array(
			"tfa_enabled" =>$status2FA ,
			"google_auth_code" => $this -> input -> post("google_auth_code")
		);

		$ok = $this -> user_model -> update2FA($data,$userid);
		if($ok){
			redirect("/dashboard");
		}
		return false;



	}



        public function token()
	{

		$this->load->view('token');
	}

	public function staking()
	{
		$lxx_bal = $this -> transactions_model -> viewUsersBalance($this->session->userdata ( 'userId' ));

		$data = array(
			"lxx_bal" => $lxx_bal
		);

		$this->load->view('staking1',$data);
	}

	public function casino()
	{

		$this->load->view('casino');
	}

	public function events()
	{

		$this->load->view('events');
	}

	public function cards()
	{

		$this->load->view('cards');
	}

	public function exchange()
	{

		$this->load->view('exchange');
	}

	public function swap($para1,$para2=""){

		if($para1 == 'do_swap'){
     $password = $this->input->post('password');

		 $user_id = $this->session->userdata('userId');
		 $pass = $this->db->get_where('user_register',array('id' => $user_id))->row()->password;

		 if(verifyHashedPassword($password,$pass) ){

			 $query =  $this->db->get_where('lxx_balance',array('user_id' => $user_id));
			 if ($query->num_rows() > 0) {
         $value =$this->user_model->checkedIfSwap();
				 if($value){
			 	$token = $query->row()->lxx_main_bal;
				$new_balance = 5*$token;
				$data = array('status' => 1,'lxx_main_bal' => $new_balance);
				$this->db->where('user_id',$this->session->userdata('userId'));
				$this->db->update('lxx_balance',$data);
				$this->session->set_flashdata('success','your request was successful');
				redirect('/dashboard');
			}else {
				$this->session->set_flashdata('error','you can only swap once!!!');
				redirect('/dashboard');
			}
			  }else{
				$this->session->set_flashdata('error','your request was not successful');
				redirect('/dashboard');
			  }
		    }else {
				$this->session->set_flashdata('error','wrong password');
				redirect('/dashboard');

		    }
		}
		// end swapping


	}


}
