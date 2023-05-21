<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `accounts` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Withdraw</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form id="account-form">
                <div class="form-group">
                    <label class="control-label">Account Number</label>
                    <input type="text" class="form-control col-sm-6" name="account_number" value="<?php echo $_settings->userdata('account_number') ?>" readonly autocomplete="off">
                    <input type="hidden" value="<?php echo $_settings->userdata('id') ?>" name="account_id">
                    <input type="hidden" value="<?php echo $_settings->userdata('balance') ?>" name="current">
                </div>
                <div class="form-group">
                    <h4><b>Current Balance: <?php echo number_format($_settings->userdata('balance', 2)) ?></b></h4>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label">Withdrawal Amount</label>
                    <input type="number" step="any" min="0" class="form-control col-sm-6 text-left" name="balance" value="0" required>
                </div>
                <button id="submit-button" class="btn btn-primary mr-2">Submit</button>
                <div id="pin-form" style="display: none;">
                    <div class="form-group">
                        <label class="control-label">PIN</label>
                        <input type="password" class="form-control col-sm-6" name="pin" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex w-100">
            <a href="./?page=transaction" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#submit-button').click(function(e) {
            e.preventDefault();
            $('#submit-button').hide();
            $('#pin-form').show();
        });

        $('#account-form').submit(function(e) {
            e.preventDefault();

            // Retrieve the PIN entered by the user
            var pin = $('[name="pin"]').val();

            // Validate the PIN
            if (pin !== '<?php echo $_settings->userdata('pin'); ?>') {
                alert_toast("Invalid PIN. Please try again.", 'error');
                return false;
            }

            // Validate the withdrawal amount against the current balance
            var currentBalance = parseFloat($('[name="current"]').val());
            var withdrawalAmount = parseFloat($('[name="balance"]').val());

            if (currentBalance <= 0) {
    alert_toast("You have no funds",'warning');
    return false;
}
            else if (withdrawalAmount == 0) {
                alert_toast("You cannot withdraw nothing",'warning');
return false;
}
            else if (currentBalance < withdrawalAmount) {
                alert_toast("Amount is greater than your current balance",'warning');
return false;
}
start_loader();

if ($('.err_msg').length > 0)
    $('.err_msg').remove();

$.ajax({
    url: _base_url_+'classes/Master.php?f=withdraw',
    method: 'POST',
    data: $(this).serialize(),
    dataType: 'json',
    error: err => {
        console.log(err);
        alert_toast("An error occurred", "error");
        end_loader();
    },
    success: function(resp) {
        if (resp.status == 'success') {
            currentBalance -= withdrawalAmount;
$('[name="current"]').val(currentBalance.toFixed(2));
            location.reload();
        } else if (!!resp.msg) {
            var msg = $('<div class="err_msg"><div class="alert alert-danger">' + resp.msg + '</div></div>');
            $('#account-form').prepend(msg);
            msg.show('slow');
        } else {
            alert_toast('An error occurred', "error");
            console.log(resp);
        }
        end_loader();
    }
});
});
});
</script>