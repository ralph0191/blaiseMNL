<?php 
include ("includes/db.php");

?>


<style>
#k {
	
}
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
		<a href='del/pdfapril.php' target="_blank">Print PDF</a>
		<h2 style="text-align:center;">Month</h2>
			
			<a href="index.php?January_del">January</a>
			<a href="index.php?February_del">February</a>
			<a href="index.php?March_del">March</a>
			<a href="index.php?April_del">April</a>
			<a href="index.php?May_del">May</a>
			<a href="index.php?June_del">June</a>
			<a href="index.php?July_del">July</a>
		<a href="index.php?August_del">August</a>
			<a href="index.php?September_del">September</a>
			<a href="index.php?October_del">October</a>
		<a href="index.php?November_del">November</a>
		<a href="index.php?December_del">December</a>
			
		
		
		</div>
		
	<div align="center">	
<table cellspacing="4">
<tr align="center">
		<td colspan="6"><h2>Sales</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#8c6d00" style="text-align:center;">
		<th>Delete ID</th>
			<th>Deleted By</th>
		<th>Deleted On</th>
		<th>Phaseout ID</th>
		

	
	</tr>	
<?php 	
	$get_pro = "select * from deletelogs where deletedin like '2017-04-%' ORDER BY deletedin DESC";
	$run_pro = mysqli_query($con, $get_pro); 
	

	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['del_id'];
		$pro_title = $row_pro['deletedby'];
		$pro_image = $row_pro['deletedin'];
		$pro_qty = $row_pro['phaseoutID'];

	
	
		
	?>
	<tr align="center" style="text-align:center;">
		<td><?php echo $pro_id;?></td>
		<td><?php echo $pro_title;?></td>
		<td><?php echo $pro_image;?></td>
		<td><?php echo $pro_qty?></td>	

		<td><?php echo $released?></td>
	
	</tr>

	

	
	
	
	<?php
	}
	
	?>	</table>
</div>
		
		
	

	
	

		
		
		
		