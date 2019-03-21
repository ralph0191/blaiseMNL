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
$result=mysqli_query($con,"select * from loginlogs where logintime like '2018-02-%'");
$number_of_products = mysqli_num_rows($result);
$image1 = "../images/SSLOGO1.jpg";
//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";

$column_qty = "";
$column_date = "";
$column_buyer = "";
$total = 0;

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$code = $row["loginid"];
	$name = substr($row["loginname"],0,20);

	$qty = $row["loginrole"];
	$buyer = $row["logintime"];
	$sale_date = $row["logouttime"];

	$column_code = $column_code.$code."\n";
	$column_name = $column_name.$name."\n";
	$column_qty = $column_qty.$qty."\n";
	$column_buyer = $column_buyer.$buyer."\n";
	$column_date = $column_date.$sale_date."\n";


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


$pdf->SetXY(70,  $pdf->GetY() + 55); // position of text1, numerical, of course, not x1 and y1
$pdf->Write(0, 'February Login Report');

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(20);
$pdf->Cell(10,6,'ID',1,0,'L',1);
$pdf->SetX(30);
$pdf->Cell(47,6,'EMAIL',1,0,'C',1);
$pdf->SetX(77);
$pdf->Cell(14,6,'TYPE',1,0,'L',1);

$pdf->SetX(91);
$pdf->Cell(43,6,'Login Time in',1,0,'C',1);
$pdf->SetX(134);
$pdf->Cell(50,6,'Login Time out',1,0,'C',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(10,6,$column_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(77);
$pdf->MultiCell(14,6,$column_qty,1);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(47,6,$column_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(91);
$pdf->MultiCell(43,6,$column_date,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(134);
$pdf->MultiCell(50,6,$column_buyer,1);





//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(20);
	$pdf->MultiCell(164,6,'',1);
	$i = $i +1;

}

$pdf->Output();


?>
