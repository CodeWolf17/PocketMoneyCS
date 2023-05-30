<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $planfixedBalance = $_POST['fixedleft'];
    $balance = $_POST['balance'];
    $ogtimeleft = $_POST['ogtimeleft'];
    $timeleft = $_POST['timeleft'];
    $planid = $_POST['planid'];
    $account_id = $_settings->userdata('account_number');
    $balance_id = $_settings->userdata('balance');

    $new_balance = $planfixedBalance - $balance;
    $new_time = $ogtimeleft - $timeleft;

    $update = "UPDATE `plans` SET `planamountleft` = $new_balance, `planewstatus` = 'no', `plandurationleft` = $new_time WHERE `planid` = $planid";
    $conn->query($update);

    if ($conn->affected_rows > 0) {
        $trans_balance = $balance_id + $balance;
        $balupdate = "UPDATE `accounts` SET `balance` = $trans_balance WHERE `account_number` = $account_id";
        $conn->query($balupdate);

        if ($conn->affected_rows > 0) {
            // Redirect to success page using JavaScript
            echo "<script>window.location.href = './?page=fixedplan';</script>";
            exit();
        } else {
            // Display an error message
            $errorMessage = 'Failed to update balance: ' . $conn->error;
            echo "<script>alert_toast('Error: $errorMessage');</script>";
            echo "<script>window.location.href = './?page=fixedplan';</script>";
            exit();
        }
    } else {
        // Display an error message
        $errorMessage = 'Failed to update plan: ' . $conn->error;
        echo "<script>alert_toast('Error: $errorMessage');</script>";
        echo "<script>window.location.href = './?page=fixedplan';</script>";
        exit();
    }
}
?>

<script>window.location.href = './?page=fixedplan';</script>