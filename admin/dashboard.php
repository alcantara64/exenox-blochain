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
        <h3><i class="fa fa-table"></i>Dashboard</h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-bordered table-hover datatable" style="text:align:center">
          <thead >
            <tr >
              <th>Email</th>
             <th style="width:10%">Date/Time</th>
              <th>Coin</th>
              <th>Total Price</th>
              <th>Volume(EXN)</th>
              <th>Status</th>
              <th>Action</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
		<?php 
			 $tsql="SELECT * FROM transaction a inner join user_register b on a.user_id=b.id order by a.trans_date desc";
			 $results = $conn->query($tsql);
			if($results->num_rows > 1){
			while($row=$results->fetch_assoc()){
		?>
            <tr>
              <td><?= $row['email'] ?></td>
              <td><?= $row['trans_date'] ?></td>
              <td><?= $row['coin_used'] ?></td>
              <td><?= $row['amount_used'] ?></td>
              <td><?= $row['lxx_amount'] ?></td>
              <td class="text-right">
				  <?php if($row['trans_status'] == 0){ ?>
					 <span class="label alert-animated">Pending</span>
				  <?php }else{  ?>
				  	 <span class="label label-success">Approved</span>
				  <?php } ?>
			  </td>
			  <td class="text-right">
				 <?php if($row['trans_status'] == 0){ ?>
				  <form action="access.php" method="post" onsubmit="return confirm('Are You Sure You Want To Approve');">
				  <input type="hidden" value="<?= $row['tx_id'] ?>" name="approve">
				  <input type="hidden" value="<?= $row['user_id'] ?>" name="user_id">
				  <input type="hidden" value="<?= $row['lxx_amount'] ?>" name="volume">
				  <button type="submit" name="complete" class="btn btn-primary btn-sm "><i class="fa fa-check-square-o"></i>Approve</button>
				  </form>
					  
				  <?php }else{  ?>
				  	 
				  <?php } ?>
			  </td>
             <td>

           <?php if($row['trans_status'] == 0){ ?>
				  <form action="access.php" method="post" onsubmit="return confirm('Are You Sure You Want To Delete');">
				  <input type="hidden" value="<?= $row['tx_id'] ?>" name="approve">
				  <input type="hidden" value="<?= $row['user_id'] ?>" name="user_id">
				  <button type="submit" name="delete" class="btn btn-danger btn-sm "><i class="fa fa-trash-o"></i>Delete</button>
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
