<?php include("includes/header.php") ?>

<div class="contenedor container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h3>Usuarios</h3>
			<hr>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalnuevousuario">
					Añadir nuevo usuario
				</button>
				<button type="button" class="btn btn-secondary">Descargar información de los usuarios</button>

				<div class="btn-group" role="group">
					<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Más opciones
					</button>
					<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						<a class="dropdown-item" href="#">Usuarios eliminados recientemente</a>

					</div>
				</div>
			</div>
		</div>

		<br>
		<br>

		<?php
		if (isset($_SESSION['message'])) {
			$respuesta = $_SESSION['message'];	?>
			<script>
				Swal.fire(
					'Bien Hecho!',
					'<?php echo $respuesta ?>',
					'success'
				)
			</script>
		<?php
			unset($_SESSION['message']);
		}
		?>

		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 card">
			<table class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
				<table class="table table-striped table-bordered" id="tabla">
					<thead class="table-dark">
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Username</th>
							<th>Fecha Nacimiento</th>
							<th>Rol</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$query = "SELECT usuario.usuario_id,usuario.usuario_nombre,usuario.usuario_apellido,usuario.usuario_username,usuario.usuario_password,usuario.usuario_fechanacimiento,rol.rol FROM usuario INNER JOIN rol WHERE usuario.rol = rol.rol_id";
						$result_task = mysqli_query($conn, $query);

						while ($row = mysqli_fetch_array($result_task)) : ?>
							<tr>
								<td><?php echo $row['usuario_id'] ?></td>
								<td><?php echo $row['usuario_nombre'] ?></td>
								<td><?php echo $row['usuario_apellido'] ?></td>
								<td><?php echo $row['usuario_username'] ?></td>
								<td><?php echo $row['usuario_fechanacimiento'] ?></td>
								<td><?php echo $row['rol'] ?></td>

								<td>
									<!-- <a href="edituser.php?usuario_id=</*?php echo $row['usuario_id'] ?>" -->
									<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editar<?php echo $row['usuario_id']; ?>">
										<i class="fa fa-edit "></i>
									</button>
								</td>
								<?php include "edituser.php"; ?>
								<td>
									<a href="eliminarusuario.php?usuario_id=<?php echo $row['usuario_id'] ?>" class="btn btn-danger">
										<i class="far fa-trash-alt"></i>
									</a>
								</td>

							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</table>
		</div>
	</div>


	<!-- Modal Nuevo usuario-->
	<div class="modal fade modal fade bd-example-modal-lg" role="dialog" data-toggle="modal" id="modalnuevousuario" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese nuevo usuario</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- form_register -->
					<div class="registro col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">
						<div class="card-body">
							<form action="saveuser.php" method="POST">
								<div class="form-group row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-left">
										<input type="text" id="inputnombre" name="nombre" class="form-control" placeholder="Nombre" tabindex="1" autofocus required>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-right">
										<input type="text" id="inputcliente" name="apellido" class="form-control" placeholder="Apellidos" tabindex="2" autofocus required>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-right">
										<input type="text" id="inputfecha" name="fecha" class="form-control" placeholder="Fecha Nacimiento(año-mes-dia)" tabindex="3" autofocus required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-right">
										<input type="text" id="inputcliente" name="username" class="form-control" placeholder="Nombre de usuario" tabindex="4" autofocus required>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-right">
										<select class="form-control" id="selectrol" name="rol" tabindex="5" autofocus required>
											<option value="" selected hidden>Rol</option>
											<option value="1">Administrador</option>
											<option value="2">Invitado</option>
										</select>
									</div>
									<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7 form-group float-left">
										<input type="password" id="inputpassword" name="password" class="form-control" placeholder="Crear Contraseña" tabindex="6" autofocus required>
									</div>
									<div class="input-group-append col-sm-5 col-md-5 col-lg-5 col-xl-5 form-group float-left">
										<button id="showpassword" class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
									</div>
								</div>
								<input type="submit" name="guardar_usuario" value="Guardar Usuario" class="btn btn-block col-md-6 mx-auto btnguardar ">
							</form>
						</div>
					</div>
					<!-- END form_register -->
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>
	<!-- End modal-->

	

</div>

<?php include("includes/footer.php") ?>