<?php
    session_start();

/*      if (isset($_SESSION["user_id"])) {
        header('Location: /PROYECTODEGRADO');
    } */
 
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
                    header('Location: /PROYECTODEGRADO'); 
                    $message = 'usuario encontrado'; 
                } else {
                    $message = 'Sorry, those credentials do not match';
                }
        }
        }



      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Registrate</title>
</head>
<body>

    <h1>Inicia sesión</h1>
    <span >O <a href="./index.php">Registrate</a></span>

    <?php if (!empty($message)): ?>
        <p><?= $message?></p>
    <?php endif ?>

    

    <form action="./formIniciarSesion.php" method="post">
        <input type="email" name="email" placeholder="Ingrese su email">
        <input type="password" name="password" placeholder="Ingrese su contraseña">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>