<?php
// session is important for sharing varaible data from oen file to  another
// session_start(); 
error_reporting(E_ERROR | E_PARSE);

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

 
$sql = "UPDATE notes SET status='1' WHERE projects='$project_name' and tasks='$task_name'";
// $sql1 = "INSERT INTO projects (projectname) VALUES ('$project_name');";
if (mysqli_query($conn, $sql)) {
    // header("Location:index.php");
} 

$TaskStatus = array();
$sql1 = "select tasks from notes where projects='$project_name' and status = '1'";
$query1 = mysqli_query($conn,$sql1);
while($row = mysqli_fetch_array($query1)){
    $doneTasks = $row['tasks'];
    array_push($TaskStatus,$doneTasks);
    // echo $doneTasks;
}
echo json_encode($TaskStatus); // Encode the data as JSON



?>