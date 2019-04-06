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
						<h3 class="text-themecolor">Affiliates </h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Affiliates </li>
						</ol>
					</div>
				</div>
                
                
                
                
                
				<div class="container-fluid">
                
                
                <div class="row">
						<div class="col-md-3 col-sm-4">
							<div class="widget gradient-widget">
								<div class="widget-caption info">
									<div class="gradient-icon info">
										<i class="fa fa-try"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3><?php 
				 if(isset($affiliatesSum)&& !empty($affiliatesSum)){
										foreach ($affiliatesSum as $key ) {

											$bonus=0.05*$key -> lxx_main_bal;
												echo ceil($bonus).'.000';
										 } }else{
											echo '0.000';
										}
												?></h3>
												<span>Total Referral Bonus </span>
										</div>
									
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<div class="widget gradient-widget">
								<div class="widget-caption info">
									<div class="gradient-icon info">
										<i class="fa fa-users"></i>
									</div>
									<div class="gradient-detail">
										<div class="widget-detail">
											<h3><?php if(isset($count)){ echo number_format($count); }else{ echo '0';} ?></h3>
												<span>Referrals</span>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					
					<!-- /row -->
                    
                    <!-------My o button --->
                   
                        <!-----alert warning ---->
                         <div class=" col-md-7 col-sm-6">
								<input style="margin-top:60px;padding:10px;border-radius:7px;border:0px;text-align:center;color:#333;font-weight:800" type="text" value="<?= 'https://www.luxxeum.co/accounts/register?ref='. $this->session->userdata('username') ?>" id="myInputs" class="url_value" size="50" readonly><br><br>
								<button  class="btn btn-primary btn-sm" onclick="myFunction()" onmouseout="outFunc()">
								  <span class="tooltiptext" id="myTooltip">Copy Referral Link</span>
								 </button>
						</div>  
					
                       <!------END WARNING ALERT--->                                    
					</div>
                  
                    <!-----End my button ---->
                    
               
					
            
                    
					<!-- row -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="widget list-widget">
								<div class="card-header">
									<div class="pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<i class="ti-more"></i>
											</button>
											
										</div>
									</div>
									<h4 class="card-title m-b-0">Your Affiliates </h4>
								</div>
								<div class="row mrg-0">
									<div class="col-md-12">
									<?php
									if(isset($affiliates) && !empty($affiliates)){
										$sno = 0;
									?>
									<table class="table table-striped" style="font-size: 10px;">
										<tr>
											<th>#</th>
											<th>Username</th>
											<!--<th>Email Address</th>-->
											<th>Full Name</th>
											<th>Referral</th>
											<th>Referral Bonus</th>
										</tr>
										<?php 

											foreach ($affiliates as $key ) {
												# code...
											$sno ++ ;

										?>
										<tr>
											<td><?=$sno?></td>
											<td><?=$key -> username?></td>
											<!--<td><?=$key -> email?></td>-->
											<td><?=$key -> full_name?></td>
											<td><?=$key -> referral?></td>
											<td><?php
											$bonus=0.05*$key -> lxx_main_bal;
												echo ceil($bonus)
												?></td>
										<?php } ?>
									</table>

									<?php }else{ ?>
			<p style="text-align:center;color:red;font-weight:800">You Have No Affiliates Yet</p>
			
		<?php	} ?>
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
