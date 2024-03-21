<!-- This file is used to create task. -->
<?php
include("connection.php");

// get data from postProjectName() function
$project_name = $_POST['postProjectName'];
$task_name = $_POST['postTaskName'];

$sql = "INSERT INTO notes (projects,tasks) VALUES ('$project_name','$task_name');";
if (mysqli_query($conn, $sql)) {
    header("Location:index.php");
} 
?>
