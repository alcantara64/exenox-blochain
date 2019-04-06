<?php include 'header.php'; ?>
  
    <div class="widget widget-blue">
      <div class="widget-title">
              <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <div class="dropdown" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
    <ul class="dropdown-menu dropdown-menu-small" role="menu" aria-labelledby="dropdownMenu1">
      <li class="dropdown-header">Set Widget Color</li>
      <li><a data-widget-color="blue" class="set-widget-color" href="#">Blue</a></li>
      <li><a data-widget-color="red" class="set-widget-color" href="#">Red</a></li>
      <li><a data-widget-color="green" class="set-widget-color" href="#">Green</a></li>
      <li><a data-widget-color="orange" class="set-widget-color" href="#">Orange</a></li>
      <li><a data-widget-color="purple" class="set-widget-color" href="#">Purple</a></li>
    </ul>
  </div>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-table"></i>Stake Withdraw</h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-bordered table-hover datatable" style="text:align:center">
          <thead >
            <tr >
             <th>Email</th>
             <th style="width:10%">Withdrawal Date</th>
              <th>Amount</th>
              <th>Coin</th>
              <th>Wallet</th>
               <th>Status</th>
             <th>Action</th>
             <th>Cancel</th>
            </tr>
          </thead>
          <tbody>
			<?php 
			 $tsql="SELECT b.email,a.* FROM stake_withdraw a inner join user_register b on a.user_id=b.id order by a.server_date desc";
			 $results = $conn->query($tsql);
			if($results->num_rows > 1){
			while($row=$results->fetch_assoc()){
		?>
            <tr>
              <td><?= $row['email'] ?></td>
              <td><?= $row['server_date'] ?></td> 
              <td><?= $row['amount'] ?></td>
              <td><?= $row['coin'] ?></td>
              <td><?= $row['wallet_addr'] ?></td>
              <td class="text-right">
				  <?php if($row['status'] == 0){ ?>
					 <span class="label alert-animated">Pending</span>
				  <?php }else{  ?>
				  	 <span class="label label-success">Completed</span>
				  <?php } ?>
			  </td>
			  <td class="text-right">
				 <?php if($row['status'] == 0){ ?>
				  <form action="access.php" method="post" onsubmit="return confirm('Click OK If The Payment Is Completed');">
				  <input type="hidden" value="<?= $row['user_id'] ?>" name="user_id">
				  <input type="hidden" value="<?= $row['amount'] ?>" name="amount">
				  <input type="hidden" value="<?= $row['id'] ?>" name="id">
				  <button type="submit" name="payment" class="btn btn-primary btn-sm "><i class="fa fa-money"></i>Paid</button>
				  </form>
					  
				  <?php }else{  ?>
				  	 
				  <?php } ?>
			  </td>
				<td>
				 <?php if($row['status'] == 0){ ?>
				  <form action="access.php" method="post" onsubmit="return confirm('Are you sure you want to cancel/delete');">
				  <input type="hidden" value="<?= $row['user_id'] ?>" name="user_id">
				  <input type="hidden" value="<?= $row['amount'] ?>" name="amount">
				  <input type="hidden" value="<?= $row['id'] ?>" name="id">
				  <button type="submit" name="payment-delete" class="btn btn-danger btn-sm "><i class="fa fa-trash-o"></i>Cancel</button>
				  </form>
					  
				  <?php }else{  ?>
				  	 
				  <?php } ?>
			  </td>
         
            </tr>
         <?php } }?> 

            
          </tbody>
        </table>
        </div>
      </div>
    </div>
      
      
<?php include 'footer.php'; ?>