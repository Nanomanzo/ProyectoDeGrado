<?php
    session_start();

      if (isset($_SESSION["user_id"])) {
        header('Location: /ProyectoDeGrado/paginaPrincipal.php');
    } 
 
    require "./conexion.php";

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id_usuario, email, password FROM usuarios WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
    
        $message = '';

         if (empty($results['email'])) {
            $message = 'Usuario no encontrado, regístrese con el formulario de más abajo para poder acceder a "Sigue aprendiendo"';
            header("Location: formRegistarse.php?message=" . $message);
        } else {
            if (!empty($results)) {
                if ( count($results) > 0 && password_verify($_POST['password'], $results['password'])  ) {
                    $_SESSION['user_id'] = $results['id_usuario'];
                    header('Location: /ProyectoDeGrado/paginaPrincipal.php'); 
                    $message = 'usuario encontrado'; 
                } else {
                    $message = 'Lo siento, contraseña incorrecta';
                    $tipoMensaje = "alert-danger";
                    header("Location: index.php?message=" . $message . "&class=" . $tipoMensaje);
                }
            }
        }
      }
?>