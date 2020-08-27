<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<?php include("includes/footer.php") ?>

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
				<form action="save.php" method="POST">
					<div class="col-md-4 form-group float-left">
						<input type="text" id="cantidadinput" name="cantidadgasto" class="form-control" placeholder="Cantidad" autofocus  required>
					</div>
					
					<div class="col-md-4 form-group float-right">
					    <select class="form-control"  id="selectproducto" name="productogasto" required>
						    <option value="" selected hidden>Producto</option>
						    <option value="Taza Magica">Taza magica</option>
						    <option value="Taza Magica con caja">taza magica c/caja</option>
						    <option value="Taza Normal">Taza normal</option>
						    <option value="Taza Normal con caja">taza normal c/caja</option>
						    <option value="Taza Normal-Color">taza interior color</option>
						    <option value="Taza Normal-Color con caja">taza interior color c/caja</option>
						    <option value="Caja Carton">Caja Carton</option>
						    <option value="Impresora">Impresora</option>
						    <option value="Resma">Resma</option>
						    <option value="Cinta">Cinta</option>
						    <option value="Tinta">Tinta</option>
						</select>
					</div>
					<div class="col-md-4 form-group float-left">
						<input type="text" id="inputvalor" name="valorgasto" class="form-control" placeholder="Valor" autofocus required>
					</div>
					<input type="submit" name="guardar_gasto" value="Guardar" class="btn btn-success btn-block trans">
				</form>
			</div>
		</div>

		<div class="form-list col-md-12">
			<label><?php echo "Gastos";?></label> <!-- <a href="#" id="alist" class="navbar-brand"></a> -->
			<a href="toexcelgastos.php"><img src="images/excel.png" class="d-inline-block align-top" alt="excel" id="logoexcel"></a>
			<a href="topdfgastos.php"><img src="images/pdf.png" class="d-inline-block align-top" alt="pdf" id="logopdf"></a>
			

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Fecha</th>        
						<th>Cantidad</th>     
						<th>Producto</th>     
						<th>Gasto Unitario</th>    
						<th>Acción</th>  
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
								
								
								<td>
									<a href="delete.php?idgasto=<?php echo $row['idgasto']?>" class="btn btn-danger">
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