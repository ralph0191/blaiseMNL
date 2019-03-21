<?php
include("includes/db.php"); 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {
	$email = $_SESSION['user_email'];

if(isset($_GET['delete_pro'])){
	
	$delete_id = $_GET['delete_pro'];

?>

<!DOCTYPE> 

<html>

<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var strcount
var x = new Date()
var h= x.getHours();
h = h % 12;
h= h ? h : 12; // the hour '0' should be '12'
var ampm = h >= 12 ? 'AM' : 'PM';
var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";
var x1 = month[x.getMonth()] + " " + x.getDate() + ", " + x.getFullYear(); 
x1 = x1 + "<br>" + h + ":" + x.getMinutes() + ":" + x.getSeconds() + " " + ampm + "<br>";
document.getElementById('ct').innerHTML = x1;

tt=display_c();
}

</script>

	<head>
		<title>STAFF AREA</title> 
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>

	<body onload=display_ct();>
	
<body> 


<div class="header_wrapper">
		
		<h1>STAFF AREA</h1>
		
		</div>

	<div class="main_wrapper">
	
	
		<div id="right">
		
		<center>
		<h3>The current time is: </h3><br>
		<span id='ct'></span>
		<br><hr></center>
		<h2 style="text-align:center;">Manage Content</h2>
		
		</div>
		
		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<center>
		<form class="form-signin" method="post"><br><br>
		<h2 class="form-signin-heading">Authentication Required</h2><br>
        <input type="password" class="form-control" name="password" placeholder="Enter password" />
        <button class="btn btn-primary btn-block btn-large" type="submit" name="confirm">Confirm</button>
		<input type="submit" name="cancel" value="Cancel" />
    </form>
		
		</div>

	<footer></footer>

	<?php 
	
	
	if(isset($_POST['confirm'])){
		
		
	
	
	
	$pass = mysqli_real_escape_string($con, $_POST['password']);
	
	
	$sel_user = "select * from admins where user_email='$email' AND user_pass='$pass'";
	
	$run_user = mysqli_query($con, $sel_user); 
	
	 $check_user = mysqli_num_rows($run_user); 
	
	if($check_user==1){
		
	
	$delete_pro = "delete from staff where staff_id='$delete_id'"; 
	$run_delete = mysqli_query($con, $delete_pro); 

	if($run_delete){
		
	
	
	echo "<script>alert('Staff has been removed!')</script>";
	echo "<script>window.open('index.php?view_products','_self')</script>";
}
else{
	
		echo "<script>alert('DI NA GANA')</script>";
}
	}
	
	else {
	
	echo "<script>alert('Password or is wrong, try again!')</script>";
	
	}


}

		if(isset($_POST['cancel'])){
	
	echo "<script>alert('User action cancelled!')</script>";
	echo "<script>window.open('index.php?view_products','_self')</script>";
	
	}

}
else{
	echo "<script>alert('ASASAS')</script>";
}

}
?>
