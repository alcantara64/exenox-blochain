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
		
		<link rel='stylesheet' href='<?php echo base_url();?>assets/css/datatables/datatables.css'>
		<link rel='stylesheet' href='<?php echo base_url();?>assets/css/datatables/bootstrap.datatables.css'>
		
		
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.css'>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.all.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.js"></script>
		
		
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
						<h3 class="text-themecolor">Staking </h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Staking </li>
						</ol>
					</div>
				</div>
                
                
                
				<div class="container-fluid">
               
					
					<?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $error; ?>                    
                    </div>
                    <?php
                }
                $success = $this->session->flashdata('success');
                if ($success) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $success; ?>                    
                    </div>
                <?php } ?>
					
					
					
					
					
                
                <div class="row">
					<div class="col-md-3 col-sm-6">
							<div class="widget gradient-widget">
								<div class="widget-caption gradient-success">
									<div class="gradient-icon gr-icon-success">
										<i class="icon fa fa-try"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3 >
												<?php
                                             if(isset($lxx_account)&& !empty($lxx_account)){
												foreach($lxx_account as $bal){
													$newbal1= $bal -> lxx_bal;}}else{ $newbal1='0'; }
												?>
												<?= $newbal1.'.000000' ?>
												</h3>
											<span>LXX Balance</span>
											</div>
                                        <a href="javascript:;" id="<?= $newbal1 ?>" class="gr-btn stake"  title="View More" >Stake</a>
										</div>
										
									</div>
								</div>
							</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget gradient-widget">
								<div class="widget-caption gradient-danger">
									<div class="gradient-icon gr-icon-danger">
										<i class="icon fa fa-dollar"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3>
												<?php
                                             if(isset($lxx_account)&& !empty($lxx_account)){
												foreach($lxx_account as $bal){
													$newbal2= $bal -> stake_bal;}}else{ $newbal2='0'; }
												?>
												<?= $newbal2.'.000000' ?>
											</h3>
											<span>Amount Staked</span>
										</div>
										<a href="javascript:;" class="gr-btn withdraw" title="View More" id="ETH" style="visibility:hidden">|-------|</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget gradient-widget">
								<div class="widget-caption gradient-info">
									<div class="gradient-icon gr-icon-info">
										<i class="icon fa fa-dollar"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3>
												<?php
                                             if(isset($lxx_account)&& !empty($lxx_account)){
												foreach($lxx_account as $bal){
													$newbal3= $bal -> stake_interest;}}else{ $newbal3='0'; }
												?>
												<?= $newbal3 ?>
											</h3>
											<span>Accrued Interest</span>
										</div>
										<input type="hidden" id="withDraw" value="<?= $newbal3 ?>">
                                        <a href="" class="gr-btn"  data-toggle="modal" data-target="#Modal-SW">Withdraw</a>
                                        <a href="#" class="gr-btn"  data-toggle="modal" data-target="#Modal-TK" >Buy Lxx</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget gradient-widget">
								<div class="widget-caption gradient-purple">
									<div class="gradient-icon gr-icon-purple">
										<i class="icon fa fa-dollar"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3>
												<?php
                                             if(isset($lxx_account)&& !empty($lxx_account)){
												foreach($lxx_account as $bal){
													$newbal4= $bal -> stake_paidout;}}else{ $newbal4='0'; }
												?>
												<?= $newbal4 ?>
											</h3>
											<span>Total Paid Out</span>
										</div>
										<a href="javascript:;" class="gr-btn deposit" title="View More" id="ETN" style="visibility:hidden">|--------|</a>
									</div>
								</div>
							</div>
						</div>
						
						</div>                                
                    
                    <!-----End my button ---->
                    
            
			
					<!-- /row -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<div class="pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<i class="ti-more"></i>
											</button>
											
										</div>
									</div>
									<h4 class="card-title m-b-0">Staking</h4>
								</div>
								
								<div class="card-body">
									<div class="table-responsive"> 
										<table class="table table-striped table-hover" style="font-size:15px;font-weight:bold;">
											<thead>
												<tr>
													<th>Plan</th>
													<th>Amount</th>
													<th>Interest</th>
													<th>Minimum</th>
												</tr>
											</thead>
											
											<tbody>
												<tr>
													<td>1</td>
													<td>$50 - $1,000</td>
													<td>0.34%</td>
													<td>7 Days</td>
												
												</tr>
												
												<tr>
													<td>2</td>
													<td>$1,001 - $5,000</td>
													<td>0.42%</td>
													<td>7 Days</td>
												
												</tr>
												<tr>
													<td>3</td>
													<td>$5,001 - $10,000</td>
													<td>0.50%</td>
													<td>7 Days</td>
												
												</tr>
												<tr>
													<td>4</td>
													<td>$10,001 - $100,000</td>
													<td>0.60%</td>
													<td>7 Days</td>
												
												</tr>
												
												
											</tbody>
										</table>
									</div>
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
									<h4 class="card-title m-b-0">Stakings</h4>
								</div>
								<div class="row mrg-0">
									<div class="tab-box">
										<div class="advance-tab" role="tabpanel">
											<!-- Nav tabs -->
											<ul class="nav nav-tabs" role="tablist">
										
												<li role="presentation" class="active" ><a href="#work-earn" role="tab" data-toggle="tab"><i class="fa fa-money"></i>Earnings</a></li>
												<li role="presentation"><a href="#work-flow" role="tab" data-toggle="tab"><i class="fa fa-bank"></i>Stakings</a></li>
												<li role="presentation" ><a href="#work-daigram" role="tab" data-toggle="tab"><i class="fa fa-send"></i>Withdraws</a></li>
												
											
											</ul>
											<!-- Tab panes -->
											<div class="tab-content">
												
												
												
												<div role="tabpanel" class="tab-pane fade in active" id="work-earn">
													<!--<center><h3>EARNING HISTORY</h3></center>-->
		<!--  BEGIN OF EARNING TABLE-->
									
									<div class="table-responsive"> 
									<table class="table table-striped datatable" style="font-size: 12px;">
									<thead>
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>Amount</th>
											<th>Interest</th>
											<th>Daily Profit</th>
											<th>Day(s)</th>
											<!--<th>Release Date</th>
											<th>Status</th>-->
										</tr>
									</thead>
									<tbody>
								<?php
									if(isset($stake_earn) && !empty($stake_earn)){
										$sno = 0;
								

											foreach ($stake_earn as $key ) {
												# code...
											$sno ++ ;

										?>
										<tr>
											<td><?=$sno?></td>
											<td> <?=$key -> date_e ?></td>
											<td>$ <?=$key -> amount?></td>
											<td><?=$key -> interest?></td>
											<td>$ <?=$key -> daily ?></td>
											<td><?=$key -> days_left?></td>
											<!--td><?=$key -> release_date?></td>
											<td><?php if($key -> status == 0){echo "Running"; }else {echo "Completed"; }?></td>-->
										</tr>
									
										<?php } }?>
										</tbody>
									</table>
	
								</div>
												</div>				
	<!--- END OF EARNINGS --->											
												
												
												
												
												

			<div role="tabpanel" class="tab-pane fade " id="work-flow">
		<!--  BEGIN OF DEPOSITS TABLE-->
									
				<div class="table-responsive"> 
									<table class="table table-striped " style="font-size: 12px;">
									<thead>
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>Amount</th>
											<th>Interest</th>
											<th>ROI</th>
											<th>Day(s)</th>
											<th>Status</th>
										</tr>
										</thead>
									<tbody>
									<?php
									if(isset($deposits) && !empty($deposits)){
										$sno = 0;
									
											foreach ($deposits as $key ) {
												# code...
											$sno ++ ;

										?>
									
										<tr>
											<td><?=$sno?></td>
											<td> <?=$key -> stake_date?></td>
											<td>$ <?=$key -> amount?></td>
											<td><?=$key -> interest?></td>
											<td>$ <?=$key -> roi ?></td>
											<td><?=$key -> day?> / 7</td>
											<td><?php if($key -> status == 0){echo "Running"; }else {echo "Completed"; }?></td>
										</tr>
							
								<?php } }else{ ?>
			<p style="text-align:center;color:red;font-weight:600">You Have Not Staked On Any Plan </p>
			
		<?php	} ?>
					</tbody>					
									</table>
	
								</div>
													</div>					
												
