<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>LuxxeumCoin</title>
		
		
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.css'>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.all.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.js"></script>
		
		
        <?php
        	include_once('includes/css-links.php');
		?>
		<style type="text/css">
			.selected-coin{
				background-color: #1194f7;
				color: #fff;
			}
			
			
	
	
		</style>
		</head>
	<body>
		<div id="wrapper" class="">
			<div class="fakeLoader"></div>
            <?php
            	include_once('includes/navigation.php');
			?>
			
            
            <div id="page-wrapper">
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">Wallet </h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Wallet </li>
						</ol>
					</div>
				</div>
                
                <input type="hidden" id="baseURL" value="<?=base_url()?>">
                <input type="hidden" id="user_id" value="<?= $this->session->userdata('userId') ?>">
                <input type="hidden" id="btc_avail" value="<?= $btcAvail ?>">
                <input type="hidden" id="eth_avail" value="<?= $ethAvail ?>">

    
<?php
		$fetchBtc = file_get_contents("https://api.blockcypher.com/v1/btc/main/addrs/$btc/full?limit=50");
		$decodedBtc = json_decode($fetchBtc,true);
		$fetchEth = file_get_contents("https://api.blockcypher.com/v1/eth/main/addrs/$eth");
		$decodedEth = json_decode($fetchEth,true);
