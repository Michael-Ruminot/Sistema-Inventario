<?php
include('controlador/controlador_login.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/principal.css" type="text/css">
</head>

<body>

    <form method="POST" action="">
        <section class="card-login vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="contenedorlog card" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <img src="images/logodash.png" id="logo" class="rounded mx-auto d-block img-fluid" alt="logopreu">

                                    <h2 class="fw-bold mb-2">Acceso a sistema TI</h2>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="usuario" id="label">USUARIO</label>
                                        <input type="text" id="usuario" name="usuario" class="input form-control form-control-lg" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password" id="label">CONTRASEÑA</label>
                                        <input type="password" id="password" name="password" class="input form-control form-control-lg" required/>
                                    </div>

                                   <?php if (isset($_SESSION['message'])) { ?>
                                        <div class="alerta col-md-12 alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                                            <?= $_SESSION['message'] ?>
                                        </div>
                                    <?php session_unset(); } ?> 
                                    
                                    <button class="btnlogin btn btn-outline-dark btn-lg px-5" name="btningresar" value="Iniciar Sesion" type="submit" onclick="validar_formulario();">Iniciar sesion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </form>

    
    <script src="vista/js/bootstrap.min.js"></script>
    
    
</body>

</html>