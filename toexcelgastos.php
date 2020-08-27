<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=gastos.xls');

	require_once('db.php');

	$query="SELECT * FROM tareas";
	$result=mysqli_query($conn, $query);
?>


<table border="1">
	<thead>
		<tr style="background-color: black ; color: white">
						<th>Fecha</th>        
						<th>Cantidad</th>     
						<th>Producto</th>     
						<th>Gasto Unitario</th>
		</tr>
	</thead>
				
	<tbody>
					<?php 

						$query = "SELECT * FROM gastos ORDER BY idgasto DESC";
						$result_task = mysqli_query($conn, $query);
						$gastototal =0;	   //Total declarado antes del bucle


						while ($row = mysqli_fetch_array($result_task)) { ?>
							<tr>
								<td><?php echo $row['fechagasto'] ?></td>
								<td><?php echo $row['cantidadgasto'] ?></td>
								<td><?php echo $row['productogasto'] ?></td>
								<td><?php echo $row['valorgasto'] ?></td>
							</tr>
						<?php } ?>
				</tbody>
</table>