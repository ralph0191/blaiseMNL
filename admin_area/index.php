<?php
session_start();

if(!isset($_SESSION['user_email'])){

	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

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
		<title>Blaise MNL ADMIN CONTROL</title> 

	<link rel="stylesheet" href="style.css" media="all" />
	</head>

	<body onload=display_ct();>

<body>


<div class="header_wrapper">

		<h1>ADMIN CONTROL PANEL</h1>

		</div>

	<div class="main_wrapper">


		<div id="right">

		<center>
		<h3>The current time is: </h3><br>
		<span id='ct'></span>
		<br><hr></center>
		<h2 style="text-align:center;">Manage Content</h2>




			<a href="index.php?view_customers">View Customers</a>

			<a href="index.php?view_products">View Staffs</a>
			<a href="index.php?insert_staff">Add Staffs</a>
			<a href="index.php?login_log">View Logins</a>
			<a href="index.php?delete_log">View Delete Logs</a>

			<a href="logout.php">Admin Logout</a>

		</div>

		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php
		if(isset($_GET['insert_product'])){

		include("insert_product.php");

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
		if(isset($_GET['insert_staff'])){

		include("insert_staff.php");

		}

		if(isset($_GET['login_log'])){

		include("login_log.php");

		}

		if(isset($_GET['delete_log'])){

		include("del/delete_log.php");

		}

		if(isset($_GET['January'])){

		include("January_login.php");

		}
		if(isset($_GET['February'])){

		include("February_login.php");

		}
		if(isset($_GET['March'])){

		include("March_login.php");

		}
		if(isset($_GET['April'])){

		include("April_login.php");

		}
		if(isset($_GET['May'])){

		include("May_login.php");

		}
		if(isset($_GET['June'])){

		include("June_login.php");

		}
		if(isset($_GET['July'])){

		include("July_login.php");

		}
		if(isset($_GET['August'])){

		include("August_login.php");

		}
		if(isset($_GET['September'])){

		include("September_login.php");

		}
		if(isset($_GET['October'])){

		include("October_login.php");

		}
		if(isset($_GET['November'])){

		include("November_login.php");

		}
		if(isset($_GET['December'])){

		include("December_login.php");

		}
		if(isset($_GET['January_del'])){

		include("del/January.php");

		}
		if(isset($_GET['February_del'])){

		include("del/February.php");

		}
		if(isset($_GET['March_del'])){

		include("del/March.php");

		}
		if(isset($_GET['April_del'])){

		include("del/April.php");

		}
		if(isset($_GET['May_del'])){

		include("del/May.php");

		}
		if(isset($_GET['June_del'])){

		include("del/June.php");

		}
		if(isset($_GET['July_del'])){

		include("del/July.php");

		}
		if(isset($_GET['August_del'])){

		include("del/August.php");

		}
		if(isset($_GET['September_del'])){

		include("del/September.php");

		}
		if(isset($_GET['October_del'])){

		include("del/October.php");

		}
		if(isset($_GET['November_del'])){

		include("del/November.php");

		}
		if(isset($_GET['December_del'])){

		include("del/December.php");

		}

		?>
		</div>



	</div>

	<footer></footer>

</body>
</html>

<?php } ?>
