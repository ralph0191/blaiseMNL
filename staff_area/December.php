<?php 
include ("includes/db.php");

?>


<style>

#sa{
	
		width:220px;
	color:white;
	float:left;
	width:200px;
min-height:600px;
border-left:5px groove orange;
background-color: rgba(0, 0, 0, 0.5);
	
}

#sa a {
text-decoration:none;
color:white;
text-align:left;
font-size:18px;
padding:6px;
margin:6px;
display:block;
}
#sa a:hover {text-decoration:underline; font-weight:bolder; color:orange;}
</style>
  
  
 <div ="k">
 
 <div id="sa">
		
		<center>
		<br><hr></center>
		<a href='pdfdec.php' target="_blank">Print PDF</a>
		<h2 style="text-align:center;">Month</h2>
			
			<a href="index.php?January">January</a>
			<a href="index.php?February">February</a>
			<a href="index.php?March">March</a>
			<a href="index.php?April">April</a>
			<a href="index.php?May">May</a>
			<a href="index.php?June">June</a>
			<a href="index.php?July">July</a>
		<a href="index.php?August">August</a>
			<a href="index.php?September">September</a>
			<a href="index.php?October">October</a>
		<a href="index.php?November">November</a>
		<a href="index.php?December">December</a>
			
		
		
		</div>
		
	<div align="center">	
<table>
<tr align="center">
		<td colspan="6"><h2>Sales</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#ff8000" style="text-align:center;">
		<th>Sale I.D.</th>
		<th>Date</th>
		<th>Product ID</th>
		<th>Buyer</th>
		<th>QTY</th>
		<th>Amount in Peso</th>
	</tr>	
<?php 	
	$get_pro = "select * from sales where sale_date like '2018-12-%'";
	$run_pro = mysqli_query($con, $get_pro); 
	

	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['sale_id'];
		$pro_title = $row_pro['sale_date'];
		$pro_image = $row_pro['sale_product_id'];
		$pro_qty = $row_pro['sale_buyer'];
		$pro_price = $row_pro['sale_qty'];
		$released = $row_pro['sale_amount'];
	
	
		
	?>
	<tr  align="center" style="text-align:center;">
		<td><?php echo $pro_id;?></td>
		<td><?php echo $pro_title;?></td>
		<td><?php echo $pro_image;?></td>
		<td><?php echo $pro_qty?></td>	
		<td><?php echo $pro_price;?></td>
		<td>&#8369;<?php echo $released?></td>
	
	</tr>

	

	
	
	
	<?php
	}
	
	?>	</table>
</div>
		
		
	

	
	

		
		
		
		