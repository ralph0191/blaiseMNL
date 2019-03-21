<!DOCTYPE>

<?php 

include("includes/db.php");

if(isset($_GET['edit_pro'])){

	$get_id = $_GET['edit_pro']; 
	
	$get_pro = "select * from products where prod_id='$get_id'";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	$row_pro=mysqli_fetch_array($run_pro);
		
		$pro_id = $row_pro['prod_id'];
		$pro_title = $row_pro['prod_title'];
		$pro_image = $row_pro['prod_image'];
		$pro_price = $row_pro['prod_price'];
		$pro_qty = $row_pro['prod_qty'];
		$pro_cat = $row_pro['prod_cat'];
		
		$get_cat = "select * from categories where cat_id='$pro_cat'";
		
		$run_cat=mysqli_query($con, $get_cat); 
		
		$row_cat=mysqli_fetch_array($run_cat); 
		
		$category_title = $row_cat['cat_title'];
		
		
}
?>
<html>
	<head>
		<title>Update Product</title> 
		
	</head>
	
<body bgcolor="orange">


	<form action="" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="795" border="2">
			
			<tr align="center">
				<td colspan="7"><h2>Edit & Update Product</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="prod_title" size="60" value="<?php echo $pro_title;?>"/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="prod_cat" >
					<option disabled="disabled" selected="selected">Select category</option>
					<?php 
		$get_cats = "select * from categories";
	
		$run_cats = mysqli_query($con, $get_cats);
	
		while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
		echo "<option value='$cat_id'>$cat_title</option>";
	

		}
	
					
					?>
				</select>
				
				
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td><input type="file" name="prod_image" /><img src="../admin_area/product_images/<?php echo $pro_image; ?>" width="60" height="60"/></td>
			</tr>
			
			<tr>
		<td align="right"><b>Product Quantity:</b></td>
		<td><input type="text" name="prod_qty" value="<?php echo $pro_qty;?>" required/></td>
	</tr>
			
			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td><input type="text" name="prod_price" value="<?php echo $pro_price;?>"/></td>
			</tr>
			
			
			<tr align="center">
				<td colspan="7"><input type="submit" name="update_product" value="Update Product"/></td>
			</tr>
		
		</table>
	
	
	</form>


</body> 
</html>
<?php 

	if(isset($_POST['update_product'])){
	
		//getting the text data from the fields
		
		$update_id = $pro_id;
		
		$product_title = $_POST['prod_title'];
		$product_cat= $_POST['prod_cat'];
		$product_price = $_POST['prod_price'];
		$product_qty = $_POST['prod_qty'];
	
		//getting the image from the field
		$product_image = $_FILES['prod_image']['name'];
		$product_image_tmp = $_FILES['prod_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"../admin_area/product_images/$product_image");
	
		 $update_product = "update products set prod_cat='$product_cat',prod_title='$product_title',prod_qty='$product_qty',prod_price='$product_price',prod_image='$product_image' where prod_id='$update_id'";
		 
		 $run_product = mysqli_query($con, $update_product);
		 
		 if($run_product){
		 
		 echo "<script>alert('Product has been updated!')</script>";
		 
		 echo "<script>window.open('index.php?view_products','_self')</script>";
		 
		 }
	}








?>












