<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>
<table width="780" align="center"> 

	
	<tr align="center">
		<td colspan="6"><h2>View Staffs Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#8c6d00" style="text-align:center;">
		<th>I.D.</th>
		<th>Email</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_pro = "select * from staff";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['staff_id'];
		$pro_title = $row_pro['staff_email'];
		$pro_image = $row_pro['staff_name'];
		$pro_qty = $row_pro['Staff_name'];
		//$pro_price = $row_pro['prod_price'];
		$i++;
	
	?>
	<tr align="center" style="text-align:center;">
		<td><?php echo $i;?></td>
		<td><?php echo $pro_title;?></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>"><img src="del-icon.png" width="50" height="50"></a></td>
	
	</tr>
	<?php } ?>
</table>

<?php } ?>