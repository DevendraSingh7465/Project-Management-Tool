<?php 
	include("connection.php");

 	$all_tasks_names = array();
	error_reporting(E_ERROR | E_PARSE);

    $project_name = $_POST['postProjectName'];

    $sql = "SELECT tasks FROM notes WHERE projects = '$project_name'";
	$query = mysqli_query($db, $sql);
	while($row = mysqli_fetch_array($query)){
		$taskname = $row['tasks'];
		array_push($all_tasks_names,$taskname);
	} 
	foreach ($all_tasks_names as $index => $record) {
        $button_id = 'fetch-task-btn' . $index;
 
    echo "
    <div id='allTasksList'>
        <input type='checkbox' id='$button_id' class='ui-checkbox' onclick='status_check()'>
        <label for='$button_id' class='table-btn12'>$record</label>
        </br>
    </div>
    ";
					
	}
?>


