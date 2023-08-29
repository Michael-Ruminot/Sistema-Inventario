
<!-- Modal editar usuario-->
<div class="modal fade modal fade bd-example-modal-lg" id="editar<?php echo $row['usuario_id']; ?>" role="dialog" data-toggle="modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Editar el registro de  <?php echo $row['usuario_nombre'].' '.$row['usuario_apellido']; ?></h1>
					<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
				</div>
				<div class="modal-body">
					<!-- form_register -->
					<div class="registro col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">
						<div class="card-body">
							<form action="functions.php" method="POST">
								<div class="form-group row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-left">
										<input type="text" id="inputnombre" name="nombre" value="<?php echo $row['usuario_nombre']; ?>" class="form-control" placeholder="Nombre" tabindex="1" autofocus required>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-right">
										<input type="text" id="inputcliente" name="apellido" value="<?php echo $row['usuario_apellido']; ?>" class="form-control" placeholder="Apellidos" tabindex="2" autofocus required>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-right">
										<input type="text" id="inputfecha" name="fecha" value="<?php echo $row['usuario_fechanacimiento']; ?>" class="form-control" placeholder="Fecha Nacimiento(año-mes-dia)" tabindex="3" autofocus required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-right">
										<input type="text" id="inputcliente" name="username" value="<?php echo $row['usuario_username']; ?>" class="form-control" placeholder="Nombre de usuario" tabindex="4" autofocus required>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group float-right">
										<select class="form-control" id="selectrol" name="rol" value="<?php echo $row['rol']; ?>" tabindex="5" autofocus required>
											<option value="" selected hidden>Rol</option>
											<option value="1">Administrador</option>
											<option value="2">Invitado</option>
										</select>
									</div>
									<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7 form-group float-left">
										<input type="password" id="inputpassword" name="password" value="<?php echo $row['usuario_password']; ?>" class="form-control" placeholder="Crear Contraseña" tabindex="6" autofocus required>
									</div>
									<div class="input-group-append col-sm-5 col-md-5 col-lg-5 col-xl-5 form-group float-left">
										<button id="showpassword" class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
									</div>
								</div>
								<input type="hidden" name="accion" value="editar">
                    			<input type="hidden" name="id" value="<?php echo $row['usuario_id']; ?>">

								
							</form>
						</div>
					</div>
					<!-- END form_register -->
				</div>
				<div class="modal-footer">
						<button type="submit" class="btn btn-success col-md-6 mx-auto">Actualizar Usuario</button>
                        <button type="button" class="btn btn-danger col-md-6 mx-auto" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End modal editar usuario-->


