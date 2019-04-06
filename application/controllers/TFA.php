<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TFA extends CI_Controller {

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
        
    }

    public function index()
    {
       $this -> load -> view("testTFA");
    }

    public function processTFA(){
         //$this->load->view('login');
        $this->load->library('GoogleAuthenticator');
        $gaobj = new GoogleAuthenticator();
            $secret = '4UMHZZNE6FRR3UKF' ; //$gaobj->createSecret();
            $oneCode = $this->input->post('otp');
            
            $token = $gaobj->getCode($secret);
                    
            $checkResult = $gaobj->verifyCode($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance
            echo "secret: $secret";
            echo "<br/>token: $token";
            echo "<br/>check result: $checkResult";
        /*if (!$checkResult)
            {
               
                $this->index('Two-factor token Failed'); // index function load login page view
               
            }
            else
            {    
                // Two-factor code success and now steps for username and password verification
            } */
    }
    
}
