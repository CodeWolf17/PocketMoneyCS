<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT * FROM `accounts` WHERE id = '{$_GET['id']}' ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
}
?>

<?php if ($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
</script>
<?php endif;?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Deposit</h3>
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
                    <div class="control-label" align= "center" ><h3>Instructions: How To Deposit </h3></div>
                    <hr>
                    <div >
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Step 1: Dial *384*666444#</h4>
                                <p>Initiate the deposit process by dialing the provided USSD code on your mobile phone.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-hand-pointer"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Step 2:Choose "5 - M-PESA Services (Huduma za M-PESA)"</h4>
                                <p>Select the option for M-PESA Services from the menu.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Step 3:Choose "3 - Pocket Money"</h4>
                                <p>Select the option for Pocket Money from the available services.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Step 4:Enter the amount to deposit</h4>
                                <p>Specify the desired amount you wish to deposit into your account.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-key"></i>
                            </div>
                           
                            <div class="timeline-content">
                                <h4>Step 5:Enter your MPESA PIN</h4>
                                <p>Provide your MPESA PIN to authorize the deposit transaction.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Congratulations! You Have deposited some cash!</h4>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex w-100">
            <a href="./" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
