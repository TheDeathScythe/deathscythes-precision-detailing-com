<?php

define('DB_SERVER', 'db5005444714.hosting-data.io');
define('DB_USERNAME', 'dbu1348853');
define('DB_PASSWORD', '$Popcheese10');
define('DB_NAME', 'dbs4573237');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Error Checking
if($link == false)
{
	die("Error: Could not connect to database. " . mysqli_connect_error());
}

?>