?> 
				
				<div class="container-fluid">
                
                
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="widget gradient-widget">
								<div class="widget-caption gradient-danger">
									<div class="gradient-icon gr-icon-danger">
										<i class="icon fa fa-btc"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h4 style="color:#fff;font-weight:600"><?php if($btcAvail==0){echo '0.000000';}else{ echo number_format($btcAvail,8);} ?></h4>
											<span>BTC Balance</span>
										</div>
										<a href="javascript:;" class="gr-btn" data-toggle="modal" data-target="#modal-btc">Deposit</a>
                                        <a href="javascript:;" class="gr-btn withdraw" title="View More" id="BTC">Withdraw</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget gradient-widget">
								<div class="widget-caption gradient-info">
									<div class="gradient-icon gr-icon-info">
										<i class="icon fa fa-unsorted"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h4 style="color:#fff;font-weight:600"><?php if($ethAvail==0){echo '0.000000';}else{ echo number_format($ethAvail,16);} ?></h4 >
							   				<span>ETH Balance</span>
										</div>
										<a href="javascript:;" class="gr-btn" data-toggle="modal" data-target="#modal-eth">Deposit</a>
                                        <a href="javascript:;" class="gr-btn withdraw" title="View More" id="ETH">Withdraw</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget gradient-widget">
								<div class="widget-caption gradient-purple">
									<div class="gradient-icon gr-icon-purple">
										<i class="icon icon-basket"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h4 style="color:#fff;font-weight:600">0.000000</h4>
											<span>ETN Balance</span>
										</div>
										<a href="#" class="gr-btn" onclick="swal(' Not Available At The Moment')">Deposit</a>
                                        <a href="#" class="gr-btn" onclick="swal('Not Available At The Moment')">Withdraw</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget gradient-widget">
								<div class="widget-caption gradient-success">
									<div class="gradient-icon gr-icon-success">
										<i class="icon fa fa-bank"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h4 style="color:#fff;font-weight:600" >
												<?php
                                             if(isset($lxx_bal)&& !empty($lxx_bal)){
												foreach($lxx_bal as $bal){
													echo $bal -> lxx_bal.'.000000';}}else{ echo '0.000000'; }
												?>
												</h4>
											<span>LXX Balance</span>
											</div>
										<a href="javascript:;" class="gr-btn deposit" title="View More" id="LXX">Deposit</a>
                                        <a href="javascript:;" class="gr-btn " onclick="swal('Not Available At The Moment')">Withdraw</a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				
				
				
                    
					<!-- row -->
					<div class="row">
							<div class="col-md-12 col-sm-12">
							<div class="widget default-widget">
								<div class="card-header">
									<div class="pull-right">
										<div class="btn-group">
											
										</div>
									</div>
									<h4 class="card-title m-b-0">History</h4>
								</div>
								<div class="row mrg-0">
									<div class="tab-box">
										<div class="advance-tab" role="tabpanel">
											<!-- Nav tabs -->
											<ul class="nav nav-tabs" role="tablist">
										
												<li role="presentation" class="active" ><a href="#work-flow" role="tab" data-toggle="tab"><i class="fa fa-bank"></i>BTC Deposits</a></li>
												<li role="presentation" ><a href="#work-flow2" role="tab" data-toggle="tab"><i class="fa fa-bank"></i>ETH Deposits</a></li>
												<li role="presentation" ><a href="#work-daigram" role="tab" data-toggle="tab"><i class="fa fa-send"></i>Withdrawals</a></li>
												
											
											</ul>
											<!-- Tab panes -->
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="work-flow">
													<center><h3>DEPOSIT HISTORY</h3></center>
		<!--  BEGIN OF DEPOSITS TABLE-->
		<div class="table-responsive"> 
								<table class="table table-striped" style="font-size: 10px;">
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>Transaction Hash</th>
											<!--<th>Email Address</th>-->
											<th>Status</th>
											<!--<th>Referral</th>
											<th>Referral Bonus</th>-->
										</tr>
										<?php 
										if(isset($decodedBtc['txs']) && !empty($decodedBtc['txs'])){
										$sno = 0;
											foreach ($decodedBtc['txs'] as $key ) {
												# code...
											$sno ++ ;

										?>
										<tr>
											<td><?=$sno?></td>
											<td><?php 
												$timestamp = $key['received'];
												echo date("F j, Y, g:i a",strtotime($timestamp));
												?>
											</td>
											<td><a href="https://live.blockcypher.com/btc/tx/<?=$key['hash']?>" target="_blank"><?=$key['hash']?></a></td>
											<td><?php if($key['confirmations'] < 6){ echo 'Pending'; }else{ echo 'Confirmed'; }?></td>
										<?php } }?>
										</tr>
									</table>
								</div>
				</div>
												
				<!------------------------------------------------------------------>							
												
												
					<div role="tabpanel" class="tab-pane fade" id="work-flow2">
													<center><h3>DEPOSIT HISTORY</h3></center>
		<!--  BEGIN OF DEPOSITS TABLE-->
								<div class="table-responsive"> 
								<table class="table table-striped" style="font-size: 10px;">
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>Transaction Hash</th>
											<!--<th>Email Address</th>-->
											<th>Status</th>
											<!--<th>Referral</th>
											<th>Referral Bonus</th>-->
										</tr>
										<?php 
										if(isset($decodedEth['txs']) && !empty($decodedEth['txs'])){
										$sno = 0;
											foreach ($decodedEth['txs'] as $key ) {
												# code...
											$sno ++ ;

										?>
										<tr>
											<td><?=$sno?></td>
											<td><?php 
												$timestamp = $key['received'];
												echo date("F j, Y, g:i a",strtotime($timestamp));
												?>
											</td>
											<td><a href="https://live.blockcypher.com/eth/tx/<?=$key['hash']?>" target="_blank"><?=$key['hash']?></a></td>
											<td><?php if($key['confirmations'] < 6){ echo 'Pending'; }else{ echo 'Confirmed'; }?></td>
										<?php } }?>
										</tr>
									</table>
								</div>
				</div>
												
												
<!--  END OF DEPOSITS TABLE-->
												
												
	<!--  END OF WITHDRAWAL TABLE-->											
							<div role="tabpanel" class="tab-pane fade" id="work-daigram">
								<center><h3>WITHDRAWAL HISTORY</h3></center>
														
								<?php	if(isset($withdrawals) && !empty($withdrawals)){
										$sno = 0;
									?>
									<table class="table table-striped" style="font-size: 12px;">
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>Coin Type</th>
											<th>Amount</th>
											<th>Wallet Address</th>
											<th>Status</th>
											
										</tr>
										<?php 

											foreach ($withdrawals as $key1 ) {
												# code...
											$sno ++ ;

										?>
										<tr>
											<td><?=$sno?></td>
											<td>
												<?php
											echo $key1 ->date;
												/*$date = formatDateForClient($key -> trans_date, $clientIP);
                                                        if (date('Y-m-d') == date('Y-m-d', strtotime($date))) {
                                                            echo date('g:i a', strtotime($date));
                                                        } else {
                                                            echo date('M j,Y', strtotime($date));
                                                        }*/
                                                        ?>
											</td>
											<td><?=$key1 -> coin?></td>
											<td><?=$key1 -> amount?></td>
											<td><?=$key1 -> address?></td>
											<td><?php if($key1 -> status == 0){echo "Pending"; }else {echo "Approved"; }?></td>
											
										</tr>
										<?php } ?>
									</table>
<?php }else{ ?>
			<p style="text-align:center;color:red;font-weight:600">You Have Not Made Any Withdrawal </p>
			
		<?php	} ?>
												</div>
