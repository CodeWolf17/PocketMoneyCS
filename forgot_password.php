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
                <?php
                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        // Invalid email address
                        echo '<div class="alert alert-danger" role="alert">Invalid email address. Please try again.</div>';
                    } else {
                        $qry = $conn->query("SELECT * FROM `accounts` WHERE `email` = '$email'");

                        if ($qry->num_rows > 0) {
                            // Continue with the remaining code for sending the reset link
                            $reset_token = bin2hex(random_bytes(32));

                            // Save reset token in the database along with the user's email and current timestamp
                            $timestamp = time(); // Current timestamp
                            $conn->query("INSERT INTO password_reset_requests (email, reset_token, created_at) VALUES ('$email', '$reset_token', $timestamp)");

                            // Send an email to the user with the reset link
                            $reset_link = "http://pocketmoneycs.000webhostapp.com/reset_password.php?token=$reset_token";
                            $message = "Click the link below to reset your password:\n$reset_link";
                            mail($email, "Password Reset Request", $message);

                            // Reset link successfully sent to email
                            echo '<div class="alert alert-success" role="alert">Reset link has been sent to your email. Please check your inbox.</div>';
                        } else {
                            // User with the given email not found
                            echo '<div class="alert alert-danger" role="alert">Invalid email address. Please try again.</div>';
                        }
                    }
                }
                ?>

                <!-- HTML code for Forgot Password form -->
                <form class="form-floating" action="./?p=forgot_password" method="post">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                        <label for="email">Enter your associated account email:</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
