<?php include_once('include/header.php' )?>

<?php include_once('include/sidebar.php') ?>

<?php include_once('include/topbar.php' )?>

<!-- MAIN MENU START -->


		<div class="content-i">
			<div class="content-box" style=" background-image: url(<?php echo base_url();?>asset/img/bg2.jpg); background-size: 100%;">



				<?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable white">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $error; ?>
                    </div>
                    <?php
                }
                $success = $this->session->flashdata('success');
                if ($success) {
                    ?>
                    <div class="alert alert-success alert-dismissable white">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $success; ?>
                    </div>
                <?php } ?>




	<!--TOKEN BUY SECTION-->
			<div class="col-md-12">
			  <div class="row">
				<div class="col-md-12">

					<div class="row pt-2">

					<div class="col-6 col-sm-6 col-xxl-2">
						<a class="element-box el-tablo centered trend-in-corner smaller" href="#">
							<div class="label">Confirmed</div>
							<div class="value text-success"> <?php $record = $this->db->get_where('lxx_balance',array('user_id' =>$this->session->userdata('userId'),'status'=>1 ));

						 if($record->num_rows() > 0){
							 echo $record->row()->lxx_main_bal;
						 }else{
							 echo '0.000000';
						 }
							?></div>
						</a>
					</div>
					<div class="col-6 col-sm-6 col-xxl-2">
						<a class="element-box el-tablo centered trend-in-corner smaller" href="#">
							<div class="label">Unconfirmed</div>
							<div class="value text-danger"><?php $record = $this->db->get_where('lxx_balance',array('user_id' => $this->session->userdata('userId'),'status !='=>1 ));

						 if($record->num_rows() > 0){
							 echo $record->row()->lxx_main_bal;
						 }else{
							 echo '0.000000';
						 }
							?></div>
						</a>
					</div>
				</div>


				<div class="row" >
					<div class="col-md-6 col-sm-6 col-xxl-2">
						<div class="element-wrapper compact pt-4">
							<div class="post-box">
								<div class="post-content">
									<h6 class="post-title" style="color:blue">How To Buy EXENOX Token</h6>
									<div class="post-text" style="color:#000">
										<p><span class="badge badge-danger"> 1 </span> Choose the cryptocurrency you want to use to purchase EXENOX tokens</p>
										<p><span class="badge badge-danger"> 2 </span> Enter the amount of cryptocurrency or EXENOX tokens</p>
										<p><span class="badge badge-danger"> 3 </span> Copy the payment address and Click Buy</p>
										<p><span class="badge badge-danger"> 4 </span> Send the exact amount of cryptocurrency to the Copied address</p>

									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="col-md-6 col-sm-6 col-xxl-2">


						<div class="element-wrapper compact pt-4">
							<div class="element-box-tp">
							  <div class="post-box">
								 <div class="post-content">


								<div class="col-md-12 col-sm-12">
									<div class="row" >

											<div class="col-6 col-sm-3 col-xxl-2">
												<div class="form-group">
													<button id="btc" class="btn btn-lg btn-grey active1" style="width:100%" >
														<span>BTC</span>
													</button>
												</div>
											</div>

											<div class="col-6 col-sm-3 col-xxl-2">
												<div class="form-group">
													<button id="eth" class="btn btn-lg btn-grey"  style="width:100%">
														<span>ETH</span>
													</button>
												</div>
											</div>

											<div class="col-6 col-sm-3 col-xxl-2">
												<div class="form-group">
													<button id="ltc" class="btn btn-lg btn-grey" style="width:100%" >
														<span>LTC</span>
													</button>
												</div>
											</div>

											<div class="col-6 col-sm-3 col-xxl-2">
												<div class="form-group">
													<button  class="btn btn-lg btn-grey" style="width:100%" >
														<span>WIRE</span>
													</button>
												</div>
											</div>



								  </div>
								</div>
							<form method="post" action="exenox-buy" id="buyForm">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<input id="type" class="form-control" name="type" type="hidden" value="BTC">
										<div class="form-group">
											<label for="" class="white">Exenox Token</label>
											<div class="input-group">
												<input id="amount" name="exnAmount" class="form-control" placeholder="" type="text" value="" required onkeypress="return isNumberKey(event)">
												<div class="input-group-append">
													<div class="input-group-text">EXE</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="" class="white">Amount in <span class="val">BTC</span></label>
											<div class="input-group">
												<input id="pay" name="coin" class="form-control" type="text" value="" required onkeypress="return isNumberKey(event)">
												<div class="input-group-append">
													<div class="input-group-text"><span class="val">BTC</span></div>
												</div>
											</div>
										</div>
									</div>

										<div class="col-md-12 col-sm-12">
										<div class="form-group">
										    <div class="row">
										        <div class="col-md-3 col-sm-12">
        											<label for="" class="white">Token Bonus</label>
        										</div>
        										<div class="col-md-9 col-sm-12">
        											<div class="input-group">
        												<input id="bonus" name="bonus" class="form-control" type="text" value="" readonly onkeypress="return isNumberKey(event)">
        												<div class="input-group-append">
        													<div class="input-group-text">Bonus</div>
        												</div>
        											</div>
        										</div>
											</div>
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label for="" class="white"><span class="val">BTC</span> Address</label>
											<div class="input-group">
												<input id="Address" class="form-control" placeholder="Wallet" type="text" value="<?php echo $ethAddr; ?>">
												 <button id="copyAddress" class="btn btn-defaut" style="width:15%;">Copy </button> <br/>
											</div>
										</div>
									</div>

								<button class="btn btn-primary btn-block btn-lg active1">
									<i class="os-icon os-icon-refresh-ccw"></i>
									<span>Buy Now</span>
								</button>
							</div>
							</form>
							  </div>
						</div>
						</div>
					</div>
					</div>
				</div>





		</div>


		<!--END OF TOKEN BUY SECTION-->





	<!--WALLET BALANCE SECTION-->


		<div class="col-sm-12 col-lg-12 col-xxl-12">



					<div class="col-12 col-sm-12 col-xxl-2">
						<div class="element-wrapper compact pt-4">

							<h6 class="element-header white">Transactions History</h6>
							<div class="element-box-tp">
								<div class="post-box">
								<div class="post-content">
								<table class="table table-clean">
									<thead>
										<tr style="font-weight:800;font-size:bolder">
											 <th>S/N</th>
											<th class="">Date</th>
											<th class="">Coin Type</th>
											<!--<th class="">Price</th>-->
											<th class="">Volume (EXN)</th>
											<th class="">Status</th>
										</tr>
									</thead>
									<tbody>
										   <?php
												 $sno = 0;
                                                     if (isset($transactionsPre) && !empty($transactionsPre)) {
                                                    foreach ($transactionsPre as $key) {

														$sno++;
                                                        # code...
                                                        ?>
                                                        <tr>
															<td><?= $sno ?></td>
                                                            <td><?= $key->trans_date ?></td>
                                                            <td><?= $key->coin_used ?></td>
                                                           <!-- <td><?= $key->amount_used ?></td>-->
                                                            <td><?= $key->lxx_amount ?></td>
                                                            <td><?php
                                                                if ($key->trans_status == 0) {
                                                                    echo "Pending";
                                                                } else {
                                                                    echo "Approved";
                                                                }
                                                                ?></td>

                                                        </tr>
                                                <?php }  } ?>
									</tbody>
								</table>
									</div>
									</div>
							</div>
						</div>
					</div>


				<div class="col-12 col-sm-12 col-xxl-2">
					<div class="element-wrapper compact pt-4">
							<h6 class="element-header white">Video</h6>
							<div class="post-box">
								<div class="post-content">
									<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/JHrqVtSKdeo?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
    							</div>
							</div>
						</div>
				</div>

				<div class="col-12 col-sm-12 col-xxl-2">
					<div class="element-wrapper compact pt-4">
							<h6 class="element-header white">Token Economics</h6>
							<div class="post-box">
								<div class="post-content">
							Token Economics
							</div>
							</div>
						</div>
				</div>

		</div>

		</div>
		</div>

	<!--END OF WALLET SECTION-->



				<div class="row">



				</div><!--------------------


--------------------></div><!--------------------
START - Sidebar
-------------------->

		</div>
	</div>
	<div class="display-type"></div>
</div>


<?php include_once  ('include/footer.php'); ?>
