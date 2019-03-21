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
		<a href='pdfjune.php' target="_blank">Print PDF</a>
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
<table cellspacing="4">
<tr align="center">
		<td colspan="6"><h2>Admin/Staff Logs</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#8c6d00" style="text-align:center;">
		<th>Login ID</th>
			<th>Login Email</th>
		<th>Login Type</th>
		<th>Login Time in</th>
		
		<th>Logout Time Out</th>
	
	</tr>	
<?php 	
	$get_pro = "select * from loginlogs where logintime like '2018-06-%' ORDER BY logintime DESC";
	$run_pro = mysqli_query($con, $get_pro); 
	

	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['loginid'];
		$pro_title = $row_pro['loginname'];
		$pro_image = $row_pro['loginrole'];
		$pro_qty = $row_pro['logintime'];
		$released = $row_pro['logouttime'];
	
	
		
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
		
		
	

	
	

		
		
		
		