<!--  END OF WITHDRAWAL TABLE-->
											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
			
		
			<!-- /#page-wrapper -->
			<div id="sidebar-wrapper">
				<a id="right-close-sidebar-toggle" href="#" class="theme-bg btn close-toogle toggle">
				Setting Pannel <i class="ti-close"></i></a>
				<div class="right-sidebar" id="side-scroll">
					<div class="user-box">
						<div class="profile-img">
							<img src="http://via.placeholder.com/400x400" alt="user">
							<!-- this is blinking heartbit-->
							<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
						</div>
						<div class="profile-text">
							<h4><?= $this->session->userdata('username') ?></h4>
							 <a href="#" class="user-setting"><i class="ti-settings"></i></a>
							 <a href="#" class="user-mail"><i class="ti-email"></i></a>
							 <a href="#" class="user-call"><i class="ti-headphone"></i></a>
							 <a href="<?=base_url()?>accounts/logout" class="user-logout"><i class="ti-power-off"></i></a>
						</div>
						<div class="tabbable-line">
							<ul class="nav nav-tabs ">
								<li class="active">
									<a href="#options" data-toggle="tab">
									<i class="ti-palette"></i> </a>
								</li>
								<li>
									<a href="#comments" data-toggle="tab">
									<i class="ti-bell"></i> </a>
								</li>
								<li>
									<a href="#freinds" data-toggle="tab">
									<i class="ti-comment-alt"></i> </a>
								</li>
							</ul>
							
						
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer"> © 2018 Lexxeumcoin.co </footer>
		</div>
		<!-- /#wrapper -->

		
		

<!-- Modal -->
		
		
		
<!-- MODAL FOR WITHDRAWAL-->

  <div class="modal fade" id="Modal-W" role="dialog">
    <div class="modal-dialog" >
    
    <!-- Modal content-->
      <div class="modal-content" style="background-color:#8597b9">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#fff"><span id="currencyW"></span> WITHDRAWAL </h4><br>
        </div>
    
        <!-- The text field -->
        <div align="center">
         <div class="card">
                       
			<div class="card-body">

			<form>
			  <div class="box-body">
				<div class="form-group">
				  <label for="exampleInputEmail1">Amount</label>
				  <input type="text" class="form-control" id="amountW" placeholder="Volume" required>
				  <input type="hidden" class="form-control" id="currencyWV" name="type" >
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Wallet Address</label>
				  <input type="text" class="form-control" id="addrW" placeholder="Destination Wallet Address" required>
					<p class="help-block">Please verify the destination wallet address.</p>
				</div>

			  </div>
			  <!-- /.box-body -->

			  <div class="box-footer">
				<button id="cashout" type="submit" class="btn btn-primary">Submit</button>
			  </div>
			</form>

			</div>

	  </div>
		 </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>        
	  
	  
	  
	  
	  
	 
	  

	  
	  
<!-- MODAL FOR BTC DEPOSIT-->


	
		
<div class="modal fade" id="modal-btc" role="dialog">
     <div class="modal-dialog" >


        <!-- Modal content-->
        <div class="modal-content" style="background-color:#8597b9">
            <div class="modal-header" >

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#fff">BTC Deposit </h4><br><br>
                <div class="row" >
                    <br>
                </div>
                
                <div align="center">
				
                    <p style="color:green;font-weight:800">Your Secure BTC Wallet Address </p>

                    <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?=$btc?>&chld=H"  /></p>
<input style="padding:5px;border-radius:5px;width:75%;text-align:center" type="text" value="<?=$btc?>"  id="myInput2"  readonly>
<button id="copyAddress2" class="btn btn-primary" style="width:15%;">Copy </button>
                    <!-- The button used to copy the text -->
                    <br/> <br/> 

                </div><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
      
    </div>
		

		
		
