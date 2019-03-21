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
						<h2>Welcome!</h2><br>
						<p>
							The Blaise MNL is a retailer of premium Korean beauty products, home furniture and assorted food.
						</p>
					</div>
		
					<div class="main_content">
								
					
					
					
					
						<div id="cart_box">
		
				<form action="" method="post" enctype="multipart/form-data">
			
			<table align="center" width="750">
				
				
				
				<tr align="center">
					<th>Remove</th>
					<th>Product(s)</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>SubTotal</th>
				</tr>
				
	<?php
				
	$total = 0;
	$subtotal = 0;
	
	global $con;
	
	$ip = getIP();
	
	$sel_price = "select * from cart where customer_id='$ip'";
	
	$run_price = mysqli_query($con, $sel_price);
	
	while($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id = $p_price['p_id'];
				
		$pro_qty = $p_price['qty'];
				
		$pro_price = "select * from products where prod_id = '$pro_id'";
		
		$run_pro_price = mysqli_query($con,$pro_price);
		
		while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['prod_price']);
			$product_title = $pp_price['prod_title'];
			$product_image = $pp_price['prod_image'];
			$single_price = $pp_price['prod_price'];
			
			
			$values = array_sum($product_price);
			$subtotal =$pro_qty*$single_price;
			$total += $values*$pro_qty;
				
	?>
	
				<tr align="center">
					<td width="150"><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
					<td width="150"><?php echo $product_title; ?><br>
					
					<script>
	function imgError(image) {
    image.onerror = '';
    image.src = '..admin_area/product_images/unavail.png';
    return true;
}
	</script>					
					<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60px" height="60px" onError='imgError(this);'>
					</td>
					<td> <?php echo $single_price; ?></td>
					<td width="150"><!---<input type="text" size="4" name="qty">---><input id="" type="text" name="qty[<?php echo $pro_id; ?>]" size="4" value="<?php echo $pro_qty; ?>" style="text-align:center;"/>
                                    <input type="hidden" name="item_id[<?php echo $pro_id; ?>]" value="<?php echo $pro_id; ?>"</td>
									
					<?php 
						
						if (isset($_POST['update_cart'])){
                    
                                foreach ($_POST['item_id'] as $key => $id) {
                                
                                    $item_id = $id;
                                    $quantity = $_POST['qty'][$key];									
																	
                                    $update_products = "UPDATE cart SET qty = '$quantity' WHERE p_id = '$item_id';";
                                    
									$run_update = mysqli_query($con, $update_products);
																	
                                }
							
							echo "<script>window.open('cart.php','_self')</script>";
						
                            }
						
						?>				
									
					<td width="150"><?php echo "₱" . $subtotal; ?></td>
				</tr>
				
				<?php }} ?>				
				
		</table>	
				
		<div class="cart-btn-wrap">
		<div class="cart-btn">	<input type="submit" name="update_cart" value="Update Cart"/> </div>
										
		<div class="cart-btn">	<input type="submit" name="continue" value="Continue Shopping"/></div> </div>
					
		<div class="check_out">
		<span><b>Total Price:</b> <?php echo "₱" . $total?> </span>
		<button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></div>
		
		</form>
		
		<?php
		
		function updatecart(){
		
		global $con; 
		
		$ip = getIp();
		
		if(isset($_POST['update_cart'])){
		
			foreach($_POST['remove'] as $remove_id){
			
			$delete_product = "delete from cart where p_id='$remove_id' AND customer_id='$ip'";
			
			$run_delete = mysqli_query($con, $delete_product); 
			
			if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
			
			}
			
			}
			
		}
		if(isset($_POST['continue'])){
		
		echo "<script>window.open('all_products.php','_self')</script>";
		
		}
	
	}
	echo @$up_cart = updatecart();
	
	
		?>
										
					
					
					
				
				
				
		
		
		
		
		</div>
		
								
				
						</div>
					
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