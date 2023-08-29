<?php

include('db.php');




// Validacion credenciales
    if (!empty($_POST["btningresar"])) {

        if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {

            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            $sql=$conn->query("select * from usuario where usuario_username='$usuario' and usuario_password='$password' ");

            // ALMACENAR DATOS EN VARABLES DE SESION
            if($datos=$sql->fetch_object()) {
                $_SESSION["rolusuario"]=$datos->rol;
                $_SESSION["idusuario"]=$datos->usuario_id;
                $_SESSION["nombreusuario"]=$datos->usuario_nombre;
                $_SESSION["apellidousuario"]=$datos->usuario_apellido;
                
                if ($datos->rol ==1) {
                    header('Location: administrador.php');
                }
                
                if ($datos->rol ==2) {
                    header('Location: invitado.php');
                }
            } else {
                $_SESSION['message'] = 'Usuario y/o contraseña incorrectos';
                $_SESSION['message_type'] = 'danger';
                //header('Location: login.php');
                //echo '<div class="alert alert-danger">Usuario y/o contraseña incorrectos</div>';    // cambiar por clase bootstrap
            }   
            
             // Validación de input usuario en login
            if (preg_match('/[^a-z]/',$_POST['usuario'])) {
                $_SESSION['message'] = 'El usuario debe incluir solo letras';
                $_SESSION['message_type'] = 'danger';
                
            }

            if (preg_match('/[^0-9]/',$_POST['password'])) {
                $_SESSION['message'] = 'La contraseña debe incluir solo números';
                $_SESSION['message_type'] = 'danger';
                //echo '<div class="alert alert-danger">La contraseña debe incluir solo números</div>';     
            }
            /*if (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]/',$_POST['password'])){
                echo "La contraseña debe incluir entre 6 y 12 caracteres";
                header( "refresh:5; url=login.php" );
            } */
        } else{
            $_SESSION['message'] = 'Debe ingresar usuario y contraseña';
            $_SESSION['message_type'] = 'danger';
            //echo '<div class="alert alert-danger">Debe ingresar usuario y contraseña</div>';   // cambiar por clase bootstrap
        }

    }


?>

