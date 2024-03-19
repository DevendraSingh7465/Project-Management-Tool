<?php
// session is important for sharing varaible data from oen file to  another
// session_start(); 
$project_name = $_POST['postProjectName'];
$task_name = $_POST['postTaskName'];
// $task_name = filter_input(INPUT_POST, 'task_name');
// echo $projectName;


//For PHP MyAdmin
$host = "localhost:3308";
$dbusername = "root";
$dbpassword = "";
$dbname = "pmt";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


$sql = "INSERT INTO notes (projects,tasks) VALUES ('$project_name','$task_name');";
// $sql1 = "INSERT INTO projects (projectname) VALUES ('$project_name');";
if (mysqli_query($conn, $sql)) {
    header("Location:index.php");

} 


?>