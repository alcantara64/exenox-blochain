<!DOCTYPE html>
<html>
	<head>
		<title>EXENOX</title>
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
	</head>
	<body class="auth-wrapper" style="background-image: url(<?php echo base_url();?>asset/img/blockchainimg-556.jpg); " >
		<div class="all-wrapper menu-side with-pattern" >
			
			<?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                //var_dump($error);
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
				<h4 class="auth-header">Create An Account</h4>
				<form method="post" action="<?=base_url()?>accounts/signup">
					<div class="form-group">
						<label for="">Fullname</label>
						<input class="form-control" placeholder="Full Name" name="full_name" type="text">
						<div class="pre-icon os-icon os-icon-user-male-circle"></div>
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input class="form-control" placeholder="Username" name="username" type="text">
						<div class="pre-icon os-icon os-icon-user-male-circle"></div>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" placeholder="E-mail" name="email" type="email">
						<div class="pre-icon os-icon os-icon-mail"></div>
					</div>
					
					<div class="form-group has-feedback">
						<div class="form-group">
							<label for="">Phone</label>
							<input id="phone" type="tel" name="phone" placeholder="Phone" class="form-control sty1" >
							<div class="pre-icon os-icon os-icon-phone"></div>
						</div>
						
						<input id="phone_full" type="hidden" name="phone_full">
						<input id="iso_code" type="hidden" name="iso_code">
						<input id="country_name" type="hidden" name="country_name">
						<input id="dial_code" type="hidden" name="dial_code">
				   </div>
					
					<div class="form-group">
						<label for="">Referral</label>
						<input class="form-control" id="referral" type="text" placeholder="Referral (optional)" name="referral" value="<?php if(isset($_GET['ref'])){ echo $_GET['ref']; }else{ ''; } ?>">
						<div class="pre-icon os-icon os-icon-users"></div>
					</div>
					
					
					<div class="form-group">
						<label for="">Password</label>
						<input class="form-control" placeholder="Password" name="password" type="password">
						<div class="pre-icon os-icon os-icon-fingerprint"></div>
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input class="form-control" placeholder="Confirm Password" name="cpassword" type="password">
						<div class="pre-icon os-icon os-icon-fingerprint"></div>
					</div>
					
						<div align="center" class="g-recaptcha" data-sitekey="6LcrcTwUAAAAAGe5dvgbqUZpUsU4or8xMx21KUxh"></div><br/>
					
					<div class="buttons-w">
						<button class="btn btn-primary">Register</button>
					</div>
					<br>
					<p style="text-align: center;">Already Registered? <a href="<?=base_url();?>accounts/login">Sign In </a></p>
					<p style="text-align: center;font-weight:800"><?php if(isset($reg_count)){  echo 'Active Registered Users : '.number_format($reg_count); }?></p>
				</form>
					
				<p>
				  <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>

				</p>
			</div>
		</div>
	</body>
</html>
 <script>
    $("#phone").intlTelInput({
    
      utilsScript: "<?=base_url()?>assets/int-phone/build/js/utils.js"
    });
    
    $("#signupForm").submit(function(){
        $("#phone_full").val($("#phone").intlTelInput("getNumber"));
        $("#iso_code").val($("#phone").intlTelInput("getSelectedCountryData").iso2);
        $("#country_name").val($("#phone").intlTelInput("getSelectedCountryData").name);
        $("#dial_code").val($("#phone").intlTelInput("getSelectedCountryData").dialCode);
    });
  </script>
