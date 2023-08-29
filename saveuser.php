<?php   

        include('db.php');

    	
        if (isset($_POST['guardar_usuario'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $username = $_POST['username'];
            $password= $_POST['password'];
            $fecha = $_POST['fecha'];
            $rol= $_POST['rol'];

            $query = "INSERT INTO usuario(usuario_nombre, usuario_apellido, usuario_username, usuario_password, usuario_fechanacimiento, rol) VALUES ('$nombre', '$apellido', '$username', '$password', '$fecha', $rol)";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die("Query Fallida");
            }
    
            
            $_SESSION['message'] = 'Usuario registrado exitosamente';   /* Mensaje al guardar dato quedando almacenado en sesion*/
            $_SESSION['message_type'] = 'success';					/* Estilo del mensaje almacenado en sesion*/
    
            header("Location: usuarios.php");
        }
?>