<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . 'helpers/GoogleMapsTimeZone.php';

/**
 * This function is used to print the content of any data
 */
define('API_KEY', 'AIzaSyA6TQcfQlGt5aagNUNMRQpC2jdjW-Irre4');

function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
         $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'localhost';
        $config['smtp_port'] = '857';
       $config['smtp_timeout'] = '30';
        $config['smtp_user'] = 'info@4thlife.org';
        $config['smtp_pass'] = 'tomJAva!98%';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI->load->library('email');
         $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'localhost';
        $config['smtp_port'] = '857';
       $config['smtp_timeout'] = '30';
        $config['smtp_user'] = 'info@4thlife.org';
        $config['smtp_pass'] = 'tomJAva!98%';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        // pre($detail);
        // die;
        
        $CI = setProtocol();        
        
        $CI->email->from('info@4thlife.org', '4thlife.org');
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
        
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}
if(!function_exists('returnStatus'))
{
    function returnStatus($code)
    {
		$status = "";
        if($code == STATUS_REG_PEND){
            $status = "INCOMPLETE REGISTRATION";
        }else if($code == STATUS_NEW){
			$status = " PROCESS PENDING";
		}else if($code == STATUS_1ST_LIFE){
			$status = "FIRST LIFE";
		}else if($code == STATUS_2ND_LIFE){
			$status = "SECOND LIFE";
		}else if($code == STATUS_3RD_LIFE){
			$status = "THIRD LIFE";
		}else if($code == STATUS_4TH_LIFE){
			$status = "FOURTH LIFE";
		}
		return $status;
    }
	
}

if(!function_exists('formatDateForClient'))
{
    function formatDateForClient($serverDate,$clientIP)
    {
        $data = "";
        
        $url = "http://ipinfo.io/".$clientIP;
        $ip_info = json_decode(file_get_contents($url));
         
        $loc = $ip_info->loc;
        $loc_array = explode(',',$loc);
        $lat = $loc_array[0];
        $long = $loc_array[1];
         
         
        // Initialize GoogleMapsTimeZone object
        $timezone_object = new GoogleMapsTimeZone($lat, $long, GoogleMapsTimeZone::FORMAT_JSON);
         
        // Set Google API key
        $timezone_object->setApiKey(API_KEY);
         
        // Perform query 
        $timezone_data = $timezone_object->queryTimeZone();
         
        $clientTZ = "";
        if(!empty($timezone_data) && isset($timezone_data["timeZoneId"])){
            $clientTZ = $timezone_data["timeZoneId"];

        }else{
            $clientTZ = "Europe/Berlin";
        }
        
        $date = new DateTime(date('Y-m-d H:i:sP',strtotime($serverDate)), new DateTimeZone($clientTZ));
        $date->setTimezone(new DateTimeZone($clientTZ));
        $data = $date ->format( 'Y-m-d H:i:sP');
        
        return substr($data, 0,19);
    }
    
}

?>