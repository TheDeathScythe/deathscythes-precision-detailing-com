<?php
session_start();

if(isset($_SESSION['username']))
{
  header('location: /');
}

/*
$email = "willschmidt1001@gmail.com";

$url = 'https://connect.squareup.com/v2/customers/search';

$data = [
  "query": {
      "filter": {
        "email_address": {
          "exact": $email
      }
];

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-RapidAPI-Host: connect.squareup.com',
  'X-RapidAPI-Key: EAAAEFliDXPDaqhQh7h3CRrFqzyV-6QCPaJcSHYawbxjILqPS0zGsYCRnT9UNSmm',
  'Content-Type: application/json'
]);

$response = curl_exec($curl);

curl_close($curl);

echo $response;
*/
// initializing variables
$username = "";
$email    = "";
$first_name = "";
$last_name = "";
$phone_num = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('db5005444714.hosting-data.io', 'dbu1348853', '$Popcheese10', 'dbs4573237');

if($db == false)
{
  die("Error: Could not connect to database. " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $phone_num = mysqli_real_escape_string($db, $_POST['phone_num']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Users WHERE Username='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) 
  { // if user exists
    if ($user['username'] === $username) 
    {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form.
  if (count($errors) == 0) {
    $password = password_hash($password_1, PASSWORD_BCRYPT);//encrypt the password before saving in the database

    $query = "INSERT INTO Users (Username, Email, Password, First_Name, Last_Name, Phone_Num) 
          VALUES('$username', '$email', '$password', '$first_name', '$last_name', '$phone_num')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    

    header('location: /thank-you?action=register');
  }
}

//Remember me token generation
/*function generateToken ($user_id)
{
  $selector = bin2hex(random_bytes(20));
  $validator = bin2hex(random_bytes(20));
  
  $query2 = "SELECT * FROM auth_tokens WHERE selector='$selector'";
  $results2 = mysqli_query($db, $query2);

  $expire = time()+60*60*24*30;

  if(mysqli_num_rows($results2) == 0)
  {
    $hashedValidator = hash('sha256', $validator);

    $query3 = "INSERT INTO auth_tokens (selector, hashedValidator, UID, expires) VALUES('$selector', '$hashedValidator', '$user_id', '$expire')";
    $results3 = mysqli_query($db, $query3);
    $cookie = $selector.$validator;
    setcookie("user_auth", $cookie, $expire);
  }
}*/

function toDateTime($unixTimestamp){
    return date("Y-m-d H:i:s", $unixTimestamp);
}

//login user
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $rememberme = mysqli_real_escape_string($db, $_POST['rememberme']);

  if (empty($username)) {
    array_push($errors, "Username is required");
    $login_err = "Username is required";
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM Users WHERE Username='$username'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
    $pass2 = $row['Password'];
    $passwordver = password_verify($password, $pass2);
    if ((mysqli_num_rows($results)==1)&&$passwordver) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      if(isset($rememberme))
      {
        
        $user_id = $row['UID'];

        //generateToken($user_id);

        $selector = bin2hex(random_bytes(20));
        $validator = bin2hex(random_bytes(20));
        
        $query2 = "SELECT * FROM auth_tokens WHERE selector='$selector'";
        $results2 = mysqli_query($db, $query2);

        $expire = time()+60*60*24*30;
        $expires = toDateTime($expire);

        $hashedValidator = hash('sha256', $validator);

        $query3 = "INSERT INTO auth_tokens (selector, hashedValidator, UID, expires) VALUES('$selector', '$hashedValidator', '$user_id', '$expires')";
        $results3 = mysqli_query($db, $query3);
        $cookie = $selector.$validator;
        setcookie("user_auth", $cookie, $expire);
      }
      header('location: /thank-you?action=login');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>