<!--  END OF DEPOSITS TABLE-->
												
												
	<!--  END OF WITHDRAWAL TABLE-->											
							<div role="tabpanel" class="tab-pane fade" id="work-daigram">
														
								
								<div class="table-responsive"> 
									<table class="table table-striped " style="font-size: 12px;">
									<thead>
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>Amount</th>
											<th>Coin Type</th>
											<th>Wallet Address</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
									<?php	if(isset($withdrawals) && !empty($withdrawals)){
										$sno = 0;
								
											foreach ($withdrawals as $key1 ) {
												# code...
											$sno ++ ;

										?>
										<tr>
											<td><?=$sno?></td>
											<td><?=$key1 -> withdraw_date?></td>
											<td>$ <?=$key1 -> amount?></td>
											<td><?=$key1 -> coin?></td>
											<td><?=$key1 -> wallet_addr?></td>
											<td><?php if($key1 -> status == 0){echo "Pending"; }else {echo "Approved"; }?></td>
											
										</tr>
									<?php } }else{ ?>
			<p style="text-align:center;color:red;font-weight:600">You Have Not Made Any Withdrawal </p>
			
		<?php	} ?>
									</tbody>
									</table>

												</div>
<!--  END OF WITHDRAWAL TABLE-->
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
			<footer class="footer"> © 2018 Luxxeumcoin.co </footer>
			</div>
			
		<!-- /#wrapper -->
		
