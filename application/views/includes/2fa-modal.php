<!-- Modal -->
<div class="modal fade" id="2FAModal" role="dialog">
    <div class="modal-dialog" >


        <!-- Modal content-->
        <div class="modal-content" style="background-color:#8597b9">
            <div class="modal-header" >

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#fff">2FA Setup </h4><br><br>
                <div class="row" >
                    <br>
                </div>
                <!--<div class="modal-body">
                  <p>Some text in the modal.</p>
                </div>-->
                <!-- The text field -->
                <div align="center">
					<?php if($tfaEnabled == 0){  ?>
<p style="color:green;font-weight:800"> Download the Google Authenticator app from playstore or ios </p>
                    <p style="color:green;font-weight:800">Before Clicking on Enable 2FA, write down or print a copy of the 16 digit secret key and put it in safe place or scan the QR </p>

                    <p><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?=$qrCodeUrl?>&chld=H"  /></p>
                   <p><span style="font-weight:bolder; color:#000;" >Secret Key  </span> </p>
<input style="padding:5px;border-radius:5px;width:70%;text-align:center" type="text" value="<?=$secret?>"  id="secretCode"  readonly>

					<?php } ?>
                    <!-- The button used to copy the text -->
                    <br/> <br/> 

					<form action="<?=base_url()?>Settup2FA" method="POST">
						<input type="hidden" name="google_auth_code" value="<?=$secret?>">
						<input type="hidden" name="uid" value="<?=$uid?>">
						<input type="hidden" name="tfa_enabled" value="<?=$tfaEnabled?>">
						<button  type="submit" class="btn btn-primary" style="border-radius: 50px; padding:10px 50px;"><?php if($tfaEnabled == 0){ echo 'Enable 2FA'; }else{ echo 'Disable 2FA'; } ?></button>
					</form>
                </div><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>


<!--         End Modal Here -->	