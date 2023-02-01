<?php
    session_start();

      if (isset($_SESSION["user_id"])) {
        header('Location: /ProyectoDeGrado/paginaPrincipal.php');
    } 
 
    require "./conexion.php";

    // Verifica si los campos "email" y "password" están llenos en el formulario de inicio de sesión
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id_usuario, email, password, nickname FROM usuarios WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        // Inicializa una variable para almacenar mensajes
        $message = '';

        // Si no se encuentra ningún usuario con el correo electrónico especificado, se muestra un mensaje y se redirige al formulario de registro
         if (empty($results['email'])) {
            $message = 'Usuario no encontrado, regístrese con el formulario de más abajo para poder acceder a "Sigue aprendiendo"';
            header("Location: formRegistarse.php?message=" . $message);
        } else {
            // Si se encuentra algún usuario, se verifica si la contraseña es correcta
            if (!empty($results)) {
                if ( count($results) > 0 && password_verify($_POST['password'], $results['password'])  ) {
                    // Si la contraseña es correcta, se establecen las variables de sesión y se redirige al usuario a la página principal
                    $_SESSION['user_id'] = $results['id_usuario'];                    
                    $_SESSION['nickname'] = $results['nickname'];
                    header('Location: /ProyectoDeGrado/paginaPrincipal.php'); 
                    $message = 'usuario encontrado'; 
                } else {
                    // Si la contraseña es incorrecta, se muestra un mensaje de error y se redirige al formulario de inicio de sesión
                    $message = 'Lo siento, contraseña incorrecta';
                    $tipoMensaje = "alert-danger";
                    header("Location: index.php?message=" . $message . "&class=" . $tipoMensaje);
                }
            }
        }
      }
?>