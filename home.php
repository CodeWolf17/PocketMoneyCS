 <!-- Header-->
 <header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Welcome <?php echo $_settings->info('name') ?></h1>
        </div>
    </div>
</header>
<!-- Section-->
<?php 
$sched_arr = array();
$max = 0;
?>
<section class="py-5">
    <div class="container d-flex justify-content-center">
       <div class="card col-md-6 p-0">
           <div class="card-header">
               <div class="card-title text-center w-100">Login</div>
           </div>
           <div class="card-body">
               <form action="" id="login-client">
                    <div class="form-group">
                        <label for="account_number" class='control-label'>Phone Number</label>
                        <input type="number" class="form-control" name="account_number" required>
                    </div>
                    <div class="form-group">
                        <label for="pin" class='control-label'>Pascode</label>
                        <input type="password" class="form-control" name="pin" required>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn  btn-primary mr-2">Login</button>

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