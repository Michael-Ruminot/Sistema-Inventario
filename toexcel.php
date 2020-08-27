<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=compra/venta.xls');

	require_once('db.php');

	$query="SELECT * FROM tareas";
	$result=mysqli_query($conn, $query);
?>

<table border="1">
	<thead>
		<tr style="background-color: black ; color: white">
						<th>Fecha</th>        <!-- Mostrar en inventario-->
						<th>Cantidad</th>     <!-- Mostrar en inventario-->
						<th>Cliente</th>
						<th>Producto</th>     <!-- Mostrar en inventario-->
						<th>Valor Unitario</th>
						<th>Valor Total</th>
						<th>Gasto Unitario</th> <!-- $gasto 7-->
						<th>Gasto Total</th>    <!-- $gastototal 8-->
						<th>Ganancia/Perdida</th> <!-- $gastototal 9-->
						<th>Estado</th>
						<th>Notas</th>
		</tr>
	</thead>
				<tbody>
					<?php 
						
						$query = "SELECT * FROM tareas ORDER BY id_tarea DESC";
						$result_task = mysqli_query($conn, $query);
						$valortotal = 0;   //Total declarado antes del bucle
						$gastototal =0;	   //Total declarado antes del bucle
						$gananciaperdida =0;


						while ($row = mysqli_fetch_array($result_task)) { ?>
							<tr>
								<td><?php echo $row['fecha_creacion'] ?></td>
								<td><?php echo $row['cantidad'] ?></td>
								<td><?php echo $row['cliente'] ?></td>
								<td><?php echo $row['producto'] ?></td>
								<td><?php echo $row['valor'] ?></td>
								<td>
									<?php 
										$valortotal = $row['cantidad'] * $row['valor'];
										echo $valortotal;

									?>
								</td>
								<td><?php echo $row['gasto'] ?></td>
								<td><?php
										$gastototal = $row['gasto'] * $row['cantidad'];
										echo $gastototal;
									?>	
								</td>
								<td>
									<?php 
										$gananciaperdida = $valortotal - $gastototal;
										echo $gananciaperdida;
									?>
								</td>
								
								<td><?php echo $row['estado'] ?></td>

								<td><?php echo $row['nota'] ?></td>
							</tr>
						<?php } ?>
				</tbody>
</table>

