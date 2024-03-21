<!-- This File fetch the tasks from the database and show it on .all-tasks class element which is right part of the app. -->
<?php 
	error_reporting(E_ERROR | E_PARSE);
	include("connection.php");
    $project_name = $_POST['postProjectName']; // gets data from showtasksrelatedtoproject()

 	$all_tasks_names = array();

    $sql = "SELECT DISTINCT tasks FROM notes WHERE projects='$project_name' AND tasks IS NOT NULL AND tasks <> ''";
	$query = mysqli_query($conn, $sql);
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
    </div>";				
	}
?>


