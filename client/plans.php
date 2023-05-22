


                                <style>

a {
    text-decoration: none;
}

.pricingTable {
    text-align: center;
    background: #fff;
    margin: 2px;
    box-shadow: 0 0 10px #ababab;
    padding-bottom: 40px;
    border-radius: 10px;
    color: #cad0de;
    transform: scale(1);
    transition: all .5s ease 0s
}

.pricingTable:hover {
    transform: scale(1.05);
    z-index: 1
}

.pricingTable .pricingTable-header {
    padding: 40px 0;
    background: #f5f6f9;
    border-radius: 10px 10px 50% 50%;
    transition: all .5s ease 0s
}

.pricingTable:hover .pricingTable-header {
    background: #ff9624
}

.pricingTable .pricingTable-header i {
    font-size: 50px;
    color: #858c9a;
    margin-bottom: 10px;
    transition: all .5s ease 0s
}

.pricingTable .price-value {
    font-size: 35px;
    color: #ff9624;
    transition: all .5s ease 0s
}

.pricingTable .month {
    display: block;
    font-size: 14px;
    color: #cad0de
}

.pricingTable:hover .month,
.pricingTable:hover .price-value,
.pricingTable:hover .pricingTable-header i {
    color: #fff
}

.pricingTable .heading {
    font-size: 24px;
    color: #ff9624;
    margin-bottom: 20px;
    text-transform: uppercase
}

.pricingTable .pricing-content ul {
    list-style: none;
    padding: 0;
    margin-bottom: 30px
}

.pricingTable .pricing-content ul li {
    line-height: 30px;
    color: #a7a8aa
}

.pricingTable .pricingTable-signup a {
    display: inline-block;
    font-size: 15px;
    color: #fff;
    padding: 10px 35px;
    border-radius: 20px;
    background: #ffa442;
    text-transform: uppercase;
    transition: all .3s ease 0s
}

.pricingTable .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #ffa442
}

.pricingTable.blue .heading,
.pricingTable.blue .price-value {
    color: #4b64ff
}

.pricingTable.blue .pricingTable-signup a,
.pricingTable.blue:hover .pricingTable-header {
    background: #4b64ff
}

.pricingTable.blue .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #4b64ff
}

.pricingTable.red .heading,
.pricingTable.red .price-value {
    color: #ff4b4b
}

.pricingTable.red .pricingTable-signup a,
.pricingTable.red:hover .pricingTable-header {
    background: #ff4b4b
}

.pricingTable.red .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #ff4b4b
}

.pricingTable.green .heading,
.pricingTable.green .price-value {
    color: #40c952
}

.pricingTable.green .pricingTable-signup a,
.pricingTable.green:hover .pricingTable-header {
    background: #40c952
}

.pricingTable.green .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #40c952
}

.pricingTable.blue:hover .price-value,
.pricingTable.green:hover .price-value,
.pricingTable.red:hover .price-value {
    color: #fff
}



.white-mode {
    text-decoration: none;
    padding: 17px 40px;
    background-color: yellow;
    border-radius: 3px;
    color: black;
    transition: .35s ease-in-out;
    position: absolute;
    left: 15px;
    bottom: 15px
}
</style>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-pzjw8f+ua6Il3o+DstPFA+nCTlc8B3fWr7ARxPs/7M8e5N16qZUovPrE5dK6j5g0"
    crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-7YZmA2w1OVQk8o9f+5E6shMFWxJ6h5j7v5mU8VIy4vATA7D8AiS6FwjozFysZiim"
    crossorigin="anonymous"></script>
  <title>Plan Details</title>
</head>

