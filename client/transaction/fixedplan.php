<?php

$user_account_number = $_settings->userdata('account_number');
$qry = $conn->query("SELECT * FROM `plans` WHERE `planmaker` = '$user_account_number' ORDER BY `planid` DESC");
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
						<th>D/W/M Amount</th>
						<th>Amount Left</th>
						<th>Plan Time</th>
						<th>Time Left</th>
						<th>Plan Status</th>
						<th>Plan Date</th>
						<th>Emergency Action</th> <!-- New column for the button -->
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
						$plan_time_left = $row['plandurationleft'];
							$plan_status = $row['planstatus'];
							$plan_date = $row['plandate'];
						$dwm_amount = ($plan_amount / intval($plan_duration));
						$ew_status = $row['planewstatus']; // Emergency withdrawal status fetched from the database
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $plan_name; ?></td>
							<td><?php echo $plan_type; ?></td>
							<td class='text-right'><?php echo number_format($plan_amount, 2); ?></td>
							<td class='text-right'><?php echo number_format($dwm_amount, 2); ?></td>
							<td class='text-right'><?php echo number_format($plan_amount_left, 2); ?></td>
							<td><?php echo $plan_duration; ?></td>
							<td><?php echo $plan_time_left; ?></td>
							<td><?php echo $plan_status; ?></td>
							<td><?php echo $plan_date; ?></td>
							<td> <!-- Button column for Emergency Withdrawal -->
							<?php if ($ew_status == 'yes' && $plan_status == 'Active'): ?>
								<a class="btn btn-danger btn-sm" href="./?page=transaction/emwithdraw&planid=<?php echo $row['planid']; ?>&dwm_amount=<?php echo $dwm_amount; ?>">Withdraw</a>

<?php else: ?>
    <button class="btn btn-danger btn-sm" disabled>Can't Withdraw</button>
<?php endif; ?>

							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
			<button class="btn btn-success btn-gradient" onclick="location.href='./?page=plans'">Create New Plan</button>
		</div>
	</div>
</div>

<script>
	function updatePlans() {
		$.ajax({
			url: './?page=planupdate',
			success: function(response) {
				alert_toast("Error: " + response, 'warning');
				var suc = alert_toast("Successfully Made");
				location.reload();
				suc;
			},
			error: function(xhr, status, error) {
				alert_toast("Error: " + error, 'warning');
			}
		});
	}

	setInterval(updatePlans, 1000000);

	$(function(){
		$('#fixed-plans-list').dataTable();s
	});
</script>
