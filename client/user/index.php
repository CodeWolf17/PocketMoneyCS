<?php 
$user = $conn->query("SELECT * FROM `accounts` where id ='".$_settings->userdata('id')."'");
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-body">
		<div class="container-fluid">
			<div id="msg"></div>
			<form action="" id="manage-user">	
				<input type="hidden" name="id" value="<?php echo $_settings->userdata('id') ?>">
				<div class="form-group">
					<label for="name">First Name</label>
					<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
				</div>
				<div class="form-group">
					<label for="name">Last Name</label>
					<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required  autocomplete="off">
				</div>
				<div class="form-group">
					<label for="secqstn">Security Question</label>
					<input type="text" name="secqstn" id="secqstn" class="form-control" value="<?php echo isset($meta['secqstn']) ? $meta['secqstn']: '' ?>" readonly>
				</div>
				<div class="form-group">
					<label for="secans">Answer</label>
					<input type="text" name="secans" id="secans" class="form-control" value="" required>
				</div>
			</form>
		</div>
	</div>
	<div class="card-footer">
		<div class="col-md-12">
			<div class="row">
				<button id="update-button" class="btn btn-sm btn-primary">Update</button>
			</div>
		</div>
	</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	$(function() {
		$('#update-button').click(function(e) {
			e.preventDefault();
			//$('#update-button').hide();
			$('#manage-user').submit();
		});

		$('#manage-user').submit(function(e) {
			e.preventDefault();

			// Retrieve the security answer
			var secans = $('#secans').val();

			// Validate the security answer
			if (secans !== '<?php echo $_settings->userdata('secans'); ?>') {
				$('#msg').html('<div class="alert alert-danger">Invalid security answer</div>');
				return;
			}

			// Proceed with the update
			start_loader();
			$.ajax({			url: _base_url_+'classes/Users.php?f=save_client',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					$('#msg').html('<div class="alert alert-success">Successfully updated</div>');
					location.reload();
				} else {
					$('#msg').html('<div class="alert alert-danger">Username already exists</div>');
					end_loader();
				}
			}
		});
	});
});

</script>
