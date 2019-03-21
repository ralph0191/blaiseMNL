<?php 
include ("includes/db.php");

?>
<style>

#sa{
	
		width:220px;
	color:white;
	float:left;
	width:200px;
min-height:600px;
border-left:5px groove orange;
background-color: rgba(0, 0, 0, 0.5);
	
}

#sa a {
text-decoration:none;
color:white;
text-align:left;
font-size:18px;
padding:6px;
margin:6px;
display:block;
}
#sa a:hover {text-decoration:underline; font-weight:bolder; color:orange;}
</style>

<div id="sa">
		
		<center>
		<br><hr></center>
		<h2 style="text-align:center;">Month</h2>
			
			<a href="index.php?January_del">January</a>
			<a href="index.php?February_del">February</a>
			<a href="index.php?March_del">March</a>
			<a href="index.php?April_del">April</a>
			<a href="index.php?May_del">May</a>
			<a href="index.php?June_del">June</a>
			<a href="index.php?July_del">July</a>
			<a href="index.php?August_del">August</a>
			<a href="index.php?September_del">September</a>
			<a href="index.php?October_del">October</a>
			<a href="index.php?November_del">November</a>
			<a href="index.php?December_del">December</a>
			
		
		</div>
		
		
	
		<?php
		if(isset($_GET['January'])){
		
		include("January_login.php"); 
		
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
		
		
		?>
		
		