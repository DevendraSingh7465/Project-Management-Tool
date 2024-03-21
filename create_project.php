<!-- This file is used to create project -->
<?php
include("connection.php");
$project_name = filter_input(INPUT_POST, 'project_name');

$sql = "INSERT INTO notes (projects) VALUES ('$project_name');";
if (mysqli_query($conn, $sql)) {
    header("Location:index.php");
} 
?>
