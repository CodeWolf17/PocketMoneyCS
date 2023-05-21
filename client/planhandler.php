<?php
// Include the necessary files and perform any required configurations

// Assuming you have already included the necessary files for database connection and configuration

// Form submission code
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $planName = $_POST['planname'];
    $planType = $_POST['plantype'];
    $planMaker = $_POST['planmaker'];
    $planAmount = $_POST['planamount'];
    $planDuration = $_POST['planduration'];
    $userbalance = $_settings->userdata('balance');
    $userId = $_settings->userdata('account_number');
   

    // Perform any additional form data validation

    // Insert the plan details into the database
    $sql = "INSERT INTO plans (planname, plantype, planmaker, planamount, planamountleft, planduration, plandurationleft, planstatus) VALUES ('$planName', '$planType', '$planMaker', '$planAmount', '$planAmount', '$planDuration', '$planDuration', 'active')";

    if ($conn->query($sql) === TRUE) {
        // Update the user's balance by deducting the plan amount
        $newBalance = $userbalance - $planAmount;

        // Update the user's balance in the accounts table
        $updateSql = "UPDATE accounts SET balance = $newBalance WHERE account_number = $userId";

        if ($conn->query($updateSql) === TRUE) {
            // Return a success response
            echo json_encode(array('status' => 'success'));
        } else {
            // Return an error response
            echo json_encode(array('status' => 'error', 'message' => 'Failed to update balance: ' . $conn->error));
        }
    } else {
        // Return an error response
        echo json_encode(array('status' => 'error', 'message' => 'Failed to insert plan: ' . $conn->error));
    }
}
?>
