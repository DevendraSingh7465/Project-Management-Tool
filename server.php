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
		<td class="table-data"><?php echo $projectname; ?></td>
	</tr>
</tbody>

<?php 	
	} 
?>

</table>
