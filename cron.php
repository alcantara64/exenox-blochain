<?php 
$conn= new PDO('mysql:host=localhost;dbname=luxevxkw_lxx_db;charset=utf8','luxevxkw_lxx_user1','Qa8Uz9CareO$');

$sql="select * from staking where status=0";
$query=$conn->prepare($sql);
$query->execute();
$stake_earn=$query->fetchAll(PDO::FETCH_ASSOC);
//$stake_earn=$query->fetch(PDO::FETCH_OBJ);
//var_dump($stake_earn);
foreach($stake_earn as $earn){
		 $id=$earn['id'];
		 $user_id=$earn['user_id'];
		 $amount=$earn['amount'];
		 $interest=$earn['interest'];
		 $daily=$earn['daily_amount'];
		 $roi=$earn['roi'];
		 $day=$earn['day'];
		 $total_days=$earn['total_days'];
		 $count_date=strtotime($earn['count_date']);
		 $stake_date=strtotime($earn['stake_date']);
		 $release_date=strtotime($earn['release_date']);
		 $date=strtotime(date("Y-m-d H:i"));
		 //$date=strtotime("2018-05-12 21:49");
	
	 if($count_date < $date && $count_date!=$release_date ){
		 
		 // INSERT NEW EARNINGS 
		 
		  $left1=$day+1;
		  $left=$left1.' / '.$total_days;
		 $c_date = strtotime($earn['earn_date']."+ 1 days");
		$Edate =date("Y-m-d",$c_date);
		 
		 $sql1="INSERT INTO `stake_earnings`(`user_id`, `amount`, `interest`, `daily`, `days_left`, `date_e`) VALUES ('$user_id','$amount','$interest','$daily','$left','$Edate')";
		 $query1=$conn->prepare($sql1);
		 $query1->execute();
		
		 // UPDATE STAKINGS TABLE 
		 
		  $cc_date = strtotime($earn['count_date']."+ 1 days");
		$Cdate =date("Y-m-d H:i",$cc_date);
		 
		  $e_date = strtotime($earn['earn_date']."+ 1 days");
		$Eadate =date("Y-m-d",$e_date);
		 
		 $sql2="UPDATE `staking` SET count_date='$Cdate',day=day+1,earn_date='$Eadate' WHERE id='$id'";
		 $query2=$conn->prepare($sql2);
		 $query2->execute();
		
		  }else if($count_date >= $release_date){
	 	
		  // INSERT NEW EARNINGS 
		 
		  $left1=$day+1;
		  $left=$left1.' / '.$total_days;
		 $c_date = strtotime($earn['earn_date']."+ 1 days");
		$Edate =date("Y-m-d",$c_date);
		 
		 $sql1="INSERT INTO `stake_earnings`(`user_id`, `amount`, `interest`, `daily`, `days_left`, `date_e`) VALUES ('$user_id','$amount','$interest','$daily','$left','$Edate')";
		 $query1=$conn->prepare($sql1);
		 $query1->execute();
		
		 // UPDATE STAKINGS TABLE 
		 
		  $c_date = strtotime($earn['count_date']."+ 1 days");
		$Cdate =date("Y-m-d H:i",$c_date);
		 
		 $sql2="UPDATE `staking` SET count_date='$Cdate',day=day+1,status=1 WHERE id='$id'";
		 $query2=$conn->prepare($sql2);
		 $query2->execute();
		 
		  // UPDATE ACCURED INTEREST
	 
		 $sql3="UPDATE `lxx_balance` SET stake_interest=stake_interest+$roi WHERE user_id='$user_id'";
		 $query3=$conn->prepare($sql3);
		 $query3->execute();
		 
		  // UPDATE STAKE BALANCE
	 
		 $sql4="UPDATE `lxx_balance` SET stake_bal=stake_bal-$amount WHERE user_id='$user_id'";
		 $query4=$conn->prepare($sql4);
		 $query4->execute();
		 
		 // UPDATE LXX BALANCE
	 
		 $sql5="UPDATE `lxx_balance` SET lxx_bal=lxx_bal+$amount WHERE user_id='$user_id'";
		 $query5=$conn->prepare($sql5);
		 $query5->execute();
	 }
	
}
?>