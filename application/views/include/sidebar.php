	<div class="layout-w">

	<!--------------------START - Mobile Menu-------------------->

	<div class="menu-mobile menu-activated-on-click color-scheme-dark">
		<div class="mm-logo-buttons-w">
			<a class="mm-logo" href="#"><img src="<?php echo base_url();?>asset/img/logo.jpg"><span>EXENOX</span></a>
			<div class="mm-buttons">

				<div class="mobile-menu-trigger">
				<div class="os-icon os-icon-hamburger-menu-1"></div>
				</div>
			</div>
		</div>
		<div class="menu-and-user">
			<div class="logged-user-w">
				<div class="avatar-w"><img alt="" src="<?php echo base_url();?>asset/img/avatar1.jpg"></div>
				<div class="logged-user-info-w"><div class="logged-user-name"><?= $name ?></div>
					<div class="logged-user-role">User</div>
				</div>
			</div>

	<!-------------------- START - Mobile Menu List  -------------------->

			<ul class="main-menu">
				<li class="has-sub-menu">
					<a href="#">
						<div class="icon-w">
							<div class="os-icon os-icon-home"></div>
						</div>
						<span>Dashboard</span>
					</a>
					<ul class="sub-menu">
						<li><a href="#">Dashboard </a></li>
					</ul>
				</li>
				<li class="has-sub-menu">
					<a href="#">
						<div class="icon-w">
							<div class="os-icon os-icon-user"></div>
						</div>
						<span>Profile</span>
					</a>
					<ul class="sub-menu">
							<li><a href="#" data-toggle="modal" data-target="#editModal">Edit Profile</a></li>
							<!--<li><a onclick="notAvailable()" href="#">Kyc</a></li>-->
						</ul>
				</li>

				<li class="has-sub-menu">
					<a href="#">
						<div class="icon-w">
							<div class="os-icon os-icon-signs-11"></div>
						</div>
						<span>Wallet</span>
					</a>
						<ul class="sub-menu">
							<li><a href="#" onclick="notAvailable()">Wallet</a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal">Swap</a></li>
						</ul>
				</li>

				<li class="has-sub-menu">
					<a href="#">
						<div class="icon-w">
							<div class="os-icon os-icon-edit"></div>
						</div>
						<span>Support</span>
					</a>
						<ul class="sub-menu">
							<li><a onclick="notAvailable()" href="#">Support</a></li>
						</ul>
				</li>

				<li class="has-sub-menu">
					<a href="#">
						<div class="icon-w">
							<div class="os-icon os-icon-refresh"></div>
						</div>
						<span>Sync With Mobile</span>
					</a>
					<ul class="sub-menu">
							<li><a onclick="notAvailable()" href="#">Sync With Mobile</a></li>
						</ul>
				</li>

				<li class="has-sub-menu">
					<a href="#">
						<div class="icon-w">
							<div class="os-icon os-icon-layers"></div>
						</div>
						<span>Extras</span>
					</a>
						<ul class="sub-menu">
							<li><a onclick="notAvailable()" href="#">Light Paper</a></li>
						</ul>
				</li>


			</ul>
		</div>
	</div>

<!-------------------- END - Mobile Menu -------------------->

