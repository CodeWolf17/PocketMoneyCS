<h1 class="text-dark">Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="container">
  <div class="row">
    <div class="card col-12 col-md-5 mb-3 mr-md-4" style="background: linear-gradient(to bottom right, #06AED5, #086A9F);">
      <div class="card-body">
        <h3 class="text-white mb-0">Account Number:</h3>
        <h4 class="text-white"><?php echo $_settings->userdata('account_number') ?></h4>
      </div>
    </div>
    <div class="card col-12 col-md-5 mb-3" style="background: linear-gradient(to bottom right, #32CD32, #006400);">
      <div class="card-body">
        <h3 class="text-white mb-0">Total Balance:</h3>
        <h4 class="text-white"><?php echo number_format($_settings->userdata('balance'),2) ?></h4>
      </div>
    </div>
    <div class="card col-12 col-md-5 mb-3 mr-md-4" style="background: linear-gradient(to bottom right, #FF4D4D, #B22222);">
      <div class="card-body">
        <h3 class="text-white mb-0">Fixed Balance:</h3>
        <h4 class="text-white"><?php echo number_format($_settings->userdata('fixed_balance'),2) ?></h4>
      </div>
    </div>
    <div class="card col-12 col-md-5 mb-3" style="background: linear-gradient(to bottom right, #FF69B4, #C71585);">
      <div class="card-body">
        <h3 class="text-white mb-0">Available Balance:</h3>
        <h4 class="text-white"><?php echo number_format($_settings->userdata('available_balance'),2) ?></h4>
      </div>
    </div>
  </div>
  
  <div class="row mt-3">
    <div class="col-6 text-start">
      <button class="btn btn-lg btn-danger">Emergency Withdrawal</button>
    </div>

    <div class="col-6 text-end">
      <button class="btn btn-lg btn-success">Request Withdrawal</button>
    </div>
  </div>
</div>
