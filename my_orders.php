<?php 

	include("includes/db.php");
	?>
	
<table width="700" align="center"> 

	
	<tr align="center">
		<td colspan="6"><h2>Your Orders details:</h2></td>
	</tr>
	
	<tr align="center" >
		<th>Order ID</th>
		<th>Product (S)</th>
		<th>Quantity</th>
		<th>Product Image</th>
		<th>Order Date</th>
		<th>Status</th>
		<th>Recieved By</th>
	</tr>
	<?php 
	$email = $_SESSION['customer_email'];
	
	$get_order = "select * from orders where customer = '$email'";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;

	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['orderid'];
		$qty = $row_order['qty'];
		$pro_id = $row_order['pro_id'];
		$order_date = $row_order['order_date'];
		$status = $row_order['status'];
		$recieved = $row_order['recieved_by'];
		$i++;
		
		$get_pro = "select * from products where prod_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['prod_image']; 
		$pro_title = $row_pro['prod_title'];
	
	?>
	<tr align="center">
		<td><?php echo $order_id;?></td>
		<td>
		<?php echo $pro_title;?></td>
			<td><?php echo $qty;?></td>
		<td><img src="admin_area/product_images/<?php echo $pro_image;?>" width="50" height="50" />
		</td>
	
		<td><?php echo $order_date;?></td>
		<td><?php echo $status;?></td>
		<td><?php echo $recieved;?></td>
	
	</tr>
	<?php } ?>
</table>

