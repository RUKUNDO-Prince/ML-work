<?php
require('../connection.php');
// require_once __DIR__ . '/vendor/autoload.php';
require('fpdf/fpdf.php');

// if (isset($_POST['generate-pdf'])) {
//   $pdf = new FPDF();
//   $pdf->AddPage();

//   $pdf->SetFont('Arial', 'B', 16);
//   $pdf->Cell(40, 10, 'ID');
//   $pdf->Cell(40, 10, 'FirstName');
//   $pdf->Cell(40, 10, 'LastName');
//   $pdf->Cell(40, 10, 'Address');
//   $pdf->Ln(); // line break

//   $pdf->SetFont('Arial', '', 12);
//   $pdf->Cell(40, 10, 'John Doe');
//   $pdf->Cell(40, 10, 'john@example.com');
//   $pdf->Ln(); // line break

//   $pdf->Cell(40, 10, 'Jane Smith');
//   $pdf->Cell(40, 10, 'jane@example.com');

//   $pdf->Output('myfile.pdf', 'D');
//   exit;
// }


// Query to fetch all contacts data
$sql = "SELECT * FROM members";
$result = mysqli_query($conn, $sql);

// Create a new PDF document



$pdf = new FPDF();
$pdf->AddPage();

// Set the font and size for the header row
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'ID',1);
$pdf->Cell(40,10,'Firstname',1);
$pdf->Cell(40,10,'Lastname',1);
$pdf->Cell(40,10,'address',1);
$pdf->Ln();

// Loop through the data and add to the PDF
$pdf->SetFont('Arial','',14);
while($row = mysqli_fetch_row($result)) {
    $pdf->Cell(40,10,$row[0],1);
    $pdf->Cell(40,10,$row[1],1);
    $pdf->Cell(40,10,$row[2],1);
    $pdf->Cell(40,10,$row[3],1);
    $pdf->Ln();
}

// Output the PDF document
$pdf->Output('myfile.pdf', 'D');
exit();


?> 







<!-- <?php
include('connection.php');
require_once __DIR__ . '/vendor/autoload.php';
require('fpdf/fpdf.php');

// CSV Export
if(isset($_POST['csv'])){
    $filename = 'csv_exports.csv';
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename='.$filename);
    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID', 'Firstname', 'Lastname','Address'));
    $sqlSelect = "SELECT * FROM members";
    $result = mysqli_query($conn, $sqlSelect);
    while($row = mysqli_fetch_assoc($result)){
        fputcsv($output, $row);
    }
    fclose($output);
    exit();
}

// Query to fetch all contacts data
$sql = "SELECT * FROM members";
$result = mysqli_query($conn, $sql);

// Create a new PDF document



$pdf = new FPDF();
$pdf->AddPage();

// Set the font and size for the header row
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'ID',1);
$pdf->Cell(40,10,'Firstname',1);
$pdf->Cell(40,10,'Lastname',1);
$pdf->Cell(40,10,'address',1);
$pdf->Ln();

// Loop through the data and add to the PDF
$pdf->SetFont('Arial','',14);
while($row = mysqli_fetch_row($result)) {
    $pdf->Cell(40,10,$row[0],1);
    $pdf->Cell(40,10,$row[1],1);
    $pdf->Cell(40,10,$row[2],1);
    $pdf->Cell(40,10,$row[3],1);
    $pdf->Ln();
}

// Output the PDF document
$pdf->Output();
?> -->










<!DOCTYPE html>
<html>
<head>
  <title>Generate PDF</title>
</head>
<body>
  <form method="post">
    <button type="submit" name="generate-pdf">Download PDF</button>
  </form>
</body>
</html>
