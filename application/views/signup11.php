<!DOCTYPE html>
<html lang="en">
	<head>
	<script src='https://www.google.com/recaptcha/api.js'></script>


		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>LuxxeumCoin | Signup</title>

		<?php
        	include_once('includes/css-links.php');
		?>
		<!--link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"-->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!--link rel="stylesheet" href="<?=base_url()?>assets/int-phone/build/css/intlTelInput.css">
		<style type="text/css">
			.intl-tel-input {
			    width: 100%;
			}

		</style-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	
	<body background="<?=base_url();?>assets/img/signup.jpg">
	
		    <div class="container">
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

				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="signup-panel panel panel-default" style="margin-top: 15%;">
							<div class="panel-heading">
								<h3 class="panel-title">Create An Account</h3>
							</div>
							<div class="panel-body">
								<img src="<?=base_url();?>assets/img/sign-logo.png" class="img-responsive" alt=""/>
								
								<form method="post" action="<?=base_url()?>accounts/signup">
									<fieldset>
										<div class="form-group">
											<input class="form-control" placeholder="Full Name" name="full_name" type="text">
										</div>
										<div class="form-group">
											<input class="form-control" placeholder="Username" name="username" type="text">
										</div>
										<div class="form-group">
											<input class="form-control" placeholder="E-mail" name="email" type="email">
										</div>

										<div class="form-group has-feedback">
									        <input id="phone" type="tel" name="phone" class="form-control sty1" >
									        <input id="phone_full" type="hidden" name="phone_full">
									        <input id="iso_code" type="hidden" name="iso_code">
									        <input id="country_name" type="hidden" name="country_name">
									        <input id="dial_code" type="hidden" name="dial_code">
								      </div>
										<div class="form-group">
											<input class="form-control" placeholder="Password" name="password" type="password" value="">
										</div>
										<div class="form-group">
											<input class="form-control" placeholder="Confirm Password" name="cpassword" type="password" value="">
										</div>
										 </div> 
										<div align="center" class="g-recaptcha" data-sitekey="6LcrcTwUAAAAAGe5dvgbqUZpUsU4or8xMx21KUxh"></div><br/>

										<!-- Change this to a button or input when using this as a form -->
										<button type="submit" class="btn btn-login" >Register</button>
									</fieldset>
								</form>
								<!--ul class="social-login">
									<li class="facebook-login"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
									<span>OR</span>
									<li class="google-plus-login"><a href="#"><i class="fa fa-google-plus"></i>Facebook</a></li>
								</ul-->
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-10">
						<div style="margin-top: 30%;">
							<p>
						      <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>

						    </p>
						</div>
					</div>
				</div>
			</div>
<?php 
			include_once('includes/js-links.php');
		?>
<!--script src="<?=base_url()?>assets/int-phone/build/js/intlTelInput.js"></script>
  <script>
    $("#phone").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      //separateDialCode: true,
      utilsScript: "<?=base_url()?>assets/int-phone/build/js/utils.js"
    });
    
    $("#signupForm").submit(function(){
        $("#phone_full").val($("#phone").intlTelInput("getNumber"));
        $("#iso_code").val($("#phone").intlTelInput("getSelectedCountryData").iso2);
        $("#country_name").val($("#phone").intlTelInput("getSelectedCountryData").name);
        $("#dial_code").val($("#phone").intlTelInput("getSelectedCountryData").dialCode);
    });
  </script-->
	</body>
</html>

