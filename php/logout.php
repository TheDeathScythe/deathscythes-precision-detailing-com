<?php 
	session_start();

	// connect to the database
	$db = mysqli_connect('db5005444714.hosting-data.io', 'dbu1348853', '$Popcheese10', 'dbs4573237');

	if($db == false)
	{
	  die("Error: Could not connect to database. " . mysqli_connect_error());
	}

	if(!isset($_SESSION['username']))
	{
		header("location: /");
	}
	else
	{
		session_destroy();
		setcookie("user_auth", null, -1);

		$temp_UID = $_SESSION['UID'];

		$user_query = "DELETE FROM auth_tokens WHERE UID='$temp_UID'";
		$user_result = mysqli_query($db, $user_query);

		if(!user_result)
		{
			echo "Error!";
		}else
		{
			header("location: /thank-you?action=logout");
		}
	}
?>