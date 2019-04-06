<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'accounts';
$route['404_override'] = 'error';
$route['translate_uri_dashes'] = FALSE;


// EXENOX BUY TOKEN
$route['exenox-buy'] = 'dashboard/createTransaction';




$route['dashboard'] = 'dashboard/index';

$route['affiliates'] = 'dashboard/affiliate';

//$route['wallet'] = 'dashboard/wallet';

$route['buyLXX'] = 'dashboard/processBuyLXX';
$route['buyLXX1'] = 'dashboard/processBuyLXX1';

$route['LXX2BTC'] = 'dashboard/calculateBTCValue';

$route['LXX2ETH'] = 'dashboard/calculateETHValue';

$route['LXX2ETN'] = 'dashboard/calculateETNValue';

$route['transD'] = 'dashboard/processBuyLXX2';

$route['BTC2LXX'] = 'dashboard/calculateLXXFromBTC';

$route['ETH2LXX'] = 'dashboard/calculateLXXFromETH';

$route['ETN2LXX'] = 'dashboard/calculateLXXFromETN';

$route['BTCRate'] = 'dashboard/returnBTCAmount';

$route['ETHRate'] = 'dashboard/returnETHAmount';

$route['ETNRate'] = 'dashboard/returnETNAmount';

$route['accounts/register'] = 'accounts/signupForm';

$route['accounts/login'] = 'accounts/index';

$route['accounts/signup'] = 'accounts/processSignup';

$route['accounts/verify/(:any)'] = 'accounts/verifySignup/$1';

$route['accounts/plogin'] = 'accounts/doLogin';

$route['accounts/logout'] = 'dashboard/logout';
$route['accounts/resetpassword'] = 'accounts/resetPassword';
$route['accounts/resetpassword1/(:any)'] = 'accounts/resetPassword1/$1';
$route['accounts/preset'] = 'accounts/submitEmailForPasswordReset';
$route['accounts/preset1/(:any)'] = 'accounts/processPasswordReset/$1';

$route['Settup2FA'] = 'dashboard/Settup2FA';

$route['accounts/verify'] = 'accounts/verify2FA';

$route['token'] = 'dashboard/token';

$route['staking1'] = 'dashboard/staking';



$route['staking'] = 'staking/index';
$route['stakereg'] = 'staking/createStake';
$route['stakeWithdraw'] = 'staking/stakeWithdraw';
$route['tokenBuy'] = 'staking/tokenBuy';

// WALLET
$route['wallets'] = 'wallet/index';


$route['wallet_btc'] = 'wallet/btc';
$route['wallet_eth'] = 'wallet/eth';

$route['Deposit'] = 'wallet/returnDeposit';

$route['Withdraw'] = 'wallet/returnWithdraw';


$route['casino'] = 'dashboard/casino';

$route['events'] = 'dashboard/events';

$route['cards'] = 'dashboard/cards';

$route['exchange'] = 'dashboard/exchange';

