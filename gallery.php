<?php include ("php/loggedin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gallery | Scythe's Precision Detailing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="shortcut icon" href="imgs/favicon.png" />
</head>
<body>
  <style>
    .carousel-caption {
      justify-content: center;
      text-align: center;
    }
    
    .carousel-caption h5 {
      margin-left: 37.5%;
      padding: 5px;
      background: #FFF;
      color: #000;
      width: 25%;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      margin-bottom: 0;
    }

    .carousel-caption p {
      margin-left: 25%;
      padding: 5px;
      background: #FFF;
      color: #000;
      width: 50%;
      border-radius: 5px;
      margin-top: 0;
    } 
  </style>
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
            <a class="nav-link active" href="#">Gallery</a>
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

  <h1 class="text-center" style="margin-top:5px; background:#FFF; border-radius:5px;">Gallery</h1>
  <div class="container g-4">
    <div class="row" style="margin-top:10px;">
      <div class="col-lg-4 mb-3">
        <div class="card" style="width: 18rem; margin: 0 auto;">
          <img src="imgs\beforeafter\afterbmw1square.jpeg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">2006 BMW 325i</h5>
            <p class="card-text">#8 Premium Inside & Out</p>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#galleryModal1">View Pictures</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-3">
        <div class="card" style="width: 18rem; margin: 0 auto;">
          <img src="imgs\gallery\Elantra001\elantra001-square.jpeg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Hyundai Elantra</h5>
            <p class="card-text">#8 Premium Inside & Out</p>
            <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal2" class="btn btn-primary">View Pictures</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-3">
        <div class="card" style="width: 18rem; margin: 0 auto;">
          <img src="imgs\gallery\Elantra002\elantra002-paxseat-square.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Hyundai Elantra</h5>
            <p class="card-text">#6 Premium Interior</p>
            <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal3" class="btn btn-primary">View Pictures</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top:10px;">
      <div class="col-lg-4 mb-3">
        <div class="card" style="width: 18rem; margin: 0 auto;">
          <img src="imgs\gallery\Porsche001/porsche001-square.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Porsche Cayman S</h5>
            <p class="card-text">#3 Premium Exterior</p>
            <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal4" class="btn btn-primary">View Pictures</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--BMW001 Modal-->
  <div class="modal" id="galleryModal1" tabindex="-1" aria-labelledby="galleryModal1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="galleryCarousel1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#galleryCarousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#galleryCarousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#galleryCarousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#galleryCarousel1" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#galleryCarousel1" data-bs-slide-to="4" aria-label="Slide 5"></button>
              <button type="button" data-bs-target="#galleryCarousel1" data-bs-slide-to="5" aria-label="Slide 6"></button>
              <button type="button" data-bs-target="#galleryCarousel1" data-bs-slide-to="6" aria-label="Slide 7"></button>
              <button type="button" data-bs-target="#galleryCarousel1" data-bs-slide-to="7" aria-label="Slide 8"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="imgs/beforeafter/beforebmw1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Exterior</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/beforeafter/afterbmw1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Exterior</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/beforeafter/beforebackseat1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Backseat</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/beforeafter/afterbackseat1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Rear Seat</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/beforeafter/beforebackfoot1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Rear Footwell</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/beforeafter/afterbackfoot1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Rear Footwell</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/beforeafter/wheelsbefore1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Wheels</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/beforeafter/wheelsafter1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Wheels</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel1" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel1" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Elantra001 Modal-->
  <div class="modal" id="galleryModal2" tabindex="-1" aria-labelledby="galleryModal2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="galleryCarousel2" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#galleryCarousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#galleryCarousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#galleryCarousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#galleryCarousel2" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#galleryCarousel2" data-bs-slide-to="4" aria-label="Slide 5"></button>
              <button type="button" data-bs-target="#galleryCarousel2" data-bs-slide-to="5" aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="imgs/gallery/Elantra001/elantra001-wide.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Outside (After)</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra001/elantra001-frontangle.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Windshield (After)</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra001/elantra001-sunroof.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Sunroof (After)</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra001/elantra001-wheels.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Wheels (After)</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra001/elantra001-dash.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Dashboard (After)</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra001/elantra001-floormat.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Floormat (After)</h5>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel2" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel2" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Elantra002 Modal-->
  <div class="modal" id="galleryModal3" tabindex="-1" aria-labelledby="galleryModal3" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="galleryCarousel3" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#galleryCarousel3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#galleryCarousel3" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#galleryCarousel3" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#galleryCarousel3" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#galleryCarousel3" data-bs-slide-to="4" aria-label="Slide 5"></button>
              <button type="button" data-bs-target="#galleryCarousel3" data-bs-slide-to="5" aria-label="Slide 6"></button>
              <button type="button" data-bs-target="#galleryCarousel3" data-bs-slide-to="6" aria-label="Slide 7"></button>
              <button type="button" data-bs-target="#galleryCarousel3" data-bs-slide-to="7" aria-label="Slide 8"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="imgs/gallery/Elantra002/elantra002-paxseat-before.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Passenger Seat</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra002/elantra002-paxseat-after.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Passenger Seat</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra002/elantra002-seatside-before.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before</h5>
                  <p>Driver's Seat Side</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra002/elantra002-seatside-after.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Driver's Seat Side</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra002/elantra002-backseat-before.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Backseat</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra002/elantra002-backseat-after.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Backseat</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra002/elantra002-dash-before.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Dash</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs/gallery/Elantra002/elantra002-dash-after.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Dash</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel3" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel3" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Porsche001 Modal-->
  <div class="modal" id="galleryModal4" tabindex="-1" aria-labelledby="galleryModal4" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="galleryCarousel4" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#galleryCarousel4" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#galleryCarousel4" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#galleryCarousel4" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#galleryCarousel4" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#galleryCarousel4" data-bs-slide-to="4" aria-label="Slide 5"></button>
              <button type="button" data-bs-target="#galleryCarousel4" data-bs-slide-to="5" aria-label="Slide 6"></button>
              <button type="button" data-bs-target="#galleryCarousel4" data-bs-slide-to="6" aria-label="Slide 7"></button>
              <button type="button" data-bs-target="#galleryCarousel4" data-bs-slide-to="7" aria-label="Slide 8"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="imgs\gallery\Porsche001\porsche001-wide-before.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Exterior</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs\gallery\Porsche001\porsche001-wide-after.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Exterior</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs\gallery\Porsche001\porsche001-hood-before.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Hood</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs\gallery\Porsche001\porsche001-hood-after.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Hood</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs\gallery\Porsche001\porsche001-intake-before.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Air Vent</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs\gallery\Porsche001\porsche001-intake-after.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Air Vent</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs\gallery\Porsche001\porsche001-wheels-before.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Before:</h5>
                  <p>Wheels</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="imgs\gallery\Porsche001\porsche001-wheels-after.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>After:</h5>
                  <p>Wheels</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel4" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel4" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
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
