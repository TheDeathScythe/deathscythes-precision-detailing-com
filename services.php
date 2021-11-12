<?php include ("php/loggedin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Services | Scythe's Precision Detailing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="shortcut icon" href="imgs/favicon.png" />
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Scythe's Precision Detailing</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="booknow">Book Now!</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <?php
            if($isLoggedIn == true)
            {
              echo '<li class="nav-item d-none">';//Hide When Logged In
            }
            else
            {
              echo '<li class="nav-item">';//Show when logged out
            }
          ?>
            <a class="nav-link" href="login">Login/Register</a>
          </li>
          <?php
            if($isLoggedIn == true)
            {
              echo '<li class="nav-item dropdown">';//Show when logged in
            } 
            else
            {
              echo '<li class="nav-item dropdown d-none">';//Hide when logged out
            }
          ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo "$loggedIn_Username"; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="account">Account</a></li>
              <li><a class="dropdown-item" href="appointments">Appointments</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="justify-content-center text-center">
    <h1 class="text-center" style="margin-top:5px; background:#FFF; border-radius:5px;">Exterior Services</h1>
    <div class="card-group container" style="margin-bottom:8px;">
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number1.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">1. Basic Exterior</h5>
          <h6 class="card-subtitle mb-2 text-muted">$15</h6>
          <p class="card-text">Exterior Wash + Exterior Windows</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service1Modal">Learn More</a>
        </div>
      </div>
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number2.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">2. Intermediate Exterior</h5>
          <h6 class="card-subtitle mb-2 text-muted">$20</h6>
          <p class="card-text">#1 + Wheels + Tire Shine</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service2Modal">Learn More</a>
        </div>
      </div>
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number3.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">3. Premium Exterior</h5>
          <h6 class="card-subtitle mb-2 text-muted">$30</h6>
          <p class="card-text">#2 + Hand Wax</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service3Modal">Learn More</a>
        </div>
      </div>
    </div>

    <h1 class="text-center" style="margin-top:5px; background:#FFF; border-radius:5px;">Interior Services</h1>
    <div class="card-group container" style="margin-bottom:5px;">
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number4.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">4. Basic Interior</h5>
          <h6 class="card-subtitle mb-2 text-muted">$15</h6>
          <p class="card-text">Vacuum + Interior Windows</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service4Modal">Learn More</a>
        </div>
      </div>
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number5.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">5. Intermediate Interior</h5>
          <h6 class="card-subtitle mb-2 text-muted">$20</h6>
          <p class="card-text">#1 + Interior Door, Dash, and Console Shine</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service5Modal">Learn More</a>
        </div>
      </div>
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number6.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">6. Premium Interior</h5>
          <h6 class="card-subtitle mb-2 text-muted">$25</h6>
          <p class="card-text">#2 + Floor Mats + Seats</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service6Modal">Learn More</a>
        </div>
      </div>
    </div>

    <h1 class="text-center" style="margin-top:5px; background:#FFF; border-radius:5px;">Inside and Outside</h1>
    <div class="card-group container" style="margin-bottom:5px;">
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number7.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">7. Basic Inside & Out</h5>
          <h6 class="card-subtitle mb-2 text-muted">$25</h6>
          <p class="card-text">Wash + Vacuum + Windows</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service7Modal">Learn More</a>
        </div>
      </div>
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number8.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">8. Intermediate Inside & Out</h5>
          <h6 class="card-subtitle mb-2 text-muted">$35</h6>
          <p class="card-text">#7 + Wheels + Tires + Interior Shine</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service8Modal">Learn More</a>
        </div>
      </div>
      <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom:5px;">
        <img src="imgs\servicecards\number9.png" class="card-img-top" alt="...">
        <div class="card-body">
          <hr />
          <h5 class="card-title">9. Premium Inside & Out</h5>
          <h6 class="card-subtitle mb-2 text-muted">$45</h6>
          <p class="card-text">#8 + Hand Wax + Floor Mats + Seats</p>
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service9Modal">Learn More</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals for "learn more" butttons -->

  <!-- Service #1 Modal -->
  <div class="modal fade" id="service1Modal" tabindex="-1" aria-labelledby="service1Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service1ModalLabel" style="margin: 0 auto;">#1 Basic Exterior</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Exterior Cleaned with Chemical Guys Waterless Wash and Wax</li>
            <li>Exterior Windows Cleaned by Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Service #2 Modal -->
  <div class="modal fade" id="service2Modal" tabindex="-1" aria-labelledby="service2Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service2ModalLabel" style="margin: 0 auto;">#2 Intermediate Exterior</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Wheels Cleaned by a Chemical Guys Wheel Cleaner</li>
            <li>Tires Shined with Chemical Guys Matte shine</li>
            <li>Exterior Cleaned with Chemical Guys Waterless Wash and Wax</li>
            <li>Exterior Windows Cleaned by Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  

  <!-- Service #3 Modal -->
  <div class="modal fade" id="service3Modal" tabindex="-1" aria-labelledby="service3Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service3ModalLabel" style="margin: 0 auto;">#3 Premium Exterior</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Hand Carnauba Wax with Chemical Guys Butter Wet Wax</li>
            <li>Wheels Cleaned by a Chemical Guys Wheel Cleaner</li>
            <li>Tires Shined with Chemical Guys Matte shine</li>
            <li>Exterior Cleaned with Chemical Guys Waterless Wash and Wax</li>
            <li>Exterior Windows Cleaned by Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  

  <!-- Service #4 Modal -->
  <div class="modal fade" id="service4Modal" tabindex="-1" aria-labelledby="service4Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service4ModalLabel" style="margin: 0 auto;">#4 Basic Interior</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Floors, Seats, and Anywhere in between Vacuumed</li>
            <li>Interior Windows Cleaned with Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  

  <!-- Service #5 Modal -->
  <div class="modal fade" id="service5Modal" tabindex="-1" aria-labelledby="service5Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service5ModalLabel" style="margin: 0 auto;">#5 Intermediate Interior</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Interior Console, Doors, and Dashboard Cleaned and Protected</li>
            <li>Floors, Seats, and Anywhere in between Vacuumed</li>
            <li>Interior Windows Cleaned with Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  

  <!-- Service #6 Modal -->
  <div class="modal fade" id="service6Modal" tabindex="-1" aria-labelledby="service6Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service6ModalLabel" style="margin: 0 auto;">#6 Premium Interior</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Floor Mats Scrubbed</li>
            <li>Seats Scrubbed with Turtle Wax Upholstery Cleaner or Leather Cleaner</li>
            <li>Interior Console, Doors, and Dashboard Cleaned and Protected</li>
            <li>Floors, Seats, and Anywhere in between Vacuumed</li>
            <li>Interior Windows Cleaned with Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 

  <!-- Service #7 Modal -->
  <div class="modal fade" id="service7Modal" tabindex="-1" aria-labelledby="service7Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service7ModalLabel" style="margin: 0 auto;">#7 Basic In & Out</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Exterior Cleaned with Chemical Guys Waterless Wash and Wax</li>
            <li>Exterior Windows Cleaned by Non-Streaking, Tint-Safe Glass Cleaner</li>
            <li>Floors, Seats, and Anywhere in between Vacuumed</li>
            <li>Interior Windows Cleaned with Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 

  <!-- Service #8 Modal -->
  <div class="modal fade" id="service8Modal" tabindex="-1" aria-labelledby="service8Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service8ModalLabel" style="margin: 0 auto;">#8 Intermediate In & Out</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Wheels Cleaned by a Chemical Guys Wheel Cleaner</li>
            <li>Tires Shined with Chemical Guys Matte shine</li>
            <li>Interior Console, Doors, and Dashboard Cleaned and Protected</li>
            <li>Exterior Cleaned with Chemical Guys Waterless Wash and Wax</li>
            <li>Exterior Windows Cleaned by Non-Streaking, Tint-Safe Glass Cleaner</li>
            <li>Floors, Seats, and Anywhere in between Vacuumed</li>
            <li>Interior Windows Cleaned with Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 

  <!-- Service #9 Modal -->
  <div class="modal fade" id="service9Modal" tabindex="-1" aria-labelledby="service9Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="service9ModalLabel" style="margin: 0 auto;">#9 Premium In & Out</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Hand Carnauba Wax with Chemical Guys Butter Wet Wax</li>
            <li>Floor Mats Scrubbed</li>
            <li>Seats Scrubbed with Turtle Wax Upholstery Cleaner or Leather Cleaner</li>
            <li>Wheels Cleaned by a Chemical Guys Wheel Cleaner</li>
            <li>Tires Shined with Chemical Guys Matte shine</li>
            <li>Interior Console, Doors, and Dashboard Cleaned and Protected</li>
            <li>Exterior Cleaned with Chemical Guys Waterless Wash and Wax</li>
            <li>Exterior Windows Cleaned by Non-Streaking, Tint-Safe Glass Cleaner</li>
            <li>Floors, Seats, and Anywhere in between Vacuumed</li>
            <li>Interior Windows Cleaned with Non-Streaking, Tint-Safe Glass Cleaner</li>
          </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<style>
  .clickable:hover
  {
    cursor: pointer !important;
    color: #DD0000;
  }

  .clickable
  {
    color: #EEE;
  }

  footer
  {
    justify-content: center;
    display: flex;
  }
</style>
<footer class="footer mt-auto py-3">
  <div class="container text-center">
    <span class="text-light">
      <a style="margin-right: 10px;" class="clickable" href="/policies/tos">Terms of Service</a>
      <a style="margin-right: 10px;" class="clickable" href="/policies/privacy_policy">Privacy Policy</a>
    </span>
  </div>
</footer>
</html>
