<?php 
session_start(); 
$date = date('Y-m-d H:i:s');

$con = mysqli_connect("localhost","root","root","ecommerce");
$last_inserted_row = mysqli_insert_id($con);
$query2 = "update loginlogs set logouttime = CURRENT_TIMESTAMP ORDER BY loginid DESC LIMIT 1" ;
		$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));

session_destroy(); 


echo "<script>window.open('login.php?logged_out=You have logged out, come back soon!','_self')</script>";




?> 