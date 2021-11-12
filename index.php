<?php include ("php/loggedin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | Scythe's Precision Detailing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="shortcut icon" href="imgs/favicon.png" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-WBMXDJS5WX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-WBMXDJS5WX');
    gtag('set', 'user_properties', { 'crm_id' : '<?php echo $loggedIn_Username; ?>' });
  </script>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Scythe's Precision Detailing</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services">Services</a>
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
            <ul class="dropdown-menu dropdown-menu-right" style="right:25%;left:-25%;" aria-labelledby="navbarDropdown">
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

  <div id="mainCarousel" class="carousel slide carousel-fade container g-5" style="padding: 10px 50px 10px 50px;" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imgs\beforeafter\beforebmw1.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Before</h5>
        </div>
      </div>

      <div class="carousel-item">
        <img src="imgs\beforeafter\afterbmw1.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>After</h5>
        </div>
      </div>

      <div class="carousel-item">
        <img src="imgs\beforeafter\beforebackseat1.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Before</h5>
        </div>
      </div>

      <div class="carousel-item">
        <img src="imgs\beforeafter\afterbackseat1.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>After</h5>
        </div>
      </div>

      <div class="carousel-item">
        <img src="imgs\beforeafter\wheelsbefore1.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Before</h5>
        </div>
      </div>

      <div class="carousel-item">
        <img src="imgs\beforeafter\wheelsafter1.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>After</h5>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!--Desktop Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <div class="w-80 d-none d-sm-block" style="background: #FFF; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; padding: 15px; text-align: center;">
      <h4>Our login system and our booking system is currently a work in progress. That being said, you can still go to the contact us page to inquire about availability and book appointments. You can also email me personally at <a href = "mailto: deathscythe@scythesprecisiondetailing.com">deathscythe@scythesprecisiondetailing.com</a> We are open 11-6 on weekdays and 11-3 on Saturdays. If possible please state the service you would like and what city you are located in so we can be prepared. Please note that if your car is exceptionally dirty you will need to inform us of this and have a hose that we can use for a pressure washer as we do not have onboard water. Our details can take a while, please refer to our services page to see estimated times and details on what exactly we do for each package. We hope you make an appointment and sincerely hope you are pleased with the quality of the detail. We will get your car as clean as we can (in the areas cleaned by the package of your choice of course) and we guaruntee for those esteemed members who get our premium detail, that the car will look exactly the way it did the first day on the lot. &#128077</h4>
    </div>
  </div>

  <!--Mobile Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <div class="w-100 d-sm-none" style="background: #FFF; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; padding: 15px; text-align: center;">
      <h4>Our login system and our booking system is currently a work in progress. That being said, you can still go to the contact us page to inquire about availability and book appointments. You can also email me personally at <a style="font-size:.75em;" href = "mailto: deathscythe@scythesprecisiondetailing.com">deathscythe@scythesprecisiondetailing.com</a> We are open 11-6 on weekdays and 11-3 on Saturdays. If possible please state the service you would like and what city you are located in so we can be prepared. Please note that if your car is exceptionally dirty you will need to inform us of this and have a hose that we can use for a pressure washer as we do not have onboard water. Our details can take a while, please refer to our services page to see estimated times and details on what exactly we do for each package. We hope you make an appointment and sincerely hope you are pleased with the quality of the detail. We will get your car as clean as we can (in the areas cleaned by the package of your choice of course) and we guaruntee for those esteemed members who get our premium detail, that the car will look exactly the way it did the first day on the lot. &#128077</h4>
    </div>
  </div>

  <script>
    var loc = window.location.href+'';
    if (loc.indexOf('http://')==0){
        window.location.href = loc.replace('http://','https://');
    }     
  </script>
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
