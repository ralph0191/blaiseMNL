<?php


//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('fpdf/fpdf.php');

//Connect to your database
include("includes/db.php");

//Select the Products you want to show in your PDF file
$result=mysqli_query($con,"select prod_id,prod_title, prod_price,prod_qty,dateentered from products ORDER BY prod_id");
$number_of_products = mysqli_num_rows($result);

//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";
$column_qty = "";
$date_ent = "";
$total = 0;

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$code = $row["prod_id"];
	$name = substr($row["prod_title"],0,20);
	$real_price = $row["prod_price"];
	$price_to_show =  number_format($row["prod_price"],'2');
	$qty = $row["prod_qty"];
	$de = $row["dateentered"];

	$column_code = $column_code.$code."\n";
	$column_name = $column_name.$name."\n";
	$date_ent = $date_ent.$de."\n";
	$column_qty = $column_qty.$qty."\n";
	$column_price = $column_price.$price_to_show."\n";
	
	$image1 = "../images/SSLOGO1.jpg";

	//Sum all the Prices (TOTAL)
	//$total =  $total +$real_price;
	
	
}


mysqli_close($con);



//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
//$total = $total;

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 90;
//Table position, under Fields Name
$Y_Table_Position = 96;

$pdf->Image($image1, 35,  $pdf->GetY() - 20, 120);


$pdf->SetXY(80,  $pdf->GetY() + 55); // position of text1, numerical, of course, not x1 and y1
$pdf->Write(0, 'Current Stocks');
//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(25);
$pdf->Cell(20,6,'ID',1,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(50,6,'NAME',1,0,'L',1);
$pdf->SetX(95);
$pdf->Cell(20,6,'QTY',1,0,'L',1);
$pdf->SetX(115);
$pdf->Cell(30,6,'PRICE',1,0,'R',1);
$pdf->SetX(145);
$pdf->Cell(50,6,'DATE ENTERED',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(20,6,$column_qty,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(20,6,$column_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(50,6,$column_name,1);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);


$pdf->SetX(115);
$pdf->MultiCell(30,6,''.$column_price,1,'R');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(50,6,$date_ent,1);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(25);
	$pdf->MultiCell(170,6,'',1);
	$i = $i +1;
	
}

$pdf->Output();


?>
