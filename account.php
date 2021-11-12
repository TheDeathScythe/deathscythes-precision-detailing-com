<?php 
  include ("php/loggedin.php"); 
  
  if($db == false)
  {
    die("Error: Could not connect to database. " . mysqli_connect_error());
  }

  $fetchStmt = $db->prepare("SELECT * FROM Users WHERE Username=?");
  $fetchStmt->bind_param("s", $loggedIn_Username);
  $fetchStmt->execute();
  $fetchResult = $fetchStmt->get_result();
  $fetchData = $fetchResult->fetch_assoc();

  $email = $fetchData['Email'];
  $password_hash = $fetchData['Password'];
  $phone_num = $fetchData['Phone_Num'];
  $first_name = $fetchData['First_Name'];
  $last_name = $fetchData['Last_Name'];
  $username = $fetchData['Username'];
  $id = $fetchData['UID'];

  $edit_succ = [];

  // Old Code
  // $info_query = "SELECT * FROM Users WHERE Username='$loggedIn_Username'";
  // $info_result = mysqli_query($db, $info_query);

  // $userfetch = mysqli_fetch_assoc($info_result);

  // $email = $userfetch['Email'];
  // $password_hash = $userfetch['Password'];
  // $phone_num = $userfetch['Phone_Num'];
  // $first_name = $userfetch['First_Name'];
  // $last_name = $userfetch['Last_Name'];
  // $username = $loggedIn_Username;

  $passVer = false;
  $passwordStrength = 0;

  if (isset($_POST['edit_user'])) {
    if(!empty($_POST['password_1']))
    {
      $passVer = password_verify($_POST['password_1'], $password_hash);
    }
    if($passVer == false)
    {
      //password is different

      if($_POST['username'] != $username && !empty($_POST['username']))
      {
        //insert username into table
        $usernameStmt = $db->prepare("UPDATE Users SET Username=? WHERE UID=?");
        $usernameStmt->bind_param("si", $_POST['username'], $id);
        $usernameStmt->execute();
        $loggedIn_Username = $_POST['username'];
        $_SESSION['username'] = $_POST['username'];

        if($usernameStmt != false)
        {
          array_push($edit_succ, "Username");
        }
      }

      if($_POST['email'] != $email && !empty($_POST['email']))
      {
        //insert email into table
        $emailStmt = $db->prepare("UPDATE Users SET Email=? WHERE UID=?");
        $emailStmt->bind_param("si", $_POST['email'], $id);
        $emailStmt->execute();

        if($emailStmt != false)
        {
          array_push($edit_succ, "Email");
        }
      }

      if($_POST['phone_num'] != $phone_num && !empty($_POST['phone_num']))
      {
        //insert new phone number into table
        $phoneStmt = $db->prepare("UPDATE Users SET Phone_Num=? WHERE UID=?");
        $phoneStmt->bind_param("si", $_POST['phone_num'], $id);

        if($emailStmt != false)
        {
          array_push($edit_succ, "Phone Number");
        }
      }

      if(!empty($_POST['password_1']))
      {
        if($_POST['password_1'] == $_POST['password_2'])
        {
          $passVer2 = password_verify($_POST['password_3'], $password_hash);
          if($passVer2)
          {
            if($passwordStrength == 0)
            {
              $edit_err = "Password must be at least medium strength!";
              $passwordFeedback = "Try using capital letters and special characters such as ! or @";
            }
          }
          else
          {
            $edit_err = "Password is incorrect!";
          }
        }
        else
        {
          $edit_err = "Passwords must match!";
        }
      }
    }
    else
    {
      //password is the same as previous
      $edit_err = "Password cannot be the same as your last one!";   
    }
  }

  $db->close();

  if(count($edit_succ) == 1)
  {
    $edit_succ_stmt = $edit_succ[0] . " was successfully updated!";
  }
  else if(count($edit_succ) == 2)
  {
    $edit_succ_stmt = $edit_succ[1] . " and " . $edit_succ[1] . "successfully updated!";
  }
  else if(count($edit_succ) == 3)
  {
    $edit_succ_stmt = $edit_succ[0] . ", " . $edit_succ[1] . ", and " . $edit_succ[2] . "successfully updated!";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Account | Scythe's Precision Detailing</title>
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
        <h2>Account</h2>
        <?php include('php/errors.php'); 
        ?>
        <?php 
        echo "<h6 class='text-danger'>" . $edit_err . "</h6>";
        echo "<h6 class='text-success'>" . $edit_succ_stmt . "</h6>";
        ?>
        <br/>
        <div class="row"><p><div class="col-sm"><label>First Name: </label></div><div class="col-sm"><label><input name="first_name" <?php echo "value='$first_name'"; ?> type="text" style="border:none;" readonly /></label></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Last Name: </label></div><div class="col-sm"><label><input name="last_name" <?php echo "value='$last_name'"; ?> type="text" style="border:none;" readonly /></label></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Username: </label></div><div class="col-sm"><input name="username" <?php echo "value='$loggedIn_Username'"; ?> type="text" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Email: </label></div><div class="col-sm"><input name="email" <?php echo "value='$email'"; ?> type="text" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>New Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password_1" placeholder="Cannot be the same" id="password" class="passwordInput"/></div></p></div>
        <?php echo "<h6 style='font-size: 1em;' class='text-danger'>" . $passwordFeedback . "</h6>"; ?>
        <span id="StrengthDisp" class="badge displayBadge">Weak</span>
        <div class="row"><p><div class="col-sm"><label>Re-type Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password_2" type="password"/></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Current Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password_3" type="password"/></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Phone Number: </label></div><div class="col-sm"><input name="phone_num" id="phone-number" maxlength="16" maxlength="16" type="tel" <?php echo "value='$phone_num'" ?> onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" required /></div></p></div>
        <br/>
        <p><input type="submit" value="Save" name="edit_user" /></p>
    </form>  
  </div>

  <!-- Mobile Version-->
  <div class="container" style="display: flex; justify-content: center;">
    <form class="w-100 d-lg-none" style="background: #FFF; border-radius: 5px; padding: 10px; margin-bottom: 10px; margin-top: 10px; text-align: center;" method="POST">
        <h2>Account</h2>
        <?php include('php/errors.php'); 
        ?>
        <br />
        <div class="row"><p><div class="col-sm"><label>First Name: </label></div><div class="col-sm"><label><input name="first_name" <?php echo "value='$first_name'"; ?> type="text" style="border:none;" readonly /></label></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Last Name: </label></div><div class="col-sm"><label><input name="last_name" <?php echo "value='$last_name'"; ?> type="text" style="border:none;" readonly /></label></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Username: </label></div><div class="col-sm"><input name="username" <?php echo "value='$loggedIn_Username'"; ?> type="text" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Email: </label></div><div class="col-sm"><input name="email" <?php echo "value='$email'"; ?> type="text" required /></div></p></div>
        <div class="row"><p><div class="col-sm"><label>New Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password_1" placeholder="Cannot be the same" id="password" class="passwordInput"/></div></p></div>
        <span id="StrengthDisp" class="badge displayBadge">Weak</span>
        <div class="row"><p><div class="col-sm"><label>Re-type Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password_2" type="password"/></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Current Password: </label></div><div class="col-sm"><input style="cursor:pointer;" name="password_3" type="password"/></div></p></div>
        <div class="row"><p><div class="col-sm"><label>Phone Number: </label></div><div class="col-sm"><input name="phone_num" id="phone-number" maxlength="16" maxlength="16" type="tel" <?php echo "value='$phone_num'" ?> onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" required /></div></p></div>
        <p><input type="submit" value="Save" name="edit_user" /></p>
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
<script>
  let timeout;
  let password = document.getElementById('password');
  let strengthBadge = document.getElementById('StrengthDisp');
  let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})');
  let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))');

  function StrengthChecker(PasswordParameter) {
      if(strongPassword.test(PasswordParameter)) {
          strengthBadge.style.backgroundColor = "green";
          strengthBadge.textContent = 'Strong';
          <?php $passwordStrength = 2; ?>
      } else if(mediumPassword.test(PasswordParameter)) {
          strengthBadge.style.backgroundColor = 'blue';
          strengthBadge.textContent = 'Medium';
          <?php $passwordStrength = 1; ?>
      } else {
          strengthBadge.style.backgroundColor = 'red';
          strengthBadge.textContent = 'Weak';
          <?php $passwordStrength = 0; ?>
      }
  }

  password.addEventListener("input", () => {
      strengthBadge.style.display = 'block';
      clearTimeout(timeout);
      timeout = setTimeout(() => StrengthChecker(password.value), 500);
      if(password.value.length !== 0) {
          strengthBadge.style.display != 'block';
      } else {
          strengthBadge.style.display = 'none';
      }
  });
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
