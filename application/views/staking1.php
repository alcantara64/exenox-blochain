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
                	<div class="col-lg-10 col-md-10 col-sm-10">
							<div class="card">
								<h2 style="color:#fff;font-weight:800;padding:15px">Under Construction ....</h2>
							</div>	
						</div>  
                
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
                                             if(isset($lxx_bal)&& !empty($lxx_bal)){
												foreach($lxx_bal as $bal){
													echo $bal -> lxx_bal.'.000000';}}else{ echo '0.000000'; }
												?>
												</h3>
											<span>LXX Balance</span>
											</div>
                                        <a href="javascript:;" class="gr-btn withdraw" title="Stake" >Stake</a>
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
											<h3>0.000000</h3>
											<span>Amount Staked</span>
										</div>
										<a href="javascript:;" class="gr-btn withdraw" title="View More"  style="visibility:hidden">|-------|</a>
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
											<h3>0.000000</h3>
											<span>Accrued Interest</span>
										</div>
                                        <a href="javascript:;" class="gr-btn withdraw" title="Withdraw To Address" >Withdraw</a>
                                        <a href="javascript:;" class="gr-btn withdraw" title="Buy LXX" >Buy LXX</a>
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
											<h3>0.000000</h3>
											<span>Total Paid Out</span>
										</div>
										<a href="javascript:;" class="gr-btn deposit" title="View More"  style="visibility:hidden">|--------|</a>
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
			<footer class="footer"> © 2018 Luxxeum.co </footer>
			</div>
			
		<!-- /#wrapper -->



                                        


        <?php 
			include_once('includes/js-links.php');
		?>

		</body>
</html>
