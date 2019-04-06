<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>LuxxeumCoin</title>
        <?php
        	include_once('includes/css-links.php');
		?>
		<style type="text/css">
			.selected-coin{
				background-color: #1194f7;
				color: #fff;
			}
			
			
					#search{
		padding:15px;
		border-radius:10px;
		border:0px
		}
		
		
	.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 140px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    margin-left: -75px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
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
						<h3 class="text-themecolor">BTC Wallet </h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">BTC Wallet </li>
						</ol>
					</div>
				</div>
                
                
<?php
		$fetchPosts = file_get_contents("https://api.blockcypher.com/v1/btc/main/addrs/$addr/full?limit=50");
		$decodedPosts = json_decode($fetchPosts,true);
?> 
                
                
				<div class="container-fluid">
                
                
                <div class="row">
						<div class="col-md-3 col-sm-3">
							<div class="widget gradient-widget">
								<div class="widget-caption info">
									<div class="gradient-icon info">
										<i class="fa fa-btc"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3><?php if($decodedPosts['total_received']==0){echo '0.0';}else{ echo $decodedPosts['total_received']/100000000;} ?></h3>
												<span>BTC Balance </span>
										</div>
									
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="widget gradient-widget">
								<div class="widget-caption info">
									<div class="gradient-icon info">
										<i class="fa fa-users"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3><?php if($decodedPosts['unconfirmed_balance']==0){echo '0.0';}else{ echo $decodedPosts['unconfirmed_balance']/100000000;} ?></h3>
												<span>Pending Deposit</span>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					
					<!--<div class="col-md-3 col-sm-3">
							<div class="widget gradient-widget">
								<div class="widget-caption info">
									<div class="gradient-icon info">
										<i class="fa fa-users"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3>0.00</h3>
												<span>Pending Transactions</span>
										</div>
										
									</div>
								</div>
							</div>
						</div>-->
					
					<div class="col-md-3 col-sm-3">
							<div class="widget gradient-widget">
								<div class="widget-caption info">
									<div class="gradient-icon info">
										<i class="fa fa-users"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3><?= $decodedPosts['n_tx']; ?></h3>
												<span>Total Transactions</span>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					
					<!-- /row -->
                    
                    <!-------My o button --->
                   
                        <!-----alert warning ---->
                         <div class=" col-md-2 col-sm-3">
								
								<button  class="btn btn-primary btn-sm" onClick="window.location.reload()">
								  <span class="tooltiptext" id="myTooltip">Refresh Wallet</span>
								 </button>
						</div>  
					
                       <!------END WARNING ALERT--->                                    
					</div>
                  
                    <!-----End my button ---->
                    
               
					
            
                    
					<!-- row -->
					<div class="row">
						
					 <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title m-b-0">BTC Deposit</h4>
                                    </div>
                                    <div class="card-body">

								<div align="center">
					
							<p style="color:green;font-weight:800">Your Secure BTC Wallet Address </p>
								<p><img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?=$addr?>&chld=H"  /></p>
							<input style="padding:5px;border-radius:5px;width:80%;text-align:center" type="text" value="<?=$addr?>"  id="secretCode"  readonly><br><br>

					
                </div>
								
								</div>
							</div>
						</div>
					
					 <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title m-b-0">BTC Withdraw</h4>
                                    </div>
                                    <div class="card-body">

									<form>
									  <div class="box-body">
										<div class="form-group">
										  <label for="exampleInputEmail1">Amount</label>
										  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Volume" required>
										</div>
										<div class="form-group">
										  <label for="exampleInputPassword1">Wallet Address</label>
										  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Destination Wallet Address" required>
											<p class="help-block">Please verify the destination wallet address.</p>
										</div>
										
									  </div>
									  <!-- /.box-body -->

									  <div class="box-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
									  </div>
									</form>
								      
                                    </div>
                                   
                              </div>
                      </div>
						
			
			
			</div>
					
					
					
					
					<div class="row">
							<div class="col-md-12 col-sm-12">
							<div class="widget default-widget">
								<div class="card-header">
									<div class="pull-right">
										<div class="btn-group">
											
										</div>
									</div>
									<h4 class="card-title m-b-0">Transactions History</h4>
								</div>
								<div class="row mrg-0">
									<div class="tab-box">
										<div class="advance-tab" role="tabpanel">
											<!-- Nav tabs -->
											<ul class="nav nav-tabs" role="tablist">
										
												<li role="presentation" class="active" ><a href="#work-flow" role="tab" data-toggle="tab"><i class="fa fa-bank"></i>Deposits</a></li>
												<li role="presentation" ><a href="#work-daigram" role="tab" data-toggle="tab"><i class="fa fa-send"></i>Withdraws</a></li>
												
											
											</ul>
											<!-- Tab panes -->
		<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="work-flow">
						<center><h3>DEPOSIT HISTORY</h3></center>
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
										if(isset($decodedPosts['txs']) && !empty($decodedPosts['txs'])){
										$sno = 0;
											foreach ($decodedPosts['txs'] as $key ) {
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
			
			<!--WITHDRAWAL HISTORY-->
			
		<div role="tabpanel" class="tab-pane fade" id="work-daigram">
						<center><h3>WITHDRAWAL HISTORY</h3></center>
			<div class="table-responsive"> 
								<table class="table table-striped" style="font-size: 10px;">
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>Amount</th>
											<th>Wallet Address</th>
											<th>Status</th>
											<!--<th>Referral</th>
											<th>Referral Bonus</th>-->
										</tr>
										<?php 
										if(isset($decodedPosts['txs']) && !empty($decodedPosts['txs'])){
										$sno = 0;
											foreach ($decodedPosts['txs'] as $key ) {
												# code...
											$sno ++ ;

										?>
										
										<?php } }?>
									</table>
			</div>
								</div>
						</div>
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
							<img src="https://luxxeum.co/assets/img/sign-logo.png" alt="user">
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
			<footer class="footer"> © 2018 Luxxeum.co </footer>
		</div>
		<!-- /#wrapper -->
</div>


                                        
                                        
  <script>
function myFunction() {
  var copyText = document.getElementById("myInputs");
  copyText.select();
  document.execCommand("Copy");
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied " ;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy Referral Link";
}
</script>                                      <!--         End Modal Here -->	


        <?php 
			include_once('includes/js-links.php');
		?>

		</body>
</html>
