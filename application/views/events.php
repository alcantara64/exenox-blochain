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
						<h3 class="text-themecolor">Events </h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Events </li>
						</ol>
					</div>
				</div>
                
                
                
                
                
				<div class="container-fluid">
                
                
                
					<!-- /row -->
                    
                    <!-------My o button --->
                   
                        <!-----alert warning ---->
                        <!-- <div class="col-lg-8 col-md-8 col-sm-8">
							<div class="card" >
								
								
							</div>
						</div>  
						<div class="col-lg-2 col-md-2 col-sm-2">
							<div class="card">
								
							</div>
						</div>  -->
                       <!------END WARNING ALERT--->                                    
					</div>
                    
                    <!-----End my button ---->
                    
               
					
            
                    
					<!-- row -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<!--<div class="widget list-widget">
								<div class="card-header">
									<div class="pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<i class="ti-more"></i>
											</button>
											
										</div>
									</div>
									<h4 class="card-title m-b-0">SOMETHING EXCITING COMING UP HERE</h4>
								</div>
								<div class="row mrg-0">
									<div class="col-md-12">
								
								</div>
								</div>
								</div>-->
								
								
								
								
								<h2 style="color:#fff;font-weight:800;padding:15px"> Under Construction ....Coming Soon</h2>
							
								<!--- 
								
							<img src="<?=base_url();?>assets/img/under-construction.jpg" class="img-responsive" alt="Events" style="height:400px;width:80%" /> --->
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



                                        


        <?php 
			include_once('includes/js-links.php');
		?>

		</body>
</html>
