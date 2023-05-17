 <!-- Header-->
 <header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Services <?php echo $_settings->info('name') ?></h1>
        </div>
    </div>

<style>
  /* The actual timeline (the vertical ruler) */
.main-timeline-2 {
  position: relative;
}

/* The actual timeline (the vertical ruler) */
.main-timeline-2::after {
  content: "";
  position: absolute;
  width: 3px;
  background-color: #26c6da;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.timeline-2 {
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.timeline-2::after {
  content: "";
  position: absolute;
  width: 25px;
  height: 25px;
  right: -11px;
  background-color: #26c6da;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left-2 {
  padding: 0px 40px 20px 0px;
  left: 0;
}

/* Place the container to the right */
.right-2 {
  padding: 0px 0px 20px 40px;
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left-2::before {
  content: " ";
  position: absolute;
  top: 18px;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right-2::before {
  content: " ";
  position: absolute;
  top: 18px;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right-2::after {
  left: -14px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .main-timeline-2::after {
    left: 31px;
  }

  /* Full-width containers */
  .timeline-2 {
    width: 100%;
    padding-left: 70px;
    padding-right: 25px;
  }

  /* Make sure that all arrows are pointing leftwards */
  .timeline-2::before {
    left: 60px;
    border: medium solid white;
    border-width: 10px 10px 10px 0;
    border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left-2::after,
  .right-2::after {
    left: 18px;
  }

  .left-2::before {
    right: auto;
  }

  /* Make all right containers behave like the left ones */
  .right-2 {
    left: 0%;
  }
}
  </style>
</header>
<section class="py-5">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
           


  <div class="container py-5">
    <div class="main-timeline-2">
      <div class="timeline-2 left-2">
        <div class="card">
          <img src="https://img.freepik.com/free-photo/black-woman-with-saving-piggy-bank_657883-724.jpg?t=st=1683929252~exp=1683929852~hmac=b0dccc2b3d71f5460f833f66e674d45119962aba8c3cd084151a65211b295444" class="card-img-top"
            alt="Responsive image">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-4">Daily Fixed Deposits</h4>
            <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2023</p>
            <p class="mb-0">Grow your savings steadily with our daily fixed deposit accounts. 
              Enjoy competitive interest rates and the flexibility to deposit and withdraw funds 
              on a daily basis.</p>
          </div>
        </div>
      </div>

      <div class="timeline-2 right-2">
        <div class="card">
          <img src="https://img.freepik.com/free-photo/front-view-two-stacks-coins-with-jar-plants_23-2148803919.jpg?size=626&ext=jpg&uid=R81843180&ga=GA1.2.1256809972.1683592486&semt=sph" class="card-img-top"
            alt="Responsive image">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-4">Savings</h4>
            <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2023</p>
            <p class="mb-0">Start saving for your future with our reliable savings accounts. 
              Whether you're saving for a specific goal or building an emergency fund, 
              we offer secure and convenient options to help you achieve your financial objectives.</p>
          </div>
        </div>
      </div>

      <div class="timeline-2 left-2">
        <div class="card">
          <img src="https://img.freepik.com/free-photo/person-paying-with-nfc-technology-restaurant_23-2150039472.jpg?size=626&ext=jpg&uid=R81843180&ga=GA1.2.1256809972.1683592486&semt=ais" class="card-img-top"
            alt="Responsive image">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-4">Money Transfer</h4>
            <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2023</p>
            <p class="mb-0"> Easily and securely transfer funds between your accounts within our system. 
              Enjoy the convenience of transferring money between your savings, fixed deposit,
               and other accounts hassle-free. Seamlessly manage your finances and allocate funds where you 
               need them within our trusted platform.</p>
          </div>
        </div>
      </div>
    
      <div class="timeline-2 right-2">
        <div class="card">
          <img src="https://img.freepik.com/free-photo/office-scene-close-up_23-2147626398.jpg?size=626&ext=jpg&uid=R81843180&ga=GA1.2.1256809972.1683592486&semt=ais" class="card-img-top"
            alt="Responsive image">
          <div class="card-body p-4">
            <h4 class="fw-bold mb-4">Financial Advisory</h4>
            <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2023</p>
            <p class="mb-0">We offer expert guidance and strategies to improve your business and financial health. 
              From strategic planning to risk mitigation and financial education, 
              we help you make informed decisions for success.</p>
          </div>
        </div>
      </div>


    </div>
  </div>


            
            </div>
        </div>
    </div>
</section>
