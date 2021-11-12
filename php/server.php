<?php
	session_start();

	//if user is logged in, redirect to home
	if(isset($_SESSION["username"]))
	{
		header("location: /");
	}

	//initializing variables
	$username = "";
	$email = "";
	$first_name = "";
	$last_name = "";
	$phone_num = "";
	$errors = array();

	//database variables
	$dbhost = "db5005444714.hosting-data.io";
	$dbuser = "dbu1348853";
	$dbpassword = "$Popcheese10";
	$dbdatabase = "dbs4573237";

	//connect to database
	$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);

	if($db == false)
	{
		die("Error: Could not connect to database. " . mysqli_connect_error());
	}

	//register user
	if(isset($_POST['reg_user']))
	{
		//receive input from form
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_num = $_POST['phone_num'];

    //validating inputs and pushing errors to errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

    //check to ensure user does not already exist
    $user_check_query = $db->prepare("SELECT * FROM Users WHERE Username=? OR Email=? LIMIT 1");
    $user_check_query->bind_param("ss", $username, $email);
    $user_check_query->execute();
    $result = $user_check_query->get_result();
    $user = $result->fetch_assoc();

    if($user)
    { //user exists
      if($user['username'] === $username)
      {
        array_push($errors, "Username already exists");
      }
      if($user['email'] === $email)
      {
        array_push($errors, "Account already exists with this email");
      }
    }

    //register user if all checks clear
    if(count($errors) == 0)
    {
      $password = password_hash($password_1, PASSWORD_BCRYPT); //encrypt password before inserting into database

      $regQuery = $db->prepare("INSERT INTO Users (Username, Email, Password, First_Name, Last_Name, Phone_Num) VALUES (?, ?, ?, ?, ?, ?)");
      $regQuery->bind_param("ssssss", $username, $email, $password, $first_name, $last_name, $phone_num);
      $regQuery->execute();
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";

      header('location: /thank-you?action=register');
    }
  }

  //convert unix timestamp to standard date and time
  function toDateTime($unixTimestamp)
  {
    return date("Y-m-d H:i:s", $unixTimestamp);
  }

  //login user
  if(isset($_POST['login_user']))
  {
    //receive inputs from form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberme = $_POST['rememberme'];

    //validate inputs and push errors to errors array
    if(empty($username))
    {
      array_push($errors, "Username is required");
    }

    if(empty($password))
    {
      array_push($errors, "Password is required");
    }

    if(count($errors) == 0)
    {
      $query = $db->prepare("SELECT * FROM Users WHERE Username=?");
      $query->bind_param("s",$username);
      $query->execute();
      $result = $query->get_result();
      $row = $result->fetch_assoc();

      $pass2 = $row['Password'];
      $passwordver = password_verify($password, $pass2);

      if(mysqli_num_rows($results) == 1 && $passwordver)
      {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        if(isset($rememberme))
        {
          //generate auth cookie for remembering user after session is destroyed
          $user_id = $row['UID'];

          $selector = bin2hex(random_bytes(20));
          $validator = bin2hex(random_bytes(20));

          $query2 = $db->prepare("SELECT * FROM auth_tokens WHERE selector=?");
          $query2->bind_param("s", $selector);
          $results = $query2->get_result();

          if(!$results)
          {
            $expire = time()+60*60*24*30;
            $expires = toDateTime($expire);

            $hashedValidator = hash('sha256', $validator);

            $query3 = $db->prepare("INSERT INTO auth_tokens (selector, hashedValidator, UID, expires) VALUES (?, ?, ?, ?)");
            $query3->bind_param($selector, $hashedValidator, $user_id, $expires);
            $query3->execute();
            $cookie = $selector.$validator;
            setcookie("user_auth", $cookie, $expire);
            header('location: /thank-you?action=login');
          }
          else
          {
            array_push($errors, "Oops, something went wrong!");
          }
        }
      }
      else
      {
        array_push($errors, "Wrong username/password combination");
      }
    }
  }
?>