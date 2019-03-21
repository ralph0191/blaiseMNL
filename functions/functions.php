<?php

define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', 'root');
 define('DBNAME', 'ecommerce');

$con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

if(mysqli_connect_errno()){
	echo "The connection was not established" . mysqli_connect_error();
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//creating the shopping cart




function cart(){
	
	
		
	if (isset($_GET['add_cart'])){

		global $con;
		
		$ip = getIp();
		
		$pro_id = $_GET['add_cart'];
		
		$check_pro = "select * from cart where customer_id='$ip' AND p_id='$pro_id'";		
		$run_check = mysqli_query($con, $check_pro);
		
		if(mysqli_num_rows($run_check)>0){
			echo "<script>alert('Product has already been added!')</script>";
		}
		else {
			
			$insert_pro = "insert into cart (p_id,customer_id,qty) values ('$pro_id','$ip',+1)";
			
			$run_pro = mysqli_query($con, $insert_pro);
			
			echo "<script>window.open('cart.php','_self')</script>";
			
		}
		
	}	
	
}
//getting the total added items

function total_items(){
	
	if(isset($_GET['add_cart'])){
		
		global $con;
		
		$ip = getIp();
		
		$get_items = "select * from cart where customer_id='$ip'";
		
		$run_items = mysqli_query($con, $get_items);
		
		$count_items = mysqli_num_rows($run_items);
		
	}
		
		else{
			
			global $con;
			
		$ip = getIp();
		
		$get_items = "select * from cart where customer_id='$ip'";
		
		$run_items = mysqli_query($con, $get_items);
		
		$count_items = mysqli_num_rows($run_items);
			
		}
		
		
		echo $count_items;
	}
	
//getting the total price of the items in the cart

function total_price(){
	
	$total = 0;
	
	global $con;
	
	$ip = getIp();
	
	$sel_price = "select * from cart where customer_id='$ip'";
	
	$run_price = mysqli_query($con, $sel_price);
	
	while($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id = $p_price['p_id'];
		
		$pro_price = "select * from products where prod_id = '$pro_id'";
		
		$run_pro_price = mysqli_query($con,$pro_price);
		
		while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['prod_price']);
			
			$values = array_sum($product_price);
			
			$total += $values;
			
		}
		
	}
	
	echo "₱" . $total;
	
}

//getting the categories

function getCats(){
	
	global $con;
	
	$get_cats = "select * FROM categories";
	
	$run_cats = mysqli_query($con,$get_cats);
	
	while($row_cats=mysqli_fetch_array($run_cats)){
		
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		
	echo "<li><a href='all_products.php?cat=$cat_id'>$cat_title</a></li>";
		
	}
	
}


function getPro(){
	
	if(!isset($_GET['cat'])){
	
	global $con;
	
	$get_pro = "select * from products";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro = mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['prod_id'];
		$pro_title = $row_pro['prod_title'];
		$pro_cat = $row_pro['prod_cat'];
		$pro_qty = $row_pro['prod_qty'];
		$pro_price = $row_pro['prod_price'];
		$pro_image = $row_pro['prod_image'];
		$pro_desc = $row_pro['prod_desc'];
		
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
					<h4>$pro_desc</h4>
					
					<p><b>Price: ₱ $pro_price </b></p>
					
					<a href='all_products.php?add_cart=$pro_id'><button align='center'>Add to Cart</button></a>
					
			
		</div>
		
		";
		
	}
	
}
}

function getCatPro(){
	
	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];
	
	global $con;
	
	$get_cat_pro = "select * from products where prod_cat='$cat_id'";
	
	$run_cat_pro = mysqli_query($con, $get_cat_pro);
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0){
		
		echo "<h2 style='padding:20px;'>There is no product in this category!</h2>";

	}
	
	while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
		
		$pro_id = $row_cat_pro['prod_id'];
		$pro_title = $row_cat_pro['prod_title'];
		$pro_cat = $row_cat_pro['prod_cat'];
		$pro_qty = $row_cat_pro['prod_qty'];
		$pro_price = $row_cat_pro['prod_price'];
		$pro_image = $row_cat_pro['prod_image'];
		$pro_desc = $row_cat_pro['prod_desc'];
		
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
					
					<h4>$pro_desc</h4>
					<p><b>Price: ₱ $pro_price </b></p>
					
					<a href='all_products.php?add_cart=$pro_id'><button align='center'>Add to Cart</button></a>
			
		</div>
		
		
		
		";
		
	
	
}

}
}

function updatequantity(){

$total = 0;

global $con;

if(isset($_POST['update_cart'])){
						
							$qty = $_POST['qty'];
							
							$update_qty = "update cart set qty='$qty'";
							
							$run_qty = mysqli_query($con, $update_qty); 
							
							$_SESSION['qty']=$qty;
							
							$total = $total*$qty;
						}
}

?>