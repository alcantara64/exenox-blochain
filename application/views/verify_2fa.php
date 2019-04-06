<!DOCTYPE html>
<html lang="en">
	<head>
	<script src='https://www.google.com/recaptcha/api.js'></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>LuxxeumCoin | 2FA Verification</title>
        <?php
        	include_once('includes/css-links.php');
		?>
		
			
		
		</head>
	<body background="<?=base_url();?>assets/img/signin.jpg">
    <div class="container" style="opacity:0.9">
    	<?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error1');
                if ($error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $error; ?>                    
                    </div>
                    <?php } ?>
                
                
                
                
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Enter 2FA Verification Code</h3>
						</div>
						<div class="panel-body">					
							<img src="<?=base_url();?>assets/img/sign-logo.png" class="img-responsive" alt=""/>
							<form method="post" action="<?=base_url()?>accounts/verify">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Enter The 6 Digit Code" name="code" type="text" autofocus>
									</div>
									
									<!-- Change this to a button or input when using this as a form -->
									<button class="btn btn-login">Verify</button>
								
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
