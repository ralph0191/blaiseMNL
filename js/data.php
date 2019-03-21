<?php

//setting header to json
header('Content-Type: application/json');

//database
include ("../functions/functions.php");

//query to get data from the table
$query = sprintf("SELECT sale_product_id, sale_qty FROM sales ORDER BY sale_qty");

//"SELECT playerid, score FROM score ORDER BY playerid"

//execute query
$result = mysqli_query($con, $query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$con->close();

//now print the data
print json_encode($data);