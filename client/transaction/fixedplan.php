<?php
// assuming you have already established a database connection

// get the user's account number from the session
$user_account_number =$_settings->userdata('account_number');

// fetch the user's plans from the database
$qry = $conn->query("SELECT * FROM `plans` WHERE `planmaker` = '$user_account_number'");
?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">My Fixed Plans</h3>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped" id="fixed-plans-list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Plan Name</th>
						<th>Plan Type</th>
						<th>Plan Amount</th>
						<th>Amount Left</th>
						<th>Plan Duration</th>
						<th>Plan Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					while($row = $qry->fetch_assoc()):
						$plan_name = $row['planname'];
						$plan_type = $row['plantype'];
						$plan_amount = $row['planamount'];
						$plan_amount_left = $row['planamountleft'];
						$plan_duration = $row['planduration'];
						$plan_status = $row['planstatus'];
					?>
					
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $plan_name; ?></td>
							<td><?php echo $plan_type; ?></td>
							<td class='text-right'><?php echo number_format($plan_amount, 2); ?></td>
							<td class='text-right'><?php echo number_format($plan_amount_left, 2); ?></td>
							<td><?php echo $plan_duration; ?></td>
							<td><?php echo $plan_status; ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
            <button class="btn btn-success btn-gradient" onclick="location.href='create_plan.php'">Create New Plan</button>

		</div>
	</div>
</div>

<script>
	$(function(){
		$('#fixed-plans-list').dataTable()
	})
</script>
