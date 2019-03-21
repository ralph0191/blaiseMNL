<?php
session_start();
include("functions/functions.php");
include("includes/db.php"); 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Register Now!</title>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script>
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
</head>

<body onload="runBGSlideShow()">
<title>Register Now</title>
<link rel="stylesheet prefetch" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"> 
<link rel="stylesheet" href="styles/stylesign.css">

</head>


<a href="index.html"></a>

      <div class="wrapper">  
		<form class="form-signin" method="post" action="" enctype="multipart/form-data" >
      <h2 class="form-signin-heading">Add Your Details Here!</h2>
      
					<br/>
					<input type="text" class="form-control" name="c_name" placeholder="Enter Name" required/>
					<input type="email" class="form-control" name="c_email" placeholder="Enter Valid E-Mail" required/>
					<input type="password" class="form-control" name="c_pass" placeholder="Create Password" required/>
					<input type="password" class="form-control" name="passwordconfirm" placeholder="Confirm Password"/>
					<br/>
					<input type="file" name="c_image" onchange="readURL(this);"/>
					<img id="blah" src="#" alt="IMAGE HERE" />
					<script>
					 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
					</script><br><br>
					<select name="c_country">
								<option disabled="disabled" selected="selected">Select a Region</option>
								<option>NCR</option>
								<option>CAR</option>
								<option>MIMAROPA</option>
								<option>ARM</option>
								<option>Region I</option>
								<option>Region II</option>
								<option>Region III</option>
								<option>Region IV</option>
								<option>Region V</option>
								<option>Region VI</option>
								<option>Region VII</option>
								<option>Region VIII</option>
								<option>Region IX</option>
								<option>Region X</option>
								<option>Region XI</option>
								<option>Region XII</option>
								<option>Region XIII</option>
							</select><br><br>
					<input type="text" class="form-control" name="c_city" placeholder="Enter City" required/>
					<input type="text" class="form-control" name="c_contact" placeholder="Enter Contact Number" required min-length="11" max-length="11" size="11"/>
					<input type="text" class="form-control" name="c_address" placeholder="Enter Address" required/>
					
					<br>
					
					<input class="btn btn-lg btn-primary btn-block" type="submit" name="register" />
					<hr>
					 <a href="customer_login.php">Already have an account?</a>
					 <a href="index.php">Back to Home</a>
				</form>
				</div>

</body>
</html>

<?php 


	if(isset($_POST['register'])){
	
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$confirmpassword = $_POST['passwordconfirm'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address']; 
		
		if($confirmpassword!=$c_pass){

		echo ("<script>alert('Password does not match')</script>!");
		return true;
	}
	
	$check_email = "select * from customers where customer_email='$c_email'";
	$run = mysqli_query($con,$check_email);
	if(mysqli_num_rows($run)>0){
		
		echo ("<script>alert('Email $c_email is already exist')</script>");
		
		return true;
		
		
	}
		
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
		
		$run_c = mysqli_query($con, $insert_c);
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		unset($c_name);
		unset($c_email);
		unset($confirmpassword);
		unset($c_image);
		unset($c_country);
		unset($c_city);
		unset($c_contact);
		unset($c_address);
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('customer/checkout.php','_self')</script>";
		
		
		}
		
	}





?>