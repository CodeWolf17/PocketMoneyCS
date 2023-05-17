 <!-- Header-->
 <header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">New Account <?php echo $_settings->info('name') ?></h1>
        </div>
    </div>
</header>
<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `accounts` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
}
}
?>
<section class="py-5">
    <div class="container">
       
 
           
<div class="card card-outline card-primary">
    <div class="card-header" >
    <h3 class="card-title text-center w-100"><?php echo isset($_GET['id']) ? 'Update Account' : "Create New Account"; ?></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form id="account-form">
                <input type="hidden" name="id" value='<?php echo isset($id)? $id : '' ?>'>
                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input type="number" class="form-control col-sm-6"  name="account_number" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="10" value="<?php echo isset($account_number)? $account_number : '' ?>" required>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo isset($firstname)? $firstname : '' ?>" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Middle Name</label>
                        <input type="text" class="form-control" name="middlename" value="<?php echo isset($middlename)? $middlename : '' ?>" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo isset($lastname)? $lastname : '' ?>" required>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control col-sm-6" name="email" value="<?php echo isset($email)? $email : '' ?>" required>
                </div>
               
                
                <?php if(!isset($id)): ?>
                    <div class="form-group">
                        <label class="control-label">PIN</label>
                        <div class="input-group m-0 p-0  col-sm-6">
                        <input type="password" class="form-control " name="pin" oninput="this.value = this.value.replace(/[^0-9]/g, '');" id="confirmed_pin" maxlength="4" value="<?php echo isset($pin)? $pin : '' ?>"  <?php echo (!isset($id)) ? "required" : '' ?> >
                       <!--
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="generate_pass">Generate</button>
                        </div> 
                -->    
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label">Confirm PIN</label>
                        <input type="password" class="form-control col-sm-6" name="confirmed_pin" oninput="this.value = this.value.replace(/[^0-9]/g, '');" id="confirmed_pin" maxlength="4" value="<?php echo isset($confirmed_pin)? $confirmed_pin : '' ?>" required> 
                    </div>
                    <!--
                    <div class="form-group">
                    <label class="control-label">Beginning Balance</label>
                    -->

                    <div class="form-group">
  <label class="control-label">Security Question</label>
  <select class="form-control col-sm-6" name="secqstn" required>
    <option value="">Select a Security Question</option>
    <option value="What was the name of your favorite childhood toy?">What was the name of your favorite childhood toy?</option>
    <option value="What was the first concert you attended?">What was the first concert you attended?</option>
    <option value="What is your favorite holiday destination?">What is your favorite holiday destination?</option>
    <option value="What is your favorite movie?">What is your favorite movie?</option>
    <option value="What is the name of your childhood hero?">What is the name of your childhood hero?</option>
    <option value="What is your favorite book?">What is your favorite book?</option>
    <option value="What is the name of your favorite teacher?">What is the name of your favorite teacher?</option>
  </select>
</div>


                <div class="form-group">
                    <label class="control-label">Answer</label>
                    <input type="text" class="form-control col-sm-6" name="secans" value="<?php echo isset($secans)? $secans : '' ?>" required>
                </div>

                    <input type="number" step='any' min = "0" class="form-control col-sm-6 text-right" name="balance" value="0" required hidden>
                </div>
               
                <?php endif; ?>

           
        <div class="d-flex w-100 d-flex justify-content-center">
            <button form="account-form" class="btn btn-primary mr-2">Save</button>
            <a href="./?page=accounts" class="btn btn-danger">Cancel</a>
        </div>

            </form>
        </div>
    </div>
  
</div>
             


          
</div>
</section>

    </script>
<script>

$(function(){

    $('#generate_pass').click(function(){
        var randomstring = Array.from({length:4},()=>Math.floor(Math.random()*10));
        $('[name="pin"]').val(randomstring.join(''))
    })

    $('[name="account_number"]').on('input',function(){
        if($('._checks').length >0)
            $('._checks').remove()
        $('button[form="account-form"]').attr('disabled',true)
        $(this).removeClass('border-danger')
        $(this).removeClass('border-success')
        var checks = $('<small class="_checks">')
        checks.text("Checking availablity") 
        $('[name="account_number"]').after(checks)
        $.ajax({
            url:_base_url_+'classes/Master.php?f=check_account',
            method:'POST',
            data:{id:$('[name="id"]').val(),account_number: $(this).val()},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("An error occured","error")
                end_loader()
            },
            success:function(resp){
                if(resp.status == 'available'){
                    checks.addClass('text-success')
                    checks.text('Available')
                    $('[name="account_number"]').addClass('border-success')
                    $('button[form="account-form"]').attr('disabled',false)
                }else if(resp.status == 'taken'){
                    checks.addClass('text-danger')
                    checks.text('Account already exist')
                    $('[name="account_number"]').addClass('border-danger')
                    $('button[form="account-form"]').attr('disabled',true)
                }else{
                    alert_toast('An error occured',"error")
                    $('[name="account_number"]').addClass('border-danger')
                    console.log(resp)
                }
                end_loader()
            }
        })
    })

    $('#account-form').submit(function(e){
        e.preventDefault()
        start_loader()
        if($('.err_msg').length > 0)
            $('.err_msg').remove()
        if($('[name="pin"]').val().length !== 4){
            var msg = $('<div class="err_msg"><div class="alert alert-danger">PIN must be 4 digits</div></div>')
            $('#account-form').append(msg) 
            msg.show('slow')
            end_loader()
            return
        }
        if($('[name="account_number"]').val().length !== 10){
            var msg = $('<div class="err_msg"><div class="alert alert-danger">Phone Number Must Be 10 Digits</div></div>')
            $('#account-form').append(msg) 
            msg.show('slow')
            end_loader()
            return
        }
        if($('[name="pin"]').val() !== $('[name="confirmed_pin"]').val()){
            var msg = $('<div class="err_msg"><div class="alert alert-danger">PINs do not match</div></div>')
            $('#account-form').append(msg) 
            msg.show('slow')
            end_loader()
            return
        }
        $.ajax({
            url:_base_url_+'classes/Master.php?f=save_account',
            method:'POST',
            data:$(this).serialize(),
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("An error occured","error")
                end_loader()
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.href="./?page=accounts"
                }else if(!!resp.msg){
                     var msg = $('<div class="err_msg"><div class="alert alert-danger">'+resp.msg+'</div></div>')
                     $('#account-form').prepend(msg) 
                     msg.show('slow')
                }else{
                    alert_toast('An error occured',"error")
                    console.log(resp)
                }
                end_loader()
            }
        })
    })
})

</script>