<body>
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h2 class="card-title">Fixed Plans</h2>
    </div>
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="pricingTable">
              <div class="pricingTable-header">
                <i class="fa fa-adjust"></i>
                <div class="price-value">3,500 - 14,000 TZS</div>
              </div>
              <h3 class="heading">Daily Week Bundle</h3>
              <div class="pricing-content">
                <ul>
                  <li><b>Daily Fixed deposit for one week</b></li>
                  <li>+Withdraw a fixed amount daily for a week</li>
                  <li>+Ideal for saving money over a shorter period</li>
                </ul>
              </div>
              <div class="pricingTable-signup">
                <a href="#" class="choose-plan" data-plan="Daily Week Bundle">Choose Plan</a>
              </div>
            </div>
          </div>


          <div class="col-md-3 col-sm-6">
            <div class="pricingTable green">
              <div class="pricingTable-header">
                <i class="fa fa-cube"></i>
                <div class="price-value">15,000 - 60,000 TZS</div>
              </div>
              <h3 class="heading">Daily Mo Bundle</h3>
              <div class="pricing-content">
                <ul>
                  <li><b>Fixed deposit daily for one month</b></li>
                  <li>+Withdraw a fixed amount daily for a month</li>
                  <li>+Ideal for saving money over a longer period</li>
                </ul>
              </div>
              <div class="pricingTable-signup">
                <a href="#" class="choose-plan" data-plan="Daily Mo Bundle">Choose Plan</a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="pricingTable blue">
              <div class="pricingTable-header">
                <i class="fa fa-briefcase"></i>
                <div class="price-value">Flexible Amount</div>
              </div>
              <h3 class="heading">Weekly Salary</h3>
              <div class="pricing-content">
                <ul>
                  <li><b>Choose number of weeks to save</b></li>
                  <li>+Amount divided according to the chosen amount of weeks</li>
                  <li>+Withdraw a fixed amount weekly</li>
                </ul>
              </div>
              <div class="pricingTable-signup">
                <a href="#" class="choose-plan" data-plan="Weekly Salary">Choose Plan</a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="pricingTable red">
              <div class="pricingTable-header">
                <i class="fa fa-briefcase"></i>
                <div class="price-value">Flexible Amount</div>
              </div>
              <h3 class="heading">Monthly Salary</h3>
              <div class="pricing-content">
                <ul>
                  <li><b>Choose number of months to save</b></li>
                  <li>+Amount divided according to the chosen amount of months</li>
                  <li>+Withdraw a fixed amount monthly</li>
                </ul>
              </div>
              <div class="pricingTable-signup">
                <a href="#" class="choose-plan" data-plan="Monthly Salary">Choose Plan</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div id="plan-form" style="display: none;">
  <div class="form-group">
                    <h4><b>Current Balance: <?php echo number_format($_settings->userdata('balance', 2)) ?></b></h4>
                </div>
                <hr>
    <h3>Plan Details</h3>
    <form id="plan-details-form">
      <input type="hidden" id="planmaker" required readonly value="<?php echo $_settings->userdata('account_number') ?>" />

      <div class="form-group">
        <label for="planname">Plan Name</label>
        <input type="text" class="form-control" id="planname" required>
      </div>

      <div class="form-group">
        <label for="plantype">Plan Type</label>
        <input type="text" class="form-control" id="plantype" readonly>
      </div>

      <div class="form-group">
        <label for="planamount">Plan Amount</label>
        <input type="number" class="form-control" id="planamount" min="0" required>
      </div>

      <div class="form-group" id="plandur-select">
        <label for="planduration">Plan Duration</label>
        <input type="text" class="form-control" id="planduration" readonly>
      </div>

      <div class="form-group" id="week-select" style="display: none;">
        <label for="plandurationweeks">Number of Weeks</label>
        <select class="form-control" id="plandurationweeks">
          <option value="1">1 week</option>
          <option value="2">2 weeks</option>
          <option value="3">3 weeks</option>
          <option value="4">4 weeks</option>
        </select>
      </div>

      <div class="form-group" id="month-select" style="display: none;">
        <label for="plandurationmonths">Number of Months</label>
        <select class="form-control" id="plandurationmonths">
          <option value="1">1 month</option>
          <option value="2">2 months</option>
          <option value="3">3 months</option>
          <option value="4">4 months</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
<?php
$userbalanceogc = number_format($_settings->userdata('balance', 2)) ;
$userbalanceog = str_replace(",","",$userbalanceogc);

