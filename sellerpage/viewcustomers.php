<table width="780" align="center"> 

	
	<tr align="center">
		<td colspan="6"><h2>Address Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#ff8000" style="text-align:center;">
		<th>I.D.</th>
		<th>Email</th>
		<th>City</th>
		<th>customer_image</th>
		<th>customer contact</th>
		<th>Address</th>
		</tr>
	<?php 
	include("includes/db.php");
	
	$get_pro = "select * from customer";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['customer_id'];
		$pro_title = $row_pro['customer_email'];
		$pro_city = $row_pro['customer_city'];
		$pro_image = $row_pro['customer_image'];
		$pro_contact = $row_pro['prod_contact'];
		$pro_add = $row_pro['customer_address'];
	?>

</script>
	<tr align="center" style="text-align:center;">
		<td><?php echo $pro_id;?></td>
		<td><?php echo $pro_title;?></td>
		<td><img src="../customer/customer_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
		<td>₱<?php echo $pro_city;?></td>
		<td><?php echo $pro_contact;?></td>
		<td><?php echo $pro_add;S?></td>
	
	</tr>
	<?php

/*delete_pro.php?delete_pro=<?php echo $pro_id;?>*/
	}


	?>
</table>
	