<!-- MODAL FOR WITHDRAWAL-->

  <div class="modal fade" id="Modal-SW" role="dialog">
    <div class="modal-dialog" >
    
    <!-- Modal content-->
      <div class="modal-content" style="background-color:#8597b9">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#fff">STAKING WITHDRAWAL </h4><br>
        </div>
    
        <!-- The text field -->
	<form action="<?=base_url()?>stakeWithdraw" method="POST" id="stake_w">
        <div align="center"><br><br>
        <p><label style="width:20%;color:#fff;font-weight:bolder;">Amount</label></p>
			<input type="number" step="any" value=""  id="amountW" style="width:65%;padding:5px;border-radius:5px" name="amount" required>
			<input type="hidden" value="" name="time1" id="time">
			
		<p><label style="width:20%;color:#fff;font-weight:bolder;">Coin Type</label></p>
			<select style="width:65%;padding:5px;border-radius:5px" name="coin" required id="coin">
				<option value="">Select Coin Type</option>
				<option value="BTC">BTC</option>
				<option value="ETH">ETH</option>
				<option value="LXX">LXX</option>
			</select>
        <p><span style="font-weight:bolder; color:#fff;"><span id="payTo"></span> Wallet Address</span> </p>
			<input style="padding:5px;border-radius:5px;width:65%;" type="text" value=""  id="addrW" name="addr" required>
		 </div><br><br>
        <div class="modal-footer">
          <button id="cashout" type="submit" class="btn btn-sm btn-primary" style=" border-radius: 50px; padding:10px 50px;"> SUBMIT </button>
			</form>
        </div>
      </div>
      
    </div>
</div>     		
		

		
		
		
<!---  MODAL FOR LXX TOKENS ---->		

	
		
