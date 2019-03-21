<?php 
	include("includes/db.php"); 
	session_start();
	
	if(isset($_GET['delete_pro'])){
	
	$delete_id = $_GET['delete_pro'];
	
	$insert = "insert into phaseout (prod_id,prod_title,prod_cat,prod_image,deletedin,deletedby) select prod_id,prod_title,prod_cat,prod_image,'$date','".$_SESSION['user_email']."' from products where prod_id ='$delete_id' ";
$result = mysqli_query($con, $insert);
	$delete_pro = "delete from products where prod_id='$delete_id'"; 
	
	$run_delete = mysqli_query($con, $delete_pro); 
	
	
	if($run_delete){
	
	


	echo "<script>alert('A product has been deleted!')</script>";
	echo "<script>window.open('index.php?view_products','_self')</script>";

	}
	
	
	}





?>