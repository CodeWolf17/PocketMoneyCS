<!-- Header -->
<header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">About <?php echo $_settings->info('name') ?></h1>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
                <!-- HTML code for Reset Password form -->
                <form class="form-floating" action="./?p=reset_password" method="post">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="new_pin" oninput="this.value = this.value.replace(/[^0-9]/g, '');" id="new_pin" minlength="4" maxlength="4" placeholder="Enter new PIN" required>
                        <label for="new_pin">Enter your new 4-digit PIN:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="confirm_pin" oninput="this.value = this.value.replace(/[^0-9]/g, '');" id="confirm_pin" minlength="4" maxlength="4" placeholder="Confirm new PIN" required>
                        <label for="confirm_pin">Confirm your new PIN:</label>
                    </div>
                    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>

                <?php
                // PHP code for updating password in the database
                if (isset($_POST['token'])) {
                    $token = $_POST['token'];
                    $new_pin = $_POST['new_pin'];
                    $confirm_pin = $_POST['confirm_pin'];

                    // Check if new PIN and confirm PIN match
                    if ($new_pin !== $confirm_pin) {
                        echo "New PIN and confirm PIN do not match.";
                        exit();
                    }

                    // Validate new PIN here

                    // Retrieve the email associated with the reset token from the database
                    $qry = $conn->query("SELECT * FROM password_reset_requests WHERE reset_token = '$token'");
                    if ($qry->num_rows > 0) {
                        $request = $qry->fetch_assoc();
                        $email = $request['email'];
                        $timestamp = $request['created_at'];

                        // Check if the reset token is valid and not expired (e.g., within the last 24 hours)
                        $expirationTime = 15 * 60; // 15 minutes in seconds
                        //$expirationTime = 24 * 60 * 60; // 24 hours in seconds
                        if (time() - $timestamp > $expirationTime) {
                            echo "Token has expired. Please request a new password reset.";
                            exit();
                        }

                        // Update the user's password in the database
                        // You can use a separate "users" table for this
                        // Remember to hash the new password before saving it to the database

                        // Example code to update the password using PDO prepared statement
                        $hashed_password = password_hash($new_pin, PASSWORD_DEFAULT);
                        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
                        $stmt->bind_param("ss", $hashed_password, $email);
                        $stmt->execute();

                        // Delete the password reset request from the database
                        $conn->query("DELETE FROM password_reset_requests WHERE reset_token = '$token'");

                        echo "Password updated successfully!";
                    } else {
                        echo "Invalid token. Please request a new password reset.";
                        exit();
                      }
                    }
                    ?>
                </div>
            </div>
        </div>
        