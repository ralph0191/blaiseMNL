
<table width="795" align="center"> 

	
	<tr align="center">
		<td colspan="6"><h2>View Staff Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#FFFFFF">
		<th>ID</th>
		<th>Email</th>
		<th>Name</th>
		
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_c = "select * from staff";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	while ($row_c=mysqli_fetch_array($run_c)){
		
		$c_id = $row_c['staff_id'];
		$c_email = $row_c['staff_email'];
		$c_name = $row_c['staff_name'];
		//$c_image = $row_c['customer_image'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $c_name;?></td>
		<td><?php echo $c_email;?></td>
		
		<td><a href="delete_c.php?delete_c=<?php echo $c_id;?>"><img src="del-icon.png" width="50" height="50"></a></td>
	
	</tr>
	<?php } ?>




</table>