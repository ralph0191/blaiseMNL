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
$result=mysqli_query($con,"select * from sales where sale_date like '2018-11-%'");
$number_of_products = mysqli_num_rows($result);
$image1 = "../images/SSLOGO1.jpg";
//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";
$column_qty = "";
$column_date = "";
$column_buyer = "";
$total = 0;

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$code = $row["sale_id"];
	$name = substr($row["sale_product_id"],0,20);
	$real_price = $row["sale_amount"];
	$price_to_show =  number_format($row["sale_amount"],'2');
	$qty = $row["sale_qty"];
	$buyer = $row["sale_buyer"];
	$sale_date = $row["sale_date"];

	$column_code = $column_code.$code."\n";
	$column_name = $column_name.$name."\n";
	$column_qty = $column_qty.$qty."\n";
	$column_buyer = $column_buyer.$buyer."\n";
	$column_date = $column_date.$sale_date."\n";
	$column_price = $column_price.$price_to_show."\n";

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
$pdf->Write(0, 'November Sales');

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(20);
$pdf->Cell(20,6,'ID',1,0,'L',1);
$pdf->SetX(40);
$pdf->Cell(30,6,'PRODUCT ID',1,0,'L',1);
$pdf->SetX(70);
$pdf->Cell(20,6,'QTY',1,0,'L',1);
$pdf->SetX(90);
$pdf->Cell(20,6,'PRICE',1,0,'R',1);
$pdf->SetX(110);
$pdf->Cell(30,6,'DATE',1,0,'R',1);
$pdf->SetX(140);
$pdf->Cell(50,6,'BUYER',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(20,6,$column_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(20,6,$column_qty,1);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(50,6,$column_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(30,6,$column_date,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(50,6,$column_buyer,1);



$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->SetX(90);
$pdf->MultiCell(20,6,''.$column_price,1,'R');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(20);
	$pdf->MultiCell(170,6,'',1);
	$i = $i +1;
	
}

$pdf->Output();


?>
