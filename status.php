<?php
include("connection.php");
error_reporting(E_ERROR | E_PARSE);

//get data from status_check() function
$project_name = $_POST['postProjectName'];
$task_name = $_POST['postTaskName'];
$status_check = $_POST['statusCheck'];

if($status_check==0){
    $sql = "UPDATE notes SET status='0' WHERE projects='$project_name' and tasks='$task_name'";
    if (mysqli_query($conn, $sql)) {
        // header("Location:index.php");
    } 
}
else if($status_check==2){
    $sql = "UPDATE notes SET status='1' WHERE projects='$project_name' and tasks='$task_name'";
    if (mysqli_query($conn, $sql)) {
        // header("Location:index.php");
    } 
}
else if($status_check==3){
    $sql = "DELETE FROM notes WHERE projects='$project_name'";
    if (mysqli_query($conn, $sql)) {
        header("Location:index.php");
    } 
}

//  this code sends data to showtasksrelatedtoproject() function whose status=1
$TaskStatus = array();
$sql1 = "select tasks from notes where projects='$project_name' and status = '1'";
$query1 = mysqli_query($conn,$sql1);
while($row = mysqli_fetch_array($query1)){
    $doneTasks = $row['tasks'];
    array_push($TaskStatus,$doneTasks);
}
echo json_encode($TaskStatus); 
?>
