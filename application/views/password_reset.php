<!DOCTYPE html>
<html>
	<head>
		<title>EXENOX || PASSWORD RESET</title>
		<meta charset="utf-8">
		<meta content="ie=edge" http-equiv="x-ua-compatible">
		<meta content="cryptocurrency" name="keywords">
		<meta content="exenox" name="author">
		<meta content="EXENOX" name="description">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<link href="favicon.png" rel="shortcut icon">
		<link href="apple-touch-icon.png" rel="apple-touch-icon">
		<link href="../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>asset/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/css/maince5a.css?version=4.4.1" rel="stylesheet">
		
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body class="auth-wrapper" style="background-image: url(<?php echo base_url();?>asset/img/blockchainimg-556.jpg); background-size: 100%;" >
		<div class="all-wrapper menu-side with-pattern" >
			
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
                
			
			
			<div class="auth-box-w">
				<div class="logo-w"><a href="">
					<img alt="" src="img/logo-big.png"></a>
				</div>
				<h4 class="auth-header">Password Reset</h4>
				<form method="post" action="<?=base_url()?>accounts/preset">
					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" placeholder="Email" name="email" type="email" autofocus required>
						<div class="pre-icon os-icon os-icon-mail"></div>
					</div>
					
					<div class="buttons-w">
						<button class="btn btn-primary">Reset</button>
					
					</div>
					<br>
				<p style="text-align: center;">Not Registered? <a href="<?=base_url();?>accounts/register">Sign Up </a></p>
				<p style="text-align: center;"><a href="<?=base_url();?>accounts/login">Login </a></p>
				

				</form>
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
