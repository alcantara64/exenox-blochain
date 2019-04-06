<!DOCTYPE html>
<html>
	<head>
		<title>EXENOX || LOGIN</title>
		<meta charset="utf-8">
		<meta content="ie=edge" http-equiv="x-ua-compatible">
		<meta content="cryptocurrency" name="keywords">
		<meta content="exenox" name="author">
		<meta content="EXENOX" name="description">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
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
	<body class="auth-wrapper" style="background-image: url(<?php echo base_url();?>asset/img/blockchainimg-556.jpg);background-repeat:no-repeat" >
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

				<form method="post" action="<?=base_url()?>accounts/plogin">
					<div class="logo-w"><a href="">
						<img alt="" src="<?php echo base_url();?>asset/img/logo-big.png"></a>
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input class="form-control" placeholder="Username/Email" name="username" type="text">
						<div class="pre-icon os-icon os-icon-user-male-circle"></div>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input class="form-control" placeholder="Password" name="password" type="password">
						<div class="pre-icon os-icon os-icon-fingerprint"></div>
					</div>
				<div align="center" class="g-recaptcha" data-sitekey="6LfLznoUAAAAAM-VS3xudhk6vCiqNgdQIgaFNfVR"></div><br/>
					<div class="buttons-w">
						<button class="btn btn-primary">Log me in</button>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input class="form-check-input" id="checkbox1" name="options[]" value="1" type="checkbox">Remember Me</label>
						</div>
					</div>
					<br>
				<p style="text-align: center;">Not Registered? <a href="<?=base_url();?>accounts/register">Sign Up </a></p>
				<p style="text-align: center;">Forgot Password? <a href="<?=base_url();?>accounts/resetpassword">Reset </a></p>

					<p style="text-align: center;font-weight:800"><?php if(isset($reg_count)){  echo 'Active Registered Users : '.number_format($reg_count); }?></p>
<!--<p style="margin-top: 0.2em; text-align: center; font-size: 42px"><span style="font-size: 22px">Our Community Links</span> <br>
<a href="https://t.me/lxxglobal" target="_blank"><i class="fab fa-telegram"></i></a>
<a href="https://instagram.com/luxxeumcoin" target="_blank"><i class="fab fa-instagram"></i></a>
<a href="https://twitter.com/luxxeumcoin" target="_blank"><i class="fab fa-twitter-square"></i></a>
</p>-->
				</form>
			</div>
		</div>
	</body>
</html>
