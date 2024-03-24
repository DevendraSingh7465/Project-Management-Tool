<!-- this is the main connection file -->
<?php 
	$servername = "localhost:3308";
	$username  = "root";
	$password = "";
	$dbname = "pmt";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection Failed". mysqli_connect_error());
	}
 ?>