<div class="modal fade" id="Modal-TK" role="dialog">
    <div class="modal-dialog modal-sm" >
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:#8597b9">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#fff"> BUY LXX TOKENS </h4><br>
        </div>
    
        <!-- The text field -->
	<form action="<?=base_url()?>tokenBuy" method="POST" id="token">
        <div align="center"><br>
        <p><span style="font-weight:bolder; color:#fff;">Enter Amount</p>
			<input style="padding:5px;border-radius:5px;width:65%;" type="text" value=""  id="lxx_amt" name="amountl">
			<input  type="hidden" value=""  id="avail_amt">
 <br/> <br>

		 </div>
		  <div class="modal-footer">
          <button  type="submit" class="btn btn-sm btn-primary" style=" border-radius: 50px; padding:10px 50px;"> BUY </button>
        </div>
		  </form> 
      </div>
      
    </div>
</div>  				

		
		
		
		
		
		
		
		
		
		

<!---  MODAL FOR STAKE ---->		

	
		
<div class="modal fade" id="Modal-A" role="dialog">
    <div class="modal-dialog modal-sm" >
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:#8597b9">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#fff"> STAKE </h4><br>
        </div>
    
        <!-- The text field -->
        <div align="center"><br>

        <p><span style="font-weight:bolder; color:#fff;">Enter Amount</p>
			<input style="padding:5px;border-radius:5px;width:65%;" type="number" value=""  id="stake_amt">
			<input  type="hidden" value=""  id="avail_amt">
 <br/> <br>

		 </div>
		  <div class="modal-footer">
          <button id="next" type="button" class="btn btn-sm btn-primary" style=" border-radius: 50px; padding:10px 50px;"> NEXT </button>
        </div>
       
      </div>
      
    </div>
</div>  		
		
		
		
		
		
  <div class="modal fade" id="Modal-S" role="dialog">
    <div class="modal-dialog" >
    
    <!-- Modal content-->
      <div class="modal-content" style="background-color:#8597b9">
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#fff"><span id="currencyW"></span> Stake Details </h4><br>
        </div>
    <form action="<?=base_url()?>stakereg" method="POST">
        <!-- The text field -->
        <div align="center"><br><br>
        <p><label style="width:20%;color:#fff;font-weight:bolder;">Amount</label>
			<input type="text" value="" name="amount1" id="amount" style="width:35%;padding:5px;border-radius:5px;font-weight:800" readonly></p>
		
		<p><label style="width:20%;color:#fff;font-weight:bolder;">Interest Daily</label>
			<input type="text" value="" name="interest1" id="interest" style="width:35%;padding:5px;border-radius:5px;font-weight:800" readonly></p>
		
		<p><label style="width:20%;color:#fff;font-weight:bolder;">ROI After 7days</label>
			<input type="text" value="" name="roi1" id="roi" style="width:35%;padding:5px;border-radius:5px;font-weight:800" readonly></p>
			<input type="hidden" value="" name="time1" id="time" style="width:35%;padding:5px;border-radius:5px;font-weight:800" ></p>
			<input type="hidden" value="" name="daily1" id="daily" style="width:35%;padding:5px;border-radius:5px;font-weight:800" ></p>
        
		 </div><br><br>
        <div class="modal-footer">
          <button  type="submit" class="btn btn-sm btn-primary" style=" border-radius: 50px; padding:10px 50px;"> SUBMIT </button>
	</form>	
        </div>
      </div>
      
    </div>
</div>        






<!-- DATA TABLE LIB-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src='<?php echo base_url();?>assets/js/datatables/datatables.min.js'></script>
<script src='<?php echo base_url();?>assets/js/datatables/bootstrap.datatables.js'></script>	
<script src='<?php echo base_url();?>assets/js/datatables/table.js'></script>	