<!-- MODAL FOR ETH DEPOSIT-->

  <div class="modal fade" id="modal-eth" role="dialog">
     <div class="modal-dialog" >


        <!-- Modal content-->
        <div class="modal-content" style="background-color:#8597b9">
            <div class="modal-header" >

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#fff">ETH Deposit </h4><br><br>
                <div class="row" >
                    <br>
                </div>
                
                <div align="center">
				
                    <p style="color:green;font-weight:800">Your Secure ETH Wallet Address </p>

                    <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?=$eth?>&chld=H"  /></p>
<input style="padding:5px;border-radius:5px;width:80%;text-align:center" type="text" value="<?=$eth?>"  id="myInput1"  readonly>
<button id="copyAddress" class="btn btn-primary" style="width:15%;">Copy </button>
                    <!-- The button used to copy the text -->
                    <br/> <br/> 

                </div><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
      
    </div>
		
		
		
		
		
		
<!-- MODAL FOR TRANSACTION ID-->


	
		
<div class="modal fade" id="Modal-T" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:#8597b9">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#fff">TRANSACTION HASH ID</h4><br>
        </div>
    
        <!-- The text field -->
        <div align="center"><br>

        <p><span style="font-weight:bolder; color:#fff;">Enter Hash Id</p>
			<input style="padding:5px;border-radius:5px;width:65%;" type="text" value=""  id="enter_amt">
 <br/> <br>

		 </div>
		  <div class="modal-footer">
          <button id="hashId" type="button" class="btn btn-sm btn-primary" style=" border-radius: 50px; padding:10px 50px;"> SUBMIT </button>
        </div>
       
      </div>
      
    </div>
</div>  	
	  

	  
                                  <!--         End Modal Here -->	
		
	

        <?php 
			include_once('includes/js-links.php');
		?>
		
<script>
		
	/*$('a.deposit').click(function() {
	var type = $(this).attr('id');
	$("#currency").text(type);
    $('#Modal-A').modal('show');
});*/
	
	

// WITHDRAWAL	
	
$('a.withdraw').click(function() {
    var type = $(this).attr('id');
	$("#currencyW").text(type);
	$("#currencyWV").val(type);
    $('#Modal-W').modal('show');
});

	
$('#cashout').click(function() {
//$('#Modal-A').modal('hide');
	$("#Modal-W .close").click();
  	var amt = $('#amountW').val();
	var addr = $('#addrW').val();
	var uId = $('#user_id').val();
	var type = $('#currencyWV').val();
    var url = $('#baseURL').val()+"Withdraw";
	var btcBal = $("#btc_avail").val();
	var ethBal = $("#eth_avail").val();
	if(amt=='' && addr==''){
		alert('Complete All Fields ');
		return false;
	}else if(type == 'BTC'){
		if(parseFloat(amt) > btcBal){
			swal("Your BTC Wallet Balance is " + btcBal + "\n Enter equal or lower amount");
			return false;
		}
	}else if(type == 'ETH'){
		if(parseFloat(amt) > ethBal){
			swal("Your ETH Wallet Balance is " + ethBal + "\n Enter equal or lower amount");
			return false;
		}
	}
	$.ajax({
		url: url,
		data: {amt:amt,addr:addr,uId:uId,type:type},
		type:"POST",
		dataType:"json",
		success:function(rData){
			if(rData != false){
				swal("Submitted Successfully: " + rData.Ctype);
			}else{
				swal("Something went wrong while processing your LXX check your Available Balance, And try again");
				return false;
			}
			 //address= rData.Addr;
			//alert("Submitted Successfully: " + rData.Ctype);
			$("#amountW").val('');
			$("#addrW").val('');
			//$("#Modal-W .close").click();
		},
		error:function(xhr,status,error){
			alert("Error Encountered: "+error);
		}
	});
	
	
});	
	
	
	
	
	
	
	
	
$("#copyAddress").click(function(){
	copyText("myInput1");						  
});

	
$("#copyAddress2").click(function(){
	copyText("myInput2");						  
});

function copyText(source){
	$("#"+source).select();
	document.execCommand("Copy");

}	
	

</script>
		</body>
</html>
