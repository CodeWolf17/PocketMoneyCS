<?php
// Establish database connection
//$conn = new mysqli("localhost", "username", "password", "database_name");

// Check for database connection errors
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
$userAccountNumber = $_settings->userdata('account_number');
// Retrieve Active plans
$query = "SELECT * FROM `plans` WHERE `planmaker` = '$userAccountNumber' AND `planstatus` = 'Active'";
$result = $conn->query($query);

// Loop through the plans
while ($row = $result->fetch_assoc()) {
    $planId = $row['planid'];
    $plan_time = $row['planduration'];
    $plan_amount = $row['planamount'];
    $amountLeft = $row['planamountleft'];
    $dwmAmount = ($plan_amount / intval($plan_time) );
    $plan_time_left = (intval($plan_time) - (($plan_amount - $amountLeft)/$dwmAmount))-1;
    // Check if amount plan status is Active
    $amountPlanStatus = $row['planstatus'];

    if ($amountLeft < 1) {
        $updateStatus = "UPDATE `plans` SET `planstatus` = 'Closed', `planewstatus` = 'no' WHERE `planid` = $planId";
        $conn->query($updateStatus);
        if ($amountLeft < 500) {
            $updateewStatus = "UPDATE `plans` SET `planewstatus` = 'no' WHERE `planid` = $planId";
            $conn->query($updateewStatus);
           }
    } else {
        // Reduce amount left by dwmAmount
        $amountLeft -= $dwmAmount;

        // Update amount left in the database
        $updateQuery = "UPDATE `plans` SET `planamountleft` = $amountLeft WHERE `planid` = $planId";
        $conn->query($updateQuery);
            if ($amountLeft < 500) {
                 $updateewStatus = "UPDATE `plans` SET `planewstatus` = 'no' WHERE `planid` = $planId";
                 $conn->query($updateewStatus);
                }
// Update time left in the database
$updateQuery = "UPDATE `plans` SET `plandurationleft` = $plan_time_left WHERE `planid` = $planId";
$conn->query($updateQuery);

        // Add reduced amount to the user's balance in the accounts tables
        $balanceUpdateQuery = "UPDATE `accounts` SET `balance` = `balance` + $dwmAmount WHERE `account_number` = '$userAccountNumber'";
        $conn->query($balanceUpdateQuery);
    }

    // Check plan type for specific intervals
    $planType = $row['plantype'];

    switch ($planType) {
        case 'Daily Week Bundle':
            $interval = 5; // seconds
            break;
        case 'Daily Mo Bundle':
            $interval = 30; // seconds
            break;
        case 'Weekly Salary':
            $interval = 45; // seconds
            break;
        case 'Monthly Salary':
            $interval = 59; // seconds
            break;
        default:
            $interval = 0; // default interval if plan type is unknown
    }

    // Redirect to planupdate.php with the appropriate interval
    echo "<script>setTimeout(function() { window.location.href = 'planupdate.php'; }, " . ($interval * 1000) . ");</script>";
}

//header("location:./?page=transaction/fixedplan");

// Close the database connection
//$conn->close();
?>
