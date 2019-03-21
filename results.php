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
						<h2>Search Results</h2><br>
						
					</div>
		
					<div class="main_content">
						<div id="products_box">
						<?php 
	
			if(isset($_GET['search'])){
				
	$search_query = $_GET['user_query'];
		
	$get_pro = "select * from products where prod_title like '%$search_query%'";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro = mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['prod_id'];
		$pro_title = $row_pro['prod_title'];
		$pro_cat = $row_pro['prod_cat'];
		$pro_qty = $row_pro['prod_qty'];
		$pro_price = $row_pro['prod_price'];
		$pro_image = $row_pro['prod_image'];
		
		echo "
		
		<div id='single_product'>
		
			<h4>$pro_title</h4>
					
					<script>
	function imgError(image) {
    image.onerror = '';
    image.src = 'admin_area/product_images/unavail.png';
    return true;
}
	</script>
			
					<img src='admin_area/product_images/$pro_image' width='180' height='180' onError='imgError(this);' />
					
					<p><b> ₱ $pro_price </b></p>
					
					<a href='all_products.php?add_cart=$pro_id'><button align='center'>Add to Cart</button></a>
	</script>
		</div>
		
		";}
			}
		?>
		<?php
		
		getCatPro();
		
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