<!-------------------- START - Main Menu -------------------->


	<div class="menu-w color-style-bright menu-position-side menu-side-left menu-layout-mini sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link"
		 style="background-image: linear-gradient(-270deg, #3386EF 0%, #80dfff 98%);background-color: #3386EF;">
		<div class="logo-w">
			<a class="logo" href="">
				<!--<div class="logo-element"></div>-->
				<div class="logo">
					<img src="<?php echo base_url()?>asset/img/logo.png">
				</div>
				<div class="logo-label">EXENOX</div>
			</a>
		</div>

		<ul class="main-menu">
			<li class="selected has-sub-menu">
				<a href="#">
					<div class="icon-w">
						<div class="os-icon os-icon-home"></div>
					</div><span>Dashboard</span>
				</a>
				<div class="sub-menu-w">
					<div class="sub-menu-header">Dashboard</div>
					<div class="sub-menu-icon">
						<i class="os-icon os-icon-home"></i>
					</div>
					<div class="sub-menu-i">
						<ul class="sub-menu">
							<li><a href="#">Dashboard </a></li>
						</ul>
					</div>
				</div>
			</li>

			<li class=" has-sub-menu">
				<a href="#">
					<div class="icon-w">
						<div class="os-icon os-icon-user"></div>
					</div>
				</a>
				<div class="sub-menu-w">
					<div class="sub-menu-header">Profile</div>
					<div class="sub-menu-icon"><i class="os-icon os-icon-user"></i></div>
					<div class="sub-menu-i">
						<ul class="sub-menu">
							<li><a href="#" data-toggle="modal" data-target="#editModal">Edit Profile</a></li>
							<!--<li><a onclick="notAvailable()" href="#">Kyc</a></li>-->
						</ul>

					</div>
				</div>
			</li>

			<li class=" has-sub-menu">
				<a href="#">
					<div class="icon-w">
						<div class="os-icon os-icon-signs-11"></div>
					</div>
				</a>
				<div class="sub-menu-w">
					<div class="sub-menu-header">Wallet</div>
					<div class="sub-menu-icon"><i class="os-icon os-icon-signs-11"></i></div>
					<div class="sub-menu-i">
						<ul class="sub-menu">

							<li><a href="#" data-toggle="modal" data-target="#myModal">Swap</a></li>
						</ul>

					</div>
				</div>
			</li>

			<li class=" has-sub-menu">
				<a href="#">
					<div class="icon-w">
						<div class="os-icon os-icon-edit"></div>
					</div>
				</a>
				<div class="sub-menu-w">
					<div class="sub-menu-header">Support</div>
					<div class="sub-menu-icon"><i class="os-icon os-icon-edit"></i></div>
					<div class="sub-menu-i">
						<ul class="sub-menu">
							<li><a onclick="notAvailable()" href="#">Support</a></li>
						</ul>

					</div>
				</div>
			</li>

			<li class=" has-sub-menu">
				<a href="#">
					<div class="icon-w">
						<div class="os-icon os-icon-refresh-ccw"></div>
					</div>
				</a>
				<div class="sub-menu-w">
					<div class="sub-menu-header">Sync With Mobile</div>
					<div class="sub-menu-icon"><i class="os-icon os-icon-refresh-ccw"></i></div>
					<div class="sub-menu-i">
						<ul class="sub-menu">
							<li><a onclick="notAvailable()" href="#">Sync With Mobile</a></li>
						</ul>

					</div>
				</div>
			</li>

			<li class=" has-sub-menu">
				<a href="#">
					<div class="icon-w">
						<div class="os-icon os-icon-layers"></div>
					</div>
				</a>
				<div class="sub-menu-w">
					<div class="sub-menu-header">Extras</div>
					<div class="sub-menu-icon"><i class="os-icon os-icon-layers"></i></div>
					<div class="sub-menu-i">
						<ul class="sub-menu">
							<li><a onclick="notAvailable()" href="#">Light Paper</a></li>
							<li><a href="javascript:void(0)" data-toggle="modal" data-target="#airdropModal"><i class="fa fa-cash">Airdrop</a></li>
						</ul>

					</div>
				</div>
			</li>


		</ul>
	</div>
	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
      <form class="" action="<?php echo base_url()?>dashboard/swap/do_swap" method="post">
      	<div class="form-group">
      		<input type="password" name="password" class="form-control" placeholder="Enter your password">
      	</div>
				<div class="form-group">
     <div align="center" class="g-recaptcha" data-sitekey="6LfLznoUAAAAAM-VS3xudhk6vCiqNgdQIgaFNfVR"></div>
</div>
					<input type="submit" class="btn btn-lg btn-success col-sm-12"  value="submit"/>


      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>
	</div>
</div>
<!-- airdrop modal>-->
<div id="airdropModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Airdrop</h4>
      </div>
      <div class="modal-body">
      	<form id="submiair" action="<?php echo base_url() ?>dashboard/airdrop/do_airdrop" onsubmit='return false' method="post" >
  <div class="form-group">
    <label for="wallet_address">Wire wallet address</label>
    <input type="text" id="wire_address_field" name="wire_wallet_address" class="form-control" id="wallet_address">
  </div>
  <button type="submit" id="submit_wire" onclick="summit_wire('submiair')" class="btn btn-success ">Submit</button>

        </form>
          <br><br>
                    <div class="alert alert-danger alert-dismissable alertDiv" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <p class="fail-message"> </p>
                    </div>


                    <div class="alert alert-success alert-dismissable alertModal" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p class="succes-message"> success</p>
                    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!---------------------- start edit user -->

<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Update Info</h4>
      </div>
      <div class="modal-body">
      	<form id="submiair" action="<?php echo base_url() ?>dashboard/profile/update" method="post" >
					<?php
					$userinfo =$this->db->get_where('user_register',array('Id' => $this->session->userdata('userId') ))->result_array();
  foreach ($userinfo as $row) {

					?>
  <div class="form-group">
    <label for="wallet_address">full name</label>
    <input type="text" value="<?php echo $row['full_name']?>" id="full_name" name="full_name" class="form-control">
  </div>
	<div class="form-group">
		<label for="wallet_address">phone</label>
		<input type="text" value="<?php echo $row['phone_num']?>" id="phone" name="phone" class="form-control">
	</div>
	<?php
}
	?>
  <button type="submit" id="" class="btn btn-success ">Submit</button>

        </form>
          <br><br>
                    <div class="alert alert-danger alert-dismissable alertDiv" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <p class="fail-message"> </p>
                    </div>


                    <div class="alert alert-success alert-dismissable alertModal" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p class="succes-message"> success</p>
                    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	<!-------------------- END - Main Menu -------------------->
