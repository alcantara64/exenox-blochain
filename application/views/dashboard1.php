<!DOCTYPE html>
<html lang="en">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>LuxxeumCoin</title>
		
		
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.css'>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.all.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.20.1/sweetalert2.js"></script>
		
		
        <?php
        include_once('includes/css-links.php');
        ?>
        <style type="text/css">
			
			.selected-coin{
				background-color: #1194f7;
				color: #fff;
			}

			.chart-container{
				width:640px;
				height:auto;
			}


        </style>
    </head>
    <body>
        <div id="wrapper" class="">
            <div class="fakeLoader"></div>
            <?php
            include_once('includes/navigation.php');
            include_once('includes/notification.php');
            ?>


            <div id="page-wrapper">
                <div class="row page-titles">
                    <div class="col-md-3 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                    </div>
                    <div class="col-md-4 align-self-center">
                        <h4 class="text-themecolor" style="font-weight:600"><?php if(isset($reg_count)){  echo 'Active Registered Users : '.number_format($reg_count); }?> </h4>
                    </div>
                    <div class="col-md-5 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div>
                </div>

				
			<div class="container-fluid">
				
				
                    <!-------My o button --->
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="card">
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-1">Buy LXX</button>
                                
                            </div>
  						</div> 
                         <div class="col-lg-10 col-md-10 col-sm-10">
							<div class="card">
							<h5 style="color:red;font-weight:600">PRE-ICO HAS STARTED. <a href="#" data-toggle="modal" data-target="#Modal-N"> CLICK HERE FOR BUYING INSTRUCTIONS</a></h5>

							</div>	
						</div> 
                            



                

					 <!-------Graph--->
                    <div class="row">
						<h4>LXX Price History (last 200 trades)</h4>
						<div class="chart-container">
							<canvas id="myCanvas"></canvas>
						</div>
                    </div><br>

                    <!-- /row -->
					
					
					

                            
                       
                        <!-----alert warning ---->

                        <!------END WARNING ALERT--->                                    
                    </div>
                    <!-----End my button ---->


                    <!---- DASHBOARD BALANCE LIST START ------>

                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="widget gradient-widget">
                                <div class="widget-caption gradient-danger">
                                    <div class="gradient-icon gr-icon-danger">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                    <div class="gradient-detail">
                                        <div class="widget-detail">
                                            <h3>
                                <?php
                                   if($this->session->userdata( 'userId' )<= 8730){
                                       echo   '50.000000';
                                    }else{
                                        echo '0.000000';
                                    }
                                 ?>
                                           </h3>
                                            <span>Bonus Balance</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="widget gradient-widget">
                                <div class="widget-caption gradient-info">
                                    <div class="gradient-icon gr-icon-info">
                                        <i class="fa fa-btc"></i>
                                    </div>
                                    <div class="gradient-detail">
                                        <div class="widget-detail">
                                            <h4 style="color:#fff;font-weight:600"><?php if($btcAvail==0){echo '0.000000';}else{ echo number_format($btcAvail,8);} ?></h4>
                                            <span>BTC Balance</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="widget gradient-widget">
                                <div class="widget-caption gradient-purple">
                                    <div class="gradient-icon gr-icon-purple">
                                        <i class="icon fa fa-unsorted"></i>
                                    </div>
                                    <div class="gradient-detail">
                                        <div class="widget-detail">
                                            <h4 style="color:#fff;font-weight:600"><?php if($ethAvail==0){echo '0.000000';}else{ echo number_format($ethAvail,16);} ?></h4>
                                            <span>ETH Balance</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="widget gradient-widget">
                                <div class="widget-caption gradient-success">
                                    <div class="gradient-icon gr-icon-success">
                                        <i class="icon fa fa-try"></i>
                                    </div>
                                    <div class="gradient-detail">
                                        <div class="widget-detail">
                                            <h3 >
                                                <?php
                                                if (isset($lxx_bal) && !empty($lxx_bal)) {
                                                    foreach ($lxx_bal as $bal) {
                                                        echo $bal->lxx_bal . '.000000';
                                                    }
                                                } else {
                                                    echo '0.000000';
                                                }
                                                ?>
                                            </h3>
                                            <span>LXX Balance</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!---- DASHBOARD BALANCE LIST START ------>




                    <!-- /row -->
                    <!-- row -->



                    <!-------------------------------------> 

                    <!------------------------>


                    <!-- /row -->
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="card">
                                <div class="card-header" >
                                    <h4 class="card-title m-b-0">PRE ICO SALE!</h4>
                                </div>

                                <p style="margin-left: 2.5em;padding: 0 7em 2em 0;">Maximum Supply = 1,000,000 LXX</p>


                                <p style="margin-left: 2.5em;padding: 0 7em 2em 0;">Tokens Sold = <?= number_format($token_sold1) . 'LXX'; ?></p>


                                <div class="progress-outer" style="padding-left: 30px;padding-right: 30px;">

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:<?= $percentagePurchased1 ?>%; box-shadow:-1px 10px 10px rgba(92, 190, 220, 0.5);"></div>
                                        <div class="progress-value"><?= $percentagePurchased1 ?>%</div>
                                    </div>
                                </div>
                                <p style="margin-left: 2.5em;padding: 0 7em 2em 0;"> Pre Ico Price = $0.50</p>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="card">
                                <div class="card-header" >
                                    <h4 class="card-title m-b-0">SPONSOR'S SALE IS CLOSED</h4>
                                </div>

                                <p style="margin-left: 2.5em;padding: 0 7em 2em 0;">Maximum Supply = 200,000LXX</p>


                                <p style="margin-left: 2.5em;padding: 0 7em 2em 0;">Tokens Sold = <?= number_format($token_sold) . 'LXX'; ?></p>


                                <div class="progress-outer" style="padding-left: 30px;padding-right: 30px;">

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:<?= $percentagePurchased ?>%; box-shadow:-1px 10px 10px rgba(92, 190, 220, 0.5);"></div>
                                        <div class="progress-value"><?= $percentagePurchased ?>%</div>
                                    </div>
                                </div>
                                <p style="margin-left: 2.5em;padding: 0 7em 2em 0;"> Sponsor's Price = $0.35</p>


                            </div>
                            </div>


                        </div>
                        <!-- /row -->


                        <!-- row -->
                          <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title m-b-0">Transactions History<h4>
                                    </div>
                                    <div class="card-body">

                                            
                                                <table class="table table-striped" style="font-size: 10px;">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Coin Type</th>
                                                        <th>Price</th>
                                                        <th>Total Volume(LXX)</th>
                                                        <th>Status</th>
                                                    </tr>
                                                  <!--  PRE ICO-->
                                                     <?php
                                                     if (isset($transactionsPre) && !empty($transactionsPre)) {
                                                    foreach ($transactionsPre as $key) {
                                                        # code...
                                                        ?>
                                                        <tr>
                                                            <td><?= $key->trans_date ?></td>
                                                            <td><?= $key->coin_used ?></td>
                                                            <td><?= $key->unit_price ?></td>
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
                                                    
                                                  <!-- SPONSOR SALES -->
                                                    <?php
                                                     if (isset($transactions) && !empty($transactions)) {
                                                    foreach ($transactions as $key) {
                                                        # code...
                                                        ?>
                                                        <tr>
                                                            <td><?= $key->trans_date ?></td>
                                                            <td><?= $key->coin_used ?></td>
                                                            <td><?= $key->unit_price ?></td>
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
                                                </table>

                                         </div>
                                  
                                </div>
                            </div>


                        <div class="col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title m-b-0">Top 10 Sponsors</h4>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                            if (isset($investors) && !empty($investors)) {
                                                $sno = 0;
                                                ?>
                                                <table class="table table-striped" style="font-size: 10px;">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                      	<th>LXX Balance</th>
                                                    </tr>
                                                    <?php
                                                    foreach ($investors as $key) {
                                                        # code...
                                                        $sno ++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $sno ?></td>
                                                            <td><?= $key->username ?></td>
                                                        	<td><?= $key->cust_balance ?></td>
                                                           
                                                        </tr>
                                                <?php } ?>
                                                </table>

<?php } ?>
                                       
                                    </div>
                                   
                                </div>
                            </div>


                        </div>

                    </div>
                    <!-- /#page-wrapper -->
                    <div id="sidebar-wrapper">
                        <a id="right-close-sidebar-toggle" href="#" class="theme-bg btn close-toogle toggle">
                            Setting Pannel <i class="ti-close"></i></a>
                        <div class="right-sidebar" id="side-scroll">
                            <div class="user-box">
                                <div class="profile-img">
                                    <img src="https://luxxeum.co/assets/img/sign-logo.png" alt="user">
                                    <!-- this is blinking heartbit-->
                                    <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </div>
                                <div class="profile-text">
                                    <h4><?= $name ?></h4>
                                    <a href="#" class="user-setting"><i class="ti-settings"></i></a>
                                    <a href="#" class="user-mail"><i class="ti-email"></i></a>
                                    <a href="#" class="user-call"><i class="ti-headphone"></i></a>
                                    <a href="<?= base_url() ?>accounts/logout" class="user-logout"><i class="ti-power-off"></i></a>
                                </div>
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs ">
                                        <li class="active">
                                            <a href="#options" data-toggle="tab">
                                                <i class="ti-palette"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#comments" data-toggle="tab">
                                                <i class="ti-bell"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#freinds" data-toggle="tab">
                                                <i class="ti-comment-alt"></i> </a>
                                        </li>
                                    </ul>

                                    <div class="tab-pane" id="comments">
                                        <div class="task">
                                            <!--
                                            <div class="task-overview">
                                                    <div class="alpha-box alpha-a">
                                                            <span>A</span>
                                                    </div>
                                                    <div class="task-detail">
                                                            <p>Hello, I am Maryam.</p>
                                                            <span class="task-time">2 Min Ago</span>
                                                    </div>
                                            </div>
                                            <div class="task-overview">
                                                    <div class="alpha-box alpha-d">
                                                            <span>D</span>
                                                    </div>
                                                    <div class="task-detail">
                                                            <p>Hello, I am Maryam.</p>
                                                            <span class="task-time">2 Min Ago</span>
                                                    </div>
                                            </div>
                                            <div class="task-overview">
                                                    <div class="alpha-box alpha-s">
                                                            <span>S</span>
                                                    </div>
                                                    <div class="task-detail">
                                                            <p>Hello, I am Maryam.</p>
                                                            <span class="task-time">2 Min Ago</span>
                                                    </div>
                                            </div>
                                            <div class="task-overview">
                                                    <div class="alpha-box alpha-h">
                                                            <span>H</span>
                                                    </div>
                                                    <div class="task-detail">
                                                            <p>Hello, I am Maryam.</p>
                                                            <span class="task-time">2 Min Ago</span>
                                                    </div>
                                            </div>
                                            <div class="task-overview">
                                                    <div class="alpha-box alpha-g">
                                                            <span>G</span>
                                                    </div>
                                                    <div class="task-detail">
                                                            <p>Hello, I am Maryam.</p>
                                                            <span class="task-time">2 Min Ago</span>
                                                    </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="freinds">
                                        <div class="accept-request">
                                            <!--
                                            <div class="friend-overview">

                                                    <div class="friend-overview-img">
                                                            <img src="https://luxxeum.co/assets/img/sign-logo.png" class="img-responsive img-circle" alt="">
                                                            <span class="fr-user-status online"></span>
                                                    </div>
                                                    <div class="fr-request-detail">
                                                            <h4>Adam Dax <span class="task-time pull-right">Just Now</span></h4>
                                                            <p>Accept Your Friend Request</p>
                                                    </div>
                                            </div>
                                            <div class="friend-overview">
                                                    <div class="friend-overview-img">
                                                            <img src="https://luxxeum.co/assets/img/sign-logo.png" class="img-responsive img-circle" alt="">
                                                            <span class="fr-user-status offline"></span>
                                                    </div>
                                                    <div class="fr-request-detail">
                                                            <h4>Rita Ray <span class="task-time pull-right">2 Min Ago</span></h4>
                                                            <p>Accept Your Friend Request</p>
                                                    </div>
                                            </div>
                                            <div class="friend-overview">
                                                    <div class="friend-overview-img">
                                                            <img src="https://luxxeum.co/assets/img/sign-logo.png" class="img-responsive img-circle" alt="">
                                                            <span class="fr-user-status busy"></span>
                                                    </div>
                                                    <div class="fr-request-detail">
                                                            <h4>Daniel Mark <span class="task-time pull-right">7 Min Ago</span></h4>
                                                            <p>Accept Your Friend Request</p>
                                                    </div>
                                            </div>
                                            <div class="friend-overview">
                                                    <div class="friend-overview-img">
                                                            <img src="https://luxxeum.co/assets/img/sign-logo.png" class="img-responsive img-circle" alt="">
                                                            <span class="fr-user-status offline"></span>
                                                    </div>
                                                    <div class="fr-request-detail">
                                                            <h4>Shruti Singh <span class="task-time pull-right">10 Min Ago</span></h4>
                                                            <p>Accept Your Friend Request</p>
                                                    </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer"> © 2018 Luxxeumcoin.co </footer>
            </div>
            <!-- /#wrapper -->

            <!-- Buy Dialog here -->

            <div class="modal modal-box-1 fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content" style="background-color:#8597b9">
                        <div class="modal-header">
                            <div class="btn-group">
                                <button id="btn-btc" class="btn btn-default selected-coin" type="button" >BTC</button>
                                <button id="btn-eth" class="btn btn-default" type="button">ETH</button>
                                <button id="btn-etn" class="btn btn-default" type="button">ETN</button>
                                <input type="hidden" id="select-coin" name="select-coin" value="BTC" />
                                <input type="hidden" id="baseURL" value="<?= base_url() ?>">
                            </div>

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div><br>
                        <h5 class="text-themecolor" style="text-align:center;color:#fff"> Please enter LXX, BTC or ETH value and wait for about 5 seconds. Click BUY to proceed only if you are ready to make payment now. </h5>
                        <div class="modal-body">
                            <img src="img/logo.png" class="img-responsive" alt="" />
                            <form id="buyForm" class="form-horizontal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="lxxAmount" class="col-xs-2" style="text-align: right;padding-top: 15px; padding-bottom: 15px;color:#fff;">LXX</label>
                                            <div class="col-xs-10">
                                                <input id="lxxAmount" type="text" class="form-control allownumericwithdecimal" placeholder="1"  >
                                            </div>


                                        </div>
                                        <div id="showBTC" class="form-group">
                                            <label  class="col-xs-2" style="text-align: right;padding-top: 15px; padding-bottom: 15px;color:#fff;">BTC</label>
                                            <div class="col-xs-10">
                                                <input type="text" id="btcAmount" name="btcAmount" class="form-control allownumericwithdecimal"  placeholder="<?= $BTCa ?>">
                                                <input type="text" id="btcBal" name="btcAmount" class="form-control allownumericwithdecimal"  value="<?= $btcAvail ?>">
                                            </div>

                                        </div>
                                        <div id="showETH" class="form-group" style="display: none;">
                                            <label for="ethAmount"  class="col-xs-2" style="text-align: right;padding-top: 15px; padding-bottom: 15px;color:#fff;">ETH</label>
                                            <div class="col-xs-10">
                                                <input type="text" id="ethAmount" name="ethAmount" class="form-control allownumericwithdecimal" placeholder="<?= $ETHa ?>" >
                                                <input type="hidden" id="ethBal" name="ethAmount" class="form-control allownumericwithdecimal" value="<?= $ethAvail ?>" >
                                            </div>

                                        </div>
                                        <!-- <div id="showETN" class="form-group" style="display: none;">
                                            <label for="etnAmount"  class="col-xs-2" style="text-align: right;padding-top: 15px; padding-bottom: 15px;color:#fff;">ETN</label>
                                            <div class="col-xs-10">
                                                <input type="text" id="etnAmount" name="etnAmount" class="form-control allownumericwithdecimal" placeholder="<?= $ETNa ?>" >
                                            </div>

                                        </div>-->
                                    </div>
                                    <div class="col-lg-12"><div class="clearfix"></div></div>
                                    <div class="col-lg-12 text-center">
                                        <button id="submitBuy" type="button" class="btn btn-primary" style="border-radius: 50px; padding:10px 50px;"> Buy </button>


                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" >


                <!-- Modal content-->
                <div class="modal-content" style="background-color:#8597b9">
                    <div class="modal-header" >

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:#fff">Pay to the Address </h4><br><br>
                        <div class="row" >
                            <div class="col-md-4">
                                <img src="<?= base_url() ?>assets/img/Bitcoin.png" height="100" width="100" /> </div>
                            <div class="col-md-4">	
                                <img src="<?= base_url() ?>assets/img/luxxeum-ethereum-icon-luxxeumcoin.png" height="100" width="100" /> </div>
                            <div class="col-md-4">
                                <img src="<?= base_url(); ?>assets/img/sign-logo.png" height="100" width="100" /> </div>
                        </div><br>
                    </div>
                    <!--<div class="modal-body">
                      <p>Some text in the modal.</p>
                    </div>-->
                    <!-- The text field -->
                    <div align="center">
                        <p><label style="width:20%;color:#fff;">LXX Amount</label>
                            <input type="text" value="" id="showLXX" style="width:15%;padding:5px;border-radius:5px" readonly><label style="width:20%;color:#fff;">
                                <span id="otherAmount"></span> Amount</label>
                            <input type="text" value="" id="showOtherAmount" style="width:35%;padding:5px;border-radius:5px" readonly></p>
                        <p><span style="font-weight:bolder; color:#000;">Pay To This <span id="payTo"></span> Address</span> </p>
                        <input style="padding:5px;border-radius:5px;width:65%;" type="text" value=""  id="myInput"  readonly>

                        <!-- The button used to copy the text -->
                        <button id="copyAddress" class="btn btn-primary" style="width:15%;">Copy </button> <br/> 



                        <form ><input type="hidden" value=".." id="transId" name="transId"  required=required class="form-control" placeholder="Comment (optional)">
                            <input type="hidden" value="" id="txId" name="txId" >

                            <!-- The button used to copy the text -->
                            <!--<button type="button" id="subtrans" name="subtrans" class="btn btn-primary" style="width:15%;">Submit ID</button> </form>  --><br/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!--         End Modal Here -->	

        <div id="load2FAModal"></div>
			
		<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/Chart.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/linegraph.js"></script>
			
        <?php
        include_once('includes/js-links.php');
        ?>

    </body>
</html>
