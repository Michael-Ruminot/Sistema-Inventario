<?php

	include('db.php');

	if (isset($_POST['guardar_tarea'])) {
		$cantidad = $_POST['cantidad'];
		$cliente = $_POST['cliente'];
		$producto = $_POST['producto'];
		$valor = $_POST['valor'];
		$gasto = $_POST['gasto'];
		$estado = $_POST['estado'];
		$nota = $_POST['nota'];


		$query = "INSERT INTO tareas(cantidad, cliente, producto, valor, gasto, estado, nota) VALUES ('$cantidad', '$cliente', '$producto', '$valor', '$gasto', '$estado' , '$nota')";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query Fallida");
		}


		$_SESSION['message'] = 'Tarea guardada exitosamente!';   /* Mensaje al guardar dato quedando almacenado en sesion*/
		$_SESSION['message_type'] = 'success';					/* Estilo del mensaje almacenado en sesion*/

		header("Location: index.php");
	}


	/* ------------------------------------------------------------------------------------------------------------------------*/

	if (isset($_POST['guardar_gasto'])) {
		$cantidadgasto = $_POST['cantidadgasto'];
		$productogasto = $_POST['productogasto'];
		$valorgasto = $_POST['valorgasto'];

		$query = "INSERT INTO gastos(cantidadgasto, productogasto, valorgasto) VALUES ('$cantidadgasto','$productogasto', '$valorgasto')";
		$result = mysqli_query($conn, $query);

		if (!$result) {
			die("Query Fallida");
		}


		$_SESSION['message'] = 'Tarea guardada exitosamente!';   /* Mensaje al guardar dato quedando almacenado en sesion*/
		$_SESSION['message_type'] = 'success';					/* Estilo del mensaje almacenado en sesion*/

		header("Location: gastos.php");

	}

?>

