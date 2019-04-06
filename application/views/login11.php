<!DOCTYPE html>
<html lang="en">
	<head>
	<script src='https://www.google.com/recaptcha/api.js'></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>LuxxeumCoin | Login</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <?php
        	include_once('includes/css-links.php');
		?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		
			
		
		</head>
	<body background="<?=base_url();?>assets/img/signin.jpg">
    <div class="container" style="opacity:0.9">
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
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Please Sign In</h3>
						</div>
						<div class="panel-body">					
							
							<img src="<?=base_url();?>assets/img/sign-logo.png" class="img-responsive" alt=""/>
							<form method="post" action="<?=base_url()?>accounts/plogin">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Username/Email" name="username" type="text" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="password" type="password" value="">
									</div>
									<div class="checkboxs">
										<span class="custom-checkbox">
											<input type="checkbox" id="checkbox1" name="options[]" value="1">
											<label for="checkbox1"></label>Remember Me
										</span>
									</div>
									<div align="center" class="g-recaptcha" data-sitekey="6LcrcTwUAAAAAGe5dvgbqUZpUsU4or8xMx21KUxh"></div><br/>
									<!-- Change this to a button or input when using this as a form -->
									<button class="btn btn-login">Login</button><br>
									<p style="text-align: center;">Not Registered? <a href="<?=base_url();?>accounts/register">Sign Up </a></p>
									<p style="text-align: center;">Forgot Password? <a href="<?=base_url();?>accounts/resetpassword">Reset </a></p>
									<p style="text-align: center;font-weight:800"><?php if(isset($reg_count)){  echo 'Active Registered Users : '.number_format($reg_count); }?></p>
<p style="margin-top: 0.2em; text-align: center; font-size: 42px"><span style="font-size: 22px">Our Community Links</span> <br>
<a href="https://t.me/lxxglobal" target="_blank"><i class="fab fa-telegram"></i></a>
<a href="https://instagram.com/luxxeumcoin" target="_blank"><i class="fab fa-instagram"></i></a>
<a href="https://twitter.com/luxxeumcoin" target="_blank"><i class="fab fa-twitter-square"></i></a>
</p>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-10">
						<div style="margin-top: 40%;">
							<p>
						      <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>

						    </p>
						</div>
					</div>
			</div>
		</div>

    </body>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ac64059d7591465c70939cd/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>    
    
        
</html>
