<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<?php include("includes/footer.php") ?>


<?php

	$sum = "SELECT SUM(cantidad) AS TotalCantidad FROM productos WHERE producto";
	$result_sum = mysqli_query($conn, $sum);

	while ($row = mysqli_fetch_assoc($result_sum)) {
		$output = $row['TotalCantidad'];
	}
?>
	
<div class="container">
	<div class="row">
		
		<?php if (isset($_SESSION['message'])) { ?>
			<div class="alerta col-md-12 alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
			  <?= $_SESSION['message'] ?> <!-- Mostramos los datos que tenemos en sesion en save.php-->
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php session_unset(); } ?> <!-- Session unset limpiar los datos que tenemos en sesion en save.php-->


		<div class="form_register col-md-8 mx-auto">
			<div class="card card-body">
				<form action="save.php" method="POST" onsubmit="return validar_formulario();">
					<div class="col-md-4 form-group float-left">
						<input type="text" id="cantidadinput" name="cantidad" class="form-control" placeholder="Cantidad" tabindex="1" autofocus  required>
					</div>
					<div class="col-md-4 form-group float-right">
						<input type="text" id="inputcliente" name="cliente" class="form-control" placeholder="Cliente" tabindex="3" required>
					</div>
					<div class="col-md-4 form-group float-right">
					    <select class="form-control"  id="selectproducto" name="producto" tabindex="2" required>
						    <option value="" selected hidden>Producto</option>
						    <option value="Taza Magica">Taza magica</option>
						    <option value="Taza magica c/caja">taza magica c/caja</option>
						    <option value="Taza Normal">Taza normal</option>
						    <option value="Taza normal c/caja">taza normal c/caja</option>
						    <option value="Taza interior color">taza interior color</option>
						    <option value="Taza interior color c/caja">taza interior color c/caja</option>
						    <option value="Caja Carton">Caja Carton</option>
						</select>
					</div>
					<div class="col-md-4 form-group float-left">
						<input type="text" id="inputvalor" name="valor" class="form-control" placeholder="Valor" tabindex="4" required>
					</div>
					<div class="col-md-4 form-group float-right">
						<input type="text" id="inputgasto" name="gasto" class="form-control" placeholder="Gasto" tabindex="6" required>
					</div>
					<div class="col-md-4 form-group float-right">
						<select class="form-control"  id="selectestado"  name="estado" tabindex="5" required>
						    <option value="" selected hidden>Estado</option>
						    <option value="Entregada">Entregada</option>
						    <option value="Pendiente">Pendiente</option>
						    <option value="Perdida">Perdida</option>
						    <option value="Inversion">Inversión</option>
						</select>
					</div>
					<div class="col-md-12 form-group float-right">
						<textarea class="form-control" id="textareanota" name="nota" rows="3" placeholder="Notas" tabindex="7" required ></textarea>
					</div>
					<input type="submit" name="guardar_tarea" value="Guardar" class="btn btn-success btn-block trans">
				</form>
			</div>
		</div>

		
		
		<div class="form-list col-md-12">
			<label><?php echo "Compras/Ventas";?></label> <!-- <a href="#" id="alist" class="navbar-brand"></a> -->
			<a href="toexcel.php"><img src="images/excel.png" class="d-inline-block align-top" alt="excel" id="logoexcel"></a>
			<a href="topdf.php"><img src="images/pdf.png" class="d-inline-block align-top" alt="pdf" id="logopdf"></a>

			<table class="table table-bordered display" id="tabla">
				<thead>
					<tr>
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
						<th>Accion</th>
						<th>Accion</th>
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
								
								<td>
									<a href="edit.php?id_tarea=<?php echo $row['id_tarea']?>" class="btn btn-secondary">
										<i class="fas fa-marker"></i>     <!-- icono editar Font awesome -->
									</a>
								</td>
								<td>
									<a href="delete.php?id_tarea=<?php echo $row['id_tarea']?>" class="btn btn-danger">
										<i class="far fa-trash-alt"></i>  <!-- icono eliminar Font awesome -->
									</a>
								</td>
							</tr>
						<?php } ?>
				</tbody>
			</table> 
		</div>
	</div>
</div>



	