?>

  <script>
     
     $(document).ready(function() {
  $(".choose-plan").click(function(e) {
    e.preventDefault();
    var planType = $(this).data("plan");
    $("#plantype").val(planType);
    $("#plan-form").show();
    $("#plandurationweeks").val();
    $("#plandurationmonths").val();
    $("#planduration").val();

    if (planType === "Daily Week Bundle") {
      planDuration = "7 days";
    } 
    else if (planType === "Daily Mo Bundle") {
      planDuration = "30 days";
    } 
    else if (planType === "Weekly Salary") {
      var weeks = parseInt($("#plandurationweeks").val());
      planDuration = weeks + " week" + (weeks > 1 ? "s" : "");
    } 
    else if (planType === "Monthly Salary") {
      var months = parseInt($("#plandurationmonths").val());
      planDuration = months + " month" + (months > 1 ? "s" : "");
    }

    if (planType === "Daily Week Bundle") {
        $("#plandur-select").show();
        $("#planduration").val(planDuration);
      $("#week-select").hide();
      $("#month-select").hide();
    } else if (planType === "Daily Mo Bundle") {
        $("#planduration").val(planDuration);
        $("#plandur-select").show();
      $("#week-select").hide();
      $("#month-select").hide();
    } else if (planType === "Weekly Salary") {
      $("#plandur-select").hide();
      $("#planduration").val(planDuration);
      $("#week-select").show();
      $("#month-select").hide();
    } else if (planType === "Monthly Salary") {
        $("#planduration").val(planDuration);
      $("#plandur-select").hide();
      $("#week-select").hide();
      $("#month-select").show();
    }
  });

  $("#plan-details-form").submit(function(e) {
    e.preventDefault();
    var planName = $("#planname").val();
    var planType = $("#plantype").val();
    var planMaker = $("#planmaker").val();
    var planAmount = parseInt($("#planamount").val());
    var planDuration = $("#planduration").val();
    var userbalance = parseInt(<?php echo $userbalanceog ?>);
    var plandurint = parseInt(planDuration);

    if (planType === "Daily Week Bundle") {
      planDuration = "7 days";
      if (planAmount < 3500 || planAmount > 14000) {
        alert_toast("Please enter a valid plan amount between 3,500/= and 14,000/=", 'warning');
        return;
      } else if (planAmount % plandurint != 0  ) {
        alert_toast("Amount should be divisible by " + plandurint + " !", 'warning');
        return;
      } else if (planAmount > userbalance) {
        alert_toast("Insufficient balance!", 'warning');
        return;
      }
       else {
        // Insert the plan details into the database
        var data = {
          planname: planName,
          plantype: planType,
          planmaker: planMaker,
          planamount: planAmount,
          planduration: planDuration
        };

        $.ajax({
          type: "POST",
          url: "./?page=planhandler", // Replace with the actual file name or URL that handles the form submission
          data: data,
          success: function(response) {
            if (response === "success") {
              // Update the user's balance by deducting the plan amount
              var newBalance = userbalance - planAmount;
              // Perform any additional actions or display a success message
              alert_toast("Plan successfully set.");
            } else {
              // Handle any error response
              alert_toast("Error: " + response, 'warning');
            }
          },
          error: function(xhr, status, error) {
            // Handle the AJAX request error
            alert_toast("Error: " + response, 'warning');
          }
        });
      }
    } 
    else if (planType === "Daily Mo Bundle") {
      planDuration = "30 days";
      if (planAmount < 15000 || planAmount > 60000) {
        alert_toast("Please enter a valid plan amount between 15,000/= and 60,000/=", 'warning');
        return;
      } else if (planAmount % plandurint != 0  ) {
        alert_toast("Amount should be divisible by " + plandurint + " !", 'warning');
        return;
      } else if (planAmount > userbalance) {
        alert_toast("Insufficient balance!", 'warning');
        return;
      } else {
        // Insert the plan details into the database
        var data = {
          planname: planName,
          plantype: planType,
          planmaker: planMaker,
          planamount: planAmount,
          planduration: planDuration
        };

        $.ajax({
          type: "POST",
          url: "./?page=planhandler", // Replace with the actual file name or URL that handles the form submission
          data: data,
          success: function(response) {
            if (response === "success") {
              // Update the user's balance by deducting the plan amount
              var newBalance = userbalance - planAmount;
              // Perform any additional actions or display a success message
              alert_toast("Plan successfully set.");
            } else {
              // Handle any error response
              alert_toast("Error: " + response, 'warning');
            }
          },
          error: function(xhr, status, error) {
            // Handle the AJAX request error
            alert_toast("Error: " + response, 'warning');
          }
        });
      }
    }
    else if (planType === "Weekly Salary") {
      var weeks = parseInt($("#plandurationweeks").val());
      planDuration = weeks + " week" + (weeks > 1 ? "s" : "");
      if (planAmount < 3500) {
        alert_toast("You can deposit from 3,500/=", 'warning');
        return;
      } else if (planAmount % plandurint != 0  ) {
        alert_toast("Amount should be divisible by " + plandurint + " !", 'warning');
        return;
      } else if (planAmount > userbalance) {
        alert_toast("Insufficient balance!", 'warning');
        return;
      } else {
        // Insert the plan details into the database
        var data = {
          planname: planName,
          plantype: planType,
          planmaker: planMaker,
          planamount: planAmount,
          planduration: planDuration
        };

        $.ajax({
          type: "POST",
          url: "./?page=planhandler", // Replace with the actual file name or URL that handles the form submission
          data: data,
          success: function(response) {
            if (response === "success") {
              // Update the user's balance by deducting the plan amount
              var newBalance = userbalance - planAmount;
              // Perform any additional actions or display a success message
              alert_toast("Plan successfully set.");
            } else {
              // Handle any error response
              alert_toast("Error: " + response, 'warning');
            }
          },
          error: function(xhr, status, error) {
            // Handle the AJAX request error
            alert_toast("Error: " + response, 'warning');
          }
        });
      }
    } 
    else if (planType === "Monthly Salary") {
      var months = parseInt($("#plandurationmonths").val());
      planDuration = months + " month" + (months > 1 ? "s" : "");
      if (planAmount < 14000) {
        alert_toast("You can deposit from 14,000/=", 'warning');
        return;
      } else if (planAmount % plandurint != 0  ) {
        alert_toast("Amount should be divisible by " + plandurint + " !", 'warning');
        return;
      } else if (planAmount > userbalance) {
        alert_toast("Insufficient balance!", 'warning');
        return;
      } else {
        // Insert the plan details into the database
        var data = {
          planname: planName,
          plantype: planType,
          planmaker: planMaker,
          planamount: planAmount,
          planduration: planDuration
        };

        $.ajax({
          type: "POST",
          url: "./?page=planhandler", // Replace with the actual file name or URL that handles the form submission
          data: data,
          success: function(response) {
            if (response === "success") {
              // Update the user's balance by deducting the plan amount
              var newBalance = userbalance - planAmount;
              // Perform any additional actions or display a success message
              alert_toast("Plan successfully set.");
            } else {
              // Handle any error response
              alert_toast("Error: " + response, 'warning');
            }
          },
          error: function(xhr, status, error) {
            // Handle the AJAX request error
            alert_toast("Error: " + response, 'warning');
          }
        });
      }
    }

    var planAmountLeft = planAmount;
    var planDurationLeft = planDuration;
    var planStatus = "active";

    if (planAmount < 0 || isNaN(planAmount)) {
      alert_toast("Please enter a valid plan amount.", 'warning');
      return;
    }

    console.log("Plan Name: " + planName);
    console.log("Plan Type: " + planType);
    console.log("Plan Maker: " + planMaker);
    console.log("Plan Amount: " + planAmount);
    console.log("Plan Duration: " + planDuration);
    console.log("Plan Amount Left: " + planAmountLeft);
    console.log("Plan Duration Left: " + planDurationLeft);
    console.log("Plan Status: " + planStatus);

    // Update the necessary fields in the plans table
  });
});

  </script>
</html>

