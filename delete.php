<?php
	include("db.php");

	if (isset($_GET['id_tarea'])) {
		$id = $_GET['id_tarea'];
		$query = "DELETE FROM tareas WHERE id_tarea = $id";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query Fallida");
		}

		$_SESSION['message'] = 'Tarea eliminada correctamente';
		$_SESSION['message_type'] = 'danger';
		
		header("Location: index.php");
	}

	/* ---------------------------------------------------------------*/

	if (isset($_GET['idgasto'])) {
		$id = $_GET['idgasto'];
		$query = "DELETE FROM gastos WHERE idgasto = $id";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query Fallida");
		}

		$_SESSION['message'] = 'Tarea eliminada correctamente';
		$_SESSION['message_type'] = 'danger';
		
		header("Location: gastos.php");
	}
?>