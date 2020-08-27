<?php
require('fpdf/fpdf.php');
require ('db.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('images/logo.png',90,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    //  Pintar cuadro rojo
    $this->SetDrawColor(128,0,0);
    // Movernos a la derecha
    $this->Cell(75);
    // Salto de lín47
    $this->Ln(35);
    // Título
    $this->Cell(45,15,'Gastos',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    // Título
    $this->Cell(47,10,'Fecha',1,0,'C');
    $this->Cell(47,10,'Cantidad',1,0,'C');
    $this->Cell(47,10,'Producto',1,0,'C');
    $this->Cell(47,10,'Valor',1,0,'C');
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


$query = "SELECT * FROM gastos";
$result_task = mysqli_query($conn, $query);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',6);



while ($row = $result_task->fetch_assoc()) {
	$pdf->Cell(47, 10, $row['fechagasto'], 1, 0, 'C', 0);
	$pdf->Cell(47, 10, $row['cantidadgasto'], 1, 0, 'C', 0);
	$pdf->Cell(47, 10, $row['productogasto'], 1, 0, 'C', 0);
	$pdf->Cell(47, 10, $row['valorgasto'], 1, 1, 'C', 0);
}

$pdf->Output();


