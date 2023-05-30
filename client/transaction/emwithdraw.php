<?php
// Get the user's account number and planid
$accountNumber = $_settings->userdata('account_number');
$planid = $_GET['planid'];
$dwm_amount = intval($_GET['dwm_amount']);

// Retrieve the fixed balance from the plans table
$fixedBalanceQuery = "SELECT * FROM plans WHERE planid = '$planid'";
$result = $conn->query($fixedBalanceQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $planfixedBalance = $row['planamountleft'];
    $ogplantimeleft = intval($row['plandurationleft']);
    $plantimeleft = intval($row['plandurationleft']);
} else {
    $planfixedBalance = 0;
}

// Calculate the available balance
if ($plantimeleft % 2 != 0) {
    $plantimeleft -= 1;
    $timeleft = intval($plantimeleft) / 2;
} else {
    $timeleft = intval($plantimeleft) / 2;
}

$availableemergency = intval($timeleft * $dwm_amount);
?>

<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `accounts` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k = $v;
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
        <h3 class="card-title">Withdraw Amount From Fixed Balance (EW)</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form id="account-form" method="post" action="./?page=emhandler">
                <div class="form-group">
                    <label class="control-label">Account Number</label>
                    <input type="text" class="form-control col-sm-6" name="account_number" value="<?php echo $_settings->userdata('account_number') ?>" readonly autocomplete="off">
                    <input type="hidden" value="<?php echo $planid ?>" name="planid">
                    <input type="hidden" value="<?php echo $planfixedBalance ?>" name="fixedleft">
                    <input type="hidden" value="<?php echo $availableemergency ?>" name="current">
                </div>
                <input type="hidden" value="<?php echo $ogplantimeleft ?>" name="ogtimeleft">
                <input type="hidden" value="<?php echo $timeleft ?>" name="timeleft">
                <div class="form-group">
                    <h4><b>Plan Fixed Balance: <?php echo number_format($planfixedBalance, 2) ?></b></h4>
                </div>
                <div class="form-group">
                    <h4><b>Allowed Withdrawal Amount: <?php echo number_format($availableemergency, 2) ?></b></h4>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label">Withdrawal Amount</label>
                    <input type="number" step="any" min="0" class="form-control col-sm-6 text-left" name="balance" value="<?php echo $availableemergency ?>" readonly required>
                </div>
                <button id="submit-button" class="btn btn-primary mr-2" type="button">Submit</button>
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
    $(function () {
        $('#submit-button').click(function (e) {
            e.preventDefault();
            $('#submit-button').hide();
            $('#pin-form').show();
        });

        $('#account-form').submit(function (e) {
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
            var ogtimeleft = $('[name="ogtimeleft"]').val();
            var timeleft = $('[name="timeleft"]').val();
            var planid = $('[name="planid"]').val();

            if (currentBalance <= 0) {
                alert_toast("You have no funds", 'warning');
                return false;
            } else if (withdrawalAmount == 0) {
                alert_toast("You cannot withdraw nothing", 'warning');
                return false;
            } else if (currentBalance < withdrawalAmount) {
                alert_toast("Amount is greater than your allowed balance", 'warning');
                return false;
            }

            start_loader();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    alert_toast('Error: ' + xhr.responseText, 'error');
                },
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        alert_toast(response.message, 'success');
                        window.location.href = "./?page=emhandler";
                    } else {
                        alert_toast(response.message, 'error');
                    }
                },
                complete: function () {
                    end_loader();
                    window.location.href="./?page=transaction/fixedplan&response";
                }
            });
        });
    });
</script>