<script src="<?=base_url()?>assets/js/luxxeum.js">
			
			

		</script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?php echo base_url();?>assets/plugins/metisMenu/metisMenu.min.js"></script>
		
		<script src="<?php echo base_url();?>assets/plugins/slim-scroll/js/jquery.slimscroll.js"></script>



		
		<!-- FLOT CHARTS -->
		<script src="<?php echo base_url();?>assets/plugins/Flot/jquery.flot.js"></script>
		<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
		
		<script src="<?php echo base_url();?>assets/plugins/Flot/jquery.flot.resize.js"></script>
		
		<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
		<script src="<?php echo base_url();?>assets/plugins/Flot/jquery.flot.pie.js"></script>
		
		<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
		<script src="<?php echo base_url();?>assets/plugins/Flot/jquery.flot.categories.js"></script>
		
		<!-- ChartJS -->
		<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.bundle.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.js"></script>

		
		<!-- Loader JavaScript -->
		<script src="<?php echo base_url();?>assets/js/loader.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="<?php echo base_url();?>assets/js/kavach.min.js"></script>

		<!-- Custom Morrisjs JavaScript -->
		<script src="<?php echo base_url();?>assets/js/custom/chart/morris.js"></script>

		<!-- Custom Float JavaScript -->
		<script src="<?php echo base_url();?>assets/js/custom/dashboard/dashboard1.js"></script>




      

		
<script>
	
$('a.stake').click(function() {
	var type = $(this).attr('id');
	$("#avail_amt").val(type);
    $('#Modal-A').modal('show');
});

	
	
	
$('#next').click(function() {
//$('#Modal-A').modal('hide');
	
	var amt = new Number($('#avail_amt').val());
	var stake = new Number($('#stake_amt').val());
	if(stake > amt){
		alert('Your LXX Balance Is :  ' + amt + '   Enter Equal Or Lower Amount');
		return false;
	}else if(stake==''){
		alert('Amount Field Cannot Be Empty');
		return false;
	}else if(stake < 50){
		alert('Minimum Stake Amount is $50');
		return false;
	}
	$("#Modal-A .close").click();
	$("#stake_amt").val('');
	$("#amount").val(stake);
	if(stake <= new Number(1000)){
		$("#interest").val('0.34%');
		var profit = new Number(0.0034 * stake);
		$("#roi").val(profit * 7);
		$("#daily").val(profit);
	}else if(stake > new Number(1000) && stake <= new Number(5000) ){
		$("#interest").val('0.42%');
		var profit = new Number(0.0042 * stake);
		$("#roi").val(profit * 7);
		$("#daily").val(profit);
	}else if(stake > new Number(5000) && stake <= new Number(10000) ){
		$("#interest").val('0.50%');
		var profit = new Number(0.0050 * stake);
		$("#roi").val(profit * 7);
		$("#daily").val(profit);
	}else if(stake > new Number(10000) ){
		$("#interest").val('0.60%');
		var profit = new Number(0.0060 * stake);
		$("#roi").val(profit * 7);
		$("#daily").val(profit);
	}
	var timezone_offset_minutes = new Date().getTimezoneOffset();
	timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;
	$("#time").val(timezone_offset_minutes);
	 $('#Modal-S').modal('show');
	
	
	
});	


 /*WITHDRAWAL JS	*/
	
$("#stake_w").on('submit',function() {
	var avail_amt = new Number($('#withDraw').val());
	var withD_amt = new Number($('#amountW').val());
	var coin = $('#coin').val();
	if(withD_amt > avail_amt){
		swal('Your Available Balance Is :  ' + avail_amt + '   Enter Equal Or Lower Amount');
		return false;
	}else if(withD_amt==''){
		swal('Amount Field Cannot Be Empty');
		return false;
	}else if(coin=='BTC' || coin=='ETH'){
		swal(coin + '  Withdrawal Is Not Available Yet');
		return false;
	}
	var timezone_offset_minutes = new Date().getTimezoneOffset();
	timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;
	$("#time").val(timezone_offset_minutes);
});	
	

	
 /*TOKEN BUY JS	*/
	
$("#token").on('submit',function() {
	var avail_amt = new Number($('#withDraw').val());
	var withD_amt = new Number($('#lxx_amt').val());
	if(withD_amt > avail_amt){
		alert('Your Available Balance Is :  ' + avail_amt + '   Enter Equal Or Lower Amount');
		return false;
	}else if(withD_amt==''){
		alert('Amount Field Cannot Be Empty');
		return false;
	}
});	


		
</script>


		</body>
</html>
