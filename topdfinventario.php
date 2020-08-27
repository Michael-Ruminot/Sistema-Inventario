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
    // Salto de línea
    $this->Ln(35);
    // Título
    $this->Cell(45,15,'Inventario',1,0,'C');
    // Salto de línea
    $this->Ln(20);
     // Título
    $this->Cell(65,10,'Fecha',1,0,'C');
    $this->Cell(65,10,'Producto',1,0,'C');
    $this->Cell(65,10,'Cantidad',1,0,'C');
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

	$query = "SELECT * FROM productos where id_producto = '1'";
	$result_task = mysqli_query($conn, $query);

	$querysum= "SELECT SUM(cantidad) as TotalCantidadMagica FROM tareas WHERE producto = 'taza magica'";
	$result_sum = mysqli_query($conn, $querysum);

	while ($row = mysqli_fetch_assoc($result_sum)) {
		
		$output = $row['TotalCantidadMagica'];
	}

	/*--------------------------------------------------------------------------------------------------*/

	$query2 = "SELECT * FROM productos where id_producto = '2'";
	$result_task2 = mysqli_query($conn, $query2);

	$querysum2= "SELECT SUM(cantidad) as TotalCantidadNormal FROM tareas WHERE producto = 'taza magica c/caja'";
	$result_sum2 = mysqli_query($conn, $querysum2);

	while ($row = mysqli_fetch_assoc($result_sum2)) {
		
		$output2 = $row['TotalCantidadNormal'];
	}

	/*--------------------------------------------------------------------------------------------------*/

	$query3 = "SELECT * FROM productos where id_producto = '3'";
	$result_task3 = mysqli_query($conn, $query3);

	$querysum3= "SELECT SUM(cantidad) as TotalCantidadCaja FROM tareas WHERE producto = 'taza normal'";
	$result_sum3 = mysqli_query($conn, $querysum3);

	while ($row = mysqli_fetch_assoc($result_sum3)) {
		
		$output3 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query4 = "SELECT * FROM productos where id_producto = '4'";
	$result_task4 = mysqli_query($conn, $query4);

	$querysum4= "SELECT SUM(cantidad) as TotalCantidadCaja FROM tareas WHERE producto = 'taza normal c/caja'";
	$result_sum4 = mysqli_query($conn, $querysum4);

	while ($row = mysqli_fetch_assoc($result_sum4)) {
		
		$output4 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query5= "SELECT * FROM productos where id_producto = '5'";
	$result_task5 = mysqli_query($conn, $query5);

	$querysum5= "SELECT SUM(cantidad) as TotalCantidadCaja FROM tareas WHERE producto = 'taza interior color'";
	$result_sum5 = mysqli_query($conn, $querysum5);

	while ($row = mysqli_fetch_assoc($result_sum5)) {
		
		$output5 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query6= "SELECT * FROM productos where id_producto = '6'";
	$result_task6 = mysqli_query($conn, $query6);

	$querysum6= "SELECT SUM(cantidad) as TotalCantidadCaja FROM tareas WHERE producto = 'taza interior color c/caja'";
	$result_sum6 = mysqli_query($conn, $querysum6);

	while ($row = mysqli_fetch_assoc($result_sum6)) {
		
		$output6 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query7= "SELECT * FROM productos where id_producto = '7'";
	$result_task7 = mysqli_query($conn, $query7);

	$querysum7= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'caja carton'";
	$result_sum7 = mysqli_query($conn, $querysum7);

	while ($row = mysqli_fetch_assoc($result_sum7)) {
		
		$output7 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query8= "SELECT * FROM gastos where idgasto = '1'";
	$result_task8 = mysqli_query($conn, $query8);

	$querysum8= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'impresora'";
	$result_sum8 = mysqli_query($conn, $querysum8);

	while ($row = mysqli_fetch_assoc($result_sum8)) {
		
		$output8 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query9= "SELECT * FROM gastos where idgasto = '2'";
	$result_task9 = mysqli_query($conn, $query9);

	$querysum9= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'resma'";
	$result_sum9 = mysqli_query($conn, $querysum9);

	while ($row = mysqli_fetch_assoc($result_sum9)) {
		
		$output9 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query10= "SELECT * FROM gastos where idgasto = '3'";
	$result_task10 = mysqli_query($conn, $query10);

	$querysum10= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'cinta'";
	$result_sum10 = mysqli_query($conn, $querysum10);

	while ($row = mysqli_fetch_assoc($result_sum10)) {
		
		$output10 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query11= "SELECT * FROM gastos where idgasto = '4'";
	$result_task11 = mysqli_query($conn, $query11);

	$querysum11= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'tinta'";
	$result_sum11 = mysqli_query($conn, $querysum11);

	while ($row = mysqli_fetch_assoc($result_sum11)) {
		
		$output11 = $row['TotalCantidadCaja'];
	}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',6);



while ($row = $result_task->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fecha_creacion'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['producto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output, 1, 1, 'C', 0);
}

while ($row = $result_task2->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fecha_creacion'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['producto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output2, 1, 1, 'C', 0);
}
while ($row = $result_task3->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fecha_creacion'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['producto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output3, 1, 1, 'C', 0);
}
while ($row = $result_task4->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fecha_creacion'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['producto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output4, 1, 1, 'C', 0);
}
while ($row = $result_task5->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fecha_creacion'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['producto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output5, 1, 1, 'C', 0);
}
while ($row = $result_task6->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fecha_creacion'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['producto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output6, 1, 1, 'C', 0);
}
while ($row = $result_task7->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fecha_creacion'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['producto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output7, 1, 1, 'C', 0);
}
while ($row = $result_task8->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fechagasto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['productogasto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output8, 1, 1, 'C', 0);
}
while ($row = $result_task9->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fechagasto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['productogasto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output9, 1, 1, 'C', 0);
}
while ($row = $result_task10->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fechagasto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['productogasto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output10, 1, 1, 'C', 0);
}
while ($row = $result_task11->fetch_assoc()) {
	$pdf->Cell(65, 10, $row['fechagasto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $row['productogasto'], 1, 0, 'C', 0);
	$pdf->Cell(65, 10, $output11, 1, 1, 'C', 0);
}
$pdf->Output();


