<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountNumber = $_POST['account_number'];
    $pin = $_POST['pin'];

    // Prepare the SQL statement to select the user based on account number and PIN
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE account_number = ? AND pin = ?");
    $stmt->bind_param("is", $accountNumber, $pin);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['account_number'] = $accountNumber;
        header("Location: ./?page=dashboard"); // Redirect to the dashboard page
        exit;
    } else {
        // Login failed
        $_SESSION['error'] = "Invalid account number or PIN.";
        header("Location: ./?p=login"); // Redirect back to the login page
        exit;
    }
}

?>

<!-- Header -->
<header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Welcome <?php echo htmlspecialchars($_settings->info('name'), ENT_QUOTES); ?></h1>
        </div>
    </div>
</header>

<!-- Section -->
<section class="py-5">
    <div class="container d-flex justify-content-center">
       <div class="card col-md-6 p-0">
           <div class="card-header">
               <div class="card-title text-center w-100">Login</div>
           </div>
           <div class="card-body">
               <?php if (isset($_SESSION['error'])): ?>
               <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['error'], ENT_QUOTES); ?></div>
               <?php unset($_SESSION['error']); ?>
               <?php endif; ?>
               <form action="" id="login-client" method="POST">
                    <div class="form-group">
                        <label for="account_number" class='control-label'>Phone Number</label>
                        <input type="number" class="form-control" name="account_number" required>
                    </div>
                    <div class="form-group">
                        <label for="pin" class='control-label'>Pascode</label>
                        <input type="password" class="form-control" name="pin" required>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-primary mr-2">Login</button>
                        <a href="./?p=signup" class="btn btn-success">Signup</a>
                    </div>
                    <a href="./?p=forgot_password">Forgot Password?</a>
               </form>
           </div>
       </div>
    </div>
</section>

<script>
</script>
