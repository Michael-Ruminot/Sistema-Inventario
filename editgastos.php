<?php
	include("db.php");

	if (isset($_GET['idgasto'])) {
		$idgasto = $_GET['idgasto'];
		$query = "SELECT * FROM gastos WHERE idgasto = $idgasto";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$cantidadgasto = $row['cantidadgasto'];
			$productogasto = $row['productogasto'];
			$valorgasto = $row['valorgasto'];
		}
	}

	if (isset($_POST['actualizargasto'])) {
		$idgasto = $_GET['idgasto'];
		$cantidadgasto = $_POST['cantidadgasto'];
		$productogasto = $_POST['productogasto'];
		$valorgasto = $_POST['valorgasto'];

		$query = "UPDATE gastos set cantidadgasto = '$cantidadgasto', productogasto = '$productogasto', valorgasto = '$valorgasto', WHERE idgasto = $idgasto";
		mysqli_query($conn, $query);

		$_SESSION['message'] = 'Gasto actualizado correctamente';
		$_SESSION['message_type'] = 'info';

		header("Location:gastos.php");
	}


?>		


<?php include("includes/header.php"); ?>

<div class="form_register container p-6">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body">
				<form action="editgastos.php?idgasto=<?php echo $_GET['idgasto']; ?>" method="POST">
					<div class="form-group"> 
						<label>Cantidad:</label>
						<input type="text" id="input_cantidad" name="cantidadgasto" class="form-control" value="<?php echo $cantidadgasto;?>">
					</div>
					<div class="form-group">
						<label>Producto:</label>
					    <select class="form-control"  id="select_producto" name="productogasto" value="<?php echo $productogasto;?>">
						    <option value="" selected hidden>Producto</option>
						    <option value="Taza Magica">Taza magica</option>
						    <option value="Taza Normal">Taza normal</option>
						    <option value="Caja Carton">Caja Carton</option>
						    <option value="Impresora">Impresora</option>
						    <option value="Resma">Resma</option>
						    <option value="Cinta">Cinta</option>
						    <option value="Tinta">Tinta</option>
						</select>
					</div>
					<div class="form-group"> 
						<label>Valor:</label>
						<input type="text" id="input_valor" name="valorgasto" class="form-control" value="<?php echo $valorgasto;?>">
					</div>
					<button class="btn btn-success" name="actualizargasto">
						Actualizar
					</button>
					<a class="btn btn-danger" href="gastos.php">
						Atras
					</a>
				</form>
			</div>
		</div>
	</div>
</div>


<?php include("includes/footer.php"); ?>