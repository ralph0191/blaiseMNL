<?php 

include("includes/db.php");  ?>
<html>

<form class="form-signin" method="post" action="confirm.php">
		<h2 class="form-signin-heading">Please Re-enter Credentials</h2>
    	<input type="text" class="form-control" name="email" placeholder="Enter e-mail" required="required" />
        <input type="password" class="form-control" name="password" placeholder="Enter password" required="required" />
        <button class="btn btn-primary btn-block btn-large" type="submit" name="login">Login</button>
    </form>
<?php

if(!isset($_SESSION['user_email'])){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$pass = mysqli_real_escape_string($con, $_POST['password']);
	if(isset($_POST['login'])){
	$sql = "select * from staff where staff_pass='$pass'";
	
	$run = mysqli_query($con, $sql); 
	
	
	
	$check_user = mysqli_num_rows($run); 
	
	if($check_user==1){
	
	$_SESSION['user_email']=$email; 
	
	$query2 = "INSERT into deletelogs (deletedby,deletedin) select '$email','$date' from staff where staff_pass = '$pass' ";
		$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
	
	echo "<script>alert('Password Confirmed!, Product Deleted')</script>";
	
	if (!isset($email)){
		
	
		}
		
		else{	
		
	
		echo "<script>window.close();</script>";
		
		
		}
		  
	}
	else {
	
	echo "<script>alert('Password is wrong, try again!')</script>";
	
	}
	}
	
	//echo "YOU ARE NOT AUTHORIZED";
}
else {
echo "<script>alert('Pano ka napunta dito!')</script>";

}

?>





</html>
