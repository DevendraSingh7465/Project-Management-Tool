<?php 
	include("connection.php");
 ?>
<table class="table">
			
<?php 
	$query = mysqli_query($db, "SELECT * FROM projects");
	while($row = mysqli_fetch_array($query)){
		$projectname = $row['projectname'];
		
 ?>

	<tbody class="table-body">
		<tr class="table-row">
			<td class="table-data">
				<button class="table-btn">
				<span id="bullet-points">►</span>
				<?php echo $projectname; ?>
				</button>
			
			</td>
		</tr>
		
	</tbody>

<?php 	
	} 
?>

</table>
