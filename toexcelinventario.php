<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=inventario.xls');

	require_once('db.php');

	$query="SELECT * FROM productos";
	$result=mysqli_query($conn, $query);
?>

<?php
	$query = "SELECT * FROM productos where id_producto = '1'";
	$result_task = mysqli_query($conn, $query);

	$query2= "SELECT SUM(cantidad) as TotalCantidadMagica FROM tareas WHERE producto = 'taza magica'";
	$result_sum = mysqli_query($conn, $query2);

	while ($row = mysqli_fetch_assoc($result_sum)) {
		
		$output = $row['TotalCantidadMagica'];
	}

	/*--------------------------------------------------------------------------------------------------*/

	$query2 = "SELECT * FROM productos where id_producto = '2'";
	$result_tarea = mysqli_query($conn, $query2);

	$query3= "SELECT SUM(cantidad) as TotalCantidadNormal FROM tareas WHERE producto = 'taza normal'";
	$result_suma = mysqli_query($conn, $query3);

	while ($row = mysqli_fetch_assoc($result_suma)) {
		
		$output2 = $row['TotalCantidadNormal'];
	}

	/*--------------------------------------------------------------------------------------------------*/
	$query3 = "SELECT * FROM productos where id_producto = '3'";
	$result_tarea2 = mysqli_query($conn, $query3);

	$query3= "SELECT SUM(cantidad) as TotalCantidadCaja FROM tareas WHERE producto = 'caja carton'";
	$result_suma3 = mysqli_query($conn, $query3);

	while ($row = mysqli_fetch_assoc($result_suma3)) {
		
		$output3 = $row['TotalCantidadCaja'];
	}
?>


<table border="1">
	<thead>
		<tr style="background-color: black ; color: white">
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

						while ($row = mysqli_fetch_array($result_tarea)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output2;?></td>
							</tr>
						<?php } ?>
					</tr>
					<tr>
						<?php 

						while ($row = mysqli_fetch_array($result_tarea2)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion']?></td>
								<td><?php echo $row['producto']?></td>
								<td><?php echo $output3;?></td>
							</tr>
						<?php } ?>
					</tr>
				</tbody>
				
</table>