<!DOCTYPE>

<?php
session_start();
include ("functions/functions.php");

?>

<html>
	<head>
		<title>Blaise MNL</title>
	</head>
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--<script src="js/modernizr.custom.js"></script>-->
		<link rel="stylesheet" href="styles/style.css" media="all" type="text/css">

<body>


<!--Header starts here-->
	<div class="header_wrapper">
	<div class="header">
		<div class="logo">
		<h1><span>Blaise</span>Mnl</h1>
		</div>
	<!--Menubar starts here-->
		<div class="menu_wrapper">
		<div class="menubar">
			<ul id="menu">		
				<li class="current_list_item"><a class="home" href="index.php" >Home</a></li>
				<li><a href="AboutUs.php" >About Us</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer_register.php">Register</a></li>
			</ul>

			<div id="form" class="search_form">
				<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" class="searchfrm" name="user_query" placeholder="Search for a product"/>
				<input  type="submit" class="searchbtn" name="search" value="Search" />
				</form>
			</div>
		</div>
		</div>
	<!--Menubar ends here-->
	</div>	
	</div>
<!--Header ends here-->

<!--Main Container starts here!-->
	<div class="main_wrapper">
		<div class="login_details">
				<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome: </b>" . $_SESSION['customer_email'] ;
					echo "<span class='my_account'><a href='my_account.php'> My Account </a></span>";
					}
					else {
					echo "<b>Welcome Guest: </b>";
					}
					?>	<?php 

					if(!isset($_SESSION['customer_email'])){
			
					echo "<a href='login.php' style='color:yellow;'>Login</a>";}
		
					else{
						echo "<a href='logout.php' style='color:yellow;'>- Logout</a>";
					}?>	
			</div>
		<div class="shopping_cart">		
		
		<div class="shopping_details">
		<a href="cart.php"><img class="imagedropshadow" id="imgcart" src="images/cartpink.png"></a>
		<span class="item_details"><b style="color:yellow">Shopping Cart</b> - Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>  </span>
		</div>		
		</div>
		

<!--Content starts here-->
	<div class="content_wrapper">
		<div id="content_area">
			<div class="upper_content">
				<div id="sidebar">		
					<div id="sidebar_title">Categories</div>
						<ul id="cats">		
							<?php getCats(); ?>		
						</ul>		
				</div>			
				
				<div class="upper_content">
					<div class="content_up">
						<h2>Register</h2><br>
						
					</div>
		
					<div class="main_content">
						<div id="products_box">
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
								<option disabled="disabled" selected="selected">Select a Country</option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Japan</option>
								<option>Pakistan</option>
								<option>Israel</option>
								<option>Nepal</option>
								<option>Philippines</option>
								<option>United Arab Emirates</option>
								<option>United States</option>
								<option>United Kingdom</option>
							</select><br><br>
					<input type="text" class="form-control" name="c_city" placeholder="Enter City" required/>
					<input type="text" class="form-control" name="c_contact" placeholder="Enter Contact Number" required/>
					<input type="text" class="form-control" name="c_address" placeholder="Enter Address" required/>
					
					<br>
					
					<input class="btn btn-lg btn-primary btn-block" type="submit" name="register" />
					<hr>
					 <a href="customer_login.php">Already have an account?</a>
					 <a href="index.php">Back to Home</a>
				</form>
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
						</div>
					
					</div>			
				</div>
			</div>	
			
			<div id="lower-content" >
				<div class="content_low">
					<h3>Contact Us</h3>					
				</div>
				<div id="get-in-touch">
					<div class="git_left">
						<p>
							Address: BF HOMES<br>
							Phone: +811 808 80
						</p>
					</div>
					<div class="git right">
						<h3>How's our website? Add your suggestions!</h3>
						<ul id="contact-list">
							<li>Name:<input type="text"></input></li>
							<li>Email:<input type="text"></input></li>
							<li id="message">Message:<textarea rows="3"  ></textarea></li>
							<a href="#">Send</a>
						</ul>
					</div>
				</div>
				
				
			</div>
			

				
			
		</div>		
	</div>
	
</div>	
<!--Main Container ends here!-->

<!--Footer starts here!-->
<div id="footer">
	<div class="footer_wrapper">
		&copy; 2018 Developed by <a href="#">Regine Lau & Ralph Suga</a>&nbsp;&nbsp;|&nbsp;&nbsp;Design by <a href="#" target="_blank" >Miguel Delos Santos</a> 
	</div>
</div>
<!--Footer ends here!-->
	
</body>	
</html>