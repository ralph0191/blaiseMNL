<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

include("includes/db.php");
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<head>
		<title>Insert Products</title>
	</head>
	
<body>

<form action="insert_staff.php" method="POST" enctype="multipart/form-data">

<table align="center" width="780">

	<tr align="center">
		<td colspan="3"><h2>Add new Staff</h2></td>
	</tr>
	
	<tr>
		<td align="center" style="padding:10px;"><b>Staff Email</b></td>
		<td align="center" colspan="2"><input type="email" name="prod_title" required/></td>
	</tr>



<tr>
		<td align="center" style="padding:10px;"><b>Staff password</b></td>
		<td align="center" colspan="2"><input type="text" name="staff_pass" required/></td>
	</tr>



	<tr>
		<td colspan="3" align="center" style="padding:10px;"><input type="submit" name="insert_post" value="Add staff!" /></td>
	</tr>


</form>

</table>

</body>

</html>


<?php

if(isset($_POST['insert_post'])){
	
	//getting text data from the fields
	
	$prod_title = $_POST['prod_title'];
	$staff_pass = $_POST['staff_pass'];
	
	//getting file data from the field/s
	$prod_image = $_FILES['prod_image']['name'];
	$prod_tmp_image = $_FILES['prod_image']['tmp_name'];
	
	move_uploaded_file($prod_tmp_image, "product_images/$prod_image");
	  
	  
	  $check=mysqli_query($con,"select * from staff where staff_email='$prod_title'");
    $checkrows=mysqli_num_rows($check);
	
	if($checkrows>0) {
     echo "<script>alert('Staff exists! Please try again')</script>";
	 echo "<script>window.open('index.php?insert_staff','_self')</script>";
   } 
	
	else{
	
	$insert_prod = "insert into staff (staff_email,staff_pass) values ('$prod_title','$staff_pass')";

	$insert_pro=mysqli_query($con,$insert_prod);
	
	if($insert_pro){
		
		echo "<script>alert('Staff has been added!')</script>";
		echo "<script>window.open('index.php?insert_staff','_self')</script>";
		
	}
	
}
}
?>