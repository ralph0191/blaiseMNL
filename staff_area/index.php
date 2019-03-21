<?php 
include("includes/db.php");
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<!DOCTYPE> 
<style>
body {
color :#e8ecf2
}
h2.bl {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0; }
}
</style>
<html>
<meta charset="UTF-8" />
<link rel="stylesheet" href="styles/style.css" media="all" /> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
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
		<title>ADMIN AREA</title> 
		
	
	</head>

	<body onload=display_ct();>
	
<body> 

<div class="header_wrapper">
		
		<h1>STAFF MODULE</h1>
		
		</div>

	<div class="main_wrapper">
	
	
		<div id="right">
		<center>
		<h3>The current time is: </h3><br>
		<span id='ct'></span>
		<br><hr></center>
		<h2 style="text-align:center;">Manage Content</h2>
		
			
			<nav class="cl-effect-8">
				<a href="index.php?insert_product">Insert New Product</a>
			<a href="index.php?view_products">View All Products</a>
			<a href="index.php?insert_cat">Insert New Category</a>
			<a href="index.php?view_cats">View All Categories</a>
			<a href='pdf.php' target="_blank"> Generate Current Stock PDF </a>
			<a href="index.php?view_customers">Inventory by Category</a>
			<a href="index.php?reports">Reports</a>	
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?orders">Recieve orders</a>
			<a href="index.php?done">Confirm Transanction</a>
			<a href="index.php?phaseout">Phaseouts</a>
			<a href="logout.php">Logout</a>
				</nav>
		</section>
		</div>
	

	

	
	
	
	<?php
	}
	
	?>	</table>
	
		
		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php 
		if(isset($_GET['insert_product'])){
		
		include("insert_product.php"); 
		
		}
			if(isset($_GET['phaseout'])){
		
		include("phaseout.php"); 
		
		}
		if(isset($_GET['view_products'])){
		
		include("view_products.php"); 
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php"); 
		
		}
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php"); 
		
		}
		
		if(isset($_GET['view_cats'])){
		
		include("view_cats.php"); 
		
		}
		
		if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php"); 
		
		}
		
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php"); 
		
		}
		if(isset($_GET['reports'])){
		
		include("reports.php"); 
		
		}
		if(isset($_GET['January'])){
		
		include("January.php"); 
		
		}
		if(isset($_GET['February'])){
		
		include("February.php"); 
		
		}
		if(isset($_GET['March'])){
		
		include("March.php"); 
		
		}
		if(isset($_GET['April'])){
		
		include("April.php"); 
		
		}
		if(isset($_GET['May'])){
		
		include("May.php"); 
		
		}
		if(isset($_GET['June'])){
		
		include("June.php"); 
		
		}
		if(isset($_GET['July'])){
		
		include("July.php"); 
		
		}
		if(isset($_GET['August'])){
		
		include("August.php"); 
		
		}
		if(isset($_GET['September'])){
		
		include("September.php"); 
		
		}
		if(isset($_GET['October'])){
		
		include("October.php"); 
		
		}
		if(isset($_GET['November'])){
		
		include("November.php"); 
		
		}
		if(isset($_GET['December'])){
		
		include("December.php"); 
		
		}
		if(isset($_GET['orders'])){
		
		include("orders.php"); 
		
		}
		if(isset($_GET['view_orders'])){
		
		include("view_orders.php"); 
		
		}
		if(isset($_GET['done'])){
		
		include("done.php"); 
		
		}
		
		
		?>
		</div>

		
		

	</div>
</div>

	<footer></footer>
	
</body>
</html>
