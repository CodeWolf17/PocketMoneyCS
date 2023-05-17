<!-- Header -->
<header class="bg-dark py-5" id="main-header">
  <div class="container px-4 px-lg-5 my-5">
    <div class="text-center text-white">
      <h1 class="display-4 fw-bolder">Contact Us <?php echo $_settings->info('name') ?></h1>
    </div>
  </div>
</header>

<section class="py-5">
  <div class="container">
    <div class="card rounded-0">
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Contact Us</h2>
            <form method="post" action="mailto:pocketmoneycs@gmail.com?subject=Customer's%20Message" enctype="text/plain" name="contact" subject="Form Submission">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Your Name" name="name" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control form-control-lg" placeholder="Your Email" name="email" required>
              </div>
              <div class="form-group">
                <textarea class="form-control form-control-lg" rows="5" placeholder="Your Message" name="message" required></textarea>
              </div>
              <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">
            </form>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-8 offset-md-2">
            <div class="text-left">
              <h4 class="mb-2">More Information</h4>
              <h6 class="mb-2"><strong>Email:</strong> pocketmoneycs@gmail.com</h6>
              <h6 class="mb-2"><strong>Phone:</strong> +255 735 444 117</h6>
              <h6 class="mb-2"><strong>Address:</strong> Dar es Salaam, Mabibo</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
