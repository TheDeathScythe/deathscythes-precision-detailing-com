<?php

include ("php/loggedin.php");

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $message = $_POST['contactMessage'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = 'deathscythe@scythesprecisiondetailing.com';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name} <br/>", "Email: {$email} <br/>", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: /thank-you?action=contact');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us | Scythe's Precision Detailing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="shortcut icon" href="imgs/favicon.png" />
</head>
<body style="text-align: center;">

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
            <a class="nav-link active" href="#">Contact Us</a>
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

  <!--Desktop Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <div class="w-75 d-none d-lg-block" style="background: #FFF; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; padding: 10px; text-align: center;">
      <h3>You can also contact us at <a style="font-size: 90%;" href = "mailto: deathscythe@scythesprecisiondetailing.com">deathscythe@scythesprecisiondetailing.com</a>.</h3>
    </div>
  </div>

  <!--Mobile Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <div class="w-100 d-lg-none" style="background: #FFF; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; padding: 10px; text-align: center;">
      <h3>You can also contact us at <a style="font-size: 60%;" href = "mailto: deathscythe@scythesprecisiondetailing.com">deathscythe@scythesprecisiondetailing.com</a>.</h3>
    </div>
  </div>

  <!--Desktop Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <form class="w-50 d-none d-lg-block" style="background: #FFF; border-radius: 5px; padding: 10px; text-align: center;" method="POST" action="contactus.php" id="contact-form">
        <h2>Contact Us</h2>
        <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
        <br />
        <div class="row"><p><div class="col-sm"><label>First Name: </label></div><div class="col-sm"><input name="contactName" type="text" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Email: </label></div><div class="col-sm"><input style="cursor:pointer;" name="contactEmail" type="email" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Message: </label></div><div class="col-sm"><textarea rows="2" cols="30" name="contactMessage"></textarea></div></p></div>
        <p><input type="submit" value="Send" /></p>
    </form>
  </div>

  <!-- Mobile Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <form class="w-100 d-lg-none" style="background: #FFF; border-radius: 5px; padding: 10px; text-align: center;" method="POST" action="contactus.php" id="contact-form">
        <h2>Contact Us</h2>
        <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
        <br />
        <div class="row"><p><div class="col-sm"><label>First Name: </label></div><div class="col-sm"><input name="contactName" type="text" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Email: </label></div><div class="col-sm"><input style="cursor:pointer;" name="contactEmail" type="email" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Message: </label></div><div class="col-sm"><textarea rows="2" cols="35" name="contactMessage"></textarea></div></p></div>
        <p><input type="submit" value="Send" /></p>
    </form>
  </div>

  <!--Desktop Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <div class="w-75 d-none d-lg-block" style="background: #FFF; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; padding: 20px; text-align: center;">
      <h5>If you would like to book an appointment, please state what service you are interested in and, if possible, what area or city you live in so that we can be prepared. Note that if your car is exceptionally dirty we will need a hose so we can hook up our power washer. Also, if you are getting any interior services, we require an outlet in order to plug in our vacuum. Please Let us know if there is anything special such as areas that need more attention or fragile pieces or even if you don't have water or power. Let us know and we will figure out a way to get your car cleaner than ever!</h5>
    </div>
  </div>

  <!--Mobile Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <div class="w-100 d-lg-none" style="background: #FFF; border-radius: 5px; margin-top: 10px; margin-bottom: 10px; padding: 20px; text-align: center;">
      <h5>If you would like to book an appointment, please state what service you are interested in and, if possible, what area or city you live in so that we can be prepared. Note that if your car is exceptionally dirty we will need a hose so we can hook up our power washer. Also, if you are getting any interior services, we require an outlet in order to plug in our vacuum. Please Let us know if there is anything special such as areas that need more attention or fragile pieces or even if you don't have water or power. Let us know and we will figure out a way to get your car cleaner than ever!</h5>
    </div>
  </div>

  <script>
      const constraints = {
          contactName: {
              presence: { allowEmpty: false }
          },
          contactEmail: {
              presence: { allowEmpty: false },
              email: true
          },
          contactMessage: {
              presence: { allowEmpty: false }
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.contactName.value,
              email: form.elements.contactEmail.value,
              message: form.elements.contactMessage.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);
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
