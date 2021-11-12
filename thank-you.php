<?php 
  include ("php/loggedin.php");

  $action = $_GET['action'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thank You! | Scythe's Precision Detailing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <meta http-equiv="refresh" content="5;url=http://scythesprecisiondetailing.com/">
  <link rel="shortcut icon" href="imgs/favicon.png" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-WBMXDJS5WX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-WBMXDJS5WX');
  </script>
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
            <a class="nav-link active" aria-current="page" href="/">Home</a>
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

<?php
  if($action == "login")
  {
    echo '<div class="d-flex justify-content-center">
            <div style="background: #FFF; border-radius: 5px; margin-top: 10px; text-align: center; width:75%; padding:5px;">
              <h1>You are now logged in</h1>
              <p>Welcome back!</p>
              <br />
              <br />
              <p>If you are not redirected in <span id="countdown"></span>... <a href="/">click here</a>.</p>
            </div>
          </div>
          <script>
            gtag("event", "login", {
              "method": "Email"
            });
          </script>
          ';
  }
  elseif($action == "register")
  {
    echo '<div class="d-flex justify-content-center" style="clear: both;">
            <div style="background: #FFF; border-radius: 5px; margin-top: 10px; text-align: center; width:75%; padding:5px;">
              <h1>You are now registered</h1>
              <p>Now you can book appointments and edit your account in the top right menu!</p>
              <br />
              <br />
              <p>If you are not redirected in <span id="countdown"></span>... <a href="/">click here</a>.</p>
            </div>
          </div>
          <script>
            gtag("event", "sign_up", {
              "method": "Email"
            });
          </script>
          ';
  }
  elseif($action == "contact")
  {
    echo'
      <div class="d-flex justify-content-center style="clear: both;"">
        <div style="background: #FFF; border-radius: 5px; margin-top: 10px; text-align: center; width:75%; padding:5px;">
          <h1>Thank You for Contacting Us!</h1>
          <p>A member of our team should get back to you very soon.</p>
          <br />
          <br />
          <p>If you are not redirected in <span id="countdown"></span>... <a href="/">click here</a>.</p>
        </div>
      </div>';
  }
  elseif ($action == "logout")
  {
    echo'
      <div class="d-flex justify-content-center" style="clear: both;">
        <div style="background: #FFF; border-radius: 5px; margin-top: 10px; text-align: center; width:75%; padding:5px;">
          <h1>You are now logged out</h1>
          <p>We hope to see you again soon!</p>
          <br />
          <br />
          <p>If you are not redirected in <span id="countdown"></span>... <a href="/">click here</a>.</p>
        </div>
      </div>';
  }
  ?>
  <script>
    var timeleft = 5;
    var refreshTimer = setInterval(function(){
      if(timeleft <= 0){
        clearInterval(refreshTimer);
        document.getElementById("countdown").innerHTML = "0 seconds";
      } else {
        document.getElementById("countdown").innerHTML = timeleft + " seconds";
      }
      timeleft -= 1;
    }, 1000);
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
    display: block;
  }
</style>
<footer class="footer mt-auto py-3">
  <div class="container text-center" style="clear: both;">
    <span class="text-light">
      <a style="margin-right: 10px;" class="clickable" href="/policies/tos">Terms of Service</a>
      <a style="margin-right: 10px;" class="clickable" href="/policies/privacy_policy">Privacy Policy</a>
    </span>
  </div>
</footer>
</html>
