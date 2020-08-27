<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<?php

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

	$query8= "SELECT * FROM productos where id_producto = '8'";
	$result_task8 = mysqli_query($conn, $query8);

	$querysum8= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'impresora'";
	$result_sum8 = mysqli_query($conn, $querysum8);

	while ($row = mysqli_fetch_assoc($result_sum8)) {
		
		$output8 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query9= "SELECT * FROM productos where id_producto = '9'";
	$result_task9 = mysqli_query($conn, $query9);

	$querysum9= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'resma'";
	$result_sum9 = mysqli_query($conn, $querysum9);

	while ($row = mysqli_fetch_assoc($result_sum9)) {
		
		$output9 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query10= "SELECT * FROM productos where id_producto = '10'";
	$result_task10 = mysqli_query($conn, $query10);

	$querysum10= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'cinta'";
	$result_sum10 = mysqli_query($conn, $querysum10);

	while ($row = mysqli_fetch_assoc($result_sum10)) {
		
		$output10 = $row['TotalCantidadCaja'];
	}

	/*---------------------------------------------------------------------------------------------------*/

	$query11= "SELECT * FROM productos where id_producto = '11'";
	$result_task11 = mysqli_query($conn, $query11);

	$querysum11= "SELECT SUM(cantidadgasto) as TotalCantidadCaja FROM gastos WHERE productogasto = 'tinta'";
	$result_sum11 = mysqli_query($conn, $querysum11);

	while ($row = mysqli_fetch_assoc($result_sum11)) {
		
		$output11 = $row['TotalCantidadCaja'];
	}
?>

<div class="container">
	<div class="form-list col-md-12">
			<label><?php echo "Inventario";?></label> <!-- <a href="#" id="alist" class="navbar-brand"></a> -->
			<a href="toexcelinventario.php"><img src="images/excel.png" class="d-inline-block align-top" alt="excel" id="logoexcel"></a>
			<a href="topdfinventario.php"><img src="images/pdf.png" class="d-inline-block align-top" alt="pdf" id="logopdf"></a>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Producto</th>
						<th>Stock</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						while ($row = mysqli_fetch_array($result_task)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output;?></td>
							</tr>
						<?php } ?>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task2)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output2;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task3)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output3;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task4)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output4;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task5)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output5;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task6)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output6;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task7)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output7;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task8)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output8;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task9)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output9;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task10)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output10;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_task11)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output11;?></td>
							</tr>
						<?php } ?>
					</tr>
				</tbody>
			</table> 
		</div>

</div>


<?php include("includes/footer.php") ?>

