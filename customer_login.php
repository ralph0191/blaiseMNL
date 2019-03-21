<?php
 session_start();
 include("includes/db.php");
 include ("functions/functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Now!</title>
<script language="JavaScript">
<!--

// (C) 2003 CodeLifter.com
// Free for all users, but leave in this  header

// =======================================
// set the following variables
// =======================================

// Set speed (milliseconds)
var speed = 3000

// Specify the image files
var Pic = new Array() // don't touch this
// to add more images, just continue
// the pattern, adding to the array below

Pic[0] = 'images/rail1.jpg'
Pic[1] = 'images/rail2.jpg'
Pic[2] = 'images/rail3.jpg'
Pic[3] = 'images/rail4.jpg'

// =======================================
// do not edit anything below this line
// =======================================

var t
var j = 0
var p = Pic.length

var preLoad = new Array()
for (i = 0; i < p; i++){
   preLoad[i] = new Image()
   preLoad[i].src = Pic[i]
}

function runBGSlideShow(){
   if (document.body){
   document.body.background = Pic[j];
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runBGSlideShow()', speed)
   }
}

//-->
</script>


<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

<link rel="stylesheet" href="styles/stylesign.css">    
    
    
  </head>

  <body onload="runBGSlideShow()">
  
  <a href="index.php"></a>

      <div class="wrapper">
    <form class="form-signin" method="POST" action="customer_login.php" enctype="multipart/form-data">       
      <h2 class="form-signin-heading">Login</h2>
	  <input type="text" class="form-control" name="email" placeholder="Enter e-mail" />
      <input type="password" class="form-control" name="pass" placeholder="Enter password"/>
	  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button><hr>
<a href="customer_register.php">New here?</a>
<a href="checkout.php?forgot_pass">Forgot Password?</a>
<a href="index.php">Back to Home</a>
    </form>
	
	<?php 
	
	if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "<script>alert('Password or email is incorrect, please try again!')</script>";
		return true;
		}
		else{
			$cus_id = $run_c['customer_id'];
		}	
		$ip = getIp(); 
		
		$sel_cart = "select * from cart where customer_id='$cus_id'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customer/checkout.php','_self')</script>";
		
		
		}
	}
	
	
	?>
	
</div>

</body>
</html>