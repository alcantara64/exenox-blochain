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
        <?php
        	include_once('includes/css-links.php');
		?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		</head>
	<body background="<?=base_url();?>assets/img/signin.jpg">
    <div class="container" style="opacity:0.7">
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
							<h3 class="panel-title">Password Reset</h3>
						</div>
						<div class="panel-body">					
							
							<img src="<?=base_url();?>assets/img/sign-logo.png" class="img-responsive" alt="" style="width:150px; height:150px;"/>
							<form method="post" action="<?=base_url()?>accounts/preset1/<?=$resetLink?>">
								<fieldset>
									<div class="form-group">
										<input class="form-control" name="email" type="hidden" value="<?=$email?>">
										
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="password" type="password" value="" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Confirm Password" name="cpassword" type="password" value="">
									</div>
									<div align="center" class="g-recaptcha" data-sitekey="6LcrcTwUAAAAAGe5dvgbqUZpUsU4or8xMx21KUxh"></div><br/>
									<!-- Change this to a button or input when using this as a form -->
									<button class="btn btn-login">Submit</button>
									<p style="text-align: center;">Not Registered? <a href="<?=base_url();?>accounts/register">Sign Up </a></p>
									<p style="text-align: center;"><a href="<?=base_url();?>accounts/login">Return & Login </a></p>
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
    
    
        
</html>
