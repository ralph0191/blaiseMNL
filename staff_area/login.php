<?php 
session_start();

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

Pic[0] = 'images/staff.jpg'


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
<div class="wrapper">

	<form class="form-signin" method="post" action="login.php">
		<h2 class="badge-primary" style="color: black;">Seller Login</h2>
		<br/>
    	<input type="text" class="form-control" name="email" placeholder="Enter e-mail" required="required" />
			<br/>
			<input type="password" class="form-control" name="password" placeholder="Enter password" required="required" />
        <button class="btn btn-primary btn-block btn-large" type="submit" name="login">Login</button>
    </form>
</div>


</body>
</html>
<?php 

include("includes/db.php"); 
	
	if(isset($_POST['login'])){
	
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$pass = mysqli_real_escape_string($con, $_POST['password']);
	
	$sel_user = "SELECT * FROM staff WHERE staff_email='$email' AND staff_pass='$pass'";
	
	$run_user = mysqli_query($con, $sel_user); 
	
	$check_user = mysqli_num_rows($run_user); 
	
	if($check_user==1){
	
		$_SESSION['user_email']=$email; 
		$_SESSION['FirstName']=$firstName;
		$_SESSION['LastName']=$lastName;
	echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	
	}
	else {
	
	echo "<script>alert('Password or Email is wrong, try again!')</script>";
	
	}
	
	
	}
	
	
	
	
	








?>