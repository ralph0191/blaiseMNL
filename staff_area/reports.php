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

<div id="sa">
		<a href='pdftotal.php' target="_blank">Print PDF</a>
		<center>
		<br><hr></center>
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
		
		
		<?php
		if(isset($_GET['January'])){
		
		include("January.php"); 
		
		}
		if(isset($_GET['February'])){
		
		include("February.php"); 
		
		}
		if(isset($_GET['March'])){
		
		include("March.php"); 
		
		}
		if(isset($_GET['April'])){
		
		include("April.php"); 
		
		}
		if(isset($_GET['May'])){
		
		include("May.php"); 
		
		}
		if(isset($_GET['June'])){
		
		include("June.php"); 
		
		}
		if(isset($_GET['July'])){
		
		include("July.php"); 
		
		}
		if(isset($_GET['August'])){
		
		include("August.php"); 
		
		}
		if(isset($_GET['September'])){
		
		include("September.php"); 
		
		}
		if(isset($_GET['October'])){
		
		include("October.php"); 
		
		}
		if(isset($_GET['November'])){
		
		include("November.php"); 
		
		}
		if(isset($_GET['December'])){
		
		include("December.php"); 
		
		}
		
		
		?>

<div align="center">		
<table width="900">
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

$result = mysqli_query($con,'SELECT SUM(sale_amount) AS value_sum FROM sales'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
	$get_pro = "select * from sales";
	$run_pro = mysqli_query($con, $get_pro); 
	


	
	while ($row_pro=mysqli_fetch_array($run_pro)){
	
		$get_pro2 = "sum(sale_amount) from sales";
	$run_pro2 = mysqli_query($con, $get_pro2);
	
	
	
	
		$pro_id = $row_pro['sale_id'];
		$pro_title = $row_pro['sale_date'];
		$pro_image = $row_pro['sale_product_id'];
		$pro_qty = $row_pro['sale_buyer'];
		$pro_price = $row_pro['sale_qty'];
		$released = $row_pro['sale_amount'];
	
	
		
	?>
	<tr align="center" style="text-align:center;">
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
  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;Total Amount:&#8369;<?php echo $sum?></td>
		
	

	
	

		
		
		
		
		
		