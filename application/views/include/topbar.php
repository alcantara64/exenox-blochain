<div class="content-w">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

        $.ajax({
            type:'GET',
            url:'https://min-api.cryptocompare.com/data/pricemulti?fsyms=ETH,BTC,LTC&tsyms=USD',
            dataType: "json",
            success:function(data){
				 console.log (data.ETH.USD);
                 $('#ethp').text('$ ' + data.ETH.USD);
                 $('#btcp').text('$ ' + data.BTC.USD);
                 $('#ltcp').text('$ ' + data.LTC.USD);

            }
        });
    });

</script>




		<!-------------------- START - Top Bar -------------------->
		<div class="top-bar color-scheme-bright"  style="background-image: linear-gradient(-270deg, #3386EF 0%, #80dfff 98%);background-color: #3386EF;">
					<div class="os-tabs-controls os-tabs-complex" >
						<ul class="nav nav-tabs">


							<li class="nav-item">
								<a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_sales">
									<span class="tab-label" style="color:#fff">Exenox</span>
									<span class="badge badge-danger"  style="color:#fff; padding:10px">$ 0.05</span>
								</a>
							</li>
							<li class="nav-item">
								<a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_sales">
									<span class="tab-label" style="color:#fff">Bitcoin</span>
									<span id="btcp" class="badge badge-info"  style="color:#fff; padding:10px">Loading...</span>
								</a>
							</li>


							<li class="nav-item ">
								<a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_sales">
									<span class="tab-label" style="color:#fff">Ethereum</span>
									<span id="ethp" class="badge badge-danger"  style="color:#fff; padding:10px">Loading...</span>
								</a>
							</li>
							<li class="nav-item ">
								<a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_sales">
									<span class="tab-label" style="color:#fff">Litecoin</span>
									<span id="ltcp" class="badge badge-primary"  style="color:#fff; padding:10px">Loading...</span>
								</a>
							</li>

						</ul>
					</div>


			<!-------------------- START - Top Menu Controls -------------------->
			<div class="top-menu-controls">
			<!--	<div class="element-search autosuggest-search-activator">
					<input placeholder="Start typing to search..." type="text">
				</div>-->

				<!--------------------START - Messages Link in secondary top menu -------------------->

				<div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
					<i class="os-icon os-icon-bell"></i>
					<!--<div class="new-messages-count">12</div>-->
					<div class="os-dropdown light message-list">
						<ul>
							<li>
								<a href="#">
									<div class="user-avatar-w">
										<img alt="" src="<?php echo base_url();?>asset/img/avatar1.jpg">
									</div>
									<div class="message-content">
										<h6 class="message-from"><?= $name ?></h6>
										<h6 class="message-title">User</h6>
									</div>
								</a>
						</ul>
					</div>
				</div><!--------------------
END - Messages Link in secondary top menu
--------------------><!--------------------

--------------------><!--------------------
START - User avatar and menu in secondary top menu
-------------------->
				<div class="logged-user-w">
					<div class="logged-user-i">
						<div class="avatar-w">
							<img alt="" src="<?php echo base_url();?>asset/img/avatar1.jpg">
						</div>
						<div class="logged-user-menu color-style-bright" style="background-image: linear-gradient(-270deg, #3386EF 0%, #80dfff 98%);background-color: #3386EF;">
							<div class="logged-user-avatar-info" >
								<div class="avatar-w">
									<img alt="" src="<?php echo base_url();?>asset/img/avatar1.jpg">
								</div>
								<div class="logged-user-info-w">
									<div class="logged-user-name"><?= $name ?></div>
									<div class="logged-user-role">User</div>
								</div>
							</div>
							<div class="bg-icon">
								<i class="os-icon os-icon-wallet-user"></i>
							</div>
							<ul>
								<li>
									<a href="#">
										<i class="os-icon os-icon-user"></i>
										<span>Profile</span>
									</a>
								</li>
								<li>
									<a href="<?= base_url() ?>accounts/logout">
										<i class="os-icon os-icon-signs-11"></i>
										<span>Logout</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div><!--------------------
END - User avatar and menu in secondary top menu
-------------------->
			</div><!--------------------
END - Top Menu Controls
-------------------->
		</div><!--------------------
END - Top Bar
-------------------->
