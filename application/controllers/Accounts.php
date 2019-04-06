<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct(){
        parent::__construct();
        $this -> load-> model("user_model");
        $this -> load-> model("signup_model");
        $this -> load-> model("accounts_model");
    }

    public function index()
    {
		$reg_count = $this->user_model -> countRegistrations(1);
		$data = array(
                'reg_count' => $reg_count,
            );
       	$this->load->view('login',$data);
		//echo $reg_count;
    }

    public function signupForm(){
		$reg_count = $this->user_model -> countRegistrations(1);
		$data = array(
                'reg_count' => $reg_count,
            );
        $this -> load -> view("signup1",$data);
    }

    public function validate_captcha(){
        $response = $this -> input->post("g-recaptcha-response");

            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => '6LfLznoUAAAAAMYqPqWbh2Fw71DvXkRcX_5nJZC8',
                'response' => $response,
                'remoteip' => $this->input->ip_address()
            );
            $options = array(
                'http' => array (
                    'header' => "Content-type: application/x-www-form-urlencoded",
                    'method' => 'POST',
                    'content' => http_build_query($data)

                )
            );
            $context  = stream_context_create($options);
          //  $verify = file_get_contents($url, false, $context);
            $captcha_success =json_decode($verify);

          //  if ($captcha_success->success==false) {
                //echo "<p>You are a bot! Go away!</p>";
            //   $this->session->set_flashdata('error', 'Invalid Captcha, Please Try again');
              // return false;
          //  }
           return true;
    }
    public function processSignup(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_checkEmailExists|xss_clean|max_length[128]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[100]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[100]');
        //$this->form_validation->set_rules('phone', 'Phone Number', 'required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_checkUsernameExists|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this -> load -> view("signup1");
            //redirect("accounts/register");

        }else{
            if($this -> validate_captcha() == false){
                redirect("accounts/register");
            }
            $regData = array(
                "email" => $this -> input->post("email"),
                "username" => $this -> input->post("username"),
                "full_name" => $this -> input->post("full_name"),
                "phone_num" => $this -> input->post("phone_full"),
                "referral" =>  $this -> input->post("referral") != "" ? $this -> input->post("referral") : null,
                "dial_code" => $this -> input->post("dial_code"),
                "iso_code" => $this -> input->post("iso_code"),
                "country_name" => $this -> input->post("country_name"),
                "password" => getHashedPassword($this->input->post('password')),
                "active_status" =>  0
            );
            $nam = $this -> input->post("full_name");
            $this->load->helper('string');
            $id = random_string('alnum', 64);
            $linkData = array(
                "act_link"     => $id,
                "email" => $this -> input->post("email"),
                "act_type"     => 1
            );
            $home = base_url();
            $link = "accounts/verify/$id";
            $url = $home . $link;
            $message = array(
                "name" => $this -> input->post("full_name"),
                "message" => "Thank you for signing up to LuxxeumCoin, please click on the button below to activate your account",
                "verify_link" => $url
            );

            $res = $this->sendEmail($this->input->post("email"), 'LuxxeumCoin Email Verification', $message, 'Luxxeum Coin','email/verify_email');
            if ($res) {
                //echo "Email Sent Successfully";
                $this->session->set_flashdata('success', 'LuxxeumCoin has sent you an email, please check to confirm your account');
            } else {
                //echo "Failed to send an email to the provided email address";
                //var_dump($res);
                $this->session->set_flashdata('error', 'LuxxeumCoin Can NOT reach the email address you have provided at the moment, please try again later');
            }

            $res = $this->user_model -> addNewUser($regData);
            $res1 = $this->signup_model -> addSignup($linkData);
            if($res){
                $this->session->set_flashdata('success', 'Hello '.$nam.' , Welcome to LuxxeumCoin. Your sign up was successful, please log in to your email to activate your account. ');
            }else{
                $this->session->set_flashdata('error', 'Your sign up was NOT successful, please try again!!');
            }
            redirect("accounts/register");
        }
    }


    function checkEmailExists() {
        $email = $this->input->post("email");


        $result = $this->user_model->checkEmailExists($email);


        if (empty($result)) {
            return true;
        } else {
            $this->form_validation->set_message('checkEmailExists', 'This Email Address has already been registered');
            return false;
        }
    }
    function checkEmailExists1() {
        $email = $this->input->post("email");


        $result = $this->user_model->checkEmailExists($email);


        if (empty($result)) {
            return false;
            $this->form_validation->set_message('checkEmailExists1', 'This Email Address has NOT been registered here');
        } else {

            return true;
        }
    }
    function checkUsernameExists() {
        $email = $this->input->post("username");


        $result = $this->user_model->checkUsernameExists($email);


        if (empty($result)) {
            return true;
        } else {
            $this->form_validation->set_message('checkUsernameExists', 'This Username has already been registered');
            return false;
        }
    }

    //send email

    function sendEmail($email, $title, $message, $senderName,$tempName) {
        //echo "Loading email library";
        // Email configuration
        $this->load->library('email');

        //get the code and the email
        //$uprofile = $this->view_Profile($userid);
        //echo $uprofile->email;
        //echo $uprofile->verifycode;
        echo "Loading email library";
        $config['protocol'] = 'smtp';
        //$config['smtp_host'] = 'localhost';
        $config['smtp_host'] = 'mail.luxeumexchange.co';
        $config['smtp_port'] = '25';
        $config['smtp_timeout'] = '30';
        $config['smtp_user'] = 'email-verification@luxeumexchange.co';
        $config['smtp_pass'] = 'LuxxPa$$w0rd';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['MAIL_PATH'] = '/usr/sbin/sendmail';
        $config['validation'] = TRUE; // bool whether to validate email or not
        $this->email->initialize($config);

        //$this->email->from('no_reply@luxxeum.co', $senderName);
        $this->email->from('email-verification@luxeumexchange.co', $senderName);
        $this->email->to($email);

        $this->email->subject($title);
        $this->email->message($this->load->view($tempName, $message, TRUE));
        //$this->email->message($message);
        return $this->email->send();
    }

    public function verifySignup($activeLink = NULL){
        if($activeLink == NULL){
            $activeLink = $this -> input -> post("activeLink");
        }
        //check if this link is in our database
        $data = $this -> signup_model -> getSignupData($activeLink,1);
        if($data && !empty($data)){
            //activate this account
            //var_dump($data);
            $update = array('active_status' => 1);
            $email = '';
            foreach ($data as $key) {
                # code...
                $email = $key ->email;
            }
            $res = $this -> user_model -> editUserByEmail($update,$email);
            if($res && $res == 1){
                $this -> signup_model ->deleteSignup($activeLink);
                //create an account for this user
                $this->load->helper('string');
                $id = random_string('numeric', 32);
                //check if user account not created before
                $accExist = $this -> accounts_model -> viewAccountByUser($this->session->userdata ( 'userId' ));
                if(count($accExist) == 0){
                    $usrDtails = $this -> user_model -> getUserInfoByEmail($email);
                    $userId = 0;
                    foreach ($usrDtails as $key ) {
                        # code...
                        $userId = $key -> id;
                    }
                    $account = array(
                        "acct_no" => $id,
                        "user_id" => $userId,
                        "lxx_balance" => 0,
                        "bonus_balance" => 0,
                        "btc_balance" => 0,
                        "eth_balance" => 0 ,
                        "acct_status" => 1,
                        "date_created" => date("Y-m-d H:i:s"),
                        "last_updated" => date("Y-m-d H:i:s")
                    );
                    $this -> accounts_model -> addAccount($account);
                }

            }
            $this->session->set_flashdata('success', 'Your account has been activated successfully, please login to access your account');
            redirect("accounts/login");
        }else{
            //this link does not exist
            $this->session->set_flashdata('error', 'Sorry!! This Account can not be activated at this time, please try again!!');
            redirect("accounts/register");
        }
    }

    public function doLogin(){
         $this->load->library('form_validation');
            //$this->form_validation->set_rules('email', 'Username', 'trim');
            $this->form_validation->set_rules('username', 'Username', 'required|required');
            //$this->form_validation->set_rules('username', 'Username', 'xss_clean');

            $this->form_validation->set_rules('password', 'Password', 'required|max_length[100]');

            if ($this->form_validation->run() == FALSE) {
                //redirect("accounts/login");
                $this->load->view("login");

            }else{
               if($this -> validate_captcha() == false){
                    redirect("accounts/login");
                }
                $username = $this -> input -> post("username");
                $password = $this -> input -> post("password");
                $userData = $this -> user_model ->getUserInfoByEmail($username);
                //var_dump($userData);
                if(empty($userData)){
                    $this->session->set_flashdata('error', 'Invalid Username or password');
                    $this->load->view("login");
                }else {
                    $status = 0;
                    $pass = '';
                    $email = "";
                    $name = "";
                    $id = '';
                    foreach ($userData as $key) {
                        # code...
                        $status = $key -> active_status;
                        $pass = $key -> password;
                        $email = $key -> email;
                        $name = $key -> full_name;
                        $id = $key -> id;
                        $tfa_enabled = $key -> tfa_enabled;
                    }
                   
                    if(!verifyHashedPassword($password, $pass)){
                        $this->session->set_flashdata('error', 'Invalid Username or password');
                        $this->load->view("login");
                    }else if($status != 1){
                        $this->session->set_flashdata('error', 'Sorry, You can NOT login now because your account is inactive. Please contact System Admin');
                        $this->load->view("login");
                    }else if($status = 1 && verifyHashedPassword($password, $pass)){

						$_SESSION['2FAemail']=$email;

						if($tfa_enabled==1){
							$this->load->view("verify_2fa");
						}else{
							 $sessionData = array(
                            "username" => $username,
                            "email" => $email,
                            "name" => $name,
                            "userId" =>$id,
                            'isLoggedIn' => TRUE
                        );
                        $this->session->set_userdata($sessionData);
                        redirect("/dashboard");
						}
                    }
                }

            }
    }

	public function verify2FA(){
	$this->load->library('GoogleAuthenticator');

	  $userData = $this -> user_model ->getUserInfoByEmail($_SESSION['2FAemail']);
		foreach ($userData as $key) {
			# code...
			$username = $key -> username;
			$email = $key -> email;
			$name = $key -> full_name;
			$id = $key -> id;
			$secret = $key -> google_auth_code;
			$tfa_enabled = $key -> tfa_enabled;
		}

		$code=$this ->input ->post("code");
		$checkResult = $this->googleauthenticator->verifyCode($secret, $code, 2); // 2 = 2*30sec clock tolerance
		if ($checkResult) {
			 $sessionData = array(
				"username" => $username,
				"email" => $email,
				"name" => $name,
				"userId" =>$id,
				'isLoggedIn' => TRUE
			);
			$this->session->set_userdata($sessionData);
			redirect("/dashboard");
		} else {

			$this->session->set_flashdata('error1', 'Invalid Code');
            $this->load->view("verify_2fa");
		}
	}



    public function resetPassword(){
        $this -> load -> view("password_reset");
    }

    public function resetPassword1($verifyLink){
        $data = $this -> signup_model -> getSignupData($verifyLink,2);
        if($data && !empty($data)){
            $email = '';
            $resetLink = '';
            foreach ($data as $key) {
                # code...
                $email = $key -> email;
                $resetLink = $key ->act_link;
            }
            $some  = array(
                'email' => $email,
                'resetLink' => $resetLink
            );

            $this -> load -> view("password_reset1",$some);
        }else {
            $this->session->set_flashdata('error', 'Invalid Operation');
            $this->load->view("login");
        }
    }

    public function submitEmailForPasswordReset(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_checkEmailExists1|xss_clean|max_length[128]');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view("password_reset");
        }else{
            $userInfo = $this -> user_model -> getUserInfoByEmail($this -> input->post("email"));
            $name = '';
            if(!empty($userInfo)){
                foreach ($userInfo as $key) {
                    # code...
                    $name = $key -> full_name;
                }
            }
            $this->load->helper('string');
            $id = random_string('alnum', 64);
            $linkData = array(
                "act_link"     => $id,
                "email" => $this -> input->post("email"),
                "act_type"     => 2
            );
            $home = base_url();
            $link = "accounts/resetpassword1/$id";
            $url = $home . $link;
            $message = array(
                "name" => $name,
                "message" => "Welcome back to LuxxeumCoin, we are here for you, please click on the button below to reset password",
                "verify_link" => $url
            );

            $res = $this->sendEmail($this->input->post("email"), 'LuxxeumCoin Password Reset', $message, 'Luxxeum Coin','email/verify_email');
            if ($res) {
                //echo "Email Sent Successfully";
                $this->session->set_flashdata('success', 'LuxxeumCoin has sent you an email, please check to reset your password');
            } else {
                //echo "Failed to send an email to the provided email address";
                //var_dump($res);
                $this->session->set_flashdata('error', 'LuxxeumCoin Can NOT reach the email address you have provided at the moment, please try again later');
            }
            $res1 = $this->signup_model -> addSignup($linkData);
            redirect("accounts/resetpassword");
        }
    }
    public function processPasswordReset($resetLink){
        $this->load->library('form_validation');
        if($resetLink == null){
            $this->session->set_flashdata('error', 'Invalid Operation Detected, Please try again.');
        }
            //$this->form_validation->set_rules('email', 'Username', 'trim');
            $this->form_validation->set_rules('password', 'Password', 'required|required');
            //$this->form_validation->set_rules('username', 'Username', 'xss_clean');

            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[100]');

            if ($this->form_validation->run() == FALSE || $resetLink == null) {
                //redirect("accounts/login");
                $this->load->view("login");

            }else{
                if($this -> validate_captcha() == false){
                    redirect("accounts/login");
                }
                $email = $this -> input -> post("email");
                $data = array("password" => getHashedPassword($this->input->post('password')));
                $this -> user_model -> editUserByEmail($data, $email);
                $this -> signup_model ->deleteSignup($resetLink);
                $this->session->set_flashdata('success', 'Your Password has been reset successfully, please login to access your account');
                redirect("accounts/login");

            }

    }

}
