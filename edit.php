<?php
	include("db.php");

	if (isset($_GET['id_tarea'])) {
		$id = $_GET['id_tarea'];
		$query = "SELECT * FROM tareas WHERE id_tarea = $id";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$cantidad = $row['cantidad'];
			$cliente = $row['cliente'];
			$producto = $row['producto'];
			$valor = $row['valor'];
			$gasto = $row['gasto'];
			$ganancia = $row['ganancia'];
			$estado = $row['estado'];
			$nota = $row['nota'];
		}
	}

	if (isset($_POST['actualizar'])) {
		$id = $_GET['id_tarea'];
		$cantidad = $_POST['cantidad'];
		$cliente = $_POST['cliente'];
		$producto = $_POST['producto'];
		$valor = $_POST['valor'];
		$gasto = $_POST['gasto'];
		$ganancia = $_POST['ganancia'];
		$estado = $_POST['estado'];
		$nota = $row['nota'];

		$query = "UPDATE tareas set cantidad = '$cantidad', cliente = '$cliente', producto = '$producto', valor = '$valor', gasto = '$gasto', ganancia = '$ganancia', estado = '$estado' , nota = '$nota' WHERE id_tarea = $id";
		mysqli_query($conn, $query);

		$_SESSION['message'] = 'Tarea actualizada correctamente';
		$_SESSION['message_type'] = 'info';

		header("Location:index.php");
	}


?>		


<?php include("includes/header.php"); ?>

<div class="form_register container p-6">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body">
				<form action="edit.php?id_tarea=<?php echo $_GET['id_tarea']; ?>" method="POST">
					<div class="form-group"> 
						<label>Cantidad:</label>
						<input type="text" id="input_cantidad" name="cantidad" class="form-control" value="<?php echo $cantidad;?>">
					</div>
					<div class="form-group"> 
						<label>Cliente:</label>
						<input type="text" id="input_cliente" name="cliente" class="form-control" value="<?php echo $cliente;?>" readonly>
						<script>document.getElementById('input_cliente').readOnly = true;</script>
					</div>
					<div class="form-group">
						<label>Producto:</label>
					    <select class="form-control"  id="select_producto" name="producto" value="<?php echo $producto;?>">
						    <option value="" selected hidden></option>
						    <option value="" selected hidden>Producto</option>
						    <option value="Taza Magica">Taza magica</option>
						    <option value="Taza Magica c/caja">taza magica c/caja</option>
						    <option value="Taza Normal">Taza normal</option>
						    <option value="Taza normal c/caja">taza normal c/caja</option>
						    <option value="Taza interior color">taza interior color</option>
						    <option value="taza color c/caja">taza interior color c/caja</option>
						    <option value="Caja Carton">Caja Carton</option>
						</select>
					</div>
					<div class="form-group"> 
						<label>Valor:</label>
						<input type="text" id="input_valor" name="valor" class="form-control" value="<?php echo $valor;?>">
					</div>
					<div class="form-group"> 
						<label>Gasto:</label>
						<input type="text" id="input_gasto" name="gasto" class="form-control" value="<?php echo $gasto;?>">
					</div>
					<div class="form-group">
						<label>Estado:</label>
						<select class="form-control"  id="select_estado" name="estado" value="<?php echo $estado; ?>">
						    <option value="" selected hidden></option>
						    <option value="Entregada">Entregada</option>
						    <option value="Pendiente">Pendiente</option>
						    <option value="Perdida">Perdida</option>
						    <option value="Inversion">Inversión</option>
						</select>
					</div>
					<div class="form-group">
						<textarea class="form-control" id="textareanota" name="nota" value="<?php echo $nota; ?>" rows="3" placeholder="Notas" tabindex="7" required ></textarea>
					</div>
					<button class="btn btn-success" name="actualizar">
						Actualizar
					</button>
					<a class="btn btn-danger" href="index.php">
						Atras
					</a>
				</form>
			</div>
		</div>
	</div>
</div>


<?php include("includes/footer.php"); ?>