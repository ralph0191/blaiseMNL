

<script language="JavaScript" type="text/javascript">
function checkDelete(){
	
	var person = prompt("Please enter your name", "");
if (person != null) {
    document.getElementById("demo").innerHTML =
    "Hello " + person + "! How are you today?";
}
	
	 /* if (confirm("Poista?") == true) {
    return true;
  } else {
    return false;
  }
	*/
    
}

function popup(mylink, windowname) { 
    if (! window.focus)return true;
    var href;
    if (typeof(mylink) == 'string') href=mylink;
    else href=mylink.href; 
    window.open(href, windowname, 'width=400,height=200,scrollbars=yes'); 
    return false; 
  }
</script>
<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>
<table width="1150" align="center"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#ff8000" style="text-align:center;">
		<th>Phaseout ID</th>
		<th>Product Name</th>
		<th>Image</th>
		<th>Product Category</th>
		<th>Product Removed On</th>
		<th>Deleted By</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_pro = "select * from phaseout";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['phaseoutID'];
		$pro_title = $row_pro['prod_title'];
		$pro_image = $row_pro['prod_image'];
		$pro_qty = $row_pro['prod_cat'];
		$released = $row_pro['deletedin'];
		$cat = $row_pro['deletedby'];
		$i++;
		
	
	
	?>

</script>
	<tr align="center" style="text-align:center;">
		<td><?php echo $pro_id;?></td>
		<td><?php echo $pro_title;?></td>
		<td><img src="../admin_area/product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>

		<td><?php echo $pro_qty?></td>

		<td><?php echo $released?></td>
		<td><?php echo $cat?></td>


	
	</tr>
	<?php

/*delete_pro.php?delete_pro=<?php echo $pro_id;?>*/
	}


	?>
</table>

<?php } ?>