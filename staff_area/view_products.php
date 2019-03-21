

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
<table width="1100" align="center"> 

	
	<tr align="center">
		<td colspan="9"><h2>View All Products Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#ff8000" style="text-align:center;">
		<th>I.D.</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Stock</th>
		<th>Edit</th>
		<th>Delete</th>
		<th>Date Released</th>
		<th>Category</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_pro = "select * from products";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['prod_id'];
		$pro_title = $row_pro['prod_title'];
		$pro_image = $row_pro['prod_image'];
		$pro_qty = $row_pro['prod_qty'];
		$pro_price = $row_pro['prod_price'];
		$released = $row_pro['dateentered'];
		$cat = $row_pro['prod_cat'];
		$i++;
		
		
		if ($row_pro['prod_cat'] == "1") {
    $cate = "K-Beauty";
} elseif ($row_pro['prod_cat'] == "2"){
     $cate = "Food";
}
 elseif ($row_pro['prod_cat'] == "3"){
     $cate = "Home";
}
 elseif ($row_pro['prod_cat'] == "4"){
     $cate = "Makeup";
}
elseif ($row_pro['prod_cat'] == "5"){
	$cate = "Skincare";
}
else{
$cate="Not defined";
}
	
	?>

</script>
	<tr align="center" style="text-align:center;">
		<td><?php echo $pro_id;?></td>
		<td><?php echo $pro_title;?></td>
		<td><img src="../admin_area/product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
		<td>₱<?php echo $pro_price;?></td>
		<td><?php echo $pro_qty?></td>
		<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>"><img src="edit-icon.png" width="50" height="50"></a></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>"><img src="del-icon.png" width="50" height="50"></a></td>
		<td><?php echo $released?></td>
		<td><?php echo $cate?></td>
	
	</tr>
	<?php

/*delete_pro.php?delete_pro=<?php echo $pro_id;?>*/
	}


	?>
</table>

<?php } ?>