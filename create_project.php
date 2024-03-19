<?php
// session is important for sharing varaible data from oen file to  another
session_start(); 
$project_name = filter_input(INPUT_POST, 'project_name');



//For PHP MyAdmin
$host = "localhost:3308";
$dbusername = "root";
$dbpassword = "";
$dbname = "pmt";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


$sql = "INSERT INTO notes (projects) VALUES ('$project_name');";
// $sql1 = "INSERT INTO projects (projectname) VALUES ('$project_name');";
if (mysqli_query($conn, $sql)) {
    header("Location:index.php");

} 


?>