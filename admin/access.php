<?php 
 session_start(); ob_start();

ini_set('display_errors', '0');

 include 'dbconnect.php';


//////////////////// LOGIN CONTROL /////////////////////

if(isset($_REQUEST['login'])){
	
	$uname=  mysqli_real_escape_string($conn, $_POST['uname']);
	$pword=  mysqli_real_escape_string($conn, $_POST['pword']);
	$hash=md5($pword);
	
	 $tsql="SELECT username FROM admin_login WHERE username='$uname' AND password='$hash'";
      $results = $conn->query($tsql);
	if($results->num_rows == 0){
	
    	
    
              header("location:index.php");	
	}else{
		
	
		
		 $_SESSION['uname']=$uname;
		
		header('location:dashboard.php?login success');
	}

}



///////////////////  LOGOUT CONTROL  ///////////////////////////
if(isset($_REQUEST['logout'])){
	
	session_destroy();
	header('location:index.php');

}




///////////////////  TRANSACTION CONTROL  ///////////////////////////
if(isset($_REQUEST['complete'])){
    
    $tx_id=  ($_POST['approve']);
    $lxx_coin = ($_POST['volume']);
    
   $statement1 ="update transaction set trans_status=1 where tx_id='$tx_id' ";
   $results1 = $conn->query($statement1);
	
	$sql="select * from lxx_balance where user_id='{$_POST['user_id']}'";
	$result=$conn->query($sql);
		if($result->num_rows == 1){
			
			 $statement ="update lxx_balance set lxx_bal=lxx_bal+$lxx_coin,lxx_main_bal=lxx_main_bal+$lxx_coin where user_id='{$_POST['user_id']}' ";
   			 $results = $conn->query($statement);
			
		}else{
			
			$statement ="insert into lxx_balance (user_id,lxx_bal,lxx_main_bal) values ('{$_POST['user_id']}',$lxx_coin,$lxx_coin) ";
   			 $results = $conn->query($statement);
		}
	
	//$conn->close();
	  setcookie('success',"Approved Successfully",time()+5,"/"); 	
   header("location:dashboard.php");
  
}




///////////////////  DELETE TRANSACTION CONTROL  ///////////////////////////
if(isset($_REQUEST['delete'])){
    
    
   $statement1 ="delete from transaction where tx_id='{$_POST['approve']}' and user_id='{$_POST['user_id']}' ";
   $results1 = $conn->query($statement1);

	if($conn->affected_rows == 1 ){
			setcookie('success',"Transaction Deleted Successfully",time()+5,"/");
			 header("location:dashboard.php");
	}else{
		setcookie('error',"Transaction Not Deleted",time()+5,"/");
			 header("location:dashboard.php");
		}
	$conn->close();
	   	
  
  
}


///////////////////  STAKE INTREST CONTROL  ///////////////////////////
if(isset($_REQUEST['payment'])){
    $amount=round($_POST['amount'],2);
    
   $statement1 ="update lxx_balance set stake_paidout=stake_paidout + $amount where  user_id='{$_POST['user_id']}' ";
   $results1 = $conn->query($statement1);

	$statement2 ="update stake_withdraw set status=1 where id='{$_POST['id']}' ";
   $results2 = $conn->query($statement2);
	
	if($conn->affected_rows == 1 ){
			setcookie('success',"Payment Status Updated Successfully",time()+5,"/");
			 header("location:stake_withdraw.php");
	}else{
		setcookie('error',"ERROR : Payment Status Not Updated",time()+5,"/");
			 header("location:stake_withdraw.php");
		}
	$conn->close();
	   	
  
  
}


///////////////////  STAKE INTREST CONTROL DELETE ///////////////////////////
if(isset($_REQUEST['payment-delete'])){
    $amount=round($_POST['amount'],2);
    
   $statement1 ="update lxx_balance set stake_interest=stake_interest + $amount where  user_id='{$_POST['user_id']}' ";
   $results1 = $conn->query($statement1);

	$statement2 ="delete from stake_withdraw where id='{$_POST['id']}' ";
   $results2 = $conn->query($statement2);
	
	if($conn->affected_rows == 1 ){
			setcookie('success',"Payment Canceled Successfully",time()+5,"/");
			 header("location:stake_withdraw.php");
	}else{
		setcookie('error',"ERROR : Payment Not Canceled",time()+5,"/");
			 header("location:stake_withdraw.php");
		}
	$conn->close();
	   	
  
  
}



?>