<?php include('php/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | Scythe's Precision Detailing</title>
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
            <a class="nav-link" aria-current="page" href="/">Home</a>
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

  <style>

  .css-checkbox {
      display:none;
  }

  .css-checkbox + label{
      background:url('imgs/misc/checkedbox.png') no-repeat;
      height: 16px;
      width: 16px;
      display:inline-block;
      padding: 0 0 0 0px;
      vertical-align: middle;
  }

  .css-checkbox:checked + label{
      background:url('imgs/misc/uncheckedbox.png') no-repeat;
      height: 16px;
      width: 16px;
      display:inline-block;
      padding: 0 0 0 0px;
  }

  .css-checkbox:hover + label{
    cursor: pointer;
  }

  </style>

  <!--Desktop Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <form class="w-50 d-none d-lg-block" style="background: #FFF; border-radius: 5px; padding: 10px; margin-top: 10px; text-align: center;" method="POST">
        <h2>Login</h2>
        <?php include('php/errors.php'); 
        ?>
        <br />
        <div class="row"><p><div class="col-sm"><label>Username: </label></div><div class="col-sm"><input name="username" type="text" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password" type="password" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label style="padding-right: 12px">Remember Me: </label><input type="checkbox" id="rememberme" name="rememberme" class="css-checkbox" checked="checked" /><label for="rememberme"></label></div></p></div>
        <p><input type="submit" value="Login" name="login_user" /></p>
        <p>Don't have an account? <a href="register">Sign up now</a>!</p>
        <p class="text-danger">Please note that our login system is under development at the moment and may have issues here and there, we are not starting development of the booking page until this is finished so there is no need for an account at this time.</p>
    </form>  
  </div>

  <!-- Mobile Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <form class="w-100 d-lg-none" style="background: #FFF; border-radius: 5px; padding: 10px; margin-top: 10px; text-align: center;" method="POST">
        <h2>Login</h2>
        <?php include('php/errors.php'); 
        ?>
        <br />
        <div class="row"><p><div class="col-sm"><label>Username: </label></div><div class="col-sm"><input name="username" type="text" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password" type="password" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label style="padding-right: 12px">Remember Me: </label><input type="checkbox" id="rememberme2" name="rememberme" class="css-checkbox" checked="checked" /><label for="rememberme2"></label></div></p></div>
        <p><input type="submit" value="Login" name="login_user" /></p>
        <p>Don't have an account? <a href="register">Sign up now</a>!</p>
        <p class="text-danger">Please note that our login system is under development at the moment and may have issues here and there, we are not starting development of the booking page until this is finished so there is no need for an account at this time.</p>
    </form>  
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
