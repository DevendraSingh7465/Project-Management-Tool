<?php 
	include("connection.php");
 ?>
<table class="table">
			
<?php 
 	$all_project_names = array();
	// SELECT DISTINCT projects from notes;
	$query = mysqli_query($db, "SELECT DISTINCT projects from notes");
	while($row = mysqli_fetch_array($query)){
		$projectname = $row['projects'];
		array_push($all_project_names,$projectname);
	} 
	foreach ($all_project_names as $index => $record) {
        $button_id = 'table-btn' . $index;
 ?>
		<!-- <span id='bullet-points'>►</span> -->
	<tbody class="table-body">
		<tr class="table-row">
			<td class="table-data">
				<?php 
					echo "
					<div id='buttons-container'>
						<button id='$button_id' class='table-btn' onclick='xyz()'>
							$record
						</button>
					</div>";
				?>
			</td>
		</tr>
		
	</tbody>

<?php 	
	}
?>

</table>
