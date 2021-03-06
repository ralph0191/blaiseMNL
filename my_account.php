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
				<li><a href="register.php">Register</a></li>
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
		<span class="item_details"><b style="color:yellow">Shopping Cart</b>- Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>  </span>
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
						<ul id="cats" class="my_account_menu">
						
				<?php 
				$user = $_SESSION['customer_email'];
				
				$get_img = "select * from customers where customer_email='$user'";
				
				$run_img = mysqli_query($con, $get_img); 
				
				$row_img = mysqli_fetch_array($run_img); 
				
				$c_image = $row_img['customer_image'];
				
				$c_name = $row_img['customer_name'];
				
				if ($c_image == NULL){
					echo "<p style='text-align:center;'><img src='customer/customer_images/none.png' width='150' height='150'/></p>";
				}else{
					echo "<p style='text-align:center;'><img src='customer/customer_images/$c_image' width='150' height='150'/></p>";
				}
				?>
				
				<li><a href="my_account.php?my_orders">My Orders</a></li>
				<li><a href="my_account.php?edit_account">Edit Account</a></li>
				<li><a href="my_account.php?change_pass">Change Password</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
				<li><a href="logout.php">Logout</a></li>
				
				<ul>
					</div>
		
					<div class="main_content">
						<div id="products_box">
						<?php 
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				echo "
				<h2 style='padding:20px;'>Welcome:  $c_name </h2>
				<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
				}
				}
				}
				}
				?>
				
				<?php 
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}
				if(isset($_GET['my_orders'])){
				include("my_orders.php");
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