<?php 
	$servername = "localhost:3308";
	$username  = "root";
	$password = "";
	$dbname = "pmt";

	$db = mysqli_connect($servername, $username, $password, $dbname);

	if (!$db) {
		die("Connection Failed". mysqli_connect_error());
	}
 ?>