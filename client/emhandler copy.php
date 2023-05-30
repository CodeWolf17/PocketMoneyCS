<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Retrieve the form data
//     $current = $_POST['current'];
//     $balance = $_POST['balance'];
//     $ogtimeleft = $_POST['ogtimeleft'];
//     $timeleft = $_POST['timeleft'];
//     $planid = $_POST['planid'];
//     $account_id = $_settings->userdata('account_number');
//     $balance_id = $_settings->userdata('balance');

//     $update = "UPDATE `plans` SET `planewstatus` = 'no' WHERE `planid` = $planid";
//     $conn->query($update);

//     header("Location: ./?page=transfer");
//     exit(); // Terminate the script execution
// }
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       // Retrieve the query parameters
       $planid = $_POST['planid'];
       $current = $_POST['current'];
       echo $planid;
       echo $current;
   
   
       // Perform the database update
//        $update = "UPDATE `plans` SET `planewstatus` = 'no' WHERE `planid` = $planid";
//        if ($conn->query($update) === TRUE) {
//            echo "Record updated successfully";
//        } else {
//            echo "Error updating record: " . $conn->error;
//        }
   } else {
       echo "Plan ID is not set.";
   }
   
   
   
// header("Location: ./?page=transfer");
//         $new_balance = $current - $balance;
//         $new_time = $ogtimeleft - $timeleft;

//         $update = $conn->query("UPDATE `plans` SET `planamountleft` = $new_balance, `planewstatus` = 'no', `plandurationleft` = $new_time WHERE `planid` = $planid");
//         $conn->query($update);
//         header("Location: ./?page=transfer");
//         if ($update === TRUE) {
//             $trans_balance = $balance_id + $balance;
//             $balupdate = $conn->query("UPDATE `accounts` SET `balance` = $trans_balance WHERE `account_number` = $account_id");
//             $conn->query($balupdate);
       
//             if ($balupdate === TRUE) {
//                 // Return a success response
//                 echo json_encode(array('status' => 'success'));
//                 header("Location: ./?page=transfer");
//             } else {
//                 // Return an error response
//                 $errorMessage = 'Failed to update balance: ' . $this->conn->error;
//                 echo json_encode(array('status' => 'error', 'message' => $errorMessage));
//                 echo "<script>alert_toast('Error: $errorMessage');</script>";
//                 header("Location: ./?page=transfer");
//             }
//         } else {
//             // Return an error response
//             $errorMessage = 'Failed to update plan: ' . $this->conn->error;
//             echo json_encode(array('status' => 'error', 'message' => $errorMessage));
//             echo "<script>alert_toast('Error: $errorMessage');</script>";
//             header("Location: ./?page=transfer");
//         }
//     }
// ?>
