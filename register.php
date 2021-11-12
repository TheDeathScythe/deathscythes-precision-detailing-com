<?php 
	include('php/server.php') 

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register | Scythe's Precision Detailing</title>
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

  <!--Desktop Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <form class="w-50 d-none d-lg-block" style="background: #FFF; border-radius: 5px; padding: 10px; margin-bottom: 10px; margin-top: 10px; text-align: center;" method="POST">
        <h2>Register</h2>
        <?php include('php/errors.php'); 
        ?>
        <br />
        <div class="row"><p><div class="col-sm"><label>First Name: </label></div><div class="col-sm"><input name="first_name" placeholder="Optional" type="text" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Last Name: </label></div><div class="col-sm"><input name="last_name" placeholder="Optional" type="text" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Username: </label></div><div class="col-sm"><input name="username" placeholder="Required" type="text" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Email: </label></div><div class="col-sm"><input name="email" placeholder="Required" type="text" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Password: </label></div><div class="col-sm"><input style="cursor:pointer;" placeholder="Required" name="password_1" type="password" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Re-type Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password_2" type="password" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Phone Number: </label></div><div class="col-sm"><input name="phone_num" id="phone-number" maxlength="16" maxlength="16" type="text" placeholder="Optional" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" /></div></p></div>
        <p><input type="submit" value="Register" name="reg_user" /></p>
        <p>Already have an account? <a href="login">Click here</a>!</p>
    </form>  
  </div>

  <!-- Mobile Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <form class="w-100 d-lg-none" style="background: #FFF; border-radius: 5px; padding: 10px; margin-bottom: 10px; margin-top: 10px; text-align: center;" method="POST">
        <h2>Register</h2>
        <?php include('php/errors.php'); 
        ?>
        <br />
        <div class="row"><p><div class="col-sm"><label>First Name: </label></div><div class="col-sm"><input name="first_name" placeholder="Optional" type="text" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Last Name: </label></div><div class="col-sm"><input name="last_name" placeholder="Optional" type="text" /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Username: </label></div><div class="col-sm"><input name="username" placeholder="Required" type="text" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Email: </label></div><div class="col-sm"><input name="email" placeholder="Required" type="text" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Password: </label></div><div class="col-sm"><input style="cursor:pointer;" placeholder="Required" name="password_1" type="password" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Re-type Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password_2" type="password" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Phone Number: </label></div><div class="col-sm"><input name="phone_num" id="phone-number" maxlength="16" maxlength="16" type="text" placeholder="Optional" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" /></div></p></div>
        <p><input type="submit" value="Register" name="reg_user" /></p>
        <p>Already have an account? <a href="login">Click here</a>!</p>
    </form>  
  </div>

  <script>
    var zChar = new Array(' ', '(', ')', '-', '.');
    var maxphonelength = 13;
    var phonevalue1;
    var phonevalue2;
    var cursorposition;

    function ParseForNumber1(object){
    phonevalue1 = ParseChar(object.value, zChar);
    }
    function ParseForNumber2(object){
    phonevalue2 = ParseChar(object.value, zChar);
    }

    function backspacerUP(object,e) {
    if(e){
    e = e
    } else {
    e = window.event
    }
    if(e.which){
    var keycode = e.which
    } else {
    var keycode = e.keyCode
    }

    ParseForNumber1(object)

    if(keycode >= 48){
    ValidatePhone(object)
    }
    }

    function backspacerDOWN(object,e) {
    if(e){
    e = e
    } else {
    e = window.event
    }
    if(e.which){
    var keycode = e.which
    } else {
    var keycode = e.keyCode
    }
    ParseForNumber2(object)
    }

    function GetCursorPosition(){

    var t1 = phonevalue1;
    var t2 = phonevalue2;
    var bool = false
    for (i=0; i<t1.length; i++)
    {
    if (t1.substring(i,1) != t2.substring(i,1)) {
    if(!bool) {
    cursorposition=i
    bool=true
    }
    }
    }
    }

    function ValidatePhone(object){

    var p = phonevalue1

    p = p.replace(/[^\d]*/gi,"")

    if (p.length < 3) {
    object.value=p
    } else if(p.length==3){
    pp=p;
    d4=p.indexOf('(')
    d5=p.indexOf(')')
    if(d4==-1){
    pp="("+pp;
    }
    if(d5==-1){
    pp=pp+")";
    }
    object.value = pp;
    } else if(p.length>3 && p.length < 7){
    p ="(" + p;
    l30=p.length;
    p30=p.substring(0,4);
    p30=p30+")"

    p31=p.substring(4,l30);
    pp=p30+p31;

    object.value = pp;

    } else if(p.length >= 7){
    p ="(" + p;
    l30=p.length;
    p30=p.substring(0,4);
    p30=p30+")"

    p31=p.substring(4,l30);
    pp=p30+p31;

    l40 = pp.length;
    p40 = pp.substring(0,8);
    p40 = p40 + "-"

    p41 = pp.substring(8,l40);
    ppp = p40 + p41;

    object.value = ppp.substring(0, maxphonelength);
    }

    GetCursorPosition()

    if(cursorposition >= 0){
    if (cursorposition == 0) {
    cursorposition = 2
    } else if (cursorposition <= 2) {
    cursorposition = cursorposition + 1
    } else if (cursorposition <= 5) {
    cursorposition = cursorposition + 2
    } else if (cursorposition == 6) {
    cursorposition = cursorposition + 2
    } else if (cursorposition == 7) {
    cursorposition = cursorposition + 4
    e1=object.value.indexOf(')')
    e2=object.value.indexOf('-')
    if (e1>-1 && e2>-1){
    if (e2-e1 == 4) {
    cursorposition = cursorposition - 1
    }
    }
    } else if (cursorposition < 11) {
    cursorposition = cursorposition + 3
    } else if (cursorposition == 11) {
    cursorposition = cursorposition + 1
    } else if (cursorposition >= 12) {
    cursorposition = cursorposition
    }

    var txtRange = object.createTextRange();
    txtRange.moveStart( "character", cursorposition);
    txtRange.moveEnd( "character", cursorposition - object.value.length);
    txtRange.select();
    }

    }

    function ParseChar(sStr, sChar)
    {
    if (sChar.length == null)
    {
    zChar = new Array(sChar);
    }
    else zChar = sChar;

    for (i=0; i<zChar.length; i++)
    {
    sNewStr = "";

    var iStart = 0;
    var iEnd = sStr.indexOf(sChar[i]);

    while (iEnd != -1)
    {
    sNewStr += sStr.substring(iStart, iEnd);
    iStart = iEnd + 1;
    iEnd = sStr.indexOf(sChar[i], iStart);
    }
    sNewStr += sStr.substring(sStr.lastIndexOf(sChar[i]) + 1, sStr.length);

    sStr = sNewStr;
    }

    return sNewStr;
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
