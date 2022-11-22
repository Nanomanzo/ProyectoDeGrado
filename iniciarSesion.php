<?php
    session_start();

      if (isset($_SESSION["user_id"])) {
        header('Location: /PROYECTODEGRADO/paginaPrincipal.php');
    } 
 
    require "./conexion.php";

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id_usuario, email, password FROM usuarios WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
    
        $message = '';

         if (empty($results['email'])) {
            $message = 'usuario no encontrado';
        } else {
            if (!empty($results)) {
                if ( count($results) > 0 && password_verify($_POST['password'], $results['password'])  ) {
                    $_SESSION['user_id'] = $results['id_usuario'];
                    header('Location: /PROYECTODEGRADO/paginaPrincipal.php'); 
                    $message = 'usuario encontrado'; 
                } else {
                    $message = 'Sorry, those credentials do not match';
                }
        }
        }



      }
?>