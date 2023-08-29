<?php

include('controlador/controlador_login.php');

if (empty($_SESSION["idusuario"])) {
	header("location: login.php");
} else if ($_SESSION['rolusuario'] != 1) {
	header('Location: invitado.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Administrador</title>

	<!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- CDN Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<!-- Font Awesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

	<!-- CSS PROPIO-->
    <link rel="stylesheet" href="css/administrador.css" type="text/css">

	<!-- DATA TABLE -->
	<link rel="stylesheet" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

	<!-- CDN SweetAlert-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- CDN Font Awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

	<!-- JAVASCRIPT -->
	<script src="js/tabla.js"></script>
	<script src="js/mostrar_password.js"></script>
	


</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<div class="menulateral">
			<!-- Sidebar -->
			<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="administrador.php">
					<div class="sidebar-brand-icon rotate-n-15">
						<i class="fas fa-laugh-wink"></i>
					</div>
					<div class="sidebar-brand-text mx-3"><img src="images/logodash.png" id="logo" class="rounded mx-auto d-block img-fluid eyeclose" alt="logopreu"></div>
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="administrador.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span></a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Administración
				</div>

				<li class="nav-item active">
					<a class="nav-link" href="usuarios.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Administrar usuarios</span></a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="inventario.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Administrar inventario</span></a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Otros
				</div>

				<li class="nav-item active">
					<a class="nav-link" href="boletasfacturas.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Ver Boletas/facturas</span></a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="sedes.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Sedes</span></a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="directores.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Directores</span></a>
				</li>


				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="btnexit text-center d-md-inline"><!-- class d-none para que desaparezca en modo celular-->
					<button type="button" class="btncerrar btn-sm">
						<a class="cerrarsesion" href="controlador/controlador_cerrar_session.php">Cerrar sesion</a>
					</button>
				</div>

			</ul>
			<!-- End of Sidebar -->
		</div>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand topbar static-top shadow navegador">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo 'Bienvenido ', $_SESSION["nombreusuario"] ?> <?php echo $_SESSION["apellidousuario"] ?></span>
								<img class="img-profile rounded-circle" src="images/undraw_profile.svg">
							</a>
						</li>
					</ul>
				</nav>
				<!-- End of Topbar -->

				<!-- /.container-fluid -->
			</div>
		
		