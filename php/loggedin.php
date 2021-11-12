<?php
	session_start();

	$isLoggedIn = false;
	$loggedIn_Username = "";
	$cookie = "";
	$cookie_selector = "";
	$cookie_validator = "";
	$token_auth = "";

	if(isset($_SESSION['username']))
		{
			$isLoggedIn = true;
			$loggedIn_Username = $_SESSION['username'];
		}

	// connect to the database
	$db = mysqli_connect('db5005444714.hosting-data.io', 'dbu1348853', '$Popcheese10', 'dbs4573237');

	if($db == false)
	{
	  die("Error: Could not connect to database. " . mysqli_connect_error());
	}

	//check if remember me is set
	if(!$isLoggedIn)
	{
		if(isset($_COOKIE['user_auth']))
		{
		  $cookie = $_COOKIE['user_auth'];
		  $cookie_selector = substr($cookie, 0, 12);
		  $cookie_validator = substr($cookie, 12);

		  $cookie_query = "SELECT * FROM auth_tokens WHERE selector='$cookie_selector'";
		  $cookie_result = mysqli_query($db, $cookie_query);
		  if(mysqli_num_rows($cookie_result) == 1)
		  {
		    $auth_token = mysqli_fetch_assoc($cookie_result);
		    $db_validator = $auth_token['hashedValidator'];

		    $user_validator = hash('sha256', $cookie_validator);

		    $token_auth = hash_equals($user_validator, $db_validator);

		    $temp_UID = $auth_token['UID'];

		    $user_query = "SELECT * FROM Users WHERE UID='$temp_UID' LIMIT 1";
		  	$user_result = mysqli_query($db, $user_query);
		  	$user_fetch = mysqli_fetch_assoc($user_result);
		    $usrnme = $user_fetch['Username'];

		    $_SESSION['username'] = $usrnme;
		    $_SESSION['success'] = "You are now logged in";
		    $_SESSION['UID'] = $temp_UID;

		    header("location: /");
		  }
		}
	}
	
?>