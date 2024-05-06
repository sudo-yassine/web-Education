<?php
// Include the fpdf library
require('../PDF/fpdf.php');
// Include the reclamationC class
require_once('../Controller/reclamationC.php');

// Create a new instance of the reclamationC class
$reclamationC = new reclamationC();

// Retrieve the table data from the database or any other source
$tableData = $reclamationC->ListReclamtion();

// Create a new instance of fpdf
$pdf = new fpdf();
$pdf->AddPage();

// Add content to the PDF using the table data
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0, 10, 'Reclamation Table', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell(20, 10, 'Nom', 1, 0, 'C');
$pdf->Cell(20, 10, 'Prenom', 1, 0, 'C');
$pdf->Cell(50, 10, 'Email', 1, 0, 'C');
$pdf->Cell(25, 10, 'numTel', 1, 0, 'C');
$pdf->Cell(15, 10, 'Type', 1, 0, 'C');
$pdf->Cell(30, 10, 'Description', 1, 0, 'C');
$pdf->Ln(); // Add a new line after each row


$pdf->SetFont('Arial', '', 10);
foreach ($tableData as $row) {
    $pdf->Cell(10, 10, $row['id_reclamation'], 1, 0);
    $pdf->Cell(20, 10, $row['nom'], 1, 0);
    $pdf->Cell(20, 10, $row['prenom'], 1, 0);
    $pdf->Cell(50, 10, $row['email'], 1, 0);
    $pdf->Cell(25, 10, $row['telephone'], 1, 0);
    $pdf->Cell(15, 10, $row['typee'], 1, 0);
    $pdf->Cell(30, 10, $row['descp'], 1, 0);
    $pdf->Ln(); // Add a new line after each row
}


// Generate the PDF in a variable
ob_start();
$pdf->Output();
$pdfContent = ob_get_clean();

// Set the appropriate headers for PDF download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="ReclamationTable.pdf"');

// Send the PDF content to the browser
echo $pdfContent;
?>